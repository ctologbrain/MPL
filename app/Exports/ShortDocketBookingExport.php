<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\GatePassRecvTrans;
use DB;
class ShortDocketBookingExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office ,$date) {
       
        $this->office = $office;
        $this->date = $date;
    }
        

    public function collection()
    {
       
        return GatePassRecvTrans::
        leftjoin('gate_pass_receivings','gate_pass_receivings.id','Gp_Recv_Trans.GP_Recv_Id')
        ->leftjoin('office_masters as DestOff','DestOff.id','=','gate_pass_receivings.Rcv_Office')
       
        ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','=','Gp_Recv_Trans.Docket_No')
        ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
        ->leftjoin('docket_masters','docket_masters.Docket_No','=','gate_pass_with_dockets.Docket')
        ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')

        ->leftjoin('docket_allocations','docket_masters.Docket_No','=','docket_allocations.Docket_No')

        ->leftjoin('pincode_masters as Pickup','docket_masters.Origin_Pin','=','Pickup.id')
        ->leftjoin('pincode_masters as Dest','docket_masters.Dest_Pin','=','Dest.id')
        ->leftjoin('cities as Pickupcities','Pickup.city','=','Pickupcities.id')
        ->leftjoin('cities as Destcities','Dest.city','=','Destcities.id')
        
        ->leftjoin('docket_statuses','docket_statuses.id','docket_allocations.Status')
        ->leftjoin('employees','gate_pass_receivings.Recieved_By','employees.user_id')
        ->leftjoin('office_masters as ShortDecOff','ShortDecOff.id','employees.OfficeName')
        ->leftjoin('office_masters as ParentOfficemaster','ParentOfficemaster.id','=','docket_masters.Office_ID')
       
       
        ->Select(DB::raw("DATE_FORMAT(Gp_Recv_Trans.Created_At,'%d-%m-%Y') as ShDate"),"Gp_Recv_Trans.Docket_No",
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BookDate"),
        "gate_pass_with_dockets.pieces", "Gp_Recv_Trans.Recv_Qty" ,"gate_pass_with_dockets.weight",
        "customer_masters.CustomerName","vehicle_gatepasses.GP_Number","ShortDecOff.OfficeName",
        "employees.EmployeeName", "docket_statuses.title","docket_allocations.BookDate",
        "Pickupcities.CityName as PickupC" ,"Destcities.CityName as DestinationC"
        )
        ->where("Gp_Recv_Trans.ShotBox","=","YES")
        ->orWhere("Gp_Recv_Trans.ShotPices","=","YES")
       ->where(function($query){
            if($this->office!=''){
                $query->where("gate_pass_receivings.Rcv_Office",$this->office);
            }
        })
        ->where(function($query){
            if(isset($this->date['formDate']) && $this->date['formDate']!='' && isset($this->date['todate'])  && $this->date['todate']!='' ){
                $query->whereBetween(DB::raw("DATE_FORMAT(Gp_Recv_Trans.Created_At, '%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
            }
        })
        ->get();
      
    }

    public function headings(): array
    {
        return [
            'Short Date',
            'Docket No.',
            'Book Date',
            'Pcs.',
            'Received Pcs.',
            'Act. Wt.',
            'Customer',
            'Gatepass No.',
            'Short Declared Office',
            'Short Declared By',
            'Last Activity',
            'Activity Date',
            'Pickup City',
            'Destination City'
         ];
    }
}