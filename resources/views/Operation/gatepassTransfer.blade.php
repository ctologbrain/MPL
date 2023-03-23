@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">GATEPASS - TRANSFER</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form id="resetForm">
                        <div id="basicwizard rto_container">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        
                                       
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label mt-1 mb-1" for="  gatepass_number">Gatepass Number
                                                                <span
                                                                class="error">*</span></label>
                                                                <div class="col-md-9 text-start mt-1 mb-1">
                                                                   <input type="text" tabindex="1" class="form-control gatepass_number" name="gatepass_number" id="gatepass_number" >
                                                               </div>
                                                                  
                                                               <span class="error"></span>
                                                            </div>
                                                           
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                         <div class="row">
                                                             <label class="col-md-3 col-form-label" for="destination_office">Destination Office<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-5">
                                                           
                                                           
                                                               <select tabindex="2" class="form-control selectBox destination_office" name="destination_office" id="destination_office" onchange="">
                                                                <option value="">--select--</option>
                                                                @foreach($office as $key)
                                                                 <option value="{{$key->id}}">{{$key->OfficeCode}} - {{$key->OfficeName}}</option> @endforeach    
                                                                </select>
                                                                         <span class="error"></span>
                                                                      
                                                                  
                                                            </div>
                                                            <div class="col-md-4 text-center mb-1">
                                                               
                                                                
                                                                <input type="button" tabindex="3" value="Process" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="getGatePassInfo();">
                                                                <input type="button" tabindex="4" value="Reset" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="resetdata();">
                                                           
                                                                 
                                                                </div>
                                                        </div>
                                                    </div>
                                               
                                                        
                                                       
                                                    
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <hr>
                                                            
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-12">
                                                         <div class="row">
                                                             <label class="col-md-3 col-form-label" for="transferToOffice">Transfer To Office<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-7">
                                                           
                                                           
                                                               <select tabindex="5" class="form-control selectBox transferToOffice" name="transferToOffice" id="transferToOffice" onchange="">
                                                             <option value="">--select--</option>
                                                           @foreach($office as $key)
                                                                 <option value="{{$key->id}}">{{$key->OfficeCode}} - {{$key->OfficeName}}</option> @endforeach        
                                                            </select>
                                                                         <span class="error"></span>
                                                                       <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >   
                                                                  
                                                            </div>
                                                            <div class="col-md-2 mb-1">
                                                               
                                                                 <input type="hidden" id="gp_id" name="gp_id" >
                                                               
                                                                <input type="button" tabindex="4" value="Transfer" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="SubmitGatePassTrans();">
                                                           
                                                                 
                                                                </div>
                                                        </div>
                                                    </div>

                                                   

        <div class="col-12">
            <div class="row">

                <table id="table" class="table-responsive table-bordered gatepassTransfer-table">
                         
                  </table>

                                                        </div>
                                                    </div>
                                                     
                                               
                                                </div>
                                              
                                                    
                                            </div>

                                           
                                            
                                           
                                                <div class="col-6">
                                                 <table class="table table-bordered                           table-centered mb-1        ml-1 gatepassreceiving-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" class="lblMediumBold possition gatepass_office" nowrap="nowrap">GatePass Office
                                                                    </td>
                                                                    <td align="left"
                                                                    class="gatepass_office" colspan="3"> 
                                                                        <span id="gatepass_office"></span>
                                                                    </td>
                                                               
                                                                </tr>
                                                                <tr class="back-color">
                                                                    <td align="left" class="lblMediumBold possition fpm_number" nowrap="nowrap">FPM Number
                                                                    </td>
                                                                    <td align="left"> 
                                                                        <span id="fpm_number"></span>
                                                                    </td>
                                                                    <td align="left" class="trip_type">Trip Type</td>
                                                                     <td align="left"> 
                                                                        <span id="trip_type"></span>
                                                                    </td>
                                                               
                                                                </tr>
                                                           
                                                            <tr class="back-color">
                                                                <td align="left" class="lblMediumBold possition origin_city" nowrap="nowrap">Origin City
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="origin_city"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition destination_city" nowrap="nowrap">Destination City
                                                                </td>
                                                                <td align="left">
                                                                    <span id="destination_city"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition gp_number" nowrap="nowrap">GP Number
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="gp_number"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition gp_time" nowrap="nowrap">GP Date & Time
                                                                </td>
                                                                <td align="left">
                                                                    <span id="gp_time"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition gp_type" nowrap="nowrap">GP Type
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="gp_type"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition place_time" nowrap="nowrap">Place. Date & Time
                                                                </td>
                                                                <td align="left">
                                                                    <span id="place_time"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                             <tr>
                                                                <td align="left" class="lblMediumBold possition vendor_name" nowrap="nowrap">Vendor Name
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="vendor_name"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition customer_name" nowrap="nowrap">Customer Name
                                                                </td>
                                                                <td align="left">
                                                                    <span id="customer_name"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition origin_city" nowrap="nowrap">Origin City
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="origin_city"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition destination_city" nowrap="nowrap">Destination City
                                                                </td>
                                                                <td align="left">
                                                                    <span id="destination_city"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                              <tr>
                                                                <td align="left" class="lblMediumBold possition route_name" nowrap="nowrap">Route Name
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="route_name"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition device_id" nowrap="nowrap">Device ID
                                                                </td>
                                                                <td align="left">
                                                                    <span id="device_id"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition vechile_model" nowrap="nowrap">Vechile Model
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="vechile_model"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition vechile_number" nowrap="nowrap">Vechile Number
                                                                </td>
                                                                <td align="left">
                                                                    <span id="vechile_number"></span>
                                                                </td>
                                                                
                                                            </tr>

                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition driver_name" nowrap="nowrap">Driver Name
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="driver_name"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition mobile_number" nowrap="nowrap">
                                                                    Mobile Number
                                                                </td>
                                                                <td align="left">
                                                                    <span id="mobile_number"></span>
                                                                </td>
                                                                
                                                            </tr>

                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition seal_number" nowrap="nowrap">Seal Number
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="seal_number"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition supervisor_name" nowrap="nowrap">
                                                                    Supervisor Name
                                                                </td>
                                                                <td align="left">
                                                                    <span id="supervisor_name"></span>
                                                                </td>
                                                                
                                                            </tr>

                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition start_km" nowrap="nowrap">Start Km
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="start_km"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition vechile_tariff" nowrap="nowrap">
                                                                    Vechile Tariff
                                                                </td>
                                                                <td align="left">
                                                                    <span id="vechile_tariff"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                    <td align="left" class="lblMediumBold possition remarks" nowrap="nowrap">Remarks
                                                                    </td>
                                                                    <td align="left"
                                                                    class="remarks" colspan="3"> 
                                                                        <span id="remarks"></span>
                                                                    </td>
                                                               
                                                                </tr>
                                                                 <tr>
                                                                <td align="left" class="lblMediumBold possition total_docket" nowrap="nowrap">Total Docket
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="total_docket"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition totalChargeWt" nowrap="nowrap">
                                                                    Total Charge Wt.
                                                                </td>
                                                                <td align="left">
                                                                    <span id="totalChargeWt"></span>

                                                                </td>
                                                                
                                                            </tr>
                                                          
                                                            
                                                        </tbody>
                                                </table>
                                                </div> 
                                            <div class="tabels ml-1" ></div> 

                                    </div>
                                               
                                        
                                </div>
                           </div>
                        </div>
                           
                    </form>
                   <!--  <table id="table" class="table table-bordered ">
                        
                    </table> -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>
