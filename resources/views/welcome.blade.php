<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <!-- Styles -->
        <style type="text/css">
            .widget-flat
            {
                text-align:center;
                background:#89bece;
               border: 1px solid #000;
             
            }
            
            .text-muted
            {
            color:#000 !important;
            font-weight:900 !important;
            font-size:19px !important;
            }
            .card-body {
    margin-top: 21px;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 0.5rem 1.5rem;
}
a:hover {
  background-color: yellow !important;
}
        </style></strong>
        <div class="container-fluid">
                  <br>  <br>  <br><br>  <br>  <br><br>  <br>  <br>
                    <div class="container-fluid">
                        <div class="row">
                             
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                           
                                        @else
                                           <script>
                                             var base_url = '{{url('')}}';
                                              location.href = base_url+'/login';

                                        </script>
                                       @endauth
                                    </div>
                                @endif
                                 <div class="col-xl-3 col-lg-12">
                              </div>
                            <div class="col-xl-5 col-lg-12">
                                   <div class="row">
                                    <div class="col-sm-6">
                                          <a href="{{url('home')}}">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                              
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Admin</h5>
                                                <h3 class="mt-3 mb-3"></h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                        </a>
                                    </div> <!-- end col-->

                                    <div class="col-sm-6">
                                         <a href="{{url('CashDashboard')}}">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                               
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Expenses</h5>
                                                <h3 class="mt-3 mb-3"></h3>
                                               
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                        </a>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->
                                           <div class="row">
                                    <div class="col-sm-6">
                                         <a href="http://45.79.127.225/employee">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                              
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">HR</h5>
                                                <h3 class="mt-3 mb-3"></h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                        </a>
                                    </div> <!-- end col-->

                                    <div class="col-sm-6">
                                         <a href="http://45.79.127.225/Stock">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                               
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Stock</h5>
                                                <h3 class="mt-3 mb-3"></h3>
                                               
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                        </a>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->
                        </div> <!-- end col -->

                        <!-- end col -->
                        </div>
                     </div>
                 </div>
              
