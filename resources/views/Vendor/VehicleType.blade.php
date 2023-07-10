@include('layouts.app')
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
                                                <label class="col-md-3 col-form-label" for="userName">Vehicle Type<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="1" class="form-control VehicleType" name="VehicleType" id="VehicleType" >
                                                <input type="hidden"  class="form-control Vid" name="Vid" id="Vid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Capacity (kg)<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="2" class="form-control Capacity" name="Capacity" id="Capacity" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Body Type</label>
                                                <div class="col-md-9">
                                                <select id="BodyType" tabindex="3" class="form-control selectBox BodyType">
                                                <option value="COVERED">COVERED</option>
                                                <option value="OPEN">OPEN</option>
                                                <option value="CONTAINER">CONTAINER</option>
                                                <option value="TANK">TANK</option>
                                                <option value="REFRIGERATED">REFRIGERATED</option>
                                             </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Vehicle Size (ft)</label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="4" class="form-control VehicleSize" name="VehicleSize" id="VehicleSize" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="userName">Dimension (ft)</label>
                                                <div class="col-md-3">
                                                <input type="number" oninput="this.value = Math.abs(this.value)" tabindex="5" class="form-control Length" name="Length" id="Length" placeholder="LENGTH">
                                               
                                                <span class="error"></span>
                                                </div>
                                                <div class="col-md-3">
                                                <input type="number" oninput="this.value = Math.abs(this.value)" tabindex="6" class="form-control Width" name="Width" id="Width" placeholder="WIDTH">
                                               
                                                <span class="error"></span>
                                                </div>
                                                <div class="col-md-3">
                                                <input type="number" oninput="this.value = Math.abs(this.value)" tabindex="7" class="form-control height" name="height" id="height" placeholder="HEIGHT">
                                              
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Total Wheels<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="8" class="form-control TotalWheels" name="TotalWheels" id="TotalWheels" value="" >
                                                </div>
                                            </div>
                                            </div>

                                             <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Image </label>
                                                <div class="col-md-9">
                                                <input type="file" tabindex="9" class="form-control file" name="file" id="file" value="" >
                                                </div>
                                            </div>
                                            </div>
                                          
                                               <div class="col-6 text-end">
                                            <div class="row mb-1">
                                             
                                                <div class="col-md-12 col-md-offset-3">
                                                <input type="button" tabindex="9" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddVehicleType()">
                                                <a href="{{url('VehicleType')}}" tabindex="10" class="btn btn-primary">Cancel</a>
                                                <span class="error"></span>
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
      <div class="row pl-pr mt-1">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                           <input type="submit" name="submit" value="Download" class="btn btn-primary" >
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            <th width="4%" class="p-1">ACTION</th>
            <th width="2%" class="p-1">SL#</th>
            <th width="10%" class="p-1">Vehicle Model Name</th>
            <th width="8%" class="p-1">Capacity</th>
            <th width="8%" class="p-1">Body Type</th>
            <th width="10%" class="p-1">Vehicle Size</th>
            <th width="6%" class="p-1">Length</th>
            <th width="6%" class="p-1">Width</th>
            <th width="6%" class="p-1">Height</th>
            <th width="10%" class="p-1">Total Wheels</th>
            <th width="6%" class="p-1">Image</th>
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
            @foreach($vehcileType as $veh)
            <?php $i++; ?>
            <tr>
            <td class="p-1">
            <a href="javascript:void(0)" onclick="ViewVehicleType('{{$veh->id}}')">View</a> |
            <a href="javascript:void(0)" onclick="EditVehicleType('{{$veh->id}}')">Edit</a>
            </td>
            <td class="p-1">{{$i}}</td>
            <td class="p-1">{{$veh->VehicleType}}</td>
            <td class="p-1">{{$veh->Capacity}}</td>
            <td class="p-1">{{$veh->BodyType}}</td>
            <td class="p-1">{{$veh->VehSize}}</td>
            <td class="p-1">{{$veh->Length}}</td>
            <td class="p-1">{{$veh->Width}}</td>
            <td class="p-1">{{$veh->height}}</td>
            <td class="p-1">{{$veh->TotalWheels}}</td>
            <td class="p-1">@if(isset($veh->image) && $veh->image!="") 
            <a href="{{url($veh->image)}}" target="_blank" class="btn btn-primary">View</a>
             @else 
             <button disabled class="btn btn-primary">No File</button> 
             @endif</td>
           </tr>
            @endforeach
          
         </tbody>
        </table>
        <div class="d-flex d-flex justify-content-between">
        {!! $vehcileType->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd'
      });

 function AddVehicleType()
 {

  // $(".btnSubmit").attr("disabled", true);
   if($('#VehicleType').val()=='')
   {
      alert('please Enter Vehicle Type');
      return false;
   }
   if($('#Capacity').val()=='')
   {
      alert('please Enter Capacity');
      return false;
   }
   
    if($('#TotalWheels').val()=='')
   {
      alert('please Enter TotalWheels');
      return false;
   }
    // if($('#Vid').val()==''){
    //    if($("#file").val().length==0){
    //     alert('Please Choose File');
    //     return false;
    //    }
    // }

   var VehicleType=$('#VehicleType').val();
   var Capacity=$('#Capacity').val();
   var BodyType=$('#BodyType').val();
   var VehicleSize=$('#VehicleSize').val();
   var Length=$('#Length').val();
   var Width=$('#Width').val();
   var height=$('#height').val();
   var TotalWheels=$('#TotalWheels').val();
   var Vid=$('#Vid').val();
 
      var base_url = '{{url('')}}';
     var formData = new FormData();

     formData.append("VehicleType",VehicleType);
      formData.append("Capacity",Capacity);
    formData.append("BodyType",BodyType);
    formData.append("VehicleSize",VehicleSize);
        formData.append("Length",Length);
     formData.append("Width",Width);
        formData.append("height",height);
         formData.append("TotalWheels",TotalWheels);
        formData.append("Vid",Vid);
        if($("#file").val().length >0){
            formData.append("File",$("#file")[0].files[0]);
        }
        
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddVehicleType',
       cache: false,
       processData:false,
       contentType:false,
       data: formData,
       success: function(data) {
         alert(data);
       location.reload();
       }
     });
  }  
  function ViewVehicleType(id)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewVehicleType',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
         const obj = JSON.parse(data);
         $('.Vid').val(obj.id);
         $('.VehicleType').val(obj.VehicleType);
         $('.VehicleType').attr('readonly', true);
         $('.Capacity').val(obj.Capacity);
         $('.Capacity').attr('readonly', true);
         $('.BodyType').val(obj.BodyType).trigger('change');
         $('.BodyType').attr('disabled', true);
         $('.VehicleSize').val(obj.VehSize);
         $('.VehicleSize').attr('readonly', true);
         $('.Length').val(obj.Length);
         $('.Length').attr('readonly', true);
         $('.Width').val(obj.Width);
         $('.Width').attr('readonly', true);
         $('.height').val(obj.height);
         $('.height').attr('readonly', true);
         $('.TotalWheels').val(obj.TotalWheels);
         $('.TotalWheels').attr('readonly', true);
      
       }
     });
  }
  function EditVehicleType(id)
  {
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewVehicleType',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
         const obj = JSON.parse(data);
         $('.Vid').val(obj.id);
         $('.VehicleType').val(obj.VehicleType);
         $('.VehicleType').attr('readonly', false);
         $('.Capacity').val(obj.Capacity);
         $('.Capacity').attr('readonly', false);
         $('.BodyType').val(obj.BodyType).trigger('change');
         $('.BodyType').attr('disabled', false);
         $('.VehicleSize').val(obj.VehSize);
         $('.VehicleSize').attr('readonly', false);
         $('.Length').val(obj.Length);
         $('.Length').attr('readonly', false);
         $('.Width').val(obj.Width);
         $('.Width').attr('readonly', false);
         $('.height').val(obj.height);
         $('.height').attr('readonly', false);
         $('.TotalWheels').val(obj.TotalWheels);
         $('.TotalWheels').attr('readonly', false);
      
       }
     });
  }
</script>