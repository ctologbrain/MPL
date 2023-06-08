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
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$excessReceiving->total()}}</span></div>   
                    
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:150px;" class="p-1">Forwarding Number</th>
            <th style="min-width:160px;" class="p-1">Forwarding Date</th>
           
            <th style="min-width:130px;" class="p-1">Forwarding Weight</th>	
            <th style="min-width:160px;" class="p-1">Office Name</th>	
           
            <th style="min-width:130px;" class="p-1">Origin</th>
            <th style="min-width:150px;" class="p-1">Destination</th>
            <th style="min-width:160px;" class="p-1">Client Name</th>
           
            <th style="min-width:130px;" class="p-1">Pieces</th>	
            <th style="min-width:160px;" class="p-1">Actual Weight</th>	
            <th style="min-width:130px;" class="p-1">Charge Weight</th>		
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
            @foreach($excessReceiving as $key)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"><a href="{{url('docketTracking?docket='.$key->DocketNo)}}">{{$key->DocketNo}}</a></td>
             <td class="p-1">@isset($key->getGatepassDocketsDet->GP_Number) {{$key->getGatepassDocketsDet->GP_Number}} @endisset</td>
             <td class="p-1">{{date("d-m-Y",strtotime($key->Receiving_date))}}</td>
             <td class="p-1">@isset($key->offcieDetails->OfficeCode) 
                {{$key->offcieDetails->OfficeCode}} ~ {{$key->offcieDetails->OfficeName}} @endisset</td>

            <td class="p-1">{{$key->Remark}}</td>   
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $excessReceiving->appends(Request::all())->links() !!}
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