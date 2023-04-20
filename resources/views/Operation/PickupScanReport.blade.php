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
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--Office name--</option>
                       @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option>
                       @endforeach
                     </select>
                   </div>
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  value="{{ request()->get('formDate') }}" class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" value="{{ request()->get('todate') }}" class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1 pickupSacnReportTable">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:50px;">SL#</th>
            <th style="min-width:130px;">Scan Date</th>
            <th style="min-width:130px;">Branch Name	</th>
            <th style="min-width:130px;">Vehicle Type</th>
            <th style="min-width:130px;">Amount</th>
            <th style="min-width:130px;">Vendor Name</th>	
            <th style="min-width:130px;">Vehicle No</th>	
            <th style="min-width:130px;">Driver Name</th>	
            <th style="min-width:130px;">Docket No</th>	
            <th style="min-width:130px;">Pickup No</th>	
            <th style="min-width:130px;">Start Km</th>	
            <th style="min-width:130px;">End Km</th>	
            <th style="min-width:190px;">Unloading Supervisor Name</th>
            <th style="min-width:130px;">Remarks</th>	
            	
            
         
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
            @foreach($pickupSacn as $pickupSacnList)
            <?php $i++; ?>
            <tr>
             <td>{{$i}}</td>
             <td>{{$pickupSacnList->ScanDate}}</td>
             <td>{{$pickupSacnList->OfficeCode}} ~ {{$pickupSacnList->OfficeName}}</td>
             <td>{{$pickupSacnList->vehicleType}}</td>
             <td>{{$pickupSacnList->advanceToBePaid}}</td>
             <td>{{$pickupSacnList->VendorName}}</td>
             <td>{{$pickupSacnList->VehicleNo}}</td>
             <td>{{$pickupSacnList->DriverName}} ~ {{$pickupSacnList->License}}</td>
             <td>{{$pickupSacnList->Docket}}</td>
             <td>{{$pickupSacnList->PickupNo}}</td>
             <td>{{$pickupSacnList->startkm}}</td>
             <td>{{$pickupSacnList->endkm}}</td>
             <td>{{$pickupSacnList->unloadingSupervisorName}}</td>
             <td>{{$pickupSacnList->remark}}</td>
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $pickupSacn->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });
$(".selectBox").select2();
 
</script>