<!DOCTYPE html>
<html>
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
         
         html {
         line-height: 1;
         }
         .panel-body {
           padding: 5px;
           padding-bottom: 0;
        }
        
         

         .table {

    width: 100%;

    max-width: 100%;

    margin-bottom: 0px;

}
table td{
    width: 25%;
    padding: 10px;
}
         .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {

         border-color: #b9b5b5 !important;

         border-width: 1px;

         }
       

         .h3design {

           background: #e5e5e5 !important;

           border-bottom: 1px solid #333;

           padding-bottom: 9px;

           border-top: 1px solid #333;

           padding-top: 10px;

           margin-bottom: 0px;

         }
         .text-end{
            text-align: right;
         }

         .textdesign

         {

         font-weight: 600;

         }

         .row {

         margin-right: -5px !important;

         margin-left: -9px !important;

         }

         .btndesign

         {

         margin-left: 86px;

         padding-right: 14px;

         }

         .tabledes

         {

         padding-left: 1px !important;

         padding-right: 0px !important;

         /*border: 1px solid #000;*/

         }

         #memo {

         padding-top: 20px;

         margin: 0 110px 0 60px;

         border-bottom: 1px solid #ddd;

         height: auto;

         padding-bottom: 10px;

         }

         #memo .logo {

         float: left;

         margin-right: 30px;

         margin-top:10px;

         }

         #memo .logo img {

         width: 150px;

         height: 100px;

         }

         #memo .company-info {

         float: right;

         text-align: right;

         }

         #memo .company-info > div:first-child {22-08-2020

         line-height: 1em;

         font-weight: bold;

         font-size: 22px;

         color: #3c8dbc;

         }

         #memo .company-info span {

         font-size: 11px;

         display: inline-block;

         min-width: 20px;

         margin-top:10px;

         margin-left:5px;

         }

         #memo:after {

         content: '';

         display: block;

         clear: both;

         }

         header {

         display: none

         }
        @media print {

         a[href]:after {

         content: none !important;

         }

         }

         @media print {

    .footer,

    #non-printable {

        display: none !important;

    }

    #printable {

        display: block;

    }

}

         h3

         {

         padding-bottom: 10px;

         }

         .col-sm-12, .col-sm-8, .col-sm-6,.col-sm-4{

            padding-top:5px;

            padding-bottom: 5px;

         }

         tfoot tr td{

            text-align: right!important;

            padding-right: 10px!important;

            font-weight: 800;

         }

         .invoice_stamp {

           margin-top: 3rem;

           margin-bottom: 1rem;

        }

        .invoice_stamp strong{

         margin-left: 5px;

        }

        label {

           font-weight: 600;

        }

        thead {display: table-header-group;}

       tfoot {display: table-header-group;}
       .totalCalcu
       {
          
    text-align: center !important;

       }

       .fright-memo{
  border: 1px solid #000 !important;
  margin: 20px;
  padding: 10px;
}
.fright-table td{
  font-size: 18px !important;
  color: #000;
  font-weight: 400;
}
.fright-detail {
    font-size: 18px;
    color: #000;
    margin-left: 15px;
}
.fright-memo .bg-grey{
  background-color: #ddd;
}
.fright-table .bdr-left{
  border-left: none;
  border-left-width: 0px;
}
.fright-table .bdr-top{
  border-top: none;
  border-top-width: 0px;
}
.fright-table .bdr-right{
  border-right: none;
  border-right-width: 0px;
}
.fright-table .bdr-btm{
  border-bottom: none !important;
}
.fright-memo .logo-lg img{
    max-width: 100%;
}
.fright-memo .logo-lg{
width: 30%;
margin-bottom: 20px;
}
.fright-memo .d-flex{
    display: flex;
    justify-content: space-between;
}
.fright-memo .mb-3{
    margin-bottom: 20px;
}

      </style>
