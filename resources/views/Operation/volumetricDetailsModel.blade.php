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
                        <h5 class="text-center" style="background-color: #825d5d42;padding:6px 10px;color:#000; ">VOLUMETRIC DETAILS OF @isset($docketNumber) {{$docketNumber}} @endisset &nbsp;<a href="{{url('VolumetricExport?DocketNo=').$docketNumber}}">Export</a></h5>
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
                        <?php $i=0; ?>
                           @foreach($data as $key)
                           <?php $i++; ?>
                            <tr>
            
                                <td class="p-1 text-center">@isset($key->PackingM) {{$i}} @endisset</td>
                                <td class="p-1 text-center">@isset($key->PackingM) {{$key->PackingM}} @endisset</td>
                                <td class="p-1 text-center">@isset($key->Quantity) {{$key->Quantity}} @endisset</td>
                                <td class="p-1 text-center ">@isset($key->Length) {{number_format($key->Length,1,".","")}} @endisset</td>
                                <td class="p-1 text-center">@isset($key->Width) {{number_format($key->Width,1,".","")}} @endisset</td>
                                <td class="p-1 text-center">@isset($key->Height) {{number_format($key->Height,1,".","")}} @endisset</td>
                                <td class="p-1 text-center ">@isset($key->TotalVolumatric) {{number_format($key->TotalVolumatric,2,".","")}} @endisset</td>
                                <td class="p-1 text-center">@isset($key->ActualWeight) 0.00 @endisset</td>
                                <td class="p-1 text-center">@isset($key->TotalVolumatric) {{number_format($key->TotalVolumatric,2,".","")}} @endisset</td>
                            </tr>
                           @endforeach
                           
                            
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