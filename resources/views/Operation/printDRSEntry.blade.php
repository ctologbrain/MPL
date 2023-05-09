<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
         </style>
        <body style="margin:10px;">
            <div>
              
                <div style="width:40%;display: inline-block;vertical-align:top;">
                      <?php
                      $path ='assets/images/Metrologo.png';
                      $type = pathinfo($path, PATHINFO_EXTENSION);
                      $data = file_get_contents($path);
                      $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                      ?>
                      <img src="<?php echo $base64?>" width="70%"/>
                </div>
                <h2 style="display: inline-block;margin-left: 5%;font-size: 20px;width: 50%;text-align: left;vertical-align:top;">@isset($DRSdata[0]->OfficeCode) {{$DRSdata[0]->OfficeName}} @endisset</h2>
             
              <div style="margin-bottom: 5px;">
                <div style="display: inline-block;vertical-align: top;width: 65%;">
                  <h4 style="text-align: left;">Delivery Run Sheet</h4>
                  <h5 style="text-align: left;">@isset($DRSdata[0]->OfficeCode) {{$DRSdata[0]->OfficeCode}} {{$DRSdata[0]->OfficeName}} @endisset</h5>
                  <h5 style="text-align: left;">Delivery Representative: Randhir Kumar Jha (7549431071)</h5>
                  <h5 style="text-align: left;">Driver Name:@isset($DRSdata[0]->DriverName) {{$DRSdata[0]->DriverName}} @endisset</h5>
                  <h5 style="text-align: left;">Vehicle No: @isset($DRSdata[0]->VehicleNo) {{$DRSdata[0]->VehicleNo}} @endisset  Ewaybill No.: 7945124112  </h5>
                </div>
                <div style="display: inline-block;vertical-align: top;width:25%;">
                   <h5 style="text-align: left;"><div style="display: inline-block;vertical-align: top;width:65%;">Branch Code:</div> <div style="display: inline-block;vertical-align: top;"> @isset($DRSdata[0]->OfficeCode) {{$DRSdata[0]->OfficeCode}} @endisset</div></h5>
                  <h5 style="text-align: left;"><div style="display: inline-block;vertical-align: top;width:65%;">Date:</div> <div style="display: inline-block;vertical-align:top;">@isset($DRSdata[0]->Delivery_Date) {{date("d-m-Y H:i:s",strtotime($DRSdata[0]->Delivery_Date))}} @endisset</div></h5>
                  <h5 style="text-align: left;"><div style="display: inline-block;vertical-align: top;width:65%;">DRS No.:</div> <div style="display: inline-block;vertical-align: top;"> @isset($DRSdata[0]->DRS_No) {{$DRSdata[0]->DRS_No}} @endisset</div> </h5>
                  
                </div>
              </div>
            
                <table style="width: 100%;border-collapse: collapse;font-size: 12px;">
                  <tr>
                      <td style="padding:5px;border:1px solid #000;width: 5%;text-align: center;"><b>Sr.</b></td>
                      <td style="padding:5px;border:1px solid #000;width: 20%;text-align: center;"><b>Docket No.</b></td>
                      <td style="padding:5px;border:1px solid #000;width: 5%;text-align: center;"><b>Pcs.</b></td>
                      <td style="padding:5px;border:1px solid #000;width: 10%;text-align: center;"><b>Weight</b></td>
                      <td style="padding:5px;border:1px solid #000;width: 10%;text-align: center;"><b>Origin</b></td>
                      <td style="padding:5px;border:1px solid #000;width: 20%;text-align: center;"><b>Consignee Detail</b></td>
                      <td style="padding:5px;border:1px solid #000;width: 10%;text-align: center;"><b>Type</b></td>
                      <td style="padding:5px;border:1px solid #000;width: 20%;text-align: center;"><b>Reciever Signature</b></td>
                  </tr>  
                  <?php $i=0; ?>
                  @foreach($DRSdata as $key)
                  <?php $i++; 
                  if($key->Booking_Type==1){
                    $booking="Credit";
                  }
                  else if($key->Booking_Type==2){
                    $booking="FOC";
                  }
                  else if($key->Booking_Type==3){
                    $booking="CASH";
                }
                else if($key->Booking_Type==4){
                    $booking="TO PAY";
                }
                else{
                    $booking="";
                }
                  ?>
                   <tr>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$i}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$key->Docket_No}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;"> {{$key->pieces}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$key->weight}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$key->Code}} ~ {{$key->CityName}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;"><b>{{$key->ConsigneeName}}</b> {{$key->City}} -  {{$key->Address1}} </td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$booking}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;"></td>

                  </tr>  
                  @endforeach
                 
                </table>
            
        
    </div>
    </body>

</html>