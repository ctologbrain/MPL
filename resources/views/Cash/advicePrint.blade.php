<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
         </style>
        <body>
            <div style="margin:50px 20px 10px;">
              
                
                <h2 style="font-size: 14px;width: 35%;margin:0 auto;font-weight: 800;">METROPOLIS LOGISTICS PVT LTD</h2>
                <h4 style="font-size: 14px;width: 22%;margin:20px auto 10px;font-weight: 800;">Cash Expense Advice</h4>
             
              <div style="margin-bottom: 20px;font-size: 13px;">
                
                <div style="display: inline-block;width: 57%;margin-left: 2%;"><b>Advice No:</b> @isset($data[0]->AdviceNo) {{$data[0]->AdviceNo}} @endisset</div>
                <div style="display: inline-block;width: 40%;"><b>Advice Date:</b> @isset($data[0]->Date) {{$data[0]->Date}} @endisset</div>
                <div style="display: inline-block;width: 57%;margin-left: 2%;margin-top: 1%;"><b>Office Name:</b> @isset($data[0]->OfficeCode) {{$data[0]->OfficeCode}} ~ {{$data[0]->OfficeName}} @endisset </div>
                <div style="display: inline-block;width: 40%;"></div>
              </div>
            
                <table style="width: 100%;font-size: 11.8px;">
                  <tr style="border-top:1px solid #000;border-bottom: 1px solid #000;">
                      <td style="padding:5px;text-align: center;min-width: 20px;"><b>SL#</b></td>
                      <td style="padding:5px;text-align: left;min-width: 150px;"><b>Expense Type</b></td>
                      <td style="padding:5px;text-align: left;min-width: 50px;"><b>From Date</b></td>
                      <td style="padding:5px;text-align: left;min-width: 50px;"><b>To Date</b></td>
                      <td style="padding:5px;text-align: left;min-width: 60px;"><b>Ref. Type</b></td>
                      <td style="padding:5px;text-align: left;min-width: 50px;"><b>Ref. No</b></td>
                      <td style="padding:5px;text-align: left;min-width: 180px;"><b>Remarks</b></td>
                      <td style="padding:5px;text-align: right;min-width: 40px;"><b>Amount</b></td>
                  </tr>  
                  <?php $i=0;
                  $GrdTot=0;
                  ?>
                 @foreach($data as $key)
                 <?php $i++; ?>
                 <tr style="vertical-align: top;">
                  <td style="text-align: center;padding:5px;">{{$i}}</td>
                  <td style="text-align: left;padding:5px;">{{$key->DebitReason}}</td>
                  <td style="text-align: left;padding:5px;">{{$key->FromDate}}</td>
                  <td style="text-align: left;padding:5px;">{{$key->ToDate}}</td>
                  <td style="text-align: left;padding:5px;">{{$key->Reason}}</td>
                  <td style="text-align: left;padding:5px;">{{$key->Remark}}</td>
                  <td style="text-align: left;padding:5px;">{{$key->ExpRemark}}</td>
                  <td style="text-align: right;padding:5px;">{{$key->Debit}}</td>
                 </tr>
                 <?php $GrdTot += $key->Debit; ?> 
                 @endforeach
                
              <?php 
                 $decimal = round($GrdTot - ($no = floor($GrdTot)), 2) * 100;
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
                     $GrdTot = floor($no % $divider);
                     $no = floor($no / $divider);
                     $i += $divider == 10 ? 1 : 2;
                     if ($GrdTot) {
                         $plural = (($counter = count($str)) && $GrdTot > 9) ? 's' : null;
                         $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                         $str [] = ($GrdTot < 21) ? $words[$GrdTot].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($GrdTot / 10) * 10].' '.$words[$GrdTot % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
                     } else $str[] = null;
                 }
                 $Rupees = implode('', array_reverse($str));
                 $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
                 $GrdTotWord = ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
              ?>
                 <tr>
                  <td colspan="5" style="padding:5px;text-align: left;"><b>GRAND TOTAL: &nbsp;&nbsp;Rs. {{$GrdTotWord}} </b></td>
                  <td colspan="2" style="padding:5px;text-align: center;"></td>
                  <td style="padding:5px;text-align: right;"><b>{{$GrdTot}}</b></td>
                 </tr>
                 <tr>
                  <td colspan="5" style="padding:5px;text-align: left;"></td>
                  <td colspan="2" style="padding:5px;text-align: center;"></td>
                  <td style="padding:5px;text-align: right;"></td>
                 </tr>
                 <tr>
                  <td colspan="5" style="padding:5px;text-align: left;"><b>Prepared By: &nbsp; &nbsp;</b> @isset($key->EmployeeCode)  {{$key->EmployeeCode}} ~ {{$key->EmployeeName}} @endisset</td>
                  <td colspan="2" style="padding:5px;text-align: center;"><b>Approved By:</b></td>
                  <td style="padding:5px;text-align: right;"></td>
                 </tr>
                 
                 
                </table>
            
        
    </div>
    </body>

</html>