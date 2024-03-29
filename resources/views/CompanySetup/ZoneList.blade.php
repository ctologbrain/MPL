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
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Country Name<span
                                            class="error">*</span></label>
                                    <select class="form-control CountryName selectBox" name="CountryName" id="CountryName" tabindex="1">
                                        <option value=""></option>
                                        @foreach($country as $ctr)
                                        <option value="{{$ctr->id}}">{{$ctr->CountryName}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" tabindex="1" class="form-control zid" name="zid" id="zid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Zone Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="2" class="form-control ZoneName" name="ZoneName"
                                        id="ZoneName">

                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>

                                
                                <div class="mb-2 col-md-12 text-center">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddCountry()" tabindex="3">
                                    <a href="{{url('ZoneList')}}" class="btn btn-primary" tabindex="4">Cancel</a>
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
                                    <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}" name="search" placeholder="Search"
                                        autocomplete="off" tabindex="5">
                                </div>
                                <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="6">Search</button>
                           <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="7">
                          </div> 
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="2%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Country Name</th>
                                            <th width="10%" class="p-1">Zone Name</th>

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
                                        @foreach($zone as $master)
                                        <?php $i++; ?>
                                        <tr>

                                            <td class="p-1"><a href="javascript:void(0)" onclick="viewZone('{{$master->id}}')">View
                                                </a>/ <a href="javascript:void(0)"
                                                    onclick="EditZone('{{$master->id}}')">Edit</a></td>
                                            <td class="p-1">{{$i}}</td>
                                            <td class="p-1">{{$master->CountryDetails->CountryName}}</td>
                                            <td class="p-1">{{$master->ZoneName}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {!! $zone->appends(Request::all())->links() !!}

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
$('.selectBox').select2()
function AddCountry() {

    if ($('#CountryName').val() == '') {
        alert('please Enter Country Name');
        return false;
    }
    if ($('#ZoneName').val() == '') {
        alert('please Enter Zone');
        return false;
    }
    var CountryName = $('#CountryName').val();
    var ZoneName = $('#ZoneName').val();
    var zid = $('#zid').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddZone',
        cache: false,
        data: {
            'CountryName': CountryName,
            'ZoneName': ZoneName,
            'zid': zid
        },
        success: function(data) {
            alert(data);
            location.reload();
        }
    });
}

function viewZone(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewZone',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.ZoneName').val(obj.ZoneName);
            $('.ZoneName').attr('readonly', true);
            $('.CountryName').val(obj.CountryName).trigger('change');
            $('.CountryName').attr('disabled', true);

        }
    });
}

function EditZone(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewZone',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.zid').val(obj.id);
            $('.ZoneName').val(obj.ZoneName);
            $('.ZoneName').attr('readonly', false);
            $('.CountryName').val(obj.CountryName).trigger('change');
            $('.CountryName').attr('disabled', false);


        }
    });
}
</script>