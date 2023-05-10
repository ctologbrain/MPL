@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
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
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-8">
                                    <label for="example-select" class="form-label">Customer Name<span
                                            class="error">*</span></label>
                                    <select class="form-control CountryName selectBox" name="CountryName" id="CountryName" tabindex="1">
                                        <option value="">--Select--</option>
                                        @foreach($Customer as $ctr)
                                        <option value="{{$ctr->id}}">{{$ctr->CustomerCode}} ~{{$ctr->CustomerName}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" tabindex="1" class="form-control hiddenId" name="hiddenId" id="hiddenId">
                                    <span class="error"></span>
                                </div>
                                </div>
                                <div class="row">
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Customer Login Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="2" class="form-control ZoneName" name="ZoneName"
                                        id="ZoneName">

                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Customer Password<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="2" class="form-control Password" name="Password"
                                        id="Password">

                                    <span class="error"></span>
                                </div>
                               </div>
                               <div class="row">
                                
                                <div class="mb-2 col-md-12 text-center">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddCountry()" tabindex="3">
                                    <a href="{{url('CustomerMasterLogIn')}}" class="btn btn-primary" tabindex="4">Cancel</a>
                                </div>
                                <h4 class="header-title nav nav-tabs nav-bordered"></h4>
                                <form action="" method="GET">
                                    @csrf
                                    @method('GET')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <form action="" method="GET">
          @csrf
          @method('GET')
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row pl-pr mt-1">
                                <div class="mb-2 col-md-3">
                                    <input type="text" class="form-control search" value="{{ request()->get('search') }}" name="search" placeholder="Search"
                                        autocomplete="off" tabindex="5">
                                </div>
                                <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="6">Search</button>
                          </div> 
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="2%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Customer Name</th>
                                            <th width="10%" class="p-1">Customer logIn Name</th>
                                            <th width="10%" class="p-1">Password</th>
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
                                        @foreach($CustomerMasterData as $key)
                                        <?php $i++; ?>
                                        <tr>

                                            <td class="p-1"><a href="javascript:void(0)" onclick="viewZone('{{$key->UserId}}')">View
                                                </a>/ <a href="javascript:void(0)"
                                                    onclick="EditZone('{{$key->UserId}}')">Edit</a></td>
                                            <td class="p-1">{{$i}}</td>
                                            <td class="p-1">{{$key->CustomerCode}}~ {{$key->CustomerName}}</td>
                                            <td class="p-1">{{$key->email}}</td>
                                            <td class="p-1">{{$key->ViewPassowrd}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {!! $CustomerMasterData->appends(Request::all())->links() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
$('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});
$('select').select2();
function AddCountry() {

    if ($('#CountryName').val() == '') {
        alert('Please Select Customer');
        return false;
    }
    if ($('#ZoneName').val() == '') {
        alert('please Enter Customer Login  Name');
        return false;
    }
    if ($('#Password').val() == '') {
        alert('please Enter Customer Login Password');
        return false;
    }
    var CountryName = $('#CountryName').val();
    var ZoneName = $('#ZoneName').val();
    var hiddenId = $('#hiddenId').val();
    var loginPassword = $('#Password').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/CustomerMasterLogInPost',
        cache: false,
        data: {
            'Customer': CountryName,
            'loginName': ZoneName,
            'hiddenId': hiddenId,
            'loginPassword':loginPassword
        },
        success: function(data) {
            alert(data);
            location.reload();
        }
    });
}

function viewZone(userId) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/CustomerMasterLogInView',
        cache: false,
        data: {
            'userId': userId
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.ZoneName').val(obj.email);
            $('.ZoneName').attr('readonly', true);
            $('#CountryName').attr('disabled', true);
            $('#CountryName').val(obj.cid).trigger('change');
            
            $('.Password').val(obj.ViewPassowrd);
            $('.Password').attr('readonly', true);
            $("#btnSubmit").prop('disabled',true);
        }
    });
}

function EditZone(userId) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/CustomerMasterLogInView',
        cache: false,
        data: {
            'userId': userId
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.hiddenId').val(obj.UserId);
            $('.ZoneName').val(obj.email);
            $('.ZoneName').attr('readonly', false);
            $('#CountryName').val(obj.cid).trigger('change');
            $('#CountryName').attr('disabled', false);
            $('.Password').val(obj.ViewPassowrd);
            $('.Password').attr('readonly', false);
            $("#btnSubmit").prop('disabled',false);
        }
    });
}
</script>