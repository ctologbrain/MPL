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
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                @if (session('status'))
                 <div class="alert alert-success alert-dismissible bg-success text-white border-0   fade show" role="alert">
                         <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                         <strong>Success - </strong>  {{ session('status','') }}
                </div>
                @endif
                <div class="card-body">
                    <form  id="submitform" metho="POST" action="{{url('AddRouteMaster')}}" method="post">
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
                                                        <input value="" type="text" tabindex="1" class="form-control  RouteName"
                                                            name="RouteName" id="RouteName" required>
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
                                                        <select tabindex="2" class="form-control CityNamesearch StartPoint"
                                                            name="StartPoint" id="StartPoint" required>
                                                            <option value="">--select--</option>
                                                            <!-- @foreach($city as $cites)
                                                            <option value="{{$cites->id}}">{{$cites->Code}} ~
                                                                {{$cites->CityName}}</option>
                                                            @endforeach -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4 col-4 col-form-label" for="password">End Point<span
                                                            class="error">*</span></label>
                                                    <div class="col-md-8 col-8">
                                                        <select tabindex="3" class="form-control CityNamesearch endpoint"
                                                            name="endpoint" id="endpoint" required>
                                                            <option value="">--select--</option>
                                                           <!--  @foreach($city as $cites)
                                                            <option value="{{$cites->id}}">{{$cites->Code}} ~
                                                                {{$cites->CityName}}</option>
                                                            @endforeach -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row mb-1">
                                                    <label class="col-4 col-md-4 col-form-label" for="password">Transit Days<span
                                                            class="error">*</span></label>
                                                    <div class="col-md-2 col-8">
                                                        <input @isset($routeDetails->TransitDays) value=" {{$routeDetails->TransitDays}}" @endisset text="" class="form-control TransitDays" name="TransitDays"
                                                            id="TransitDays" tabindex="4" required>
                                                    </div>
                                                    <div class="col-md-6 col-12 text-end">
                                                         <label class="col-md-2 col-form-label pickupIn" for="password"></label>
                                                         <input value="" type="hidden" name="hiddenid" id="hiddenid">
                                                        <input type="button" tabindex="5" value="Add Location"
                                                    class="btn btn-primary btnSubmit" id="btnSubmit"
                                                    onclick="addTouchPoint()">
                                                      <a href="{{url('RouteMaster')}}" tabindex="6"
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
    <tbody id="coverTochPoints">
    <tr>
            <td>
              <input  type="text" class="form-control" name="TouchPoint[1][order]" value="1" readonly>
            </td>
            <td>
                <select id="city1" tabindex="2" class="form-control product_id TouchPoint" name="TouchPoint[1][Touch]" id="TouchPoint1">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input id="Time1" type="text" class="form-control" name="TouchPoint[1][Time]"></td>
        
        </tr>
        <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[2][order]" value="2" readonly>
            </td>
            <td>
                <select id="city2" tabindex="2" class="form-control product_id  City" name="TouchPoint[2][Touch]" id="TouchPoint2">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input id="Time2" type="text" class="form-control Time" name="TouchPoint[2][Time]"></td>
        
        </tr>
       
        @for($i=3; $i<=20; $i++)
        <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[{{$i}}][order]" value="{{$i}}" readonly>
            </td>
            <td>
                <select  id="city{{$i}}" tabindex="2" class="form-control product_id City" name="TouchPoint[{{$i}}][Touch]" id="TouchPoint{{$i}}">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input id="Time{{$i}}"  type="text" class="form-control Time" name="TouchPoint[{{$i}}][Time]"></td>
        
        </tr>
        @endfor
       
        
        
    </tbody>
</table>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-primary">Save</button>
            </div>

            </div>
        </div>
    </div>
