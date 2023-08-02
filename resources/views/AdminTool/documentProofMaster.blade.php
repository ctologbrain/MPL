@include('layouts.app')

<div class="generator-container allLists tally_dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        
                        <li class="breadcrumb-item active">DOCUMENT PROOF (KYC) MASTER</li>
                    </ol>
                </div>
                <h4 class="page-title">DOCUMENT PROOF (KYC) MASTER</h4>
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
                                    <div class="bdr-btm">
                                        <div class="row pl-pr">
                                            <div class="col-12 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="document_proof_name">Document Proof Name<span class="error">*</span></label>
                                                    <div class="col-md-4">
                                                     <input type="text" name="document_proof_name" class="form-control document_proof_name" id="document_proof_name" tabindex="1">
                                                    </div>
                                                </div>
                                            </div>
                                           

                                            <div class="col-12 text-center mt-1 mb-1">
                                                <input type="button" tabindex="2" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                                <input type="button" tabindex="3" value="Cancel" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                            </div>
                                            
                                           <hr>
                                          </div>


                                          <div class="row mt-1">
                                             <div class="col-12 text-end">
                                              <input type="button" tabindex="4" value="Export" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                            </div>
                                            <div class="col-12 mt-1">
                                              <div class="table-responsive a">
                                                <table class="table table-bordered">
                                                  <tr class="main-title">
                                                    <th class="p-1 text-center" style="min-width: 20px;">SL#</th>
                                                    <th class="p-1 text-center" style="min-width: 20px;">ACTION</th>
                                                    <th class="p-1 text-start" style="min-width: 670px;">Document Proof Name</th>
                                                     <th class="p-1 text-start" style="min-width: 50px;">Active</th>
                                                   
                                                  </tr>
                                                  <tr>
                                                    <td class="p-1 text-center">1</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">AADHAR CARD/PAN CARD</td>
                                                   
                                                    <td class="p-1 text-start">YES</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="p-1 text-center">2</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">COI</td>
                                                   
                                                    <td class="p-1 text-start">YES</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="p-1 text-center">3</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">GSTIN CERTIFICATE</td>
                                                   
                                                    <td class="p-1 text-start">YES</td>
                                                  </tr>
                                                   <tr>
                                                    <td class="p-1 text-center">4</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">PAN CARD OF COMPANY</td>
                                                   
                                                    <td class="p-1 text-start">YES</td>
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
            </div>
        </div>  
    </form>
</div>
<div class="generator-container allLists tally_data_status">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        
                        <li class="breadcrumb-item active">TALLY DATA STATUS</li>
                    </ol>
                </div>
                <h4 class="page-title">TALLY DATA STATUS</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="subForm">
    @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="bdr-btm mb-1">
                                        <div class="row">
                                            <div class="col-4 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="filter_type">Filter Type</label>
                                                    <div class="col-md-8">
                                                      <select class="form-control selectBox filter_type" id="filter_type" name="filter_type" tabindex="1" style="width: 100%;">
                                                        <option>--SELECT--</option>
                                                        <option>ALL</option>
                                                        <option>CREDIT SALE</option>
                                                        <option>PURCHASE</option>
                                                        <option>TOPAY-CASH SALE</option>
                                                        <option>TOPAY-CASH COLLECTION</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="data_status">Data Status</label>
                                                    <div class="col-md-8">
                                                      <select class="form-control selectBox data_status" id="data_status" name="data_status" tabindex="2" style="width: 100%;">
                                                        <option></option>
                                                        <option>SUCCESS</option>
                                                        <option>ERROR</option>
                                                        <option>VERIFIED BUT NOT PROCESSED</option>
                                                        <option>VERIFICATION PENDIN</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="form_date">From Date<span class="error"></span></label>
                                                    <div class="col-md-8">
                                                      <input type="text" class="form-control form_date datetimeone" name="form_date" id="form_date" tabindex="3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="to_date">To Date<span class="error"></span></label>
                                                    <div class="col-md-4">
                                                      <input type="text" class="form-control to_date datetimeone" name="form_date" id="to_date" tabindex="4">
                                                    </div>
                                                    <div class="col-2 text-end">
                                                        <input type="button" tabindex="4" value="Generate Report" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="tallY_status()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 m-b-1">
                                            </div>
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
             
