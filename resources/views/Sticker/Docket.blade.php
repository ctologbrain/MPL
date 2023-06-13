<!DOCTYPE html>
<html style="margin:0;">
   <head>
    <title></title>
    <style type="text/css">
     @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css);
     @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");

     section {
  width: 95%;
  margin-left: 1%;
  margin-right: 1%;
  position: relative;
}
.wrapper h3{
  position: absolute;
  transform: rotate(270deg);
  font-size: 10px;
  font-weight: 800;
  left: -108px;
  top:300px;

}
.wrapper h4{
  position: absolute;
  transform: rotate(90deg);
  font-size: 10px;
  font-weight: 800;
  right: -69px;
  top:300px;

}
.wrapper_second h3{
  position: absolute;
  transform: rotate(270deg);
  font-size: 10px;
  font-weight: 800;
  left: -108px;
  top:180px;

}
.wrapper_second h4{
  position: absolute;
  transform: rotate(90deg);
  font-size: 10px;
  font-weight: 800;
  right: -50px;
  top:180px;

}
.wrapper_third h3{
  position: absolute;
  transform: rotate(270deg);
  font-size: 10px;
  font-weight: 800;
  left: -108px;
  top:200px;

}
.wrapper_third h4{
  position: absolute;
  transform: rotate(90deg);
  font-size: 10px;
  font-weight: 800;
  right: -50px;
  top:200px;

}

 </style>
        <body>
          <section>
                <div class="wrapper">
                  <h3>Developed By:Catalyst Soft Tech Phone:858888154</h3>
                  
                </div>
                <div style="display: inline-block;width: 100%;border:1px solid #000;margin-top: 10px;margin-left: 10px;" class="content">
                <table style="width: 100%;">
                  <tr>
                    <td rowspan="2" width="12%">
                      <div style="width:90%;margin-bottom: 20px;margin-left: 10px;">
                          <?php
                          $path ='assets/images/Metrologo.png';
                          $type = pathinfo($path, PATHINFO_EXTENSION);
                          $data = file_get_contents($path);
                          $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                          ?>
                          <img src="<?php echo $base64?>" width="100%" height="70px"/>
                      </div>
                    </td>
                    <td rowspan="2" width="50%" style="border-right: 1px solid #000;padding-left: 12px;"> 
                      <h4>Metropolis Logistics Pvt Ltd</h4>
                      <p style="font-size: 10px;">K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR NEW<br/>
                          DELHI-110037 Email:<br/>
                          GSTIN No.: 07AAHCM7482L1ZU</p>
                    </td>
                    <td width="10%" style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;background-color: #640064;color:#fff;">
                      Payment Mode
                    </td>
                    <td width="10%" style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;background-color: #640064;color:#fff;">Transport Mode</td>
                    <td rowspan="2" width="18%">
                      <div style="padding: 5px;">
                        
                      @php
                          $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                          @endphp
                          <?php if($docketFile->Docket_No)
                          {
                              $docket=$docketFile->Docket_No;
                          }
                          else
                          {
                            $docket=$docketFile->Docket;
                          }
                           ?>
                        <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($docket, $generatorPNG::TYPE_CODE_128)) }}" style="width: 100%;height:50px;margin:0">
                        <div style="font-size: 9px;font-weight: 700;margin-top: 2px;text-align:center;">
                           *{{$docket}}*
                          </div> 
                          <?php 
                          if(isset($docketFile->Booking_Date))
                          {
                              $bookingDate=$docketFile->Booking_Date;
                          }
                          else{
                            $bookingDate=$docketFile->BookingDate;
                          }
                       ?>
                        <div style="font-size: 9px;font-weight: 700;display: inline-block;margin-top: 2px;">
                            SHIPPING DATE : {{date("d-m-Y",strtotime($bookingDate))}}
                          </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;">
                      CREDIT
                    </td>
                    <td style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;"> 
                      COURIER
                    </td>
                  </tr>
                </table>
                <table style="border-top: 1px solid #000;width: 100%;font-size: 12px;font-weight: 700;text-align: center;">
                  <tr>
                    <td style="padding: 8px;background-color: #640064;color:#fff;width: 15%;">ORIGIN </td>
                    <?php
                    if(isset($docketFile->SourceCitys))
                    {
                      $originCity=$docketFile->SourceCitys;
                    }
                    else
                    {
                        $originCity=$docketFile->SourceCity;
                    }
                   
                    if(isset($docketFile->DestCitys))
                    {
                      $DestCity=$docketFile->DestCitys;
                    }
                    else
                    {
                        $DestCity=$docketFile->DestCity;
                    }
                
                   ?>
                    <td style="padding: 8px;width: 35%;">{{$originCity}}</td>
                    <td style="padding: 8px;background-color: #640064;color:#fff;width: 15%;">DESTINATION </td>
                    <td style="padding: 8px;width: 35%;">{{$DestCity}} </td>
                  </tr>
                </table>
                <table style="border:1px solid #000;width: 100%;">
                  <tr>
                    <td style="width: 35%;border-left: none;border-bottom: none;vertical-align: top;border-right: 1px solid #000;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">BILL TO: EXPEDITORS INTERNATIONAL INDIA <br/>(C01869)</h3>
                      <p style="font-size: 8px;margin:5px;">BLOCK A & D 5TH FLOOR 61 CHIMES BUILDING, PLOT NO 59 TO<br/>
                        62 SEC-44 GURGAON-122003 HR<br/>
                        GURUGRAM-122003</p><br/>
                    </td>
                    <td style="width: 30%;border-left: none;border-bottom: none;vertical-align: top;border-right: 1px solid #000;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">SENDER: EXPEDITORS INTERNATIONAL <br/>INDIA</h3>
                      <p style="font-size: 8px;margin:5px;">BSP<br/>
                        BILASPUR HARYANA-122413<br/>
                        STATE NAME: HARYANA CODE: 06</p>
                    </td>
                    <td style="width: 35%;border-left: none;border-bottom: none;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">SHIP TO: SELF<br/>
                        <span style="visibility: hidden;">aa</span>
                        </h3> 
                      <p style="font-size: 8px;margin:5px;">AMD<br/>
                        AHMEDABAD-382415<br/>
                        STATE NAME: GUJARAT CODE: 24<br/>
                      GSTIN No.:</p>
                    </td>
                  </tr>
                </table>

                <table style="width: 100%;">
                  <tr style="font-size: 10px;">
                    <td style="width: 62%;">
                      <table style="width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">METHOD OF PACKING</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">DESCRIPTION (SAID TO CONTAIN) </td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">VOLUME (CMS \ Inches)</td>
                        </tr>
                         <tr style="font-weight: 300;">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;font-size: 13px;">@if(isset($docketFile->Title)){{$docketFile->Title}}@endif</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;font-size: 13px;">@if(isset($docketFile->Description)){{$docketFile->Description}}@endif</td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;"></td>
                        </tr>
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">INVOICE NO. & DATE</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">E-WAYBILL NO </td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;font-size: 7px;border-top: 1px solid #000;">AT OWNER'S RISK / CARRIER'S RISK<br/>
                           <span style="font-weight: 300;font-size: 7px;">If insured, Details of Insurance Policy</span></td>
                        </tr>
                        <tr style="font-weight: 300;">
                          <td style="width: 30%;border-right: 1px solid #000;padding: 5px;font-weight: 300;font-size: 8px;"><span style="font-weight: 300;"><p>@if(isset($docketFile->Invoice)){{$docketFile->Invoice}}@endif<br/><br/>@if(isset($docketFile->InvoiceDate)){{$docketFile->InvoiceDate}}@endif</p></span></td>
                          <td style="width: 40%;border-right: 1px solid #000;padding: 20px;font-weight: 300;font-size: 8px;">@if(isset($docketFile->EwayBill)){{$docketFile->EwayBill}}@endif</td>
                          <td style="width: 31%;border-right: 1px solid #000;padding: 5px;font-weight: 300;font-size: 8px;"><span style="font-weight: 300;">POLICY NO &nbsp; &nbsp; DATE
                            <br/>INSURANCE COMPANY<br/>INSURED VALUE</span>
                          </td>
                        </tr>
                        
                      </table>
                      <table style="width: 100%;">
                       
                          <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 29.7%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">VALUE DECLARED (Rs.)</td>
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;"></td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;" colspan="2">ADD. SERVICES</td>
                        
                        </tr>
                        <tr style="font-weight: 300;">
                          <td style="border-right: 1px solid #000;padding: 20px;font-weight: 300;text-align: center;font-size: 13px;">@if(isset($docketFile->TotalAmount)){{$docketFile->TotalAmount}}@endif<</td>
                          <?php 
                          if(isset($docketFile->Booking_Date))
                          {
                              $bookingDate=$docketFile->Booking_Date;
                              $date1=date("d-m-Y",strtotime($bookingDate));
                          }
                          else{
                            $bookingDate=$docketFile->BookingDate;
                            $date1=date("d-m-Y",strtotime($bookingDate));
                          }
                           
                          ?>
                          <td style="border-right: 1px solid #000;padding: 20px;font-weight: 300;text-align: center;">Expected Delivery <br/>Date <br/><span style="font-size: 13px;">@if(isset($docketFile->TransitDays)){{date('d/m/Y', strtotime($bookingDate. ' + '.$docketFile->TransitDays.' days'));}}@endif</span></td>
                          <td style="border-right: 1px solid #000;padding: 5px;font-weight: 300;"> DACC &#x25a2;   <br/>COD  <input type="checkbox"/>
                            <br/>DOD  <input type="checkbox"/>
                          </td>
                          <td style="border-right: 1px solid #000;font-size: 8px;">TOPAY AMOUNT <br/>MR NO. <br/>DATE</td>
                        </tr>
                      </table>
                      <table style="border:1px solid #000;width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td colspan="2" style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;"> RECEIVED ABOVE SHIPMENT IN ORDER AND IN GOOD CONDITIONS</td>
                          <td style="text-align: center;padding:5px;border-bottom: 1px solid #000;">SPECIAL INSTRUCTIONS</td>
                        </tr>
                        <tr>
                          <td colspan="2" style="text-align: center;padding:6px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;"> </td>
                          <td style="text-align: center;padding:6px;border-bottom: 1px solid #000;" rowspan="2"></td>
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;">SIGN. </td>
                          <td style="vertical-align:top;padding:5px;border-right: 1px solid #000;" rowspan="3">STAMP</td>
                          
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;">NAME </td>
                           <td style="text-align: left;padding:5px;font-size: 8px;"><input type="checkbox"/>  LIMITED TO RS 1000/-ONLY</td>
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;">PHONE </td>
                          <td style="text-align: left;padding:5px;font-size: 8px;"><input type="checkbox"/> WE CARRY UNDER CARRIER'S ACT</td>
                        </tr>
                       
                      </table>
                    </td>
                    <td style="width: 38%;">
                      <table style="width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700;">
                          <td style="width: 33%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">NO. OF PIECES</td>
                          <td style="width: 33%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">CHARGES</td>
                          <td style="width: 33%;text-align: center;padding: 6px;border-bottom: 1px solid #000;">FREIGHT</td>
                        </tr>
                        <tr>
                        <?php 
                        if(isset($docketFile->Qty))
                        {
                            $qty=$docketFile->Qty; 
                        }
                        else
                        {
                            $qty=$docketFile->Pices;
                        }
                        ?>
                          <td rowspan="2" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;">{{$qty}}</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FREIGHT</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">TO PAY CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td rowspan="2" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;background-color:#ffd9ff;font-size: 9px; ">ACTUAL WEIGHT</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">RISK CHARGE</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                         
                          <td style="padding: 5px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">D/C</td>
                          <td style="border-bottom: 1px solid #000;padding: 5px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                         <tr>
                          <td rowspan="2" style="padding:5px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 11px; ">@if(isset($docketFile->Actual_Weight)){{$docketFile->Actual_Weight}}@endif</td>
                          <td style="padding: 5px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">DOD/COD CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 5px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">HANDLING CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000; background-color:#ffd9ff; font-size: 9px;">CHARGED WEIGHT</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">OSC</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td rowspan="3" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 11px;">@if(isset($docketFile->Charged_Weight)){{$docketFile->Charged_Weight}}@endif</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FUEL SURCHARGE</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                         <tr>
                          
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FUEL TOTAL</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">GRAND TOTAL</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr style="background-color:#ffd9ff;">
                          <td colspan="3" style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">GSTIN to be paid by</td>
                        </tr>
                        <tr style="background-color:#ffd9ff;">
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                            <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Consignor</div>
                          </td>
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                            <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Consignee</div>
                          </td>
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                          <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Transporter</div></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="border-top:1px solid #000;padding: 2px 5px 32px 0px; font-size: 8px;">I/we hereby to the terms and condition setout on the reverse of this Consignor's copy and declare that contents of this way bill are true and correct. the to-pay Freight has my / our consent and will be paid by the consignee along with service charge as applicable at the time of delivery.
                            <br/></td>
                        </tr>
                        
                        <tr>
                          <td style="padding: 2px;font-size: 8px;border-bottom: 1px solid #000;">NAME</td>
                          <td colspan="2" style="padding: 2px;font-size: 8px;border-bottom: 1px solid #000;text-align: right;">CONSIGNOR'S SIGN</td>
                        </tr>
                         <tr>
                          <td style="padding: 2px 0px 13px 0px;font-size: 8px;">NAME</td>
                          <td colspan="2" style="padding: 2px 0px 13px 0px;font-size: 8px;text-align: right;">RECEIVED BY METROPOLIS LOGISTICS PVT LTD</td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-size: 8px;">DATE & TIME</td>
                          <td colspan="2" style="padding: 2px;font-size: 8px;text-align: right;">BOOKING INCHARGE</td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                </table>
              </div>
                
                      
              
            <div style="" class="wrapper">
            <h4>CONSIGNOR COPY</h4>
          </div> 
                
        </section>

          <section style="page-break-before:always;">
                <div class="wrapper">
                  <h3>Developed By:Catalyst Soft Tech Phone:858888154</h3>
                  
                </div>
                <div style="display: inline-block;width: 100%;border:1px solid #000;margin-top: 10px;margin-left: 10px;" class="content">
                <table style="width: 100%;">
                  <tr>
                    <td rowspan="2" width="12%">
                      <div style="width:90%;margin-bottom: 20px;margin-left: 10px;">
                          <?php
                          $path ='assets/images/Metrologo.png';
                          $type = pathinfo($path, PATHINFO_EXTENSION);
                          $data = file_get_contents($path);
                          $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                          ?>
                          <img src="<?php echo $base64?>" width="100%" height="70px"/>
                      </div>
                    </td>
                    <td rowspan="2" width="50%" style="border-right: 1px solid #000;padding-left: 12px;"> 
                      <h4>Metropolis Logistics Pvt Ltd</h4>
                      <p style="font-size: 10px;">K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR NEW<br/>
                          DELHI-110037 Email:<br/>
                          GSTIN No.: 07AAHCM7482L1ZU</p>
                    </td>
                    <td width="10%" style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;background-color: #640064;color:#fff;">
                      Payment Mode
                    </td>
                    <td width="10%" style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;background-color: #640064;color:#fff;">Transport Mode</td>
                    <td rowspan="2" width="18%">
                      <div style="padding: 5px;">
                        
                      @php
                          $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                          @endphp
                          <?php if($docketFile->Docket_No)
                          {
                              $docket=$docketFile->Docket_No;
                          }
                          else
                          {
                            $docket=$docketFile->Docket;
                          }
                           ?>
                        <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($docket, $generatorPNG::TYPE_CODE_128)) }}" style="width: 100%;height:50px;margin:0">
                        <div style="font-size: 9px;font-weight: 700;margin-top: 2px;text-align:center;">
                           *{{$docket}}*
                          </div> 
                          <?php 
                          if(isset($docketFile->Booking_Date))
                          {
                              $bookingDate=$docketFile->Booking_Date;
                          }
                          else{
                            $bookingDate=$docketFile->BookingDate;
                          }
                       ?>
                        <div style="font-size: 9px;font-weight: 700;display: inline-block;margin-top: 2px;">
                            SHIPPING DATE : {{date("d-m-Y",strtotime($bookingDate))}}
                          </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;">
                      CREDIT
                    </td>
                    <td style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;"> 
                      COURIER
                    </td>
                  </tr>
                </table>
                <table style="border-top: 1px solid #000;width: 100%;font-size: 12px;font-weight: 700;text-align: center;">
                  <tr>
                    <td style="padding: 8px;background-color: #640064;color:#fff;width: 15%;">ORIGIN </td>
                    <?php
                    if(isset($docketFile->SourceCitys))
                    {
                      $originCity=$docketFile->SourceCitys;
                    }
                    else
                    {
                        $originCity=$docketFile->SourceCity;
                    }
                   
                    if(isset($docketFile->DestCitys))
                    {
                      $DestCity=$docketFile->DestCitys;
                    }
                    else
                    {
                        $DestCity=$docketFile->DestCity;
                    }
                
                   ?>
                    <td style="padding: 8px;width: 35%;">{{$originCity}}</td>
                    <td style="padding: 8px;background-color: #640064;color:#fff;width: 15%;">DESTINATION </td>
                    <td style="padding: 8px;width: 35%;">{{$DestCity}} </td>
                  </tr>
                </table>
                <table style="border:1px solid #000;width: 100%;">
                  <tr>
                    <td style="width: 35%;border-left: none;border-bottom: none;vertical-align: top;border-right: 1px solid #000;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">BILL TO: EXPEDITORS INTERNATIONAL INDIA <br/>(C01869)</h3>
                      <p style="font-size: 8px;margin:5px;">BLOCK A & D 5TH FLOOR 61 CHIMES BUILDING, PLOT NO 59 TO<br/>
                        62 SEC-44 GURGAON-122003 HR<br/>
                        GURUGRAM-122003</p><br/>
                    </td>
                    <td style="width: 30%;border-left: none;border-bottom: none;vertical-align: top;border-right: 1px solid #000;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">SENDER: EXPEDITORS INTERNATIONAL <br/>INDIA</h3>
                      <p style="font-size: 8px;margin:5px;">BSP<br/>
                        BILASPUR HARYANA-122413<br/>
                        STATE NAME: HARYANA CODE: 06</p>
                    </td>
                    <td style="width: 35%;border-left: none;border-bottom: none;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">SHIP TO: SELF<br/>
                        <span style="visibility: hidden;">aa</span>
                        </h3> 
                      <p style="font-size: 8px;margin:5px;">AMD<br/>
                        AHMEDABAD-382415<br/>
                        STATE NAME: GUJARAT CODE: 24<br/>
                      GSTIN No.:</p>
                    </td>
                  </tr>
                </table>

                <table style="width: 100%;">
                  <tr style="font-size: 10px;">
                    <td style="width: 62%;">
                      <table style="width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">METHOD OF PACKING</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">DESCRIPTION (SAID TO CONTAIN) </td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">VOLUME (CMS \ Inches)</td>
                        </tr>
                         <tr style="font-weight: 300;">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;font-size: 13px;">@if(isset($docketFile->Title)){{$docketFile->Title}}@endif</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;font-size: 13px;">@if(isset($docketFile->Description)){{$docketFile->Description}}@endif</td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;"></td>
                        </tr>
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">INVOICE NO. & DATE</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">E-WAYBILL NO </td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;font-size: 7px;border-top: 1px solid #000;">AT OWNER'S RISK / CARRIER'S RISK<br/>
                           <span style="font-weight: 300;font-size: 7px;">If insured, Details of Insurance Policy</span></td>
                        </tr>
                        <tr style="font-weight: 300;">
                          <td style="width: 30%;border-right: 1px solid #000;padding: 5px;font-weight: 300;font-size: 8px;"><span style="font-weight: 300;"><p>@if(isset($docketFile->Invoice)){{$docketFile->Invoice}}@endif<br/><br/>@if(isset($docketFile->InvoiceDate)){{$docketFile->InvoiceDate}}@endif</p></span></td>
                          <td style="width: 40%;border-right: 1px solid #000;padding: 20px;font-weight: 300;font-size: 8px;">@if(isset($docketFile->EwayBill)){{$docketFile->EwayBill}}@endif</td>
                          <td style="width: 31%;border-right: 1px solid #000;padding: 5px;font-weight: 300;font-size: 8px;"><span style="font-weight: 300;">POLICY NO &nbsp; &nbsp; DATE
                            <br/>INSURANCE COMPANY<br/>INSURED VALUE</span>
                          </td>
                        </tr>
                        
                      </table>
                      <table style="width: 100%;">
                       
                          <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 29.7%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">VALUE DECLARED (Rs.)</td>
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;"></td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;" colspan="2">ADD. SERVICES</td>
                        
                        </tr>
                        <tr style="font-weight: 300;">
                          <td style="border-right: 1px solid #000;padding: 20px;font-weight: 300;text-align: center;font-size: 13px;">@if(isset($docketFile->TotalAmount)){{$docketFile->TotalAmount}}@endif<</td>
                          <?php 
                          if(isset($docketFile->Booking_Date))
                          {
                              $bookingDate=$docketFile->Booking_Date;
                              $date1=date("d-m-Y",strtotime($bookingDate));
                          }
                          else{
                            $bookingDate=$docketFile->BookingDate;
                            $date1=date("d-m-Y",strtotime($bookingDate));
                          }
                           
                          ?>
                          <td style="border-right: 1px solid #000;padding: 20px;font-weight: 300;text-align: center;">Expected Delivery <br/>Date <br/><span style="font-size: 13px;">@if(isset($docketFile->TransitDays)){{date('d/m/Y', strtotime($bookingDate. ' + '.$docketFile->TransitDays.' days'));}}@endif</span></td>
                          <td style="border-right: 1px solid #000;padding: 5px;font-weight: 300;"> DACC &#x25a2;   <br/>COD  <input type="checkbox"/>
                            <br/>DOD  <input type="checkbox"/>
                          </td>
                          <td style="border-right: 1px solid #000;font-size: 8px;">TOPAY AMOUNT <br/>MR NO. <br/>DATE</td>
                        </tr>
                      </table>
                      <table style="border:1px solid #000;width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td colspan="2" style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;"> RECEIVED ABOVE SHIPMENT IN ORDER AND IN GOOD CONDITIONS</td>
                          <td style="text-align: center;padding:5px;border-bottom: 1px solid #000;">SPECIAL INSTRUCTIONS</td>
                        </tr>
                        <tr>
                          <td colspan="2" style="text-align: center;padding:6px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;"> </td>
                          <td style="text-align: center;padding:6px;border-bottom: 1px solid #000;" rowspan="2"></td>
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;">SIGN. </td>
                          <td style="vertical-align:top;padding:5px;border-right: 1px solid #000;" rowspan="3">STAMP</td>
                          
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;">NAME </td>
                           <td style="text-align: left;padding:5px;font-size: 8px;"><input type="checkbox"/>  LIMITED TO RS 1000/-ONLY</td>
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;">PHONE </td>
                          <td style="text-align: left;padding:5px;font-size: 8px;"><input type="checkbox"/> WE CARRY UNDER CARRIER'S ACT</td>
                        </tr>
                       
                      </table>
                    </td>
                    <td style="width: 38%;">
                      <table style="width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700;">
                          <td style="width: 33%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">NO. OF PIECES</td>
                          <td style="width: 33%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">CHARGES</td>
                          <td style="width: 33%;text-align: center;padding: 6px;border-bottom: 1px solid #000;">FREIGHT</td>
                        </tr>
                        <tr>
                        <?php 
                        if(isset($docketFile->Qty))
                        {
                            $qty=$docketFile->Qty; 
                        }
                        else
                        {
                            $qty=$docketFile->Pices;
                        }
                        ?>
                          <td rowspan="2" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;">{{$qty}}</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FREIGHT</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">TO PAY CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td rowspan="2" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;background-color:#ffd9ff;font-size: 9px; ">ACTUAL WEIGHT</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">RISK CHARGE</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                         
                          <td style="padding: 5px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">D/C</td>
                          <td style="border-bottom: 1px solid #000;padding: 5px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                         <tr>
                          <td rowspan="2" style="padding:5px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 11px; ">@if(isset($docketFile->Actual_Weight)){{$docketFile->Actual_Weight}}@endif</td>
                          <td style="padding: 5px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">DOD/COD CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 5px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">HANDLING CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000; background-color:#ffd9ff; font-size: 9px;">CHARGED WEIGHT</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">OSC</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td rowspan="3" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 11px;">@if(isset($docketFile->Charged_Weight)){{$docketFile->Charged_Weight}}@endif</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FUEL SURCHARGE</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                         <tr>
                          
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FUEL TOTAL</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">GRAND TOTAL</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr style="background-color:#ffd9ff;">
                          <td colspan="3" style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">GSTIN to be paid by</td>
                        </tr>
                        <tr style="background-color:#ffd9ff;">
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                            <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Consignor</div>
                          </td>
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                            <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Consignee</div>
                          </td>
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                          <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Transporter</div></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="border-top:1px solid #000;padding: 2px 5px 32px 0px; font-size: 8px;">I/we hereby to the terms and condition setout on the reverse of this Consignor's copy and declare that contents of this way bill are true and correct. the to-pay Freight has my / our consent and will be paid by the consignee along with service charge as applicable at the time of delivery.
                            <br/></td>
                        </tr>
                        
                        <tr>
                          <td style="padding: 2px;font-size: 8px;border-bottom: 1px solid #000;">NAME</td>
                          <td colspan="2" style="padding: 2px;font-size: 8px;border-bottom: 1px solid #000;text-align: right;">CONSIGNOR'S SIGN</td>
                        </tr>
                         <tr>
                          <td style="padding: 2px 0px 13px 0px;font-size: 8px;">NAME</td>
                          <td colspan="2" style="padding: 2px 0px 13px 0px;font-size: 8px;text-align: right;">RECEIVED BY METROPOLIS LOGISTICS PVT LTD</td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-size: 8px;">DATE & TIME</td>
                          <td colspan="2" style="padding: 2px;font-size: 8px;text-align: right;">BOOKING INCHARGE</td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                </table>
              </div>
                
                      
              
            <div style="" class="wrapper_second">
            <h4>POD COPY</h4>
          </div> 
                
        </section>
         <section style="page-break-before:always;">
                <div class="wrapper">
                  <h3>Developed By:Catalyst Soft Tech Phone:858888154</h3>
                  
                </div>
                <div style="display: inline-block;width: 100%;border:1px solid #000;margin-top: 10px;margin-left: 10px;" class="content">
                <table style="width: 100%;">
                  <tr>
                    <td rowspan="2" width="12%">
                      <div style="width:90%;margin-bottom: 20px;margin-left: 10px;">
                          <?php
                          $path ='assets/images/Metrologo.png';
                          $type = pathinfo($path, PATHINFO_EXTENSION);
                          $data = file_get_contents($path);
                          $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                          ?>
                          <img src="<?php echo $base64?>" width="100%" height="70px"/>
                      </div>
                    </td>
                    <td rowspan="2" width="50%" style="border-right: 1px solid #000;padding-left: 12px;"> 
                      <h4>Metropolis Logistics Pvt Ltd</h4>
                      <p style="font-size: 10px;">K2-832,KHASRA NO.834, MATA CHOWK MAHIPALPUR NEW<br/>
                          DELHI-110037 Email:<br/>
                          GSTIN No.: 07AAHCM7482L1ZU</p>
                    </td>
                    <td width="10%" style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;background-color: #640064;color:#fff;">
                      Payment Mode
                    </td>
                    <td width="10%" style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;background-color: #640064;color:#fff;">Transport Mode</td>
                    <td rowspan="2" width="18%">
                      <div style="padding: 5px;">
                        
                      @php
                          $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                          @endphp
                          <?php if($docketFile->Docket_No)
                          {
                              $docket=$docketFile->Docket_No;
                          }
                          else
                          {
                            $docket=$docketFile->Docket;
                          }
                           ?>
                        <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($docket, $generatorPNG::TYPE_CODE_128)) }}" style="width: 100%;height:50px;margin:0">
                        <div style="font-size: 9px;font-weight: 700;margin-top: 2px;text-align:center;">
                           *{{$docket}}*
                          </div> 
                          <?php 
                          if(isset($docketFile->Booking_Date))
                          {
                              $bookingDate=$docketFile->Booking_Date;
                          }
                          else{
                            $bookingDate=$docketFile->BookingDate;
                          }
                       ?>
                        <div style="font-size: 9px;font-weight: 700;display: inline-block;margin-top: 2px;">
                            SHIPPING DATE : {{date("d-m-Y",strtotime($bookingDate))}}
                          </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;">
                      CREDIT
                    </td>
                    <td style="border-right: 1px solid #000;font-size: 12px;font-weight: 700;text-align: center;"> 
                      COURIER
                    </td>
                  </tr>
                </table>
                <table style="border-top: 1px solid #000;width: 100%;font-size: 12px;font-weight: 700;text-align: center;">
                  <tr>
                    <td style="padding: 8px;background-color: #640064;color:#fff;width: 15%;">ORIGIN </td>
                    <?php
                    if(isset($docketFile->SourceCitys))
                    {
                      $originCity=$docketFile->SourceCitys;
                    }
                    else
                    {
                        $originCity=$docketFile->SourceCity;
                    }
                   
                    if(isset($docketFile->DestCitys))
                    {
                      $DestCity=$docketFile->DestCitys;
                    }
                    else
                    {
                        $DestCity=$docketFile->DestCity;
                    }
                
                   ?>
                    <td style="padding: 8px;width: 35%;">{{$originCity}}</td>
                    <td style="padding: 8px;background-color: #640064;color:#fff;width: 15%;">DESTINATION </td>
                    <td style="padding: 8px;width: 35%;">{{$DestCity}} </td>
                  </tr>
                </table>
                <table style="border:1px solid #000;width: 100%;">
                  <tr>
                    <td style="width: 35%;border-left: none;border-bottom: none;vertical-align: top;border-right: 1px solid #000;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">BILL TO: EXPEDITORS INTERNATIONAL INDIA <br/>(C01869)</h3>
                      <p style="font-size: 8px;margin:5px;">BLOCK A & D 5TH FLOOR 61 CHIMES BUILDING, PLOT NO 59 TO<br/>
                        62 SEC-44 GURGAON-122003 HR<br/>
                        GURUGRAM-122003</p><br/>
                    </td>
                    <td style="width: 30%;border-left: none;border-bottom: none;vertical-align: top;border-right: 1px solid #000;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">SENDER: EXPEDITORS INTERNATIONAL <br/>INDIA</h3>
                      <p style="font-size: 8px;margin:5px;">BSP<br/>
                        BILASPUR HARYANA-122413<br/>
                        STATE NAME: HARYANA CODE: 06</p>
                    </td>
                    <td style="width: 35%;border-left: none;border-bottom: none;">
                      <h3 style="font-size: 10px;font-weight: 700;margin:5px 10px;">SHIP TO: SELF<br/>
                        <span style="visibility: hidden;">aa</span>
                        </h3> 
                      <p style="font-size: 8px;margin:5px;">AMD<br/>
                        AHMEDABAD-382415<br/>
                        STATE NAME: GUJARAT CODE: 24<br/>
                      GSTIN No.:</p>
                    </td>
                  </tr>
                </table>

                <table style="width: 100%;">
                  <tr style="font-size: 10px;">
                    <td style="width: 62%;">
                      <table style="width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">METHOD OF PACKING</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">DESCRIPTION (SAID TO CONTAIN) </td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">VOLUME (CMS \ Inches)</td>
                        </tr>
                         <tr style="font-weight: 300;">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;font-size: 13px;">@if(isset($docketFile->Title)){{$docketFile->Title}}@endif</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;font-size: 13px;">@if(isset($docketFile->Description)){{$docketFile->Description}}@endif</td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 20px;font-weight: 300 !important;"></td>
                        </tr>
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">INVOICE NO. & DATE</td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">E-WAYBILL NO </td>
                          <td style="width: 31%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;font-size: 7px;border-top: 1px solid #000;">AT OWNER'S RISK / CARRIER'S RISK<br/>
                           <span style="font-weight: 300;font-size: 7px;">If insured, Details of Insurance Policy</span></td>
                        </tr>
                        <tr style="font-weight: 300;">
                          <td style="width: 30%;border-right: 1px solid #000;padding: 5px;font-weight: 300;font-size: 8px;"><span style="font-weight: 300;"><p>@if(isset($docketFile->Invoice)){{$docketFile->Invoice}}@endif<br/><br/>@if(isset($docketFile->InvoiceDate)){{$docketFile->InvoiceDate}}@endif</p></span></td>
                          <td style="width: 40%;border-right: 1px solid #000;padding: 20px;font-weight: 300;font-size: 8px;">@if(isset($docketFile->EwayBill)){{$docketFile->EwayBill}}@endif</td>
                          <td style="width: 31%;border-right: 1px solid #000;padding: 5px;font-weight: 300;font-size: 8px;"><span style="font-weight: 300;">POLICY NO &nbsp; &nbsp; DATE
                            <br/>INSURANCE COMPANY<br/>INSURED VALUE</span>
                          </td>
                        </tr>
                        
                      </table>
                      <table style="width: 100%;">
                       
                          <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td style="width: 29.7%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;">VALUE DECLARED (Rs.)</td>
                          <td style="width: 30%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;"></td>
                          <td style="width: 40%;text-align: center;border-right: 1px solid #000;padding: 5px;border-bottom: 1px solid #000;border-top: 1px solid #000;" colspan="2">ADD. SERVICES</td>
                        
                        </tr>
                        <tr style="font-weight: 300;">
                          <td style="border-right: 1px solid #000;padding: 20px;font-weight: 300;text-align: center;font-size: 13px;">@if(isset($docketFile->TotalAmount)){{$docketFile->TotalAmount}}@endif<</td>
                          <?php 
                          if(isset($docketFile->Booking_Date))
                          {
                              $bookingDate=$docketFile->Booking_Date;
                              $date1=date("d-m-Y",strtotime($bookingDate));
                          }
                          else{
                            $bookingDate=$docketFile->BookingDate;
                            $date1=date("d-m-Y",strtotime($bookingDate));
                          }
                           
                          ?>
                          <td style="border-right: 1px solid #000;padding: 20px;font-weight: 300;text-align: center;">Expected Delivery <br/>Date <br/><span style="font-size: 13px;">@if(isset($docketFile->TransitDays)){{date('d/m/Y', strtotime($bookingDate. ' + '.$docketFile->TransitDays.' days'));}}@endif</span></td>
                          <td style="border-right: 1px solid #000;padding: 5px;font-weight: 300;"> DACC &#x25a2;   <br/>COD  <input type="checkbox"/>
                            <br/>DOD  <input type="checkbox"/>
                          </td>
                          <td style="border-right: 1px solid #000;font-size: 8px;">TOPAY AMOUNT <br/>MR NO. <br/>DATE</td>
                        </tr>
                      </table>
                      <table style="border:1px solid #000;width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700; ">
                          <td colspan="2" style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;"> RECEIVED ABOVE SHIPMENT IN ORDER AND IN GOOD CONDITIONS</td>
                          <td style="text-align: center;padding:5px;border-bottom: 1px solid #000;">SPECIAL INSTRUCTIONS</td>
                        </tr>
                        <tr>
                          <td colspan="2" style="text-align: center;padding:6px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;"> </td>
                          <td style="text-align: center;padding:6px;border-bottom: 1px solid #000;" rowspan="2"></td>
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;">SIGN. </td>
                          <td style="vertical-align:top;padding:5px;border-right: 1px solid #000;" rowspan="3">STAMP</td>
                          
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;border-bottom: 1px solid #000;">NAME </td>
                           <td style="text-align: left;padding:5px;font-size: 8px;"><input type="checkbox"/>  LIMITED TO RS 1000/-ONLY</td>
                        </tr>
                        <tr>
                          <td style="text-align: center;padding:5px;border-right: 1px solid #000;font-size: 8px;">PHONE </td>
                          <td style="text-align: left;padding:5px;font-size: 8px;"><input type="checkbox"/> WE CARRY UNDER CARRIER'S ACT</td>
                        </tr>
                       
                      </table>
                    </td>
                    <td style="width: 38%;">
                      <table style="width: 100%;">
                        <tr style="background-color:#ffd9ff;font-weight: 700;">
                          <td style="width: 33%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">NO. OF PIECES</td>
                          <td style="width: 33%;text-align: center;border-right: 1px solid #000;padding: 6px;border-bottom: 1px solid #000;">CHARGES</td>
                          <td style="width: 33%;text-align: center;padding: 6px;border-bottom: 1px solid #000;">FREIGHT</td>
                        </tr>
                        <tr>
                        <?php 
                        if(isset($docketFile->Qty))
                        {
                            $qty=$docketFile->Qty; 
                        }
                        else
                        {
                            $qty=$docketFile->Pices;
                        }
                        ?>
                          <td rowspan="2" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;">{{$qty}}</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FREIGHT</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">TO PAY CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td rowspan="2" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;background-color:#ffd9ff;font-size: 9px; ">ACTUAL WEIGHT</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">RISK CHARGE</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                         
                          <td style="padding: 5px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">D/C</td>
                          <td style="border-bottom: 1px solid #000;padding: 5px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                         <tr>
                          <td rowspan="2" style="padding:5px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 11px; ">@if(isset($docketFile->Actual_Weight)){{$docketFile->Actual_Weight}}@endif</td>
                          <td style="padding: 5px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">DOD/COD CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 5px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">HANDLING CHARGES</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000; background-color:#ffd9ff; font-size: 9px;">CHARGED WEIGHT</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">OSC</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          <td rowspan="3" style="padding:2px;border-right: 1px solid #000;font-weight: 700;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-size: 11px;">@if(isset($docketFile->Charged_Weight)){{$docketFile->Charged_Weight}}@endif</td>
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FUEL SURCHARGE</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                         <tr>
                          
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">FUEL TOTAL</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr>
                          
                          <td style="padding: 2px;font-weight: 700;font-size: 8px;border-right: 1px solid #000;text-align: right;">GRAND TOTAL</td>
                          <td style="border-bottom: 1px solid #000;padding: 2px;font-weight: 700;font-size: 8px;"></td>
                        </tr>
                        <tr style="background-color:#ffd9ff;">
                          <td colspan="3" style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">GSTIN to be paid by</td>
                        </tr>
                        <tr style="background-color:#ffd9ff;">
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                            <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Consignor</div>
                          </td>
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                            <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Consignee</div>
                          </td>
                          <td style="text-align: center;padding: 2px;border-bottom: 1px solid #000;border-top: 1px solid #000;font-weight: 700;">
                          <div style="display: inline-block;"><input type="checkbox" style="font-size: 20px;" /></div> 
                            <div style="display: inline-block;vertical-align: middle;">Transporter</div></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="border-top:1px solid #000;padding: 2px 5px 32px 0px; font-size: 8px;">I/we hereby to the terms and condition setout on the reverse of this Consignor's copy and declare that contents of this way bill are true and correct. the to-pay Freight has my / our consent and will be paid by the consignee along with service charge as applicable at the time of delivery.
                            <br/></td>
                        </tr>
                        
                        <tr>
                          <td style="padding: 2px;font-size: 8px;border-bottom: 1px solid #000;">NAME</td>
                          <td colspan="2" style="padding: 2px;font-size: 8px;border-bottom: 1px solid #000;text-align: right;">CONSIGNOR'S SIGN</td>
                        </tr>
                         <tr>
                          <td style="padding: 2px 0px 13px 0px;font-size: 8px;">NAME</td>
                          <td colspan="2" style="padding: 2px 0px 13px 0px;font-size: 8px;text-align: right;">RECEIVED BY METROPOLIS LOGISTICS PVT LTD</td>
                        </tr>
                        <tr>
                          <td style="padding: 2px;font-size: 8px;">DATE & TIME</td>
                          <td colspan="2" style="padding: 2px;font-size: 8px;text-align: right;">BOOKING INCHARGE</td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                </table>
              </div>
                
                      
              
            <div style="" class="wrapper_third">
            <h4>EDP COPY</h4>
          </div> 
                
        </section>
      
         
    </body>


</html>