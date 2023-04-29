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
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Zone Name<span
                                            class="error">*</span></label>
                                    <select class="form-control ZoneName" name="ZoneName" id="ZoneName" tabindex="1">
                                        <option value=""></option>
                                        @foreach($Zone as $master)
                                        <option value="{{$master->id}}">{{$master->ZoneName}}</option>
                                        @endforeach

                                    </select>
                                    <input type="hidden" tabindex="1" class="form-control cid" name="cid" id="cid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">State Name</label>
                                    <select class="form-control StateName" name="StateName" id="StateName" tabindex="2">
                                        <option value=""></option>
                                        @foreach($state as $statemaster)
                                        <option value="{{$statemaster->id}}">{{$statemaster->name}}</option>
                                        @endforeach
                                    </select>

                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">City Code<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="3" class="form-control CityCode" name="CityCode"
                                        id="CityCode">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">City Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="4" class="form-control CityName" name="CityName"
                                        id="CityName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Metro City</label><br>
                                    <input type="checkbox" id="ReversePickup" name="MetroCity" value="MetroCity"
                                        class="MetroCity" tabindex="5">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Airport Exists</label><br>
                                    <input type="checkbox" id="AirportExists" name="AirportExists" value="AirportExists"
                                        class="AirportExists" tabindex="6">
                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                </div>
                             
                                <div class="mb-2 col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddCity()" tabindex="7">
                                    <a href="{{url('CityMaster')}}" class="btn btn-primary mt-3" tabindex="8">Cancel</a>
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
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="mb-2 col-md-3">
                                    <input value="{{request()->get('search')}}" type="text" class="form-control BillDate" name="search" placeholder="Search"
                                        autocomplete="off" tabindex="9">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="10">Search</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                            <th width="5%">ACTION</th>
                                            <th width="2%">SL#</th>
                                            <th width="10%">Zone Name</th>
                                            <th width="10%">State Name</th>
                                            <th width="10%">City Code</th>
                                            <th width="10%">City Name</th>
                                            <th width="10%">Metro City</th>
                                            <th width="10%">Airport Exists</th>
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
                                        @foreach($city as $cityMaster)
                                        <?php  
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><a href="javascript:void(0)"
                                                    onclick="ViewCity('{{$cityMaster->id}}')">View </a>/ <a
                                                    href="javascript:void(0)"
                                                    onclick="EditCity('{{$cityMaster->id}}')">Edit</a></td>
                                            <td>{{$i}}</td>
                                            <td>@if(isset($cityMaster->ZoneDetails->ZoneName)){{$cityMaster->ZoneDetails->ZoneName}}@endif
                                            </td>
                                            <td>@if(isset($cityMaster->StateDetails->name)){{$cityMaster->StateDetails->name}}@endif
                                            </td>
                                            <td>{{$cityMaster->Code}}</td>
                                            <td>{{$cityMaster->CityName}}</td>
                                            <td>{{$cityMaster->MetroCity}}</td>
                                            <td>{{$cityMaster->AirportExists}}</td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                {{ $city->appends(Request::except('page'))->links() }}
                            </div>
                        </div>


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

function AddCity() {
   
    if ($('#ZoneName').val() == '') {
        alert('please Enter Zone Name');
        return false;
    }
    if ($('#StateName').val() == '') {
        alert('please Enter State Name');
        return false;
    }
    if ($('#CityCode').val() == '') {
        alert('please Enter City Code');
        return false;
    }
    if ($('#CityName').val() == '') {
        alert('please Enter City Name');
        return false;
    }
    
    var CityName = $('#CityName').val();
    var ZoneName = $('#ZoneName').val();
    var CityCode = $('#CityCode').val();
    var StateName = $('#StateName').val();
    var MetroCity = $("input[name=MetroCity]:checked").val();
    var AirportExists = $("input[name=AirportExists]:checked").val();
    var cid = $('#cid').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddCity',
        cache: false,
        data: {
            'CityName': CityName,
            'ZoneName': ZoneName,
            'CityCode': CityCode,
            'StateName': StateName,
            'MetroCity': MetroCity,
            'AirportExists': AirportExists,
            'cid': cid
        },
        success: function(data) {
            if(data=='false'){
                alert('City already Exist');
                  $(".btnSubmit").attr("disabled", false);
            }
            else{
                alert(data);
                location.reload();
            }
        }
    });
}

function ViewCity(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewCity',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.CityName').val(obj.CityName);
            $('.CityName').attr('readonly', true);
            $('.CityCode').val(obj.Code);
            $('.CityCode').attr('readonly', true);
            $('.ZoneName').val(obj.ZoneName).trigger('change');
            $('.ZoneName').attr('disabled', true);
            $('.StateName ').val(obj.stateId).trigger('change');
            $('.StateName').attr('disabled', true);
            if (obj.MetroCity == 'Yes') {
                $('.MetroCity').prop('checked', true);
            } else {
                $('.MetroCity').prop('checked', false);
            }
            $('.MetroCity').attr('disabled', true);
            if (obj.AirportExists == 'Yes') {
                $('.AirportExists').prop('checked', true);
            } else {
                $('.AirportExists').prop('checked', false);
            }
            $('.AirportExists').attr('disabled', true);

        }
    });
}

function EditCity(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewCity',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.cid').val(obj.id);
            $('.CityName').val(obj.CityName);
            $('.CityName').attr('readonly', false);
            $('.CityCode').val(obj.Code);
            $('.CityCode').attr('readonly', false);
            $('.ZoneName').val(obj.ZoneName).trigger('change');
            $('.ZoneName').attr('disabled', false);
            $('.StateName ').val(obj.stateId).trigger('change');
            $('.StateName').attr('disabled', false);
            if (obj.MetroCity == 'Yes') {
                $('.MetroCity').prop('checked', true);
            } else {
                $('.MetroCity').prop('checked', false);
            }
            $('.MetroCity').attr('disabled', false);
            if (obj.AirportExists == 'Yes') {
                $('.AirportExists').prop('checked', true);
            } else {
                $('.AirportExists').prop('checked', false);
            }
            $('.AirportExists').attr('disabled', false);
        }
    });
}
</script>