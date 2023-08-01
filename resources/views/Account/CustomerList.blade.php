@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
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
                <div class="card-body customer-card-body">
                    
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Company Name</label>
                                                <div class="col-md-8">
                                                  <select name="CompanyName" tabindex="1" class="form-control CompanyName selectBox" id="CompanyName">
                                                   <option value="">--Select--</option>
                                                   <option value="1">METROPOLIS LOGISTICS PVT LTD</option>
                                                  
                                                  </select>
                                                  <input type="hidden" name="Cid"  class="form-control Cid" id="Cid">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Parent Customer</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="ModeType" tabindex="2" class="form-control ModeType" id="ModeType"> -->
                                                <select name="ParentCustomer" tabindex="2" class="form-control selectBox ParentCustomer" id="ParentCustomer">
                                                 <option value="">--select--</option>   
                                                @foreach($parentCust as $parentCustmor)
                                               
                                                @if(isset($parentCustmor->children->CustomerCode))
                                                <option value="{{$parentCustmor->children->id}}">{{$parentCustmor->children->CustomerCode}} ~ {{$parentCustmor->children->CustomerName}}</option>
                                                @endif
                                                @endforeach  
                                              </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Customer Code</label>
                                                <div class="col-md-4">
                                                  <input type="text" name="CustomerCode" tabindex="3" class="form-control CustomerCode" id="CustomerCode">	
                                                </div>
                                                <div class="col-md-4"><strong>(If blank Auto Generate)</strong></div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Customer Name<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="VendorName" tabindex="4" class="form-control CustomerName" id="CustomerName">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">GST Registered Name<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                   <input type="text" name="GSTName" tabindex="5" class="form-control GSTName" id="GSTName">
                                                  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">GST No</label>
                                                <div class="col-md-8">
                                                <input type="text" name="GSTNo" tabindex="6" class="form-control GSTNo" id="GSTNo">
                                                 </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">PAN No</label>
                                                <div class="col-md-8">
                                                <input type="text" name="PANNo" tabindex="7" class="form-control PANNo" id="PANNo">
                                                
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Tin No</label>
                                                <div class="col-md-8">
                                                <input type="text" name="TinNo" tabindex="8" class="form-control TinNo" id="TinNo">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Bill At</label>
                                                <div class="col-md-8">
                                                <select name="BillAt" tabindex="9" class="form-control BillAt selectBox" id="BillAt">
                                                 <option selected="selected" value="ORIGIN">ORIGIN</option>
	                                             <option value="DESTINATION">DESTINATION</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Billing Cycle</label>
                                                <div class="col-md-8">
                                                <select name="BillingCycle" tabindex="10" class="form-control BillingCycle selectBox" id="BillingCycle">
                                                 <option selected="selected" value="WAY BILL WISE BILLING">WAY BILL WISE BILLING</option>
	                                             <option value="DAILY">DAILY</option>
                                                 <option value="WEEKLY">WEEKLY</option>
                                                 <option value="FORTNIGHTLY">FORTNIGHTLY</option>
                                                 <option value="MONTHLY">MONTHLY</option>
                                                  </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">CutOff Time</label>
                                                <div class="col-md-8">
                                                <input type="time" name="CutOffTime" tabindex="11" class="form-control CutOffTime" id="CutOffTime">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Allow All India Access</label>
                                                <div class="col-md-8 mt-1">
                                                <input type="checkbox" name="IndiaAccess" tabindex="12" class="IndiaAccess" id="IndiaAccess">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Allow Virtual Number From Customer Portal Pickup Request</label>
                                                <div class="col-md-8 mt-1">
                                                <input type="checkbox" name="VirtualNumber" tabindex="13" class="VirtualNumber" id="VirtualNumber">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Load Image Required</label>
                                                <div class="col-md-8 mt-1">
                                                <input type="checkbox" name="LoadImage" tabindex="14" class="LoadImage" id="LoadImage">	
                                                </div>
                                            </div>
                                           </div>

                                          </div>
                                          </div>
                                        </div> <!-- end col -->
                                        
                                   </div>
                           </div>
                   </div>
                           
            <div class="card">
                <div class="card-body customer-card-body">
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row ">
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">CRM Executive</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="CRMExecutive" tabindex="15" class="form-control CRMExecutive" id="CRMExecutive">	 -->
                                                  <select  name="CRMExecutive" tabindex="15" class="form-control CRMExecutive selectBox" id="CRMExecutive">
                                                  <option value="">--Select-- </option>
                                                   @foreach($Employee as $key)
                                                    <option value="{{$key->id}}">{{$key->EmployeeCode}} ~{{$key->EmployeeName}} </option>
                                                   @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Billing Person</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="BillingPerson" tabindex="16" class="form-control BillingPerson" id="BillingPerson">	 -->
                                                <select  name="BillingPerson" tabindex="16" class="form-control BillingPerson selectBox" id="BillingPerson">
                                                  <option value="">--Select-- </option>
                                                   @foreach($Employee as $key)
                                                    <option value="{{$key->id}}">{{$key->EmployeeCode}} ~{{$key->EmployeeName}} </option>
                                                   @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Reference By (Sales Person)</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="ReferenceBy" tabindex="17" class="form-control ReferenceBy" id="ReferenceBy">	 -->
                                                  <select  name="ReferenceBy" tabindex="17" class="form-control ReferenceBy selectBox" id="ReferenceBy">
                                                  <option value="">--Select-- </option>
                                                   @foreach($Employee as $key)
                                                    <option value="{{$key->id}}">{{$key->EmployeeCode}} ~{{$key->EmployeeName}} </option>
                                                   @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Billing on Date</label>
                                                <div class="col-md-8">
                                                
                                                  <select  name="BillingOnDate" tabindex="17" class="form-control BillingOnDate selectBox" id="BillingOnDate">
                                                  
                                                    <option value="Booking">Booking  </option>
                                                    <option value="Delivery">Delivery  </option>
                                                  </select>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">ODA PINCODE Apply On</label>
                                                <div class="col-md-8">
                                                  <select  name="ODAPinCode" tabindex="17" class="form-control ODAPinCode selectBox" id="ODAPinCode">
                                                    <option value="None">None </option>
                                                    <option value="GENERAL PINCODE">GENERAL PINCODE  </option>
                                                    <option value="CUSTOMER WISE PINCODE">CUSTOMER WISE PINCODE  </option>
                                                    <option value="MATRIX">MATRIX  </option>
                                                  </select>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                          </div>
                                          </div> <!-- end col -->
                                   </div>
                                 </div>
                               </div>
                               <div class="card">
                               <div class="card-body">
                             <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Customer Category</label>
                                                <div class="col-md-8">
                                                <select name="CustomerCategory" tabindex="18" class="form-control CustomerCategory selectBox" id="CustomerCategory">
                                                 <option selected="selected" value="COMPANY CUSTOMER">COMPANY CUSTOMER</option>
	                                             <option value="CO-COURIER">CO-COURIER</option>
                                                </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Credit Limit</label>
                                                <div class="col-md-8">
                                                <input type="text" name="CreditLimit" tabindex="19" class="form-control CreditLimit" id="CreditLimit">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Security Deposit Amount</label>
                                                <div class="col-md-8">
                                                  <input type="text" name="DepositAmount" tabindex="20" class="form-control DepositAmount" id="DepositAmount">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Deposit By</label>
                                                <div class="col-md-8">
                                                <select name="DepositBy" tabindex="21" class="form-control DepositBy selectBox" id="DepositBy">
                                                <option  value="">--select--</option> 
                                                <option  value="CASH">CASH</option>
	                                             <option value="CHEQUE">CHEQUE</option>
                                                </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Discount</label>
                                                <div class="col-md-2">
                                                  <input type="text" name="Discount" tabindex="22" class="form-control Discount" id="Discount">	
                                                  </div>
                                                <label class="col-md-1 col-form-label" for="userName">%</label>
                                                <label class="col-md-2 col-form-label" for="userName">TDS  &nbsp; %</label>
                                               <div class="col-md-2">
                                                <input type="text" name="TDS" tabindex="23" class="form-control TDS" id="TDS">	
                                               </div>
                                             </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Bill Submission</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="FCM" tabindex="6" class="form-control FCM" id="FCM"> -->
                                                 <select name="BillSubmission" tabindex="24" class="form-control BillSubmission selectBox" id="BillSubmission">
                                                 <option  value="">--select--</option>
                                                 <option  value="MANUAL">MANUAL</option>
	                                             <option value="DIGITAL">DIGITAL</option>
                                                  </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Customer Type</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="FCM" tabindex="6" class="form-control FCM" id="FCM"> -->
                                                 <select name="CustomerType" tabindex="25" class="form-control CustomerType selectBox" id="CustomerType">
                                                 <option  value="FCM">--select--</option>
                                                 <option  value="OUTBOUND">OUTBOUND</option>
	                                             <option value="INBOUND">INBOUND</option>
                                                  </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Service Type</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="FCM" tabindex="6" class="form-control FCM" id="FCM"> -->
                                                 <select name="ServiceType" tabindex="26" class="form-control ServiceType selectBox" id="ServiceType">
                                                 <option  value="">--select--</option>
                                                 <option  value="DOOR TO DOOR">DOOR TO DOOR</option>
	                                             <option value="HUB TO DOOR">HUB TO DOOR</option>
                                                 <option value="DOOR TO HUB">DOOR TO HUB</option>
                                                 <option value="HUB TO HUB">HUB TO HUB</option>
                                                  </select>	
                                                </div>
                                            </div>
                                           </div>


                                            </div>
                                          </div>
                                          </div> <!-- end col -->
                                   </div>
                                 </div>
                               </div>
                               <div class="card">
                               <div class="card-body customer-card-body">
                             <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Payment Mode</label>
                                                <div class="col-md-8">
                                                <select name="PaymentMode" tabindex="27" class="form-control PaymentMode selectBox" id="PaymentMode">
                                                 <option  value="">--select--</option>
                                                 <option  value="CREDIT">CREDIT</option>
	                                             <option value="CASH">CASH</option>
                                                 
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Credit Period</label>
                                                <div class="col-md-2">
                                                  <input type="text" name="CreditPeriod" tabindex="28" class="form-control CreditPeriod" id="CreditPeriod">	
                                                  </div>
                                                <label class="col-md-2 col-form-label" for="userName" style="margin-left: -17px;">(In Days)</label>
                                                <label class="col-md-3 col-form-label" for="userName" style="margin-left: -17px;">Allow Round Off</label>
                                               <div class="col-md-1 mt-1" style="margin-left: -14px;">
                                                <input type="checkbox" name="AllowRoundOff" tabindex="29"  class="AllowRoundOff" id="AllowRoundOff">	
                                               </div>
                                             </div>
                                            </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Tariff Type</label>
                                                <div class="col-md-8">
                                                <select name="TariffType" tabindex="30" class="form-control TariffType selectBox" id="TariffType">
                                                 <option  value="">--select--</option>
                                                 <option  value="SLAB TARIFF">SLAB TARIFF</option>
	                                             <option value="TAT TARIFF">TAT TARIFF</option>

                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Include Flights in Bill</label>
                                                <div class="col-md-8 mt-1">
                                                  <input type="checkbox" name="IncludeFlights" tabindex="31" class="IncludeFlights" id="IncludeFlights">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Apply TAT Product</label>
                                                <div class="col-md-1 mt-1">
                                                  <input type="checkbox" name="ApplyTAT" tabindex="30" class="ApplyTAT" id="ApplyTAT">	
                                                  </div>
                                               <label class="col-md-2 col-form-label" for="userName">Auto MIS</label>
                                               <div class="col-md-1 mt-1">
                                                <input type="checkbox" name="AutoMIS" tabindex="31" class="AutoMIS" id="AutoMIS">	
                                               </div>
                                               <label class="col-md-2 col-form-label" for="userName">POD</label>
                                               <div class="col-md-2 mt-1">
                                                <input type="checkbox" name="POD" tabindex="32" class="POD" id="POD">	
                                               </div>
                                             </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Ignore Pickup Day From TAT</label>
                                                <div class="col-md-1 mt-1">
                                                  <input type="checkbox" name="IgnorePicku" tabindex="33" class="IgnorePicku" id="IgnorePicku">	
                                                  </div>
                                               <label class="col-md-4 col-form-label" for="userName">Ignore Delivery Day From TAT</label>
                                               <div class="col-md-2 mt-1">
                                                <input type="checkbox" name="IgnoreDelivery" tabindex="34" class="IgnoreDelivery" id="IgnoreDelivery">	
                                               </div>
                                               
                                             </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Invoice Format</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="FCM" tabindex="6" class="form-control FCM" id="FCM"> -->
                                                 <select name="InvoiceFormat" tabindex="35" class="form-control InvoiceFormat selectBox" id="InvoiceFormat">
                                                 <option selected="selected" value="GENERAL">GENERAL</option>
	                                             <option value="PO">PO</option>
                                                 <option value="SHIPMENT">SHIPMENT</option>
                                                  </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">SMS On Billing</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="FCM" tabindex="6" class="form-control FCM" id="FCM"> -->
                                                <input type="checkbox" name="SMSOnBilling" tabindex="36" class="SMSOnBilling" id="SMSOnBilling">	
                                                </div>
                                            </div>
                                           </div>
                                            </div>
                                          </div>
                                          </div> <!-- end col -->
                                     </div>
                                 </div>
                               </div>
                               <div class="card">
                               <div class="card-body customer-card-body">
                             <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">RCM/Exempted</label>
                                                <div class="col-md-8">
                                                <select name="RCM" tabindex="37" class="form-control RCM selectBox" id="RCM">
                                                 <option  value="">--select--</option>
	                                             <option value="RCM">RCM</option>
                                                 <option value="EXEMPTED">EXEMPTED</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                          
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">RCM/Exempted Remarks</label>
                                                <div class="col-md-8">
                                                  <input type="text" name="RCMExempted" tabindex="38" class="form-control RCMExempted" id="RCMExempted">	
                                                </div>
                                            </div>
                                            </div>
                                           
                                            <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-2 col-form-label" for="userName">GST Applicable</label>
                                                <div class="col-md-10 w-70 d-flex justify-content-between align-items-center">
                                                  <input type="checkbox" name="GSTApp" tabindex="39" class="GSTApp" id="GSTApp">	 <label class=" col-form-label" for="userName">GST % </label>
                                                  
                                              
                                               <label class="col-form-label" for="userName"> Air</label>
                                               <div>
                                                <input type="text" name="Air" tabindex="40" class="form-control Air" id="Air">	
                                               </div>

                                                <label class="col-form-label" for="userName">Road</label>
                                                <div>
                                                  <input type="text" name="Road" tabindex="41" class="form-control Road" id="Road"> 
                                                  </div>
                                               <label class="col-form-label" for="userName">Train</label>
                                             
                                               <div>
                                                <input type="text" name="Train" tabindex="42" class=" form-control Train" id="Train">   
                                               </div>
                                               <label class="col-form-label" for="userName">Water</label>
                                                <div>
                                                  <input type="text" name="Water" tabindex="43" class="form-control Water" id="Water">  
                                                  </div>
                                               <label class="col-form-label" for="userName">GST Inclusive</label>
                                             
                                               <div>
                                                <input type="checkbox" name="GSTInclusive" tabindex="44" class="GSTInclusive" id="GSTInclusive">    
                                               </div>

                                               </div>
                                             
                                             </div>
                                            </div>
                                            
                                               
                                             
                                            
                                          
                                            
                                           
                                           
                                           
                                            </div>
                                          </div>
                                          </div> <!-- end col -->
                                     </div>
                                 </div>
                               </div>
            <div class="card">
                <div class="card-body customer-card-body">
                  
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Address1</label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="45" name="Address1" class="form-control Address1" id="Address1">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">State</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="State" tabindex="46" class="form-control State" id="State">   -->
                                                <select onchange="getAllCity(this.value);" name="State" tabindex="46" class="form-control State selectBox" id="State">
                                                    <option value="">--Select--</option>
                                                    @foreach($State as $key)
                                                    <option value="{{$key->id}}">{{$key->name}}</option>
                                                    @endforeach
                                                </select>
                                                
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Address2</label>
                                                <div class="col-md-8">
                                                <input type="text" name="Address2" tabindex="47" class="form-control Address2" id="Address2">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">City</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="City" tabindex="48" class="form-control City" id="City">   -->
                                                <select onchange="getAllPincode(this.value);" name="City" tabindex="48" class="form-control City selectBox" id="City">
                                                <option value="">--Select--</option>
                                                </select>
                                                </div>
                                            </div>
                                           </div>
                                           
                                         
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Pincode</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="Pincode" tabindex="49" class="form-control Pincode" id="Pincode">   -->
                                                <select  name="Pincode" tabindex="49" class="form-control Pincode selectBox" id="Pincode">
                                                <option value="">--Select--</option>
                                                </select>
                                                </div>
                                            </div>
                                           </div>

                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Mode</label>
                                                <div class="col-md-8">
                                                <select  name="Mode" tabindex="49" class="form-control Mode selectBox" id="Mode">
                                                <option value="">--Select--</option>
                                                @foreach($BKM as $key)
                                                    <option value="{{$key->id}}"> {{$key->Mode}}</option>
                                                @endforeach
                                                </select>
                                                </div>
                                            </div>
                                           </div>

                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Office</label>
                                                <div class="col-md-8">
                                                <select  name="Office" tabindex="49" class="form-control Office selectBox" id="Office">
                                                <option value="">--Select--</option>
                                                @foreach($office as $key)
                                                    <option value="{{$key->id}}">{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                @endforeach
                                                </select>
                                                </div>
                                            </div>
                                           </div>
                                         
                                         
                                           <div class="col-md-6 m-b-1">
                                           <div class="row mt-1">
                                           <label class="col-md-4 col-form-label" for="password">Active</label>
                                           <div class="col-md-2">
                                                <input type="checkbox" name="Active" tabindex="50" class="Active" id="Active">	
                                               </div>
                                               <div class="col-md-6 text-end">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddCustomer()" tabindex="51">
                                               <a href="{{url('CustomerMaster')}}" class="btn btn-primary" tabindex="52">Cancel</a>
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
                        <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
<div class="card-body customer-card-body">
<div class="tab-content">
  <div class="tab-pane show active" id="input-types-preview">
      <div class="row pl-pr mt-1">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="53">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="54">Submit</button>
                          </div> 
                    </form>
            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
          <th style="min-width:130px;" class="p-1">ACTION</th>
          <th style="min-width:20px;" class="p-1">SL#</th>
          <th style="min-width:220px;" class="p-1">Company Name</th>
          <th style="min-width:180px;" class="p-1">Parent Customer</th>
          <th style="min-width:130px;" class="p-1">Customer Code</th>
          <th style="min-width:130px;" class="p-1">Customer Name</th>
          <th style="min-width:170px;" class="p-1">GST Registered Name</th>
          <th style="min-width:130px;" class="p-1">GST No</th>
          <th style="min-width:130px;" class="p-1">PAN No</th>
          <th style="min-width:130px;" class="p-1">Tin No</th>
          <th style="min-width:130px;" class="p-1">Bill At</th>
         <th style="min-width:130px;" class="p-1">Billing Cycle</th>
          <th style="min-width:130px;" class="p-1">CutOff Time</th>
          <th style="min-width:160px;" class="p-1">Allow All India Access</th>
          <th style="min-width:130px;" class="p-1">Allow Virtual Number</th>
          <th style="min-width:130px;" class="p-1">Load Image Required</th>
          <th style="min-width:150px;" class="p-1">CRM Executive</th>
          <th style="min-width:130px;" class="p-1">Billing Person</th>
          <th style="min-width:130px;" class="p-1">Reference By</th>
          <th style="min-width:130px;" class="p-1">Billing On Date </th>
          <th style="min-width:130px;" class="p-1">ODA Pin Code </th>
        
          <th style="min-width:130px;" class="p-1">Customer Category</th>
          <th style="min-width:130px;" class="p-1">Credit Limit</th>
          <th style="min-width:130px;" class="p-1">Security Deposit Amount</th>
          <th style="min-width:130px;" class="p-1">Deposit By</th>
          <th style="min-width:130px;" class="p-1">Opening Balance</th>
          <th style="min-width:130px;" class="p-1">Opening Date</th>
          <th style="min-width:130px;" class="p-1">Discount</th>
          <th style="min-width:130px;" class="p-1">TDS Percentage</th>
          <th style="min-width:130px;" class="p-1">Bill Submission</th>
          <th style="min-width:130px;" class="p-1">Bill Period	</th>
          <th style="min-width:130px;" class="p-1">Customer Type</th>
          <th style="min-width:130px;" class="p-1">Service Type	</th>
          <th style="min-width:130px;" class="p-1">Payment Mode</th>
          <th style="min-width:130px;" class="p-1">Tariff Type	</th>
          <th style="min-width:130px;" class="p-1">Invoice Format	</th>
          <th style="min-width:130px;" class="p-1">SMS On Billing	</th>
          <th style="min-width:130px;" class="p-1">Allow Round Off	</th>
          <th style="min-width:130px;" class="p-1">Include Flights In Bill	</th>
          <th style="min-width:130px;" class="p-1">Apply TAT Product	</th>
          <th style="min-width:130px;" class="p-1">Auto MIS	</th>
          <th style="min-width:130px;" class="p-1">POD Image Required	</th>
          <th style="min-width:130px;" class="p-1">Ignore Pickup Day	</th>
          <th style="min-width:130px;" class="p-1">Ignore Delivery Day	</th>
          <th style="min-width:130px;" class="p-1">GST Applicable	</th>
          <th style="min-width:130px;" class="p-1">RCM_Exempted</th>
          <th style="min-width:130px;" class="p-1">RCM_Exempted Remarks		</th>
          <th style="min-width:130px;" class="p-1">GST Air</th>
          <th style="min-width:130px;" class="p-1">GST Road</th>
          <th style="min-width:130px;" class="p-1">GST Train</th>
          <th style="min-width:130px;" class="p-1">GST Water</th>
          <th style="min-width:130px;" class="p-1">GST Inclusive</th>
          <th style="min-width:130px;" class="p-1">Address1</th>
          <th style="min-width:130px;" class="p-1">Address2</th>
          <th style="min-width:130px;" class="p-1">State</th>
          <th style="min-width:130px;" class="p-1">City</th>
          <th style="min-width:130px;" class="p-1">Pincode</th>
          <th style="min-width:130px;" class="p-1">Active</th>
          <th style="min-width:130px;" class="p-1">Mode</th>
          <th style="min-width:130px;" class="p-1">Office</th>
          <th style="min-width:130px;" class="p-1">Created By</th>
          <th style="min-width:130px;" class="p-1">Created On</th>
          <th style="min-width:130px;" class="p-1">Modified By</th>
          <th style="min-width:130px;" class="p-1">Modified On</th>
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
            @foreach($CustomerMaster as $customer)
            <?php $i++; ?>
            <tr>
              <td><a href="javascript:void(0)" onclick="viewCustomer('{{$customer->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditCustomer('{{$customer->id}}')">Edit </a></td>
              <td class="p-1">{{$i}}</td>
              <td class="p-1">{{'METROPOLIS LOGISTICS PVT LTD'}}</td>
              <td class="p-1">@if(isset($customer->children->CustomerCode)){{$customer->children->CustomerCode}}~{{$customer->children->CustomerName}}@endif</td>
              <td class="p-1">{{$customer->CustomerCode}}</td>
              <td class="p-1">{{$customer->CustomerName}}</td>
              <td class="p-1">{{$customer->GSTName}}</td>
              <td class="p-1">{{$customer->GSTNo}}</td>
              <td class="p-1">{{$customer->PANNo}}</td>
              <td class="p-1">{{$customer->TinNo}}</td>
              <td class="p-1">{{$customer->BillAt}}</td>
              <td class="p-1">{{$customer->BillingCycle}}</td>
              <td class="p-1">{{$customer->CutOffTime}}</td>
              <td class="p-1">{{$customer->IndiaAccess}}</td>
              <td class="p-1">{{$customer->VirtualNumber}}</td>
              <td class="p-1">{{$customer->LoadImage}}</td>
              <td class="p-1">@if(isset($customer->CRMDetails->EmployeeName)) {{$customer->CRMDetails->EmployeeName}} @endif</td>
              <td class="p-1">@if(isset($customer->billingPersonDetails->EmployeeName)) {{$customer->billingPersonDetails->EmployeeName}}  @endif</td>
              <td class="p-1">@if(isset($customer->refereByDetails->EmployeeName)) {{$customer->refereByDetails->EmployeeName}}  @endif</td>
              <td class="p-1" >{{$customer->BillingOnDate}}</td>
              <td class="p-1">{{$customer->ODAPinCode}}</td>
              <td class="p-1" >{{$customer->CustomerCategory}}</td>
              <td class="p-1">{{$customer->CreditLimit}}</td>
              <td class="p-1">{{$customer->DepositAmount}}</td>
              <td class="p-1">{{$customer->DepositBy}}</td>
              <td class="p-1"></td>
              <td class="p-1"></td>
              <td class="p-1">{{$customer->Discount}}</td>
              <td class="p-1">{{$customer->TDS}}</td>
              <td class="p-1">{{$customer->BillSubmission}}</td>
              <td class="p-1">{{$customer->PaymentDetails->CreditPeriod}}</td>
              <td class="p-1">{{$customer->CustomerType}}</td>
              <td class="p-1">{{$customer->ServiceType}}</td>
              <td class="p-1">{{$customer->PaymentDetails->PaymentMode}}</td>
              <td class="p-1">{{$customer->PaymentDetails->TariffType}}</td>
              <td class="p-1">{{$customer->PaymentDetails->InvoiceFormat}}</td>
              <td class="p-1">{{$customer->PaymentDetails->SMSOnBilling}}</td>
              <td class="p-1">{{$customer->PaymentDetails->AllowRoundOff}}</td>
              <td class="p-1">{{$customer->PaymentDetails->IncludeFlights}}</td>
              <td class="p-1">{{$customer->PaymentDetails->ApplyTAT}}</td>
              <td class="p-1">{{$customer->PaymentDetails->AutoMIS}}</td>
              <td class="p-1">{{$customer->PaymentDetails->POD}}</td>
              <td class="p-1">{{$customer->PaymentDetails->IgnorePicku}}</td>
              <td class="p-1">{{$customer->PaymentDetails->IgnoreDelivery}}</td>
              <td class="p-1">{{$customer->PaymentDetails->GSTApp}}</td>
              <td class="p-1">{{$customer->PaymentDetails->RCM}}</td>
              <td class="p-1">{{$customer->PaymentDetails->RCMExempted}}</td>
              <td class="p-1">{{$customer->PaymentDetails->Air}}</td>
              <td class="p-1">{{$customer->PaymentDetails->Road}}</td>
              <td class="p-1">{{$customer->PaymentDetails->Train}}</td>
              <td class="p-1">{{$customer->PaymentDetails->Water}}</td>
              <td class="p-1">{{$customer->PaymentDetails->GSTInclusive}}</td>
              <td class="p-1">{{$customer->CustAddress->Address1}}</td>
              <td class="p-1">{{$customer->CustAddress->Address2}}</td>
              <td class="p-1">@isset($customer->CustAddress->statesDetails->name) {{$customer->CustAddress->statesDetails->name}} @endisset</td>
              <td class="p-1">@isset($customer->CustAddress->cityDetails->CityName)  {{$customer->CustAddress->cityDetails->CityName}} @endisset</td>
              <td class="p-1">@isset($customer->CustAddress->PINDetails->PinCode)  {{$customer->CustAddress->PINDetails->PinCode}} @endisset</td>
              <td class="p-1">{{$customer->Active}}</td>

              <td class="p-1">@isset($customer->ModeDetails->Mode) {{$customer->ModeDetails->Mode}} @endisset</td>
              <td class="p-1">@isset($customer->OfficeDetails->OfficeName) {{$customer->OfficeDetails->OfficeCode}} ~ {{$customer->OfficeDetails->OfficeName}} @endisset</td>

              <td class="p-1">@isset($customer->userData->name) {{$customer->userData->name}} @endisset</td>
              <td class="p-1">@isset($customer->created_at) {{date("d-m-Y H:i:s", strtotime($customer->created_at))}}  @endisset</td>
              <td class="p-1">@isset($customer->userUpdateData->name) {{$customer->userUpdateData->name}}  @endisset</td>
              <td class="p-1">@isset($customer->updated_at) {{date("d-m-Y H:i:s", strtotime($customer->updated_at))}} @endisset</td>


           </tr>
            @endforeach
          
        </tbody>
        </table>
       </div>
</form>
        <div class="d-flex d-flex justify-content-between">
        {{ $CustomerMaster->appends(Request::except('page'))->links() }}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
</div>
</div>
                   </div> 
 <script>$('.selectBox').select2();</script>
<script>
  function AddCustomer()
  {
     if($('#CustomerName').val()=='')
     {
        alert('Please Enter  Customer Name');
        return false;
     }
     if($('#GSTName').val()=='')
     {
        alert('Please Enter GST Name');
        return false;
     }
     
     var CompanyName=$('#CompanyName').val();
     var Cid=$('#Cid').val();
     var ParentCustomer=$('#ParentCustomer').val();
     var CustomerCode=$('#CustomerCode').val();
     var CustomerName=$('#CustomerName').val();
     var GSTName=$('#GSTName').val();
     var GSTNo=$('#GSTNo').val();
     var PANNo=$('#PANNo').val();
     var TinNo=$('#TinNo').val();
     var BillAt=$('#BillAt').val();
     var BillingCycle=$('#BillingCycle').val();
     var CutOffTime=$('#CutOffTime').val();
     var IndiaAccess = $("input[name=IndiaAccess]:checked").val();
     var VirtualNumber = $("input[name=VirtualNumber]:checked").val();
     var LoadImage = $("input[name=LoadImage]:checked").val();
     var CRMExecutive=$('#CRMExecutive').val();
     var BillingPerson=$('#BillingPerson').val();
     var ReferenceBy=$('#ReferenceBy').val();
     var CustomerCategory=$('#CustomerCategory').val();
     var CreditLimit=$('#CreditLimit').val();
     var DepositAmount=$('#DepositAmount').val();
     var DepositBy=$('#DepositBy').val();
     var Discount=$('#Discount').val();
     var TDS=$('#TDS').val();
     var BillSubmission=$('#BillSubmission').val();
     var CustomerType=$('#CustomerType').val();
     var ServiceType=$('#ServiceType').val();
     var PaymentMode=$('#PaymentMode').val();
     var CreditPeriod=$('#CreditPeriod').val();
     var AllowRoundOff = $("input[name=AllowRoundOff]:checked").val();
     var TariffType=$('#TariffType').val();
     var IncludeFlights = $("input[name=IncludeFlights]:checked").val();
     var ApplyTAT = $("input[name=ApplyTAT]:checked").val();
     var AutoMIS = $("input[name=AutoMIS]:checked").val();
     var POD = $("input[name=POD]:checked").val();
     var IgnorePicku = $("input[name=IgnorePicku]:checked").val();
     var IgnoreDelivery = $("input[name=IgnoreDelivery]:checked").val();
     var InvoiceFormat=$('#InvoiceFormat').val();
     var SMSOnBilling = $("input[name=SMSOnBilling]:checked").val();
     var RCM=$('#RCM').val();
     var RCMExempted=$('#RCMExempted').val();
     var GSTApp = $("input[name=GSTApp]:checked").val();
     var Air=$('#Air').val();
     var Road=$('#Road').val();
     var Train=$('#Train').val();
     var Water=$('#Water').val();
     var GSTInclusive = $("input[name=GSTInclusive]:checked").val();
     var Active = $("input[name=Active]:checked").val();
     var Address1=$('#Address1').val();
     var State=$('#State').val();
     var Address2=$('#Address2').val();
     var City=$('#City').val();
     var Pincode=$('#Pincode').val();
     var BillingOnDate=$('#BillingOnDate').val();
     var ODAPinCode=$('#ODAPinCode').val();
     var Mode=$('#Mode').val();
     var Office=$('#Office').val();
     

     var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddCustomer',
       cache: false,
       data: {
           'Cid':Cid,'CompanyName':CompanyName,'TDS':TDS,'ParentCustomer':ParentCustomer,'CustomerCode':CustomerCode,'CustomerName':CustomerName,'GSTName':GSTName,'GSTNo':GSTNo,'PANNo':PANNo,'TinNo':TinNo,'BillAt':BillAt,'BillingCycle':BillingCycle,'CutOffTime':CutOffTime,'IndiaAccess':IndiaAccess,'VirtualNumber':VirtualNumber,'LoadImage':LoadImage,'CRMExecutive':CRMExecutive,'BillingPerson':BillingPerson,'ReferenceBy':ReferenceBy,'CustomerCategory':CustomerCategory,'CreditLimit':CreditLimit,'DepositAmount':DepositAmount,'DepositBy':DepositBy,'Discount':Discount,'BillSubmission':BillSubmission,'CustomerType':CustomerType,'ServiceType':ServiceType,'PaymentMode':PaymentMode,'CreditPeriod':CreditPeriod,'AllowRoundOff':AllowRoundOff,'TariffType':TariffType,'IncludeFlights':IncludeFlights,'ApplyTAT':ApplyTAT,'AutoMIS':AutoMIS,'POD':POD,'IgnorePicku':IgnorePicku,'IgnoreDelivery':IgnoreDelivery,'InvoiceFormat':InvoiceFormat,'SMSOnBilling':SMSOnBilling,'RCM':RCM,'RCMExempted':RCMExempted,'GSTApp':GSTApp,'Air':Air,'Road':Road,'Train':Train,'Water':Water,'GSTInclusive':GSTInclusive,'Address1':Address1,'State':State,'Address2':Address2,'City':City,'Pincode':Pincode,'Active':Active,
           'BillingOnDate':BillingOnDate, 'ODAPinCode':ODAPinCode,'Mode':Mode, 'Office':Office
            },
             
           success: function(data) {
            alert(data);
           location.reload();
       }
     });
  }
  function viewCustomer(id) 
  {
    
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewCustomer',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.CompanyName').val(obj.CompanyName).trigger('change');
     $('.CompanyName').attr('disabled', true);
     $('.ParentCustomer').val(obj.ParentCustomer).trigger('change');
     $('.ParentCustomer').attr('disabled', true);
     $('.CustomerCode').val(obj.CustomerCode);
     $('.CustomerCode').attr('readonly', true);
     $('.CustomerName').val(obj.CustomerName);
     $('.CustomerName').attr('readonly', true);
     $('.GSTName').val(obj.GSTName);
     $('.GSTName').attr('readonly', true);
     $('.GSTNo').val(obj.GSTNo);
     $('.GSTNo').attr('readonly', true);
     $('.PANNo').val(obj.PANNo);
     $('.PANNo').attr('readonly', true);
     $('.TinNo').val(obj.TinNo);
     $('.TinNo').attr('readonly', true);
     $('.BillAt').val(obj.BillAt).trigger('change');
     $('.BillAt').attr('disabled', true);
     $('.BillingCycle').val(obj.BillingCycle).trigger('change');
     $('.BillingCycle').attr('disabled', true);
     $('.CutOffTime').val(obj.CutOffTime);
     $('.CutOffTime').attr('readonly', true);
     if (obj.IndiaAccess == 'Yes') {
        $('.IndiaAccess').prop('checked', true);
        } else {
            $('.IndiaAccess').prop('checked', false);
        }
        $('.IndiaAccess').attr('disabled', true);
        if (obj.VirtualNumber == 'Yes') {
        $('.VirtualNumber').prop('checked', true);
        } else {
            $('.VirtualNumber').prop('checked', false);
        }
        $('.VirtualNumber').attr('disabled', true);
        if (obj.LoadImage == 'Yes') {
        $('.LoadImage').prop('checked', true);
        } else {
            $('.LoadImage').prop('checked', false);
        }
        $('.LoadImage').attr('disabled', true);
     $('.CRMExecutive').val(obj.CRMExecutive).trigger('change');
     $('.CRMExecutive').attr('disabled', true);
     $('.BillingPerson').val(obj.BillingPerson).trigger('change');
     $('.BillingPerson').attr('disabled', true);
     $('.ReferenceBy').val(obj.ReferenceBy).trigger('change');
     $('.ReferenceBy').attr('disabled', true);
     $('.CustomerCategory').val(obj.CustomerCategory).trigger('change');
     $('.CustomerCategory').attr('disabled', true);
     $('.CreditLimit').val(obj.CreditLimit);
     $('.CreditLimit').attr('readonly', true);
     $('.DepositAmount').val(obj.DepositAmount);
     $('.DepositAmount').attr('readonly', true);
     $('.DepositBy').val(obj.DepositBy).trigger('change');
     $('.DepositBy').attr('disabled', true);
     $('.Discount').val(obj.Discount);
     $('.Discount').attr('readonly', true);
     $('.TDS').val(obj.TDS);
     $('.TDS').attr('readonly', true);
     $('.BillSubmission').val(obj.BillSubmission).trigger('change');
     $('.BillSubmission').attr('disabled', true);
     $('.ServiceType').val(obj.ServiceType).trigger('change');
     $('.ServiceType').attr('disabled', true);
     $('.CustomerType').val(obj.CustomerType).trigger('change');
     $('.CustomerType').attr('disabled', true);


     
     $('.PaymentMode').val(obj.payment_details.PaymentMode).trigger('change');
     $('.PaymentMode').attr('disabled', true);
     $('.CreditPeriod').val(obj.payment_details.CreditPeriod);
     $('.CreditPeriod').attr('readonly', true);
     if (obj.payment_details.AllowRoundOff == 'Yes') {
        $('.AllowRoundOff').prop('checked', true);
        } else {
            $('.AllowRoundOff').prop('checked', false);
        }
        $('.AllowRoundOff').attr('disabled', true);
     $('.TariffType').val(obj.payment_details.TariffType).trigger('change');
     $('.TariffType').attr('disabled', true);
     if (obj.payment_details.IncludeFlights == 'Yes') {
        $('.IncludeFlights').prop('checked', true);
        } else {
            $('.IncludeFlights').prop('checked', false);
        }
        $('.IncludeFlights').attr('disabled', true);
        if (obj.payment_details.ApplyTAT == 'Yes') {
        $('.ApplyTAT').prop('checked', true);
        } else {
            $('.ApplyTAT').prop('checked', false);
        }
        $('.ApplyTAT').attr('disabled', true);
        if (obj.payment_details.POD == 'Yes') {
        $('.POD').prop('checked', true);
        } else {
            $('.POD').prop('checked', false);
        }
        $('.POD').attr('disabled', true);
        if (obj.payment_details.AutoMIS == 'Yes') {
        $('.AutoMIS').prop('checked', true);
        } else {
            $('.AutoMIS').prop('checked', false);
        }
        $('.AutoMIS').attr('disabled', true);
        if (obj.payment_details.IgnorePicku == 'Yes') {
        $('.IgnorePicku').prop('checked', true);
        } else {
            $('.IgnorePicku').prop('checked', false);
        }
        $('.IgnorePicku').attr('disabled', true);
        if (obj.payment_details.IgnoreDelivery == 'Yes') {
        $('.IgnoreDelivery').prop('checked', true);
        } else {
            $('.IgnoreDelivery').prop('checked', false);
        }
        $('.IgnoreDelivery').attr('disabled', true);
        $('.InvoiceFormat').val(obj.payment_details.InvoiceFormat).trigger('change');
        $('.InvoiceFormat').attr('disabled', true);
        if (obj.payment_details.SMSOnBilling == 'Yes') {
        $('.SMSOnBilling').prop('checked', true);
        } else {
            $('.SMSOnBilling').prop('checked', false);
        }
        $('.SMSOnBilling').attr('disabled', true);
        $('.RCM').val(obj.payment_details.RCM).trigger('change');
        $('.RCM').attr('disabled', true);
        $('.RCMExempted').val(obj.payment_details.RCMExempted);
        $('.RCMExempted').attr('readonly', true);
        if (obj.payment_details.GSTApp == 'Yes') {
        $('.GSTApp').prop('checked', true);
        } else {
            $('.GSTApp').prop('checked', false);
        }
        $('.GSTApp').attr('disabled', true);
     $('.Air').val(obj.payment_details.Air);
     $('.Air').attr('readonly', true);
     $('.Road').val(obj.payment_details.Road);
     $('.Road').attr('readonly', true);
     $('.Train').val(obj.payment_details.Train);
     $('.Train').attr('readonly', true);
     $('.Water').val(obj.payment_details.Water);
     $('.Water').attr('readonly', true);
     if (obj.payment_details.GSTInclusive == 'Yes') {
        $('.GSTInclusive').prop('checked', true);
        } else {
            $('.GSTInclusive').prop('checked', false);
        }
        $('.GSTInclusive').attr('disabled', true);

     $('.Address1').val(obj.cust_address.Address1);
     $('.Address1').attr('readonly', true);
     $('.Address2').val(obj.cust_address.Address2);
     $('.Address2').attr('readonly', true);
     $('.State').val(obj.cust_address.State).trigger('change');
     $('.State').attr('disabled', true);
        //  $('.City').val(obj.cust_address.City).trigger('change');
        getAllCity(obj.cust_address.State,obj.cust_address.City);
     $('.City').attr('disabled', true);
        // $('.Pincode').val(obj.cust_address.Pincode).trigger('change');
        getAllPincode(obj.cust_address.City,obj.cust_address.Pincode);
     $('.Pincode').attr('disabled', true);
     $('.BillingOnDate').val(obj.BillingOnDate).trigger('change');
     $('.BillingOnDate').attr('disabled', true);

     $('.ODAPinCode').val(obj.ODAPinCode).trigger('change');
     $('.ODAPinCode').attr('disabled', true);
     $('#Mode').val(obj.Mode).trigger('change');
     $('.Mode').attr('disabled', true);
     $('#Office').val(obj.office_id).trigger('change');
     $('.Office').attr('disabled', true);
     
     if (obj.Active == 'Yes') {
        $('.Active').prop('checked', true);
        } else {
            $('.Active').prop('checked', false);
        }
        $('.Active').attr('disabled', true);

    
    }
    });
  }
  function EditCustomer(id)
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewCustomer',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.Cid').val(obj.id);
     $('.CompanyName').val(obj.CompanyName).trigger('change');
     $('.CompanyName').attr('disabled', false);
     $('.ParentCustomer').val(obj.ParentCustomer).trigger('change');
     $('.ParentCustomer').attr('disabled', false);
     $('.CustomerCode').val(obj.CustomerCode);
     $('.CustomerCode').attr('readonly', false);
     $('.CustomerName').val(obj.CustomerName);
     $('.CustomerName').attr('readonly', false);
     $('.GSTName').val(obj.GSTName);
     $('.GSTName').attr('readonly', false);
     $('.GSTNo').val(obj.GSTNo);
     $('.GSTNo').attr('readonly', false);
     $('.PANNo').val(obj.PANNo);
     $('.PANNo').attr('readonly', false);
     $('.TinNo').val(obj.TinNo);
     $('.TinNo').attr('readonly', false);
     $('.BillAt').val(obj.BillAt).trigger('change');
     $('.BillAt').attr('disabled', false);
     $('.BillingCycle').val(obj.BillingCycle).trigger('change');
     $('.BillingCycle').attr('disabled', false);
     $('.CutOffTime').val(obj.CutOffTime);
     $('.CutOffTime').attr('readonly', false);
     if (obj.IndiaAccess == 'Yes') {
        $('.IndiaAccess').prop('checked', true);
        } else {
            $('.IndiaAccess').prop('checked', false);
        }
        $('.IndiaAccess').attr('disabled', false);
        if (obj.VirtualNumber == 'Yes') {
        $('.VirtualNumber').prop('checked', true);
        } else {
            $('.VirtualNumber').prop('checked', false);
        }
        $('.VirtualNumber').attr('disabled', false);
        if (obj.LoadImage == 'Yes') {
        $('.LoadImage').prop('checked', true);
        } else {
            $('.LoadImage').prop('checked', false);
        }
        $('.LoadImage').attr('disabled', false);
     $('.CRMExecutive').val(obj.CRMExecutive).trigger('change');
     $('.CRMExecutive').attr('disabled', false);
     $('.BillingPerson').val(obj.BillingPerson).trigger('change');
     $('.BillingPerson').attr('disabled', false);
     $('.ReferenceBy').val(obj.ReferenceBy).trigger('change');
     $('.ReferenceBy').attr('disabled', false);
     $('.CustomerCategory').val(obj.CustomerCategory).trigger('change');
     $('.CustomerCategory').attr('disabled', false);
     $('.CreditLimit').val(obj.CreditLimit);
     $('.CreditLimit').attr('readonly', false);
     $('.DepositAmount').val(obj.DepositAmount);
     $('.DepositAmount').attr('readonly', false);
     $('.DepositBy').val(obj.DepositBy).trigger('change');
     $('.DepositBy').attr('disabled', false);
     $('.Discount').val(obj.Discount);
     $('.Discount').attr('readonly', false);
     $('.TDS').val(obj.TDS);
     $('.TDS').attr('readonly', false);
     $('.BillSubmission').val(obj.BillSubmission).trigger('change');
     $('.BillSubmission').attr('disabled', false);
     $('.ServiceType').val(obj.ServiceType).trigger('change');
     $('.ServiceType').attr('disabled', false);
     $('.CustomerType').val(obj.CustomerType).trigger('change');
     $('.CustomerType').attr('disabled', false);


     
     $('.PaymentMode').val(obj.payment_details.PaymentMode).trigger('change');
     $('.PaymentMode').attr('disabled', false);
     $('.CreditPeriod').val(obj.payment_details.CreditPeriod);
     $('.CreditPeriod').attr('readonly', false);
     if (obj.payment_details.AllowRoundOff == 'Yes') {
        $('.AllowRoundOff').prop('checked', true);
        } else {
            $('.AllowRoundOff').prop('checked', false);
        }
        $('.AllowRoundOff').attr('disabled', false);
     $('.TariffType').val(obj.payment_details.TariffType).trigger('change');
     $('.TariffType').attr('disabled', false);
     if (obj.payment_details.IncludeFlights == 'Yes') {
        $('.IncludeFlights').prop('checked', true);
        } else {
            $('.IncludeFlights').prop('checked', false);
        }
        $('.IncludeFlights').attr('disabled', false);
        if (obj.payment_details.ApplyTAT == 'Yes') {
        $('.ApplyTAT').prop('checked', true);
        } else {
            $('.ApplyTAT').prop('checked', false);
        }
        $('.ApplyTAT').attr('disabled', false);
        if (obj.payment_details.POD == 'Yes') {
        $('.POD').prop('checked', true);
        } else {
            $('.POD').prop('checked', false);
        }
        $('.POD').attr('disabled', false);
        if (obj.payment_details.AutoMIS == 'Yes') {
        $('.AutoMIS').prop('checked', true);
        } else {
            $('.AutoMIS').prop('checked', false);
        }
        $('.AutoMIS').attr('disabled', false);
        if (obj.payment_details.IgnorePicku == 'Yes') {
        $('.IgnorePicku').prop('checked', true);
        } else {
            $('.IgnorePicku').prop('checked', false);
        }
        $('.IgnorePicku').attr('disabled', false);
        if (obj.payment_details.IgnoreDelivery == 'Yes') {
        $('.IgnoreDelivery').prop('checked', true);
        } else {
            $('.IgnoreDelivery').prop('checked', false);
        }
        $('.IgnoreDelivery').attr('disabled', false);
        $('.InvoiceFormat').val(obj.payment_details.InvoiceFormat).trigger('change');
        $('.InvoiceFormat').attr('disabled', false);
        if (obj.payment_details.SMSOnBilling == 'Yes') {
        $('.SMSOnBilling').prop('checked', true);
        } else {
            $('.SMSOnBilling').prop('checked', false);
        }
        $('.SMSOnBilling').attr('disabled', false);
        $('.RCM').val(obj.payment_details.RCM).trigger('change');
        $('.RCM').attr('disabled', false);
        $('.RCMExempted').val(obj.payment_details.RCMExempted);
        $('.RCMExempted').attr('readonly', false);
        if (obj.payment_details.GSTApp == 'Yes') {
        $('.GSTApp').prop('checked', true);
        } else {
            $('.GSTApp').prop('checked', false);
        }
        $('.GSTApp').attr('disabled', false);
     $('.Air').val(obj.payment_details.Air);
     $('.Air').attr('readonly', false);
     $('.Road').val(obj.payment_details.Road);
     $('.Road').attr('readonly', false);
     $('.Train').val(obj.payment_details.Train);
     $('.Train').attr('readonly', false);
     $('.Water').val(obj.payment_details.Water);
     $('.Water').attr('readonly', false);
     if (obj.payment_details.GSTInclusive == 'Yes') {
        $('.GSTInclusive').prop('checked', true);
        } else {
            $('.GSTInclusive').prop('checked', false);
        }
        $('.GSTInclusive').attr('disabled', false);

     $('.Address1').val(obj.cust_address.Address1);
     $('.Address1').attr('readonly', false);
     $('.Address2').val(obj.cust_address.Address2);
     $('.Address2').attr('readonly', false);
     $('.State').val(obj.cust_address.State).trigger('change');
     $('.State').attr('disabled', false);
     getAllCity(obj.cust_address.State,obj.cust_address.City);
     $('.City').attr('disabled', false);
    getAllPincode(obj.cust_address.City,obj.cust_address.Pincode);
     $('.Pincode').attr('disabled', false);

     $('.BillingOnDate').val(obj.BillingOnDate).trigger('change');
     $('.BillingOnDate').attr('disabled', false);

     $('.ODAPinCode').val(obj.ODAPinCode).trigger('change');
     $('.ODAPinCode').attr('disabled', false);
     $('#Mode').val(obj.Mode).trigger('change');
     $('.Mode').attr('disabled', false);
     $('#Office').val(obj.office_id).trigger('change');
     $('.Office').attr('disabled', false);
     if (obj.Active == 'Yes') {
        $('.Active').prop('checked', true);
        } else {
            $('.Active').prop('checked', false);
        }
        $('.Active').attr('disabled', false);

    
    }
    });
  } 

 function getAllCity(CityId,selectId=''){
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getAllCity',
       cache: false,
       data: {
           'id':CityId,'selectId':selectId
        },
             
        success: function(data){
            $("#City").html(data);
       }
     });
 }

 function getAllPincode(pinId,PinSelectId=''){
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getAllPincode',
       cache: false,
       data: {
           'id':pinId,'PinSelectId':PinSelectId
        },
        success: function(data){
            $("#Pincode").html(data);
       }
     });
 }

</script>