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
                    <div class="row p-1">
                    
                   <div class="mb-2 col-md-2">
                     <select name="Customer" id="Customer" class="form-control selectBox" tabindex="1">
                       <option value="">--select Customer--</option>
                        @foreach($CustomerFilter as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('Customer') !='' && request()->get('Customer')==$offcice->id){{'selected'}}@endif>{{$offcice->CustomerCode}}~{{$offcice->CustomerName}}</option >
                       @endforeach
                     </select>
                   </div>

                    <div class="mb-2 col-md-2">
                     <select name="originCity" id="originCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select origin City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->PID}}" @if(request()->get('originCity') !='' && request()->get('originCity')==$key->PID){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="DestCity" id="DestCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select Destination City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->PID}}" @if(request()->get('DestCity') !='' && request()->get('DestCity')==$key->PID){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select Office--</option>
                        @foreach($Offcie as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option >
                       @endforeach
                     </select>
                   </div>

                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('DocketBookingCustomerWise')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row"> 
                    <div class="col-3"> <h5> Total RECORD: {{$customer->total()}}</h5></div>   
                
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Customer </th>
            @foreach($AllCity as $key)
            <th style="min-width:130px;" class="p-1" >{{$key->Code}}</th>
           @endforeach
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
            @foreach($customer as $key)
             <?php 
             $i++; 
             if(request()->get('formDate')){
                $fromDate = request()->get('formDate');
             }
             else{
                $fromDate = '';
             }

             if(request()->get('todate')){
                $ToDate = request()->get('todate');
             }
             else{
                $ToDate = '';
             }
            
             
             ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"> {{$key->CustomerCode}} ~ {{$key->CustomerName}}</td>
             @foreach($AllCity as $keyTwo)
             <td class="p-1"> 
             <?php 
              
             $result = DB::table("docket_masters")
             ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
              ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
              ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
              ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')
              ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')
              ->select("DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode",
              "ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode",
              DB::raw("SUM(docket_product_details.Actual_Weight) as Weight")
              )
              ->where("docket_masters.Cust_Id", $key->CID)
              ->where("DESTCITY.id",$keyTwo->CTID)
              ->where(function($query) use($fromDate,$ToDate){
                if($fromDate!='' &&  $ToDate!=''){
                    $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$fromDate,$ToDate]);
                }
               })
              ->groupBy('docket_product_details.Docket_Id')->first();
            if(isset($result->Weight)){
              echo $result->Weight;
            }
            else{
              echo '';
            }
            ?>
            </td>
            @endforeach
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $customer->appends(Request::all())->links() !!}
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
     
    $(".selectBox").select2();
 
</script>