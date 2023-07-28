@include('layouts.appThree')
<style>
    .rtoEnable
    {
      display:none  
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
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
         @if (session('status'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success - </strong>  {{ session('status','') }}
    </div>
    @endif
    <form method="POST" action="{{url('PostEditDocketBooking')}}" id="subForm">
    @csrf
        <div class="row pl-pr mt-1">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Docket Number<span
                                                        class="error">*</span></label>
                                                      <div class="col-md-8">
                                                    <input type="text" name="Docket" tabindex="6"
                                                        class="form-control Docket" id="Docket" onchange="getDocketDetails(this.value);">
                                                        <input type="hidden" name="DocketId" id="DocketId" value="">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Booking Branch<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <!-- <input type="text" name="ModeType" tabindex="2" class="form-control ModeType" id="ModeType"> -->
                                                   <input type="text" name="BookingBranch" tabindex="3"
                                                        class="form-control BookingBranch" id="BookingBranch" value="{{$Offcie->OfficeCode}} ~ {{$Offcie->OfficeName}}" readonly>
                                                        <input type="hidden" name="BookingBranchId" tabindex="3"
                                                        class="form-control BookingBranch" id="BookingBranch" value="{{$Offcie->id}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Booking Type<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="BookingType" tabindex="4"
                                                        class="form-control selectBox BookingType" id="BookingType">
                                                        <option value="">--select--</option>
                                                        @foreach($BookingType as $btype)
                                                        <option value="{{$btype->id}}">{{$btype->BookingType}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Delivery Type</label>
                                                <div class="col-md-8">
                                                    <select name="DeliveryType" tabindex="5"
                                                        class="form-control selectBox DeliveryType" id="DeliveryType">
                                                        <option value="">--select--</option>
                                                        @foreach($DevileryType as $dtype)
                                                        <option value="{{$dtype->id}}">{{$dtype->Title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Booking Date<span
                                                        class="error">*</span></label>
                                                <div class="col-md-3">
                                                    <input type="text" name="BookingDate" tabindex="1"
                                                        class="form-control BookingDate datepickerOne" id="BookingDate">
                                                    <input type="hidden" name="Cid" class="form-control Cid" id="Cid">
                                                </div>
                                                <label class="col-md-2 col-form-label" for="userName">Time<span
                                                        class="error">*</span></label>
                                                <div class="col-md-3">
                                                    <input type="time" name="BookingTime" tabindex="2"
                                                        class="form-control BookingTime" id="BookingTime">

                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-6">
                                            <div class="row">
                                            <label class="col-md-4 col-form-label rtoEnable removClassRot" for="userName">RTO Docket Number<span
                                                        class="error">*</span></label>
                                                      <div class="col-md-8 rtoEnable removClassRot">
                                                      <input type="text" name="RtoDocket" tabindex="6"
                                                        class="form-control RtoDocket" id="RtoDocket" onchange="getDocketDetailsRto(this.value,'{{$Offcie->id}}');">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">DACC</label>
                                                <div class="col-md-8 mt-1">
                                                    <input type="checkbox" name="Dacc" tabindex="7" class="Dacc" id="Dacc">&nbsp;
                                                     <small
                                                    style="font-size: 9px;font-weight: 600;">DACC: Delivery Against
                                                    Consignee Copy</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">DOD</label>
                                                <div class="col-md-8 d-flex justify-content-between align-items-center">
                                                    <div class="mr-10">
                                                        <input type="checkbox" name="Dod" tabindex="8" class="Dod" id="Dod" onclick="UnreaDodAmount()">
                                                    </div>
                                                    <label class="col-form-label mr-10" for="password">Amount</label>
                                                    <div>
                                                        <input type="number" step="0.1" name="DODAmount" tabindex="9"
                                                            class="form-control mr-10 w-90 DODAmount DODAmount2" id="DODAmount" readonly> 
                                                    </div>
                                                    <label class="col-form-label mr-10 ml-10" for="password">Cod</label>
                                                    <div class="mr-10">
                                                        <input type="checkbox" name="Cod" tabindex="10" class="Cod" id="Cod">
                                                     </div>
                                                    <label class="col-form-label mr-10" for="password">Amount</label>
                                                    <div>
                                                        <input type="number" step="0.1" name="CodAmount" tabindex="11"
                                                            class="form-control CodAmount" id="CodAmount" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Reference/Shipment
                                                    Number</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="ShipmentNo" tabindex="12"
                                                        class="form-control ShipmentNo" id="ShipmentNo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">PO Number</label>
                                                <div class="col-md-8">
                                                    <input type="number" step="0.1"  name="PoNumber" tabindex="13"
                                                        class="form-control PoNumber" id="PoNumber">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Origin<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                     <select name="Origin" tabindex="14"
                                                        class="form-control Origin OriginNamesearch" id="Origin">
                                                    <option value="">Select</option>
                                                    @foreach($Pincode as $pincodes)
                                                    <option value="{{$pincodes->id}}" @if(isset($Offcie->Pincode) && $Offcie->Pincode==$pincodes->id){{'selected'}}@endif>{{$pincodes->PinCode}} ~ {{$pincodes->Code}} : {{$pincodes->CityName}}</option>
                                                    @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Destination<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <select name="Destination" tabindex="15" class="form-control Destination DestNamesearch" id="Destination" onchange="gettraffchange()">
                                                    <option value="">Select</option>
                                                   
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Origin Area
                                                    Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="OriginArea" tabindex="16"
                                                        class="form-control OriginArea" id="OriginArea" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Destination Area
                                                    Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="DestinationArea" tabindex="17"
                                                        class="form-control DestinationArea" id="DestinationArea" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Customer Name<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                 <select name="Customer" tabindex="18" class="form-control Customer selectBox" id="Customer" onchange="getAllConsigner(this.value)">
                                                    <option value="">--select--</option>
                                                    @foreach($customer as $customerlist)
                                                    <option value="{{$customerlist->id}}">{{$customerlist->CustomerCode}} ~ {{$customerlist->CustomerName}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Mode</label>
                                                <div class="col-md-8">
                                                  
                                                        <select name="Mode" tabindex="19" class="form-control Mode"
                                                        id="Mode">
                                                        <option value="Road">Road</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pl-pr">
            <div class="col-xl-4" style="border: 1px solid #676f77;">
                <div class="row">
                        <h4 class="main-title text-dark p-1 text-center">Consignor</h4>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12" id="ConsignorOne">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Consignor
                                                    Name<span class="error">*</span></label>
                                                <div class="col-md-5">
                                                  <select name="Consignor" tabindex="20"  class="form-control Consignor selectBox consignorDet" id="Consignor" onchange="getConsignerDetails(this.value)">
                                               </select>
                                                </div>
                                                <div class="col-md-3 d-flex align-items-center">
                                                    <strong>add &nbsp;</strong><input type="checkbox" class="AddConsignor" name="AddConsignor" id="AddConsignor">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-12 consignorSelection" id="ConsignorTwo"> 
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Consignor
                                                    Name<span class="error">*</span></label>
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" name="consignerName">
                                                </div>
                                                <div class="col-md-3">
                                                    <strong>remove &nbsp;</strong><input type="checkbox" class="AddConsignor" name="AddConsignor" id="AddConsignor">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row d-flex align-items-center">
                                                <label class="col-md-9 col-form-label" for="password">Activate GST
                                                    Number & Mobile No & Address </label>
                                                <div class="col-md-2">
                                                    <input type="checkbox" name="AGstNo" tabindex="21" class="CaAGstNo"
                                                        id="AGstNo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">GST Number
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CaGstNo" tabindex="22"
                                                        class="form-control CaGstNo" id="CaGstNo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Mobile No
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CamobNo" tabindex="23"
                                                        class="form-control CamobNomobNo" id="CamobNomobNo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">Address</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CaAddress" tabindex="24"
                                                        class="form-control CaAddress" id="CaAddress">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div> <!-- end card body-->
            <div class="col-xl-4" style="border: 1px solid #676f77;">
                <div class="row">
                        <h4 class="main-title text-dark p-1 text-center">Consignee Details</h4>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                    <div class="col-12" id="SameConsignee">
                                            <div class="row d-flex align-items-center">
                                                <label class="col-md-6 col-form-label" for="password">Consignee same as Consignor </label>
                                                <div class="col-md-2">
                                                    <input type="checkbox" name="sameAsConsignor" tabindex="21" class="sameAsConsignor"
                                                        id="sameAsConsignor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Consignee
                                                    Name<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="ConsigneeName" tabindex="25"
                                                        class="form-control ConsigneeName" id="ConsigneeName">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">GST Number</label>
                                                <div class="col-md-8">
                                                <input type="text" name="CoGStNo" tabindex="26"
                                                        class="form-control CoGStNo" id="CoGStNo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Mobile No
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CoMobile" tabindex="27"
                                                        class="form-control CoMobile" id="CoMobile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">Address<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="CoAddress" tabindex="28"
                                                        class="form-control CoAddress" id="CoAddress">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                </div>
            </div> <!-- end card -->
            <div class="col-xl-4" style="border: 1px solid #676f77;">
                <div class="row">
                        <h4 class="main-title text-dark p-1 text-center">Tariff Details</h4>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                    <div class="col-12">
                                            <div class="row d-flex align-items-center">
                                                <label class="col-md-4 col-form-label" for="password">GST Applicable</label>
                                                <div class="col-md-2">
                                                    <input type="checkbox" name="GstApplicableTafiff" tabindex="21" class="GstApplicableTafiff"
                                                        id="GstApplicableTafiff">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" name="TGstAmount" tabindex="21" class="form-control TGstAmount"
                                                        id="TGstAmount" readonly>
                                                    
                                                </div>
                                                <label class="col-md-1 col-form-label" for="password">%</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Received Amount</label>
                                                <div class="col-md-8">
                                                <input type="text" name="TrafReceivedAmount" tabindex="26"
                                                        class="form-control TrafReceivedAmount" id="TrafReceivedAmount" onchange="calculateTraff(this.value)">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Payment Mode	
                                                </label>
                                                <div class="col-md-8">
                                                    
                                                        <select name="PaymentMethod" id="PaymentMethod" class="form-control PaymentMethod" onchange="checkPaymantFre(this.value)">
                                                            <option value="">--select--</option>
                                                            <option value="CASH">CASH</option>
                                                            <option value="UPI">UPI</option>
                                                            <option value="WALLET">WALLET</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">Reference Number	</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="tarffRefNp" tabindex="28"
                                                        class="form-control tarffRefNp" id="tarffRefNp" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">Freight</label>
                                                <div class="col-md-8">

                                                    <input type="text" name="TarffFright" tabindex="28"
                                                        class="form-control TarffFright" id="TarffFright" readonly>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">IGST</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="TraffIGST" tabindex="28"
                                                        class="form-control TraffIGST" id="TraffIGST" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">CGST</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="TraffCGST" tabindex="28"
                                                        class="form-control TraffCGST" id="TraffCGST" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">SGST</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="TraffSGST" tabindex="28"
                                                        class="form-control TraffSGST" id="TraffSGST" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label"
                                                    for="password">Total Amount	</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="TaffTtotal" tabindex="28"
                                                        class="form-control TaffTtotal" id="TaffTtotal" readonly>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                </div>
            </div> <!-- end card -->
            <div class="col-xs-12  mt-1" style="border: 1px solid #676f77;">
                <div class="row">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="col-12">
                                    <div class="row">
                                        <table class="table table-bordered table-responsive  table-centered mb-0">
                                            <thead>
                                                <tr class="main-title">
                                                <th width="15" class="p-1">Product<span class="error">*</span></th>
                                                    <th width="15" class="p-1">Packing Method<span class="error">*</span></th>
                                                    <th width="15" class="p-1">Pieces<span class="error">*</span></th>
                                                    <th width="15" class="p-1">Actual Weight<span class="error">*</span></th>
                                                    <th width="10" class="p-1">Volumetric<span class="error">*</span></th>
                                                    <th width="15" class="p-1">Volumetric Weight</th>
                                                    <th width="15" class="p-1">Charge Weight<span class="error">*</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td class="table-user p-1">
                                                       <select name="Product" tabindex="29"
                                                            class="form-control Product selectBox" id="Product">
                                                               <option value="">--select--</option> 
                                                               @foreach($DocketProduct as $dproduct)
                                                               <option value="{{$dproduct->id}}">{{$dproduct->Title}}</option> 
                                                               @endforeach
                                                            </select>
                                                    </td>
                                                    <td class="p-1"> 
                                                       
                                                            <select  name="PackingMethod" tabindex="30"
                                                            class="form-control PackingMethod selectBox" id="PackingMethod">
                                                                <option value="">--select--</option>
                                                                @foreach($PackingMethod as $pmethod)
                                                                <option value="{{$pmethod->id}}">{{$pmethod->Title}}</option>
                                                                @endforeach
                                                            </select> 
                                                        </td>
                                                    <td class="p-1"> <input type="number" step="0.1" name="Pieces" tabindex="31"
                                                            class="form-control Pieces" id="Pieces"> </td>
                                                    <td class="p-1">
                                                        <input type="number" step="0.1" name="ActualWeight" tabindex="32"
                                                            class="form-control ActualWeight" id="ActualWeight">
                                                    </td>
                                                    <td class="p-1">
                                                        <input type="text" value="N"  step="0.1" name="Volumetric" tabindex="33"
                                                            class="form-control Volumetric" id="Volumetric" onchange="checkVolumetric(this.value);">
                                                    </td>
                                                    <td class="p-1">
                                                        <input type="number" step="0.1" name="VolumetricWeight" tabindex="34"
                                                            class="form-control VolumetricWeight" id="VolumetricWeight" readonly>
                                                    </td>
                                                    <td class="p-1">
                                                        <input type="number" step="0.1" name="ChargeWeight" tabindex="35"
                                                            class="form-control ChargeWeight" id="ChargeWeight">
                                                    </td>
                                                </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3" class="p-1"> 
                                                        <Textarea class="form-control remark"
                                                            placeholder="Remark"  tabindex="36"  name="remark" id="remark"></Textarea>
                                                        </td>

                                                    <td colspan="2" class="p-1">
                                                         <div class="row">
                                                <label class="col-md-4 col-form-label text-end"
                                                    for="password">Booked By<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                      
                                                      <select name="BookedBy" tabindex="37"
                                                            class="form-control BookedBy selectBox" id="BookedBy">
                                                            <option value="">--select--</option>
                                                            @foreach($employee as $employees)
                                                            <option value="{{$employees->id}}" @if(isset($Offcie->EmpId) && $Offcie->EmpId==$employees->id){{'selected'}} @endif>{{$employees->EmployeeCode}} ~ {{$employees->EmployeeName}}</option>
                                                            @endforeach
                                                         </select>
                                                </div>
                                            </div>
                                                        </td>
                                                    <td colspan="2" class="p-1">

                                                        <input type="text" name="EmployeeName" tabindex="38"
                                                            class="form-control EmployeeName" id="EmployeeName"
                                                            placeholder="Employee Name (FOC) ">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <div class="col-xs-12" style="border: 1px solid #676f77;">  
                <div class="row">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="col-12">
                                <div class="row">
                                    <table class="table table-bordered table-responsive table-centered mb-0">
                                        <thead>
                                            <tr class="main-title">
                                                <th class="p-1">Type</th>
                                                <th class="p-1">Invoice No<span class="error">*</span></th>
                                                <th class="p-1">Invoice Date<span class="error">*</span></th>
                                                <th class="p-1" style="min-width: 250px;">Description<span class="error">*</span></th>
                                                <th class="p-1">Amount<span class="error">*</span></th>
                                                <th class="p-1">EWB Number</th>
                                                <th class="p-1">EWB Date</th>
                                                <th class="p-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="getRows">
                                            <tr>
                                                <td class="table-user p-1">
                                                    <select name="DocketData[0][InvType]" tabindex="39"
                                                        class="form-control InvType" id="InvType0">
                                                        <option value="">--select--</option>
                                                        @foreach($DocketInvoiceType as $DocketInvType)
                                                        <option value="{{$DocketInvType->id}}">{{$DocketInvType->Title}}</option>
                                                        @endforeach
                                                      </select>  
                                                </td>
                                                <td class="p-1"> <input type="text" name="DocketData[0][InvNo]" tabindex="40"
                                                        class="form-control InvNo" id="InvNo0"> </td>
                                                <td class="p-1"> <input type="text" name="DocketData[0][InvDate]" tabindex="41"
                                                        class="form-control InvDate datepickerOne" id="InvDate0"> </td>
                                                <td class="p-1">
                                                <select name="DocketData[0][Description]" tabindex="42"
                                                        class="form-control Description selectBox" id="Description0">
                                                        <option value="">--select--</option>
                                                        @foreach($contents as $key)
                                                        <option value="{{$key->Contents}}">{{$key->Contents}}</option>
                                                        @endforeach
                                                </select> 
                                                    <!-- <input type="text" name="DocketData[0][Description]" tabindex="42"
                                                        class="form-control Description" id="Description0"> -->
                                                </td>
                                                <td class="p-1">
                                                    <input type="number" step="0.1" name="DocketData[0][Amount]" tabindex="43"
                                                        class="form-control Amount" id="Amount0">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" name="DocketData[0][EWBNumber]" tabindex="44"
                                                        class="form-control EWBNumber" id="EWBNumber0">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" name="DocketData[0][EWBDate]" tabindex="45"
                                                        class="form-control EWBDate datepickerOne" id="EWBDate0">
                                                </td>
                                               
                                                <td class="p-1">
                                                   <input onclick="addMore();" type="button" tabindex="46" value="Add Item" class="form-control btn btn-primary">
                                                </td>
                                            </tr>
                                            <tr>
                                            <td colspan="7" class="p-1">
                                                <div class="docket_booking_edit loadReport">
                                                </div>
                                            </td> 
                                            <td></td>
                                            </tr>


                                        </tbody>
                                        
                                    </table>
                                </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 mt-1 mb-1 text-end">
                                            <input id="prevSubmit" type="button" class="btn btn-primary" value="submit" onclick="submitAllData();" >
                                        </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </form>
                <!-- Button trigger modal -->

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Volumetric Detail</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <table class="table table-bordered  table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Measurement</th>
                                                        <th>Length<span class="error">*</span></th>
                                                        <th>Width<span class="error">*</span></th>
                                                        <th>Height<span class="error">*</span></th>
                                                        <th>Quantity<span class="error">*</span></th>
                                                        <th>Actual Weight  (Per Piece)<span class="error">*</span></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-user">
                                                        <select name="PackingMethod" tabindex="30" class="form-control PackingMethod" id="PackingMethod">
                                                              <option value="1">INCH</option>
                                                               
                                                            </select> 
                                                           
                                                        </td>
                                                        <td> 
                                                           
                                                        <input type="number" step="0.1" name="lenght"  class="form-control lenght" id="lenght">
                                                            </td>
                                                        <td> <input type="number" step="0.1" name="width"  class="form-control width" id="width"> </td>
                                                        <td>
                                                            <input type="number" step="0.1" name="height"  class="form-control height" id="height">
                                                        </td>
                                                        <td>
                                                            <input type="number"  step="0.1" name="qty"  class="form-control qty" id="qty">
                                                        </td>
                                                        <td>
                                                            <input type="number" step="0.1" name="VloumeActualWeight"  class="form-control VloumeActualWeight" id="VloumeActualWeight">
                                                        </td>
                                                        
                                                    </tr>


                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="6"> 
                                                            <p>Customer Inch Formula : ((Length * Width * Height) / 1728.00) * 6.00</p>
                                                            <p>Customer Centimeter Formula : Formula not define !</p>  
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        
                                                       
                                                    </tr>
                                                </tfoot>
                                               
                                            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="calculateVolume()">Save</button>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="{{url('js/custome.js')}}"></script>
   <script>
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $('input[name=Dod]').click(function() {
    if($(this).prop("checked") == true) {
    $('.DODAmount2').attr('readonly', false);
    }
    else if($(this).prop("checked") == false) {
    
    $('.DODAmount2').attr('readonly', true);
    }
});
$('input[name=Cod]').click(function() {
    if($(this).prop("checked") == true) {
    $('.CodAmount').attr('readonly', false);
    }
    else if($(this).prop("checked") == false) {
    
    $('.CodAmount').attr('readonly', true);
    }
});
function getAllConsigner(CustId)
{
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getConsignor',
       cache: false,
       data: {
           'CustId':CustId
       },
       success: function(data) {
         $('.consignorDet').html(data);
       }
     });
    
   
}
function getConsignerDetails(consignorId)
{
    if(consignorId !='')
    {
     var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getConsignorDetsils',
       cache: false,
       data: {
           'consignorId':consignorId
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.CaGstNo').val(obj.GSTNo);
        $('.CamobNomobNo').val(obj.Mobile);
        $('.CaAddress').val(obj.Address1);

       }
     });
    }
    else{
        $('.CaGstNo').val('');
        $('.CamobNomobNo').val('');
        $('.CaAddress').val('');

    }
}
$('input[name=sameAsConsignor]').click(function() {
    
    if($(this).prop("checked") == true) {
    var Consignor=$('.Consignor').val();
     if(Consignor!==null)
     {
       var Consignor=$('.Consignor').val();
       var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getConsignorDetsils',
       cache: false,
       data: {
           'consignorId':Consignor
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.ConsigneeName').val(obj.ConsignorName);
        $('.CoGStNo').val(obj.GSTNo);
        $('.CoMobile').val(obj.Mobile);
        $('.CoAddress').val(obj.Address1);

       }
     });
     }
     else{
        alert('Please Select Consignor')
         return false;
     }

     
    }
    else if($(this).prop("checked") == false) {
        $('.ConsigneeName').val('');
        $('.CoGStNo').val('');
        $('.CoMobile').val('');
        $('.CoAddress').val('');
    }
});


function getDocketDetails(Docket)
{
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/EditDocketBookingData',
       cache: false,
       data: {
           'Docket':Docket
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==0)
        {
            alert("Docket Not Found");
            $('.Docket').val('');
            $('.Docket').focus();
            $("#BookingDate").val('');
            $("#BookingBranch").val('');
            $("#BookingTime").val('');
            $("#BookingType").val('').trigger('change');
            $("#DeliveryType").val('').trigger('change');

            $("#Origin").val('').trigger('change');
            $("#Destination").val('').trigger('change');
            $("#Consignor").val('');
            $('#consignerName').val('').trigger('change');
            $("#ConsigneeName").val('');

            $("#Product").val('').trigger('change');
            $("#PackingMethod").val('').trigger('change');
            $("#Pieces").val('');
            $("#ActualWeight").val('');

            $("#Volumetric").val('');
            $("#ChargeWeight").val('');
            $("#Dacc").prop("checked",false); 
            $("#CodAmount").prop("readonly", true);
            $("#Dod").prop("checked",false);
            $("#DODAmount").prop("readonly", true);
             $("#Cod").prop("checked",false);
              $("#ShipmentNo").val('');
             $("#PoNumber").val('');

            $("#Mode").val('').trigger('change');
            // $("#OriginArea").text('');
            // $("#DestinationArea").text('');
            $("#CaAGstNo").val('');
            //  $("#AGstNo").val('');
            $("#CamobNomobNo").val('');
            $("#CoGStNo").val('');
            $("#CoMobile").val('');
            $("#CoAddress").val('');
            $("#CaAddress").val('');
            $("#remark").text('');
            $("#BookedBy").val('').trigger('change');
                 // $("#EmployeeName").val('');
            $("#VolumetricWeight").val('');
            $("#tarffRefNp").val('');
            $("#PaymentMethod").val('');
            $("#GstApplicableTafiff").prop("checked",false);
            $("#TrafReceivedAmount").val('');
            $("#TarffFright").val('');
            $("#TraffIGST").val('');
            $("#TraffCGST").val('');
            $("#TraffSGST").val('');
            $("#TaffTtotal").val('');
            $("#Customer").val('').trigger('change');
            $("#sameAsConsignor").prop("checked",false);
            $("#DODAmount").val('');
            $("#CodAmount").val('');
            $("#CaGstNo").val('');
            $('.loadReport').html('');
            return false;
        }
        else if(obj.status==1 )
        {
         var myDate = obj.result.Booking_Date.split(" ");
        // const mDate = new Date(myDate[0]);
         $("#DocketId").val(obj.result.id);
            $("#BookingDate").val(myDate[0]);
           
            $("#BookingTime").val(myDate[1]);
            if(obj.result.offcie_details.OfficeCode!=null){
                $("#BookingBranch").val(obj.result.offcie_details.OfficeCode+'~'+obj.result.offcie_details.OfficeName);
            }
            
            $("#BookingType").val(obj.result.Booking_Type).trigger('change');
            $("#DeliveryType").val(obj.result.Delivery_Type).trigger('change');
            $("#Docket").val(obj.result.Docket_No);
            $('.Origin').append(obj.result.Origin_Pin).trigger('change');
            $(".OriginNamesearch").val('110075').trigger('select2:select');
            $("#Destination").val(obj.result.Dest_Pin).trigger('click'); 
            $('#consignerName').val(obj.result.consignor.ConsignorName).trigger('change');
            $("#ConsigneeName").val(obj.result.consignoee_details.ConsigneeName);
            $("#Product").val(obj.result.docket_product_details.D_Product).trigger('change');
            $("#PackingMethod").val(obj.result.docket_product_details.Packing_M).trigger('change');
            $("#Pieces").val(obj.result.docket_product_details.Qty);
            $("#ActualWeight").val(obj.result.docket_product_details.Actual_Weight);
            $("#Volumetric").val(obj.result.docket_product_details.Is_Volume);
             $("#ChargeWeight").val(obj.result.docket_product_details.Charged_Weight);
        
                 // $("#RtoDocket").text(obj.result.Booking_Date);
                if(obj.result.Is_DACC=='YES') {
                    $("#Dacc").prop("checked",true);
                }
                else{
                     $("#Dacc").prop("checked",false); 
                }

                if(obj.result.Is_COD=='YES') {
                      $("#Cod").prop("checked",true);
                    $("#CodAmount").prop("readonly", false);
                    $("#CodAmount").val(obj.result.CODAmount);
                }
                else{
                     $("#Cod").prop("checked",false);
                    $("#CodAmount").prop("readonly", true);
                }
                
                if(obj.result.Is_DOD=='YES') {
                    $("#Dod").prop("checked",true);
                     $("#DODAmount").prop("readonly", false);
                    $("#DODAmount").val(obj.result.DODAmount);
                }
                else{
                     $("#Dod").prop("checked",false);
                     $("#DODAmount").prop("readonly", true);
                }
            $("#ShipmentNo").val(obj.result.Ref_No);
            $("#PoNumber").val(obj.result.PO_No);
                $("#Mode").val(obj.result.Mode).trigger('change');
                // $("#OriginArea").text(obj.result.Booking_Date);
                // $("#DestinationArea").text(obj.result.Booking_Date);
                $("#CaAGstNo").val(obj.result.consignor.GSTNo);
               //  $("#AGstNo").val(obj.result.Booking_Date);
                $("#CamobNomobNo").val(obj.result.consignor.Mobile);
                $("#CoGStNo").val(obj.result.consignoee_details.GSTNo);
                $("#CoMobile").val(obj.result.consignoee_details.Mobile);
                $("#CoAddress").val(obj.result.consignoee_details.Address1);
                $("#CaAddress").val(obj.result.consignor.Address1);
                $("#remark").text(obj.result.Remark);
                 $("#BookedBy").val(obj.result.Booked_By);
                 // $("#EmployeeName").text(obj.result.Booking_Date);
                  $("#VolumetricWeight").val(obj.result.Booking_Date);
                 if(obj.tarrif!=null){
                $("#tarffRefNp").val(obj.tarrif.ReferenceNumber);
                    $("#PaymentMethod").val(obj.tarrif.PaymentMethod);
               //  $("#TGstAmount").text(obj.tarrif.is_gst);
                    if(obj.tarrif.is_gst!=null){
                        $("#GstApplicableTafiff").prop("checked",true);
                    }
                    else{
                        $("#GstApplicableTafiff").prop("checked",false);
                    }
                $("#TrafReceivedAmount").val(obj.tarrif.ReceivedAmount);
                if(obj.tarrif.Freight!=null){
                $("#TarffFright").val(obj.tarrif.Freight);
                }
                 if(obj.tarrif.IGST!=null){
                $("#TraffIGST").val(obj.tarrif.IGST);
                }
                if(obj.tarrif.CGST!=null){
                $("#TraffCGST").val(obj.tarrif.CGST);
                }
                 if(obj.tarrif.SGST!=null){
                $("#TraffSGST").val(obj.tarrif.SGST);
                }
                 $("#TaffTtotal").val(obj.tarrif.TotalAmount);

                }
            $("#Customer").val(obj.result.Cust_Id).trigger('change');
            setTimeout(function(){
                $("#Consignor").val(obj.result.Consigner_Id).trigger('change');
            },1000);
            
        }

    if(obj.result.id!=null){
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/EditDocketInvoiceDetail',
       cache: false,
       data: {
           'DocketId':obj.result.id
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==0)
        {
            alert("Invoice Details Not Found");
            return false;
        }
        else if(obj.status==1 )
        {
            var htmlBody = `<table class="table table-bordered  table-centered mb-0">
            <thead>
            <tr class="main-title">
             <th>Type</th>
                <th>Invoice No<span class="error">*</span></th>
                <th>Invoice Date<span class="error">*</span></th>
                <th>Description<span class="error">*</span></th>
                <th>Amount<span class="error">*</span></th>
                <th>EWB Number</th>
                <th>EWB Date</th>
                <th>Action</th>
            </tr>
            </thead><tbody>`;
            $.each(obj.datas, function(i){
              htmlBody +=`<tr id="row`+i+`"> 
                  <td>`+obj.datas[i].docket_invice_type_data.Title+`</td>
                     <td>`+obj.datas[i].Invoice_No+`</td>
                     <td>`+obj.datas[i].Invoice_Date+`</td>
                      <td>`+obj.datas[i].Description+`</td>
                     <td>`+obj.datas[i].Amount+`</td>
                     <td>`+obj.datas[i].EWB_No+`</td>
                     <td>`+obj.datas[i].EWB_Date+`</td>
                     <td><a id=del"`+i+`" onclick="deleteInvoice('`+i+`','`+obj.datas[i].id+`')" href="javascript:void(0);">delete</a></td>
                      </tr>`;
                  ++i;
            });
        
            htmlBody +='</tbody> </table>';
            $('.loadReport').html(htmlBody);
            }
        
             }
            });
       }
   
        }
     }); 
}

