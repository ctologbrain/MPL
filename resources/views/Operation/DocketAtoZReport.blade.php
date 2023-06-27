@include('layouts.appTwo')
<style type="text/css">
    .total-record b{
        font-size: 12px;
    }
    .total-record p{
        margin-bottom: 0px;
    }
</style>
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
                     <select name="originCity" id="originCity" class="form-control selectBox" tabindex="1">
                       <option value="">--select origin City--</option>
                        @foreach($originCity as $key) 
                       <option value="{{$key->id}}" @if(request()->get('originCity') !='' && request()->get('originCity')==$key->id){{'selected'}}@endif>{{$key->Code}}~{{$key->CityName}}</option >
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
                    <div class="col-3 total-record"> <p> Total RECORD: <b>{{$DocketBookingData->total()}}</b></p></div>   
                
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Origin </th>
            <th style="min-width:130px;" class="p-1">Booking Type </th>
            <th style="min-width:130px;" class="p-1">Total Booking</th>
            <th style="min-width:130px;" class="p-1">Not Connected	 </th>
            <th style="min-width:130px;" class="p-1">Not Received</th> 
            <th style="min-width:130px;" class="p-1">Not Delivered</th>
            <th style="min-width:150px;" class="p-1"> NDR</th>
            
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
            @foreach($DocketBookingData as $DockBookData)
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
             <td class="p-1">  {{$DockBookData->CityName}}</td>
             <td class="p-1">  {{$DockBookData->BookingType}}</td>
             <td class="p-1"><a href="{{url('BookinAZDetails/').'/'.$DockBookData->CID.'/'.$DockBookData->Booking_Type.'?fromDate='.$fromDate.'&ToDate='.$ToDate}}" target="_blank"> @isset($DockBookData->TotDocket) {{$DockBookData->TotDocket}} @endisset </a></td>
             <td class="p-1"> @isset($DockBookData->TotDocket) {{$DockBookData->TotDocket}} @endisset</td>
             <td class="p-1"> </td>
             <td class="p-1"><a href="{{url('BookinAZNONDELDetails/').'/'.$DockBookData->CID.'/'.$DockBookData->Booking_Type.'?fromDate='.$fromDate.'&ToDate='.$ToDate}}" target="_blank"> @isset( $DockBookData->TOTNONDEL) {{$DockBookData->TOTNONDEL}} @endisset </a></td>
             <td class="p-1"><a href="{{url('BookinAZNDRDetails/').'/'.$DockBookData->CID.'/'.$DockBookData->Booking_Type.'?fromDate='.$fromDate.'&ToDate='.$ToDate}}" target="_blank"> @isset($DockBookData->TotNDR) {{$DockBookData->TotNDR}} @endisset </a></td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $DocketBookingData->appends(Request::all())->links() !!}
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