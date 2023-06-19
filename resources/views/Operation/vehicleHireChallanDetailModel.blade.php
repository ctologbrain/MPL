<style type="text/css">
.recieve_document h5{
  
        margin:0;
   
}
.modal-body{
    padding:0px;
}
</style>
<div class="modal fade model-popup recieve_document" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   
                    <div class="modal-body">
                    <h5 class="text-center" style="background-color: #825d5d42;padding:6px 10px;color:#000; ">VEHICLE HIRE CHALLAN DETAIL</h5>
                    <div class="row p-1 mt-2">
                        <div class="col-7">
                            <table style="width: 100%;background-color: #edede0;" class="table-bordered">
                                <thead>
                                    <tr style="background-color: #825d5d42;padding:6px 10px;color:#000; ">
                                        <th colspan="4" class="text-center">
                                            Challan Detail
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Challan Date</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->Challan_Date) {{$getHireDetails->Challan_Date}} @endisset</td>
                                        <td style="border-right: 1px solid #000;text-align: left;"><b>Challan No</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->Challan_No) {{$getHireDetails->Challan_No}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Challan Type</b></td>
                                        <td colspan="3" style="text-align: left;">@isset($getHireDetails->Challan_Type) {{$getHireDetails->Challan_Type}} @endisset</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Purpose</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->Purpose) {{$getHireDetails->Purpose}} @endisset</td>
                                        <td style="border-right: 1px solid #000;text-align: left;"><b>Paid For</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->Paid_For) {{$getHireDetails->Paid_For}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Origin Office</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->OriginOfficeDetails->OfficeName) {{$getHireDetails->OriginOfficeDetails->OfficeName}} @endisset</td>
                                        <td style="border-right: 1px solid #000;text-align: left;"><b>Destination</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->DestOfficeDetails->OfficeName) {{$getHireDetails->DestOfficeDetails->OfficeName}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Route</b></td>
                                        <td colspan="3" style="text-align: left;">@isset($getHireDetails->Route) {{$getHireDetails->Route}} @endisset</td>
                                       
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Vendor Name</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->vendorDetails->VendorCode) {{$getHireDetails->vendorDetails->VendorCode}} @endisset</td>
                                        <td style="border-right: 1px solid #000;text-align: left;"><b>Account Number</b></td>
                                        <td style="width: 30%;text-align: left;">@isset($getHireDetails->Account_Number) {{$getHireDetails->Account_Number}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Vehicle Model</b></td>
                                        <td colspan="3" style="text-align: left;">@isset($getHireDetails->VehicleModelDetails->VehicleType) {{$getHireDetails->VehicleModelDetails->VehicleType}} @endisset</td>
                                       
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Vehicle Number</b></td>
                                        <td colspan="3" style="text-align: left;">@isset($getHireDetails->VehicleDetails->VehicleNo) {{$getHireDetails->VehicleDetails->VehicleNo}} @endisset</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000;width: 20%;text-align: left;"><b>Remarks</b></td>
                                        <td colspan="3" style="text-align: left;">@isset($getHireDetails->Remarks) {{$getHireDetails->Remarks}} @endisset</td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5">
                            <table style="width: 100%;background-color: #edede0;" class="table-bordered">
                                <thead>
                                    <tr style="background-color:#825d5d42;padding:6px 10px;color:#000; ">
                                        <th colspan="2" class="text-center">
                                            Vehicle Detail
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 30%;text-align: left;"><b>Reporting Office</b></td>
                                        <td style="width: 70%;text-align: left">@isset($getHireDetails->VehicleDetails->officeDetails->OfficeName) {{$getHireDetails->VehicleDetails->officeDetails->OfficeName}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Vehicle Size</b></td>
                                        <td style="text-align: left;">@isset($getHireDetails->VehicleModelDetails->VehSize) {{$getHireDetails->VehicleModelDetails->VehSize}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Vehicle Model</b></td>
                                        <td style="text-align: left;">@isset($getHireDetails->VehicleModelDetails->VehicleType) {{$getHireDetails->VehicleModelDetails->VehicleType}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Vehicle Purpose</b></td>
                                        <td style="text-align: left;"> @isset($getHireDetails->VehicleDetails->VehiclePurpose) {{$getHireDetails->VehicleDetails->VehiclePurpose}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Placement Type</b></td>
                                        <td style="text-align: left;"> @isset($getHireDetails->VehicleDetails->PlacementType) {{$getHireDetails->VehicleDetails->PlacementType}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Tariff Type</b></td>
                                        <td style="text-align: left;">@isset($getHireDetails->VehicleDetails->TariffType) {{$getHireDetails->VehicleDetails->TariffType}} @endisset</td> 
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Rent Amount</b></td>
                                        <td>@isset($getHireDetails->VehicleDetails->MonthRent) {{$getHireDetails->VehicleDetails->MonthRent}} @endisset</td>  
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Monthly Fix Km</b></td>
                                        <td style="text-align: left;">@isset($getHireDetails->VehicleDetails->MonthlyFixKm) {{$getHireDetails->VehicleDetails->MonthlyFixKm}} @endisset</td> 
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Addl. Per Km</b></td>
                                        <td style="text-align: left;">@isset($getHireDetails->VehicleDetails->AdditionalPerKmRate) {{$getHireDetails->VehicleDetails->AdditionalPerKmRate}} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><b>Addl. Per Hour</b></td>
                                        <td style="text-align: left;">@isset($getHireDetails->VehicleDetails->PerHRRate) {{$getHireDetails->VehicleDetails->PerHRRate}} @endisset</td>  
                                    </tr>  
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 mt-1">
                            <div class="table-responsive a">
                                <table class="table table-bordered table-centered">
                                  <thead>
                                      <tr style="background-color: #825d5d42;">
                                        <th class="p-1">Total Amount</th>
                                        <th class="p-1">Balance Amount</th>
                                        <th class="p-1">Paid By</th>
                                        <th class="p-1">Payment Mode</th>
                                        <th class="p-1">Number</th>
                                        <th class="p-1">Payment Mode<span class="error">*</span></th>
                                        <th class="p-1">Number</th>
                                      </tr>
                                  </thead>  
                                  <tbody>
                                    <tr>
                                        <td class="p-1">@isset($getHireDetails->TotalAmount) {{$getHireDetails->TotalAmount}} @endisset</td>
                                        <td class="p-1">@isset($getHireDetails->Balance) {{$getHireDetails->Balance}} @endisset</td>
                                        <td class="p-1">@isset($getHireDetails->BalOfficeDetails->OfficeName) {{$getHireDetails->BalOfficeDetails->OfficeName}} @endisset</td>
                                        <td class="p-1">@isset($getHireDetails->Bal_PaymentMode) {{$getHireDetails->Bal_PaymentMode}} @endisset</td>
                                        <td class="p-1">@isset($getHireDetails->Bal_PaymentNumber) {{$getHireDetails->Bal_PaymentNumber}} @endisset</td>
                                        <td class="p-1">
                                            <select class="form-control selectBox" class="payment_mode" id="payment_mode" name="payment_mode" tabindex="1" style="width: 100%;">
                                                <option value="">--Select--</option>
                                                <option value="BANK">BANK</option>
                                                <option value="CASH">CASH</option>
                                                <option value="UPI">UPI</option>
                                                <option value="WALLET">WALLET</option>
                                            </select>
                                        </td> 
                                        <td class="p-1">
                                            <input type="text" name="number" id="number" class="form-control number" tabindex="2">
                                            <input type="hidden" value="{{$getHireDetails->id}}" name="id" id="id" class="form-control id" tabindex="2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="col-md-12 text-center mt-1">
                                    <button  onclick="VehicleModalSubmittion();" type="button" name="recieve"  class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                                        </td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                        </div>
                        
                    </div>
                   

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

    </script>