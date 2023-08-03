<div class="modal fade" id="VolumaticModel" data-bs-backdrop="static" 
            aria-hidden="true" 
            aria-labelledby="feedbackLabel" 
            tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header main-title" style="display: flex;justify-content: center;">
            <h5 class="modal-title text-center" id="exampleModalLabel">Volumetric Detail</h5>
           
        </div>
        <div class="modal-body" style="padding:0rem;margin-top: 30px;">
            <div class="table-responsive a">
                      <table class="table table-bordered  table-centered mb-0"  style="width: 96%;margin:0 auto;">
                        <thead>
                            <tr class="main-title">
                           
                                <th >Measurement</th>
                                <th>Length<span class="error">*</span></th>
                                <th >Width<span class="error">*</span></th>
                                <th>Height<span class="error">*</span></th>
                                <th>Quantity<span class="error">*</span></th>
                                <th>Actual Weight  (Per Piece)<span class="error">*</span></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody id="getAppendVolumetric">
                            <tr>
                                
                                <td class="table-user">
                                    <select name="Packing" tabindex="30" class="form-control Packing" id="Packing">
                                    @if(isset($valumatricInc->DevideBy))  
                                    <option value="INCH">INCH</option>
                                    @endif
                                    @if(isset($valumatricCen->DevideBy))  
                                      <option value="CENTIMETER">CENTIMETER</option>
                                    @endif
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
                                <input  type="number"  step="0.1" name="qty"  class="form-control qty" id="qty">
                            </td>
                            <td>
                                <input readonly type="number" step="0.1" name="VloumeActualWeight"  class="form-control VloumeActualWeight" id="VloumeActualWeight">
                                <input type="hidden" step="0.1" name="final"  class="form-control final" id="final0">
                            </td>

                            <td class="p-1">
                                <input onclick="SubmitVolumatricWeiught();" type="button" tabindex="50" value="Save" class="form-control btn btn-primary">
                            </td>
                            <td class="p-1">
                                <input  type="button" tabindex="50" onclick="closeVolumaModel()" value="Close" class="form-control btn btn-primary">
                            </td>

                        </tr>


                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8"> 
                                <p style="color: #00F;font-weight: 600;">Customer Inch Formula : @if(isset($valumatricInc->DevideBy))((Length * Width * Height) / {{$valumatricInc->DevideBy}}) * {{$valumatricInc->MultipleBy}}@else{{'Formula Not Define !'}}@endif</p>
                                <p style="color: #00F;font-weight: 600;">Customer Centimeter Formula : @if(isset($valumatricCen->DevideBy))((Length * Width * Height) / {{$valumatricCen->DevideBy}}) * {{$valumatricCen->MultipleBy}}@else{{'Formula Not Define !'}}@endif</p>  
                            </td>
                        </tr>
                        <tr>


                        </tr>
                    </tfoot>

                </table>
            </div>
</div>

<div class="modal-footer" style="color:green;font-weight: 600;display: flex;justify-content: flex-start;">
    <span>Total Qty :<span id="totalQty">0</span> </span><span>Total Volumetric Weight:<input type="hidden" class="cvw" id="cvw"><span id="totalVolue">0.0</span></span><span>Total Actual Weight:0.0</span>

<span id="tabelCall" style="width: 100%;"></span>
</div>
</div>
</div>
</div>
<script>
     $(document).ready(function(){
    $("#VolumaticModel").modal('show');
   
});
$( document ).ready(function() {
    var Docket='{{$docket}}';
    var base_url = '{{url('')}}';
     $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ListVolumatricWeight',
       cache: false,
       data: {
         'Docket':Docket
     },
     success: function(data) {
        var obj=JSON.parse(data);
        $('#tabelCall').html(obj.html);
        $('#totalQty').html(obj.Total.TotalQty);
        $('#totalVolue').html(obj.Total.TotalValue);
        $('.cvw').val(obj.Total.TotalValue);
      
     }
}); 
});
function addMoreVolumetric()
{
    
    if($('#Packing').val()=='')
        {
            alert('Please Select Packing');
            return false;
        }
    if($('#lenght').val()=='')
        {
            alert('Please Enter Lenght');
            return false;
        }
        if($('#width').val()=='')
        {
            alert('Please Enter Lenght');
            return false;
        }
        if($('#height').val()=='')
        {
            alert('Please Enter height');
            return false;
        }
        if($('#qty').val()=='')
        {
            alert('Please Enter Qty');
            return false;
        }
        var lenght= $('#lenght').val()
        var width= $('#width').val();
        var height=$('#height').val();
        var qty=$('#qty').val();
        var Packing = $("#Packing").val();
        if(Packing=='INCH')
        {
          var devideBy='@if(isset($valumatricInc->DevideBy)){{$valumatricInc->DevideBy}}@else{{'0'}}@endif';   
          var MultipleY='@if(isset($valumatricInc->MultipleBy)){{$valumatricInc->MultipleBy}}@else{{'0'}}@endif';
        }
        if(Packing=='CENTIMETER')
        {
            var devideBy='@if(isset($valumatricCen->DevideBy)){{$valumatricCen->DevideBy}}@else{{'0'}}@endif';   
             var MultipleY='@if(isset($valumatricCen->MultipleBy)){{$valumatricCen->MultipleBy}}@else{{'0'}}@endif';
        }
        var volu=((lenght*width*height)/devideBy)*MultipleY;
        $('.VloumeActualWeight').val(volu.toFixed(4))

}
function SubmitVolumatricWeiught()
{
    addMoreVolumetric();
    var Docket='{{$docket}}';
    var lenght= $('#lenght').val()
    var width= $('#width').val();
    var height=$('#height').val();
    var qty=$('#qty').val();
    var Packing = $("#Packing").val();
    var VloumeActualWeight = $("#VloumeActualWeight").val();
    var base_url = '{{url('')}}';
     $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/PostVolumatricWeight',
       cache: false,
       data: {
         'lenght':lenght,'width':width,'height':height,'qty':qty,'Packing':Packing,'VloumeActualWeight':VloumeActualWeight,'Docket':Docket
     },
     success: function(data) {
        $('#lenght').val('')
        $('#width').val('');
        $('#height').val('');
        $('#qty').val('');
        $("#VloumeActualWeight").val('');
        var obj=JSON.parse(data);
        $('#tabelCall').html(obj.html);
        $('#totalQty').html(obj.Total.TotalQty);
        $('#totalVolue').html(obj.Total.TotalValue);
        $('.cvw').val(obj.Total.TotalValue);
      
     }
});
}
function closeVolumaModel()
{
    var tttt=$('#cvw').val();
    var Actual='{{$ActualWeight}}';
    $('.VolumetricWeight').val(tttt);
    if(tttt >=Actual)
    {
        $('.ChargeWeight').val(tttt)
    }
    else
    {
        $('.ChargeWeight').val(Actual)
    }
    
    $('.Volumetric').focus();
    $('#VolumaticModel').modal('hide');
}
function deletethis(id,docket)
{
    var base_url = '{{url('')}}';
     $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/DeleteVolumatricWeight',
       cache: false,
       data: {
         'id':id,'Docket':docket
     },
     success: function(data) {
        var obj=JSON.parse(data);
        $('#tabelCall').html(obj.html);
    if(obj.Total !==null)
        {
         $('#totalQty').html(obj.Total.TotalQty);
         $('#totalVolue').html(obj.Total.TotalValue);
         $('.cvw').val(obj.Total.TotalValue);
        }
        else{
            $('#totalQty').html('0.0');
           $('#totalVolue').html('0.0');
           $('.cvw').val('0.0');  
        }
      
     }
});
}
</script>
