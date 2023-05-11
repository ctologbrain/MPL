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

    
        <div  style="width:35%;margin-bottom: 20px;margin-left: 10px;display: inline-block;">
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
        <div style="width:30%;display: inline-block;margin-bottom: 20px;margin-top: 40px;">
            <h2 style="text-align: center;font-size: 16px;">Vehicle Gatepass</h2>
            <h2 style="text-align: center;font-size: 16px;">AHMEDABAD</h2>
        </div>
        <div style="width:32%;display: inline-block;margin-top: 25px;text-align: center;">
        @php
      $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
     @endphp
   <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($productCode, $generatorPNG::TYPE_CODE_128)) }}" style="width: 90%;height:7%;">
    <diiv>*{{$productCode}}*</div>
   <div>

            

      
    
    <div style="font-size: 12px;text-align: center;">METROPOLIS LOGISTICS PVT LTD. SHRI AMBICA ESTATE, NEAR NH 8, VILLAGE ASLALI, AHMEDABAD,
        GODOWN NO - B-17,18,19</div>
    <div  style="font-size: 12px;text-align: center;">
        MILKAIT NO 2629,2630,2631, AHMEDABAD, GUJARAT, 382415 AHMEDABAD-382415
    </div>
    <div style="font-size: 12px;margin-bottom: 20px;text-align: center;">
        <b>Mob.:</b> 9131287274 <b>Web:</b> WWW.METROPOLISLOGISTICS.COM <b>Email:</b> amd@metropolislogistics.com
    </div>
        <div class="upperTable">
            <table class="table1" style="border-collapse: collapse;font-size: 12px;"width="100%;">
                <tr>
                    <td style="paddin:5px;border-left: 0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><b>Print Date & Time</b></td>
                    <td style="paddin:5px;border:1px solid #000;">{{date("d/m/Y H:i")}}</td>
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
      

    <div style="margin-left: 8px;">
        <h4>{{$DocketDats['docketDeatils']}}</h4>
    </div>
    <div id="container">
        <table  style="border-collapse: collapse;font-size: 10px;width:100%;">

            <tr>

                <th style="padding:8px;border-left: none;border-right: 1px solid #000;border-bottom: 1px solid #000;border-top:1px solid #000;">S. No.</th>
                <th style="padding:8px;border:1px solid #000;">LR No</th>
                <th style="padding:8px;border:1px solid #000;">Pcs</th>
                <th style="padding:8px;border:1px solid #000;">Charge Weight</th>
                <th style="padding:8px;border:1px solid #000;">Part Pcs</th>
                <th style="padding:8px;border:1px solid #000;">Part Charge Weight</th>
                <th style="padding:8px;border:1px solid #000;">GP Weight</th>
                <th style="padding:8px;border:1px solid #000;">Dest.</th>
                <th style="padding:8px;border:1px solid #000;">Consignor</th>
                <th style="padding:8px;border:1px solid #000;">Consignee</th>
                <th style="padding:8px;border:1px solid #000;">Invoice ID</th>
                <th style="padding:8px;border:1px solid #000;">Contents</th>
                <th style="padding:8px;border:1px solid #000;">Value Of Goods</th>
                <th style="padding:8px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">e-WayBill</th>

            </tr>
            <?php $i=0; ?>
           @foreach($DocketDats['docket'] as $docketAllDetails)
           <?php $i++; ?>
            <tr>
                <td style="padding:8px;border-left: none;border-right: 1px solid #000;border-bottom: 1px solid #000;border-top:1px solid #000;">{{$i}}</td>
                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->Docket_No}}</td>
                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->Qty}}</td>
                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->Actual_Weight}}</td>
                <td style="padding:8px;border:1px solid #000;">@isset($docketAllDetails->PartPicess) {{$docketAllDetails->PartPicess}}   @endisset</td>
                <td style="padding:8px;border:1px solid #000;">@isset($docketAllDetails->PartWeight) {{$docketAllDetails->PartWeight}} @endisset</td>
                
                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->Charged_Weight}}</td>
                

                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->CityName}}</td>
                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->ConsignorName}}</td>
                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->ConsigneeName}}</td>
                <td style="padding:8px;border:1px solid #000;">{{$docketAllDetails->Invoice_No}}</td>
                <td style="padding:8px;border:1px solid #000;"> {{$docketAllDetails->Description}}</td>
                <td style="padding:8px;border:1px solid #000;">  </td>
                <td style="padding:8px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">{{$docketAllDetails->EWB_No}}</td>
            </tr>
            @endforeach
            
            
           
            
        </table>
    </div>
    @endforeach
    <div>

      

    </div>

</div>
</div>



</div>
</div>

</body>

</html>