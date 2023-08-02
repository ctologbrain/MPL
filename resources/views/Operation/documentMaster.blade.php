@include('layouts.appTwo')
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
                            <div class="row pl-pr mt-1">
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Document Code<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control DocumentCode" name="DocumentCode"
                                        id="DocumentCode">
                                    <input type="hidden" tabindex="1" class="form-control Did" name="Did" id="Did">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Document Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="2" class="form-control DocumentName"
                                        name="DocumentName" id="DocumentName">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2"></div>
                                <div class="mb-2 col-md-2"></div>
                               
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Required For Customer Bill</label><br>
                                    <input type="checkbox" id="CustomerBill" name="CustomerBill" value="CustomerBill"
                                        class="CustomerBill" tabindex="3">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Required For Vendor Bill</label><br>
                                    <input type="checkbox" id="VendorBill" name="VendorBill"
                                        value="VendorBill" class="VendorBill" tabindex="4">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Scanned Image Required</label><br>
                                    <input type="checkbox" id="Image" name="Image" value="Image"
                                        class="Image" tabindex="5">
                                    <span class="error"></span>
                                </div>
                                <div id="Check" class="mb-2 col-md-2">

                                </div>
                                <div class="mb-2 col-md-4">
                               </div>
                                <div class="mb-2 col-md-12 text-center">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddDocument()" tabindex="6">
                                    <a href="{{url('DocumentMaster')}}" class="btn btn-primary" tabindex="7">Cancel</a>
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
                        <div class="row pl-pr mt-1">
                            <div class="mb-2 col-md-3">
                                <input value="{{Request()->get('search')}}" type="text" class="form-control BillDate" name="search" placeholder="Search"
                                    autocomplete="off" tabindex="13">
                            </div>
                            <div class="mb-2 col-md-3">
                                <button type="submit" name="submit" value="Search"
                                    class="btn btn-primary" tabindex="14">Search</button>
                            </div>
                            </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-1 mt-1">
                                <thead>
                                    <tr class="main-title text-dark">

                                        <th  class="p-1" style="min-width:100px;">ACTION</th>

                                        <th  class="p-1">SL#</th>
                                        <th  class="p-1" style="min-width:150px;">Document Code</th>
                                        <th  class="p-1" style="min-width:250px;">Document Name</th>
                                        <th  class="p-1" style="min-width:150px;">Required For Customer Bill</th>
                                        <th  class="p-1" style="min-width:150px;">Required For vendor Bill</th>
                                        <th  class="p-1" style="min-width:150px;">Scanned  Image Required</th>
                                        <th  class="p-1" style="min-width:150px;">Status </th>
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
                                    @foreach($DocMaster as $key)
                                    <?php $i++; 
                                    if($key->Is_Active==0){
                                        $Active ="Active";
                                    }
                                    else{
                                        $Active ="InActive";
                                    }
                                    ?>
                                    <tr>

                                        <td class="p-1"><a href="javascript:void(0)" onclick="viewDoc('{{$key->id}}')">View</a>/<a
                                                href="javascript:void(0)" onclick="EditDoc('{{$key->id}}')">Edit</a>
                                        </td>
                                        <td class="p-1">{{$i}}</td>
                                        <td class="p-1">{{$key->DocumentCode}}</td>
                                        <td class="p-1">{{$key->DocumentName}}</td>
                                        <td class="p-1">{{$key->CustomerBill}}</td>
                                        <td class="p-1">{{$key->vendorBill}}</td>
                                        <td class="p-1">{{$key->ImageRequire}}</td>
                                        <td class="p-1">{{$Active}}</td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $DocMaster->appends(Request::all())->links() !!}
                                    </div>
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

