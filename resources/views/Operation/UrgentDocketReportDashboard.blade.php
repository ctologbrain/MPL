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
          @csrf
          @method('GET')
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row p-1">
                   <div class="col-md-3">
                  
                    </div> 
                          
                   
                   
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$DocketBooking->total()}}</span></div>   
                    <div class="col-8 text-end">   <input type="submit" name="submit" value="Download"  class="btn btn-primary" tabindex="1"></div>
                    </div>
                    </form>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:100px;" class="p-1">Date	</th>
            <th style="min-width:160px;" class="p-1">Origin </th>
            <th style="min-width:130px;" class="p-1">Dest. </th>	
            <th style="min-width:160px;" class="p-1">Vehicle No.</th>
             <th style="min-width:160px;" class="p-1">Gatepass No.</th>
             <th style="min-width:160px;" class="p-1">Docket No.</th>
             <th style="min-width:160px;" class="p-1">Client Name</th>
             <th style="min-width:160px;" class="p-1">Activity Date </th>
             <th style="min-width:160px;" class="p-1">Activity</th>
             <th style="min-width:160px;" class="p-1">Current Office</th>
             <th style="min-width:160px;" class="p-1">Remarks</th>
            
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
            <td class="p-1">{{date("d-m-Y",strtotime($key->BD))}}</td>   
            <td class="p-1">{{$key->Code}}</td>
            <td class="p-1">{{$key->DCity}}</td>
            <td class="p-1">{{$key->VehicleNo}}</td>
             <td class="p-1">@isset($key->GP_Number)  {{$key->GP_Number}} @endisset</td>
             <td class="p-1">@isset($key->Docket_No) <a href="{{url('docketTracking?docket=').$key->Docket_No}}" target="_blank" > {{$key->Docket_No}} </a>  @endisset</td>
             <td class="p-1">{{$key->cust}}</td>
             <td class="p-1">{{$key->allocDate}}</td>
             <td class="p-1">{{$key->title}}</td>
             <td class="p-1"> </td>
             <td class="p-1">{{$key->CRemark}}</td>
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
<div class="VehicleDetails"></div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
       todayHighlight: true
      });
     
    $(".selectBox").select2();
 
 

</script>