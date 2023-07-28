@include('layouts.appOne')
            <div class="generator-container allLists">
                     <div class="row">
                            <div class="col-12">
                                <div class="page-title-box main-title">

                                    <h4 class="page-title">{{$title}} </h4>
                                    

                                </div>
                            </div>
                        </div>
                    <div class="container-fluid">
                        <div class="row mt-1">
                            <div class="col-xl-5 col-lg-6">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Amount</h5>
                                                <h3 class="mt-3 mb-3">@if(isset($CashList->TotalCredit)){{$CashList->TotalCredit}}@else{{'0'}}@endif</h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-sm-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total Expenses</h5>
                                                <h3 class="mt-3 mb-3">@if(isset($CashList->TotalDebit)){{$CashList->TotalDebit}}@else{{'0'}}@endif</h3>
                                              
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->
                        </div> <!-- end col -->

                            <div class="col-xl-7 col-lg-6">
                           
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h4 class="header-title">Balance Details</h4>
                                            <a href="{{url('webadmin/DownloadCash')}}" class="btn btn-sm btn-link">Export <i class="mdi mdi-download ms-1"></i></a>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Office Name</th>
                                                        <th>Expenses</th>
                                                        <th>In Hand</th>
                                                        <th>Budget</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $totalDeb =0;
                                                $InHend =0;
                                                ?>
                                                    @foreach($ExpDetail as $EmpList)
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{$EmpList->OfficeCode}} ~ {{$EmpList->OfficeName}}</h5>
                                                           
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{number_format($EmpList->TotalDebit ,2,".","")}}</h5>
                                                            
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{number_format($EmpList->TotalCredit-$EmpList->TotalDebit,2,".","")}}</h5>
                                                            
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal"> </h5>
                                                           
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                    $totalDeb += number_format($EmpList->TotalDebit ,2,".","");
                                                    $InHend += number_format($EmpList->TotalCredit-$EmpList->TotalDebit,2,".","");
                                                    ?>
                                                    @endforeach
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">GRAND TOTAL</h5>
                                                           
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{number_format($totalDeb ,2,".","")}}</h5>
                                                            
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{number_format($InHend,2,".","")}}</h5>
                                                            
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal"> </h5>
                                                           
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            

                            </div> <!-- end col -->

                            <div class="col-xl-6 col-lg-6">
                           
                           <div class="card">
                               <div class="card-body">
                              
                               



                                <div class="row">
                                                
                                    <div class="bar-header d-flex align-items-center mt-2 p-1">
                                        <label class="col-md-3" ><b class="text-dark">Office Wise Expense Of:</b></label>
                                    
                                       
                                    <div class="col-md-2 mr-1"> 
                                        <select class="form-control selectBox" class="momth" id="momth" name="momth">
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
                                        <select class="form-control" class="years" id="years" name="years" style="width:100%;">
                                        <option value="{{date('Y')-1}}" >{{date('Y')-1}}</option>
                                        <option value="{{date('Y')}}" selected>{{date('Y')}}</option>
                                        
                                        
                                        </select>
                                    </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary" onclick="getExpenseChardData()">GO</button>
                                        </div>
                                    </div>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <main class="container main_Expanse">    
                                
                                    </main>      
                                </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            

                            </div> <!-- end col -->
                            </div>

                            <div class="col-xl-6 col-lg-6">
                           <div class="card">
                               <div class="card-body">
                              
                                <div class="row">
                                                
                                    <div class="bar-header d-flex align-items-center mt-2 p-1">
                                        <label class="col-md-3" ><b class="text-dark">Expence Account Wise Expense Of:</b></label>
                                    
                                       
                                    <div class="col-md-2 mr-1"> 
                                        <select class="form-control selectBox" class="momthTwo" id="momthTwo" name="momth">
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
                                        <select class="form-control" class="yearsTwo" id="yearsTwo" name="years" style="width:100%;">
                                        <option value="{{date('Y')-1}}" >{{date('Y')-1}}</option>
                                        <option value="{{date('Y')}}" selected>{{date('Y')}}</option>
                                        
                                        
                                        </select>
                                    </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary" onclick="getExpenseChardDataTwo()">GO</button>
                                        </div>
                                    </div>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <main class="container main_ExpanseTwo">    
                                
                                    </main>      
                                </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            

                            </div> <!-- end col -->
                            </div>
                        </div>
                     </div>
                 </div>
               

  <script>
 

  function getExpenseChardData(years='',months=''){
    var years=$('#years').val();
    var months=$('#momth').val();
    var base_url='{{url('')}}';
      $.ajax({
        type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content'),
                'Accept': 'application/json'
            },
            url: base_url + '/getExpenseChardData',
            cache: false,
            data: {
            'year':years,'months':months
            },
            success: function(datasp) {
                $('.main_Expanse').html(datasp);
            }

      });
  }


  function getExpenseChardDataTwo(years='',months=''){
    var years=$('#yearsTwo').val();
    var months=$('#momthTwo').val();
    var base_url='{{url('')}}';
      $.ajax({
        type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content'),
                'Accept': 'application/json'
            },
            url: base_url + '/getExpenseChardDataTwo',
            cache: false,
            data: {
            'year':years,'months':months
            },
            success: function(datasp) {
                $('.main_ExpanseTwo').html(datasp);
            }

      });
  }

  window.onload = function () {

  var vals = [];
  var years=$('#years').val();
  var months=$('#momth').val();
  getExpenseChardData(years,months);
  getExpenseChardDataTwo(years,months);
  }

  </script>               
                          
              
