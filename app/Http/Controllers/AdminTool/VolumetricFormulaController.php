<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVolumetricFormulaRequest;
use App\Http\Requests\UpdateVolumetricFormulaRequest;
use App\Models\AdminTool\VolumetricFormula;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use Auth;
use DB;
use App\Models\AdminTool\VolumetricFormulaForCustomer;
use App\Models\AdminTool\VolumetricFormulaForOffcie;
class VolumetricFormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=CustomerMaster::get();
        $office=OfficeMaster::get();
        return view("AdminTool.VolumetricFormula",
        ["title" =>"VOLUMETRIC FORMULA",
         'cust'=>$customer,
         'office'=>$office

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
     * @param  \App\Http\Requests\StoreVolumetricFormulaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVolumetricFormulaRequest $request)
    {
       
        $UserId=Auth::id();
        if(isset($request->Vid) && ($request->Vid !=''))
        {
        if($request->formulafor==1)
       {
        $Docket=VolumetricFormulaForOffcie::where("id", $request->Vid)->update(
            ['FromulaFor' =>$request->formulafor,'OfficeId'=>$request->office,'Mode'=>$request->mode,'Volumetric'=>$request->valumetric ,'Measurement'=>$request->measurment,'DevideBy'=>$request->devideBy,'MultipleBy'=>$request->multipleBy,'CreatedBy'=>$UserId]
        );
       }
       if($request->formulafor==2)
       {
        $Docket=VolumetricFormulaForCustomer::where("id", $request->Vid)->update(
            ['FromulaFor' =>$request->formulafor,'CustId'=>$request->customer,'Mode'=>$request->mode,'Volumetric'=>$request->valumetric ,'Measurement'=>$request->measurment,'DevideBy'=>$request->devideBy,'MultipleBy'=>$request->multipleBy,'CreatedBy'=>$UserId]
        ); 
       }
        }
        else
        {
        if($request->formulafor==1)
       {
        $Docket=VolumetricFormulaForOffcie::insert(
            ['FromulaFor' =>$request->formulafor,'OfficeId'=>$request->office,'Mode'=>$request->mode,'Volumetric'=>$request->valumetric ,'Measurement'=>$request->measurment,'DevideBy'=>$request->devideBy,'MultipleBy'=>$request->multipleBy,'CreatedBy'=>$UserId]
        );
       }
       if($request->formulafor==2)
       {
        $Docket=VolumetricFormulaForCustomer::insert(
            ['FromulaFor' =>$request->formulafor,'CustId'=>$request->customer,'Mode'=>$request->mode,'Volumetric'=>$request->valumetric ,'Measurement'=>$request->measurment,'DevideBy'=>$request->devideBy,'MultipleBy'=>$request->multipleBy,'CreatedBy'=>$UserId]
        ); 
       }
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminTool\VolumetricFormula  $volumetricFormula
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->type==1)
        {
          $data= $Docket=VolumetricFormulaForOffcie::where('id',$request->id)->first();
        }
        if($request->type==2)
        {
          $data=VolumetricFormulaForCustomer::where('id',$request->id)->first();
        }
        echo json_encode($data);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminTool\VolumetricFormula  $volumetricFormula
     * @return \Illuminate\Http\Response
     */
    public function edit(VolumetricFormula $volumetricFormula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVolumetricFormulaRequest  $request
     * @param  \App\Models\AdminTool\VolumetricFormula  $volumetricFormula
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVolumetricFormulaRequest $request, VolumetricFormula $volumetricFormula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminTool\VolumetricFormula  $volumetricFormula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->type==1)
        {
          VolumetricFormulaForOffcie::where('id',$request->id)->delete();
        }
        if($request->type==2)
        {
        VolumetricFormulaForCustomer::where('id',$request->id)->delete();
        }
    }
    public function getValuemetriByAjax(Request $request)
    {
        date_default_timezone_set("Asia/Kolkata");
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
      
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        
        $search='';
        $formulafor='';
        if($request->formulafor)
          {
           $formulafor .=$request->formulafor;
          }
          if($request->search)
          {
            $search .=$request->search;
           
          } 
          if($request->formulafor==1)
          {
              $count= $Docket=VolumetricFormulaForOffcie::leftjoin('office_masters','office_masters.id','=','VolumetricFormulaForOff.OfficeId')->where(function($query) use($search){
                if($search!=''){
                    $query ->orWhere('office_masters.OfficeName', 'like', '%' . $search . '%');
                    $query ->orWhere('office_masters.OfficeCode', 'like', '%' . $search . '%');
                }
               })->count('VolumetricFormulaForOff.id');
           $Docket=VolumetricFormulaForOffcie::
           leftjoin('office_masters','office_masters.id','=','VolumetricFormulaForOff.OfficeId')
           ->select('VolumetricFormulaForOff.*','office_masters.OfficeCode','office_masters.OfficeName')
           ->where(function($query) use($search){
            if($search!=''){
                $query ->orWhere('office_masters.OfficeName', 'like', '%' . $search . '%');
                $query ->orWhere('office_masters.OfficeCode', 'like', '%' . $search . '%');
            }
           })
           ->skip($start)
          ->take($rowperpage)
          ->get();
             
          }
          if($request->formulafor==2)
          {
           $count=VolumetricFormulaForCustomer::leftjoin('customer_masters','customer_masters.id','=','VolumetricFormulaForCust.CustId')->where(function($query) use($search){
            if($search!=''){
                $query ->orWhere('customer_masters.CustomerName', 'like', '%' . $search . '%');
                $query ->orWhere('customer_masters.CustomerCode', 'like', '%' . $search . '%');
            }
           })->count('VolumetricFormulaForCust.id');
           $Docket=VolumetricFormulaForCustomer::
           leftjoin('customer_masters','customer_masters.id','=','VolumetricFormulaForCust.CustId')
           ->select('VolumetricFormulaForCust.*','customer_masters.CustomerCode','customer_masters.CustomerName')
           ->where(function($query) use($search){
            if($search!=''){
                $query ->orWhere('customer_masters.CustomerName', 'like', '%' . $search . '%');
                $query ->orWhere('customer_masters.CustomerCode', 'like', '%' . $search . '%');
            }
           })
           ->skip($start)
          ->take($rowperpage)
          ->get();
          }
          $i=0;
          foreach($Docket as $record){
            $i++;
            
            if($record->FromulaFor==1)
            {
              $DCat='Office';  
              $offCode=$record->OfficeCode;
              $offname=$record->OfficeName;
            }
            else
            {
              $DCat='Customer';  
              $offCode=$record->CustomerCode;
              $offname=$record->CustomerName;
            }
            if($record->Mode==1)
            {
              $mode='AIR';  
            }
            elseif($record->Mode==2)
            {
                $mode='COURIER';  
            }
            elseif($record->Mode==3)
            {
                $mode='ROAD';  
            }
            elseif($record->Mode==4)
            {
                $mode='TRAIN';  
            }
            else
            {
              $mode='';  
            }
           
              
             
          $data_arr[] = array(
            "action" => '<a href="javascript:void(0)" onclick="viewVolume('.$record->id.','.$record->FromulaFor.')">View</a> | <a href="javascript:void(0)" onclick="EditVolume('.$record->id.','.$record->FromulaFor.')">Edit</a> | <a href="javascript:void(0)" onclick="deleteVolume('.$record->id.','.$record->FromulaFor.')">Delete</a>',
            "sr" => $i,
            "formulaFor" =>$DCat,
            "CustomerCode" =>$offCode,
            "CustomerName" =>$offname,
            "ModeType" => $mode,
            "Volumatric" => $record->Volumetric,
            "Measurment" => $record->Measurement,
            "DevideBy" => $record->DevideBy,
            "MultiplyBy" => $record->MultipleBy,
            
          );
       }
  
       $response = array(
          "draw" => intval($draw),
          "iTotalRecords" =>$count,
          "iTotalDisplayRecords" =>$count,
          "aaData" => $data_arr
       );
  
       echo json_encode($response);
       exit;
    }
}
