<table class="table table-bordered table-centered mb-1 mt-1">
    <thead>
        <tr style="background-color:#ddd;">

        <th style="width: 2%;">SL#</th>
        <th style="width: 8%;">AWB Number</th>
        <th style="width: 8%;">Type    </th>
        <th style="width: 7%;">Actual Pcs*</th>
        <th style="width: 8%;">Delivery Pcs*</th>
        <th style="width: 8%;">Weight*</th>
        <th style="width: 8%;">Time*</th>   
        <th style="width: 8%;">Proof Name*</th>    
        <th style="width: 10%;">Reciever Name</th>   
        <th style="width: 8%;">Phone</th> 
        <th style="width: 8%;">Proof Detail</th> 
        <th style="width: 8%;">NDR Reason</th>  
        <th style="width: 14%;">NDR Remarks</th>    




        </tr>
    </thead>
    <tbody>
    <?php $i=0; ?>
        @foreach($docketData as $Docket)
        <?php $i++; ?>
        <tr>
        <td>{{$i}}</td>
        <td><input type="text" class="form-control awb_number" name="docket[{{$i}}][docket]" id="awb_number" tabindex="5" value="{{$Docket->Docket_No}}"></td>
            <td>
                <select name="docket[{{$i}}][type]" tabindex="6" class="form-control selectBox type" id="type">
                    <option value="">--select--</option>

                    <option>DELIVERED</option>
                    <option>NDR</option>


                </select>
            </td>
            <td><input type="text" class="form-control actual_pieces" name="docket[{{$i}}][actual_pieces]" id="actual_pieces"
                    tabindex="7" value="{{$Docket->pieces}}"></td>
            <td><input type="text" class="form-control delievery_pieces" name="docket[{{$i}}][delievery_pieces]" id="delievery_pieces"
                    tabindex="8"></td>
            <td><input type="text" class="form-control weight" name="docket[{{$i}}][weight]" id="weight" tabindex="9"></td>
            <td><input type="text" class="form-control time datepickerOne" name="docket[{{$i}}][time]" id="time" tabindex="10"></td>
            <td><select name="docket[{{$i}}][proof_name]" tabindex="11" class="form-control selectBox type" id="type">
                    <option value="">--select--</option>
                    @foreach($dproof as $proof)
                    <option value="{{$proof->id}}">{{$proof->ProofName}}</option>
                    @endforeach
                  </select></td>
            <td><input type="text" class="form-control reciever_name" name="docket[{{$i}}][reciever_name]" id="reciever_name"
                    tabindex="12"></td>
            <td><input type="number" class="form-control phone" name="docket[{{$i}}][phone]" id="phone" tabindex="13"></td>
            <td><input type="text" class="form-control proof_detail" name="docket[{{$i}}][proof_detail]" id="proof_detail"
                    tabindex="14"></td>
            <td>
                <select name="docket[{{$i}}][ndr_reason]" tabindex="15" class="form-control selectBox ndr_reason" id="ndr_reason">
                    <option value="">--select--</option>
                     @foreach($ndr as $ndrMaster)
                    <option value="{{$ndrMaster->id}}">{{$ndrMaster->ReasonDetail}}</option>
                    @endforeach
                  


                </select>
            </td>
            <td><input type="text" class="form-control ndr_remark" name="docket[{{$i}}][ndr_remark]" id="ndr_remark" tabindex="16"></td>

        </tr>
       
      
       @endforeach
       <tr>
            <td colspan="13" class="text-end">


                <input id="Save" type="submit" class="btn btn-primary" value="Save">
                &nbsp;
                <a href="#" id="cancel" type="button" class="btn btn-primary">Cancel</a>



            </td>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });