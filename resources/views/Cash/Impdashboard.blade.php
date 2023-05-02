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
                                                    @foreach($ExpDetail as $EmpList)
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{$EmpList->DepoName}}</h5>
                                                           
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{$EmpList->TotalDebit}}</h5>
                                                            
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{$EmpList->TotalCredit-$EmpList->TotalDebit}}</h5>
                                                            
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">{{$EmpList->Budget}}</h5>
                                                           
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                  

                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            

                            </div> <!-- end col -->
                        </div>
                     </div>
                 </div>
              
