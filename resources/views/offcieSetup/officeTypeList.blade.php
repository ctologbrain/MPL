@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Office</a></li>
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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Office Type Code<span
                                            class="error">*</span></label>
                                                <div class="col-md-6">
                                                <input type="text" tabindex="1" class="form-control OfficeCode" name="OfficeCode" id="OfficeCode">
                                                <input type="hidden" tabindex="1" class="form-control OfficeId" name="OfficeId" id="OfficeId">
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-2">
                                                <label class="col-md-4 col-form-label" for="password">Office Type Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-6">
                                                <input type="text" tabindex="2" class="form-control OfficeTypeName"
                                                name="OfficeTypeName" id="OfficeTypeName">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-2 align-items-center">
                                                <label class="col-md-4 col-form-label" for="password">Allow Booking Commission</label>
                                                <div class="col-md-8">
                                                <input type="checkbox" id="BookingAllow" name="BookingAllow" tabindex="3" value="BookingAllow"class="BookingAllow">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row align-items-center">
                                                <label class="col-md-4 col-form-label" for="password">Allow Delivery Commission</label>
                                                <div class="col-md-4">
                                                <input type="checkbox" id="DeilveryCommission"  tabindex="4" name="DeilveryCommission" value="DeilveryCommission" class="DeilveryCommission">
                                                </div>
                                                <div class="col-4 text-end">
                                            <div class="row mb-3">
                                              <div class="col-md-12 col-md-offset-3">
                                                <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="OfficeTypeSubmit()" tabindex="5">
                                                 <a href="{{url('OfficeType')}}" class="btn btn-primary" tabindex="6">Cancel</a>
                                                <span class="error"></span>
                                                </div>
                                            </div>

                                            
                                        </div> <!-- end col -->
                                            </div>
                                            </div>
                                          </div>
                                         
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
     <div class="card-body">
     <div class="tab-content">
      <div class="tab-pane show active" id="input-types-preview">
      <div class="row pl-pr mt-1">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="7">
                   </div>
                   
                   <div class="mb-2 col-md-2">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="8">Search</button>
                           <input type="Submit"  class="btn btn-primary" tabindex="8" value="Export" name="Submit" >
                          </div> 
                
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
          <th width="10%" class="p-1">ACTION</th>
          <th width="2%" class="p-1">SL#</th>
          <th width="20%" class="p-1">Office Type Code</th>
          <th width="20%" class="p-1">Office Type Name </th>
          <th width="15%" class="p-1" >Allow Book. Comm.</th>
          <th width="15%" class="p-1">Allow Dlvd. Comm.</th>
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
            @foreach($officeType as $check)
            <?php $i++; ?>
            <tr>
                <td class="p-1"><a href="javascript:void(0)"
                        onclick="OffcieTypeList('{{$check->id}}')">View</a> | <a
                        href="javascript:void(0)"
                        onclick="EditOffcieTypeList('{{$check->id}}')">Edit</a></td>
                <td class="p-1">{{$i}}</td>
                <td class="p-1">{{$check->OfficeTypeCode}}</td>
                <td class="p-1">{{$check->OfficeTypeName}}</td>
                <td class="p-1">{{$check->AllowBookingCommission}}</td>
                <td class="p-1">{{$check->AllowDeliveryCommission}}</td>
            <tr>
                @endforeach
        </tbody>
        </table>
        <div class="d-flex d-flex justify-content-between">
        {{ $officeType->appends(Request::except('page'))->links() }}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    function OfficeTypeSubmit() {

if ($('#OfficeCode').val() == '') {
    alert('please Enter Office Code');
    return false;
}
if ($('#OfficeTypeName').val() == '') {
    alert('please Enter Office Name');
    return false;
}


var OfficeCode = $('#OfficeCode').val();
var OfficeTypeName = $('#OfficeTypeName').val();
var BookingAllow = $("input[name=BookingAllow]:checked").val();
var DeilveryCommission = $("input[name=DeilveryCommission]:checked").val();
var OfficeId = $('#OfficeId').val();
$(".btnSubmit").attr("disabled", true);
var base_url = '{{url('')}}';
$.ajax({
    type: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    },
    url: base_url + '/AddOfficeType',
    cache: false,
    data: {
        'OfficeCode': OfficeCode,
        'OfficeTypeName': OfficeTypeName,
        'BookingAllow': BookingAllow,
        'DeilveryCommission': DeilveryCommission,
        'OfficeId': OfficeId
    },
    success: function(data) {
        if(data=='false'){
                alert('Office Type Code already Exist');
                  $(".btnSubmit").attr("disabled", false);
                  
            }
            else{
                alert(data);
                location.reload();
          }
    }
});
}

function OffcieTypeList(OffcieTId) {
var base_url = '{{url('')}}';
$.ajax({
    type: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    },
    url: base_url + '/ViewOfficeType',
    cache: false,
    data: {
        'OffcieTId': OffcieTId
    },
    success: function(data) {
        const obj = JSON.parse(data);
        $('.OfficeCode').val(obj.OfficeTypeCode);
        $('.OfficeCode').attr('readonly', true);
        $('.OfficeTypeName').val(obj.OfficeTypeName);
        $('.OfficeTypeName').attr('readonly', true);
        if (obj.AllowBookingCommission == 'Yes') {
            $('.BookingAllow').prop('checked', true);
        } else {
            $('.BookingAllow').prop('checked', false);
        }
        $('.BookingAllow').attr('disabled', true);
       if (obj.AllowDeliveryCommission == 'Yes') {
         $('.DeilveryCommission').prop('checked', true);
        } else {
           $('.DeilveryCommission').prop('checked', false);
        }
        $('.DeilveryCommission').attr('disabled', true);
        $(window).scrollTop(0);
        $(".btnSubmit").attr("disabled", true);

    }
});
}

function EditOffcieTypeList(OffcieTId) {
var base_url = '{{url('')}}';
$.ajax({
    type: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    },
    url: base_url + '/ViewOfficeType',
    cache: false,
    data: {
        'OffcieTId': OffcieTId
    },
    success: function(data) {
        const obj = JSON.parse(data);
        $('.OfficeId').val(obj.id);
        $('.OfficeCode').val(obj.OfficeTypeCode);
        $('.OfficeCode').attr('readonly', false);
        $('.OfficeTypeName').val(obj.OfficeTypeName);
        $('.OfficeTypeName').attr('readonly', false);
        if (obj.AllowBookingCommission == 'Yes') {
            $('.BookingAllow').prop('checked', true);
        } else {
            $('.BookingAllow').prop('checked', false);
        }
        $('.BookingAllow').attr('disabled', false);
        if (obj.AllowDeliveryCommission == 'Yes') {
            $('.DeilveryCommission').prop('checked', true);
        } else {
            $('.DeilveryCommission').prop('checked', false);
        }
        $('.DeilveryCommission').attr('disabled', false);
       $(window).scrollTop(0);
        $(".btnSubmit").attr("disabled", false);
     }
});
 }
</script>