<div class="modal fade model-popup" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Transit HUB</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                 
                    <table class="table table-bordered table-centered mb-0">
    <thead>
        <tr>
            <th class="th1">Sequence</th>
            <th class="th2">Transit HUB </th>
            <th class="th3">Halting Time </th>
          
        </tr>
    </thead>
    <tbody>
   
       
        <?php  $j=0;?>
        @foreach($touchPoint as $touchPointDet)
        <?php  $j++;?>
        <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[{{$j}}][order]" value="{{$j}}" readonly>
            </td>
            <td>
                <select tabindex="2" class="form-control product_id selectBox TouchPoint{{$j}}" value="{{$touchPointDet->RouteOrder}}" name="TouchPoint[{{$j}}][Touch]" id="TouchPoint{{$j}}">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}" @if($touchPointDet->CityId==$cites->id){{'selected'}}@endif>{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input type="text" class="form-control" name="TouchPoint[{{$j}}][Time]" value="{{$touchPointDet->Time}}"></td>
        
        </tr>

        @endforeach

        <?php $countValue=COUNT($touchPoint); ?>
        @for($i=($countValue+1); $i<=20; $i++)
        <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[{{$i}}][order]" value="{{$i}}" readonly>
            </td>
            <td>
                <select tabindex="2" class="form-control product_id selectBox TouchPoint" name="TouchPoint[{{$i}}][Touch]" id="TouchPoint{{$i}}">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input type="text" class="form-control" name="TouchPoint[{{$i}}][Time]"></td>
        
        </tr>
        @endfor
       
        
        
    </tbody>
</table>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
</form>
            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');
    </script>