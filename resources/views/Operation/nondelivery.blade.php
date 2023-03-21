@include('layouts.appTwo')


<div class="generator-container allLists">
   
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">NON DELIVERY</h4>
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
                                         <div id="" class="col-12 mb-2 text-center mb-1">
                                            <div  class="row">
                                                <div class="col-md-2"></div>
                                                <label class="col-md-3 col-form-label text-end" for="userName">Destination Office<span
                                                class="error">*</span></label>
                                                <div class="col-md-4">
                                                  <select tabindex="1" class="form-control selectBox destination_office text-start" name="destination_office" id="destination_office" onchange="">
                                                            <option value="">--select--</option>
                                                            @foreach($offcie as $key)
                                                             <option @if($key->id== $OffcieSalacted->id) selected @endif value="{{$key->id}}">{{$key->OfficeCode}}~ {{$key->OfficeName}}</option>
                                                            @endforeach
                                                           
                                                         </select>
                                                     <span class="error"></span>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>
                                      
                                        <hr>
                                         <div class="col-6 mb-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="  userName">Docket Number
                                                    <span
                                                    class="error">*</span></label>
                                                <div class="col-md-9 text-start">
                                                   <input type="text" tabindex="2" class="form-control docket_no" name="docket_no" id="docket_no" onchange="getDocketDetails(this.value)">
                                                  
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="col-6 mb-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="  userName">Customer Name:
                                                    </label>
                                                <div class="col-md-9">
                                                    
                                                  <input type="text" tabindex="2" class="form-control customer_name back-color" name="customer_name" id="customer_name" onchange="" disabled>
                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                       
                                       
                                        
                                        <div class="col-6 mb-1">
                                         <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">NDR Date<span
                                             class="error">*</span></label>
                                            <div class="col-md-9">
                                           
                                             <input type="datepickerOne" tabindex="3" class="form-control NDR_Date datepickerOne" name="NDR_Date" id="NDR_Date" >
                                                 
                                                  
                                            </div>
                                         </div>
                                        </div>

                                        <div class="col-6 mb-1">
                                         <div class="row">
                                            <label class="col-md-3 col-form-label" for="Load_type">Load Type:</label>
                                            <div class="col-md-9">
                                           
                                           
                                              <input type="text" tabindex="2" class="form-control load_type back-color" name="load_type" id="load_type" onchange="" disabled>
                                                      
                                                  
                                            </div>
                                         </div>
                                        </div>


                                        <div class="col-6 mb-1">
                                         <div class="row">
                                            <label class="col-md-3 col-form-label" for="NDR_Reason">NDR Reason<span
                                             class="error">*</span></label>
                                            <div class="col-md-9">

                                            <select tabindex="1" class="form-control selectBox NDR_Reason text-start" name="NDR_Reason" id="NDR_Reason" onchange="">
                                                            <option value="">--select--</option>
                                                            @foreach($NDR_Master as $key)
                                                             <option value="{{$key->id}}">{{$key->  ReasonCode}}~ {{$key->ReasonDetail}}</option>
                                                            @endforeach
                                                           
                                                         </select>
                                             <!-- <input type="text" tabindex="4" class="form-control NDR_Reason" name="NDR_Reason" id="NDR_Reason" > -->
                                                  
                                                  
                                            </div>
                                         </div>
                                        </div>
                                        

                                        <div class="col-6 mb-1">
                                         <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">Remarks<span
                                             class="error">*</span></label>
                                            <div class="col-md-9">
                                           
                                             <Textarea class="form-control remark"
                                                    placeholder="Remark"  tabindex="5"  name="Remark" id="Remark"></Textarea>
                                                  
                                            </div>
                                            
                                         </div>
                                        </div>
                                       
                                         
                                          
                                        <div class="col-12 text-end">
                                            
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input onclick="DataSubmit();" type="button" tabindex="11" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="" tabindex="6">
                                                <a href="" tabindex="12" class="btn btn-primary mt-3" tabindex="7">Cancel</a>
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
            </div> 
      
        </div> <!-- end col -->
      

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Volumetric Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered  table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Measurement</th>
                                                    <th>Length<span class="error">*</span></th>
                                                    <th>Width<span class="error">*</span></th>
                                                    <th>Height<span class="error">*</span></th>
                                                    <th>Quantity<span class="error">*</span></th>
                                                    <th>Actual Weight  (Per Piece)<span class="error">*</span></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="table-user">
                                                    <select name="PackingMethod" tabindex="30" class="form-control PackingMethod" id="PackingMethod">
                                                          <option value="1">INCH</option>
                                                           
                                                        </select> 
                                                       
                                                    </td>
                                                    <td> 
                                                       
                                                    <input type="number" step="0.1" name="lenght"  class="form-control lenght" id="lenght">
                                                        </td>
                                                    <td> <input type="number" step="0.1" name="width"  class="form-control width" id="width"> </td>
                                                    <td>
                                                        <input type="number" step="0.1" name="height"  class="form-control height" id="height">
                                                    </td>
                                                    <td>
                                                        <input type="number"  step="0.1" name="qty"  class="form-control qty" id="qty">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.1" name="VloumeActualWeight"  class="form-control VloumeActualWeight" id="VloumeActualWeight">
                                                    </td>
                                                    
                                                </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6"> 
                                                        <p>Customer Inch Formula : ((Length * Width * Height) / 1728.00) * 6.00</p>
                                                        <p>Customer Centimeter Formula : Formula not define !</p>  
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                    
                                                   
                                                </tr>
                                            </tfoot>
                                           
                                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="calculateVolume()">Save</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });
      $('.selectBox').select2();
    function DataSubmit(){
       var  destination_office = $("#destination_office").val();
            var docket_no = $("#docket_no").val();
            var NDR_Date = $("#NDR_Date").val();
            var NDR_Reason = $("#NDR_Reason").val();
            var Remark = $("#Remark").val();
           
            if(destination_office==""){
                alert("please Enter  Office Name");
                return false;
                
            }
            if(docket_no==""){
                alert("please Enter Docket No");
                return false;
                
            }
            if(NDR_Date==""){
                alert("please Enter NDR Date");
                return false;
                
            }
            if(NDR_Reason==""){
                alert("please Enter NDR Reason");
                return false;
                
            }
            if(Remark==""){
                alert("please Enter Remark");
                return false;
                
            }

            if($('#customer_name').val()==""){
                alert("Dont have Customer Details On This Docket No");
                return false;
                
            }
            
           
            var base="{{url('/NoDelveryPost')}}";
            $.ajax({
                url:base,
                method:"POST",
                data:{
                    'desination_office':destination_office,
                    'Docket_No' :docket_no,
                    'NDR_Date' :NDR_Date,
                    'NDR_Reason' :NDR_Reason,
                    'Remark' :Remark
                },
                 headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                    cache:false,
                    success:function(data){
                          const obj = JSON.parse(data);
                          if(obj.success=="true"){
                            alert('Successfully Added');
                             location.reload();
                        }
                    }
            });
    }
 function getDocketDetails(Docket_No)
 {
   
    var office_name=$('#office_name').val();
    var type=$('.type').val();
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketNo',
       cache: false,
       data: {
           'Docket_No':Docket_No
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.success=='false')
        {
            alert("No Docket Found");
            $('.docket_no').val('');
            $('.docket_no').focus();
            $('.NDR_Date').val('');
            $('.NDR_Reason').val(''); 
            $('.Remark').val('');
            return false;
        }
        else{
            $('#customer_name').val(obj.bodyPart['CCode']+'~'+obj.bodyPart['CName']);
            $('#load_type').val();
        }

       }
     });
}

</script>