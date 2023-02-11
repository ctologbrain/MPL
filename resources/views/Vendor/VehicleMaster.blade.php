@include('layouts.app')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor</a></li>
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
                    
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                           <div class="col-6">
                                              <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Reporting HUB & Time</label>
                                                <div class="col-md-3">
                                                 <input type="hidden" id="vid" class="vid">
                                                 <select name="Reportinghub selectBox" tabindex="1" class="form-control Reportinghub" id="Reportinghub" style="width: 113%;">
                                                    <option value="">--SELECT--</option>
                                                    @foreach($offcieMaster as $office)
                                                    <option value="{{$office->id}}">{{$office->OfficeCode}} ~ {{$office->OfficeName}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                                <label class="col-md-2 col-form-label" for="password">Time</label>
                                                <div class="col-md-3">
                                                 <input type="time" name="ReportingTime" value="{{date('H:m')}}" tabindex="2" class="form-control ReportingTime" id="ReportingTime" style="margin-left: -44px;width: 135%;">
                                                </div>
                                            </div>
                                           </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Owner</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="ModeType" tabindex="2" class="form-control ModeType" id="ModeType"> -->
                                                <select name="Owner" tabindex="3" class="form-control Owner selectBox" id="Owner">
                                                 <option value="">--Select--</option>   
                                                 <option value="COMPANY">COMPANY</option>
                                                 <option value="VENDOR">VENDOR</option>
                                                
                                                </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Vehicle Purpose<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select name="VehiclePurpose" tabindex="4" class="form-control VehiclePurpose selectBox" id="VehiclePurpose">
                                                 <option value="">--Select--</option>   
                                                 <option value="PICKUP">PICKUP</option>
		                                         <option value="DELIVERY">DELIVERY</option>
		                                          <option value="TRANSSHIPMENT">TRANSSHIPMENT</option>
		                                          <option value="PICKUP &amp; DELIVERY">PICKUP &amp; DELIVERY</option>
                                                
                                                </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Tariff Type<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select name="TariffType" tabindex="5" class="form-control TariffType selectBox" id="TariffType">
                                                <option value="">--Select--</option>   
	                                              <option value="FIXED RENT">FIXED RENT</option>
	                                             <option selected="selected" value="SECTOR WISE">SECTOR WISE</option>
                                                    </select>
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                              <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Month Rent Amount</label>
                                                <div class="col-md-3">
                                                 <input type="number" name="MonthRent" tabindex="6" class="form-control MonthRent" id="MonthRent" style="width: 113%;" oninput="this.value = Math.abs(this.value)">
                                                </div>
                                                <label class="col-md-2 col-form-label" for="password">Rent w.e.f</label>
                                                <div class="col-md-3">
                                                 <input type="number" name="Rentwef" tabindex="7" class="form-control Rentwef" id="Rentwef" style="margin-left: -19px;width: 114%;">
                                                </div>
                                            </div>
                                           </div>
                                           
                                         
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Monthly Fix Km</label>
                                                <div class="col-md-8">
                                                  <input type="number" name="MonthlyFixKm" tabindex="8" class="form-control MonthlyFixKm" id="MonthlyFixKm" >	
                                                
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                              <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Additional Per Km Rate</label>
                                                <div class="col-md-3">
                                                 <input type="number" name="AdditionalPerKmRate" tabindex="9" class="form-control AdditionalPerKmRate" id="AdditionalPerKmRate" style="width: 113%;" oninput="this.value = Math.abs(this.value)">
                                                </div>
                                                <label class="col-md-3 col-form-label" for="password">Per HR Rate</label>
                                                <div class="col-md-2">
                                                 <input type="text" name="PerHRRate" tabindex="10" class="form-control PerHRRate" id="PerHRRate" style="margin-left: -10px;width: 114%;">
                                                </div>
                                            </div>
                                           </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Placement Type</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="FCM" tabindex="6" class="form-control FCM" id="FCM"> -->
                                                <select name="PlacementType" id="PlacementType" class="form-control PlacementType selectBox" tabindex="11">
                                                <option value="--SELECT--">--SELECT--</option>
                                                <option value="12 hrs">12 hrs</option>
		                                        <option value="24 hrs">24 hrs</option>
                                                </select>
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Vendor Name</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="Identification" tabindex="7" class="form-control Identification" id="Identification"> -->
                                                  <select name="VendorName" tabindex="12" class="form-control VendorName selectBox" id="VendorName">
                                                  <option value="">--select--</option>
                                                  @foreach($vendor as $vendorMaster)
                                                  <option value="{{$vendorMaster->id}}">{{$vendorMaster->VendorCode}} ~ {{$vendorMaster->VendorName}}</option>  
                                                  @endforeach
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vehicle Model</label>
                                                <div class="col-md-8">
                                                <select name="VehicleModel" tabindex="13" class="form-control VehicleModel selectBox" id="VehicleModel">
                                                    <option value="">--select--</option>
                                                    @foreach($vehicleType as $vType)
                                                    <option value="{{$vType->id}}">{{$vType->VehicleType}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Vehicle No<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="VehicleNo" tabindex="14" class="form-control VehicleNo" id="VehicleNo">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Chasis No<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="ChasisNo" tabindex="15" class="form-control ChasisNo" id="ChasisNo">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Engine No <span class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="EngineNo" tabindex="16" class="form-control EngineNo" id="EngineNo">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Registration No <span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="RegistrationNo" tabindex="17" class="form-control RegistrationNo" id="RegistrationNo">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Registration State<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="RegistrationState" tabindex="18" class="form-control RegistrationState" id="RegistrationState">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Type Of Registration</label>
                                                <div class="col-md-8">
                                             
                                                 <select name="TypeOfRegistration" tabindex="19" class="form-control TypeOfRegistration selectBox" id="TypeOfRegistration">
                                                    <option value="">--select--</option>
                                                    <option value="PRIVATE">PRIVATE</option>
	                                                 <option value="PUBLIC">PUBLIC</option>
                                                 </select>    
                                            </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                              <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Insurance Validity</label>
                                                <div class="col-md-3">
                                                 <input type="text" name="InsuranceValidity" tabindex="20" class="form-control datepickerOne InsuranceValidity" id="InsuranceValidity" style="width: 113%;">
                                                </div>
                                                <label class="col-md-3 col-form-label" for="password">Insured Amount</label>
                                                <div class="col-md-2">
                                                 <input type="number" name="InsuredAmount" tabindex="21" class="form-control InsuredAmount" id="InsuredAmount" style="margin-left: -10px;width: 114%;" oninput="this.value = Math.abs(this.value)">
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Insurance Company</label>
                                                <div class="col-md-8">
                                                <input type="text" name="InsuranceCompany" tabindex="22" class="form-control InsuranceCompany" id="InsuranceCompany">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                              <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Year of Mfg</label>
                                                <div class="col-md-3">
                                                  <select name="YearofMfg" tabindex="23" class="form-control YearofMfg selectBox" id="YearofMfg" style="width: 113%;">
                                                    <option value="">--Select--</option>
                                                    <?php  echo $currentYar=date('Y');
                                                    for ($year = 1980; $year <= $currentYar; $year++) { ?>
                                                        <option value="{{$year}}">{{$year}}</option>
                                                   <?php }
                                                    ?>
                                                    ('Y');?>
                                                    
                                                 </select>
                                                 </div>
                                                <label class="col-md-3 col-form-label" for="password">Nos. Of Drivers</label>
                                                <div class="col-md-2">
                                                 <input type="number" name="NosOfDrivers" tabindex="24" class="form-control NosOfDrivers" id="NosOfDrivers" style="margin-left: -10px;width: 114%;" oninput="this.value = Math.abs(this.value)">
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Fuel Type</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="Identification" tabindex="7" class="form-control Identification" id="Identification"> -->
                                                  <select name="FuelType" tabindex="25" class="form-control FuelType selectBox" id="FuelType">
                                                  <option selected="selected" value="">--SELECT--</option>
                                                    <option value="PETROL">PETROL</option>
                                                    <option value="DIESEL">DIESEL</option>
                                                    <option value="CNG">CNG</option>
                                                    <option value="ELECTRIC">ELECTRIC</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Fitness Validity</label>
                                                <div class="col-md-8">
                                                <input type="text" name="FitnessValidity" tabindex="26" class="form-control datepickerOne FitnessValidity" id="FitnessValidity">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Vehicle Permit</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="Identification" tabindex="7" class="form-control Identification" id="Identification"> -->
                                                  <select name="VehiclePermit" tabindex="27" class="form-control VehiclePermit selectBox" id="VehiclePermit">
                                                  <option value="">--SELECT--</option>
                                                  <option value="ALL INDIA">ALL INDIA</option>
	                                              <option value="STATE WISE">STATE WISE</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">GPS Device Installed</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="Identification" tabindex="7" class="form-control Identification" id="Identification"> -->
                                                  <select name="IsGps" tabindex="28" class="form-control IsGps selectBox" id="IsGps">
                                                  <option value="">--SELECT--</option>
                                                  <option value="YES">YES</option>
	                                              <option value="NO">NO</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">GPS Device ID</label>
                                                <div class="col-md-8">
                                                  <input type="text" name="GPSDeviceID" tabindex="29" class="form-control GPSDeviceID" id="GPSDeviceID">
                                                  
                                                  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Vehicle Availability</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="Identification" tabindex="7" class="form-control Identification" id="Identification"> -->
                                                  <select name="VehicleAvailability" tabindex="30" class="form-control VehicleAvailability selectBox" id="VehicleAvailability">
                                                  <option value="">--SELECT--</option>
                                                  <option value="FULL">FULL</option>
	                                              <option selected="selected" value="PART">PART</option>

                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Months</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="Identification" tabindex="7" class="form-control Identification" id="Identification"> -->
                                                  <input type="checkbox" class="checkboxValue JAN" tabindex="31" value="JAN" name="month[]" id="JAN"> <b>JAN </b>
                                                  <input type="checkbox" class="checkboxValue FEB" value="FEB" name="month[]"  id="FEB"> <b>FEB </b>
                                                  <input type="checkbox" class="checkboxValue MAR" value="MAR" name="month[]"  id="MAR"> <b>MAR </b>
                                                  <input type="checkbox" class="checkboxValue" value="APR" name="month[]"  id="APR"> <b>APR </b>		
                                                  <input type="checkbox" class="checkboxValue" value="MAY" name="month[]"  id="MAY"> <b>MAY </b>				
                                                  <input type="checkbox" class="checkboxValue" value="JUN" name="month[]"  id="JUN"> <b>JUN </b>		
                                                  <input type="checkbox" class="checkboxValue" value="JUL" name="month[]"  id="JUL"> <b>JUL </b>	
                                                  <br>	
                                                  <input type="checkbox" class="checkboxValue" value="AUG" name="month[]"  id="AUG"> <b>AUG </b>		
                                                  <input type="checkbox" class="checkboxValue" value="SEP" name="month[]"  id="SEP"> <b>SEP </b>		
                                                  <input type="checkbox" class="checkboxValue" value="OCT" name="month[]"  id="OCT"> <b>OCT </b>		
                                                  <input type="checkbox" class="checkboxValue" value="NOV" name="month[]"  id="NOV"> <b>NOV </b>		
                                                  <input type="checkbox" class="checkboxValue" value="DEC" name="month[]"  id="DEC"> <b>DEC </b>		
                                                  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Allow Multi-HUB</label>
                                                <div class="col-md-8">
                                                <input type="checkbox"  id="AllowMultiHUB" name="AllowMultiHUB" class="AllowMultiHUB">	
                                                </div>
                                            </div>
                                           </div>
                                           </div>
                                          </div>
                                          <div class="col-md-2">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddVehicle()">
                                               <a href="{{url('VendorMaster')}}" class="btn btn-primary">Cancel</a>
                                            </div>
                                            
                                        </div> <!-- end col -->
                                        
                                   </div>
                           </div>
                   </div>
                           
          
            
                        <div class="card">
     <div class="card-body">
     <form action="" method="GET">
          @csrf
          @method('GET')
     <div class="tab-content b-0 mb-0">
    <div class="tab-pane active show" id="basictab1" role="tabpanel">
        <div class="row">
        <div class="col-12">
          <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Submit</button>
                          </div> 
                    </form>
            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
          <th style="min-width:130px;">ACTION</th>
          <th style="min-width:20px;">SL#</th>
          <th style="min-width:130px;">Reporting HUB</th>
          <th style="min-width:130px;">Reporting Time</th>
          <th style="min-width:130px;">Owner</th>
          <th style="min-width:130px;">Vehicle Purpose</th>
          <th style="min-width:150px;">Tariff Type</th>
          <th style="min-width:130px;">Rent Amount</th>
          <th style="min-width:130px;">Monthly Fix Km</th>
          <th style="min-width:130px;">Per Km Rate</th>
          <th style="min-width:130px;">Per Hour Rate</th>
         <th style="min-width:130px;">Placement Type</th>
          <th style="min-width:130px;">Rent wef</th>
          <th style="min-width:130px;">Vendor Name</th>
          <th style="min-width:130px;">Vehicle Model</th>
          <th style="min-width:130px;">Vehicle No</th>
          <th style="min-width:150px;">Chasis No</th>
          <th style="min-width:130px;">Engine No</th>
          <th style="min-width:130px;">Registration No</th>
          <th style="min-width:130px;">Registration State</th>
          <th style="min-width:130px;">Type Of Registration</th>
          <th style="min-width:130px;">Insurance Validity</th>
          <th style="min-width:130px;">Insured Amount</th>
          <th style="min-width:130px;">Insurance Company</th>
          <th style="min-width:130px;">Year Of Mfg</th>
          <th style="min-width:130px;">No Of Drivers</th>
          <th style="min-width:130px;">Fuel Type</th>
          <th style="min-width:130px;">Fitness Validity</th>
          <th style="min-width:130px;">Vehicle Permit</th>
          <th style="min-width:130px;">GPS Installed</th>
          <th style="min-width:130px;">GPS Device ID</th>
          <th style="min-width:130px;">Vehicle Availability</th>
          <th style="min-width:130px;">Months</th>
          <th style="min-width:130px;">Allow Multi HUB</th>
          </tr>
          </thead>
          <tbody>
            <?php $i=0; ?>
           @foreach($vehicle as $vehicleList)
           <?php $i++; ?>
           <tr>
            <td><a href="javascript:void(0)" onclick="ViewVehcile('{{$vehicleList->id}}')">View</a> / <a href="javascript:void(0)" onclick="EditVehicle('{{$vehicleList->id}}')">Edit</a></td>
            <td>{{$i}}</td>
            <td>{{$vehicleList->officeDetails->OfficeCode}} ~ {{$vehicleList->officeDetails->OfficeName}}</td>
            <td>{{$vehicleList->ReportingTime}}</td>
            <td>{{$vehicleList->Owner}}</td>
            <td>{{$vehicleList->VehiclePurpose}}</td>
            <td>{{$vehicleList->TariffType}}</td>
            <td>{{$vehicleList->MonthRent}}</td>
            <td>{{$vehicleList->MonthlyFixKm}}</td>
            
            <td>{{$vehicleList->AdditionalPerKmRate}}</td>
            <td>{{$vehicleList->PerHRRate}}</td>
            <td>{{$vehicleList->PlacementType}}</td>
            <td>{{$vehicleList->Rentwef}}</td>
            <td>{{$vehicleList->VendorDetails->VendorCode}} ~ {{$vehicleList->VendorDetails->VendorName}}</td>
            <td>{{$vehicleList->VehicleTypeDetails->VehicleType}}</td>
            <td>{{$vehicleList->VehicleNo}}</td>
            <td>{{$vehicleList->ChasisNo}}</td>
            <td>{{$vehicleList->EngineNo}}</td>
            <td>{{$vehicleList->RegistrationNo}}</td>
            <td>{{$vehicleList->RegistrationState}}</td>
            <td>{{$vehicleList->TypeOfRegistration}}</td>
            <td>{{$vehicleList->InsuranceValidity}}</td>
            <td>{{$vehicleList->InsuredAmount}}</td>
            <td>{{$vehicleList->InsuranceCompany}}</td>
            <td>{{$vehicleList->YearofMfg}}</td>
            <td>{{$vehicleList->NosOfDrivers}}</td>
            <td>{{$vehicleList->FuelType}}</td>
            <td>{{$vehicleList->FitnessValidity}}</td>
            <td>{{$vehicleList->VehiclePermit}}</td>
            <td>{{$vehicleList->IsGps}}</td>
            <td>{{$vehicleList->GPSDeviceID}}</td>
            <td>{{$vehicleList->VehicleAvailability}}</td>
            <td>{{$vehicleList->Month}}</td>
            <td>{{$vehicleList->AllowMultiHUB}}</td>
          </tr>
           @endforeach
        </tbody>
        </table>
       </div>
</form>
        <div class="d-flex d-flex justify-content-between">
       
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
</div>
</div>
                   </div> 
<script>$('.selectBox').select2();</script>
<script>

    $('.datepickerOne').datepicker({
    format: 'yyyy-mm-dd',
    autoclose:true
});
  function AddVehicle()
  {
     if($('#Reportinghub').val()=='')
     {
        alert('Please select Reporting Hub');
        return false;
     }
     if($('#ReportingTime').val()=='')
     {
        alert('Please Enter Reporting Time');
        return false;
     }
     if($('#VendorName').val()=='')
     {
        alert('Please Select Vendor Name');
        return false;
     }
     if($('#VehicleModel').val()=='')
     {
        alert('Please Select Vehicle Model');
        return false;
     }
     if($('#VehicleNo').val()=='')
     {
        alert('Please Enter Vehicle No');
        return false;
     }
     if($('#ChasisNo').val()=='')
     {
        alert('Please Enter Chasis No');
        return false;
     }
     if($('#EngineNo').val()=='')
     {
        alert('Please Enter Engine No');
        return false;
     }
     if($('#RegistrationNo').val()=='')
     {
        alert('Please Enter Registration No');
        return false;
     }
     if($('#RegistrationState').val()=='')
     {
        alert('Please Enter Registration State');
        return false;
     }
     var Reportinghub=$('#Reportinghub').val();
     var id=$('#vid').val();
     var ReportingTime=$('#ReportingTime').val();
     var Owner=$('#Owner').val();
     var TariffType=$('#TariffType').val();
     var MonthRent=$('#MonthRent').val();
     var Rentwef=$('#Rentwef').val();
     var MonthlyFixKm=$('#MonthlyFixKm').val();
     var AdditionalPerKmRate=$('#AdditionalPerKmRate').val();
     var PerHRRate=$('#PerHRRate').val();
     var PlacementType=$('#PlacementType').val();
     var VendorName=$('#VendorName').val();
     var VehicleModel=$('#VehicleModel').val();
     var VehicleNo=$('#VehicleNo').val();
     var ChasisNo=$('#ChasisNo').val();
     var EngineNo=$('#EngineNo').val();
     var RegistrationNo=$('#RegistrationNo').val();
     var RegistrationState=$('#RegistrationState').val();
     var TypeOfRegistration=$('#TypeOfRegistration').val();
     var InsuranceValidity=$('#InsuranceValidity').val();
     var InsuredAmount=$('#InsuredAmount').val();
     var InsuranceCompany=$('#InsuranceCompany').val();
     var YearofMfg=$('#YearofMfg').val();
     var NosOfDrivers=$('#NosOfDrivers').val();
     var FuelType=$('#FuelType').val();
     var FitnessValidity=$('#FitnessValidity').val();
     var VehiclePermit=$('#VehiclePermit').val();
     var IsGps=$('#IsGps').val();
     var GPSDeviceID=$('#GPSDeviceID').val();
     var VehiclePurpose=$('#VehiclePurpose').val();
     var arr = [];
     var i = 0;
     $('.checkboxValue:checked').each(function () {
           arr[i++] = $(this).val();
       });
     
      var AllowMultiHUB = $("input[name=AllowMultiHUB]:checked").val();

      var VehicleAvailability=$('#VehicleAvailability').val();
       var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddVehicle',
       cache: false,
       data: {
           'Reportinghub':Reportinghub,'ReportingTime':ReportingTime,'Owner':Owner,'TariffType':TariffType,'MonthRent':MonthRent,'Rentwef':Rentwef,'MonthlyFixKm':MonthlyFixKm,'AdditionalPerKmRate':AdditionalPerKmRate,'PerHRRate':PerHRRate,'PlacementType':PlacementType
           ,'VendorName':VendorName,'VehicleModel':VehicleModel,'VehicleNo':VehicleNo,'ChasisNo':ChasisNo,'EngineNo':EngineNo,'RegistrationNo':RegistrationNo,'RegistrationState':RegistrationState,'TypeOfRegistration':TypeOfRegistration,'InsuranceValidity':InsuranceValidity,'InsuredAmount':InsuredAmount
           ,'InsuranceCompany':InsuranceCompany,'YearofMfg':YearofMfg,'NosOfDrivers':NosOfDrivers,'FuelType':FuelType,'FitnessValidity':FitnessValidity,'VehiclePermit':VehiclePermit,'IsGps':IsGps,'GPSDeviceID':GPSDeviceID,'Month':arr,'AllowMultiHUB':AllowMultiHUB,'VehicleAvailability':VehicleAvailability,'VehiclePurpose':VehiclePurpose,'vid':id
             },
           success: function(data) {
           location.reload();
       }
     });
  }
  function ViewVehcile(id) 
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/getVehicleDetails',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     
     $('.Reportinghub').val(obj.Reportinghub).trigger('change');
     $('.Reportinghub').attr('disabled', true);
     $('.ReportingTime').val(obj.ReportingTime);
     $('.ReportingTime').attr('readonly', true);
     $('.Owner').val(obj.Owner).trigger('change');
     $('.Owner').attr('disabled', true);
     $('.VehiclePurpose').val(obj.VehiclePurpose).trigger('change');
     $('.VehiclePurpose').attr('disabled', true);
     $('.VendorName').val(obj.VendorName).trigger('change');
     $('.VendorName').attr('disabled', true);
     $('.TariffType').val(obj.TariffType).trigger('change');
     $('.TariffType').attr('disabled', true);
     $('.PlacementType').val(obj.PlacementType).trigger('change');
     $('.PlacementType').attr('disabled', true);
     $('.VehicleModel').val(obj.VehicleModel).trigger('change');
     $('.VehicleModel').attr('disabled', true);
     $('.MonthRent').val(obj.MonthRent);
     $('.MonthRent').attr('readonly', true);
     $('.Rentwef').val(obj.Rentwef);
     $('.Rentwef').attr('readonly', true);
     $('.MonthlyFixKm').val(obj.MonthlyFixKm);
     $('.MonthlyFixKm').attr('readonly', true);
     $('.AdditionalPerKmRate').val(obj.AdditionalPerKmRate);
     $('.AdditionalPerKmRate').attr('readonly', true);
     $('.PerHRRate').val(obj.PerHRRate);
     $('.PerHRRate').attr('readonly', true);
     $('.VehicleNo').val(obj.VehicleNo);
     $('.VehicleNo').attr('readonly', true);
     $('.ChasisNo').val(obj.ChasisNo);
     $('.ChasisNo').attr('readonly', true);
     $('.EngineNo').val(obj.EngineNo);
     $('.EngineNo').attr('readonly', true);
     $('.RegistrationNo').val(obj.RegistrationNo);
     $('.RegistrationNo').attr('readonly', true);
     $('.RegistrationState').val(obj.RegistrationState);
     $('.RegistrationState').attr('readonly', true);
     $('.TypeOfRegistration').val(obj.TypeOfRegistration).trigger('change');
     $('.TypeOfRegistration').attr('disabled', true);
     $('.InsuranceValidity').val(obj.InsuranceValidity);
     $('.InsuranceValidity').attr('readonly', true);
     $('.InsuredAmount').val(obj.InsuredAmount);
     $('.InsuredAmount').attr('readonly', true);
     $('.InsuranceCompany').val(obj.InsuranceCompany);
     $('.InsuranceCompany').attr('readonly', true);
     $('.YearofMfg').val(obj.YearofMfg);
     $('.YearofMfg').attr('readonly', true);
     $('.NosOfDrivers').val(obj.NosOfDrivers);
     $('.NosOfDrivers').attr('readonly', true);
     $('.FitnessValidity').val(obj.FitnessValidity);
     $('.FitnessValidity').attr('readonly', true);
     $('.GPSDeviceID').val(obj.GPSDeviceID);
     $('.GPSDeviceID').attr('readonly', true);
     $('.FuelType').val(obj.FuelType).trigger('change');
     $('.FuelType').attr('disabled', true);
     $('.VehiclePermit').val(obj.VehiclePermit).trigger('change');
     $('.VehiclePermit').attr('disabled', true);
     $('.IsGps').val(obj.IsGps).trigger('change');
     $('.IsGps').attr('disabled', true);
     $('.VehicleAvailability').val(obj.VehicleAvailability).trigger('change');
     $('.VehicleAvailability').attr('disabled', true);
     if (obj.AllowMultiHUB == 'YES')
      {
        $('.AllowMultiHUB').prop('checked', true);
    } else {
        $('.AllowMultiHUB').prop('checked', false);
    }
    $('.AllowMultiHUB').attr('disabled', true);
    var strArray=obj.Month.split(' , ');
    for(var i = 0; i < strArray.length; i++){
        console.log(strArray[i]);
       if(strArray[i]=="JAN")
       {
        $('#JAN').prop('checked', true);
       }
       $('#JAN').attr('disabled', true);
       if(strArray[i]=="FEB")
       {
        $('#FEB').prop('checked', true);
       }
       $('#FEB').attr('disabled', true); 
       if(strArray[i]=="MAR")
       {
        $('#MAR').prop('checked', true);
       }
        $('#MAR').attr('disabled', true); 
        if(strArray[i]=="APR")
       {
        $('#APR').prop('checked', true);
       }
        $('#APR').attr('disabled', true); 
        if(strArray[i]=="MAY")
       {
        $('#MAY').prop('checked', true);
       }
        $('#MAY').attr('disabled', true); 
        if(strArray[i]=="JUN")
       {
        $('#JUN').prop('checked', true);
       }
        $('#JUN').attr('disabled', true); 
        if(strArray[i]=="JUL")
       {
        $('#JUL').prop('checked', true);
       }
        $('#JUL').attr('disabled', true); 
        if(strArray[i]=="AUG")
       {
        $('#AUG').prop('checked', true);
       }
        $('#AUG').attr('disabled', true); 
        if(strArray[i]=="SEP")
       {
        $('#SEP').prop('checked', true);
       }
        $('#SEP').attr('disabled', true); 
        if(strArray[i]=="OCT")
       {
        $('#OCT').prop('checked', true);
       }
        $('#OCT').attr('disabled', true); 
        if(strArray[i]=="NOV")
       {
        $('#NOV').prop('checked', true);
       }
        $('#NOV').attr('disabled', true); 
        if(strArray[i]=="DEC")
       {
        $('#DEC').prop('checked', true);
       }
        $('#DEC').attr('disabled', true); 
      
        
        
        }
    }
    });
   
  }
  function EditVehicle(id)
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/getVehicleDetails',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.vid').val(obj.id)
     $('.Reportinghub').val(obj.Reportinghub).trigger('change');
     $('.Reportinghub').attr('disabled', false);
     $('.ReportingTime').val(obj.ReportingTime);
     $('.ReportingTime').attr('readonly', false);
     $('.Owner').val(obj.Owner).trigger('change');
     $('.Owner').attr('disabled', false);
     $('.VehiclePurpose').val(obj.VehiclePurpose).trigger('change');
     $('.VehiclePurpose').attr('disabled', false);
     $('.VendorName').val(obj.VendorName).trigger('change');
     $('.VendorName').attr('disabled', false);
     $('.TariffType').val(obj.TariffType).trigger('change');
     $('.TariffType').attr('disabled', false);
     $('.PlacementType').val(obj.PlacementType).trigger('change');
     $('.PlacementType').attr('disabled', false);
     $('.VehicleModel').val(obj.VehicleModel).trigger('change');
     $('.VehicleModel').attr('disabled', false);
     $('.MonthRent').val(obj.MonthRent);
     $('.MonthRent').attr('readonly', false);
     $('.Rentwef').val(obj.Rentwef);
     $('.Rentwef').attr('readonly', false);
     $('.MonthlyFixKm').val(obj.MonthlyFixKm);
     $('.MonthlyFixKm').attr('readonly', false);
     $('.AdditionalPerKmRate').val(obj.AdditionalPerKmRate);
     $('.AdditionalPerKmRate').attr('readonly', false);
     $('.PerHRRate').val(obj.PerHRRate);
     $('.PerHRRate').attr('readonly', false);
     $('.VehicleNo').val(obj.VehicleNo);
     $('.VehicleNo').attr('readonly', false);
     $('.ChasisNo').val(obj.ChasisNo);
     $('.ChasisNo').attr('readonly', false);
     $('.EngineNo').val(obj.EngineNo);
     $('.EngineNo').attr('readonly', false);
     $('.RegistrationNo').val(obj.RegistrationNo);
     $('.RegistrationNo').attr('readonly', false);
     $('.RegistrationState').val(obj.RegistrationState);
     $('.RegistrationState').attr('readonly', false);
     $('.TypeOfRegistration').val(obj.TypeOfRegistration).trigger('change');
     $('.TypeOfRegistration').attr('disabled', false);
     $('.InsuranceValidity').val(obj.InsuranceValidity);
     $('.InsuranceValidity').attr('readonly', false);
     $('.InsuredAmount').val(obj.InsuredAmount);
     $('.InsuredAmount').attr('readonly', false);
     $('.InsuranceCompany').val(obj.InsuranceCompany);
     $('.InsuranceCompany').attr('readonly', false);
     $('.YearofMfg').val(obj.YearofMfg);
     $('.YearofMfg').attr('readonly', false);
     $('.NosOfDrivers').val(obj.NosOfDrivers);
     $('.NosOfDrivers').attr('readonly', false);
     $('.FitnessValidity').val(obj.FitnessValidity);
     $('.FitnessValidity').attr('readonly', false);
     $('.GPSDeviceID').val(obj.GPSDeviceID);
     $('.GPSDeviceID').attr('readonly', false);
     $('.FuelType').val(obj.FuelType).trigger('change');
     $('.FuelType').attr('disabled', false);
     $('.VehiclePermit').val(obj.VehiclePermit).trigger('change');
     $('.VehiclePermit').attr('disabled', false);
     $('.IsGps').val(obj.IsGps).trigger('change');
     $('.IsGps').attr('disabled', false);
     $('.VehicleAvailability').val(obj.VehicleAvailability).trigger('change');
     $('.VehicleAvailability').attr('disabled', false);
     if (obj.AllowMultiHUB == 'YES')
      {
        $('.AllowMultiHUB').prop('checked', true);
    } else {
        $('.AllowMultiHUB').prop('checked', false);
    }
    $('.AllowMultiHUB').attr('disabled', false);
    var strArray=obj.Month.split(' , ');
    for(var i = 0; i < strArray.length; i++){
        console.log(strArray[i]);
       if(strArray[i]=="JAN")
       {
        $('#JAN').prop('checked', true);
       }
       $('#JAN').attr('disabled', false);
       if(strArray[i]=="FEB")
       {
        $('#FEB').prop('checked', true);
       }
       $('#FEB').attr('disabled', false); 
       if(strArray[i]=="MAR")
       {
        $('#MAR').prop('checked', true);
       }
        $('#MAR').attr('disabled', false); 
        if(strArray[i]=="APR")
       {
        $('#APR').prop('checked', true);
       }
        $('#APR').attr('disabled', false); 
        if(strArray[i]=="MAY")
       {
        $('#MAY').prop('checked', true);
       }
        $('#MAY').attr('disabled', false); 
        if(strArray[i]=="JUN")
       {
        $('#JUN').prop('checked', true);
       }
        $('#JUN').attr('disabled', false); 
        if(strArray[i]=="JUL")
       {
        $('#JUL').prop('checked', true);
       }
        $('#JUL').attr('disabled', false); 
        if(strArray[i]=="AUG")
       {
        $('#AUG').prop('checked', true);
       }
        $('#AUG').attr('disabled', false); 
        if(strArray[i]=="SEP")
       {
        $('#SEP').prop('checked', true);
       }
        $('#SEP').attr('disabled', false); 
        if(strArray[i]=="OCT")
       {
        $('#OCT').prop('checked', true);
       }
        $('#OCT').attr('disabled', false); 
        if(strArray[i]=="NOV")
       {
        $('#NOV').prop('checked', true);
       }
        $('#NOV').attr('disabled', false); 
        if(strArray[i]=="DEC")
       {
        $('#DEC').prop('checked', true);
       }
        $('#DEC').attr('disabled', false); 
      
        
        
        }
    }
    });
  } 
</script>