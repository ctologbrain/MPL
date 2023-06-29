<style type="text/css">
    .modal-body{
        padding: 0px;
    }
    .model-header b{
        font-size: 15px;
    }
</style>
<div class="modal fade model-popup" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center" style="background-color: #825d5d42;padding:6px 10px;color:#000; ">VOLUMETRIC DETAILS OF @isset($docketNumber) {{$docketNumber}} @endisset &nbsp;<a href="">Export</a></h5>
                        <table class="table table-bordered table-centered mb-0">
                        <thead>
                            <tr style="background-color: #825d5d42;padding:6px 10px;color:#000; ">
                                <th class="p-1" style="min-width: 20px;">SL#</th>
                                <th class="p-1" style="min-width: 100px;">Measurement</th>
                                <th class="p-1" style="min-width: 100px;">Quantity </th>
                                 <th class="p-1" style="min-width: 80px;">Length</th>
                                <th class=" p-1" style="min-width: 80px;"> Width </th>
                                <th class="p-1" style="min-width: 80px;"> Height </th>
                                <th class="p-1" style="min-width: 80px;"> Weight </th>
                                <th class="p-1" style="min-width: 100px;"> ActualWeight </th>
                                <th class="p-1" style="min-width: 100px;"> FinalWeight </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
            
                                <td class="p-1 text-center">@isset($data->PackingM) 1 @endisset</td>
                                <td class="p-1 text-center">@isset($data->PackingM) {{$data->PackingM}} @endisset</td>
                                <td class="p-1 text-center">@isset($data->Quantity) {{$data->Quantity}} @endisset</td>
                                <td class="p-1 text-center ">@isset($data->Length) {{number_format($data->Length,1,".","")}} @endisset</td>
                                <td class="p-1 text-center">@isset($data->Width) {{number_format($data->Width,1,".","")}} @endisset</td>
                                <td class="p-1 text-center">@isset($data->Height) {{number_format($data->Height,1,".","")}} @endisset</td>
                                <td class="p-1 text-center ">@isset($ChargeWeight) {{number_format($ChargeWeight,2,".","")}} @endisset</td>
                                <td class="p-1 text-center">@isset($data->ActualWeight) {{number_format($data->ActualWeight,2,".","")}} @endisset</td>
                                <td class="p-1 text-center">@isset($finalWeight) {{$finalWeight}} @endisset</td>
                            </tr>
                           
                           
                            
                        </tbody>
                    </table>
                   </div>

            
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