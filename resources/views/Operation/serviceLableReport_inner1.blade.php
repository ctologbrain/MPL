<div class="col-md-12">
                            

                            <div class="table-responsive a">
                                <table class="table table-bordered table-centered mb-1 az_report">
                                        <thead>
                                            <tr class="main-title text-dark">
                                                <th class="p-1 text-start" style="min-width: 120px;">Origin-Destination Zone</th>
                                                <th class="p-1 text-start" style="min-width: 115px;">Docket No</th>
                                                 <th class="p-1 text-start" style="min-width: 115px;">Booking Date</th>
                                                 <th class="p-1 text-start">Pcs</th>
                                                 <th class="p-1 text-start">Weight</th>
                                                 <th class="p-1 text-start">Origin</th>
                                                 <th class="p-1 text-start" style="min-width: 100px;">Destination</th>
                                                 <th class="p-1 text-start" style="min-width: 100px;">Customer Name</th>
                                                 <th class="p-1 text-start" style="min-width: 100px;">Gatepass Date</th>
                                                 <th class="p-1 text-start" style="min-width: 100px;">Gatepass No</th>
                                                 <th class="p-1 text-start" style="min-width: 100px;">Pending Reason</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                           @foreach($docetDetails as $docket)
                                          
                                           <tr>
                                            
                                                <td class="p-1 text-start">{{$docket->SourceZone}}-{{$docket->DestZone}}</td>
                                                <td class="p-1 text-start">{{$docket->Docket_No}}</td>
                                                <td class="p-1 text-start">{{date("d-m-Y", strtotime($docket->Booking_Date))}}</td>
                                                <td class="p-1 text-start">{{$docket->Qty}}</td>
                                                <td class="p-1 text-start">{{$docket->Actual_Weight}}</td>
                                                <td class="p-1 text-start">{{$docket->Sourcity}}</td>
                                                <td class="p-1 text-start">{{$docket->CestCity}}</td>
                                                <td class="p-1 text-start">{{$docket->CustomerName}}</td>
                                                <td class="p-1 text-start">{{date("d-m-Y", strtotime($docket->GP_TIME))}}</td>
                                                <td class="p-1 text-start">{{$docket->GP_Number}}</td>
                                                <td class="p-1 text-start"></td>

                                        </tr>
                                      
                                        @endforeach
                                       
                                      </tbody>
                                      
                                </table> 
                            </div>
                 
                    
                </div>