function deleteInvoice(id, InvoiceId){
   var base_url = '{{url('')}}';
   if(confirm('Are you sure?')){
          $.ajax({
           type: 'POST',
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
           },
           url: base_url + '/DeleteDocketInvoiceDetail',
           cache: false,
           data: {
               'InvoiceId':InvoiceId
           },
           success: function(data) {
            const obj = JSON.parse(data);
            if(obj.status==0)
            {
                alert("Could not Delete");
                return false;
            }
            else if(obj.status==1 )
            {
                  alert("Deleted Successfully");
                  $('#row'+id).remove();
            }
        }
    });
      }
}
           var count=0;
            function addMore(){ 
                 var InvType= $("#InvType"+count).val();
                 var InvNo= $("#InvNo"+count).val();
                 var InvDate= $("#InvDate"+count).val();
                 var Description= $("#Description"+count).val();
                 var Amount= $("#Amount"+count).val();
                 var EWBNumber= $("#EWBNumber"+count).val();
                 var EWBDate= $("#EWBDate"+count).val();
              
                 if(InvNo==''){
                    alert("please Enter Inv No");
                    return false;
                 }
                 if(InvDate==''){
                    alert("please Enter Inv Date");
                    return false;
                 }
                 if(Description==''){
                    alert("please Enter Description");
                    return false;
                 }
                 if(Amount==''){
                    alert("please Enter Amount");
                    return false;
                 }
                 if(EWBNumber==''){
                    alert("please Enter EWB Number");
                    return false;
                 }
                 if(EWBDate==''){
                    alert("please Enter EWB Date");
                    return false;
                 }
                if(InvType !='' && InvNo !=''  && InvDate !=''  && Description !=''  && Amount !=''  && EWBNumber !=''  && EWBDate !=''){
                ++count;
                // alert(count)
                var rowStructure=`
                <tr id="row`+count+`">

                <td class="table-user">
                 <select name="DocketData[`+count+`][InvType]" tabindex="39"
                 class="form-control InvType" id="InvType`+count+`">
                 <option value="">--select--</option>
                 <option value="1">INVOICE</option>
                 <option value="2">DECLARATION</option>
                 </select>
                </td>
                <td> <input type="text" name="DocketData[`+count+`][InvNo]" tabindex="40"
                   class="form-control InvNo" id="InvNo`+count+`"> </td>
                <td> <input type="text" name="DocketData[`+count+`][InvDate]" tabindex="41"
                class="form-control InvDate datepickerOne" id="InvDate`+count+`"> </td>
                <td>
                <select name="DocketData[`+count+`][Description]" tabindex="42"
                        class="form-control Description selectBox" id="Description`+count+`">
                     <option value="">--select--</option>
                        @foreach($contents as $key)
                        <option value="{{$key->Contents}}">{{$key->Contents}}</option>
                         @endforeach
                    </select> 
                
                </td>
                <td>
                <input type="number" step="0.1" name="DocketData[`+count+`][Amount]" tabindex="43"
                class="form-control Amount" id="Amount`+count+`">
                </td>
                <td>
                <input type="text" name="DocketData[`+count+`][EWBNumber]" tabindex="44"
                class="form-control EWBNumber" id="EWBNumber`+count+`">
                </td>
                <td>
                <input type="text" name="DocketData[`+count+`][EWBDate]" tabindex="45"
                class="form-control EWBDate datepickerOne" id="EWBDate`+count+`">
                </td>
                                                   
                <td>
                   <input onclick="remove(`+count+`);" type="button" tabindex="46" value="Cancle" class="form-control">
                </td></tr>
                 `;
                $("#getRows").append(rowStructure);
                $('.datepickerOne').datepicker({
                 format: 'dd-mm-yyyy',
                 autoclose: true
                 });
                }
            }

            function remove(id){
                $("#row"+id).remove();
            }

