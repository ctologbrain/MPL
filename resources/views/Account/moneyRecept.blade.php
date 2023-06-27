@include('layouts.appThree')

<div class="generator-container allLists">
<div class="row">
<div class="col-12">
<div class="page-title-box main-title">
<div class="page-title-right">
<ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
</div>
<h4 class="page-title">{{$title}}</h4>
<div class="text-start fw-bold blue_color">
FIELDS WITH (*) MARK ARE MANDATORY.
</div>
</div>
</div>
</div>


<form method="POST"  id="subForm" action="{{url('submitMoneyRecept')}}">
@csrf
<div class="row pl-pr mt-1">
<div class="col-xl-12">
<div class="card customer_oda_rate">
<div class="card-body">
<div id="basicwizard">
<div class="tab-content b-0 mb-0">
<div class="tab-pane active show" id="basictab1" role="tabpanel">

<div class="row">
<div class="col-4 m-b-1">

<div class="row">


<label class="col-md-4 col-form-label" for="customer_name">Customer Name<span class="error">*</span></label>
<div class="col-md-8">
<select name="customer_name" tabindex="1" class="form-control customer_name" id="customer_name">
    <option value="">--SELECT--</option>
        @foreach($Cust as $customer)  
        <option value="{{$customer->id}}">{{$customer->CustomerCode}} ~ {{$customer->CustomerName}}</option> 
        @endforeach
    </select>

</div>
</div>
</div>
<div class="col-4 m-b-1">

<div class="row">
<label class="col-md-4 col-form-label text-end" for="customer_name">TDS %</label>

<div class="col-md-8">
<input type="text" name="tds" class="tds form-control" id="tds" tabindex="2">

</div>
</div>
</div>
<div class="col-4">

<div class="row">
<label class="col-md-4 col-form-label d-flex align-items-center justify-content-end" for="apply_tds">Apply TDS </label>
<div class="col-md-8">
<input type="checkbox" name="apply_tds" class="apply_tds ml-1 mt-1" id="apply_tds" tabindex="3">

</div>

 </div>
