@include('layouts.appTwo')
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
   <!-- <form method="POST" action="{{url('postSubmitCreditBoocking')}}" id="subForm"> -->

    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row p-1">
                                    <div class="col-6 m-b-1">
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
                                            <div class="col-6 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="password">Booking Branch<span
                                                        class="error">*</span></label>
                                                        <div class="col-md-8
                                                        ">
                                                        <!-- <input type="text" name="ModeType" tabindex="2" class="form-control ModeType" id="ModeType"> -->
                                                        <input type="text" name="BookingBranch" tabindex="3"
                                                        class="form-control BookingBranch" id="BookingBranch" value="{{$Offcie->OfficeCode}} ~ {{$Offcie->OfficeName}}" readonly>
                                                        <input type="hidden" name="BookingBranchId" tabindex="3"
                                                        class="form-control BookingBranch" id="BookingBranch" value="{{$Offcie->id}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="userName">Booking Type<span
                                                        class="error">*</span></label>
                                                        <div class="col-md-8
                                                        ">
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
                                                <div class="col-md-8
                                                ">
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
                                <div class="col-6 m-b-1">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label" for="userName">Docket Number<span
                                            class="error">*</span></label>
                                            <div class="col-md-8
                                            ">
                                            <input type="text" name="Docket" tabindex="6"
                                            class="form-control Docket" id="Docket" onchange="getDocketDetails(this.value,'{{$Offcie->id}}');">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 m-b-1">
                                    <div class="row">

                                        <label class="col-md-3 col-form-label" for="userName"></label>
                                        <div class="col-md-9 rtoEnable error">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 m-b-1">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label" for="userName">DACC</label>
                                        <div class="col-md-8 mt-1 d-flex align-items-center">
                                            <input type="checkbox" name="Dacc" tabindex="7" class="Dacc" id="Dacc">&nbsp;
                                            <small
                                            style="font-size: 9px;font-weight: 600;">DACC: Delivery Against
                                        Consignee Copy</small>
                                    </div>


                                </div>
                            </div>
                            <div class="col-6 m-b-1">
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
                            <div class="col-6 m-b-1">
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="userName">Reference/Shipment
                                    Number</label>
                                    <div class="col-md-8
                                    ">
                                    <input type="text" name="ShipmentNo" tabindex="12"
                                    class="form-control ShipmentNo" id="ShipmentNo">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-4 col-form-label" for="password">PO Number</label>
                                <div class="col-md-8
                                ">
                                <input type="number" step="0.1"  name="PoNumber" tabindex="13"
                                class="form-control PoNumber" id="PoNumber">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 m-b-1">
                        <div class="row">
                            <label class="col-md-4 col-form-label" for="password">Origin<span
                                class="error">*</span></label>
                                <div class="col-md-8
                                ">
                                <select name="Origin" tabindex="14"
                                class="form-control Origin OriginNamesearch" id="Origin">
                                <option value="">Select</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 m-b-1">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label" for="password">Destination<span
                                            class="error">*</span></label>
                                            <div class="col-md-8
                                            ">
                                            <select name="Destination" tabindex="15" class="form-control Destination DestNamesearch" id="Destination">
                                            <option value="">Select</option>
                                             
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 m-b-1">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label" for="password">Origin Area
                                        Name</label>
                                        <div class="col-md-8
                                        ">
                                        <input type="text" name="OriginArea" tabindex="16"
                                        class="form-control OriginArea" id="OriginArea" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 m-b-1">
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="password">Destination Area
                                    Name</label>
                                    <div class="col-md-8
                                    ">
                                    <input type="text" name="DestinationArea" tabindex="17"
                                    class="form-control DestinationArea" id="DestinationArea" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-4 col-form-label" for="password">Customer Name<span
                                    class="error">*</span></label>
                                    <div class="col-md-6
                                    ">
                                    <select name="Customer" tabindex="18" class="form-control Customer CustomerNamesearch" id="Customer" onchange="getAllConsigner(this.value)">
                                        <option value="">--select--</option>
                                        @foreach($customer as $customerlist)
                                        <option value="{{$customerlist->id}}">{{$customerlist->CustomerCode}} ~ {{$customerlist->CustomerName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 text-end">
                                    <a tabindex="19" href="javascript:void(0)" class="btn btn-primary" onclick="OpenCustomerDetails();">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <label class="col-md-4 col-form-label" for="password">Mode</label>
                                <div class="col-md-8
                                ">

                                <select name="Mode" tabindex="20" class="form-control Mode"
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

<div class="row pl-pr">
    <div class="col-xl-6" style="border: 1px solid #676f77;">
        <div class="row">
            <h4 class="main-title p-1 text-center">Consignor Details</h4>
            <div id="basicwizard">
                <div class="tab-content b-0 mb-0">
                    <div class="tab-pane active show" id="basictab1" role="tabpanel">
                        <div class="row pl-pr mt-1">
                            <div class="col-12" id="ConsignorOne">
                                <div class="row">
                                    <label class="col-md-3 col-form-label" for="password">Consignor
                                        Name<span class="error">*</span></label>
                                        <div class="col-md-6">
                                          <select name="Consignor" tabindex="21"  class="form-control Consignor ConsignorNamesearch consignorDet" id="Consignor" onchange="getConsignerDetails(this.value)">
                                          </select>
                                      </div>
                                      <div class="col-md-2 d-flex align-items-center">
                                        <strong>add &nbsp;</strong><input tabindex="22" type="checkbox" class="AddConsignor" name="AddConsignor" id="AddConsignor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 consignorSelection" id="ConsignorTwo"> 
                                <div class="row">
                                    <label class="col-md-3 col-form-label" for="password">Consignor
                                        Name<span class="error">*</span></label>
                                        <div class="col-md-6">
                                          <input tabindex="23" type="text" class="form-control" name="consignerName" id="consignerName">
                                      </div>
                                      <div class="col-md-2">
                                        <strong>remove &nbsp;</strong><input tabindex="24" type="checkbox" class="AddConsignor" name="AddConsignor" id="AddConsignor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="password">Activate GST
                                    Number & Mobile No & Address </label>
                                    <div class="col-md-6 mt-1">
                                        <input type="checkbox" name="AGstNo" tabindex="25" class="CaAGstNo"
                                        id="AGstNo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 m-b-1">
                                <div class="row">
                                    <label class="col-md-3 col-form-label" for="password">GST Number
                                    </label>
                                    <div class="col-md-9
                                    ">
                                    <input type="text" name="CaGstNo" tabindex="26"
                                    class="form-control CaGstNo" id="CaGstNo">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 m-b-1">
                            <div class="row">
                                <label class="col-md-3 col-form-label" for="password">Mobile No
                                </label>
                                <div class="col-md-9
                                ">
                                <input type="text" name="CamobNo" tabindex="27"
                                class="form-control CamobNomobNo" id="CamobNo">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <label class="col-md-3 col-form-label"
                            for="password">Address</label>
                            <div class="col-md-9
                            ">
                            <input type="text" name="CaAddress" tabindex="28"
                            class="form-control CaAddress" id="CaAddress">
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
</div> <!-- end card body-->
</div>
<div class="col-xl-6" style="border: 1px solid #676f77;">
    <div class="row">
        <h4 class="main-title p-1 text-center">Consignee Details</h4>
        <div id="basicwizard">
            <div class="tab-content b-0 mb-0">
                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                    <div class="row pl-pr mt-1">
                        <div class="col-12" id="SameConsignee">
                            <div class="row">
                                <label class="col-md-5 col-form-label" for="password">Consignee same as Consignor </label>
                                <div class="col-md-7
                                mt-1">
                                <input type="checkbox" name="sameAsConsignor" tabindex="29" class="sameAsConsignor"
                                id="sameAsConsignor">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-b-1">
                        <div class="row">
                            <label class="col-md-3 col-form-label" for="password">Consignee
                                Name<span class="error">*</span></label>
                                <div class="col-md-9
                                ">
                                <input type="text" name="ConsigneeName" tabindex="30"
                                class="form-control ConsigneeName" id="ConsigneeName">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-b-1">
                        <div class="row">
                            <label class="col-md-3 col-form-label" for="password">GST Number</label>
                            <div class="col-md-9
                            ">
                            <input type="text" name="CoGStNo" tabindex="31"
                            class="form-control CoGStNo" id="CoGStNo">
                        </div>
                    </div>
                </div>

                <div class="col-12 m-b-1">
                    <div class="row">
                        <label class="col-md-3 col-form-label" for="password">Mobile No
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="CoMobile" tabindex="32"
                            class="form-control CoMobile" id="CoMobile">
                        </div>
                    </div>
                </div>
                <div class="col-12 m-b-1">
                    <div class="row">
                        <label class="col-md-3 col-form-label"
                        for="password">Address<span class="error">*</span></label>
                        <div class="col-md-9
                        ">
                        <input type="text" name="CoAddress" tabindex="33"
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
<div class="col-xl-12" style="border: 1px solid #676f77;">
    <div class="row">
        <div id="basicwizard" style="width:100%;">
            <div class="tab-content b-0 mb-0">
                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                    <div class="col-12">
                        <div class="row">
                            <table class="table table-bordered table-responsive table-centered mb-0">
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
                                         <select name="Product" tabindex="34"
                                         class="form-control Product selectBox" id="Product">
                                         <option value="">--select--</option> 
                                         @foreach($DocketProduct as $dproduct)
                                         <option value="{{$dproduct->id}}">{{$dproduct->Title}}</option> 
                                         @endforeach
                                     </select>
                                 </td>
                                 <td class="p-1"> 
                                    <select  name="PackingMethod" tabindex="34"
                                    class="form-control PackingMethod selectBox" id="PackingMethod">
                                    <option value="">--select--</option>
                                    @foreach($PackingMethod as $pmethod)
                                    <option value="{{$pmethod->id}}">{{$pmethod->Title}}</option>
                                    @endforeach
                                </select> 
                            </td>
                            <td class="p-1"> <input type="number" step="0.1" name="Pieces" tabindex="35"
                                class="form-control Pieces" id="Pieces"> </td>
                                <td class="p-1">
                                    <input type="number" step="0.1" name="ActualWeight" tabindex="36"
                                    class="form-control ActualWeight" id="ActualWeight">
                                </td>
                                <td class="p-1">
                                    <input type="text" value="N"  step="0.1" name="Volumetric" tabindex="37"
                                    class="form-control Volumetric" id="Volumetric" onchange="checkVolumetric(this.value);">
                                </td>
                                <td>
                                    <input type="number" step="0.1" name="VolumetricWeight" tabindex="38"
                                    class="form-control VolumetricWeight" id="VolumetricWeight" readonly>
                                </td>
                                <td>
                                    <input type="number" step="0.1" name="ChargeWeight" tabindex="39"
                                    class="form-control ChargeWeight" id="ChargeWeight">
                                </td>
                            </tr>


                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="p-1"> 
                                    <Textarea class="form-control remark"
                                    placeholder="Remark"  tabindex="40"  name="remark" id="remark"></Textarea>
                                </td>

                                <td colspan="2" class="p-1">
                                    <div class="row">
                                      <label class="col-md-4 col-form-label text-end"
                                      for="password">Booked By<span class="error">*</span></label>
                                      <div class="col-md-8
                                      ">
                                      <select name="BookedBy" tabindex="41"
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

                        <input type="text" name="EmployeeName" tabindex="42"
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
<div class="col-xl-12" style="border: 1px solid #676f77;">  
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
                                        <th class="p-1">Description<span class="error">*</span></th>
                                        <th class="p-1">Amount<span class="error">*</span></th>
                                        <th class="p-1">EWB Number</th>
                                        <th class="p-1">EWB Date</th>
                                        <th class="p-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="getRows">
                                    <tr>
                                        <td class="table-user p-1">
                                            <select name="DocketData[0][InvType]" tabindex="43"
                                            class="form-control InvType" id="InvType0">
                                            <option value="">--select--</option>
                                            @foreach($DocketInvoiceType as $DocketInvType)
                                            <option value="{{$DocketInvType->id}}">{{$DocketInvType->Title}}</option>
                                            @endforeach
                                        </select>  
                                    </td>
                                    <td class="p-1"> <input type="text" name="DocketData[0][InvNo]" tabindex="44"
                                        class="form-control InvNo" id="InvNo0"> </td>
                                        <td class="p-1"> <input type="text" name="DocketData[0][InvDate]" tabindex="45"
                                            class="form-control InvDate datepickerOne" id="InvDate0"> </td>
                                            <td style="min-width:250px;" class="p-1">

                                                <select name="DocketData[0][Description]" tabindex="46"
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
                                                                        <input type="number" step="0.1" name="DocketData[0][Amount]" tabindex="47"
                                                                        class="form-control Amount" id="Amount0">
                                                                    </td>
                                                                    <td class="p-1">
                                                                        <input type="text" name="DocketData[0][EWBNumber]" tabindex="48"
                                                                        class="form-control EWBNumber" id="EWBNumber0">
                                                                    </td>
                                                                    <td class="p-1">
                                                                        <input type="text" name="DocketData[0][EWBDate]" tabindex="49"
                                                                        class="form-control EWBDate datepickerOne" id="EWBDate0">
                                                                    </td>

                                                                    <td class="p-1">
                                                                     <input onclick="addMore();" type="button" tabindex="50" value="Add Item" class="form-control btn btn-primary">
                                                                 </td>
                                                             </tr>


                                                         </tbody>

                                                     </table>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row text-end">
                                            <div class="col-md-12 mt-1 mb-1">
                                                <input id="prevSubmit" type="button" class="btn btn-primary" value="submit" onclick="submitAllData();" tabindex="51">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <th>#SN</th>
                    <th>Measurement</th>
                    <th>Length<span class="error">*</span></th>
                    <th>Width<span class="error">*</span></th>
                    <th>Height<span class="error">*</span></th>
                    <th>Quantity<span class="error">*</span></th>
                    <th>Actual Weight  (Per Piece)<span class="error">*</span></th>
                    <th>ADD MORE</th>

                </tr>
            </thead>
            <tbody id="getAppendVolumetric">
                <tr>
                    <td> 1 </td>
                    <td class="table-user">
                        <select name="Packing" tabindex="30" class="form-control Packing" id="Packing0">
                          <option value="INCH">INCH</option>
                          <option value="CM">CM</option>
                      </select> 

                  </td>
                  <td> 

                    <input type="number" step="0.1" name="lenght"  class="form-control lenght" id="lenght0">
                </td>
                <td> <input type="number" step="0.1" name="width"  class="form-control width" id="width0"> </td>
                <td>
                    <input type="number" step="0.1" name="height"  class="form-control height" id="height0">
                </td>
                <td>
                    <input onkeyup="calculateSingleVol('0');" type="number"  step="0.1" name="qty"  class="form-control qty" id="qty0">
                </td>
                <td>
                    <input readonly type="number" step="0.1" name="VloumeActualWeight"  class="form-control VloumeActualWeight" id="VloumeActualWeight0">
                    <input type="hidden" step="0.1" name="final"  class="form-control final" id="final0">
                </td>

                <td class="p-1">
                    <input onclick="addMoreVolumetric();" type="button" tabindex="50" value="Add Item" class="form-control btn btn-primary">
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
    <button onclick="closeVol()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" onclick="calculateVolume()">Save</button>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalTwo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Customer Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body ">



        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                 <input type="checkbox" name="archive_data" class="archive_data" id="archive_data"> From Archive Data
             </div>
             <h4 class="page-title">CUSTOMER DETAILS</h4>
         </div>
     </div>


     <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div id="basicwizard">
                    <div class="tab-content b-0 mb-0">
                        <div class="tab-pane active show" id="basictab1" role="tabpanel">

                           <table style="width: 100%;" class="table-bordered">
                               <tr>
                                <td style="text-align: right;padding:5px;width: 20%;">
                                    Customer Code
                                </td>
                                <td id="custcode" style="text-align: left;padding:5px;width: 30%;">
                                </td>
                                <td style="text-align: right;padding:5px;width: 20%;">
                                    Customer Name
                                </td>
                                <td id="custname" style="text-align: left;padding:5px;width: 30%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;padding:5px;">
                                    GST Registered Name
                                </td>
                                <td id="gstname" style="text-align: left;padding:5px;">
                                </td>
                                <td style="text-align: right;padding:5px;">
                                    Parent Customer
                                </td>
                                <td id="parentcustomer" style="text-align: left;padding:5px;">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;padding:5px;">
                                    GST No
                                </td>
                                <td id="gstNo" style="text-align: left;padding:5px;">
                                </td>
                                <td style="text-align: right;padding:5px;">
                                    Pan No
                                </td>
                                <td  id="panno" style="text-align: left;padding:5px;">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;padding:5px;">
                                    Address 1
                                </td>
                                <td id="add_one"  style="text-align: left;padding:5px;">
                                </td>
                                <td style="text-align: right;padding:5px;">
                                    Address2
                                </td>
                                <td id="add_two" style="text-align: left;padding:5px;">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;padding:5px;">
                                    City
                                </td>
                                <td id="city" style="text-align: left;padding:5px;">
                                </td>
                                <td style="text-align: right;padding:5px;">
                                    Pincode
                                </td>
                                <td id="pincode" style="text-align: left;padding:5px;">
                                </td>
                            </tr>
                        </table>

                        <div class="table-responsive a">
                            <table class="table table-bordered table-centered mb-1 mt-1">
                                <thead>
                                    <tr>
                                        <th colspan="11" class="text-center main-title text-dark p-1">CONTACT DETAILS</th>
                                    </tr>
                                    <tr class="main-title text-dark">
                                        <th class="p-1">SL#</th>
                                        <th class="p-1">Contact Type</th>
                                        <th class="p-1">Contact Person</th>
                                        <th class="p-1">Mobile No</th>
                                        <th class="p-1">Personal NO</th>
                                        <th class="p-1">Phone</th>
                                        <th class="p-1">Email</th>
                                        <th class="p-1">Address 1</th>
                                        <th class="p-1">Address 2</th>
                                        <th class="p-1">City Name</th>
                                        <th class="p-1">Pincode</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                 <tr>
                                    <td class="p-1">1</td>
                                    <td class="p-1"> OWNER </td>
                                    <td class="p-1"> 
                                    </td>
                                    <td class="p-1">

                                    </td>
                                    <td class="p-1"></td>
                                    <td class="p-1"></td>
                                    <td class="p-1"> 

                                    </td>
                                    <td class="p-1"></td>
                                    <td class="p-1"></td>
                                    <td class="p-1"></td>
                                    <td class="p-1"></td>
                                </tr>

                            </tbody>
                        </table> 
                    </div>

                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>     
</div>




</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" >Save</button>
</div>
</div>
</div>
</div>

<script src="{{url('public/js/custome.js')}}"></script>
<script>
    document.getElementById('BookingType').addEventListener('click', function () {
        this.style.background = 'pink'
    });

    
    document.getElementById('BookingType').addEventListener('blur', function () {
        this.removeAttribute('style');
    });
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });
    $('.datepickerOne').val('{{date("d-m-Y")}}');
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
        if(data=='<option value="">--select--</option>'){
            $('.ConsignorNamesearch').html('<option>--select--</option>');
        }
        else{
           $('.ConsignorNamesearch').html(data);
       }

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
function getDocketDetails(Docket,BranchId)
{
    if($('#DeliveryType').val()=='')
    {
        alert('Please Select Delivery Type');
        $('.Docket').val('');
        $('.Docket').focus();
        $('.DeliveryType').val('').trigger('change');
        return false;
    }
    var DeliveryType=$('#DeliveryType').val();
    var base_url = '{{url('')}}';
    $.ajax({
     type: 'POST',
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
   },
   url: base_url + '/CheckDocketIsAvalible',
   cache: false,
   data: {
     'Docket':Docket,'BranchId':BranchId,'DeliveryType':DeliveryType
 },
 success: function(data) {
    const obj = JSON.parse(data);
    if(obj.status=='false')
    {
        alert(obj.message)
        $('.Docket').val('');
        $('.Docket').focus();
        $('.DeliveryType').val('').trigger('change');
        $('.rtoEnable').text('');
        return false;
    }
    if(obj.status=='true' && obj.isRto !=null)
    {
     $('.rtoEnable').text('Give Docket Is RTO Refrence Docket Is: '+obj.IniteDocket);
 }
 else{
    $('.rtoEnable').text('');
}

}
});
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
    <select name="DocketData[`+count+`][InvType]" tabindex="52"
    class="form-control InvType select2Box" id="InvType`+count+`">
    <option value="">--select--</option>
    <option value="1">INVOICE</option>
    <option value="2">DECLARATION</option>
    </select>
    </td>
    <td> <input type="text" name="DocketData[`+count+`][InvNo]" tabindex="53"
    class="form-control InvNo" id="InvNo`+count+`"> </td>
    <td> <input type="text" name="DocketData[`+count+`][InvDate]" tabindex="54"
    class="form-control InvDate datepickerOne" id="InvDate`+count+`"> </td>
    <td>
    <select name="DocketData[`+count+`][Description]" tabindex="55"
    class="form-control Description select2Box" id="Description`+count+`">
    <option value="">--select--</option>
    @foreach($contents as $key)
    <option value="{{$key->Contents}}">{{$key->Contents}}</option>
    @endforeach
    </select> 

    </td>
    <td>
    <input type="number" step="0.1" name="DocketData[`+count+`][Amount]" tabindex="56"
    class="form-control Amount" id="Amount`+count+`">
    </td>
    <td>
    <input type="text" name="DocketData[`+count+`][EWBNumber]" tabindex="57"
    class="form-control EWBNumber" id="EWBNumber`+count+`">
    </td>
    <td>
    <input type="text" name="DocketData[`+count+`][EWBDate]" tabindex="58"
    class="form-control EWBDate datepickerOne" id="EWBDate`+count+`">
    </td>

    <td>

    <input onclick="remove(`+count+`);" type="button" tabindex="59" value="Cancel" class="form-control">

    </td></tr>
    `;
    $("#getRows").append(rowStructure);
    $('.datepickerOne').datepicker({
       format: 'dd-mm-yyyy',
       autoclose: true
   });
   $('.select2Box').select2();
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

if($("#Customer").val()==""){
    alert('Please Select Customer');
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

if( $("#InvNo0").val()=='')
{
    alert('Please Enter Invoice No');
    return false;
}
if( $("#InvDate0").val()=='')
{
    alert('Please Select Invoice Date');
    return false;
}
if( $("#Description0").val()=='')
{
    alert('Please Enter Description');
    return false;
}
if( $("#Amount0").val()=='')
{
    alert('Please Enter Amount');
    return false;
}

var Typelenght= $(".InvType").length;

for(var ini=0; ini < Typelenght; ini++){
   if( $("#InvNo"+ini).val()=='')
   {
    alert('Please Enter Invoice No');
    return false;
}
if( $("#InvDate"+ini).val()=='')
{
    alert('Please Select Invoice Date');
    return false;
}
if( $("#Description"+ini).val()=='')
{
    alert('Please Enter Description');
    return false;
}
if( $("#Amount"+ini).val()=='')
{
    alert('Please Enter Amount');
    return false;
}

}

var BookingDate =  $("#BookingDate").val();
var BookingTime = $("#BookingTime").val();
var BookingBranch = $("#BookingBranch").val();
var BookingType = $("#BookingType").val();
var Docket = $("#Docket").val();
var Origin = $("#Origin").val();
var Destination = $("#Destination").val();
var Consignor = $("#Consignor").val();
var ConsigneeName = $("#ConsigneeName").val();
var CoAddress = $("#CoAddress").val();
var Product = $("#Product").val();
var PackingMethod = $("#PackingMethod").val();
var Pieces = $("#Pieces").val();
var ActualWeight = $("#ActualWeight").val();
var Volumetric = $("#Volumetric").val();
var ChargeWeight = $("#ChargeWeight").val();


var DeliveryType = $("#DeliveryType").val();
var Dacc = $("input[name=Dacc]:checked").val();
var Dod = $("input[name=Dod]:checked").val();
var DODAmount = $("#DODAmount").val();
var Cod = $("input[name=Cod]:checked").val();
var CodAmount = $("#CodAmount").val();
var ShipmentNo = $("#ShipmentNo").val();
var PoNumber = $("#PoNumber").val();
var OriginArea = $("#OriginArea").val();
var DestinationArea = $("#DestinationArea").val();
var Customer = $("#Customer").val();
var Mode = $("#Mode").val();
var Consignor = $("#Consignor").val();
var AddConsignor =$("input[name=AddConsignor]:checked").val();

var consignerName = $("#consignerName").val();
//var AddConsignor = $("#AddConsignor").val();
var AGstNo = $("#AGstNo").val();
var CaGstNo = $("#CaGstNo").val();
var CamobNo = $("#CamobNo").val();

var CaAddress = $("#CaAddress").val();
var sameAsConsignor = $("#sameAsConsignor").val();
var CoGStNo = $("#CoGStNo").val();
var CoMobile = $("#CoMobile").val();
var BookingBranchId  =   $("input[name='BookingBranchId']").val();
var BookedBy=  $("#BookedBy").val();
var remark=$("#remark").val();
var EmployeeName=$("#EmployeeName").val();


var VolumetricWeight = $("#VolumetricWeight").val();

var base_url = '{{url('')}}';
var formData = new FormData();
formData.append('BookingDate',BookingDate);
formData.append('BookingTime',BookingTime);
formData.append('BookingBranch',BookingBranch);
formData.append('BookingType',BookingType);
formData.append('Docket',Docket);
formData.append('Origin',Origin);
formData.append('Destination',Destination);
formData.append('Consignor',Consignor);
formData.append('ConsigneeName',ConsigneeName);
formData.append('CoAddress',CoAddress);
formData.append('Product',Product);
formData.append('PackingMethod',PackingMethod);
formData.append('Pieces',Pieces);
formData.append('ActualWeight',ActualWeight);
formData.append('Volumetric',Volumetric);
formData.append('ChargeWeight',ChargeWeight);

formData.append('DeliveryType',DeliveryType);
if($("input[name=Dacc]").prop('checked')==true){
    formData.append('Dacc',Dacc);
 }
 if($("input[name=Dod]").prop('checked')==true){
 formData.append('Dod',Dod);
 }
formData.append('DODAmount',DODAmount);
if($("input[name=Cod]").prop('checked')==true){
 formData.append('Cod',Cod);
 }
formData.append('CodAmount',CodAmount);
formData.append('ShipmentNo',ShipmentNo);
formData.append('PoNumber',PoNumber);

formData.append('OriginArea',OriginArea);
formData.append('DestinationArea',DestinationArea);
formData.append('Customer',Customer);
formData.append('Mode',Mode);
formData.append('Consignor',Consignor);
if($("input[name=AddConsignor]").prop('checked')==true){
    formData.append('AddConsignor',AddConsignor);
}
formData.append('consignerName',consignerName);
formData.append('AGstNo',AGstNo);
formData.append('CaGstNo',CaGstNo);

formData.append('CamobNo',CamobNo);
formData.append('CaAddress',CaAddress);
formData.append('sameAsConsignor',sameAsConsignor);
formData.append('CoGStNo',CoGStNo);
formData.append('CoMobile',CoMobile);
formData.append('BookingBranchId',BookingBranchId);
formData.append('BookedBy',BookedBy);

formData.append('remark',remark);
formData.append('EmployeeName',EmployeeName);

var Packing= $(".Packing").length;

for(var Starter=0; Starter < Packing; Starter++){
formData.append('VolumetricColl['+Starter+'][Packing]', $("#Packing"+Starter).val());
formData.append('VolumetricColl['+Starter+'][lenght]',$("#lenght"+Starter).val());
formData.append('VolumetricColl['+Starter+'][width]',$("#width"+Starter).val());
formData.append('VolumetricColl['+Starter+'][height]', $("#height"+Starter).val());
formData.append('VolumetricColl['+Starter+'][qty]',$("#qty"+Starter).val());
formData.append('VolumetricColl['+Starter+'][VloumeActualWeight]',$("#VloumeActualWeight"+Starter).val());
formData.append('VolumetricColl['+Starter+'][final]',$("#final"+Starter).val());
}

formData.append('VolumetricWeight',VolumetricWeight);
var Typelenght= $(".InvType").length;

for(var ini=0; ini < Typelenght; ini++){
    formData.append('DocketData['+ini+'][InvType]',$("#InvType"+ini).val());
    formData.append('DocketData['+ini+'][InvNo]',$("#InvNo"+ini).val());
    formData.append('DocketData['+ini+'][InvDate]',$("#InvDate"+ini).val());
    formData.append('DocketData['+ini+'][Description]',$("#Description"+ini).val());
    formData.append('DocketData['+ini+'][Amount]',$("#Amount"+ini).val());

    formData.append('DocketData['+ini+'][EWBNumber]',$("#EWBNumber"+ini).val());
    formData.append('DocketData['+ini+'][EWBDate]',$("#EWBDate"+ini).val());

}

$.ajax({
 type: 'POST',
 headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
},
url: base_url + '/postSubmitCreditBoocking',
cache: false,
processData:false,
contentType:false,
data: formData,
success: function(data) {
    alert("Booked Successfully");
        location.reload();
}
});
    //$('#subForm').submit();

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
    var Packing= $(".Packing").length;
    for(var Starter=0; Starter < Packing; Starter++){
        if($('#lenght'+Starter).val()=='')
        {
            alert('Please Enter Lenght');
            return false;
        }
        if($('#lenght'+Starter).val()=='')
        {
            alert('Please Enter Lenght');
            return false;
        }
        if($('#height'+Starter).val()=='')
        {
            alert('Please Enter height');
            return false;
        }
        if($('#qty'+Starter).val()=='')
        {
            alert('Please Enter Qty');
            return false;
        }
    }

var MakeSumOfCal =0;
for(var Starter=0; Starter < Packing; Starter++){
    var lenght= $('#lenght'+Starter).val()
    var width= $('#width'+Starter).val();
    var height=$('#height'+Starter).val();
    var qty=$('#qty').val();
    var Packing = $("#Packing"+Starter).val();
    if(Packing=="CM"){
        var volu= (lenght*width*height)/5000*parseInt(qty);
    }
    else{
    var volu=((lenght*width*height)/1728)*6*parseInt(qty);
    }
   
}
$(".VloumeActualWeight").each(function(i){
        MakeSumOfCal += parseFloat($(this).val());
       
});
console.log(MakeSumOfCal);
$('.VolumetricWeight').val(MakeSumOfCal.toFixed(4));
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

function OpenCustomerDetails(){
    if($("#Customer").val()==''){
        alert('No Customer Selected');
    }
    else{
     var CustId= $("#Customer option:selected").val();

     var base_url = '{{url('')}}';
     $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getCustomerDetailsView',
       cache: false,
       data: {
         'CustId':CustId
     },
     success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1){ 
            $("#exampleModalTwo").modal('show');
            $("#custcode").text(obj.datas.CustomerCode); 
            $("#custname").text(obj.datas.CustomerName);
            if(obj.datas.parent!=null){
                $("#parentcustomer").text(obj.datas.parent.CustomerCode+'~'+obj.datas.parent.CustomerName); 
            }
            $("#gstNo").text(obj.datas.GSTNo); 
            $("#panno").text(obj.datas.PANNo); 
            $("#gstname").text(obj.datas.GSTName);
            if(obj.datas.cust_address!=null){
                $("#add_one").text(obj.datas.cust_address.Address1); 
                $("#add_two").text(obj.datas.cust_address.Address2); 
                $("#pincode").text(obj.datas.cust_address.Pincode);
                $("#city").text(obj.datas.cust_address.City);
            }
            $("#customerName").text(obj.datas.State); 



        }
    }
});


 }

}

function closeVol(){
   $('#VolumetricWeight').focus();  
}

var i=0;
function addMoreVolumetric(){
i++;
var html =`<tr id="VolR`+i+`">
<td> `+parseInt(i+1)+` </td>
<td class="table-user">
    <select name="Packing" tabindex="30" class="form-control Packing" id="Packing`+i+`">
        <option value="INCH">INCH</option>
        <option value="CM">CM</option>
    </select> 

