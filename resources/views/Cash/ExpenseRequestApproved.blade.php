@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">SUPPLEMENTARY INVOICE</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
          </div>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card customer_oda_rate">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="bdr-btm mb-1">
                                    <div class="row">
                                        <div class="col-6">

                                            <div class="row">
                                                            <label class="col-md-4 col-form-label" for="invoice_no">Invoice Number<span class="error">*</span></label>
                                                                  <div class="col-md-8">
                                                                <input type="text" name="invoice_no" tabindex="1"
                                                                    class="form-control invoice_no" id="invoice_no" onchange="">

                                                                  </div>
                                            </div>
                                        </div>
                                         <div class="col-6">

                                            <div class="row">
                                                            <label class="col-md-2 col-form-label" for="invoice_date">Invoice Date</label>
                                                                  <div class="col-md-8">
                                                                  </div>
                                                                  
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="row mt-1">

                                                    <label class="col-md-4 col-form-label" for="invoice_date">Invoice Date</label>
                                                    <div class="col-md-4">
                                                           <input type="text" name="invoice_date" tabindex="2"
                                                                    class="form-control invoice_date datetimeone" id="invoice_date" onchange="">
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row mt-1">

                                                    <label class="col-md-4 col-form-label" for="invoice_date"><span style="color: #C00;">Next Invoice Number</span></label>
                                                    <div class="col-md-8">
                                                           
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row mt-1">

                                                    <label class="col-md-4 col-form-label" for="billing_office">Billing Office</label>
                                                    <div class="col-md-8">
                                                          
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row mt-1">

                                                    <label class="col-md-4 col-form-label" for="customer_name">Customer Name</label>
                                                    <div class="col-md-8">
                                                           
                                                    </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                    <div class="row">
                                        <div class="col-6">
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="address_1">Address 1</label>
                                                                      <div class="col-md-6">
                                                                    

                                                                      </div>
                                                                      
                                              </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="address_2">Address 2</label>
                                                                      <div class="col-md-6">
                                                                    

                                                                      </div>
                                                                      
                                              </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="pincode">Pincode</label>
                                                                      <div class="col-md-6">
                                                                      </div>
                                                                      
                                              </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="city">City</label>
                                                                      <div class="col-md-6">
                                                                      </div>
                                                                      
                                              </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="state">State</label>
                                                                      <div class="col-md-6">
                                                                    

                                                                      </div>
                                                                      
                                              </div>
                                        </div>

                                        <div class="col-6">
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="gst_no">GST No</label>
                                                                      <div class="col-md-6">
                                                                      </div>
                                                                      
                                              </div>
                                        </div>
                                       
                                    </div>
                               
                            </div>
               
                        </div>
                    </div>
                     
                </div>
               
            </div>

                                      
                                         <table class="table-responsive table-bordered">
                                                <thead>
                                                    
                                                   <tr class="main-title text-dark text-center">
                                                       <th colspan="9" class="p-1">
                                                         Charge Details  
                                                       </th>
                                                   </tr>
                                                    <tr class="main-title text-dark">
                                                        <th class="p-1">Charge Name<span class="error">*</span></th>
                                                        <th class="p-1">AWB No<span class="error">*</span></th>
                                                        <th class="p-1">Amount<span class="error">*</span></th>
                                                        <th class="p-1">GST(%)</th>
                                                        <th class="p-1">CGST Amt</th>
                                                        <th class="p-1">SGST Amt</th>
                                                        <th class="p-1">IGST Amt</th>
                                                        <th class="p-1">Total Amt</th>
                                                         <th class="p-1"></th>

                                                    </tr>
                                       
                                               </thead> 
                                             <tbody>
                                                <tr>
                                                    <td class="p-1"> 
                                                        <input type="text" name="charge_name" class="form-control charge_name" id="charge_name" tabindex="3">
                                                    </td>
                                                    <td class="p-1">
                                                         <input type="text" name="awb_no" class="form-control awb_no" id="awb_no" tabindex="4">

                                                    </td>
                                                    <td class="p-1">
                                                        <input type="text" name="amnt" class="form-control amnt" id="amnt" tabindex="5">
                                                    </td>
                                                    <td class="p-1">
                                                        <input type="text" name="gst" class="form-control gst" id="gst" tabindex="6">
                                                    </td>
                                                    <td class="p-1">
                                                        <input type="text" name="cgst" class="form-control cgst" id="cgst" disabled>
                                                    </td>
                                                    <td class="p-1">
                                                         <input type="text" name="sgst" class="form-control sgst" id="sgst" disabled>
                                                    </td>
                                                    <td class="p-1">
                                                         <input type="text" name="igst" class="form-control igst" id="igst" disabled>
                                                    </td>
                                                    <td class="p-1">
                                                         <input type="text" name="total_amnt" class="form-control total_amnt" id="total_amnt" disabled>
                                                    </td>

                                                     <td class="p-1">
                                                         <input type="button" name="add" class="form-control add btn btn-primary" id="add" value="Add">
                                                    </td>
                                                   
                                                </tr>
                                               <tr>
                                                   <td class="p-1 text-start" colspan="4">
                                                    <div class="row">
                                                          <label class="col-md-2 col-form-label" for="remark">Remarks</label>
                                                        <div class="col-md-6">
                                                               <textarea class="remark form-control" name="remark" id="remark" tabindex="7"></textarea>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="button" class="btn btn-primary" value="Reset" tabindex="8">
                                                        </div>
                                                    </div>

                                                   </td>
                                                   <td class="p-1" colspan="5">
                                                    <div class="row float-end">
                                                          <label class="col-md-4 col-form-label" for="invoice_no">Invoice Number</label>
                                                        <div class="col-md-5">
                                                               <input type="text" class="invoice_no form-control" name="invoice_no" id="invoice_no" tabindex="9">
                                                        </div>
                                                        <div class="col-md-2 text-start">
                                                            <input type="button" class="btn btn-primary" value="Print" tabindex="10">
                                                        </div>
                                                    </div>
                                                   </td>
                                                   
                                                </tr>
                                                
                                               
                                               
                                              
                                            </tbody>
                                          </table> 

                                          <div class="col-md-12">
                                            <div class="d-flex d-flex justify-content-between">
                                             <nav>
                                                <ul class="pagination">
                                                    
                                                        <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                                            <span class="page-link" aria-hidden="true">‹</span>
                                                        </li>
                                                        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                        <li class="page-item"><a class="page-link" href="http://localhost/MPL/docketbookingReport?page=2">2</a></li>
                                                       <li class="page-item"><a class="page-link" href="http://localhost/MPL/docketbookingReport?page=3">3</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="http://localhost/MPL/docketbookingReport?page=2" rel="next" aria-label="Next »">›</a>
                                                        </li>
                                                </ul>
                                             </nav>

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
             
    