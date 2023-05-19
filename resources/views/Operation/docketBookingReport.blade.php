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
                     <select name="SaleType" id="SaleType" class="form-control selectBox" tabindex="1">
                       <option value="">--select Sale Type--</option>
                        @foreach($Saletype as $key) 
                       <option value="{{$key->id}}" @if(request()->get('SaleType') !='' && request()->get('SaleType')==$key->id){{'selected'}}@endif>{{$key->BookingType}}</option >
                       @endforeach
                     </select>
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
                     <select name="Customer" id="Customer" class="form-control selectBox" tabindex="1">
                       <option value="">--select Customer--</option>
                        @foreach($Customer as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('Customer') !='' && request()->get('Customer')==$offcice->id){{'selected'}}@endif>{{$offcice->CustomerCode}}~{{$offcice->CustomerName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="ParentCustomer" id="ParentCustomer" class="form-control selectBox" tabindex="1">
                       <option value="">--select ParentCustomer--</option>
                        @foreach($ParentCustomer as $key) 
                       <option value="{{$key->id}}" @if(request()->get('ParentCustomer') !='' && request()->get('ParentCustomer')==$key->id){{'selected'}}@endif>{{$key->PCustomerCode}}~{{$key->PCN}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="originCity" id="originCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select origin City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->PID}}" @if(request()->get('originCity') !='' && request()->get('originCity')==$key->PID){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="DestCity" id="DestCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select Destination City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->PID}}" @if(request()->get('DestCity') !='' && request()->get('DestCity')==$key->PID){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
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
                           <a href="{{url('docketbookingReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12"> <div class="row"> <h5>Total RECORD: {{$DocketBookingData->Total()}} </h5></div> </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:150px;" class="p-1">Date</th>
             <th style="min-width:130px;" class="p-1">Sale Type</th>
             <th style="min-width:130px;" class="p-1">Delivery Type</th>
            <th style="min-width:130px;" class="p-1">Origin State   </th>
            <th style="min-width:160px;" class="p-1">Origin City</th>
            <th style="min-width:130px;" class="p-1">Org. Pincode</th>
            <th style="min-width:130px;" class="p-1">Dest. State</th>	
            <th style="min-width:160px;" class="p-1">Dest. City</th>	
           
            <th style="min-width:130px;" class="p-1">Dest. Pincode</th>	

            <!-- remove -->
            <th style="min-width:130px;" class="p-1">Zone</th>	
            <th style="min-width:130px;" class="p-1">Mode</th>	

             <th style="min-width:170px;" class="p-1">Office </th>

            <th style="min-width:130px;" class="p-1">Product</th>	
            
            <th style="min-width:130px;" class="p-1">Docket No. </th>	
            <th style="min-width:130px;" class="p-1">Reference No</th>
            <th style="min-width:130px;" class="p-1">PO Number</th>
             <th style="min-width:130px;" class="p-1">Vendor Name</th>
            <th style="min-width:130px;" class="p-1">Vehicle No.</th>   
            <th style="min-width:190px;" class="p-1">Gatepass No.</th>
            <th style="min-width:190px;" class="p-1">FPM No.</th>
            <th style="min-width:130px;" class="p-1">Client Category</th>
            <th style="min-width:130px;" class="p-1">CS Person</th>
            <th style="min-width:130px;" class="p-1">Client Code</th>
            <th style="min-width:130px;" class="p-1">Client Name</th>
            <th style="min-width:130px;" class="p-1">Consignor Name</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
            <th style="min-width:130px;" class="p-1">Dimension</th>    
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
            <th style="min-width:130px;" class="p-1">Delivery Agent</th>
            <th style="min-width:130px;" class="p-1">Delivery Agent Date</th>    
            <th style="min-width:130px;" class="p-1">Vehicle Arrival Date</th>
            <th style="min-width:130px;" class="p-1">Invoice No</th>
            <th style="min-width:130px;" class="p-1">Invoice Date</th>
            <th style="min-width:130px;" class="p-1">Goods Value</th>
            <th style="min-width:130px;" class="p-1">eWayBill No</th>
            <th style="min-width:130px;" class="p-1">EWB Date </th>
            <th style="min-width:130px;" class="p-1">Contents </th>
            <th style="min-width:130px;" class="p-1">COD Amount</th>
            <th style="min-width:130px;" class="p-1">DOD Amount</th>
             <th style="min-width:130px;" class="p-1">DACC</th>
            <th style="min-width:130px;" class="p-1">Booked By</th>
            <th style="min-width:130px;" class="p-1">Booked At</th>
            <th style="min-width:130px;" class="p-1">Booking Remark   </th>
            <th style="min-width:130px;" class="p-1">Last Status</th>
            <th style="min-width:130px;" class="p-1">Current Location</th>
            <th style="min-width:130px;" class="p-1">RTO Status</th>
            <th style="min-width:130px;" class="p-1">Offload Status</th>
            <th style="min-width:130px;" class="p-1">NDR Reason</th>
            <th style="min-width:130px;" class="p-1">Delivery Status</th>
            <th style="min-width:130px;" class="p-1">Delivery Date</th>
            <th style="min-width:130px;" class="p-1">EDD</th>
            <th style="min-width:130px;" class="p-1">TAT Status</th>
            <th style="min-width:130px;" class="p-1">DRS Date</th>
            <th style="min-width:130px;" class="p-1">DRS Vehicle</th>
            <th style="min-width:130px;" class="p-1">DRS Number</th>
            <th style="min-width:130px;" class="p-1">Billing Status</th>
            <th style="min-width:130px;" class="p-1">Category</th>
            <th style="min-width:130px;" class="p-1">Scan Image Status</th>
            <th style="min-width:130px;" class="p-1"> View Scan Image</th>
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
             <td class="p-1">@if(isset($DockBookData->BookignTypeDetails->BookingType)){{$DockBookData->BookignTypeDetails->BookingType}}@endif</td>
             <td class="p-1">@if(isset($DockBookData->DevileryTypeDet->Title)){{$DockBookData->DevileryTypeDet->Title}}@endif</td>
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
              <td class="p-1">{{$DockBookData->Mode}}</td>
              <td class="p-1">@isset($DockBookData->offcieDetails->OfficeCode) 
                {{$DockBookData->offcieDetails->OfficeCode}} ~ {{$DockBookData->offcieDetails->OfficeName}} @endisset</td>
             
              <td class="p-1">@if(isset($DockBookData->DocketProductDetails->DocketProdductDetails)){{$DockBookData->DocketProductDetails->DocketProdductDetails->Title}}@endif</td> 
               <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">{{$DockBookData->Ref_No}}</td>
             <td class="p-1">{{$DockBookData->PO_No}}</td>

             <!-- remove -->
              <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName) {{$DockBookData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorCode}}~{{$DockBookData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo) {{$DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo}} @endisset</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number) <a href="{{url('print_gate_Number').'/'.$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}}"> {{$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}} </a> @endisset</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->fpmDetails->FPMNo) {{$DockBookData->getpassDataDetails->DocketDetailGPData->fpmDetails->FPMNo}} @endisset</td>
             <td class="p-1"> @isset($DockBookData->customerDetails->CustomerCategory) {{$DockBookData->customerDetails->CustomerCategory}} @endisset </td>
             <td class="p-1">@isset($DockBookData->customerDetails->CRMExecutive) {{$DockBookData->customerDetails->CRMExecutive}} @endisset </td>
             <td class="p-1">@isset($DockBookData->customerDetails->CustomerCode) {{$DockBookData->customerDetails->CustomerCode}} @endisset</td>
             <td class="p-1">@isset($DockBookData->customerDetails->CustomerName) {{$DockBookData->customerDetails->CustomerName}} @endisset</td> 
            
            <td class="p-1">@isset($DockBookData->consignor->ConsignorName) {{$DockBookData->consignor->ConsignorName}}  @endisset</td>
             <td class="p-1">@isset($DockBookData->consignoeeDetails->ConsigneeName)  {{$DockBookData->consignoeeDetails->ConsigneeName}} @endisset</td>
            <td class="p-1">{{''}}</td>
            
             <td class="p-1" >@if(isset($DockBookData->DocketProductDetails->Qty)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Actual_Weight)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>
             <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Charged_Weight)){{$DockBookData->DocketProductDetails->Charged_Weight}}@endif</td>
            
             <td class="p-1">{{''}}</td>
            <td class="p-1">{{''}}</td>
            <td class="p-1">{{''}}</td>
          
             <!-- <td class="p-1">@if(isset($DockBookData->DocketInvoiceDetails->InvTitle)) {{$DockBookData->DocketInvoiceDetails->InvTitle}} @endif</td> -->
             <td class="p-1" >@isset($DockBookData->DocketManyInvoiceDetails[0]->Invoice_No) {{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Invoice_No')) }} @endisset</td>
             <td class="p-1">@isset($DockBookData->DocketManyInvoiceDetails[0]->Invoice_Date) {{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Invoice_Date'))}} @endisset</td>
             <td class="p-1" >@isset($DockBookData->DocketManyInvoiceDetails[0]->Amount) {{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Amount'))}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DocketManyInvoiceDetails[0]->EWB_No) {{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'EWB_No')) }} @endisset</td>
             <td class="p-1">@isset($DockBookData->DocketManyInvoiceDetails[0]->EWB_Date) {{ implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'EWB_Date'))}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DocketManyInvoiceDetails[0]->Description){{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Description'))}} @endisset</td> 
             <td class="p-1"> {{$DockBookData->CODAmount}}</td>
             <td class="p-1">{{$DockBookData->DODAmount}}</td>
              <td class="p-1">{{$DockBookData->Is_DACC}}</td>
             <td>@isset($DockBookData->DocketDetailUser->empOffDetail->EmployeeCode){{$DockBookData->DocketDetailUser->empOffDetail->EmployeeCode}}~{{$DockBookData->DocketDetailUser->empOffDetail->EmployeeName}} @endisset</td>
           <td class="p-1" >{{date("d-m-Y",strtotime($DockBookData->Booked_At))}}</td>
            <td class="p-1">{{$DockBookData->Remark}}</td>
            <td class="p-1">@isset($DockBookData->DocketAllocationDetail->GetStatusWithAllocateDett->title) {{$DockBookData->DocketAllocationDetail->GetStatusWithAllocateDett->title}} @endisset </td>
            <td class="p-1"></td>
            <td class="p-1">@if(isset($DockBookData->RTODataDetails->Id)) {{'YES'}} @else {{'NO'}} @endif</td>
            <td class="p-1">@if(isset($DockBookData->offEntDetails->ID)){{'YES'}}  @else {{'NO'}} @endif</td>

            <td class="p-1">@isset($DockBookData->NDRTransDetails->NDrMasterDetails->ReasonDetail) {{$DockBookData->NDRTransDetails->NDrMasterDetails->ReasonCode}}- {{$DockBookData->NDRTransDetails->NDrMasterDetails->ReasonDetail}} @endisset</td>
            <td class="p-1">@if(isset($DockBookData->RegulerDeliveryDataDetails->Id)) {{'YES'}} @else {{'NO'}} @endif</td>
            <td class="p-1"> @if(isset($DockBookData->RegulerDeliveryDataDetails->Time)) {{date("d-m-Y H:i:s",strtotime($DockBookData->RegulerDeliveryDataDetails->Time))}} @endif</td>
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
            <td class="p-1"> @isset($DockBookData->DrsTransDetails->DRSDatasDetails->Delivery_Date) {{date("d-m-Y",strtotime($DockBookData->DrsTransDetails->DRSDatasDetails->Delivery_Date))}} @endisset </td>
            <td class="p-1"> @isset($DockBookData->DrsTransDetails->DRSDatasDetails->getVehicleNoDett->VehicleNo) {{$DockBookData->DrsTransDetails->DRSDatasDetails->getVehicleNoDett->VehicleNo}} @endisset  </td>

            <td class="p-1"> @isset($DockBookData->DrsTransDetails->DRSDatasDetails->DRS_No) {{$DockBookData->DrsTransDetails->DRSDatasDetails->DRS_No}} @endisset</td>
            <td class="p-1"></td>
            
            <td class="p-1">@if(isset($DockBookData->DocketAllocationDetail->DocketSeriesMasterDetails->DocketTypeDetials->CaegoryDetails->title)) {{$DockBookData->DocketAllocationDetail->DocketSeriesMasterDetails->DocketTypeDetials->CaegoryDetails->title}} @endif</td>
           
            <td class="p-1">@if(isset($DockBookData->DocketImagesDet->DocketNo))  {{'YES'}} @else {{'NO'}} @endif</td>

            <td class="p-1">@if(isset($DockBookData->DocketImagesDet->DocketNo))  
            <a target="_blank" href="{{url('').'/'.$DockBookData->DocketImagesDet->file}}">View File</a> 
            @else 
            <a  href="javascript:void(0)">No File</a> 
            @endif</td>
             
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