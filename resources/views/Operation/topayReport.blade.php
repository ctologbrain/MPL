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
                     <select name="office" id="office" class="form-control" tabindex="1">
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
          <tr>
            
            <th style="min-width:130px;">SL#</th>
            <th style="min-width:130px;">Docket Number</th>
            <th style="min-width:130px;">Date</th>
            <th style="min-width:130px;">Collection Type</th>
            <th style="min-width:130px;">Collection Amount</th>
            <th style="min-width:130px;">Bank Name</th>	
            <th style="min-width:130px;">Collection Remarks</th>	
            <th style="min-width:130px;">Deposite Date</th>	
            <th style="min-width:130px;">Deposite At</th>	
             <th style="min-width:130px;">Deposite Branch</th> 
            <th style="min-width:130px;">Deposite Amount</th>	
            <th style="min-width:130px;">Deposite In Bank</th>	
            <th style="min-width:130px;">Deposite Account Number</th>	
            <th style="min-width:190px;">Deposite Remarks</th>
            <th style="min-width:130px;">File </th>	
            	
            
         
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
             <td>{{$i}}</td>
              <td>@isset($key->DocketMasterInfo->Docket_No){{$key->DocketMasterInfo->Docket_No}} @endisset</td>
             <td>@isset($key->Date) {{$key->Date}} @endisset</td>
             <td>{{$key->Type}}</td>
             <td>{{$key->Amt}}</td>
             <td>@isset($key->DocketcalBankInfo->BankCode){{$key->DocketcalBankInfo->BankCode}}  ~ {{$key->DocketcalBankInfo->BankName}}  @endisset</td>
             <td>{{$key->Remark}}</td>
             <td>@isset($key->DocketDepositInfo->Date) {{$key->DocketDepositInfo->Date}}  @endisset</td>
             <td>@isset($key->DocketDepositInfo->DepositAt){{$key->DocketDepositInfo->DepositAt}}  @endisset</td>
             <td>@isset($key->DocketDepositInfo->DocketBranchInfo->OfficeCode) {{$key->DocketDepositInfo->DocketBranchInfo->OfficeCode}} ~  {{$key->DocketDepositInfo->DocketBranchInfo->OfficeName}} @endisset</td>
             <td>@isset($key->DocketDepositInfo->Amt){{$key->DocketDepositInfo->Amt}}  @endisset</td>
             <td>@isset($key->DocketDepositInfo->DocketBankInfo->BankCode){{$key->DocketDepositInfo->DocketBankInfo->BankCode}}~{{$key->DocketDepositInfo->DocketBankInfo->BankName}}  @endisset</td>
             <td>@isset($key->DocketDepositInfo->Branch){{$key->DocketDepositInfo->Branch}}  @endisset</td>
             <td>@isset($key->DocketDepositInfo->Remark){{$key->DocketDepositInfo->Remark}}  @endisset</td>
             <td>@isset($key->DocketDepositInfo->Attachment) <a target="_blank" href="{{url($key->DocketDepositInfo->Attachment)}}" class="btn btn-primary p-1">View</a> @endisset</td>
             
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
   

 
</script>