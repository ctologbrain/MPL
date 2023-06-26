@include('layouts.appFour')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">VENDOR DOCKET MAPPING</li>
                    </ol>
                </div>
                <h4 class="page-title">VENDOR DOCKET MAPPING</h4>
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
                                    <div class="row pl-pr">
                                        <div class="col-6 p-1">
                                            <div class="row border">
                                                <div class="col-12">
                                                    <div class="row mt-1">
                                                        <label class="col-md-3 col-form-label" for="vendor_name"><b>Vendor Name</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-7">
                                                            <input type="text" tabindex="1" class="form-control vendor_name" name="vendor_name" id="vendor_name" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row mb-1">
                                                        <label class="col-md-3 col-form-label" for="vendor_docket_no"><b>Vendor Docket No</b><span
                                                        class="error">*</span></label>
                                                        <div class="col-md-5">
                                                         <input type="text" tabindex="2" class="form-control vendor_docket_no" name="vendor_docket_no" id="vendor_docket_no" >
                                                        </div>
                                                    </div>
                                                </div>  
                                                <hr>
                                                <div class="col-12">
                                                    <div class="row mt-1">
                                                        <label class="col-md-3 col-form-label" for="Order_no"><b>Docket Number</b><span
                                                        class="error">*</span></label>
                                                        <div class="col-md-5">
                                                            <input type="text" tabindex="3" class="form-control Order_no" name="Order_no" id="Order_no" >  
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pl-pr mt-1 mb-0">
                                                <div class="col-6">
                                                <input type="button" name="save" class="btn btn-primary" value="Save" tabindex="4">
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="col-5 border m-left_1 mt-1">
                                            <table style="width: 100%;" class="mt-1">
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-start"><b>Address1:</b></td>
                                                    <td style="min-width: 250px;" class="text-start">
                                                        <input type="text" name="address1" class="form-control" id="address1" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-start"><b>Address2:</b></td>
                                                    <td style="min-width: 250px;" class="text-start">
                                                         <input type="text" name="address2" class="form-control" id="address2" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-start"><b>Pincode:</b></td>
                                                    <td style="min-width: 250px;" class="text-start d-flex">
                                                         <input type="text" name="pincode" class="form-control" id="pincode" disabled>
                                                         <span style="min-width: 50px;padding-left: 10px;">City</span>
                                                         <input type="text" name="city" class="form-control" id="city" disabled>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-start"><b>State:</b></td>
                                                    <td style="min-width: 250px;" class="text-start">
                                                         <input type="text" name="state" class="form-control" id="state" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-start"><b>GST No:</b></td>
                                                    <td style="min-width: 250px;" class="text-start">
                                                        <div class="col-md-7">
                                                        <input type="text" name="gst_no" class="form-control" id="gst_no" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                      <div class="row tabels">
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end col -->
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