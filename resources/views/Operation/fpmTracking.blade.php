@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    
                </div>
                <h4 class="page-title">FPM TRACKING</h4>
                <div class="text-start fw-bold blue_color left-content">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card fpm_tracking">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                               <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row pl-pr">
                                        
                                           <div class="col-12">
                                               <div class="row">
                                                   <table class="table-responsive docket_tracking">
                                                       <tr>
                                                        <td colspan="4">
                                                            <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-3">FPM NUMBER </div>
                                                                <div class="col-4">
                                                                <input type="text" tabindex="1" class="form-control fpm_no" name="fpm_no" id="fpm_no">
                                                                </div>
                                                                <div class="col-3">
                                                                    <button type="button" class="btn btn-primary" onclick="EnterFPM();">Go</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </td>
                                                      
                                                        
                                                       </tr>
                                                       <tr>
                                                        <td class="back-color d11">FPM Date</td>
                                                        <td class="d12" id="fpmDate"></td>
                                                        <td class="back-color d13">Customer Name</td>
                                                        <td class="d14" id="customerName"></td>
                                                       
                                                       </tr>
                                                       <tr>
                                                        <td class="back-color d11">Origin City</td>
                                                        <td  id="originCity" class="d12"></td>
                                                        <td class="back-color d13">Destination City</td>
                                                        <td class="d14" id="destCity"></td>
                                                        
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">Vendor Name</td>
                                                        <td id="vendorName" class="d12"></td>
                                                       
                                                        <td class="back-color d13">Driver Name</td>
                                                        <td id="driverName" class="d14"></td>
                                                        
                                                       </tr>
                                                        <tr>
                                                        <td  class="back-color d11">Vechile Model</td>
                                                        <td id="vehicleMode" class="d12"></td>
                                                       
                                                        <td class="back-color d13">Reporting Date Time</td>
                                                        <td id="ReportDate" class="d14"></td>
                                                       
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">Loaded Date</td>
                                                        <td id="loadedDate" class="d12"></td>
                                                       
                                                        <td class="back-color d15">Weight</td>
                                                        <td id="Weight" class="d14"></td>
                                                        
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">Remarks</td>
                                                        <td id="Remarks" class="d12"></td>
                                                       
                                                        <td class="back-color d13">FPM status</td>
                                                        <td id="FPMStatus" class="d14"></td>
                                                        
                                                       </tr>
                                                   </table>
                                                   
                                               </div>
                                           </div>   
                                           <div class="col-12"> 
                                            <div class="row">
                                              <div class="gatepass-details">
                                                  <div class="text-end">
                                                  <input type="button" tabindex="4" value="Export" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="genrateNO()">
                                                  </div>
                                              </div>
                                                <div class="table-responsive a">
                                                    <table class="table table-bordered table-centered mb-1 mt-1">
                                                            <thead>
                                                                <tr class="main-title text-dark">
                                                                
                                                                    <th class="p-1">SL#</th>
                                                                    <th class="p-1">Gatepass No.</th>
                                                                    <th class="p-1">GP Date</th>
                                                                    <th class="p-1">Customer Names</th>
                                                                    <th class="p-1">Origin City</th>
                                                                    <th class="p-1">Destination City</th>
                                                                    <th class="p-1">Vendor Name</th>
                                                                    <th class="p-1">Vehicle Model</th>
                                                                     <th class="p-1">Vehicle No</th>
                                                                </tr>
                                                            </thead> 
                                                            <tbody id="load">
                                                               
                                                                  <tr>
                                                                    <td class="p-1" colspan="8"></td>
                                                                </tr>
                                                            </tbody>
                                                    </table> 
                                                </div>
                                            
                                            </div>
                                          </div>
                                   </div>
                               </div>
                           </div>
                        </div> <!-- tab-content -->
                       
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
</div>




