@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">FORWARDING REGISTER</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                <form action="" method="GET">
                    @csrf
                    @method('GET')
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="office_name"><b>Office Name</b></label>
                                                <div class="col-md-8">
    
                                                <select  tabindex="1" class="form-control selectBox  office" name="office" id="office">
                                                        <option value="">--Select--</option>
                                                        @foreach($Office as $key)
                                                        <option value="{{$key->id}}"  @if(request()->get('office') !='' && request()->get('office')==$key->id){{'selected'}}@endif>{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                        @endforeach
                                                    </select>
                                                
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row">
                                                <label class="col-md-6 col-form-label" for="form_date"><b>From Date</b><span
                                                 class="error">*</span></label>
                                                <div class="col-md-6">
                                                <input type="text"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif tabindex="2" class="form-control datepickerOne formDate" name="formDate" id="formDate" >
                                               
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="to_date"><b>To Date</b><span
                                                 class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" tabindex="3" class="form-control datepickerOne todate"  @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif   name="todate" id="todate" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-start">
                                           
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="submit" tabindex="4" value="Generate Report" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                            
                                        </div>
                                    </div>
                                
                            
                                  
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$officeParent->total()}}</span></div>   
                    
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="table-responsive a">
                    <table class="table table-bordered table-centered mb-1 mt-1 az_report">
                                        <thead>
                                            <tr class="main-title text-dark text-start">
                                                <th class="p-1 text-center">SL#</th>
                                                <th class="p-1 text-start" style="min-width: 150px;">Office Name</th>
                                                <th class="p-1 text-start" style="min-width: 120px;">Forwarding Date</th>
                                                 <th class="p-1 text-start" style="min-width: 250px;">3PL Vendor Name</th>
                                                 <th class="p-1 text-end" style="min-width: 100px;">Total Dockets</th>
                                                 <th class="p-1 text-end" style="min-width: 150px;">Forwarding Wt</th>
                                                 <th class="p-1 text-end" >NDR</th>
                                                 <th class="p-1 text-end" >RTO</th>
                                                 <th class="p-1 text-end">Delivered</th>
                                                 <th class="p-1 text-end">Pending</th>
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
                                            $m =0;
                                            }
                                            $OfficeData ='';
                                            $date =[];
                                            $bulkdf='';
                                            $bulkdt ='';

                                                $GrandTotalDock=0;
                                                $GrandTotalNDR=0;
                                                $GrandTotalRTO=0;
                                                $GrandTOTALDel=0;
                                                $GrandTOTALWeight =0;
                                                $GrandTOTALPending =0;
                                            if(request()->get('office')){
                                                $OfficeData =request()->get('office');
                                                }
                                                if( request()->get('formDate')){
                                                    $bulkdf= $date['formDate']=  date("Y-m-d",strtotime(request()->get('formDate')));
                                                }
                                                if(request()->get('todate')){
                                                    $bulkdt =  $date['todate']=  date("Y-m-d",strtotime(request()->get('todate')));
                                                }
                                            ?>
                                            
                                            
                                            @foreach($officeParent as $val)
                                           
                                             <?php 

                                            $forwardingOffice =  DB::table("forwarding")->leftjoin("vendor_masters","vendor_masters.id","=","forwarding.Forwarding_Vendor")
                                            ->leftjoin("RTO_Trans","RTO_Trans.Initial_Docket","=","forwarding.DocketNo")
                                            ->leftjoin("NDR_Trans","NDR_Trans.Docket_No","=","forwarding.DocketNo")
                                            ->leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
                                            ->leftjoin("docket_allocations","docket_masters.Docket_No","=","docket_allocations.Docket_No")
                                            ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
                                            ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
                                            ->select("office_masters.OfficeCode","office_masters.OfficeName","office_masters.id as OFID",
                                            "forwarding.Forwarding_Date", "forwarding.Forwarding_Weight","vendor_masters.VendorCode"
                                            ,"vendor_masters.VendorName", DB::raw("COUNT(DISTINCT forwarding.DocketNo) as TotDock"),
                                            DB::raw("SUM(forwarding.Forwarding_Weight) as TotWeight"),
                                            DB::raw("COUNT(DISTINCT NDR_Trans.Docket_No) as TotNDR"),
                                            DB::raw("COUNT(DISTINCT RTO_Trans.Initial_Docket) as TotRTO"),
                                            DB::raw("COUNT(DISTINCT CASE WHEN docket_allocations.Status=8 THEN docket_allocations.Docket_No END ) as  TOTDel") )
                                                //with("vendorDetails","DocketDetails")->withCount("DocketDetails as TotDock")
                                            ->where(function($query) use($OfficeData){
                                                if($OfficeData!=''){
                                                    $query->where("docket_masters.Office_ID",$OfficeData);
                                                }
                                            })
                                            ->where(function($query) use($date){
                                                if(isset($date['formDate']) &&  isset($date['todate'])){
                                                    $query->whereBetween("forwarding.Forwarding_Date",[$date['formDate'],$date['todate']]);
                                                }
                                            })    
                                            ->where("office_masters.id",$val->OFID)
                                            ->orderBy("office_masters.OfficeName","ASC")
                                            ->groupBy(["office_masters.id","forwarding.Forwarding_Date"])
                                            ->get();
                                            ?>
                                             <?php  
                                              //  echo $office->TotalOff;
                                                $TotalDock=0;
                                                $TotalNDR=0;
                                                $TotalRTO=0;
                                                $TOTALDel=0;
                                                $TOTALWeight =0;
                                                $TOTALPending =0;
                                           // $getChunk = array_chunk();
                                           $l=0;
                                            ?>
                                              @foreach($forwardingOffice as $key)
                                              <?php $i++; ?>
                                                <?php
                                               
                                                $TotalDock += $key->TotDock; 
                                                $TotalNDR += $key->TotNDR;
                                                $TotalRTO += $key->TotRTO;
                                                $TOTALDel += $key->TOTDel;
                                                $TOTALWeight += $key->TotWeight;
                                                $TOTALPending += ($key->TotDock-$key->TOTDel);
                                                $dt = $key->Forwarding_Date;
                                                $df= $key->Forwarding_Date;
                                            ?>
                                           
                                        <tr>
                                                <td class="p-1 text-center">{{$i}} </td>
                                                <td class="p-1 text-start"> {{$key->OfficeName}}</td>
                                                <td class="p-1 text-start">{{date("d-m-Y", strtotime($key->Forwarding_Date))}}</td>
                                                <td class="p-1 text-start">{{$key->VendorCode}} ~{{$key->VendorName}}</td>
                                               
                                                <td class="p-1 text-end"><a href="{{url('ForwardingDetailedReport').'/'.$val->OFID.'?df='.$df.'&dt='.$dt}}">{{$key->TotDock}}</a></td>
                                                <td class="p-1 text-end">{{$key->TotWeight}}</td>
                                                <td class="p-1 text-end"><a href="{{url('ForwardingDetailedNDRReport').'/'.$val->OFID.'?df='.$df.'&dt='.$dt}}">{{$key->TotNDR}}</a></td>
                                                <td class="p-1 text-end"><a href="{{url('ForwardingDetailedRTOReport').'/'.$val->OFID.'?df='.$df.'&dt='.$dt}}">{{$key->TotRTO}}</a></td>
                                                <td class="p-1 text-end"><a href="{{url('ForwardingDetailedDELIVEREDReport').'/'.$val->OFID.'?df='.$df.'&dt='.$dt}}">{{$key->TOTDel}}</a></td>
                                                <td class="p-1 text-end"><a href="{{url('ForwardingDetailedReport').'/'.$val->OFID.'/Panding'.'?df='.$df.'&dt='.$dt}}"> {{$key->TotDock-$key->TOTDel}} </a></td>
                                        </tr>
                                    
                                        @endforeach
                                       
                                        <tr class="main-title text-dark text-start">
                                            <td class="p-1 text-center"> </td> 
                                            <td class="p-1 text-center"> <strong>TOTAL: </strong></td> 
                                            <td class="p-1 text-center">  </td> 
                                            <td class="p-1 text-center">  </td> 
                                            <td class="p-1 text-end"><strong> <a href="{{url('ForwardingDetailedReport').'/'.$val->OFID.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$TotalDock}}</a></strong> </td> 
                                            <td class="p-1 text-end"><strong> {{$TOTALWeight}} </strong></td> 
                                            <td class="p-1 text-end"><strong> <a href="{{url('ForwardingDetailedNDRReport').'/'.$val->OFID.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$TotalNDR}}  </a> </strong></td> 
                                            <td class="p-1 text-end"> <strong><a href="{{url('ForwardingDetailedRTOReport').'/'.$val->OFID.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$TotalRTO}}  </a> </strong></td> 
                                            <td class="p-1 text-end"> <strong><a href="{{url('ForwardingDetailedDELIVEREDReport').'/'.$val->OFID.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$TOTALDel}} </a></strong> </td> 
                                            <td class="p-1 text-end"><strong><a href="{{url('ForwardingDetailedReport').'/'.$val->OFID.'/Panding'.'?df='.$bulkdf.'&dt='.$bulkdt}}"> {{$TOTALPending}} </a></strong></td>
                                        </tr> 
                                        <?php 
                                        $GrandTotalDock += $TotalDock;
                                        $GrandTotalNDR +=  $TotalNDR;
                                        $GrandTotalRTO +=  $TotalRTO;
                                        $GrandTOTALDel +=  $TOTALDel;
                                        $GrandTOTALWeight +=  $TOTALWeight;
                                        $GrandTOTALPending +=  $TOTALPending;
                                        ?> 
                                        @endforeach

                                        <tr class="main-title text-dark text-start">
                                            <td class="p-1 text-center"> </td> 
                                            <td class="p-1 text-center"> <strong>Grand TOTAL: </strong></td> 
                                            <td class="p-1 text-center">  </td> 
                                            <td class="p-1 text-center">  </td> 
                                            <td class="p-1 text-end"><strong> <a href="{{url('ForwardingDetailedReport').'/0'.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$GrandTotalDock}}</a></strong> </td> 
                                            <td class="p-1 text-end"><strong> {{$GrandTOTALWeight}} </strong></td> 
                                            <td class="p-1 text-end"><strong> <a href="{{url('ForwardingDetailedNDRReport').'/0'.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$GrandTotalNDR}}  </a> </strong></td> 
                                            <td class="p-1 text-end"> <strong><a href="{{url('ForwardingDetailedRTOReport').'/0'.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$GrandTotalRTO}}  </a> </strong></td> 
                                            <td class="p-1 text-end"> <strong><a href="{{url('ForwardingDetailedDELIVEREDReport').'/0'.'?df='.$bulkdf.'&dt='.$bulkdt}}">{{$GrandTOTALDel}} </a></strong> </td> 
                                            <td class="p-1 text-end"><strong><a href="{{url('ForwardingDetailedReport').'/0'.'/Panding'.'?df='.$bulkdf.'&dt='.$bulkdt}}"> {{$GrandTOTALPending}} </a></strong></td>
                                        </tr> 
                                        </tbody>
                                </table> 


                    </div>
                    </div>
                    <div class="d-flex d-flex justify-content-between">
                            {!! $officeParent->appends(Request::all())->links() !!}
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            
        </div> <!-- end col -->
    </div>
</div>
<div style="display:none;">
<iframe id="printf" name="printf"></iframe>
</div>
<script src="{{url('public/js/custome.js')}}"></script>
<script type="text/javascript">
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es' ,
          autoclose:true,
           todayHighlight: true,
      });
</script>