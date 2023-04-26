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
            <th style="min-width:160px;">Tariff Code</th>	
            <th style="min-width:160px;">Delivery  Type</th>
            <th style="min-width:160px;">Eff  Date</th>	
            <th style="min-width:160px;">Customer</th>   

            <th style="min-width:130px;">Wef Date</th>	
            <th style="min-width:130px;">Qty</th>
            <th style="min-width:130px;">Rate</th>	
            <th style="min-width:130px;">Minimum Amount</th>	
           
             <th style="min-width:130px;">Mode </th>
            <th style="min-width:130px;">Rate_type </th>   
            <th style="min-width:190px;">TAT </th>
             <th style="min-width:150px;">Origin </th>
            <th style="min-width:180px;">Dest</th>

           </tr>
         </thead>
         
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       
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