function AddDocument() {
    if ($('#DocumentCode').val() == '') {
        alert('please Enter Document Code');
        return false;
    }
    if ($('#DocumentName').val() == '') {
        alert('please Enter Document Name');
        return false;
    }
    var DocumentCode = $('#DocumentCode').val();
    var DocumentName = $('#DocumentName').val();
    var CustomerBill = $("input[name=CustomerBill]:checked").val();
    var VendorBill = $("input[name=VendorBill]:checked").val();
    var Image = $("input[name=Image]:checked").val();
    var Isactive = $("input[name=Isactive]:checked").val();
    var Did = $('#Did').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/DocumentMasterPost',
        cache: false,
        data: {
            'DocumentCode': DocumentCode,
            'DocumentName': DocumentName,
            'CustomerBill': CustomerBill,
            'VendorBill': VendorBill,
            'Image': Image,
            'Did': Did,
            'Isactive':Isactive
        },
        success: function(data) {
            alert(data);
            location.reload();
        }
    });
}

function viewDoc(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/DocumentMasterfatch',
        cache: false,
        data: {
            'Did': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.DocumentCode').val(obj.DocumentCode);
            $('.DocumentCode').attr('readonly', true);
            $('.DocumentName').val(obj.DocumentName);
            $('.DocumentName').attr('readonly', true);
            if (obj.CustomerBill == 'Yes') {
                $('.CustomerBill').prop('checked', true);
            } else {
                $('.CustomerBill').prop('checked', false);
            }
            $('.CustomerBill').attr('disabled', true);
            if (obj.vendorBill == 'Yes') {
                $('.VendorBill').prop('checked', true);
            } else {
                $('.VendorBill').prop('checked', false);
            }
            $('.VendorBill').attr('disabled', true);
            if (obj.ImageRequire == 'Yes') {
                $('.Image').prop('checked', true);
            } else {
                $('.Image').prop('checked', false);
            }

            if(obj.Is_Active ==0){
            var Active = ` <label for="example-select" class="form-label">Is Active</label><br>
            <input type="checkbox" id="Isactive" name="Isactive" value="1"
            class="Image" tabindex="6" checked>`;

                $("#Check").html(Active);
            }
            else{
            var Active = ` <label for="example-select" class="form-label">Is Active</label><br>
            <input type="checkbox" id="Isactive" name="Isactive" value="1"
            class="Image" tabindex="6">`;

                $("#Check").html(Active);
            }
            $('.Image').attr('disabled', true);
            
              $(".btnSubmit").attr("disabled", true);
               $("html, body").animate({ scrollTop: 0 }, "fast");
        }
    });
}

function EditDoc(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/DocumentMasterfatch',
        cache: false,
        data: {
            'Did': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
           
            $('.Did').val(obj.id);
            $('.DocumentCode').val(obj.DocumentCode);
            $('.DocumentCode').attr('readonly', false);
            $('.DocumentName').val(obj.DocumentName);
            $('.DocumentName').attr('readonly', false);
            if (obj.CustomerBill == 'Yes') {
                $('.CustomerBill').prop('checked', true);
            } else {
                $('.CustomerBill').prop('checked', false);
            }
            $('.CustomerBill').attr('disabled', false);
            if (obj.vendorBill == 'Yes') {
                $('.VendorBill').prop('checked', true);
            } else {
                $('.VendorBill').prop('checked', false);
            }
            $('.VendorBill').attr('disabled', false);
            if (obj.ImageRequire == 'Yes') {
                $('.Image').prop('checked', true);
            } else {
                $('.Image').prop('checked', false);
            }
            $('.Image').attr('disabled', false);
         
            if(obj.Is_Active ==0){
            var Active = ` <label for="example-select" class="form-label">Is Active</label><br>
            <input type="checkbox" id="Isactive" name="Isactive" value="1"
            class="Image" tabindex="6" checked>`;

                $("#Check").html(Active);
            }
            else{
            var Active = ` <label for="example-select" class="form-label">Is Active</label><br>
            <input type="checkbox" id="Isactive" name="Isactive" value="1"
            class="Image" tabindex="6">`;

                $("#Check").html(Active);
            }
             $(".btnSubmit").attr("disabled", false);
              $("html, body").animate({ scrollTop: 0 }, "fast");
        }
    });



}
</script>