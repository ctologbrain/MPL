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
       leftjoin('customer_masters','customer_masters.id','=','officemodemap.CustId')
       ->leftjoin('BookingMode','BookingMode.id','=','officemodemap.ModeId')
       ->leftjoin('employees','employees.user_id','=','officemodemap.CreatedBy')
       ->select(
        'officemodemap.id',
       DB::raw('CONCAT(customer_masters.CustomerCode ,"~",customer_masters.CustomerName ) as CUST'),
       'BookingMode.Mode',
       'employees.EmployeeName',
       DB::raw('DATE_FORMAT(officemodemap.Created_At, "%d-%m-%Y %H:%i") as date'))
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
            'SN',
            'Office',
            'Customer',
            'Mapping By',
            'Mapping On'
         ];
    }
}