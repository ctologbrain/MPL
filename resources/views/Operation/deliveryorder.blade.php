@include('layouts.appTwo')


<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">DELIVERY ORDER</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6 mb-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="docket_no">Docket Number
                                                    <span
                                                    class="error">*</span></label>
                                                    <div class="col-md-9 text-start">
                                                   <input type="text" tabindex="1" class="form-control docket_no" name="docket_no" id="docket_no" >
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="delivery_date">Delivery Date
                                                    </label>
                                                <div class="col-md-9">
                                                  <input type="text datepickerOne" tabindex="2" class="form-control delivery_date datepickerOne" name="delivery_date" id="delivery_date" onchange="">
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                         <div class="row">
                                            <label class="col-md-3 col-form-label" for="password">Remarks<span
                                             class="error">*</span></label>
                                            <div class="col-md-9">
                                             <Textarea class="form-control remark"
                                                    placeholder="Remark"  tabindex="3"  name="remark" id="remark"></Textarea>
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input onclick="DataSubmit();" type="button" tabindex="4" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                                <a href="" tabindex="12" class="btn btn-primary" tabindex="5">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> 
        </div> <!-- end col -->
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
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true
      });
     $(".datepickerOne").val('{{date("Y-m-d")}}');
      $('.selectBox').select2();
    function DataSubmit(){
            var docket_no = $("#docket_no").val();
            var delivery_date = $("#delivery_date").val();
            var remark = $("#remark").val();
            
            if(docket_no==""){
                alert("please Enter Docket No");
                return false;
                
            }
            if(delivery_date==""){
                alert("please Enter Delivery Date");
                return false;
                
            }
            if(remark==""){
                alert("please Enter Remark");
                return false;
                
            }
            var base="{{url('DeliveryOrderDelayPost')}}";
            $.ajax({
                url:base,
                method:"POST",
                data:{
                    'docket_no' :docket_no,
                    'delivery_date' :delivery_date,
                    'remark' :remark
                },
                 headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                    cache:false,
                    success:function(data){
                        var obj = JSON.parse(data);
                        if(obj.success=="true"){
                            alert('Successfully Submit');
                            location.reload();
                        }
                        else{
                             alert('Wrong Docket No');
                             $("#docket_no").val('');
                            $("#delivery_date").val('');
                            $("#remark").val('');
                        }
                }
            });
    }


</script>
