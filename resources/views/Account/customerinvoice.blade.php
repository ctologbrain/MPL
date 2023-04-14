@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">CUSTOMER INVOICE</h4>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card customer_oda_rate">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="bdr-btm mb-1">
                                <div class="row">
                                     
                                    <div class="col-4">

                                        <div class="row">

                                               
                                                        <label class="col-md-5 col-form-label" for="origin">Origin</label>
                                                              <div class="col-md-7">
                                                            <input type="text" name="origin" tabindex="1"
                                                                class="form-control origin" id="origin" onchange="">

                                                              </div>
                                                  
                                        
                                                
                                        </div>
                                    </div>

                                    <div class="col-5">

                                        <div class="row">

                                                
                                                        <label class="col-md-3 col-form-label" for="destination">Destination</label>
                                                              <div class="col-md-8">
                                                            <input type="text" name="destination" tabindex="2"
                                                                class="form-control destination" id="destination" onchange="">

                                                              </div>
                                                
                                        
                                                
                                        </div>
                                    </div>
                                    <div class="col-3">

                                        <div class="row">

                                               
                                                
                                        </div>
                                    </div>

                                     <div class="col-4">

                                        <div class="row">
                                             <label class="col-md-5 col-form-label" for="booking_branch">Booking Branch</label>
                                                              <div class="col-md-7">
                                                           <input type="text" class="form-control booking_branch" id="booking_branch" name="booking_branch" tabindex="3">

                                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-5">

                                        <div class="row">

                                               
                                                        <label class="col-md-3 col-form-label" for="booking_type">Booking Type</label>
                                                              <div class="col-md-3">
                                                           <select class ="form-control booking_type selectBox" name="booking_type" id="booking_type" tabindex="4">
                                                               <option value="1">CREDIT</option>
                                                               <option value="2">CASH</option>
                                                               <option value="2">TOPAY CASH</option>
                                                               <option value="2">TOPAY CREDIT</option>

                                                           </select>

                                                              </div>
                                                              <label class="col-md-3 col-form-label" for="load_type">Load Type</label>
                                                              <div class="col-md-3">
                                                           <select class ="form-control load_type selectBox" name="load_type" id="load_type" tabindex="5">
                                                               <option value="1">BOTH</option>
                                                               <option value="2">DIRECT</option>
                                                               <option value="2">CONSOLE</option>
                                                             
                                                           </select>

                                                              </div>
                                                 
                                        
                                                
                                        </div>
                                    </div>

                                      <div class="col-3">

                                        <div class="row">
                                                
                                        </div>
                                    </div>

                                    <div class="col-4">

                                        <div class="row">

                                              
                                                        <label class="col-md-5 col-form-label" for="customer_name">Customer Name</label>
                                                              <div class="col-md-7">
                                                            <input type="text" name="customer_name" tabindex="6"
                                                                class="form-control customer_name" id="customer_name" onchange="">

                                                              </div>
                                                  
                                        
                                                
                                        </div>
                                    </div>
                                     <div class="col-5">

                                        <div class="row">

                                              
                                                        <label class="col-md-3 col-form-label" for="from_date">From Date</label>
                                                              <div class="col-md-3">
                                                            <input type="text" name="from_date" tabindex="7"
                                                                class="form-control from_date datetimeone" id="from_date" onchange="">

                                                              </div>
                                                               <label class="col-md-3 col-form-label" for="to_date">To Date</label>
                                                              <div class="col-md-3">
                                                            <input type="text" name="to_date" tabindex="8"
                                                                class="form-control to_date datetimeone" id="to_date" onchange="">

                                                              </div>
                                        </div>
                                    </div>

                                    <div class="col-3">

                                        <div class="row">

                                               
                                                
                                        </div>
                                    </div>

                                     <div class="col-4">

                                        <div class="row">

                                                
                                                        <label class="col-md-5 col-form-label" for="mode">Mode</label>
                                                              <div class="col-md-7">
                                                            <input type="text" name="mode" tabindex="9"
                                                                class="form-control mode" id="mode" onchange="">

                                                              </div>
                                        </div>
                                    </div>


                                    <div class="col-4">

                                        <div class="row mt-1">

                                               <label class="col-md-3 col-form-label" for="mode"></label>
                                                <div class="col-md-9 text-end">
                                                       <input type="button" tabindex="10" value="Process"
                                                    class="btn btn-primary btnSubmit" id="btnSubmit"
                                                    onclick="">
                                                      <a href="" tabindex="11"
                                                    class="btn btn-primary">Reset</a>
                                                </div>
                                                 
                                        
                                                
                                        </div>
                                    </div>

                                    <div class="col-4">

                                        <div class="row">
                                            <div class="d-flex justify-content-end right-btn align-items-center">
                                            <a href="#" class="back-color p-1 text-dark" tabindex="12">Re Calculate Tariff</a>
                                            <a href="#" class="back-color p-1 text-dark" tabindex="13">Under Process(2)</a>
                                            <img src="assets/images/reload.jpeg" class="img1" />
                                            </div>
                                        </div>
                                    </div>
                               
                                </div>
                                </div>

                                <div class="bdr-top p-1">
                                    <div class="row">
                                       <div class="col-12 col-md-8">
                                           <div class="row">
                                               <label class="col-md-2 col-form-label" for="invoice_date">Invoice Date</label>
                                               <div class="col-5">
                                                    <input type="text" class="form-control invoice_date datetimeone" id="invoice_date" name="invoice_date" tabindex="14">
                                               </div>
                                               <label class="col-md-5 col-form-label"><span style="font-weight: 700;"><span style="color: #C00;">Next Invoice Number:</span> MPL/23-24/18</span></label>
                                           </div>

                                           <div class="row">
                                               <label class="col-md-2 col-form-label" for="remarks">Remarks</label>
                                               <div class="col-7">
                                                    <textarea class="form-control remarks" name="remrks" id="remarks" name="remarks" tabindex="15"></textarea>
                                               </div>
                                               
                                           </div>
                                            <div class="row">
                                               <label class="col-md-12 col-form-label">Note: <span style="color: #C00;">After Process, All Waybill are locked. To Unlock AWB Click Reset. </span></label>
                                               
                                               
                                           </div>
                                            <div class="row">
                                               <label class="col-md-2 col-form-label" for="invoice_no">Invoice Number</label>
                                               <div class="col-3">
                                                    <input type="text" class="form-control invoice_no" id="invoice_no" name="invoice_no" tabindex="16">
                                               </div>
                                               <div class="col-7 right-btn">
                                                      <a href="#" class="back-color p-1 text-dark" tabindex="17">Print Invoice</a>
                                                      <a href="#" class="back-color p-1 text-dark" tabindex="18">Cancel Invoice</a>
                                                      <a href="#" class="back-color p-1 text-dark" tabindex="19">Download Annexture</a>
                                               </div>
                                               
                                           </div>
                                       </div> 

                                        <div class="col-12 col-md-4 text-end">
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="ttl_fgrt_chrg">Total Freigt Charge:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control ttl_fgrt_chrg" id="ttl_fgrt_chrg" name="ttl_fgrt_chrg" disabled>
                                               </div>
                                               
                                           </div>
                                           <div class="row">
                                              <label class="col-md-5 col-form-label" for="ttl_other_chrg">Total Other Charge:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control ttl_other_chrg" id="ttl_other_chrg" name="ttl_other_chrg" disabled>
                                               </div>
                                               
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_cgst">Total CGST:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_cgst" id="total_cgst" name="total_cgst" disabled>
                                               </div>
                                               
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_sgst">Total SGST:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_sgst" id="total_sgst" name="total_sgst" disabled>
                                               </div>
                                               
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_igst">Total IGST:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_igst" id="total_igst" name="total_igst" disabled>
                                               </div>
                                               
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_bill_amt">Total Bill Amount:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_bill_amt" id="total_bill_amt" name="total_bill_amt" disabled>
                                               </div>
                                               
                                           </div>
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"></label>
                                               <div class="col-8">
                                                   <input type="button" class="form-control back-color"  value="Generate & Print Invoice" tabindex="20">
                                               </div>
                                               
                                           </div>
                                       </div> 
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="row">
                                      
                                         <table class="table-responsive table-bordered">
                                                <thead>
                                                    <tr class="main-title text-dark p-1 text-center">
                                                        <th colspan="11">
                                                        <h6>Customer & Employee Wise Locked Waybill List</h6>
                                                    </th>
                                                    </tr>
                                                    <tr class="main-title text-dark">
                                                        <th class="p-1">SL#</th>
                                                        <th class="p-1">Unlock</th>
                                                        <th class="p-1">Customer Name</th>
                                                        <th class="p-1">Employee Name</th>
                                                        <th class="p-1">Total Docket No</th>
                                                        <th class="p-1">Freight</th>
                                                        <th class="p-1">Other Chrg</th>
                                                        <th class="p-1">CGST</th>
                                                        <th class="p-1">SGST</th>
                                                        <th class="p-1">IGST</th>
                                                        <th class="p-1">Total</th>

                                                    </tr>
                                       
                                               </thead> 
                                             <tbody>
                                                <tr>
                                                    <td class="p-1">   1</td>
                                                    <td class="p-1"><a href="#">UNLOCK</a>   </td>
                                                    <td class="p-1">PLEASANT LOGISTIC PRIVATE LIMITED  </td>

                                                    <td class="p-1">NEMWATI</td>
                                                    <td class="p-1">9</td>
                                                    <td class="p-1">39483.07</td>
                                                    <td class="p-1">180 </td>
                                                    <td class="p-1">2379.79</td>
                                                    <td class="p-1">2379.79</td>
                                                    <td class="p-1">0.00</td>
                                                    <td class="p-1">44422.65</td>
                                                </tr>
                                               <tr>
                                                    <td class="p-1">2</td>
                                                    <td class="p-1"><a href="#">UNLOCK</a>   </td>
                                                    <td class="p-1">SBS BIOTECH </td>

                                                    <td class="p-1">KIRAN KHARE</td>
                                                    <td class="p-1">5</td>
                                                    <td class="p-1">39483.07</td>
                                                    <td class="p-1">180 </td>
                                                    <td class="p-1">2379.79</td>
                                                    <td class="p-1">2379.79</td>
                                                    <td class="p-1">0.00</td>
                                                    <td class="p-1">44422.65</td>
                                                </tr>
                                                <tr class="main-title text-dark p-1 text-center">
                                                    <td colspan="11">
                                                        <h6>Email To Customer</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="11" class="p-1">
                                                        <div class="row">
                                                            <label class="col-md-1">Customer Name</label>
                                                            <div class="col-2">
                                                                    <input type="text" name="customer_name" id="customer_name" class="customer_name form-control" tabindex="21">
                                                            </div>
                                                            <label class="col-md-1">Invoice Number</label>
                                                            <div class="col-2">
                                                                    <input type="text" name="invoice_no" id="invoice_no" class="invoice_no form-control" tabindex="22">
                                                            </div>
                                                            <label class="col-md-1">Email To</label>
                                                            <div class="col-1">
                                                                    <input type="text" name="email_to" id="email_to" class="email_to form-control" tabindex="23">
                                                            </div>
                                                            <label class="col-md-1">CC</label>
                                                            <div class="col-1">
                                                                    <input type="text" name="cc" id="cc" class="cc form-control" tabindex="24">
                                                            </div>
                                                             <div class="col-1">
                                                                    <input type="button" value="Send Mail" tabindex="25">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="main-title text-dark p-1 text-center">
                                                    <td colspan="11">
                                                        <h6>GST Verification</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="11" class="p-1">
                                                       <div class="row">
                                                            <label class="col-md-1">Customer Name</label>
                                                            <div class="col-2">
                                                                    <input type="text" name="customer_name" id="customer_name" class="customer_name form-control" tabindex="26">
                                                            </div>
                                                            <label class="col-md-1">GST Number</label>
                                                            <div class="col-2">
                                                                    <input type="text" name="gst_no" id="gst_no" class="gst_no form-control" tabindex="27">
                                                            </div>
                                                            <div class="col-1">
                                                                    <input type="button" value="Verify GST" tabindex="28">
                                                            </div>
                                                           
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                          </table> 
                                        
                                    </div>
                                    
                                </div>



                                  

                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>

                 
              
           </div>     
        </div>
    </div>
