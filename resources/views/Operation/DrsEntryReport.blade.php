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
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}" @else value="{{date('Y-m-d')}}" @endif class="form-control datepickerOne" placeholder="From Date" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}" @else value="{{date('Y-m-d')}}" @endif  class="form-control datepickerOne" placeholder="To Date" autocomplete="off">
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
            <th style="min-width:230px;">DSR No</th>	
            <th style="min-width:130px;">Office</th>	
            <th style="min-width:130px;">Delivery Boy</th>
            <th style="min-width:130px;">Delivery Date 	</th>
            <th style="min-width:130px;">Vehcile Type</th>	
            <th style="min-width:130px;">Vehicle No</th>	
            <th style="min-width:130px;">RFQ Number</th>
            <th style="min-width:180px;">Market Hire Amount</th>
            <th style="min-width:130px;">Driver Name</th>
            <th style="min-width:130px;">Open Km</th>     
             <th style="min-width:130px;">Mobile No.</th>   
              <th style="min-width:130px;">Supervisor</th>   
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($DsrData as $key)
             <?php 
             $i++; 
             if($key->Vehcile_Type==0){
                $vehicle='';
             }
             elseif($key->Vehcile_Type==1){
                $vehicle='SELF';
             }
             elseif($key->Vehcile_Type==2){
                 $vehicle='VENDOR';
             }
             elseif($key->Vehcile_Type==3){
                 $vehicle='MARKET VEHICLE';
             }
             elseif($key->Vehcile_Type==4){
                 $vehicle='VEHICLE RFQ';
             }
             
             ?>
            <tr>


             <td>{{$i}}</td>
             
             <td>{{$key->DRS_No}}</td>
              <td>{{$key->GetOfficeCodeNameDett->OfficeCode}}~{{$key->GetOfficeCodeNameDett->OfficeName}}</td>
              <td>{{$key->getDeliveryBoyNameDett->EmployeeCode}}~{{$key->getDeliveryBoyNameDett->EmployeeName}}</td>
              <td>{{date('Y-m-d', strtotime($key->Delivery_Date))}}</td>
             <td>{{$vehicle}}</td>
             <td>{{$key->getVehicleNoDett->VehicleNo}}</td>
             <td>{{$key->RFQ_Number}}</td>
          
             <td>{{$key->Market_Hire_Amount}}</td>
                <td>{{$key->DriverName}}</td>
             
             <td>{{$key->OpenKm}}</td>
             <td>{{$key->Mob}}</td>
             <td>{{$key->Supervisor}}</td>

             
           
            
             

             <!-- remove -->
            
           
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
    </div>
        <div class="d-flex d-flex justify-content-between">
        {!! $DsrData->appends(Request::all())->links() !!}
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