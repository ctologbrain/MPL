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
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Role Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control RoleName" name="RoleName"
                                        id="RoleName">
                                    <input type="hidden" tabindex="1" class="form-control Rid" name="Rid" id="Rid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Description</label>
                                    <input type="text" tabindex="1" class="form-control Description"
                                        name="Description" id="Description">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Default Role</label><br>
                                    <input type="checkbox" id="defaultRole" name="defaultRole" value="defaultRole"
                                        class="defaultRole">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Active</label><br>
                                    <input type="checkbox" id="Active" name="Active" value="Active"
                                        class="Active">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">By Pass I.P Security</label><br>
                                    <input type="checkbox" id="bypassSecurity" name="bypassSecurity" value="bypassSecurity" class="bypassSecurity">
                                    <span class="error"></span>
                                </div>
                                 <div class="mb-2 col-md-4">
                               </div>
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="Addrole()">
                                    <a href="{{url('NDRMaster')}}" class="btn btn-primary mt-3">Cancel</a>
                                </div>
                                
                            
                              
                                <h4 class="header-title nav nav-tabs nav-bordered mb-1"></h4>
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
                                <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}" name="search" placeholder="Search"
                                    autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Submit</button>
                          </div> 
                            </form>
                            <table class="table table-bordered table-centered mb-1 mt-1">
                                <thead>
                                    <tr>
                                        <th width="3%">ACTION</th>
                                        <th width="2%">SL#</th>
                                        <th width="8%">Role Name</th>
                                        <th width="10%">Description</th>
                                        <th width="10%">Default Role</th>
                                        <th width="10%">By Pass IP</th>
                                        <th width="10%">Active</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($role as $roleBase)
                                    <?php $i++ ?>
                                    <tr>
                                    <td><a href="javascript:void(0)" onclick="viewRole('{{$roleBase->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditRole('{{$roleBase->id}}')">Edit</a></td>
                                    <td>{{$i}}</td>
                                    <td>{{$roleBase->RoleName}}</td>
                                    <td>{{$roleBase->Description}}</td>
                                    <td>{{$roleBase->defaultRole}}</td>
                                    <td>{{$roleBase->Active}}</td>
                                    <td>{{$roleBase->bypassSecurity}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="d-flex d-flex justify-content-between">
                          {{ $role->appends(Request::except('page'))->links() }}
                        </div>
                        </div>
                    </div>


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

function Addrole() {

    if ($('#RoleName').val() == '') {
        alert('please Enter Role Name');
        return false;
    }
    
    var RoleName = $('#RoleName').val();
    var Rid = $('#Rid').val();
    var Description = $('#Description').val();
    var defaultRole = $("input[name=defaultRole]:checked").val();
    var Active = $("input[name=Active]:checked").val();
    var bypassSecurity = $("input[name=bypassSecurity]:checked").val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddRole',
        cache: false,
        data: {
            'RoleName':RoleName,
            'Rid': Rid,
            'Description':Description,
            'defaultRole':defaultRole,
            'Active':Active,
            'bypassSecurity':bypassSecurity,
       },
        success: function(data) {
            location.reload();
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