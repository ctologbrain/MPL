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
                     <select name="office" id="office" class="form-control">
                       <option value="">--select--</option>
                        @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option>
                       @endforeach
                     </select>
                   </div>
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  value="{{ request()->get('formDate') }}" class="form-control datepickerOne" placeholder="From Date">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" value="{{ request()->get('todate') }}" class="form-control datepickerOne" placeholder="To Date">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th style="min-width:130px;">SL#</th>
            <th style="min-width:130px;">Date</th>
             <th style="min-width:130px;">Booking Type</th>
             <th style="min-width:130px;">Delivery Type</th>
            <th style="min-width:130px;">Origin State   </th>
            <th style="min-width:130px;">Origin City</th>
            <th style="min-width:130px;">Org. Pincode</th>
            <th style="min-width:130px;">Dest. City</th>	
            <th style="min-width:130px;">Dest. State</th>	
            <th style="min-width:130px;">Dest. Pincode</th>	

            <!-- remove -->
            <th style="min-width:130px;">Zone</th>	
            <th style="min-width:130px;">Mode</th>	

             <th style="min-width:130px;">Office </th>
             <th style="min-width:130px;">Customer </th>
            <th style="min-width:130px;">Product</th>	
            
            <th style="min-width:130px;">Docket No. </th>	
            <th style="min-width:130px;">Reference No</th>
            <th style="min-width:130px;">PO Number</th>

            <!-- remove -->
             <th style="min-width:130px;">Vendor Name</th>
            <th style="min-width:130px;">Vehicle No.</th>   
            <th style="min-width:190px;">Gatepass No.</th>
            <th style="min-width:130px;">Client Category</th>
            <th style="min-width:130px;">CS Person</th>
            <th style="min-width:130px;">Client Code</th>
            <th style="min-width:130px;">Client Name</th>
            <th style="min-width:130px;">Consignor Name</th>
            <th style="min-width:130px;">Consignee Name</th>
            <th style="min-width:130px;">Dimension</th>    
            <th style="min-width:130px;">Goods Value</th>
            <th style="min-width:130px;">eWayBill</th>
            <th style="min-width:130px;">Pcs.</th>
            <th style="min-width:130px;">Act. Wt.</th>
            <th style="min-width:130px;">Chrg. Wt.</th>
            <th style="min-width:130px;">Delivery Type</th>
            <th style="min-width:130px;">Sale Type</th>
            <th style="min-width:130px;">Branch</th>
            <th style="min-width:130px;">Delivery Agent</th>
            <th style="min-width:130px;">Delivery Agent Date</th>    
            <th style="min-width:130px;">Vehicle Arrival Date</th>
            <th style="min-width:130px;">DRS Number</th>


            <th style="min-width:130px;">Packing M</th>
            <th style="min-width:130px;">Qty</th>
            <th style="min-width:130px;">Is Volume</th>
            <th style="min-width:130px;">Actual Weight</th>
            <th style="min-width:130px;">Charged Weight</th>
            <th style="min-width:130px;">Type</th>
            <th style="min-width:130px;">Invoice No</th>
            <th style="min-width:130px;">Invoice Date</th>    
            <th style="min-width:130px;">Description</th>
            <th style="min-width:130px;">Amount</th>
            <th style="min-width:130px;">EWB No</th>
            <th style="min-width:130px;">EWB Date </th>
            <th style="min-width:130px;">Consigner</th>
            <th style="min-width:130px;">Consignee</th>
            <th style="min-width:130px;">COD Amount</th>
            <th style="min-width:130px;">DOD Amount</th>
            <th style="min-width:130px;">Booked By</th>
            <th style="min-width:130px;">Booked At</th>
            <th style="min-width:130px;">Remark   </th>
            <th style="min-width:130px;">Scan Image Status</th>
         
            	
            
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($DocketBookingData as $DockBookData)
            <?php $i++; ?>
            <tr>


             <td>{{$i}}</td>
             <td>{{$DockBookData->Booking_Date}}</td>
             <td>{{$DockBookData->BookingType}}</td>
             <td>{{$DockBookData->Title}}</td>
             <td>{{$DockBookData->name}}</td>
             <td>{{$DockBookData->Code}} ~ {{$DockBookData->CityName}}</td>
             <td>{{$DockBookData->PinCode}}</td>
             <td>{{$DockBookData->DestSName}}</td>
             <td>{{$DockBookData->DestCityCode}} ~ {{$DockBookData->DestCityName}}</td>
             <td>{{$DockBookData->DestNPin}}</td>
             <!-- remove -->
             <td>{{''}}</td>
              <td>{{'Road'}}</td>

              <td>{{$DockBookData->OfficeName}}</td>
              <td>{{$DockBookData->CustomerCode}} ~ {{$DockBookData->CustomerName}}</td>
              <td>{{$DockBookData->D_Product}}</td>
              <td>{{$DockBookData->Docket_No}}</td>
             <td>{{$DockBookData->Ref_No}}</td>
             <td>{{$DockBookData->PO_No}}</td>

             <!-- remove -->
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
            <td>{{''}}</td>
             <td>{{''}}</td>
            <td>{{''}}</td>
             <td>{{''}}</td>
            <td>{{''}}</td>
            
             <td>{{''}}</td>
             <td>{{''}}</td>
             <td>{{''}}</td>
            <td>{{''}}</td>
             <td>{{''}}</td>
            <td>{{''}}</td>
             <td>{{''}}</td>
            <td>{{''}}</td>
             <td>{{''}}</td>
            <td>{{''}}</td>
           <td>{{''}}</td>
            <td>{{''}}</td>

             <td>{{$DockBookData->Packing_M}}</td>
             <td>{{$DockBookData->Qty}}</td>
             <td>{{$DockBookData->Is_Volume}}</td>
             <td>{{$DockBookData->Actual_Weight}}</td>
             <td>{{$DockBookData->Charged_Weight}}</td>
             <td>{{$DockBookData->InvTitle}}</td>
             <td>{{$DockBookData->Invoice_No}}</td>
             <td>{{$DockBookData->Invoice_Date}}</td>
             <td>{{$DockBookData->Description}}</td>
             <td>{{$DockBookData->Amount}}</td>
             <td>{{$DockBookData->EWB_No}}</td>
             <td>{{$DockBookData->EWB_Date}}</td>

            <td>{{$DockBookData->ConsignorName}}</td>
             <td>{{$DockBookData->consignee}}</td>
             <td>{{$DockBookData->CODAmount}}</td>
             <td>{{$DockBookData->DODAmount}}</td>
             <td>{{$DockBookData->EmployeeName}}</td>
           <td>{{$DockBookData->Booked_At}}</td>
              <td>{{$DockBookData->Remark}}</td>
             <td>{{'NO'}}</td>
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $DocketBookingData->appends(Request::all())->links() !!}
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