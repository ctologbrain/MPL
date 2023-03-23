@include('layouts.appTwo')
<style>
    .addclasshid
    {
     display:none !important;
    }
</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">DELIVERY</h4>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                     <div class="col-4">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="option">Booking Date</label>
                                                <div class="col-md-8" id="BookingDate">
                                                </div>
                                              </div>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="Dispalypieces">Pieces</label>
                                                <div class="col-md-8" id="Dispalypieces">
                                               </div>
                                              
                                             </div>
                                       
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                                 <label class="col-md-4 col-form-label" for="pieces">Balance Pieces</label>
                                                <div class="col-md-8" id="BalancePieces">
                                                 </div>
                                              
                                             </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="cosigner_name">Cosigner Name </label>
                                                <div class="col-md-8" id="Cosigner">
                                                  </div>
                                                </div>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="origin">Origin</label>
                                                <div class="col-md-8" id="Origin">
                                               </div>
                                              
                                             </div>
                                       
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                             
                                              
                                        </div>
                                    </div>

                                     <div class="col-4">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="cosignee_name">Cosignee Name </label>
                                                <div class="col-md-8" id="Cosignee">
                                                  </div>
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="destination">Destination</label>
                                                <div class="col-md-8" id="Destination">
                                                </div>
                                              </div>
                                       
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                             
                                              
                                        </div>
                                    </div>


                                     <div class="col-4">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="delivery_date">Delivery Date<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                   
                                                <div class="col-md-8">
                                                <input type="datetimeone" name="delivery_date" tabindex="1" class="form-control delivery_date datetimeone" id="delivery_date">
                                                <input type="hidden" name="RecId"  class="form-control RecId" id="RecId">   
                                            </div>   
                                                </div>
                                               
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       
                                             <div class="row">
                                                 <label class="col-md-4 col-form-label" for="load_type">Load Type</label>
                                                <div class="col-md-8">
                                                </div>
                                              
                                             </div>
                                       
                                    </div>
                                    <div class="col-4">
                                       <div class="row">
                                                 <label class="col-md-4 col-form-label" for="product_code">Product Code</label>
                                                <div class="col-md-8">
                                                </div>
                                              
                                             </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>
                <div class="col-xl-12">
                  <table class="table-responsive table-bordered">
                    <thead>
                        <tr class="main-title text-dark">
                            <th class="p-1 td11">Docket No<span class="error">*</span></th>
                             <th class="p-1 td12">Pieces<span class="error">*</span></th>
                            <th class="p-1 td13">Destination Office<span class="error">*</span></th>
                           

                            <th class="p-1 td14">Time<span class="error">*</span></th>
                            <th class="p-1 td15">Proof Name<span class="error">*</span></th>
                            <th class="p-1 td16">Reciever Name<span class="error">*</span></th>
                            <th class="p-1 td17">Rec. Phone</th>
                            <th class="p-1 td18">Proof Details</th>

                        </tr>
                         </thead> 
                         <tbody>
                        <tr>
                            <td class="p-1"> 
                               <input type="text" class="form-control docket_number" id="docket_number" name="docket_number" tabindex="2" onchange="gateDocketDetails(this.value)">
                                </td>
                                 <td class="p-1"> 
                               <input type="text" class="form-control pieces" id="pieces" name="pieces" tabindex="3">
                                </td>
                            <td class="p-1">
                                <select name="type" id="destination_office" tabindex="4" class="form-control selectBox destination_office" name="destination_office">
                                                    <option value="">--select--</option>
                                                    <option value="1">LKO - LUCKNOW</option>
                                                    <option value="2">BANG - BANGLORE</option>
                                                   

                                                     </select>
                              </td>
                           

                            <td class="p-1"><input type="time"  name="time" tabindex="5"
                                                    class="form-control time" id="time">
                                                   
                                                
                                                </td>
                            <td class="p-1"> <input type="text" class="form-control proof_name" id="proof_name" name="proof_name" tabindex="6"></td>
                            <td class="p-1"><input type="text" class="form-control reciver_name" id="reciver_name" name="reciver_name" tabindex="7"></td>
                            <td class="p-1">
                              
                                <input type="text" class="form-control reciver_phn" id="reciver_phn" name="reciver_phn" tabindex="8">
                            </td>
                            <td class="p-1 td8">
                                
                                        <input type="text" class="form-control proof_detail" id="proof_detail" name="proof_detail" tabindex="9">     
                                   
                            </td>
                        </tr>
                        <tr id="hidden">
                            <td class="p-1 text-dark">
                                <lable>Choose File </lable>
                            </td>
                             <td colspan="4" class="p-1 text-start">
                             <input type="file" name="fileaimge" id="fileaimge" class="form-control" tabindex="10">
                            </td>

                             <td colspan="5" class="p-1 text-start">
                                
                                            
                                            <input onclick="DataSubmit();" type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="" tabindex="11">
                                            <a href="" tabindex="5" class="btn btn-primary" tabindex="12">Cancel</a>
                            </td>
                        </tr>
                        <tr class="main-title" id="hiddenth">
                            <td colspan="8" class="p-1 text-center text-dark">Record Not Available...</td>
                        </tr>
                        </tbody>
                         
                  </table> 
                <div class="tabels ml-1" ></div> 
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
    function gateDocketDetails(Docket)
    {
        var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetDocketForDelivery',
       cache: false,
       data: {
           'Docket':Docket
       },
       success: function(data) {
         const obj = JSON.parse(data);
         if(obj.status=='false')
         {
            alert(obj.message);
            $('.docket_number').val('');
            $('.docket_number').focus();
            $('#BookingDate').text('');
            $('#Dispalypieces').text('');
            $('#Cosigner').text('');
            $('#Cosignee').text('');
            $('#Origin').text('');
            $('#Destination').text('');
            $('.RecId').val('');
            return false;
         }
         else
         {
          $('#BookingDate').text(obj.data.Booking_Date);
         $('#Dispalypieces').text(obj.data.docket_product_details.Qty);
         $('#Cosigner').text(obj.data.consignor.ConsignorName);
         $('#Cosignee').text(obj.data.consignoee_details.ConsigneeName);
         $('#Origin').text(obj.data.pincode_details.city_details.CityName);
         $('#Destination').text(obj.data.dest_pincode_details.city_details.CityName);
        $('.RecId').val(obj.recId);
          }
        
        // $('.vendor_name').val(obj.Vehicle_Provider).trigger('change');
        // $('.vehicle_name').val(obj.Vehicle_No).trigger('change');
        // $('.vehicle_model').val(obj.Vehicle_Model).trigger('change');
        // $('.driver_name').val(obj.Driver_Id).trigger('change');
     
       }
     });
    }
    function DataSubmit()
    {
        if($("#delivery_date").val()=='')
        {
            alert('Please enter delivery date');
            return false;
        }
        if($("#docket_number").val()=='')
        {
            alert('Please enter docket number');
            return false;
        }
        if($("#destination_office").val()=='')
        {
            alert('Please enter destination office');
            return false;
        }
        if($("#pieces").val()=='')
        {
            alert('Please enter pieces');
            return false;
        }
         if($("#time").val()=='')
        {
            alert('Please enter time');
            return false;
        }
        if($("#proof_name").val()=='')
        {
            alert('Please enter proof name');
            return false;
        } if($("#reciver_name").val()=='')
        {
            alert('Please enter reciver name');
            return false;
        }
        if($("#reciver_phn").val()=='')
        {
            alert('Please enter reciver phone');
            return false;
        }
        if($("#proof_detail").val()=='')
        {
            alert('Please enter proof detail');
            return false;
        }
        if($("#RecId").val()=='')
        {
            alert('gate pass received number not found');
            return false;
        }
           var formData = new FormData();
           var base_url = '{{url('')}}';
           var  delivery_date = $("#delivery_date").val();
           var docket_number  = $("#docket_number").val();
           var pieces  = $("#pieces").val();
           var time  = $("#time").val();
           var proof_name  = $("#proof_name").val();
           var reciver_name  = $("#reciver_name").val();
           var reciver_phn  = $("#reciver_phn").val();
           var proof_detail  = $("#proof_detail").val();
           var destination_office  = $("#destination_office").val();
           var RecId  = $("#RecId").val();
           if ($('#fileaimge')[0].files.length > 0) 
           {
            for (var i = 0; i < $('#fileaimge')[0].files.length; i++)
            formData.append('file', $('#fileaimge')[0].files[i]);
           }
           formData.append('delivery_date',delivery_date);
           formData.append('docket_number',docket_number);
           formData.append('pieces',pieces);
           formData.append('time',time);
           formData.append('proof_name',proof_name);
           formData.append('reciver_name',reciver_name);
           formData.append('reciver_phn',reciver_phn);
           formData.append('proof_detail',proof_detail);
           formData.append('destination_office',destination_office);
           formData.append('RecId',RecId);
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/submitRegularDocketDelivery',
           cache: false,
           contentType: false,
           processData: false,
            data: formData,
            success: function(data) {
             const obj = JSON.parse(data);
             $('#hiddenth').addClass('addclasshid');
                $('.tabels').html(obj.datas);
                
                $('.docket_number').val('');
                $('.docket_number').focus();
                $('.pieces').val('');
                $('.destination_office').val('');
                $('.time').val('');
                $('.proof_name').val('');
                $('.reciver_name').val('');
                $('.reciver_phn').val('');
                $('.proof_detail').val('');
                $('.RecId').val('');
                $('#BookingDate').text('');
                $('#Dispalypieces').text('');
                $('#Cosigner').text('');
                $('#Cosignee').text('');
                $('#Origin').text('');
                $('#Destination').text('');
                $('.RecId').val('');
               
           
               
            
            }
            });
    }
    </script>
             
    