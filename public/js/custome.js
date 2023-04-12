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
$('.DrvierNamesearch').select2({
    placeholder: "",
    language: {
            inputTooShort: function(args) {
                return "";
            }
        },
    allowClear: false,
    ajax: {
      url:'GetDriverDetailsForSearch',
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