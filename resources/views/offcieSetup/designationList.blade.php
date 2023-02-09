@include('layouts.app')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
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
                                    <label for="example-select" class="form-label">Parent Designation</label>
                                    <select name="ParentDesignation" class="form-control ParentDesignation"
                                        id="ParentDesignation">
                                        <option value="">Select Parent Designation</option>
                                        @foreach($designation as $check)
                                        <option value="{{$check->id}}">{{$check->DesignationName}}</option>
                                        @endforeach
                                    </select>

                                    <input type="hidden" tabindex="1" class="form-control DesignationId"
                                        name="DesignationId" id="DesignationId">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Designation Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control DesignationName"
                                        name="DesignationName" id="DesignationName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Short Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control ShortName" name="ShortName"
                                        id="ShortName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddDesignation()">
                                    <a href="{{url('AddDesign')}}" class="btn btn-primary mt-3">Cancel</a>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <h4 class="header-title nav nav-tabs nav-bordered mt-1"></h4>
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
                                        autocomplete="off">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="button" name="submit" value="Search"
                                        class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                            <th width="2%">ACTION</th>
                                            <th width="2%">SL#</th>
                                            <th width="10%">Parent Designation</th>
                                            <th width="10%">Designation Name</th>
                                            <th width="10%">Short Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($designation as $check)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><a href="javascript:void(0)"
                                                    onclick="ViewDesignation('{{$check->id}}')">View</a> | <a
                                                    href="javascript:void(0)"
                                                    onclick="EditDesignation('{{$check->id}}')">Edit</a></td>
                                            <td>{{$i}}</td>
                                            <td>@if(isset($check->designationParent->DesignationName)){{$check->designationParent->DesignationName}}@endif
                                            </td>
                                            <td>{{$check->DesignationName}}</td>
                                            <td>{{$check->ShortName}}</td>
                                        <tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $designation->appends(Request::except('page'))->links() }}

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

function AddDesignation() {

    if ($('#DesignationName').val() == '') {
        alert('please Enter Designation Name');
        return false;
    }
    if ($('#ShortName').val() == '') {
        alert('please Enter Short Name');
        return false;
    }
    var DesignationId = $('#DesignationId').val();
    var ParentDesignation = $('#ParentDesignation').val();
    var DesignationName = $('#DesignationName').val();
    var ShortName = $('#ShortName').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddDesignation',
        cache: false,
        data: {
            'DesignationId': DesignationId,
            'DesignationName': DesignationName,
            'ParentDesignation': ParentDesignation,
            'ShortName': ShortName
        },
        success: function(data) {
            location.reload();
        }
    });
}

function ViewDesignation(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDesignation',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.DesignationName').val(obj.DesignationName);
            $('.DesignationName').attr('readonly', true);
            $('.ShortName').val(obj.ShortName);
            $('.ShortName').attr('readonly', true);
            $('.ParentDesignation').val(obj.Parent_Id).trigger('change');
            $('.ParentDesignation').attr('disabled', true);

        }
    });
}

function EditDesignation(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDesignation',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.DesignationId').val(obj.id);
            $('.DesignationName').val(obj.DesignationName);
            $('.DesignationName').attr('readonly', false);
            $('.ShortName').val(obj.ShortName);
            $('.ShortName').attr('readonly', false);
            $('.ParentDesignation').val(obj.Parent_Id).trigger('change');
            $('.ParentDesignation').attr('disabled', false);
           
      }
    });



}
</script>