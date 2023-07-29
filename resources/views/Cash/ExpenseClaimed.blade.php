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
<div class="row pl-pr mt-1">
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
            <div class="row pl-pr">
           
                 <div class="col-5 m-b-1">
                <div class="row">
               <label for="example-select" class="form-label col-md-3">Advice Date<span  class="error">*</span></label>
               <div class="col-md-6">
                <input type="text" tabindex="2" class="form-control datepickerOne" name="Advicedate" id="Advicedate"  autocomplete="off" required>
                  <span id="ad" class="error"></span>
               </div>
             </div>
           </div>
               <div class="col-5 m-b-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Advice No</label>
                  <div class="col-md-6">
                  <input type="text"  class="form-control" name="AdviceNo" id="AdviceNo" value="{{$Last}}"   readonly>
                  <span id="adn" class="error"></span>
               </div>
             </div>
           </div>
                <div class="col-2 m-b-1">
               </div>
              
                     <div class="col-5 m-b-1">
                      <div class="row">
                  <label for="example-select" class="form-label col-md-3">Company Name</label>
                  <div class="col-md-6">
                    <input type="hidden" name="ToOffce" value="1" class="form-control" id="ToOffce">
                 <input type="text" name="" value="METROPOLIS LOGISTICS PVT LTD" class="form-control" required>
                
                  <span id="on" class="error"></span>
                </div>
              </div>
               </div>
              <div class="col-5 m-b-1">
              <div class="row">
                  <label for="example-select" class="form-label col-md-3">Claim Type</label>
                  <div class="col-md-6">
                    <select class="form-control selectBox" name="ClaimType" id="ClaimType" tabindex="3" required>
                    <option value="Branch Imprest">Branch Imprest</option>
                    <option value="Staff Imprest">Staff Imprest</option>
                  
                 </select>
                  <span id="ct" class="error"></span>
                </div>
              </div>
               </div>
                <div class="col-2 m-b-1">
               </div>
               
                <div class="col-5 mb-1">
                  <div class="row">
                  <label for="example-select" class="form-label col-md-3">Office Name<span class="error">*</span></label>
                  <div class="col-md-6">
                 <select class="form-control selectBox" name="OffcieName" id="OffcieName" tabindex="4" onchange="getFromDepoAmount(this.value)" required>
                    <option value="">Select Office</option>
                    @foreach($getAllDepo as $depo)
                      <option value="{{$depo->id}}">{{$depo->OfficeCode}}~ {{$depo->OfficeName}}</option>
                    @endforeach
                 </select>
                
                  <span id="dn" class="error"></span>
                </div>
              </div>
               </div>
              <div class="col-5 mb-1">
                <div class="row">
                  <label for="example-select" class="form-label col-md-3">Balance Amount</label>
                  <div class="col-md-6">
                  <input type="number" value="{{number_format($logDepo,2,'.','')}}" readonly  class="form-control ToDepoBalace" name="ToDepoBalace" id="ToDepoBalace" required>
                  <span id="ba" class="error"></span>
               </div>
             </div>
           </div>
                <div class="col-2 m-b-1">
               </div>
               
               <div class="crcform">
      
       
            <table class="table table-bordered" id="dynamic_field">
                     <thead>
                      <tr class="main-title text-dark">

                      <th width="10%" class="p-1">Amount<span  class="error">*</span></th>
                      <th width="10%" class="p-1">Parent A/c</th>
                      <th width="15%" class="p-1">Expense A/c<span  class="error">*</span></th>
                      <th width="11%" class="p-1">From Date<span  class="error">*</span></th>
                      <th width="11%" class="p-1">To Date<span  class="error">*</span></th>
                      <th width="15%" class="p-1">Reference Type<span  class="error">*</span></th>
                      <th width="28%" class="p-1">Reference No</th>
                    </tr>
                 
                   </thead>
                       <tr>
                        <td class="p-1" >
                        <input onchange="checkValidation(this.value);" class="amnt form-control" id="amount0" type="text" required autocomplete="off" name="Expenses[0][amount]" style="width:100%";/>
                       </td>

                        <td class="p-1">
                       <input type="text" id="Parent0" autocomplete="off" name="Expenses[0][Parent]" style="width:100%" class="form-control" />
                        </td>
                         <td class="p-1">
                         <select  class="exp selectBox form-control" id="exp0" name="Expenses[0][Exp]">
                           <option value="">Select</option>
                           @foreach($DebitResion as $debit)
                            <option value="{{$debit->Id}}">{{$debit->Reason}}</option>
                           @endforeach
                        </select>
                         </td>
                        <td class="p-1">
                     <input type="text"required autocomplete="off" id="FromDate0" name="Expenses[0][FromDate]" style="width:100%" class="datepickerOne form-control" />
                       </td>
                        <td class="p-1">
                     <input type="text"required autocomplete="off" id="ToDate0" name="Expenses[0][ToDate]" style="width:100%" class="datepickerOne form-control" />
                       </td>
                        <td class="p-1">
                      <input type="text" autocomplete="off" id="REfrenceType0" name="Expenses[0][REfrenceType]" class="form-control" style="width:100%"/>
                       </td>
                     <!--   <td>
                  <input type="text"required autocomplete="off" name="key_learning[]" style="width:90%"/>
                  <button type="button" name="add" id="add" class="btn btn-success">+</button>
                       </td> -->
                    <td align="left" class="p-1 d-flex justify-content-around align-items-center">
                   <input id="REfrenceName0"   type="text" maxlength="200" id="ctl00_ContentPlaceHolder1_txtReferenceNo" class="txtboxMedium form-control" autocomplete="off" style="text-transform: uppercase; width: 80%;" name="Expenses[0][REfrenceName]">
                   <button type="button" name="ctl00$ContentPlaceHolder1$btnAddReference"  name="add" id="add" class="btn btn-primary">+</button>
               </td>
                      
                </tr>
                <thead>
                  <tr class="main-title text-dark">
                      <th colspan="4" class="p-1">Remark<span  class="error">*</span></th>
                      <th colspan="4" class="p-1">Attach Document</th>
                  </tr>
                   </thead>
                   <tbody>
                      <td colspan="4" class="p-1"><textarea id="Reamrk" rows="2" class="form-control" name="Reamrk"></textarea></td>
                      <td colspan="4" class="p-1 text-start">
                        <input id="Image2"  type="file" class="form-control" name="Image2">
                          <input value="Submit" id="submit"  type="button" name="submit" class="btn btn-primary mt-1" style="margin-right: 5px;"> 
                      <a href="" class="btn btn-primary mt-1">Cancel</a>  
                      </td>
                      
                   </tbody>
            </table>
           
             <div class="row mt-1 mb-1 justify-content-end">
                <div class="col-6 d-flex"> 
                   <lable style="width: 156px;">Advice Number</lable>
                  <input   id="Print_number"  type="text" name="Print_number" class="form-control  " style="margin-right: 5px;">   
               
                <button onclick="getPrint();"  id="Print"  type="button" name="submit" class="btn btn-primary " style="width:120px;">Advice Print</button> 
                
                  
                  </div>     
                </div>   
            
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
<iframe style="display:none;"  id="framId" name="printf"  title="Print"></iframe>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          todayHighlight:true,
          autoclose:true
   });
  $("#Advicedate").val("{{date('d-m-Y')}}");
 $(".selectBox").select2();
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
          $('.ToDepoBalace').val(parseFloat(data).toFixed(2));
         }
         else
         {
          $('.ToDepoBalace').val('');
         }
         
        }
     });
 }

        $(document).ready(function(){


            var i = 0;
            $('#add').click(function(){

                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input id="amount'+i+'" class="amnt" type="text" required autocomplete="off" name="Expenses['+i+'][amount]"/ style="width:100%"></td><td><input id="Parent'+i+'" type="text"  autocomplete="off" name="Expenses['+i+'][Parent]" style="width:100%"/></td><td><select id="exp'+i+'" class="exp form-control selectBox2"   name="Expenses['+i+'][Exp]"><option value="">Select</option>@foreach($DebitResion as $debit)<option value="{{$debit->Id}}">{{$debit->Reason}}</option>@endforeach</select></td><td><input id="FromDate'+i+'" type="text"required autocomplete="off" class="datepickerTwo" name="Expenses['+i+'][FromDate]" style="width:100%"/></td><td><input id="ToDate'+i+'" type="text"required autocomplete="off" name="Expenses['+i+'][ToDate]" class="datepickerTwo" style="width:100%"/></td><td><input id="REfrenceType'+i+'" type="text" autocomplete="off" name="Expenses['+i+'][REfrenceType]" style="width:100%"/></td><td><input  id="REfrenceName'+i+'" type="text"required autocomplete="off" name="Expenses['+i+'][REfrenceName]" style="width:80%"/>&nbsp;<button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
                    $('.datepickerTwo').datepicker({
                        format: 'dd-mm-yyyy',
                        todayHighlight:true,
                        autoclose:true
                  });
                  $(".selectBox2").select2();
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

               if($('#Reamrk').val()=='')
               {
                  alert('please Enter Remark');
                  return false;
               }
               var Totlength =  $('.amnt').length;
               for(var J=0; J<Totlength; J++){
                 if( $("#amount"+J).val() ==""){
                    alert("Please Enter Amount");
                    return false;
                 }
                 if( $("#exp"+J).val() ==""){
                    alert("Please Enter A/C Expance");
                    return false;
                 }
                 if( $("#ToDate"+J).val() ==""){
                    alert("Please Enter To Date");
                    return false;
                 }
                 if( $("#FromDate"+J).val() ==""){
                    alert("Please Enter From Date");
                    return false;
                 }
                 if( $("#REfrenceType"+J).val() ==""){
                    alert("Please Enter Referance");
                    return false;
                 }
                 
               }
                var sum=0;
               $(".amnt").each(function(i){
                sum += parseInt($(this).val());
               });
                
               var depB=  $("#ToDepoBalace").val();
                if(depB >= sum){ 
                   // $("#formid").submit();

       

                var base_url = '{{url('')}}';
                var formdata = new FormData();
                formdata.append("Advicedate", $("#Advicedate").val());
                formdata.append("AdviceNo", $("#AdviceNo").val());
                formdata.append("ToOffce", $("#ToOffce").val());
                formdata.append("ClaimType", $("#ClaimType").val());
                formdata.append("OffcieName", $("#OffcieName").val());
                formdata.append("ToDepoBalace", $("#ToDepoBalace").val());
                formdata.append("Reamrk", $("#Reamrk").val());
                if($("#Image2").val()!=""){
                formdata.append("Image2", $("#Image2")[0].files[0]);
                }
                var indx =0;
                $(".amnt").each(function(indx){
                  formdata.append("Expenses["+indx+"][amount]", $("#amount"+indx).val());
                  formdata.append("Expenses["+indx+"][Parent]", $("#Parent"+indx).val());
                  formdata.append("Expenses["+indx+"][exp]", $("#exp"+indx).val());
                  formdata.append("Expenses["+indx+"][FromDate]", $("#FromDate"+indx).val());
                  formdata.append("Expenses["+indx+"][ToDate]", $("#ToDate"+indx).val());
                  formdata.append("Expenses["+indx+"][REfrenceType]", $("#REfrenceType"+indx).val());
                  formdata.append("Expenses["+indx+"][REfrenceName]", $("#REfrenceName"+indx).val());
                  ++indx;
                });

               $.ajax({
               type: 'POST',
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
               },
               url: base_url + '/ExpenseClaimedPOST',
               cache: false,
               processData:false,
               contentType:false,
               data: formdata,
               success: function(data) {
                  var obj = JSON.parse(data);
                  alert(obj.Status);
                 
                  $(".btn_remove").trigger('click');
                 
                  $('.amnt').val('');
                  $("#Parent0").val('');
                  $("#REfrenceType0").val('');
                  $("#REfrenceName0").val('');
                  $(".datepickerOne").val('');
                  $(".exp").val('').trigger('change');
                  $('#Reamrk').val('');
                  $("#OffcieName").val('').trigger('change');
                  $("#ToDepoBalace").val('');
                  $("#Image2").val('');
                  $("#AdviceNo").val(obj.advice);
                  $("#Print_number").val(obj.adviceprint);
               }
               });

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
               //ExpenseClaimedPOST
        });


$(".select2").select2('destroy');
$('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd',
          autoClose:true
            });

 function getPrint(){
  var printNumber =  $("#Print_number").val();
  if(printNumber==""){
     alert("Please Enter Advice Number");
     return false;
  }
  else{
     var base_url ="{{url('printAdviceNo?Advice=')}}"+printNumber;
     document.getElementById("framId").setAttribute("src", base_url); //attr("src",base_url);
     setTimeout(() => {
      window.frames["printf"].print();
     }, 1000);
     
  }
 }


 function checkValidation(Amount){
         var ToDepoBalace=$('#ToDepoBalace').val();
         if(parseFloat(Amount) > parseFloat(ToDepoBalace))
            {
               alert('Insufficient balance');
               $("#amount0").val('');
               $("#amount0").focus();
            return false;
            }
   }    
</script>