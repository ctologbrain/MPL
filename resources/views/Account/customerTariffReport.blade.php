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
                           <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="6">
                          </div> 
                    </form>
                    <div class="col-12">
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:160px;" class="p-1">Tariff Code</th>	
            <th style="min-width:160px;" class="p-1">Delivery  Type</th>
            <th style="min-width:160px;" class="p-1">Eff  Date</th>	
            <th style="min-width:160px;" class="p-1">Customer</th>   

            <th style="min-width:130px;" class="p-1">Wef Date</th>	
            <th style="min-width:130px;" class="p-1">Qty</th>
            <th style="min-width:130px;" class="p-1">Rate</th>	
            <th style="min-width:130px;" class="p-1">Minimum Amount</th>	
           
             <th style="min-width:130px;" class="p-1">Mode </th>
            <th style="min-width:130px;" class="p-1">Rate_type </th>   
            <th style="min-width:190px;" class="p-1">TAT </th>
             <th style="min-width:150px;" class="p-1">Origin </th>
            <th style="min-width:180px;" class="p-1">Dest</th>

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
            @if(!empty($getCustomerData))
            @foreach($getCustomerData as $gpDetails)
            <?php $i++; 
             $rateType='';
             $Mode='';
            if($gpDetails->Rate_type==1){
                $rateType= 'PER KG';
            }
            else{
                 $rateType='PER BOX';
            }

            if($gpDetails->Mode==1){
                $Mode= "AIR";
            }
            elseif($gpDetails->Mode==2){
                $Mode= "ROAD";
            }
            elseif($gpDetails->Mode==3){
                $Mode= "TRAIN";
            }
            elseif($gpDetails->Mode==4){
                $Mode= "COURIER";
            }
            ?>
            <tr>
               <td class="p-1">{{$i}}</td>
               <td class="p-1">{{$gpDetails->Origin}} To {{$gpDetails->Desitination}}</td>
               <td class="p-1">{{$gpDetails->DelivertY}}</td>
               <td class="p-1">{{$gpDetails->Wef_Date}}</td>
               <td class="p-1">{{$gpDetails->CustomerCode}}~ {{$gpDetails->CustomerName}}</td>
               <td class="p-1">@if(isset($gpDetails->Wef_Date)){{$gpDetails->Wef_Date}}@endif</td>
               <td class="p-1">{{$gpDetails->Qty}}</td>
               <td class="p-1">{{$gpDetails->Rate}}</td>
               <td class="p-1">{{$gpDetails->Min_Amount}}</td>
               <td class="p-1">{{$Mode}}</td>
              <td class="p-1">{{$rateType}}</td>
              <td class="p-1">{{$gpDetails->TAT}}</td>
              <td class="p-1">{{$gpDetails->OutputOrigin}}</td>
              <td class="p-1">{{$gpDetails->OutputDest}}</td>
            </tr>
            @endforeach
           @endif
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
        @if(!empty($getCustomerData)) {!! $BaseOnTarrif->appends(Request::all())->links() !!} @endif
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