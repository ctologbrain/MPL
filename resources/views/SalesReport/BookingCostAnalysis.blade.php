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
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('BookingCostAnalysis')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$Booking->total()}}</span></div>   
                    
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
            @foreach($Booking as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($DockBookData->customerDetails->CustomerCode) {{$DockBookData->customerDetails->CustomerCode}} ~ {{$DockBookData->customerDetails->CustomerName}}  @endisset</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>

             
             <td class="p-1">@isset($DockBookData->PincodeDetails->CityDetails->Code) {{$DockBookData->PincodeDetails->CityDetails->Code}} ~ {{$DockBookData->PincodeDetails->CityDetails->CityName}}   @endisset  
             &nbsp; - &nbsp;  @isset($DockBookData->DestPincodeDetails->CityDetails->Code)
                {{$DockBookData->DestPincodeDetails->CityDetails->Code}} ~ {{$DockBookData->DestPincodeDetails->CityDetails->CityName}} @endisset
             </td>
             <td class="p-1">{{'Console'}}</td>
             <td class="p-1">@if(isset($DockBookData->BookignTypeDetails->BookingType)){{$DockBookData->BookignTypeDetails->BookingType}}@endif</td>
             <td class="p-1" >@if(isset($DockBookData->DocketProductDetails->Qty)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Actual_Weight)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
           </tr>
           @endforeach
           
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