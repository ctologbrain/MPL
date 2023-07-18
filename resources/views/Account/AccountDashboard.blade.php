@include('layouts.appThree')

<div class="generator-container allLists">
   
    <div class="row">
        <div class="col-xl-12">
            <div class="card sales_container">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                               <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    
                                          <div class="row">
                                             <div class="d-flex justify-content-between">
                                                 
                                                     
                                                     
                                                       <div class="header-part btn-primary">
                                                       
                                                          <div class="border-bottom mb-1"> 
                                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <b>286</b>
                                                          </div>
                                                            <p class="text-center"><b>ERROR</b></p>
                                                       </div>
                                                     

                                                     
                                                       <div class="header-part btn-danger">
                                                        <div class="border-bottom mb-1"> 
                                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <b>59482(242443580)</b>
                                                          </div>
                                                            <p class="text-center"><b>PENDING BILL</b></p>
                                                       </div>
                                                     
                                                     
                                                       <div class="header-part btn-warning">

                                                        <div class="border-bottom mb-1"> 
                                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <b>393922974</b>
                                                          </div>
                                                            <p class="text-center"><b>OVERDUE OUTSTANDING</b></p>
                                                        
                                                       </div>
                                                    
                                                     
                                                       <div class="header-part btn-secondary">

                                                         <div class="border-bottom mb-1"> 
                                                           <i class="fa fa-inr" aria-hidden="true"></i> <b>72/33</b>
                                                          </div>
                                                            <p class="text-center"><b>PENDING TOPAY/CASH</b></p>
                                                       
                                                       </div>
                                                     
                                                     
                                                       
                                                       <div class="header-part btn-info">

                                                         <div class="border-bottom mb-1"> 
                                                           <i class="fa fa-shopping-cart" aria-hidden="true"></i> <b>81926</b>
                                                          </div>
                                                            <p class="text-center"><b>SMS BALANCE</b></p>
                                                        
                                                       </div>

                                                       <div class="header-part btn-success">

                                                         <div class="border-bottom mb-1"> 
                                                           <i class="fa fa-envelope"></i> <b>124</b>
                                                          </div>
                                                            <p class="text-center"><b>TODAY SMS USED</b></p>
                                                        
                                                       </div>
                                                    
                                                     
                                                
                                             </div>
                                            
                                              <div class="bar-header d-flex align-items-center mt-2 p-1">
                                               <label><b class="text-dark">Day Wise Sale of Office:</b></label>
                                                <input type="text" class="form-control" name="wise_sale" id="wise_sale"/>
                                               
                                                <select class="form-control" class="date" id="date" name="date">
                                                  <option value="1">January</option>
                                                  <option value="1">February</option>
                                                  <option value="1">March</option>
                                                  <option value="1">April</option>
                                                  <option value="1">May</option>
                                                  <option value="1">June</option>
                                                  <option value="1">July</option>
                                                  <option value="1">August</option>
                                                  <option value="1">September</option>
                                                  <option value="1">October</option>
                                                  <option value="1">November</option>
                                                  <option value="1">December</option>
                                                </select>
                                            
                                                <select class="form-control" class="date" id="date" name="date">
                                                  <option value="1">2023</option>
                                                  <option value="1">2022</option>
                                                  <option value="1">2021</option>
                                                  <option value="1">2020</option>
                                                  <option value="1">2019</option>
                                                  <option value="1">2018</option>
                                                  <option value="1">2017</option>
                                                  <option value="1">2016</option>
                                                 
                                                </select>

                                                <input type="checkbox" class="credit" id="credit" name="credit"/> Credit
                                                <input type="checkbox" class="cash" id="cash" name="cash"/> Cash
                                                <input type="checkbox" class="tpoay" id="topay" name="topay"/> Topay
                                                <input type="checkbox" class="gst" id="gst" name="gst"/> GST

                                                <button type="button" class="btn btn-primary">GO</button>
                                             
                                              </div>


                                              <!-- Graph bar -->
                                             <main class="container main_cashCredit">
                                                
                                                <div class="sale_graph">
                                                  <h6>Sale</h6>
                                                  <canvas id="barChart"></canvas>
                                                  <h5>Day</h5>
                                                </div>
                                              </main>
                                                                                          
                                           </div>

                                           <div class="container">

                                              <div class="row">
                                                
                                                <div class="col-9">
                                                  <div class="bar-header d-flex align-items-center p-1">
                                                      <label><b class="text-dark">Day Wise Sale of Office:</b></label>
                                                      <input type="text" class="form-control" name="wise_sale" id="wise_sale"/>
                                                     
                                                      <select class="form-control" class="date" id="date" name="date">
                                                        <option value="1">January</option>
                                                        <option value="1">February</option>
                                                        <option value="1">March</option>
                                                        <option value="1">April</option>
                                                        <option value="1">May</option>
                                                        <option value="1">June</option>
                                                        <option value="1">July</option>
                                                        <option value="1">August</option>
                                                        <option value="1">September</option>
                                                        <option value="1">October</option>
                                                        <option value="1">November</option>
                                                        <option value="1">December</option>
                                                      </select>
                                                  
                                                      <select class="form-control" class="date" id="date" name="date">
                                                        <option value="1">2023</option>
                                                        <option value="1">2022</option>
                                                        <option value="1">2021</option>
                                                        <option value="1">2020</option>
                                                        <option value="1">2019</option>
                                                        <option value="1">2018</option>
                                                        <option value="1">2017</option>
                                                        <option value="1">2016</option>
                                                       
                                                      </select>

                                                      <input type="checkbox" class="credit" id="credit" name="credit"/> Credit
                                                      <input type="checkbox" class="cash" id="cash" name="cash"/> Cash
                                                      <input type="checkbox" class="tpoay" id="topay" name="topay"/> Topay
                                                      <input type="checkbox" class="gst" id="gst" name="gst"/> GST

                                                      <button type="button" class="btn btn-primary">GO</button>
                                               
                                                  </div>

                                                  <main class="container main_cashCredit">
                                                  
                                                    <div class="sale_graph">
                                                      <h6>Sale</h6>
                                                      <canvas id="barChartCC"></canvas>
                                                      <h5>Day</h5>
                                                    </div>
                                                  </main>

                                                </div>

                                                <div class="col-3">
                                                  <div class=" back-color p-1 text-center">
                                                  <label><b class="text-dark">TSP Balances</b></label>
                                                  
                                                 </div>

                                                  <div class=" back-color p-1 text-center mt-1">
                                                   
                                                    <label><b class="text-dark">Airline Tonnage</b></label>
                                                  </div>
                                                   </div>
                                                </div>

                                              </div>

                                             
                                         
                                                <div class="last_table">
                                                  <div class="col-12">
                                                      <div class="page-title-box main-title">
                                                          <div class="page-title-right">
                                                             
                                                          </div>
                                                          <h4 class="page-title">Customer Invoice Ageing</h4>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-12">
                                                      <div class="gatepass-details row">
                                                        <div class="col-8">
                                                          <div class="row">
                                                          <lable class="col-2" for="page_size"><b>Page Size:</b></lable>
                                                          <div class="col-2">
                                                            <select class="form-control page_size text-center" name="page_size" id="page_size" tabindex="1">
                                                              <option value="1">1</option>
                                                              <option value="2">2</option>
                                                              <option value="3">3</option>
                                                              <option value="4">4</option>
                                                              <option value="5">5</option>
                                                              <option value="6">6</option>
                                                              <option value="7">7</option>
                                                              <option value="8">8</option>
                                                              <option value="9">9</option>
                                                              <option value="10">10</option>
                                                              
                                                            </select>
                                                          </div>
                                                          <div class="col-3">
                                                            <button type="button" class="btn btn-primary" tabindex="2">Total Record: 559</button>
                                                          </div>
                                                          </div>
                                                        </div>
                                                          <div class="col-4 text-end">
                                                               
                                                          <input type="button" tabindex="3" value="Export" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="genrateNO()">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="col-md-12">
                                                     
                                                          <div class="table-responsive a">
                                                              <table class="table table-bordered table-centered mb-1 mt-1">
                                                                      <thead>
                                                                          <tr class="main-title text-dark">
                                                                          
                                                                              <th class="p-1" style="width:250px;">Customer Name</th>
                                                                              <th class="p-1"><=15</th>
                                                                              <th class="p-1">16-30</th>
                                                                              <th class="p-1">31-45</th>
                                                                              <th class="p-1">46-60</th>
                                                                              <th class="p-1">61-90</th>
                                                                              <th class="p-1">>90</th>
                                                                              <th class="p-1">Total</th>
                                                                          </tr>
                                                                      </thead> 
                                                                      <tbody>
                                                                      <tr>
                                                                          
                                                                              <td class="p-1"><a href="#">A W FABER CASTELL (INDIA) PRIVATE LIMITED</a></td>
                                                                              <td class="p-1">0.00</td>
                                                                              <td class="p-1">0.00 </td>
                                                                              <td class="p-1">0.00</td>
                                                                              <td class="p-1">0.00</td>
                                                                               <td class="p-1">0.00</td>
                                                                              <td class="p-1">1086510.96</td>
                                                                              <td class="p-1">1086510.96</td>
                                                                              
                                                                          
                                                                          </tr>
                                                                          <tr>
                                                                          
                                                                              <td class="p-1"><a href="#">A W FABER CASTELL (INDIA) PRIVATE LIMITED</a></td>
                                                                              <td class="p-1">0.00</td>
                                                                              <td class="p-1">2114918.27 </td>
                                                                              <td class="p-1">13476.78</td>
                                                                              <td class="p-1">1342874.52</td>
                                                                               <td class="p-1">0.00</td>
                                                                              <td class="p-1">1533630.29</td>
                                                                              <td class="p-1">1086510.96</td>
                                                                              
                                                                          
                                                                          </tr>
                                                                          <tr>
                                                                          
                                                                              <td class="p-1"><a href="#">A W FABER CASTELL (INDIA) PRIVATE LIMITED</a></td>
                                                                              <td class="p-1">0.00</td>
                                                                              <td class="p-1">0.00 </td>
                                                                              <td class="p-1">0.00</td>
                                                                              <td class="p-1">0.00</td>
                                                                               <td class="p-1">0.00</td>
                                                                              <td class="p-1">1086510.96</td>
                                                                              <td class="p-1">1086510.96</td>
                                                                              
                                                                          
                                                                          </tr>
                                                                      
                                                                          
                                                                                      
                                                                                  
                                                                                  
                                                                              </tbody>
                                                                          
                                                              </table> 
                                                          </div>
                                                     
                                                   </div>
                                                   <div class="col-md-12">
                                                      <div class="d-flex d-flex justify-content-between">
                                                       <nav>
                                                          <ul class="pagination">
                                                              
                                                                  <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                                                      <span class="page-link" aria-hidden="true">‹</span>
                                                                  </li>
                                                                  <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                                  <li class="page-item"><a class="page-link" href="http://localhost/MPL/docketbookingReport?page=2">2</a></li>
                                                                 <li class="page-item"><a class="page-link" href="http://localhost/MPL/docketbookingReport?page=3">3</a></li>
                                                                  <li class="page-item">
                                                                      <a class="page-link" href="http://localhost/MPL/docketbookingReport?page=2" rel="next" aria-label="Next »">›</a>
                                                                  </li>
                                                          </ul>
                                                       </nav>

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


  var ctx = document.getElementById("barChart").getContext('2d');
var barChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["1", "2", "3", "4", "5", "6", "7","8","9","10","11", "12", "13", "14", "15", "16"],
    datasets: [{

      label: 'Credit Sale',
      data: [ 20000, 40000, 60000, 80000, 100000, 20000, 40000, 60000, 80000, 100000],
      backgroundColor: "rgba(164, 175, 191)"
    }, {
      label: 'Cash Sale',
      data: [ 40000, 20000, 40000, 80000, 60000,  40000, 20000, 40000, 80000, 60000],
      backgroundColor: "rgba(105, 144, 199)"
    },
    {
      label: 'Topay Cash',
      data: [ 60000, 40000, 20000, 100000, 80000,  40000, 20000, 40000, 80000, 60000],
      backgroundColor: "rgba(220, 185, 237)"
    }]
  }
});

var ctx = document.getElementById("barChartCC").getContext('2d');
var barChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["1", "2", "3", "4", "5", "6", "7","8","9","10","11", "12", "13", "14", "15", "16"],
    datasets: [{

      label: 'Credit Sale',
      data: [ 20000, 40000, 60000, 80000, 100000, 20000, 40000, 60000, 80000, 100000],
      backgroundColor: "rgba(164, 175, 191)"
    }, {
      label: 'Cash Sale',
      data: [ 40000, 20000, 40000, 80000, 60000,  40000, 20000, 40000, 80000, 60000],
      backgroundColor: "rgba(105, 144, 199)"
    },
    {
      label: 'Topay Cash',
      data: [ 60000, 40000, 20000, 100000, 80000,  40000, 20000, 40000, 80000, 60000],
      backgroundColor: "rgba(220, 185, 237)"
    }]
  }
});

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