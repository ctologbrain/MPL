<div class="modal fade model-popup generate-container" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   
                        
                        <div class="main-title">
                        <h5 class="text-center">PICKUP  DETAIL OF :@isset($pickupRequest->OrderNo) {{$pickupRequest->OrderNo}} @endisset </h5>
                        </div>
                       
                   
                    
                    
                     <div class="modal-body" style="padding:0px;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Order No</b>  <input type="hidden" value="{{$pickupRequest->id}}" id="RequestId" name="RequestId">
                                </td>
                                <td style="width: 35%;"> @isset($pickupRequest->OrderNo)  {{$pickupRequest->OrderNo}} @endisset</td>
                                 <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Pickup Date</b>
                                </td>
                                <td style="width: 35%;">&nbsp; @isset($pickupRequest->pickup_date) {{$pickupRequest->pickup_date}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Sale Reference</b>
                                </td>
                                <td style="width: 35%;">&nbsp; @isset($pickupRequest->sale_refere) {{$pickupRequest->sale_refere}} @endisset</td>
                                 <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Reference Name</b>
                                </td>
                                <td style="width: 35%;">&nbsp; @isset($pickupRequest->reference_name) {{$pickupRequest->reference_name}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Customer Name</b>
                                </td>
                                <td style="width: 35%;">&nbsp; @isset($pickupRequest->CustomerDetails->CustomerCode) {{$pickupRequest->CustomerDetails->CustomerCode}} ~ {{$pickupRequest->CustomerDetails->CustomerName}} @endisset</td>
                                 <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Bill To</b>
                                </td>
                                <td style="width: 35%;">&nbsp;@isset($pickupRequest->bill_to) {{$pickupRequest->bill_to}} @endisset</td>
                            </tr>

                        </table>
                        <table style="width: 100%;" class="table-bordered">
                            <thead>
                            <tr class="main-title">
                                <th colspan="2" class="text-center">Pickup Details</th>
                                <th colspan="2" class="text-center">Other Details</th>
                            </tr>
                            </thead>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Store/Warehouse Name</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">@isset($pickupRequest->store_name) {{$pickupRequest->store_name}} @endisset</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Destination Pincode/City</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">@isset($pickupRequest->PincodeDestDetails->CityDetails->PinCode)  {{$pickupRequest->PincodeDestDetails->CityDetails->PinCode}} / {{$pickupRequest->PincodeDestDetails->CityDetails->CityName}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" rowspan="2"><b>Warehouse Address</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" rowspan="2">@isset($pickupRequest->warehouse_address)  {{$pickupRequest->warehouse_address}} @endisset</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Pieces</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;"> @isset($pickupRequest->pieces)  {{$pickupRequest->pieces}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Weight</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;"> @isset($pickupRequest->weight)  {{$pickupRequest->weight}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" ><b>Origin Pincode/City</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" >  @isset($pickupRequest->PincodeOriginDetails->CityDetails->PinCode)  {{$pickupRequest->PincodeOriginDetails->CityDetails->PinCode}} / {{$pickupRequest->PincodeOriginDetails->CityDetails->CityName}} @endisset</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Content</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">  @isset($pickupRequest->Contents)  {{$pickupRequest->contentDetails->Contents}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" ><b>Contact Person Name</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" >  @isset($pickupRequest->contactPersonName)  {{$pickupRequest->contactPersonName}} @endisset</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Remarks</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">  @isset($pickupRequest->remark)  {{$pickupRequest->remark}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" ><b>Mobile Number</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" >  @isset($pickupRequest->mobile_no)  {{$pickupRequest->mobile_no}} @endisset</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;border-bottom: none !important;border-right: none  !important;"><b></b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;border-bottom: none;border-right: none;"></td>
                            </tr>
                        </table>
                        <div class="row pl-pr mt-1">
                            <label class="col-md-2" for="status"><b>Status</b></label>
                            <div class="col-md-3">
                                <select onchange="openOptions(this.value);" class="form-control status selectBox" name="status" id="status">
                                <option value="">--Status--</option>
                                <option value="1" @if(request()->get('status') !='' && request()->get('status')==1){{'selected'}}@endif>ASSIGN</option>
                                <option value="2" @if(request()->get('status') !='' && request()->get('status')==2){{'selected'}}@endif>PICK</option>
                                <option value="3" @if(request()->get('status') !='' && request()->get('status')==3){{'selected'}}@endif>UNPICK</option>
                                <option value="4" @if(request()->get('status') !='' && request()->get('status')==4){{'selected'}}@endif>CANCEL</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-pr mt-1" id="docketBox" style="display:none;">
                            <label class="col-md-2" for="docket"><b>Docket No</b></label>
                            <div class="col-md-3">
                            <input type="number" class="form-control"  id="docket" name="docket">
                            </div>
                        </div>
                        <div class="row pl-pr mt-1" id="assign_toBox"  style="display:none;">
                            <label class="col-md-2" for="assign_to"><b>Assign To</b></label>
                            <div class="col-md-8">
                            
                              <select class="form-control assign_to selectBox" name="assign_to" id="assign_to">
                              <option value="">--Status--</option>
                              @foreach($employee as $key)
                              <option value="{{$key->id}}">{{$key->EmployeeCode}} ~{{$key->EmployeeName}} </option>
                              @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row pl-pr mt-1"  id="nextAssignDateBox"  style="display:none;">
                            <label class="col-md-2" for="nextAssignDate"><b>Next Pickup Date</b></label>
                            <div class="col-md-3">
                              <input type="text" class="form-control datepickerOne"  id="nextAssignDate" name="nextAssignDate">
                            </div>
                        </div>
                        <div class="row pl-pr mt-1" id="ReasonBox"  style="display:none;">
                            <label class="col-md-2" for="Reason"><b>Reason</b></label>
                            <div class="col-md-8">
                              <input type="text" class="form-control"  id="Reason" name="Reason">
                            </div>
                        </div>
                        <div class="row pl-pr mt-1" id="uploadImageBox"  style="display:none;">
                            <label class="col-md-2" for="uploadImage"><b>Upload Image</b></label>
                            <div class="col-md-3">
                              <input type="file" class="form-control"  id="uploadImage" name="uploadImage">
                            </div>
                        </div>

                        <div class="row pl-pr mt-1 mb-1">
                            <label class="col-md-2" for="status"><b>Remarks</b></label>
                            <div class="col-md-8">
                                <textarea class="reamrks form-control" name="remarks" id="remarks">
                                    
                                </textarea>
                            </div>
                        </div>

            
            <div class="modal-footer">
                <div class="col-12 text-center">
                <button onclick="SubmitDetails();"  type="button" class="btn btn-primary" >Save</button>
                <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
               
            </div>

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2({
            dropdownParent: $('#routeOrderModel')
        });

        $('#routeOrderModel').modal('toggle');
       
        $('#routeOrderModel').on('shown.bs.modal', function(e) {
            $('.datepickerOne').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true
                });
            $('.datepickerOne').css('z-index','1600');
            });
        

    </script>