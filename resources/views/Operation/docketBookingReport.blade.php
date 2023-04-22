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
                    <div class="row">
                    <div class="mb-2 col-md-2">
                        <input  value="{{request()->get('DocketNo')}}" type="text" name="DocketNo" class="form-control " placeholder="Docket No.">
                    </div>
                    <div class="mb-2 col-md-2">
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select--</option>
                        @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option >
                       @endforeach
                     </select>
                   </div>
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  value="{{ request()->get('formDate') }}" class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" value="{{ request()->get('todate') }}" class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th style="min-width:100px;">SL#</th>
            <th style="min-width:150px;">Date</th>
             <th style="min-width:130px;">Sale Type</th>
             <th style="min-width:130px;">Delivery Type</th>
            <th style="min-width:130px;">Origin State   </th>
            <th style="min-width:160px;">Origin City</th>
            <th style="min-width:130px;">Org. Pincode</th>
            <th style="min-width:130px;">Dest. State</th>	
            <th style="min-width:160px;">Dest. City</th>	
           
            <th style="min-width:130px;">Dest. Pincode</th>	

            <!-- remove -->
            <th style="min-width:130px;">Zone</th>	
            <th style="min-width:130px;">Mode</th>	

             <th style="min-width:130px;">Office </th>

            <th style="min-width:130px;">Product</th>	
            
            <th style="min-width:130px;">Docket No. </th>	
            <th style="min-width:130px;">Reference No</th>
            <th style="min-width:130px;">PO Number</th>
             <th style="min-width:130px;">Vendor Name</th>
            <th style="min-width:130px;">Vehicle No.</th>   
            <th style="min-width:190px;">Gatepass No.</th>
            <th style="min-width:130px;">Client Category</th>
            <th style="min-width:130px;">CS Person</th>
            <th style="min-width:130px;">Client Code</th>
            <th style="min-width:130px;">Client Name</th>
            <th style="min-width:130px;">Consignor Name</th>
            <th style="min-width:130px;">Consignee Name</th>
            <th style="min-width:130px;">Dimension</th>    
            <th style="min-width:130px;">Goods Value</th>
            <th style="min-width:130px;">eWayBill</th>
            <th style="min-width:130px;">Pcs.</th>
            <th style="min-width:130px;">Act. Wt.</th>
            <th style="min-width:130px;">Chrg. Wt.</th>
            
            <th style="min-width:130px;">Delivery Agent</th>
            <th style="min-width:130px;">Delivery Agent Date</th>    
            <th style="min-width:130px;">Vehicle Arrival Date</th>
            


           
            <th style="min-width:130px;">Type</th>
            <th style="min-width:130px;">Invoice No</th>
            <th style="min-width:130px;">Invoice Date</th>    
           
            <th style="min-width:130px;">Amount</th>
            <th style="min-width:130px;">EWB No</th>
            <th style="min-width:130px;">EWB Date </th>
         
            <th style="min-width:130px;">COD Amount</th>
            <th style="min-width:130px;">DOD Amount</th>
             <th style="min-width:130px;">DACC</th>
            <th style="min-width:130px;">Booked By</th>
            <th style="min-width:130px;">Booked At</th>
            <th style="min-width:130px;">Booking Remark   </th>

            
            
            <th style="min-width:130px;">Last Status</th>
            <th style="min-width:130px;">Current Location</th>
            <th style="min-width:130px;">RTO Status</th>
            <th style="min-width:130px;">Offload Status</th>
            <th style="min-width:130px;">NDR Reason</th>
            <th style="min-width:130px;">Delivery Status</th>
            <th style="min-width:130px;">Delivery Date</th>
            <th style="min-width:130px;">EDD</th>
            <th style="min-width:130px;">TAT Status</th>
            <th style="min-width:130px;">DRS Date</th>
            <th style="min-width:130px;">DRS Vehicle</th>
            <th style="min-width:130px;">DRS Number</th>
            <th style="min-width:130px;">Billing Status</th>
            <th style="min-width:130px;">Category</th>
           

            <th style="min-width:130px;">Scan Image Status</th>
         
            	
            
         
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


             <td>{{$i}}</td>
             <td>{{$DockBookData->Booking_Date}}</td>
             <td>@if(isset($DockBookData->BookignTypeDetails->BookingType)){{$DockBookData->BookignTypeDetails->BookingType}}@endif</td>
             <td>@if(isset($DockBookData->DevileryTypeDet->Title)){{$DockBookData->DevileryTypeDet->Title}}@endif</td>
             <td>@isset($DockBookData->PincodeDetails->StateDetails->name)
                {{$DockBookData->PincodeDetails->StateDetails->name}} @endisset</td>
             <td>@isset($DockBookData->PincodeDetails->CityDetails->Code) {{$DockBookData->PincodeDetails->CityDetails->Code}} ~ {{$DockBookData->PincodeDetails->CityDetails->CityName}} @endisset</td>
             <td>@isset($DockBookData->PincodeDetails->PinCode) {{$DockBookData->PincodeDetails->PinCode}} @endisset</td>
             <td>@isset($DockBookData->DestPincodeDetails->StateDetails->name) {{$DockBookData->DestPincodeDetails->StateDetails->name}} @endisset</td>
             <td>@isset($DockBookData->DestPincodeDetails->CityDetails->Code)
                {{$DockBookData->DestPincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
             <td>@isset($DockBookData->DestPincodeDetails->PinCode) {{$DockBookData->DestPincodeDetails->PinCode}} @endisset</td>
             <!-- remove -->
             <td>@if(isset($DockBookData->PincodeDetails->CityDetails->ZoneDetails->ZoneName)){{$DockBookData->PincodeDetails->CityDetails->ZoneDetails->ZoneName}}@endif</td>
              <td>{{'Road'}}</td>

              <td>@isset($DockBookData->offcieDetails->OfficeCode) 
                {{$DockBookData->offcieDetails->OfficeCode}} ~ {{$DockBookData->offcieDetails->OfficeName}} @endisset</td>
             
              <td>@if(isset($DockBookData->DocketProductDetails->DocketProdductDetails)){{$DockBookData->DocketProductDetails->DocketProdductDetails->Title}}@endif</td>
              <td><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td>{{$DockBookData->Ref_No}}</td>
             <td>{{$DockBookData->PO_No}}</td>

             <!-- remove -->
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>@isset($DockBookData->customerDetails->CustomerCode) {{$DockBookData->customerDetails->CustomerCode}} @endisset</td>
             <td>@isset($DockBookData->customerDetails->CustomerName) {{$DockBookData->customerDetails->CustomerName}} @endisset</td>
            
            <td>@isset($DockBookData->consignor->ConsignorName) {{$DockBookData->consignor->ConsignorName}}  @endisset</td>
             <td>@isset($DockBookData->consignoeeDetails->ConsigneeName)  {{$DockBookData->consignoeeDetails->ConsigneeName}} @endisset</td>
            <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>@if(isset($DockBookData->DocketProductDetails)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td>@if(isset($DockBookData->DocketProductDetails)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>
             <td>@if(isset($DockBookData->DocketProductDetails)){{$DockBookData->DocketProductDetails->Charged_Weight}}@endif</td>
            
             <td>{{''}}</td>
            <td>{{''}}</td>
            <td>{{''}}</td>

            
             <td>{{$DockBookData->InvTitle}}</td>
             <td>{{$DockBookData->Invoice_No}}</td>
             <td>{{$DockBookData->Invoice_Date}}</td>
             <td>{{$DockBookData->Amount}}</td>
             <td>{{$DockBookData->EWB_No}}</td>
             <td>{{$DockBookData->EWB_Date}}</td>

            

             <td>{{$DockBookData->CODAmount}}</td>
             <td>{{$DockBookData->DODAmount}}</td>
              <td>{{$DockBookData->Is_DACC}}</td>
             <td>{{$DockBookData->EmployeeName}}</td>
           <td>{{$DockBookData->Booked_At}}</td>
            <td>{{$DockBookData->Remark}}</td>
            
            <td>@isset($DockBookData->DocketAllocationDetail->GetStatusWithAllocateDett->title) {{$DockBookData->DocketAllocationDetail->GetStatusWithAllocateDett->title}} @endisset </td>
            
            <td>@isset($DockBookData->Description){{$DockBookData->Description}} @endisset</td>
            <td>@if(isset($DockBookData->RTODataDetails->Id)) {{'YES'}} @else {{'NO'}} @endif</td>
            <td>@if(isset($DockBookData->offEntDetails->ID)){{'YES'}}  @else {{'NO'}} @endif</td>

            <td>@isset($DockBookData->NDRTransDetails->NDrMasterDetails->NDRReason) {{$DockBookData->NDRTransDetails->NDrMasterDetails->NDRReason}} @endisset</td>
            <td>@if(isset($DockBookData->RegulerDeliveryDataDetails->Id)) {{'YES'}} @else {{'NO'}} @endif</td>
            <td> @if(isset($DockBookData->RegulerDeliveryDataDetails->Time)) {{$DockBookData->RegulerDeliveryDataDetails->Time}} @endif</td>
            <td></td>
            <td> </td>
            
            <td> @isset($DockBookData->DrsTransDetails->DRSDatasDetails->Delivery_Date) {{$DockBookData->DrsTransDetails->DRSDatasDetails->Delivery_Date}} @endisset </td>
            <td> @isset($DockBookData->DrsTransDetails->DRSDatasDetails->getVehicleNoDett->VehicleNo) {{$DockBookData->DrsTransDetails->DRSDatasDetails->getVehicleNoDett->VehicleNo}} @endisset  </td>

            <td> @isset($DockBookData->DrsTransDetails->DRSDatasDetails->DRS_No) {{$DockBookData->DrsTransDetails->DRSDatasDetails->DRS_No}} @endisset</td>
            <td></td>
            
            <td>@if(isset($DockBookData->DocketAllocationDetail->DocketSeriesMasterDetails->DocketTypeDetials->CaegoryDetails->title)) {{$DockBookData->DocketAllocationDetail->DocketSeriesMasterDetails->DocketTypeDetials->CaegoryDetails->title}} @endif</td>
           
            <td>{{'NO'}}</td>
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $DocketBookingData->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });
    $(".selectBox").select2();
 
</script>