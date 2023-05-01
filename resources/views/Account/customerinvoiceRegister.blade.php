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
            <th style="min-width:160px;" class="p-1">Invoice Date</th>	
            <th style="min-width:160px;" class="p-1">Billing Period	</th>
            <th style="min-width:160px;" class="p-1">Invoice No.</th>	
            <th style="min-width:160px;" class="p-1">Client Name</th>   
            <th style="min-width:130px;" class="p-1">GSTIN</th>	
            <th style="min-width:130px;" class="p-1">Mode</th>
            <th style="min-width:130px;" class="p-1">Gross Amt</th>	
            <th style="min-width:130px;" class="p-1">CGST</th>	
            <th style="min-width:130px;" class="p-1">SGST </th>
            <th style="min-width:130px;" class="p-1">IGST</th>   
            <th style="min-width:190px;" class="p-1">Invoice Amt </th>
            <th style="min-width:150px;" class="p-1">Remarks</th>
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
             @foreach($custInv as $inv)
             <?php $i++; ?>
             <tr>

                 <td class="p-1">{{$i}}</td>
                 <td class="p-1">{{$inv->InvDate}}</td>
                 <td class="p-1">{{$inv->FormDate}} to {{$inv->ToDate}}</td>
                 <td class="p-1"><a href="{{url('printInvoiceTex').'/'.$inv->InvNo}}"> {{$inv->InvNo}}</a></td>
                 <td class="p-1">{{$inv->customerDetails->CustomerName}}</td>
                 <td class="p-1">{{$inv->customerDetails->GSTNo}}</td>
                 <td class="p-1"></td>
                 <td class="p-1">{{$inv->sum_sum_fright}}</td>
                 <td class="p-1">{{$inv->sum_sum_cgst}}</td>
                 <td class="p-1">{{$inv->sum_sum_scst}}</td>
                 <td class="p-1">{{$inv->sum_sum_igst}}</td>
                 <td class="p-1">{{$inv->sum_sum_total}}</td>
                 <td class="p-1">{{$inv->Remark}}</td>
            </tr>
             @endforeach
        </tbody>
         </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $custInv->appends(Request::all())->links() !!} 
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });
$(".selectBox").select2();
 
</script>