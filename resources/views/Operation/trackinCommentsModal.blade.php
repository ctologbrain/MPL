<style type="text/css">
    .modal-body{
        padding: 0px;
    }
    .model-header b{
        font-size: 15px;
    }
</style>
<div class="modal fade model-popup" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   <div class="model-header main-title p-1 mt-2">
                       <div class="text-center"><b>COMMENTS</b></div>
                   </div>
                    <div class="modal-body">
                        <div class="col-8 mt-1 m-b-1"> 
                            <div class="row pl-pr">

                                <label class="col-md-3" for="docket_no">Docket Number</label>
                                <div class="col-md-6">
                                    <input value="{{$dockNo}}" readonly type="text" name="docket_no" class="form-control docket_no" id="docket_no" tabindex="1">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                        </div>
                        <div class="col-8"> 
                            <div class="row pl-pr">

                                <label class="col-md-3" for="Comments">Comments<span class="error">*</span></label>
                                <div class="col-md-8">
                                   <textarea class="form-control" rows="4" cols="20" id="Comments" name="Comments" tabindex="2"></textarea>
                                </div>
                            </div>
                        </div>
                   </div>

            
                    <div class="modal-footer justify-content-center">
                        <button onclick="submitPage();" type="button" class="btn btn-secondary" >Save</button>
                        <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   
                     </div>

                     <table class="table-bordered">
                        <thead>
                            <tr class="main-title">
                                <th class="p-1 text-start" style="min-width: 100px;">Docket Number</th>
                                <th class="p-1 text-start" style="min-width: 400px;">Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($comments) >0)
                            @foreach($comments as $key)
                            <tr>
                                <td class="p-1 text-start">@isset($key->Docket) {{$key->Docket}} @endisset</td>
                                <td class="p-1 text-start">@isset($key->Comments) {{$key->Comments}}  @endisset</td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                     </table>

                </div>
            </div>
        
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

    function submitPage(){
        if($("#docket_no").val()==""){
            alert("Please Enter Docket No");
            return false;
        }
        if($("#Comments").val()==""){
            alert("Please Enter Comment");
            return false;
        }
        var Docket = $("#docket_no").val();
        var Comment = $("#Comments").val();
        var base_url = '{{url('')}}';
            $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: base_url + '/GetOpenedTrackingCommentPost',
            cache: false,
            data: {
                'Docket':Docket
                ,'Comment':Comment
            }, 
            success: function(data) {
            alert('Submit Successfully');
            }
            });
    }

    </script>