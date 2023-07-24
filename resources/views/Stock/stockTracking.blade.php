@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    
                </div>
                <h4 class="page-title">STOCK TRACKING</h4>
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
                                                <label class="col-md-3 col-form-label text-end" for="waybill_no">WAYBILL NO<span
                                            class="error">*</span></label>
                                                <div class="col-md-6">
                                                <input type="text" tabindex="1" class="form-control waybill_no" name="waybill_no" id="waybill_no" >
                                               
                                                <span class="error"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <button  onclick="EnterDocket();"  type="button" class="btn btn-primary">GO</button>
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
                     <div class="d-flex justify-content-end me-3" >
                     <button disabled class="btn btn-primary" id="enable" onclick="DownloadStockFile();">Download</button>
                      </div>
                        <div   class="table-responsive a">
                                <table class="table table-bordered table-centered mb-1 mt-1 table-responsive stockData">
                                
                            </table>
                        </div>

                        
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>

<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function EnterDocket(Docket)
  {
    var base_url = '{{url('')}}';
  var Docket = $("#waybill_no").val();
        if($("#waybill_no").val()==""){
            alert("Please Enter Docket No");
            return false;
        }
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/StockTrackingPost',
           cache: false,
           data: {
           'Docket':Docket
           }, 
            success: function(data) {
            $('.stockData').html(data);    
                

            
            }
            });
  }

  $('[data-toggle="tooltip"]').tooltip();

  function DownloadStockFile(){
    var StockId =  $("#waybill_no").val();
      if($("#waybill_no").val()!=""){
        window.location.href ="{{url('StockTrackExport?StockId=')}}"+StockId;
      }
  }
</script>