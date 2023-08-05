<?php
namespace App\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Account\OfficeModeMap;
use DB;
class CustomerModeMappingExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($search) {
       
        $this->search = $search;
    }
    public function collection()
    {
       return OfficeModeMap::
       leftjoin('customer_masters','customer_masters.id','=','officemodemap.CustomerId')
       ->leftjoin('BookingMode','BookingMode.id','=','officemodemap.ModeId')
       ->leftjoin('employees','employees.user_id','=','officemodemap.CreatedBy')
       ->select(DB::raw('CONCAT(office_masters.OfficeCode ,"~",office_masters.OfficeName ) as OFF'),
       DB::raw('CONCAT(customer_masters.CustomerCode ,"~",customer_masters.CustomerName ) as CUST'),
       'employees.EmployeeName',
       'officemodemap.Created_At')
       ->where(function($query){
           if($this->search!=""){
                $query->where("BookingMode.Mode","like", "%".$this->search. "%");
                $query->orWhere("customer_masters.CustomerName","like", "%".$this->search. "%");
                $query->orWhere("customer_masters.CustomerCode","like", "%".$this->search. "%");
           }
       })->get();
    }

    public function headings(): array
    {
        return [
            'Office',
            'Customer',
            'Mapping By',
            'Mapping On'
         ];
    }
}