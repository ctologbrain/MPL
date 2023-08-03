@include('layouts.appThree')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
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
    <div class="row pl-pr mt-1">
    <div class="col-xl-12 text-end mt-1">
    <a class="btn btn-primary text-white" href="{{url('PendingShipmentBillDashboard?submit=Download')}}">Download</a>
    </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                


            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
        
          <th style="min-width:20px;" class="p-1">SL#</th>
          <th style="min-width:180px;" class="p-1">Customer</th>
          <th style="min-width:180px;" class="p-1">Book Office</th>
          <th style="min-width:160px;" class="p-1">Org</th>
          <th style="min-width:160px;" class="p-1">Dest</th>
          <th style="min-width:100px;" class="p-1">Book Date</th>
          <th style="min-width:50px;" class="p-1">Docket</th>
          <th style="min-width:130px;" class="p-1">Product Name</th>
          <th style="min-width:60px;" class="p-1">Pcs</th>
          <th style="min-width:130px;" class="p-1">Chrg. Wt	</th>
          <th style="min-width:130px;" class="p-1">Freight</th>
          <th style="min-width:130px;" class="p-1">OT Charge</th>
          <th style="min-width:130px;" class="p-1">IGST</th>
          <th style="min-width:130px;" class="p-1">CGST</th>
          <th style="min-width:130px;" class="p-1">SGST</th>
          <th style="min-width:130px;" class="p-1">Total Amt</th>
          
           </tr>
         </thead>
         <tbody>
         <?php $i=0; ?>
        
            @foreach($DocketData as $Docket)
            <?php $i++; ?>
            <tr>
               
                <td class="p-1">{{$i}}</td>
                <td class="p-1">{{$Docket['Customer']}}</td>
                <td class="p-1">{{$Docket['Office']}}</td>
                <td class="p-1">{{$Docket['origin']}}</td>
                 <td class="p-1">{{$Docket['Dest']}}</td>
                <td class="p-1">{{$Docket['Booking_Date']}}</td>
                <td class="p-1">{{$Docket['Docket_No']}}</td>
                <td class="p-1">{{$Docket['PTL']}}</td>
                <td class="p-1">{{$Docket['Qty']}}</td>
                <td class="p-1">{{$Docket['Charged_Weight']}}</td>
                <td class="p-1">{{$Docket['fright']}}</td>
                <td class="p-1">{{$Docket['Charge']}}</td>
                <td class="p-1">{{$Docket['cgst']}}</td>
                <td class="p-1">{{$Docket['scst']}}</td>
                 <td class="p-1">{{$Docket['igst']}}</td>
                 <td class="p-1">{{$Docket['total']}}</td>
           </tr>
            @endforeach
            
          
        </tbody>
        </table>
       </div>
</form>
       
        
        </div> <!-- end col -->
      

    </div>
</div>
</div>
</div>
                   </div> 
