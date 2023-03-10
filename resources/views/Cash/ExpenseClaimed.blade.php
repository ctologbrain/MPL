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
   <h4 class="header-title nav nav-tabs nav-bordered mb-3">Expense Claimed</h4>
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
           
              <div class="mb-2 col-md-2">
               </div>
               <div class="mb-2 col-md-4">
               <label for="example-select" class="form-label">Advice Date<span  class="error">*</span></label>
                <input type="text" tabindex="2" class="form-control datepickerOne" name="Advicedate" id="Advicedate"  autocomplete="off" required>
                  <span id="ad" class="error"></span>
               </div>
               <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Advice No<span  class="error">*</span></label>
                  <input type="text"  class="form-control" name="AdviceNo" id="AdviceNo" value="{{(isset($Last->id))?'ADVI00'.$Last->id:'ADVI000'}}"   readonly>
                  <span id="adn" class="error"></span>
               </div>
                <div class="mb-2 col-md-2">
               </div>
              <div class="mb-2 col-md-2">
               </div>
                    <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Office Name<span class="error">*</span></label>
                    <input type="hidden" name="ToOffce" value="6" class="form-control">
                 <input type="text" name="" value="METROPOLIS LOGISTICS PVT LTD" class="form-control" required>
                
                  <span id="on" class="error"></span>
               </div>
             <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Claim Type</label>
                    <select class="form-control" name="ClaimType" id="ClaimType" tabindex="3" required>
                    <option value="">Select Claim type</option>
                    <option value="Branch Imprest">Branch Imprest</option>
                    <option value="Staff Imprest">Staff Imprest</option>
                  
                 </select>
                  <span id="ct" class="error"></span>
               </div>
                <div class="mb-2 col-md-2">
               </div>
               <div class="mb-2 col-md-2">
               </div>
                <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Office Name<span class="error">*</span></label>
                 <select class="form-control" name="OffcieName" id="OffcieName" tabindex="4" onchange="getFromDepoAmount(this.value)" required>
                    <option value="">Select Depo</option>
                    @foreach($getAllDepo as $depo)
                      <option value="{{$depo->DepoId}}">{{$depo->DepoName}}</option>
                    @endforeach
                 </select>
                
                  <span id="dn" class="error"></span>
               </div>
               <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Balance Amount<span class="error">*</span></label>
                  <input type="text" value="{{$logDepo}}" readonly  class="form-control ToDepoBalace" name="ToDepoBalace" id="ToDepoBalace" required>
                  <span id="ba" class="error"></span>
               </div>
                <div class="mb-2 col-md-2">
               </div>
               <h4 class="header-title nav nav-tabs nav-bordered mb-3"></h4>  
               <div class="crcform">
      
       
            <table class="table table-bordered" id="dynamic_field">
                     <thead>
                      <th width="10%">Amount</th>
                      <th width="10%">Parent A/c</th>
                      <th width="15%">Expense A/c</th>
                      <th width="11%">From Date</th>
                      <th width="11%">To Date</th>
                      <th width="15%">Reference Type</th>
                      <th width="28%">Reference No</th>
                 
                   </thead>
                       <tr>
                        <td>
                        <input class="amnt" type="text" required autocomplete="off" name="Expenses[0][amount]" style="width:100%";/>
                       </td>

                        <td>
                       <input type="text" autocomplete="off" name="Expenses[0][Parent]" style="width:100%"/>
                        </td>
                         <td>
                         <select  class="exp select2" id="exp" name="Expenses[0][Exp]">
                           <option value="">Select</option>
                           @foreach($DebitResion as $debit)
                            <option value="{{$debit->Id}}">{{$debit->Reason}}</option>
                           @endforeach
                        </select>
                         </td>
                        <td>
                     <input type="text"required autocomplete="off" name="Expenses[0][FromDate]" style="width:100%" class="datepickerOne" />
                       </td>
                        <td>
                     <input type="text"required autocomplete="off" name="Expenses[0][ToDate]" style="width:100%" class="datepickerOne"/>
                       </td>
                        <td>
                      <input type="text" autocomplete="off" name="Expenses[0][REfrenceType]" style="width:100%"/>
                       </td>
                     <!--   <td>
                  <input type="text"required autocomplete="off" name="key_learning[]" style="width:90%"/>
                  <button type="button" name="add" id="add" class="btn btn-success">+</button>
                       </td> -->
                    <td align="left">
                   <input  type="text" maxlength="200" id="ctl00_ContentPlaceHolder1_txtReferenceNo" class="txtboxMedium" autocomplete="off" style="text-transform: uppercase; width: 80%;" name="Expenses[0][REfrenceName]">
                   <button type="button" name="ctl00$ContentPlaceHolder1$btnAddReference"  name="add" id="add" class="btn btn-success">+</button>
               </td>
                      
                </tr>
                <thead>
                      <th colspan="2">Vehicle No.</th>
                      <th colspan="2">TripSheet No.</th>
                      <th colspan="2">Remark</th>
                      <th colspan="2">Attach Document</th>

                      
                     
                    
                   </thead>
                   <tbody>
                    <td colspan="2"><input type="text" class="form-control" name="Vehicle"></td>
                      <td colspan="2"><input type="text" class="form-control" name="Tripno"></td>
                      <td colspan="2"><textarea rows="5" class="form-control" name="Reamrk"></textarea></td>
                      <td colspan="2"><input type="file" class="form-control" name="Image2"></td>
                     
                      
                   </tbody>
            </table>
            <div class='mt-2'><input id="submit"  type="submit" name="submit" class="btn btn-primary ">&nbsp;<a href="" class="btn btn-primary">Cancel</a></div>
        </form>
    </div>
               </div>
         </div>
       

   </div>

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


 function DepositeCashToHo()
 {


   if($('#Tdate').val()=='')
   {
      alert('please Enter Deposit Date');
      return false;
   }
   if($('#ToDepo').val()=='')
   {
      alert('please Select To Depo');
      return false;
   }
   
    if($('#Amount').val()=='')
   {
      alert('please Enter Amount');
      return false;
   }
   var FromDepoid=$('#FromDepoid').val();
   var FromdepoBal=$('#FromdepoBal').val();
   var Tdate=$('#Advicedate').val();
   var Amount=$('#Amount').val();
   var ToDepoBalace=$('#ToDepoBalace').val();
   var ToDepo=$('#ToDepo').val();
   var AccType=$('#AccType').val();
   var Mode=$('#Mode').val();
   var Remark=$('#Remark').val();
   if(parseInt(Amount) >=parseInt(FromdepoBal))
   {
     alert('Insufficient balance');
     return false;
   }
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/PostAdvancePayout',
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

        $(document).ready(function(){


            var i = 1;
            $('#add').click(function(){

                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input class="amnt" type="text" required autocomplete="off" name="Expenses['+i+'][amount]"/ style="width:100%"></td><td><input type="text"  autocomplete="off" name="Expenses['+i+'][Parent]" style="width:100%"/></td><td><select  name="Expenses['+i+'][Exp]"><option value="">Select</option>@foreach($DebitResion as $debit)<option value="{{$debit->Id}}">{{$debit->Reason}}</option>@endforeach</select></td><td><input type="text"required autocomplete="off" class="datepickerOne" name="Expenses['+i+'][FromDate]" style="width:100%"/></td><td><input type="text"required autocomplete="off" name="Expenses['+i+'][ToDate]" class="datepickerOne" style="width:100%"/></td><td><input type="text" autocomplete="off" name="Expenses['+i+'][REfrenceType]" style="width:100%"/></td><td><input type="text"required autocomplete="off" name="Expenses['+i+'][REfrenceName]" style="width:80%"/>&nbsp;<button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
                  $('.datepickerOne').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose: true
                    });
            });
                
            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });

            


            $(document).on("click","#submit",function(e){
                if($('#Tdate').val()=='')
               {
                  alert('please Enter Deposit Date');
                  return false;
               }
               if($('#Advicedate').val()=='' ){
                    alert('please Enter Advice Date');
                  return false;
               }
               if($('#ToDepoBalace').val()=='')
               {
                  alert('please Select To Depo');
                  return false;
               }
               
                if($('.amnt').val()=='')
               {
                  alert('please Enter Amount');
                  return false;
               } 
                var sum=0;
               $(".amnt").each(function(i){
                sum += parseInt($(this).val());
               });
                
             var depB=  $("#ToDepoBalace").val();
                if(depB >= sum){ 
                    $("#formid").submit();

                }
                else{
                    alert("Insufficient Balance Amount");
                    return false;
                }
            });

            setTimeout(hidealert,2000);
       function hidealert(){

            $('.alert').removeClass('show');
          }
            
        });


$(".select2").select2('destroy');
$('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd'
            });

 
</script>