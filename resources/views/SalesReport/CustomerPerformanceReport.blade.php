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
                   <option value="{{$Month}}"  @if($filterArray['FromDate']!='' && $filterArray['FromDate']==$Month) {{"selected"}} @endif > {{$mnth}}</option>
                   @endfor
                   </select>
                   </div>
                   <div class="mb-2 col-md-2">
                    <select class="form-control selectBox" tabindex="2" autocomplete="off"  name="formYear">
                    @for($i=2023; $i<=2050; $i++)
                    <option value="{{$i}}"  @if($filterArray['FromYear']!='' && $filterArray['FromYear']==$i) {{"selected"}} @endif > {{$i}}</option>
                    @endfor
                    </select>
                   </div>

                   <div class="mb-2 col-md-2">
                   <select class="form-control selectBox"  name="todate" tabindex="3" autocomplete="off">
                   @for($i=1; $i<=12; $i++)
                   <?php $Month = sprintf("%02d", $i); 
                     $mnth= date("F", mktime(0,0,0,$i));
                   ?>
                   <option  value="{{$Month}}"  @if($filterArray['ToMonth']!='' && $filterArray['ToMonth']==$Month) {{"selected"}} @endif > {{$mnth}}</option>
                   @endfor
                   </select>
                   </div>

                   <div class="mb-2 col-md-2">
                    <select class="form-control selectBox" tabindex="2" autocomplete="off"  name="toYear">
                    @for($i=2023; $i<=2050; $i++)
                   
                    <option value="{{$i}}"  @if($filterArray['ToYear']!='' && $filterArray['ToYear']==$i) {{"selected"}} @endif > {{$i}}</option>
                    @endfor
                    </select>
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('CustomerPerformanceAnalysis')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                           <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="6">
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
            <?php $s=$filterArray['FromDate'];
                  $t=$filterArray['ToMonth'];
          
            
            ?>
            @for($s; $s <=$t; $s++)
            <th style="min-width:220px;" class="p-1">
          <?php   $dateObj   = DateTime::createFromFormat('!m', $s);
                  $monthName = $dateObj->format('F'); // March ?>
            {{$monthName}}</th>
            @endfor
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
           
           // $chunkData = array();
            ?>
            @foreach($CustomerAnalysis as $DockBookData)
       
             <?php 
              $u=$filterArray['FromDate'];
              $v=$filterArray['ToMonth'];
              $i++;
              $itrator = $i-1;
              $totalAmount = 0;
              $monthWiseFixed = array();
             ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($DockBookData->CustomerCode) {{$DockBookData->CustomerCode}} ~ {{$DockBookData->CustomerName}}  @endisset</td>
              <?php
              $i=0;
              $totalSum=0;
              for($u; $u <=$v; $u++)
              { 
                $i++;
                $CustRate=Helper::CustRateanaylis($DockBookData->Cust_Id,$u,$filterArray['ToYear']);
         
                ?>
                <td  class="p-1">{{$CustRate}}</td>
              <?php 
              $totalSum+=$CustRate;
              }
              ?>
           
            
            <td>{{$totalSum/$i}}</td>
            <td>{{$totalSum/$i}}</td>
            
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