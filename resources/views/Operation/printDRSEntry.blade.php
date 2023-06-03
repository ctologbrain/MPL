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
                      <img src="<?php echo $base64?>" width="60%"/>
                </div>
                <h2 style="display: inline-block;margin-left: 5%;font-size: 20px;width: 50%;text-align: left;vertical-align:top;">@isset($DRSdata[0]->OfficeCode) {{$DRSdata[0]->OfficeName}} @endisset</h2>
             
              <div style="margin-bottom: 5px;">
                <div style="display: inline-block;vertical-align: top;width: 63%;">
                  <h4 style="text-align: left;">Delivery Run Sheet</h4>
                  <div style="text-align: left;font-size: 15px;"><b>@isset($DRSdata[0]->OfficeCode) {{$DRSdata[0]->OfficeCode}} {{$DRSdata[0]->OfficeName}} @endisset</b></div>
                  <div style="text-align: left;font-size: 12px;"><b>Delivery Representative:</b> <span>Randhir Kumar Jha (7549431071)</span></div>
                  <div style="text-align: left;font-size: 12px;"><b>Driver Name:</b> @isset($DRSdata[0]->DriverName) {{$DRSdata[0]->DriverName}} @endisset</div>
                  <div style="text-align: left;font-size: 12px;"><b>Vehicle No:</b> @isset($DRSdata[0]->VehicleNo) {{$DRSdata[0]->VehicleNo}} @endisset &nbsp;  <b>Ewaybill No.:</b> 7945124112  </div>
                </div>
                <div style="display: inline-block;vertical-align: top;width:29%;">
                   <div style="text-align: left;font-size: 12px;"><div style="display: inline-block;vertical-align: top;width:42%;"><b>Branch Code:</b></div> <div style="display: inline-block;vertical-align: top;width:56%;"> @isset($DRSdata[0]->OfficeCode) {{$DRSdata[0]->OfficeCode}} @endisset</div></div>
                  <div style="text-align: left;font-size: 12px;"><div style="display: inline-block;vertical-align: top;width:42%;"><b>Date:</b></div> <div style="display: inline-block;vertical-align:top;width:56%;">@isset($DRSdata[0]->Delivery_Date) {{date("d-m-Y H:i:s",strtotime($DRSdata[0]->Delivery_Date))}} @endisset</div></div>
                  <div style="text-align: left;font-size: 12px;"><div style="display: inline-block;vertical-align: top;width:42%;"><b>DRS No.:</b></div> <div style="display: inline-block;vertical-align: top;width:56%;"> @isset($DRSdata[0]->DRS_No) {{$DRSdata[0]->DRS_No}} @endisset</div> </div>
                  
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
                  ?>
                   <tr>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$i}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$key->Docket_No}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;"> {{$key->PartPices}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$key->PartWeight}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$key->Code}} ~ {{$key->CityName}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;"><b>{{$key->ConsigneeName}}</b> {{$key->City}} -  {{$key->Address1}} </td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;">{{$key->BookingType}}</td>
                      <td style="padding:5px;border:1px solid #000;text-align: center;vertical-align: top;"></td>

                  </tr>  
                  @endforeach
                 
                </table>
            
        
    </div>
    </body>

</html>