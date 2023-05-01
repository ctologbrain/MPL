<div class="modal fade model-popup" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Docket Invoice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                 
                    <table class="table table-bordered table-centered mb-0">
    <thead>
        <tr>
            <th class="th1">SN.</th>
            <th class="th2">Invoice Number </th>
            <th class="th3">Invoice Date </th>
           <th class="th1">Contents</th>
            <th class="th2"> Amount </th>
            <th class="th3"> E-Way bill </th>
        </tr>
    </thead>
    <tbody>
  
       
        <?php  $j=0;?>
        @foreach($datas as $key)
        <?php  $j++;?>
        <tr>
            <td>{{$j}}</td>
            <td>{{$key->Invoice_No}}</td>
            <td>{{$key->Invoice_Date}}</td>
            <td>{{$key->Description}}</td>
            <td>{{$key->Amount}}</td>
            <td>{{$key->EWB_No}}</td>
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