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
<div class="container-fluid">
<div class="row">
   <div class="col-12">
      <div class="page-title-box">
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
               <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
               <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
         </div>
         <h4 class="page-title">{{$title}}</h4>
      </div>
   </div>
</div>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
   <h4 class="header-title nav nav-tabs nav-bordered mb-3"> CASH REQUEST</h4>
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
            <div class="row d-flex justify-content-center">
              
                <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Transfer Date<span class="error">*</span></label>
                  <input type="text" tabindex="3" class="form-control datepickerOne" name="Tdate" id="Tdate"  autocomplete="off" readonly>
                
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Amount<span class="error">*</span></label>
                  <input type="number" tabindex="5" class="form-control" name="Amount" id="Amount" required autocomplete="off">
                
                  <span class="error"></span>
               </div>
               
            </div>
             <div class="row">
                <div class="mb-2 col-md-2">
               </div>
                
               <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Remarks</label>
                  <textarea rows="5" tabindex="6" class="form-control" name="Remark" id="Remark"></textarea>
                  <span class="error"></span>
               </div>
                

                <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
               <div id='loader' style='display: none;'>
                  <img src="{{url('images/Loading_2.gif')}}"  style="position: absolute;left: 672px;top: 176px;z-index: 9999999999;">
               </div>
              
                 <div class="mb-2 col-md-4">
               </div>
                <div class="mb-2 col-md-2">
               <input type="button" value="Send Resquest" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="submitCashTransfer()">
                
                 <span class="error"></span>
               </div>
               <div class="mb-2 col-md-1">
                  <a href="{{url('webadmin/CashRequest')}}" class="btn btn-primary">Cancel</a>
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
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd'
      });
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
   
  
   if($('#Tdate').val()=='')
   {
      alert('please Enter Transfer Date');
      return false;
   }

    if($('#Amount').val()=='')
   {
      alert('please Enter Amount');
      return false;
   }
   $(".btnSubmit").attr("disabled", true);
  
   var Tdate=$('#Tdate').val();
   var Amount=$('#Amount').val();
   var Remark=$('#Remark').val();
   
   
   
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/PostCashRequest',
       cache: false,
       data: {
         'Tdate':Tdate,'Amount':Amount,'Remark':Remark
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
</script>