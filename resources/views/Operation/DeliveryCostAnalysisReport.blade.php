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
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <!-- end card-->
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row p-1">
                   
                    <div class="mb-2 col-md-2">
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select Office--</option>
                        @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('DeliveryCostAnalysisReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Date</th>
            <th style="min-width:130px;" class="p-1">Vehicle No. </th>
            <th style="min-width:150px;" class="p-1">Vendor Name</th>
           
            <th style="min-width:130px;" class="p-1">Size Of Vehicle</th>
            <th style="min-width:130px;" class="p-1">Capacity Of Vehicle</th>
            <th style="min-width:130px;" class="p-1">Scheduled Time Of Vehicle Departure</th>
            <th style="min-width:130px;" class="p-1">Actual Time Of Vehicle Departure</th>

            <th style="min-width:130px;" class="p-1">Actual Time Of Vehicle Departure</th>
            <th style="min-width:130px;" class="p-1">Diffrence In Vehicle Departure</th>

            <th style="min-width:130px;" class="p-1">Scheduled Vehicle Achievement %</th>
            <th style="min-width:130px;" class="p-1">Route Of The Vehicle With Schedule Time Of Every Location</th>
            <th style="min-width:130px;" class="p-1">No Of Docket</th>
            <th style="min-width:130px;" class="p-1">No Of Docket Delivered</th>
            <th style="min-width:130px;" class="p-1">% Of Delivery Done	</th>

            <th style="min-width:130px;" class="p-1">Total Weight Of The Delivery</th>

            <th style="min-width:130px;" class="p-1">Difference Of The Delivery Vehicle Capacity Percentage	</th>
            <th style="min-width:130px;" class="p-1">Loading Supervisor Name</th>

            <th style="min-width:130px;" class="p-1">Delivery Boy</th>
            <th style="min-width:130px;" class="p-1">No Of Pickup Assign</th>

            <th style="min-width:130px;" class="p-1">Number Of Pickup Done</th>
            <th style="min-width:130px;" class="p-1">% Of Pickup Done	</th>
            <th style="min-width:130px;" class="p-1">Name Of The Unloading Supervisor</th>
            <th style="min-width:130px;" class="p-1">Pickup/kg	</th>

            <th style="min-width:130px;" class="p-1">% Of Pickup Utilization</th>
            <th style="min-width:130px;" class="p-1">Arrival Of The Vehicle At Hub</th>
            <th style="min-width:130px;" class="p-1">Monthly Rent Of The Vehicle</th>
            <th style="min-width:130px;" class="p-1">Daily Rent Of The Vehicle	</th>

            <th style="min-width:130px;" class="p-1">Total Pickup/Delivery	</th>
            <th style="min-width:130px;" class="p-1"> Cost Yield	</th>
            <th style="min-width:130px;" class="p-1">Yield Per Day	</th>

            <th style="min-width:130px;" class="p-1">% Of The Under Utilization Of The Vechile</th>
            <th style="min-width:130px;" class="p-1">Opening KM	</th>
            <th style="min-width:130px;" class="p-1">Total Km Done Daily</th>
            <th style="min-width:130px;" class="p-1">GPS ID</th>
            <th style="min-width:130px;" class="p-1">Remarks</th>


            
           
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
            ?>
            @foreach($vehicle as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($DockBookData->D_Date) {{date("d-m-Y",strtotime($DockBookData->D_Date))}} @endisset</td>
             <td class="p-1"> @isset($DockBookData->VehicleNo) {{$DockBookData->VehicleNo}} @endisset</td>
             <td class="p-1"> @isset($DockBookData->VendorName) {{$DockBookData->VendorCode}} ~ {{$DockBookData->VendorName}} @endisset</td>
            <td class="p-1">{{$DockBookData->VehSize}}</td>
            <td class="p-1">{{$DockBookData->Capacity}}</td>
            <td class="p-1">{{$DockBookData->Title}}</td>
            <td class="p-1"></td>
            <td class="p-1"> </td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"> </td>
            <td class="p-1">{{$DockBookData->TotDock}}</td>
            <td class="p-1">{{$DockBookData->TotDelivered}}</td>
            <?php 
              if(isset($DockBookData->TotDelivered) && isset($DockBookData->TotDock) && $DockBookData->TotDock >0){
                $totPer =( intval($DockBookData->TotDelivered)/ intval($DockBookData->TotDock)*100);
              }
              else{
                $totPer =0.00;
              }
            ?>
            <td class="p-1">{{number_format($totPer,2)}}%</td>
            <td class="p-1">{{$DockBookData->TotWeight}}</td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1">@isset($DockBookData->EmployeeCode) {{$DockBookData->EmployeeCode}}~ {{$DockBookData->EmployeeName}} @endisset</td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>

            <td class="p-1"></td>
            <td class="p-1">{{$DockBookData->ReportingTime}}</td>
            <td class="p-1">{{$DockBookData->MonthRent}}</td>
            <td class="p-1">@isset($DockBookData->MonthRent){{intval($DockBookData->MonthRent/30)}} @endisset</td>
            <td class="p-1"> </td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"> {{$DockBookData->OpenKm}} </td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $vehicle->appends(Request::all())->links() !!}
        </div>

        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
       todayHighlight: true
      });
     
    $(".selectBox").select2();
 
</script>