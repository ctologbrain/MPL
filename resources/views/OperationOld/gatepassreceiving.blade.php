@include('layouts.appTwo')
<style>
    .checkclass
    {
        display:none;
    }
    label {
    font-size: 8.5pt !important;
    font-weight: 900;
    color: #444040
}
.ml-1{
    margin-left: 10px;
}
.consignorSelection
{
    display:none !important;
}
body{
    min-height: 830px !important;
}
.allLists{
    box-shadow: 0 2px 5px rgba(0, 0, 0, 1.0);
}
.gatepassreceiving-table thead th, .gatepassreceiving-table tbody td, .gatepassreceiving-table tfoot th {
    text-align: left;
    border: 1px solid #000;
}
.generator-container .form-control{
    margin-bottom: 0px;
}
</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary">
                        Excess Recieving
                    </button>
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                            <div class="col-6">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="userName">Receiving Type<span
                                                        class="error">*</span></label>
                                                        <div class="col-md-8">
                                                       
                                                         <select tabindex="1" class="form-control selectBox ReceivingType" name="ReceivingType" id="ReceivingType" onchange="getDocumantDetails(this.value)">
                                                            <option value="">--select--</option>
                                                            <option value="1">Docket</option>
                                                            <option value="2">Document</option>
                                                         </select>
                                                        <span class="error"></span>
                                                        </div>
                                                        <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="userName">Receiving Office<span
                                                         class="error">*</span></label>
                                                            <div class="col-md-8">
                                                            
                                                             <select tabindex="2" class="form-control selectBox office" name="office" id="office">
                                                                <option value="">--select--</option>
                                                               @foreach($offcie as $officelist)
                                                                <option value="{{$officelist->id}}">{{$officelist->OfficeCode}} ~ {{$officelist->OfficeName}}</option>
                                                                @endforeach
                                                             </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                     <div class="row">
                                                         <label class="col-md-3 col-form-label" for="userName">Receiving Date<span
                                                        class="error">*</span></label>
                                                        <div class="col-md-8">
                                                        <input type="text" tabindex="3" class="form-control datepickerOne rdate" name="rdate" id="rdate" >
                                                    
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                    
                                                   
                                                    <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="userName">Gatepass Number<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                        <input type="text" tabindex="4" class="form-control  gpNumber" name="gpNumber" id="gpNumber" onchange="getGatePassDetails(this.value);">
                                                        <input type="hidden" tabindex="4" class="form-control  gatePassId" name="gatePassId" id="gatePassId">
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="userName">Supervisor Name<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                        <input type="text" tabindex="5" class="form-control  supervisorName" name="supervisorName" id="supervisorName" >
                                                        
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                   
                                                    <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="userName">Remarks<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                        <textarea name="Remarks" tabindex="6" id="Remarks" class="form-control Remarks" cols="5" rows="5"></textarea>
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <h4 class="header-title nav nav-tabs nav-bordered mt-3"> </h4>
                                                    <div id="addClass">
                 <div class="col-12">
                    <div class="row">
                        <label class="col-md-3 col-form-label" for="userName">Docket Number<span class="error">*</span></label>
                        <div class="col-md-2">
                              <input type="text" tabindex="5" class="form-control  DocketNumber" name="DocketNumber" id="DocketNumber" onchange="getDocketDetails(this.value);"><span class="error"></span>
                        </div>
                         <div class="col-2">
                     <label class="col-md-4 col-form-label" for="userName">Total:</label>
                    <div class="col-md-8">
                        <span id="total"></span>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-2">
                     <label class="col-md-4 col-form-label" for="userName">Scan:</label>
                     <div class="col-md-8">
                        <span id="Scan"></span>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="col-3">
                    <label class="col-md-4 col-form-label" for="userName">Pending:</label>
                    <div class="col-md-8">
                    <span id="Pending"></span>
                    <span class="error"></span>
                    </div>
                </div>
                    </div>
                 </div>  
                <div class="col-12">
                    <div class="row">
                        <label class="col-md-3 col-form-label" for="userName">Received Qty</label>
                
                        <div class="col-md-8">
                         <input type="text" tabindex="5" class="form-control  ReceivedQty" name="ReceivedQty" id="ReceivedQty"><span class="error"></span>
                        </div>
                    </div>
                </div>  
                 
               
                                                    </div>
                                                    <div class="col-12 checkclass" id="showClass">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="userName">Document<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="file" name="fileaimge" id="fileaimge" class="form-control">
                                            
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                                     <div class="col-12">
                                            <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="7" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="SubmitGatePass()">
                                                <a href="{{url('PickupScan')}}" tabindex="8" class="btn btn-primary mt-3">Cancel</a>
                                            </div>
                                                    </div> 
                                                    
                                                </div>

                                           
                                            
                                            <div class="col-6">
                                                <table class="table table-bordered table-centered mb-1 ml-1 gatepassreceiving-table">
                                                            <tbody><tr>
                                                                <td align="left" class="lblMediumBold possition" nowrap="nowrap">Gatepass Office
                                                                </td>
                                                                <td align="left" class="possition" colspan="3">
                                                                    <span id="GatepassOffice"></span>
                                                                </td>
                                                            </tr>
                                                            <tr style="background-color:#ddd;">
                                                                <td align="left" class="lblMediumBold possition">FPM Number
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="FPMNumber"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition">Trip Type
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="TripType"></span>
                                                                </td>
                                                            </tr>
                                                            <tr style="background-color:#ddd;">
                                                                <td align="left" class="lblMediumBold possition">Origin City
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="FPMOriginCity"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition">Destination City
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="FPMDestinationCity"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition" style="width: 16%;">GP Number
                                                                </td>
                                                                <td align="left" class="possition" style="width: 33%;">
                                                                    <span id="GPNumber"></span>
                                                                    

                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" style="width: 18%;">GP Date&amp;Time
                                                                </td>
                                                                <td align="left" class="possition" style="width: 33%;">
                                                                  
                                                                    <span id="GPTime"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition">GP Type
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="GPType"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition">Place. Date&amp;Time
                                                                </td>
                                                                <td align="left" class="possition" style="width: 35%;">
                                                                
                                                                    <span id="VehPlaceTime"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td align="left" class="lblMediumBold possition">Vendor Name
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="VendorName"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Customer Name
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="CustomerName"></span>
                                                                </td>
                                                            </tr>
                                                          
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition">Route Name
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="RouteName"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Device ID
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="DeviceID"></span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition">Vehicle Model
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="VehicleModel"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Vehicle Number
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="VehicleNumber"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Driver Name
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="DriverName"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Mobile Number
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="MobileNumber"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Seal Number
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="SealNumber"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Supervisor Name
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="SupervisorName"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Start Km
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="StartKm"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Vehicle Tariff
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="VehicleTariff"></span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <b>Adv. To Driver</b>
                                                                    <span id="AdvToDriver"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Remarks
                                                                </td>
                                                                <td align="left" class="possition" colspan="3">
                                                                    <span id="RemarksgatePass"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Total Docket
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="ctl00_ContentPlaceHolder1_lblTotalDocket"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition" valign="top">Charge Wt.
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="ctl00_ContentPlaceHolder1_lblTotalChargeWeight"></span>
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
  function getGatePassDetails(getPass)
  {
         var base_url = '{{url('')}}';
         $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/getGatePassDetails',
           cache: false,
           data: {
           'getPass':getPass
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status=='true')
                {
                   $('.gatePassId').val(obj.datas.id)
                   if(obj.datas.fpm_details!=null)
                   {
                    $('#FPMNumber').text(obj.datas.fpm_details.FPMNo);
                   }
                  
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
                   $('#TripType').text(tripType);
                   $('#GPNumber').text(obj.datas.GP_Number);
                   $('#GPTime').text(obj.datas.GP_TIME);
                   $('#GPType').text(obj.datas.Gp_Type);
                   $('#VehPlaceTime').text(obj.datas.Place_Time);
                   $('#FPMOriginCity').text(obj.datas.route_master_details.statrt_point_details.CityName);
                   $('#FPMDestinationCity').text(obj.datas.route_master_details.end_point_details.CityName);
                   $('#VendorName').text(obj.datas.vendor_details.VendorName);
                   $('#DeviceID').text(obj.datas.Device_ID);
                   $('#SealNumber').text(obj.datas.Seal);
                   $('#StartKm').text(obj.datas.Start_Km);
                   $('#VehicleTariff').text(obj.datas.Vehicle_Tarrif);
                   $('#AdvToDriver').text(obj.datas.Driver_Adv);
                   $('#RemarksgatePass').text(obj.datas.Remark);
                   $('#VehicleModel').text(obj.datas.vehicle_type_details.VehicleType);
                   $('#VehicleNumber').text(obj.datas.vehicle_details.VehicleNo);
                   $('#DriverName').text(obj.datas.vehicle_details.VehicleNo);
                }
                else{
                    alert(obj.message)
                    $('.gpNumber').val('');
                    return false;
                }
              }
            });
  }
  function getDocketDetails(Docket)
  {
    if($('#gatePassId').val()=='')
    {
       alert('Please select Gatepass');
       $('.DocketNumber').val('');
       $('.DocketNumber').focus();
       return flase;
    }
    var gatePassId=$('#gatePassId').val();
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetDocketWithGatePass',
       cache: false,
       data: {
           'Docket':Docket,'gatePassId':gatePassId
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='true')
        {
            $('#total').text(obj.datas.pieces);
            $('#Scan').text(obj.datas.pieces);
            $('#Pending').text('');


        }
        else{
        alert('Docket not found');
        $('.DocketNumber').val('');
        $('.DocketNumber').focus();
        $('#total').text('');
        $('#Scan').text('');
        $('#Pending').text('');
        return flase;
        }
       }
     });
  }

  function SubmitGatePass(){
        var total=  parseInt($("#total").html());
          var receive = parseInt($("#ReceivedQty").val());
          if(receive > total){
            alert("please Enter less receive quantity than total");
            return false;
          }
        var base_url = '{{url('')}}';
        if($("#ReceivingType").val()=='')
           {
              alert('please select Receiving Type');
              return false;
           }
           if($("#office").val()=='')
           {
              alert('please select  office');
              return false;
           }
           
            if($("#rdate").val()=='')
           {
              alert('please Enter Receiving Date');
              return false;
           }
           if($("#gpNumber").val()=='')
           {
              alert('please select Gatepass Number');
              return false;
           }
           if($("#supervisorName").val()=='')
           {
              alert('please Enter Supervisor Name');
              return false;
           }
          
           
           var  ReceivingType = $("#ReceivingType").val();
           var office  = $("#office").val();
           var rdate  = $("#rdate").val();
           var gpNumber  = $("#gatePassId").val();
           var supervisorName  = $("#supervisorName").val();
           var DocketNumber  = $("#DocketNumber").val();
           var ReceivedQty  = $("#ReceivedQty").val();
           var Remarks  = $("#Remarks").val();
           var formData = new FormData();
         if ($('#fileaimge')[0].files.length > 0) 
         {
         for (var i = 0; i < $('#fileaimge')[0].files.length; i++)
          formData.append('file', $('#fileaimge')[0].files[i]);
         }
         if(ReceivingType==1){
             if($('#DocketNumber').val()=='' )
             {
                alert('Please Enter Docket No');
                return false;
             }

             if($('#ReceivedQty').val()=='')
             {
                alert('Please Enter Received Qty');
                return false;
             }
          }
         if(ReceivingType==2){
             if($('#fileaimge')[0].files.length==0){
                alert('Please choose file');
                return  false;
             }
        }
        
          formData.append('ReceivingType',ReceivingType);
          formData.append('office',office);
          formData.append('rdate',rdate);
          formData.append('gpNumber',gpNumber);
          formData.append('supervisorName',supervisorName);
          formData.append('DocketNumber',DocketNumber);
          formData.append('ReceivedQty',ReceivedQty);
          formData.append('Remarks',Remarks);
          formData.append('ActualQty',total);
       

           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/SubmitVehicleGatePassRe',
           cache: false,
           contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
            const obj = JSON.parse(data);
             $('.tabels').html(obj.datas);
               if(obj.status=='false')
               {
                alert('Docket already added in this gatepass');
                $('.DocketNumber').val('');
                $('.DocketNumber').focus();
                $('.ReceivedQty').val('');
                $('#total').text('');
                $('#Scan').text('');
                $('#Pending').text('');
                $('#fileaimge').val('');
               
                return false;
               }
               else{
                $('.DocketNumber').val('');
                $('.DocketNumber').focus();
                $('.ReceivedQty').val('');
                $('#total').text('');
                $('#Scan').text('');
                $('#Pending').text('');
                $('#fileaimge').val('');
               
                return false;
               }
               
            
            }
            });
    }
   

    
