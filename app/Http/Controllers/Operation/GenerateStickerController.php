<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenerateStickerRequest;
use App\Http\Requests\UpdateGenerateStickerRequest;
use App\Models\Operation\GenerateSticker;
use App\Models\Operation\DocketMaster;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\city;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Account\CustomerMaster;
use App\Models\Stock\DocketAllocation;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Account\ConsignorMaster;
use PDF;
use Milon\Barcode\DNS1D;
class GenerateStickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=city::get();
        $offcieMaster=OfficeMaster::get();
        $CustomerMaster=CustomerMaster::get();
        return view('Operation.genrateSticker', [
            'title'=>'MPS/DOCKET STICKER',
            'city'=>$city,
            'offcieMaster'=>$offcieMaster,
            'CustomerMaster'=>$CustomerMaster
            ]);
    }
    public function GetConsigneeForCust(Request $request)
    {
         $cons=ConsignorMaster::where('CustId',$request->customer)->get();
         $html='';
         foreach($cons as $consignee)
         {
         $html.='<option value="'.$consignee->id.'">'.$consignee->ConsignorName.'</option>';
         }
         echo $html;
         
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
     * @param  \App\Http\Requests\StoreGenerateStickerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenerateStickerRequest $request)
    {


                if($request->Manual==2)
                {
                 $checkDoket=DocketAllocation::
                 leftjoin('docket_series_masters','docket_series_masters.id','=','docket_allocations.Series_ID')
                 ->where('docket_series_masters.Docket_Type',2)   
                 ->where('docket_allocations.Status',0)   
                 ->orderBy('docket_allocations.Docket_No','ASC')
                 ->first();
                 $docket=$checkDoket->Docket_No;
                }
                else{
                    $docket=$request->docket_number;
                }
                $UserId = Auth::id();
                $data= array("DocketType"=> $request->docket_type,
                "Manual"=> $request->Manual,
                "Docket"=> $docket,
                "BookingOffice"=> $request->booking_office,
                "BookingDate"=> date("Y-m-d", strtotime($request->booking_date)),
                "CustId"=> $request->customer_name,
                "Consignor"=> $request->consigner,
                "Mode"=> $request->mode,
                "Origin"=> $request->Origin,
                'RefNo'=>$request->ref_no,
                "Destination"=> $request->Destination,
                "Pices"=> $request->pieces,
                "Width"=> $request->weight,
                "CreatedAt"=>date('Y-m-d H:i:s'),
                "CreatedBy"=>$UserId);
                GenerateSticker::insert($data);
                if($request->Manual==2){
                $docketFile=GenerateSticker::
          leftjoin('customer_masters','customer_masters.id','=','Sticker.CustId')
         ->leftjoin('employees','employees.user_id','=','Sticker.CreatedBy')
         ->leftjoin('office_masters','office_masters.id','=','Sticker.BookingOffice')
         ->leftjoin('office_masters as EmployeeOffcie','EmployeeOffcie.id','=','employees.OfficeName')
         ->leftjoin('cities as SourceCity','SourceCity.id','=','Sticker.Origin')
         ->leftjoin('cities as DestCity','DestCity.id','=','Sticker.Destination')
         ->select('customer_masters.CustomerName','Sticker.BookingDate','employees.EmployeeName','Sticker.Docket','office_masters.OfficeCode','office_masters.OfficeName','EmployeeOffcie.OfficeCode as EmpOffCode','EmployeeOffcie.OfficeName as EmployeeOff','Sticker.Mode','SourceCity.CityName as SourceCity','DestCity.CityName as DestCity','Sticker.Width','Sticker.Pices')
         ->where('Sticker.Docket',$docket)
         ->first();
   $string = "<tr><td>SHORT BOOKING</td><td>".date("d-m-Y",strtotime($docketFile->BookingDate))."</td><td><strong>BOOKING OFFICE: </strong>".$docketFile->OfficeCode.' '.$docketFile->OfficeName." <strong>BOOKING DATE: </strong>".date("d-m-Y",strtotime($docketFile->BookingDate))."<br><strong>ORIGIN: </strong>$docketFile->SourceCity<strong> DESTNATION: </strong>$docketFile->DestCity<br><strong>CUSTOMER NAME: </strong>$docketFile->CustomerName  <strong> MODE: </strong>$docketFile->Mode<br><strong>PIECES: </strong>$docketFile->Pices <strong>WEIGHT: </strong>$docketFile->Width</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName." <br>(".$docketFile->EmpOffCode.'~'.$docketFile->EmployeeOff.")</td></tr>"; 
      Storage::disk('local')->append($docket, $string);
                }
                return $docket;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GenerateSticker  $generateSticker
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails')->where('Docket_No',$request->Docket)->first();
       if(!empty($docket))
       {
           return json_encode($docket);
       }
       else
       {
         return 'false';  
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GenerateSticker  $generateSticker
     * @return \Illuminate\Http\Response
     */
    public function edit(GenerateSticker $generateSticker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenerateStickerRequest  $request
     * @param  \App\Models\Operation\GenerateSticker  $generateSticker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenerateStickerRequest $request, GenerateSticker $generateSticker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GenerateSticker  $generateSticker
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenerateSticker $generateSticker)
    {
        //
    }
    public function print_sticker(Request $request,$docket,$type)
    {
        $docketQuery=DocketMaster::
          leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
         ->leftjoin('pincode_masters as SourcePin','SourcePin.id','=','docket_masters.Origin_Pin')
         ->leftjoin('cities as SourceCity','SourceCity.id','=','SourcePin.city')
         ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
         ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')
         ->select('docket_masters.Docket_No','docket_masters.Booking_Date','docket_masters.Ref_No','docket_product_details.Qty','SourceCity.CityName as SourceCitys','DestCity.CityName as DestCitys')
         ->where('docket_masters.Docket_No',$docket)->first();
        if(!empty($docketQuery))
        {
            $docketDeatis=$docketQuery;
        }
        else{
            $docketDeatis=GenerateSticker::
            leftjoin('customer_masters','customer_masters.id','=','Sticker.CustId')
           ->leftjoin('employees','employees.user_id','=','Sticker.CreatedBy')
           ->leftjoin('office_masters','office_masters.id','=','Sticker.BookingOffice')
           ->leftjoin('office_masters as EmployeeOffcie','EmployeeOffcie.id','=','employees.OfficeName')
           ->leftjoin('cities as SourceCity','SourceCity.id','=','Sticker.Origin')
           ->leftjoin('cities as DestCity','DestCity.id','=','Sticker.Destination')
           ->select('customer_masters.CustomerName','Sticker.BookingDate','employees.EmployeeName','Sticker.Docket','office_masters.OfficeCode','office_masters.OfficeName','EmployeeOffcie.OfficeCode as EmpOffCode','EmployeeOffcie.OfficeName as EmployeeOff','Sticker.Mode','SourceCity.CityName as SourceCity','DestCity.CityName as DestCity','Sticker.Width','Sticker.Pices','Sticker.RefNo')
           ->where('Sticker.Docket',$docket)
           ->first();
          
        }
        
       
        $data = [
            'title' => 'Welcome to CodeSolutionStuff.com',
            'docketFile'=>$docketDeatis
          ];
        if($type==1)  
        {
        $pdf = PDF::loadView('Sticker.Docket', $data);
        $path = public_path('pdf/');
        $fileName =  $docket . '.' . 'pdf' ;
        $pdf->save($path . '/' . $fileName);
        return response()->file($path.'/'.$fileName);
        }
        if($type==2)  
        {
            $pdf = PDF::loadView('Sticker.ColoaderAWB', $data);
            $path = public_path('pdf/');
            $fileName =  $docket . '.' . 'pdf' ;
            $pdf->save($path . '/' . $fileName);
            return response()->file($path.'/'.$fileName);   
        }
        if($type==3)  
        {
            $pdf = PDF::loadView('Sticker.BrotherMPPS', $data);
            $path = public_path('pdf/');
            $fileName =  $docket . '.' . 'pdf' ;
            $pdf->save($path . '/' . $fileName);
            return response()->file($path.'/'.$fileName);   
        }
        if($type=4)  
        {
            
            $pdf = PDF::loadView('Sticker.TCSMPPS', $data);
            $path = public_path('pdf/');
            $fileName =  $docket . '.' . 'pdf' ;
            $pdf->save($path . '/' . $fileName);
            return response()->file($path.'/'.$fileName);   
            // return view('Sticker.TCSMPPS', [
            //     'title'=>'MPS/DOCKET STICKER',
            //     'docketFile'=>$docket
               
            //     ]);
        }
       
    }
}
