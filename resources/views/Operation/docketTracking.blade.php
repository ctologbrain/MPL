@include('layouts.appTwo')
<style>
 .ssss > td ~ td {
    display: none;

}
</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">Docket Tracking</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card docket_tracking_container">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                               <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                           <div class="col-12">
                                               <div class="row">
                                                   <table class="table-responsive docket_tracking">
                                                       <tr>
                                                        <td colspan="5">
                                                            <form method="get">
                                                            <div class="row pb-1">
                                                                <div class="col-3">DOCKET NUMBER </div>
                                                                <div class="col-4">
                                                                <input type="text" tabindex="1" value="{{ request()->get('docket') }}" class="form-control docket" name="docket" id="docket">
                                                                </div>
                                                                <div class="col-3">
                                                                    <button type="submit" class="btn btn-primary" tabindex="2">Go</button>
                                                                     <a href="{{url('docketTracking')}}" class="btn btn-primary" tabindex="2">Refresh</a>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                                    </form>
                                                        </td>
                                                        <td class="back-color">DACC</td>
                                                        <td><span id="dacc">@if(isset($Docket->Is_DACC)){{$Docket->Is_DACC}}@endif</span></td>
                                                        <td class="back-color">SALE TYPE</td>
                                                        <td><span id="sale_type">
                                                            @if(isset($Docket->Booking_Type) && $Docket->Booking_Type==1) Credit
                                                            @elseif(isset($Docket->Booking_Type) && $Docket->Booking_Type==2)
                                                            FOC
                                                             @elseif(isset($Docket->Booking_Type) && $Docket->Booking_Type==3)
                                                             Cash
                                                              @elseif(isset($Docket->Booking_Type) && $Docket->Booking_Type==4)
                                                            Topay
                                                            @else
                                                            {{''}}
                                                            @endif

                                                        </span></td>
                                                        
                                                       </tr>
                                                       <tr>
                                                        <td class="back-color d11">BOOKING DATE</td>
                                                        <td class="d12"><span id="booking_date">@if(isset($Docket->Booking_Date)){{date("d-m-Y H:i:s",strtotime($Docket->Booking_Date))}}@endif</span></td>
                                                        <td class="back-color d13">BOOKING BRANCH</td>
                                                        <td colspan="2" class="d14"><span id="booking_branch">@if(isset($Docket->offcieDetails->OfficeName)){{$Docket->offcieDetails->OfficeCode}}~{{$Docket->offcieDetails->OfficeName}}@endif</span></td>
                                                        <td class="back-color d15">MODE</td>
                                                        <td class="d-16"><span id="mode">@isset($Docket->Mode) {{$Docket->Mode}} @endisset</span></td>
                                                        <td class="back-color d17">DELIVERY TYPE</td>
                                                        <td class="d18"><span id="delivery_type">@if(isset($Docket->DevileryTypeDet->Title)){{$Docket->DevileryTypeDet->Title}}@endif</span></td>
                                                       </tr>
                                                       <tr>
                                                        <td class="back-color d11">ORIGIN</td>
                                                        <td class="d12"><span id="origin">@if(isset($Docket->PincodeDetails->CityDetails->CityName)) {{$Docket->PincodeDetails->CityDetails->CityName}} - {{$Docket->PincodeDetails->PinCode}} @endif</span></td>
                                                        <td class="back-color d13">DESTINATION</td>
                                                        <td colspan="2" class="d14"><span id="destination">@if(isset($Docket->DestPincodeDetails->CityDetails->CityName)) {{$Docket->DestPincodeDetails->CityDetails->CityName}} - {{$Docket->DestPincodeDetails->PinCode}}@endif</span></td>
                                                        <td class="back-color d15">TOTAL INVOICE</td>
                                                        <td class="d-16"><span id="total_invoice">@isset($Docket->id)<a onclick="getInvoiceDet('{{$Docket->id}}');" href="javascript:void(0)">@isset($Docket->Total) {{$Docket->Total}} @endisset</a> @endisset</span></td>
                                                        <td class="back-color d17">TOTAL GOODS VALUE</td>
                                                        <td class="d18"><span id="total_good_value">
                                                            @isset($Docket->docket_invoice_details_sum_amount) {{$Docket->docket_invoice_details_sum_amount}} @endisset</span>
                                                        </td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">SHIPPER</td>
                                                        <td class="d12" colspan="4"><span id="shipper">@isset($Docket->customerDetails->CustomerCode) {{$Docket->customerDetails->CustomerCode}}~{{$Docket->customerDetails->CustomerName}} @endisset</span></td>
                                                       
                                                        <td class="back-color d15">PIECES</td>
                                                        <td class="d-16"><span id="pcs">@if(isset($Docket->DocketProductDetails->Qty)){{$Docket->DocketProductDetails->Qty}}@endif</span></td>
                                                        <td class="back-color d17">ACTUAL WEIGHT</td>
                                                        <td class="d18"><span id="act_wt">@if(isset($Docket->DocketProductDetails->Actual_Weight)){{$Docket->DocketProductDetails->Actual_Weight}}@endif</span></td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">CONSIGNOR</td>
                                                        <td class="d12" colspan="4"><span id="consignor">@if(isset($Docket->consignor->ConsignorName)){{$Docket->consignor->ConsignorName}}@endif</span></td>
                                                       
                                                        <td class="back-color d15">CHARGE WEIGHT</td>
                                                        <td class="d-16"><span id="chrg_wt">@if(isset($Docket->DocketProductDetails->Charged_Weight)){{$Docket->DocketProductDetails->Charged_Weight}}@endif</span></td>
                                                        <td class="back-color d17">VOLUMETRIC WEIGHT</td>
                                                        <td class="d18"><span id="volu_wt">@if(isset($Docket->DocketProductDetails->Is_Volume)){{$Docket->DocketProductDetails->Is_Volume}}@endif</span></td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">CONSIGNEE</td>
                                                        <td class="d12" colspan="4"><span id="consignee">@if(isset($Docket->consignoeeDetails->ConsigneeName)){{$Docket->consignoeeDetails->ConsigneeName}}@endif</span></td>
                                                       
                                                        <td class="back-color d15">EDD</td>
                                                        <?php 
                                                        if(isset($Docket->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->TransitDays)){
                                                        $transit = $Docket->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->TransitDays;
                                                        }
                                                        else{
                                                        $transit =0;
                                                        }
                                                        if(isset($Docket->Booking_Date)){
                                                        $BookDate =date("Y-m-d",strtotime($Docket->Booking_Date));
                                                        $eddDate=date("d-m-Y", strtotime($BookDate."+".$transit." day"));
                                                        } ?>
                                                        <td class="d-16"><span id="eod">
                                                        @isset($eddDate) {{$eddDate}} @endisset
                                                        </span></td>
                                                        <td class="back-color d17">PRODUCT NAME</td>
                                                        <td class="d18"><span id="product_name">
                                                            @if(isset($Docket->DocketProductDetails->DocketProdductDetails->Title)) {{$Docket->DocketProductDetails->DocketProdductDetails->Title}}@endif

                                                        </span></td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">REMARKS</td>
                                                        <td class="d12" colspan="4"><span id="remarks">@if(isset($Docket->Remark)){{$Docket->Remark}}@endif</span></td>
                                                       
                                                        <td class="back-color d15">CS PERSON</td>
                                                        <td class="d-16" colspan="4"><span id="cs_person"> @if(isset($Docket->customerDetails->CRMExecutive)){{$Docket->customerDetails->CRMExecutive}}@endif </span></td>
                                                        
                                                       </tr>
                                                       <tr class="back-color">
                                                        <td class=" d11 blue-color">LAST STATUS</td>
                                                        <td class="d12" colspan="2"><span id="last_status">@if(isset($Docket->DocketAllocationDetail->GetStatusWithAllocateDett->title)) {{strtoupper($Docket->DocketAllocationDetail->GetStatusWithAllocateDett->title)}}@endif</span></td>
                                                       
                                                        <td class="d15 blue-color">STATUS DATE</td>
                                                        <td class="d-14"><span id="status_date">@if(isset($Docket->DocketAllocationDetail->BookDate)){{date("d-m-Y",strtotime($Docket->DocketAllocationDetail->BookDate))}}@endif </span></td>
                                                        <td class="d-15 blue-color">LAST LOCATION</td>
                                                        <td class="d16"><span id="last_location"></span></td>
                                                        <td class="td17 blue-color">INVOICE NO.</td>
                                                        <td class="td18"><span id="invoice_no">@if(isset($Docket->DocketInvoiceDetails->Invoice_No)) {{$Docket->DocketInvoiceDetails->Invoice_No}} @endif</span></td>
                                                       </tr>

                                                   </table>
                                                   <div class="col-11 mt-1">
                                                    
                                                      <button type="button" class="btn btn-secondary mb-1">Case Open</button>
                                                     <button type="button" class="btn btn-secondary mb-1">Case ViewClose</button>
                                                      <button type="button" class="btn btn-secondary mb-1">Comments</button>
                                                       <button type="button" class="btn btn-secondary mb-1">Upload POD Image</button>
                                                        <button type="button" class="btn btn-secondary mb-1">POD Image</button>
                                                         <button type="button" class="btn btn-secondary mb-1">View Sign</button>
                                                          <img src="assets/images/map.png"/>
                                                          <button type="button" class="btn btn-secondary mb-1">Delivery Address</button>
                                                          <button type="button" class="btn btn-secondary mb-1">Item Detail</button>
                                                          <button type="button" class="btn btn-secondary mb-1">AWB Load Image</button>
                                                          <button type="button" class="btn btn-secondary mb-1">RTO Image</button>
                                                          
                                                          
                                                   </div>
                                                    <div class="col-1 mt-1 text-end">
                                                      <button type="button" class="btn btn-primary text-end">Export</button>
                                                    </div>
                                               </div>
                                           </div>   


                                           <div class="col-md-12">
                                            <div class="row">
                                            <div class="table-responsive a" style="display: flex;">
                                                  <table class="table table-bordered table-centered mb-1 mt-1 ccccc" style="width: 5%;">
                                                          <thead>
                                                          <tr class="main-title text-dark">
                                                          <th class="p-1">sr</th>
                                                             
                                                            </tr>
                                                         </thead>
                                                         <tbody class="docketTracking-tbody">
                                                         <?php $i=0; foreach($data as $value){?>
                                                            @if($value !='')
                                                            <?php $i++; ?>
                                                             <tr class="ssss">
                                                                 <td>{{$i}}</td>
                                                                 <?php $ssss=explode("</td>",$value); ?>
                                                                 <td style="display: none;"> <?php echo $ssss[2]; ?></td>
                                                                
                                                            </tr>
                                                            @endif
                                                            
                                                           
                                                        
                                                         <?php } ?>
                                                       </tbody>
                                                               
                                                  </table> 
                                              <div class="table-responsive a">
                                                  <table class="table table-bordered table-centered mb-1 mt-1 ccccc" width="95%">
                                                          <thead>
                                                          <tr class="main-title text-dark">
                                                          
                                                              <th class="p-1">Activity</th>
                                                              <th class="p-1">Activity Date</th>
                                                              <th class="p-1">Description</th>
                                                              <th class="p-1">Entry Date</th>
                                                              <th class="p-1">Entry Detail</th>
                                                            </tr>
                                                         </thead>
                                                         <tbody class="docketTracking-tbody">
                                                         <?php 
                                                         
                                                         $i=0; foreach($data as $value){$i++;?>
                                                           
                                                           @if($value !='')
                                                                 <?php echo $value;?>
                                                            @endif
                                                            
                                                           
                                                        
                                                         <?php } ?>
                                                       </tbody>
                                                               
                                                  </table> 
                                              </div>
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
<div class="InvoiceModel"></div>



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

function getInvoiceDet(id){
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetDocketInvoiceDetail',
       cache: false,
       data: {
           'id':id
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       }
     });
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