function getDocumantDetails(id)
{
   if(id==1)
   {
    $('#addClass').removeClass('checkclass');
    $('#showClass').addClass('checkclass');
   }
   else if(id==2)
   {
    $('#addClass').addClass('checkclass');
    $('#showClass').removeClass('checkclass');
   }
   else{
    $('#addClass').removeClass('checkclass');
    $('#showClass').addClass('checkclass');
   }
}

 //     function DepositeCashToHo()
 // {
 //  // $(".btnSubmit").attr("disabled", true);
 //   if($('#projectCode').val()=='')
 //   {
 //      alert('please Enter project Code');
 //      return false;
 //   }
 //   if($('#projectName').val()=='')
 //   {
 //      alert('please Enter project Name');
 //      return false;
 //   }
   
 //    if($('#ProjectCategory').val()=='')
 //   {
 //      alert('please select Project Category');
 //      return false;
 //   }
 //   var projectCode=$('#projectCode').val();
 //   var projectName=$('#projectName').val();
 //   var ProjectCategory=$('#ProjectCategory').val();
 //   var Pid=$('#Pid').val();
 
 //      var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/AddProduct',
 //       cache: false,
 //       data: {
 //           'projectCode':projectCode,'projectName':projectName,'ProjectCategory':ProjectCategory,'Pid':Pid
 //       },
 //       success: function(data) {
 //        location.reload();
 //       }
 //     });
 //  }  
 //  function viewproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', true);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', true);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', true);
      
 //       }
 //     });
 //  }
 //  function Editproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.Pid').val(obj.id);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', false);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', false);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', false);
        
      
 //       }
 //     });
 //  }
</script>