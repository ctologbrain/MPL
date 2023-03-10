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
                                    <label for="example-select" class="form-label">Reason Code<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control ReasonCode" name="ReasonCode"
                                        id="ReasonCode">
                                    <input type="hidden" tabindex="1" class="form-control Rid" name="Rid" id="Rid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Reason Detail<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control ReasonDetail"
                                        name="ReasonDetail" id="ReasonDetail">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Reason Code</label><br>
                                    <input type="checkbox" id="NDRReason" name="NDRReason" value="NDRReason"
                                        class="NDRReason">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Mobile Reason</label><br>
                                    <input type="checkbox" id="NDRReason" name="MobileReason" value="MobileReason"
                                        class="MobileReason">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Vehicle Replac Reason</label><br>
                                    <input type="checkbox" id="NDRReason" name="vrr" value="vrr" class="vrr">
                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-2"><label for="example-select" class="form-label">Offload
                                        Reason</label><br>
                                    <input type="checkbox" id="NDRReason" name="OffloadReason" value="OffloadReason"
                                        class="OffloadReason">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">RTO Reason</label><br>
                                    <input type="checkbox" id="RTOReason" name="RTOReason" value="RTOReason"
                                        class="RTOReason">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Customer Exception</label><br>
                                    <input type="checkbox" id="CustomerException" name="CustomerException"
                                        value="CustomerException" class="CustomerException">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Reverse Pickup</label><br>
                                    <input type="checkbox" id="ReversePickup" name="ReversePickup" value="ReversePickup"
                                        class="ReversePickup">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Internal NDR</label><br>
                                    <input type="checkbox" id="InternalNDR" name="InternalNDR" value="InternalNDR"
                                        class="InternalNDR">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                               </div>
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddNdr()">
                                    <a href="{{url('NDRMaster')}}" class="btn btn-primary mt-3">Cancel</a>
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
                            <div class="mb-2 col-md-3">
                                <input type="text" class="form-control BillDate" name="search" placeholder="Search"
                                    autocomplete="off">
                            </div>
                            <div class="mb-2 col-md-3">
                                <button type="button" name="submit" value="Search"
                                    class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                            <table class="table table-bordered table-centered mb-1 mt-1">
                                <thead>
                                    <tr>
                                        <th width="3%">ACTION</th>
                                        <th width="2%">SL#</th>
                                        <th width="8%">Reason Code</th>
                                        <th width="10%">Reason Detail</th>
                                        <th width="10%">NDR Reason</th>
                                        <th width="10%">Mobile Reason</th>
                                        <th width="10%">Vehicle Replacement</th>
                                        <th width="10%">Offload Reason</th>
                                        <th width="10%">RTO Reason</th>
                                        <th width="10%">Customer Exception</th>
                                        <th width="10%">Reverse Pickup</th>
                                        <th width="10%">Internal NDR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($NdrMaster as $ndr)
                                    <?php $i++; ?>
                                    <tr>

                                        <td><a href="javascript:void(0)" onclick="viewNdr('{{$ndr->id}}')">View</a>/<a
                                                href="javascript:void(0)" onclick="EditNdr('{{$ndr->id}}')">Edit</a>
                                        </td>
                                        <td>{{$i}}</td>
                                        <td>{{$ndr->ReasonCode}}</td>
                                        <td>{{$ndr->ReasonDetail}}</td>
                                        <td>{{$ndr->NDRReason}}</td>
                                        <td>{{$ndr->MobileReason}}</td>
                                        <td>{{$ndr->vrr}}</td>
                                        <td>{{$ndr->OffloadReason}}</td>
                                        <td>{{$ndr->RTOReason}}</td>
                                        <td>{{$ndr->CustomerException}}</td>
                                        <td>{{$ndr->ReversePickup}}</td>
                                        <td>{{$ndr->InternalNDR}}</td>
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

function AddNdr() {
    if ($('#ReasonCode').val() == '') {
        alert('please Enter Reason Code');
        return false;
    }
    if ($('#ReasonDetail').val() == '') {
        alert('please Enter Reason Detail');
        return false;
    }
    var ReasonCode = $('#ReasonCode').val();
    var ReasonDetail = $('#ReasonDetail').val();
    var NDRReason = $("input[name=NDRReason]:checked").val();
    var MobileReason = $("input[name=MobileReason]:checked").val();
    var vrr = $("input[name=vrr]:checked").val();
    var RTOReason = $("input[name=RTOReason]:checked").val();
    var CustomerException = $("input[name=CustomerException]:checked").val();
    var ReversePickup = $("input[name=ReversePickup]:checked").val();
    var InternalNDR = $("input[name=InternalNDR]:checked").val();
    var OffloadReason = $("input[name=OffloadReason]:checked").val();
    var Rid = $('#Rid').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddNDR',
        cache: false,
        data: {
            'ReasonCode': ReasonCode,
            'ReasonDetail': ReasonDetail,
            'NDRReason': NDRReason,
            'MobileReason': MobileReason,
            'vrr': vrr,
            'RTOReason': RTOReason,
            'CustomerException': CustomerException,
            'ReversePickup': ReversePickup,
            'InternalNDR': InternalNDR,
            'OffloadReason': OffloadReason,
            'Rid': Rid
        },
        success: function(data) {
            location.reload();
        }
    });
}

