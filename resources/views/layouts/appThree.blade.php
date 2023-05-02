
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{$title}}</title>
         <meta name="csrf" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets/images/Metrologo50.png')}}">

        <!-- third party css -->
        <link href="{{url('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
         <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
           @extends('layouts.sideBar3')
             
           <footer class="footer text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                            <a href="{{url('home')}}" class="footer-btn text-dark">Admin</a>
                            <a href="{{url('AccountDashboard')}}" class="footer-btn text-dark">Billing</a>
                            <a href="{{url('CashDashboard')}}" class="footer-btn text-dark">Cash Managment</a>
                            <a href="{{url('OperationDashboard')}}" class="footer-btn text-dark">Operation</a>
                            </div>
                            <div class="col-md-3">
                            <p style="color:#000;font-weight: 600;"> © MPL - alpinedge.in</p>
                            </div>
                            <div class="col-md-3">
                                <div class="text-md-end footer-links">
                                   <i class="fa fa-facebook-square"></i>
                                   <i class="fa fa-twitter-square"></i>
                                   <i class="fa fa-youtube-square"></i>
                                   <i class="fa-solid fa-wifi-square"></i>
                                   <i class="fa fa-linkedin-square"></i>
                                   <i class="fa fa-google-plus-square"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                </div>
            </div>
 
        <div class="rightbar-overlay"></div>
         
 

        
       <script src="{{url('assets/js/vendor.min.js')}}"></script>
        <script src="{{url('assets/js/app.min.js')}}"></script>

        <!-- third party js -->
     
     <script src="{{url('assets/js/vendor/handlebars.min.js')}}"></script>
        <script src="{{url('assets/js/vendor/typeahead.bundle.min.js')}}"></script>

        <!-- Demo -->
        <script src="{{url('assets/js/pages/demo.typehead.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{url('assets/js/pages/demo.dashboard.js')}}"></script>
        <script src="{{url('public/js/custom.js')}}"></script>
        <script src="{{url('public/js/sweetalert2.all.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
               <script type="text/javascript">

$('select').select2();
</script>
        <!-- end demo js-->
    </body>
</html>