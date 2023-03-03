<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
     html {
        line-height: 1;
    }
    .panel-body {
        padding: 5px;
        padding-bottom: 0;
    }
  .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 0px;
      }
    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td
     {
       border-color: #b9b5b5 !important;
       border-width: 1px;
    }
    .h3design {
        background: #e5e5e5 !important;
        border-bottom: 1px solid #333;
        padding-bottom: 9px;
        border-top: 1px solid #333;
        padding-top: 10px;
        margin-bottom: 0px;
     }
    .text-end {
        text-align: right;
    }
     .textdesign {
       font-weight: 600;
    }
     .row {
        margin-right: -5px !important;
         margin-left: -9px !important;

    }
      .btndesign {
        margin-left: 86px;

        padding-right: 14px;

    }

    .tabledes {

        padding-left: 1px !important;

        padding-right: 0px !important;

        /*border: 1px solid #000;*/

    }

    #memo {

        padding-top: 20px;

        margin: 0 110px 0 60px;

        border-bottom: 1px solid #ddd;

        height: auto;

        padding-bottom: 10px;

    }

    #memo .logo {

        float: left;

        margin-right: 30px;

        margin-top: 10px;

    }

    #memo .logo img {

        width: 150px;

        height: 100px;

    }

    #memo .company-info {

        float: right;

        text-align: right;

    }

    #memo .company-info>div:first-child {
        22-08-2020 line-height: 1em;

        font-weight: bold;

        font-size: 22px;

        color: #3c8dbc;

    }

    #memo .company-info span {

        font-size: 11px;
        display: inline-block;
        min-width: 20px;
        margin-top: 10px;
        margin-left: 5px;

    }
       #memo:after {
         content: '';
         display: block;
         clear: both;
       }
        header {
       display: none
    }
      @media print {
         a[href]:after {
         content: none !important;
       }

    }

    @media print {

        .footer,

        #non-printable {

            display: none !important;

        }

        #printable {

            display: block;

        }

    }

    h3 {

        padding-bottom: 10px;

    }

    .col-sm-12,
    .col-sm-8,
    .col-sm-6,
    .col-sm-4 {

        padding-top: 5px;

        padding-bottom: 5px;

    }

    tfoot tr td {

        text-align: right !important;

        padding-right: 10px !important;

        font-weight: 800;

    }

    .invoice_stamp {

        margin-top: 3rem;

        margin-bottom: 1rem;

    }

    .invoice_stamp strong {

        margin-left: 5px;

    }

    label {

        font-weight: 600;

    }

    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-header-group;
    }

    .totalCalcu {

        text-align: center !important;

    }
    </style>
</head>
</body>

