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

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:150px;" class="p-1">Book Date</th>
            
            <th style="min-width:130px;" class="p-1">GP -1   </th>
            <th style="min-width:130px;" class="p-1">GP Branch-1</th>
            <th style="min-width:130px;" class="p-1">GP Date -1   </th>
            <th style="min-width:130px;" class="p-1">Day Diff -1</th>
            <th style="min-width:130px;" class="p-1">GP- 2</th>
            <th style="min-width:130px;" class="p-1">GP Branch-2</th>
            <th style="min-width:130px;" class="p-1">GP Date -2   </th>
            <th style="min-width:130px;" class="p-1">Day Diff -2</th>
            
             
            <th style="min-width:130px;" class="p-1">Pieces</th>
            <th style="min-width:130px;" class="p-1"> Qty</th>
            <th style="min-width:130px;" class="p-1">  Booking Remark</th>
            <th style="min-width:130px;" class="p-1">  NDR Remark</th>
            <th style="min-width:130px;" class="p-1">  NDR Reason</th>
            <th style="min-width:130px;" class="p-1">  Offload Remark</th>
            <th style="min-width:130px;" class="p-1">  Offload Reason</th>
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
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">{{date("d-m-Y H:i:s",strtotime($DockBookData->Booking_Date))}}</td>
             <td class="p-1">@isset($DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number) <a href="{{url('print_gate_Number').'/'.$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}}"> {{$DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number}} </a> @endisset</td>


             <td class="p-1">@isset($DockBookData->customerDetails->CustomerName) {{$DockBookData->customerDetails->CustomerCode}} ~ {{$DockBookData->customerDetails->CustomerName}} @endisset</td> 

             <td class="p-1" >@if(isset($DockBookData->DocketProductDetails->Qty)){{$DockBookData->DocketProductDetails->Qty}}@endif</td>
            <td class="p-1">@if(isset($DockBookData->DocketProductDetails->Actual_Weight)){{$DockBookData->DocketProductDetails->Actual_Weight}}@endif</td>


            <td class="p-1">{{$DockBookData->Remark}}</td>
            <td class="p-1">@if(isset($DockBookData->offEntDetails->ID)){{'YES'}}  @else {{'NO'}} @endif</td>

            <td class="p-1">@isset($DockBookData->NDRTransDetails->NDrMasterDetails->ReasonDetail) {{$DockBookData->NDRTransDetails->NDrMasterDetails->ReasonCode}}- {{$DockBookData->NDRTransDetails->NDrMasterDetails->ReasonDetail}} @endisset</td>
             
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