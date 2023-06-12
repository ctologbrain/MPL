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

<div style="border:0.2px solid #000;">
       
        <div>
            <table style="border:1px solid #000;width: 100%;border-collapse: collapse;" >
                <tr>
                    <td colspan="2">
                        <div style="width:80%;margin:10px auto;">
                            @php
                          $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                         @endphp
                       <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($docketFile->Docket, $generatorPNG::TYPE_CODE_128)) }}" style="width: 100%;height:70px;">
            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><div style="font-size: 35px;font-weight: 700;margin-bottom: 10px;">{{$docketFile->Docket}} * {{$docketFile->Pices}}</div></td>
                </tr>
                <tr>
                    <td style="width: 30%;text-align: left;padding-left: 10px;">
                        <b>Origin:</b>
                    </td>
                    <td  style="width: 50%;text-align: left;">
                    {{$docketFile->SourceCity}}
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;text-align:left;padding-left: 10px;">
                        <b>Destination:</b>
                    </td>
                    <td  style="width: 50%;text-align: left;">
                    {{$docketFile->DestCity}}
                    </td>
                </tr>
                
            </table>
        </div>
</div>




</body>

</html>
      