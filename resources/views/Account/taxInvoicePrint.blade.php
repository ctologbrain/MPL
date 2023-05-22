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
        <div style="border:2px solid #000;padding: 5px;display: inline-block;width: 45%;margin-left: 1%;font-size: 12px;height: 85px;vertical-align:top;">
           <div style="font-weight: 700;">Reg. Office:</div>
            <div>K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR NEW DELHI-110037</div>

        </div>
        <div style="border:2px solid #000;padding: 5px;display: inline-block;width: 45%;margin-left: 2%;font-size: 12px;height: 85px;vertical-align:top;">
          <div style="font-weight: 700;">Booking Office:</div>
            <div>
                METROPOLIS LOGISTICS PVT LTD. K-2-832, KHASRA NO  834, MATA CHOWK, MAHIPALPUR, NEW DELHI-110037 NEW DELHI-110037
            </div>
            <div>
              info@metropolislogistics.com
            </div>
        </div>


        <div style="border:2px solid #000;padding: 5px;display: inline-block;width: 45%;margin-left: 1%;font-size: 12px;height: 120px;margin-top: 45px;box-shadow: 20px 20px 50px 10px pink inset;">
           <div style="font-weight: 700;">@isset($invoiceDet->customerDetails->CustomerName) {{$invoiceDet->customerDetails->CustomerName}} @endisset</div>
            <div>@isset($invoiceDet->customerDetails->CustAddress->Address1) {{$invoiceDet->customerDetails->CustAddress->Address1}} @endisset<br> @isset($invoiceDet->customerDetails->CustAddress->Address2) {{$invoiceDet->customerDetails->CustAddress->Address2}} @endisset <br><b>STATE NAME:</b> @isset($invoiceDet->customerDetails->CustAddress->State) {{$invoiceDet->customerDetails->CustAddress->State}} @endisset <b>STATE CODE:</b> - <br><b>CUST.CODE: </b> @isset($invoiceDet->customerDetails->CustomerCode) {{$invoiceDet->customerDetails->CustomerCode}} @endisset <br>
              <b>GSTIN:@isset($invoiceDet->customerDetails->GSTNo) {{$invoiceDet->customerDetails->GSTNo}} @endisset </b>

            </div>
        </div>
        <div style="display: inline-block;width: 45%;margin-left: 2%;font-size: 12px;height: 120px;border:2px solid #000;padding:5px;margin-top: 45px;">
          <div style="margin-bottom: 10px;">PERIOD FROM  &nbsp;&nbsp; <b>@isset($invoiceDet->FormDate) {{$invoiceDet->FormDate}} @endisset To @isset($invoiceDet->ToDate) {{$invoiceDet->ToDate}}  @endisset </b></div>
          <div style="margin-bottom: 10px;">INVOICE NO  &nbsp;&nbsp; <b>@isset($invoiceDet->InvNo) {{$invoiceDet->InvNo}} @endisset</b></div>
          <div style="margin-bottom: 10px;">INVOICE DATE  &nbsp;&nbsp; <b>@isset($invoiceDet->InvDate) {{$invoiceDet->InvDate}} @endisset</b></div>
          <div style="margin-bottom: 10px;">HSN/SAC  &nbsp;&nbsp; <b>-</b></div>
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
                   <?php $i=0; $GrandFright= $GrandWeight=  $GrandTotal= $GrandCharge = $Scst= $Cgst= $Igst=array(); ?>
                  @if(!empty($totalInvoice))
                  @foreach($totalInvoice as $key)
                  <?php $i++; 
                  $GrandTotal[]=$key->Total;
                  $GrandWeight[]=$key->Weight;
                   $GrandFright[]=$key->Fright;
                   $Scst[]=$key->Scst;
                   $Cgst[]=$key->Cgst;
                   $Igst[]=$key->Igst;
                   $GrandCharge[]=$key->Charge;
                  ?>
                  <tr style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 10px;">
                      <td style="padding:10px;">{{$i}}</td>
                      <td style="padding:10px;">{{$key->BookingDate}} </td>
                      <td style="padding:10px;">@isset($key->SourceDet->Code) {{$key->SourceDet->Code}} ~{{$key->SourceDet->CityName}} @endisset</td>
                      <td style="padding:10px;">@isset($key->DestDet->Code) {{$key->DestDet->Code}} ~{{$key->DestDet->CityName}} @endisset</td>
                      <td style="padding:10px;">{{$key->DocketNo}}</td>
                      <td style="padding:10px;"> {{$key->Rate}}</td>
                      <td style="padding:10px;text-align: right;">{{$key->Qty}}</td>
                      <td style="padding:10px;">{{$key->Weight}}</td>
                      <td style="padding:10px;">{{$key->Fright}}</td>
                      <td style="padding:10px;text-align: right;"> {{$key->Charge}}</td>
                      <td style="padding:10px;">{{$key->Total}} </td>
                  </tr>  
                 @endforeach
                 @endif
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
                      <td style="padding:5px;text-align: right;"><b>{{array_sum($Cgst)}}</b></td>
                      
                  </tr>  
                  <tr style="text-align: center;font-size: 10px;">
                      <td style="padding:5px;text-align: left;" colspan="2"><b>PAN No:</b></td>
                      <td style="padding:5px;text-align: left;">AAHCM7482L</td>
                      <td style="padding:5px;text-align: right;" colspan="5"></td>
                      <td style="padding:5px;">SGST @9.00</td>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;text-align: right;"><b>{{array_sum($Scst)}}</b></td>
                      
                  </tr>  
                  <tr style="text-align: center;font-size: 10px;">
                      <td style="padding:2px;text-align: left;" colspan="2"></td>
                      <td style="padding:2px;text-align: left;"></td>
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;">IGST @18.00</td>
                      <td style="padding:2px;"></td>
                      <td style="padding:2px;text-align: right;"><b>{{array_sum($Igst)}}</b></td>
                      
                  </tr>  
                  <tr style="text-align: center;font-size: 10px;">
                      <td style="padding:2px;text-align: left;" colspan="2"></td>
                      <td style="padding:2px;text-align: left;"></td>
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;border-top: 1px solid #000;"><b>Tax Total : GST</b></td>
                      <td style="padding:2px;border-top: 1px solid #000;"></td>
                      <td style="padding:2px;border-top: 1px solid #000;text-align: right;"><b>{{array_sum($Igst)}}</b></td>
                      
                  </tr>  
                <?php 
                $number =array_sum($GrandTotal);
                $decimal = round($number - ($no = floor($number)), 2) * 100;
                    $hundred = null;
                    $digits_length = strlen($no);
                    $i = 0;
                    $str = array();
                    $words = array(0 => '', 1 => 'one', 2 => 'two',
                        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
                        7 => 'seven', 8 => 'eight', 9 => 'nine',
                        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
                        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
                        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
                        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
                        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
                        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
                    $digits = array('', 'hundred','thousand','lakh', 'crore');
                    while( $i < $digits_length ) {
                        $divider = ($i == 2) ? 10 : 100;
                        $number = floor($no % $divider);
                        $no = floor($no / $divider);
                        $i += $divider == 10 ? 1 : 2;
                        if ($number) {
                            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
                        } else $str[] = null;
                    }
                    $Rupees = implode('', array_reverse($str));
                    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
                    $result= ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
                 ?>
                  <tr style="text-align: center;font-size: 10px;border-top:1px solid #000;">
                      <td style="padding:2px;text-align: left;" colspan="3"><b>Payable Amount (In Words):</b></td>
                      
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;"><b>Round Off</b></td>
                      <td style="padding:2px;"></td>
                      <td style="padding:2px;text-align: right;"><b>{{round(array_sum($GrandTotal))}}</b></td>
                      
                  </tr>  
                   <tr style="text-align: center;font-size: 10px;border-bottom:1px solid #000;">
                      <td style="padding:2px;text-align: left;" colspan="3">{{strtoupper($result)}}</td>
                      
                      <td style="padding:2px;text-align: right;" colspan="5"></td>
                      <td style="padding:2px;text-align: right;"><b>Payable Amount</b></td>
                      <td style="padding:2px;"></td>
                      <td style="padding:2px;text-align: right;"><b> {{array_sum($GrandTotal)}}</b></td>
                      
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