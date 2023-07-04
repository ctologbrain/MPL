<style>
.main-title {
    background-color: #825d5d42;
    padding: 0px 10px;
    align-items: center;
    color: #000;
    
}
</style>
<div class="modal fade model-popup generate-container" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                       
                <div class="main-title">
                <h5 class="text-center">{{$title}} {{$DocketName}} &nbsp; &nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="{{url('DocketTrackExport?docketId=').$DocketName}}">Download </a></h5>
                </div>
                       
                <div class="modal-body" style="padding:0px;">
                <div class="col-md-12">
            <div class="row">
            <div class="table-responsive a" style="display: flex;">
                    <table id="table" class="table table-bordered table-centered mb-1 mt-1 ccccc" style="width: 5%;">
                            <thead>
                            <tr class="main-title text-dark">
                            <th class="p-1">sr</th>
                                
                            </tr>
                            </thead>
                            <tbody class="docketTracking-tbody">
                                @if(isset($data))
                            <?php $i=0; foreach($data as $value){?>
                            @if($value !='')
                            <?php $i++; ?>
                                <tr class="ssss">
                                    <td>{{$i}}</td>
                                    <?php $ssss=explode("</td>",$value); ?>
                                    @if(isset($ssss[2]))
                                    <td class="display" style="display:none!important;"><tr style="display:none!important;"> <?php  echo $ssss[2]; ?></tr></td>
                                    @endif
                            </tr>
                            @endif
                            
                            
                        
                            <?php } ?>
                            @endif
                        </tbody>
                                
                    </table> 
                    
               
                    <table class="table table-bordered table-centered mb-1 mt-1 ccccc" width="95%">
                            <thead>
                            <tr class="main-title text-dark">
                            
                                <th class="p-1">Activity</th>
                                <th class="p-1">Activity Date</th>
                                <th class="p-1">Description</th>
                                <th class="p-1">Entry Date</th>
                                <th class="p-1">Entry Detail</th>
                            </tr>
                            </thead>
                            <tbody class="docketTracking-tbody">
                            @if(isset($data) && $data !='')
                            <?php $i=0; foreach($data as $value){$i++;?>
                            
                            @if($value !='')
                                    <?php echo $value;?>
                            @endif
                            <?php } ?>
                            @endif
                            
                        </tbody>
                                
                    </table> 
                </div>
            </div>
            </div>      

            
            <div class="modal-footer">
                <div class="col-12 text-center">
                <button onclick="SubmitDetails();"  type="button" class="btn btn-primary" >Save</button>
                <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
               
            </div>

            </div>
        </div>
    </div>
    <script>
  
          
        $('.selectBox').select2({
            dropdownParent: $('#routeOrderModel')
        });

        $('#routeOrderModel').modal('toggle');
       
        $('#routeOrderModel').on('shown.bs.modal', function(e) {
            $('.datepickerOne').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true
                });
            $('.datepickerOne').css('z-index','1600');
            });
        

    </script>