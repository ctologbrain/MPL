<?php
namespace App\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Account\OfficeCustMapping;
use DB;
class OfficeCustMappingExport implements FromCollection, WithHeadings,ShouldAutoSize
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
       return OfficeCustMapping::
       leftjoin('customer_masters','customer_masters.id','=','officecustmappping.CustomerId')
       ->leftjoin('office_masters','office_masters.id','=','officecustmappping.OfficeId')
       ->leftjoin('employees','employees.user_id','=','officecustmappping.CreatedBy')
       ->select('officecustmappping.id',
        DB::raw('CONCAT(office_masters.OfficeCode ,"~",office_masters.OfficeName ) as OFF'),
       DB::raw('CONCAT(customer_masters.CustomerCode ,"~",customer_masters.CustomerName ) as CUST'),
       'employees.EmployeeName',
       DB::raw('DATE_FORMAT(officecustmappping.Created_At, "%d-%m-%Y %H:%i") as date') )
       ->where(function($query){
           if($this->search!=""){
                $query->where("office_masters.OfficeName","like", "%".$this->search. "%");
                $query->orWhere("office_masters.OfficeCode","like", "%".$this->search. "%");
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