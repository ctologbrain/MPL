@include('layouts.appTwo')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
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
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Scan Date<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="1" class="form-control datepickerOne scanDate" name="scanDate" id="scanDate" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vehicle Type<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select onchange="selectVehicle();" name="vehicleType" id="vehicleType" tabindex="3" class="form-control selectBox vehicleType">
                                                <option value="">Select Vehicle</option>
                                                <option value="Vendor Vehicle">Vendor Vehicle</option>
                                                <option value="Market Vehicle">Market Vehicle</option>
                                                
                                             </select>
                                                </div>
                                            </div>
                                            </div>  
                                            
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vendor Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                               
                                               <select tabindex="2" class="form-control vendorName" name="vendorName" id="vendorName" value="" onclick="getVendorVehicle(this.value)">
                                                <option value="">--select--</option>
                                                @foreach($vendor as  $vendorList)
                                                <option value="{{$vendorList->id}}">{{$vendorList->id}} ~ {{$vendorList->VendorName}}</option>
                                                @endforeach
                                               </select>    
                                            </div>
                                            </div>
                                            </div>


                                             <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vehicle No<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                               <select  tabindex="2" class="form-control vehicleNo VehcleList" name="vehicleNo" id="vehicleNo" value="">
                                                <option value="">--select--</option>
                                               </select>    
                                            </div>
                                            </div>
                                            </div>
                                             <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Driver Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                              <select tabindex="2" class="form-control driverName" name="driverName" id="driverName" value="">
                                                <option value="">--select--</option>
                                                @foreach($driver as $drivers)
                                                <option value="{{$drivers->id}}">{{$drivers->DriverName}} ~ {{$drivers->License}}</option>
                                                @endforeach
                                              </select>    
                                            </div>
                                            </div>
                                            </div>
                                             <div class="col-3">
                                            <div class="row mb-1">
                                                <label class="col-md-8 col-form-label" for="password">Start KM</label>
                                                <div class="col-md-4">
                                                <input type="number" tabindex="2" class="form-control startkm" name="startkm" id="startkm" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-3">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">End KM</label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="2" class="form-control endkm" name="endkm" id="endkm" value="">
                                                </div>
                                            </div>
                                            </div>

                                            <div id="marketHireAmountInput" class="col-6 d-none">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Market Hire Amount<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control marketHireAmount" name="marketHireAmount" id="marketHireAmount" value="">
                                                </div>
                                            </div>
                                            </div>

                                             <div  id="advanceToBePaidInput" class="col-6 d-none">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Advance To Be Paid<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control advanceToBePaid" name="advanceToBePaid" id="advanceToBePaid" value="">
                                                </div>
                                            </div>
                                            </div>

                                            <div id="paymentModeInput" class="col-6 d-none">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Payment Mode<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="paymentMode" id="paymentMode" tabindex="3" class="form-control selectBox paymentMode">
                                                <option value="">--select--</option>
                                                <option value="CASH">CASH</option>
                                                <option value="BANK">BANK</option>
                                                <option value="MOBILE">MOBILE</option>
                                                
                                             </select>
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div id="advanceTypeInput" class="col-6 d-none">
                                            <div  class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Advance Type<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                 <select name="advanceType" id="advanceType" tabindex="3" class="form-control selectBox advanceType">
                                                <option value="">--select--</option>
                                                <option value="TRIP">TRIP</option>
                                                <option value="FUEL">FUEL</option>
                                                <option value="OTHER">OTHER</option>

                                             </select>
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Unloading Supervisor<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control unloadingSupervisorName" name="unloadingSupervisorName" id="unloadingSupervisorName" value="">
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Pickup Person Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control pickupPersonName" name="pickupPersonName" id="pickupPersonName" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Remark</label>
                                                <div class="col-md-8">
                                                <textarea rows="3" tabindex="2" class="form-control remark" name="remark" id="remark" ></textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Docket No.<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" tabindex="2" class="form-control docketNo" name="docketNo" id="docketNo" readonly onchange="EnterDocket(this.value)">
                                                
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-6">
                                            <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="4" value="Generate Pickup No" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="genrateNO()">
                                                <a href="{{url('ProductMaster')}}" tabindex="5" class="btn btn-primary mt-3">Cancel</a>
                                            </div>
                                            </div>
                                           </div>
                                         
                                        
                                             

                                        </div>
                                               
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row tabels">
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>