function submitAllData(){
 if( $("#BookingDate").val()=='')
 {
    alert('Please Enter Booking Date');
    return false;
 }
 if( $("#BookingTime").val()=='')
 {
    alert('Please Enter Booking Time');
    return false;
 }
 if( $("#BookingBranch").val()=='')
 {
    alert('Please Select Booking Branch');
    return false;
 }
 if( $("#BookingType").val()=='')
 {
    alert('Please Select Booking Type');
    return false;
 }
 if( $("#Docket").val()=='')
 {
    alert('Please Enter Docket');
    return false;
 }
 if( $("#Origin").val()=='')
 {
    alert('Please Select Origin');
    return false;
 }
 if( $("#Destination").val()=='')
 {
    alert('Please Select Destination');
    return false;
 }
 if( $("#Consignor").val()=='' && $('#consignerName').val()=='')
 {
    alert('Please Select Consignor');
    return false;
 }
 if( $("#ConsigneeName").val()=='')
 {
    alert('Please Enter Consignee Name');
    return false;
 }
 if( $("#CoAddress").val()=='')
 {
    alert('Please Enter Consignee Address');
    return false;
 }
 if( $("#CoAddress").val()=='')
 {
    alert('Please Enter Consignee Address');
    return false;
 }
 if($("#BookingType").val()==3){
 if( $("#TrafReceivedAmount").val()=='')
 {
    alert('Please Enter Received Amount');
    return false;
 }

 if($("#PaymentMethod").val()=='')
 {
    alert('Please Select Payment Method');
    return false;
 }
}
 if( $("#Product").val()=='')
 {
    alert('Please Enter Product');
    return false;
 }
 if( $("#PackingMethod").val()=='')
 {
    alert('Please Select Packing Method');
    return false;
 }
 if( $("#Pieces").val()=='')
 {
    alert('Please Enter Pieces');
    return false;
 }
 if( $("#ActualWeight").val()=='')
 {
    alert('Please Enter ActualWeight');
    return false;
 }
 if( $("#Volumetric").val()=='')
 {
    alert('Please Enter Volumetric');
    return false;
 }
 
 if( $("#ChargeWeight").val()=='')
 {
    alert('Please Enter Charge Weight');
    return false;
 }
//  if( $("#InvNo0").val()=='')
//  {
//     alert('Please Enter Invoice No');
//     return false;
//  }
//  if( $("#InvDate0").val()=='')
//  {
//     alert('Please Select Invoice Date');
//     return false;
//  }
//  if( $("#Description0").val()=='')
//  {
//     alert('Please Enter Description');
//     return false;
//  }
//  if( $("#Amount0").val()=='')
//  {
//     alert('Please Enter Amount');
//     return false;
//  }

//  var Typelenght= $(".InvType").length;
//  for(var ini=0; ini < Typelenght; ini++){
//      if( $("#InvNo"+ini).val()=='')
//      {
//         alert('Please Enter Invoice No');
//         return false;
//      }
//      if( $("#InvDate"+ini).val()=='')
//      {
//         alert('Please Select Invoice Date');
//         return false;
//      }
//      if( $("#Description"+ini).val()=='')
//      {
//         alert('Please Enter Description');
//         return false;
//      }
//      if( $("#Amount"+ini).val()=='')
//      {
//         alert('Please Enter Amount');
//         return false;
//      }
$('#subForm').submit();


 }



