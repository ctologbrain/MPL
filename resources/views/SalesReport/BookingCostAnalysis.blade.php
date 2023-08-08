@include('layouts.appThree')
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
                     <select name="saleType" id="saleType" class="form-control selectBox" tabindex="1">
                      
                       <option value="">BOTH</option>
                        @foreach($sale as $key) 
                        @if($key->Type==1)
                           <?php $Type ="CREDIT"; ?>
                          @elseif($key->Type==2)
                        <?php $Type ="CASH"; ?>
                         @endif
                       <option value="{{$key->Type}}" @if(request()->get('saleType') !='' && request()->get('saleType')==$key->Type){{'selected'}}@endif>{{$Type}}</option >
                       @endforeach
                     </select>
                    </div>

                    <div class="mb-2 col-md-2">
                     <select name="saleDiff" id="saleDiff" class="form-control selectBox" tabindex="1">
                     <option value="ALL SALE"  @if(request()->get('saleDiff') !='' && request()->get('saleDiff')=="ALL SALE"){{'selected'}}@endif>ALL SALE</option>
                       <option value="NEGATIVE SALE" @if(request()->get('saleDiff') !='' && request()->get('saleDiff')=="NEGATIVE SALE"){{'selected'}}@endif>NEGATIVE SALE</option>
                       <option value="POSITIVE SALE" @if(request()->get('saleDiff') !='' && request()->get('saleDiff')=="POSITIVE SALE"){{'selected'}}@endif>POSITIVE SALE</option>
                       </select>
                    </div>


                   <div class="mb-2 col-md-2">
                     <select name="Customer" id="Customer" class="form-control selectBox" tabindex="1">
                       <option value="">--select Customer--</option>
                        @foreach($Customer as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('Customer') !='' && request()->get('Customer')==$offcice->id){{'selected'}}@endif>{{$offcice->CustomerCode}}~{{$offcice->CustomerName}}</option >
                       @endforeach
                     </select>
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"@else value="{{date('d-m-Y', strtotime('-2 day'))}}"  @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"@else value="{{date('d-m-Y')}}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('BookingCostAnalysis')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                
                    
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:180px;" class="p-1">Customer Name</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:260px;" class="p-1">Origin - Dest</th>
            <th style="min-width:130px;" class="p-1">Load Type</th>
            <th style="min-width:130px;" class="p-1">Sale Type</th>
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1">Vendor Name</th>
            <th style="min-width:130px;" class="p-1">Transport Name</th>	
            <th style="min-width:130px;" class="p-1"> Sallling Cost</th>
            <th style="min-width:130px;" class="p-1"> Purchasing Cost</th>
             <th style="min-width:130px;" class="p-1">Diffrance</th>
             <th style="min-width:130px;" class="p-1">Diff %</th>
            
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
            $gsum=0;
            ?>
            @foreach($Booking as $DockBookData)
            <?php
            

              $sum=0; ?>
            @foreach($DockBookData->customerNewDetails->DocketVolDetailss as $docketBkkoing)
             <?php 
            
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
            
             <td class="p-1">@isset($DockBookData->customerNewDetails->CustomerCode) {{$DockBookData->customerNewDetails->CustomerCode}} ~ {{$DockBookData->customerDetails->CustomerName}}  @endisset</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$docketBkkoing->Docket_No)}}">{{$docketBkkoing->Docket_No}}</a></td>
             <td>@isset($docketBkkoing->PincodeDetails->CityDetails->Code) {{$docketBkkoing->PincodeDetails->CityDetails->Code}} ~ {{$docketBkkoing->PincodeDetails->CityDetails->CityName}}@endisset - @isset($docketBkkoing->DestPincodeDetails->CityDetails->Code) {{$docketBkkoing->DestPincodeDetails->CityDetails->Code}} ~ {{$docketBkkoing->DestPincodeDetails->CityDetails->CityName}}@endisset</td>
             <td>Console</td>
             <td>@isset($docketBkkoing->BookignTypeDetails->BookingType) {{$docketBkkoing->BookignTypeDetails->BookingType}}@endisset </td>
             <td>@isset($docketBkkoing->DocketProductDetails->Qty) {{$docketBkkoing->DocketProductDetails->Qty}}@endisset </td>
             <td>@isset($docketBkkoing->DocketProductDetails->Charged_Weight) {{$docketBkkoing->DocketProductDetails->Charged_Weight}}@endisset </td>
             <td></td>
             <td></td>
             <?php
             if($docketBkkoing->Booking_Type==3 || $docketBkkoing->Booking_Type==4)
             {
              if(isset($docketBkkoing->TariffTypeDeatils->TotalAmount))
              {
                $total=$docketBkkoing->TariffTypeDeatils->TotalAmount;
              }
              else
              {
                $total=0;
              }
              
             }
             else
             {
              $SourceCity=$docketBkkoing->PincodeDetails->city; 
              $DestCity=$docketBkkoing->DestPincodeDetails->city; 
              $SourceState=$docketBkkoing->PincodeDetails->State; 
              $DestState=$docketBkkoing->DestPincodeDetails->State; 
              $SourcePinCode=$docketBkkoing->PincodeDetails->id; 
              $DestPinCode=$docketBkkoing->DestPincodeDetails->id; 
              $zoneSource=$docketBkkoing->PincodeDetails->CityDetails->ZoneName;
              $zoneDest=$docketBkkoing->DestPincodeDetails->CityDetails->ZoneName;
              $DeliveryType=$docketBkkoing->Delivery_Type;
              $chargeWeight=$docketBkkoing->DocketProductDetails->Charged_Weight;
              $goodsValue=$docketBkkoing->docket_invoice_details_sum_amount;
              $qty=$docketBkkoing->DocketProductDetails->Qty;
              $EffectDate=date("Y-m-d", strtotime($docketBkkoing->Booking_Date));
              $rate=Helper::CustTariff($docketBkkoing->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
              
              $fright=$docketBkkoing->DocketProductDetails->Charged_Weight*$rate;
              $Chargejson=Helper::CustOtherCharge($docketBkkoing->Cust_Id,$EffectDate,$SourceCity,$DestCity,$chargeWeight,$goodsValue,$rate,$qty,$fright);
               


              
              $chhh=json_decode($Chargejson);
            
              if(isset($chhh->sum))
              {
                $Charge=$chhh->sum;
              }
              if(isset($docketBkkoing->DocketProductDetails->charge) && $docketBkkoing->DocketProductDetails->charge !='')
                  {
                      $Charge1=$docketBkkoing->DocketProductDetails->charge;
                  }
                  else
                  {
                    $Charge1=0;  
                  }
                 
                                                           
                  if(isset($docketBkkoing->customerDetails->PaymentDetails->Road))
                  {
                      $gstPer=$docketBkkoing->customerDetails->PaymentDetails->Road;
                  }
                  else
                  {
                    $gstPer=0;  
                  }
              
                  $SourceStateCheck=$docketBkkoing->DestPincodeDetails->StateDetails->name; 
                  if($gstPer !=0)
              {
                  if($SourceStateCheck=='Delhi')
                  {
                      $cgst=0;
                      $sgst=0;
                      $igst=($fright*$gstPer)/100;
                  }
                  else{
                      $gsthalf=$gstPer/2;
                      $cgst=($fright*$gsthalf)/100;
                      $sgst=($fright*$gsthalf)/100;
                      $igst=0; 
                  }
              }
              else
              {
                  $cgst=0;
                  $sgst=0;
                  $igst=0;  
              }
              
                 $total=$igst+$cgst+$sgst+$fright+$Charge+$Charge1;
             }
              
             ?>
             <td>{{$total}}</td>
             <td>0.00</td>
             <td>{{$total}}</td>
             <td>100%</td>

            </tr>
            <?php $sum+=$total; ?>
            @endforeach
            <?php $gsum+=$sum; ?>
           <tr class="main-title"><td colspan="10" class="text-start"><b>TOTAL:</b></td><td><b>{{$sum}}</b></td><td><b>0.00</b></td><td><b>0.00</b></td><td><b>100%</b></td></tr>
           @endforeach
           <tr class="back-color"><td colspan="10" class="text-start"><b>GRAND TOTAL:</b></td><td><b>{{$gsum}}</b></td><td><b>0.00</b></td><td><b>0.00</b></td><td><b>100%</b></td></tr>
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $Booking->appends(Request::all())->links() !!}
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