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
    
    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:160px;" class="p-1">Client Name</th>
            <th style="min-width:150px;" class="p-1">Booking Date</th>
            <th style="min-width:130px;" class="p-1">Origin State </th>
            <th style="min-width:160px;" class="p-1">Origin City</th>
            <th style="min-width:130px;" class="p-1">Dest. State</th>	
            <th style="min-width:160px;" class="p-1">Dest. City</th>	
            <th style="min-width:170px;" class="p-1">Delivery Date </th>
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
            @foreach($Images as $DockBookData)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$DockBookData->Docket_No)}}">{{$DockBookData->Docket_No}}</a></td>
             <td class="p-1">@isset($DockBookData->CustomerCode) {{$DockBookData->CustomerCode}} ~ {{$DockBookData->CustomerName}} @endisset</td>
             <td class="p-1">{{date("d-m-Y",strtotime($DockBookData->Booking_Date))}}</td>

             <td class="p-1">@isset($DockBookData->OrgStatename)
                {{$DockBookData->OrgStatename}} @endisset</td>
             <td class="p-1">@isset($DockBookData->orgCityCode) {{$DockBookData->orgCityCode}} ~ {{$DockBookData->orgCityName}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestStatename) {{$DockBookData->DestStatename}} @endisset</td>
             <td class="p-1">@isset($DockBookData->DestCityCode)
                {{$DockBookData->DestCityCode}} ~ {{$DockBookData->DestCityName}} @endisset</td>
             
                <td class="p-1"> @if(isset($DockBookData->Time)) {{date("d-m-Y H:i:s",strtotime($DockBookData->Time))}} @endif</td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $Images->appends(Request::all())->links() !!}
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