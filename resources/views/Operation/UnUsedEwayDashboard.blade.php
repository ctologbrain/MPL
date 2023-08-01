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
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3 total-record mt-2"> <p> Total Record:<b>{{$DocketBooking->total()}}</b> </p></div>   
                    <div class="col-8 text-end mt-2"> <a href="{{url('/UnUsedEwayDashboard?submit=Download')}}" class="btn btn-primary text-white">Download</a></div> 
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">eWaybill Date	 </th>
            <th style="min-width:150px;" class="p-1">eWaybill No</th>
            <th style="min-width:160px;" class="p-1">Customer Name</th>
           
            <th style="min-width:130px;" class="p-1">Customer City</th>	
            <th style="min-width:160px;" class="p-1">Place Of Delivery</th>	
            <th style="min-width:160px;" class="p-1">State</th>	
            <th style="min-width:160px;" class="p-1">Pincode</th>	
            <th style="min-width:160px;" class="p-1">eWaybill Expiry Date</th>
           
          
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
            @foreach($DocketBooking as $key)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{date("d-m-Y", strtotime($key->EWB_Date))}}</td>   
             <td class="p-1">{{$key->EWB_No}}</td>   
             <td class="p-1">{{$key->CustomerName}}</td>   
             <td class="p-1">{{$key->City}}</td>   
             <td class="p-1">{{$key->CityName}}</td>   

            <td class="p-1">{{$key->name}}</td>   
            <td class="p-1">{{$key->PinCode}}</td>   
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $DocketBooking->appends(Request::all())->links() !!}
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