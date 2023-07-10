<?php

namespace App\Http\Controllers\OfficeSetup;
use App\Http\Requests\StoreOfficeTypeMasterRequest;
use App\Http\Requests\UpdateOfficeTypeMasterRequest;
use App\Models\OfficeSetup\OfficeTypeMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class OfficeTypeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $keyword = $request->search;
            $officeType = OfficeTypeMaster::where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("office_type_masters.OfficeTypeCode" ,"like",'%'.$keyword.'%');
                    $query->orWhere("office_type_masters.OfficeTypeName",'like','%'.$keyword.'%');
                }
    })->orderBy('id')->paginate(10);
        if($request->Submit=="Download"){
            $officeType = OfficeTypeMaster::
                orderBy('id')->get();
            $this->DownloadOfficeType($officeType);
        }
          return view('offcieSetup.officeTypeList', [
              'officeType' => $officeType,
             'title'=>'OFFICE TYPE MASTER',
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
     * @param  \App\Http\Requests\StoreOfficeTypeMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeTypeMasterRequest $request)
    {
        $validated = $request->validated();
        $check= OfficeTypeMaster::where("OfficeTypeCode",$request->OfficeCode)->first();
      
        if(isset($request->BookingAllow) && $request->BookingAllow=='BookingAllow')
        {
         $Bokking='Yes';
        }
        else{
        $Bokking='No';  
        }
        if(isset($request->DeilveryCommission) && $request->DeilveryCommission=='DeilveryCommission')
        {
         $commison='Yes';
        }
        else{
         $commison='No';  
        }
        if(isset($request->OfficeId) && $request->OfficeId !='')
        {
            OfficeTypeMaster::where("id", $request->OfficeId)->update(['OfficeTypeCode' => $request->OfficeCode,'OfficeTypeName'=>$request->OfficeTypeName ,'AllowBookingCommission'=>$Bokking,'AllowDeliveryCommission'=>$commison,'Is_Active'=>$request->Active]);
              echo 'Edit Successfully';
        }
        else{
             if(empty($check)){
            OfficeTypeMaster::insert(
                ['OfficeTypeCode' => $request->OfficeCode,'OfficeTypeName'=>$request->OfficeTypeName ,'AllowBookingCommission'=>$Bokking,'AllowDeliveryCommission'=>$commison,'Is_Active'=>$request->Active]
            );
              echo 'Add Successfully';
              }
            else{
                echo 'false';
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
        $OfficeTypeMaster = OfficeTypeMaster::
        where('id',$request->OffcieTId)
       ->first();  
        echo json_encode($OfficeTypeMaster);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeTypeMaster $officeTypeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeTypeMasterRequest  $request
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeTypeMasterRequest $request, OfficeTypeMaster $officeTypeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeTypeMaster $officeTypeMaster)
    {
        //
    }

    public function DownloadOfficeType($officeType){
         $timestamp = date('Y-m-d');
          $filename = 'HeadWiseRegister' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                   <thead>
                <tr class="main-title text-dark">                                     
                 <th width="2%" style="min-width:20px;">SL#</th>
                  <th width="20%" style="min-width:130px;">Office Type Code</th>
                  <th width="20%" style="min-width:130px;">Office Type Name </th>
                  <th width="15%" style="min-width:130px;">Allow Book. Comm.</th>
                  <th width="15%" style="min-width:130px;">Allow Dlvd. Comm.</th>
                  <th style="min-width:130px;" class="p-1">Active</th></tr>
                 </thead> <tbody>';    
                   $i=1;    
                   foreach ($officeType as $key ) 
                   {
                    echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.$key->OfficeTypeCode.'</td>';
                      echo   '<td>'.$key->OfficeTypeName.'</td>';
                      echo   '<td>'.$key->AllowBookingCommission.'</td>';
                    echo   '<td>'.$key->AllowDeliveryCommission.'</td>';
                    echo   '<td>'.$key->Is_Active.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
    }
}
