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
                               
                                <div class="col-md-6">
                                    <div class="row">
                                    <label for="example-select" class="form-label col-md-3">Department Name<span
                                            class="error">*</span></label>
                                            <div class="col-md-6">
                                    <input type="text" tabindex="1" class="form-control DepartmentName"
                                        name="DepartmentName" id="DepartmentName">

                                    <input type="hidden" class="form-control deptId" name="deptId"
                                        id="deptId">
                                    <span class="error"></span>
                                </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="row">

                                    <label for="example-select" class="form-label col-md-4">Short Name<span
                                            class="error">*</span></label>
                                            <div class="col-md-6">
                                    <input type="text" tabindex="2" class="form-control ShortName" name="ShortName"
                                        id="ShortName">
                                    <span class="error"></span>
                                </div>
                                </div>
                                </div>
                                
                                <div class="mt-1 col-md-6">
                                     <div class="row">
                                    <label for="example-select" class="form-label col-md-3">Department Head</label>
                                     <div class="col-md-6">
                                    <input type="text" tabindex="3" class="form-control DepartmentHead"
                                        name="DepartmentHead" id="DepartmentHead">
                                    <span class="error"></span>
                                </div>
                                </div>
                                </div>
                                <div class="mt-1 col-md-6">
                                     <div class="row">
                                    <label for="example-select" class="form-label col-md-4">Department Head Email</label>
                                     <div class="col-md-6">
                                    <input type="text" tabindex="4" class="form-control DepartmentHeadEmail"
                                        name="DepartmentHeadEmail" id="DepartmentHeadEmail">
                                    <span class="error"></span>
                                </div>
                                </div>
                                </div>
                                <div class="mt-1 col-6">
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="Active">Active</label>
                                    <div class="col-md-8">
                                    <input type="checkbox" tabindex="15" class="Active mt-1" name="Active" id="Active" >
                                    </div>
                                </div>
                                </div>   
                                <div class="mb-2 col-md-12 text-end mt-1">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddDept()" tabindex="5">
                                    <a href="{{url('ViewDept')}}" class="btn btn-primary" tabindex="6">Cancel</a>
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
                                    <input value="{{request()->get('search') }}" type="text" class="form-control BillDate" name="search" placeholder="Search"
                                        autocomplete="off" tabindex="7">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="8">Search</button>
                                        <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="9">
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="2%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Department Name</th>
                                            <th width="10%" class="p-1">Short Name</th>
                                            <th width="10%" class="p-1">Department Head</th>
                                            <th width="10%" class="p-1">Department Head Email</th>
                                            <th width="10%" class="p-1">Active</th>
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
                                        @foreach($Department as $check)
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="p-1"><a href="javascript:void(0)"
                                                    onclick="ViewDept('{{$check->id}}')">View</a> | <a
                                                    href="javascript:void(0)"
                                                    onclick="EditDept('{{$check->id}}')">Edit</a></td>
                                            <td class="p-1">{{$i}}</td>
                                            <td class="p-1">{{$check->DepartmentName}}</td>
                                            <td class="p-1">{{$check->ShortName}}</td>
                                            <td class="p-1">{{$check->DepartmentHead}}</td>
                                            <td class="p-1">{{$check->DepartmentHeadEmail}}</td>
                                            <td class="p-1">@isset($check->Is_Active){{$check->Is_Active}} @endisset</td>
                                        <tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $Department->appends(Request::except('page'))->links() }}

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

function AddDept() {

    if ($('#DepartmentName').val() == '') {
        alert('please Enter Department Name');
        return false;
    }
    if ($('#ShortName').val() == '') {
        alert('please Enter Short Name');
        return false;
    }

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if( $('#DepartmentHeadEmail').val().match(mailformat) ==null)
    {
      alert('please Enter Valid Department Head Email Id');
      return false;
    }
    var DepartmentName = $('#DepartmentName').val();
    var ShortName = $('#ShortName').val();
    var DepartmentHead = $('#DepartmentHead').val();
    var DepartmentHeadEmail = $('#DepartmentHeadEmail').val();
    var deptId = $('#deptId').val();
    if($("#Active").prop("checked")==true){
    var Active ="Yes";
   }
   else{
    var Active ="No";
   }
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddDept',
        cache: false,
        data: {
            'DepartmentName': DepartmentName,
            'ShortName': ShortName,
            'DepartmentHead': DepartmentHead,
            'DepartmentHeadEmail': DepartmentHeadEmail,
            'deptId': deptId,
            'Active':Active
        },
        success: function(data) {
            alert(data);
             location.reload();
        }
    });
}

function ViewDept(id) {
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
            $('.DepartmentName').attr('readonly', true);
            $('.ShortName').val(obj.ShortName);
            $('.ShortName').attr('readonly', true);
            $('.DepartmentHead').val(obj.DepartmentHead);
            $('.DepartmentHead').attr('readonly', true);
            $('.DepartmentHeadEmail').val(obj.DepartmentHeadEmail);
            $('.DepartmentHeadEmail').attr('readonly', true);
               $(".btnSubmit").attr("disabled", true);
               $("#Active").attr("disabled",true);
            if(obj.Is_Active=='Yes'){
           
           $("#Active").prop("checked",true);
           }
           else{
             $("#Active").prop("checked",false);
           }
           $(window).scrollTop(0);
         


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
           $('.deptId').val(obj.id);
           $('.DepartmentName').val(obj.DepartmentName);
            $('.DepartmentName').attr('readonly', false);
            $('.ShortName').val(obj.ShortName);
            $('.ShortName').attr('readonly', false);
            $('.DepartmentHead').val(obj.DepartmentHead);
            $('.DepartmentHead').attr('readonly', false);
            $('.DepartmentHeadEmail').val(obj.DepartmentHeadEmail);
            $('.DepartmentHeadEmail').attr('readonly', false);
               $(".btnSubmit").attr("disabled", false);
               $("#Active").attr("disabled",false);
        if(obj.Is_Active=='Yes'){
           
           $("#Active").prop("checked",true);
           }
           else{
             $("#Active").prop("checked",false);
           }
           $(window).scrollTop(0);
         


        }
    });



}
</script>