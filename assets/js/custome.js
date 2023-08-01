$('.selectBox').select2();
$('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      language: 'es' ,
      autoclose:true
  });
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
function EnterDocket(Docket,base_url)
{
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
function genrateNO(base_url){
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
       if(startkm > endkm)
       {
         alert('please Check KM');
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
        if(vehicleType=="Market Vehicle")
        {
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
    function getVendorVehicle(id,base_url)
{
  
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