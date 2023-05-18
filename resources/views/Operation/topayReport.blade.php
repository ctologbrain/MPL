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
            <th style="min-width:130px;" class="p-1">Docket Number</th>
            <th style="min-width:130px;" class="p-1">Booking Branch</th>
            <th style="min-width:130px;" class="p-1">Booking Date</th>
            <th style="min-width:130px;" class="p-1">Client Name</th>
            <th style="min-width:130px;" class="p-1">Origin City</th>
            <th style="min-width:130px;" class="p-1">Destination City</th>
            <th style="min-width:130px;" class="p-1">Pcs</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1">Chg. Wt.</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
            <th style="min-width:130px;" class="p-1">Last Status</th>
            <th style="min-width:130px;" class="p-1">Date</th>
            <th style="min-width:130px;" class="p-1">Collection Type</th>
            <th style="min-width:130px;" class="p-1">Collection Amount</th>
            <th style="min-width:130px;" class="p-1">Bank Name</th>	
            <th style="min-width:180px;" class="p-1">Collection Remarks</th>	
            	
            
         
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
            @foreach($AllTopay as $key)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
              <td class="p-1">@isset($key->DocketMasterInfo->Docket_No){{$key->DocketMasterInfo->Docket_No}} @endisset</td>

              <td class="p-1">@isset($key->DocketMasterInfo->offcieDetails->OfficeCode) {{$key->DocketMasterInfo->offcieDetails->OfficeCode}} ~ {{$key->DocketMasterInfo->offcieDetails->OfficeName}} @endisset</td>
              <td class="p-1">{{date("d-m-Y H:i:s",strtotime($key->DocketMasterInfo->Booking_Date))}}</td>
              <td class="p-1">@isset($key->DocketMasterInfo->customerDetails->CustomerCode)  {{$key->DocketMasterInfo->customerDetails->CustomerCode}}~{{$key->DocketMasterInfo->customerDetails->CustomerName}} @endisset</td>
              <td class="p-1">@isset($key->DocketMasterInfo->PincodeDetails->CityDetails->Code)  {{$key->DocketMasterInfo->PincodeDetails->CityDetails->Code}} ~{{$key->DocketMasterInfo->PincodeDetails->CityDetails->CityName}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DestPincodeDetails->CityDetails->Code)  {{$key->DocketMasterInfo->DestPincodeDetails->CityDetails->Code}} ~{{$key->DocketMasterInfo->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DocketProductDetails->Qty) {{$key->DocketMasterInfo->DocketProductDetails->Qty}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DocketProductDetails->Actual_Weight) {{$key->DocketMasterInfo->DocketProductDetails->Actual_Weight}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DocketProductDetails->Charged_Weight) {{$key->DocketMasterInfo->DocketProductDetails->Charged_Weight}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->consignoeeDetails->ConsigneeName) {{$key->DocketMasterInfo->consignoeeDetails->ConsigneeName}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DocketAllocationDetail->GetStatusWithAllocateDett->title) {{$key->DocketMasterInfo->DocketAllocationDetail->GetStatusWithAllocateDett->title}} @endisset</td>
             <td class="p-1">@isset($key->Date) {{date("d-m-Y",strtotime($key->Date))}} @endisset</td>
             <td class="p-1">{{$key->Type}}</td>
             <td class="p-1">{{$key->Amt}}</td>
             <td class="p-1">@isset($key->DocketcalBankInfo->BankCode){{$key->DocketcalBankInfo->BankCode}}  ~ {{$key->DocketcalBankInfo->BankName}}  @endisset</td>
             <td class="p-1">{{$key->Remark}} </td>
            
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $AllTopay->appends(Request::all())->links() !!}
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