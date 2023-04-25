{{$data->PickupNo}}
<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
         </style>
        <body style="margin:5px 20px 20px 20px;">
<div>
        <h2 style="text-align:center;font-size: 18px;">METROPOLIS LOGISTICS PVT LTD</h2>

        <h5 style="text-align:center;margin-top: 20px;"></h5>
        
           
                <table style="width: 100%;">
                  <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;"><b>Scan Date:</b></td>
                      <td style="padding:5px;text-align: left;">{{$data->ScanDate}}</td>
                      <td style="padding:5px;text-align: left;"><b>Entry Date & Time:</b></td>
                      <td style="padding:5px;text-align: left;">{{$data->created_at}}</td>
                  </tr>  
                   <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;"><b>Pickup Number:</b></td>
                      <td style="padding:5px;">{{$data->PickupNo}}</td>
                      <td style="padding:5px;text-align: left;"><b>Vehicle Type:</b></td>
                      <td style="padding:5px;text-align: left;">{{$data->vehicleType}}</td>
                  </tr>  
                   <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;"><b>Vendor Name:</b></td>
                      <td style="padding:5px;text-align: left;">@isset($data->venderDetail->VendorName) {{$data->venderDetail->VendorCode}} ~ {{$data->venderDetail->VendorName}} @endisset</td>
                      <td style="padding:5px;text-align: left;"><b></b></td>
                      <td style="padding:5px;text-align: left;"></td>
                  </tr>  
                   <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;"><b>Driver Name:</b></td>
                      <td style="padding:5px;text-align: left;">@isset($data->DriverDetail->DriverName) {{$data->DriverDetail->DriverName}} @endisset</td>
                      <td style="padding:5px;text-align: left;"><b>Vehicle Number:</b></td>
                      <td style="padding:5px;text-align: left;">@isset($data->VehicleDetail->VehicleNo) {{$data->VehicleDetail->VehicleNo}} @endisset</td>
                  </tr>  
                   <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;"><b>Start KM:</b></td>
                      <td style="padding:5px;text-align:left;">{{$data->startkm}}</td>
                      <td style="padding:5px;text-align:left;"><b>End KM: </b></td>
                        <td style="padding:5px;text-align: left;">{{$data->endkm}}</td>
                      
                  </tr>  
                   <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;"><b>Market Hire Amount:</b></td>
                      <td style="padding:5px;text-align:left;">{{$data->marketHireAmount}}</td>
                      <td style="padding:5px;text-align:left;"><b>Advance Paid: </b></td>
                        <td style="padding:5px;text-align: left;">{{$data->advanceToBePaid}}</td>
                     
                  </tr>  
                   <tr style="font-size: 12px;">
                     <td style="padding:5px;text-align: left;"><b>Payment Mode:</b></td>
                      <td style="padding:5px;text-align:left;">{{$data->paymentMode}}</td>
                      <td style="padding:5px;text-align:left;"><b>Advance Type: </b></td>
                        <td style="padding:5px;text-align: left;">{{$data->advanceType}}</td>
                    
                  </tr>  
                   <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;"><b>Supervisor Name:</b></td>
                      <td style="padding:5px;text-align:left;">@isset($data->EmployeeDetailSuperwiser->EmployeeCode) {{$data->EmployeeDetailSuperwiser->EmployeeCode}} ~ {{$data->EmployeeDetailSuperwiser->EmployeeName}} @endisset</td>
                      <td style="padding:5px;text-align:left;"><b>Pickup Person: </b></td>
                        <td style="padding:5px;text-align: left;">@isset($data->EmployeeDetailPickupPerson->EmployeeCode) {{$data->EmployeeDetailPickupPerson->EmployeeCode}} ~ {{$data->EmployeeDetailPickupPerson->EmployeeName}} @endisset</td>
                    
                  </tr>  

                  <tr style="font-size: 12px;">
                      <td style="padding:5px;text-align: left;padding-bottom: 10px;"><b>Remarks:</b></td>
                      <td style="padding:5px;text-align:left;padding-bottom: 10px;">{{$data->remark}}</td>
                      <td style="padding:5px;text-align:left;padding-bottom: 10px;"><b></b></td>
                        <td style="padding:5px;text-align: left;padding-bottom: 10px;"></td>
                    
                  </tr>  
                   
                  
                  
                  
                  <tr style="border-top:1px solid #000;border-bottom: 1px solid #000;font-size:12px;">
                    <th style="padding: 5px;text-align: left;">SL#  </th>
                    <th style="padding: 5px;text-align: left;">Docket No.</th>
                    <th style="padding: 5px;text-align: left;"></th>
                    <th style="padding: 5px;text-align: left;"></th>
                  </tr>
                  <?php $i=0; ?>
                  @foreach($PickWithDocket as $key)
                  <?php $i++; ?>
                <tr style="font-size:12px;">
                 <td style="padding: 5px;border-bottom: 1px solid #000;">{{$i}}</td>
                  <td style="padding: 5px;border-bottom: 1px solid #000;"> {{$key->Docket}}</td>
                  <td style="padding: 5px;border-bottom: 1px solid #000;"></td>
                   <td style="padding: 5px;border-bottom: 1px solid #000;"></td>
                </tr>
                @endforeach
                
                 
                  <tr>
                      <td style="padding:5px;" colspan="4">
                        <div style="text-align: right;margin-top: 20px;margin-right: 50px;">
                           <div><b>Prepared By </b>{{''}}</div>
                         
                        </div>
                        </td>
                     
                      
                  </tr>   
                </table>

                <div style="font-size:10px; margin-top: 20px;">
                  <b>Note:</b> This is system generated pickup scan number, does not require any stamp or signature.
                </div>
            
        
    </div>
    </body>

</html>
