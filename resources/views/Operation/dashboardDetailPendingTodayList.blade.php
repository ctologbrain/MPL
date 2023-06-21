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
         
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row p-1">
                 

                   
                          
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="m-b-1 col-md-9"> <span> Total Docket: <b>{{$DocketTotals->TotatlDocket}}</b></span> &nbsp; &nbsp; &nbsp;&nbsp;
                      <span> Total Pieces: <b> @isset($DocketTotals->TotPiece) {{$DocketTotals->TotPiece}} @endisset</b></span> &nbsp; &nbsp; &nbsp;&nbsp;
                      <span> Total Actual Weight: <b> @isset($DocketTotals->TotActual_Weight) {{$DocketTotals->TotActual_Weight}} @endisset</b></span> &nbsp; &nbsp; &nbsp;&nbsp;
                      <span> Total Charge Weight: <b> @isset($DocketTotals->TotCharged_Weight) {{$DocketTotals->TotCharged_Weight}} @endisset</b></span> &nbsp; &nbsp; &nbsp;&nbsp;
                      <span> Total Amount: <b> @isset($DocketTotals->TotAmount) {{$DocketTotals->TotAmount}} @endisset  </b></span>
                    </div> 
                    <div class="m-b-1 col-md-3 text-end">
                        
                           <a href="{{url('salesReport')}}"  class="btn btn-primary" tabindex="1">Export</a>
                          </div>   
                    
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1 text-center">SL#</th>
            <th style="min-width:130px;" class="p-1 text-start">Collection Office</th>
            <th style="min-width:150px;" class="p-1 text-start">Book Date</th>
            <th style="min-width:160px;" class="p-1 text-start">Sale Type</th>
            <th style="min-width:130px;" class="p-1 text-start">Booking Branch</th> 
            <th style="min-width:160px;" class="p-1 text-start">Origin</th> 
            <th style="min-width:130px;" class="p-1 text-start">Dest.</th> 
             <th style="min-width:130px;" class="p-1 text-start">Docket No</th>  
            <th style="min-width:130px;" class="p-1 text-start"> Client Name</th>
            <th style="min-width:130px;" class="p-1 text-end"> Pcs.</th>
            <th style="min-width:130px;" class="p-1 text-end">Act. Wt.</th>
             <th style="min-width:130px;" class="p-1 text-end">Chrg. Wt.</th>
            <th style="min-width:130px;" class="p-1 text-end">Amount</th>
            <th style="min-width:130px;" class="p-1 text-start">Delivery Branch</th>
            <th style="min-width:130px;" class="p-1 text-start">Delivery date</th>
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
            $sumQty=0;
            $sumActual=0;
            $sumCharhe=0;
            ?>
            @foreach($office as $offcies)
            <?php 
            $sumQty=0;
            $sumActual=0;
            $sumCharhe=0;
            ?>
             @foreach($AllTopay as  $key => $value)
             @if($offcies->CollectionOffice==$value->CollectionOffice)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{$value->CollectionOffice}}</td>
             <td class="p-1">{{$value->Booking_Date}}</td>

              <td class="p-1">{{$value->BookingType}}</td>
              <td class="p-1">{{$value->OfficeName}}</td>
              <td class="p-1">{{$value->SourceCity}}</td>

              <td class="p-1">{{$value->DestCity}}</td>
              <td class="p-1"> {{$value->Docket_No}}</td>
                <td class="p-1"> {{$value->CustomerName}}</td>
               <td class="p-1">{{$value->Qty}}</td>
              <td class="p-1"> {{$value->Actual_Weight}}</td>
              <td class="p-1">{{$value->Charged_Weight}}</td>
              <td class="p-1">{{$value->Amt}}</td> 
             <td class="p-1"></td>
             <td class="p-1">
          </tr>
            <?php
             $sumQty+=$value->Qty;
             $sumActual+=$value->Actual_Weight;
             $sumCharhe+=$value->Charged_Weight;
            ?>
                
           @endif
            @endforeach
            <tr style="background: grey;">
             <td class="p-1"></td>
             <td class="p-1"><b>Sub Total </b></td>
             <td class="p-1"></td>

              <td class="p-1"></td>
              <td class="p-1"></td>
              <td class="p-1"></td>

              <td class="p-1"></td>
              <td class="p-1"></td>
                <td class="p-1"> </td>
               <td class="p-1"><b>{{$sumQty}}</b></td>
              <td class="p-1"><b> {{$sumActual}}</b></td>
              <td class="p-1"><b>{{$sumCharhe}}</b></td>
              <td class="p-1"></td> 
             <td class="p-1"></td>
             <td class="p-1"></td>
             </tr>
           @endforeach
         
            
         </tbody>
        </table>
  </div>
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