<?php

namespace App\Http\Controllers\OfficeSetup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficeMasterRequest;
use App\Http\Requests\UpdateOfficeMasterRequest;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\OfficeTypeMaster;
use App\Models\OfficeSetup\state;
use App\Models\OfficeSetup\city;
use Illuminate\Http\Request;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\KycOffice;
use Auth;
class OfficeMasterController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $officeType=OfficeTypeMaster::get();
      $keyword= $request->search;
        $office=OfficeMaster::select('id','OfficeCode','OfficeName')->get();
            $officeDetails = OfficeMaster::with('StatesDetails')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("office_masters.OfficeCode" ,"like",'%'.$keyword.'%');
                    $query->orWhere("office_masters.OfficeName",'like','%'.$keyword.'%');
                }
            })
            ->orderBy('id')->paginate(10);
       

         if($request->Submit=="Download"){
            $office = OfficeMaster::
                orderBy('id')->get();
            $this->DownloadOfficeMaster($office);
         }
      
         $State=state::get();
         return view('offcieSetup.officeList',[
          'title'=>'OFFICE MASTER',
          'offcieType'=>$officeType,
          'office'=>$office,
          'officeDetails'=>$officeDetails,
          'State'=>$State,
         
       ]);
    }
    public function getPinCode(Request $request)
    {
        $Pincode=PincodeMaster::where('city',$request->CityId)->get();
       
        $html='';
        foreach($Pincode as $Pincodes)
        {
            if(isset($request->pincode) && $request->pincode==$Pincodes->id)
            {
                $html.='<option value="'.$Pincodes->id.'" selected>'.$Pincodes->PinCode.'</option>';  
            }
            else{
                $html.='<option value="'.$Pincodes->id.'">'.$Pincodes->PinCode.'</option>';  
            }
             
        }
        echo $html;
    }
    public function getCity(Request $request)
    {
        $city=city::where('stateId',$request->stateid)->get();
        $html='';
        $html.='<option value="">--select--</option>';
        foreach($city as $cities)
        {
            if(isset($request->city) && $cities->id==$request->city)
            {
            $html.='<option value="'.$cities->id.'" selected>'.$cities->CityName.'</option>'; 
            }  
            else{
            $html.='<option value="'.$cities->id.'">'.$cities->CityName.'</option>'; 
            }
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
     * @param  \App\Http\Requests\StoreOfficeMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeMasterRequest $request)
    {
        $validated = $request->validated();
         $check= OfficeMaster::where("OfficeCode",$request->OfficeCode)->first();
      
        if(isset($request->Officeid) && $request->Officeid !='')
        {
            OfficeMaster::where("id", $request->Officeid)->update(['OfficeType' => $request->OffcieType,'ParentOffice'=>$request->ParentOffice,'GSTNo'=>$request->GSTNo,'OfficeCode'=>$request->OfficeCode,'OfficeName'=>$request->OfficeName,'ContactPerson'=>$request->ContactPerson,'OfficeAddress'=>$request->OfficeAddress,'State_id'=>$request->State,'City_id'=>$request->City,'Pincode'=>$request->Pincode,'MobileNo'=>$request->MobileNo,'PhoneNo'=>$request->PhoneNo,'PersonalNo'=>$request->PersonalNo,'EmailID'=>$request->EmailID]);
            echo 'Edit Successfully';
        }
        else
        {
             if(empty($check)){
            OfficeMaster::insert(
                ['OfficeType' => $request->OffcieType,'ParentOffice'=>$request->ParentOffice,'GSTNo'=>$request->GSTNo,'OfficeCode'=>$request->OfficeCode,'OfficeName'=>$request->OfficeName,'ContactPerson'=>$request->ContactPerson,'OfficeAddress'=>$request->OfficeAddress,'State_id'=>$request->State,'City_id'=>$request->City,'Pincode'=>$request->Pincode,'MobileNo'=>$request->MobileNo,'PhoneNo'=>$request->PhoneNo,'PersonalNo'=>$request->PersonalNo,'EmailID'=>$request->EmailID ]
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
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $officeDetails=OfficeMaster::with('StatesDetails','OfficeTypeMasterDetails','OfficeMasterParent','StatesDetails','CityDetails')->where('id',$request->officeId)->first();
        echo json_encode($officeDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeMaster $officeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeMasterRequest  $request
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeMasterRequest $request, OfficeMaster $officeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeMaster $officeMaster)
    {
        //
    }

    public function DownloadOfficeMaster($office){
         $timestamp = date('Y-m-d');
          $filename = 'HeadWiseRegister' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                   <thead>
                <tr class="main-title text-dark">                                     
                  <th style="min-width:20px;">SL#</th>
                            <th style="min-width:190px;">Office Type</th>
                            <th style="min-width:130px;">Parent Office</th>
                            <th style="min-width:130px;">Office Code</th>
                            <th style="min-width:130px;">Office Name    </th>
                            <th style="min-width:130px;">GST No</th>
                            <th style="min-width:150px;">Contact Person</th>
                            <th style="min-width:130px;">Office Address</th>
                            <th style="min-width:130px;">State Name</th>
                            <th style="min-width:130px;">City</th>
                            <th style="min-width:130px;">Phone No</th>
                            <th style="min-width:130px;">Personal No</th>
                            <th style="min-width:130px;">Email ID</th></tr>
                 </thead> <tbody>';    
                   $i=1;    
                   foreach ($office as $key ) 
                   {
                    if(isset($key->OfficeTypeMasterDetails->OfficeTypeCode)){
                        $offType= $key->OfficeTypeMasterDetails->OfficeTypeName;
                        $offCode=$key->OfficeTypeMasterDetails->OfficeTypeCode;
                    }
                    else{
                         $offType= '';
                            $offCode= '';
                    }
                    if(isset($key->OfficeMasterParent->OfficeCode)){
                        $offN= $key->OfficeMasterParent->OfficeName;
                        $offcode=$key->OfficeMasterParent->OfficeCode;
                    }
                    else{
                        $offN='';
                        $offcode='';
                    }
                    echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.$offType.'~'. $offCode.'</td>';
                       echo   '<td>'.$offN.'~'.$offcode.'</td>';

                      echo   '<td>'.$key->OfficeCode.'</td>';
                      echo   '<td>'.$key->OfficeName.'</td>';
                      echo   '<td>'.$key->GSTNo.'</td>';
                    echo   '<td>'.$key->ContactPerson.'</td>';
                      echo   '<td>'.$key->OfficeAddress.'</td>';
                      echo   '<td>'.$key->StatesDetails->name.'</td>';
                      echo   '<td>'.$key->CityDetails->CityName.'</td>';
                    echo   '<td>'.$key->PhoneNo.'</td>';
                        echo   '<td>'.$key->PersonalNo.'</td>';
                         echo   '<td>'.$key->EmailID.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
    }

    public function KycOfficeView(){
        $office=OfficeMaster::select('id','OfficeCode','OfficeName')->get();
         return view('offcieSetup.kycMasterOffice',[
          'title'=>'KYC MASTER OFFICE',
          'office'=>$office]);
    }


    public function KycOfficePost(Request $request){
      $file=  $request->file('file');
       //  KycVendor
            $file->getClientOriginalName();
             $destinationPath = public_path('/KycOffice');
            $file->move($destinationPath,date("YmdHis").$file->getClientOriginalName());
            $link= "public/KycOffice/".date("YmdHis").$file->getClientOriginalName();
       $UserId= Auth::id();
       KycOffice::insert(['office_id' => $request->office_name, 'document_name' => $request->document_name , 'document_no' => $request->document_no, 'date_of_issue' => $request->date_of_issue,'date_of_expiry' => $request->date_of_expiry,'file' => $link,'Created_By'=>$UserId]);
        echo 'Add Successfully';
    }
}
