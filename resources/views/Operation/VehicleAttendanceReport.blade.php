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
                    <div class="row pl-pr mt-1">
                   
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}" @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif   class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                          </div> 
                    </form>
                    <div class="col-12">
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1 pickupSacnReportTable">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:50px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Office</th>
            <th style="min-width:130px;" class="p-1">Vehicle Owner</th>
            <th style="min-width:130px;" class="p-1">Vehicle Model Name</th>
            <th style="min-width:130px;" class="p-1">Vehicle No </th>
            <th style="min-width:130px;" class="p-1">Vendor Name</th> 
            <?php 
            if(request()->get('formDate')){
                $date= request()->get('formDate');
             }
            else{
                $date=  date("Y-m-d");
            }
           
            $M = date("m",strtotime($date));  
            $Y = date("Y",strtotime($date));
             $dateOfMonth = cal_days_in_month(CAL_GREGORIAN,$M, $Y);
             ?> 
            @for($j=1; $j<=$dateOfMonth; $j++)
            <th style="min-width:40px;" class="p-1">{{$j}}</th> 
            @endfor
            
         
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
            @foreach($vehicle as $key)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{$key->vehicleDetails->Owner}}</td>
             <td class="p-1" > @isset($key->vehicleDetails->VehicleTypeDetails->VehicleType){{$key->vehicleDetails->VehicleTypeDetails->VehicleType}} @endisset</td>
             <td class="p-1">   @isset($key->vehicleDetails->VendorDetails->VendorName) {{$key->vehicleDetails->VendorDetails->VendorName}} ~ {{$key->vehicleDetails->VendorDetails->VendorName}} @endisset</td>
             <td class="p-1">{{$key->vehicleDetails->VehicleNo}}</td>
             <?php 
             if(request()->get('formDate')){
                $date= request()->get('formDate');
             }
             else{
                $date=   date("Y-m-d");
             }
            
            $M = date("m",strtotime( $date));
            $Y = date("Y",strtotime( $date));
             $dateOfMonth = cal_days_in_month(CAL_GREGORIAN,$M, $Y);
             ?> 
             @for($k=1; $k <=$dateOfMonth; $k++)
             <?php 
           
             $day =  sprintf("%02d", $k);
             $result = DB::table('Vehicle_Attendance')->where(DB::raw("DATE_FORMAT(Vehicle_Attendance.ReportingDate,'%d')"), $day)
             ->where(DB::raw("DATE_FORMAT(Vehicle_Attendance.ReportingDate,'%m')"), $M)
             ->where(DB::raw("DATE_FORMAT(Vehicle_Attendance.ReportingDate,'%Y')"), $Y)->first();
             ?>
             @if(isset($result->id))
             <td class="p-1"> P</td> 
             @else 
             <td class="p-1"> -</td>
             @endif
             
             @endfor
             
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