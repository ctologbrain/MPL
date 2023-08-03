@include('layouts.appTwo')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
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
                            <div class="row pl-pr">
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Type Code<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control TypeCode"
                                        name="TypeCode" id="TypeCode">

                                    <input type="hidden" tabindex="1" class="form-control Did" name="Did" id="Did">
                                    <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Type Name<span
                                            class="error">*</span></label><br>
                                    <input type="text" tabindex="1" class="form-control TypeName"
                                        name="TypeName" id="TypeName">
                                      
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Category</label>
                                   
                                        <select  tabindex="1" class="form-control Typecategory"
                                        name="Typecategory" id="Typecategory">
                                        <option value="">Select category</option>
                                         @foreach($docketCat as $DocketTypes)
                                         <option value="{{$DocketTypes->id}}">{{$DocketTypes->title}}</option>
                                         @endforeach
                                       </select>
                                 <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Item Price</label>
                                    <input type="number" tabindex="1" class="form-control ItemPrice"
                                        name="ItemPrice" id="ItemPrice">
                                      
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                
                                <div class="mb-2 col-md-12 text-center mt-1">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddDocketType()">
                                    <a href="{{url('DocketType')}}" class="btn btn-primary">Cancel</a>
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
                            <div class="row pl-pr">
                                <div class="mb-2 col-md-3">
                                    <input value="{{request()->get('search');}}" type="text" class="form-control BillDate" name="search" placeholder="Search"
                                        autocomplete="off">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search"
                                        class="btn btn-primary">Search</button>
                                </div>
                                </form>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th style="min-width:10px;" width="10%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Type Code</th>
                                            <th width="10%" class="p-1">Type Name</th>
                                            <th width="10%" class="p-1">Category</th>
                                            <th width="10%" class="p-1">Item Price</th>
                                            <th width="10%" class="p-1">Created By</th>
                                            <th width="10%" class="p-1" >Created On</th>
                                            
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
                                     @foreach($docketType as $type)
                                     <?php $i++; ?>
                                     <tr id="Row{{$i}}">
                                        <td class="p-1"><a href="javascript:void(0)" onclick="ViewDocketType('{{$type->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditDocketType('{{$type->id}}')">Edit</a>/ <a id="set" href="javascript:void(0)" onclick="getItDelete('{{$type->id}}','{{$i}}');">Delete</a> </td>
                                        <td class="p-1">{{$i}}</td>
                                        <td class="p-1">{{$type->Code}}</td>
                                        <td class="p-1">{{$type->Code}}~{{$type->Title}}</td>
                                        <td class="p-1">@isset($type->CaegoryDetails->title) {{$type->CaegoryDetails->title}} @endisset</td>
                                        <td class="p-1">{{$type->Rate}}</td>
                                         <td class="p-1">@isset($type->UserDetails->name){{$type->UserDetails->name}} @endisset</td>
                                        <td class="p-1">{{$type->created_at}}</td>
                                        
                                     </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         {{ $docketType->appends(Request::except('page'))->links() }}

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

function AddDocketType() {
 if ($('#TypeCode').val() == '') {
        alert('please Enter Type Code');
        return false;
    }
    if ($('#TypeName').val() == '') {
        alert('please Enter Type Name');
        return false;
    }
    var TypeCode = $('#TypeCode').val();
    var TypeName = $('#TypeName').val();
    var Typecategory = $('#Typecategory').val();
    var ItemPrice = $('#ItemPrice').val();
    var Did = $('#Did').val();

    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddDocketType',
        cache: false,
        data: {
            'TypeCode': TypeCode,
            'TypeName': TypeName,
            'Typecategory': Typecategory,
            'ItemPrice':ItemPrice,
            'Did':Did
        },
        success: function(data) {
             if(data=='false'){
                alert('Type Code already Exist');
                  $(".btnSubmit").attr("disabled", false);
                  $('#TypeCode').focus();
            }
            else{
                alert(data);
                location.reload();
          }
        }
    });
}

function ViewDocketType(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDocketType',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.TypeCode').val(obj.Code);
            $('.TypeCode').attr('readonly', true);
            $('.TypeName').val(obj.Title);
            $('.TypeName').attr('readonly', true);
            $('.Typecategory').val(obj.Cat_Id).trigger('change');
            $('.Typecategory').attr('disabled', true);
            $('.ItemPrice').val(obj.Rate);
            $('.ItemPrice').attr('readonly', true);
          }
    });
}

function EditDocketType(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDocketType',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.Did').val(obj.id);
            $('.TypeCode').val(obj.Code);
            $('.TypeCode').attr('readonly', false);
            $('.TypeName').val(obj.Title);
            $('.TypeName').attr('readonly', false);
            $('.Typecategory').val(obj.Cat_Id).trigger('change');
            $('.Typecategory').attr('disabled', false);
            $('.ItemPrice').val(obj.Rate);
            $('.ItemPrice').attr('readonly', false);
          }
    });



}

function getItDelete(id,number){
var base_url = '{{url('')}}';
if(confirm('Are you Sure')){
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/DeleteDocketType',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            //const obj = JSON.parse(data);
             $("#Row"+number).remove();
            }
        });
}
}
</script>