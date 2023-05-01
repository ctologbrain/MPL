<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
         </style>
        <body style="margin:15px;">

            <div style="width:30%;margin:0 auto;text-align: center;">
                    <?php
                    $path ='assets/images/Metrologo.png';
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>
                    <img src="<?php echo $base64?>" width="100%"/>
                </div>

                <div style="margin-bottom: 30px;">
                  <h3 style="text-align:center;text-decoration: underline;">METROPOLIS LOGISTICS PVT LTD</h3>
                  <h5 style="text-align:center;text-decoration: underline;"><b>TAX INVOICE</b></h5>
               
                 
                </div>
               
            
          
        <div>
        <div style="border:2px solid #000;padding: 5px;display: inline-block;width: 45%;margin-left: 1%;font-size: 12px;height: 85px;margin-top: 20px;box-shadow: 20px 20px 50px 10px pink inset;">
           <div style="font-weight: 700;">Reg. Office:</div>
            <div>K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR NEW DELHI-110037</div>
        </div>
        <div style="border:2px solid #000;padding: 5px;display: inline-block;width: 45%;margin-left: 2%;font-size: 12px;height: 85px;margin-top: 20px;box-shadow: 20px 20px 50px 10px pink inset;">
          <div style="font-weight: 700;">Booking Office:</div>
            <div>
                METROPOLIS LOGISTICS PVT LTD. K-2-832, KHASRA NO  834, MATA CHOWK, MAHIPALPUR, NEW DELHI-110037 NEW DELHI-110037
            </div>
            <div>
              info@metropolislogistics.com
            </div>
        </div>

        <div style="border:2px solid #000;padding: 5px;display: inline-block;width: 45%;margin-left: 1%;font-size: 12px;height: 120px;margin-top: 15px;box-shadow: 20px 20px 50px 10px pink inset;">
           <div style="font-weight: 700;">MAGIC FASTENERS PRIVATE LIMITED</div>
            <div>57KM DELHI ROHTAK ROAD, VILLAGE ISMAILA , GANDHRA ROAD,<br> SAMPLA, ROHTAK, HARYANA, 124001 ROHTAK-124001 <br><b>STATE NAME:</b> HARYANA <b>STATE CODE:</b> 06 <br><b>CUST.CODE: </b> C07283 <br>
              <b>GSTIN:06AAACM1153D1Z4</b>
            </div>
        </div>
        <div style="display: inline-block;width: 43.5%;margin-left: 2%;font-size: 12px;height: 110px;border:2px solid #000;padding: 10px;margin-top: 15px;box-shadow: 20px 20px 50px 10px pink inset;">
          <div style="margin-bottom: 10px;">PERIOD FROM  &nbsp;&nbsp; <b>@isset($invoiceDet->FormDate) {{$invoiceDet->FormDate}} @endisset To @isset($invoiceDet->ToDate) {{$invoiceDet->ToDate}}  @endisset </b></div>
          <div style="margin-bottom: 10px;">INVOICE NO  &nbsp;&nbsp; <b>@isset($invoiceDet->InvNo) {{$invoiceDet->InvNo}} @endisset</b></div>
          <div style="margin-bottom: 10px;">INVOICE DATE  &nbsp;&nbsp; <b>@isset($invoiceDet->InvDate) {{$invoiceDet->InvDate}} @endisset</b></div>
          <div style="margin-bottom: 10px;">HSN/SAC  &nbsp;&nbsp; <b>9-2</b></div>
        </div>
      </div>
           
            
                <table style="width: 100%;border-collapse: collapse;margin-top: 10px;">
                  <tr style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;font-size: 10px;">
                      <td style="padding:10px;">S.No.</td>
                      <td style="padding:10px;">DATE</td>
                      <td style="padding:10px;">ORIGIN</td>
                      <td style="padding:10px;">DESTINATION</td>
                      <td style="padding:10px;">DOCKET NO.</td>
                      <td style="padding:10px;">RATE</td>
                      <td style="padding:10px;">PCS.</td>
                      <td style="padding:10px;">WT.</td>
                      <td style="padding:10px;">FREIGHT</td>
                      <td style="padding:10px;">OTHER CHG</td>
                      <td style="padding:10px;">TOTAL</td>
                  </tr>  
                   <?php $i=0; $GrandFright= $GrandWeight=  $GrandTotal= $GrandCharge = array(); ?>
                  @foreach($totalInvoice as $key)
                  <?php $i++; 
                  $GrandTotal[]=$key->Total;
                  $GrandWeight[]=$key->Weight;
                   $GrandFright[]=$key->Fright;
                   $GrandCharge[]=$key->Charge;
                  ?>
                  <tr style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 10px;">
                      <td style="padding:10px;">{{$i}}</td>
                      <td style="padding:10px;">{{$key->BookingDate}} </td>
                      <td style="padding:10px;">@isset($key->SourceDet->Code) {{$key->SourceDet->Code}} ~{{$key->SourceDet->CityName}} @endisset</td>
                      <td style="padding:10px;">@isset($key->DestDet->Code) {{$key->DestDet->Code}} ~{{$key->DestDet->CityName}} @endisset</td>
                      <td style="padding:10px;">{{$key->DocketNo}}</td>
                      <td style="padding:10px;"> {{$key->Rate}}</td>
                      <td style="padding:10px;text-align: right;">{{$key->Product}}</td>
                      <td style="padding:10px;">{{$key->Weight}}</td>
                      <td style="padding:10px;">{{$key->Fright}}</td>
                      <td style="padding:10px;text-align: right;"> {{$key->Charge}}</td>
                      <td style="padding:10px;">{{$key->Total}} </td>
                  </tr>  
                 @endforeach

                  <tr style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 10px;">
                      <td style="padding:10px;text-align: center;" colspan="5"><b>GRAND TOTAL:</b></td>
                      <td style="padding:10px;text-align: center;"></td>
                      <td style="padding:10px;text-align: right;"><b>23</b></td>
                      <td style="padding:10px;"><b>{{array_sum($GrandWeight)}}</b></td>
                      <td style="padding:10px;"><b> {{array_sum($GrandFright)}}</b></td>
                      <td style="padding:10px;text-align: right;"><b>{{array_sum($GrandCharge)}}</b></td>
                      <td style="padding:10px;"><b> {{array_sum($GrandTotal)}}</b></td>
                  </tr>  
                  <tr style="text-align: center;border-top: 1px solid #000;font-size: 10px;">
                      <td style="padding:5px;text-align: left;" colspan="2"><b>GSTIN No:</b></td>
                      <td style="padding:5px;text-align: left;">07AAHCM7482L1ZU</td>
                      <td style="padding:5px;text-align: right;" colspan="5"></td>
                      <td style="padding:5px;">CGST @9.00</td>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;text-align: right;"><b>0.0</b></td>
                      
                  </tr>  
                  <tr style="text-align: center;font-size: 10px;">
                      <td style="padding:5px;text-align: left;" colspan="2"><b>PAN No:</b></td>
                      <td style="padding:5px;text-align: left;">AAHCM7482L</td>
                      <td style="padding:5px;text-align: right;" colspan="5"></td>
                      <td style="padding:5px;">SGST @9.00</td>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;text-align: right;"><b>0.0</b></td>
                      
                  </tr>  
                  <tr style="text-align: center;font-size: 10px;">
                      <td style="padding:2px;text-align: left;" colspan="2"></td>
                      <td style="padding:2px;text-align: left;"></td>
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;">IGST @18.00</td>
                      <td style="padding:2px;"></td>
                      <td style="padding:2px;text-align: right;"><b>918.00</b></td>
                      
                  </tr>  
                  <tr style="text-align: center;font-size: 10px;">
                      <td style="padding:2px;text-align: left;" colspan="2"></td>
                      <td style="padding:2px;text-align: left;"></td>
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;border-top: 1px solid #000;"><b>Tax Total : GST</b></td>
                      <td style="padding:2px;border-top: 1px solid #000;"></td>
                      <td style="padding:2px;border-top: 1px solid #000;text-align: right;"><b>6018.00</b></td>
                      
                  </tr>  

                  <tr style="text-align: center;font-size: 10px;border-top:1px solid #000;">
                      <td style="padding:2px;text-align: left;" colspan="3"><b>Payable Amount (In Words):</b></td>
                      
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;"><b>Round Off</b></td>
                      <td style="padding:2px;"></td>
                      <td style="padding:2px;text-align: right;"><b>0.00</b></td>
                      
                  </tr>  
                   <tr style="text-align: center;font-size: 10px;border-bottom:1px solid #000;">
                      <td style="padding:2px;text-align: left;" colspan="3">Rupees Six Thousand Eighteen Only</td>
                      
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;text-align: right;"><b>Payable Amount</b></td>
                      <td style="padding:2px;"></td>
                      <td style="padding:2px;text-align: right;"><b> 6018.00</b></td>
                      
                  </tr>  
                   
               
                   
                  
                
                   
                </table>

                <div style="font-weight: 700;font-size: 13px;margin-top: 2%">
                  TERMS AND CONDITIONS:
                </div>
                <div style="margin-top: 2%;font-size: 12px;line-height: 10px;">
                  <p>1. Any Discrepancies should be brought to the notice of the company within 7 Days from the date of receipt of the Invoice</p>
                  <p>2. Payment to be made by Crossed/Account Payee cheque/DD in favour of <b>Metropolis Logistics Pvt Ltd</b></p>
                  <p>3. Cheque bouncing charges of Rs 1000/- per bounce would be debited and recovered from Customer</p>
                  <p>4. Late Payment are Subject to an interest charges of 24% per annum.</p>
                  <p>5. Payment to be made within 7 Days from the Invoice date.</p>
                  <p>6. All disputes are subject to New Delhi Jurisdiction Only.</p>
                  <p>7. Bank Details</p>
                  
                </div>
                <div style="font-size: 12px;line-height: 10px;margin-left: 10px;">
                  <p style="display: inline-block;">Account Name</p>
                  <p style="display: inline-block;">: Metropolis Logistics Pvt Ltd</p>
                </div>
                <div style="font-size: 12px;line-height: 10px;margin-left: 10px;">
                  <p style="display: inline-block;">Bank Name</p>
                  <p style="display: inline-block;">: HDFC Bank Ltd </p>
                </div>
                <div style="font-size: 12px;line-height: 10px;margin-left: 10px;">
                  <p style="display: inline-block;">Account No</p>
                  <p style="display: inline-block;">: 50200055223855</p>
                </div>
                <div style="font-size: 12px;line-height: 10px;margin-left: 10px;">
                  <p style="display: inline-block;">IFSC Code</p>
                  <p style="display: inline-block;">: HDFC0004404</p>
                </div>
                 <div style="font-size: 12px;line-height: 10px;margin-left: 10px;">
                  <p style="display: inline-block;">MICR Code</p>
                  <p style="display: inline-block;">: 110240424</p>
                </div>
                 <div style="font-size: 12px;line-height: 10px;margin-left: 10px;">
                  <p style="display: inline-block;">Branch Code</p>
                  <p style="display: inline-block;">: 4404</p>
                </div>
                <div style="font-size: 12px;line-height: 10px;margin-left: 10px;">
                  <p style="display: inline-block;">Branch Address</p>
                  <p style="display: inline-block;">: Mahipalpu</p>
                </div>


                <div style="display: inline-block;margin-top: 2%;width: 50%;text-align:left;">
                  For <b>MAGIC FASTENERS PRIVATE LIMITED</b>
                </div>
                <div style="display: inline-block;margin-top: 2%;width: 48%;text-align:right;">
                  For <b>METROPOLIS LOGISTICS PVT LTD</b>
                </div>

                <div style="display: inline-block;margin-top: 2%;width: 50%;text-align:left;">
                  <b>Receiver's Signature with seal </b>
                </div>
                <div style="display: inline-block;margin-top: 2%;width: 48%;text-align:right;">
                  <b>Authorised Signatory</b>
                </div>
                
            
        
    </div>
    </body>

</html>