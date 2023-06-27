@include('layouts.appThree')

<div class="generator-container allLists">
<div class="row">
<div class="col-12">
<div class="page-title-box main-title">
<div class="page-title-right">
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
<li class="breadcrumb-item"><a href="javascript: void(0);">Sale</a></li>
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


<form method="get"  id="subForm">
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



<div class="col-4 mt-1 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="payment_date">Payment From Date
</label>
<div class="col-md-8">
<input type="text" name="payment_form_date" class="payment_form_date form-control datepickerOne" id="payment_form_date" value="@if(request()->get('formDate') !=''){{ request()->get('formDate') }}@else{{date('d-m-Y', strtotime('last month'))}} @endif" tabindex="7">
</div>
</div>
</div>
<div class="col-4 mt-1 m-b-1">
<div class="row">
<label class="col-md-4 col-form-label" for="payment_date">Payment To Date
</label>
<div class="col-md-8">
<input type="text" name="payment_to_date" class="payment_to_date form-control datepickerOne" id="payment_to_date" tabindex="7" value="@if(request()->get('formDate') !=''){{ request()->get('formDate') }}@else{{date('d-m-Y')}} @endif">
</div>
</div>
</div>
<div class="col-10 text-center mt-1 mb-1">
<input type="button" tabindex="12" value="Process"
class="btn btn-primary btnSubmit" id="btnSubmit"
onclick="getMrno()">
<a href="" tabindex="13"
class="btn btn-primary">Cancel</a>
</div>
<hr>

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

  function getMrno()
   {
    if($('#customer_name').val()=='')
    {
        alert('Please Select Customer Name');
        return false;
    }
    
    if($('#payment_form_date').val()=='')
    {
        alert('Please Enter From Date');
        return false;
    }
    if($('#payment_to_date').val()=='')
    {
        alert('Please Enter To Date');
        return false;
    }
    var customer_name=$('#customer_name').val();
    var fromDate=$("#payment_form_date").val();
    var Toate =$("#payment_to_date").val();
    
   var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/MoneyReceivedDelete',
       cache: false,
       data: {
           'customer_name':customer_name,'fromDate':fromDate,'Toate':Toate
       },
       success: function(data) {
        $('.remveClass').css('display','none');
        $('.addClass').html(data);
       

        //  $(".btnSubmit").attr("disabled", true);
        //  location.reload();
       
       }
     });
}


</script>

    