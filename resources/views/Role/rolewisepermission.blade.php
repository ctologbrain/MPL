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
                            <div class="row">
                                
                                <div class="mb-2 col-md-4">
                                <div class="row">
                                    <label for="example-select" class="form-label col-md-4">Role Name<span
                                            class="error">*</span></label>
                                        <div class="col-md-8">
                                       <select class="form-control RoleName" name="RoleName"
                                        id="RoleName">
                                            <option value="">--select--</option>
                                            @foreach($RoleMaster as $role)
                                            <option value="{{$role->id}}">{{$role->RoleName}}</option>
                                            @endforeach
                                        </select>
                                    <input type="hidden" tabindex="1" class="form-control Rid" name="Rid" id="Rid">
                                    <span class="error"></span>
                                    </div>
                                    </div>
                                </div>
                                <div class="mb-2 col-md-4 text-start">
                                <input type="button" value="Process" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="viewporject()">
                                    <a href="{{url('PermissionMaster')}}" class="btn btn-primary">Cancel</a>
                                </div>
                                <h4 class="header-title nav nav-tabs nav-bordered mb-1"></h4>
                                <div class="viewInner"></div>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<script type="text/javascript">
$('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});

function viewporject() {

    if ($('#RoleName').val() == '') {
        alert('please select Role');
        return false;
    }
    
    var RoleName = $('#RoleName').val();
   // $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewRolePermission',
        cache: false,
        data: {
            'RoleName':RoleName,
          },
        success: function(data) {
         $('.viewInner').html(data);
        }
    });
}

function viewRole(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewRoles',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.RoleName').val(obj.RoleName);
            $('.RoleName').attr('readonly', true);
            $('.Description').val(obj.Description);
            $('.Description').attr('readonly', true);
            if (obj.defaultRole == 'Yes') {
                $('.defaultRole').prop('checked', true);
            } else {
                $('.defaultRole').prop('checked', false);
            }
            $('.defaultRole').attr('disabled', true);
            if (obj.Active == 'Yes') {
                $('.Active').prop('checked', true);
            } else {
                $('.Active').prop('checked', false);
            }
            $('.Active').attr('disabled', true);
            if (obj.bypassSecurity == 'Yes') {
                $('.bypassSecurity').prop('checked', true);
            } else {
                $('.bypassSecurity').prop('checked', false);
            }
            $('.bypassSecurity').attr('disabled', true);

        }
    });
}

function EditRole(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewRoles',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('#Rid').val(obj.id)
            $('.RoleName').val(obj.RoleName);
            $('.RoleName').attr('readonly', false);
            $('.Description').val(obj.Description);
            $('.Description').attr('readonly', false);
            if (obj.defaultRole == 'Yes') {
                $('.defaultRole').prop('checked', true);
            } else {
                $('.defaultRole').prop('checked', false);
            }
            $('.defaultRole').attr('disabled', false);
            if (obj.Active == 'Yes') {
                $('.Active').prop('checked', true);
            } else {
                $('.Active').prop('checked', false);
            }
            $('.Active').attr('disabled', false);
            if (obj.bypassSecurity == 'Yes') {
                $('.bypassSecurity').prop('checked', true);
            } else {
                $('.bypassSecurity').prop('checked', false);
            }
            $('.bypassSecurity').attr('disabled', false);

        }
    });

}
</script>