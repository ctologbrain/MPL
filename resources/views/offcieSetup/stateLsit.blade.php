@include('layouts.app')
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
            </div>
        </div>
    </div>
    <div class="row">
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
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Country Name<span
                                            class="error">*</span></label>
                                    <select class="form-control CountryName" name="CountryName" id="CountryName" tabindex="1">
                                        <option value=""></option>
                                        @foreach($country as $ctr)
                                        <option value="{{$ctr->id}}">{{$ctr->CountryName}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" tabindex="1" class="form-control sid" name="sid" id="sid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">State Type</label>
                                    <select class="form-control StateType" name="StateType" id="StateType" tabindex="2">
                                        <option value=""></option>
                                        <option value="STATE">STATE</option>
                                        <option value="UT">UT</option>
                                    </select>

                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">State Code<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="3" class="form-control StateCode" name="StateCode"
                                        id="StateCode">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">State Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="4" class="form-control StateName" name="StateName"
                                        id="StateName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">GST Number</label>
                                    <input type="text" tabindex="5" class="form-control GSTNumber" name="GSTNumber"
                                        id="GSTNumber">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">eWaybill GST Number</label>
                                    <input type="text" tabindex="6" class="form-control eWaybillGSTNumber"
                                        name="eWaybillGSTNumber" id="eWaybillGSTNumber">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">eWaybill Limit</label>
                                    <input type="text" tabindex="7" class="form-control eWaybillLimit"
                                        name="eWaybillLimit" id="eWaybillLimit">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                </div>
                                <div class="mb-2 col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddState()" tabindex="8">
                                    <a href="{{url('StateList')}}" class="btn btn-primary mt-3" tabindex="9">Cancel</a>
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
                            <div class="row">
                                <div class="mb-2 col-md-3">
                                    <input type="text" class="form-control BillDate" name="search" placeholder="Search"
                                        autocomplete="off" tabindex="10">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="button" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="11">Submit</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                            <th width="5%">ACTION</th>
                                            <th width="2%">SL#</th>
                                            <th width="10%">Country Name</th>
                                            <th width="5%">State Type</th>
                                            <th width="5%">State Code</th>
                                            <th width="12%">State Name</th>
                                            <th width="8%">GST Number</th>
                                            <th width="8%">eWaybill GST</th>
                                            <th width="8%">eWaybill Limit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($State as $st)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><a href="javascript:void(0)" onclick="ViewState('{{$st->id}}')">View
                                                </a>/ <a href="javascript:void(0)"
                                                    onclick="EditState('{{$st->id}}')">Edit</a></td>
                                            <td>{{$i}}</td>
                                            <td>{{$st->CountryDetails->CountryName}}</td>
                                            <td>{{$st->StateType}}</td>
                                            <td>{{$st->StateCode}}</td>
                                            <td>{{$st->name}}</td>
                                            <td>{{$st->GSTNumber}}</td>
                                            <td>{{$st->eWaybillGST}}</td>
                                            <td>{{$st->eWaybillLimit}}</td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="d-flex d-flex justify-content-between">
        {!! $State->appends(Request::all())->links() !!}
        </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
$('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});

function AddState() {
    if ($('#CountryName').val() == '') {
        alert('please Enter Country Name');
        return false;
    }
    if ($('#StateCode').val() == '') {
        alert('please Enter StateCode');
        return false;
    }
    if ($('#StateName').val() == '') {
        alert('please Enter State Name');
        return false;
    }
    var CountryName = $('#CountryName').val();
    var StateType = $('#StateType').val();
    var StateCode = $('#StateCode').val();
    var StateName = $('#StateName').val();
    var eWaybillGSTNumber = $('#eWaybillGSTNumber').val();
    var eWaybillLimit = $('#eWaybillLimit').val();
    var GSTNumber = $('#GSTNumber').val();
    var sid = $('#sid').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddState',
        cache: false,
        data: {
            'CountryName': CountryName,
            'StateType': StateType,
            'StateCode': StateCode,
            'StateName': StateName,
            'eWaybillGSTNumber': eWaybillGSTNumber,
            'eWaybillLimit': eWaybillLimit,
            'GSTNumber': GSTNumber,
            'sid': sid
        },
        success: function(data) {
            location.reload();
        }
    });
}

function ViewState(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewState',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.StateCode').val(obj.StateCode);
            $('.StateCode').attr('readonly', true);
            $('.StateName').val(obj.name);
            $('.StateName').attr('readonly', true);
            $('.GSTNumber').val(obj.GSTNumber);
            $('.GSTNumber').attr('readonly', true);
            $('.eWaybillGSTNumber').val(obj.eWaybillGST);
            $('.eWaybillGSTNumber').attr('readonly', true);
            $('.eWaybillLimit').val(obj.eWaybillLimit);
            $('.eWaybillLimit').attr('readonly', true);
            $('.CountryName').val(obj.country_id).trigger('change');
            $('.CountryName').attr('disabled', true);
            $('.StateType ').val(obj.StateType).trigger('change');
            $('.StateType').attr('disabled', true);

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
        url: base_url + '/ViewState',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.sid').val(obj.id);
            $('.StateCode').val(obj.StateCode);
            $('.StateCode').attr('readonly', false);
            $('.StateName').val(obj.name);
            $('.StateName').attr('readonly', false);
            $('.GSTNumber').val(obj.GSTNumber);
            $('.GSTNumber').attr('readonly', false);
            $('.eWaybillGSTNumber').val(obj.eWaybillGST);
            $('.eWaybillGSTNumber').attr('readonly', false);
            $('.eWaybillLimit').val(obj.eWaybillLimit);
            $('.eWaybillLimit').attr('readonly', false);
            $('.CountryName').val(obj.country_id).trigger('change');
            $('.CountryName').attr('disabled', false);
            $('.StateType ').val(obj.StateType).trigger('change');
            $('.StateType').attr('disabled', false);


        }
    });
}
</script>