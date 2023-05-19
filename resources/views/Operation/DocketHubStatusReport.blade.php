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
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row p-1">
                    <div class="mb-2 col-md-2">
                        <input  value="{{request()->get('DocketNo')}}" type="text" name="DocketNo" class="form-control " placeholder="Docket No.">
                    </div>
                    <div class="mb-2 col-md-2">
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select Office--</option>
                        @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option >
                       @endforeach
                     </select>
                   </div>
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('DocketBookingCustomerWise')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row"> 
                    <div class="col-3"> <h5> Total RECORD: {{$DocketBookingData->total()}}</h5></div>   
                
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Activity Date </th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:130px;" class="p-1">Last Activity </th>
            <th style="min-width:130px;" class="p-1">Activity Office </th>
            <th style="min-width:130px;" class="p-1">Delivery Date</th> 
            <th style="min-width:130px;" class="p-1">Delivery Office</th>
            <th style="min-width:150px;" class="p-1"> Book Date</th>
            
            <th style="min-width:130px;" class="p-1">Origin State   </th>
            <th style="min-width:160px;" class="p-1">Origin City</th>
            <th style="min-width:130px;" class="p-1">Org. Pincode</th>
            <th style="min-width:130px;" class="p-1">Dest. State</th>	
            <th style="min-width:160px;" class="p-1">Dest. City</th>	
           
            <th style="min-width:130px;" class="p-1">Dest. Pincode</th>	

            <!-- remove -->
            <th style="min-width:130px;" class="p-1">Zone</th>
            <th style="min-width:130px;" class="p-1">Mode </th>	
             <th style="min-width:130px;" class="p-1">Product</th>
            
           
            <th style="min-width:130px;" class="p-1">Client Code</th>
            <th style="min-width:130px;" class="p-1">Client Name</th>

             <th style="min-width:170px;" class="p-1">Office </th>

            	
           
            
            <th style="min-width:130px;" class="p-1">Consignor Name</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
     
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
         
           
         
           
            <th style="min-width:130px;" class="p-1">Booked By</th>
            <th style="min-width:130px;" class="p-1">Booked At</th>
            
            <th style="min-width:130px;" class="p-1">Delivery Status</th>
            
            <th style="min-width:130px;" class="p-1">Delivery Type</th> 
            <th style="min-width:130px;" class="p-1">EDD</th>
            <th style="min-width:130px;" class="p-1">TAT Status</th>
            <th style="min-width:130px;" class="p-1">Sale Type</th>
             
            <th style="min-width:130px;" class="p-1">Billing Status</th>
            <th style="min-width:130px;" class="p-1">Scan Image Status</th>
            <th style="min-width:130px;" class="p-1"> View Scan Image</th>
            <th style="min-width:130px;" class="p-1"> Vehicle Arrival Date</th>
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
             <td class="p-1"> @isset($DockBookData->DocketAllocationDetail->BookDate) {{date("d-m-Y",strtotime($DockBookData->DocketAllocationDetail->BookDate))}} @endisset</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">@isset($DockBookData->DocketAllocationDetail->GetStatusWithAllocateDett->title) {{$DockBookData->DocketAllocationDetail->GetStatusWithAllocateDett->title}} @endisset </td>
             <td class="p-1"> @isset($DockBookData->DocketAllocationDetail->officeDetails->OfficeCode) {{$DockBookData->DocketAllocationDetail->officeDetails->OfficeCode}} ~ {{$DockBookData->DocketAllocationDetail->officeDetails->OfficeName}} @endisset  </td>
             <td class="p-1"> @if(isset($DockBookData->RegulerDeliveryDataDetails->Time)) {{date("d-m-Y H:i:s",strtotime($DockBookData->RegulerDeliveryDataDetails->Time))}} @endif</td>

             <td class="p-1"> @if(isset($DockBookData->RegulerDeliveryDataDetails->RagularOfficeDetails->OfficeCode)) {{$DockBookData->RegulerDeliveryDataDetails->RagularOfficeDetails->OfficeCode}} ~ {{$DockBookData->RegulerDeliveryDataDetails->RagularOfficeDetails->OfficeName}}  @endif</td>

             <td class="p-1">{{date("d-m-Y H:i:s",strtotime($DockBookData->Booking_Date))}}</td>
             
             <td class="p-1">@isset($DockBookData->PincodeDetails->StateDetails->name)
                {{$DockBookData->PincodeDetails->StateDetails->name}} @endisset</td>
             <td class="p-1">@isset($DockBookData->PincodeDetails->CityDetails->Code) {{$DockBookData->PincodeDetails->CityDetails->Code}} ~ {{$DockBookData->PincodeDetails->CityDetails->CityName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->PincodeDetails->PinCode) {{$DockBookData->PincodeDetails->PinCode}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->StateDetails->name) {{$DockBookData->DestPincodeDetails->StateDetails->name}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->CityDetails->Code)
                {{$DockBookData->DestPincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->PinCode) {{$DockBookData->DestPincodeDetails->PinCode}} @endisset</td>
             <!-- remove -->
             <td class="p-1"> @if(isset($DockBookData->PincodeDetails->CityDetails->ZoneDetails->ZoneName)){{$DockBookData->PincodeDetails->CityDetails->ZoneDetails->ZoneName}} @endif
             @if(isset($DockBookData->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName))  ~ {{$DockBookData->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName}}@endif</td>
             
             <td class="p-1" >@if(isset($DockBookData->Mode)){{$DockBookData->Mode}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->DocketProdductDetails->Title)){{$DockBookData->DocketProductDetails->DocketProdductDetails->Title}}@endif</td>

             <td class="p-1">@isset($DockBookData->customerDetails->CustomerCode) {{$DockBookData->customerDetails->CustomerCode}} @endisset</td>
             <td class="p-1">@isset($DockBookData->customerDetails->CustomerName) {{$DockBookData->customerDetails->CustomerName}} @endisset</td> 
            
              
              <td class="p-1">@isset($DockBookData->offcieDetails->OfficeCode) 
                {{$DockBookData->offcieDetails->OfficeCode}} ~ {{$DockBookData->offcieDetails->OfficeName}} @endisset</td>
             
            <td class="p-1">@isset($DockBookData->consignor->ConsignorName) {{$DockBookData->consignor->ConsignorName}}  @endisset</td>
             <td class="p-1">@isset($DockBookData->consignoeeDetails->ConsigneeName)  {{$DockBookData->consignoeeDetails->ConsigneeName}} @endisset</td>
          
            
             <td class="p-1" >@if(isset($DockBookData->DocketProductDetails)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>
             <td class="p-1">@if(isset($DockBookData->DocketProductDetails)){{$DockBookData->DocketProductDetails->Charged_Weight}}@endif</td>
            
           
          
           
            
             <td>@isset($DockBookData->DocketDetailUser->empOffDetail->EmployeeCode){{$DockBookData->DocketDetailUser->empOffDetail->EmployeeCode}}~{{$DockBookData->DocketDetailUser->empOffDetail->EmployeeName}} @endisset</td>
           <td class="p-1" >{{date("d-m-Y",strtotime($DockBookData->Booked_At))}}</td>
            
            <td class="p-1">@if(isset($DockBookData->RegulerDeliveryDataDetails->Id)) {{'Delivered'}} @else {{'Pending'}} @endif</td>
           
            <td class="p-1">@if(isset($DockBookData->DevileryTypeDet->Title)) {{$DockBookData->DevileryTypeDet->Title}} @endisset </td> 
            <?php 
            if(isset($DockBookData->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->TransitDays)){
            $transit = $DockBookData->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->TransitDays;
            }
            else{
            $transit =0;
            }
            $BookDate =date("Y-m-d",strtotime($DockBookData->Booking_Date));
            $eddDate=date("d-m-Y", strtotime($BookDate."+".$transit." day"));  ?>
            <td class="p-1"> {{$eddDate}}</td>
          
            <td class="p-1"> </td>
           

            <td class="p-1">@if(isset($DockBookData->BookignTypeDetails->BookingType)){{$DockBookData->BookignTypeDetails->BookingType}}@endif</td>
            <td class="p-1"></td>
            <td class="p-1">@if(isset($DockBookData->DocketImagesDet->DocketNo))  {{'YES'}} @else {{'NO'}} @endif</td>

            <td class="p-1">@if(isset($DockBookData->DocketImagesDet->DocketNo))  
            <a target="_blank" href="{{url('').'/'.$DockBookData->DocketImagesDet->file}}">View File</a> 
            @else 
            <a  href="javascript:void(0)">No File</a> 
            @endif</td>
            <td class="p-1"></td>

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