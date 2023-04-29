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
                                    <label for="example-select" class="form-label">Project Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control ProjectName" name="ProjectName"
                                        id="ProjectName">
                                    <input type="hidden" tabindex="1" class="form-control Pid" name="Pid" id="Pid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Project URL</label>
                                    <input type="text" tabindex="1" class="form-control ProjectUrl"
                                        name="ProjectUrl" id="ProjectUrl">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Project Icon</label>
                                    <input type="text" tabindex="1" class="form-control ProjectIcon"
                                        name="ProjectIcon" id="ProjectIcon">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Is Active</label><br>
                                    <input type="checkbox" id="IsActive" name="IsActive" value="IsActive" class="IsActive" tabindex="1">
                                    <span class="error"></span>
                                </div>
                                
                                 <div class="mb-2 col-md-4">
                               </div>
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddProject()">
                                    <a href="{{url('AddProject')}}" class="btn btn-primary mt-3">Cancel</a>
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
                            
                            </form>
                            <table class="table table-bordered table-centered mb-1 mt-1">
                                <thead>
                                    <tr>
                                        <th width="3%">ACTION</th>
                                        <th width="2%">SL#</th>
                                        <th width="8%">Project Name</th>
                                        <th width="10%">Project URL</th>
                                        <th width="10%">Project Icon</th>
                                        <th width="10%">Active</th>
                                       
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
                                    @foreach($ProjectMaster as $project)
                                    <?php $i++ ?>
                                    <tr>
                                        <td><a href="javascript:void(0)" onclick="editproject('{{$project->id}}')">Edit</a></td>
                                        <td>{{$i}}</td>
                                        <td>{{$project->ProjectName}}</td>
                                        <td>{{$project->ProjectUrl}}</td>
                                        <td>{{$project->ProjectIcon}}</td>
                                        <td>{{$project->isActive}}</td>
                                   </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="d-flex d-flex justify-content-between">
                          {{ $ProjectMaster->appends(Request::except('page'))->links() }}
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


function AddProject() {

    if ($('#ProjectName').val() == '') {
        alert('please Enter Project Name');
        return false;
    }
    if ($('#ProjectUrl').val() == '') {
        alert('please Enter Project Url');
        return false;
    }
    if ($('#ProjectIcon').val() == '') {
        alert('please Enter Project Icon');
        return false;
    }
    var ProjectName = $('#ProjectName').val();
    var Pid = $('#Pid').val();
    var ProjectUrl = $('#ProjectUrl').val();
    var ProjectIcon = $('#ProjectIcon').val();
    var IsActive = $("input[name=IsActive]:checked").val();
   
    //$(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/PostProject',
        cache: false,
        data: {
            'ProjectName':ProjectName,
            'Pid': Pid,
            'ProjectUrl':ProjectUrl,
            'ProjectIcon':ProjectIcon,
            'IsActive':IsActive,
          
       },
        success: function(data) {
            location.reload();
        }
    });
}



function editproject(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewProject',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('#Pid').val(obj.id)
            $('.ProjectName').val(obj.ProjectName);
            $('.ProjectName').attr('readonly', false);
            $('.ProjectUrl').val(obj.ProjectUrl);
            $('.ProjectUrl').attr('readonly', false);
            $('.ProjectIcon').val(obj.ProjectIcon);
            $('.ProjectIcon').attr('readonly', false);
            if (obj.isActive == 'Yes') {
                $('.IsActive').prop('checked', true);
            } else {
                $('.IsActive').prop('checked', false);
            }
            $('.IsActive').attr('disabled', false);
           

        }
    });

}
</script>