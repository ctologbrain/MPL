<div class="modal fade model-popup generate-container" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   
                        
                        <div class="main-title">
                        <h5 class="text-center">PICKUP  DETAIL OF : {{$pickupRequest->OrderNo}} </h5>
                        </div>
                       
                   
                    
                    
                     <div class="modal-body" style="padding:0px;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Order No</b>  
                                </td>
                                <td style="width: 35%;"> {{$pickupRequest->OrderNo}}</td>
                                 <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Pickup Date</b>
                                </td>
                                <td style="width: 35%;">&nbsp; {{$pickupRequest->pickup_date}}</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Sale Reference</b>
                                </td>
                                <td style="width: 35%;">&nbsp; {{$pickupRequest->sale_refere}}</td>
                                 <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Reference Name</b>
                                </td>
                                <td style="width: 35%;">&nbsp; {{$pickupRequest->reference_name}}</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Customer Name</b>
                                </td>
                                <td style="width: 35%;">&nbsp; @isset($pickupSacnList->CustomerDetails->CustomerCode) {{$pickupSacnList->CustomerDetails->CustomerCode}} ~ {{$pickupSacnList->CustomerDetails->CustomerName}} @endisset</td>
                                 <td style="width: 15%;text-align: left;padding-left: 10px;">
                                    <b>Bill To</b>
                                </td>
                                <td style="width: 35%;">&nbsp; {{$pickupRequest->bill_to}}</td>
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
                                <td style="width: 30%;text-align: left;padding-left: 10px;">{{$pickupRequest->store_name}}</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Destination Pincode/City</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">{{$pickupRequest->PincodeDestDetails->CityDetails->PinCode}} / {{$pickupRequest->PincodeDestDetails->CityDetails->CityName}}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" rowspan="2"><b>Warehouse Address</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" rowspan="2">{{$pickupRequest->warehouse_address}}</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Pieces</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">{{$pickupRequest->pieces}}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Weight</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">{{$pickupRequest->weight}}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" ><b>Origin Pincode/City</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" >{{$pickupRequest->OrderNo}}</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Content</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">{{$pickupRequest->contentDetails->Contents}}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" ><b>Contact Person Name</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" >{{$pickupRequest->contactPersonName}}</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;"><b>Remarks</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;">{{$pickupRequest->remark}}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%;text-align: left;padding-left: 10px;" ><b>Mobile Number</b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;" >{{$pickupRequest->mobile_no}}</td>
                                <td style="width: 20%;text-align: left;padding-left: 10px;border-bottom: none !important;border-right: none  !important;"><b></b></td>
                                <td style="width: 30%;text-align: left;padding-left: 10px;border-bottom: none;border-right: none;"></td>
                            </tr>
                        </table>
                        <div class="row pl-pr mt-1">
                            <label class="col-md-2" for="status"><b>Status</b></label>
                            <div class="col-md-3">
                                <select class="form-control status selectBox" name="status" id="status">
                                    <option value="">--Select--</option>
                                </select>
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
                <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
               
            </div>

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

    </script>