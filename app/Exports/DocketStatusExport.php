<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\VehicleTripSheetTransaction;
use DB;
class DocketStatusExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office ,$date,$DocketNo,$status) {
       
        $this->office = $office;
        $this->date = $date;
        $this->DocketNo = $DocketNo;
        $this->status = $status;
    }
        

    public function collection()
    {
       
        return  DocketAllocation::
        leftjoin('docket_masters','docket_masters.Docket_No','=','docket_allocations.Docket_No')
        ->leftjoin('office_masters','office_masters.id','=','docket_masters.Office_ID')
        ->leftjoin('office_masters as ParentOfficemaster','ParentOfficemaster.ParentOffice','=','docket_masters.Office_ID')
        ->leftJoin('docket_series_devisions', function($join)
        {
        $join->on('docket_series_devisions.Series_ID', '=', 'docket_allocations.Series_ID');
        $join->on('docket_series_devisions.Branch_ID', '=', 'docket_allocations.Branch_ID');
        })
        ->leftjoin('docket_statuses','docket_statuses.id','docket_masters.Status')
        ->Select("docket_allocations.Docket_No","ParentOfficemaster.OfficeName",
        "office_masters.OfficeName", 
        "docket_series_devisions.IssueDate","docket_allocations.BookDate"
       , "docket_statuses.title","docket_allocations.Remark"
        )
        ->where(function($query) {
            if($this->DocketNo!=''){
                $query->where("docket_masters.Docket_No",$this->DocketNo);
            }
        })->where(function($query){
            if($this->offcie!=''){
                $query->where("docket_masters.Office_ID",$this->offcie);
            }
        })
        ->where(function($query){
            if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
            }
        })
        ->where(function($query) {
            if($this->status!=''){
                $query->where("docket_allocations.Status",$this->status);
            }
        })
        ->get();
    }

    public function headings(): array
    {
        return [
            'Docket',
            'Parent Office',
            'Branch Office',
            'Issue Date',
            'Book Date',
            'Status',
            'Remark'
         ];
    }
}