@include('layouts.appTwo')
<style>
 .ssss > td ~ td {
    display: none;
    min-width:400px;
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
                <h4 class="getAlert text-danger"></h4>
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
                                                             Cash  <b>Amount:</b> @isset($Docket->TariffTypeDeatils->TotalAmount) {{$Docket->TariffTypeDeatils->TotalAmount}} @endisset
                                                              @elseif(isset($Docket->Booking_Type) && $Docket->Booking_Type==4)
                                                             Topay    <b>Amount:</b> @isset($Docket->TariffTypeDeatils->TotalAmount) {{$Docket->TariffTypeDeatils->TotalAmount}} @endisset
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
                                                        <td colspan="2" class="d14"><span id="destination">@if(isset($Docket->DestPincodeDetails->CityDetails->CityName)) {{$Docket->DestPincodeDetails->CityDetails->CityName}} - {{$Docket->DestPincodeDetails->PinCode}} 
                                                        @if($Docket->DestPincodeDetails->ARP=="Yes") ({{'Regular'}}) @elseif($Docket->DestPincodeDetails->ODA=="Yes")  ({{'ODA'}}) @endif  @endif</span></td>
                                                        <td class="back-color d15">TOTAL INVOICE</td>
                                                        <td class="d-16"><span id="total_invoice">@isset($Docket->id)<a onclick="getInvoiceDet('{{$Docket->id}}');" href="javascript:void(0)">@isset($Docket->Total) {{$Docket->Total}} @endisset</a> @endisset</span></td>
                                                        <td class="back-color d17">TOTAL GOODS VALUE</td>
                                                        <td class="d18"><span id="total_good_value">
                                                            @isset($Docket->docket_invoice_details_sum_amount) {{number_format($Docket->docket_invoice_details_sum_amount,2,".","")}} @endisset</span>
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
                                                        <td class="d18"><span id="volu_wt"><a style="font-size:21px;" @if(isset($Docket->DocketProductDetails->VolumetricWeight)) onclick="openVolumetricWeight('{{$Docket->id}}');" @else onclick="alertCustome('VOLUMETRIC DETAILS NOT FOUND !');" @endif href="javascript:void(0);"> @if(isset($Docket->DocketProductDetails->VolumetricWeight)){{number_format($Docket->DocketProductDetails->VolumetricWeight,2,".","")}} @else 0.00 @endif </a></span></td>
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
                                                        
                                                        if(isset($Docket->Booking_Date) && $transit!=0)
                                                        {
                                                            $BookDate =date("Y-m-d",strtotime($Docket->Booking_Date));
                                                            $eddDate=date("d-m-Y", strtotime($BookDate."+".$transit." day"));
                                                        }
                                                        else
                                                        {
                                                            $eddDate='';  
                                                        }
                                                         ?>
                                                        <td class="d-16"><span id="eod">
                                                       @if(isset($Docket->DocketAllocationDetail->DeliveryDate)) {{date("d-m-Y", strtotime($Docket->DocketAllocationDetail->DeliveryDate))}} @else {{$eddDate}} @endif
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
                                                        <td class="d-16" colspan="4"><span id="cs_person"> @if(isset($Docket->customerDetails->CRMDetails->EmployeeName)){{$Docket->customerDetails->CRMDetails->EmployeeName}}@endif </span></td>
                                                        
                                                       </tr>
                                                       <tr class="back-color">
                                                        <td class=" d11 blue-color">LAST STATUS</td>
                                                        <td class="d12" colspan="2"><span id="last_status">@if(isset($Docket->DocketAllocationDetail->GetStatusWithAllocateDett->title)) {{strtoupper($Docket->DocketAllocationDetail->GetStatusWithAllocateDett->title)}}@endif</span></td>
                                                       
                                                        <td class="d15 blue-color">STATUS DATE</td>
                                                        <td class="d-14"><span id="status_date">@if(isset($Docket->DocketAllocationDetail->BookDate)){{date("d-m-Y",strtotime($Docket->DocketAllocationDetail->BookDate))}}@endif </span></td>
                                                        <td class="d-15 blue-color">LAST LOCATION</td>
                                                        <td class="d16"><span id="last_location">@if(isset($Docket->DocketAllocationDetail->EmployeeDetails->OfficeMasterParent->CityDetails->CityName)) {{$Docket->DocketAllocationDetail->EmployeeDetails->OfficeMasterParent->CityDetails->CityName}} @endif </span></td>
                                                        <td class="td17 blue-color">INVOICE NO.</td>
                                                        <td class="td18"><span id="invoice_no">@if(isset($Docket->InvoiceMasterMainDetails->InvoiceMastersDet->InvNo)) {{$Docket->InvoiceMasterMainDetails->InvoiceMastersDet->InvNo}} @endif</span></td>
                                                       </tr>

                                                   </table>
                                                   <div class="col-11 mt-1">
                                                        @if(isset($Docket->Docket_No) && isset($Docket->DocketCaseDetails->Docket_Number))
                                                        <button disabled type="button" class="btn btn-secondary mb-1">Case Open</button>
                                                        
                                                        @else   
                                                        <button  onclick="OpenCase();"   type="button" class="btn btn-secondary mb-1">Case Open</button>
                                                        @endif
                                                        @if(isset($Docket->Docket_No) && isset($Docket->DocketCaseDetails->id))
                                                        
                                                        <button onclick="ViewallCase('{{$Docket->DocketCaseDetails->id}}');" type="button" class="btn btn-secondary mb-1">Case View/Close</button>
                                                        @else
                                                        <button disabled type="button" class="btn btn-secondary mb-1">Case View/Close</button>
                                                        @endif

                                                        @if(isset($Docket->Docket_No))
                                                      <button onclick="OpenCommentsection();" type="button" class="btn btn-secondary mb-1">Comments</button>
                                                      @else
                                                      
                                                      <button disabled type="button" class="btn btn-secondary mb-1">Comments</button>
                                                      @endif
                                                      @if(isset($Docket->Docket_No) && isset($Docket->DocketImagesDet->file)) 
                                                       <button disabled type="button" class="btn btn-secondary mb-1">Upload POD Image</button>
                                                       @else
                                                       <button onclick="UploadImageDocket();" type="button" class="btn btn-secondary mb-1">Upload POD Image</button>
                                                      @endif
                                                       @if(isset($Docket->Docket_No) && isset($Docket->DocketImagesDet->file)) 
                                                        <a href="{{url($Docket->DocketImagesDet->file)}}" target="_blank" class="btn btn-secondary mb-1">POD Image</a>
                                                       @else  
                                                       <button disabled type="button"  class="btn btn-secondary mb-1">POD Image</button>
                                                       @endif
                                                         <button disabled type="button" class="btn btn-secondary mb-1">View Sign</button>
                                                          <img style="cursor:pointer;" src="{{url('public/map.png')}}"/>
                                                          @if(isset($Docket->id))
                                                          <button onclick="getDelivereyAddress('{{$Docket->id}}');" type="button" class="btn btn-secondary mb-1">Delivery Address</button>
                                                          @else
                                                          <button disabled type="button" class="btn btn-secondary mb-1">Delivery Address</button>
                                                          @endif

                                                          @if(isset($Docket->id) && isset($Docket->Total) && $Docket->Total >0)
                                                          <button  onclick="getInvoiceDet('{{$Docket->id}}');" type="button" class="btn btn-secondary mb-1">Item Detail</button>
                                                          @else
                                                          <button disabled type="button" class="btn btn-secondary mb-1">Item Detail</button>
                                                          @endif
                                                          

                                                          <button disabled type="button" class="btn btn-secondary mb-1">AWB Load Image</button>
                                                          @if(isset($Docket->RTODataDetails->Attachment))
                                                          <a   href="{{url($Docket->RTODataDetails->Attachment)}}" target="_blank" class="btn btn-secondary mb-1">RTO Image</a>
                                                          @else
                                                          <button disabled type="button" class="btn btn-secondary mb-1">RTO Image</button>
                                                          @endif
                                                          
                                                          
                                                   </div>
                                                    <div class="col-1 mt-1 text-end">
                                                      <a @isset($Docket->Docket_No) href="{{url('DocketTrackExport?docketId=').$Docket->Docket_No}}" @endisset class="btn btn-primary text-end">Export</a>
                                                    </div>
                                                    <div class="col-12 mt-1 getdetails">
                                                    @if(isset($Case->id))
                                                    @if(isset($Case->Case_Status) && $Case->Case_Status==1)
                                                  <?php  $Status ="Open"; ?>
                                                
                                                    @elseif($Case->Case_Status==2)
                                                   <?php $Status ="Close"; ?>
                                                
                                                    @else
                                                   <?php $Status =""; ?>
                                                        
                                                    @endif

                                                    @if(isset($Case->EmployeeDetail->EmployeeName))
                                                      <?php  $user = $Case->EmployeeDetail->EmployeeName; ?>
                                                    @else
                                                      <?php  $user =""; ?>
                                                    @endif

                                                    @if(isset($Case->EmployeeUpdateDetail->EmployeeName))
                                                      <?php  $userUpdate = $Case->EmployeeUpdateDetail->EmployeeName; ?>
                                                    @else
                                                      <?php  $userUpdate =""; ?>
                                                    @endif
                                                    <table style='width:100%;'><body>
                                                    <tr  style='background-color:#888888;'><td class='p-1' colspan='8' style='color:#fff;' ><b>CASE DETAILS</b></td></tr>
                                                    <tr>
                                                    <td  style='width:100px;'><b class="back-color p-2  d11"> Case No</b></td>
                                                    <td class='p-1' style='width:100px;'>{{$Case->Case_number}}</td>
                                                    <td  style='width:100px;'> <b  class='back-color d11 p-2'> Case Open Date </b></td>
                                                        <td class='p-1'  style='width:100px;'>@if(isset($Case->Case_Status) ) {{date("d-m-Y",strtotime($Case->Case_OpenDate))}}  @endif</td>
                                                    <td   style='width:100px;'> <b class='back-color d11 p-2'>Case Status </b></td>
                                                        <td class='p-1'  style='width:100px;'>{{$Case->Case_Status}}</td>
                                                    <td   style='width:100px;'> <b class='back-color d11 p-2'>User Name </b></td>
                                                        <td class='p-1'  style='width:100px;'> @if(isset($Case->Case_Status) && ($Case->Case_Status=="OPEN" || $Case->Case_Status=="Query"))  {{$user}} @else {{$userUpdate}} @endif</td>
                                                    </tr> </body>  </table>
                                                    @endif
                                                    </div>
                                               </div>
                                           </div>   


                                           <div class="col-md-12">
                                            <div class="row">
                                            <div class="table-responsive a" style="display: flex;">
                                                  <table class="table table-bordered table-centered mb-1 mt-1 ccccc tableNumber" style="width: 5%;">
                                                          <thead>
                                                          <tr class="main-title text-dark">
                                                          <th  class="p-1">sr</th>
                                                          <th style="min-width:300px; display:none;" class="p-1"></th>
                                                            </tr>
                                                         </thead>
                                                         <tbody class="docketTracking-tbody"  id="tableSerial" >
                                                             @if(isset($data))
                                                         <?php $i=count($data); foreach($data as $value){?>
                                                            @if($value !='')
                                                            <?php $i--; ?>
                                                             <tr class="ssss" >
                                                                 <td>{{$i}}</td>
                                                                 <?php $ssss= explode("</td>",$value); ?>
                                                                 @if(isset($ssss[2]))
                                                                  <td style="display: none;">  <?php echo $ssss[2]; ?> </td>
                                                                  @endif
                                                            </tr>
                                                            @endif
                                                            
                                                           
                                                        
                                                         <?php } ?>
                                                         @endif
                                                       </tbody>
                                                               
                                                  </table> 
                                              <div class="table-responsive a">
                                                  <table class="table table-bordered table-centered mb-1 mt-1 ccccc " id="tableOrignal" width="95%">
                                                          <thead>
                                                          <tr class="main-title text-dark">
                                                          
                                                              <th class="p-1">Activity</th>
                                                              <th class="p-1" style="min-width:100px;">Activity Date</th>
                                                              <th class="p-1">Description</th>
                                                              <th class="p-1" style="min-width:140px;">Entry Date</th>
                                                              <th class="p-1">Entry Detail</th>
                                                            </tr>
                                                         </thead>
                                                         <tbody class="docketTracking-tbody" id="getTdHight">
                                                          @if(isset($data) && $data !='')
                                                          <?php $i=0; foreach($data as $value){$i++;?>
                                                           
                                                           @if($value !='')
                                                                 <?php echo $value;?>
                                                            @endif
                                                            <?php } ?>
                                                            @endif
                                                          
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
  
function getInvoiceDet(id){
    var base_url = '{{url('')}}';
    var docket= $("#docket").val();
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetDocketInvoiceDetail',
       cache: false,
       data: {
           'id':id,'docket':docket
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       }
     });
}

