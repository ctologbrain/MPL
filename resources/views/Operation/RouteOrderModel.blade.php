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
              <input  id="order{{$j}}" type="text" class="form-control order" name="TouchPoints[{{$j}}][order]" value="{{$j}}" readonly>
            </td>
            <td>
                <select tabindex="2" class="form-control product_id selectBox TouchPoints" value="{{$touchPointDet->RouteOrder}}" name="TouchPoints[{{$j}}][Touch]" id="Touch{{$j}}">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}" @if($touchPointDet->CityId==$cites->id){{'selected'}}@endif>{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input id="Timedata{{$j}}" type="text" class="form-control Timedata" name="TouchPoints[{{$j}}][Time]" value="{{$touchPointDet->Time}}"></td>
        
        </tr>

        @endforeach

        <?php $countValue=COUNT($touchPoint); 
        ?>
        @for($i=($countValue+1); $i<=20; $i++)
        <tr>
            <td>
              <input id="order{{$i}}" type="text" class="form-control order" name="TouchPoints[{{$i}}][order]" value="{{$i}}" readonly>
            </td>
            <td>
                <select tabindex="2" class="form-control product_id selectBox TouchPoints" name="TouchPoints[{{$i}}][Touch]" id="Touch{{$i}}">
                <option value="">--select--</option>
                @foreach($city as $cites)
                <option value="{{$cites->id}}">{{$cites->Code}} ~
                    {{$cites->CityName}}</option>
                @endforeach
            </select>
            </td>
            <td><input id="Timedata{{$i}}" type="text" class="form-control Timedata" name="TouchPoints[{{$i}}][Time]"></td>
        
        </tr>
        @endfor
       
        
        
    </tbody>
</table>

            
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="ComplateSubmit();" type="submit" class="btn btn-primary">Save</button>
            </div>

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

        function ComplateSubmit(){ 
        
             if ($('#RouteName').val() == '') {
        alert('Please Enter Route Name');
        return false;
        }
        if ($('#StartPoint').val() == '') {
            alert('Please Select Start Point');
            return false;
        }
        if ($('#endpoint').val() == '') {
            alert('Please Select End Point');
            return false;
        }
        // if ($('#StartPoint').val() == $('#endpoint').val()) {
        //     alert('Start Point And End Point are same');
        //     return false;
        // }
        if ($('#TransitDays').val() == '') {
            alert('Please Enter Transit Days');
            return false;
        }
        var hiddenid = $('#hiddenid').val();
        var RouteName = $('#RouteName').val();
        var StartPoint = $('#StartPoint').val();
        var endpoint = $('#endpoint').val();
        var TransitDays = $('#TransitDays').val();
           var formdata = new FormData();
         
            formdata.append('RouteName',RouteName);
            formdata.append('StartPoint',StartPoint);
            formdata.append('endpoint',endpoint);
            formdata.append('TransitDays',TransitDays);
            formdata.append('hiddenid',hiddenid);
            // $(".order").each(function(i){
                
            // });
            // $(".Timedata").each(function(i){
                 
            // });
            var i=0;
            $(".TouchPoints option:selected").each(function(i){
                var b=i+1;
                 formdata.append('TouchPoints['+i+'][Touch]',$(this).val());
                  formdata.append('TouchPoints['+i+'][order]',$("#order"+b).val());
                  formdata.append('TouchPoints['+i+'][Time]',$("#Timedata"+b).val());
                 ++i;
            });
            
           
          
         $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url:"{{url('AddRouteMaster')}}",
            cache: false,
            contentType: false,
            processData:false,
            data: formdata,
            success: function(data) {
                alert(data);
                location.reload();
            }

         })
        }
    </script>