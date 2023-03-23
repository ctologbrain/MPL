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
                                                <label class="col-md-4 col-form-label" for="userName">Document Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="1" class="form-control DocumentName"
                                        name="DocumentName" id="DocumentName">
                                    <input type="hidden" tabindex="1" class="form-control Cid" name="Cid" id="Cid">
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="row mb-3">
                                                <label class="col-md-4 col-form-label" for="password">Mandatory<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="checkbox" id="Mandatory" name="Mandatory" value="Mandatory"
                                               class="Mandatory mt-1">
                                                </div>
                                            </div>
                                    
                                            </div>
                                            <div class="col-md-2">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="DepositeCashToHo()">
                                               <a href="{{url('CheckList')}}" class="btn btn-primary">Cancel</a>
                                            </div>
                                            </div>
                                          </div>
                                         </div> <!-- end col -->
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
      <div class="row">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Submit</button>
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
          <th width="2%">ACTION</th>
          <th width="2%">SL#</th>
          <th width="10%">Document Name</th>
          <th width="10%">Mandatory</th>
         
           </tr>
         </thead>
         <tbody>
        <?php $i=0; ?>
        @foreach($checklist as $check)
        <?php $i++; ?>
        <tr>
            <td><a href="javascript:void(0)"
                    onclick="viewCheckList('{{$check->id}}')">View</a> | <a
                    href="javascript:void(0)"
                    onclick="EditCheckList('{{$check->id}}')">Edit</a></td>
            <td>{{$i}}</td>
            <td>{{$check->DocumentName}}</td>
            <td>{{$check->Mandatory}}</td>
          <tr>
            @endforeach
    </tbody>
        </table>
        <div class="d-flex d-flex justify-content-between">
        {{ $checklist->appends(Request::except('page'))->links() }}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script>
    function DepositeCashToHo() {
    if ($('#DocumentName').val() == '') {
        alert('please Enter project Code');
        return false;
    }
    var DocumentName = $('#DocumentName').val();
    var Mandatory = $("input[name=Mandatory]:checked").val();
    var Cid = $('#Cid').val();
    $(".btnSubmit").attr("disabled", true);
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddCheckList',
        cache: false,
        data: {
            'DocumentName': DocumentName,
            'Mandatory': Mandatory,
            'Cid': Cid
        },
        success: function(data) {
            location.reload();
        }
    });
}

function viewCheckList(CheclListId) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewCheckList',
        cache: false,
        data: {
            'CheclListId': CheclListId
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.DocumentName').val(obj.DocumentName);
            $('.DocumentName').attr('readonly', true);
            if (obj.Mandatory == 'Yes') {
                $('.Mandatory').prop('checked', true);
            } else {
                $('.Mandatory').prop('checked', false);
            }

            $('.Mandatory').attr('disabled', true);

        }
    });
}

function EditCheckList(CheclListId) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewCheckList',
        cache: false,
        data: {
            'CheclListId': CheclListId
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.Cid').val(obj.id);
            $('.DocumentName').val(obj.DocumentName);
            $('.DocumentName').attr('readonly', false);
            if (obj.Mandatory == 'Yes') {
                $('.Mandatory').prop('checked', true);
            } else {
                $('.Mandatory').prop('checked', false);
            }

            $('.Mandatory').attr('disabled', false);



        }
    });



}
</script>