function UploadImageDocket(){
    var base_url = '{{url('')}}';
    var docket= $("#docket").val();
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/UploadImageDocketTracking',
       cache: false,
       data: {
           'docket':docket
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       }
     });
}

function TriggerSubmit() {
    console.log($('#choose_file')[0].files);
   
    var formdata = new FormData();
    var remark = $("#remark").val();
    var submitTo = $("input[name=submitTo]").val();
    var Docket = $("#Docket").val();
    if(Docket==''){
        alert("please Enter Docket No");
        return false;
    }

    
      //for (var i = 0; i < $('#choose_file')[0].files.length; i++)
       formdata.append('file', $('#choose_file')[0].files[0]);
    

    if(submitTo==''){
        alert("please Choose check");
        return false;
    }

    // if(remark==''){
    //     alert("please Enter Remark");
    //     return false;
    // }

     if ($('#choose_file')[0].files.length == 0) {
        alert("please Choose Docket Image File");
        return false;
     }
        formdata.append('remark',remark);
        formdata.append('submitTo',submitTo);
        formdata.append('Docket',Docket);

    var base_url = '{{url('')}}';
         $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/UploadSingleDocketImagePost',
           cache: false,
           processData:false,
           contentType:false,
           data:formdata,
            success: function(data) {
                var obj = JSON.parse(data);
                var head =`<th class="p-1">Docket No</th>
                            <th class="p-1">Status</th>`;
                 $("#thead").html(head);
                 $("#appendRow").html(obj.body);
                 $("#choose_file").val('');
                 $("#remark").val('');
            }
        });

   
}
 
  function GetInfoDocket(Docket){
    var base_url = '{{url('')}}';
         $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/UploadSingleDocketImageData',
           cache: false,
           data:{
               'Docket':Docket 
               },
            success: function(data) {
                var obj = JSON.parse(data);
                if(obj.status==1){
                    var head =`<th class="p-1">Image</th><th class="p-1">Docket No</th>
                    <th class="p-1">PO RECEIVE </th> <th class="p-1">SUBMIT TO CUSTOMER  </th> <th class="p-1">REMARK </th>`;
                    $("#thead").html(head);
                    $("#appendRow").html(obj.body);
                    $("#choose_file").val('');
                    $("#remark").val('');
                }
                else{
                    alert("Docket Image Not Uploaded");
                }
            }
        });
  }
 


