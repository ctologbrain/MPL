@include('layouts.appThree')

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
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row my-2">
                                        <div class="col-6 mb-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="search">Pickup No.<span
                                                        class="error">*</span></label>
                                                    <div class="col-md-5">
                                                        <input type="text" tabindex="1" class="form-control  " name="searchNo" id="searchNo" >
                                                        <span class="error"></span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="row">
                                                         <input tabindex="1" class="btn btn-primary" value="Search" type="button" name="searchPickup" onclick="SearchPickup();">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="print">Print Pickup No.</label>
                                                <div class="col-md-5">
                                                    <input type="text" tabindex="1" class="form-control" name="printNo" id="printNo" >
                                                    <span class="error"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                     <input tabindex="1" class="btn btn-primary" value="Print" type="button" name="PrintPickup" onclick=" printpickup();">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="userName">Scan Date<span
                                                    class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" tabindex="1" class="form-control datepickerOne scanDate" name="scanDate" id="scanDate" >
                                                        <input type="hidden"  class="form-control PickupId" name="PickupId" id="PickupId" >
                                                        <span class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                    <div class="row mb-1">
                                                        <label class="col-md-4 col-form-label" for="password">Vehicle Type<span
                                                        class="error">*</span></label>
                                                        <div class="col-md-8">
                                                            <select onchange="selectVehicle();" name="vehicleType" id="vehicleType" tabindex="2" class="form-control selectBox vehicleType">
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
                                                       <select tabindex="3" class="form-control vendorName vendorDetails" name="vendorName" id="vendorName" value="" onchange="getVendorVehicle(this.value)">
                                                        <option value="">--select--</option>
                                                       </select>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-form-label" for="password">Vehicle No<span
                                                    class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <select  tabindex="4" class="form-control selectBox vehicleNo VehcleList" name="vehicleNo" id="vehicleNo" value="">
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
                                                        <select tabindex="5" class="form-control driverName" name="driverName" id="driverName" value="">
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
                                                    <label class="col-md-8 col-form-label" for="password">Start KM<span
                                                    class="error">*</span></label>
                                                    <div class="col-md-4">
                                                    <input type="number" tabindex="6" class="form-control startkm" name="startkm" id="startkm" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-form-label" for="password">End KM<span
                                                    class="error">*</span></label>
                                                    <div class="col-md-8">
                                                    <input type="number" tabindex="7" class="form-control endkm" name="endkm" id="endkm" value="" onchange="KiloMiterCheck();">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="marketHireAmountInput" class="col-6 d-none">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-form-label" for="password">Market Hire Amount<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                    <input type="text" tabindex="8" class="form-control marketHireAmount" name="marketHireAmount" id="marketHireAmount" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div  id="advanceToBePaidInput" class="col-6 d-none">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-form-label" for="password">Advance To Be Paid<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" tabindex="9" class="form-control advanceToBePaid" name="advanceToBePaid" id="advanceToBePaid" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="paymentModeInput" class="col-6 d-none">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-form-label" for="userName">Payment Mode<span
                                                    class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <select name="paymentMode" id="paymentMode" tabindex="10" class="form-control selectBox paymentMode">
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
                                                         <select name="advanceType" id="advanceType" tabindex="11" class="form-control selectBox advanceType">
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
                                                    <label class="col-md-4 col-form-label" for="password">Unloading Supervisor<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                    <select tabindex="12" class="form-control unloadingSupervisorName unloadingSupervisorSearch" name="unloadingSupervisorName" id="unloadingSupervisorName" value="">
                                                    <option value="">--select--</option>
                                                   </select>    
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-form-label" for="password">Pickup Person Name<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                    <select tabindex="13" class="form-control pickupPersonName PickupPersonNameSearch" name="pickupPersonName" id="pickupPersonName" value="">
                                                    <option value="">--select--</option>
                                                   </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row mb-1">
                                                    <label class="col-md-4 col-form-label" for="password">Remark</label>
                                                    <div class="col-md-8">
                                                    <textarea rows="3" tabindex="14" class="form-control remark" name="remark" id="remark" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-1 text-end">
                                                <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                                <input type="hidden" name="pickup" class="pickup" id="pickup">
                                                <input type="button" tabindex="16" value="Submit" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="genrateNO()">
                                                    <a href="{{url('EditPickupScan')}}" tabindex="17" class="btn btn-primary">Cancel</a>
                                            </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
              <div class="card-body">
                  <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row tabels">
                            </div>
                        </div>
                  </div>
              </div> <!-- end col -->
            </div>
    </div>

    <div style="display:none;">
    <iframe id="printf" name="printf"></iframe>
    </div>
