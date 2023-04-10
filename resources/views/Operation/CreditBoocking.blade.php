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
            </div>
        </div>
    </div>
    @if (session('status'))
     <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Success - </strong>  {{ session('status','') }}
    </div>
    @endif
<form method="POST" action="{{url('postSubmitCreditBoocking')}}" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="userName">Booking Date<span
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
                                            <label class="col-md-3 col-form-label" for="password">Booking Branch<span
                                                    class="error">*</span></label>
                                            <div class="col-md-9
                                            ">
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
                                            <label class="col-md-3 col-form-label" for="userName">Booking Type<span
                                                    class="error">*</span></label>
                                            <div class="col-md-9
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
                                            <label class="col-md-3 col-form-label" for="password">Delivery Type</label>
                                            <div class="col-md-9
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
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="userName">Docket Number<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-9
                                                  ">
                                                <input type="text" name="Docket" tabindex="6"
                                                    class="form-control Docket" id="Docket" onchange="getDocketDetails(this.value,'{{$Offcie->id}}');">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                           
                                        <label class="col-md-3 col-form-label" for="userName"></label>
                                                  <div class="col-md-9 rtoEnable error">
                                       </div>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="userName">DACC</label>
                                            <div class="col-md-9 mt-1">
                                                <input type="checkbox" name="Dacc" tabindex="7" class="Dacc" id="Dacc">&nbsp;
                                                 <small
                                                style="font-size: 9px;font-weight: 600;">DACC: Delivery Against
                                                Consignee Copy</small>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="userName">DOD</label>
                                            <div class="col-md-9 d-flex justify-content-between align-items-center">
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
                                            <label class="col-md-3 col-form-label" for="userName">Reference/Shipment
                                                Number</label>
                                            <div class="col-md-9
                                            ">
                                                <input type="text" name="ShipmentNo" tabindex="12"
                                                    class="form-control ShipmentNo" id="ShipmentNo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">PO Number</label>
                                            <div class="col-md-9
                                            ">
                                                <input type="number" step="0.1"  name="PoNumber" tabindex="13"
                                                    class="form-control PoNumber" id="PoNumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">Origin<span
                                                    class="error">*</span></label>
                                            <div class="col-md-9
                                            ">
                                                 <select name="Origin" tabindex="14"
                                                    class="form-control Origin selectBox" id="Origin">
                                                <option value="">Select</option>
                                                @foreach($pincode as $pincodes)
                                                <option value="{{$pincodes->id}}" @if(isset($Offcie->Pincode) && $Offcie->Pincode==$pincodes->id){{'selected'}}@endif>{{$pincodes->PinCode}} ~ {{$pincodes->Code}} : {{$pincodes->CityName}}</option>
                                                @endforeach
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">Destination<span
                                                    class="error">*</span></label>
                                            <div class="col-md-9
                                            ">
                                              <select name="Destination" tabindex="15" class="form-control Destination selectBox" id="Destination">
                                                <option value="">Select</option>
                                                @foreach($destpincode as $depincodes)
                                                <option value="{{$depincodes->id}}">{{$depincodes->PinCode}} ~ {{$depincodes->Code}} : {{$depincodes->CityName}}</option>
                                                @endforeach
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">Origin Area
                                                Name</label>
                                            <div class="col-md-9
                                            ">
                                                <input type="text" name="OriginArea" tabindex="16"
                                                    class="form-control OriginArea" id="OriginArea" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">Destination Area
                                                Name</label>
                                            <div class="col-md-9
                                            ">
                                                <input type="text" name="DestinationArea" tabindex="17"
                                                    class="form-control DestinationArea" id="DestinationArea" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">Customer Name<span
                                                    class="error">*</span></label>
                                            <div class="col-md-9
                                            ">
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
                                            <label class="col-md-3 col-form-label" for="password">Mode</label>
                                            <div class="col-md-9
                                            ">
                                              
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
               
            <div class="row" >
                <div class="col-xl-6" style="border: 1px solid #676f77;">
                   <h4 class="alert alert-secondary text-center">Consignor</h4>
                            <div id="basicwizard">
                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12" id="ConsignorOne">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">Consignor
                                                        Name<span class="error">*</span></label>
                                                    <div class="col-md-6">
                                                      <select name="Consignor" tabindex="20"  class="form-control Consignor selectBox consignorDet" id="Consignor" onchange="getConsignerDetails(this.value)">
                                                   </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <strong>add &nbsp;</strong><input type="checkbox" class="AddConsignor" name="AddConsignor" id="AddConsignor">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-12 consignorSelection" id="ConsignorTwo"> 
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">Consignor
                                                        Name<span class="error">*</span></label>
                                                    <div class="col-md-6">
                                                      <input type="text" class="form-control" name="consignerName">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <strong>remove &nbsp;</strong><input type="checkbox" class="AddConsignor" name="AddConsignor" id="AddConsignor">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-6 col-form-label" for="password">Activate GST
                                                        Number & Mobile No & Address </label>
                                                    <div class="col-md-6 mt-1">
                                                        <input type="checkbox" name="AGstNo" tabindex="21" class="CaAGstNo"
                                                            id="AGstNo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">GST Number
                                                    </label>
                                                    <div class="col-md-9
                                                    ">
                                                        <input type="text" name="CaGstNo" tabindex="22"
                                                            class="form-control CaGstNo" id="CaGstNo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">Mobile No
                                                    </label>
                                                    <div class="col-md-9
                                                    ">
                                                        <input type="text" name="CamobNo" tabindex="23"
                                                            class="form-control CamobNomobNo" id="CamobNomobNo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label"
                                                        for="password">Address</label>
                                                    <div class="col-md-9
                                                    ">
                                                        <input type="text" name="CaAddress" tabindex="24"
                                                            class="form-control CaAddress" id="CaAddress">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div> <!-- end card body-->
                   
                <div class="col-xl-6" style="border: 1px solid #676f77;">
                   
                            <h4 class="alert alert-secondary text-center">Consignee Details</h4>
                            <div id="basicwizard">
                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                        <div class="row">
                                        <div class="col-12" id="SameConsignee">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">Consignee same as Consignor </label>
                                                    <div class="col-md-9
                                                    mt-1">
                                                        <input type="checkbox" name="sameAsConsignor" tabindex="21" class="sameAsConsignor"
                                                            id="sameAsConsignor">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">Consignee
                                                        Name<span class="error">*</span></label>
                                                    <div class="col-md-9
                                                    ">
                                                        <input type="text" name="ConsigneeName" tabindex="25"
                                                            class="form-control ConsigneeName" id="ConsigneeName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">GST Number</label>
                                                    <div class="col-md-9
                                                    ">
                                                    <input type="text" name="CoGStNo" tabindex="26"
                                                            class="form-control CoGStNo" id="CoGStNo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="password">Mobile No
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="CoMobile" tabindex="27"
                                                            class="form-control CoMobile" id="CoMobile">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label"
                                                        for="password">Address<span class="error">*</span></label>
                                                    <div class="col-md-9
                                                    ">
                                                        <input type="text" name="CoAddress" tabindex="28"
                                                            class="form-control CoAddress" id="CoAddress">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>


                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                 
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered alert-secondary table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="15">Product<span class="error">*</span></th>
                                                    <th width="15">Packing Method<span class="error">*</span></th>
                                                    <th width="15">Pieces<span class="error">*</span></th>
                                                    <th width="15">Actual Weight<span class="error">*</span></th>
                                                    <th width="10">Volumetric<span class="error">*</span></th>
                                                    <th width="15">Volumetric Weight</th>
                                                    <th width="15">Charge Weight<span class="error">*</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="table-user">
                                                       <select name="Product" tabindex="29"
                                                            class="form-control Product selectBox" id="Product">
                                                               <option value="">--select--</option> 
                                                               @foreach($DocketProduct as $dproduct)
                                                               <option value="{{$dproduct->id}}">{{$dproduct->Title}}</option> 
                                                               @endforeach
                                                            </select>
                                                    </td>
                                                    <td> 
                                                       
                                                            <select  name="PackingMethod" tabindex="30"
                                                            class="form-control PackingMethod selectBox" id="PackingMethod">
                                                                <option value="">--select--</option>
                                                                @foreach($PackingMethod as $pmethod)
                                                                <option value="{{$pmethod->id}}">{{$pmethod->Title}}</option>
                                                                @endforeach
                                                            </select> 
                                                        </td>
                                                    <td> <input type="number" step="0.1" name="Pieces" tabindex="31"
                                                            class="form-control Pieces" id="Pieces"> </td>
                                                    <td>
                                                        <input type="number" step="0.1" name="ActualWeight" tabindex="32"
                                                            class="form-control ActualWeight" id="ActualWeight">
                                                    </td>
                                                    <td>
                                                        <input type="text" value="N"  step="0.1" name="Volumetric" tabindex="33"
                                                            class="form-control Volumetric" id="Volumetric" onchange="checkVolumetric(this.value);">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.1" name="VolumetricWeight" tabindex="34"
                                                            class="form-control VolumetricWeight" id="VolumetricWeight" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.1" name="ChargeWeight" tabindex="35"
                                                            class="form-control ChargeWeight" id="ChargeWeight">
                                                    </td>
                                                </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4"> 
                                                        <Textarea class="form-control remark"
                                                            placeholder="Remark"  tabindex="36"  name="remark" id="remark"></Textarea>
                                                        </td>

                                                    <td colspan="2">
                                                      
                                                      <select name="BookedBy" tabindex="37"
                                                            class="form-control BookedBy selectBox" id="BookedBy">
                                                            <option value="">--select--</option>
                                                            @foreach($employee as $employees)
                                                            <option value="{{$employees->id}}" @if(isset($Offcie->EmpId) && $Offcie->EmpId==$employees->id){{'selected'}} @endif>{{$employees->EmployeeCode}} ~ {{$employees->EmployeeName}}</option>
                                                            @endforeach
                                                         </select>
                                                        </td>
                                                    <td colspan="1">

                                                        <input type="text" name="EmployeeName" tabindex="38"
                                                            class="form-control EmployeeName" id="EmployeeName"
                                                            placeholder="Employee Name (FOC) ">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                   
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered alert-secondary table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Invoice No<span class="error">*</span></th>
                                                    <th>Invoice Date<span class="error">*</span></th>
                                                    <th>Description<span class="error">*</span></th>
                                                    <th>Amount<span class="error">*</span></th>
                                                    <th>EWB Number</th>
                                                    <th>EWB Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="getRows">
                                                <tr>
                                                    <td class="table-user">
                                                        <select name="DocketData[0][InvType]" tabindex="39"
                                                            class="form-control InvType" id="InvType0">
                                                            <option value="">--select--</option>
                                                            @foreach($DocketInvoiceType as $DocketInvType)
                                                            <option value="{{$DocketInvType->id}}">{{$DocketInvType->Title}}</option>
                                                            @endforeach
                                                          </select>  
                                                    </td>
                                                    <td> <input type="text" name="DocketData[0][InvNo]" tabindex="40"
                                                            class="form-control InvNo" id="InvNo0"> </td>
                                                    <td> <input type="text" name="DocketData[0][InvDate]" tabindex="41"
                                                            class="form-control InvDate datepickerOne" id="InvDate0"> </td>
                                                    <td>
                                                        <input type="text" name="DocketData[0][Description]" tabindex="42"
                                                            class="form-control Description" id="Description0">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.1" name="DocketData[0][Amount]" tabindex="43"
                                                            class="form-control Amount" id="Amount0">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="DocketData[0][EWBNumber]" tabindex="44"
                                                            class="form-control EWBNumber" id="EWBNumber0">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="DocketData[0][EWBDate]" tabindex="45"
                                                            class="form-control EWBDate datepickerOne" id="EWBDate0">
                                                    </td>
                                                   
                                                    <td>
                                                       <input onclick="addMore();" type="button" tabindex="46" value="Add Item" class="form-control">
                                                    </td>
                                                </tr>


                                            </tbody>
                                            
                                        </table>


                                    </div>
                                    <div class="row text-end">
                                        <div class="col-md-12 mt-4">
                                                <input id="prevSubmit" type="button" class="btn btn-primary" value="submit" onclick="submitAllData();" >
                                            </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
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
   <script>
    document.getElementById('BookingType').addEventListener('click', function () {
        this.style.background = 'pink'
      });

    
      document.getElementById('BookingType').addEventListener('blur', function () {
        this.removeAttribute('style');
      });
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
                <input type="text" name="DocketData[`+count+`][Description]" tabindex="42"
                 class="form-control Description" id="Description`+count+`">
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
                 format: 'yyyy-mm-dd',
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
         

         </script>