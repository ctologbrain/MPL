@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">COD DEPOSIT</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="subForm">
    @csrf
        <div class="row pl-pr mt-1">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="bdr-btm mb-1">
                                        <div class="row">
                                            <div class="col-5 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="customer_name">Customer Name<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="customer_name" tabindex="1" class="form-control customer_name" id="customer_name" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="payment_date">Payment Date</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="payment_date" tabindex="2" class="form-control payment_date datetimeone" id="payment_dates" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="payment_mode">Payment Mode</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control selectBox payment_mode" id="payment_mode" name="payment_mode" tabindex="3">
                                                            <option value="1">--SELECT--</option>
                                                            <option value="1">BANK</option>
                                                            <option value="1">CASH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 m-b-1">
                                               <div class="row">
                                                    <label class="col-md-4 col-form-label" for="amount">Amount</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="amount" tabindex="4" class="form-control amount" id="amount" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5  m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="bank_name">Bank Name</label>
                                                    <div class="col-md-8">
                                                         <input type="text" name="bank_name" tabindex="5" class="form-control bank_name" id="bank_name" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 m-b-1">
                                            </div>
                                            <div class="col-5 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="utr_no">Cheque/UTR No</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="utr_no" tabindex="6" class="form-control utr_no" id="utr_no" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 m-b-1">
                                               <div class="row">
                                                    <label class="col-md-4 col-form-label" for="utr_date">Cheque/UTR Dates</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="utr_date" tabindex="7" class="form-control utr_date datetimeone" id="utr_date" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="remarks">Remarks</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control remarks" id="remarks" name="remarks" tabindex="8"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table-responsive table-bordered">
                    <thead>                     
                         <tr class="main-title text-dark">
                            <th class="p-1">Docket Number<span class="error">*</span></th>
                            <th class="p-1">Deposit Amount<span class="error">*</span></th>
                            <th class="p-1">COD Amount</th>
                            <th class="p-1">Deposited Amount</th>
                            <th class="p-1">Balance Amount</th>
                            <th class="p-1"></th>
                        </tr>          
                    </thead> 
                    <tbody>
                        <tr>
                            <td class="p-1">
                                <input type="text" name="docket_no" tabindex="9" class="form-control docket_no" id="docket_no" onchange="">
                            </td>
                            <td class="p-1">
                                <input type="text" name="deposit_amount" tabindex="10" class="form-control deposit_amount" id="deposit_amount" onchange="">
                            </td>
                            <td class="p-1"></td>
                            <td class="p-1"></td>
                            <td class="p-1"></td>
                            <td class="p-1">
                                <div class="row mt-1">
                                    <div class="col-md-12 text-start">
                                        <input type="button" tabindex="4" value="Add" class="btn btn-primary btnSubmit" id="btnSubmit"
                                            onclick="">
                                        <a href="" tabindex="5" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                           <td class="p-1" colspan="6"> 
                            <div class="row mt-1">
                                    <div class="col-md-2">
                                        <input type="button" tabindex="4" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit"
                                            onclick="">
                                        <a href="" tabindex="5" class="btn btn-primary">Reset All</a>
                                    </div>
                                    <div class="col-md-2 green-color fw-bold">
                                        Total Deposit Amount:
                                    </div>
                                     <div class="col-md-2 buee-color fw-bold">
                                        Balance Amount:
                                    </div>
                                </div>
                           </td>
                        </tr>
                    </tbody>
                </table>    
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
             
    