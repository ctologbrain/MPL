@include('layouts.appTwo')
<style>
   
    label {
    font-size: 8.5pt !important;
    font-weight: 900;
    color: #444040
}
.consignorSelection
{
    display:none !important;
}
body{
    min-height: 830px !important;
}
.allLists{
    box-shadow: 0 2px 5px rgba(0, 0, 0, 1.0);
}
.generator-container .form-control{
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
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
    @if (session('status'))
     <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Success - </strong>  {{ session('status','') }}
    </div>
    @endif
    <form id="FormExe" action="{{url('submitDrsDelivery')}}" method="POST">
    @csrf
        <div class="row p-1 mt-1">
            <div class="col-3">
                <div class="row">
                     <label class="col-md-5 col-form-label" for="close_date">Delivery Date<span class="error">*</span></label>
                    <div class="col-md-7 d-flex justify-content-between align-items-center">
                        <input type="text" class="form-control datepickerOne delivery_date" name="delivery_date" id="delivery_date" tabindex="1">
                  </div>
                  
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                     <label class="col-md-5 col-form-label" for="close_date">DRS Number<span class="error" >*</span></label>
                    <div class="col-md-7 d-flex justify-content-between align-items-center" >
                        <input type="text" class="form-control drs_number" name="drs_number" id="drs_number" onchange="getDrsEntry(this.value)" tabindex="2">
                  </div>
                  
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                     <label class="col-md-5 col-form-label" for="close_date">Opening Km</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control opening_km" name="opening_km" id="opening_km" tabindex="3">
                  </div>
                  
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                     <label class="col-md-5 col-form-label" for="close_date">Closing Km</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control closing_km" name="closing_km" id="closing_km" tabindex="4">
                  </div>
                  
                </div>
            </div>
        </div>
    
    <div class="table-responsive newtable">
                
            </div>
            </form>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true
      });
     $(".datepickerOne").val('{{date("d-m-Y")}}');
     
function getDrsEntry(DrsNo)
{
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getDrsEntryNumber',
       cache: false,
       data: {
           'DrsNo':DrsNo
       },
       success: function(data) {
        $('.newtable').html(data);
       }
     });
}

function selectType(vall,position){
    if(vall=="NDR"){
        $("#ndr_remark"+position).prop('readonly',false);
        $("#ndr_reason"+position).prop('disabled',false);
    }
    else{
        $("#ndr_remark"+position).prop('readonly',true);
        $("#ndr_reason"+position).prop('disabled',true);
    }
}

function saveSubmit(){
    if($("#delivery_date").val()==""){
        alert("Please Enter Delivery Date");
        return false;
    }

    if($("#drs_number").val()==""){
        alert("Please Enter DRS Number");
        return false;
    }
    var GetId=[];
    $(".actual_pieces").each( function(i){
        GetId.push($(this).data("target"));

    });

   var  GetIdLength = $(".actual_pieces").length;
   for(var i=0; i< GetIdLength; i++){
       if($("#actual_pieces"+GetId).val()== '' ){
           alert("Please Enter Docket");
           return false;
       }

       if($("#type"+GetId).val()==''){
           alert("Please Select Type");
           return false;
       }

       if($("#delievery_pieces"+GetId).val()== '' ){
           alert("Please Enter Pieces");
           return false;
       }

       if($("#weight"+GetId).val()== '' ){
           alert("Please Enter weight");
           return false;
       }

       if($("#time"+GetId).val()== '' ){
           alert("Please Enter Date");
           return false;
       }

       if($("#proof_name"+GetId).val()== '' ){
           alert("Please Enter Proof Name");
           return false;
       }


       
       
   }

   $("#FormExe").submit();

}
 
</script>