@include('layouts.appTwo')
<style type="text/css">
    .bgColor{
        background-color: #888888; 
    }
    .list-text{
        color: #fff;
        padding:10px;
    }
    .checkDisplaynone
    {
        display:none !important;
    }
</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">ROUTE PLANNING</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
                 <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card stck_summary">
                <div class="card-body">
                    <form>
                        
                        <div id="basicwizard">
                           <div class="tab-content">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row p-1">
                        <div class="mb-2 col-md-2">
                   <input type="text" name="formDate" id="formDate"  value="@if(request()->get('formDate') !=''){{ request()->get('formDate') }}@else{{date('d-m-Y', strtotime('last month'))}} @endif" class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" id="todate"   value="@if(request()->get('formDate') !=''){{ request()->get('formDate') }}@else{{date('d-m-Y')}} @endif"    class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>

                   <div class="mb-2 col-md-3">
                           <button type="button" name="submit" value="Search" class="btn btn-primary" tabindex="4" onclick="getdocumentdatails()">Search</button>
                           <a href="{{url('RoutePlanning_Org_Dest')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          </div>    
                                <div class="row bgColor mt-1 checkDisplaynone" id="spsps">
                                        <div class="col-md-6 text-start list-text">
                                           <span id="textValue"></span>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <div class="gatepass-details row">
                                              <div class="col-md-12 text-end">
                                               <input type="button" tabindex="1" value="Cancel" class="btn btn-dark btnSubmit" id="btnSubmit" onclick="genrateNO()">
                                                <input type="button" tabindex="2" value="Export" class="btn btn-dark btnSubmit" id="btnSubmit" onclick="genrateNO()">
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
                <div class="row">
                    <div class="col-4">
                         <div class="ssss">
                                       
                         </div>
                         
                    </div>
                    <div class="col-8" id="sssss">
                       
                       
     
                        
                    </div>
                </div>
            </div> <!-- end card-->
        </div>
    </div>
   
</div>
<script>
     $(".selectBox").select2();
     $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
       todayHighlight: true
      });
 function getdocumentdatails()
 {
        var formDate=$('#formDate').val();
        var todate=$('#todate').val();
        var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckServiceLable',
       cache: false,
       data: {
          'formDate':formDate,'todate':todate
       },
       success: function(data) {
           
        $('#sssss').html('');
         $('.ssss').html(data);
        
       }
       
     });
 }
 function getDocketDetails(date)
 {
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetAllReceivingAndDelivData',
       cache: false,
       data: {
           'date':date
       },
       success: function(data) {
      $('#sssss').html(data);
       }
       
     });
 }
 function PendingReceivingDocket(date)
 {
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetAllReceivingDocketReport',
       cache: false,
       data: {
           'date':date
       },
       success: function(data) {
      $('#sssss').html(data);
       }
       
     });
 }
</script>