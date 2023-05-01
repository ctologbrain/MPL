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
                                    <input type="text" tabindex="2" class="form-control BankName" name="BankName"
                                        id="BankName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-2"
                                        id="btnSubmit" onclick="AddBank()" tabindex="3">
                                    <a href="{{url('BankMaster')}}" class="btn btn-primary mt-2" tabindex="4">Cancel</a>
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
                            <div class="row pl-pr mt-1">
                                <div class="mb-2 col-md-3">
                                    <input type="text" class="form-control BillDate" value="{{ request()->get('search') }}"  name="search" placeholder="Search"
                                        autocomplete="off" tabindex="5">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary" tabindex="6">Search</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="2%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Bank Code</th>
                                            <th width="10%" class="p-1">Bank Name</th>
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
                                        @foreach($Bank as $bankdetails)
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="p-1"><a href="javascript:void(0)"
                                                    onclick="ViewBank('{{$bankdetails->id}}')">View </a>/<a
                                                    href="javascript:void(0)"
                                                    onclick="EditBank('{{$bankdetails->id}}')"> Edit </a></td>
                                            <td class="p-1">{{$i}}</td>
                                            <td class="p-1">{{$bankdetails->BankCode}}</td>
                                            <td class="p-1">{{$bankdetails->BankName}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                          {{ $Bank->appends(Request::except('page'))->links() }}

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
           if(data=='false'){
                alert('Bank Code already Exist');
                  $(".btnSubmit").attr("disabled", false);
            }
            else{
                alert(data);
                location.reload();
            }
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