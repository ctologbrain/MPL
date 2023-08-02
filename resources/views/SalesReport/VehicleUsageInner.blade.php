<div class="modal fade model-popup generate-container" id="VehicleModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header main-title d-flex">
                        <div>
                        <input type="button" class="btn-primary" value="Close" data-bs-dismiss="modal" aria-label="Close"/>

                        <input type="button" class="btn-primary" value="Export"/>
                        </div>
                        <div>
                        <h5 class="text-center">DOCKET DETAILS</h5>
                        </div>
                        <div>
                        </div>
                    </div>
                    
                    
                     <div class="modal-body" style="padding:0px;">
                        <table style="width: 100%;" class="table-bordered">
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Gatepass No</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;"> @isset($GPDatials->GP_Number) {{$GPDatials->GP_Number}} @endisset</td>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Vehicle Model</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;">@isset($GPDatials->VehicleType) {{$GPDatials->VehicleType}} @endisset</td>
                                
                            </tr>
                            <tr>
                            <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Vendor Name</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;">@isset($GPDatials->VendorCode) {{$GPDatials->VendorCode}} ~ {{$GPDatials->VendorName}} @endisset</td>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Vehicle Hire Amount</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;"> </td>
                            </tr>
                            <tr>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Sale Amount</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;"> </td>
                                <td style="width: 15%;text-align: left;padding-left: 10px;"><b>Difference Amount</b></td>
                                <td style="width: 35%;text-align: left;padding-left: 10px;"> </td>
                            </tr>
                        </table>
                    <div class="table-responsive a">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr style="background-color: #825d5d42;padding:6px 10px;color:#000; ">
                                <th class="th1 p-1" style="min-width: 50px;text-align: center;">SL#</th>
                                <th class="th2 p-1" style="min-width: 100px;text-align: left;">Docket No</th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Book Date </th>
                                <th class="th1 p-1" style="min-width: 250px;text-align: left;">Customer Name</th>
                                <th class="th2 p-1" style="min-width: 100px;text-align: left;"> Pieces </th>
                                <th class="th2 p-1" style="min-width: 100px;text-align: left;"> Weight </th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Origin</th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Destination</th>
                                <th class="th3 p-1" style="min-width: 100px;text-align: left;">Sale Amt </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $j=0;?>
                           
                            @foreach($DockVehicleDatials as $key)
                            <?php  $j++;?>
                            <tr>
                                <td class="p-1">{{$j}}</td>
                                <td class="p-1 text-start"> @isset($key->Docket_No) {{$key->Docket_No}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->Booking_Date) {{date("d-m-Y",strtotime($key->Booking_Date))}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->CustomerCode) {{$key->CustomerCode}} ~{{$key->CustomerName}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->Qty) {{$key->Qty}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->Actual_Weight) {{$key->Actual_Weight}}  @endisset</td>
                                <td class="p-1 text-start "> @isset($key->OrgCityName) {{$key->OrgCityName}}  @endisset</td>
                                <td class="p-1 text-start"> @isset($key->DESTCityName) {{$key->DESTCityName}}  @endisset</td>

                                <td class="p-1 text-start">  {{''}}  </td>
                                 
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