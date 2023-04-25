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
                    <div class="row">
                   
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
               <td>{{$i}}</td>
               
               <td>{{$gpDetails->Origin}} To {{$gpDetails->Desitination}}</td>
               <td>{{$gpDetails->DelivertY}}</td>
               <td>{{$gpDetails->Wef_Date}}</td>
               <td>{{$gpDetails->CustomerCode}}~ {{$gpDetails->CustomerName}}</td>
               <td>@if(isset($gpDetails->Wef_Date)){{$gpDetails->Wef_Date}}@endif</td>
               
               <td>{{$gpDetails->Qty}}</td>
               <td>{{$gpDetails->Rate}}</td>
               <td>{{$gpDetails->Min_Amount}}</td>
                <td>{{$Mode}}</td>
                <td>{{$rateType}}</td>
                 <td>{{$gpDetails->TAT}}</td>
                 <td>{{$gpDetails->OutputOrigin}}</td>
                 <td>{{$gpDetails->OutputDest}}</td>

               

               

            </tr>
            @endforeach
           @endif
         </tbody>
        </table>
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