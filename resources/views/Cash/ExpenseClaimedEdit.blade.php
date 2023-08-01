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
           <form id="formid" class="form-horizontal" action="" method="POST" id="addRoute" enctype="multipart/form-data">
              {{ csrf_field() }}
             
              <div class="tab-content">
               <div class="tab-pane show active" id="input-types-preview">
                <div class="row">

                  <div class="col-5 m-b-1 mt-1">
                    <div class="row">
                      <label for="example-select" class="form-label col-md-3">Advice No<span class="error">*</span></label>
                      <div class="col-md-6">
                      <input type="text"  class="form-control asss" name="AdviceNo" id="AdviceNo" >
                      <span class="error"></span>
                    </div>
                  </div>
                  </div>
                   <div class="col-5 m-b-1">
                    
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="getAdviceDetails()">Process</a>
                    <a href="{{url('ExpenseClaimedEdit')}}" class="btn btn-primary">Reset</a>
                    <span class="error"></span>
                </div>
                <div class="col-2 m-b-1">
                </div>
               
                <div class="col-5 m-b-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Company Name<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input type="hidden" name="ToOffce" value="6" class="form-control">
                  <input type="text" name="" value="" class="form-control" id="CompanyName">

                  <span class="error"></span>
                </div>
              </div>
              </div>
              <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Claim Type</label>
                  <div class="col-md-6">
                  <div class="ClaimType">
                      <input type="text" name="ClaimType" class="form-control" >
                  </div>
                  <span class="error"></span>
                </div>
              </div>
              </div>
              <div class="col-2 m-b-1">
              </div>
             
              <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Office Name<span class="error">*</span></label>
                  <div class="col-md-6">
                  <select class="form-control selectBox" name="OffcieName" id="OffcieName" tabindex="4"   required>
                    <option value="">Select Office</option>
                    @foreach($getAllDepo as $depo)
                      <option value="{{$depo->id}}">{{$depo->OfficeCode}}~ {{$depo->OfficeName}}</option>
                    @endforeach
                 </select>

                  <span class="error"></span>
                </div>
              </div>
              </div>
              <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Employee Name<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input id="Employee" type="text" name="" class="form-control">
                  <span class="error"></span>
                </div>
              </div>
              </div>
              <div class="col-2 m-b-1">
              </div>
             
              <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Advice Date<span class="error">*</span></label>
                  <div class="col-md-6">
                  <input type="text" name="Advicedate" class="form-control datepickerOne" id="AdviceDate">

                  <span class="error"></span>
                </div>
              </div>
              </div>
              <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Total Amount <span class="error">*</span></label>
                  <div class="col-md-6">
                  <input  type="text" name="" class="form-control" id="SumTotalTAmt" >
                  <span class="error"></span>
              </div>
            </div>
          </div>
          <div class="col-2 m-b-1">
          </div>
              <div class="col-5 mb-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Paid Amount <span class="error">*</span></label>
                  <div class="col-md-6">
                  <input type="text" name="" class="form-control" id="totalAmnt" value="0.00">
                  <span class="error"></span>
                </div>
              </div>
              </div>
              
             


             <table class="table table-bordered" id="dynamic_field">
                     <thead>
                      <tr class="main-title">
                      <th width="10%">Amount<span class="error">*</span></th>
                      <th width="10%">Parent A/c</th>
                      <th width="15%">Expense A/c<span class="error">*</span></th>
                      <th width="11%">From Date<span class="error">*</span></th>
                      <th width="11%">To Date<span class="error">*</span></th>
                      <th width="15%">Reference Type<span class="error">*</span></th>
                      <th width="28%">Reference No</th>
                    </tr>
                   </thead>
                       <tr>
                        <td>
                        <input  id="amount0"  class="form-control amnt" type="text" required autocomplete="off" name="Expenses[0][amount]" style="width:100%";/>
                       </td>

                        <td>
                       <input  id="Parent0"  class="form-control" type="text"required autocomplete="off" name="Expenses[0][Parent]" style="width:100%"/>
                        </td>
                         <td>
                         <select  id="exp0"   class="exp form-control selectBox" id="exp" name="Expenses[0][Exp]">
                           <option value="">Select</option>
                           @foreach($DebitResion as $debit)
                            <option  value="{{$debit->Id}}">{{$debit->Reason}}</option>
                           @endforeach
                        </select>
                         </td>
                        <td>
                     <input  id="FromDate0" class="form-control datepickerOne" type="text"required autocomplete="off" name="Expenses[0][FromDate]" style="width:100%"  />
                       </td>
                        <td>
                     <input  id="ToDate0" class="form-control datepickerOne" type="text"required autocomplete="off" name="Expenses[0][ToDate]" style="width:100%" />
                       </td>
                        <td>
                      <input id="REfrenceType0"  class="form-control" type="text"required autocomplete="off" name="Expenses[0][REfrenceType]" style="width:100%"/>
                       </td>
                   
                    <td align="left" class="d-flex align-items-center justify-content-around">
                   <input id="REfrenceName0"  class="form-control"  type="text" maxlength="200" id="ctl00_ContentPlaceHolder1_txtReferenceNo" class="txtboxMedium" autocomplete="off" style="text-transform: uppercase; width: 80%;" name="Expenses[0][REfrenceName]">
                   <button type="button" name="ctl00$ContentPlaceHolder1$btnAddReference"  name="add" id="add" class="btn btn-primary">+</button>
               </td>
                      
                </tr>
                <thead>
                  <tr class="main-title">
                      <th colspan="3">Remark<span class="error">*</span></th>
                      <th colspan="3">Attach Document</th>
                      <th>Action</th>
                     
                    </tr>
                   </thead>
                   <tbody>
                      <td colspan="3"><input type="text" class="form-control" id="Remark" name="Reamrk"></td>
                      <td colspan="3"><input type="file" class="form-control" name="Image2" id="Image2"></td>
                     
                      <td><input value="Save" id="submit" type="button" name="submit" class="btn btn-primary">&nbsp;<a href="" class="btn btn-primary">Cancel</a></td>
                   </tbody>
            </table>
            <div class="crcform ssss" style="overflow-x:auto;">

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
  $(".selectBox").select2();
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
       url: base_url + '/GetAdviceDetails',
       cache: false,
       data: {
           'AdviceNo':AdviceNo
       },
       success: function(data) {
           if(data =='false')
           {
            $('#CompanyName').prop("readonly",false);
             $('#Office').prop("disabled",false);
             $('#AdviceDate').prop("readonly",false);
             $('#SumTotalTAmt').prop("readonly",false);
             $('#OffcieName').prop("readonly",false);
             $('.ClaimType').prop("disabled",false);
             alert('No record found');
             return false;
         }
         else
         {
            var obj=JSON.parse(data);
             if(obj.DipoId!=undefined && obj.DipoId!=""){
            
             $('#CompanyName').val('METROPOLIS LOGISTICS PVT LTD');
           
            
             $('#AdviceDate').val(obj.Date);
             $('#SumTotalTAmt').val(obj.SumTotalTAmt);
             $('#OffcieName').val(obj.DipoId).trigger('change');
             $('#Remark').val(obj.ExpRemark);
             $('#CompanyName').prop("readonly",true);
             $('#Office').prop("disabled",true);
             $('#AdviceDate').prop("readonly",true);
             $('#SumTotalTAmt').prop("readonly",true);
             $('#OffcieName').prop("disabled",true);
               $('#Employee').val(obj.EmployeeCode+'~'+obj.EmployeeName);
               $('#Employee').prop("readonly",true); 
               $('#totalAmnt').prop("readonly",true); 
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
            $('.ClaimType').prop("disabled",true);
        }
        else{
            $('#CompanyName').prop("readonly",false);
             $('#Office').prop("disabled",false);
             $('#AdviceDate').prop("readonly",false);
             $('#SumTotalTAmt').prop("readonly",false);
             $('#OffcieName').prop("disabled",false);
             $('.ClaimType').prop("disabled",false);
        }

        }
        var AdviceNo=$('#AdviceNo').val();
        var base_url = '{{url('')}}';
        $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetAdviceDetailsInner',
       cache: false,
       data: {
           'AdviceNo':AdviceNo
       },
       success: function(data) {
        $('.ssss').html(data);
        $('.datepickerOne').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
        });

       }
   });

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
          $('#totalAmnt').val(parseInt(data).toFixed(2));
         }
         else
         {
          $('#totalAmnt').val('');
         }
         
        }
     });
   }




  
    
</script>
