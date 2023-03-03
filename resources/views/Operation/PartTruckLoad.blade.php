@include('layouts.appTwo')
<style >
    .allLists {
    box-shadow: 0 2px 5px rgb(0 0 0);
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
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
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
                                                <label class="col-md-4   col-form-label" for="  userName">Office Name
                                                    <span
                                                    class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="office_name" id="office_name" class="form-control selectBox office_name">
                                                        <option value="">Select Office</option>
                                                        @foreach($office as $key)
                                                        <option value="{{$key->id}}">{{$key->OfficeCode}} ~{{$key->OfficeName}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                  
                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4   col-form-label" for="  userName">Docket Number
                                                    <span
                                                    class="error">*</span></label>
                                                <div class="col-md-8">
                                                   <input type="text" tabindex="2" class="form-control docket_no" name="docket_no" id="docket_no" onchange="getDocketDetails(this.value)">
                                                  
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                            
                                       
                                        
                                        <div class="col-6">
                                         <div class="row mb-1">
                                            <label class="col-md-4 col-form-label" for="password">Actual Boxes<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                           
                                             <input type="text" tabindex="3" class="form-control actual_box" name="actual_box" id="actual_box" >
                                                 
                                                  
                                            </div>
                                         </div>
                                        </div>

                                        <div class="col-6">
                                         <div class="row mb-1">
                                            <label class="col-md-4 col-form-label" for="password">To Be Loaded Boxes<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                           
                                             <input type="text" tabindex="4" class="form-control to_be_loaded_box" name="to_be_loaded_box" id="to_be_loaded_box" >
                                                 
                                                  
                                            </div>
                                         </div>
                                        </div>


                                        <div class="col-6">
                                         <div class="row mb-1">
                                            <label class="col-md-4 col-form-label" for="password">Actual Weight<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                           
                                             <input type="text" tabindex="5" class="form-control actual_weight" name="actual_weight" id="actual_weight" >
                                                  
                                                  
                                            </div>
                                         </div>
                                        </div>

                                        <div class="col-6">
                                         <div class="row mb-1">
                                            <label class="col-md-4 col-form-label" for="password">To Be Loaded Weight<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                           
                                             <input type="text" tabindex="6" class="form-control to_be_loaded_weight" name="to_be_loaded_weight" id="to_be_loaded_weight" >
                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                  
                                            </div>
                                         </div>
                                        </div>


                                         <div id="" class="col-6">
                                            <div  class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Type<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <select name="type" id="type" tabindex="7" class="form-control selectBox type">
                                                    <option value="">--select--</option>
                                                    <option value="1">DRS</option>
                                                    <option value="2">LOCAL GATEPASS</option>
                                                    <option value="3">TS GATEPASS</option>

                                                     </select>
                                                     <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                         
                                        
                                       

                                      

                                         
                                       
                                       

                                          
                                        <div class="col-12 text-end">
                                            <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input onclick="DataSubmit();" type="button" tabindex="4" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="">
                                                <a href="" tabindex="5" class="btn btn-primary mt-3">Cancel</a>
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
            </div> <!-- end card-->
            <!-- <div class="card">
              <div class="card-body">
                   <div class="tab-content">
                        <div class="tab-pane show active" id="                    input-types-preview">
                            <div class="row tabels">
                            </div>
                        </div>
                   </div>
              </div>
            </div> -->
              
      
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });
      $('.selectBox').select2();
    function DataSubmit(){
       var  office_name = $("#office_name").val();
            var docket_no = $("#docket_no").val();
            var actual_box = $("#actual_box").val();
            var to_be_loaded_box = $("#to_be_loaded_box").val();
            var actual_weight = $("#actual_weight").val();
            var to_be_loaded_weight = $("#to_be_loaded_weight").val();
            var type = $("#type").val();
            if(office_name==""){
                alert("please Enter  Office Name");
                return false;
                
            }
            if(docket_no==""){
                alert("please Enter Docket No");
                return false;
                
            }
            if(actual_box==""){
                alert("please Enter Actual Box");
                return false;
                
            }
            if(to_be_loaded_box==""){
                alert("please Enter to be loaded box");
                return false;
                
            }
            if(actual_weight==""){
                alert("please Enter Actual Weight");
                return false;
                
            }
            if(to_be_loaded_weight==""){
                alert("please Enter to be loaded weight");
                return false;
                
            }
            // if(type==""){
            //     alert("please Enter type");
            //     return false;
                
            // }
            var base="{{url('PartTruckLoadSubmition')}}";
            $.ajax({
                url:base,
                method:"POST",
                data:{
                    'office_name':office_name,
                    'docket_no' :docket_no,
                    'actual_box' :actual_box,
                    'to_be_loaded_box' :to_be_loaded_box,
                    'actual_weight' :actual_weight,
                    'to_be_loaded_weight' :to_be_loaded_weight,
                    'type' :type
                },
                 headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                    cache:false,
                    success:function(data){
                        location.reload();
                    }
            });
    }
 function getDocketDetails(Docket)
 {
    if($('#office_name').val()=='')
    {
     alert('Please select office');
    
     $('.docket_no').val('');
     $('.office_name').focus();
     return false;
    }
    var office_name=$('#office_name').val();
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketIsAvalibleForPartLoad',
       cache: false,
       data: {
           'Docket':Docket,'BranchId':office_name
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message)
            $('.docket_no').val('');
            $('.docket_no').focus();
            $('.actual_box').val('');
            $('.actual_weight').val('');
            return false;
        }
        else{
            $('.actual_box').val(obj.Pices);
            $('.actual_weight').val(obj.ActualW);
        }

       }
     });
}
</script>