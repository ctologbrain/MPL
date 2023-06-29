<style type="text/css">
    .modal-body{
        padding: 0px;
    }
</style>
<div class="modal fade model-popup" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   
                    <div class="modal-body">
                   
                    <table class="table table-bordered table-centered mb-0">
                        <thead>
                            <tr class="main-title">
                                <th class="th1 p-1" colspan="2">CONSIGNOR DETAILS</th>
                                <th class="th2 p-1"  colspan="2">CONSIGNEE DETAILS </th>
                               
                            </tr>
                        </thead>
                        
                        <tbody>
                           
                            <tr>
                                <td class="p-1 text-start" style="min-width: 100px;background-color: #888888;color: #fff!important;">Name</td>
                                <td class="p-1 text-start" style="min-width: 280px;">@isset($data->consignor->ConsignorName) {{$data->consignor->ConsignorName}} @endisset</td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">Name</td>
                                <td class="p-1 text-start" style="min-width: 230px;">@isset($data->consignoeeDetails->ConsigneeName) {{$data->consignoeeDetails->ConsigneeName}} @endisset</td>
                               
                            </tr>
                            <tr>
                                <td class="p-1 text-start" style="min-width: 100px;background-color: #888888;color: #fff!important;">Address 1</td>
                                <td class="p-1 text-start" style="min-width: 280px;">@isset($data->consignor->Address1) {{$data->consignor->Address1}} @endisset</td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">Address 1</td>
                                <td class="p-1 text-start" style="min-width: 230px;">@isset($data->consignoeeDetails->Address1) {{$data->consignoeeDetails->Address1}} @endisset</td>
                               
                            </tr>
                            <tr>
                                <td class="p-1 text-start" style="min-width: 100px;background-color: #888888;color: #fff!important;">Address 2</td>
                                <td class="p-1 text-start" style="min-width: 280px;">@isset($data->consignor->Address2) {{$data->consignor->Address2}} @endisset</td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">Address 2</td>
                                <td class="p-1 text-start" style="min-width: 230px;">@isset($data->consignoeeDetails->Address2) {{$data->consignoeeDetails->Address2}} @endisset</td>
                               
                            </tr>
                            <tr>
                                <td class="p-1 text-start" style="min-width: 80px;background-color: #888888;color: #fff!important;">City</td>
                                <td class="p-1 text-start" style="min-width: 280px;">@isset($data->consignor->City) {{$data->consignor->City}} @endisset</td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">City </td>
                                <td class="p-1 text-start" style="min-width: 230px;">@isset($data->consignoeeDetails->City) {{$data->consignoeeDetails->City}} @endisset</td>
                               
                            </tr>
                            <tr>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">State</td>
                                <td class="p-1 text-start" style="min-width: 280px;"></td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">State </td>
                                <td class="p-1 text-start" style="min-width: 230px;"></td>
                               
                            </tr>
                            <tr>
                                <td class="p-1 text-start" style="min-width: 100px;background-color: #888888;color: #fff!important;">Pincode</td>
                                <td class="p-1 text-start" style="min-width: 280px;"></td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">Pincode </td>
                                <td class="p-1 text-start" style="min-width: 230px;"></td>
                               
                            </tr>
                            <tr>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">Phone</td>
                                <td class="p-1 text-start" style="min-width: 280px;">@isset($data->consignor->Phone) {{$data->consignor->Phone}} @endisset</td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">Phone </td>
                                <td class="p-1 text-start" style="min-width: 230px;">@isset($data->consignoeeDetails->Phone) {{$data->consignoeeDetails->Phone}} @endisset</td>
                               
                            </tr>
                             <tr>
                                <td class="p-1 text-start" style="min-width: 100px;background-color: #888888;color: #fff!important;">EMail</td>
                                <td class="p-1 text-start" style="min-width: 280px;">@isset($data->consignor->Email) {{$data->consignor->Email}} @endisset</td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">EMail </td>
                                <td class="p-1 text-start" style="min-width: 230px;">@isset($data->consignoeeDetails->Email) {{$data->consignoeeDetails->Email}} @endisset</td>
                               
                            </tr>
                            <tr>
                                <td class="p-1 text-start" style="min-width:100px;background-color: #888888;color: #fff!important;">GST</td>
                                <td class="p-1 text-start" style="min-width: 280px;">@isset($data->consignor->GSTNo) {{$data->consignor->GSTNo}} @endisset</td>
                                <td class="p-1 text-start" style="min-width: 50px;background-color: #888888;color: #fff!important;">GST </td>
                                <td class="p-1 text-start" style="min-width: 230px;">@isset($data->consignoeeDetails->GSTNo) {{$data->consignoeeDetails->GSTNo}} @endisset</td>
                               
                            </tr>

                           
                           
                            
                        </tbody>
                    </table>

            
            <div class="modal-footer justify-content-center">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               
            </div>

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

    </script>