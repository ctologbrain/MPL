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
                       <option value="">--select--</option>
                       @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option>
                       @endforeach
                     </select>
                   </div>
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}" @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            
          <th style="min-width:130px;" class="p-1">SL#</th>
          <th style="min-width:130px;" class="p-1">Delivery Date</th>
          <th style="min-width:130px;" class="p-1">Delivery Office</th>
            <th style="min-width:130px;" class="p-1">Docket Number</th>

            <th style="min-width:130px;" class="p-1">Booking Branch</th>
            <th style="min-width:130px;" class="p-1">Booking Date</th>
            <th style="min-width:130px;" class="p-1">Client Name</th>
            <th style="min-width:130px;" class="p-1">Origin State</th>
            <th style="min-width:130px;" class="p-1">Origin City</th>
            <th style="min-width:130px;" class="p-1">Pincode</th>

            <th style="min-width:130px;" class="p-1">Destination State</th>
            <th style="min-width:130px;" class="p-1">Destination City</th>
            <th style="min-width:130px;" class="p-1">Pincode</th>
            <th style="min-width:130px;" class="p-1">Pcs</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1">Chg. Wt.</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
            <th style="min-width:130px;" class="p-1">Last Status</th>
            <th style="min-width:130px;" class="p-1"> Delivery Type</th>	
             <th style="min-width:130px;" class="p-1">Edd</th> 	
            <th style="min-width:190px;" class="p-1">TAT Status</th>
            <th style="min-width:130px;" class="p-1">Scan Image </th>	
            	
            
         
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
            @foreach($delivery as $key)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($key->Delivery_date) {{date("d-m-Y H:i:s",strtotime($key->Delivery_date))}} @endisset</td>
              <td class="p-1">@isset($key->RagularOfficeDetails->OfficeCode) {{$key->RagularOfficeDetails->OfficeCode}} ~ {{$key->RagularOfficeDetails->OfficeName}} @endisset</td>
             <td class="p-1">@isset($key->RagularDocketDetails->Docket_No) <a target="_blank" href="{{url('docketTracking?docket=').$key->RagularDocketDetails->Docket_No}}">{{$key->RagularDocketDetails->Docket_No}}</a> @endisset</td>

             <td class="p-1">@isset($key->RagularDocketDetails->offcieDetails->OfficeCode) {{$key->RagularDocketDetails->offcieDetails->OfficeCode}} ~ {{$key->RagularDocketDetails->offcieDetails->OfficeName}} @endisset</td>
              <td class="p-1">{{date("d-m-Y H:i:s",strtotime($key->RagularDocketDetails->Booking_Date))}}</td>
              <td class="p-1">@isset($key->RagularDocketDetails->customerDetails->CustomerCode)  {{$key->RagularDocketDetails->customerDetails->CustomerCode}}~{{$key->RagularDocketDetails->customerDetails->CustomerName}} @endisset</td>
              <td class="p-1">@isset($key->RagularDocketDetails->PincodeDetails->StateDetails->name)  {{$key->RagularDocketDetails->PincodeDetails->StateDetails->StateCode}} ~{{$key->RagularDocketDetails->PincodeDetails->StateDetails->name}} @endisset</td>
              <td class="p-1">@isset($key->RagularDocketDetails->PincodeDetails->CityDetails->Code)  {{$key->RagularDocketDetails->PincodeDetails->CityDetails->Code}} ~{{$key->RagularDocketDetails->PincodeDetails->CityDetails->CityName}} @endisset</td>
              <td class="p-1">@isset($key->RagularDocketDetails->PincodeDetails->PinCode)  {{$key->RagularDocketDetails->PincodeDetails->PinCode}}  @endisset</td>
              <td class="p-1">@isset($key->RagularDocketDetails->DestPincodeDetails->StateDetails->name)  {{$key->RagularDocketDetails->DestPincodeDetails->StateDetails->StateCode}} ~{{$key->RagularDocketDetails->DestPincodeDetails->StateDetails->name}} @endisset</td>
              <td class="p-1"> @isset($key->RagularDocketDetails->DestPincodeDetails->CityDetails->Code)  {{$key->RagularDocketDetails->DestPincodeDetails->CityDetails->Code}} ~{{$key->RagularDocketDetails->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
              <td class="p-1">@isset($key->RagularDocketDetails->DestPincodeDetails->PinCode)  {{$key->RagularDocketDetails->DestPincodeDetails->PinCode}} @endisset</td>
              <td class="p-1"> @isset($key->RagularDocketDetails->DocketProductDetails->Qty) {{$key->RagularDocketDetails->DocketProductDetails->Qty}} @endisset</td>
              <td class="p-1"> @isset($key->RagularDocketDetails->DocketProductDetails->Actual_Weight) {{$key->RagularDocketDetails->DocketProductDetails->Actual_Weight}} @endisset</td>
              <td class="p-1"> @isset($key->RagularDocketDetails->DocketProductDetails->Charged_Weight) {{$key->RagularDocketDetails->DocketProductDetails->Charged_Weight}} @endisset</td>
              <td class="p-1"> @isset($key->RagularDocketDetails->consignoeeDetails) {{$key->RagularDocketDetails->consignoeeDetails->ConsigneeName}} @endisset</td>
              <td class="p-1"> @isset($key->RagularDocketDetails->DocketAllocationDetail->GetStatusWithAllocateDett->title) {{$key->RagularDocketDetails->DocketAllocationDetail->GetStatusWithAllocateDett->title}} @endisset</td>
             <td class="p-1">@isset($key->RagularDocketDetails->DevileryTypeDet->Title) {{$key->RagularDocketDetails->DevileryTypeDet->Title}}  @endisset</td>
             <!-- <td class="p-1">@isset($key->RagularGPDetails->VendorDetails->VendorCode) {{$key->RagularGPDetails->VendorDetails->VendorCode}} ~ {{$key->RagularGPDetails->VendorDetails->VendorName}}  @endisset</td> -->
             <?php 
            if(isset($key->RagularDocketDetails->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->TransitDays)){
            $transit =$key->RagularDocketDetails->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->TransitDays;
            }
            else{
            $transit =0;
            }
            $BookDate =date("Y-m-d",strtotime($key->RagularDocketDetails->Booking_Date));
            $eddDate=date("d-m-Y", strtotime($BookDate."+".$transit." day"));  ?>
            <td class="p-1"> {{$eddDate}}</td>
             <td class="p-1">@isset($key->Remark){{$key->Remark}}  @endisset</td>
             <td class="p-1">@if(isset($key->Doc_Link) && $key->Doc_Link!='') <a target="_blank" href="{{url($key->Doc_Link)}}" class="btn btn-primary p-1">View File</a> @else
             <button disabled class="btn btn-primary p-1">No File</button> 
              @endif </td>
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $delivery->appends(Request::all())->links() !!}
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
      $('.selectBox').select2();

 
</script>