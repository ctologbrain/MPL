<div class="modal fade model-popup" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h5 class="text-center" style="background-color: #825d5d42;padding:6px 10px;color:#000; ">ITEM DETAILS OF @isset($Docket) {{$Docket}} @endisset &nbsp;<a href="{{url('ModalItemExport?docketId=').$DocketId}}">Export</a></h5>
                    <table class="table table-bordered table-centered mb-0">
                        <thead>
                            <tr style="background-color: #825d5d42;padding:6px 10px;color:#000; ">
                                <th class="th1 p-1" style="min-width: 50px;">SN.</th>
                                <th class=" p-1" style="min-width: 120px;">Invoice Number </th>
                                <th class="th3 p-1" style="min-width: 100px;">Invoice Date </th>
                               <th class="th1 p-1" style="min-width: 150px;">Contents</th>
                                <th class=" p-1" style="min-width: 100px;"> Amount </th>
                                <th class="th3 p-1" style="min-width: 100px;"> E-Way bill </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $j=0;?>
                            @foreach($datas as $key)
                            <?php  $j++;?>
                            <tr>
                                <td class="p-1">{{$j}}</td>
                                <td class="p-1 text-center">{{$key->Invoice_No}}</td>
                                <td class="p-1 text-center">{{date("d-m-Y",strtotime($key->Invoice_Date))}}</td>
                                <td class="p-1 text-center">{{$key->Description}}</td>
                                <td class="p-1 text-center ">{{number_format($key->Amount,2,".","")}}</td>
                                <td class="p-1 text-center">{{$key->EWB_No}}</td>
                            </tr>
                           
                            @endforeach
                            
                        </tbody>
                    </table>

            
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               
            </div>

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

    </script>