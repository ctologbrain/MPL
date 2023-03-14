@include('layouts.appTwo')
<style>
label {
    font-size: 8.5pt !important;
    font-weight: 900;
    color: #444040
}
.consignorSelection
{
    display:none !important;
}
body{
    min-height: 788px !important;
}
.allLists{
    box-shadow: 0 0px 5px rgba(0, 0, 0, 0.5);
}
.generator-container .form-control{
    margin-bottom: 0px;
}
.generator-container .mt-1{
    margin-top: 10px;
}
.generator-container .total-text{
    margin-top: -12px;
}
.pppp
{
    display:none !important;
}
</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">Gate Pass</li>
                    </ol>
                </div>
                <h4 class="page-title">Gate Pass</h4>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                     <div class="col-6">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="option">option<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                   
                                                   <input type="radio" name="with_fpm" tabindex="1"
                                                        class="with_fpm" id="with_fpm" value="1" onclick="gitFcmNumber(this.value)" checked> With FPM
                                                        <input type="radio" name="with_fpm" tabindex="1"
                                                        class="with_fpm" id="with_fpm" value="2" onclick="gitFcmNumber(this.value)"> Without FPM
                                                <input type="hidden" name="id" tabindex="4"
                                                class="form-control id" id="id" value="" readonly>
                                                </div>
                                               
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="fpm_number">FPM NUMBER</label>
                                                <div class="col-md-8">
                                                    <select name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number selectBox" id="fpm_number" onchange="GetFcmDetails(this.value)">
                                                       <option value=""></option>
                                                       @foreach($fcm as $fpmNumber) 
                                                       <option value="{{$fpmNumber->id}}">{{$fpmNumber->FPMNo}}</option> 
                                                       @endforeach
                                                     </select>   
                                                       
                                                </div>
                                              
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="fpm_date">Type</label>
                                            <div class="col-md-8">
                                                 <select name="type" tabindex="4"
                                                    class="form-control selectBox type" id="type">
                                                    <option value="">--select--</option>
                                                    <option selected="selected" value="PTL">PTL</option>
                                                    <option value="FTL">FTL</option>
                                                    <option value="LOCAL">LOCAL</option>
                                                 </select>
                                           </div>
                                         </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="fpm_date">GP TimeStamp<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="GP_Time_Stamp" tabindex="3" class="form-control GP_Time_Stamp datetimeone" id="GP_Time_Stamp">
                                           </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="fpm_date">Placement TimeStamp<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                 <input type="text" name="PlacementTimeStamp" tabindex="3"
                                                        class="form-control PlacementTimeStamp datetimeTwo" id="PlacementTimeStamp">
                                                
                                        </div>
                                            
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="route">Route<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                               
                                               <select name="route" tabindex="3"
                                                    class="form-control selectBox route" id="route"  onchange="getSourceAndDest(this.value)">
                                                    <option value="">--select--</option>
                                                     @foreach($route as $routeS)
                                                    <option value="{{$routeS->id}}">{{$routeS->SourceCity}}@if($routeS->TouchPointCity){{'-'.$routeS->TouchPointCity}}@endif-{{$routeS->DestCity}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="origin">Origin<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                                <input type="text" name="origin" tabindex="4"
                                                    class="form-control origin" id="origin" onchange="">

                                                  </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="destination">Destination<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                                <input type="text" name="destination" tabindex="5"
                                                    class="form-control destination" id="destination" onchange="">

                                                  </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vendor_name">Vendor Name</label>
                                            <div class="col-8">
                                            <select name="vendor_name" tabindex="7"
                                                    class="form-control vendor_name selectBox" id="vendor_name">
                                                        <option value="">--select--</option>
                                                        @foreach($VendorMaster as $vmaster)
                                                        <option value="{{$vmaster->id}}">{{$vmaster->VendorCode}} ~ {{$vmaster->VendorName}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vehicle_name">Vehicle Name<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                               
                                               <select name="vehicle_name" tabindex="6"
                                                    class="form-control selectBox vehicle_name" id="vehicle_name">
                                                    <option value="">--select--</option>
                                                   @foreach($VehicleMaster as $vehicle)
                                                    <option value="{{$vehicle->id}}">{{$vehicle->VehicleNo}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vehicle_model">Vehicle Model</label>
                                            <div class="col-md-8">
                                                 <select name="vehicle_model" tabindex="9"
                                                    class="form-control selectBox vehicle_model" id="vehicle_model">
                                                    <option value="">--select--</option>
                                                    @foreach($VehicleType as $Vtype)
                                                    <option value="{{$Vtype->id}}">{{$Vtype->VehicleType}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="driver_name">Driver Name</label>
                                            <div class="col-md-8">
                                            <select name="driver_name" tabindex="8"
                                                    class="form-control driver_name selectBox" id="driver_name">
                                                <option value="">--select--</option>
                                                @foreach($DriverMaster as $driver)
                                                <option value="{{$driver->id}}">{{$driver->DriverName}} ~ {{$driver->License}}</option>
                                                @endforeach
                                            </select>

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="mob_no">Mobile No</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="mob_no" tabindex="8"
                                                    class="form-control mob_no" id="mob_no"> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="dev_id">Device Id</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="dev_id" tabindex="8"
                                                    class="form-control dev_id" id="dev_id"> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="sprvisor_name">Supervisor Name</label>
                                            <div class="col-md-8">
                                                <input type="text"  name="sprvisor_name" tabindex="8"
                                                    class="form-control sprvisor_name" id="sprvisor_name"> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="seal_number">Seal Number</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="seal_number" tabindex="8"
                                                    class="form-control seal_number" id="seal_number"> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="remark">Remark<span class="error">*</span></label>
                                            <div class="col-md-8">
                                                <Textarea class="form-control remark"
                                                    placeholder="Remark"  tabindex="14"  name="remark" id="remark"></Textarea>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="col-6">
                                        <div class="row">
                                            
                                            <label class="col-md-4 col-form-label" for="vehicle_teriff">Vehicle Teriff<span class="error">*</span></label>
                                            <div class="col-md-8">
                                              <input type="number" step="0.1" name="vehicle_teriff" tabindex="8"
                                                    class="form-control vehicle_teriff" id="vehicle_teriff">   
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 mt-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="start_km">Start Km<span class="error">*</span></label>
                                                <div class="col-md-3">
                                                  <input type="number" step="0.1" name="start_km" tabindex="8"
                                                        class="form-control start_km" id="start_km">   
                                                </div>
                                                 <label class="col-md-2 col-form-label" for="adv_driver">Adv. to Driver<span class="error">*</span></label>
                                                <div class="col-md-3">
                                                  <input type="number" step="0.1" name="adv_driver" tabindex="8"
                                                        class="form-control adv_driver" id="adv_driver">   
                                                </div>
                                               
                                            </div>
                                        </div>
                                    
                                    
                                   
                                   
                                   <div class="col-6 total-text">
                                        <div class="row">
                                           <div class="col-6">
                                                <h4>Gate Pass:<span class="gatepassNo"></span></h4>
                                            </div>
                                            <div class="col-6 text-end">
                                            <input type="button" value="Generate Gate Pass" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="genrateGatePass()">
                                               
                                              
                                            </div>
                                            
                                        </div>
                                    </div>
                                  
                                   
                                   

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>
                <div class="col-xl-12">
                  <table class="table-responsive table-bordered">
                    <thead>
                        <tr class="main-title text-dark">
                            <th class="p-1 td1">Destination Office</th>
                            <th class="p-1 td2">Docket No<span class="error">*</span></th>
                            <th class="p-1 td3">A Pieces</th>
                            <th class="p-1 td4">A Weight</th>
                            <th class="p-1 td5">P Pieces</th>
                            <th class="p-1 td6">P Weight</th>
                            <th class="p-1 td7"></th>
                            <th class="p-1 td8"></th>

                        </tr>
                         </thead> 
                         <tbody>
                        <tr>
                            <td class="p-1"> 
                                <select name="destination_office" tabindex="30" class="form-control destination_office" id="destination_office">
                               <option value="1"></option>
                               @foreach($offcie as $offcieList)
                               <option value="{{$offcieList->id}}">{{$offcieList->OfficeCode}} ~ {{$offcieList->OfficeName}}</option>
                               @endforeach
                           
                        </select> </td>
                            <td class="p-1"><input type="text" name="Docket" tabindex="6"
                                                    class="form-control Docket" id="Docket" onchange="getDocketDetails(this.value)">   </td>
                            <td class="p-1"><input type="text" step="0.1" name="pieces" tabindex="8"
                                                    class="form-control displayPices" id="displayPices" readonly> 
                                                    <input type="hidden" step="0.1" name="pieces" tabindex="8"
                                                    class="form-control pieces" id="pieces" readonly>     
                                </td>

                            <td class="p-1"><input type="text" step="0.1" name="weight" tabindex="8"
                                                    class="form-control displayWeight" id="displayWeight" readonly>
                                                    <input type="hidden" step="0.1" name="weight" tabindex="8"
                                                    class="form-control weight" id="weight" readonly>
                                                
                                                </td>
                            <td class="p-1"><span id="partpices"></span></td>
                            <td class="p-1"><span id="partWidth"></span></td>
                            <td class="p-1">
                              
                                <input type="button" value="save" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveGatePassOrDocket()">
                            </td>
                            <td class="p-1 td8">
                                
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="fpm_number">Gatepass No.:<span
                                                        class="error">*</span></label>
                                                <div class="col-md-5">
                                                   
                                                   <input type="text" name="gate_pass_number" tabindex="3"
                                                        class="form-control gate_pass_number" id="gate_pass_number">
                                                       
                                                </div>
                                                <div class="col-md-2">
                                                    <input id="print" type="button" class="btn btn-primary" value="print" onclick="printgatePass()" >
                                                </div>
                                             </div>
                                   
                            </td>
                        </tr>
                        <tr class="main-title" id="hidden">
                            <td colspan="8" class="p-1 text-center text-dark">Record Not Available...</td>
                        </tr>
                        </tbody>
                         
                  </table> 
                  <div class="tabelData"></div>
              </div> 
           </div>     
        </div>
    </div>
</form>
</div>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   
    $('select').select2();
    $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    function gitFcmNumber(value)
    {
     
     if(value==1)
      { 
        $('.fpm_number').attr('disabled', false);
      }
     else{
       
         $('.fpm_number').attr('disabled', true);
     }
    }
    function GetFcmDetails(Fpm)
    {
        var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getFcmDetails',
       cache: false,
       data: {
           'Fpm':Fpm
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.route').val(obj.Route_Id).trigger('change');
        $('.vendor_name').val(obj.Vehicle_Provider).trigger('change');
        $('.vehicle_name').val(obj.Vehicle_No).trigger('change');
        $('.vehicle_model').val(obj.Vehicle_Model).trigger('change');
        $('.driver_name').val(obj.Driver_Id).trigger('change');
     
       }
     });
    }
    function getSourceAndDest(routeId)
    {
        var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getSourceAndDest',
       cache: false,
       data: {
           'routeId':routeId
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
          $('.origin').val(obj.statrt_point_details.CityName);
          $('.origin').attr('readonly', true);
          $('.destination').val(obj.end_point_details.CityName);
          $('.destination').attr('readonly', true);
    //       $.ajax({
    //      type: 'POST',
    //      headers: {
    //      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    //    },
    //    url: base_url + '/getOffcieByCity',
    //    cache: false,
    //    data: {
    //        'EndPoint':obj.Destination
    //    }, 
    //    success: function(data) {
    //     const obj = JSON.parse(data);
         
         
    //    }
    //  });
       }
     });
    }
    function getDocketDetails(Docket,BranchId)
{
    var base_url = '{{url('')}}';
    var BranchId = $('.destination_office').val();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketIsBooked',
       cache: false,
       data: {
           'Docket':Docket,'BranchId':BranchId
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message)
            $('.Docket').val('');
            $('.Docket').focus();
            $('.pieces').val('');
            $('.weight').val('');
            $('.displayPices').val('');
            $('.displayWeight').val('');
            $('#partpices').text('');
            $('#partWidth').text('');
            return false;
        }
        else{
            $('.pieces').val(obj.partQty);
            $('.weight').val(obj.partWeight);
            $('.displayPices').val(obj.qty);
            $('.displayWeight').val(obj.ActualW);
            $('#partpices').text(obj.partQty);
            $('#partWidth').text(obj.partWeight);
            
           
        }

       }
     });
}
function genrateGatePass()
{
    if($('#GP_Time_Stamp').val()=='')
    {
        alert('Please Enter gatePass Time');
        return false;
    }
    if($('#PlacementTimeStamp').val()=='')
    {
        alert('Please Enter Placement Time');
        return false;
    }
    if($('#route').val()=='')
    {
        alert('Please Select Route');
        return false;
    }
    if($('#vendor_name').val()=='')
    {
        alert('Please Selelct Vendor Name');
        return false;
    }
    if($('#vehicle_name').val()=='')
    {
        alert('Please Selelct Vehicle Name');
        return false;
    }
    if($('#vehicle_model').val()=='')
    {
        alert('Please Selelct Vehicle Model');
        return false;
    }
    if($('#sprvisor_name').val()=='')
    {
        alert('Please Enter Sprvisor Name');
        return false;
    }
    
    var with_fpm = $("input[name=with_fpm]:checked").val();
    var GP_Time_Stamp=$('#GP_Time_Stamp').val();
    var fpm_number=$('#fpm_number').val();
    var PlacementTimeStamp=$('#PlacementTimeStamp').val();
    var route=$('#route').val();
    var type=$('#type').val();
    var vendor_name=$('#vendor_name').val();
    var vehicle_name=$('#vehicle_name').val();
    var vehicle_model=$('#vehicle_model').val();
    var driver_name=$('#driver_name').val();
    var mob_no=$('#mob_no').val();
    var dev_id=$('#dev_id').val();
    var sprvisor_name=$('#sprvisor_name').val();
    var seal_number=$('#seal_number').val();
    var remark=$('#remark').val();
    var start_km=$('#start_km').val();
    var vehicle_teriff=$('#vehicle_teriff').val();
    var adv_driver=$('#adv_driver').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitVehicleGatePass',
       cache: false,
       data: {
           'with_fpm':with_fpm,'GP_Time_Stamp':GP_Time_Stamp,'PlacementTimeStamp':PlacementTimeStamp,'route':route,'vendor_name':vendor_name,'vehicle_name':vehicle_name,'vehicle_model':vehicle_model,'driver_name':driver_name,'mob_no':mob_no,'dev_id':dev_id,'sprvisor_name':sprvisor_name,'remark':remark,'start_km':start_km,'vehicle_teriff':vehicle_teriff,'adv_driver':adv_driver,'type':type,'seal_number':seal_number,'fpm_number':fpm_number
       },
       success: function(data) {
        $(".btnSubmit").attr("disabled", true);
        const obj = JSON.parse(data);
        $('.gatepassNo').text(' '+obj.gatepass);
        $('.gate_pass_number').val(obj.gatepass);
        $('.id').val(obj.id);
       }
     });

}
function SaveGatePassOrDocket()
{
    if($('#id').val()=='')
    {
       alert('Please Genrate Gatepass number first');
       return false; 
    }
    if($('#destination_office').val()=='')
    {
       alert('Please Enter destination office');
       return false; 
    }
    if($('#Docket').val()=='')
    {
       alert('Please Enter Docket');
       return false; 
    }
    var id=$('#id').val();
    var Docket=$('#Docket').val();
    var destination_office=$('#destination_office').val();
    var pieces=$('#pieces').val();
    var weight=$('#weight').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GatePassWithDocket',
       cache: false,
       data: {
           'id':id,'Docket':Docket,'destination_office':destination_office,'pieces':pieces,'weight':weight
       },
       success: function(data) {
        $('.Docket').val('');
        $('.pieces').val('');
        $('.weight').val('');
        $('.displayPices').val('');
        $('.displayWeight').val('');
        $('#partpices').text('');
        $('#partWidth').text('');
        $('.Docket').focus();
        $('.tabelData').html(data);
        $('#hidden').addClass('pppp');
       }
     });
}
function printgatePass()
{
    if($('#gate_pass_number').val()=='')
    {
        alert('Please Enter GatePass Number');
        return false;
    }
    var base_url = '{{url('')}}';
    var gatePass=$('#gate_pass_number').val();
    location.href = base_url+"/print_gate_Number/"+gatePass;
  
}
    </script>
             
    