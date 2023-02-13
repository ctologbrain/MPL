@include('layouts.appThree')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
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
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Company Name</label>
                                                <div class="col-md-7">
                                                  <select name="CompanyName" tabindex="1" class="form-control CompanyName selectBox" id="CompanyName">
                                                   <option value="">--Select--</option>
                                                   <option value="1">METROPOLIS LOGISTICS PVT LTD</option>
                                                  
                                                  </select>
                                                  <input type="hidden" name="Cid"  class="form-control Cid" id="Cid">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Parent Customer</label>
                                                <div class="col-md-7">
                                                <!-- <input type="text" name="ModeType" tabindex="2" class="form-control ModeType" id="ModeType"> -->
                                                <select name="ParentCustomer" tabindex="2" class="form-control selectBox ParentCustomer" id="ParentCustomer">
                                                 <option value="">--select--</option>   
                                               
                                                </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Customer Code</label>
                                                <div class="col-md-7">
                                                  <input type="text" name="CustomerCode" tabindex="3" class="form-control CustomerCode" id="CustomerCode">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Customer Name<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" name="VendorName" tabindex="4" class="form-control CustomerName" id="CustomerName">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">GST Registered Name<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                   <input type="text" name="GSTName" tabindex="5" class="form-control GSTName" id="GSTName">
                                                  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">GST No</label>
                                                <div class="col-md-7">
                                                <input type="text" name="GSTNo" tabindex="6" class="form-control GSTNo" id="GSTNo">
                                                 </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">PAN No</label>
                                                <div class="col-md-7">
                                                <input type="text" name="PANNo" tabindex="7" class="form-control PANNo" id="PANNo">
                                                
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Tin No</label>
                                                <div class="col-md-7">
                                                <input type="text" name="TinNo" tabindex="8" class="form-control TinNo" id="TinNo">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Bill At</label>
                                                <div class="col-md-7">
                                                <select name="BillAt" tabindex="9" class="form-control BillAt selectBox" id="BillAt">
                                                 <option selected="selected" value="ORIGIN">ORIGIN</option>
	                                             <option value="DESTINATION">DESTINATION</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Billing Cycle</label>
                                                <div class="col-md-7">
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
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">CutOff Time</label>
                                                <div class="col-md-7">
                                                <input type="time" name="CutOffTime" tabindex="11" class="form-control CutOffTime" id="CutOffTime">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Allow All India Access</label>
                                                <div class="col-md-7">
                                                <input type="checkbox" name="IndiaAccess" tabindex="12" class="IndiaAccess" id="IndiaAccess">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-10 col-form-label" for="password">Allow Virtual Number From Customer Portal Pickup Request</label>
                                                <div class="col-md-2">
                                                <input type="checkbox" name="VirtualNumber" tabindex="13" class="VirtualNumber" id="VirtualNumber">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Load Image Required</label>
                                                <div class="col-md-7">
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
                <div class="card-body">
                    
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">CRM Executive</label>
                                                <div class="col-md-7">
                                                  <input type="text" name="CRMExecutive" tabindex="15" class="form-control CRMExecutive" id="CRMExecutive">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Billing Person</label>
                                                <div class="col-md-7">
                                                <input type="text" name="BillingPerson" tabindex="16" class="form-control BillingPerson" id="BillingPerson">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Reference By (Sales Person)</label>
                                                <div class="col-md-7">
                                                  <input type="text" name="ReferenceBy" tabindex="17" class="form-control ReferenceBy" id="ReferenceBy">	
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
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Customer Category<span
                                            class="error">*</span></label>
                                                <div class="col-md-7">
                                                <select name="CustomerCategory" tabindex="18" class="form-control CustomerCategory selectBox" id="CustomerCategory">
                                                 <option selected="selected" value="COMPANY CUSTOMER">COMPANY CUSTOMER</option>
	                                             <option value="CO-COURIER">CO-COURIER</option>
                                                </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Credit Limit</label>
                                                <div class="col-md-7">
                                                <input type="text" name="CreditLimit" tabindex="19" class="form-control CreditLimit" id="CreditLimit">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Security Deposit Amount</label>
                                                <div class="col-md-7">
                                                  <input type="text" name="DepositAmount" tabindex="20" class="form-control DepositAmount" id="DepositAmount">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Deposit By</label>
                                                <div class="col-md-7">
                                                <select name="DepositBy" tabindex="21" class="form-control DepositBy selectBox" id="DepositBy">
                                                <option  value="">--select--</option> 
                                                <option  value="CASH">CASH</option>
	                                             <option value="CHEQUE">CHEQUE</option>
                                                </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Discount</label>
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
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Bill Submission</label>
                                                <div class="col-md-7">
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
                                                <label class="col-md-5 col-form-label" for="password">Customer Type</label>
                                                <div class="col-md-7">
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
                                                <label class="col-md-5 col-form-label" for="password">Service Type</label>
                                                <div class="col-md-7">
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
                               <div class="card-body">
                             <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Payment Mode</label>
                                                <div class="col-md-7">
                                                <select name="PaymentMode" tabindex="27" class="form-control PaymentMode selectBox" id="PaymentMode">
                                                 <option  value="">--select--</option>
                                                 <option  value="CREDIT">CREDIT</option>
	                                             <option value="CASH">CASH</option>
                                                 
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Credit Period</label>
                                                <div class="col-md-2">
                                                  <input type="text" name="CreditPeriod" tabindex="28" class="form-control CreditPeriod" id="CreditPeriod">	
                                                  </div>
                                                <label class="col-md-2 col-form-label" for="userName" style="margin-left: -17px;">(In Days)</label>
                                                <label class="col-md-3 col-form-label" for="userName" style="margin-left: -17px;">Allow Round Off</label>
                                               <div class="col-md-1" style="margin-left: -14px;">
                                                <input type="checkbox" name="AllowRoundOff" tabindex="29"  class="AllowRoundOff" id="AllowRoundOff">	
                                               </div>
                                             </div>
                                            </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Tariff Type</label>
                                                <div class="col-md-7">
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
                                                <label class="col-md-5 col-form-label" for="userName">Include Flights in Bill</label>
                                                <div class="col-md-7">
                                                  <input type="checkbox" name="IncludeFlights" tabindex="31" class="IncludeFlights" id="IncludeFlights">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Apply TAT Product<span
                                            class="error">*</span></label>
                                                <div class="col-md-1">
                                                  <input type="checkbox" name="ApplyTAT" tabindex="30" class="ApplyTAT" id="ApplyTAT">	
                                                  </div>
                                               <label class="col-md-2 col-form-label" for="userName">Auto MIS</label>
                                               <div class="col-md-1">
                                                <input type="checkbox" name="AutoMIS" tabindex="31" class="AutoMIS" id="AutoMIS">	
                                               </div>
                                               <label class="col-md-2 col-form-label" for="userName">POD</label>
                                               <div class="col-md-1">
                                                <input type="checkbox" name="POD" tabindex="32" class="POD" id="POD">	
                                               </div>
                                             </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Ignore Pickup Day From TAT</label>
                                                <div class="col-md-1">
                                                  <input type="checkbox" name="IgnorePicku" tabindex="33" class="IgnorePicku" id="IgnorePicku">	
                                                  </div>
                                               <label class="col-md-5 col-form-label" for="userName">Ignore Delivery Day From TAT</label>
                                               <div class="col-md-1">
                                                <input type="checkbox" name="IgnoreDelivery" tabindex="34" class="IgnoreDelivery" id="IgnoreDelivery">	
                                               </div>
                                               
                                             </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Invoice Format</label>
                                                <div class="col-md-7">
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
                                                <label class="col-md-5 col-form-label" for="password">SMS On Billing</label>
                                                <div class="col-md-7">
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
                               <div class="card-body">
                             <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">RCM/Exempted</label>
                                                <div class="col-md-7">
                                                <select name="RCM" tabindex="37" class="form-control RCM selectBox" id="RCM">
                                                 <option  value="">--select--</option>
	                                             <option value="RCM">RCM</option>
                                                 <option value="EXEMPTED">EXEMPTED</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                          
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">RCM/Exempted Remarks</label>
                                                <div class="col-md-7">
                                                  <input type="text" name="RCMExempted" tabindex="38" class="form-control RCMExempted" id="RCMExempted">	
                                                </div>
                                            </div>
                                            </div>
                                           
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">GST Applicable</label>
                                                <div class="col-md-1">
                                                  <input type="checkbox" name="GSTApp" tabindex="39" class="GSTApp" id="GSTApp">	
                                                  </div>
                                               <label class="col-md-2 col-form-label" for="userName">GST % </label>
                                               <label class="col-md-2 col-form-label" for="userName"> Air</label>
                                               <div class="col-md-2">
                                                <input type="text" name="Air" tabindex="40" class="form-control Air" id="Air">	
                                               </div>
                                             
                                             </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Road</label>
                                                <div class="col-md-2">
                                                  <input type="text" name="Road" tabindex="41" class="form-control Road" id="Road">	
                                                  </div>
                                               <label class="col-md-3 col-form-label" for="userName">Train</label>
                                             
                                               <div class="col-md-2">
                                                <input type="text" name="Train" tabindex="42" class=" form-control Train" id="Train">	
                                               </div>
                                             
                                             </div>
                                            </div>
                                          
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Water</label>
                                                <div class="col-md-2">
                                                  <input type="text" name="Water" tabindex="43" class="form-control Water" id="Water">	
                                                  </div>
                                               <label class="col-md-3 col-form-label" for="userName">GST Inclusive</label>
                                             
                                               <div class="col-md-2">
                                                <input type="checkbox" name="GSTInclusive" tabindex="44" class="GSTInclusive" id="GSTInclusive">	
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
                                        
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Address1</label>
                                                <div class="col-md-7">
                                                <input type="text" tabindex="45" name="Address1" class="form-control Address1" id="Address1">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">State</label>
                                                <div class="col-md-7">
                                                <input type="text" name="State" tabindex="46" class="form-control State" id="State">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Address2</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Address2" tabindex="47" class="form-control Address2" id="Address2">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">City</label>
                                                <div class="col-md-7">
                                                <input type="text" name="City" tabindex="48" class="form-control City" id="City">  
                                                </div>
                                            </div>
                                           </div>
                                           
                                         
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Pincode</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Pincode" tabindex="49" class="form-control Pincode" id="Pincode">  
                                                </div>
                                            </div>
                                           </div>
                                         
                                         
                                           <div class="col-md-6">
                                           <div class="row">
                                           <label class="col-md-5 col-form-label" for="password">Active</label>
                                           <div class="col-md-2">
                                                <input type="checkbox" name="Active" tabindex="50" class="Active" id="Active">	
                                               </div>
                                               <div class="col-md-5">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddCustomer()">
                                               <a href="{{url('VendorMaster')}}" class="btn btn-primary">Cancel</a>
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
          <th style="min-width:130px;">Company Name</th>
          <th style="min-width:130px;">Parent Customer</th>
          <th style="min-width:130px;">Customer Code</th>
          <th style="min-width:130px;">Customer Name</th>
          <th style="min-width:170px;">GST Registered Name</th>
          <th style="min-width:130px;">GST No</th>
          <th style="min-width:130px;">PAN No</th>
          <th style="min-width:130px;">Tin No</th>
          <th style="min-width:130px;">Bill At</th>
         <th style="min-width:130px;">Billing Cycle</th>
          <th style="min-width:130px;">CutOff Time</th>
          <th style="min-width:160px;">Allow All India Access</th>
          <th style="min-width:130px;">Allow Virtual Number</th>
          <th style="min-width:130px;">Load Image Required</th>
          <th style="min-width:150px;">CRM Executive</th>
          <th style="min-width:130px;">Billing Person</th>
          <th style="min-width:130px;">Reference By</th>
          <th style="min-width:130px;">Customer Category</th>
          <th style="min-width:130px;">Credit Limit</th>
          <th style="min-width:130px;">Security Deposit Amount</th>
          <th style="min-width:130px;">Deposit By</th>
          <th style="min-width:130px;">Opening Balance</th>
          <th style="min-width:130px;">Opening Date</th>
          <th style="min-width:130px;">Discount</th>
          <th style="min-width:130px;">TDS Percentage</th>
          <th style="min-width:130px;">Bill Submission</th>
          <th style="min-width:130px;">Bill Period	</th>
          <th style="min-width:130px;">Customer Type</th>
          <th style="min-width:130px;">Service Type	</th>
          <th style="min-width:130px;">Payment Mode</th>
          <th style="min-width:130px;">Tariff Type	</th>
          <th style="min-width:130px;">Invoice Format	</th>
          <th style="min-width:130px;">SMS On Billing	</th>
          <th style="min-width:130px;">Allow Round Off	</th>
          <th style="min-width:130px;">Include Flights In Bill	</th>
          <th style="min-width:130px;">Apply TAT Product	</th>
          <th style="min-width:130px;">Auto MIS	</th>
          <th style="min-width:130px;">POD Image Required	</th>
          <th style="min-width:130px;">Ignore Pickup Day	</th>
          <th style="min-width:130px;">Ignore Delivery Day	</th>
          <th style="min-width:130px;">GST Applicable	</th>
          <th style="min-width:130px;">RCM_Exempted</th>
          <th style="min-width:130px;">RCM_Exempted Remarks		</th>
          <th style="min-width:130px;">GST Air</th>
          <th style="min-width:130px;">GST Road</th>
          <th style="min-width:130px;">GST Train</th>
          <th style="min-width:130px;">GST Water</th>
          <th style="min-width:130px;">GST Inclusive</th>
          <th style="min-width:130px;">Address1</th>
          <th style="min-width:130px;">Address2</th>
          <th style="min-width:130px;">State</th>
          <th style="min-width:130px;">City</th>
          <th style="min-width:130px;">Pincode</th>
          <th style="min-width:130px;">Active</th>
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($CustomerMaster as $customer)
            <?php $i++; ?>
            <tr>
              <td>View / Edit</td>
              <td>{{$i}}</td>
              <td>{{$customer->CompanyName}}</td>
              <td>{{$customer->ParentCustomer}}</td>
              <td>{{$customer->CustomerCode}}</td>
              <td>{{$customer->CustomerName}}</td>
              <td>{{$customer->GSTName}}</td>
              <td>{{$customer->GSTNo}}</td>
              <td>{{$customer->PANNo}}</td>
              <td>{{$customer->TinNo}}</td>
              <td>{{$customer->BillAt}}</td>
              <td>{{$customer->BillingCycle}}</td>
              <td>{{$customer->CutOffTime}}</td>
              <td>{{$customer->IndiaAccess}}</td>
              <td>{{$customer->VirtualNumber}}</td>
              <td>{{$customer->LoadImage}}</td>
              <td>{{$customer->CRMExecutive}}</td>
              <td>{{$customer->BillingPerson}}</td>
              <td>{{$customer->ReferenceBy}}</td>
              <td>{{$customer->CustomerCategory}}</td>
              <td>{{$customer->CreditLimit}}</td>
              <td>{{$customer->DepositAmount}}</td>
              <td>{{$customer->DepositBy}}</td>
              <td></td>
              <td></td>
              <td>{{$customer->Discount}}</td>
              <td>{{$customer->TDS}}</td>
              <td>{{$customer->BillSubmission}}</td>
              <td>{{$customer->PaymentDetails->CreditPeriod}}</td>
              <td>{{$customer->CustomerType}}</td>
              <td>{{$customer->ServiceType}}</td>
              <td>{{$customer->PaymentDetails->PaymentMode}}</td>
              <td>{{$customer->PaymentDetails->TariffType}}</td>
              <td>{{$customer->PaymentDetails->InvoiceFormat}}</td>
              <td>{{$customer->PaymentDetails->SMSOnBilling}}</td>
              <td>{{$customer->PaymentDetails->AllowRoundOff}}</td>
              <td>{{$customer->PaymentDetails->IncludeFlights}}</td>
              <td>{{$customer->PaymentDetails->ApplyTAT}}</td>
              <td>{{$customer->PaymentDetails->AutoMIS}}</td>
              <td>{{$customer->PaymentDetails->POD}}</td>
              <td>{{$customer->PaymentDetails->IgnorePicku}}</td>
              <td>{{$customer->PaymentDetails->IgnoreDelivery}}</td>
              <td>{{$customer->PaymentDetails->GSTApp}}</td>
              <td>{{$customer->PaymentDetails->RCM}}</td>
              <td>{{$customer->PaymentDetails->RCMExempted}}</td>
              <td>{{$customer->PaymentDetails->Air}}</td>
              <td>{{$customer->PaymentDetails->Road}}</td>
              <td>{{$customer->PaymentDetails->Train}}</td>
              <td>{{$customer->PaymentDetails->Water}}</td>
              <td>{{$customer->PaymentDetails->GSTInclusive}}</td>
              <td>{{$customer->CustAddress->Address1}}</td>
              <td>{{$customer->CustAddress->Address2}}</td>
              <td>{{$customer->CustAddress->State}}</td>
              <td>{{$customer->CustAddress->City}}</td>
              <td>{{$customer->CustAddress->Pincode}}</td>
              <td>{{$customer->Active}}</td>


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

     var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddCustomer',
       cache: false,
       data: {
           'Cid':Cid,'CompanyName':CompanyName,'TDS':TDS,'ParentCustomer':ParentCustomer,'CustomerCode':CustomerCode,'CustomerName':CustomerName,'GSTName':GSTName,'GSTNo':GSTNo,'PANNo':PANNo,'TinNo':TinNo,'BillAt':BillAt,'BillingCycle':BillingCycle,'CutOffTime':CutOffTime,'IndiaAccess':IndiaAccess,'VirtualNumber':VirtualNumber,'LoadImage':LoadImage,'CRMExecutive':CRMExecutive,'BillingPerson':BillingPerson,'ReferenceBy':ReferenceBy,'CustomerCategory':CustomerCategory,'CreditLimit':CreditLimit,'DepositAmount':DepositAmount,'DepositBy':DepositBy,'Discount':Discount,'BillSubmission':BillSubmission,'CustomerType':CustomerType,'ServiceType':ServiceType,'PaymentMode':PaymentMode,'CreditPeriod':CreditPeriod,'AllowRoundOff':AllowRoundOff,'TariffType':TariffType,'IncludeFlights':IncludeFlights,'ApplyTAT':ApplyTAT,'AutoMIS':AutoMIS,'POD':POD,'IgnorePicku':IgnorePicku,'IgnoreDelivery':IgnoreDelivery,'InvoiceFormat':InvoiceFormat,'SMSOnBilling':SMSOnBilling,'RCM':RCM,'RCMExempted':RCMExempted,'GSTApp':GSTApp,'Air':Air,'Road':Road,'Train':Train,'Water':Water,'GSTInclusive':GSTInclusive,'Address1':Address1,'State':State,'Address2':Address2,'City':City,'Pincode':Pincode,'Active':Active
             },
             
           success: function(data) {
           location.reload();
       }
     });
  }
  function ViewVendor(id) 
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewVendor',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     
     $('.OfficeName').val(obj.OfficeName).trigger('change');
     $('.OfficeName').attr('disabled', true);
     $('.ModeType').val(obj.ModeType).trigger('change');
     $('.ModeType').attr('disabled', true);
     $('.VendorCode').val(obj.VendorCode);
     $('.VendorCode').attr('readonly', true);
     $('.VendorName').val(obj.VendorName);
     $('.VendorName').attr('readonly', true);
     $('.NatureOfVendor').val(obj.NatureOfVendor).trigger('change');
     $('.NatureOfVendor').attr('disabled', true);
     $('.FCM').val(obj.FCM).trigger('change');
     $('.FCM').attr('disabled', true);
     $('.Identification').val(obj.Identification).trigger('change');
     $('.Identification').attr('disabled', true);
     $('.Gst').val(obj.Gst);
     $('.Gst').attr('readonly', true);
     $('.TransportGroup').val(obj.TransportGroup);
     $('.TransportGroup').attr('readonly', true);
     $('.CreditPeriod').val(obj.CreditPeriod);
     $('.CreditPeriod').attr('readonly', true);
     $('.Password').val(obj.Password);
     $('.Password').attr('readonly', true);
     $('.WithoutFPM').val(obj.WithoutFPM);
     $('.WithoutFPM').attr('readonly', true);
     $('.BankName').val(obj.vendor_bank_details.BankName);
     $('.BankName').attr('readonly', true);
     $('.BranchName').val(obj.vendor_bank_details.BranchName);
     $('.BranchName').attr('readonly', true);
     $('.BranchAddress').val(obj.vendor_bank_details.BranchAddress);
     $('.BranchAddress').attr('readonly', true);
     $('.NameOfAccount').val(obj.vendor_bank_details.NameOfAccount);
     $('.NameOfAccount').attr('readonly', true);
     $('.AccountType').val(obj.vendor_bank_details.AccountType).trigger('change');
     $('.AccountType').attr('disabled', true);
     $('.AccountNo').val(obj.vendor_bank_details.AccountNo);
     $('.AccountNo').attr('readonly', true);
     $('.IfscCode').val(obj.vendor_bank_details.IfscCode);
     $('.IfscCode').attr('readonly', true);
     $('.Name').val(obj.vendor_details.Name);
     $('.Name').attr('readonly', true);
     $('.Address1').val(obj.vendor_details.Address1);
     $('.Address1').attr('readonly', true);
     $('.Address2').val(obj.vendor_details.Address2);
     $('.Address2').attr('readonly', true);
     $('.Mobile').val(obj.vendor_details.Mobile);
     $('.Mobile').attr('readonly', true);
     $('.Email').val(obj.vendor_details.Email);
     $('.Email').attr('readonly', true);
     $('.Pincode').val(obj.vendor_details.Pincode);
     $('.Pincode').attr('readonly', true);
     $('.City').val(obj.vendor_details.City);
     $('.City').attr('readonly', true);
     $('.State').val(obj.vendor_details.State);
     $('.State').attr('readonly', true);
    
    }
    });
  }
  function EditVendor(id)
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewVendor',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.Vid').val(obj.id);
     $('.OfficeName').val(obj.OfficeName).trigger('change');
     $('.OfficeName').attr('disabled', false);
     $('.ModeType').val(obj.ModeType).trigger('change');
     $('.ModeType').attr('disabled', false);
     $('.VendorCode').val(obj.VendorCode);
     $('.VendorCode').attr('readonly', false);
     $('.VendorName').val(obj.VendorName);
     $('.VendorName').attr('readonly', false);
     $('.NatureOfVendor').val(obj.NatureOfVendor).trigger('change');
     $('.NatureOfVendor').attr('disabled', false);
     $('.FCM').val(obj.FCM).trigger('change');
     $('.FCM').attr('disabled', false);
     $('.Identification').val(obj.Identification).trigger('change');
     $('.Identification').attr('disabled', false);
     $('.Gst').val(obj.Gst);
     $('.Gst').attr('readonly', false);
     $('.TransportGroup').val(obj.TransportGroup);
     $('.TransportGroup').attr('readonly', false);
     $('.CreditPeriod').val(obj.CreditPeriod);
     $('.CreditPeriod').attr('readonly', false);
     $('.Password').val(obj.Password);
     $('.Password').attr('readonly', false);
     $('.WithoutFPM').val(obj.WithoutFPM);
     $('.WithoutFPM').attr('readonly', false);
     $('.BankName').val(obj.vendor_bank_details.BankName);
     $('.BankName').attr('readonly', false);
     $('.BranchName').val(obj.vendor_bank_details.BranchName);
     $('.BranchName').attr('readonly', false);
     $('.BranchAddress').val(obj.vendor_bank_details.BranchAddress);
     $('.BranchAddress').attr('readonly', false);
     $('.NameOfAccount').val(obj.vendor_bank_details.NameOfAccount);
     $('.NameOfAccount').attr('readonly', false);
     $('.AccountType').val(obj.vendor_bank_details.AccountType).trigger('change');
     $('.AccountType').attr('disabled', false);
     $('.AccountNo').val(obj.vendor_bank_details.AccountNo);
     $('.AccountNo').attr('readonly', false);
     $('.IfscCode').val(obj.vendor_bank_details.IfscCode);
     $('.IfscCode').attr('readonly', false);
     $('.Name').val(obj.vendor_details.Name);
     $('.Name').attr('readonly', false);
     $('.Address1').val(obj.vendor_details.Address1);
     $('.Address1').attr('readonly', false);
     $('.Address2').val(obj.vendor_details.Address2);
     $('.Address2').attr('readonly', false);
     $('.Mobile').val(obj.vendor_details.Mobile);
     $('.Mobile').attr('readonly', false);
     $('.Email').val(obj.vendor_details.Email);
     $('.Email').attr('readonly', false);
     $('.Pincode').val(obj.vendor_details.Pincode);
     $('.Pincode').attr('readonly', false);
     $('.City').val(obj.vendor_details.City);
     $('.City').attr('readonly', false);
     $('.State').val(obj.vendor_details.State);
     $('.State').attr('readonly', false);
    
    }
    });
  } 
</script>