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
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Bank Code<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control BankCode" name="BankCode"
                                        id="BankCode">
                                    <input type="hidden" tabindex="1" class="form-control Bid" name="Bid" id="Bid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Bank Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control BankName" name="BankName"
                                        id="BankName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddBank()">
                                    <a href="{{url('BankMaster')}}" class="btn btn-primary mt-3">Cancel</a>
                                </div>
                                <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
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
                                    <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}"  name="search" placeholder="Search"
                                        autocomplete="off">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary">Search</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                            <th width="2%">ACTION</th>
                                            <th width="2%">SL#</th>
                                            <th width="10%">Bank Code</th>
                                            <th width="10%">Bank Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($Bank as $bankdetails)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><a href="javascript:void(0)"
                                                    onclick="ViewBank('{{$bankdetails->id}}')">View </a>/<a
                                                    href="javascript:void(0)"
                                                    onclick="EditBank('{{$bankdetails->id}}')"> Edit </a></td>
                                            <td>{{$i}}</td>
                                            <td>{{$bankdetails->BankCode}}</td>
                                            <td>{{$bankdetails->BankName}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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

function AddBank() {

    if ($('#BankCode').val() == '') {
        alert('please Enter Bank Code');
        return false;
    }
    if ($('#BankName').val() == '') {
        alert('please Enter Bank Name');
        return false;
    }
    var BankCode = $('#BankCode').val();
    var BankName = $('#BankName').val();
    var Bid = $('#Bid').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddEditBank',
        cache: false,
        data: {
            'BankCode': BankCode,
            'BankName': BankName,
            'Bid': Bid
        },
        success: function(data) {
            location.reload();
        }
    });
}

function ViewBank(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewBank',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.BankCode').val(obj.BankCode);
            $('.BankCode').attr('readonly', true);
            $('.BankName').val(obj.BankName);
            $('.BankName').attr('readonly', true);


        }
    });
}

function EditBank(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewBank',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.BankCode').val(obj.BankCode);
            $('.Bid').val(obj.id);
            $('.BankCode').attr('readonly', false);
            $('.BankName').val(obj.BankName);
            $('.BankName').attr('readonly', false);


        }
    });
}
</script>