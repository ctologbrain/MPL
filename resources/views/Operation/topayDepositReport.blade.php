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
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}" @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3">
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

            <th style="min-width:130px;" class="p-1">Deposite Date</th>	
            <th style="min-width:130px;" class="p-1">Deposite At</th>	
             <th style="min-width:130px;" class="p-1">Deposite Branch</th> 
            <th style="min-width:130px;" class="p-1">Deposite Amount</th>	
            <th style="min-width:130px;" class="p-1">Deposite In Bank</th>	
            <th style="min-width:190px;" class="p-1">Deposite Account Number</th>	
            <th style="min-width:190px;" class="p-1">Deposite Remarks</th>
            <th style="min-width:130px;" class="p-1">File </th>	
            	
            
         
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
              <td class="p-1">{{$key->DocketMasterInfo->Booking_Date}}</td>
              <td class="p-1">@isset($key->DocketMasterInfo->customerDetails->CustomerCode)  {{$key->DocketMasterInfo->customerDetails->CustomerCode}}~{{$key->DocketMasterInfo->customerDetails->CustomerName}} @endisset</td>
              <td class="p-1">@isset($key->DocketMasterInfo->PincodeDetails->CityDetails->Code)  {{$key->DocketMasterInfo->PincodeDetails->CityDetails->Code}} ~{{$key->DocketMasterInfo->PincodeDetails->CityDetails->CityName}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DestPincodeDetails->CityDetails->Code)  {{$key->DocketMasterInfo->DestPincodeDetails->CityDetails->Code}} ~{{$key->DocketMasterInfo->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DocketProductDetails->DocketProdductDetails->Qty) {{$key->DocketMasterInfo->DocketProductDetails->DocketProdductDetails->Qty}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DocketProductDetails->DocketProdductDetails->Actual_Weight) {{$key->DocketMasterInfo->DocketProductDetails->DocketProdductDetails->Actual_Weight}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->DocketProductDetails->DocketProdductDetails->Charged_Weight) {{$key->DocketMasterInfo->DocketProductDetails->DocketProdductDetails->Charged_Weight}} @endisset</td>
              <td class="p-1"> @isset($key->DocketMasterInfo->consignoeeDetails) {{$key->DocketMasterInfo->consignoeeDetails->ConsigneeName}} @endisset</td>

             <td class="p-1">@isset($key->Date) {{$key->Date}}  @endisset</td>
             <td class="p-1">@isset($key->DepositAt){{$key->DepositAt}}  @endisset</td>
             <td class="p-1">@isset($key->DocketBranchInfo->OfficeCode) {{$key->DocketBranchInfo->OfficeCode}} ~  {{$key->DocketBranchInfo->OfficeName}} @endisset</td>
             <td class="p-1">@isset($key->Amt){{$key->Amt}}  @endisset</td>
             <td class="p-1">@isset($key->DocketBankInfo->BankCode){{$key->DocketBankInfo->BankCode}}~{{$key->DocketBankInfo->BankName}}  @endisset</td>
             <td class="p-1">@isset($key->Branch){{$key->Branch}}  @endisset</td>
             <td class="p-1">@isset($key->Remark){{$key->Remark}}  @endisset</td>
             <td class="p-1">@if(isset($key->Attachment) && $key->Attachment!='') <a target="_blank" href="{{url($key->Attachment)}}" class="btn btn-primary p-1">View</a> @else
             <a  href="javascript:void(0);" class="btn btn-primary p-1">View</a> 
              @endif </td>
             
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
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true
      });
      $('.selectBox').select2();

 
</script>