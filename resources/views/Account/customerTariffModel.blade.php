<div class="modal fade model-popup" id="CustomerModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Customer Tarrif Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <table class="table table-bordered table-centered mb-0">
                        <input type="hidden" id="MasterId" name="MasterId" value="{{$LatId}}">
                        <input type="hidden" id="originname" name="originname" value="{{$data['origin_name']}}">
                        <input type="hidden" id="destination_name" name="destination_name" value="{{$data['destination_name']}}">
                        <input type="hidden" id="mode_name" name="mode_name" value="{{$data['mode_name']}}">
                        <input type="hidden" id="Product_Type" name="Product_Type" value="{{$data['product']}}">
                        <input type="hidden" id="Delivery_Type" name="Delivery_Type" value="{{$data['delivery_type']}}">
                        <input type="hidden" id="Rate_type" name="Rate_type" value="{{$data['RateType']}}">
                        <input type="hidden" id="TAT " name="TAT" value="{{$data['tat']}}">
                        <input type="hidden" id="Min_Amount" name="Min_Amount" value="{{$data['Amount']}}">
    <thead>
        <tr>
            @if($data['RateType']==1)
            <th class="th2">ENTER QTY(kg)</th>
            @else
            <th class="th2">ENTER BOXS</th>
            @endif
            <th class="th2">Rate </th>
            
          
        </tr>
    </thead>
    <tbody id="coverTochPoints">
       
        @for($i=1; $i <= $slab; $i++)
    <tr>
            <td>
              <input  type="text" class="form-control  CustTarrifQty" name="CustTarrifQty[{{$i}}][rate]" id="Qty{{$i}}">
             </td>
            <td>
                <input tyep="text" class="form-control  CustTarrifRate" name="CustTarrifRate[{{$i}}][Amount]" id="Tarr{{$i}}">
            </td>
        </tr>
        @endfor
        </tbody>
       </table>
    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitModel()">Save</button>
            </div>

            </div>
        </div>
    </div>
</div>
<script>
  $('#CustomerModal').modal('toggle');   

  function submitModel(){
   var formData = new FormData();

   var originname =$("#MasterId").val();
var originname =$("#originname").val();
var destination_name =$("#destination_name").val();
var Product_Type =$("#Product_Type").val();
var Delivery_Type =$("#Delivery_Type").val();
var Rate_type =$("#Rate_type").val();
var TAT =$("#TAT").val();
var Min_Amount =$("#Min_Amount").val();
 var CustTarrifRate = [];
 var CustTarrifQty =[];
    var a=1;
    for(var i=0;  i < $(".CustTarrifQty").length; i++){
        var a=a+i;
        formData.append("Multi["+i+"][CustTarrifQty]",$("#Qty"+a).val());
        formData.append("Multi["+i+"][CustTarrifRate]",$("#Tarr"+a).val());
    }

   
   formData.append("originname",originname);
   formData.append("destination_name",destination_name);
   formData.append("mode_name",mode_name);
   formData.append("Product_Type",Product_Type);
   formData.append("Delivery_Type",Delivery_Type);
   formData.append("Rate_type",Rate_type);
   formData.append("TAT",TAT);
   formData.append("Min_Amount",Min_Amount);
   formData.append("MasterId",MasterId);

   var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/submitTarrifDataPost',
       data: formData,
        cache: false,
        contentType:false,
        processData:false,
       success: function(data) {
        // const obj = JSON.parse(data);
        // if(obj.status=='false')
        // {
        // }
    }
    });
  }
</script>
