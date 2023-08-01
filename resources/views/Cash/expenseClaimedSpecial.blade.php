@include('layouts.appOne')
<style>
    label{
        font-weight: 800;
    }
    input:disabled + label {
    opacity: 1;
    cursor: default;
    margin-left: 10px;
}
.total_amount{
    width: 120px;
}
.table {
    margin-bottom: 0.5rem;
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
                        <li class="breadcrumb-item active">EXPENSE CLAIMED - SPECIAL</li>
                    </ol>
                </div>
                <h4 class="page-title">EXPENSE CLAIMED - SPECIAL</h4>
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
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-3 col-form-label" for="advice_date">Advice Date<span class="error">*</span></label>
                                               
                                                <div class="col-md-5">
                                                <input type="text" class="form-control advice_date datepickerOne" name="advice_date" id="advice_date" value="" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-3 col-form-label" for="advice_no">Advice No</label>
                                                <div class="col-md-5">
                                                <input type="text" tabindex="1" class="form-control advice_no" name="advice_no" id="advice_no" style="background-color: #FFC0CB;">
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" disabled="disabled">
                                                <span class="error"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                       
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-3 col-form-label" for="company_name">Company Name</label>
                                                <div class="col-md-8">
                                                    <select class="selectBox form-control" name="company_name" id="company_name" tabindex="2">
                                                        <option>METROPOLIS LOGISTICS PVT LTD</option>
                                                    </select>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-3 col-form-label" for="claim_type">Claim Type</label>
                                                <div class="col-md-5">
                                              <select class="selectBox form-control" id="claim_type" name="claim_type" tabindex="3">
                                                        <option>Branch Imprest</option>
                                                    </select>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-3 col-form-label" for="office_name">Office Name</label>
                                                <div class="col-md-8">
                                               <input type="text" class="form-control office_name" id="office_name" tabindex="4">    
                                                </div>
                                            </div>
                                        </div>
                                       
                                       
                                       
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-3 col-form-label" for="balance_amount">Balance Amount</label>
                                               
                                                <div class="col-md-5">
                                                <input type="text" tabindex="8" class="form-control balance_amount" name="balance_amount" id="balance_amount" value="" disabled="disabled"/>
                                                
                                               
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
        <div class="table-responsive a">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr class="main-title">
                        <th class="p-1 text-center" style="min-width: 60px;">Amount<span class="error">*</span></th>
                        <th class="p-1 text-center" style="min-width: 80px;">Parent A/C</th>
                        <th class="p-1 text-center" style="min-width: 80px;">Expense A/C<span class="error">*</span></th>
                        <th class="p-1 text-center" style="min-width: 20px;">From Date<span class="error">*</span></th>
                        <th class="p-1 text-center" style="min-width: 20px;">To Date<span class="error">*</span></th>
                        <th class="p-1 text-center" style="min-width: 100px;">Reference Type<span class="error">*</span></th>
                        <th class="p-1 text-start" style="min-width: 380px;">Reference No</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-1 text-center">
                            <input type="text" class="form-control amount" name="amount" id="amount" tabindex="5">
                        </td>
                         <td class="p-1 text-center">
                            <input type="text" class="form-control amount" name="amount" id="amount" tabindex="6">
                        </td>
                         <td class="p-1 text-center">
                            <input type="text" class="form-control amount" name="amount" id="amount" tabindex="7">
                        </td>
                         <td class="p-1 text-center">
                            <input type="text" class="form-control amount" name="amount" id="amount" tabindex="8">
                        </td>
                         <td class="p-1 text-center">
                            <input type="text" class="form-control amount" name="amount" id="amount" tabindex="9">
                        </td>
                         <td class="p-1 text-center">
                            <input type="text" class="form-control amount" name="amount" id="amount" tabindex="10">
                        </td>
                        <td class="p-1 text-center d-flex">
                            <input type="text" class="form-control amount" name="amount" id="amount" style="width: 70%;margin-right: 10px;" tabindex="11">
                            <input type="button" class="btn btn-primary" value="Add" tabindex="12">
                        </td>
                    </tr>
                    <tr class="main-title">
                        <td class="p-1 text-center" colspan="3">
                            <span style="font-weight: 800;">Remarks<span class="error">*</span></span>
                        </td>
                        <td class="p-1 text-start" colspan="3">
                            <span style="font-weight: 800;">Attach Document</span>
                        </td>
                        <td class="p-1 text-start">
                           <span style="font-weight: 800;"> Action</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-1 text-center" colspan="3">
                            <input type="text" name="Remarks" class="form-control" id="Remarks" tabindex="13">
                        </td>
                        <td class="p-1 text-start" colspan="3">
                            <input type="file" name="document" class="" id="document" tabindex="14">
                        </td>
                        <td class="p-1 text-start">
                           <input type="button" class="btn btn-primary" value="Save" tabindex="15">
                           <input type="button" class="btn btn-primary" value="Cancel" tabindex="16">
                        </td>
                    </tr>
                    <tr class="main-title">
                        <td colspan="7" class="p-1 text-center"><span style="font-weight: 800;">Record Not Available...</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-7">
        </div>
        <div class="col-5 mb-1 text-end">
            <div class="row">
                 <label class="col-md-3 col-form-label" for="advice_no">Advice Number</label>
                <div class="col-md-6">
                    <input type="text" tabindex="1" class="form-control advice_no" name="advice_no" id="advice_no" style="background-color: #FFC0CB;" tabindex="17">
                </div>
                <div class="col-md-2">
                    <input type="button" class="btn btn-primary" value="Re Print Advice" tabindex="18">
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