<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function EnterFPM()
  {
    var base_url = '{{url('')}}';
    var fpmNumber = $("#fpm_no").val();
    
  if(fpmNumber==''){
    alert('Please Enter FPM Number');
    $("#fpm_no").val('');
    $("#fpm_no").focus();
    $("#fpmDate").text('');
    $("#customerName").text('');
    $("#originCity").text('');
    $("#destCity").text('');
    $("#vendorName").text('');
    $("#driverName").text(''); 
    $("#vehicleMode").text('');
    $("#ReportDate").text('');
    $("#loadedDate").text('');
    $("#Weight").text('');
    $("#Remarks").text('');
    $("#FPMStatus").text('');  
    $("#load").html('');
  }
  else{
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/fpmTrackingData',
           cache: false,
           data: {
           'fpmNumber':fpmNumber
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status==1)
                {
                    if(obj.Fpmdatas.Status==2){
                        var status='Close';
                    }
                    else if(obj.Fpmdatas.Status==3){
                         status='Cancel';
                    }
                    else if(obj.Fpmdatas.Status==1){
                         status='Start';
                    }
                    else{
                         status='';
                    }
                    $("#fpm_no").val(obj.Fpmdatas.FPMNo);
                    $("#fpmDate").text(obj.Fpmdatas.Fpm_Date);
                    $("#customerName").text('-');
                    $("#originCity").text(obj.Fpmdatas.route_master_details.statrt_point_details.Code+'~'+obj.Fpmdatas.route_master_details.statrt_point_details.CityName);
                    $("#destCity").text(obj.Fpmdatas.route_master_details.end_point_details.Code+'~'+obj.Fpmdatas.route_master_details.end_point_details.CityName);
                    $("#vendorName").text(obj.Fpmdatas.vendor_details.VendorCode+'~'+obj.Fpmdatas.vendor_details.VendorName);
                    $("#driverName").text(obj.Fpmdatas.driver_details.DriverName);
                    $("#vehicleMode").text(obj.Fpmdatas.vehicle_model_details.VehicleType);
                    $("#ReportDate").text(obj.Fpmdatas.Reporting_Time);
                    $("#loadedDate").text(obj.Fpmdatas.vehcile_Load_Date);
                    $("#Weight").text(obj.Fpmdatas.Weight);
                    $("#Remarks").text(obj.Fpmdatas.Remark);
                    $("#FPMStatus").text(status);

                   // $('.docketNo').text(obj.Fpmdatas.id);
                    var html='';
                    $.each(obj.vehicleGatepass,function(a){
                        html+='<tr><td>'+parseInt(a+1)+'</td>';
                        html+='<a href="#"><td>'+obj.vehicleGatepass[a].GP_Number+'</td></a>';
                        html+='<td>'+obj.vehicleGatepass[a].GP_TIME+'</td>';
                        html+='<td>'+'-'+'</td>';
                        html+='<td>'+obj.vehicleGatepass[a].route_master_details.statrt_point_details.Code+'~'+obj.vehicleGatepass[a].route_master_details.statrt_point_details.CityName+'</td>';
                        html+='<td>'+obj.vehicleGatepass[a].route_master_details.end_point_details.Code+'~'+obj.vehicleGatepass[a].route_master_details.end_point_details.CityName+'</td>';
                        html+='<td>'+obj.vehicleGatepass[a].vendor_details.VendorCode+'~'+obj.vehicleGatepass[a].vendor_details.VendorName+'</td>';
                        html+='<td>'+obj.vehicleGatepass[a].vehicle_type_details.VehicleType+'</td>';
                        html+='<td>'+obj.vehicleGatepass[a].vehicle_details.VehicleNo+'</td>';
                        html+='</tr>';
                        ++a;
                    });
                    $('#load').html(html);
                }
                else{
                    alert('FPM Not Found');
                    $("#fpm_no").val('');
                    $("#fpm_no").focus();
                    $("#fpmDate").text('');
                    $("#customerName").text('');
                    $("#originCity").text('');
                    $("#destCity").text('');
                    $("#vendorName").text('');
                    $("#driverName").text(''); 
                    $("#vehicleMode").text('');
                    $("#ReportDate").text('');
                    $("#loadedDate").text('');
                    $("#Weight").text('');
                    $("#Remarks").text('');
                    $("#FPMStatus").text('');  
                    $("#load").html('');  
                 
                }
                
                

            
            }
            });
      }
  }

    

   

    

</script>