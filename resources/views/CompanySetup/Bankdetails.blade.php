@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
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
    <div class="row pl-pr mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title nav nav-tabs nav-bordered mb-3"></h4>
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>Success - </strong> {{ session('status','') }}
                    </div>
                    @endif
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Bank Code<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control BankCode" name="BankCode"
                                        id="BankCode">
                                    <input type="hidden" tabindex="1" class="form-control Bid" name="Bid" id="Bid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Bank Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="2" class="form-control BankName" name="BankName"
                                        id="BankName">
                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Branch Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="3" class="form-control BranchName" name="BranchName"
                                        id="BranchName">
                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Branch Address<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="4" class="form-control BranchAdd" name="BranchAdd"
                                        id="BranchAdd">
                                    <span class="error"></span>
                                </div>


                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Name As In Account<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="5" class="form-control NameAsAccount" name="NameAsAccount"
                                        id="NameAsAccount">
                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Account Type<span
                                            class="error">*</span></label>
                                        <select name="AccountType" class="form-control AccountType Selectbox" id="AccountType" tabindex="6">
                                        <option value="">--Select--</option>
                                        <option value="1">CURRENT</option>
                                        <option value="2">SAVING</option>
                                        </select>
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label"> Account No.<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="7" class="form-control AccountNo" name="AccountNo"
                                        id="AccountNo">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2 mt-4">
                                <label for="example-select" class="form-label ms-2"> Active</label>
                                <input type="checkbox" value="1" tabindex="8" class="form-check-input Active" name="Active"
                                        id="Active">
                                </div>


                                <div class="mb-2 col-md-4">
                                     <label for="example-select" class="form-label"></label><br>
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddBank()" tabindex="9">
                                    <a href="{{url('BankMaster')}}" class="btn btn-primary" tabindex="9">Cancel</a>
                                </div>
                                <h4 class="header-title nav nav-tabs nav-bordered"></h4>
                                <form action="" method="GET">
                                    @csrf
                                    @method('GET')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row pl-pr mt-1">
                                <div class="mb-2 col-md-3">
                                    <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}"  name="search" placeholder="Search"
                                        autocomplete="off" tabindex="10">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="11">Search</button>
                                    <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="12">
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="10%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Bank Code</th>
                                            <th width="10%" class="p-1">Bank Name</th>
                                            <th width="10%" class="p-1">Branch Name</th>
                                            <th width="10%" class="p-1">Branch Address</th>
                                            <th width="10%" class="p-1">Name As In Account</th>
                                            <th width="10%" class="p-1">Account Type</th>
                                            <th width="10%" class="p-1">Account No</th>
                                            <th width="10%" class="p-1">Is Active</th>
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
                                        @foreach($Bank as $bankdetails)
                                        <?php $i++; 
                                        if(isset($bankdetails->Active) && $bankdetails->Active==1){
                                            $active = "YES";
                                        }
                                        else{
                                            $active = "NO";
                                        }
                                        if($bankdetails->AccountType==1){
                                            $accountType= "CURRENT";
                                        }
                                        else{
                                            $accountType= "SAVING";
                                        }
                                        ?>
                                        <tr>
                                            <td class="p-1"><a href="javascript:void(0)"
                                                    onclick="ViewBank('{{$bankdetails->id}}')">View </a>/<a
                                                    href="javascript:void(0)"
                                                    onclick="EditBank('{{$bankdetails->id}}')"> Edit </a></td>
                                            <td class="p-1">{{$i}}</td>
                                            <td class="p-1">{{$bankdetails->BankCode}}</td>
                                            <td class="p-1">{{$bankdetails->BankName}}</td>
                                            <td class="p-1">@isset($bankdetails->BranchName) {{$bankdetails->BranchName}} @endisset</td>
                                            <td class="p-1">@isset($bankdetails->BranchAdd) {{$bankdetails->BranchAdd}} @endisset</td>
                                            <td class="p-1">@isset($bankdetails->NameAsAccount) {{$bankdetails->NameAsAccount}} @endisset</td>
                                            <td class="p-1">@isset($bankdetails->AccountType) {{$accountType}} @endisset</td>
                                            <td class="p-1">@isset($bankdetails->AccountNo) {{$bankdetails->AccountNo}} @endisset</td>
                                            <td class="p-1">{{$active}}</td>
                                            
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                          {{ $Bank->appends(Request::except('page'))->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});
$(".Selectbox").select2();
function AddBank() {

    if ($('#BankCode').val() == '') {
        alert('please Enter Bank Code');
        return false;
    }
    if ($('#BankName').val() == '') {
        alert('please Enter Bank Name');
        return false;
    }
    if ($('#BranchName').val() == '') {
        alert('please Enter Branch Name');
        return false;
    }
    if ($('#BranchAdd').val() == '') {
        alert('please Enter Branch Address');
        return false;
    }
    if ($('#NameAsAccount').val() == '') {
        alert('please Enter Name As In Account');
        return false;
    }
    if ($('#AccountType').val() == '') {
        alert('please Select Account Type');
        return false;
    }
    if ($('#AccountNo').val() == '') {
        alert('please Enter Account No');
        return false;
    }
    var BankCode = $('#BankCode').val();
    var BankName = $('#BankName').val();
    var BranchName = $("#BranchName").val();
    var BranchAdd = $("#BranchAdd").val();
    var NameAsAccount = $("#NameAsAccount").val();
    var AccountType = $("#AccountType").val();
    var AccountNo = $("#AccountNo").val();
    var Active= $("#Active").val();
    var Bid = $('#Bid').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddEditBank',
        cache: false,
        data: {
            'BankCode': BankCode,
            'BankName': BankName,
            'Bid': Bid,
            'BranchName' : BranchName,
            'BranchAdd' : BranchAdd,
            'NameAsAccount' : NameAsAccount,
            'AccountType' : AccountType,
            'AccountNo' : AccountNo,
            'Active' :Active
        },
        success: function(data) {
           if(data=='false'){
                alert('Bank Code already Exist');
                  $(".btnSubmit").attr("disabled", false);
            }
            else{
                alert(data);
                location.reload();
            }
        }
    });
}

