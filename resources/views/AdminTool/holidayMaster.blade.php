@include('layouts.app')

<div class="generator-container allLists tally_dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        
                        <li class="breadcrumb-item active">HOLIDAY MASTER</li>
                    </ol>
                </div>
                <h4 class="page-title">HOLIDAY MASTER</h4>
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
                                                    <label class="col-md-2 col-form-label" for="StateCity">State/City</label>
                                                    <div class="col-md-4">
                                                    <select class="form-control selectBox" name="StateCity" id="StateCity" onchange="getCityState(this.value);" tabindex="1" >
                                                      <option value="National">National</option>
                                                       <option value="State">State</option>
                                                        <option value="City">City</option>
                                                    </select>
                                                    </div>
                                                    <label class="col-md-2 col-form-label" id="lvl"> </label> 

                                                    <div class="col-md-4"  id="loadeCityState" style="display:none;">
                                            
                                                    </div>
                                                </div>

                                            </div>
                                           
                                            <div  class="col-6 mt-1 m-b-1">
                                            </div>
                                            <div class="col-6 m-b-1">
                                              <div class="row">
                                                <label class="col-md-2 col-form-label" for="Start_date">Start Date<span class="error">*</span></label>
                                                <div class="col-md-4">
                                                  <input readonly type="text" name="start_date" id="Start_date" class="form-control start_date datepickerOne" tabindex="2">
                                                </div>
                                                <label class="col-md-2 col-form-label" for="End_date">End Date<span class="error">*</span></label>
                                                <div class="col-md-4">
                                                  <input readonly type="text" name="End_date" id="End_date" class="form-control End_date datepickerOne" tabindex="3">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            </div>
                                            <div class="col-6 m-b-1">
                                              <div class="row">
                                                <label class="col-md-2 col-form-label" for="start_date">Description<span class="error">*</span></label>
                                                <div class="col-md-10">
                                                  <select class="form-control selectBox" name="Description" id="Description" tabindex="4">
                                                    @foreach($description as $key)
                                                        <option value="{{$key->id}}">{{$key->HolidayName}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                              </div>
                                            </div>
                                           

                                            <div class="col-12 text-center mb-1 mt-1">
                                                <input type="button" tabindex="5" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddHoliday();">
                                                <a href="{{url('HolidayMaster')}}"  tabindex="6"  class="btn btn-primary btnSubmit" > Cancel</a>
                                            </div>
                                            
                                           <hr>
                                          </div>


                                          <div class="row mt-1">
                                            <div class="col-6 text-start">
                                              <div class="row">
                                                <label class="col-md-4 col-form-label" for="holiday_name">Search By State or City Name</label>
                                                <div class="col-md-6">
                                              <input @if(request()->get('name')!="") value="{{request()->get('name')}}" @endif type="text" tabindex="7" name="name" class="form-control name" id="name">
                                              </div>
                                               <div class="col-md-2">
                                               <input type="submit" tabindex="8" value="Go" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                              </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-12 mt-1">
                                              <div class="table-responsive a">
                                                <table class="table table-bordered">
                                                  <tr class="main-title">
                                                  <th class="p-1"> SN.</th>
                                                    <th class="p-1"> StateCity</th>
                                                    <th class="p-1">State Name</th>
                                                    <th class="p-1"> City Name.</th>
                                                    <th class="p-1"> Start Date</th>
                                                    <th class="p-1">End Date</th>
                                                    <th class="p-1">Discription</th>
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
                                                  @foreach($list as $key)
                                                     <?php  $i++; ?>
                                              <tr >
                                              <td class="p-1" width="5%" style="min-width:20px;">{{$i}}</td>
                                              <td class="p-1">{{$key->StateCity}}</td>
                                              <td class="p-1">@isset($key->cityDetails->CityName) {{$key->cityDetails->CityName}}  @endisset</td>
                                              <td class="p-1">@isset($key->stateDetails->name) {{$key->stateDetails->name}}   @endisset</td>
                                              <td class="p-1">@isset($key->Start_date) {{date("d-m-Y",strtotime($key->Start_date))}} @endisset</td>
                                              <td class="p-1">@isset($key->End_date) {{date("d-m-Y",strtotime($key->End_date))}} @endisset</td>
                                              <td class="p-1">@isset($key->HolidayDescDetails->HolidayName) {{$key->HolidayDescDetails->HolidayName}}  @endisset</td>
                                           
                                             
                                              </tr>
                                                  @endforeach
                                                 
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

<script>
     $('.datepickerOne').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight:true,
    autoclose:true
});
$('.selectBox').select2();
function AddHoliday() {
  
    if ($('#Start_date').val() == '') {
        alert('please Enter Start Date');
        return false;
    }

    if ($('#End_date').val() == '') {
        alert('please Enter End Date');
        return false;
    }
    if ($('#Description').val() == '') {
        alert('please Enter Description');
        return false;
    }

    if($("#Active").prop("checked")==true){
    var Active ="Yes";
    }
    else{
      var Active ="No";
    }
   
    
    var StateCity = $('#StateCity').val();
    var City = $('#City').val();
    var State = $('#State').val();
    var Start_date = $('#Start_date').val();
    var End_date = $('#End_date').val();
    var Description = $('#Description').val();
   
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/HolidayMasterPost',
        cache: false,
        data: {
            'StateCity': StateCity,
            'Start_date': Start_date,
            'End_date': End_date,
            'Description': Description,
            'City': City,
            'State': State
          
        },
        success: function(data) {
            alert(data);
            location.reload();
        }
    });
}

  function getCityState(vall){
    var base_url = '{{url('')}}';
    if(vall == "National"){
      $("#loadeCityState").css("display","none");
      $("#lvl").html('');
      return false;
      
    }
    if(vall == "State"){
      var Type =1;
      var level = "State";  
    }
    if(vall == "City"){
       Type =2;
        level = "City";
    }

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/HolidayMasterGetCityState',
        cache: false,
        data: {
            'Type':Type ,
        },
        success: function(data) {
          $("#loadeCityState").css("display","block");
          $("#loadeCityState").html(data);
          $('.selectBox').select2();
          $("#lvl").html(level);
        }
      });
  }

    </script>
             
