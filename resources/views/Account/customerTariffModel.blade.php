<div class="modal fade model-popup" id="CustomerModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Customer Tarrif Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                 
                    <table class="table table-bordered table-centered mb-0">
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
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            </div>
        </div>
    </div>
</div>
<script>
  $('#CustomerModal').modal('toggle');   
</script>