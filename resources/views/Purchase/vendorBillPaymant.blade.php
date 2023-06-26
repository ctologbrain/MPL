@include('layouts.appfour')

<div class="generator-container allLists">
<div class="row">
<div class="col-12">
<div class="page-title-box main-title">
<div class="page-title-right">
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
<li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
<li class="breadcrumb-item active">VENDOR BILL PAYMENT</li>
</ol>
</div>
<h4 class="page-title">VENDOR BILL PAYMENT</h4>
<div class="text-start fw-bold blue_color">
FIELDS WITH (*) MARK ARE MANDATORY.
</div>
</div>
</div>
</div>
<form method="POST"  id="subForm" action="{{'SubmitVendorMoneyRecept'}}">
@csrf
<div class="row pl-pr mt-1">
<div class="col-xl-12">
<div class="card customer_oda_rate">
<div class="card-body">
<div id="basicwizard">
<div class="tab-content b-0 mb-0">
<div class="tab-pane active show" id="basictab1" role="tabpanel">
<div class="row">
<div class="col-9">
<div class="row">
<label class="col-md-2 col-form-label mt-1" for="vendor_name">Vendor Name<span class="error">*</span></label>
<div class="col-md-5 mt-1">
<select tabindex="1" class="form-control vendor_name selectBox" name="vendor_name" id="vendor_name">
<option value="">Select</option>
@foreach($vendor as $vendorDet)
<option value="{{$vendorDet->id}}">{{$vendorDet->VendorCode}}~{{$vendorDet->VendorName}}</option>
@endforeach
</select>
</div>
</div>
</div>
<div class="col-9 pb-1">
<div class="row">
<label class="col-md-2 col-form-label" for="payment_type">Payment Type</label>
<div class="col-md-4">
<select class="form-control payment_type selectBox" id="payment_type" name="payment_type" tabindex="2">
<option value="">-Select-</option>   
<option value="1" selected>NEW</option>
<option value="2">ADVANCE ADJUSTMENT</option>
</select>
</div> 
</div>
</div>
<hr> 
<div class="col-9 mt-1">
<div class="row">
<label class="col-md-2 col-form-label" for="payment_mode">Payment Mode</label>
<div class="col-md-2">
<select class="form-control payment_mode selectBox" id="payment_mode" name="payment_mode" tabindex="3">
<option value="">-Select-</option>     
<option value="1">BANK</option>
<option value="2">CASH</option>
</select>
</div>
<label class="col-md-2 col-form-label text-end" for="amnt"> Amount</label>
<div class="col-md-2">
<input type="text" name="amnt" class="amnt form-control" id="amnt" tabindex="4">
</div>
<label class="col-md-2 col-form-label text-end" for="payment_date">Payment Date
</label>
<div class="col-md-2">
<input type="text" name="payment_date" class="payment_date form-control datepickerOne" id="payment_date" tabindex="5">
</div>
</div>
</div>
<div class="col-9">
<div class="row">
<label class="col-md-2 col-form-label" for="bank_name">Bank Name</label>
<div class="col-md-2 mt-1 ">
 <select name="bank_name" class="bank_name form-control" id="bank_name" tabindex="6" onchange="getAccountNo(this.value)">
   <option value="">-Select-</option>
   @foreach($bank as $bankDetails)
   <option value="{{$bankDetails->id}}">{{$bankDetails->BankName}}</option>
   @endforeach  
 </select>   
