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
         
                    <div class="col-12"> 
                    <div class="row">
                    <div class="col-3 mt-1">
                     <h5>Total RECORD: {{$data->Total()}} </h5>
                    </div>
                    <div class="col-8 text-end mt-1">
                     <a href="{{url('PendingTopaycashAccountDashboard?submit=Download')}}" class="btn btn-primary text-white">Download</a> 
                     </div>
                     </div> 
                     </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:150px;" class="p-1">Collection Office</th>
            <th style="min-width:130px;" class="p-1">Booking Date</th>	
            <th style="min-width:130px;" class="p-1">Sale Type</th>
            <th style="min-width:130px;" class="p-1">Origin</th>
            <th style="min-width:160px;" class="p-1">Destination</th>
            <th style="min-width:130px;" class="p-1">Docket NO</th>	
            <th style="min-width:160px;" class="p-1">Client Name</th>
             <th style="min-width:130px;" class="p-1">Pcs</th>
             <th style="min-width:130px;" class="p-1"> Act Wt</th>
             <th style="min-width:130px;" class="p-1">Chrg Wt</th>
            <th style="min-width:130px;" class="p-1"> Amount</th>
            <th style="min-width:130px;" class="p-1"> Delivery Branch</th>
            <th style="min-width:130px;" class="p-1"> Date</th>
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
            @foreach($data as $key)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"> {{$key->OfficeName}} </td>
             <td class="p-1"> {{$key->BookingDatte}} </td>
             <td class="p-1"> {{$key->BookingType}} </td>
             <td class="p-1"> {{$key->SourceCity}}</td>
             <td class="p-1"> {{$key->DestCity}}</td>
             <td class="p-1"><a href="{{url('docketTracking?docket=').$key->Docket_No}}"> {{$key->Docket_No}}</td>
             <td class="p-1"> {{$key->CustomerName}}</td>
             <td class="p-1"> {{$key->Qty}} </td>
             <td class="p-1"> {{$key->Actual_Weight}} </td>
             <td class="p-1"> {{$key->Charged_Weight}}</td>
             <td class="p-1">  {{$key->TotalAmount}}</td>
             <td class="p-1">  {{$key->DelBranch}}</td>
             <td class="p-1">  {{$key->DelDate}}</td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $data->appends(Request::all())->links() !!}
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