</div>

<script type="text/javascript">
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          language: 'es' ,
          autoclose:true
      });
  var base_url = '{{url('')}}';
    $('.vendorDetails').select2({
    placeholder: "",
    language: {
            inputTooShort: function(args) {
                return "";
            }
        },
    allowClear: false,
    ajax: {
      url:'getVendorDetailsForSearch',
      dataType: 'json',
      delay: 250,
      cache: false,
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
      type: 'POST',
      data: function (params) {
         return {
              term: params.term,
              page: params.page || 1,
          };
      },
      processResults: function(data, params) {
          console.log(params);
          console.log(data);
          var page = params.page || 1;
          return {
              results: $.map(data, function (item) { return {id: item.id, text: item.col}}),
              pagination: {
              // THE `10` SHOULD BE SAME AS `$resultCount FROM PHP, it is the number of records to fetch from table` 
                  more: (page * 10) <= data[0].total_count
              }
          };
      },              
  }
});
$('.unloadingSupervisorSearch').select2({
    placeholder: "",
    language: {
            inputTooShort: function(args) {
                return "";
            }
        },
    allowClear: false,
    ajax: {
      url:'GetEmployeDetailsForSearch',
      dataType: 'json',
      delay: 250,
      cache: false,
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
      type: 'POST',
      data: function (params) {
         return {
              term: params.term,
              page: params.page || 1,
          };
      },
      processResults: function(data, params) {
          console.log(params);
          console.log(data);
          var page = params.page || 1;
          return {
              results: $.map(data, function (item) { return {id: item.id, text: item.col}}),
              pagination: {
              // THE `10` SHOULD BE SAME AS `$resultCount FROM PHP, it is the number of records to fetch from table` 
                  more: (page * 10) <= data[0].total_count
              }
          };
      },              
  }
});
$('.PickupPersonNameSearch').select2({
    placeholder: "",
    language: {
            inputTooShort: function(args) {
                return "";
            }
        },
    allowClear: false,
    ajax: {
      url:'GetEmployeDetailsForSearch',
      dataType: 'json',
      delay: 250,
      cache: false,
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
      type: 'POST',
      data: function (params) {
         return {
              term: params.term,
              page: params.page || 1,
          };
      },
      processResults: function(data, params) {
          console.log(params);
          console.log(data);
          var page = params.page || 1;
          return {
              results: $.map(data, function (item) { return {id: item.id, text: item.col}}),
              pagination: {
              // THE `10` SHOULD BE SAME AS `$resultCount FROM PHP, it is the number of records to fetch from table` 
                  more: (page * 10) <= data[0].total_count
              }
          };
      },              
  }
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


  function SearchPickup(){
      var base_url = '{{url('')}}';
  var PickupNo=  $("#searchNo").val();
    $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/EditPickupScanData',
           cache: false,
           data: {
           'PickupNo':PickupNo
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status==1)
                {
                    $("#PickupId").val(obj.datas.id);
                    $('.docketNo').val(obj.datas.docketNo);
                    $('#scanDate').val(obj.datas.ScanDate);

                    $('#vehicleType').val(obj.datas.vehicleType).trigger('change');
                    
                 $('#vendorName').filter('[value='+obj.datas.vendorName+']').attr('selected',true);
                     //$('#vendorName').val(obj.datas.vendorName).trigger('change');
                   
                    $('#vehicleNo').val(obj.datas.vehicleNo).trigger('change');
                    $('#driverName').val(obj.datas.driverName).trigger('change');
                    $('#unloadingSupervisorName').val(obj.datas.unloadingSupervisorName).trigger('change');
                    $('#startkm').val(obj.datas.startkm);
                    $('#endkm').val(obj.datas.endkm);
                     $('#marketHireAmount').val(obj.datas.marketHireAmount);
                    $('#advanceToBePaid').val(obj.datas.advanceToBePaid);
                    $('#paymentMode').val(obj.datas.paymentMode);
                    $('#advanceType').val(obj.datas.advanceType);
                    $('#pickupPersonName').val(obj.datas.pickupPersonName).trigger('change');
                    $('#remark').text(obj.datas.remark);
                    
                  
                }
                else{
                    alert('No Pickup Scan No. Found');
                    $("#PickupId").val('');
                   $('.docketNo').val('');
                    $('#scanDate').val('');

                    $('#vehicleType').val('').trigger('change');
                    $('#vendorName').val('').trigger('change');
                    $('#vehicleNo').val('').trigger('change');
                    $('#driverName').val('').trigger('change');
                    $('#startkm').val('');
                    $('#endkm').val('');
                     $('#marketHireAmount').val('');
                    $('#advanceToBePaid').val('');
                    $('#paymentMode').val('');
                    $('#advanceType').val('');
                    $('#unloadingSupervisorName').val('').trigger('change');
                    $('#pickupPersonName').val('').trigger('change');
                    $('#remark').text('');
                }
            }
        });
  }

  function printpickup(){
   
    var base_url = '{{url('')}}';
    var PickupNo = $("#printNo").val();
     $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/EditPickupScanPrint',
           cache: false,
           data: {
           'PickupNo':PickupNo
           }, 
            success: function(data) {
                if(data){
                   //  window.frames["printf"].print();
                    var newWin = window.frames["printf"];
                    newWin.document.write('<body onload="window.print()">'+data+'</body>');
                    newWin.document.close();
                }
                else{
                    alert('No Pickup Scan No. Found');
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


            if($("#vehicleNo").val()=='')
           {
              alert('please Select vehicle No');
              return false;
           }
            if($("#driverName").val()=='')
           {
              alert('please Select driver Name');
              return false;
           }
           
            if($("#unloadingSupervisorName").val()=='')
           {
              alert('please Enter Unloading Supervisor');
              return false;
           }
           if($("#pickupPersonName").val()=='')
           {
              alert('please Enter Pickup Person Name');
              return false;
           }


           if($("#startkm").val()=='')
           {
              alert('please Enter Start KM');
              return false;
           }

           if($("#endkm").val()=='')
           {
              alert('please Enter End KM');
              return false;
           }

           if(parseInt($("#startkm").val()) >= parseInt($("#endkm").val()))
           {
             alert('Please Check KM');
              return false;
           }
          var pickupId =  $("#PickupId").val();

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
           url: base_url + '/PostEditPickupScan',
           cache: false,
           data: {
           'scanDate':scanDate,'vehicleType':vehicleType,'vendorName':vendorName,'vehicleNo':vehicleNo,'driverName':driverName,'startkm':startkm,'endkm':endkm,'marketHireAmount':marketHireAmount,
            'unloadingSupervisorName':unloadingSupervisorName,
            'pickupPersonName':pickupPersonName,
            'remark':remark,
            'advanceToBePaid':advanceToBePaid,
            'paymentMode':paymentMode,

            'advanceType':advanceType,
            'pickupId':pickupId

            
       }, 
            success: function(data) {
                const obj = JSON.parse(data);
                $('.docketNo').attr('readonly', false);

                alert(obj.message);
                 $("#PickupId").val('');
                   $('.docketNo').val('');
                    $('#scanDate').val('');

                    $('#vehicleType').val('').trigger('change');
                    $('#vendorName').val('').trigger('change');
                    $('#vehicleNo').val('').trigger('change');
                    $('#driverName').val('').trigger('change');
                    $('#startkm').val('');
                    $('#endkm').val('');
                     $('#marketHireAmount').val('');
                    $('#advanceToBePaid').val('');
                    $('#paymentMode').val('');
                    $('#advanceType').val('');
                    $('#unloadingSupervisorName').val('').trigger('change');
                    $('#pickupPersonName').val('').trigger('change');
                    $('#remark').text('');
                // $('.pickupIn').text(obj.data);
                // $('.pickup').val(obj.LastId);

            
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


function KiloMiterCheck(){
    if(parseInt($("#startkm").val()) >= parseInt($("#endkm").val()))
           {
             alert('Please Check KM');
              $("#endkm").val('');
              $("#endkm").focus();
    }
}



</script>