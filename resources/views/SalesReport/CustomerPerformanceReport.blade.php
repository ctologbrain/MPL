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
                     <select name="Customer" id="Customer" class="form-control selectBox" tabindex="1">
                       <option value="">--select Customer--</option>
                        @foreach($Customer as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('Customer') !='' && request()->get('Customer')==$offcice->id){{'selected'}}@endif>{{$offcice->CustomerCode}}~{{$offcice->CustomerName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="ParentCustomer" id="ParentCustomer" class="form-control selectBox" tabindex="1">
                       <option value="">--select ParentCustomer--</option>
                        @foreach($ParentCustomer as $key) 
                       <option value="{{$key->id}}" @if(request()->get('ParentCustomer') !='' && request()->get('ParentCustomer')==$key->id){{'selected'}}@endif>{{$key->PCustomerCode}}~{{$key->PCN}}</option >
                       @endforeach
                     </select>
                   </div>
                   <div class="mb-2 col-md-2">
                  
                   <select class="form-control selectBox" tabindex="2" autocomplete="off"  name="formDate">
                   @for($i=1; $i<=12; $i++)
                   <?php $Month = sprintf("%02d", $i); 
                     $mnth= date("F", mktime(0,0,0,$i));
                   ?>
                   <option value="{{$Month}}"  @if(request()->get('formDate')!='' && request()->get('formDate')==$Month) {{"selected"}} @endif > {{$mnth}}</option>
                   @endfor
                   </select>
                   </div>
                   <div class="mb-2 col-md-2">
                   <select class="form-control selectBox"  name="todate" tabindex="3" autocomplete="off">
                   @for($i=1; $i<=12; $i++)
                   <?php $Month = sprintf("%02d", $i); 
                     $mnth= date("F", mktime(0,0,0,$i));
                   ?>
                   <option  value="{{$Month}}"  @if(request()->get('todate')!='' && request()->get('todate')==$Month) {{"selected"}} @endif > {{$mnth}}</option>
                   @endfor
                   </select>
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('salesReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$CustomerAnalysis->total()}}</span></div>   
                    
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:220px;" class="p-1">Customer</th>
            <?php 
            if(request()->get('formDate')!=''){
                $formDate ='2023-'.request()->get('formDate');
                $start = request()->get('formDate');
            }
            else{
                $formDate ='';
                $start =0;
            }

            if(request()->get('todate')!=''){
                $todate ='2023-'.request()->get('todate');
                $ended = request()->get('todate');
            }
            else{
                $todate ='';
                $ended =0;
            }
            ?>
            @if($start >0)
              @for($jk=$start; $jk <= $ended; $jk++)
            <?php  $Month =  sprintf("%02d", $jk); 
            $date = '2023-'.$Month;
            ?>
            <th style="min-width:150px;" class="p-1">@isset($date)  {{date("Y-M",strtotime($date))}} @endisset</th>
            @endfor
            @endif
            <th style="min-width:150px;" class="p-1">Sales Avg</th>
            <th style="min-width:160px;" class="p-1">Diffrance</th>
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
            $totalAmount = array();
            ?>
            @foreach($CustomerAnalysis as $DockBookData)
             <?php 
             $i++;
            
             ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($DockBookData->CustomerCode) {{$DockBookData->CustomerCode}} ~ {{$DockBookData->CustomerName}}  @endisset</td>
             @if($start >0)
              @for($jk=$start; $jk <= $ended; $jk++)
              <?php
            $Month =  sprintf("%02d", $jk); 
            $date = '2023-'.$Month;
              $MonthWise = DB::table('InvoiceMaster')->leftjoin('customer_masters','InvoiceMaster.Cust_Id','customer_masters.id')
              ->leftjoin('InvoiceDetails','InvoiceDetails.InvId','InvoiceMaster.id')
               ->select('customer_masters.CustomerCode','customer_masters.CustomerName',
                DB::raw('SUM(InvoiceDetails.Total) as TotAmount'),'InvoiceMaster.InvDate'
               )->where(DB::raw("DATE_FORMAT(InvoiceMaster.InvDate, '%Y-%m')"), $date )
                ->where('InvoiceMaster.Cust_Id',$DockBookData->CID)
               ->first();
               if(isset($MonthWise->TotAmount)){
                $totalAmount[] =   $MonthWise->TotAmount;
               }

               if(isset($MonthWise->TotAmount)){
                   $monthWiseFixed[] = $MonthWise->TotAmount;
               }
               else{
                $monthWiseFixed[] = 0;
               }
               
            ?>
              
            <td  class="p-1"> @isset($MonthWise->TotAmount) {{$MonthWise->TotAmount}} @endisset </td>
            @endfor
            @endif
             
            <td class="p-1">@if(count($totalAmount) >0){{number_format(array_sum($totalAmount)/count($totalAmount),2 ,".","")}} @endif</td>
            @if(count($totalAmount) >0 && count($monthWiseFixed) >0)
            <?php $vals= number_format(end($monthWiseFixed)-(array_sum($totalAmount)/count($totalAmount)),2 ,".",""); ?>
            @if($vals < 0)
            <td class="p-1" style="background-color:red; color:white;"> {{number_format(end($monthWiseFixed)-(array_sum($totalAmount)/count($totalAmount)),2 ,".","")}} </td>
               @else
            <td class="p-1" style="background-color:#00FF00; color:white;"> {{number_format(end($monthWiseFixed)-(array_sum($totalAmount)/count($totalAmount)),2 ,".","")}} </td>
            @endif
            @else
            <td class="p-1"></td>
            @endif
            
          
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $CustomerAnalysis->appends(Request::all())->links() !!}
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