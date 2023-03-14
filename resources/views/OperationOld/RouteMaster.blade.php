@include('layouts.appTwo')
<style>
label {
    font-size: 8.5pt !important;
    font-weight: 900;
    color: #444040
}
.consignorSelection
{
    display:none !important;
}
body{
    min-height: 844px !important;
}
.allLists{
    box-shadow: 0 2px 5px rgba(0, 0, 0, 1.0);
}
.generator-container .form-control{
    margin-bottom: 0px;
}
.model-popup table .th1,
{
width: 5%;
}
.model-popup table .th3{
width: 5%;
}
.model-popup table .th2{
    width: 80%;
}
.generator-container .model-popup table tr td input.form-control{
    text-align: center;
}
</style>
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
        <div class="col-xl-12">
            <div class="card">
                @if (session('status'))
                 <div class="alert alert-success alert-dismissible bg-success text-white border-0   fade show" role="alert">
                         <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                         <strong>Success - </strong>  {{ session('status','') }}
                </div>
                @endif
                <div class="card-body">
                    <form metho="POST" action="{{url('AddRouteMaster')}}" method="post">
                    @csrf
                            <div id="basicwizard">
                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <label class="col-md-4 col-4 col-form-label" for="userName">Route Name<span
                                                            class="error">*</span></label>
                                                    <div class="col-md-8 col-8">
                                                        <input type="text" tabindex="1" class="form-control  RouteName"
                                                            name="RouteName" id="RouteName">
                                                        <input type="hidden" class="form-control Pid" name="Pid" id="Pid">
                                                        <span class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-12 col-md-6">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-4 col-form-label" for="password">Start Point<span
                                                            class="error">*</span></label>
                                                    <div class="col-md-8 col-8">
                                                        <select tabindex="2" class="form-control selectBox StartPoint"
                                                            name="StartPoint" id="StartPoint">
                                                            <option value="">--select--</option>
                                                            @foreach($city as $cites)
                                                            <option value="{{$cites->id}}">{{$cites->Code}} ~
                                                                {{$cites->CityName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4 col-4 col-form-label" for="password">End Point<span
                                                            class="error">*</span></label>
                                                    <div class="col-md-8 col-8">
                                                        <select tabindex="2" class="form-control selectBox endpoint"
                                                            name="endpoint" id="endpoint">
                                                            <option value="">--select--</option>
                                                            @foreach($city as $cites)
                                                            <option value="{{$cites->id}}">{{$cites->Code}} ~
                                                                {{$cites->CityName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row mb-1">
                                                    <label class="col-4 col-md-4 col-form-label" for="password">Transit Days<span
                                                            class="error">*</span></label>
                                                    <div class="col-md-2 col-8">
                                                        <input text="" class="form-control TransitDays" name="TransitDays"
                                                            id="TransitDays">
                                                    </div>
                                                    <div class="col-md-6 col-12 text-end">
                                                         <label class="col-md-2 col-form-label pickupIn" for="password"></label>

                                                        <input type="button" tabindex="4" value="Add Location"
                                                    class="btn btn-primary btnSubmit" id="btnSubmit"
                                                    onclick="addTouchPoint()">
                                                      <a href="{{url('RouteMaster')}}" tabindex="5"
                                                    class="btn btn-primary">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                           






                                            
                                        </div>
                                    </div>




                                </div>


                            </div>
                </div>
            </div>
        </div> <!-- tab-content -->
    </div> <!-- end #basicwizard-->
   


<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
                <div class="row tabels">
                <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            <th width="10%">ACTION</th>
            <th width="2%">SL#</th>
            <th width="10%">Route Name</th>
            <th width="10%">Start Point</th>
            <th width="10%">Last Point</th>
            <th width="10%">Transit Days</th>
            <th width="5%">Total Location</th>
            
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($route as $routeDetails)
            <?php $i++; ?>
            <tr>
                <td><a href="javascript::void(0)" onclick="ViewRoute('{{$routeDetails->id}}')">View </a></td>
                <td>{{$i}}</td>
                <td>{{$routeDetails->RouteName}}</td>
                <td>{{$routeDetails->StatrtPointDetails->Code}} ~ {{$routeDetails->StatrtPointDetails->CityName}}</td>
                <td>{{$routeDetails->EndPointDetails->Code}} ~ {{$routeDetails->EndPointDetails->CityName}}</td>
                <td>{{$routeDetails->TransitDays}}</td>
            </tr>
            @endforeach
          
         </tbody>
        </table>
        {!! $route->appends(Request::all())->links() !!}


                </div> <!-- end col -->


            </div>
        </div>
       
        <div class="modal fade model-popup" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Transit HUB</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                 
                    <table class="table table-bordered table-centered mb-0">
    <thead>
        <tr>
            <th class="th1">Sequence</th>
            <th class="th2">Transit HUB </th>
            <th class="th3">Halting Time </th>
          
        </tr>
    </thead>
    <tbody>
    <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[1][order]" value="1" readonly>
            </td>
            <td>
                <select tabindex="2" class="form-control product_id TouchPoint" name="TouchPoint[1][Touch]" id="TouchPoint1">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input type="text" class="form-control" name="TouchPoint[1][Time]"></td>
        
        </tr>
        <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[2][order]" value="2" readonly>
            </td>
            <td>
                <select tabindex="2" class="form-control product_id TouchPoint" name="TouchPoint[2][Touch]" id="TouchPoint2">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input type="text" class="form-control" name="TouchPoint[2][Time]"></td>
        
        </tr>
        @for($i=3; $i<=20; $i++)
        <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[{{$i}}][order]" value="{{$i}}" readonly>
            </td>
            <td>
                <select tabindex="2" class="form-control product_id TouchPoint" name="TouchPoint[{{$i}}][Touch]" id="TouchPoint{{$i}}">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input type="text" class="form-control" name="TouchPoint[{{$i}}][Time]"></td>
        
        </tr>
        @endfor
       
        
        
    </tbody>
</table>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
</form>
            </div>
        </div>
    </div>
</div>
<div class="TouchPointModel"></div>
<script type="text/javascript">
$('.selectBox').select2();
$('.datepickerOne').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

function addTouchPoint() {
    if ($('#RouteName').val() == '') {
        alert('Please Enter Route Name');
        return false;
    }
    if ($('#StartPoint').val() == '') {
        alert('Please Select Start Point');
        return false;
    }
    if ($('#endpoint').val() == '') {
        alert('Please Select End Point');
        return false;
    }
    if ($('#StartPoint').val() == $('#endpoint').val()) {
        alert('Start Point And End Point are same');
        return false;
    }
    if ($('#TransitDays').val() == '') {
        alert('Please Enter Transit Days');
        return false;
    }

    var RouteName = $('#RouteName').val();
    var StartPoint = $('#StartPoint').val();
    var endpoint = $('#endpoint').val();
    var TransitDays = $('#TransitDays').val();
    $('#TouchPoint1').val(StartPoint).trigger('change');
    $('#TouchPoint2').val(endpoint).trigger('change');
    $('#exampleModal').modal('toggle');
    $('.selectBox').select2();
}
function ViewRoute(routeId)
{
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewRoute',
        cache: false,
        data: {
            'routeId': routeId,
            
        },
        success: function(data) {
            $('.TouchPointModel').html(data);
          
        }
    });  
}
$(".product_id").select2({
    dropdownParent: $('#exampleModal .modal-content')
});
</script>