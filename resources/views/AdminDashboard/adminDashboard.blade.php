@include('layouts.app')
<style type="text/css">
  i{
    background: #fff;
    border-radius: 50%;
    padding: 6px;
    margin-bottom: 5px;
    color: #000;
    margin-right: 10px;
  }
  i:hover{
   color: #000;
  }
  .header-part p{
    color: #fff;
    cursor: pointer;
  }

</style>
<div class="generator-container allLists">
   
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card sales_container">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                               <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    
                                          <div class="row">
                                             <div class="d-flex justify-content-between">
                                                       <div class="header-part btn-primary">
                                                       
                                                          <div class="border-bottom mb-1"> 
                                                            <i class="fa fa-home" aria-hidden="true"></i> 
                                                            <a href="{{url('MissingGatePassWithDocket')}}" style="color:#fff;cursor: pointer; font-size: 13px;">{{$MissingGatePass->Total}}/0</a>
                                                          </div>
                                                            <p class="text-center"><b>MISSING GATEPASS</b></p>
                                                       </div>
                                                     

                                                     
                                                       <div class="header-part btn-danger">
                                                        <div class="border-bottom mb-1"> 
                                                            <i class="fa fa-rocket" aria-hidden="true"></i> <a href="{{url('BookingDashboardReport')}}" style="color:#fff;cursor: pointer;font-size: 13px;">{{$TotalBookingCredit->Total}}/{{$TotalBookingCash->Total}}</a>
                                                          </div>
                                                            <p class="text-center"><b>BOOKING</b></p>
                                                       </div>
                                                     
                                                     
                                                       <div class="header-part btn-warning">

                                                        <div class="border-bottom mb-1"> 
                                                            <i class="fa fa-truck" aria-hidden="true"></i> <b style="color: #fff;font-size: 13px;">0</b>
                                                          </div>
                                                            <p class="text-center"><b>UNUSED EWAYBILL</b></p>
                                                        
                                                       </div>


                                                     
                                                       

                                                       <div class="header-part btn-success">

                                                         <div class="border-bottom mb-1"> 
                                                           <i class="fa fa-truck"></i> <b style="color:#fff;cursor: pointer;font-size: 13px;">0</b>
                                                          </div>
                                                            <p class="text-center"><b>EXPIRED EWAYBILL</b></p>
                                                        
                                                       </div>

                                                       <div class="header-1">


                                                       </div>

                                                        <div class="header-1">


                                                       </div>
                                                        <div class="header-1">


                                                       </div>
                                                        <div class="header-1">


                                                       </div>
                                                    
                                                    
                                                     
                                                
                                             </div>

                                             <div class="col-12 btn-info mt-2">
                                              <h6>Today & Next 7 days Coming Plan</h6>
                                             </div>

                                             <div class="col-12 btn-success mt-1 text-center">
                                              <h6>NO PLAN...</h6>
                                             </div>
                                            
                                             


                                                                         
                                           </div>

                                          
                         </div>
                        </div> <!-- tab-content -->
                       
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
</div>




<script type="text/javascript">

    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
</script>