</td>
<td> 
    <input type="number" step="0.1" name="lenght"  class="form-control lenght" id="lenght`+i+`">
</td>
<td> <input type="number" step="0.1" name="width"  class="form-control width" id="width`+i+`"> </td>
<td>
    <input type="number" step="0.1" name="height"  class="form-control height" id="height`+i+`">
</td>
<td>
    <input onkeyup="calculateSingleVol(`+i+`);" type="number"  step="0.1" name="qty"  class="form-control qty" id="qty`+i+`">
</td>
<td>
    <input readonly type="number" step="0.1" name="VloumeActualWeight"  class="form-control VloumeActualWeight" id="VloumeActualWeight`+i+`">
    <input type="hidden" step="0.1" name="final"  class="form-control final" id="final`+i+`">
</td>

<td>
<input onclick="getRemovedVolumetric(`+i+`);" type="button" tabindex="50" value="Cancel" class="form-control btn btn-primary">
</td>
`;

$("#getAppendVolumetric").append(html);
}

function getRemovedVolumetric(Id){
        $("#VolR"+Id).remove();
}


function calculateSingleVol(ID){
    // ID
   // calculateSingleVol
    var lenght= $('#lenght'+ID).val();
    var width= $('#width'+ID).val();
    var height=$('#height'+ID).val();
    var qty=$('#qty'+ID).val();
    var Packing = $("#Packing"+ID).val();
    if(Packing=="CM"){
        var volu= (lenght*width*height)/5000*parseInt(qty);
    }
    else{
    var volu=((lenght*width*height)/1728)*6*parseInt(qty);
    }
    $("#VloumeActualWeight"+ID).val( parseFloat(volu.toFixed(4)));
    $("#final"+ID).val(parseFloat(volu.toFixed(4)));
}


</script>