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
                                    <label for="example-select" class="form-label">Parent Menu<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control ParentMenu" name="ParentMenu"
                                        id="ParentMenu">
                                    <input type="hidden" tabindex="1" class="form-control pid" name="pid" id="pid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Menu Icon</label>
                                    <input type="text" tabindex="1" class="form-control MenuIcon"
                                        name="MenuIcon" id="MenuIcon">
                                    <span class="error"></span>
                                </div>
                                
                               
                               
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2"></div>
                              
                                
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddParentMenu()">
                                    <a href="{{url('AddParentManu')}}" class="btn btn-primary mt-3">Cancel</a>
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
                                        <th width="8%">Parent Menu</th>
                                        <th width="10%">Menu Icon</th>
                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($ParentManu as $pMenu)
                                    <?php $i++ ?>
                                    <tr>
                                       <td><a href="javascript:void(0)" onclick="updateparent('{{$pMenu->id}}')">Edit</a></td>
                                       <td>{{$i}}</td> 
                                       <td>{{$pMenu->ParentMenu}}</td> 
                                       <td>{{$pMenu->MenuIcon}}</td> 
                                      
                                    </tr>

                                    @endforeach
                                 
                                    
                                </tbody>
                                <div class="d-flex d-flex justify-content-between">
                          {{ $ParentManu->appends(Request::except('page'))->links() }}
                        </div>
                            </table>
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

  if($('#ParentMenu').val() == '') {
        alert('please Enter Parent Menu');
        return false;
    }
    
    var ParentMenu = $('#ParentMenu').val();
    var pid = $('#pid').val();
    var MenuIcon = $('#MenuIcon').val();
   
   // $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/PostParentMenu',
        cache: false,
        data: {
            'ParentMenu':ParentMenu,
            'pid': pid,
            'MenuIcon':MenuIcon,
            
       },
        success: function(data) {
            location.reload();
        }
    });
}



function updateparent(id) {
  var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewParentMenu',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('#pid').val(obj.id)
            $('.ParentMenu').val(obj.ParentMenu);
            $('.ParentMenu').attr('readonly', false);
            $('.MenuIcon').val(obj.MenuIcon);
            $('.MenuIcon').attr('readonly', false);
           

        }
    });

}
</script>