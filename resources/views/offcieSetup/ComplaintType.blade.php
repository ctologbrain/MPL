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
                            <div class="row pl-pr mt-1">
                               
                                <div class="col-md-5">
                                    <div class="row">
                                    <label for="example-select" class="form-label col-md-3">Complaint Type<span
                                            class="error">*</span></label>
                                            <div class="col-md-8">
                                    <input type="text" tabindex="1" class="form-control ComplaintType"
                                        name="ComplaintType" id="ComplaintType">

                                    <input type="hidden" tabindex="1" class="form-control Cid" name="Cid" id="Cid">
                                    <span class="error"></span>
                                </div>
                            </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="example-select" class="form-label d-flex align-items-center">Case Open <input type="checkbox" id="CaseOpen" name="CaseOpen" value="CaseOpen"
                                        class="CaseOpen ml-1" tabindex="2"></label>
                                    
                                    <span class="error"></span>
                                </div>
                                <div class="col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddComplent()" tabindex="3">
                                    <a href="{{url('Complaint')}}" class="btn btn-primary" tabindex="4">Cancel</a>
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
                            <div class="row pl-pr mt-1">
                                <div class="mb-2 col-md-3">
                                    <input value="{{Request()->get('search')}}" type="text" class="form-control BillDate" name="search" placeholder="Search"
                                        autocomplete="off" tabindex="5">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="6">Search</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="2%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Complaint Type</th>
                                            <th width="10%" class="p-1">Case Open</th>
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
                                        @foreach($ComplaintType as $type)
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="p-1"><a href="javascript:void(0)" onclick="EditComp('{{$type->id}}')">Edit
                                                </a></td>
                                            <td class="p-1">{{$i}}</td>
                                            <td class="p-1">{{$type->ComplaintType}}</td>
                                            <td class="p-1">{{$type->CaseOpen}}</td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         {{ $ComplaintType->appends(Request::except('page'))->links() }}

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
            alert(data);
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