<div class="gatepass-container">

    <div class="d-flex">
        <div class="logo-img">
            <div class="logo-lg">
                <?php
                       $path ='assets/images/Metrologo.png';
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                <img src="<?php echo $base64?>" width="100%" />
            </div>
        </div>
        <div class="gatepass-title">
            <h2 class="">Vehicle Gatepass</h2>
            <h2 class="">AHMEDABAD</h2>
        </div>
        <div class="gatepass-barcode">

            <div class="logo-lg">

            </div>

        </div>
    </div>
    <div class="fright-detail">METROPOLIS LOGISTICS PVT LTD. SHRI AMBICA ESTATE, NEAR NH 8, VILLAGE ASLALI, AHMEDABAD,
        GODOWN NO - B-17,18,19</div>
    <div class="fright-detail">
        MILKAIT NO 2629,2630,2631, AHMEDABAD, GUJARAT, 382415 AHMEDABAD-382415
    </div>
    <div class="fright-detail mrg-b-3">
        <b>Mob.:</b> 9131287274 <b>Web:</b> WWW.METROPOLISLOGISTICS.COM <b>Email:</b> amd@metropolislogistics.com
    </div>

    <table class="table-gatepass fright-table">
        <tr>
            <td class="bdr-left td1"><b>Print Date & Time</b></td>
            <td class="td2">28-Feb-2023 &nbsp; 14:47</td>
            <td class="td1"><b>GP Date</b></td>
            <td class="bdr-right td2" colspan="2">26-Feb-2023</td>
        </tr>
        <tr>
            <td class="bdr-left td1"><b>Origin</b></td>
            <td class="td2">AHMEDABAD</td>
            <td class="td1"><b>Destination</b></td>
            <td class="bdr-right td2" colspan="2">BHIWANDI</td>
        </tr>
        <tr>
            <td class="bdr-left td1"><b>Vendor Name</b></td>
            <td class="td2">2VENTURE SUPPLY CHAIN P. LTD.</td>
            <td class="td1"><b>Driver's Name & Phone</b></td>
            <td class="bdr-right td2" colspan="2">SHASHIKANT (9719497107)</td>
        </tr>
        <tr>
            <td class="bdr-left td1"><b>Veh










                    icle Number</b></td>
            <td class="td2">HR38AC3493</td>
            <td class="td1"><b>Vehicle Model</b></td>
            <td class="bdr-right td2" colspan="2">32 FEET MULTI AXLE</td>
        </tr>
        <tr>
            <td class="bdr-left td1"><b>Truck Hire Charges</b></td>
            <td class="td2">0.00</td>
            <td class="td1"><b>Start Km</b></td>
            <td class="bdr-right td2">133129</td>
            <td class="bdr-right td3"><b>EWB</b></td>
        </tr>
        <tr>
            <td class="bdr-left td1"><b>Vehicle Seal No</b></td>
            <td class="td2">0042456</td>
            <td class="td1"><b>Distance (Aprox.)</b></td>
            <td class="bdr-right td2">764.99</td>
            <td class="bdr-right td3" rowspan="2">7237340642</td>
        </tr>
        <tr>
            <td class="bdr-left td1"><b>Route Name</b></td>
            <td class="td2">AHMEDABAD-VADODARA-SURAT-VAPI-BHIWA</td>
            <td class="td1"><b>FPM Number</b></td>
            <td class="bdr-right td2">FPM22669</td>

        </tr>
        <tr>
            <td class="bdr-left td1"><b>Remarks</b></td>
            <td class="bdr-left td2" colspan="4">NDI</td>

        </tr>

    </table>
    <div class="bdr-top bdr-btm">
        <h2>BHIWANDI</h2>
    </div>
    <table class="gatepass-detail-table">

        <tr>

            <th>S. No.</th>
            <th>LR No</th>
            <th>Pcs</th>
            <th>Charge Weight</th>
            <th>GP Weight</th>
            <th>Dest.</th>
            <th>Consignor</th>
            <th>Consignee</th>
            <th>Invoice ID</th>
            <th>Contents</th>
            <th>Value Of Goods</th>
            <th>e-WayBill</th>

        </tr>

        <tr>
            <td>1</td>
            <td>1296830</td>
            <td>1</td>
            <td>20.000</td>
            <td>20.000</td>
            <td>BANGALURU</td>
            <td>PANASONIC LIFE SOLUTION INDIA PVT LTD.</td>
            <td>PANASONIC LIFE SOLUTION INDIA PVT LTD.</td>
            <td>7062240002055</td>
            <td>BOX/PACKETS</td>
            <td>25196.00</td>
            <td>691528939615</td>
        </tr>
        <tr>
            <td>2</td>
            <td>1296830</td>
            <td>1</td>
            <td>20.000</td>
            <td>20.000</td>
            <td>BANGALURU</td>
            <td>PANASONIC LIFE SOLUTION INDIA PVT LTD.</td>
            <td>PANASONIC LIFE SOLUTION INDIA PVT LTD.</td>
            <td>7062240002055</td>
            <td>BOX/PACKETS</td>
            <td>25196.00</td>
            <td>691528939615</td>
        </tr>
        <tr>
    </table>
    <div class="text-right">

        <p class="pagination">Page 1 of 7</p>

    </div>

</div>
</div>



</div>
</div>

</body>

</html>