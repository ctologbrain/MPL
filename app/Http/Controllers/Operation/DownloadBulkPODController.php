<?php

namespace App\Http\Controllers\Operation;

use App\Http\Requests\StoreDownloadBulkPODRequest;
use App\Http\Requests\UpdateDownloadBulkPODRequest;
use App\Models\Operation\DownloadBulkPOD;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\OfficeSetup\OfficeMaster;
use App\Models\Account\CustomerMaster;
use App\Models\Operation\DocketMaster;
use DB;
class DownloadBulkPODController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customer = CustomerMaster::get();
        $Office = OfficeMaster::get();
        return view('Operation.dowloadPODWaybill', [
                'title'=>'DOWNLOAD POD',
                'Customer'=> $Customer,
                'Office'=>$Office
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
     * @param  \App\Http\Requests\StoreDownloadBulkPODRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDownloadBulkPODRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DownloadBulkPOD  $downloadBulkPOD
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,DownloadBulkPOD $downloadBulkPOD)
    {
        //
       $searchType=   $request->searchType;
       $waybill_no=   $request->waybill_no;
       $CustomerName=   $request->CustomerName;
       $bill_no=   $request->bill_no;
       $booking_office=   $request->booking_office;
       $DateFrom=  '';
       $DateTo=  '';
       if($request->DateFrom){
       $DateFrom=   date("Y-m-d",strtotime($request->DateFrom));
       }
       if($request->DateTo){
       $DateTo=   date("Y-m-d",strtotime($request->DateTo));
       }
       $DocketRecordImage = array();
        if($searchType==1){
            $Dockets = explode(",",$waybill_no);
            $DocketRecordImage = DocketMaster::join("UploadDocketImage","UploadDocketImage.DocketNo","=","docket_masters.Docket_No")
            ->where(function($query) use($Dockets){
                $query->whereIn("Docket_No",$Dockets);
            })
            ->get();
          //  print_r($Docket); die;
            
        }
        elseif($searchType==2){
            $DocketRecordImage = DocketMaster::join("UploadDocketImage","UploadDocketImage.DocketNo","=","docket_masters.Docket_No")
            ->where(function($query) use($CustomerName){
                if($CustomerName!=""){
                    $query->where("Cust_Id",$CustomerName);
                }
            })
            ->where(function($query) use($DateFrom, $DateTo){
                if($DateFrom!="" && $DateTo!=""){
                    $query->whereBetween(DB::raw("DATE_FORMAT(Booking_Date,'%Y-%m-%d')"),[$DateFrom,$DateTo]);
                }
            })
            ->get();
            
        }
        elseif($searchType==3){
            $DocketRecordImage = DocketMaster::join("UploadDocketImage","UploadDocketImage.DocketNo","=","docket_masters.Docket_No")
            ->leftjoin("InvoiceMaster","InvoiceMaster.Cust_Id","=","docket_masters.Cust_Id")
            //with("DocketImagesDet")
            ->where(function($query) use($bill_no){
                if($bill_no!=""){
                $query->where("InvoiceMaster.InvNo",$bill_no);
                }
            })
            ->where(function($query) use($CustomerName){
                if($CustomerName!=""){
                $query->where("InvoiceMaster.Cust_Id",$CustomerName);
                }
            })
            ->groupBy("docket_masters.Docket_No")
            ->get();
           
        }
        elseif($searchType==4){
            $DocketRecordImage = DocketMaster::join("UploadDocketImage","UploadDocketImage.DocketNo","=","docket_masters.Docket_No")
            ->where(function($query) use($booking_office){
                if($booking_office!=""){
                    $query->where("Office_ID",$booking_office);
                }
            })
            ->where(function($query) use($DateFrom, $DateTo){
                if($DateFrom!="" && $DateTo!=""){
                    $query->whereBetween(DB::raw("DATE_FORMAT(Booking_Date,'%Y-%m-%d')"),[$DateFrom,$DateTo]);
                }
            })
            ->get();
           
        }
       
        return view('Operation.downloadPODWaybillInner', [
            'title'=>'DOWNLOAD POD Table',
            'DocketRecordImage'=> $DocketRecordImage,
            'searchType'=>$searchType
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DownloadBulkPOD  $downloadBulkPOD
     * @return \Illuminate\Http\Response
     */
    public function edit(DownloadBulkPOD $downloadBulkPOD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDownloadBulkPODRequest  $request
     * @param  \App\Models\Operation\DownloadBulkPOD  $downloadBulkPOD
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDownloadBulkPODRequest $request, DownloadBulkPOD $downloadBulkPOD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DownloadBulkPOD  $downloadBulkPOD
     * @return \Illuminate\Http\Response
     */
    public function destroy(DownloadBulkPOD $downloadBulkPOD)
    {
        //
    }
}
