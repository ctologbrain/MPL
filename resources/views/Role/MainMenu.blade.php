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
                                    
                                        <select tabindex="1"  class="form-control projectName" name="projectName" id="projectName">
                                       <option value="">--select--</option>
                                       @foreach($Project as $ProjectName)
                                       <option value="{{$ProjectName->id}}">{{$ProjectName->ProjectName}}</option>
                                       @endforeach
                                      </select>
                                    <input type="hidden" tabindex="1" class="form-control mid" name="mid" id="mid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Parent Menu<span
                                            class="error">*</span></label>
                                    
                                        <select tabindex="1"  class="form-control ParentMenu" name="ParentMenu" id="ParentMenu">
                                       <option value="">--select--</option>
                                       @foreach($ParentManu as $pMenu)
                                       <option value="{{$pMenu->id}}">{{$pMenu->ParentMenu}}</option>
                                       @endforeach
                                      </select>
                                   
                                    <span class="error"></span>
                                </div>
                               
                                
                               
                               
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Menu Name</label>
                                    <input type="text" tabindex="1" class="form-control MenuName"
                                        name="MenuName" id="MenuName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Menu Url</label>
                                    <input type="text" tabindex="1" class="form-control MenuIcon"
                                        name="MenuIcon" id="MenuIcon">
                                    <span class="error"></span>
                                </div>
                                
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddParentMenu()">
                                    <a href="{{url('AddMainMenu')}}" class="btn btn-primary mt-3">Cancel</a>
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
                                        <th width="8%">Parent Menu</th>
                                        <th width="8%">Main Menu</th>
                                        <th width="10%">Menu Url</th>
                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($MainManu as $mMenu)
                                    <?php $i++; ?>
                                    <tr>
                                      <td><a href="javascript:void(0)" onclick="EditMainMenu('{{$mMenu->id}}')">Edit</a></td> 
                                      <td>{{$i}}</td>  
                                      <td>{{$mMenu->ProjectDetails->ProjectName}}</td>  
                                      <td>{{$mMenu->ParentMenuDetails->ParentMenu}}</td>  
                                      <td>{{$mMenu->MenuName}}</td>  
                                      <td>{{$mMenu->MenuIcon}}</td>  
                                    </tr>
                                    @endforeach
                                    
                                 
                                    
                                </tbody>
                            
                            </table>
                            <div class="d-flex d-flex justify-content-between">
                          {{ $MainManu->appends(Request::except('page'))->links() }}
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

function AddParentMenu() {
    if($('#projectName').val() == '') {
        alert('please Selelct project Name');
        return false;
    }
    if($('#ParentMenu').val() == '') {
        alert('please Enter Parent Menu');
        return false;
    }
    if($('#MenuName').val() == '') {
        alert('please Enter Menu Name');
        return false;
    }
    if($('#MenuIcon').val() == '') {
        alert('please Enter Menu Url');
        return false;
    }
    
    var ParentMenu = $('#ParentMenu').val();
    var projectName = $('#projectName').val();
    var mid = $('#mid').val();
    var MenuName = $('#MenuName').val();
    var MenuIcon = $('#MenuIcon').val();
   
   // $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/PostMainMenu',
        cache: false,
        data: {
            'ParentMenu':ParentMenu,
            'pid': mid,
            'MenuIcon':MenuIcon,
            'MenuName':MenuName,
            'projectName':projectName
            
       },
        success: function(data) {
            location.reload();
        }
    });
}



function EditMainMenu(id) {
  var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewMainMenu',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('#mid').val(obj.id)
            $('.ParentMenu').val(obj.ParentMenu).trigger('change');
            $('.MenuIcon').val(obj.MenuIcon);
            $('.MenuIcon').attr('readonly', false);
            $('.MenuName').val(obj.MenuName);
            $('.MenuName').attr('readonly', false);
            $('.projectName').val(obj.projectName).trigger('change');
           
           

        }
    });

}
</script>