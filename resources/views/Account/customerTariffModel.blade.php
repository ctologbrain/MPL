<div class="modal fade model-popup" id="CustomerModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Customer Tarrif Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <table class="table table-bordered table-centered mb-0">
                        <input type="hidden" id="MasterId" name="MasterId" value="{{$LatId}}">
                        <input type="hidden" id="originname" name="originname" value="{{$data['origin_name']}}">
                        <input type="hidden" id="destination_name" name="destination_name" value="{{$data['destination_name']}}">
                        <input type="hidden" id="mode_name" name="mode_name" value="{{$data['mode_name']}}">
                        <input type="hidden" id="Product_Type" name="Product_Type" value="{{$data['product']}}">
                        <input type="hidden" id="Delivery_Type" name="Delivery_Type" value="{{$data['delivery_type']}}">
                        <input type="hidden" id="Rate_type" name="Rate_type" value="{{$data['RateType']}}">
                        <input type="hidden" id="TAT " name="TAT" value="{{$data['tat']}}">
                        <input type="hidden" id="Min_Amount" name="Min_Amount" value="{{$data['Amount']}}">
    <thead>
        <tr>
            @if($data['RateType']==1)
            <th class="th2">ENTER QTY(kg)</th>
            @else
            <th class="th2">ENTER BOXS</th>
            @endif
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
