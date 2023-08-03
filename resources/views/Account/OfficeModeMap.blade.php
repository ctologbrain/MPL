@include('layouts.appThree')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
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
                               
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Customer<span
                                            class="error">*</span></label>
                                    <select class="form-control cityCheckDet Customer selectBox" name="Customer" id="Customer" tabindex="2">
                                    <option value=""></option>
                                        @foreach($Cust as $key)
                                        <option value="{{$key->id}}">{{$key->CustomerCode}} ~ {{$key->CustomerName}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Mode Name<span
                                            class="error">*</span></label>
                                    <select class="form-control Mode selectBox" name="Mode" id="Mode" tabindex="1">
                                        <option value=""></option>
                                        @foreach($Mode as $key)
                                        <option value="{{$key->id}}">{{$key->Mode}}</option>
                                        @endforeach

                                    </select>
                                    <input type="hidden" tabindex="1" class="form-control pid" name="pid" id="pid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                
                                <div class="mb-2 col-md-12 text-center">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddPincode()" tabindex="3">
                                    <a href="{{url('OfficeModeMapping')}}" class="btn btn-primary" tabindex="4">Cancel</a>
                                </div>
                                <h4 class="header-title nav nav-tabs nav-bordered"></h4>
                                
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
                                    <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}"  name="search" placeholder="Search"
                                        autocomplete="off" tabindex="8">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="9">Search</button>
                                    <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="10">
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="5%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Customer</th>
                                            <th width="10%" class="p-1">Mode</th>
                                            <th width="10%" class="p-1">Mapping By</th>
                                            <th width="10%" class="p-1">Mapping On</th>
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
                                        @foreach($listing as $key)
                                        <tr>
                                            <?php $i++; ?>
                                            <td class="p-1"><a href="javascript:void(0)" onclick="viewState('{{$key->id}}')">View
                                                </a>/ <a href="javascript:void(0)"
                                                    onclick="EditState('{{$key->id}}')">Edit</a></td>
                                            <td class="p-1">{{$i}}</td>
                                            <td class="p-1">@if(isset($key->CustDetails->CustomerCode)){{$key->CustDetails->CustomerCode}} ~ {{$key->CustDetails->CustomerName}}@endif</td>
                                            <td class="p-1">@if(isset($key->ModeDetails->Mode)){{$key->ModeDetails->Mode}} @endif</td>
                                           
                                            <td class="p-1">@if(isset($key->UserDetails->EmployeeName)) {{$key->UserDetails->EmployeeName}} @endif</td>
                                            <td class="p-1">@isset($key->Created_At) {{date("d-m-Y",strtotime($key->Created_At))}} @endisset</td>
                                          
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                         {{ $listing->appends(Request::except('page'))->links() }}

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
$('.selectBox').select2();
function AddPincode() {

   
    if ($('#Customer').val() == '') {
        alert('please Select Customer');
        return false;
    }
    if ($('#Mode').val() == '') {
        alert('please select Mode');
        return false;
    }
    
    var Mode = $('#Mode').val();
    var Customer = $('#Customer').val();
    var pid = $('#pid').val();
//     if($("#Active").prop("checked")==true){
//     var Active ="Yes";
//    }
//    else{
//     var Active ="No";
//    }
    // $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/OfficeModePOST',
        cache: false,
        data: {
            'Mode': Mode,
            'Customer': Customer,
            'pid': pid
        },
        success: function(data) {
              if(data=='false'){
                alert('Customer Mode already Mapped');
                  $(".btnSubmit").attr("disabled", false);
            }
            else{
                alert(data);
                location.reload();
            }
        }
    });
}

function viewState(id) {

    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/OfficeModeDetails',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.Mode').val(obj.ModeId).trigger('change');
            $('.Mode').attr('disabled', true);
            $('.Customer').val(obj.CustId).trigger('change');
            $('.Customer').attr('disabled', true);
         
        }
    });
}

function EditState(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/OfficeModeDetails',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.pid').val(obj.id);
            $('.Mode').val(obj.ModeId).trigger('change');
            $('.Mode').attr('disabled', false);
            $('.Customer').val(obj.CustId).trigger('change');
            $('.Customer').attr('disabled', false);
          
        }
    });
}

</script>