<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
     .upper-table tr th, .upper-table tr td{
      border:1px solid #000;
      padding: 10px;
      text-align: center;
      font-size: 12px;
     }
     .lower-table tr th, .lower-table tr td{
      border:2px solid #ddd;
      padding: 6px;
      text-align: center;
      font-size: 11px;
     
     }
     .right_table{
      width: 100%;
      float: right;
      text-align: right;
     }
     .right_table  tr td{
      border:1px solid #000;
      padding: 5px;
      font-weight: 700;
      font-size: 12px;
      text-align: right;
     }
         </style>
<body style="margin:15px;">
      <div style="margin-top: 10px;">
        <h4 style="text-align:center;"><b>SUPPLYMENTARY BILL</b></h4>
      </div>
      <div style="width:30%;text-align: left;margin-top:-20px;margin-bottom: 10px;">
          <?php
          $path ='assets/images/Metrologo.png';
          $type = pathinfo($path, PATHINFO_EXTENSION);
          $data = file_get_contents($path);
          $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
          ?>
          <img src="<?php echo $base64?>" width="100%"/>
      </div>
        
      <div style="border:2px solid #ddd;padding: 5px;display: inline-block;width: 47%;font-size: 12px;vertical-align:top;">
           <div>To:</div>
            <div><b>OM BIOTEC</b></div>
            <div>24/4814, MATHUR LANE,ANSARI ROAD, DARYAGANJ, 
              CENTRAL DELHI, DELHI, 110002</div>
              <div>NEW DELHI-110002</div>
              <div style="margin-bottom: 20px;"><b>GST No.:</b> 07AAFPJ6399A1ZP</div>

      </div>
      <div style="border:2px solid #ddd;padding: 5px;display: inline-block;width: 47%;margin-left: 1%;font-size: 12px;vertical-align:top;">
           <div>From:</div>
            <div><b>METROPOLIS LOGISTICS PVT LTD</b></div>
            <div>K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR MAHIPALPUR-110037</div>
              <div><b>GST No.:</b> 07AAHCM7482L1ZU</div>
              <div style="margin-bottom: 20px;"><b>Email:</b></div>
      </div>
      <div style="width: 70%;margin:10px auto;">
        <table style="width: 100%;" class="upper-table">
          <thead>
            <tr>
              <th>Invoice No.</th>
              <th>Invoice Date</th>
              <th>Client ID</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>MPL/22-23/8329/1</td>
              <td>02-Mar-23</td>
              <td>C10321</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
                <table class="lower-table" style="width:100%;">
                  <thead>
                      <tr>
                        <th rowspan="2" style="min-width: 30px;">S. No</th>
                        <th rowspan="2" style="min-width: 150px;">Details</th>
                        <th rowspan="2" style="min-width: 70px;">Docket No.</th>
                        <th rowspan="2" style="min-width: 70px;">Amount</th>
                        <th colspan="2" style="min-width: 70px;">CGST</th>
                        <th colspan="2" style="min-width: 70px;">SGST</th>
                        <th colspan="2" style="min-width: 70px;">IGST</th>
                        <th rowspan="2" style="min-width: 70px;">Total</th>
                      </tr>  
                      <tr>
                        <th style="min-width: 30px;">%</th>
                        <th style="min-width: 30px;">Amt</th>
                        <th style="min-width: 30px;">%</th>
                        <th style="min-width: 30px;">Amt</th>
                        <th style="min-width: 30px;">%</th>
                        <th style="min-width: 30px;">Amt</th>
                      </tr>  
                  </thead>
                   
                  <tr>
                      <td style="padding:10px;">1</td>
                      <td style="padding:10px;">UNLOADING CHARGES</td>
                      <td style="padding:10px;">1320065 </td>
                      <td style="padding:10px;"> 5000.00</td>
                      <td style="padding:10px;">0.00</td>
                      <td style="padding:10px;">0.00</td>
                      <td style="padding:10px;">0.00</td>
                      <td style="padding:10px;">0.00</td>
                      <td style="padding:10px;">0.00</td>
                      <td style="padding:10px;">0.00</td>
                      <td style="padding:10px;">5000.00</td>
                  </tr>  
                </table>
      </div>
      <div style="width: 100%;margin-top: 10px;">
        <div style="display: inline-block;width: 65%;float: left">
          <div style="font-size: 11px;font-weight: 700;">Remarks:</div>
          
          <div style="margin-top: 23%;">Five Thousand Only</div>
        </div>
        <div style="display: inline-block;width: 35%;">
          <table class="right_table">
            <tr>
              <td style="width: 50%;">Total Amount:</td>
              <td>5000.00</td>
            </tr>
            <tr>
              <td style="border-right: 1px solid #000;border-left: 1px solid #000;border-bottom: none;">Total CGST :</td>
              <td style="border-right: 1px solid #000;border-bottom:none;">0.00</td>
            </tr>
            <tr>
              <td style="border-right: 1px solid #000;border-left: 1px solid #000;border-top: none;border-bottom: none;">Total SGST :</td>
              <td style="border-right: 1px solid #000;border-top: none;border-bottom: none;">0.00</td>
            </tr>
            <tr>
              <td style="border-right: 1px solid #000;border-left: 1px solid #000;border-top: none;">Total IGST :</td>
              <td style="border-right: 1px solid #000;border-top: none;">0.00</td>
            </tr>
            <tr>
              <td>Total GST :</td>
              <td>0.00</td>
            </tr>
             <tr>
              <td>Grand Total :</td>
              <td>0.00</td>
            </tr>
          </table>
        </div>
      </div>
     
            <div>
                <h5 style="font-weight: 700;font-size: 12px;margin-top: 10px;width:100%;clear: both;">
                  TERMS AND CONDITIONS:
                </h5>
                <div style="margin-top: 2%;font-size: 9px;clear: both;">
                  <p style="margin-bottom: 2px;">1. Any Discrepancies should be brought to the notice of the company within 7 Days from the date of receipt of the Invoice</p>
                  <p style="margin-bottom: 2px;">2. Payment to be made by Crossed/Account Payee cheque/DD in favour of <b>Metropolis Logistics Pvt Ltd</b></p>
                  <p style="margin-bottom: 2px;">3. Cheque bouncing charges of Rs 1000/- per bounce would be debited and recovered from Customer</p>
                  <p style="margin-bottom: 2px;">4. We will send a soft copy of the bill through mail and hard copy of the same will send you later.</p>
                  <p style="margin-bottom: 2px;">5. As per exemption Notification No 12/2017 Central Tax (Rate), dated 28th June 2017,Entry No. 22(b), GST is exempted on services by<br>
 way of giving on hire to a Goods Transport Agency, a means of transportation of goods.</p>
 <p style="margin-bottom: 2px;">6. As per exemption Notification No 12/2017 Central Tax (Rate), dated 28th June 2017,Entry No. 21A, GTA services to unregistered person<br>
 is also exempted</p>
 <p style="margin-bottom: 2px;">7. As per exemption Notification No 12/2017 Central Tax (Rate), dated 28th June 2017,Entry No. 21, the following services provided by a<br>
 GTA (Heading 9965 or 9967) is exempt from payment of tax eg. Agricultural produce,milk salt,etc.)</p>
                  <p style="margin-bottom: 2px;">8. Late Payment are Subject to an interest charges of 24% per annum.</p>
                  <p style="margin-bottom: 2px;">9. Payment to be made within 7 Days from the Invoice date.</p>
                  <p style="margin-bottom: 2px;">10. All disputes are subject to New Delhi Jurisdiction Only.</p>
                  <p style="margin-bottom: 2px;">11. Bank Details</p>
                  
                </div>
            <div style="display: inline-block;width: 60%;margin-top: 43px;">
                <div style="font-size:8px;line-height: 8px;margin-left: 10px;">
                  <p style="display: inline-block;">Account Name</p>
                  <p style="display: inline-block;">: Metropolis Logistics Pvt Ltd</p>
                </div>
                <div style="font-size:8px;line-height: 8px;margin-left: 10px;">
                  <p style="display: inline-block;">Bank Name</p>
                  <p style="display: inline-block;">: HDFC Bank Ltd </p>
                </div>
                <div style="font-size:8px;line-height: 8px;margin-left: 10px;">
                  <p style="display: inline-block;">Account No</p>
                  <p style="display: inline-block;">: 50200055223855</p>
                </div>
                <div style="font-size:8px;line-height: 8px;margin-left: 10px;">
                  <p style="display: inline-block;">IFSC Code</p>
                  <p style="display: inline-block;">: HDFC0004404</p>
                </div>
                <div style="font-size:8px;line-height: 8px;margin-left: 10px;">
                  <p style="display: inline-block;">MICR Code</p>
                  <p style="display: inline-block;">: 110240424</p>
                </div>
                <div style="font-size:8px;line-height: 8px;margin-left: 10px;">
                  <p style="display: inline-block;">Branch Code</p>
                  <p style="display: inline-block;">: 4404</p>
                </div>
                <div style="font-size:8px;line-height: 8px;margin-left: 10px;">
                  <p style="display: inline-block;">Branch Address</p>
                  <p style="display: inline-block;">: Mahipalpur</p>
                </div>
              </div>
              <div style="display: inline-block;width: 36%;"> 
                <div style="margin-bottom: 34%;">
                  For <b>METROPOLIS LOGISTICS PVT LTD</b>
                </div>
                <div style="margin-left: 10px;">
                  <b>(Auth. Signatory)</b>
                </div>
              </div>
              <div style="border-top:2px solid #000;padding-top: 10px;margin-top: 55px;">
                <div style="display: inline-block;width: 25%;font-weight: 800;">Print Date & Time</div>
                <div style="display: inline-block;width: 62%;">22-May-2023 &nbsp; 16:08:55</div>
                <div style="display: inline-block;width: 10%;">Page 1 of 1</div>
              </div>


            </div>
      
</body>

</html>