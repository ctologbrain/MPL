<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use App\Models\Stock\DocketSeriesDevision;
use DB;
class StockSummeryExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($officefilter,$date) {
       
        $this->officefilter = $officefilter;
        $this->date =$date;
    }
        

    public function collection()
    {
       return DocketSeriesDevision::
       leftjoin('docket_allocations','docket_allocations.devisions_id','=','docket_series_devisions.id')
     ->leftjoin('office_masters','office_masters.id','=','docket_series_devisions.Branch_ID')
       ->select('office_masters.OfficeName','docket_series_devisions.IssueDate','docket_series_devisions.Qty',
       DB::raw("CONCAT(docket_series_devisions.Sr_From,'-',docket_series_devisions.Sr_To)") ,'docket_series_devisions.id',
       DB::raw(
        "SUM(CASE
        WHEN docket_allocations.Status >1 
        THEN 1 ELSE 0 END) AS 'Booked'"
            ),
       DB::raw(
               "SUM(CASE
         WHEN docket_allocations.Status = 0 
         THEN 1  ELSE 0 END) AS 'Unused'"
           ),

           DB::raw(
            "SUM(CASE
        WHEN docket_allocations.Status = 1
        THEN 1  ELSE 0 END) AS 'Cancel'"
            ),)
           ->Where(function ($query){ 
            if(isset($this->officefilter) && $this->officefilter !='')
            {
               $query->where('docket_series_devisions.Branch_ID',$this->officefilter);
            }
            })
           ->where(function($query) {
           if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
               $query->whereBetween("docket_series_devisions.IssueDate",[$this->date['formDate'],$this->date['todate']]);
           }
           })
        ->groupBy('docket_series_devisions.id')
        ->get();
       
    }

    public function headings(): array
    {
        return [
            'Office Name',
            'Issue Date',
            'Issued',
            'Docket Series',
            'Used',
            'Un-Used',
            'Cancelled',
            'Missing'
         ];
    }
}