</form>
</div>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   
    $('select').select2();
    $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    function gitFcmNumber(value)
    {
     
     if(value==1)
      { 
        $('.fpm_number').attr('disabled', false);
      }
     else{
       
         $('.fpm_number').attr('disabled', true);
     }
    }
    function GetFcmDetails(Fpm)
    {
        var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getFcmDetails',
       cache: false,
       data: {
           'Fpm':Fpm
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.route').val(obj.Route_Id).trigger('change');
        $('.vendor_name').val(obj.Vehicle_Provider).trigger('change');
        $('.vehicle_name').val(obj.Vehicle_No).trigger('change');
        $('.vehicle_model').val(obj.Vehicle_Model).trigger('change');
        $('.driver_name').val(obj.Driver_Id).trigger('change');
     
       }
     });
    }
    function getSourceAndDest(routeId)
    {
        var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getSourceAndDest',
       cache: false,
       data: {
           'routeId':routeId
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
          $('.origin').val(obj.statrt_point_details.CityName);
          $('.origin').attr('readonly', true);
          $('.destination').val(obj.end_point_details.CityName);
          $('.destination').attr('readonly', true);
    //       $.ajax({
    //      type: 'POST',
    //      headers: {
    //      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    //    },
    //    url: base_url + '/getOffcieByCity',
    //    cache: false,
    //    data: {
    //        'EndPoint':obj.Destination
    //    }, 
    //    success: function(data) {
    //     const obj = JSON.parse(data);
         
         
    //    }
    //  });
       }
     });
    }
    function getDocketDetails(Docket,BranchId)
{
    var base_url = '{{url('')}}';
    var BranchId = $('.destination_office').val();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketIsBooked',
       cache: false,
       data: {
           'Docket':Docket,'BranchId':BranchId
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message)
            $('.Docket').val('');
            $('.Docket').focus();
            $('.pieces').val('');
            $('.weight').val('');
            $('.displayPices').val('');
            $('.displayWeight').val('');
            $('#partpices').text('');
            $('#partWidth').text('');
            return false;
        }
        else{
            $('.pieces').val(obj.partQty);
            $('.weight').val(obj.partWeight);
            $('.displayPices').val(obj.qty);
            $('.displayWeight').val(obj.ActualW);
            $('#partpices').text(obj.partQty);
            $('#partWidth').text(obj.partWeight);
            
           
        }

       }
     });
}
function genrateGatePass()
{
    if($('#GP_Time_Stamp').val()=='')
    {
        alert('Please Enter gatePass Time');
        return false;
    }
    if($('#PlacementTimeStamp').val()=='')
    {
        alert('Please Enter Placement Time');
        return false;
    }
    if($('#route').val()=='')
    {
        alert('Please Select Route');
        return false;
    }
    if($('#vendor_name').val()=='')
    {
        alert('Please Selelct Vendor Name');
        return false;
    }
    if($('#vehicle_name').val()=='')
    {
        alert('Please Selelct Vehicle Name');
        return false;
    }
    if($('#vehicle_model').val()=='')
    {
        alert('Please Selelct Vehicle Model');
        return false;
    }
    if($('#sprvisor_name').val()=='')
    {
        alert('Please Enter Sprvisor Name');
        return false;
    }
    
    var with_fpm = $("input[name=with_fpm]:checked").val();
    var GP_Time_Stamp=$('#GP_Time_Stamp').val();
    var fpm_number=$('#fpm_number').val();
    var PlacementTimeStamp=$('#PlacementTimeStamp').val();
    var route=$('#route').val();
    var type=$('#type').val();
    var vendor_name=$('#vendor_name').val();
    var vehicle_name=$('#vehicle_name').val();
    var vehicle_model=$('#vehicle_model').val();
    var driver_name=$('#driver_name').val();
    var mob_no=$('#mob_no').val();
    var dev_id=$('#dev_id').val();
    var sprvisor_name=$('#sprvisor_name').val();
    var seal_number=$('#seal_number').val();
    var remark=$('#remark').val();
    var start_km=$('#start_km').val();
    var vehicle_teriff=$('#vehicle_teriff').val();
    var adv_driver=$('#adv_driver').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitVehicleGatePass',
       cache: false,
       data: {
           'with_fpm':with_fpm,'GP_Time_Stamp':GP_Time_Stamp,'PlacementTimeStamp':PlacementTimeStamp,'route':route,'vendor_name':vendor_name,'vehicle_name':vehicle_name,'vehicle_model':vehicle_model,'driver_name':driver_name,'mob_no':mob_no,'dev_id':dev_id,'sprvisor_name':sprvisor_name,'remark':remark,'start_km':start_km,'vehicle_teriff':vehicle_teriff,'adv_driver':adv_driver,'type':type,'seal_number':seal_number,'fpm_number':fpm_number
       },
       success: function(data) {
        $(".btnSubmit").attr("disabled", true);
        const obj = JSON.parse(data);
        $('.gatepassNo').text(' '+obj.gatepass);
        $('.gate_pass_number').val(obj.gatepass);
        $('.id').val(obj.id);
       }
     });

}
function SaveGatePassOrDocket()
{
    if($('#id').val()=='')
    {
       alert('Please Genrate Gatepass number first');
       return false; 
    }
    if($('#destination_office').val()=='')
    {
       alert('Please Enter destination office');
       return false; 
    }
    if($('#Docket').val()=='')
    {
       alert('Please Enter Docket');
       return false; 
    }
    var id=$('#id').val();
    var Docket=$('#Docket').val();
    var destination_office=$('#destination_office').val();
    var pieces=$('#pieces').val();
    var weight=$('#weight').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GatePassWithDocket',
       cache: false,
       data: {
           'id':id,'Docket':Docket,'destination_office':destination_office,'pieces':pieces,'weight':weight
       },
       success: function(data) {
        $('.Docket').val('');
        $('.pieces').val('');
        $('.weight').val('');
        $('.displayPices').val('');
        $('.displayWeight').val('');
        $('#partpices').text('');
        $('#partWidth').text('');
        $('.Docket').focus();
        $('.tabelData').html(data);
        $('#hidden').addClass('pppp');
       }
     });
}
function printgatePass()
{
    if($('#gate_pass_number').val()=='')
    {
        alert('Please Enter GatePass Number');
        return false;
    }
    var base_url = '{{url('')}}';
    var gatePass=$('#gate_pass_number').val();
    location.href = base_url+"/print_gate_Number/"+gatePass;
  
}
    </script>
             
    