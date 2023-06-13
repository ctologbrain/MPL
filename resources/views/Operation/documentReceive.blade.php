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
            
                    <div class="table-responsive a"> 
               <table class="table table-bordered table-centered mb-1 mt-1">
                <thead>
                <tr class="main-title text-dark">
                    
                <th style="min-width:130px;" class="p-1">SL#</th>
                <th style="min-width:130px;" class="p-1">Destination Office</th>
                <th style="min-width:130px;" class="p-1">Dispatch Date</th>
                <th style="min-width:130px;"  class="p-1">Dispatch No</th>	
                <th style="min-width:130px;"  class="p-1">Courier Name	</th>
                <th style="min-width:130px;"  class="p-1">AWB Number</th>	
                <th style="min-width:200px;"  class="p-1">Courier Charges</th>
                <th style="min-width:130px;"  class="p-1">Dispatch By</th>	
                <th style="min-width:130px;"  class="p-1">Total Document</th>	
                <th style="min-width:130px;"  class="p-1">Action</th>	
            		
            	
            
         
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
            @foreach($Documentreceive as $key)
            <?php $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             
             <td  class="p-1">@isset($key->GetOfficeDet->OfficeCode) {{$key->GetOfficeDet->OfficeCode}} ~{{$key->GetOfficeDet->OfficeName}} @endisset</td>

             <td  class="p-1">{{date("d-m-Y",strtotime($key->Dispatch_Date))}}</td>
          
             <td  class="p-1">{{$key->DispatchNo}}</td>
             <td  class="p-1">{{$key->Courier_Name}}</td>
             <td  class="p-1">{{$key->Docket_Number}}</td>
             <td  class="p-1">{{$key->Courier_Charges}}</td>
             <td  class="p-1">@isset($key->userDet->empOffDetail->EmployeeName) {{$key->userDet->empOffDetail->EmployeeName}} @endisset</td>
             <td  class="p-1">{{$key->Total}}</td>

             <td  class="p-1"><a href="javascript:void(0)" onclick="OpenReceivingModal('{{$key->id}}');" >Receive</a></td>
             

           
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $Documentreceive->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<div class="getLoadedModal"></div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true
      });
      $('.selectBox').select2();

 function OpenReceivingModal(ID){
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/DocumentreceivedPost',
       cache: false,
       data:{
       "ID":ID
       },
       success: function(data) {
           $(".getLoadedModal").html(data);
       }
     });
 }
</script>