function OpenCase(){
    var base_url = '{{url('')}}';
    var docket= $("#docket").val();
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/OpenCaseDocketTracking',
       cache: false,
       data: {
           'docket':docket,'title':'CASE OPEN'
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       }
     });
}

function caseSubmit(){
    var base_url = '{{url('')}}';
    var caller_name= $("#caller_name").val();
    var contact_no= $("#contact_no").val();
    var caller_city= $("#caller_city").val();
    var email= $("#email").val();

    var case_no= $("#case_no").val();
    var docket_no= $("#docket_no").val();
    var case_open_by= $("#case_open_by").val();
    var case_open_date= $("#case_open_date").val();
    var case_status= $("#case_status").val();
    var case_open_office= $("#case_open_office").val();
    var complaint_type= $("#complaint_type").val();
    var caller_type= $("#caller_type").val();
    var remarks= $("#remarkks").val(); 
    var CaseOpenId = $("#CaseOpenId").val();
    var CaseClosingDate = $("#CaseClosingDate").val();
    

    if($("#case_open_office").val()==""){
        alert("Please Select Office");
        return false;
    }
    if($("#remarkks").val()==""){
        alert("Please Enter Remarks");
        return false;
    }
    if($("#caller_name").val()==""){
        alert("Please Enter Caller Name");
        return false;
    }
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CaseSubmit',
       cache: false,
       data: {
           'caller_name':caller_name,
           'contact_no':contact_no,
           'caller_city':caller_city,
           'email':email,
           'case_no':case_no,
           'docket_no':docket_no,
           'case_open_by':case_open_by,
           'case_open_date':case_open_date,
           'case_status':case_status,
           'case_open_office':case_open_office,
           'complaint_type':complaint_type,
           'caller_type':caller_type,
           'remarks':remarks,
           'CaseOpenId':CaseOpenId,
           'CaseClosingDate':CaseClosingDate,

         
       }, 
       success: function(data) {
        location.reload();
            alert(data);
       }
     });
}

