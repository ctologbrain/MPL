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
                    <div class="row p-1">
                   


                    <div class="mb-2 col-md-2">
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select Office--</option>
                        @foreach($OfficeMaster as $offcice) 
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
                           <a href="{{url('PendingCustomerChargeReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:190px;" class="p-1">Branch </th>
            <th style="min-width:190px;" class="p-1">Contents </th>

            <th style="min-width:130px;" class="p-1" > Total Docket </th>
            <th style="min-width:150px;" class="p-1">Total Box</th>
            
            <th style="min-width:160px;" class="p-1">Total Actual Weight</th>
            <th style="min-width:160px;" class="p-1">Total Charge weight</th>	
            <th style="min-width:160px;" class="p-1">frieght Amount</th>	
            <th style="min-width:160px;" class="p-1">GST </th>	
            <th style="min-width:130px;" class="p-1">Invoice Amount</th>	
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
            @foreach($sales as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1" rowspan="6">@isset($DockBookData->OfficeCode) {{$DockBookData->OfficeCode}} ~{{$DockBookData->OfficeName}} @endisset</td>
            <?php 
               $BookingDoor =  DB::table('docket_masters')->whereIn('docket_masters.Delivery_Type',[1,3])->where("docket_masters.Office_ID",$DockBookData->id)->first();
               $BookingHUb=  DB::table('docket_masters')->whereIn('docket_masters.Delivery_Type',[2,4])->where("docket_masters.Office_ID",$DockBookData->id)->first();

               $DeliveryDoor = DB::table('docket_masters')->leftjoin("docket_allocations","docket_allocations.Docket_No","docket_masters.Docket_No")
               ->where("docket_allocations.Status","=",8)->whereIn('docket_masters.Delivery_Type',[1,3])->where("docket_masters.Office_ID",$DockBookData->id)->first();

               $DeliveryHUb =   DB::table('docket_masters')->leftjoin("docket_allocations","docket_allocations.Docket_No","docket_masters.Docket_No")
               ->where("docket_allocations.Status","=",8)->whereIn('docket_masters.Delivery_Type',[2,4])->where("docket_masters.Office_ID",$DockBookData->id)->first();
            ?>
            <td>
                <tr>
                <td class="p-1">{{'Booking'}}</td></tr>
                <tr>
                <td class="p-1">{{''}}</td></tr>
                <tr><td class="p-1">{{''}}</td></tr>
                <tr><td class="p-1">{{'Delivery'}}</td></tr>
                <tr><td class="p-1">{{''}}</td></tr>
                <tr><td class="p-1">{{''}}</td></tr>
                <tr><td class="p-1"></td></tr>
            </td>
           </tr>
           

           <tr><td class="p-1" colspan="9"></td></tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $sales->appends(Request::all())->links() !!}
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