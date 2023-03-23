@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">TAT CALCULATOR</h4>
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
                                        <div class="col-6 mb-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label text-end" for="BookingDate">Booking Date:<span
                                                class="error">*</span></label>
                                                    <div class="col-md-4">
                                                    <input type="text" tabindex="1" class="form-control datepickerOne BookingDate" name="BookingDate" id="BookingDate" >
                                                    <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                    <span class="error"></span>
                                                    </div>
                                                </div>
                                        </div>
                                            
                                        <div class="col-6">
                                            <div class="row mb-1">
                                               
                                            </div>
                                        </div>  

                                          <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="customer_code">Customer Code:</label>
                                                <div class="col-md-8">
                                              
                                                     <input type="text" tabindex="2" class="form-control customer_code" name="customer_code" id="customer_code" value="">
                                                 </div>
                                            </div>
                                         </div>
                                            
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-5 col-form-label text-end" for="docketNo">Docket Number:</label>
                                                <div class="col-md-7">
                                               
                                                <input type="text" tabindex="3" class="form-control docketNo" name="docketNo" id="docketNo" value="">
                                                </div>
                                            </div>
                                        </div>


                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="origin_pincode">Origin Pincode:</label>
                                                <div class="col-md-8">
                                               <input type="number" tabindex="4" class="form-control origin_pincode" name="origin_pincode" id="origin_pincode" value="">  
                                                </div>
                                            </div>
                                         </div>
                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-5 col-form-label text-end" for="destination_pincode">Destination Pincode:</label>
                                                <div class="col-md-5">
                                               <input type="number" tabindex="5" class="form-control destination_pincode" name="destination_pincode" id="destination_pincode" value="">  
                                                </div>
                                                <div class="col-md-2"><button type="button" class="btn btn-primary" tabindex="6">GO</button></div>
                                            </div>
                                         </div>

                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="origin_city">City Name:</label>
                                                <div class="col-md-8">
                                              
                                                </div>
                                            </div>
                                         </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-5 col-form-label text-end" for="destination_city">City Name:</label>
                                                <div class="col-md-7">
                                               
                                                </div>
                                            </div>
                                         </div>

                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="origin_city_grpcode">Origin City Group Code:</label>
                                                <div class="col-md-8">
                                               
                                                </div>
                                            </div>
                                         </div>
                                        <div class="col-6">
                                           <div class="row mb-1">
                                                <label class="col-md-5 col-form-label text-end" for="destination_city_grpcode">Destination City Group Code:</label>
                                                <div class="col-md-7">
                                               
                                                </div>
                                            </div>
                                         </div>

                                           
                                        
                                    </div>
                                         
                                        
                                             

                                </div>
                                               
                                        
                            </div>
                        </div>
                               
                    </form>

                </div> <!-- end card-body -->
                <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row tabels">
                    </div>
                </div>
            
            </div> <!-- end card-->
            
                 
                
        </div>
                 
              
      
    </div> <!-- end col -->
      

    
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