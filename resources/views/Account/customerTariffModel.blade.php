<div class="modal fade model-popup" id="CustomerModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Customer Tarrif Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                 
                    <table class="table table-bordered table-centered mb-0">
                        <input type="hidden" name="MasterId" value="{{$data->LatId}}">
                        <input type="hidden" name="originname" value="{{$data->origin_name}}">
                        <input type="hidden" name="destination_name" value="{{$data->destination_name}}">
                        <input type="hidden" name="mode_name" value="{{$data->mode_name}}">
                        <input type="hidden" name="Product_Type" value="{{$data->Product_Type}}">
                        <input type="hidden" name="Delivery_Type" value="{{$data->Delivery_Type}}">
                        <input type="hidden" name="Rate_type" value="{{$data->Rate_type}}">
                        <input type="hidden" name="TAT" value="{{$data->TAT}}">
                        <input type="hidden" name="Min_Amount" value="{{$data->Min_Amount}}">
    <thead>
        <tr>
            <th class="th2">Qty</th>
            <th class="th2">Rate </th>
            
          
        </tr>
    </thead>
    <tbody id="coverTochPoints">
       
        @for($i=1; $i <= $slab; $i++)
    <tr>
            <td>
              <input  type="text" class="form-control" name="CustTarrifRate[1][rate]">
              
            </td>
            <td>
                <input tyep="text" class="form-control" name="CustTarrifRate[1][Amount]">
            </td>
            
        </tr>
        @endfor
        
       
       
       
        
        
    </tbody>
</table>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitModel()">Save</button>
            </div>

            </div>
        </div>
    </div>
</div>
<script>
  $('#CustomerModal').modal('toggle');   
</script>