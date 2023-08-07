@include('layouts.app')

<div class="generator-container allLists tally_dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        
                        <li class="breadcrumb-item active">TRAINING DOCUMENTS</li>
                    </ol>
                </div>
                <h4 class="page-title">TRAINING DOCUMENTS</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <form method="GET" action="" id="subForm">
    @csrf
        <div class="row pl-pr">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="bdr-btm">
                                        <div class="row bdr-btm">
                                            <div class="col-12 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="filter_type">Process Name<span class="error">*</span></label>
                                                    <div class="col-md-4">
                                                     <input type="text" name="Process_Name" class="form-control Process_Name" id="Process_Name" tabindex="1">
                                                     <input type="hidden" name="pid" class="form-control Process_Name" id="pid"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="Description">Description<span class="error">*</span></label>
                                                    <div class="col-md-4">
                                                    <textarea class="form-control Description" name="Description" id="Description" rows="3" cols="20" tabindex="2"></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                             <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="Document_Name">Document Name<span class="error">*</span></label>
                                                    <div class="col-md-4">
                                                     <input type="text" name="Document_Name" class="form-control Document_Name" id="Document_Name" tabindex="3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="access_role">Access Role</label>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="admin" tabindex="4" style="margin-right: 10px;" value="ADMIN"> ADMIN
                                                    </div>
                                                     <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="billing" tabindex="5" style="margin-right: 10px;"  value="BILLING"> BILLING
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="branch_incharge" tabindex="6" style="margin-right: 10px;" value="BRANCH INCHARGE"> BRANCH INCHARGE
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="branch_manager" tabindex="7" style="margin-right: 10px;" value="BRANCH MANAGER"> BRANCH MANAGER
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="branch_stock"></label>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="branch_stock" tabindex="8" style="margin-right: 10px;"  value="BRANCH STOCK"> BRANCH STOCK
                                                    </div>
                                                     <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="customer_mpps_sticker" tabindex="9" style="margin-right: 10px;"  value="CUSTOMER MPPS STICKER"> CUSTOMER MPPS STICKER
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="customer_service" tabindex="10" style="margin-right: 10px;"  value="CUSTOMER SERVICE"> CUSTOMER SERVICE
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="customer_service_ho" tabindex="11" style="margin-right: 10px;"  value="CUSTOMER SERVICE HO"> CUSTOMER SERVICE HO
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="filter_type"></label>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="delivery_pickup_executive" tabindex="12" style="margin-right: 10px;"  value="DELIVERY PICKUP EXECUTIVE"> DELIVERY PICKUP EXECUTIVE
                                                    </div>
                                                     <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="ho_premium" tabindex="13" style="margin-right: 10px;"  value="HO PREMIUM"> HO PREMIUM
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="hrms" tabindex="14" style="margin-right: 10px;"  value="HRMS"> HRMS
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="imprest" tabindex="15" style="margin-right: 10px;"  value="IMPREST"> IMPREST
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="filter_type"></label>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="loading_supervisor" tabindex="16" style="margin-right: 10px;"  value="LOADING/UNLOADING SUPERVISOR"> LOADING/UNLOADING SUPERVISOR
                                                    </div>
                                                     <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="maneger" tabindex="17" style="margin-right: 10px;"  value="MANAGER"> MANAGER
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="regional_maneger" tabindex="18" style="margin-right: 10px;"  value="REGIONAL MANAGER"> REGIONAL MANAGER
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="super_admin" tabindex="19" style="margin-right: 10px;"  value="SUPER ADMIN"> SUPER ADMIN
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="filter_type"></label>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                     <input type="checkbox" name="Access_Role" class="Access_Role" id="vendor_login" tabindex="20" style="margin-right: 10px;"  value="Vendor Login"> Vendor Login
                                                    </div>
                                                    
                                            </div>

                                            <div class="col-12 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="filter_type">Attachment</label>
                                                    <div class="col-md-4 d-flex align-items-center">
                                                     <input type="file" name="Attachment" class=" Attachment" id="Attachment" tabindex="21"> 
                                                    </div>
                                                   
                                                </div>
                                            </div>

                                            <div class="col-12 text-center mb-1">
                                                <input type="button" tabindex="22" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddTrainingDoc();">
                                                <a href="{{url('TrainingDocument')}}" tabindex="23"   class="btn btn-primary btnSubmit" >Cancel</a>
                                            </div>
                                            
                                           <hr>
                                          </div>


                                          <div class="row mt-1">
                                             <div class="col-12 text-end">
                                              <input  name="submit" type="submit" tabindex="24" value="Download" class="btn btn-primary btnSubmit" id="btnSubmit">
                                            </div>
                                            <div class="col-12 mt-1">
                                              <div class="table-responsive a">
                                                <table class="table table-bordered">
                                                  <tr class="main-title">
                                                    <th class="p-1 text-center" style="min-width: 50px;">SL#</th>
                                                    <th class="p-1 text-center" style="min-width: 180px;">ACTION</th>
                                                    <th class="p-1 text-start" style="min-width: 270px;">Process Name</th>
                                                     <th class="p-1 text-start" style="min-width: 390px;">Description</th>
                                                     <th class="p-1 text-start" style="min-width: 270px;">Document Name</th>
                                                     <th class="p-1 text-start" style="min-width: 890px;">Access Role</th>
                                                      <th class="p-1 text-start" style="min-width: 50px;">Active</th>
                                                  </tr>
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
                                                  @foreach($doc as $key)
                                                  <?php $i++; ?>
                                                  <tr id="Row{{$i}}">
                                                    <td class="p-1 text-center">{{$i}}</td>
                                                    <td class="p-1 text-center"><a href="javascript:void(0);" style="color: orange;" onclick="EditState('{{$key->id}}');">Edit </a> | <a href="javascript:void(0);" style="color: orange;" onclick="deleteData('{{$key->id}}');">Delete </a> | <a @isset($key->Attachment) href="{{url($key->Attachment)}}" @endisset target="_blank" style="color: orange;">View Attach</a></td>
                                                    <td class="p-1 text-start">{{$key->Process_Name}}</td>
                                                    <td class="p-1 text-start">{{$key->Description}}</td>
                                                     <td class="p-1 text-start">{{$key->Document_Name}}</td>
                                                    <td class="p-1 text-start">{{$key->Access_Role}}</td>
                                                    <td class="p-1 text-center">{{$key->Is_Active}}</td>
                                                  </tr>
                                                  @endforeach
                                                </table>
                                              </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>  
    </form>
