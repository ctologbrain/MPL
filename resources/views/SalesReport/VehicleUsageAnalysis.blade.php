@include('layouts.appThree')
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
                     <select name="vehicle" id="vehicle" class="form-control selectBox" tabindex="1">
                       <option value="">--select Vehicle--</option>
                        @foreach($vehicle as $key) 
                       <option value="{{$key->id}}" @if(request()->get('vehicle') !='' && request()->get('vehicle')==$key->id){{'selected'}}@endif>{{$key->VehicleNo}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="Vendor" id="Vendor" class="form-control selectBox" tabindex="1">
                       <option value="">--select Vendor--</option>
                        @foreach($vendor as $key) 
                       <option value="{{$key->id}}" @if(request()->get('Vendor') !='' && request()->get('Vendor')==$key->id){{'selected'}}@endif>{{$key->VendorCode}}~{{$key->VendorName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="originCity" id="originCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select origin City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->id}}" @if(request()->get('originCity') !='' && request()->get('originCity')==$key->id){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="DestCity" id="DestCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select Destination City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->id}}" @if(request()->get('DestCity') !='' && request()->get('DestCity')==$key->id){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
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
                           <a href="{{url('VehicleUsageAnalysReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$vehicleData->total()}}</span></div>   
                    
                    </div>
                    </div>
                   
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Origin  </th>
            <th style="min-width:150px;" class="p-1">FPM No	</th>
            <th style="min-width:160px;" class="p-1">FPM Date</th>
           
            <th style="min-width:130px;" class="p-1">Vendor Name</th>	
            <th style="min-width:160px;" class="p-1">Vehicle Model</th>	
           
            <th style="min-width:130px;" class="p-1">Vehicle No</th>	

            <!-- remove -->
            <th style="min-width:130px;" class="p-1">Capacity</th>
            <th style="min-width:130px;" class="p-1">Total GP</th>	
            
            <th style="min-width:130px;" class="p-1"> Total Dockets	</th>
            <th style="min-width:130px;" class="p-1"> Actual Wt</th>
            		
            
            <th style="min-width:130px;" class="p-1">Charge Wt	</th>

             <th style="min-width:130px;" class="p-1">Vehicle Hire Amount</th>
            <th style="min-width:130px;" class="p-1">Sale Amt</th>

            <th style="min-width:130px;" class="p-1">Difference</th>
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
            @foreach($vehicleData as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{$DockBookData->OrgCode}} ~ {{$DockBookData->OrgCityName}}</td>
             <td class="p-1">{{$DockBookData->FPMNo}}</td>
             <td class="p-1">{{date("d-m-Y", strtotime($DockBookData->Fpm_Date))}}</td>
             <td class="p-1">{{$DockBookData->VendorCode}} ~{{$DockBookData->VendorName}}</td>
             <td class="p-1">{{$DockBookData->VehicleType}}</td>
             <td class="p-1">{{$DockBookData->VehicleNo}}</td>
             <td class="p-1">{{$DockBookData->Capacity}}</td>
             <td class="p-1"><a href="javascript:void(0);" onclick="OpenDetailsOfvehicle('{{$DockBookData->VID}}');" >{{$DockBookData->TotalGP}} </a></td>
             <td class="p-1">{{$DockBookData->TotalDocket}}</td>
             <td class="p-1">{{$DockBookData->TotalActualWT}}</td>
             <td class="p-1">{{$DockBookData->TotalChargeWT}}</td>
             <td class="p-1">{{'0.00'}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{''}}</td>
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $vehicleData->appends(Request::all())->links() !!}
        </div>

        
        </div> <!-- end col -->
      

    </div>
</div>
<div class="loader"></div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
       todayHighlight: true
      });
     
    $(".selectBox").select2();
 

 function OpenDetailsOfvehicle(vehicle){
    var base_url = '{{url('')}}';
    var formDate= '{{request()->get("formDate")}}';
    var todate= '{{request()->get("todate")}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/VehicleUsageAnalysisInner',
       cache: false,
       data: {
           'vehicle':vehicle,'formDate':formDate,'todate':todate
       },
       success: function(data) {
        $(".loader").html(data);
  
       }
     });
 }
</script>