<div class="container-fluid fright-memo">
        <h2 class="text-center text-dark mt-3">Frieght Payment Memo</h2>
        <div class="row">
            <div class="col-4 mb-3">
                <div class="logo-lg">
                <?php
                $path ='assets/images/Metrologo.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                ?>
                <img src="<?php echo $base64?>" width="100%"/>
                    </div>
            </div>
            <div class="col-12 fright-detail"><b>Corporate Office:</b> K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR NEW DELHI-110037</div>
            <div class="col-12 fright-detail">
                <b>Ph.:</b> <b>Mob.:</b> <b>Web:</b> WWW.METROPOLISLOGISTICS.COM <b>Email:</b>
            </div>
            <div class="col-12 mb-3 fright-detail">
                <b>GSTIN:</b> 07AAHCM7482L1ZU <b>PAN No.:</b> AAHCM7482L
            </div>
            
                <table class="table-responsive table-bordered w-100 fright-table">
                  <tr>
                      <td class="p-2 text-end w-25 bdr-left"><b>FPM No.</b></td>
                      <td class="p-2 text-start w-25">{{$lastid->FPMNo}}</td>
                      <td class="p-2 text-end w-25"><b>Date</b></td>
                      <td class="p-2 text-start bdr-right w-25">{{$lastid->Fpm_Date}}</td>
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Origin</b></td>
                      <td class="p-2 text-start">{{$lastid->SourceCity}}</td>
                      <td class="p-2 text-end"><b>Destination</b></td>
                      <td class="p-2 text-start bdr-right">{{$lastid->DestCity}}</td>
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Vendor Name & PAN</b></td>
                      <td class="p-2 text-start">{{$lastid->VendorName}} ({{$lastid->Gst}})</td>
                      <td class="p-2 text-end"><b>Distance</b></td>
                      <td class="p-2 text-start bdr-right">283.00</td>
                  </tr>  
                   <tr class="bg-grey">
                      <td class="p-2 text-center bdr-left bdr-btm" colspan="2"><b>Vehicle Details</b></td>
                      
                      <td class="p-2 text-center bdr-btm bdr-right" colspan="2"><b>Customer Details</b></td>
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Vehicle Model</b></td>
                      <td class="p-2 text-start">{{$lastid->VehicleType}}</td>
                      <td class="p-2 text-end" rowspan="6"><b>Customer Name & Address</b></td>
                        <td class="p-2 text-start bdr-right" rowspan="6"><b>Address:</br>
                        City:</br>
                        State:</br>
                        GSTIN:</br>
                        PAN No.:</b></td>
                      
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Reporting Date & Time</b></td>
                      <td class="p-2 text-start bdr-right">{{$lastid->Reporting_Time}}</td>
                     
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Vehicle Loaded Date</b></td>
                      <td class="p-2 text-start">{{$lastid->vehcile_Load_Date}}</td>
                    
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Driver Name</b></td>
                      <td class="p-2 text-start bdr-right">{{$lastid->DriverName}}</td>
                    
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Vehicle Number</b></td>
                      <td class="p-2 text-start bdr-right">{{$lastid->VehicleNo}}</td>
                    
                  </tr>  
                  <tr>
                      <td class="p-2 text-end bdr-left"><b>Advance Paid To Driver</b></td>
                      <td class="p-2 text-start bdr-right">0.00</td>
                    
                  </tr>  
                  <tr>
                      <td class="p-2 text-end bdr-left"><b>Advace Type</b></td>
                      <td class="p-2 text-start"></td>
                      <td class="p-2 text-end"><b>Total Weight</b></td>
                      <td class="p-2 text-start bdr-right">{{$lastid->Weight}}</td>
                  </tr>  
                  <tr>
                      <td class="p-4 text-end bdr-left"><b>Remarks</b></td>
                      <td class="p-4 text-start bdr-right" colspan="3">{{$lastid->Remark}}</td>
                     
                  </tr> 
                  <tr class="bg-grey">
                      <td class="p-2 text-center bdr-left bdr-btm bdr-right" colspan="4"><b>To be filled by Metropolis Logistics Pvt Ltd Team</b></td>
                      
                      
                  </tr> 
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Way Bill No</b></td>
                      <td class="p-2 text-start"></td>
                      <td class="p-2 text-end"><b></b></td>
                      <td class="p-2 text-start bdr-right"></td>
                  </tr> 
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Dispatch Date</b></td>
                      <td class="p-2 text-start"></td>
                      <td class="p-2 text-end"><b>Dispatch Time</b></td>
                      <td class="p-2 text-start bdr-right"></td>
                  </tr>   
                  <tr>
                      <td class="p-2 text-end bdr-left"><b>Weight</b></td>
                      <td class="p-2 text-start"></td>
                      <td class="p-2 text-end"><b>Pieces</b></td>
                      <td class="p-2 text-start bdr-right"></td>
                  </tr>  
                   <tr>
                      <td class="p-2 text-end bdr-left"><b>Vehicle Seal</b></td>
                      <td class="p-2 text-start bdr-right" colspan="3"></td>
                      
                  </tr>  
                  <tr>
                      <td class="p-4 text-end bdr-left"><b>Remarks</b></td>
                      <td class="p-4 text-start bdr-right" colspan="3"></td>
                     
                  </tr> 
                  <tr>
                      <td class="p-2 text-start bdr-left bdr-right bdr-btm" colspan="4">
                        <div class="d-flex justify-content-between">
                           <div class="text-start"><b>Prepared By </b>{{$lastid->name}}</div>
                         
                        </div>
                        </td>
                     
                      
                  </tr>   
                </table>
            
        </div>
    </div>
    </body>

</html>