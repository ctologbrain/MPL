
<div class="modal fade model-popup" id="exampleModaltwo"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <tbody id="coverTochPoints">
           @for($i=1; $i <= count($tochDetails); $i++)
    <tr>
            <td>
              <input  type="text" class="form-control" name="TouchPoint[{{$i}}][order]" value="{{$i}}" readonly>
            </td>
            <td>
                <select id="city1" tabindex="2" class="form-control product_id TouchPoint" name="TouchPoint[{{$i}}][Touch]" id="TouchPoint1">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option @if(!empty($tochDetails) && $cites->id==$tochDetails[$i]->CityId) selected @endif value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input value="" id="Time1" type="text" class="form-control" name="TouchPoint[{{$i}}][Time]"></td>
        
        </tr>
        @endfor
        @for($i= count($tochDetails); $i< count($tochDetails); $i++ )
        <tr>
            <td>
              <input type="text" class="form-control" name="TouchPoint[2][order]" value="2" readonly>
            </td>
            <td>
                <select id="city2" tabindex="2" class="form-control product_id  City" name="TouchPoint[2][Touch]" id="TouchPoint2">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input id="Time2" type="text" class="form-control Time" name="TouchPoint[2][Time]"></td>
        
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
</div>

<script type="text/javascript">
    
     $("#exampleModaltwo").modal('show');
</script>