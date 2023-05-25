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
                     <select name="customer" id="customer" class="form-control selectBox" tabindex="1">
                       <option value="">--Customer name--</option>
                       @foreach($customer as $key) 
                       <option value="{{$key->id}}" @if(request()->get('customer') !='' && request()->get('customer')==$key->id){{'selected'}}@endif>{{$key->CustomerCode}}~{{$key->CustomerName}}</option>
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
            <th style="min-width:130px;" class="p-1">Status</th>
            <th style="min-width:130px;" class="p-1">Status date  </th>
            <th style="min-width:130px;" class="p-1">Status Remark</th>
            <th style="min-width:130px;" class="p-1">Docket No.	</th>
            <th style="min-width:130px;" class="p-1">Order Number	</th> 
            <th style="min-width:130px;" class="p-1">Pickup Office</th>  
            <th style="min-width:180px;" class="p-1"> Customer Name</th> 
            <th style="min-width:130px;" class="p-1">Warehouse Name</th> 
            <th style="min-width:130px;" class="p-1">Pickup Date</th> 
            <th style="min-width:130px;" class="p-1">Time</th>  
            <th style="min-width:130px;" class="p-1"> Contact Person</th>  
            <th style="min-width:190px;" class="p-1">Mobile Number</th>
            <th style="min-width:190px;" class="p-1"> Warehouse Address</th>
             <th style="min-width:130px;" class="p-1">Origin Pincode</th> 
            <th style="min-width:130px;" class="p-1"> Origin City </th> 
            <th style="min-width:130px;" class="p-1">Pcs</th> 
            <th style="min-width:130px;" class="p-1"> Weight</th> 
            <th style="min-width:130px;" class="p-1"> Dest. Pincode </th> 
            <th style="min-width:130px;" class="p-1"> Destination City </th> 
           	 <th style="min-width:130px;" class="p-1"> Sale Reference</th> 
             <th style="min-width:130px;" class="p-1">Reference Name</th> 
             <th style="min-width:130px;" class="p-1">Bill To</th> 
             <th style="min-width:130px;" class="p-1">Contents</th> 
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
            @foreach($pickupRequest as $pickupSacnList)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{$pickupSacnList->OrderNo}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">@isset($pickupSacnList->CustomerDetails->CustomerCode) {{$pickupSacnList->CustomerDetails->CustomerCode}} ~ {{$pickupSacnList->CustomerDetails->CustomerName}} @endisset</td>
             <td class="p-1">{{$pickupSacnList->store_name}}</td>
             <td class="p-1">{{date("d-m-Y", strtotime($pickupSacnList->pickup_date))}}</td>
             <td class="p-1">{{date("H:i:s", strtotime($pickupSacnList->pickup_date))}}</td>
             <td class="p-1">{{$pickupSacnList->contactPersonName}}</td>
             
             <td class="p-1">{{$pickupSacnList->mobile_no}}</td>
             <td class="p-1">{{$pickupSacnList->warehouse_address}}</td>
             <td class="p-1">@isset($pickupSacnList->PincodeOriginDetails->PinCode) {{$pickupSacnList->PincodeOriginDetails->PinCode}} @endisset</td>
             <td class="p-1">@isset($pickupSacnList->PincodeOriginDetails->CityDetails->Code) {{$pickupSacnList->PincodeOriginDetails->CityDetails->Code}} ~ {{$pickupSacnList->PincodeOriginDetails->CityDetails->CityName}} @endisset</td>
             <td class="p-1">{{$pickupSacnList->pieces}}</td>
             <td class="p-1">{{$pickupSacnList->weight}}</td>
             <td class="p-1">@isset($pickupSacnList->PincodeDestDetails->PinCode) {{$pickupSacnList->PincodeDestDetails->PinCode}} @endisset</td>
            
            <td class="p-1">@isset($pickupSacnList->PincodeDestDetails->CityDetails->Code) {{$pickupSacnList->PincodeDestDetails->CityDetails->Code}} ~ {{$pickupSacnList->PincodeDestDetails->CityDetails->CityName}} @endisset</td>
             <td class="p-1">{{$pickupSacnList->sale_refere}}</td>
             <td class="p-1">{{$pickupSacnList->reference_name}}</td>
             <td class="p-1">{{$pickupSacnList->bill_to}}</td>
             <td class="p-1">@isset($pickupSacnList->contentDetails->Contents) {{$pickupSacnList->contentDetails->Contents}} @endisset </td>
             <td class="p-1">{{$pickupSacnList->remark}}</td>
             
             <!-- <td class="p-1">@isset($pickupSacnList->userDetails->empOffDetail->EmployeeCode) {{$pickupSacnList->userDetails->empOffDetail->EmployeeCode}} ~ {{$pickupSacnList->userDetails->empOffDetail->EmployeeName}} @endisset </td> -->
             <!-- <td class="p-1">{{$pickupSacnList->valumetric}}</td>
             <td class="p-1">{{$pickupSacnList->volumetric_weight}}</td> -->
           </tr>
           @endforeach
           
         </tbody>
        </table>
      </div>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $pickupRequest->appends(Request::all())->links() !!}
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