@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">VECHILE HIRE CHALLAN</li>
                    </ol>
                </div>
                <h4 class="page-title">VECHILE HIRE CHALLAN</h4>
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
                                        <div class="col-7">
                                            <div class="row">


                                      
                                                
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="challan_date">Challan Date<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                        <input type="text" tabindex="1" class="form-control datepickerOne challan_date" name="challan_date" id="challan_date" >
                                                    
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="challan_no">Challan Number</label>
                                                        <div class="col-md-7">
                                                         <input readonly type="text" tabindex="2" class="form-control challan_no" name="challan_no" id="challan_no" >
                                                    
                                                        <span class="error"></span>
                                                       
                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-2 col-form-label" for="challan_type">Challan Type<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-10">
                                                        
                                                        <select tabindex="3" class="form-control selectBox challan_type" name="challan_type" id="challan_type">
                                                            
                                                            <option value="MARKET VEHICLE">MARKET VEHICLE</option>
                                                            <option value="SELF VEHICLE">SELF VEHICLE</option>
                                                            <option value="VENDOR VEHICLE">VENDOR VEHICLE</option>
                                                         </select>
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="purpose">Purpose<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                        <select onchange="OpenDisableField();" tabindex="4" class="form-control selectBox purpose" name="purpose" id="purpose">
            
                                                            <option value="PICKUP">PICKUP</option>
                                                            <option value="DELIVERY">DELIVERY</option>
                                                            <option value="TRANSHIPMENT">TRANSHIPMENT</option>
                                                            <option value="PICKUP & DELIVERY">PICKUP & DELIVERY</option>
                                                            
                                                         
                                                         </select>
                                                       
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="paid_for">Paid for<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-7">
                                                        <select tabindex="5" class="form-control selectBox paid_for" name="paid_for" id="paid_for">
                                                        <option value="FUEL">FUEL</option>
                                                            
                                                            <option value="TARIFF">TARIFF</option>
                                                            
                                                         
                                                         </select>
                                                    
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="origin_office">Origin Office<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                       <select tabindex="6" class="form-control selectBox origin_office" name="origin_office" id="origin_office">
                                                            <option value="">--select--</option>
                                                            @foreach($Office as $key)
                                                            <option value="{{$key->id}}">{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                            @endforeach
                                                         
                                                         </select>
                                                          <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="destination_office">Destination Office<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-7">
                                                       <select tabindex="7" class="form-control selectBox destination_office" name="destination_office" id="destination_office" disabled>
                                                            <option value="">--select--</option>
                                                            @foreach($Office as $key)
                                                            <option value="{{$key->id}}">{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                            @endforeach
                                                            
                                                         
                                                         </select>
                                                          <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="route">Route<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                     
                                                        <input type="text" tabindex="8" class="form-control route" name="route" id="route" disabled>       
                                                        
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="vendor_name">Vendor Name<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-7">
                                                        <select tabindex="9" class="form-control selectBox vendor_name" name="vendor_name" id="vendor_name">
                                                            <option value="">--select--</option>
                                                            @foreach($Vendor as $key)
                                                            <option value="{{$key->id}}">{{$key->VendorCode}} ~ {{$key->VendorName}}</option>
                                                            @endforeach
                                                         </select>
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="account_number">Account Number</label>
                                                        <div class="col-md-8">
                                                        <input type="text" tabindex="10" class="form-control account_number" name="account_number" id="account_number" >
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="vechile_model">Vechile Model<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-7">
                                                     
                                                        <select tabindex="11" class="form-control selectBox vechile_model" name="vechile_model" id="vechile_model">
                                                            <option value="">--select--</option>
                                                            
                                                            @foreach($Model as $key)
                                                            <option value="{{$key->id}}">{{$key->VehicleType}}</option>
                                                            @endforeach
                                                            
                                                         
                                                         </select>
                                                          <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="vechile_number">Vechile Number<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-8">
                                                    
                                                     <select onchange="getVehicleDetail(this.value);" tabindex="12" class="form-control selectBox vechile_number" name="vechile_number" id="vechile_number">
                                                            <option value="">--select--</option>
                                                            @foreach($vehicle as $key)
                                                            <option value="{{$key->id}}">{{$key->VehicleNo}}</option>
                                                            @endforeach
                                                            
                                                         </select>
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                

                                                  <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="remarks">Remarks</label>
                                                <div class="col-md-7">
                                               
                                               
                                                  
                                                 <Textarea class="form-control remark"
                                                        placeholder="Remark"  tabindex="13"  name="remark" id="remark"></Textarea>
                                                       <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                      
                                                </div>
                                            </div>
                                        </div>

                                            
                                           
                                           
                                            </div>
                                        </div>
                                   
                                        <div class="col-5">
                                            <div class="hire_challan">
                                                 <table class="table table-bordered table-centered mb-1 ml-1 gatepassreceiving-table topay_table">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" class=" reporting_office td21">Reporting Office
                                                                    </td>
                                                                    <td align="left" class="td22"> 
                                                                        <span id="reporting_office"></span>
                                                                    </td>
                                                               
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" class="vechile_size" nowrap="nowrap">Vechile Size
                                                                    </td>
                                                                    <td align="left"> 
                                                                        <span id="vechile_size"></span>
                                                                    </td>
                                                               
                                                                </tr>
                                                            <tr>
                                                                  <td align="left" class="vechile_model">
                                                                   Vechile Model
                                                                </td>
                                                                <td align="left">
                                                                    <span id="vechile_modelData"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="vechile_purpose" nowrap="nowrap">Vcehile Purpose
                                                                </td>
                                                                <td align="left" > 
                                                                    <span id="vechile_purpose"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="placement_type" nowrap="nowrap">Placement Type
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="placement_type"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="tariff_type">Tariff Type
                                                                </td>
                                                                <td align="left" class="tariff_type">
                                                                    <span id="tariff_type"></span>
                                                                </td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="rent_amount">Rent Amount
                                                                </td>
                                                                <td align="left" class="rent_amount">
                                                                    <span id="rent_amount"></span>
                                                                </td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>

                                                                <td align="left" class="monthly_fix_km">Monthly Fix Km
                                                                </td>
                                                                <td align="left" class="monthly_fix_km">
                                                                    <span id="monthly_fix_km"></span>
                                                                </td>
                                                                
                                                            </tr>

                                                             <tr>

                                                                <td align="left" class="addl_per_km">Addl. Per Km
                                                                </td>
                                                                <td align="left" class="addl_per_km">
                                                                    <span id="addl_per_km"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>

                                                                <td align="left" class="addl_per_hour">Addl. Per Hour
                                                                </td>
                                                                <td align="left" class="addl_per_hour">
                                                                    <span id="addl_per_hour"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                          
                                                            
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                                <table class="table-responsive table-bordered">
                                                    <thead>
                                                        <tr class="main-title text-dark">
                                                        
                                                            <th class="p-1 td1" colspan="2">Pickup/Delivery/Transhipment Detail<span class="error">*</span></th>
                                                            <th class="p-1 td2">Transaction Type</th>
                                                            <th class="p-1 td3"></th>
                                                            <th class="p-1 td4">Payment Mode & Number</th>
                                                            <th class="p-1 td5">Paid By Office</th>
                                                           

                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        <tr>
                                                           
                                                            <td class="p-1">
                                                                 <label class="" for="vechile_number">Number<span
                                                             class="error">*</span></label>
                                                            </td>
                                                            <td class="p-1"><input type="text" step="0.1" name="number" tabindex="14" class="form-control number" id="number"> 
                                                                                   
                                                                </td>

                                                            <td class="p-1">  <label class="" for="vechile_number">Total Amount<span
                                                            class="error">*</span></label>
                                                                                    <input type="hidden" step="0.1" name="weight" tabindex="15" class="form-control weight" id="weight" readonly="">
                                                                                
                                                                                </td>
                                                            <td class="p-1"><input onkeyup="Calculation();" type="number" step="0.1" name="total_amount" tabindex="14" class="form-control total_amount" id="total_amount"> </td>
                                                            <td class="p-1"></td>
                                                            <td class="p-1">
                                                              
                                                                
                                                            </td>
                                                            
                                                        </tr>
                                                                    <tr>
                                                                        <td class="p-1" rowspan="2" colspan="2"></td>
                                                                        <td class="p-1">
                                                                             <label class="" for="advanced_paid">Advanced Paid</label>
                                                                        </td>
                                                                        <td class="p-1">
                                                                            <input  onkeyup="Calculation();" type="number"  name="advanced_paid" tabindex="14" class="form-control advanced_paid" id="advanced_paid">
                                                                        </td>
                                                                        <td class="p-1">
                                                                            <div class="d-flex">
                                                                         <select tabindex="15" class="form-control selectBox mr-1" name="PaymentMode" id="PaymentMode">
                                                                        <option value="">--select--</option>
                                                                        <option value="BANK">BANK</option>
                                                                        <option value="CASH">CASH</option>
                                                                        <option value="UPI">BANK</option>
                                                                        <option value="WALLET">WALLET</option>
                                                                        </select> 
                                                                          <input type="text"  name="PaymentNumber" tabindex="16" class="form-control " id="PaymentNumber">
                                                                      </div>
                                                                        </td>
                                                                        <td class="p-1">
                                                                            <select tabindex="17" class="form-control selectBox AdvOffice" name="AdvOffice" id="AdvOffice" >
                                                                                <option value="">--select--</option>
                                                                                @foreach($Office as $key)
                                                                                <option value="{{$key->id}}">{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td class="p-1">
                                                                             <label class="" for="balance">Balance</label>
                                                                        </td>
                                                                        <td class="p-1">
                                                                            <input type="number"  name="advanced_paid" tabindex="18" class="form-control balance" id="balance" disabled>
                                                                        </td>
                                                                        <td class="p-1">
                                                                            <div class="d-flex">
                                                                         <select tabindex="19" class="form-control selectBox BalPaymentMode" name="BalPaymentMode" id="BalPaymentMode">
                                                                        <option value="">--select--</option>
                                                                        <option value="BANK">BANK</option>
                                                                        <option value="CASH">CASH</option>
                                                                        <option value="UPI">BANK</option>
                                                                        <option value="WALLET">WALLET</option>
                                                                        </select> 
                                                                          <input type="text"  name="BalPaymentNumber" tabindex="20" class="form-control ml-1" id="BalPaymentNumber">
                                                                      </div> 
                                                                        </td>
                                                                        <td class="p-1">
                                                    
                                                                            <select tabindex="21" class="form-control selectBox BalOffice" name="BalOffice" id="BalOffice" >
                                                                                <option value="">--select--</option>
                                                                                @foreach($Office as $key)
                                                                                <option value="{{$key->id}}">{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="p-1" colspan="2"></td>
                                                                            <td class="p-1" colspan="2"></td>
                                                                        <td class="p-1" colspan="2">
                                                                            <input type="button" value="save" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveVehicleChallan();" tabindex="22">
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   
                                                                   
                                                             </tbody>
                                                         
                                                            </table> 
                                                            <div class="tabelData newtable"></div>
                                            </div>
                                    </div>
                                </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
            
<script type="text/javascript">
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          autoclose:true,
          todayHighlight:true
      });
 
  

    function SaveVehicleChallan(){
        var base_url = '{{url('')}}';

        if($("#challan_date").val()=='')
           {
              alert('please Enter Challan Date');
              return false;
           }
           if($("#challan_type").val()=='')
           {
              alert('please select  Challan Type');
              return false
           }
           
            if($("#purpose").val()=='')
           {
              alert('please select Purpose');
              return false;
           }
           if($("#paid_for").val()=='')
           {
              alert('please Enetr Paid For');
              return false;
           }
           if($("#origin_office").val()=='')
           {
              alert('please Select Origin Office');
              return false;
           }
           if($("#vendor_name").val()=='')
           {
              alert('please Select Vendor Name');
              return false;
           }
          
           if($("#account_number").val()=='')
           {
              alert('please Enter Account Number');
              return false;
           }
           if($("#vechile_model").val()=='')
           {
              alert('please Enter Vechile Model');
              return false;
           }
           if($("#vechile_number").val()=='')
           {
              alert('please Vechile Number');
              return false;
           }

           if($("#number").val()=='')
           {
              alert('please Enter Number');
              return false;
           }

           if($("#total_amount").val()=='')
           {
              alert('please Enter Total Amount');
              return false;
           }
           var  destination_office = $("#destination_office").val();
           var route  = $("#route").val();
           var advanced_paid  = $("#advanced_paid").val();
           var remarks  = $("#remark").val();
           var challan_date  = $("#challan_date").val();
           var challan_type  = $("#challan_type").val();
           var purpose  = $("#purpose").val();
           var paid_for  = $("#paid_for").val();
           var origin_office  = $("#origin_office").val();

           var vendor_name  = $("#vendor_name").val();
           var account_number  = $("#account_number").val();
           var vechile_model  = $("#vechile_model").val();
           var vechile_number  = $("#vechile_number").val();
           var number  = $("#number").val();
           var total_amount  = $("#total_amount").val();

           var PaymentMode = $("#PaymentMode").val();
           var PaymentNumber = $("#PaymentNumber").val();
           var AdvOffice = $("#AdvOffice").val();
           var BalPaymentMode = $("#BalPaymentMode").val();
           var BalPaymentNumber = $("#BalPaymentNumber").val();
           var BalOffice = $("#BalOffice").val();
           var balance =  $("#balance").val();
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
            url: base_url + '/VehicleHireChallanPost',
           cache: false,
           data:{
                    'destination_office':destination_office,
                    'route' :route,
                    'advanced_paid' :advanced_paid,
                    'remarks' :remarks,
                    'challan_date' :challan_date,
                    'challan_type' :challan_type,
                    'purpose' :purpose,
                    'paid_for' :paid_for,
                    'origin_office' :origin_office,
                    'vendor_name' :vendor_name,
                    'account_number' :account_number,
                    'vechile_model':vechile_model,
                    'vechile_number':vechile_number,
                    'number':number,
                    'total_amount':total_amount,
                    'PaymentMode':PaymentMode,
                    'PaymentNumber':PaymentNumber,
                    'AdvOffice':AdvOffice,
                    'BalPaymentMode':BalPaymentMode,
                    'BalPaymentNumber':BalPaymentNumber,
                    'BalOffice':BalOffice,
                    'balance':balance
                },
            success: function(data) {
              alert(data);
              location.reload();
            
            }
            });
    }

    function Calculation(){
        var Total=   parseInt($("#total_amount").val());
        var Advance = parseInt($("#advanced_paid").val());

        var Result = parseInt(Total-Advance);
        if(isNaN(Total) || isNaN(Advance)) {
             $("#balance").val(Total); 
        }
        else{
            $("#balance").val(Result);
        }
        
    }


    function getVehicleDetail(VehicleId)
    {
    var Model= $("#vechile_model").val();
        var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/VehicleHireChallanShow',
       cache: false,
       data: {
           'VehicleId':VehicleId,"Model":Model
       }, 
       success: function(data) {
        
        const obj = JSON.parse(data);
       
        if(obj.status=='true')
        {
            $("#reporting_office").text(obj.datas.office_details.OfficeName);
            $("#vechile_size").text(obj.datas.vehicle_type_details.VehSize);
            $("#vechile_modelData").text(obj.datas.vehicle_type_details.VehicleType);
            $("#vechile_purpose").text(obj.datas.VehiclePurpose);
            $("#placement_type").text(obj.datas.PlacementType);
            $("#tariff_type").text(obj.datas.TariffType);
            $("#rent_amount").text(obj.datas.MonthRent);
            $("#monthly_fix_km").text(obj.datas.MonthlyFixKm);
            $("#addl_per_km").text(obj.datas.AdditionalPerKmRate);
            $("#addl_per_hour").text(obj.datas.PerHRRate);

           

        }
        else{
            $("#reporting_office").text('');
            $("#vechile_size").text('');
            $("#vechile_modelData").text('');
            $("#vechile_purpose").text('');
            $("#placement_type").text('');
            $("#tariff_type").text('');
            $("#rent_amount").text('');
            $("#monthly_fix_km").text('');
            $("#addl_per_km").text('');
            $("#addl_per_hour").text('');
         }
       
        
       }
     });
    }
  function OpenDisableField(getVal){
      if(getVal!="PICKUP"){
         $("#destination_office").prop("disabled",false);
         $("#route").prop("disabled",false);
      }
      if(getVal=="PICKUP"){
        $("#destination_office").prop("disabled",true);
         $("#route").prop("disabled",true);
      }
  }
</script>
   

    
