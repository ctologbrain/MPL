@include('layouts.appTwo')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data">
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="userName">Docket Number<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                    <textarea name="docket" id="docket" cols="10" rows="5"  class="form-control docket"></textarea>
                                                    <span class="multiple_docket">* For multiple Docket use commas (,) e.g. 8XXXXXXXXX, 7XXXXXXXXX</span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="password">Reason<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <textarea name="Reason" id="Reason" cols="10" rows="2" class="form-control Reason"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3 mt-1">
                                                <label class="col-md-3 col-form-label" for="password"> Attach  Invoice<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="file" id="fileaimge" name="fileaimge" class="form-control">
                                                </div>
                                           </div>
                                          
                                           </div>
                                          </div>
                                               <div class="col-12 text-end mt-1">
                                            <div class="row mb-3">
                                             
                                                <div class="col-md-12 col-md-offset-3">
                                                <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="CancelDocket()">
                                    <a href="{{url('DocketCancel')}}" class="btn btn-primary">Reset</a>
                                                </div>
                                            </div>

                                            
                                        </div> <!-- end col -->
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->


    </div>
</div>
<script>
  function CancelDocket()
  {
     if($('#docket').val()=='')
     {
        alert('Please enter docket');
        return false;
     }
     if($('#Reason').val()=='')
     {
        alert('Please enter Reason');
        return false;
     }
     var ext = $('#fileaimge').val().split('.').pop().toLowerCase();
     if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    alert('Only png jpg jpeg allowed');
    return false;
    }
     var docket=$('#docket').val();
     var Reason=$('#Reason').val();

        var formData = new FormData();
         if ($('#fileaimge')[0].files.length > 0) 
         {
         for (var i = 0; i < $('#fileaimge')[0].files.length; i++)
          formData.append('file', $('#fileaimge')[0].files[i]);
         }
          formData.append('docket',docket);
          formData.append('Reason',Reason);
        

     var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CancelDocketStattus',
       cache: false,
       contentType: false,
        processData: false,
        data: formData,
       success: function(data) {
        alert(data);
        location.reload();
       }
     });
  }  
</script>