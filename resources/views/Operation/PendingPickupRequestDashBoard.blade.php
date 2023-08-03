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
            <th style="min-width:130px;" class="p-1">Assign To</th>
            <th style="min-width:130px;" class="p-1">Docket No.	</th>
            <th style="min-width:130px;" class="p-1">Next PickUp Date</th>
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
            <?php $i++; 
           if( $pickupSacnList->Status ==1){
            $status = "ASSIGN";
           }
            elseif( $pickupSacnList->Status ==2){
                $status = "PICK" ; 
            }
            elseif( $pickupSacnList->Status ==3){
                 $status = "UNPICK";
            }
            elseif( $pickupSacnList->Status ==4){
                  $status ="CANCEL";
            }
            else{
                $status ="";
            }
            
            ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{$status}}</td>
             <td class="p-1">@isset($pickupSacnList->emplDet->EmployeeName) {{$pickupSacnList->emplDet->EmployeeName}} @endisset</td>
             <td class="p-1">{{$pickupSacnList->DocketNo}}</td>
             <td class="p-1">@isset($pickupSacnList->NextPickupDate) {{date("d-m-Y",strtotime($pickupSacnList->NextPickupDate))}} @endisset</td>
             <td class="p-1"><a href="javascript:void(0);" onclick="openPopUp('{{$pickupSacnList->id}}');" >{{$pickupSacnList->OrderNo}} </a></td>
             <td class="p-1">{{$pickupSacnList->userDetails->empOffDetail->OfficeMasterParent->OfficeName}}</td>
             <td class="p-1">@isset($pickupSacnList->CustomerDetails->CustomerCode) {{$pickupSacnList->CustomerDetails->CustomerCode}} ~ {{$pickupSacnList->CustomerDetails->CustomerName}} @endisset</td>
          
             <td class="p-1">{{date("d-m-Y", strtotime($pickupSacnList->pickup_date))}}</td>
            
             
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
<div class="getModalPopUp" ></div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true
      });
$(".selectBox").select2();
 
 function openPopUp(GetRequestId){
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/PendingPickupRequestPOST',
       cache: false,
       data: {
        'GetRequestId':GetRequestId
       },
       success: function(data) {
            $(".getModalPopUp").html(data);
            $(".selectBox").select2({
                dropdownParent: $('#routeOrderModel')
            });
          
       }
       });
 
 }
 

 function SubmitDetails(){
    var base_url = '{{url('')}}';
    if($("#status").val()==''){
        alert("Please Select Status");
        return false;
    }
    if($("#status").val()=='1'){
        if($("#assign_to").val()==''){
            alert("Please Select assign to");
            return false;
        }
    }

    if($("#status").val()=='2'){
        if($("#docket").val()==''){
            alert("Please Enter Docket");
            return false;
        }
    }
    if($("#status").val()=='3'){
        if($("#nextAssignDate").val()==''){
            alert("Please Select Next PickUp Date");
            return false;
        }
        if($("#Reason").val()==''){
            alert("Please Enter Reason ");
            return false;
        }
        if($("#uploadImage").val()==''){
            alert("Please Choose file");
            return false;
        }
    }
    if($("#status").val()=='4'){
        if($("#Reason").val()==''){
            alert("Please Enter Reason");
            return false;
        }
    }
    var form = new FormData();
    var NextPickupdate = $("#nextAssignDate").val();
    var assign_to = $("#assign_to").val();
    var docket = $("#docket").val();
    var Reason = $("#Reason").val();
    var uploadImage = $("#uploadImage")[0].files[0];

    var RequestId = $("#RequestId").val();

    var RequestId = $("#RequestId").val();
    var status = $("#status").val();
    var statusRemark= $("#remarks").val();

    form.append("status",status);
    form.append("statusRemark",statusRemark);
    form.append("RequestId",RequestId);
    form.append("NextPickupdate",NextPickupdate);
    form.append("assign_to",assign_to);
    form.append("docket",docket);
    form.append("Reason",Reason);
    form.append("uploadImage",uploadImage);
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/PendingPickupRequestSubmitPOST',
       cache: false,
       processData:false,
       contentType:false,
       data: form,
       success: function(data) {
           alert(data);
           $('#routeOrderModel').modal('toggle');
           location.reload();
       }
       });
 }

 function openOptions(Option){
    if(Option==1){
        $("#docketBox").css("display","none");
        $("#assign_toBox").css("display","flex");
        $("#nextAssignDateBox").css("display","none");
        $("#ReasonBox").css("display","none");
        $("#uploadImageBox").css("display","none");
    }
    else if(Option==2){
        $("#docketBox").css("display","flex");
        $("#assign_toBox").css("display","none");
        $("#nextAssignDateBox").css("display","none");
        $("#ReasonBox").css("display","none");
        $("#uploadImageBox").css("display","none");
    }
    else if(Option==3){
        $("#docketBox").css("display","none");
        $("#assign_toBox").css("display","none");
        $("#nextAssignDateBox").css("display","flex");
        $("#ReasonBox").css("display","flex");
        $("#uploadImageBox").css("display","flex");
    }
    else if(Option==4){
        $("#docketBox").css("display","none");
        $("#assign_toBox").css("display","none");
        $("#nextAssignDateBox").css("display","none");
        $("#ReasonBox").css("display","flex");
        $("#uploadImageBox").css("display","none");
    }

 }
</script>