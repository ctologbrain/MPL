@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">VENDOR BILL ENTRY</li>
                    </ol>
                </div>
                <h4 class="page-title">VENDOR BILL ENTRY</h4>
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
                                    <div class="row p-1">
                                        <div class="col-6 border p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="vendor_name"><b>Vendor Name</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" tabindex="1" class="form-control vendor_name" name="vendor_name" id="vendor_name" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="billNo"><b>Bill No</b><span
                                                        class="error">*</span></label>
                                                        <div class="col-md-5">
                                                         <input type="text" tabindex="2" class="form-control billNo" name="billNo" id="billNo" >
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="Order_no"><b>Order No</b></label>
                                                        <div class="col-md-5">
                                                            <input type="text" tabindex="3" class="form-control Order_no" name="Order_no" id="Order_no" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <label class="col-md-6 col-form-label" for="bill_amt"><b>Bill Amount</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" tabindex="4" class="form-control bill_amt" name="bill_amt" id="bill_amt" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <label class="col-md-6 col-form-label" for="bill_date"><b>Bill Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="date" tabindex="5" class="form-control bill_date datepickerOne" name="bill_date" id="bill_date" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="bill_date"><b>Due Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="datepicker" tabindex="6" class="form-control bill_date datepickerOne" name="bill_date" id="bill_date" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <label class="col-md-6 col-form-label" for="from_date"><b>From Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="date" tabindex="7" class="form-control from_date datepickerOne" name="from_date" id="from_date" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="to_date"><b>To Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="datepicker" tabindex="8" class="form-control to_date datepickerOne" name="to_date" id="to_date" >  
                                                       </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-5 border m-left_1">
                                            <table>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>Address1:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>Address2:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>Pincode:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>City:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>State:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>GST No:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <div class="row mt-1">
                                                <div class="table-responsive a">
                                                    <table class="table-bordered table-centered" style="width: 100%;">
                                                        <thead>
                                                            <tr class="main-title">
                                                                <th class="p-1 text-center" style="min-width: 150px;">Item Detail<span
                                                                 class="error">*</span></th>
                                                                <th class="p-1 text-center" style="min-width: 50px;">HSN Code</th>
                                                                <th class="p-1 text-center" style="min-width: 50px;">Quantity<span
                                                                 class="error">*</span></th>
                                                                 <th class="p-1 text-center" style="min-width: 50px;">Rate<span
                                                                 class="error">*</span></th>
                                                                 <th class="p-1 text-center" style="min-width: 100px;">Taxable Amount</th>
                                                                 <th class="p-1 text-center" style="min-width: 50px;">GST%</th>
                                                                 <th class="p-1 text-center" style="min-width: 100px;">GST Amount</th>
                                                                 <th class="p-1 text-center" style="min-width: 100px;">Total Amount</th>
                                                                 <th class="p-1 text-start" style="min-width: 250px;">Add</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="p-1">
                                                                    <input type="text" name="item_detail" class="item_detail form-control" id="item_detail" tabindex="9">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="hsn_code" class="hsn_code form-control" id="hsn_code" tabindex="10">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="quantity" class="quantity form-control" id="quantity" tabindex="11">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="rate" class="rate form-control" id="rate" tabindex="12">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="taxabble_amt" class="taxabble_amt form-control" id="taxabble_amt" tabindex="13">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="gst" class="gst form-control" id="gst" tabindex="14">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="gst_amt" class="gst_amt form-control" id="gst_amt" tabindex="15">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="total_amt" class="total_amt form-control" id="total_amt" tabindex="16">
                                                                </td>
                                                                <td class="p-1">
                                                                    <div class="col-md-4">
                                                                        <input type="button" name="add" class="form-control btn btn-primary" id="add" tabindex="16" value="Add">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table-bordered" style="width: 100%;">
                                                        <tr>
                                                            <td colspan="3" class="p-1" style="width: 70%;"></td>
                                                            <td class="text-end p-1" style="width: 15%;"><b>Sub Total</b></td>
                                                            <td class="p-1 text-start" style="width: 15%;">
                                                                    
                                                                        <input type="text" name="sub_total" class="form-control sub_total" id="sub_total" tabindex="17" disabled>
                                                                   
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" rowspan="4" class="p-1 ">
                                                                <textarea class="form-control bill_remark" placeholder="BILL REAMRKS" rows="7" tabindex="18">
                                                                    
                                                                </textarea>
                                                            </td>
                                                            <td class="text-end p-1"><b>Discount(-)</b></td>
                                                            <td class="p-1 text-start">
                                                                    
                                                                        <input type="text" name="sub_total" class="form-control discpont" id="discpont" tabindex="19">
                                                                   
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td class="text-end p-1 d-flex">
                                                                <span><b>TDS(-)</b></span>
                                                                <input type="text" name="sub_total" class="form-control discpont" id="discpont" tabindex="20"> <span><b>(%)</b></span>
                                                            </td>
                                                            <td class="p-1 text-start">
                                                                    
                                                                        <input type="text" name="tds" class="form-control tds" id="tds" tabindex="21" disabled>
                                                                   
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td class="text-end p-1">
                                                                <b>Adjustment(-)</b>
                                                            </td>
                                                            <td class="p-1 text-start">
                                                                    
                                                                        <input type="text" name="adjustment" class="form-control adjustment" id="adjustment" tabindex="22">
                                                                   
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td class="text-end p-1">
                                                              <b> Net Amount</b>
                                                            </td>
                                                            <td class="p-1 text-start">
                                                                    
                                                                        <input type="text" name="net_amt" class="form-control net_amt" id="net_amt" tabindex="23" disabled>
                                                                   
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-1" style="width: 10%;">
                                                                <input type="button" class="btn btn-primary" value="Cancel" tabindex="24">
                                                            </td>
                                                            <td class="p-1 text-end" style="width: 45%;"><b>Attach Invoice Copy</b></td>
                                                            <td class="p-1" style="width: 15%;">
                                                                <input type="file" name="atach_copy">
                                                            </td>
                                                            <td colspan="2" class="p-1" style="width: 30%;">
                                                                <input type="button" class="btn btn-primary" value="Save" tabindex="25">
                                                            </td>
                                                        </tr>
                                                    </table>
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