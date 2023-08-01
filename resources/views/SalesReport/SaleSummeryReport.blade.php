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
            <?php 
            $gtBookingDoor= $gtBookingHUb=$gtDeliveryDoor =$gtDeliveryHUb = $gtBooking =$gtDelivery = $gtBookingDoorAQTY =$gtBookingHUbAQTY =$gtDeliveryDoorAQTY = $gtDeliveryHUbAQTY =  $gtBookingAQTY =array();
            $gtDeliveryAQTY = $gtBookingDoorCHTOT =$gtBookingHUbCHTOT =  $gtDeliveryDoorCHTOT =   $gtDeliveryHUbCHTOT =$gtBookingCHTOT = $gtDeliveryCHTOT = array();
            $i=0; 
            $page=request()->get('page');
            if(isset($page) && $page>1){
                $page =$page-1;
            $i = intval($page*10);
            }
             else{
            $i=0;
            }

            if(request()->get('formDate')!=''){
                $DF = request()->get('formDate');
            }
            else{
                $DF = ''; 
            }

            if(request()->get('todate')!=''){
                $DT = request()->get('todate');
            }
            else{
                $DT = ''; 
            }
            ?>
            @foreach($sales as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
           
             <td class="p-1" rowspan="7">{{$i}}</td>
             <td class="p-1" rowspan="7">@isset($DockBookData->OfficeCode) {{$DockBookData->OfficeCode}} ~{{$DockBookData->OfficeName}} @endisset</td>
            <?php 
               $BookingDoor =  DB::table('docket_masters')
               ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
               ->select(DB::raw('COUNT(docket_masters.id) as Total'),
               DB::raw('SUM(docket_product_details.Actual_Weight) as ActTotal'),
               DB::raw('SUM(docket_product_details.Charged_Weight) as ChrgTotal')
               )
               ->whereIn('docket_masters.Delivery_Type',[1,3])
               ->where("docket_masters.Office_ID",$DockBookData->id)
               ->where(function($query) use($DF, $DT){
                if(isset($DF) && $DF!='' &&  isset($DT) && $DT!=''){
                    $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$DF,$DT]);
                }
               })->first();

               $BookingHUb=  DB::table('docket_masters')
               ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
               ->select(DB::raw('COUNT(docket_masters.id) as Total'),
               DB::raw('SUM(docket_product_details.Actual_Weight) as ActTotal'),
               DB::raw('SUM(docket_product_details.Charged_Weight) as ChrgTotal')
               )
               ->whereIn('docket_masters.Delivery_Type',[2,4])
               ->where("docket_masters.Office_ID",$DockBookData->id)
               ->where(function($query) use($DF, $DT){
                if(isset($DF) && $DF!='' &&  isset($DT) && $DT!=''){
                    $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$DF,$DT]);
                }
               })->first();

               $DeliveryDoor = DB::table('docket_masters')->leftjoin("docket_allocations","docket_allocations.Docket_No","docket_masters.Docket_No")
               ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
               ->select(DB::raw('COUNT(docket_masters.id) as Total'),
               DB::raw('SUM(docket_product_details.Actual_Weight) as ActTotal'),
               DB::raw('SUM(docket_product_details.Charged_Weight) as ChrgTotal')
               )
               ->where("docket_allocations.Status","=",8)
               ->whereIn('docket_masters.Delivery_Type',[1,3])->where("docket_masters.Office_ID",$DockBookData->id)
               ->where(function($query) use($DF, $DT){
                if(isset($DF) && $DF!='' &&  isset($DT) && $DT!=''){
                    $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$DF,$DT]);
                }
               })->first();

               $DeliveryHUb =   DB::table('docket_masters')
               ->leftjoin("docket_allocations","docket_allocations.Docket_No","docket_masters.Docket_No")
               ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
               ->select(DB::raw('COUNT(docket_masters.id) as Total'),
               DB::raw('SUM(docket_product_details.Actual_Weight) as ActTotal'),
               DB::raw('SUM(docket_product_details.Charged_Weight) as ChrgTotal')
               )
               ->where("docket_allocations.Status","=",8)->whereIn('docket_masters.Delivery_Type',[2,4])->where("docket_masters.Office_ID",$DockBookData->id)
               ->where(function($query) use($DF, $DT){
                if(isset($DF) && $DF!='' &&  isset($DT) && $DT!=''){
                    $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$DF,$DT]);
                }
               })->first();

               $Booking =  DB::table('docket_masters')
               ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
                ->select(DB::raw('COUNT(docket_masters.id) as Total'),
                DB::raw('SUM(docket_product_details.Actual_Weight) as ActTotal'),
                DB::raw('SUM(docket_product_details.Charged_Weight) as ChrgTotal')
                )->where("docket_masters.Office_ID",$DockBookData->id)
                ->where(function($query) use($DF, $DT){
                    if(isset($DF) && $DF!='' &&  isset($DT) && $DT!=''){
                        $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$DF,$DT]);
                    }
                   })->first();

               $Delivery =   DB::table('docket_masters')
              ->leftjoin("docket_allocations","docket_allocations.Docket_No","docket_masters.Docket_No")
              ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
              ->select(DB::raw('COUNT(docket_masters.id) as Total'),
              DB::raw('SUM(docket_product_details.Actual_Weight) as ActTotal'),
              DB::raw('SUM(docket_product_details.Charged_Weight) as ChrgTotal')
              )->where("docket_allocations.Status","=",8)->where("docket_masters.Office_ID",$DockBookData->id)
              ->where(function($query) use($DF, $DT){
                if(isset($DF) && $DF!='' &&  isset($DT) && $DT!=''){
                    $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$DF,$DT]);
                }
               })->first();
              $gtBookingDoor[]= $BookingDoor->Total;
            $gtBookingHUb[] =   $BookingHUb->Total;
            $gtDeliveryDoor[] =  $DeliveryDoor->Total;
            $gtDeliveryHUb[] =   $DeliveryHUb->Total;
            $gtBooking[] =   $Booking->Total;
            $gtDelivery[] =   $Delivery->Total;

            $gtBookingDoorAQTY[]= $BookingDoor->ActTotal;
            $gtBookingHUbAQTY[] =   $BookingHUb->ActTotal;
            $gtDeliveryDoorAQTY[] =  $DeliveryDoor->ActTotal;
            $gtDeliveryHUbAQTY[] =   $DeliveryHUb->ActTotal;
            $gtBookingAQTY[] =   $Booking->ActTotal;
            $gtDeliveryAQTY[] =   $Delivery->ActTotal;

            $gtBookingDoorCHTOT[]= $BookingDoor->ChrgTotal;
            $gtBookingHUbCHTOT[] =   $BookingHUb->ChrgTotal;
            $gtDeliveryDoorCHTOT[] =  $DeliveryDoor->ChrgTotal;
            $gtDeliveryHUbCHTOT[] =   $DeliveryHUb->ChrgTotal;
             $gtBookingCHTOT[] =   $Booking->ChrgTotal;
             $gtDeliveryCHTOT[] =   $Delivery->ChrgTotal;

            ?>
            <td>
                <tr>
                <td class="p-1">{{'BOOKINGS'}}</td>
                <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.$DockBookData->id.'/Booking?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{$Booking->Total}} </a></td>
                <td class="p-1"></td>
                <td class="p-1">  {{$Booking->ActTotal}}</td>
                <td class="p-1">{{$Booking->ChrgTotal}}</td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                </tr>
                <tr>
                <td class="p-1">{{'DOOR PICKUP'}}</td>
                <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.$DockBookData->id.'/BookingDoor?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{$BookingDoor->Total}} </a></td>
                <td class="p-1"></td>
                <td class="p-1">{{$BookingDoor->ActTotal}}</td>
                <td class="p-1">{{$BookingDoor->ChrgTotal}}</td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                </tr>
                <tr><td class="p-1">{{'HUB PICKUP'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.$DockBookData->id.'/BookingHub?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{$BookingHUb->Total}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{$BookingHUb->ActTotal}}</td>
                    <td class="p-1">{{$BookingHUb->ChrgTotal}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1">{{'DELIVERIES'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.$DockBookData->id.'/Delivery?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{$Delivery->Total}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{$Delivery->ActTotal}}</td>
                    <td class="p-1">{{$Delivery->ChrgTotal}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1">{{'DOOR DELIVERIES'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.$DockBookData->id.'/DeliveryDoor?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{$DeliveryDoor->Total}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{$DeliveryDoor->ActTotal}}</td>
                    <td class="p-1">{{$DeliveryDoor->ChrgTotal}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1">{{'HUB DELIVERIES'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.$DockBookData->id.'/DeliveryHUb?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{$DeliveryHUb->Total}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{$DeliveryHUb->ActTotal}}</td>
                    <td class="p-1">{{$DeliveryHUb->ChrgTotal}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1"></td></tr>
            </td>

            
           </tr>
           

           <tr><td class="p-1" colspan="9"></td></tr>
           @endforeach
           <tr>
           <td class="p-1" rowspan="7"> #</td>
             <td class="p-1" rowspan="7">GRAND TOTAL</td>
             <td>
                <tr>
                <td class="p-1">{{'BOOKINGS'}}</td>
                <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.'0'.'/Booking?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{array_sum($gtBooking)}} </a></td>
                <td class="p-1"></td>
                <td class="p-1">  {{array_sum($gtBookingAQTY)}}</td>
                <td class="p-1">{{array_sum($gtBookingCHTOT)}}</td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                </tr>
                <tr>
                <td class="p-1">{{'DOOR PICKUP'}}</td>
                <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.'0'.'/BookingDoor?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{array_sum($gtBookingDoor)}} </a></td>
                <td class="p-1"></td>
                <td class="p-1">{{array_sum($gtBookingDoorAQTY)}}</td>
                <td class="p-1">{{array_sum($gtBookingDoorAQTY)}}</td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                <td class="p-1"></td>
                </tr>
                <tr><td class="p-1">{{'HUB PICKUP'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.'0'.'/BookingHub?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{array_sum($gtBookingHUb)}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{array_sum($gtBookingHUbAQTY)}}</td>
                    <td class="p-1">{{array_sum($gtBookingHUbCHTOT)}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1">{{'DELIVERIES'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.'0'.'/Delivery?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{array_sum($gtDelivery)}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{array_sum($gtDeliveryAQTY)}}</td>
                    <td class="p-1">{{array_sum($gtDeliveryCHTOT)}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1">{{'DOOR DELIVERIES'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.'0'.'/DeliveryDoor?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{array_sum($gtDeliveryDoor)}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{array_sum($gtDeliveryDoorAQTY)}}</td>
                    <td class="p-1">{{array_sum($gtDeliveryDoorCHTOT)}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1">{{'HUB DELIVERIES'}}</td>
                    <td class="p-1"><a href="{{url('saleSummeryDetailed').'/'.'0'.'/DeliveryHUb?DF='.$DF.'&DT='.$DT}}" target="_blank"> {{array_sum($gtDeliveryHUb)}} </a></td>
                    <td class="p-1"></td>
                    <td class="p-1">{{array_sum($gtDeliveryHUbAQTY)}}</td>
                    <td class="p-1">{{array_sum($gtDeliveryHUbCHTOT)}}</td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    <td class="p-1"></td>
                    </tr>
                <tr><td class="p-1"></td></tr>
            </td>

           </tr>
           
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