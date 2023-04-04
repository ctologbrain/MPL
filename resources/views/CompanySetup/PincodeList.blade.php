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
                                    <label for="example-select" class="form-label">State<span
                                            class="error">*</span></label>
                                    <select class="form-control State" name="State" id="State"
                                        onchange="getCity(this.value)" tabindex="1">
                                        <option value=""></option>
                                        @foreach($state as $states)
                                        <option value="{{$states->id}}">{{$states->name}}</option>
                                        @endforeach

                                    </select>
                                    <input type="hidden" tabindex="1" class="form-control pid" name="pid" id="pid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">City Name<span
                                            class="error">*</span></label>
                                    <select class="form-control cityCheckDet city" name="city" id="city" tabindex="2">
                                    </select>
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Pin Codes<span
                                            class="error">*</span></label>
                                    <input type="number" tabindex="3" class="form-control PinCodes" name="PinCodes"
                                        id="PinCodes">

                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Allow Reverse Pickup</label><br>
                                    <input type="checkbox" id="InternalNDR" name="ARP" value="ARP" class="ARP" tabindex="4">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Out of Delivery Area
                                        (ODA)</label><br>
                                    <input type="checkbox" id="ODA" name="ODA" value="ODA" class="ODA" tabindex="5">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                </div>
                                <div class="mb-2 col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddPincode()" tabindex="6">
                                    <a href="{{url('ViewPinCode')}}" class="btn btn-primary mt-3" tabindex="7">Cancel</a>
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
                            <div class="row">
                                <div class="mb-2 col-md-3">
                                    <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}"  name="search" placeholder="Search"
                                        autocomplete="off" tabindex="8">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="9">Search</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                            <th width="2%">ACTION</th>
                                            <th width="2%">SL#</th>
                                            <th width="10%">Pin Code</th>
                                            <th width="10%">City Name</th>
                                            <th width="10%">State Name</th>
                                            <th width="10%">Reverse Pickup</th>
                                            <th width="10%">ODA</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($pincode as $pin)
                                        <tr>
                                            <?php $i++; ?>
                                            <td><a href="javascript:void(0)" onclick="viewState('{{$pin->id}}')">View
                                                </a>/ <a href="javascript:void(0)"
                                                    onclick="EditState('{{$pin->id}}')">Edit</a></td>
                                            <td>{{$i}}</td>
                                            <td>{{$pin->PinCode}}</td>
                                            <td>@if(isset($pin->CityDetails->CityName)){{$pin->CityDetails->CityName}}@endif</td>
                                            <td>{{$pin->StateDetails->name}}</td>
                                            <td>{{$pin->ARP}}</td>
                                            <td>{{$pin->ODA}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                         {{ $pincode->appends(Request::except('page'))->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
$('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});

function AddPincode() {

    if ($('#State').val() == '') {
        alert('please select State');
        return false;
    }
    if ($('#city').val() == '') {
        alert('please Enter City');
        return false;
    }
    if ($('#PinCodes').val() == '' ) {
        alert('please Enter Pin code');
        return false; 
       
    }
     if($('#PinCodes').val().length != 6 ){
            alert('please Range Must Be 6 Digits');
            return false;
    }

    var ARP = $("input[name=ARP]:checked").val();
    var ODA = $("input[name=ODA]:checked").val();
    var State = $('#State').val();
    var city = $('#city').val();
    var PinCodes = $('#PinCodes').val();
    var pid = $('#pid').val();

    // $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddEditPinCode',
        cache: false,
        data: {
            'State': State,
            'city': city,
            'pid': pid,
            'ARP': ARP,
            'ODA': ODA,
            'PinCode': PinCodes
        },
        success: function(data) {
            location.reload();
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
        url: base_url + '/PincodeDetails',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.PinCodes').val(obj.PinCode);
            $('.PinCodes').attr('readonly', true);
            $('.State').val(obj.State).trigger('change');
            $('.State').attr('disabled', true);
            getCity(obj.State, obj.city);
            $('.cityCheckDet').attr('disabled', true);
            if (obj.ARP == 'Yes') {
                $('.ARP').prop('checked', true);
            } else {
                $('.ARP').prop('checked', false);
            }
            $('.ARP').attr('disabled', true);
            if (obj.ODA == 'Yes') {
                $('.ODA').prop('checked', true);
            } else {
                $('.ODA').prop('checked', false);
            }
            $('.ODA').attr('disabled', true);

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
        url: base_url + '/PincodeDetails',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
           $('.pid').val(obj.id);
           $('.PinCodes').val(obj.PinCode);
            $('.PinCodes').attr('readonly', false);
            $('.State').val(obj.State).trigger('change');
            $('.State').attr('disabled', false);
            getCity(obj.State, obj.city);
            $('.cityCheckDet').attr('disabled', false);
            if (obj.ARP == 'Yes') {
                $('.ARP').prop('checked', true);
            } else {
                $('.ARP').prop('checked', false);
            }
            $('.ARP').attr('disabled', false);
            if (obj.ODA == 'Yes') {
                $('.ODA').prop('checked', true);
            } else {
                $('.ODA').prop('checked', false);
            }
            $('.ODA').attr('disabled', false);
        }
    });
}

function getCity(stateId, city = '') {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/getCityForState',
        cache: false,
        data: {
            'id': stateId,
            'city': city
        },
        success: function(data) {
            $('.city').html(data);


        }
    });
}
</script>