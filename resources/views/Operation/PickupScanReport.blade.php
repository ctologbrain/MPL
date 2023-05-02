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
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--Office name--</option>
                       @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option>
                       @endforeach
                     </select>
                   </div>
                  
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
            <th style="min-width:130px;" class="p-1">Scan Date</th>
            <th style="min-width:130px;" class="p-1">Branch Name  </th>
            <th style="min-width:130px;" class="p-1">Vehicle Type</th>
            <th style="min-width:130px;" class="p-1">Amount</th>
            <th style="min-width:130px;" class="p-1">Vendor Name</th> 
            <th style="min-width:130px;" class="p-1">Vehicle No</th>  
            <th style="min-width:180px;" class="p-1">Driver Name</th> 
            <th style="min-width:130px;" class="p-1">Docket No</th> 
            <th style="min-width:130px;" class="p-1">Pickup No</th> 
            <th style="min-width:130px;" class="p-1">Start Km</th>  
            <th style="min-width:130px;" class="p-1">End Km</th>  
            <th style="min-width:190px;" class="p-1">Unloading Supervisor Name</th>
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
            @foreach($pickupSacn as $pickupSacnList)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{$pickupSacnList->ScanDate}}</td>
             <td class="p-1">{{$pickupSacnList->OfficeCode}} ~ {{$pickupSacnList->OfficeName}}</td>
             <td class="p-1">{{$pickupSacnList->vehicleType}}</td>
             <td class="p-1">{{$pickupSacnList->advanceToBePaid}}</td>
             <td class="p-1">{{$pickupSacnList->VendorName}}</td>
             <td class="p-1">{{$pickupSacnList->VehicleNo}}</td>
             <td class="p-1">{{$pickupSacnList->DriverName}} ~ {{$pickupSacnList->License}}</td>
             <td class="p-1">{{$pickupSacnList->Docket}}</td>
             <td class="p-1">{{$pickupSacnList->PickupNo}}</td>
             <td class="p-1">{{$pickupSacnList->startkm}}</td>
             <td class="p-1">{{$pickupSacnList->endkm}}</td>
             <td class="p-1">{{$pickupSacnList->unloadingSupervisorName}}</td>
             <td class="p-1">{{$pickupSacnList->remark}}</td>
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
      </div>
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
      autoclose: true,
      todayHighlight: true
      });
$(".selectBox").select2();
 
</script>