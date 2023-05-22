@include('layouts.appThree')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sales</a></li>
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
                     <select name="Customer" id="Customer" class="form-control selectBox" tabindex="1">
                       <option value="">--select Customer--</option>
                        @foreach($customer as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('Customer') !='' && request()->get('Customer')==$offcice->id){{'selected'}}@endif>{{$offcice->CustomerCode}}~{{$offcice->CustomerName}}</option >
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

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:150px;" class="p-1">Date</th>
            
            <th style="min-width:160px;" class="p-1">Origin </th>
          
            <th style="min-width:160px;" class="p-1">Dest.</th>	

            <th style="min-width:130px;" class="p-1">Mode</th>	
            <th style="min-width:130px;" class="p-1">Vendor Name</th>
            <th style="min-width:130px;" class="p-1">Vehicle No.</th>   
            <th style="min-width:190px;" class="p-1">Gatepass No.</th>

            <th style="min-width:130px;" class="p-1">Client Code</th>
            <th style="min-width:130px;" class="p-1">Client Name</th>

             <th style="min-width:170px;" class="p-1">Billing Person </th>

            	
             <th style="min-width:130px;" class="p-1">Product</th>	
            <th style="min-width:130px;" class="p-1">PO Number</th>
            
            <th style="min-width:130px;" class="p-1">Consignor Name</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
     
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Volumetric. Chrg.</th>
            
            <th style="min-width:130px;" class="p-1">Sale Type</th>
             
            <th style="min-width:130px;" class="p-1"> Rate</th>

            <th style="min-width:130px;" class="p-1"> FREIGHT</th>
            <th style="min-width:130px;" class="p-1"> TAXABLE AMOUNT</th>
            <th style="min-width:130px;" class="p-1"> CGST</th>
            <th style="min-width:130px;" class="p-1"> SGST</th>
            <th style="min-width:130px;" class="p-1"> IGST</th>
            <th style="min-width:130px;" class="p-1"> TOTAL GST	</th>
            <th style="min-width:130px;" class="p-1"> NET AMOUNT</th>
           
           
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
            @foreach($docketCharge as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">{{date("d-m-Y H:i:s",strtotime($DockBookData->Booking_Date))}}</td>
        
             <td class="p-1">@isset($DockBookData->PincodeDetails->CityDetails->Code) {{$DockBookData->PincodeDetails->CityDetails->Code}} ~ {{$DockBookData->PincodeDetails->CityDetails->CityName}} @endisset</td>
            
             <td class="p-1">@isset($DockBookData->DestPincodeDetails->CityDetails->Code)
                {{$DockBookData->DestPincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
            
             <td class="p-1">{{$DockBookData->Mode}}</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName) {{$DockBookData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorCode}}~{{$DockBookData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo) {{$DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo}} @endisset</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number) <a href="{{url('print_gate_Number').'/'.$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}}"> {{$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}} </a> @endisset</td>

             <td class="p-1">@isset($DockBookData->customerDetails->CustomerCode) {{$DockBookData->customerDetails->CustomerCode}} @endisset</td>
             <td class="p-1">@isset($DockBookData->customerDetails->CustomerName) {{$DockBookData->customerDetails->CustomerName}} @endisset</td> 
            
              
              <td class="p-1"> </td>
             
          
                <td class="p-1">@if(isset($DockBookData->DocketProductDetails->DocketProdductDetails)){{$DockBookData->DocketProductDetails->DocketProdductDetails->Title}}@endif</td> 
             <td class="p-1">{{$DockBookData->PO_No}}</td>
            <td class="p-1">@isset($DockBookData->consignor->ConsignorName) {{$DockBookData->consignor->ConsignorName}}  @endisset</td>
             <td class="p-1">@isset($DockBookData->consignoeeDetails->ConsigneeName)  {{$DockBookData->consignoeeDetails->ConsigneeName}} @endisset</td>
          
            
             <td class="p-1" >@if(isset($DockBookData->DocketProductDetails->Qty)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Actual_Weight)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>
             <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Charged_Weight)){{$DockBookData->DocketProductDetails->Charged_Weight}}@endif</td>
           
             <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Is_Volume)){{$DockBookData->DocketProductDetails->Is_Volume}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->BookignTypeDetails->BookingType)){{$DockBookData->BookignTypeDetails->BookingType}}@endif</td>
            <td class="p-1"></td>

            <td class="p-1">{{'0'}}</td>
            <td class="p-1">{{'0'}}</td>
            <td class="p-1">{{'0'}}</td>
            <td class="p-1">{{'0'}}</td>
            <td class="p-1">{{'0'}}</td>
            <td class="p-1">{{'0'}}</td>
            <td class="p-1">{{'0'}}</td>
            
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $docketCharge->appends(Request::all())->links() !!}
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