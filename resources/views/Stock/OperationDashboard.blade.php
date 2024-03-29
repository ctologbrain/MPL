@include('layouts.appTwo')
<style type="text/css">
  .mt-1{
    margin-top: 7px;
  }
</style>
<div class="generator-container allLists">
   
    <div class="row">
        <div class="col-xl-12">
            <div class="card flexycargo_container">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                               <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-11">
                                          <div class="row">
                                           <div class="d-flex justify-content-between">
                                               
                                                   
                                                   <div class="">
                                                     <div class="header-part">
                                                      <h6 class="text-center btn-primary p-1">BOOKING</h6>
                                                       <div class="row">
                                                        
                                                         <div class="col-8">
                                                          <p><b>Challan</b></p>
                                                          <p><b>Short Booking</b></p>
                                                          <p><b>Booking</b></p>
                                                          <p><b>DACC</b></p>
                                                         </div>
                                                         <div class="col-4">
                                                         <!-- $PickUpScan->Total -->
                                                          <p><a href="{{url('VehicleHireChallanDashboard')}}">{{$Challan->Total}}</a></p>
                                                          <p><a href="{{url('ShortBookingDashboard')}}">{{$ShortBooking->Total}} </a></p>
                                                          <p><a href="{{url('BookingDashboardReport')}}">{{$TotalBookingCredit->Total}}/  {{$TotalBookingCash->Total}}</a></p>
                                                          <p><a href="{{url('DACCDashboard')}}">{{$DaccDocket->Total}}</a></p>
                                                          
                                                         </div>
                                                       </div>
                                                     </div>
                                                   </div>
                                                   <div class="">
                                                     <div class="header-part">
                                                      <h6 class="text-center btn-secondary p-1">INTRANSIT</h6>
                                                       <div class="row">
                                                        
                                                         <div class="col-8">
                                                          <p><b>Missing Gatepass</b></p>
                                                          <p><b>3PL Forwarding</b></p>
                                                          <p><b>Pending Recieving</b></p>
                                                          <p><b>Open DRS</b></p>
                                                         </div>
                                                         <div class="col-4">
                                                          <p><a href="{{url('MissingGatePassWithDocket')}}">{{$MissingGatePass->Total}}/0</a></p>
                                                          <p><a href="{{url('ForwardingDashboard')}}"> {{$Forwarding->Total}} </a></p>
                                                          <p><a href="{{url('PendingReceivingDashboard')}}">{{$PendingRecieving->Total}}</a></p>
                                                          <p><a href="{{url('OpenDRSDashboard')}}">{{$OpenDRS->Total}}</a></p>
                                                         </div>
                                                       </div>
                                                     </div>
                                                   </div>
                                                   <div class="">
                                                     <div class="header-part">
                                                      <h6 class="text-center btn-danger p-1">DELIVERY</h6>
                                                       <div class="row">
                                                        
                                                         <div class="col-8">
                                                          <p><b>Delay Consignments</b></p>
                                                          <p><b>Pending Deliveries</b></p>
                                                          <p><b>Missing POD Image</b></p>
                                                          
                                                         </div>
                                                         <div class="col-4">
                                                          <p><a href="{{url('DelayConsignmentreport')}}">{{$DelayReport->Total}} </a></p>
                                                          <p><a href="{{url('PendingDeliveryDashboard')}}">{{$PendingDeliverd->Total}}</a></p>
                                                          <p><a href="{{url('MissingPODImageDashboard')}}">{{$MissingPOD->Total}}</a></p>
                                                         
                                                         </div>
                                                       </div>
                                                     </div>
                                                   </div>
                                                   <div class="">
                                                     <div class="header-part">
                                                      <h6 class="text-center btn-warning p-1">ALERT</h6>
                                                       <div class="row">
                                                        
                                                         <div class="col-8">
                                                          <p><b>Pending ToPay/Cash</b></p>
                                                          <p><b>NDR</b></p>
                                                          <p><b>Today's EDD</b></p>
                                                          
                                                         </div>
                                                         <div class="col-4">
                                                          <p><a href="{{url('CashTopayCollectionDashbord')}}">@if(isset($PendingTopay->Total))  {{$PendingTopay->Total}} @else 0 @endif / @if(isset($PendingCash->Total)){{$PendingCash->Total}} @else 0 @endif</a></p>
                                                          <p><a href="{{url('NDRDashbordReport')}}">{{$NDR->Total}}</a></p>
                                                          <p><a href="{{url('ToadyEddDashboard')}}">{{$EddToday->Total}}</a></p>
                                                         
                                                         </div>
                                                       </div>
                                                     </div>
                                                   </div>
                                                   <div class="">
                                                     
                                                     <div class="header-part">
                                                      <h6 class="text-center btn-success p-1">E-WAY BILLS</h6>
                                                       <div class="row">
                                                        
                                                         <div class="col-8">
                                                          <p><b>Unused EWB</b></p>
                                                          <p><b>To Be Expired EWB</b></p>
                                                         
                                                          
                                                         </div>
                                                         <div class="col-4">
                                                          <p><a href="{{url('UnUsedEwayDashboard')}}">{{$UnusedEway->Total}}</a></p>
                                                          <p><a href="{{url('OperationDashboard')}}">0</a></p>
                                                        
                                                         
                                                         </div>
                                                       </div>
                                                     </div>
                                                   </div>
                                                   
                                              
                                           </div>
                                           <div class="col-4 mt-3">
                                           
                                            <h6 class="back-color text-center p-1 margin-1"><b>Sector Wise Tonnage</b> </h6>
                                             <div class="overflow-scroll-table">
                                              <table class="table-bordered">
                                               
                                                <thead>
                                                 
                                                  <tr class="back-color">
                                                    <td class="p-1 td1"><b>SL#</b></td>
                                                    <td class="p-1 td2"><b>Org-Dest</b></td>
                                                    <td class="p-1 td3"><b>Weight</b></td>
                                                  </tr>
                                                  <?php $j=0; $totalW=0;  ?>
                                                  @foreach($OrgDestAndWeight as $key)
                                                  <?php $j++; ?>
                                                   <tr>
                                                    <td class="p-1 td1">{{$j}}</td>
                                                    <td class="p-1 td2">{{$key->Origin}} - {{$key->Destination}} </td>
                                                    <td class="p-1 td3">{{$key->Weight}}</td>
                                                  </tr>
                                                  <?php $totalW += $key->Weight; ?>
                                                   @endforeach
                                                   <tr class="back-color">
                                                   <td class="p-1 td1" colspan="2" ><b>Total</b></td>
                                                   <td class="p-1 td1"><b>{{$totalW}}</b></td>
                                                   </tr>
                                                </thead>
                                              </table>
                                            </div>
                                          
                                           </div>   

                                           <div class="col-8 mt-3">
                                            <h6 class="back-color text-center p-1 margin-1"> <b>Route Wise Tonnage</b></h6>
                                            <div class="overflow-scroll-table">
                                              <table class="table-bordered">
                                              
                                                <thead>
                                                  
                                                  <tr class="back-color">
                                                    <td class="p-1 td1"><b>SL#</b></td>
                                                    <td class="p-1 td2"><b>Route Name</b></td>
                                                    <td class="p-1 td3"><b>Weight</b></td>
                                                  </tr>
                                                  <?php $i=0; $weightTot=0; ?>
                                                  @foreach($RouteAndWeight as $key)
                                                  <?php $i++; ?>
                                                   <tr>
                                                    <td class="p-1 td1">{{$i}}</td>
                                                    <td class="p-1 td2"><a href="#">{{$key->srcc}} -  @if(isset($key->TouchPointCity) ) {{$key->TouchPointCity}}  @endif {{$key->Destin}}  </a></td>
                                                    <td class="p-1 td3"> @isset($key->Weight) {{$key->Weight}} @endisset</td>
                                                  </tr>
                                                  <?php $weightTot += $key->Weight; ?>
                                                  @endforeach
                                                  <tr class="back-color">
                                                  <td class="p-1 td1" colspan="2" ><b>Total</b></td>
                                                   <td class="p-1 td1"><b>{{$weightTot}}</b></td>
                                                   </tr>
                                                </thead>
                                              </table>
                                             </div>
                                           </div> 
                                           <div class="col-6 mt-1">
                                              <h4 class="p-1 text-center back-color ">Arrival</h4>
                                            </div>
                                            <div class="col-6 mt-1">
                                              <h4 class="p-1 text-center back-color">Departure</h4>
                                            </div>  
                                         </div>
                                        </div>
                                        <div class="col-1">
                                          <div class="row">
                                          <ul class="right_listing">
                                            <li><a style="color:#fff;" href="{{url('OperationDashboard')}}">CRM Dashboard</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('VehicleHireChallan')}}"> Vehicle Hire</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('PickupScan')}}"> Pickup</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('CreditBooking')}}"> Credit Booking</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('CashBooking')}}"> Cash Booking</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('PartLoadMapping')}}"> Part Load Map</a></li>
                                            <li><a   style="color:#fff;" href="{{url('')}}"> Loading Sheet</a></li>
                                            <li><a   style="color:#fff;" href="{{url('VehicleGatepass')}}"> Gatepass</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('ColoaderManifest')}}"> Coloader MF</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('OffLoadEntry')}}"> Offload</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('GateReceiving')}}"> Recieving</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('DRSEntry')}}"> DRS</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('DRSWiseUpdation')}}"> Delivery</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('OperationDashboard')}}"> GPS Tracker</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('home')}}"> Planner</a></li>
                                            <li><a  style="color:#fff;"  href="{{url('docketTracking')}}"> Query</a></li>

                                          </ul>
                                        </div>
                                        </div>


                                        
                                   </div>
                               </div>
                           </div>
                        </div> <!-- tab-content -->
                       
                    </form>

                </div> <!-- end card-body -->
                <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row tabels">
                            </div>
                        </div>
                
                </div> <!-- end card-->

            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>




<script type="text/javascript">

  
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
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
              alert('please Enter Scan Date');
              return false;
           }
           if($("#vehicleType").val()=='')
           {
              alert('please select  Vehicle Type');
              return false;
           }
           
            if($("#vendorName").val()=='')
           {
              alert('please Enter Vendor Name');
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
            
            }
            });
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

</script>