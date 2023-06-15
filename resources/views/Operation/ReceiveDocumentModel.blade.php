<style type="text/css">
.recieve_document h5{
  
        margin:0;
   
}
.modal-body{
    padding:0px;
}
</style>
<div class="modal fade model-popup recieve_document" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   
                    <div class="modal-body">
                    <h5 class="text-center" style="background-color: #825d5d42;padding:6px 10px;color:#000; ">RECEIVE DOCUMENTS</h5>
                    <div class="row p-1 mt-2">
                        <label class="col-md-2" for="remarks">REMARKS</label>
                        <div class="col-md-5">
                            <textarea class="form-control" id="Remark" rows="2"></textarea>
                        </div>
                        <div class="col-md-5">
                        </div>
                        <label class="col-md-2" for="remarks"></label>
                        <div class="col-md-5 text-center mt-1">
                           
                            <input type="hidden" name="DocId" id="DocId" value="{{$withId}}">
                            <button onclick="SubmitReceivedDoc();" type="button"   class="btn btn-primary">Receive</button>
                             <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-5">
                        </div>
                        
                    </div>
                    <table class="table table-bordered table-centered mb-0">
                        <thead>
                            <tr style="background-color: #825d5d42;padding:6px 10px;color:#000; ">
                                <th class="th1 p-1" style="min-width: 50px;">SL#</th>
                                <th class="th2 p-1" style="min-width: 200px;">Document Name </th>
                                <th class="th3 p-1" style="min-width: 150px;">Remarks </th>
                               <th class="th1 p-1" style="min-width: 100px;">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                           @foreach($DocumentImage as $data)
                           <?php $i++; ?>
                            <tr>
                                <td class="p-1">{{$i}}</td>
                                <td class="p-1 text-center">{{$data->GetDocumentDet->DocumentCode}} ~ {{$data->GetDocumentDet->DocumentName}}</td>
                                <td class="p-1 text-center">{{$data->Remark}}</td>
                                <td class="p-1 text-center"><a target="_blank" href="{{url($data->File)}}"><b>View</b></a></td>
                                
                            </tr>
                           @endforeach
                          
                            
                        </tbody>
                    </table>

           

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

    </script>