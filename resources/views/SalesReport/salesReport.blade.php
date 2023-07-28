@include('layouts.appThree')
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
                     <select name="saleType" id="saleType" class="form-control selectBox" tabindex="1">
                       <option value="">--Select Sales Type--</option>
                        @foreach($DocketSale as $key) 
                       <option value="{{$key->id}}" @if(request()->get('saleType') !='' && request()->get('saleType')==$key->id){{'selected'}}@endif>{{$key->BookingType}}</option >
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
                       <option value="{{$key->id}}" @if(request()->get('originCity') !='' && request()->get('originCity')==$key->id){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="DestCity" id="DestCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select Destination City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->id}}" @if(request()->get('DestCity') !='' && request()->get('DestCity')==$key->id){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
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
                           <a href="{{url('salesReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$DocketBookingData->total()}}</span></div>   
                    
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:150px;" class="p-1">Date</th>
            <th style="min-width:160px;" class="p-1">Origin</th>
           
            <th style="min-width:130px;" class="p-1">Dest. State</th>	
            <th style="min-width:160px;" class="p-1">Dest. City</th>	
           
            <th style="min-width:130px;" class="p-1">Dest. Pincode</th>	

            <!-- remove -->
            <th style="min-width:130px;" class="p-1">Dest. Zone</th>
            <th style="min-width:130px;" class="p-1">Mode</th>	
            
            <th style="min-width:130px;" class="p-1"> Vehicle</th>
            <th style="min-width:130px;" class="p-1"> Gatepass</th>
            		
            
            <th style="min-width:130px;" class="p-1">Client Name</th>

             <th style="min-width:130px;" class="p-1">Product</th>
            <th style="min-width:130px;" class="p-1">PO Number</th>
            <th style="min-width:130px;" class="p-1">Consignor Name</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
     
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Vlt. Wt.</th>
            <th style="min-width:130px;" class="p-1">Invoice No</th>
            <th style="min-width:130px;" class="p-1">Invoice Date</th>
            <th style="min-width:130px;" class="p-1">Goods Value</th>
            <th style="min-width:130px;" class="p-1">EwayBill</th>
           
            <th style="min-width:130px;" class="p-1">Booked By</th>
            <th style="min-width:130px;" class="p-1">Booked At</th>
            
            <th style="min-width:130px;" class="p-1">Delivery Status</th>
            <th style="min-width:130px;" class="p-1">Delivery Date</th> 
            
           
            <th style="min-width:130px;" class="p-1">Sale Type</th>

            <th style="min-width:130px;" class="p-1">Rate</th>
            <th style="min-width:130px;" class="p-1">Freight</th>

            <th style="min-width:130px;" class="p-1">Other Charge</th>
            <th style="min-width:130px;" class="p-1">Textable Amount</th>
            <th style="min-width:130px;" class="p-1">CGST</th>
            <th style="min-width:130px;" class="p-1">SGST</th>
            <th style="min-width:130px;" class="p-1">IGST</th>
            <th style="min-width:130px;" class="p-1">Invoice Amount</th>
            <th style="min-width:130px;" class="p-1"> Bill NO</th>
            <th style="min-width:170px;" class="p-1">Branch </th>
            <th style="min-width:130px;" class="p-1">Billing Status</th>
            <th style="min-width:130px;" class="p-1">RTO Status</th>
            <th style="min-width:130px;" class="p-1">Offload Status</th>

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
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">{{date("d-m-Y",strtotime($DockBookData->Booking_Date))}}</td>
             
             <td class="p-1">@isset($DockBookData->PincodeDetails->CityDetails->Code) {{$DockBookData->PincodeDetails->CityDetails->Code}} ~ {{$DockBookData->PincodeDetails->CityDetails->CityName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->StateDetails->name) {{$DockBookData->DestPincodeDetails->StateDetails->name}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->CityDetails->Code)
                {{$DockBookData->DestPincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->PinCode) {{$DockBookData->DestPincodeDetails->PinCode}} @endisset</td>
             <!-- remove -->
             <td class="p-1"> @if(isset($DockBookData->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName))  ~ {{$DockBookData->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName}}@endif</td>

             <td class="p-1">{{$DockBookData->Mode}}</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo) {{$DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo}} @endisset</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number) <a href="{{url('print_gate_Number').'/'.$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}}"> {{$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}} </a> @endisset</td>
             <td class="p-1">@isset($DockBookData->customerDetails->CustomerCode) {{$DockBookData->customerDetails->CustomerCode}} ~ {{$DockBookData->customerDetails->CustomerName}}  @endisset</td>
             
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->DocketProdductDetails)){{$DockBookData->DocketProductDetails->DocketProdductDetails->Title}}@endif</td> 
            <td class="p-1">{{$DockBookData->PO_No}}</td>
            <td class="p-1">@isset($DockBookData->consignor->ConsignorName) {{$DockBookData->consignor->ConsignorName}}  @endisset</td>
             <td class="p-1">@isset($DockBookData->consignoeeDetails->ConsigneeName)  {{$DockBookData->consignoeeDetails->ConsigneeName}} @endisset</td>
          
            
             <td class="p-1" >@if(isset($DockBookData->DocketProductDetails->Qty)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Actual_Weight)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>
             <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Charged_Weight)){{$DockBookData->DocketProductDetails->Charged_Weight}}@endif</td>
             <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Is_Volume)){{$DockBookData->DocketProductDetails->Is_Volume}}@endif</td>
             
          
           
             <td class="p-1" >@isset($DockBookData->DocketManyInvoiceDetails[0]->Invoice_No) {{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Invoice_No')) }} @endisset</td>
             <td class="p-1">@isset($DockBookData->DocketManyInvoiceDetails[0]->Invoice_Date) {{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Invoice_Date'))}} @endisset</td>
             <td class="p-1" >@isset($DockBookData->DocketManyInvoiceDetails[0]->Amount) {{array_sum(array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Amount'))}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DocketManyInvoiceDetails[0]->EWB_No) {{implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'EWB_No')) }} @endisset</td>
            
             <td>@isset($DockBookData->DocketDetailUser->empOffDetail->EmployeeCode){{$DockBookData->DocketDetailUser->empOffDetail->EmployeeCode}}~{{$DockBookData->DocketDetailUser->empOffDetail->EmployeeName}} @endisset</td>
           <td class="p-1" >{{date("d-m-Y",strtotime($DockBookData->Booked_At))}}</td>
            <td class="p-1">@if(isset($DockBookData->RegulerDeliveryDataDetails->Id)) {{'YES'}} @else {{'NO'}} @endif</td>
            <td class="p-1"> @if(isset($DockBookData->RegulerDeliveryDataDetails->Time)) {{date("d-m-Y H:i:s",strtotime($DockBookData->RegulerDeliveryDataDetails->Time))}} @endif</td>
            <td class="p-1">@if(isset($DockBookData->BookignTypeDetails->BookingType)){{$DockBookData->BookignTypeDetails->BookingType}}@endif</td>
            @if(isset($DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo))
            
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Rate}}</td>
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Fright}}</td>
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Charge}}</td>
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Charge+$DockBookData->InvoiceMasterMainDetails->Fright}}</td>
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Cgst}}</td>
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Scst}}</td>
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Igst}}</td>
            <td class="p-1">{{$DockBookData->InvoiceMasterMainDetails->Total}}</td>
            @else
            @if($DockBookData->Booking_Type==3 || $DockBookData->Booking_Type==4)
            <td class="p-1"></td>
            <td class="p-1">@if(isset($DockBookData->TariffTypeDeatils->Freight)){{$DockBookData->TariffTypeDeatils->Freight}}@endif</td>
            <td class="p-1">0</td>
            <td class="p-1">@if(isset($DockBookData->TariffTypeDeatils->Freight)){{$DockBookData->TariffTypeDeatils->Freight}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->TariffTypeDeatils->Freight)){{$DockBookData->TariffTypeDeatils->Cgst}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->TariffTypeDeatils->Freight)){{$DockBookData->TariffTypeDeatils->Scst}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->TariffTypeDeatils->Freight)){{$DockBookData->TariffTypeDeatils->Igst}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->TariffTypeDeatils->TotalAmount)){{$DockBookData->TariffTypeDeatils->TotalAmount}}@endif</td>
            @else
            <?php 
            $SourceCity=$DockBookData->PincodeDetails->city; 
            $DestCity=$DockBookData->DestPincodeDetails->city; 
            $SourceState=$DockBookData->PincodeDetails->State; 
            $DestState=$DockBookData->DestPincodeDetails->State; 
            $SourcePinCode=$DockBookData->PincodeDetails->id; 
            $DestPinCode=$DockBookData->DestPincodeDetails->id; 
            $zoneSource=$DockBookData->PincodeDetails->CityDetails->ZoneName;
            $zoneDest=$DockBookData->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType=$DockBookData->Delivery_Type;
            $chargeWeight=$DockBookData->DocketProductDetails->Charged_Weight;
            $goodsValue=$DockBookData->docket_invoice_details_sum_amount;
            $qty=$DockBookData->DocketProductDetails->Qty;
            $EffectDate=date("Y-m-d", strtotime($DockBookData->Booking_Date));
            $rate=Helper::CustTariff($DockBookData->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
            $SourceStateCheck=$DockBookData->DestPincodeDetails->StateDetails->name; 
            $fright=$DockBookData->DocketProductDetails->Charged_Weight*$rate;
            if(isset($DockBookData->customerDetails->PaymentDetails->Road))
                {
                    $gstPer=$DockBookData->customerDetails->PaymentDetails->Road;
                }
                else
                {
                  $gstPer=0;  
                }
                if($gstPer !=0)
            {
                if($SourceStateCheck=='Delhi')
                {
                    $cgst=0;
                    $sgst=0;
                    $igst=($fright*$gstPer)/100;
                }
                else{
                    $gsthalf=$gstPer/2;
                    $cgst=($fright*$gsthalf)/100;
                    $sgst=($fright*$gsthalf)/100;
                    $igst=0; 
                }
            }
            else
            {
                $cgst=0;
                $sgst=0;
                $igst=0;  
            }
            
            ?>
            @if($rate==00)
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            @else
            <?php
            $Chargejson=Helper::CustOtherCharge($DockBookData->Cust_Id,$EffectDate,$SourceCity,$DestCity,$chargeWeight,$goodsValue,$rate,$qty,$fright);
            $chhh=json_decode($Chargejson);
            
            if(isset($chhh->sum))
            {
              $Charge=$chhh->sum;
            }
             $Charge1=$DockBookData->DocketProductDetails->charge;
            ?>
            <td class="p-1">{{$rate}}</td>
            <td class="p-1">{{$fright}}</td>
            <td class="p-1">{{$Charge+$Charge1}}</td>
            <td class="p-1">{{$fright}}</td>
            <td class="p-1">{{$cgst}}</td>
            <td class="p-1">{{$sgst}}</td>
            <td class="p-1">{{$igst}}</td>
            <td class="p-1"><?php echo $total=$igst+$cgst+$sgst+$fright+$Charge+$Charge1; ?></td>
            @endif
            @endif
            @endif
            <td class="p-1">@isset($DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo) 
                {{$DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo}}@endisset</td>
            <td class="p-1">@isset($DockBookData->offcieDetails->OfficeCode) 
                {{$DockBookData->offcieDetails->OfficeCode}} ~ {{$DockBookData->offcieDetails->OfficeName}} @endisset</td>
            <td class="p-1">@isset($DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo){{'BILLED'}}@else{{'NO'}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->Is_Rto)){{'YES'}}  @else {{'NO'}} @endif</td>
            <td class="p-1">@if(isset($DockBookData->offEntDetails->ID)){{'YES'}}  @else {{'NO'}} @endif</td>
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