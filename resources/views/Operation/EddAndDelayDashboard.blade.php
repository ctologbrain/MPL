@include('layouts.appTwo')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <!-- end card-->
         
                    <div class="col-12"> <div class="row"> <h5>Total RECORD: {{$DocketBookingData->Total()}} </h5></div> </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:150px;" class="p-1">Booking Date</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>	
            <th style="min-width:130px;" class="p-1">Client Name</th>
            <th style="min-width:130px;" class="p-1">Origin State   </th>
            <th style="min-width:160px;" class="p-1">Origin City</th>
            <th style="min-width:130px;" class="p-1">Dest. State</th>	
            <th style="min-width:160px;" class="p-1">Dest. City</th>
             
             <th style="min-width:130px;" class="p-1">Delivery Type</th>
             <th style="min-width:130px;" class="p-1">NDR Reason</th>
             <th style="min-width:130px;" class="p-1">Consignor Name</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1">Chrg. Wt.</th>
            <th style="min-width:190px;" class="p-1">Vehicle Dispatched Date</th>
            <th style="min-width:130px;" class="p-1">Vehicle Arrival Date</th>

            <th style="min-width:130px;" class="p-1">TAT</th>
            <th style="min-width:190px;" class="p-1">Current Status</th>
            <th style="min-width:130px;" class="p-1">Status Date </th>

           </tr>
         </thead>
         <tbody>
            <?php $i=0; 
            $page=request()->get('page');
            if(isset($page) && $page>1){
                $page =$page-1;
            $i = intval($page*10);
            }
             else{
            $i=0;
            }
            ?>
            @foreach($DocketBookingData as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{date("d-m-Y H:i:s",strtotime($DockBookData->Booking_Date))}}</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">@isset($DockBookData->customerDetails->CustomerName) {{$DockBookData->customerDetails->CustomerName}} @endisset</td> 
             <td class="p-1">@isset($DockBookData->PincodeDetails->StateDetails->name)
                {{$DockBookData->PincodeDetails->StateDetails->name}} @endisset</td>
            <td class="p-1">@isset($DockBookData->PincodeDetails->CityDetails->Code) {{$DockBookData->PincodeDetails->CityDetails->Code}} ~ {{$DockBookData->PincodeDetails->CityDetails->CityName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->StateDetails->name) {{$DockBookData->DestPincodeDetails->StateDetails->name}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->CityDetails->Code)
                {{$DockBookData->DestPincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
            
            <td class="p-1">@if(isset($DockBookData->DevileryTypeDet->Title)){{$DockBookData->DevileryTypeDet->Title}}@endif</td>
            <td class="p-1">@isset($DockBookData->NDRTransDetails->NDrMasterDetails->ReasonDetail) {{$DockBookData->NDRTransDetails->NDrMasterDetails->ReasonCode}}- {{$DockBookData->NDRTransDetails->NDrMasterDetails->ReasonDetail}} @endisset</td>
            <td class="p-1">@isset($DockBookData->consignor->ConsignorName) {{$DockBookData->consignor->ConsignorName}}  @endisset</td>
            <td class="p-1">@isset($DockBookData->consignoeeDetails->ConsigneeName)  {{$DockBookData->consignoeeDetails->ConsigneeName}} @endisset</td>

            <td class="p-1" >@if(isset($DockBookData->DocketProductDetails->Qty)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Actual_Weight)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>
             <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Charged_Weight)){{$DockBookData->DocketProductDetails->Charged_Weight}}@endif</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->GP_TIME) {{date("d-m-Y",strtotime($DockBookData->getpassDataDetails->DocketDetailGPData->GP_TIME))}} @endisset</td>

             <td class="p-1">@if(isset($DockBookData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->Rcv_Date)) 
            {{date("d-m-Y",strtotime($DockBookData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->Rcv_Date))}}
            @endif </td>
            <td class="p-1">{{''}}</td>
             <td class="p-1">@if(isset($DockBookData->DocketAllocationDetail->Status) && ($DockBookData->DocketAllocationDetail->Status=="3" || $DockBookData->DocketAllocationDetail->Status=="4" ))
             {{'BOOKED'}} 
             @elseif(isset($DockBookData->DocketAllocationDetail->Status) && $DockBookData->DocketAllocationDetail->Status=="5")
             {{'IN TRANSIT'}} 
             @elseif(isset($DockBookData->DocketAllocationDetail->Status) && $DockBookData->DocketAllocationDetail->Status=="6")
             {{'RECEIVED AT DESTINATION'}} 
            @endisset </td>
             <td class="p-1">@isset($DockBookData->DocketAllocationDetail->BookDate) {{date("d-m-Y",strtotime($DockBookData->DocketAllocationDetail->BookDate))}} @endisset </td>

           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $DocketBookingData->appends(Request::all())->links() !!}
        </div>

        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
       todayHighlight: true
      });
     
    $(".selectBox").select2();
 
</script>