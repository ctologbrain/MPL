@include('layouts.appTwo')
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
</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">EXPENSE PAYMENT</li>
                    </ol>
                </div>
                <h4 class="page-title">EXPENSE PAYMENT</h4>
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
                                                <label class="col-md-4 col-form-label" for="payment_date">Payment Date</label>
                                               
                                                <div class="col-md-7">
                                                <input type="text" tabindex="1" class="form-control payment_date datepickerOne" name="payment_date" id="payment_date" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-4 col-form-label" for="advice_no">Advice No</label>
                                                <div class="col-md-3">
                                                <input type="text" tabindex="2" class="form-control advice_no" name="advice_no" id="advice_no" style="background-color: #FFC0CB;min-width: 110px;">
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" disabled="disabled">
                                                <span class="error"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="button" class="btn btn-primary" value="Process" tabindex="3">
                                                    <input type="button" class="btn btn-primary" value="Cancel" tabindex="4">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-4 col-form-label" for="company_name">Company Name</label>
                                                <div class="col-md-7">
                                               <input type="text" class="form-control company_name" id="company_name" disabled="disabled">
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-4 col-form-label" for="claim_type">Claim Type</label>
                                                <div class="col-md-7">
                                              <input type="text" class="form-control claim_type" id="claim_type" disabled="disabled">   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-4 col-form-label" for="office_name">Office Name</label>
                                                <div class="col-md-7">
                                               <input type="text" class="form-control office_name" id="office_name" disabled="disabled">    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-4 col-form-label" for="employee_name">Employee Name</label>
                                               
                                                <div class="col-md-7">
                                                <input type="number" tabindex="6" class="form-control employee_name" name="employee_name" id="employee_name" value="" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-4 col-form-label" for="advice_date">Advice Date</label>
                                               
                                                <div class="col-md-7">
                                                <input type="text" tabindex="7" class="form-control advice_date datepickerOne" name="advice_date" id="advice_date" value="" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1">
                                                <label class="col-md-4 col-form-label" for="total_expense">Total No Of Expense</label>
                                               
                                                <div class="col-md-7 d-flex">
                                                <input type="text" tabindex="8" class="form-control total_expense" name="total_expense" id="total_expense" value="" disabled="disabled"/>
                                                
                                                
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
        <h4 class="text-start main-title p-1 m-b-1">Special Expense Detail</h4>
       
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
                                            <div class="row m-b-1 mt-1">
                                                  <label class="col-md-4 col-form-label" for="request_by">Request By</label>
                                                   <div class="col-md-7">
                                                <input type="text" tabindex="10" class="form-control  request_by" name="request_by" id="request_by" value="" disabled="disabled">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row m-b-1 mt-1">
                                                  <label class="col-md-4 col-form-label" for="approved_by">Approved By</label>
                                                   <div class="col-md-7">
                                                <input type="text" tabindex="10" class="form-control  approved_by" name="approved_by" id="approved_by" value="" disabled="disabled">
                                                </div>
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