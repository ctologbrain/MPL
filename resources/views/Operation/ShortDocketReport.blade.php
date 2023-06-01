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
                        @foreach($office as $offcice) 
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
                           <a href="{{url('ShortDocketReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                   <b>Total Record :</b> {{$docket->Total()}}
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:50px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Short Date </th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:150px;" class="p-1">Book Date</th>
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Received Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:190px;" class="p-1">Customer</th>
            
            <th style="min-width:190px;" class="p-1">Gatepass No.</th>
            <th style="min-width:130px;" class="p-1">Short Declared  Office</th>
            <th style="min-width:190px;" class="p-1">Short Declared By</th>
            <th style="min-width:190px;" class="p-1"> Last Activity</th>
            <th style="min-width:190px;" class="p-1"> Activity Date</th>
            <th style="min-width:160px;" class="p-1">Pickup City</th>
            <th style="min-width:160px;" class="p-1">Destination City</th>

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
            @foreach($docket as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($DockBookData->Created_At) {{date("d-m-Y",strtotime($DockBookData->Created_At))}} @endisset</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">@isset($DockBookData->DocketGPDataDetails->Booking_Date) {{date("d-m-Y",strtotime($DockBookData->DocketGPDataDetails->Booking_Date))}} @endisset</td>
             <td class="p-1" >@if(isset($DockBookData->DocketGPDataDetails->DocketProductDetails)){{$DockBookData->DocketGPDataDetails->DocketProductDetails->Qty}}@endif</td>

             <td class="p-1">@isset($DockBookData->Recv_Qty) {{$DockBookData->Recv_Qty}} @endisset</td>
            <td class="p-1">@if(isset($DockBookData->DocketGPDataDetails->DocketProductDetails)){{$DockBookData->DocketGPDataDetails->DocketProductDetails->Actual_Weight}}@endif</td>

             <td class="p-1">@isset($DockBookData->DocketGPDataDetails->customerDetails->CustomerCode) {{$DockBookData->DocketGPDataDetails->customerDetails->CustomerCode}} ~ {{$DockBookData->DocketGPDataDetails->customerDetails->CustomerName}}  @endisset</td>
             <td class="p-1">@isset($DockBookData->GetPassRecivingDetails->GetVehicleGatepassDet->GP_Number) <a href="{{url('print_gate_Number').'/'.$DockBookData->GetPassRecivingDetails->GetVehicleGatepassDet->GP_Number}}"> {{$DockBookData->GetPassRecivingDetails->GetVehicleGatepassDet->GP_Number}} </a> @endisset</td>
             <td class="p-1">@isset($DockBookData->GetPassRecivingDetails->GetPassReciveDet->OfficeCode) {{$DockBookData->GetPassRecivingDetails->GetPassReciveDet->OfficeCode}} ~ {{$DockBookData->GetPassRecivingDetails->GetPassReciveDet->OfficeName}} @endisset </td>
             <td class="p-1"> @isset($DockBookData->GetPassRecivingDetails->DocketDetailUser->empOffDetail->EmployeeCode) {{$DockBookData->GetPassRecivingDetails->DocketDetailUser->empOffDetail->EmployeeCode}} ~ {{$DockBookData->GetPassRecivingDetails->DocketDetailUser->empOffDetail->EmployeeName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DocketGPDataDetails->DocketAllocationDetail->GetStatusWithAllocateDett->title) {{$DockBookData->DocketGPDataDetails->DocketAllocationDetail->GetStatusWithAllocateDett->title}} @endisset </td>
              <td class="p-1">@isset($DockBookData->DocketGPDataDetails->DocketAllocationDetail->BookDate) {{date("d-m-Y" ,strtotime($DockBookData->DocketGPDataDetails->DocketAllocationDetail->BookDate))}} @endisset </td>

              <td class="p-1">@isset($DockBookData->DocketGPDataDetails->PincodeDetails->CityDetails->Code) {{$DockBookData->DocketGPDataDetails->PincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DocketGPDataDetails->PincodeDetails->CityDetails->CityName}} @endisset</td>
              <td class="p-1">@isset($DockBookData->DocketGPDataDetails->DestPincodeDetails->CityDetails->Code)
                {{$DockBookData->DocketGPDataDetails->DestPincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DocketGPDataDetails->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $docket->appends(Request::all())->links() !!}
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