<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function EnterDocket(Docket)
  {
    var base_url = '{{url('')}}';
    var pickup=$('#pickup').val();
    var scanDate=$('#scanDate').val();
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/submitPickupSacn',
           cache: false,
           data: {
           'Docket':Docket,'pickup':pickup,'scanDate':scanDate
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status=='true')
                {
                    $('.docketNo').val('');
                    $('.tabels').html(obj.table)
                }
                else{
                    alert(obj.message)
                    $('.docketNo').val('');
                }
                
                

            
            }
            });
  }

    function genrateNO(){
        var base_url = '{{url('')}}';
        if($("#scanDate").val()=='')
           {
              alert('please Enter Scan Date');
              return false;
           }
           if($("#vehicleType").val()=='')
           {
              alert('please select  Vehicle Type');
              return false;
           }
           
            if($("#vendorName").val()=='')
           {
              alert('please Enter Vendor Name');
              return false;
           }
           var  scanDate = $("#scanDate").val();
           var vehicleType  = $("#vehicleType").val();
           var vendorName  = $("#vendorName").val();
           var vehicleNo  = $("#vehicleNo").val();
           var driverName  = $("#driverName").val();
           var startkm  = $("#startkm").val();
           var endkm  = $("#endkm").val();
           var marketHireAmount  = $("#marketHireAmount").val();
           var unloadingSupervisorName  = $("#unloadingSupervisorName").val();
           var pickupPersonName  = $("#pickupPersonName").val();
           var remark  = $("#remark").val();
           var docketNo  = $("#docketNo").val();
           var advanceToBePaid  = $("#advanceToBePaid").val();
           var paymentMode  = $("#paymentMode").val();
           var advanceType  = $("#advanceType").val();
           $(".btnSubmit").attr("disabled", true);
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/AddPickuSacn',
           cache: false,
           data: {
           'scanDate':scanDate,'vehicleType':vehicleType,'vendorName':vendorName,'vehicleNo':vehicleNo,'driverName':driverName,'startkm':startkm,'endkm':endkm,'marketHireAmount':marketHireAmount,
            'unloadingSupervisorName':unloadingSupervisorName,
            'pickupPersonName':pickupPersonName,
            'remark':remark,
            'advanceToBePaid':advanceToBePaid,
            'paymentMode':paymentMode,
            'advanceType':advanceType
            
       }, 
            success: function(data) {
                const obj = JSON.parse(data);
                $('.docketNo').attr('readonly', false);
                $('.pickupIn').text(obj.data);
                $('.pickup').val(obj.LastId);
            
            }
            });
    }

   

    function selectVehicle(){
    var vehicleType=   $("#vehicleType").val()
    if(vehicleType=="Market Vehicle"){
        $("#marketHireAmountInput").removeClass('d-none');
     $("#advanceToBePaidInput").removeClass('d-none');
      $("#paymentModeInput").removeClass('d-none');
       $("#advanceTypeInput").removeClass('d-none');
   }
   if(vehicleType=="Vendor Vehicle"){
    $("#marketHireAmountInput").addClass('d-none');
     $("#advanceToBePaidInput").addClass('d-none');
      $("#paymentModeInput").addClass('d-none');
       $("#advanceTypeInput").addClass('d-none');
   }

    }
function getVendorVehicle(id)
{
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetVendorVehicle',
       cache: false,
       data: {
           'id':id
       }, 
       success: function(data) {
        $('.VehcleList').html(data);
       }
     });
}

 //     function DepositeCashToHo()
 // {
 //  // $(".btnSubmit").attr("disabled", true);
 //   if($('#projectCode').val()=='')
 //   {
 //      alert('please Enter project Code');
 //      return false;
 //   }
 //   if($('#projectName').val()=='')
 //   {
 //      alert('please Enter project Name');
 //      return false;
 //   }
   
 //    if($('#ProjectCategory').val()=='')
 //   {
 //      alert('please select Project Category');
 //      return false;
 //   }
 //   var projectCode=$('#projectCode').val();
 //   var projectName=$('#projectName').val();
 //   var ProjectCategory=$('#ProjectCategory').val();
 //   var Pid=$('#Pid').val();
 
 //      var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/AddProduct',
 //       cache: false,
 //       data: {
 //           'projectCode':projectCode,'projectName':projectName,'ProjectCategory':ProjectCategory,'Pid':Pid
 //       },
 //       success: function(data) {
 //        location.reload();
 //       }
 //     });
 //  }  
 //  function viewproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', true);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', true);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', true);
      
 //       }
 //     });
 //  }
 //  function Editproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.Pid').val(obj.id);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', false);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', false);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', false);
        
      
 //       }
 //     });
 //  }
</script>