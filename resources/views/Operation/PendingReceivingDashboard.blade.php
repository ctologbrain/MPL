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
            <th style="min-width:150px;" class="p-1">GP Date</th>
            <th style="min-width:130px;" class="p-1">Destination  Office </th>
            <th style="min-width:130px;" class="p-1">Gatepass Number</th>	
            <th style="min-width:160px;" class="p-1">Docket Number</th>
            <th style="min-width:130px;" class="p-1">Vehicle No</th>
            <th style="min-width:160px;" class="p-1">Deriver Name</th>
            <th style="min-width:160px;" class="p-1">Consolidated EWB</th>
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
            @foreach($docketMaster as $key)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{date("d-m-Y",strtotime($key->GP_TIME))}} </td>
             <td class="p-1">{{$key->OfficeCode}}  ~ {{$key->OfficeName}}</td>
             
             <td class="p-1">{{$key->GP_Number}}</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$key->Docket_No)}}">{{$key->Docket_No}}</a></td>
             <td class="p-1">{{$key->VehicleNo}}</td>
             <td class="p-1">{{$key->DriverName}}</td>
         
             <td class="p-1">{{''}}</td>
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $docketMaster->appends(Request::all())->links() !!}
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