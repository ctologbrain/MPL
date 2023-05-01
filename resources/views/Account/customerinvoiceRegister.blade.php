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
                    <div class="row pl-pr">
                   
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
          <tr>
            <th style="min-width:100px;">SL#</th>
            <th style="min-width:160px;">Invoice Date</th>	
            <th style="min-width:160px;">Billing Period	</th>
            <th style="min-width:160px;">Invoice No.</th>	
            <th style="min-width:160px;">Client Name</th>   
            <th style="min-width:130px;">GSTIN</th>	
            <th style="min-width:130px;">Mode</th>
            <th style="min-width:130px;">Gross Amt</th>	
            <th style="min-width:130px;">CGST</th>	
            <th style="min-width:130px;">SGST </th>
            <th style="min-width:130px;">IGST</th>   
            <th style="min-width:190px;">Invoice Amt </th>
            <th style="min-width:150px;">Remarks</th>
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
                 <td>{{$i}}</td>
                 <td>{{$inv->InvDate}}</td>
                 <td>{{$inv->FormDate}} to {{$inv->ToDate}}</td>
                 <td><a href="{{url('printInvoiceTex?invoiceNo={{$inv->InvNo}}')}}" {{$inv->InvNo}}</td>
                 <td>{{$inv->customerDetails->CustomerName}}</td>
                 <td>{{$inv->customerDetails->GSTNo}}</td>
                 <td></td>
                 <td>{{$inv->sum_sum_fright}}</td>
                 <td>{{$inv->sum_sum_cgst}}</td>
                 <td>{{$inv->sum_sum_scst}}</td>
                 <td>{{$inv->sum_sum_igst}}</td>
                 <td>{{$inv->sum_sum_total}}</td>
                 <td>{{$inv->Remark}}</td>
                


                
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