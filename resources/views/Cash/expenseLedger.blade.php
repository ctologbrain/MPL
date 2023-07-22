@include('layouts.appOne')
<style>
    label{
        font-weight: 800;
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
                        <li class="breadcrumb-item active">EXPENSE LEDGER</li>
                    </ol>
                </div>
                <h4 class="page-title">EXPENSE LEDGER 
                </h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row bdr-btm">
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="account_type">Account Type</label>
                                                <div class="col-md-6">
                                                <select class="form-control selectBox account_type" id="account_type" name="account_type" tabindex="1">
                                                    <option value="1">Expense</option>
                                                    <option value="2">Staff Imprest</option>
                                                    <option value="3">Branch Imprest</option>
                                                </select>
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid">
                                                <span class="error"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-5 m-b-1">
                                           
                                        </div>  
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="ledger_type">Ledger Type</label>
                                                <div class="col-md-6">
                                              <select class="form-control selectBox ledger_type" id="ledger_type" name="ledger_type" tabindex="2">
                                                    <option value="1">Main Ledger</option>
                                                    <option value="2">Sub Ledger</option>
                                                    
                                                </select>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            
                                        </div>
                                        <div class="col-2">
                                        </div>
                                       
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="applicable_for">Applicable for</label>
                                               
                                                <div class="col-md-6">
                                               <select class="form-control selectBox applicable_for" id="applicable_for" name="applicable_for" tabindex="3">
                                                    <option value="1">BOTH</option>
                                                    <option value="2">Staff Imprest</option>
                                                    <option value="3">Branch Imprest</option>
                                                    
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            
                                            
                                        </div>
                                        <div class="col-2">
                                        </div>
                                         <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="ledger_name">Ledger Name<span class="error">*</span></label>
                                               
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control ledger_name" name="ledger_name" id="ledger_name" tabindex="4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-6 col-form-label" for="parent_ac">Parent A/C</label>
                                               
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control parent_ac" name="parent_ac" id="parent_ac" tabindex="5">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="refrence_type">Reference Type</label>
                                                <div class="col-md-6">
                                              <select class="form-control selectBox refrence_type" id="ledger_type" name="refrence_type" tabindex="6">
                                                    <option value="1">AWB</option>
                                                    <option value="2">BAG</option>
                                                    <option value="3">VEHICLE</option>
                                                    <option value="4">BILL NO</option>
                                                    <option value="5">RFQ</option>
                                                    <option value="6">OTHER</option>
                                                </select>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1 align-items-center">
                                                <label class="col-md-6 col-form-label" for="supp_doc">Supporting Document Required</label>
                                               
                                                <div class="col-md-6">
                                                    <input type="checkbox" class="supp_doc" name="supp_doc" id="supp_doc" tabindex="7">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="customer_charges">Customer Charges</label>
                                               
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control customer_charges" name="customer_charges" id="customer_charges" tabindex="8">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bdr-btm">
                                        <div class="col-5 mt-1">
                                            <div class="row m-b-1 align-items-center">
                                                <label class="col-md-5 col-form-label" for="approval_required">Approval Required</label>
                                                <div class="col-md-5">
                                                    <input type="checkbox" name="approval_required" class="approval_required" id="approval_required" tabindex="9">
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid">
                                                <span class="error"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-5 mt-1">
                                            <div class="row m-b-1">
                                                <label class="col-md-6 col-form-label" for="approval_required_above">Approval Required Above</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="approval_required_above" class="approval_required_above" id="approval_required_above" tabindex="9" disabled="disabled" style="width: 100%;">
                                               
                                                </div>
                                                <div class="col-md-2"> Amount</div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="authorise_person">Authorise Person</label>
                                               
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control authorise_person" name="authorise_person" id="authorise_person" tabindex="10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row bdr-btm">
                                        <div class="col-5 mt-1">
                                            <div class="row m-b-1 align-items-center">
                                                <label class="col-md-5 col-form-label" for="recurring_expense">Recurring Expense</label>
                                                <div class="col-md-5">
                                                    <input type="checkbox" name="recurring_expense" class="recurring_expense" id="recurring_expense" tabindex="9">
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid">
                                                <span class="error"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-5 mt-1">
                                            <div class="row m-b-1">
                                                <label class="col-md-6 col-form-label" for="recurrence_type">Recuurence Type</label>
                                                <div class="col-md-6">
                                                   <select class="form-control recurrence_type selectBox" id="recurrence_type" name="recurrence_type" disabled="disabled">
                                                       <option>Weekly</option>
                                                   </select>
                                               
                                                </div>
                                               
                                                
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-5 col-form-label" for="recieving_expected_day">Expected Day Receiving Day</label>
                                               
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control recieving_expected_day" name="recieving_expected_day" id="recieving_expected_day" tabindex="10" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            
        </div> <!-- end col -->
    </div>
    
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row bdr-btm">
                                        <div class="col-5">
                                            <div class="row m-b-1 mt-1">
                                                  <label class="col-md-5 col-form-label" for="remarks"> Remarks</label>
                                                   <div class="col-md-6">
                                                        <textarea class="remarks" id="remarks" name="remarks" rows="3" cols="26">
                                                            
                                                        </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <input type="button" class="btn btn-primary" value="Save" >
                                            <input type="button" class="btn btn-primary" value="Cancel" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row m-b-1 mt-1">
                                                  <label class="col-md-4 col-form-label" for="ledger_name"> Search by Ledger Name</label>
                                                   <div class="col-md-6">
                                                      <input type="text" name="ledger_name" class="form-control ledger_name" id="ledger_name">
                                                    </div>
                                                    <div class="col-md-1">
                                                         <input type="button" class="btn btn-primary" value="Go" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end mt-1">
                                            <input type="button" class="btn btn-primary" value="Export" >
                                           
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                        <div class="table-responsive a">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="main-title">
                                                    <th class="p-1 text-center" style="min-width:100px;">ACTION</th>
                                                    <th class="p-1 text-center" style="min-width:20px;">SL#</th>
                                                    <th class="p-1 text-start" style="min-width:140px;">Account Type</th>
                                                    <th class="p-1 text-start" style="min-width:100px;">Ledger Type</th>
                                                    <th class="p-1 text-start" style="min-width:140px;">Applicable For</th>
                                                    <th class="p-1 text-start" style="min-width:140px;">Parent Account</th>
                                                    <th class="p-1 text-start" style="min-width:100px;">Ledger Name</th>
                                                    <th class="p-1 text-start" style="min-width:140px;">Customer Charges</th>
                                                    <th class="p-1 text-start" style="min-width:140px;">Reference Type</th>
                                                    <th class="p-1 text-start" style="min-width:130px;">Approval Required</th>
                                                    <th class="p-1 text-start" style="min-width:100px;">Amount</th>
                                                    <th class="p-1 text-start" style="min-width:140px;">Authorise Person</th>
                                                    <th class="p-1 text-start" style="min-width:240px;">Supporting Document Required</th>
                                                     <th class="p-1 text-start" style="min-width:140px;">Recurring Expense</th>
                                                     <th class="p-1 text-start" style="min-width:140px;">Recurrence Type </th>
                                                     <th class="p-1 text-start" style="min-width:140px;">Expected Bill Day</th>
                                                     <th class="p-1 text-start" style="min-width:200px;">Expected Bill Amount</th>
                                                     <th class="p-1 text-start" style="min-width:100px;">Remarks</th>
                                                     <th class="p-1 text-center" style="min-width:20px;">Active</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="p-1 text-center"><a href="#">View</a> | <a href="#">Edit</a></td>
                                                        <td class="p-1 text-center">
                                                            1
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                        <td class="p-1 text-start">
                                                           
                                                        </td>
                                                       

                                                       

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
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
<div style="display:none;">
<iframe id="printf" name="printf"></iframe>
</div>
<script src="{{url('public/js/custome.js')}}"></script>
<script type="text/javascript">
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es' ,
          autoclose:true,
           todayHighlight: true,
      });
  var base_url = '{{url('')}}';
   

  function EnterDocket(Docket)
  {
    var base_url = '{{url('')}}';
    var pickup=$('#pickup').val();
    var scanDate=$('#scanDate').val();
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/submitPickupSacn',
           cache: false,
           data: {
           'Docket':Docket,'pickup':pickup,'scanDate':scanDate
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status=='true')
                {
                    $('.docketNo').val('');
                    $('.tabels').html(obj.table)
                }
                else{
                    alert(obj.message)
                    $('.docketNo').val('');
                }
                
                

            
            }
            });
  }

    function genrateNO(){
        var base_url = '{{url('')}}';
        if($("#scanDate").val()=='')
           {
              alert('Please Enter Scan Date');
              return false;
           }
           // if($("#vehicleType").val()=='')
           // {
           //    alert('please select  Vehicle Type');
           //    return false;
           // }
           
            if($("#vendorName").val()=='')
           {
              alert('Please Enter Vendor Name');
              return false;
           }


            if($("#vehicleNo").val()=='')
           {
              alert('Please Select vehicle No');
              return false;
           }
            if($("#driverName").val()=='')
           {
              alert('Please Select driver Name');
              return false;
           }
           
           

           if($("#startkm").val()=='')
           {
              alert('Please Enter Start KM');
              return false;
           }

           if($("#endkm").val()=='')
           {
              alert('Please Enter End KM');
              return false;
           }

           if(parseInt($("#startkm").val()) >= parseInt($("#endkm").val()))
           {
             alert('Please Verify the KMs');
              return false;
           }

           if($("#vehicleType").val()=='Market Vehicle'){
                if($("#marketHireAmount").val()=='')
               {
                  alert('Please Enter Market Hire Amount');
                  return false;
               }
               if($("#advanceToBePaid").val()=='')
               {
                  alert('Please Enter Advance To be Paid');
                  return false;
               }
               if($("#paymentMode").val()=='')
               {
                  alert('Please Select Payment Mode');
                  return false;
               }
               if($("#advanceType").val()=='')
               {
                  alert('Please Select Advance Type');
                  return false;
               }
            
           }

            if($("#unloadingSupervisorName").val()=='')
           {
              alert('Please Enter Unloading Supervisor');
              return false;
           }
           if($("#pickupPersonName").val()=='')
           {
              alert('Please Enter Pickup Person Name');
              return false;
           }
           
          
           var  scanDate = $("#scanDate").val();
           var vehicleType  = $("#vehicleType").val();
           var vendorName  = $("#vendorName").val();
           var vehicleNo  = $("#vehicleNo").val();
           var driverName  = $("#driverName").val();
           var startkm  = $("#startkm").val();
           var endkm  = $("#endkm").val();
           var marketHireAmount  = $("#marketHireAmount").val();
           var unloadingSupervisorName  = $("#unloadingSupervisorName").val();
           var pickupPersonName  = $("#pickupPersonName").val();
           var remark  = $("#remark").val();
           var docketNo  = $("#docketNo").val();
           var advanceToBePaid  = $("#advanceToBePaid").val();
           var paymentMode  = $("#paymentMode").val();
           var advanceType  = $("#advanceType").val();

           if(confirm('Are You Sure To Generate Pickup Number?')){
           $(".btnSubmit").attr("disabled", true);
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/AddPickuSacn',
           cache: false,
           data: {
           'scanDate':scanDate,'vehicleType':vehicleType,'vendorName':vendorName,'vehicleNo':vehicleNo,'driverName':driverName,'startkm':startkm,'endkm':endkm,'marketHireAmount':marketHireAmount,
            'unloadingSupervisorName':unloadingSupervisorName,
            'pickupPersonName':pickupPersonName,
            'remark':remark,
            'advanceToBePaid':advanceToBePaid,
            'paymentMode':paymentMode,
            'advanceType':advanceType
            
       }, 
            success: function(data) {
                const obj = JSON.parse(data);
                $('.docketNo').attr('readonly', false);
                $('.pickupIn').text(obj.data);
                $('.pickup').val(obj.LastId);
                $('.pickupNumber').val(obj.data);
            }
            });
       }
    }

   

    function selectVehicle(){
    var vehicleType=   $("#vehicleType").val()
    if(vehicleType=="Market Vehicle"){
        $("#marketHireAmountInput").removeClass('d-none');
     $("#advanceToBePaidInput").removeClass('d-none');
      $("#paymentModeInput").removeClass('d-none');
       $("#advanceTypeInput").removeClass('d-none');
   }
   if(vehicleType=="Vendor Vehicle"){
    $("#marketHireAmountInput").addClass('d-none');
     $("#advanceToBePaidInput").addClass('d-none');
      $("#paymentModeInput").addClass('d-none');
       $("#advanceTypeInput").addClass('d-none');
   }

    }
function getVendorVehicle(id)
{
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetVendorVehicle',
       cache: false,
       data: {
           'id':id
       }, 
       success: function(data) {
        $('.VehcleList').html(data);
       }
     });
}

function printNO(){
    var base_url = '{{url('')}}';
    var PickupNo = $("#pickupNumber").val();
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/EditPickupScanPrint',
       cache: false,
       data: {
           'PickupNo':PickupNo
       }, 
       success: function(data) {
        if(data){
        var newWin = window.frames["printf"];
            newWin.document.write('<body onload="window.print()">'+data+'</body>');
            newWin.document.close();
        }
        else{
            alert('Pickup Scan no. Not Found');
           }
       }
     });
}

function KiloMiterCheck(){
    if(parseInt($("#startkm").val()) >= parseInt($("#endkm").val()))
           {
             alert('Please Verify the KMs');
              $("#endkm").val('');
              $("#endkm").focus();
    }
}

</script>