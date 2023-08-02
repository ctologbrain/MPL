<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\DocketDepositTrans;
use DB;
class TopayDipositExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($Office,$originCityData,$DestCityData, $DestpinCode,$pinCode,$saleType,$date) {
        $this->Office = $Office;
        $this->originCityData=$originCityData;
        $this->DestCityData=$DestCityData;

        $this->DestpinCode = $DestpinCode;
        $this->pinCode=$pinCode;
        $this->saleType=$saleType;
        $this->date = $date;
    }
        

    public function collection()
    {
       return DocketDepositTrans::
        leftjoin('docket_masters','docket_masters.id','=','Docket_Deposit_Trans.Docket_Id')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','=','customer_masters.id')
        ->leftjoin('office_masters as MainOff','MainOff.id','=','docket_masters.Office_ID')
        ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
        ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
        ->leftjoin('docket_statuses','docket_allocations.Status','=','docket_statuses.id')
        ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
        ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
        ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
        ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')

        ->leftjoin("drs_delivery_transactions","drs_delivery_transactions.Docket","docket_masters.Docket_No")  
        ->leftjoin("drs_deliveries","drs_deliveries.id","drs_delivery_transactions.Drs_id")  
        ->leftjoin('employees as DelvEMP','DelvEMP.user_id','drs_delivery_transactions.CreatedBy')
        ->leftjoin("office_masters as DRSOffice","DRSOffice.id","DelvEMP.OfficeName")

        ->leftjoin("Regular_Deliveries","Regular_Deliveries.Docket_ID","docket_masters.Docket_No")  
        ->leftjoin("office_masters as DelvOff","DelvOff.id","Regular_Deliveries.Dest_Office_Id")
        ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")

        ->leftjoin('bank_masters','Docket_Deposit_Trans.Bank','=','bank_masters.id')
        
        ->Select("docket_masters.Docket_No","MainOff.OfficeName as OfficeName",
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BookingDatte"),"customer_masters.CustomerName",
        'ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity',
        "docket_product_details.Qty","docket_product_details.Actual_Weight","docket_product_details.Charged_Weight",
        "docket_booking_types.BookingType", "consignees.ConsigneeName",DB::raw("DATE_FORMAT(Docket_Deposit_Trans.Date, '%d-%m-%Y') as ColDate"),
        "Docket_Deposit_Trans.DepositAt",
        "Docket_Deposit_Trans.Amt","bank_masters.BankName","Docket_Deposit_Trans.Remark",
        DB::raw("(CASE WHEN DelvOff.OfficeName IS NOT NULL  THEN  DelvOff.OfficeName ELSE DRSOffice.OfficeName  END ) as DelBranch"),
        "Docket_Deposit_Trans.RefNo", "docket_statuses.title","docket_allocations.BookDate"
        )
        ->where(function($query) {
            if(isset($this->date['from']) && isset($this->date['to'])){
                $query->whereBetween("Date" ,[$this->date['from'],$this->date['to']]);
            }
        })->where(function($query){
            if($this->Office!=''){
                $query->whereRelation("DocketMasterInfo", "Office_ID" ,$this->Office);
            }
        })
        ->where(function($query) {
            if($this->originCityData!=''){ 
                $query->whereRelation("DocketMasterInfo", fn($q) => $q->whereIn('Origin_Pin',$this->pinCode) );
            }
           })
           ->where(function($query) {
            if($this->DestCityData!=''){
                $query->whereRelation("DocketMasterInfo", fn($q) => $q->whereIn('Dest_Pin',$this->DestpinCode) );
            }
           })
        ->where(function($query){
            if($this->saleType!=''){
                     $query->whereRelation("DocketMasterInfo","Booking_Type","=",$this->saleType);
            }
           })
        ->orderBy('Docket_Deposit_Trans.id','DESC')
        ->get();
        //RefNo
      
    }

    public function headings(): array
    {
        return [
            'Docket Number',
            'Booking Branch',
            'Booking Date',
            'Client Name',
            'Origin City',
            'Destination City',
            'Pcs',
            'Act. Wt.',
            'Chg. Wt.',
            'Sale Type',
            'Consignee Name',
            'Date',
            'Deposit AT',
            'Deposit Amount',
            'Bank Name',
            'Deposit Remarks',
            'Delivery Branch',
            'UTR Number',
            'Last Status',
            'Status Date'
          
         ];
    }
}