function ViewBank(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewBank',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.BankCode').val(obj.BankCode);
            $('.BankCode').attr('readonly', true);
            $('.BankName').val(obj.BankName);
            $('.BankName').attr('readonly', true);

            $('.BranchName').val(obj.BranchName);
            $('.BranchName').attr('readonly', true);
            $('.BranchAdd').val(obj.BranchAdd);
            $('.BranchAdd').attr('readonly', true);
            $('.NameAsAccount').val(obj.NameAsAccount);
            $('.NameAsAccount').attr('readonly', true);
            $('.AccountType').val(obj.AccountType).trigger('onchange');
            $('.AccountType').attr('disabled', true);

            $('.AccountNo').val(obj.AccountNo);
            $('.AccountNo').attr('readonly', true);
            if(obj.Active==1){
                $(".Active").prop("checked",true);
            }
            else{
                $(".Active").prop("checked",false);
            }
           $("#btnSubmit").prop("disabled",true);

        }
    });
}

function EditBank(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewBank',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.BankCode').val(obj.BankCode);
            $('.Bid').val(obj.id);
            $('.BankCode').attr('readonly', false);
            $('.BankName').val(obj.BankName);
            $('.BankName').attr('readonly', false);

            $('.BranchName').val(obj.BranchName);
            $('.BranchName').attr('readonly', false);
            $('.BranchAdd').val(obj.BranchAdd);
            $('.BranchAdd').attr('readonly', false);
            $('.NameAsAccount').val(obj.NameAsAccount);
            $('.NameAsAccount').attr('readonly', false);
            $('.AccountType').val(obj.AccountType).trigger('onchange');
            $('.AccountType').attr('disabled', false);

            $('.AccountNo').val(obj.AccountNo);
            $('.AccountNo').attr('readonly', false);
            if(obj.Active==1){
                $(".Active").prop("checked",true);
            }
            else{
                $(".Active").prop("checked",false);
            }
            $("#btnSubmit").prop("disabled",false);
        }
    });
}
</script>