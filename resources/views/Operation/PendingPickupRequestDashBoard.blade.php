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
                    <div class="col-12">
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1 pickupSacnReportTable">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:50px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Status</th>
            <th style="min-width:130px;" class="p-1">Status Remark</th>
            <th style="min-width:130px;" class="p-1">Docket No.	</th>
            <th style="min-width:130px;" class="p-1">Order Number	</th> 
            <th style="min-width:130px;" class="p-1">Pickup Office</th>  
            <th style="min-width:180px;" class="p-1"> Customer Name</th> 
         
            <th style="min-width:130px;" class="p-1">Pickup Date</th> 
           
              
            
         
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
            @foreach($pickupRequest as $pickupSacnList)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1"><a href="javascript:void(0);" onclick="openPopUp();" {{$pickupSacnList->OrderNo}}</td>
             <td class="p-1">{{''}}</td>
             <td class="p-1">@isset($pickupSacnList->CustomerDetails->CustomerCode) {{$pickupSacnList->CustomerDetails->CustomerCode}} ~ {{$pickupSacnList->CustomerDetails->CustomerName}} @endisset</td>
             <td class="p-1">{{$pickupSacnList->store_name}}</td>
             <td class="p-1">{{date("d-m-Y", strtotime($pickupSacnList->pickup_date))}}</td>
             <td class="p-1">{{$pickupSacnList->contactPersonName}}</td>
             
            
           
           </tr>
           @endforeach
           
         </tbody>
        </table>
      </div>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $pickupRequest->appends(Request::all())->links() !!}
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