function viewNdr(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewNDR',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.ReasonCode').val(obj.ReasonCode);
            $('.ReasonCode').attr('readonly', true);
            $('.ReasonDetail').val(obj.ReasonDetail);
            $('.ReasonDetail').attr('readonly', true);
            if (obj.NDRReason == 'Yes') {
                $('.NDRReason').prop('checked', true);
            } else {
                $('.NDRReason').prop('checked', false);
            }
            $('.NDRReason').attr('disabled', true);
            if (obj.MobileReason == 'Yes') {
                $('.MobileReason').prop('checked', true);
            } else {
                $('.MobileReason').prop('checked', false);
            }
            $('.MobileReason').attr('disabled', true);
            if (obj.vrr == 'Yes') {
                $('.vrr').prop('checked', true);
            } else {
                $('.vrr').prop('checked', false);
            }
            $('.vrr').attr('disabled', true);
            if (obj.OffloadReason == 'Yes') {
                $('.OffloadReason').prop('checked', true);
            } else {
                $('.OffloadReason').prop('checked', false);
            }
            $('.OffloadReason').attr('disabled', true);
            if (obj.RTOReason == 'Yes') {
                $('.RTOReason').prop('checked', true);
            } else {
                $('.RTOReason').prop('checked', false);
            }
            $('.RTOReason').attr('disabled', true);
            if (obj.CustomerException == 'Yes') {
                $('.CustomerException').prop('checked', true);
            } else {
                $('.CustomerException').prop('checked', false);
            }
            $('.CustomerException').attr('disabled', true);
            if (obj.ReversePickup == 'Yes') {
                $('.ReversePickup').prop('checked', true);
            } else {
                $('.ReversePickup').prop('checked', false);
            }
            $('.ReversePickup').attr('disabled', true);
            if (obj.InternalNDR == 'Yes') {
                $('.InternalNDR').prop('checked', true);
            } else {
                $('.InternalNDR').prop('checked', false);
            }
            $('.InternalNDR').attr('disabled', true);

        }
    });
}

function EditNdr(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewNDR',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
           
            $('.Rid').val(obj.id);
            $('.ReasonCode').val(obj.ReasonCode);
            $('.ReasonCode').attr('readonly', false);
            $('.ReasonDetail').val(obj.ReasonDetail);
            $('.ReasonDetail').attr('readonly', false);
            if (obj.NDRReason == 'Yes') {
                $('.NDRReason').prop('checked', true);
            } else {
                $('.NDRReason').prop('checked', false);
            }
            $('.NDRReason').attr('disabled', false);
            if (obj.MobileReason == 'Yes') {
                $('.MobileReason').prop('checked', true);
            } else {
                $('.MobileReason').prop('checked', false);
            }
            $('.MobileReason').attr('disabled', false);
            if (obj.vrr == 'Yes') {
                $('.vrr').prop('checked', true);
            } else {
                $('.vrr').prop('checked', false);
            }
            $('.vrr').attr('disabled', false);
            if (obj.OffloadReason == 'Yes') {
                $('.OffloadReason').prop('checked', true);
            } else {
                $('.OffloadReason').prop('checked', false);
            }
            $('.OffloadReason').attr('disabled', false);
            if (obj.RTOReason == 'Yes') {
                $('.RTOReason').prop('checked', true);
            } else {
                $('.RTOReason').prop('checked', false);
            }
            $('.RTOReason').attr('disabled', false);
            if (obj.CustomerException == 'Yes') {
                $('.CustomerException').prop('checked', true);
            } else {
                $('.CustomerException').prop('checked', false);
            }
            $('.CustomerException').attr('disabled', false);
            if (obj.ReversePickup == 'Yes') {
                $('.ReversePickup').prop('checked', true);
            } else {
                $('.ReversePickup').prop('checked', false);
            }
            $('.ReversePickup').attr('disabled', false);
            if (obj.InternalNDR == 'Yes') {
                $('.InternalNDR').prop('checked', true);
            } else {
                $('.InternalNDR').prop('checked', false);
            }
            $('.InternalNDR').attr('disabled', false);


        }
    });



}
</script>