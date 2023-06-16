<div class="col-md-12">
                            

                            <div class="table-responsive a">
                                <table class="table table-bordered table-centered mb-1 az_report">
                                        <thead>
                                            <tr class="main-title text-dark">
                                                <th class="p-1 text-start" style="min-width: 120px;">Origin</th>
                                                <th class="p-1 text-start" style="min-width: 115px;">Destination City</th>
                                                 <th class="p-1 text-start" style="min-width: 115px;">Scan Date</th>
                                                 <th class="p-1 text-start">Docket</th>
                                                 <th class="p-1 text-start">Pcs</th>
                                                 <th class="p-1 text-start">Weight</th>
                                                 <th class="p-1 text-start" style="min-width: 120px;">Booking Location</th>
                                                 <th class="p-1 text-start" style="min-width: 220px;">Customer</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php $i=0;
                                            $count=0;
                                            $weight=0;
                                            
                                            ?>
                                            @foreach($docetDetails as $docket)
                                          
                                           <tr>
                                            
                                                <td class="p-1 text-start">{{$docket->Bookingofficenew}}</td>
                                                <td class="p-1 text-start">{{$docket->DestCityName}}</td>
                                                <td class="p-1 text-start">{{date("Y-m-d", strtotime($docket->Booking_Date))}}</td>
                                                <td class="p-1 text-start">{{$docket->Docket_No}}</td>
                                                <td class="p-1 text-start">{{$docket->Qty}}</td>
                                                <td class="p-1 text-start">{{$docket->Actual_Weight}}</td>
                                                <td class="p-1 text-start">{{$docket->Bookingofficenew}}</td>
                                                <td class="p-1 text-start">{{$docket->CustomerName}}</td>

                                        </tr>
                                        <?php $i++;
                                         $count+=$docket->Qty;
                                         $weight+=$docket->Actual_Weight;
                                        ?>
                                        @endforeach
                                        <tr>
                                            <td class="p-1 text-start"></td>
                                            <td class="p-1 text-start"></td>
                                            <td class="p-1 text-start"><b>TOTAL</b></td>
                                            <td class="p-1 text-start"><b>{{$i}}</b></td>
                                            <td class="p-1 text-start"><b>{{$count}}</b></td>
                                            <td class="p-1 text-start"><b>{$weight}}</b></td>
                                            <td class="p-1 text-start"></td>
                                            <td class="p-1 text-start"></td>
                                        </tr>
                                      </tbody>
                                      
                                </table> 
                            </div>
                 
                    
                </div>