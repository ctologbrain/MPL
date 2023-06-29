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
                                                        <td class="d18"><span id="volu_wt"><a href="javascript:void(0);"> @if(isset($Docket->DocketProductDetails->Is_Volume)){{$Docket->DocketProductDetails->Is_Volume}}@endif </a></span></td>
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
                                                        <td class="td18"><span id="invoice_no">@if(isset($Docket->InvoiceMasterMainDetails->InvoiceMastersDet->InvNo)) {{$Docket->InvoiceMasterMainDetails->InvoiceMastersDet->InvNo}} @endif</span></td>
                                                       </tr>

                                                   </table>
                                                   <div class="col-11 mt-1">
                                                    @if(isset($Docket->Docket_No) && isset($Docket->DocketCaseDetails->Docket_Number))
                                                      <button disabled type="button" class="btn btn-secondary mb-1">Case Open</button>
                                                    
                                                    @else   
                                                    <button  onclick="OpenCase();"   type="button" class="btn btn-secondary mb-1">Case Open</button>
                                                    @endif
                                                     <button onclick="ViewallCase();" type="button" class="btn btn-secondary mb-1">Case ViewClose</button>
                                                      <button onclick="OpenCommentsection();" type="button" class="btn btn-secondary mb-1">Comments</button>
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
                                                         <button type="button" class="btn btn-secondary mb-1">View Sign</button>
                                                          <img src="{{url('public/map.png')}}"/>
                                                          @if(isset($Docket->id))
                                                          <button onclick="getDelivereyAddress('{{$Docket->id}}');" type="button" class="btn btn-secondary mb-1">Delivery Address</button>
                                                          @else
                                                          <button disabled type="button" class="btn btn-secondary mb-1">Delivery Address</button>
                                                          @endif

                                                          @if(isset($Docket->id))
                                                          <button  onclick="getInvoiceDet('{{$Docket->id}}');" type="button" class="btn btn-secondary mb-1">Item Detail</button>
                                                          @else
                                                          <button disabled type="button" class="btn btn-secondary mb-1">Item Detail</button>
                                                          @endif
                                                          

                                                          <button type="button" class="btn btn-secondary mb-1">AWB Load Image</button>
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
                                                             @if(isset($data))
                                                         <?php $i=0; foreach($data as $value){?>
                                                            @if($value !='')
                                                            <?php $i++; ?>
                                                             <tr class="ssss">
                                                                 <td>{{$i}}</td>
                                                                 <?php $ssss=explode("</td>",$value); ?>
                                                                 @if(isset($ssss[2]))
                                                                  <td style="display: none;"> <?php echo $ssss[2]; ?></td>
                                                                  @endif
                                                            </tr>
                                                            @endif
                                                            
                                                           
                                                        
                                                         <?php } ?>
                                                         @endif
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
           'docket':docket
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
         
       }, 
       success: function(data) {
            alert(data);
       }
     });
}

function ViewallCase(){
    var base_url = '{{url('')}}';
    var docket= $("#docket").val();
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewCaseDocketTracking',
       cache: false,
       data: {
           'docket':docket
       }, 
       success: function(data) {
           if(data =="false"){
               alert("Case Not Found");
           }
           else{
                $('.getdetails').html(data);
           }
       }
     });
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

</script>