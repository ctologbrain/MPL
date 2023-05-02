<div class="modal fade" id="TouchPointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <th width="10">Sequence</th>
            <th width="80">Transit HUB </th>
            <th width="10">Halting Time </th>
          
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>S</td>
            <td>{{$route->StatrtPointDetails->Code}} ~ {{$route->StatrtPointDetails->CityName}}</td>
            <td></td>
        </tr>
        @foreach($touchPoint as $tcpoint)
        <tr>
        <td>{{$tcpoint->RouteOrder}}</td>
            <td>{{$tcpoint->Code}} ~ {{$tcpoint->CityName}}</td>
            <td>{{$tcpoint->Time}}</td>
       </tr>
        @endforeach
       <tr>
            <td>D</td>
            <td>{{$route->EndPointDetails->Code}} ~ {{$route->EndPointDetails->CityName}}</td>
            <td></td>
       </tr>
    </tbody>
</table>
 <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>

            </div>
        </div>
    </div>
</div>
<script>
      $('#TouchPointModal').modal('toggle');</script>