</div>
<div class="col-4 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="payment_type">Payment Type</label>
<div class="col-md-8">
<select class="form-control payment_type selectBox" id="payment_type" name="payment_type" tabindex="4">
<option value="">--SELECT--</option>
<option value="1">NEW</option>
<option value="2">ADVANCE ADJUSTMENT</option>
</select>
</div>
</div>
</div>
<div>
</div>
<hr> 
<div class="col-4 mt-1 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="payment_mode">Payment Mode</label>
<div class="col-md-8">
<select class="form-control payment_mode selectBox" id="payment_mode" name="payment_mode" tabindex="5">
<option value="">--SELECT</option>
<option value="1">BANK</option>
<option value="2">CASH</option>
</select>
</div>
</div>
</div>
<div class="col-4 mt-1 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="recieved_amnt">Recieved Amount</label>
<div class="col-md-8">
<input type="text" name="recieved_amnt" class="recieved_amnt form-control" id="recieved_amnt" tabindex="6">
</div>
</div>
</div>
<div class="col-4 mt-1 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="payment_date">Payment Date
</label>
<div class="col-md-8">
<input type="text" name="payment_date" class="payment_date form-control datepickerOne" id="payment_date" tabindex="7">
</div>
</div>
</div>
<div class="col-4 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="bank_name">Bank Name</label>
<div class="col-md-8">
<select name="bank_name" tabindex="8" class="form-control bank_name" id="bank_name" onchange="getAccountNo(this.value)">
<option value="">--SELECT</option>
@foreach($bank as $bankDetails)
<option value="{{$bankDetails->id}}">{{$bankDetails->BankName}}</option>  
@endforeach
</select>
</div>
</div>
</div>
<div class="col-4 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="deposit_acct_no">Account Number</label>
<div class="col-md-8">
<input type="text" name="deposit_acct_no" class="deposit_acct_no form-control" id="deposit_acct_no" tabindex="9">
</div>
</div>
</div>
<div class="col-4 m-b-1">
<div class="row">
</div>
</div>
<div class="col-4 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="utr_no">Cheque/UTR No</label>
<div class="col-md-8">
<input type="text" name="utr_no" class="utr_no form-control" id="utr_no" tabindex="10">
</div>
</div>
</div>
<div class="col-4 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="deposit_acct_no">Cheque/UTR Date</label>
<div class="col-md-8">
<input type="text" name="utr_date" class="utr_date form-control datepickerOne" id="utr_date" tabindex="11">
</div>
</div>
</div>
<hr>
<div class="col-10 text-center mt-1 mb-1">
<input type="button" tabindex="12" value="Process"
class="btn btn-primary btnSubmit" id="btnSubmit"
onclick="claculateInvoiceAmount()">
<a href="" tabindex="13"
class="btn btn-primary">Cancel</a>
</div>
<hr>
<div class="remveClass">
<div class="col-12">
<h5 style="color: #C00;">Total Outstanding:</h5>
</div>
<div class="col-12 main-title text-center text-center fw-bold">
<h6 class="p-1">Record Not Available....</h6>
</div>
<div class="col-12">
<div class="row">
<div class="col-8 mt-1">
<textarea class="form-control remark" id="remark" name="remark" placeholder="Remarks" tabindex="14"></textarea>
</div>
<div class="col-4 mt-1">
<div class="row m-b-1">
<label class="col-md-6 col-form-label" for="recieved_amnt">Recieved Amount</label>
<div class="col-md-6">
<input type="text" name="recieved_amnt" class="recieved_amnt form-control" id="recieved_amnt"  disabled>
</div>
</div>
<div class="row m-b-1">
<label class="col-md-6 col-form-label" for="adjusted_amnt">Adjusted Amount</label>
<div class="col-md-6">
<input type="text" name="adjusted_amnt" class="adjusted_amnt form-control" id="adjusted_amnts"  disabled>
</div>
</div>
<div class="row m-b-1">
<label class="col-md-6 col-form-label" for="outstanding_amnt">Outstanding Amount</label>
<div class="col-md-6">
<input type="text" name="outstanding_amnt" class="outstanding_amnt form-control" id="outstanding_amnt"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label" for="outstanding_amnt"></label>
<div class="col-md-6 text-end">
<input type="submit" tabindex="15" value="Save"
class="btn btn-primary btnSubmit" id="btnSubmit">
</div>
</div>
</div>
</div>
</div>
</div>
<div class="addClass"></div>
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
$('.deposit_acct_no').val(data);
   
}
});
}
function claculateInvoiceAmount()
{
    if($('#customer_name').val()=='')
    {
        alert('Please Select Customer Name');
        return false;
    }
    if($('#payment_type').val()=='')
    {
        alert('Please Enter Payment Date');
        return false;
    }
  
    if($('#payment_mode').val()=='')
    {
        alert('Please Enter Paymant Mode');
        return false;
    }
    if($('#recieved_amnt').val()=='')
    {
        alert('Please Enter Amount');
        return false;
    }
    if($('#payment_date').val()=='')
    {
        alert('Please Enter Payment Date');
        return false;
    }
    
    if($('#bank_name').val()=='')
    {
        alert('Please Selelct Bank Name');
        return false;
    }
    if($('#deposit_acct_no').val()=='')
    {
        alert('Please Enter Account');
        return false;
    }
    if($('#utr_no').val()=='')
    {
        alert('Please Enter Cheque/UTR No');
        return false;
    }
    if($('#utr_date').val()=='')
    {
        alert('Please Enter Cheque/UTR Dates');
        return false;
    }
    var customer_name=$('#customer_name').val();
    var tds=$("#tds").val();
    var apply_tds = $("input[name=apply_tds]:checked").val();
    var payment_type=$('#payment_type').val();
    var payment_date=$('#payment_dates').val();
    var payment_mode=$('#payment_mode').val();
    var amount=$('#recieved_amnt').val();
    var acct_no=$('#deposit_acct_no').val();
    var bank_name=$('#bank_name').val();
    var utr_no=$('#utr_no').val();
    var utr_date=$('#utr_date').val();
   var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetInvoiceToMoneyReceipt',
       cache: false,
       data: {
           'customer_name':customer_name,'tds':tds,'apply_tds':apply_tds,'payment_type':payment_type,'payment_date':payment_date,'payment_mode':payment_mode,'amount':amount,'acct_no':acct_no,'bank_name':bank_name,'utr_no':utr_no,'utr_date':utr_date
       },
       success: function(data) {
        $('.remveClass').css('display','none');
        $('.addClass').html(data);
       

        //  $(".btnSubmit").attr("disabled", true);
        //  location.reload();
       
       }
     });
}
function SubmitMoneyRecept(routeId)
{
    if($('#customer_name').val()=='')
    {
        alert('Please Select Customer Name');
        return false;
    }
    if($('#payment_type').val()=='')
    {
        alert('Please Enter Payment Date');
        return false;
    }
  
    if($('#payment_mode').val()=='')
    {
        alert('Please Enter Paymant Mode');
        return false;
    }
    if($('#recieved_amnt').val()=='')
    {
        alert('Please Enter Amount');
        return false;
    }
    if($('#payment_date').val()=='')
    {
        alert('Please Enter Payment Date');
        return false;
    }
    
    if($('#bank_name').val()=='')
    {
        alert('Please Selelct Bank Name');
        return false;
    }
    if($('#deposit_acct_no').val()=='')
    {
        alert('Please Enter Account');
        return false;
    }
    if($('#utr_no').val()=='')
    {
        alert('Please Enter Cheque/UTR No');
        return false;
    }
    if($('#utr_date').val()=='')
    {
        alert('Please Enter Cheque/UTR Dates');
        return false;
    }
    var customer_name=$('#customer_name').val();
    var tds=$("#tds").val();
    var apply_tds = $("input[name=apply_tds]:checked").val();
    var payment_type=$('#payment_type').val();
    var payment_date=$('#payment_dates').val();
    var payment_mode=$('#payment_mode').val();
    var amount=$('#recieved_amnt').val();
    var acct_no=$('#deposit_acct_no').val();
    var bank_name=$('#bank_name').val();
    var utr_no=$('#utr_no').val();
    var utr_date=$('#utr_date').val();
   var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/submitMoneyRecept',
       cache: false,
       data: {
           'customer_name':customer_name,'tds':tds,'apply_tds':apply_tds,'payment_type':payment_type,'payment_date':payment_date,'payment_mode':payment_mode,'amount':amount,'acct_no':acct_no,'bank_name':bank_name,'utr_no':utr_no,'utr_date':utr_date
       },
       success: function(data) {
       location.reload();
       
       }
     });
}

</script>

