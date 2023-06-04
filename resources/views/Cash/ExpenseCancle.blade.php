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

             <h4 class="header-title nav nav-tabs nav-bordered mb-3">Expense Cancle</h4>
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

                  <div class="mb-2 col-md-2">
                  </div>

                  <div class="mb-2 col-md-4">
                      <label for="example-select" class="form-label">Advice No<span class="error">*</span></label>
                      <input type="text"  class="form-control asss" name="AdviceNo" id="AdviceNo">
                      <span class="error"></span>
                  </div>
                  <div class="mb-2 col-md-4">
                    <a href="javascript:void(0)" class="btn btn-primary mt-3" onclick="getAdviceDetails()">Process</a>
                    <a href="javascript:void(0)"  class="btn btn-primary mt-3" onclick="CancleAdvice()">Cancle</a>
                    <span class="error"></span>
                </div>
                <div class="mb-2 col-md-2">
                </div>
                <div class="mb-2 col-md-2">
                </div>
                <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Company Name<span class="error">*</span></label>
                  <input type="hidden" name="ToOffce" value="6" class="form-control">
                  <input type="text" name="" value="" class="form-control" id="CompanyName">

                  <span class="error"></span>
              </div>
              <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Claim Type</label>
                  <div class="ClaimType">
                      <input type="text" name="ClaimType" class="form-control" >
                  </div>
                  <span class="error"></span>
              </div>
              <div class="mb-2 col-md-2">
              </div>
              <div class="mb-2 col-md-2">
              </div>
              <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Office Name<span class="error">*</span></label>
                  <input type="text" name="" class="form-control" id="Office">
                     <input type="hidden" name="OffcieName" class="form-control" id="OffcieName">

                  <span class="error"></span>
              </div>
              <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Employee Name<span class="error">*</span></label>
                  <input type="text" name="" class="form-control">
                  <span class="error"></span>
              </div>
              <div class="mb-2 col-md-2">
              </div>
              <div class="mb-2 col-md-2">
              </div>
              <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Advice Date<span class="error">*</span></label>
                  <input type="text" name="Advicedate" class="form-control" id="AdviceDate">

                  <span class="error"></span>
              </div>
              <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Paid Amount <span class="error">*</span></label>
                  <input type="text" name="" class="form-control" id="SumTotalTAmt">
                  <span class="error"></span>
              </div>
              <div class="mb-2 col-md-2">
              </div>
              <h4 class="header-title nav nav-tabs nav-bordered mb-3"></h4>  
              <div class="crcform ssss">


             


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

    function getAdviceDetails()
    {
        if($('#AdviceNo').val()=='')
        {
            alert('Please enter Advice No');
            return false;
        }
        var AdviceNo=$('#AdviceNo').val();
        var base_url = '{{url('')}}';
        $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/GetAdviceDetails',
       cache: false,
       data: {
           'AdviceNo':AdviceNo
       },
       success: function(data) {
           if(data =='false')
           {
             alert('No record found');
             return false;
         }
         else
         {
             var obj=JSON.parse(data);
             $('#CompanyName').val('METROPOLIS LOGISTICS PVT LTD');
             $('#Office').val(obj.DepoName);
             $('#AdviceDate').val(obj.Date);
             $('#SumTotalTAmt').val(obj.SumTotalTAmt);
             $('#OffcieName').val(obj.DipoId);
             if(obj.AccType=='Branch Imprest')
             {
                $('.ClaimType').html('<select class="form-control" name="ClaimType" id="ClaimType" tabindex="3"> <option value="">Select Claim type</option> <option value="Branch Imprest" selected>Branch Imprest</option> <option value="Staff Imprest">Staff Imprest</option>')
            }
            else if(obj.AccType=='Staff Imprest')
            {
                $('.ClaimType').html('<select class="form-control" name="ClaimType" id="ClaimType" tabindex="3"> <option value="">Select Claim type</option> <option value="Branch Imprest" >Branch Imprest</option> <option value="Staff Imprest" selected>Staff Imprest</option>')
            }
            else
            {
                $('.ClaimType').html('<select class="form-control" name="ClaimType" id="ClaimType" tabindex="3"> <option value="">Select Claim type</option> <option value="Branch Imprest" >Branch Imprest</option> <option value="Staff Imprest">Staff Imprest</option>')
            }

        }
        

    }
});
 }  
 function CancleAdvice()
 {
        if($('#AdviceNo').val()=='')
        {
            alert('Please enter Advice No');
            return false;
        }
        var AdviceNo=$('#AdviceNo').val(); 
        var AdviceNo=$('#AdviceNo').val();
        var base_url = '{{url('')}}';
        $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/webadmin/CancleAdvice',
        cache: false,
        data: {
           'AdviceNo':AdviceNo
        },
       success: function(data) {
        location.reload();
      }
   });
 }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  