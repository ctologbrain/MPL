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
   
 }
  
    </style>
</head>
<body style="margin: 10px auto;width: 40%;padding: 10px;">
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
<div style="border:0.2px solid #000;@if($i > 1) page-break-before:always;@endif">
       <div  style="width:97%;margin:0 auto;padding: 5px;">
            <div class="logo-lg">
                <?php
                       $path ='assets/images/Metrologo.png';
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                <img src="<?php echo $base64?>" style="max-width: 88%;text-align: center;" />
            </div>
        </div> 
        <div>
            <table style="border:1px solid #000;width: 100%;border-collapse: collapse;" >
                <tr>
                    <td style="width: 50%;border-right: 1px solid #000;text-align: center;">
                    <?php if($docketFile->Docket_No)
                          {
                            $docket=$docketFile->Docket_No;
                          }
                          else
                          {
                            $docket=$docketFile->Docket;
                          }
                          ?>
                    <b>{{$docket}}-{{$i}}</b>
                    </td>
                    <td rowspan="2" style="width: 50%;text-align: center;">
                        <div style="width:80%;margin:0 auto;">
                            @php
                          $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                         @endphp
                       
                       <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($docket.'-'.$i, $generatorPNG::TYPE_CODE_128)) }}" style="width: 100%;height:60px;">
            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;border-right: 1px solid #000;text-align: center;">
                    <b>Pieces:  {{$i}}/{{$qty}}</b>
                    </td>
                </tr>
            </table>
        </div>
       
        
        <div style="font-size: 30px;text-align: center;margin-top: 2px;font-weight: 700;border-bottom: 1px solid #000;">
        {{$docket}} X {{$qty}}
        </div>
        
        <div class="upperTable">
            <table class="table1" style="font-size: 14px;"width="100%;">
                <tr>
                    <td style="text-align: left;width: 15%;"><b>Origin</b></td>
                    <td style="text-align: left;width: 10%;"><b>:</b></td>
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
                    <td style="text-align: left;width: 55%;"><b>{{$originCity}} </b></td>
                    <td style="text-align: right;width: 20%;" rowspan="3">
                        
                <div class="logo-lg">
                
                <?php
                                        $path1 ='uparrow.png';
                                        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
                                        $data1 = file_get_contents($path1);
                                        $base641 = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);
                                        ?>
                                <img src="<?php echo $base641?>"  style="max-width: 70%;text-align: center;" />
            </div>
                    </td>
                  
                </tr>
                <tr>
                    <td style="text-align: left;"><b>Dest.</b></td>
                    <td style="text-align: left;"><b>:</b></td>
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
                    <td style="text-align: left;"><b>{{$DestCity}}</b></td>
                  
                </tr>
                <tr>
                    <td style="text-align: left;"><b>Date:</b></td>
                    <td style="text-align: left;"><b>:</b></td>
                    <?php 
                  if(isset($docketFile->Booking_Date))
                  {
                      $bookingDate=$docketFile->Booking_Date;
                  }
                  else{
                    $bookingDate=$docketFile->BookingDate;
                  }
                  
                  ?>
                    <td style="text-align: left;"><b>{{date("d-m-Y",strtotime($bookingDate))}}</b> <br>
                        <a href="http://www.metropolislogistics.com/">www.metropolislogistics.com</a>
                    </td>
                  
                </tr>
            </table>
        </div> 
      
</div>
@endfor




</body>

</html>
      