</div>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
  
function AddTrainingDoc()
{
    if($('#Process_Name').val()=='')
    {
        alert('Please Enter Process Name');
        return false;
    }
    if($('#Description').val()=='')
    {
        alert('Please Enter Description');
        return false;
    }
    if($('#Document_Name').val()=='')
    {
        alert('Please Document Name');
        return false;
    }
  
       var pid = $("#pid").val();
    var Process_Name = $("#Process_Name").val();
    var Description=$('#Description').val();
    var Document_Name=$('#Document_Name').val();
    var Access_RoleArr=[];

    $('.Access_Role:checked').each(function(i){
        Access_RoleArr.push($(this).val());
    });
    var Access_Role = Access_RoleArr.join(",");

    var Attachment=$('#Attachment')[0].files[0];
  
  
    var base_url = '{{url('')}}';
    var  formdata = new FormData();
    formdata.append("Process_Name",Process_Name);
    formdata.append("Description",Description);
    formdata.append("Document_Name",Document_Name);
    formdata.append("Access_Role",Access_Role);
    formdata.append("Attachment",Attachment);
    formdata.append("pid",pid);
    $("#btnSubmit").prop("disabled",true);
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/TrainingDocumentPOST',
       cache: false,
       contentType: false,
       processData: false,
       data: formdata,
       success: function(data) {
            alert(data);
            location.reload();
       }
     });

}
function EditState(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/TrainingDocumentShow',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
           $('.pid').val(obj.id);
           $('.Process_Name').val(obj.Process_Name);
            $('.Description').val(obj.Description);
            $('.Document_Name').val(obj.Document_Name);
            if(obj.Access_Role!=""){
             var Arr =  obj.Access_Role.split(",");
             for(var i=0; i< Arr; i++){
                if(Arr[i] =="ADMIN"){
                $('#admin').prop('checked', true);
                }
                if(Arr[i] =="BILLING"){
                $('#billing').prop('checked', true);
                }
                if(Arr[i] =="BRANCH INCHARGE"){
                $('#branch_incharge').prop('checked', true);
                }
                if(Arr[i] =="BRANCH MANAGER"){
                $('#branch_manager').prop('checked', true);
                }

                if(Arr[i] =="BRANCH STOCK"){
                $('#branch_stock').prop('checked', true);
                }
                if(Arr[i] =="CUSTOMER MPPS STICKER"){
                $('#customer_mpps_sticker').prop('checked', true);
                }
                if(Arr[i] =="CUSTOMER SERVICE"){
                $('#customer_service').prop('checked', true);
                }
                if(Arr[i] =="CUSTOMER SERVICE HO"){
                $('#customer_service_ho').prop('checked', true);
                }

                if(Arr[i] =="DELIVERY PICKUP EXECUTIVE"){
                $('#delivery_pickup_executive').prop('checked', true);
                }
                if(Arr[i] =="HO PREMIUM"){
                $('#ho_premium').prop('checked', true);
                }
                if(Arr[i] =="HRMS"){
                $('#hrms').prop('checked', true);
                }
                if(Arr[i] =="IMPREST"){
                $('#imprest').prop('checked', true);
                }

                if(Arr[i] =="LOADING/UNLOADING SUPERVISOR"){
                $('#loading_supervisor').prop('checked', true);
                }
                if(Arr[i] =="MANAGER"){
                $('#maneger').prop('checked', true);
                }
                if(Arr[i] =="REGIONAL MANAGER"){
                $('#regional_maneger').prop('checked', true);
                }
                if(Arr[i] =="SUPER ADMIN"){
                $('#super_admin').prop('checked', true);
                }

             }
            }
            if (obj.Is_Active == 'Yes') {
                $('#Active').prop('checked', true);
            } else {
                $('#Active').prop('checked', false);
            }
          

        }
    });
}

    function deleteData(id){
        if(confirm("Are You Sure ?")){
            var base_url = '{{url('')}}';
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                url: base_url + '/TrainingDocumentDelete',
                cache: false,
                data: {
                    'id': id
                },
                success: function(data) {
                    $("#Row"+id).remove();
                }
            });
        }
    }

    </script>
             
