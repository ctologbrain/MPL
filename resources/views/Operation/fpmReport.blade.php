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
                   <input type="text" name="formDate"   @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif  class="form-control datepickerOne" placeholder="From Date" tabindex="1" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="2" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="3">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:170px;" class="p-1">FPM Date	</th>	
            <th style="min-width:130px;" class="p-1">Trip Type	</th>	
            <th style="min-width:130px;" class="p-1">FPM Number	 </th>
            <th style="min-width:130px;" class="p-1">Origin</th>	
            <th style="min-width:130px;" class="p-1">Destination</th>	
            <th style="min-width:130px;" class="p-1">Transporter Name	</th>
            <th style="min-width:180px;" class="p-1">Vehicle Model	</th>
             <th style="min-width:130px;" class="p-1" >Capacity</th>
            <th style="min-width:130px;" class="p-1">Vehicle No	</th>   
            <th style="min-width:190px;" class="p-1">Driver Name-Number	</th>
            <th style="min-width:130px;" class="p-1">Reporting Date	</th>

            <th style="min-width:150px;" class="p-1">Total Docket</th>
            <th style="min-width:150px;" class="p-1">Total Box</th>
            <th style="min-width:150px;" class="p-1">Total Box Charge</th>

            <th style="min-width:150px;" class="p-1">Vehicle Trip Tariff</th>
            <th style="min-width:170px;" class="p-1">Adv to be paid	</th>
            <th style="min-width:130px;" class="p-1">Payment Mode</th>
            <th style="min-width:130px;" class="p-1">Adv Type</th>

            <th style="min-width:130px;" class="p-1">Dispatch Date	</th>
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
            @foreach($data as $Fpmdata)
             <?php 
             $i++; ?>
            <tr>


             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{date("d-m-Y H:i:s",strtotime($Fpmdata->Fpm_Date))}}</td>
              <td class="p-1">@if($Fpmdata->Trip_Type ==1){{'OW'}}@else{{'RT'}}@endif</td>
             <td class="p-1"><a href="{{url('print_fpm_Number/'.$Fpmdata->FPMNo)}}" target="_blank">{{$Fpmdata->FPMNo}}</a></td>
             <td class="p-1">{{$Fpmdata->SourceCity}}</td>
              <td class="p-1">{{$Fpmdata->DestCity}}</td>
             <td class="p-1">{{$Fpmdata->VendorName}}</td>
             <td class="p-1">{{$Fpmdata->VehicleType}}</td>
          
             <td class="p-1"> {{$Fpmdata->Weight}}</td>
             <td class="p-1">{{$Fpmdata->VehicleNo}}</td>
             <td class="p-1">{{$Fpmdata->DriverName}}</td>
             <td class="p-1">{{date("d-m-Y",strtotime($Fpmdata->Reporting_Time))}}</td>
             <td class="p-1">{{$Fpmdata->DocketTotal}}</td>
             <td class="p-1"></td>
             <td class="p-1"></td>

             <td class="p-1">{{$Fpmdata->VehicleTarrif}}</td>
             <td class="p-1">{{$Fpmdata->AdvToBePaid}}</td> 
             <td class="p-1">{{$Fpmdata->PaymentMode}}</td>
             <td class="p-1">{{$Fpmdata->AdvType}}</td>

             <td class="p-1">{{date("d-m-Y",strtotime($Fpmdata->vehcile_Load_Date))}}</td>
             <td class="p-1">{{$Fpmdata->Remark}}</td>


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
      autoclose: true,
      todayHighlight: true
      });
     
 
</script>