function ViewallCase(CaseId){
    var base_url = '{{url('')}}';
    var docket= $("#docket").val();
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/OpenCaseDocketTracking',
       cache: false,
       data: {
           'docket':docket,
           'ViewCase':1,
           'CaseId':CaseId,
           'title':'CASE VIEW /CLOSE'
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       
       }
     });
     //ViewCaseDocketTracking
}

function getDelivereyAddress(ID){
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetdeliveryAddressTracking',
       cache: false,
       data: {
           'ID':ID
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       }
     });
}

function OpenCommentsection(){
    var DocketNo = $("#docket").val();
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetOpenedTrackingComment',
       cache: false,
       data: {
           'DocketNo':DocketNo
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       }
     });
}

function openVolumetricWeight(ID){
    var docket= $("#docket").val();
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetVolumentrictracking',
       cache: false,
       data: {
           'ID':ID,'docket':docket
       }, 
       success: function(data) {
        $('.InvoiceModel').html(data);
       }
     });
}
function alertCustome(msg){
    $(".getAlert").text(msg);

}

window.onload = function(){ 
  var  table, tr, td, i, tableSerial, trs, tds, j;

  table = document.getElementById("tableOrignal");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
     tr[i].style.height = "165px";
     tr[i].style.lineHeight = "13px";

     tr[i].style.fontSize = "10px";
     tr[i].style.fontWeight = "600";
    
    }       
  }
};
</script>