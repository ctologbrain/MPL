@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   <input type="checkbox" name="archive_data" class="archive_data" id="archive_data"> From Archive Data
                </div>
                <h4 class="page-title">DASHBOARD NDR REPORT</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
   
     
<div class="row">
        <div class="col-xl-12">
            <div class="card missing-gatepass">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                       
                                        
                                        <div class="col-md-12">
                                            <div class="gatepass-details row">
                                              <div class="col-6">
                                                <div class="row pl-pr">
                                                
                                                <div class="col-3">
                                                  <button type="button" class="btn btn-primary" tabindex="2">Total Record: {{$NdrReport->total()}}</button>
                                                </div>
                                                </div>
                                              </div>
                                                <div class="col-6 text-end">
                                                     <input type="button" tabindex="3" value="Cancel" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="genrateNO()">
                                                    <a href="{{url('/UnUsedEwayDashboard?submit=Download')}}" tabindex="4"  class="btn btn-primary btnSubmit" id="btnSubmit">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive a">
                                                <table class="table table-bordered table-centered mb-1 mt-1">
                                                        <thead>
                                                            <tr class="main-title text-dark">
                                                            
                                                                <th class="p-1">SL#</th>
                                                                <th class="p-1 text-start" style="min-width: 100px;">Docket No.</th>
                                                                <th class="p-1 text-start" style="min-width: 100px;">NDR Date</th>
                                                                <th class="p-1 text-start " style="min-width: 150px;">NDR Reason</th>
                                                                <th class="p-1 text-start" style="min-width: 150px;">NDR  remarks</th>
                                                                <th class="p-1 text-start" style="min-width: 150px;">Booking Branch</th>
                                                            </tr>
                                                        </thead> 
                                                        <tbody>
                                                        <?php $i=0; 
                                                            $page=request()->get('page');
                                                            if(isset($page) && $page>1){
                                                                $page =$page-1;
                                                            $i = intval($page*10);
                                                            }
                                                            else{
                                                            $i=0;
                                                            }
                                                            ?>
                                                        @foreach($NdrReport as $key)
                                                        <?php 
                                                        $i++; ?>
                                                           <tr>
                                                               
                                                                <td class="p-1">{{$i}}</td>
                                                                <td class="p-1 text-end"> @isset($key->DocketMasterDet->Docket_No) <a href="{{url('/docketTracking?docket=').$key->DocketMasterDet->Docket_No}}">{{$key->DocketMasterDet->Docket_No}}</a> @endisset </td>
                                                                <td class="p-1 text-start"> @if(isset($key->DocketMasterDet->DrsTransDeliveryDetails->Time) && $key->DocketMasterDet->DrsTransDeliveryDetails->Type=='NDR')
                                                                {{date("d-m-Y",strtotime($key->DocketMasterDet->DrsTransDeliveryDetails->Time))}}
                                                                @elseif(isset($key->NDR_Date))
                                                                {{date("d-m-Y",strtotime($key->NDR_Date))}} @endif</td>
                                                                <td class="p-1 text-start">@if(isset($key->DocketMasterDet->DrsTransDeliveryDetails->NdrReason) && $key->DocketMasterDet->DrsTransDeliveryDetails->Type=='NDR')
                                                                {{$key->DocketMasterDet->DrsTransDeliveryDetails->DRSReasonDet->ReasonCode}} ~  {{$key->DocketMasterDet->DrsTransDeliveryDetails->DRSReasonDet->ReasonDetail}}
                                                                 @elseif(isset($key->NDrMasterDetails->ReasonDetail)) {{$key->NDrMasterDetails->ReasonCode}} ~  {{$key->NDrMasterDetails->ReasonDetail}}  @endif</td>
                                                                <td class="p-1 text-start">@if(isset($key->DocketMasterDet->DrsTransDeliveryDetails->Ndr_remark) && $key->DocketMasterDet->DrsTransDeliveryDetails->Type=='NDR')
                                                                {{$key->DocketMasterDet->DrsTransDeliveryDetails->Ndr_remark}}
                                                                 @elseif(isset($key->Remark)) {{$key->Remark}} @endif</td>
                                                                <td class="p-1 text-start">@if(isset($key->DocketMasterDet->offcieDetails->OfficeCode)) {{$key->DocketMasterDet->offcieDetails->OfficeCode}} ~{{$key->DocketMasterDet->offcieDetails->OfficeName}}  @endif</td>
                                                             
                                                            </tr>
                                                            @endforeach     
                                                                 </tbody>
                                                             
                                                </table> 
                                            </div>
                                         </div>
                                         <div class="col-md-12">
                                            <div class="d-flex d-flex justify-content-between">
                                            {!! $NdrReport->appends(Request::all())->links() !!}

                                            </div>
                                         </div>
                                    </div>
                                    
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
                 <div class="tab-content">
                    <div class="tab-pane show active" id="input-types-preview">
                        <div class="row tabels">
                        </div>
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
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
             
