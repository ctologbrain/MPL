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
                    <div class="col-3"> <span><b> Total Record:</b> {{''}}</span></div>   
                    
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
                                                 <th class="p-1 text-end" style="min-width: 150px;">Total Dockets</th>
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
                                            
                                            ?>
                                             <?php $office = DB::table("forwarding")->leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
                                             ->leftjoin("office_masters","office_masters.id","=","docket_masters.Office_ID")
                                             ->select(DB::raw("COUNT(docket_masters.Office_ID) as TotalOff") )
                                             ->groupBy('office_masters.id')->get();
                                             ?>
                                            
                                            @foreach($office as $val)

                                            
                                            <?php 
                                            $i++; ?>
                                             <?php  
                                                echo $office->TotalOff;
                                                $TotalDock=0;
                                            $TotalNDR=0;
                                            $TotalRTO=0;
                                            $TOTALDel=0;
                                           // $getChunk = array_chunk();
                                            ?>
                                              @for($k=$m; $k<= 1; $k++)
                                          
                                                <?php
                                               
                                                $TotalDock += $forwardingOffice[$k]->TotDock; 
                                                $TotalNDR += $forwardingOffice[$k]->TotNDR;
                                                $TotalRTO += $forwardingOffice[$k]->TotRTO;
                                                $TOTALDel += $forwardingOffice[$k]->TOTDel;
                                            ?>
                                           
                                        <tr>
                                                <td class="p-1 text-center">{{$i}} </td>
                                                <td class="p-1 text-start">{{$forwardingOffice[$k]->OfficeCode}} ~ {{$forwardingOffice[$k]->OfficeName}}</td>
                                                <td class="p-1 text-start">{{date("d-m-Y", strtotime($forwardingOffice[$k]->Forwarding_Date))}}</td>
                                                <td class="p-1 text-start">{{$forwardingOffice[$k]->VendorCode}} ~{{$forwardingOffice[$k]->VendorName}}</td>
                                               
                                                <td class="p-1 text-end"><a href="{{url('ForwardingReport')}}">{{$forwardingOffice[$k]->TotDock}}</a></td>
                                                <td class="p-1 text-end">{{$forwardingOffice[$k]->TotWeight}}</td>
                                                <td class="p-1 text-end"><a href="{{url('ForwardingReport')}}">{{$forwardingOffice[$k]->TotNDR}}</a></td>
                                                <td class="p-1 text-end"><a href="{{url('ForwardingReport')}}">{{$forwardingOffice[$k]->TotRTO}}</a></td>
                                                <td class="p-1 text-end"><a href="{{url('ForwardingReport')}}">{{$forwardingOffice[$k]->TOTDel}}</a></td>
                                                <td class="p-1 text-end">{{''}}</td>
                                        </tr>
                                     
                                        @endfor
                                       
                                        <tr class="main-title text-dark text-start">
                                            <td class="p-1 text-center"> </td> 
                                            <td class="p-1 text-center"> TOTAL:</td> 
                                            <td class="p-1 text-center">  </td> 
                                            <td class="p-1 text-center">  </td> 
                                            <td class="p-1 text-end"> {{$TotalDock}} </td> 
                                            <td class="p-1 text-end">  </td> 
                                            <td class="p-1 text-end"> {{$TotalNDR}} </td> 
                                            <td class="p-1 text-end"> {{$TotalRTO}} </td> 
                                            <td class="p-1 text-end"> {{$TOTALDel}} </td> 
                                            <td class="p-1 text-end">{{''}}</td>
                                        </tr> 
                                      <?php $m++ ?>
                                        @endforeach
                                        </tbody>
                                </table> 


                    </div>
                    </div>
                    <div class="d-flex d-flex justify-content-between">
                            {!! $forwardingOffice->appends(Request::all())->links() !!}
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