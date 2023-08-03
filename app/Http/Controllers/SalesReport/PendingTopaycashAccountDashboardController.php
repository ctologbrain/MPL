<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendingTopaycashAccountDashboardRequest;
use App\Http\Requests\UpdatePendingTopaycashAccountDashboardRequest;
use App\Models\SalesReport\PendingTopaycashAccountDashboard;
use App\Models\Operation\DocketMaster;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\SalesExport\PendingTopayCashAccExport;
class PendingTopaycashAccountDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topayCollectionCash=DocketMaster::leftjoin('tariff_types','tariff_types.Docket_Id','=','docket_masters.id')
        ->leftjoin('Docket_Collection_Trans','Docket_Collection_Trans.Docket_Id','=','docket_masters.id')

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

        ->leftjoin('Docket_Deposit_Trans','Docket_Deposit_Trans.Docket_Id','=','docket_masters.id')
        ->leftjoin('bank_masters','Docket_Collection_Trans.Bank','=','bank_masters.id')
        
        ->Select("docket_masters.Docket_No","MainOff.OfficeName as OfficeName",
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BookingDatte"),"customer_masters.CustomerName",
        'ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity',
        "docket_product_details.Qty","docket_product_details.Actual_Weight","docket_product_details.Charged_Weight",
        "docket_booking_types.BookingType", "consignees.ConsigneeName",DB::raw("DATE_FORMAT(Docket_Collection_Trans.Date, '%d-%m-%Y') as ColDate"),
        DB::raw("(CASE WHEN Docket_Collection_Trans.Type = 1 THEN 'CASH' WHEN Docket_Collection_Trans.Type = 2 THEN 'CHECK' WHEN Docket_Collection_Trans.Type = 3 THEN 'NEFT' END  ) as CollectionType"),
        "Docket_Collection_Trans.Amt","bank_masters.BankName","Docket_Collection_Trans.Remark",
        DB::raw("(CASE WHEN DelvOff.OfficeName IS NOT NULL  THEN  DelvOff.OfficeName ELSE DRSOffice.OfficeName  END ) as DelBranch"),
        "Docket_Deposit_Trans.RefNo", "docket_statuses.title","docket_allocations.BookDate","tariff_types.TotalAmount",
        DB::raw("(CASE WHEN Regular_Deliveries.Delivery_date IS NOT NULL THEN DATE_FORMAT(Regular_Deliveries.Delivery_date,'%d-%m-%Y')  WHEN drs_delivery_transactions.Time IS NOT NULL THEN DATE_FORMAT(drs_delivery_transactions.Time,'%d-%m-%Y') END ) as DelDate"),
        )

        ->whereIn('docket_masters.Booking_Type',[3,4])
        ->where('Docket_Collection_Trans.Amt','=',null)
        ->paginate(10);
        if($request->submit=="Download"){
            return   Excel::download(new PendingTopayCashAccExport($search=""), 'PendingTopayCashAccExport.xlsx');
        }
        return view("SalesReport.PendingTopaycashAccountDashboard",[
            "title" => "PENDING CASH  TOPAY DASHBOARD",
            "data" => $topayCollectionCash
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendingTopaycashAccountDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingTopaycashAccountDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\PendingTopaycashAccountDashboard  $pendingTopaycashAccountDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(PendingTopaycashAccountDashboard $pendingTopaycashAccountDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\PendingTopaycashAccountDashboard  $pendingTopaycashAccountDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingTopaycashAccountDashboard $pendingTopaycashAccountDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingTopaycashAccountDashboardRequest  $request
     * @param  \App\Models\SalesReport\PendingTopaycashAccountDashboard  $pendingTopaycashAccountDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingTopaycashAccountDashboardRequest $request, PendingTopaycashAccountDashboard $pendingTopaycashAccountDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\PendingTopaycashAccountDashboard  $pendingTopaycashAccountDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingTopaycashAccountDashboard $pendingTopaycashAccountDashboard)
    {
        //
    }
}
