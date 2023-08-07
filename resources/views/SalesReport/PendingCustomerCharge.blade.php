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
                        <input  value="{{request()->get('DocketNo')}}" type="text" name="DocketNo" class="form-control " placeholder="Docket No.">
                    </div>


                    <div class="mb-2 col-md-2">
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select Office--</option>
                        @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="Customer" id="Customer" class="form-control selectBox" tabindex="1">
                       <option value="">--select Customer--</option>
                        @foreach($customer as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('Customer') !='' && request()->get('Customer')==$offcice->id){{'selected'}}@endif>{{$offcice->CustomerCode}}~{{$offcice->CustomerName}}</option >
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
            <th style="min-width:190px;" class="p-1">Customer </th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:150px;" class="p-1">Book Date</th>
            
            <th style="min-width:160px;" class="p-1">Origin </th>
            <th style="min-width:160px;" class="p-1">Dest.</th>	
            <th style="min-width:160px;" class="p-1">Org. Zone</th>	
            <th style="min-width:160px;" class="p-1">Dest. Zone</th>	
            <th style="min-width:130px;" class="p-1">Mode</th>	
           <th style="min-width:130px;" class="p-1">Product</th>	
            <th style="min-width:130px;" class="p-1">Delivery Type</th>
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Volumetric. Chrg.</th>
            
            <th style="min-width:130px;" class="p-1"> Error</th>
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
            @foreach($docketCharge as $DockBookData)
             <?php 
           
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($DockBookData['Customer']) {{$DockBookData['Customer']}} @endisset</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData['Docket_No'])}}">{{$DockBookData['Docket_No']}}</a></td>
             <td class="p-1">@isset($DockBookData['Booking_Date']) {{$DockBookData['Booking_Date']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['origin']) {{$DockBookData['origin']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['Dest']) {{$DockBookData['Dest']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['originZone']) {{$DockBookData['originZone']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['DestZone']) {{$DockBookData['DestZone']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['Mode']) {{$DockBookData['Mode']}} @endisset</td>
             
           
             <td class="p-1">@isset($DockBookData['PTL']) {{$DockBookData['PTL']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['DeliveryType']) {{$DockBookData['DeliveryType']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['Qty']) {{$DockBookData['Qty']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['ActualWeight']) {{$DockBookData['ActualWeight']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['Charged_Weight']) {{$DockBookData['Charged_Weight']}} @endisset</td>
             <td class="p-1">@isset($DockBookData['VolumetriCWeight']) {{$DockBookData['VolumetriCWeight']}} @endisset</td>
             <td>Tariff not define.</td>
             
            </tr>
           @endforeach
           
         </tbody>
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
      format: 'dd-mm-yyyy',
      autoclose: true,
       todayHighlight: true
      });
     
    $(".selectBox").select2();
 
</script>