</div>





 
<div class="TouchPointModel"></div>
<div class="RouteModel"></div>
</form>
<div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
                <div class="col-12">
                <form action="{{url('RouteMaster')}}" method="get">
                <div class="row pl-pr">
                    <div class="col-md-3">
                <label class="col-form-label" for="userName">Search by Code OR Customer Name<span
                                                            class="error">*</span></label>
                </div>
                          <div class="col-md-3">
                            <input placeholder="Route Name" type="text" name="keyword"   @if(request()->get('keyword')!='')  value="{{ request()->get('keyword') }}" @endif class="form-control" tabindex="" autocomplete="off">
                          </div>
                        
                <div class="col-md-2">
                            
                            <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="6">Go</button>
                         
                </div>   
                </form>
                </div>
                <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            <th class="p-1">ACTION</th>
            <th class="p-1">SL#</th>
            <th class="p-1">Route Name</th>
            <th class="p-1">Start Point</th>
            <th class="p-1">End Point</th>
            <th class="p-1">Transit Days</th>
            <th class="p-1">Total Location</th>
            <th class="p-1">Entry By </th>
            <th class="p-1">Entry Date </th>
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($route as $routeDetails)
            <?php $i++; ?>
            <tr>
                <td class="p-1"><a id="EditButton" href="javascript::void(0)" onclick="EditRoute('{{$routeDetails->id}}')">Edit</a>/<a id="ActiveButton{{$i}}" href="javascript::void(0)" onclick="ActiveRoute('{{$routeDetails->id}}','{{$i}}')">@if($routeDetails->status==1) {{'Deactive'}} @else {{'Active'}} @endif</a>/<a href="javascript::void(0)" onclick="ViewRoute('{{$routeDetails->id}}')">View </a></td>
                <td class="p-1">{{$i}}</td>
                <td class="p-1">{{$routeDetails->RouteName}}</td>
                <td class="p-1">{{$routeDetails->StatrtPointDetails->Code}} ~ {{$routeDetails->StatrtPointDetails->CityName}}</td>
                <td class="p-1">{{$routeDetails->EndPointDetails->Code}} ~ {{$routeDetails->EndPointDetails->CityName}}</td>
                <td class="p-1">{{$routeDetails->TransitDays}}</td>
                <td class="p-1"> {{$routeDetails->Total}}</td>
                <td class="p-1">{{$routeDetails->userDetails->name}}</td>
                <td class="p-1">{{$routeDetails->created_at}}</td>
            </tr>
            @endforeach
          
         </tbody>
        </table>
        {!! $route->appends(Request::all())->links() !!}


                </div> <!-- end col -->


            </div>
        </div>

<script src="{{url('public/js/custome.js')}}" type="text/javascript"></script>

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

function EditRoute(routeId)
{
      var base_url = '{{url('')}}';
      // $.ajax({
      //   type: 'POST',
      //   headers: {
      //       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
      //   },
      //   url: base_url + '/EditRoutePage',
      //   cache: false,
      //   data: {
      //       'routeId': routeId,
            
      //   },
      //   success: function(data) {
      //        var obj = JSON.parse(data);
      //       $('#hiddenid').val(obj.data.id);
      //       $('#RouteNameM').text(obj.data.RouteName);
      //       $('#StartPointM').text(obj.data.Source).trigger('change');
      //       $('#endpointM').text(obj.data.Destination).trigger('change');
      //       $('#TransitDay').val(obj.data.TransitDays);
      //   }
      //   });  

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/EditRoute',
        cache: false,
        data: {
            'routeId': routeId,
            
        },
        success: function(data) {
            $('.selectBox').select2();
             $('.RouteModel').html(data);

        }
    });  

      
}

function  ActiveRoute(routeId,actId)
{
   var active= $("#ActiveButton"+actId).text();
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ActiveRoute',
        cache: false,
        data: {
            'routeId': routeId,'active':active
            
        },
        success: function(data) { 
            var obj = JSON.parse(data);
            if(obj.status==1){
            $("#ActiveButton"+actId).text('Deactive');
            }
            else{
                 $("#ActiveButton"+actId).text('Active');
            }
        }
    });  
}

$(".product_id").select2({
    dropdownParent: $('#exampleModal .modal-content')
});

function UpdateRoute(id){
  var base_url = '{{url('')}}';
  if($("#TransitDayss").val()==""){
    alert("Please Enter TransitDays");
    return false;
  }
   var hiddenid = $('#Hiddenid').val();
  var TransitDays= $("#TransitDayss").val();
   $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddRouteMaster',
        cache: false,
        data: {
            'hiddenid': hiddenid,'TransitDays':TransitDays
            
        },
        success: function(data) {
          alert(data);

        }
    }); 
}

function addLocation(id){
     var base_url = '{{url('')}}'; 
     if($("#Seq").val()==''){
        alert("Please Enter Sequence");
        return false;

     }
     if($("#City").val()==''){
        alert("Please Enter Transit Hub");
        return false;

     }
     if($("#Time").val()==''){
        alert("Please Enter Halting Time");
        return false;

     }
    var Seq=  $("#Seq").val();
    var City= $("#City").val();
    var Time= $("#Time").val();
    var id = $('#Hiddenid').val();
     $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ADDRoute',
        cache: false,
        data: {
            'id': id, 'Seq':Seq, 'City':City,'Time':Time    
        },
        success: function(data) {
            var obj = JSON.parse(data);
            if(obj.status==1){
                alert("Add Successfully");
                location.reload();
            }

        }
    });  
}

function DeleteRoute(id,btnid){

    var base_url = '{{url('')}}';
    if(confirm("Are you sure?")){
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/DeleteRoute',
        cache: false,
        data: {
            'id': id,
            
        },
        success: function(data) {
            $("#Row"+btnid).remove();

        }
    });  
    }
}
</script>