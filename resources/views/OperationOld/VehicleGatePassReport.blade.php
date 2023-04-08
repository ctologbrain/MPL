@include('layouts.appTwo')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
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
                    <div class="row">
                   
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  value="{{ request()->get('formDate') }}" class="form-control datepickerOne" placeholder="From Date" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" value="{{ request()->get('todate') }}" class="form-control datepickerOne" placeholder="To Date" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th style="min-width:100px;">SL#</th>
            <th style="min-width:160px;">GP Date</th>	
            <th style="min-width:130px;">GP Number</th>	
            <th style="min-width:130px;">FPM No.</th>
            <th style="min-width:130px;">FPM Date</th>	
            <th style="min-width:130px;">Vendor Name</th>	
            <th style="min-width:150px;">Vehicle Model</th>
            <th style="min-width:180px;">Capacity</th>
             <th style="min-width:130px;">Vehicle No</th>
            <th style="min-width:130px;">Supervisor Name</th>   
            <th style="min-width:190px;">Driver Name</th>
            <th style="min-width:130px;">Contact No	</th>
            <th style="min-width:130px;">Seal No</th>
            <th style="min-width:130px;">Origin</th>
            <th style="min-width:130px;">Destination</th>
            <th style="min-width:130px;">Dist.(Km)	</th>
            <th style="min-width:130px;">Total Dockets</th>
            <th style="min-width:130px;">Actual Wt</th>
            <th style="min-width:130px;">Volumetric Wt</th>
            <th style="min-width:130px;">Charge Wt</th>
            <th style="min-width:130px;">Sale Amt</th>

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
            @foreach($gatePassDetails as $gpDetails)
            <?php $i++; ?>
            <tr>
               <td>{{$i}}</td>
               <td>{{$gpDetails->GP_TIME}}</td>
               <td><a href="{{url('print_gate_Number/'.$gpDetails->GP_Number)}}" target=_balnk>{{$gpDetails->GP_Number}}</a></td> 
               <td>@if(isset($gpDetails->fpmDetails->FPMNo)){{$gpDetails->fpmDetails->FPMNo}}@endif</td>
               <td>@if(isset($gpDetails->fpmDetails->Fpm_Date)){{$gpDetails->fpmDetails->Fpm_Date}}@endif</td>
               <td>@isset($gpDetails->VendorDetails->VendorName) {{$gpDetails->VendorDetails->VendorName}} @endisset</td>
               <td> @isset($gpDetails->VehicleTypeDetails->VehicleType) {{$gpDetails->VehicleTypeDetails->VehicleType}} @endisset</td>
               <td> @isset($gpDetails->VehicleTypeDetails->Capacity) {{$gpDetails->VehicleTypeDetails->Capacity}} @endisset</td>
               <td>@if(isset($gpDetails->VehicleDetails->VehicleNo)){{$gpDetails->VehicleDetails->VehicleNo}}@endif </td>
               <td>{{$gpDetails->Supervisor}} </td>
               <td>@if(isset($gpDetails->DriverDetails->DriverName)){{$gpDetails->DriverDetails->DriverName}}@endif</td>
               <td>@if(isset($gpDetails->DriverDetails->Phone)){{$gpDetails->DriverDetails->Phone}}@endif</td>
               <td>{{$gpDetails->Seal}}</td>
               <td> @isset($gpDetails->RouteMasterDetails->StatrtPointDetails->CityName) {{$gpDetails->RouteMasterDetails->StatrtPointDetails->CityName}} @endisset</td>
               <td> @isset($gpDetails->RouteMasterDetails->EndPointDetails->CityName) {{$gpDetails->RouteMasterDetails->EndPointDetails->CityName}}  @endisset</td>
               <td></td>
               <td>{{COUNT($gpDetails->getPassDocketDetails)}}</td>
               

            </tr>
            @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $gatePassDetails->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });

 
</script>