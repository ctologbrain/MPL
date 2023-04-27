
<div class="modal fade model-popup" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                                    
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="main-title text-center p-1">Transit HUB</h5>
                 
                    <table class="table table-bordered mb-0">
                            <tr>
                                <td class="fw-bold text-start">Route Name</td>
                                <td colspan="3">{{$route->RouteName}}</td>
                              
                            </tr>
                            <tr>
                                <td class="fw-bold text-start" style="min-width: 60px;">Start Point</td>
                                <td class="text-start" style="min-width: 150px;">@if(isset($route->StatrtPointDetails->Code)) {{$route->StatrtPointDetails->Code}} ~ {{$route->StatrtPointDetails->CityName}} @endif</td>
                                <td class="fw-bold text-start" style="min-width: 50px;">End Point</td>
                                <td class="text-start" style="min-width: 150px;">{{$route->EndPointDetails->Code}} ~ {{$route->EndPointDetails->CityName}}</td>
                              
                            </tr>
                             <tr>
                                <td class="text-start fw-bold">Transit Days<span class="error">*</span></td>
                                <td colspan="3" class="text-start"> 
                                    <div class="row">
                                        <div class="col-3">
                                        <input value="{{$route->TransitDays}}" type="text" name="TransitDayss" id="TransitDayss"  class="form-control">
                                        </div>
                                        <div class="col-2 text-start">
                                        <input id="prevSubmit" type="button" class="btn btn-primary" value="Update" onclick="UpdateRoute()" tabindex="17"> 
                                        </div>
                                     </div>
                                </td>
                              
                            </tr>
                            <tr class="main-title text-dark">
                                <td class="fw-bold text-start" style="min-width: 50px;">Sequence<span class="error">*</span></td>
                                <td class="text-start fw-bold" style="min-width: 200px;">Transit HUB<span class="error">*</span></td>
                                <td class="fw-bold text-start" style="min-width: 120px;">Halting Time<span class="error">*</span></td>
                                <td class="text-start" style="min-width: 150px;"></td>
                              
                            </tr>
                        
                             <tr>
                                <td style="min-width: 100px;">
                                    <input type="text" id="Seq" name="sequence" class="form-control">
                                    <input value="{{$route->id}}" type="hidden" name="Hiddenid" id="Hiddenid">
                                </td>
                                <td>
                                    <select class="form-control selectBox City" id="City" name="City">
                                        <option value="">--Select--</option>
                                        @foreach($city as $key)
                                         <option value="{{$key->id}}">{{$key->Code}}~ {{$key->CityName}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                 <td class="d-flex">
                                    <div style="min-width: 60px;"><input type="text" name="Time" id="Time" class="form-control"></div>
                                    <div style="min-width: 60px;">(In Hours)</div>
                                </td>
                                <td>
                                
                                    <div class="row">
                                        <div class="col-4 d-flex">
                                    <input id="prevSubmit" type="button" class="btn btn-primary" value="Save" onclick="addLocation()" tabindex="17"> 
                                                          
                                                          <a href="{{url('RouteMaster')}}" id="prevSubmit" type="button" class="btn btn-primary" tabindex="18">Close</a>
                                    </div>
                                </div>
                                </td>
                            </tr>
                     
                    </table>
                    <table class="table table-bordered mb-0" style="width: 100%;">
                        <thead>
                            <tr class="main-title text-dark">
                                <th>SL#</th>
                                <th>ACTION</th>
                                <th>Seqence</th>
                                <th>Transit HUB</th>
                                <th>Halting Time</th>
                                <th>Entry By</th>
                                <th>Entry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($touchPoint as $key)
                             <?php $i++; ?>
                             <tr id="Row{{$i}}">
                             <td>{{$i}}</td>
                            <td><a href="javascript:void(0)" onclick="DeleteRoute('{{$key->id}}','{{$i}}')">Delete </a></td>
                            <td>{{$key->RouteOrder}}</td>
                            <td>@isset($key->cityDetails->Code) {{$key->cityDetails->Code}}~{{$key->cityDetails->CityName}} @endisset</td>
                             <td>{{$key->Time}}</td>
                             <td>@isset($key->userDetails->name) {{$key->userDetails->name}} @endisset</td>
                             <td>{{$key->created_at}}</td>
                         </tr>
                            @endforeach

                        </tbody>
                    </table>

            
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button onclick="ComplateSubmit();" type="submit" class="btn btn-primary">Save</button> -->
            </div>

            </div>
        </div>
    </div>

<script type="text/javascript">
    $('.selectBox').select2();
     $("#routeOrderModel").modal('show');
</script>