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
    <!-- end card-->
    <form action="" method="GET">
      @csrf
      @method('GET')
      <div class="card">
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane show active" id="input-types-preview">
                    <div class="row pl-pr mt-1">
                      <div class="col-md-4">
                          <div class="row">
                            <label class="col-md-4 col-form-label" for="vendor_name">Vendor Name</label>
                            <div class="col-md-8">

                              <select class="form-control vendor_name selectBox" name="vendor_name" id="vendor_name">
                                <option value="">--Select--</option>
                                @foreach($VendorMaster as $key)
                                    <option @if(request()->get('vendor_name') == $key->id) selected @endif value="{{$key->id}}">{{$key->VendorCode}}~ {{$key->VendorName}}</option>
                                @endforeach
                              </select>
                              <span class="error"></span>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <label class="col-md-4 col-form-label" for="origin_city">Origin City</label>
                          <div class="col-md-8">
                           <select class="form-control origin_city selectBox" name="origin_city" id="origin_city">
                                <option value="">--Select--</option>
                                 @foreach($city as $key)
                                    <option @if(request()->get('origin_city') == $key->id) selected @endif  value="{{$key->id}}">{{$key->Code}}~ {{$key->CityName}}</option>
                                @endforeach

                              </select>
                            <span class="error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <label class="col-md-4 col-form-label" for="destination_city">Destination City</label>
                          <div class="col-md-8">
                            <select class="form-control destination_city selectBox" name="destination_city" id="destination_city">
                                <option value="">--Select--</option>
                                   @foreach($city as $key)
                                    <option @if(request()->get('destination_city') == $key->id) selected @endif  value="{{$key->id}}">{{$key->Code}}~ {{$key->CityName}}</option>
                                @endforeach
                          
                              </select>
                            <span class="error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                      </div>
                      <div class=" col-md-4">
                        <div class="row">
                          <label class="col-md-4 col-form-label" for="origin_city">From Date<span class="error">*</span></label>
                          <div class="col-md-8">
                            <input type="text" name="formDate"   @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}" @endif class="form-control datepickerOne" placeholder="From Date" tabindex="4" autocomplete="off">
                          </div>
                        </div>
                      </div>
                      <div class=" col-md-6">
                        <div class="row">
                          <label class="col-md-4 col-form-label" for="origin_city">To Date<span class="error">*</span></label>
                          <div class="col-md-4">
                             <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}" @endif   class="form-control datepickerOne" placeholder="To Date" tabindex="5" autocomplete="off" >
                          </div>
                          <div class="col-md-4">
                            <input type="button" name="generate_report" class="btn btn-primary" Value="generate_report" tabindex="6">
                             <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="7">Search</button>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
    </form>
    <div class="table-responsive a">
      <table class="table table-bordered table-centered mb-1 mt-1">
        <thead>
          <tr class="main-title text-dark">
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:160px;" class="p-1">GP Date</th>   
            <th style="min-width:130px;" class="p-1">GP Number</th> 
            <th style="min-width:130px;" class="p-1">FPM No.</th>
            <th style="min-width:130px;" class="p-1">FPM Date</th>  
            <th style="min-width:130px;" class="p-1">Vendor Name</th>   

            <th style="min-width:150px;" class="p-1">Vehicle Model</th>
            <th style="min-width:180px;" class="p-1">Capacity</th>
             <th style="min-width:130px;" class="p-1">Vehicle No</th>
            <th style="min-width:130px;" class="p-1">Supervisor Name</th>   
            <th style="min-width:190px;" class="p-1">Driver Name</th>

            <th style="min-width:130px;" class="p-1">Contact No </th>
            <th style="min-width:130px;" class="p-1">Seal No</th>
            <th style="min-width:130px;" class="p-1">Origin</th>
            <th style="min-width:130px;" class="p-1">Destination</th>
            <th style="min-width:130px;" class="p-1">Dist.(Km)  </th>

            <th style="min-width:130px;" class="p-1">Total Dockets</th>
            <th style="min-width:130px;" class="p-1">Actual Wt</th>
            <th style="min-width:130px;" class="p-1">Volumetric Wt</th>
            <th style="min-width:130px;" class="p-1">Charge Wt</th>
            <th style="min-width:130px;" class="p-1">Sale Amt</th>
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
            @foreach($gatePassDetails as $gpDetails)
            <?php $i++; ?>
            <tr>
               <td class="p-1">{{$i}}</td>
               <td class="p-1">{{$gpDetails->GP_TIME}}</td>
               <td class="p-1"><a href="{{url('print_gate_Number/'.$gpDetails->GP_Number)}}" target=_balnk>{{$gpDetails->GP_Number}}</a></td> 
               <td class="p-1">@if(isset($gpDetails->fpmDetails->FPMNo)){{$gpDetails->fpmDetails->FPMNo}}@endif</td>
               <td class="p-1">@if(isset($gpDetails->fpmDetails->Fpm_Date)){{$gpDetails->fpmDetails->Fpm_Date}}@endif</td>
               <td class="p-1">{{$gpDetails->VendorDetails->VendorName}}</td>
               <td class="p-1">{{$gpDetails->VehicleTypeDetails->VehicleType}}</td>
               <td class="p-1">{{$gpDetails->VehicleTypeDetails->Capacity}}</td>
               <td class="p-1">@if(isset($gpDetails->VehicleDetails->VehicleNo)){{$gpDetails->VehicleDetails->VehicleNo}}@endif</td>
               <td class="p-1">{{$gpDetails->Supervisor}}</td>
               <td class="p-1">@if(isset($gpDetails->DriverDetails)){{$gpDetails->DriverDetails->DriverName}}@endif</td>
               <td class="p-1">@if(isset($gpDetails->DriverDetails)){{$gpDetails->DriverDetails->Phone}}@endif</td>
               <td class="p-1">{{$gpDetails->Seal}}</td>
               <td class="p-1">{{$gpDetails->RouteMasterDetails->StatrtPointDetails->CityName}}</td>
               <td class="p-1">{{$gpDetails->RouteMasterDetails->EndPointDetails->CityName}}</td>
               <td class="p-1"></td>
               <td class="p-1">{{COUNT($gpDetails->getPassDocketDetails)}}</td>
               

            </tr>
            @endforeach
           
         </tbody>
      </table>
    </div>
    <div class="d-flex d-flex justify-content-between">
    {!! $gatePassDetails->appends(Request::all())->links() !!}
    </div>
</div> <!-- end col -->
   
<script type="text/javascript">
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
       todayHighlight: true
      });



 
</script>