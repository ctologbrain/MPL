<!DOCTYPE html>
<html style="margin: 0">

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style type="text/css">
        #container {
        max-width: 100%;
        overflow-x: auto;
         height: auto;
         overflow-y: hidden;
        
        
    }
    
    .upperTable {
        max-width: 100%;
        height: auto;
        overflow-x: auto;
        overflow-y: hidden;
    }
    
        @media print {
     #container {
         height: auto;
        overflow-x: visible;
        overflow-y: hidden;
     }
    
     .upperTable {
       height: auto;
        overflow-x: visible;
        overflow-y: hidden;

     }
     .logo-img{
        display: inline-block;
        width: 40%;
     }
    .logo-lg img{
        max-width: 100%;
    }

 }
  
    </style>
</head>
<body style="margin: 15px;">

<div style="border:1px solid #000;">
        <div  style="width:35%;margin-bottom: 0px;margin-left: 10px;display: inline-block;">
            <div class="logo-lg">
                <?php
                       $path ='assets/images/Metrologo.png';
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                <img src="<?php echo $base64?>" style="max-width: 100%;text-align: center;" />
            </div>
        </div>
        <div style="width:30%;display: inline-block;text-align: center;">
            <h2 style="font-size: 16px;margin-bottom: 30px;">Vehicle Gatepass</h2>
            <h2 style="font-size: 16px;">@isset($gatePassDetails->UserDataDetails->empOffDetail->OfficeMasterParent->OfficeName) {{$gatePassDetails->UserDataDetails->empOffDetail->OfficeMasterParent->OfficeName}} @endisset</h2>
        </div>
        <div style="width:32%;display: inline-block;margin-top: 35px;text-align: center;margin-bottom: 0px;">
                @php
              $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
             @endphp
           <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($productCode, $generatorPNG::TYPE_CODE_128)) }}" style="width: 90%;height:7%;">
            <div>*{{$productCode}}*</div>
        </div>
        <div style="font-size: 12px;text-align: center;">METROPOLIS LOGISTICS PVT LTD. SHRI AMBICA ESTATE, NEAR NH 8, VILLAGE ASLALI, AHMEDABAD,
            GODOWN NO - B-17,18,19</div>
        <div  style="font-size: 12px;text-align: center;">
            MILKAIT NO 2629,2630,2631, AHMEDABAD, GUJARAT, 382415 AHMEDABAD-382415
        </div>
        <div style="font-size: 12px;margin-bottom: 2px;text-align: center;">
            <b>Mob.:</b> 9131287274 <b>Web:</b> WWW.METROPOLISLOGISTICS.COM <b>Email:</b> amd@metropolislogistics.com
        </div>
        <div class="upperTable">
            <table class="table1" style="border-collapse: collapse;font-size: 12px;"width="100%;">
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Print Date & Time</b></td>
                    <td style="paddin:5px;border:1px solid #000;">{{date("d/m/Y")}} &nbsp; &nbsp; {{date('H:i')}}</td>
                    <td style="paddin:5px;border:1px solid #000;"><b>GP Date</b></td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;" colspan="2">{{$gatePassDetails->GP_TIME}}</td>
                </tr>
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Origin</b></td>
                    <td style="paddin:5px;border:1px solid #000;">{{$gatePassDetails->RouteMasterDetails->StatrtPointDetails->CityName}}</td>
                    <td style="paddin:5px;border:1px solid #000;" ><b>Destination</b></td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;"  colspan="2">{{$gatePassDetails->RouteMasterDetails->EndPointDetails->CityName}}</td>
                </tr>
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Vendor Name</b></td>
                    <td style="paddin:5px;border:1px solid #000;">{{$gatePassDetails->VendorDetails->VendorCode}}~{{$gatePassDetails->VendorDetails->VendorName}}</td>
                    <td style="paddin:5px;border:1px solid #000;"><b>Driver's Name & Phone</b></td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;"  colspan="2">@if(isset($gatePassDetails->DriverDetails->DriverName)){{$gatePassDetails->DriverDetails->DriverName}} @endif @if(isset($gatePassDetails->DriverDetails->Phone)) ({{$gatePassDetails->DriverDetails->Phone}}) @endif </td>
                </tr>
                <tr>
                    <td style="paddin:5px;border-left: none;"><b>Vehicle Number</b></td>
                    <td style="paddin:5px;border:1px solid #000;">{{$gatePassDetails->VehicleDetails->VehicleNo}}</td>
                    <td style="paddin:5px;border:1px solid #000;"><b>Vehicle Model</b></td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;"  colspan="2">{{$gatePassDetails->VehicleTypeDetails->VehicleType}}</td>
                </tr>
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Truck Hire Charges</b></td>
                    <td style="paddin:5px;border:1px solid #000;">0.00</td>
                    <td style="paddin:5px;border:1px solid #000;"><b>Start Km</b></td>
                    <td style="paddin:5px;border:1px solid #000;">{{$gatePassDetails->Start_Km}}</td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;" ><b>EWB</b></td>
                </tr>
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Vehicle Seal No</b></td>
                    <td style="paddin:5px;border:1px solid #000;">{{$gatePassDetails->Seal}}</td>
                    <td style="paddin:5px;border:1px solid #000;"><b>Distance (Aprox.)</b></td>
                    <td style="paddin:5px;border:1px solid #000;">764.99</td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;"  rowspan="2">7237340642</td>
                </tr>
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Route Name</b></td>
                    <td style="paddin:5px;border:1px solid #000;">
                    <?php if(isset($routeTouch->TouchPointCity)){
                        $expUnique = array_unique(explode("-",$routeTouch->TouchPointCity));
                      $resTouchpoint=  implode("-", $expUnique);
                    } ?>
                    @isset($resTouchpoint)
                     {{$resTouchpoint}} @endisset</td>
                    <td style="paddin:5px;border:1px solid #000;"><b>FPM Number</b></td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;" >@if(isset($gatePassDetails->fpmDetails->FPMNo)){{$gatePassDetails->fpmDetails->FPMNo}}@endif</td>

                </tr>
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Remarks</b></td>
                    <td style="paddin:5px;border-right: none;border-left: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;"  colspan="4">{{$gatePassDetails->Remark}}</td>

                </tr>

            </table>
        </div> 
        @foreach($dataArrays as $DocketDats)
          

        <div style="margin:8px 4px;font-size: 16px;font-weight: 800;">
            <h4 style="margin:0px;">{{$DocketDats['docketDeatils']}}</h4>
        </div>
        <div id="container">
            <table  style="border-collapse: collapse;font-size: 11px;width:100%;">

                <tr>

                    <th style="padding:8px;border-left: none;border-right: 1px solid #000;border-bottom: 1px solid #000;border-top:1px solid #000;min-width: 12px;">S. No.</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 40px;">LR No</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 10px;">Pcs</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 40px;">Charge Weight</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 40px;">GP Weight</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 50px;">Dest.</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 50px;">Consignor</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 50px;">Consignee</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 50px;">Invoice ID</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 50px;">Contents</th>
                    <th style="padding:8px;border:1px solid #000;min-width: 50px;">Value Of Goods</th>
                    <th style="padding:8px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;min-width: 80px;">e-WayBill</th>

                </tr>
                <?php $i=0; ?>
               @foreach($DocketDats['docket'] as $docketAllDetails)
               <?php $i++; ?>
                <tr>
                    <td style="padding:8px;border-left: none;border-right: 1px solid #000;border-bottom: 1px solid #000;border-top:1px solid #000;text-align: center;">{{$i}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">{{$docketAllDetails->Docket_No}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">{{$docketAllDetails->Qty}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">{{$docketAllDetails->Actual_Weight}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">{{$docketAllDetails->Charged_Weight}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">{{$docketAllDetails->CityName}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">{{$docketAllDetails->ConsignorName}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">{{$docketAllDetails->ConsigneeName}}</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">
                    <?php if(isset($docketAllDetails->Invoice_No)){
                            $expUnique = array_unique(explode(",",$docketAllDetails->Invoice_No));
                            $INvNo=  implode(",", $expUnique);
                            $TotalCount = count($expUnique);
                    }
                    if(isset($docketAllDetails->Description)){
                            $expUniqueDesc = array_unique(explode(",",$docketAllDetails->Description));
                    }
                    if(isset($docketAllDetails->EWB_No)){
                            $expUniqueEWayBill = array_unique(explode(",", $docketAllDetails->EWB_No));
                    }

                    if(isset($docketAllDetails->Amount)){
                        $expUniqueAmount = array_unique(explode(",", $docketAllDetails->Amount));
                    }
                         ?>
                    @isset($expUnique[0]) {{$expUnique[0]}} @endisset</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;">@isset($expUniqueDesc[0]) {{$expUniqueDesc[0]}} @endisset</td>
                    <td style="padding:8px;border:1px solid #000;text-align: center;"> @isset($expUniqueAmount[0]) {{number_format($expUniqueAmount[0],2,".","")}} @endisset</td>
                    <td style="padding:8px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;text-align: center;"> @isset($expUniqueEWayBill[0]) {{$expUniqueEWayBill[0]}} @endisset</td>
                </tr>
                @if(isset($TotalCount) && $TotalCount > 0)
                        @for($j=1; $j < $TotalCount; $j++ )
                        <tr>
                            <td style="padding:8px;border-left: none;border-right: 1px solid #000;border-bottom: 1px solid #000;border-top:1px solid #000;"> </td>
                            <td style="padding:8px;border:1px solid #000;"></td>
                            <td style="padding:8px;border:1px solid #000;"></td>
                            <td style="padding:8px;border:1px solid #000;"></td>
                            <td style="padding:8px;border:1px solid #000;"></td>
                            <td style="padding:8px;border:1px solid #000;"></td>
                            
                            <td style="padding:8px;border:1px solid #000;"></td>
                            <td style="padding:8px;border:1px solid #000;"></td>
                            <td style="padding:8px;border:1px solid #000;">{{$expUnique[$j]}}</td>
                            <td style="padding:8px;border:1px solid #000;"> @isset($expUniqueDesc[$j]) {{$expUniqueDesc[$j]}} @endisset</td>
                            <td style="padding:8px;border:1px solid #000;"> @isset( $expUniqueAmount[$j]) {{number_format($expUniqueAmount[$j],2,".","")}}  @endisset</td>
                            <td style="padding:8px;border:1px solid #000;"> @isset($expUniqueEWayBill[$j]) {{$expUniqueEWayBill[$j]}} @endisset</td>
                            
                        </tr>

                        @endfor
                        @endif
                @endforeach
                 <tr>
                            <td colspan="14" style="padding: 8px;font-size: 12px;border-bottom: 1px solid #000;">
                                
                        <b>TOTAL : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pieces: &nbsp;&nbsp;&nbsp;&nbsp; 142 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Charge Weight:&nbsp;&nbsp; 2517.980 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GP Weight:&nbsp;&nbsp; 1941.000</b>
                            </td>
                        </tr>
                
                
               
                
            </table>
        </div>
        @endforeach

        <div style="text-align: center;font-weight: 700;font-size: 13px;margin-top: 20px;margin-bottom: 30px;">
            Vehicle Load Is Found in Good Condition with all valid documents and statutory certificates are in place.
        </div>

        <div style="display: inline-block;width: 48%;font-weight: 700;font-size: 13px;margin-left: 10px;margin-bottom: 20px;">
            Signature
        </div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-bottom: 20px;">
            Signature
        </div>
         <div style="display: inline-block;width: 48%;font-weight: 700;font-size: 13px;margin-left: 10px;margin-bottom: 20px;">
            Driver
        </div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-bottom: 20px;">
            Supervisor ( METROPOLIS LOGISTICS PVT LTD )
        </div>

        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-top: 220px;visibility: hidden;">222</div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-top: 220px;visibility: hidden;"> 444</div>

</div>


<div style="border:0.2px solid #000;">
    <div>
        <table style="width: 100%;border:0.2px solid #000;">
            <tr style="font-weight: 700;font-size: 10px;">
                <td style="width: : 15%;padding: 5px;">GRAND TOTAL:</td>
                <td style="width: 20%;padding: 5px;">TOTAL PIECES: 644</td>
                <td style="width: 20%;padding: 5px;">TOTAL CHARGE WEIGHT:</td>
                <td style="width: 10%;padding: 5px;">6517.936</td>
                <td style="width: 15%;padding: 5px;">TOTAL GP WEIGHT:</td>
                <td style="width: 20%;padding: 5px;">5801.520</td>
            </tr>
        </table>

    </div>

    <div style="border:0.2px solid #000;margin:10px 5px;">
        <table style="width: 100%;">
            <tr style="font-weight: 700;font-size: 10px;">
                <td style="text-decoration: underline;width: 40%;">DOCUMENT</td>
                <td style="text-decoration: underline;width: 10%;text-align: center;">Verified</td>
                <td style="text-decoration: underline;width: 40%;">DOCUMENT</td>
                <td style="text-decoration: underline;width: 10%;text-align: center;s">Verified</td>
            </tr>
            <tr style="font-size: 9px;">
                <td>A. COMMERCIAL DRIVING LICENSE</td>
                <td style="text-align: center;">Yes</td>
                <td>B. VALID INSURANCE DOCUMENTS</td>
                <td style="text-align: center;">Yes</td>
            </tr>
            <tr style="font-size: 9px;">
                <td>C. REGISTRATION CERTIFICATE (RC) </td>
                <td style="text-align: center;">Yes</td>
                <td>D. POLLUTION CONTROL CERTIFICATE</td>
                <td style="text-align: center;">Yes</td>
            </tr>
            <tr style="font-size: 9px;">
                <td>E. VALID NATIONAL PERMIT</td>
                <td style="text-align: center;">Yes</td>
                <td>F. FITNESS CERTIFICATE </td>
                <td style="text-align: center;">Yes</td>
            </tr>
            <tr style="font-size: 9px;">
                <td>G. THE LOAD IS PROTECTED BY BELTS/ ROPES </td>
                <td style="text-align: center;">Yes</td>
                <td>H. THE LOAD IS COVERED BY MINIMUM TWO TARPAULI</td>
                <td style="text-align: center;">No</td>
            </tr>
            <tr style="font-size: 9px;">
                <td>I. ORIGINAL COPIES OF INVOICE & LR ATTACHED</td>
                <td style="text-align: center;">Yes</td>
                <td>J. E-WAY BILL PART A & PART B ARE AVAILABLE</td>
                <td style="text-align: center;">Yes</td>
            </tr>
            <tr style="font-size: 9px;">
                <td>K. THE LR CONTAINS CONSIGNOR’S INVOICE DETAILS</td>
                <td style="text-align: center;">Yes</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div style="text-align: center;font-weight: 700;font-size: 13px;margin-top: 20px;margin-bottom: 40px;">
            Vehicle Load Is Found in Good Condition with all valid documents and statutory certificates are in place.
        </div>

        <div style="display: inline-block;width: 48%;font-weight: 700;font-size: 13px;margin-left: 10px;margin-bottom: 20px;">
            Signature
        </div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-bottom: 20px;">
            Signature
        </div>
         <div style="display: inline-block;width: 48%;font-weight: 700;font-size: 13px;margin-left: 10px;margin-bottom: 20px;">
            Driver
        </div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-bottom: 30px;">
            Supervisor ( METROPOLIS LOGISTICS PVT LTD )
        </div>

        <div style="width: 100%;font-weight: 700;font-size: 11px;margin-bottom: 20px;text-align: center">
            Post Delivery Check.
        </div>

         <div style="border:0.2px solid #000;margin:10px 5px;">
        <table style="width: 100%;">
            <tr style="font-weight: 700;font-size: 10px;">
                <td style="text-decoration: underline;width: 40%;">DOCUMENT</td>
                <td style="text-decoration: underline;width: 10%;text-align: center;">Verified</td>
                <td style="text-decoration: underline;width: 40%;">DOCUMENT</td>
                <td style="text-decoration: underline;width: 10%;text-align: center;s">Verified</td>
            </tr>
            <tr style="font-size: 9px;">
                <td>OVERALL CONDITION OF THE LOAD</td>
                <td style="text-align: center;"></td>
                <td>RIGHT MATERIAL RECEIVED WITH COMPLETE QUANTITY</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr style="font-size: 9px;">
                <td>TRUCK REACHED ON DATE FOR UNLOADING</td>
                <td style="text-align: center;"></td>
                <td>TRUCK UNLOADED ON DATE</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr style="font-size: 9px;">
                <td>TRUCK RELEASED ON DATE </td>
                <td style="text-align: center;"></td>
                <td>POD GIVEN ON DATE</td>
                <td style="text-align: center;"></td>
            </tr>
            
        </table>
    </div>

    <div style="display: inline-block;width: 48%;font-weight: 700;font-size: 13px;margin-left: 10px;margin-bottom: 30px;margin-top: 20px;">
            
        </div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-bottom: 20px;margin-top: 30px;">
            Signature
        </div>
         <div style="display: inline-block;width: 48%;font-weight: 700;font-size: 13px;margin-left: 10px;margin-bottom: 20px;">
            
        </div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-bottom: 30px;">
            Driver
        </div>

        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-top: 260px;visibility: hidden;">222</div>
        <div style="display: inline-block;width: 50%;font-weight: 700;font-size: 13px;margin-top: 260px;visibility: hidden;"> 444</div>



</div>


</body>

</html>