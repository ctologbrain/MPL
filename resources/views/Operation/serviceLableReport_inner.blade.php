<div class="col-md-12">
                            

                            <div class="table-responsive a">
                                <table class="table table-bordered table-centered mb-1 az_report">
                                        <thead>
                                            <tr class="main-title text-dark">
                                                <th class="p-1 text-start" style="min-width: 120px;">Origin-Destination Zone</th>
                                                <th class="p-1 text-start" style="min-width: 115px;">Office Name</th>
                                                 <th class="p-1 text-start" style="min-width: 115px;">Dockets For Delivery</th>
                                                 <th class="p-1 text-start">Delivered</th>
                                                 <th class="p-1 text-start">Pending</th>
                                                 <th class="p-1 text-start">Pending Percentage</th>
                                                 <th class="p-1 text-start" style="min-width: 100px;">Ontime</th>
                                                 <th class="p-1 text-start" style="min-width: 100px;">Ontime Percentage</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                           @foreach($docetDetails as $docket)
                                          
                                           <tr>
                                            
                                                <td class="p-1 text-start">{{$docket->SourceZone}}-{{$docket->DestZone}}</td>
                                                <td class="p-1 text-start">{{$docket->OfficeName}}</td>
                                                <td class="p-1 text-start">{{$docket->TotalDocket}}</td>
                                                <td class="p-1 text-start">{{$docket->Delivred}}</td>
                                                <td class="p-1 text-start">{{$docket->Received}}</td>
                                                <td class="p-1 text-start">0</td>
                                                <td class="p-1 text-start">0</td>
                                                <td class="p-1 text-start">0</td>

                                        </tr>
                                      
                                        @endforeach
                                       
                                      </tbody>
                                      
                                </table> 
                            </div>
                 
                    
                </div>