</div>
<label class="col-md-2 col-form-label text-end" for="acct_no">Account Number</label>
<div class="col-md-2">
<input type="text" name="acct_no" class="acct_no form-control" id="acct_no" tabindex="7">
</div>
</div>
</div>
<div class="col-9 mb-1">
<div class="row">
<label class="col-md-2 col-form-label mt-1" for="cheque_no">Cheque No</label>
<div class="col-md-2 mt-1">
<input type="text" name="utr_no" class="cheque_no form-control" id="cheque_no" tabindex="8">
</div>
<label class="col-md-2 col-form-label text-end" for="cheque_date">Cheque Date</label>
<div class="col-md-2">
<input type="text" name="cheque_date" class="cheque_date form-control datepickerOne" id="cheque_date" tabindex="9">
</div>
</div>
</div>
<hr>
<div class="col-12 text-center mb-1 mt-1">
<input type="button" tabindex="10" value="Process"
class="btn btn-primary btnSubmit" id="btnSubmit"
onclick="getVendorInvoiceDetails()">
<a href="" tabindex="11"
class="btn btn-primary">Cancel</a>
</div>
<hr>
<div id="InnerVendor">
<div class="col-12">
<h5 style="color: #C00;">Total Outstanding:</h5>
</div>
<div class="col-12 main-title text-center text-center fw-bold">
<h6>Record Not Available....</h6>
</div>
<div class="col-12">
<div class="row">
<div class="col-8 mt-1">

<textarea class="form-control remark" id="remark" name="remark" placeholder="Remarks" tabindex="12"></textarea>
</div>

<div class="col-4 mt-1">

<div class="row">
<label class="col-md-6 col-form-label text-end" for="recieved_amnt">Recieved Amount</label>
<div class="col-md-6">
<input type="text" name="recieved_amnt" class="recieved_amnt form-control" id="recieved_amnt"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label text-end" for="adjusted_amnt">Adjusted Amount</label>
<div class="col-md-6">
<input type="text" name="adjusted_amnt" class="adjusted_amnt form-control" id="adjusted_amnts"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label text-end" for="outstanding_amnt">Outstanding Amount</label>
<div class="col-md-6">
<input type="text" name="outstanding_amnt" class="outstanding_amnt form-control" id="outstanding_amnt"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label" for="outstanding_amnt"></label>
<div class="col-md-6 text-end">
<input type="submit" tabindex="13" value="Save"
class="btn btn-primary btnSubmit" id="btnSubmit"
>
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
</div>
</div>
</div>
</form>
</div>




<script>
$('select').select2();
$('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es' ,
          autoclose:true,
           todayHighlight: true,
      });
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
function getAccountNo(Bank)
{
var base_url = '{{url('')}}';
$.ajax({
type: 'POST',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
},
url: base_url + '/GetAccountByBank',
cache: false,
data: {
'Bank':Bank
},
success: function(data) {
$('.acct_no').val(data);
   
}
});
}
function getVendorInvoiceDetails()
{
    if($('.vendor_name').val()=='')
    {
        alert('Please select Vendor');
        return false;
    }
    if($('.payment_type').val()=='')
    {
        alert('Please select Payment Type');
        return false;
    }
    if($('.payment_mode').val()=='')
    {
        alert('Please select Payment Mode');
        return false;
    }
    if($('.amnt').val()=='')
    {
        alert('Please Enter Amount');
        return false;
    }
    if($('.payment_date').val()=='')
    {
        alert('Please Enter Payment Date');
        return false;
    }
    if($('.bank_name').val()=='')
    {
        alert('Please Enter Bank Name');
        return false;
    }
    if($('.acct_no').val()=='')
    {
        alert('Please Enter Account No');
        return false;
    }
    if($('.cheque_no').val()=='')
    {
        alert('Please Enter Cheque No');
        return false;
    }
    if($('.cheque_date').val()=='')
    {
        alert('Please Enter Cheque Date');
        return false;
    }
        var vendor_name=$('.vendor_name').val();
        var payment_type=$('.payment_type').val();
        var payment_mode=$('.payment_mode').val();
        var amnt=$('.amnt').val();
        var payment_date=$('.payment_date').val();
        var bank_name=$('.bank_name').val();
        var acct_no=$('.acct_no').val();
        var cheque_no=$('.cheque_no').val();
        var cheque_date=$('.cheque_date').val();
        var base_url = '{{url('')}}';
        $.ajax({
        type: 'POST',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/GetProcessVendorBill',
        cache: false,
        data: {
        'vendor_name':vendor_name,'payment_type':payment_type,'payment_mode':payment_mode,'amnt':amnt,'payment_date':payment_date,'bank_name':bank_name,'acct_no':acct_no,'cheque_no':cheque_no,'cheque_date':cheque_date
        }, 
        success: function(data) {
          $('#InnerVendor').html(data);
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

