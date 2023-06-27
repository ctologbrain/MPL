<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
         </style>
        <body style="margin:20;">
<div style="border:1px solid #000;">
        <h2 style="text-align:center;">Frieght Payment Memo</h2>
        
           
                <div style="width:40%;margin-bottom: 20px;margin-left: 10px;">
                    <?php
                    $path ='assets/images/Metrologo.png';
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>
                    <img src="<?php echo $base64?>" width="100%"/>
                </div>
           
            <div style="margin-left: 10px;"><b>Corporate Office:</b>{{$lastid->OfficeAddress}} - {{$lastid->PinCode}}</div>
            <div style="margin-left: 10px;">
                <b>Ph.: </b> {{$lastid->PhoneNo}} <b>Mob.: </b>{{$lastid->MobileNo}} <b>Web:</b> WWW.METROPOLISLOGISTICS.COM <b>Email:</b> {{$lastid->EmailID}}
            </div>
            <div style="margin-bottom: 20px;margin-left: 10px;">
                <b>GSTIN:</b> {{$lastid->GSTNo}} <b>PAN No.:</b> 
            </div>
            
                <table style="width: 100%;border-collapse: collapse;">
                  <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>FPM No.</b></td>
                      <td style="padding:10px;text-align: left;border:1px solid #000;">{{$lastid->FPMNo}}</td>
                      <td style="padding:10px;text-align: right;border:1px solid #000;"><b>Date</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:1px solid #000;">{{date("d-m-Y H:i",strtotime($lastid->Fpm_Date))}}</td>
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Origin</b></td>
                      <td style="padding:10px;">{{$lastid->SourceCity}}</td>
                      <td style="padding:10px;border:1px solid #000;text-align: right;"><b>Destination</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:1px solid #000;">{{$lastid->DestCity}}</td>
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Vendor Name & PAN</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align: left;">{{$lastid->VendorName}} ({{$lastid->Gst}})</td>
                      <td style="padding:10px;border:1px solid #000;text-align: right;"><b>Distance</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:1px solid #000;">0</td>
                  </tr>  
                   <tr style="background-color: #ddd;">
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 0px solid #000;text-align: center;" colspan="2"><b>Vehicle Details</b></td>
                      
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 0px solid #000;text-align: center;" colspan="2"><b>Customer Details</b></td>
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Vehicle Model</b></td>
                      <td style="padding:10px;border-top:0px solid #000;text-align:left;border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000;">{{$lastid->VehicleType}}</td>
                      <td style="padding:10px;vertical-align: top;border:0px solid #000;text-align:left;" rowspan="6"><b>Customer Name <br>& Address</b></td>
                        <td style="padding:10px;text-align: left;border-top:0px solid #000;border-left:1px solid #000;border-bottom: 0px solid #000;border-right:1px solid #000;vertical-align: top;" rowspan="6"><b>Address:</br>
                        City:</br>
                        State:</br>
                        GSTIN:</br>
                        PAN No.:</b></td>
                      
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Reporting Date & Time</b></td>
                      <td style="padding:10px;border-top:0px solid #000;text-align:left;border-right: 1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;">{{date("d-m-Y H:i",strtotime($lastid->Reporting_Time))}}</td>
                     
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Vehicle Loaded Date</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align:left;">{{date("d-m-Y",strtotime($lastid->vehcile_Load_Date))}}</td>
                    
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Driver Name</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align:left;">{{$lastid->DriverName}}</td>
                    
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Vehicle Number</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align:left;">{{$lastid->VehicleNo}}</td>
                    
                  </tr>  
                  <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Advance Paid To Driver</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align:left;">{{$lastid->AdvToBePaid}}</td>
                    
                  </tr>  
                  <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Advance Type</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align:left;">{{$lastid->AdvType}}</td>
                      <td style="padding:10px;border:1px solid #000;"><b>Total Weight</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:1px solid #000;">{{$lastid->Weight}}</td>
                  </tr>  
                  <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Remarks</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:1px solid #000;" colspan="3">{{$lastid->Remark}}</td>
                     
                  </tr> 
                  <tr style="background-color: #ddd;text-align: center;">
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 0px solid #000;text-align: center;" colspan="4"><b>To be filled by Metropolis Logistics Pvt Ltd Team</b></td>
                      
                      
                  </tr> 
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Way Bill No</b></td>
                      <td style="padding:10px;border-left: 1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align:left;"></td>
                      <td style="padding:10px;border-left: 1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align:right;"><b></b></td>
                      <td style="padding:10px;text-align: left;border-top:0px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:0px solid #000;"></td>
                  </tr> 
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Dispatch Date</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align:left;"></td>
                      <td style="padding:10px;border:1px solid #000;text-align:right;"><b>Dispatch Time</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:0px solid #000;"></td>
                  </tr>   
                  <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Weight</b></td>
                      <td style="padding:10px;border:1px solid #000;text-align:left;"></td>
                      <td style="padding:10px;border:1px solid #000;text-align:right;"><b>Pieces</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:0px solid #000;"></td>
                  </tr>  
                   <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;"><b>Vehicle Seal</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:0px solid #000;" colspan="3"></td>
                      
                  </tr>  
                  <tr>
                      <td style="padding:10px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom: 1px solid #000;text-align: right;vertical-align: top;height: 60px;"><b>Remarks</b></td>
                      <td style="padding:10px;text-align: left;border-top:1px solid #000;border-left:1px solid #000;border-bottom: 1px solid #000;border-right:0px solid #000;vertical-align: top;height: 60px;" colspan="3"></td>
                     
                  </tr> 
                  <tr>
                      <td style="padding:10px;" colspan="4">
                        <div>
                           <div><b>Prepared By </b>{{$lastid->name}}</div>
                         
                        </div>
                        </td>
                     
                      
                  </tr>   
                </table>
            
        
    </div>
    </body>

</html>