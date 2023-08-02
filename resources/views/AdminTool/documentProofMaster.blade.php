@include('layouts.app')

<div class="generator-container allLists tally_dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        
                        <li class="breadcrumb-item active">DOCUMENT PROOF (KYC) MASTER</li>
                    </ol>
                </div>
                <h4 class="page-title">DOCUMENT PROOF (KYC) MASTER</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="subForm">
    @csrf
        <div class="row pl-pr">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="bdr-btm">
                                        <div class="row pl-pr">
                                            <div class="col-5 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="document_proof_name">Document Proof Name<span class="error">*</span></label>
                                                    <div class="col-md-4">
                                                     <input type="text" name="document_proof_name" class="form-control document_proof_name" id="document_proof_name" tabindex="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="document_proof_name">Acive </label>
                                                    <div class="col-md-4 mt-1">
                                                    <input type="checkbox" name="Active" tabindex="2" class="Active" id="Active">	
                                                    <input type="hidden" name="pid"  class="pid" id="pid">	
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-12 text-center mt-1 mb-1">
                                                <input type="button" tabindex="2" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddPincode();">
                                                <a href="{{url('DocumentProofMaster')}}" class="btn btn-primary btnSubmit" >cancel </a>
                                            </div>
                                            
                                           <hr>
                                          </div>


                                          <div class="row mt-1">
                                             <div class="col-12 text-end">
                                              <input type="button" tabindex="4" value="Export" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                            </div>
                                            <div class="col-12 mt-1">
                                              <div class="table-responsive a">
                                                <table class="table table-bordered">
                                                  <tr class="main-title">
                                                    <th class="p-1 text-center" style="min-width: 20px;">SL#</th>
                                                    <th class="p-1 text-center" style="min-width: 20px;">ACTION</th>
                                                    <th class="p-1 text-start" style="min-width: 670px;">Document Proof Name</th>
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
                                                  @foreach($listing as $key)
                                                  <?php $i++; ?>
                                                  <tr>
                                                    <td class="p-1 text-center">{{$i}}</td>
                                                    <td class="p-1 text-center"><a href="javascript:void(0);" onclick="viewState('{{$key->id}}')" style="color: orange;">View </a> | <a href="javascript:void(0);" onclick="EditState('{{$key->id}}')" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start"> {{ $key->document}}</td>
                                                    <td class="p-1 text-start">{{ $key->Is_Active}}</td>
                                                  </tr>
                                                  @endforeach
                                                  <!-- <tr>
                                                    <td class="p-1 text-center">2</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">COI</td>
                                                   
                                                    <td class="p-1 text-start">YES</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="p-1 text-center">3</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">GSTIN CERTIFICATE</td>
                                                   
                                                    <td class="p-1 text-start">YES</td>
                                                  </tr>
                                                   <tr>
                                                    <td class="p-1 text-center">4</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">PAN CARD OF COMPANY</td>
                                                   
                                                    <td class="p-1 text-start">YES</td>
                                                  </tr> -->
                                                 
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
    $('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});
$('.selectBox').select2();
function AddPincode() {

   
    if ($('#document_proof_name').val() == '') {
        alert('please Enter document proof name');
        return false;
    }

    if($("#Active").prop("checked")==true){
    var Active ="Yes";
   }
   else{
    var Active ="No";
   }
   
    
    var document_proof_name = $('#document_proof_name').val();
    var Customer = $('#Customer').val();
    var pid = $('#pid').val();

    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/DocumentProofMasterPOST',
        cache: false,
        data: {
            'document_proof_name': document_proof_name,
            'pid': pid,
            'Active':Active
        },
        success: function(data) {
              if(data=='false'){
                alert('Office Customer already Mapped');
                  $(".btnSubmit").attr("disabled", false);
            }
            else{
                alert(data);
                location.reload();
            }
        }
    });
}

function viewState(id) {

    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/DocumentProofMasterShow',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.document_proof_name').val(obj.document).trigger('change');
            $('.document_proof_name').attr('disabled', true);
            if (obj.Is_Active == 'Yes') {
            $('#Active').prop('checked', true);
            } else {
                $('#Active').prop('checked', false);
            }
            $('.Active').attr('disabled', true);

         
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
        url: base_url + '/DocumentProofMasterShow',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
           $('.pid').val(obj.id);
           $('.document_proof_name').val(obj.document).trigger('change');
            $('.document_proof_name').attr('disabled', false);
            if (obj.Is_Active == 'Yes') {
        $('#Active').prop('checked', true);
        } else {
            $('#Active').prop('checked', false);
        }
        $('#Active').attr('disabled', false);

        }
    });
}

    </script>
             
