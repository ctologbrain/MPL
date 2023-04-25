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
                   <input type="text" name="formDate"  value="{{ request()->get('formDate') }}" class="form-control datepickerOne" placeholder="From Date" tabindex="1" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" value="{{ request()->get('todate') }}" class="form-control datepickerOne" placeholder="To Date" tabindex="2" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="3">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th style="min-width:100px;">SL#</th>
            <th style="min-width:130px;">FPM Date	</th>	
            <th style="min-width:130px;">Trip Type	</th>	
            <th style="min-width:130px;">FPM Number	 </th>
            <th style="min-width:130px;">Origin</th>	
            <th style="min-width:130px;">Destination</th>	
            <th style="min-width:130px;">Transporter Name	</th>
            <th style="min-width:180px;">Vehicle Model	</th>
             <th style="min-width:130px;">Capacity</th>
            <th style="min-width:130px;">Vehicle No	</th>   
            <th style="min-width:190px;">Driver Name-Number	</th>
            <th style="min-width:130px;">Reporting Date	</th>
            <th style="min-width:130px;">Dispatch Date	</th>
            <th style="min-width:130px;">Remarks</th>
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($data as $Fpmdata)
             <?php 
             $i++; ?>
            <tr>


             <td>{{$i}}</td>
             <td>{{$Fpmdata->Fpm_Date}}</td>
              <td>@if($Fpmdata->Trip_Type ==1){{'OW'}}@else{{'RT'}}@endif</td>
             <td><a href="{{url('print_fpm_Number/'.$Fpmdata->FPMNo)}}" target="_blank">{{$Fpmdata->FPMNo}}</a></td>
             <td>{{$Fpmdata->SourceCity}}</td>
              <td>{{$Fpmdata->DestCity}}</td>
             <td>{{$Fpmdata->VendorName}}</td>
             <td>{{$Fpmdata->VehicleType}}</td>
          
             <td>{{$Fpmdata->Weight}}</td>
             <td>{{$Fpmdata->VehicleNo}}</td>
             <td>{{$Fpmdata->DriverName}}</td>
             <td>{{$Fpmdata->Reporting_Time}}</td>
             <td>{{$Fpmdata->vehcile_Load_Date}}</td>
             <td>{{$Fpmdata->Remark}}</td>


             <!-- remove -->
            
           
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $data->appends(Request::all())->links() !!}
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