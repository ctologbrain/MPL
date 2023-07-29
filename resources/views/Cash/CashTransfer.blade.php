@include('layouts.appOne')
<style type="text/css">.invoiceButton{display:none;}
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
   -webkit-appearance: none;
   margin: 0;
   }
   /* Firefox */
   input[type=number] {
   -moz-appearance: textfield;
   }
   .divhidden{
    display:none;
   }
   table thead tr th {
  /* Important */
 
  /*position: sticky;
  z-index: 100;
  top: 0;*/
}
</style>
<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<div class="generator-container allLists">
<div class="row">
   <div class="col-12">
      <div class="page-title-box main-title">
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
               <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
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
<div class="row pl-pr">
<div class="col-12">
<div class="card">
<div class="card-body">
   
    @if (session('status'))
     <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Success - </strong>  {{ session('status','') }}
    </div>
    @endif
   <form class="form-horizontal" action="" method="POST" id="addRoute" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="tab-content">
         <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
                <div class="col-5 mt-1 m-b-1">
                  <div class="row">
                    <label for="example-select" class="form-label col-md-3">From A/C<span class="error">*</span></label>
                    <div class="col-md-6"> 
                 <select  class="form-control selectBox" id="formDepo" tabindex="1" onchange="getFromDepoAmount(this.value)" disabled="disabled">
                    <option value="">Select Office</option>
                    @foreach($getAllDepo as $depo)
                      <option  @if($depoId == $depo->id) {{'selected'}} @endif value="{{$depo->id}}"> {{$depo->OfficeCode}} ~ {{$depo->OfficeName}}</option>
                    @endforeach
                 </select>
                  </div>
                 <span class="error"></span>
                  </div>
                </div>
                <div class="col-5 mt-1 m-b-1">
                  <div class="row">
                     <label for="example-select" class="form-label col-md-3">Balance Amount </label>
                     <div class="col-md-6"> 
                  <input type="text" value="{{number_format($logDepo,2,'.','')}}" class="form-control" name="FromDepoBalace" id="FromDepoBalace" disabled="disabled">
                  <span class="error"></span>
                </div>
                  </div>
                </div>
                <div class="col-2 m-b-1"></div>
              
                <div class="col-5 m-b-1">
                  <div class="row">
                    <label for="example-select" class="form-label col-md-3">To A/C<span class="error">*</span></label>
                  <div class="col-md-6">
                  <select class="form-control selectBox" id="ToDepo" tabindex="2" onchange="getFromDepoAmount(this.value)" disabled="disabled">
                    <option value="">Select Office</option>
                     
                      <option  selected  value="{{$office->id}}"> {{$office->OfficeCode}} ~ {{$office->OfficeName}}</option>
                  
                 </select>

                  <input type="hidden"  class="form-control" name="ToDepoId" id="ToDepoId" value="6">
                  <span class="error"></span>
                </div>
                  </div>
                </div>
            
               
                
               <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Balance Amount</label>
                  <div class="col-md-6">
                  <input type="text"  step="0.01"  class="form-control" name="number" id="TodepoBal" value="@if(isset($HOAmount->TotalCredit)){{number_format($HOAmount->TotalCredit-$HOAmount->TotalDebit,2,'.','')}}@else{{'0'}}@endif"  disabled="disabled">
                  <span class="error"></span>
                </div>
               </div>
             </div>
                <div class="col-2 m-b-1">
               </div>
             
                <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Transfer Date<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input type="text" tabindex="3" class="form-control datepickerOne" name="Tdate" id="Tdate"  autocomplete="off" readonly>
                
                  <span class="error"></span>
                </div>
               </div>
             </div>
               <div class="col-5">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Transfer Mode</label>
                  <div class="col-md-6">
                    <select class="form-control" id="Mode" tabindex="4">
                    <option value="">Select Mode</option>
                    <option value="1">Cash</option>
                    <option value="2">Bank</option>
   
                 </select>
                  <span class="error"></span>
                </div>
                </div>
               </div>
                <div class="col-2 m-b-1">
               </div>
                
                <div class="col-5">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Amount<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input onchange="checkValidation(this.value);" type="number" tabindex="5" class="form-control" name="Amount" id="Amount" required autocomplete="off" style="background-color: #FFC0CB;">
                
                  <span class="error"></span>
                </div>
                </div>
               </div>
               <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Remarks</label>
                  <div class="col-md-8">
                  <textarea rows="4" cols="20" tabindex="6" class="form-control" name="Remark" id="Remark"></textarea>
                  <span class="error"></span>
                </div>
               </div>
                <div class="col-2">
               </div>

                
               <div id='loader' style='display: none;'>
                  <img src="{{url('images/Loading_2.gif')}}"  style="position: absolute;left: 672px;top: 176px;z-index: 9999999999;">
               </div>
              
                 <div class="mb-2 col-md-5">
               </div>
                <div class="mb-2 col-md-2 d-flex">
               <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="submitCashTransfer()" style="margin-right: 5px;">
                
                 <span class="error"></span>
              
                  <a href="{{url('CashTransfer')}}" class="btn btn-primary">Cancel</a>
                  <span class="error"></span>
               </div>
                <div class="mb-2 col-md-5">
               </div>
               <div id='loader' style='display: none;'>
                  <img src="{{url('images/Loading_2.gif')}}"  style="position: absolute;left: 672px;top: 176px;z-index: 9999999999;">
               </div>
               <div class="mb-2 col-md-9">
               </div>
            </div>
         </div>
       

   </div>
 </form>
