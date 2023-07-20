@include('layouts.appThree')
<style>
  #year,#date{
    width:99%;
  }
  .mr-1{
    margin-right:8px;
  }
  </style>
<div class="generator-container allLists">
   
    <div class="row pl-pr">
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
                                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <b><a href="{{'FreightErrorDashboard'}}" class="colorblcak">{{$error}}</a></b>
                                                          </div>
                                                            <p class="text-center"><b>ERROR</b></p>
                                                       </div>
                                                     

                                                     
                                                       <div class="header-part btn-danger">
                                                        <div class="border-bottom mb-1"> 
                                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <b><a href="{{url('PendingShipmentBillDashboard')}}" class="colorblcak">{{$PendingBilling}}({{$sumCount}})</a></b>
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
                                               <label class="col-md-3"><b class="text-dark">Month Wise Sale of Office:</b></label>
                                               <div class="col-md-2 mr-1"> 
                                               <select name="office" id="office" class="form-control selectBox">
                                                  <option value="">--select--</option>
                                                  @foreach($office as $officeDetails)
                                                  <option value="{{$officeDetails->id}}">{{$officeDetails->OfficeName}}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                             
                                              <div class="col-md-1 mr-1"> 
                                                <select class="form-control" class="year" id="year" name="year">
                                                  <option value="{{date('Y')-1}}" >{{date('Y')-1}}</option>
                                                  <option value="{{date('Y')}}" selected>{{date('Y')}}</option>
                                                 
                                                 
                                                </select>
                                              </div>
                                               <div class="col-md-4"> 
                                                <input type="checkbox" class="credit" id="credit" name="credit[]" value="1" checked/> Credit
                                                <input type="checkbox" class="credit" id="cash" name="credit[]" value="2" checked/> Cash
                                                <input type="checkbox" class="credit" id="topay" name="credit[]" value="3"/> Topay
                                                <input type="checkbox" class="credit" id="gst" name="credit[]" value="4"/> GST

                                                <button type="button" class="btn btn-primary" onclick="getChardData()">GO</button>
                                              </div>
                                              </div>


                                              <!-- Graph bar -->
                                              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                             <main class="container main_cashCredit">
                                            </main>
                                                                                          
                                           </div>

                                           
                                              <div class="row">
                                                
                                              <div class="bar-header d-flex align-items-center mt-2 p-1">
                                               <label class="col-md-3"><b class="text-dark">Day Wise Sale of Office:</b></label>
                                             
                                               <div class="col-md-2 mr-1"> 
                                               <select name="offices" id="offices" class="form-control selectBox">
                                                  <option value="">--select--</option>
                                                  @foreach($office as $officeDetails)
                                                  <option value="{{$officeDetails->id}}">{{$officeDetails->OfficeName}}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="col-md-2 mr-1"> 
                                               <select class="form-control selectBox" class="momthv" id="momthv" name="momthv">
                                                        <option value="1" @if(date("n")==1){{'selected'}}@endif>January</option>
                                                        <option value="2" @if(date("n")==2){{'selected'}}@endif>February</option>
                                                        <option value="3" @if(date("n")==3){{'selected'}}@endif>March</option>
                                                        <option value="4" @if(date("n")==4){{'selected'}}@endif>April</option>
                                                        <option value="5" @if(date("n")==5){{'selected'}}@endif>May</option>
                                                        <option value="6" @if(date("n")==6){{'selected'}}@endif>June</option>
                                                        <option value="7" @if(date("n")==7){{'selected'}}@endif>July</option>
                                                        <option value="8" @if(date("n")==8){{'selected'}}@endif>August</option>
                                                        <option value="9" @if(date("n")==9){{'selected'}}@endif>September</option>
                                                        <option value="10" @if(date("n")==10){{'selected'}}@endif>October</option>
                                                        <option value="11" @if(date("n")==11){{'selected'}}@endif>November</option>
                                                        <option value="12" @if(date("n")==12){{'selected'}}@endif>December</option>
                                                      </select>
                                              </div>
                                              <div class="col-md-1 mr-1"> 
                                                <select class="form-control" class="years" id="years" name="years">
                                                  <option value="{{date('Y')-1}}" >{{date('Y')-1}}</option>
                                                  <option value="{{date('Y')}}" selected>{{date('Y')}}</option>
                                                 
                                                 
                                                </select>
                                              </div>
                                               <div class="col-md-4"> 
                                                <input type="checkbox" class="credits" id="credit" name="credit[]" value="1" checked/> Credit
                                                <input type="checkbox" class="credits" id="cash" name="credit[]" value="2" checked/> Cash
                                                <input type="checkbox" class="credits" id="topay" name="credit[]" value="3"/> Topay
                                                <input type="checkbox" class="credits" id="gst" name="credit[]" value="4"/> GST

                                                <button type="button" class="btn btn-primary" onclick="getChardDataTwo()">GO</button>
                                              </div>
                                              </div>


                                              <!-- Graph bar -->
                                              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                             <main class="container main_cashCreditTwo">
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

<script>
  $('.selectBox').select2();
  function getChardData(office='',year='',val=''){ 
  
  var val = [];
  var office=$('#office').val();
  var year=$('#year').val();
   $('.credit:checked').each(function(i){
          val[i] = $(this).val();
        }); 
 
  var base_url='{{url('')}}'
             $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: base_url + '/GateSaleDataForChart',
            cache: false,
           data: {
           'office':office,'year':year,'val':val
           },
            success: function(datas) {
            $('.main_cashCredit').html(datas);
    }
            });
  
}
function getChardDataTwo(offices='',years='',vals='',months=''){ 
  
  var vals = [];
  var offices=$('#offices').val();
  var years=$('#years').val();
   $('.credits:checked').each(function(i){
          vals[i] = $(this).val();
        }); 
        var months=$('#momthv').val();
  var base_url='{{url('')}}'
             $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: base_url + '/GateSaleDataForChartTwo',
            cache: false,
           data: {
           'office':offices,'year':years,'val':vals,'months':months
           },
            success: function(datasp) {
            $('.main_cashCreditTwo').html(datasp);
    }
            });
  
}
window.onload = function () {
  var val = [];
  var office=$('#office').val();

  var year=$('#year').val();
   $('.credit:checked').each(function(i){
          val[i] = $(this).val();
        });
  var vals = [];
  var offices=$('#offices').val();
  var years=$('#years').val();
  var months=$('#momthv').val();
   $('.credits:checked').each(function(i){
          vals[i] = $(this).val();
        });
     getChardData(office,year,val);
     getChardDataTwo(offices,years,vals,months);
     
  }
</script>


