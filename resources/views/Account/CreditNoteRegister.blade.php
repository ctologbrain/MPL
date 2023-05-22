@include('layouts.appThree')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sales</a></li>
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
                    <select class="form-control selectBox" name="customer">
                        <option value="">--Select Customer--</option>
                        @foreach($customer as $key)
                          <option  @if( request()->get('customer')==$key->id) selected @endif value="{{$key->id}}">{{$key->CustomerCode}}~{{$key->CustomerName}}</option>
                        @endforeach
                    </select>
                    </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  value="{{ request()->get('formDate') }}" class="form-control datepickerOne" placeholder="From Date" tabindex="1">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" value="{{ request()->get('todate') }}" class="form-control datepickerOne" placeholder="To Date" tabindex="2">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="3">Search</button>
                          </div> 
                    </form>
                    <div class="col-12">
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:160px;" class="p-1">	CN No.</th>	
            <th style="min-width:200px;" class="p-1"> CN Date	</th>
            <th style="min-width:160px;" class="p-1">Credit Amount</th>	
            <th style="min-width:130px;" class="p-1">CGST</th>	
            <th style="min-width:130px;" class="p-1">SGST </th>
            <th style="min-width:130px;" class="p-1">IGST</th>   
            <th style="min-width:130px;" class="p-1">CN Total	</th>	
            <th style="min-width:190px;" class="p-1"> CN Remarks </th>


            <th style="min-width:150px;" class="p-1">Invoice Date</th>
            <th style="min-width:150px;" class="p-1">Billing Period</th>
            <th style="min-width:160px;" class="p-1">Client Name</th>  
            <th style="min-width:150px;" class="p-1">Invoice No.</th>
            <th style="min-width:150px;" class="p-1">GSTIN</th>
            <th style="min-width:130px;" class="p-1">Mode</th>
            <th style="min-width:130px;" class="p-1">Gross Amt</th>	
            <th style="min-width:130px;" class="p-1">CGST</th>	
            <th style="min-width:130px;" class="p-1">SGST </th>
            <th style="min-width:130px;" class="p-1">IGST</th> 
            <th style="min-width:130px;" class="p-1">Invoice Amt </th> 

            <th style="min-width:130px;" class="p-1">Remarks </th> 
            <th style="min-width:130px;" class="p-1">CN Cancelled	 </th> 
            <th style="min-width:130px;" class="p-1">CN Generated By </th> 

            <th style="min-width:130px;" class="p-1">CN Generated On </th> 
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
             @foreach($credit as $inv)
             <?php $i++; 
             if(isset($inv->InvoiceMasterDataDetail->Mode) && $inv->InvoiceMasterDataDetail->Mode==1){
                $mode = 'AIR';
             }
             elseif( isset($inv->InvoiceMasterDataDetail->Mode) && $inv->InvoiceMasterDataDetail->Mode==2){
                $mode = 'ROAD';
             }
             elseif(isset($inv->InvoiceMasterDataDetail->Mode) && $inv->InvoiceMasterDataDetail->Mode=3){
                $mode = 'TRAIN';
             }
             elseif(isset($inv->InvoiceMasterDataDetail->Mode) && $inv->InvoiceMasterDataDetail->Mode==4){
                $mode = 'COURIER';
             }
             else{
                $mode =''; 
             }
             ?>
             <tr>

                 <td class="p-1">{{$i}}</td>
                 <td class="p-1">{{$inv->NodeNo}}</td>
                 <td class="p-1">@isset($inv->NoteDate){{date("d-m-Y H:i:s",strtotime($inv->NoteDate))}} @endisset</td>
                 <td class="p-1">{{$inv->CFright}}</td>

                 <td class="p-1">{{$inv->CSGST}}</td>
                 <td class="p-1">{{$inv->CCGST}}</td>
                 <td class="p-1">{{$inv->CIGST}}</td>
                 <td class="p-1">{{$inv->CTotalAmount}}</td>

                 <td class="p-1">{{$inv->Remark}}</td>
                
                 <td class="p-1"> @isset($inv->InvoiceMasterDataDetail->InvDate) {{{date("d-m-Y",strtotime($inv->InvoiceMasterDataDetail->InvDate))}} @endisset</td>
                 <td class="p-1"> @isset($inv->InvoiceMasterDataDetail->FormDate)  {{date("d-m-Y",strtotime($inv->InvoiceMasterDataDetail->FormDate))}} to {{date("d-m-Y",strtotime($inv->InvoiceMasterDataDetail->ToDate))}} @endisset</td>
                 <td class="p-1"> @isset($inv->CustomerDetail->CustomerCode) {{$inv->CustomerDetail->CustomerCode}} ~ {{$inv->CustomerDetail->CustomerName}} @endisset</td>
                 <td class="p-1"> @isset($inv->InvoiceMasterDataDetail->InvNo) <a href="{{url('printInvoiceTex').'/'.$inv->InvoiceMasterDataDetail->InvNo}}"> {{$inv->InvoiceMasterDataDetail->InvNo}} </a> @endisset</td>
                 <td class="p-1" > @isset($inv->InvoiceMasterDataDetail->InvDate)  {{$inv->InvoiceMasterDataDetail->InvNo}}  @endisset</td>
                 <td class="p-1" > @isset($inv->InvoiceMasterDataDetail->Mode) {{$mode}}   @endisset</td>
                 <td class="p-1">@isset($inv->InvFright)  {{$inv->InvFright}}  @endisset</td>
                 <td class="p-1">@isset($inv->InvCGST)  {{$inv->InvCGST}}  @endisset</td>
                 <td class="p-1">@isset($inv->InvSGST)  {{$inv->InvSGST}}  @endisset</td>
                 <td class="p-1">@isset($inv->InvIGST)  {{$inv->InvIGST}}  @endisset</td>
                 <td class="p-1">@isset($inv->InvTotalAmount)  {{$inv->InvTotalAmount}}  @endisset</td>
                 <td class="p-1"> @isset($inv->InvoiceMasterDataDetail->Remark) {{$inv->InvoiceMasterDataDetail->Remark}} @endisset</td>
                 <td class="p-1"> @isset($inv->CancelByData->empOffDetail->EmployeeName) {{$inv->CancelByData->empOffDetail->EmployeeCode}} ~ {{$inv->CancelByData->empOffDetail->EmployeeName}}@endisset</td>
                 <td class="p-1"> @isset($inv->userData->empOffDetail->EmployeeName) {{$inv->userData->empOffDetail->EmployeeCode}} ~ {{$inv->userData->empOffDetail->EmployeeName}}@endisset</td>
                 <td class="p-1">@isset($inv->CreateAT)  {{date("d-m-Y H:i:s",strtotime($inv->CreateAT))}}  @endisset</td>
                
            </tr>
             @endforeach
        </tbody>
         </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $credit->appends(Request::all())->links() !!} 
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
      });
$(".selectBox").select2();
 
</script>