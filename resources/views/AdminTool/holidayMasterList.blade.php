@include('layouts.app')

<div class="generator-container allLists tally_dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        
                        <li class="breadcrumb-item active">HOLIDAY LIST MASTER</li>
                    </ol>
                </div>
                <h4 class="page-title">HOLIDAY LIST MASTER</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <form method="GET" action="" id="subForm">
    @csrf
        <div class="row pl-pr">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="bdr-btm">
                                        <div class="row pl-pr">
                                            <div class="col-6 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="HolidayName">Holiday Name<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                     <input type="text" name="HolidayName" class="form-control HolidayName" id="HolidayName" tabindex="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 mt-1 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-2 col-form-label" for="document_proof_name">Active </label>
                                                    <div class="col-md-4 mt-1">
                                                    <input type="checkbox" name="Active" tabindex="2" class="Active" id="Active">	
                                                    <input type="hidden" name="pid"  class="pid" id="pid">	
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1 m-b-1">
                                            </div>
                                            <div class="col-6 text-start mt-2 mb-1">
                                                <input type="button" tabindex="2" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddHoliday();">
                                                <a href="{{url('HolidayListMaster')}}" tabindex="3" class="btn btn-primary btnSubmit"  >Cancel</a>
                                            </div>
                                            
                                           <hr>
                                          </div>


                                          <div class="row mt-1">
                                            <div class="col-6 text-start">
                                              <div class="row">
                                                <label class="col-md-3 col-form-label" for="name">Search By Name</label>
                                                <div class="col-md-6">
                                              <input type="text" @if(request()->get('name')!="") value="{{request()->get('name')}}" @endif tabindex="4" name="name" class="form-control name" id="name">
                                              </div>
                                               <div class="col-md-3">
                                               <input type="submit" tabindex="5" value="Go" class="btn btn-primary btnSubmit" id="btnSubmit" >
                                              </div>
                                            </div>
                                            </div>
                                             <div class="col-6 text-end">
                                              <input name="submit" type="submit" tabindex="6" value="Download" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                            </div>
                                            <div class="col-12 mt-1">
                                              <div class="table-responsive a">
                                                <table class="table table-bordered">
                                                  <tr class="main-title">
                                                    <th class="p-1 text-center" style="min-width: 20px;">SL#</th>
                                                    <th class="p-1 text-center" style="min-width: 20px;">ACTION</th>
                                                    <th class="p-1 text-start" style="min-width: 670px;">Holiday Name</th>
                                                     <th class="p-1 text-start" style="min-width: 50px;">Active</th>
                                                   
                                                  </tr>
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
                                                  @foreach($Listing as $key)
                                                  <?php  $i++; ?>
                                                  <tr>
                                                    <td class="p-1 text-center">{{$i}}</td>
                                                    <td class="p-1 text-center"><a onclick="viewState('{{$key->id}}');" href="javascript:void(0);" style="color: orange;">View </a> | <a  onclick="EditState('{{$key->id}}');"   href="javascript:void(0);"  style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">{{$key->HolidayName}}</td>
                                                    <td class="p-1 text-start">{{$key->Is_Active}}</td>
                                                  </tr>
                                                  @endforeach
                                                  <!-- <tr>
                                                    <td class="p-1 text-center">2</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">BHAI DUJ</td>
                                                   
                                                    <td class="p-1 text-start">Yes</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="p-1 text-center">3</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">BOHAG BIHU OR RANGALI BIHU</td>
                                                   
                                                    <td class="p-1 text-start">Yes</td>
                                                  </tr>
                                                   <tr>
                                                    <td class="p-1 text-center">4</td>
                                                    <td class="p-1 text-center"><a href="#" style="color: orange;">View </a> | <a href="#" style="color: orange;">Edit </a> </td>
                                                    <td class="p-1 text-start">CHEIRAOBA</td>
                                                   
                                                    <td class="p-1 text-start">Yes</td>
                                                  </tr> -->
                                                </table>
                                              </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>  
    </form>
</div>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});
$('.selectBox').select2();
function AddHoliday() {

   
    if ($('#HolidayName').val() == '') {
        alert('please Enter Holiday Name');
        return false;
    }

    if($("#Active").prop("checked")==true){
    var Active ="Yes";
   }
   else{
    var Active ="No";
   }
   
    
    var HolidayName = $('#HolidayName').val();
    var pid = $('#pid').val();

    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/HolidayListMasterPost',
        cache: false,
        data: {
            'HolidayName': HolidayName,
            'pid': pid,
            'Active':Active
        },
        success: function(data) {
                alert(data);
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
        url: base_url + '/HolidayListMasterShow',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.HolidayName').val(obj.HolidayName);
            $('.HolidayName').attr('readonly', true);
            if (obj.Is_Active == 'Yes') {
            $('#Active').prop('checked', true);
            } else {
                $('#Active').prop('checked', false);
            }
            $('.Active').attr('disabled', true);

         
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
        url: base_url + '/HolidayListMasterShow',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
           $('.pid').val(obj.id);
           $('.HolidayName').val(obj.HolidayName);
            $('.HolidayName').attr('readonly', false);
            if (obj.Is_Active == 'Yes') {
        $('#Active').prop('checked', true);
        } else {
            $('#Active').prop('checked', false);
        }
        $('#Active').attr('disabled', false);

        }
    });
}
    </script>
             
