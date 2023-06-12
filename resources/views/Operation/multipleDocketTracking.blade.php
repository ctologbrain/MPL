@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">MULTIPLE DOCKET TRACKING</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="docketNo">DOCKET NO<span
                                            class="error">*</span></label>
                                                <div class="col-md-7">
                                                <textarea type="text" tabindex="1" class="form-control docketNo" name="docketNo" id="docketNo" ></textarea>
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <button onclick="trackingDocket();" type="button" class="btn btn-primary d-flex align-items-end">GO</button>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            
                                        
                                             

                                        </div>
                                               
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
                 <div class="tab-content">
                    <div class="tab-pane show active" id="input-types-preview">
                    <div class="table-responsive a LoadTable">
                                    
                    </div>
                       
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>
<div class="OpenTrackingDocket"></div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function OpenTracking(Docket)
  {
    var base_url = '{{url('')}}';
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/DocketMultiTrackingModel',
           cache: false,
           data: {
           'Docket':Docket
           }, 
            success: function(data) {
               $(".OpenTrackingDocket").html(data);
            }
            });
  }

  function trackingDocket()
  {
      var TrackingDocket = '';
      if($("#docketNo").val()==''){
          alert("Please Enter Dockets");
         return false;
      }
      var DocketNo = $("#docketNo").val();
        var base_url = '{{url('')}}';
            $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
            url: base_url + '/MultipleDocketTrackingPost',
            cache: false,
            data: {
            'DocketNo':DocketNo
            }, 
                success: function(data) {
                $(".LoadTable").html(data);
                }
            });
  }


 
</script>