@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    
                </div>
                <h4 class="page-title">DASHBOARD DETAIL - MISSING GATEPASS</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card missing-gatepass">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="one-day btn-primary">
                                                <div>{{$DaysZeroToTwo->Total}}</div>
                                                <div>0-2 Days</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="one-day btn-secondary">
                                                <div>{{$DaysThreeToFive->Total}}</div>
                                                <div>3-5 Days</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="one-day btn-success">
                                                <div>{{$DaysSixToTen->Total}}</div>
                                                <div>6-10 Days</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                             <div class="one-day btn-warning">
                                                <div>{{$DaysTenPlus->Total}}</div>
                                                <div>+10 Days</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="one-day btn-info">
                                                <div>{{intval($DaysZeroToTwo->Total+$DaysThreeToFive->Total+$DaysSixToTen->Total+$DaysTenPlus->Total)}}</div>
                                                <div>All</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gatepass-details row">
                                                <div class="col-md-8">
                                                    Total Docket: <b>{{intval($DaysZeroToTwo->Total+$DaysThreeToFive->Total+$DaysSixToTen->Total+$DaysTenPlus->Total)}}</b> &nbsp;
                                                    Total Pieces: <b> @isset($forwardingCalculation->TotPiece){{$forwardingCalculation->TotPiece}} @endisset</b>&nbsp;
                                                    Total Actual Weight: <b>@isset($forwardingCalculation->TotActual_Weight) {{$forwardingCalculation->TotActual_Weight}} @endisset</b>&nbsp;
                                                    Total Charge Weight:<b> @isset($forwardingCalculation->TotCharged_Weight){{$forwardingCalculation->TotCharged_Weight}} @endisset </b>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <a href="{{url('/ForwardingDashboard')}}" class="btn btn-primary p-1">Export &nbsp; <i class="fa fa-download" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                         </div>
                                        <div class="col-md-12">
                                          <div class="table-responsive">
                                        <table class="table-bordered">
                                                    <thead>
                                                        <tr class="main-title text-dark">
                                                        
                                                            <th class="p-1 td1">SL#</th>
                                                            <th class="p-1 td2" style="min-width: 150px;">Date</th>
                                                            <th class="p-1 td3">Origin</th>
                                                            <th class="p-1 td4" style="min-width: 150px;">Origin State</th>
                                                            <th class="p-1 td5">Dest.</th>
                                                            <th class="p-1 td6" style="min-width: 150px;">Dest. State</th>
                                                            <th class="p-1 td7" style="min-width: 150px;">Docket No.</th>
                                                            <th class="p-1 tdM8" style="min-width: 150px;">Client Name</th>
                                                            <th class="p-1 tdM8" style="min-width: 150px;">Vendor Name</th>
                                                            <th class="p-1 tdM8" style="min-width: 150px;">Forwarding Number</th>
                                                            <th class="p-1 td9">Pieces</th>
                                                            <th class="p-1 td10" style="min-width: 100px;">Act. Wt</th>
                                                            <th class="p-1 td11" style="min-width: 100px;">Chrg. Wt.</th>
                                                            <th class="p-1 td12" style="min-width: 100px;">Sale Type</th>
                                                            <th class="p-1 td13" style="min-width: 150px;">Branch</th>
                                                            <th class="p-1 td14" style="min-width: 150px;">Forwarding In Days</th>

                                                           

                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <?php $i=0;  
                                                        $page=request()->get('page');
                                                        if(isset($page) && $page>1){
                                                            $page =$page-1;
                                                        $i = intval($page*10);
                                                        }
                                                         else{
                                                        $i=0;
                                                        }
                                                        $delayCal=0; ?>
                                                        @foreach($forwarding as $key)
                                                         <?php $i++;  
                                                         date_default_timezone_set("Asia/Kolkata");
                                                         $delayCal =intval( strtotime(date("Y-m-d"))-strtotime($key->Forwarding_Date));
                                                        $delayCal = number_format(($delayCal/(60*60)),0);
                                                         
                                                         ?>
                                                        <tr>
                                                            <td class="p-1">{{$i}}</td>
                                                            <td class="p-1">{{date("d-m-Y",strtotime($key->Forwarding_Date))}}  </td>

                                                            <td class="p-1">@isset($key->OrgCity ) {{$key->orgCityName}} ~ {{$key->orgCityCode}} @endisset</td>
                                                            <td class="p-1">@isset($key->OrgStatename) {{$key->OrgStatename}} @endisset</td>
                                                            <td class="p-1"> 
                                                                @isset($key->DestCityCode ) {{$key->DestCityCode}} ~ {{$key->DestCityName}}  @endisset</td>
                                                            <td class="p-1">@isset($key->DestStatename) {{$key->DestStatename}} @endisset</td>

                                                            <td class="p-1"><a target="_blank" href="{{url('/docketTracking?docket=').$key->Docket_No}}">{{$key->Docket_No}}</a></td>
                                                            <td class="p-1">@isset($key->CustomerCode ) {{$key->CustomerCode}}~ {{$key->CustomerName}} @endisset</td>
                                                            <td class="p-1">{{$key->VendorCode}} ~{{$key->VendorName}}</td>
                                                            <td class="p-1">{{$key->ForwardingNo}}</td>
                                                            <td class="p-1">@isset($key->Qty) {{$key->Qty}} @endisset</td>
                                                            <td class="p-1">@isset($key->Actual_Weight) {{$key->Actual_Weight}} @endisset</td>
                                                            <td class="p-1">@isset($key->Charged_Weight) {{$key->Charged_Weight}} @endisset</td>
                                                            <td class="p-1">{{$key->BookingType}}</td>
                                                            <td class="p-1">{{$key->OfficeCode}} ~ {{$key->OfficeName}}</td>
                                                            <td class="p-1">{{$delayCal}}</td>
                                                            
                                                        </tr>
                                                      @endforeach
                                                        
                                                                    
                                                                   
                                                                   
                                                             </tbody>
                                                         
                                                            </table> 
                                                            </div>
                                                          </div>
                                    </div>
                                    
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
                 <div class="tab-content">
                    <div class="tab-pane show active" id="input-types-preview">
                        <div class="row tabels">
                             <div class="d-flex d-flex justify-content-between">
                            {!! $forwarding->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>

<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true,
          todayHighlight: true
      });
     $(".datepickerOne").val('{{date("Y-m-d")}}');

</script>