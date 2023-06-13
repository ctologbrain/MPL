<!DOCTYPE html>
<html style="margin: 0">

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style type="text/css">
       
    
        @media print {
     #container {
        
      width: 40%;
      margin:0 auto;
       
     }
    
     
     .logo-img{
        display: inline-block;
        width: 40%;
     }
     .page-break  {  }
 }
  
   
 }
  
    </style>
</head>
<body style="margin: 10px auto;width: 50%;padding: 10px;">
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
@for($i=1; $i<=$qty; $i++)
<div style="border:0.2px solid #000;margin-top: 20px;@if($i > 1) page-break-before:always;@endif">
     <table style="border:1px solid #000;width: 100%;" >
                <tr>
                    <td style="width: 60%;text-align: left;">
                        <div  style="width:97%;margin:0 auto;">
                            <div class="logo-lg">
                                <?php
                                       $path ='assets/images/Metrologo.png';
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        $data = file_get_contents($path);
                                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                        ?>
                                <img src="<?php echo $base64?>" style="max-width: 90%;text-align: center;" />
                            </div>
                        </div>
                 
                    </td>
                    <td style="width: 40%;text-align: left;">
                        <div style="width:95%;margin:0 auto;padding-right: 10px;">
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
                        <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($docket.'-'.$i, $generatorPNG::TYPE_CODE_128)) }}" style="width: 100%;height:50px;">
            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;width: 60%;font-size: 22px;padding-left: 7px;">
                      <?php ?>
                        <b>{{$docket}} X {{$qty}}</b>
                    </td>
                    <td  style="width: 40%;text-align: center;font-size: 22px;">
                        <b>{{$docket}}-{{$i}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="width: 60%;text-align: left;padding-left: 7px;">
                        <b>Pieces:  {{$i}}/{{$qty}}</b>
                    </td>
                  <?php 
                  if(isset($docketFile->Booking_Date))
                  {
                      $bookingDate=$docketFile->Booking_Date;
                  }
                  else{
                    $bookingDate=$docketFile->BookingDate;
                  }
                  
                  ?>

                    <td style="width: 40%;text-align: left;"><b>Date: {{date("d-m-Y",strtotime($bookingDate))}}</b></td>
                </tr>
                <tr>
                    <td style="width: 60%;text-align: left;padding-left: 7px;">
                    <?php
                    if(isset($docketFile->SourceCitys))
                    {
                      $originCity=$docketFile->SourceCitys;
                    }
                    else
                    {
                        $originCity=$docketFile->SourceCity;
                    }
                    
                    ?>

                        <b>Origin:  {{$originCity}}</b> 
                    </td>
                    <td style="width: 40%;text-align: right;" rowspan="3">
                        
                    <?php
                                        $path1 ='public/uparrow.png';
                                        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
                                        $data1 = file_get_contents($path1);
                                        $base641 = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);
                                        ?>
                                <img src="<?php echo $base641?>"  style="max-width: 40%;text-align: center;" />
                    </td>
                </tr>
                <tr>
                    <td style="width: 60%;text-align: left;padding-left: 7px;">
                    <?php
                      if(isset($docketFile->DestCitys))
                      {
                        $DestCity=$docketFile->DestCitys;
                      }
                      else
                      {
                          $DestCity=$docketFile->SourceCity;
                      }
                    ?>
                        <b>Dest. :  {{$DestCity}}</b> 
                    </td>
                    
                </tr>
                <tr>
                    <td style="width: 60%;text-align: left;padding-left: 7px;">
                    <?php
                      if(isset($docketFile->Ref_No))
                      {
                          $refNo=$docketFile->Ref_No;
                      }
                      else{
                        $refNo=$docketFile->RefNo;
                      }
                    
                    ?>
                        <b>Ref No.: {{$refNo}}</b> 
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                         <a href="http://www.metropolislogistics.com/">www.metropolislogistics.com</a>
                    </td>
                </tr>
            </table>
</div>
@endfor






</body>

</html>
      