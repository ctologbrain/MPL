@include('layouts.appThree')

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
                                        <div class="col-12 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="customerType">Customer Type<span class="error">*</span></label>
                                                    <div class="col-md-4">
                                                     <select  name="customerType" tabindex="1" class="form-control customerType selectBox" id="customerType">
                                                      
                                                        <option value="CASH CUSTOMER">CASH CUSTOMER</option>
                                                        <option value="CREDIT CUSTOMER">CREDIT CUSTOMER</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-2 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="Mobile_No">Mobile No<span class="error">*</span></label>
                                                    <div class="col-md-4">
                                                     <input type="text" name="Mobile_No" class="form-control Mobile_No" id="Mobile_No" tabindex="1">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-12 mt-1">
                                              <div class="table-responsive a">
                                                <table class="table table-bordered">
                                                  <tr class="main-title p-2">
                                                   
                                                    <th class="p-1 text-start" style="min-width: 150px;">Document Proof Name</th>
                                                    <th class="p-1 text-start" style="min-width: 150px;">Document Number</th>
                                                     <th class="p-1 text-start" style="min-width: 150px;">Date of Issue</th>
                                                     <th class="p-1 text-start" style="min-width: 150px;">Date of Expiry</th>
                                                     <th class="p-1 text-start" style="min-width: 150px;">Upload Document</th>
                                                     <th class="p-1 text-start" style="min-width: 150px;"></th>
                                                  </tr>
                                                 
                                                 
                                                  <tr>
                                                    <td class="p-1 text-center">
                                                        <select  name="DocumentName" tabindex="46" class="form-control DocumentName selectBox" id="DocumentName">
                                                        <option value="">--Select--</option>
                                                        @foreach($Docs as $key)
                                                        <option value="{{$key->id}}">{{$key->document}}</option>
                                                        @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="p-1 text-center">
                                                    <input type="text" name="DocumetNumber" class="form-control DocumetNumber" id="DocumetNumber" tabindex="1">
                                                    </td>
                                                    <td class="p-1 text-start"> 
                                                    <input readonly type="text" name="DateOfIssue" class="form-control DateOfIssue datepickerOne" id="DateOfIssue" tabindex="1">
                                                    </td>
                                                    <td class="p-1 text-start">
                                                    <input readonly type="text" name="DateOfExp" class="form-control DateOfExp datepickerOne" id="DateOfExp" tabindex="1">
                                                    </td>

                                                    <td class="p-1 text-start">
                                                    <input type="file" name="Document" class="form-control Document" id="Document" tabindex="1">
                                                    </td>
                                                  </tr>
                                                 
                                                </table>
                                              </div>
                                            

                                            <div class="col-12 text-center mt-1 mb-1">
                                                <input type="button" tabindex="2" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddPincode();">
                                                <a href="{{url('DocumentProofMaster')}}" class="btn btn-primary btnSubmit" >cancel </a>
                                            </div>
                                            
                                           <hr>
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

<script>
    $('.datepickerOne').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight:true,
    autoClose:true
});
$('.selectBox').select2();
function AddPincode() {

    if ($('#Mobile_No').val() == '') {
        alert('please Enter Mobile Number');
        return false;
    }
   
    if ($('#DocumentName').val() == '') {
        alert('please Enter document proof name');
        return false;
    }
    if ($('#DocumetNumber').val() == '') {
        alert('please Enter document Number');
        return false;
    }

    var customerType = $('#customerType').val();
    var Mobile_No = $('#Mobile_No').val();
    var DocumentName = $('#DocumentName').val();
    var DocumetNumber = $('#DocumetNumber').val();
    var DateOfIssue = $('#DateOfIssue').val();
    var DateOfExp = $('#DateOfExp').val();
    var Document = $('#Document')[0].files[0];

    var base_url = '{{url('')}}';
    var form = new  FormData();
    form.append('customerType',customerType);
    form.append('Mobile_No',Mobile_No);
    form.append('DocumentName',DocumentName);
    form.append('DocumetNumber',DocumetNumber);
    form.append('DateOfIssue',DateOfIssue);
    form.append('DateOfExp',DateOfExp);
    form.append('Document',Document);
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddCustomerKYCPOST',
        cache: false,
        contentType:false,
        processData:false,
        data: form,
        success: function(data) {
            alert(data);
            location.reload();
        }
    });
}

    </script>
             