</div>
<script type="text/javascript">
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  

  function resetdata(){
             $('#fpm_number').text('');
                   $('#trip_type').text('');
                   $('#origin_city').text('');
                   $('#gp_number').text('');
                   $('#gp_time').text('');
                   $('#gp_type').text('');
                   $('#place_time').text('');
                   $('#vendor_name').text('');
                   $('#destination_city').text('');
                   $('#vechile_model').text('');
                   $('#vechile_number').text('');
                   $('#driver_name').text('');
                   $('#mobile_number').text('');
                   $('#seal_number').text('');
                   $('#supervisor_name').text('');
                   $('#start_km').text('');
                   $('#vechile_tariff').text('');
                   $('#remarks').text('');

                   $("#device_id").text('');
                   $('#route_name').text('');
                   $('#gatepass_office').text('');
                   $('#customer_name').text('');
                   $('#total_docket').text('');
                   $('#totalChargeWt').text('');
                   $('#gp_id').val('');  
                    $('#table').html(''); 
                    $("#destination_office").val('');
                    $('#transferToOffice').val('');
                     $("#destination_office").text('');
                    $('#transferToOffice').text('');
                    $("#gatepass_number").val('');
  }

  function getGatePassInfo(){  
        var base_url = '{{url('')}}';
        if($("#gatepass_number").val()=='')
           {
              alert('please Enter Gatepass Number');
              return false;
           }
           if($("#destination_office").val()=='')
           {
              alert('please Enter Destination Office');
              return false;
           }
           var  gatepass_number = $("#gatepass_number").val();
           var destination_office  = $("#destination_office").val();
           var base_url = '{{url('')}}';

          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/getGatePassWithDocInfo',
           cache: false,
           data: {
           'gatepass_number':gatepass_number,  'destination_office':destination_office
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status=='true')
                {
                   if(obj.datas.fpm_details!=null && obj.datas.fpm_details.Trip_Type==1)
                   {
                    var tripType='OW';
                   }
                   else if(obj.datas.fpm_details!=null && obj.datas.fpm_details.Trip_Type==2)
                   {
                    var tripType='RT';
                   }
                   else{
                    var tripType='';
                   }
                   
                   $('#fpm_number').text(obj.datas.fpm_details.FPMNo);
                   $('#trip_type').text(tripType);
                    //obj.datas.Vehicle_Tarrif
                   //obj.datas.Driver_Adv
                   // Device_ID

                   $('#origin_city').text(obj.datas.route_master_details.statrt_point_details.CityName);
                   $('#gp_number').text(obj.datas.GP_Number);
                   $('#gp_time').text(obj.datas.GP_TIME);
                   $('#gp_type').text(obj.datas.Gp_Type);
                   $('#place_time').text(obj.datas.Place_Time);
                   $('#vendor_name').text(obj.datas.vendor_details.VendorName);
                   $('#destination_city').text(obj.datas.route_master_details.end_point_details.CityName);
                   $('#vechile_model').text(obj.datas.vehicle_type_details.VehicleType);
                   $('#vechile_number').text(obj.datas.vehicle_details.VehicleNo);
                   $('#driver_name').text(obj.datas.driver_details.DriverName);
                   $('#mobile_number').text(obj.datas.driver_details.Phone);
                   $('#seal_number').text(obj.datas.Seal);
                   $('#supervisor_name').text(obj.datas.Supervisor);
                   $('#start_km').text(obj.datas.Start_Km);
                   $('#vechile_tariff').text(obj.datas.Vehicle_Tarrif);
                   $('#remarks').text(obj.datas.Remark);

                   $("#device_id").text(obj.datas.Device_ID);
                    $('#route_name').text();
                    $('#gatepass_office').text();
                    $('#customer_name').text();
                   $('#total_docket').text();
                   $('#totalChargeWt').text();
                   $('#gp_id').val(obj.datas.id);   



                } 
                else{ 
                    alert('Gatepass No. Not Found');
                    $('.gp_number').val('');
                    return false;
                }
              }
            });

           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/getMutiDocketOnGate',
           cache: false,
           data: {
           'gatepass_number':gatepass_number,  'destination_office':destination_office
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status=='true' && obj.datas.length > 0 )
                {
                    var i =0;
                    var body =`<thead>
                        <tr class="main-title text-dark">
                            <th class="p-1 td11">SL#</th>
                             <th class="p-1 td12">All <input onclick="triggerCheck(); " type="checkbox" class="all" id="all" name="all" ></th>
                            <th class="p-1 td13">Docket Number</th>
                           

                            <th class="p-1 td14">Pieces</th>
                            <th class="p-1 td15">Weight</th>
                            <th class="p-1 td16">Destination City</th>
                            

                        </tr>
                         </thead> `;
                    $.each(obj.datas[0].get_pass_docket_details, function(i){
                        var a= i+1;
                        if(obj.datas[0].get_pass_docket_details[i].get_allocation_detail[0].Status!=null &&  obj.datas[0].get_pass_docket_details[i].get_allocation_detail[0].Status ==5){
                         body += `<tr><td class="p-1 ">`+a+`</td><td class="p-1"> <input type="checkbox" class="alld docketId" value="`+obj.datas[0].get_pass_docket_details[i].Docket+`" name="alld[]" checked>  </td>
                         <td class="p-1 "> `+obj.datas[0].get_pass_docket_details[i].Docket+`</td>
                         <td class="p-1">`+obj.datas[0].get_pass_docket_details[i].pieces+`</td>
                         <td class="p-1">`+obj.datas[0].get_pass_docket_details[i].weight+`</td>
                         <td class="p-1">`+obj.datas[0].get_pass_docket_details[i].dock_end_point.CityName+`</td>
                                    </tr>`;
                            }
                        ++i;
                    });
                    body += '</tbody>';
                    $('#table').html(body);
                } 
                else{ 
                    $('.gp_number').val('');
                    $('#table').html('');
                    alert("No Docket Found");
                    return false;
                }
              }
            });
           
    }

    function triggerCheck(){
        var proprty = $("#all").prop('checked');
        if(proprty==true){
            $(".alld").prop('checked', true);
        }
        else{
             $(".alld").prop('checked', false);
        }
        
    }

    function SubmitGatePassTrans(){
         var base_url = '{{url('')}}';
        var formData = new FormData();
         
       
             if($('#gatepass_number').val()=='' )
             {
                alert('Please Enter Gatepass number');
                return false;
             }

             if($('#destination_office').val()=='')
             {
                alert('Please Enter Destination Office');
                return false;
             }
         
             if($('#transferToOffice').val()==''){
                alert('Please Select Transfer To Office');
                return  false;
             }

              if($(".docketId").lenght== 0){
                alert('Docket Not Found');
                return  false;
             }
       var Docket =[];
        var GP_id = $('#gp_id').val(); 
        var gatepass_number =$('#gatepass_number').val();
        var destination_office = $('#destination_office').val();
        var transferToOffice = $('#transferToOffice').val();
         var DocketNumber = $(".docketId").each(function(i){
          var checkedIs=  $(this).prop('checked');
            if( checkedIs ==true){
                Docket.push($(this).val());
            }
         });
         for(var i=0; i< Docket.length; ++i){
          formData.append('Docket[]',Docket[i]);
        }
          formData.append('gatepass_number',gatepass_number);
          formData.append('destination_office',destination_office);
          formData.append('transferToOffice',transferToOffice);
           formData.append('GP_id',GP_id);
       

           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/submitGatepassTransfer',
           cache: false,
           contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
            const obj = JSON.parse(data);
             
               if(obj.success=='false')
               {
                 alert('Docket Not Found');
               //  $('.DocketNumber').val('');
               //  $('.DocketNumber').focus();
               //  $('.ReceivedQty').val('');
               //  $('#total').text('');
               //  $('#Scan').text('');
               //  $('#Pending').text('');
               //  $('#fileaimge').val('');
               
                return false;
               }
               else{
                 alert('Successfully Transfer');
                // $('.DocketNumber').val('');
                // $('.DocketNumber').focus();
                // $('.ReceivedQty').val('');
                // $('#total').text('');
                // $('#Scan').text('');
                // $('#Pending').text('');
                // $('#fileaimge').val('');
               
                return false;
               }
               
            
            }
            });
    }
 
    
   

</script>