@include('layouts.app')
<style>
  .distance-border{
    border:1px solid #888888;
    margin: 5px;

  }
  .distance-border .bdr-btm{
    border-bottom: 1px solid #888888;
  }
  .table-bordered{
    border:1px solid #888888;
    margin-bottom: 0px;
  }
</style>
<div class="generator-container allLists tally_dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        
                        <li class="breadcrumb-item active">DISTANCE CALCULATOR</li>
                    </ol>
                </div>
                <h4 class="page-title">DISTANCE CALCULATOR</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="subForm">
    @csrf
        <div class="row pl-pr">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="distance-border row">
                                      <div class="col-12 bdr-btm">
                                        <div class="row">
                                            <div class="col-6 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="holiday_name">Search From</label>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                    <input type="radio" name="hub" class="hub" id="hub" tabindex="1" style="margin-right: 5px;"> HUB
                                                    </div>
                                                    <div class="col-md-3 d-flex align-items-center">
                                                    <input type="radio" name="pincode" class="pincode" id="pincode" tabindex="2" style="margin-right: 5px;"> PINCODE
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                      </div>   
                                      <div class="col-6 mt-1 mb-1">
                                        <div class="row">
                                          <div class="col-12">
                                            <div class="row">
                                              <div class="col-12 m-b-1">
                                                <div class="row">
                                                  <label class="col-md-2 col-form-label" for="hub_name">HUB Name</label>
                                                  <div class="col-md-5">
                                                   <input type="text" name="hub_name" class="form-control hub_name" id="hub_name" tabindex="3">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-12">
                                            <div class="row">
                                              <div class="col-12 m-b-1">
                                                <div class="row">
                                                  <label class="col-md-2 col-form-label" for="radius">Radius (KM)</label>
                                                  <div class="col-md-5">
                                                   <input type="text" name="radius" class="form-control radius" id="radius" tabindex="4">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                           

                                          <div class="col-12 text-center mb-1 mt-1 bdr-btm pb-1">
                                              <input type="button" tabindex="5" value="Process" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                              <input type="button" tabindex="6" value="Reset" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-6">
                                        <div class="table-responsive a">
                                          <table class="table table-bordered">
                                            <tr>
                                              <td class="p-1 text-start" style="width: 20%;">
                                                Address
                                              </td>
                                               <td class="p-1" style="width: 70%;">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td class="p-1 text-start" style="width: 20%;">
                                                Pincode
                                              </td>
                                               <td class="p-1" style="width: 70%;">
                                              </td>
                                            </tr>
                                            
                                            <tr>
                                              <td class="p-1 text-start" style="width: 20%;">
                                                City
                                              </td>
                                               <td class="p-1" style="width: 70%;">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td class="p-1 text-start" style="width: 20%;">
                                                State
                                              </td>
                                               <td class="p-1" style="width: 70%;">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td class="p-1 text-start" style="width: 20%;">
                                                Country
                                              </td>
                                               <td class="p-1" style="width: 70%;">
                                              </td>
                                            </tr>
                                             <tr>
                                              <td class="p-1 text-start" style="width: 20%;">
                                                Latitude
                                              </td>
                                               <td class="p-1" style="width: 70%;">
                                              </td>
                                            </tr>
                                             <tr>
                                              <td class="p-1 text-start" style="width: 20%;">
                                                Longitude
                                              </td>
                                               <td class="p-1" style="width: 70%;">
                                              </td>
                                            </tr>
                                          </table>
                                        </div>
                                      </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>  
    </form>
</div>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('.tally_data_status').hide();
   
    function tallY_status(){
        $('.tally_dashboard').hide();
        $('.tally_data_status').show();
    }



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
             
