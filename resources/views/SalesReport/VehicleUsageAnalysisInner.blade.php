<div class="modal fade model-popup generate-container" id="VehicleModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header main-title d-flex">
                        <div>
                        <input type="button" class="btn-primary" value="Close" data-bs-dismiss="modal" aria-label="Close"/>

                        <input type="button" class="btn-primary" value="Export"/>
                        </div>
                        <div>
                        <h5 class="text-center">GATEPASS DETAILS</h5>
                        </div>
                        <div>
                        </div>
                    </div>
                    
                    
                     <div class="modal-body" style="padding:0px;">
                        <table style="width: 100%;" class="table-bordered">
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>FPM No</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;"> @isset($FPMDatials->FPMNo) {{$FPMDatials->FPMNo}} @endisset</td>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Vendor Name</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;">@isset($FPMDatials->VendorCode) {{$FPMDatials->VendorCode}} ~ {{$FPMDatials->VendorName}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>FPM Date</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;">@isset($FPMDatials->Fpm_Date) {{$FPMDatials->Fpm_Date}} @endisset</td>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Vehicle Model</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;">@isset($FPMDatials->VehicleType) {{$FPMDatials->VehicleType}} @endisset</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Vehicle No</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;">@isset($FPMDatials->VehicleNo) {{$FPMDatials->VehicleNo}} @endisset</td>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Capacity</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;">@isset($FPMDatials->Capacity) {{$FPMDatials->Capacity}} @endisset</td>
                            </tr>
                        </table>
                    <div class="table-responsive a">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr style="background-color: #825d5d42;padding:6px 10px;color:#000; ">
                                <th class="th1 p-1" style="min-width: 50px;text-align: center;">SL#</th>
                                <th class="th2 p-1" style="min-width: 100px;text-align: left;">GP date </th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">GP Number </th>
                               <th class="th1 p-1" style="min-width: 250px;text-align: left;">Route Name</th>
                                <th class="th2 p-1" style="min-width: 100px;text-align: left;"> Origin </th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Destination </th>
                                <th class="th3 p-1" style="min-width: 150px;text-align: left;">Distance In KM </th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Total Dockets</th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Actual Wt </th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Charge Wt </th>
                                 <th class="th3 p-1" style="min-width: 170px;text-align: left;">Vehicle Hire Amt </th>
                                 <th class="th3 p-1" style="min-width: 100px;text-align: left;">Sale Amt </th>
                                  <th class="th3 p-1" style="min-width: 100px;text-align: left;">Difference </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $j=0;?>
                           
                            @foreach($GPVehicleDatials as $key)
                            <?php  $j++;?>
                            <tr>
                                <td class="p-1">{{$j}}</td>
                                <td class="p-1 text-start"> @isset($key->GP_TIME) {{date("d-m-Y",strtotime($key->GP_TIME))}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->GP_Number) {{$key->GP_Number}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->RoutLine) {{$key->RoutLine}}  @endisset</td>
                                <td class="p-1 text-start "> @isset($key->OrgCityName) {{$key->OrgCityName}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->DESTCityName) {{$key->DESTCityName}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($FPMDatials->Capacity) {{''}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->TotalDocket) {{$key->TotalDocket}}  @endisset</td>
                                <?php
                                if(isset($key->GPID)){
                                    $productDet= DB::table("vehicle_gatepasses")->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.GatePassId','vehicle_gatepasses.id')
                                    ->join('docket_masters','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
                                    ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
                                    ->select('docket_product_details.Actual_Weight','docket_product_details.Charged_Weight')
                                    ->where('vehicle_gatepasses.id',$key->GPID)
                                    ->groupBy('gate_pass_with_dockets.Docket')
                                    ->get()->toArray();
                                }
                                ?>
                               <td class="p-1">@if(!empty($productDet)) {{array_sum(array_column($productDet ,'Actual_Weight'))}} @endif</td>
                                <td class="p-1">@if(!empty($productDet)){{array_sum(array_column($productDet,'Charged_Weight'))}}  @endif</td>
                                <td class="p-1 text-start"> @isset($FPMDatials->Capacity) {{''}}  @endisset</td>
                                 <td class="p-1 text-start"> @isset($FPMDatials->Capacity) {{''}}  @endisset</td>
                                 <td class="p-1 text-start"> @isset($FPMDatials->Capacity) {{''}}  @endisset</td>
                            </tr>
                           
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>

            
            <div class="modal-footer">
                <!-- <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
               
            </div>

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#VehicleModel').modal('toggle');

    </script>