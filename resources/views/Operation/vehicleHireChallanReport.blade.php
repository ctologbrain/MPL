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
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('VehicleHireChallanReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3 total-record"> <p> Total Record: <b>{{$VehicleHire->total()}}</b></p></div>   
                    
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:160px;" class="p-1">Challan Date</th>
           
            <th style="min-width:130px;" class="p-1">Challan No</th>	
            <th style="min-width:160px;" class="p-1">Challan Type</th>

             <th style="min-width:160px;" class="p-1">Purpose</th>
             <th style="min-width:160px;" class="p-1">Paid For</th>
             <th style="min-width:160px;" class="p-1">Origin Office</th>
             <th style="min-width:160px;" class="p-1">Destination</th>
             <th style="min-width:160px;" class="p-1">Route</th>
             <th style="min-width:160px;" class="p-1">Account Number</th>
             <th style="min-width:160px;" class="p-1">Number</th>

             <th style="min-width:160px;" class="p-1">Vendor Name</th>
             <th style="min-width:160px;" class="p-1">Vehicle Model</th>
             <th style="min-width:160px;" class="p-1">Vehicle Number</th>
             <th style="min-width:160px;" class="p-1">TotalAmount</th>
             <th style="min-width:160px;" class="p-1">AdvancePaid</th>	
             <th style="min-width:160px;" class="p-1">Balance</th>
             <th style="min-width:160px;" class="p-1">Adv PaymentMode</th>
             <th style="min-width:160px;" class="p-1">Adv PaymentNumber</th>
             <th style="min-width:160px;" class="p-1">Adv PaidByOffice</th>
             <th style="min-width:160px;" class="p-1">Bal PaymentMode</th>
             <th style="min-width:160px;" class="p-1">Bal PaymentNumber</th>
             <th style="min-width:160px;" class="p-1">Bal PaidByOffice</th>
             <th style="min-width:160px;" class="p-1">Remark</th>
          
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
            @foreach($VehicleHire as $key)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
        
            <td class="p-1">{{date("d-m-Y",strtotime($key->Challan_Date))}}</td>   
            <td class="p-1">{{$key->Challan_No}}</td>
            <td class="p-1">{{$key->Challan_Type}}</td>
            <td class="p-1">{{$key->Purpose}}</td>
            <td class="p-1">{{$key->Paid_For}}</td>

             <td class="p-1">@isset($key->OriginOfficeDetails->OfficeName)  {{$key->OriginOfficeDetails->OfficeName}} @endisset</td>
             <td class="p-1">@isset($key->DestOfficeDetails->OfficeName)  {{$key->DestOfficeDetails->OfficeName}}  @endisset</td>
             <td class="p-1">{{$key->Route}}</td>
              <td class="p-1">{{$key->Account_Number}}</td>
             <td class="p-1">{{$key->Number}}</td>

             <td class="p-1">{{$key->vendorDetails->VendorCode}} ~ {{$key->vendorDetails->VendorName}}</td>
             <td class="p-1">{{$key->VehicleModelDetails->VehicleType}}</td>
             <td class="p-1">{{$key->VehicleDetails->VehicleNo}}</td>

             <td class="p-1">{{$key->TotalAmount}}</td>
             <td class="p-1">{{$key->AdvancePaid}}</td>
             <td class="p-1">{{$key->Balance}}</td>
             <td class="p-1">{{$key->Adv_PaymentMode}}</td>
             <td class="p-1">{{$key->Adv_PaymentNumber}}</td>
             <td class="p-1">@isset($key->AdvOfficeDetails->OfficeName) {{$key->AdvOfficeDetails->OfficeName}} @endisset</td>
             <td class="p-1">{{$key->Bal_PaymentMode}}</td>
             <td class="p-1">{{$key->Bal_PaymentNumber}}</td>
             <td class="p-1">@isset($key->BalOfficeDetails->OfficeName) {{$key->BalOfficeDetails->OfficeName}} @endisset</td>

             <td class="p-1">{{$key->Remarks}}</td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $VehicleHire->appends(Request::all())->links() !!}
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