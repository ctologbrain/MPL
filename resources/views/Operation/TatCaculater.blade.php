@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">TAT CALCULATOR</h4>
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
                                        <div class="col-6 mb-1 mt-1">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label text-end" for="BookingDate">Booking Date:<span
                                                class="error">*</span></label>
                                                    <div class="col-md-5">
                                                    <input type="text" tabindex="1" class="form-control datepickerOne BookingDate" name="BookingDate" id="BookingDate" >
                                                    <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                    <span class="error"></span>
                                                    </div>
                                                </div>
                                        </div>
                                            
                                        <div class="col-6">
                                            <div class="row mb-1">
                                               
                                            </div>
                                        </div>  

                                          <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="customer_code">Customer Code:</label>
                                                <div class="col-md-5">
                                              
                                                     <input type="text" tabindex="2" class="form-control customer_code" name="customer_code" id="customer_code" value="">
                                                 </div>
                                            </div>
                                         </div>
                                            
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="docketNo">Docket Number:</label>
                                                <div class="col-md-5">
                                               
                                                <input type="text" tabindex="3" class="form-control docketNo" name="docketNo" id="docketNo" value="">
                                                </div>
                                            </div>
                                        </div>


                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="origin_pincode">Origin Pincode:</label>
                                                <div class="col-md-5">
                                               <input type="number" tabindex="4" class="form-control origin_pincode" name="origin_pincode" id="origin_pincode" value="">  
                                                </div>
                                            </div>
                                         </div>
                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="destination_pincode">Destination Pincode:</label>
                                                <div class="col-md-5">
                                               <input type="number" tabindex="5" class="form-control destination_pincode" name="destination_pincode" id="destination_pincode" value="">  
                                                </div>
                                                <div class="col-md-2"><button type="button" onclick="getTatDetails()" class="btn btn-primary" tabindex="6">GO</button></div>
                                            </div>
                                         </div>

                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="origin_city">City Name:</label>
                                                <div class="col-md-8">
                                              
                                                </div>
                                            </div>
                                         </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-5 col-form-label text-end" for="destination_city">City Name:</label>
                                                <div class="col-md-7">
                                               
                                                </div>
                                            </div>
                                         </div>

                                         <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label text-end" for="origin_city_grpcode">Origin City Group Code:</label>
                                                <div class="col-md-8">
                                               
                                                </div>
                                            </div>
                                         </div>
                                        <div class="col-6">
                                           <div class="row mb-1">
                                                <label class="col-md-5 col-form-label text-end" for="destination_city_grpcode">Destination City Group Code:</label>
                                                <div class="col-md-7">
                                               
                                                </div>
                                            </div>
                                         </div>

                                           
                                        
                                    </div>
                                         
                                        
                                             

                                </div>
                                               
                                        
                            </div>
                        </div>
                               
                    </form>

                </div> <!-- end card-body -->
                <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row tabels">
                    </div>
                </div>
            
            </div> <!-- end card-->
            
                 
                
        </div>
                 
              
      
    </div> <!-- end col -->
      

    
</div>

<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function getTatDetails(Docket)
  {
      if($('#docketNo').val()=='')
      {
          alert('Please Enter Docket');
          return flase;
      }
    var Docket=$('#docketNo').val();
    var base_url = '{{url('')}}';
        $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/getTatCalculater',
           cache: false,
           data: {
           'Docket':Docket,
           }, 
            success: function(data) {
               
            }
            });
  }
 
</script>