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
                   
                   <div class="mb-2 col-md-3">
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
                           <a href="{{url('CustomerLedger')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                           <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="6">
                          </div> 
                    </form>
                    <div class="col-12">
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:350px;" class="p-1">Name</th>	
            <th style="min-width:200px;" class="p-1">Date</th>
            <th style="min-width:300px;" class="p-1">Description</th>	
            <th style="min-width:160px;" class="p-1">Voucher Type</th>   
            <th style="min-width:130px;" class="p-1">Voucher No	</th>	
            <th style="min-width:130px;" class="p-1">Debit</th>
            <th style="min-width:130px;" class="p-1">Credit</th>	
            <th style="min-width:130px;" class="p-1">Balance</th>	
           
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
             @foreach($data as $ladger)
             <?php $i++; 
           
             ?>
             <tr>

                 <td class="p-1">{{$i}}</td>
                 <td class="p-1">{{$ladger->customerDetails->CustomerName}}</td>
                 <td class="p-1">@isset($ladger->Date){{date("d-m-Y",strtotime($ladger->Date))}} @endisset</td>
                 <td class="p-1">{{$ladger->Description}}</td>
                 <td class="p-1">{{$ladger->VoucherType}}</td>
                 <td class="p-1">{{$ladger->VoucherNo}}</td>
                 <td class="p-1">{{$ladger->Debit}}</td>
                 <td class="p-1">{{$ladger->Credit}}</td>
                 <td class="p-1">{{$ladger->Balance}}</td>
            </tr>
             @endforeach
        </tbody>
         </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $data->appends(Request::all())->links() !!} 
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