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
<div class="row mt-1 pl-pr">
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
                <div class="col-5 m-b-1">
                  <div class="row">
                     <label for="example-select" class="form-label col-md-3">From A/C<span class="error">*</span></label>
                     <div class="col-md-6">
                      <input type="text" tabindex="1" class="form-control" name="FromDepo" id="FromDepo" value="{{'DELHI'}}" readonly>
                        <input type="hidden"  class="form-control" name="FromDepo" id="FromDepoid" value="1" readonly>
                        <span class="error"></span>
                      </div>
                  </div>
                </div>
                <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Balance Amount<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input type="text"  class="form-control" name="Date" id="FromdepoBal" value="@if(isset($HOAmount->TotalCredit)){{number_format($HOAmount->TotalCredit-$HOAmount->TotalDebit,2,'.','')}}@else{{'0'}}@endif"  readonly>
                  <span class="error"></span>
                  </div>
                  </div>
                </div>
                <div class="col-2 m-b-1">
                </div>
                <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Company Name<span class="error">*</span></label>
                  <div class="col-md-6">
                  <select name="Company" class="form-control selectBox Company" id="Company" tabindex="2" autocomplete="off">
                    <option value="METROPOLIS LOGISTICS PVT LTD">METROPOLIS LOGISTICS PVT LTD</option>
                  </select>  
                  
                  <span class="error"></span>
                  </div>
                  </div>
                </div>
                <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Payout Date<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input type="text" tabindex="2" class="form-control datepickerOne Tdate" name="Tdate" id="Tdate"  autocomplete="off" readonly>
                  <span class="error"></span>
                   </div>
                  </div>
                </div>
                 <div class="col-2 m-b-1">
                 </div>
                <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">A/C Type</label>
                  <div class="col-md-6">
                    <select  class="form-control selectBox" id="AccType" tabindex="3">
                    <option value="Branch Imprest">Branch Imprest</option>
                    <option value="Staff Imprest">Staff Imprest</option>
                  
                 </select>
                  <span class="error"></span>
                  </div>
                </div>
              </div>
                <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label OffLvl col-md-3">Office Name<span class="error">*</span></label>
                  <div class="col-md-6">
                 <select class="form-control selectBox" id="ToDepo" tabindex="4" onchange="getFromDepoAmount(this.value)">
                    <option value="">Select Office</option>
                    @foreach($getAllDepo as $depo)
                      <option   value="{{$depo->id}}">{{$depo->OfficeCode}} ~{{$depo->OfficeName}}</option>
                    @endforeach
                 </select>
                
                  <span class="error"></span>
                  </div>
                  </div>
                </div>
               <div class="col-2 m-b-1">
               </div>
               <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Balance Amount<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input type="text"   class="form-control ToDepoBalace" name="ToDepoBalace" id="ToDepoBalace" readonly>
                  <span class="error"></span>
                 </div>
                 </div>
               </div>
               <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Amount<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input onchange="checkValidation(this.value);" type="number" tabindex="5" class="form-control" name="Amount" id="Amount" required autocomplete="off">
                  <span class="error"></span>
                  </div>
                </div>
               </div>
               <div class="col-2 m-b-1">
               </div>
               <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Payment Mode</label>
                  <div class="col-md-6">
                    <select class="form-control selectBox" id="Mode" tabindex="4">
                    <option value="">Select Mode</option>
                    <option value="1">Cash</option>
                    <option value="2">Bank</option>
                  
                 </select>
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
               </div>
               
                 <div class="col-12 text-end mt-1">
               <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="DepositeCashToHo()">
                 <span class="error"></span>
                  <a href="{{url('webadmin/AdvancePayout')}}" class="btn btn-primary">Cancel</a>
                  <span class="error"></span>
               </div>
               <div id='loader' style='display: none;'>
                  <img src="{{url('images/Loading_2.gif')}}"  style="position: absolute;left: 672px;top: 176px;z-index: 9999999999;">
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
    $('.datepickerOne').datepicker({
         format: 'dd-mm-yyyy',
          todayHighlight:true
      });
   $(".Tdate").val("{{date('d-m-Y')}}");
   $(".selectBox").select2();
 function DepositeCashToHo()
 {


   if($('#Tdate').val()=='')
   {
      alert('please Enter Payout Date');
      return false;
   }
   if($('#ToDepo').val()=='')
   {
      alert('please Select Office');
      return false;
   }
   
    if($('#Amount').val()=='')
   {
      alert('please Enter Amount');
      return false;
   }
   var FromDepoid=$('#FromDepoid').val();
   var FromdepoBal=$('#FromdepoBal').val();
   var Tdate=$('#Tdate').val();
   var Amount=$('#Amount').val();
   var ToDepoBalace=$('#ToDepoBalace').val();
   var ToDepo=$('#ToDepo').val();
   var AccType=$('#AccType').val();
   var Mode=$('#Mode').val();
   var Remark=$('#Remark').val();
   if(parseInt(Amount) > parseInt(FromdepoBal))
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
       url: base_url + '/PostAdvancePayout',
       cache: false,
       data: {
           'FromDepoid':FromDepoid,'Tdate':Tdate,'Amount':Amount,'ToDepo':ToDepo,'AccType':AccType,'Mode':Mode,'Remark':Remark
       },
       success: function(data) {
         location.reload();
       }
     });


 }  
 function getFromDepoAmount(FDepoId)
 {
       var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetFormDepoAmount',
       cache: false,
       data: {
         'FDepoId':FDepoId
       },
       success: function(data) {
         if(FDepoId !='')
         {
          $('.ToDepoBalace').val(data);
         }
         else
         {
          $('.ToDepoBalace').val('');
         }
         
        }
     });
 }
 $(function(){
     setTimeout(hidealert,2000);
       function hidealert(){

            $('.alert').removeClass('show');
          }
        });

        function checkValidation(Amount){
         var FromDepoBalace=$('#FromdepoBal').val();
         if(parseFloat(Amount) > parseFloat(FromDepoBalace))
            {
            alert('Insufficient balance');
            $("#Amount").val('');
            $("#Amount").focus();
            return false;
            }
         }         

 function ImprestChange(Vallue){ 

   if(Vallue =="Staff Imprest"){
    
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetEmployee',
       cache: false,
       data: {
       },
       success: function(data) {
         $("#OffLvl").html("Employee Name");
         $("#ToDepo").html(data);
       }
       });

         //Branch Imprest
   }
   else if(Vallue =="Branch Imprest"){

      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetOffice',
       cache: false,
       data: {
       },
       success: function(data) {
         $("#OffLvl").text("Office Name");
         $("#ToDepo").html(data);
       }
       });

   }

   //onchange="ImprestChange(this.value);"
   
 }          
</script>