</div>


</div>
</div>
</div>
</div>
  
<script type="text/javascript">
$('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          todayHighlight:true
      });
 $("#Tdate").val("{{date('d-m-Y')}}");     
 function getFromDepoAmount(FDepoId)
 {
       var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/GetFormDepoAmount',
       cache: false,
       data: {
         'FDepoId':FDepoId
       },
       success: function(data) {
         if(FDepoId !='')
         {
          $('#FromDepoBalace').val(data);
         }
         else
         {
          $('#FromDepoBalace').val('');
         }
         
        }
     });
 }
 function submitCashTransfer()
 {
   
   if($('#formDepo').val()=='')
   {
      alert('please select form dipo');
      return false;
   }
   if($('#ToDepo').val()=='')
   {
      alert('please select To Dipo');
      return false;
   }
   if($('#FromDepoBalace').val()=='')
   {
      alert('please Enter Balance Amount');
      return false;
   } 
   if($('#TodepoBal').val()=='')
   {
      alert('please Enter Balance Amount');
      return false;
   }
   if($('#Tdate').val()=='')
   {
      alert('please Enter Transfer Date');
      return false;
   }
    if($('#Mode').val()=='')
   {
      alert('please select Mode Of Transfer');
      return false;
   }
    if($('#Amount').val()=='')
   {
      alert('please Enter Amount');
      return false;
   }
  
   var formDepo=$('#formDepo').val();
   var ToDepo=$('#ToDepo').val();
   var FromDepoBalace=$('#FromDepoBalace').val();
   var TodepoBal=$('#TodepoBal').val();
   var Tdate=$('#Tdate').val();
   var Mode=$('#Mode').val();
   var Amount=$('#Amount').val();
   var Remark=$('#Remark').val();
   var ToDepoId=$('#ToDepoId').val();
   
   if(parseInt(Amount) > parseInt(FromDepoBalace))
   {
     alert('Insufficient balance');
     return false;
   }
   $(".btnSubmit").attr("disabled", true);
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/PostCashEntry',
       cache: false,
       data: {
         'formDepo':formDepo,'ToDepo':ToDepo,'Tdate':Tdate,'Mode':Mode,'Amount':Amount,'Remark':Remark,'ToDepoId':ToDepoId
       },
       success: function(data) {
         location.reload();
       }
     });

 }  

  $(function(){
     const to= setTimeout(hidealert,2000);
       function hidealert(){

            $('.alert').removeClass('show');
          }
        });

  function checkValidation(Amount){
   var FromDepoBalace=$('#FromDepoBalace').val();
     if(parseFloat(Amount) > parseFloat(FromDepoBalace))
      {
      alert('Insufficient balance');
      $("#Amount").val('');
      $("#Amount").focus();
      return false;
      }
      
  }      
</script>