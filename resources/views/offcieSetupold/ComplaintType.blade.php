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
                                    <label for="example-select" class="form-label">Complaint Type<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control ComplaintType"
                                        name="ComplaintType" id="ComplaintType">

                                    <input type="hidden" tabindex="1" class="form-control Cid" name="Cid" id="Cid">
                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Case Open</label><br>
                                    <input type="checkbox" id="CaseOpen" name="CaseOpen" value="CaseOpen"
                                        class="CaseOpen">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddComplent()">
                                    <a href="{{url('Complaint')}}" class="btn btn-primary mt-3">Cancel</a>
                                </div>

                                <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
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
                                    <input value="{{Request()->get('search')}}" type="text" class="form-control BillDate" name="search" placeholder="Search"
                                        autocomplete="off">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button  type="submit" name="submit" value="submit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                            <th width="2%">ACTION</th>
                                            <th width="2%">SL#</th>
                                            <th width="10%">Complaint Type</th>
                                            <th width="10%">Case Open</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($ComplaintType as $type)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><a href="javascript:void(0)" onclick="EditComp('{{$type->id}}')">Edit
                                                </a></td>
                                            <td>{{$i}}</td>
                                            <td>{{$type->ComplaintType}}</td>
                                            <td>{{$type->CaseOpen}}</td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
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

function AddComplent() {

    if ($('#ComplaintType').val() == '') {
        alert('please Enter Complaint Type');
        return false;
    }
    var CaseOpen = $("input[name=CaseOpen]:checked").val();
    var ComplaintType = $('#ComplaintType').val();
    var Cid = $('#Cid').val();

    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddComplaintType',
        cache: false,
        data: {
            'CaseOpen': CaseOpen,
            'ComplaintType': ComplaintType,
            'Cid': Cid
        },
        success: function(data) {
            location.reload();
        }
    });
}

function EditComp(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewComple',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.ComplaintType').val(obj.ComplaintType);
            $('.Cid').val(obj.id);
            if (obj.CaseOpen == 'Yes') {
                $('.CaseOpen').prop('checked', true);
            } else {
                $('.CaseOpen').prop('checked', false);
            }



        }
    });
}

function EditDept(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDepartment',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.DepartmentName').val(obj.DepartmentName);
            $('.ShortName').val(obj.ShortName);
            $('.DepartmentHead').val(obj.DepartmentHead);
            $('.DepartmentHeadEmail').val(obj.DepartmentHeadEmail);
            $('.deptId').val(obj.id);

        }
    });



}
</script>