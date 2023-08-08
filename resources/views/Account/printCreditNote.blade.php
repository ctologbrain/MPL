<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title>CREDIT NOTE</title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
         </style>
        <body style="margin:15px;border:1px solid #000;padding: 10px;">
            
              <div style="width:100%;margin:0 auto;display: inline-block;float: left;">
                        <?php
                        $path ='assets/images/Metrologo.png';
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                        <img src="<?php echo $base64?>" width="30%"/>
                <div>
                <h4 style="text-align: center;">CREDIT NOTE</h4>
              <div style="display:block;font-size:11px;width: 100%;margin-top:2%;">
                  <p style="margin:0"><b>Corporate Office :</b> K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR NEW DELHI-110037</p>
                  <p style="margin:0;"><b>Ph. :</b> <b>Mob. :</b> <b>Web :</b> WWW.METROPOLISLOGISTICS.COM Email :</p>
                  <p style="margin:0;"><b>GSTIN :</b> 07AAHCM7482L1ZU <b>PAN No. :</b> AAHCM7482L</p>
                  <p>HSN Code: 996531</p>
            </div>
            <div style="font-size: 11px;margin-top: 2%;">
              <p><b>IRN No.:</b> af3e06b4bcdc1843101c94e940a9e2aa2bfe2fa32c857458b8709694d72c0b38</p>
            </div>
            {{$data}}
                <table style="width: 100%;margin-top: 10px;border:1px solid #000;border-collapse: collapse;">
                  <tr style="font-size: 10px;border-bottom:1px solid #000;">
                      <td style="padding:10px;text-align: left;vertical-align: top;" colspan="2" rowspan="4">
                        HUBER SUHNER ELECTRONICS PRIVATE LIMITED <br>PLOT NO 125, SECTOR 8, IMT MANESAR <br>MANESAR-122051
                        <br><b>GSTIN :</b> 06AABCH4705K1ZP <b>PAN No. :</b> AABCH4705K<br>
                        <b>Customer Code :</b> @isset($data->CustomerDetail->CustomerCode) {{$data->CustomerDetail->CustomerCode}} @endisset
                      </td>
                      <td style="padding:10px;text-align: right;font-weight: 700;border-right: 1px solid #000;border-left: 1px solid #000;">Credit Note </td>
                      <td style="padding:10px;text-align: left;">@isset($data->NodeNo) {{$data->NodeNo}} @endisset</td>
                  </tr>  

                   <tr style="font-size: 10px;border-bottom: 1px solid #000;">
                     
                      <td style="padding:10px;text-align: right;font-weight: 700;border-right: 1px solid #000;border-left: 1px solid #000;">Date</td>
                      <td style="padding:10px;text-align: left;">@isset($data->NoteDate) {{date("d-m-Y", strtotime($data->NoteDate))}} @endisset</td>
                  </tr>  

                   <tr style="font-size: 10px;border-bottom: 1px solid #000;">
                     
                      <td style="padding:10px;text-align: right;font-weight: 700;border-right: 1px solid #000;border-left: 1px solid #000;">Against Invoice</td>
                      <td style="padding:10px;text-align: left;"> @isset($data->InvoiceMasterDataDetail->InvNo) {{$data->InvoiceMasterDataDetail->InvNo}} @endisset</td>
                  </tr>  

                   <tr style="font-size: 10px;border-bottom: 1px solid #000;">
                     
                      <td style="padding:10px;text-align: right;font-weight: 700;border-right: 1px solid #000;border-left: 1px solid #000;">Invoice Date </td>
                      <td style="padding:10px;text-align: left;"> @isset($data->InvoiceMasterDataDetail->InvDate) {{date("d-m-Y", strtotime($data->InvoiceMasterDataDetail->InvDate))}} @endisset</td>
                  </tr>  
                </table>
                <table style="font-size: 11px;width: 100%;">
                  <tr style="background-color: #ddd;text-align: center;">
                   <td style="font-weight: 700; padding: 10px;border-bottom: 1px solid #000;border-left: 1px solid #000;">S.No.</td>
                    <td style="font-weight: 700; padding: 10px;border-bottom: 1px solid #000;">Description</td>
                    <td style="font-weight: 700; padding: 10px;border-bottom: 1px solid #000;border-right: 1px solid #000;" colspan="2">Amount Details</td>
                  </tr>
                   <tr>
                   <td style="padding: 10px;vertical-align: top;border-right: 1px solid #000;border-bottom: 1px solid #000;border-left: 1px solid #000;" rowspan="5">1</td>
                    <td style="padding: 10px;vertical-align: top;border-right: 1px solid #000;border-bottom: 1px solid #000;" rowspan="5">BEING CREDIT NOTE ISSUE DUE TO SHIPMENT LOST AGAINST DOCKET<br>
NO-1291885...APPROVE BY MONIKA MAM</td>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;">Credit Amount :</td>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;">  @isset($data->CFright) {{$data->CFright}} @endisset </td>
                  </tr>
                   <tr>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;">CGST (0.00%) :</td>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;">  @isset($data->CCGST) {{$data->CCGST}} @endisset </td>
                  </tr>
                   <tr>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;">SGST (0.00%) :</td>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;"> @isset($data->CSGST) {{$data->CSGST}} @endisset </td>
                  </tr>
                  <tr>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;">IGST (18.00%) :</td>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;"> @isset($data->CIGST) {{$data->CIGST}} @endisset </td>
                  </tr>
                  <tr>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;border-bottom: 1px solid #000;">Total Amount :</td>
                    <td style="font-weight: 700;padding: 10px;border-right: 1px solid #000;border-bottom: 1px solid #000;">  @isset($data->CTotalAmount) {{$data->CTotalAmount}} @endisset </td>
                  </tr>
                  <tr>
                    <td style="font-weight: 700; padding: 10px;border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;" rowspan="2">
                     
                    </td>
                    <td rowspan="2" style="border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;padding: 10px;">
                    @isset($data->CTotalAmount) 
                  
                    <?php
                      $number = $data->CTotalAmount;
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
                    $output = ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
                    ?>
                    {{$output}}
                     @endisset 
                    </td>
                    <td  colspan="2" style="font-weight:700;border-right: 1px solid #000;padding: 10px;
                    ">
                      For
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: center;padding: 10px;border-bottom: 1px solid #000;border-right: 1px solid #000;font-weight:700;">
                      Authorized Signatory
                    </td>
                  </tr>
                  <tr style="background-color: #ddd;border-left: 1px solid #000;border-right: 1px solid #000;">
                    <td colspan="4" style="padding: 10px;border-bottom: 1px solid #000;">
                    </td>
                  </tr>
                </table>
    </div>
    </body>

</html>