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
                                    <input tabindex="1" type="checkbox" id="defaultRole" name="defaultRole" value="defaultRole"
                                        class="defaultRole">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Active</label><br>
                                    <input tabindex="1" type="checkbox" id="Active" name="Active" value="Active"
                                        class="Active">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">By Pass I.P Security</label><br>
                                    <input tabindex="1" type="checkbox" id="bypassSecurity" name="bypassSecurity" value="bypassSecurity" class="bypassSecurity">
                                    <span class="error"></span>
                                </div>
                               
                                <div class="mb-2 col-md-12 text-center">
                                    <input tabindex="1" type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="Addrole()">
                                    <a href="{{url('RoleMasterList')}}" class="btn btn-primary">Cancel</a>
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
                        <div class="row mt-1 pl-pr">
                            <div class="mb-2 col-md-3">
                                <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}" name="search" placeholder="Search"
                                    autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                          </div> 
                            </form>
                            <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-1 mt-1">
                                <thead>
                                    <tr class="main-title text-dark">
                                        <th class="p-1" style="min-width: 100px;">ACTION</th>
                                        <th class="p-1" style="min-width: 50px;">SL#</th>
                                        <th class="p-1" style="min-width: 200px;">Role Name</th>
                                        <th  class="p-1" style="min-width: 200px;">Description</th>
                                        <th class="p-1" style="min-width: 200px;">Default Role</th>
                                        <th  class="p-1" style="min-width: 200px;">By Pass IP</th>
                                        <th class="p-1" style="min-width: 50px;">Active</th>
                                       
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
                                    @foreach($role as $roleBase)
                                    <?php $i++ ?>
                                    <tr>
                                    <td class="p-1"><a href="javascript:void(0)" onclick="viewRole('{{$roleBase->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditRole('{{$roleBase->id}}')">Edit</a></td>
                                    <td class="p-1" >{{$i}}</td>
                                    <td class="p-1">{{$roleBase->RoleName}}</td>
                                    <td class="p-1">{{$roleBase->Description}}</td>
                                    <td class="p-1">{{$roleBase->defaultRole}}</td>
                                    <td class="p-1">{{$roleBase->Active}}</td>
                                    <td class="p-1">{{$roleBase->bypassSecurity}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
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