function checkVolumetric(value)
{
    if(value=='Y')
    {
    $('#exampleModal').modal('toggle');
    }
   
}
function calculateVolume()
{
  
   
   if($('#lenght').val()=='')
   {
    alert('Please Enter Lenght');
    return false;
   }
   if($('#lenght').val()=='')
   {
    alert('Please Enter Lenght');
    return false;
   }
   if($('#height').val()=='')
   {
    alert('Please Enter height');
    return false;
   }
   if($('#qty').val()=='')
   {
    alert('Please Enter Qty');
    return false;
   }
    var lenght= $('#lenght').val()
    var width= $('#width').val();
    var height=$('#height').val();
    var qty=$('#qty').val();
    var volu=((lenght*width*height)/1728)*6;
    var TotalValue=(volu.toFixed(2));
    $('.VolumetricWeight').val(TotalValue);
    $('#exampleModal').modal('hide')
}
$('input[name=AddConsignor]').click(function() {
    
    if($(this).prop("checked") == true) {
     $('#ConsignorOne').addClass('consignorSelection');
     $('#ConsignorTwo').removeClass('consignorSelection');
     $('#SameConsignee').addClass('consignorSelection');
     $('.AddConsignor').prop('checked', true);
    }
    else if($(this).prop("checked") == false) {
     $('#ConsignorOne').removeClass('consignorSelection');
     $('#ConsignorTwo').addClass('consignorSelection');
     $('#SameConsignee').removeClass('consignorSelection');
     $('.AddConsignor').prop('checked', false);
    }
});
$('input[name=GstApplicableTafiff]').click(function() {
    
    if($(this).prop("checked") == true) {
        var cust=$('.Customer').val();
        if($('.Customer').val()=='')
        {
            alert('please Select customer');
            return false;
        }
        else{
            var base_url = '{{url('')}}';
            $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getGstPerCustomer',
       cache: false,
       data: {
           'CustId':cust
       },
       success: function(data) {
         $('.TGstAmount').val(data);
         $('.TGstAmount').attr('readonly', false);
       }
     });
          
        }
     
       // $('#TGstAmount').val('18');
     
    }
    else if($(this).prop("checked") == false) {
        $('.TGstAmount').attr('readonly', true);
         $('#TGstAmount').val('');
        $('.TraffIGST').val('');
        $('.TarffFright').val('');
        $('.TaffTtotal').val('');
        $('.TraffCGST').val('');
        $('.TraffSGST').val('');
        $('.TrafReceivedAmount').val('');
    }
});   
function gettraffchange()
{
      
        $('.TraffIGST').val('');
        $('.TarffFright').val('');
        $('.TaffTtotal').val('');
        $('.TraffCGST').val('');
        $('.TraffSGST').val('');
        $('.TrafReceivedAmount').val('');
}
function calculateTraff(value)
{
    var Origin=$('.Destination').val();
    if(Origin=='')
    {
        alert('Please Selelct Destination');
        $('.TraffCGST').val('');
        $('.TraffSGST').val('');
        $('.TarffFright').val('');
        $('.TaffTtotal').val('');
        $('.TraffIGST').val('');
        $('.TrafReceivedAmount').val('');
        
        return false;
    }
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getStateUsingOrigin',
       cache: false,
       data: {
           'Origin':Origin
       }, 
       success: function(data) {
        if(data=='true')
        {
            if($('#TGstAmount').val()=='')
            {
            var gst=0;
            }
            else
            {
            var gst=$('#TGstAmount').val();
            var maingst=gst/2
            }
            var IGST=(value*maingst)/100;
            var PIGST=(value*gst)/100;
            $('.TraffCGST').val(IGST);
            $('.TraffSGST').val(IGST);
            $('.TarffFright').val(value-PIGST);
            $('.TaffTtotal').val(value);
            $('.TraffIGST').val('');
        }
        else{
            if($('#TGstAmount').val()=='')
            {
            var gst=0;
            }
            else
            {
            var gst=$('#TGstAmount').val()
            }
            var IGST=(value*gst)/100;
            $('.TraffIGST').val(IGST);
            $('.TraffCGST').val('');
            $('.TraffSGST').val('');
            $('.TarffFright').val(value-IGST);
            $('.TaffTtotal').val(value); 
        }
        $('.TGstAmount').attr('readonly', true);
       }
     });
    }
 function getDocketDetailsRto(Docket,BranchId)
{
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketIsAvalibleRTo',
       cache: false,
       data: {
           'Docket':Docket,'BranchId':BranchId
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message)
            $('.RtoDocket').val('');
            $('.RtoDocket').focus();
            return false;
        }
       

       }
     });
}
   
    


function checkPaymantFre(value)
{
   if(value !='CASH' && value !='')
   {
    $('.tarffRefNp').attr('readonly', false);
   }
   else{
    $('.tarffRefNp').attr('readonly', true);
   }
}
         </script>