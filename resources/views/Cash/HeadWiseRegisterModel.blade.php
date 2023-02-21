<style type="text/css">
.modal-ku {
  width: 1500px;
  margin: auto;
}
</style>
<!-- Modal -->
<div class="modal fade" id="deatailedmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
          <div id="exampleModalLabel" class="modal-title" class="mb-2 col-md-3">
                 <a href="{{url('/webadmin/downloadHeadWiseRegisterDetails/'.$dr)}}" class="btn btn-primary">Download <i class="mdi mdi-download ms-1"></i></a>
          </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="overflow-x:auto;">
        <table class="table table-bordered table-centered mb-1 mt-1" style="overflow-x:auto;">
          <thead>
            <tr>
               <th style="min-width:20px;">SL#</th>
               <th style="min-width:130px;">Document</th>
                 <th style="min-width:150px;"> Company Name</th>
                 <th style="min-width:130px;"> Claim Type</th>
                <th style="min-width:130px;"> Office Name</th>
                 <th style="min-width:150px;"> Parent Expense</th>
                <th style="min-width:150px;">Expense Account</th>
               <th style="min-width:130px;">Advice Date</th>
                <th style="min-width:160px;">Advice Number</th>
              <th style="min-width:130px;">From Date</th>
             <th style="min-width:130px;">To Date</th>
             <th style="min-width:130px;">Reference No.</th>
             <th style="min-width:150px;">Reference Type</th>
              <th style="min-width:130px;">Amount</th> 
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($DetailsData as $data)
            <tr>
              <td>{{$i}}</td>
              <td>
                @if($data->Bill_Image)
                <a target="_blank" href="{{url($data->Bill_Image)}}" class="btn btn-primary">View</a>
                @else
                <a  href="javascript:void(0);" class="btn btn-primary">View</a>
                @endif
              </td>
              <td>VENTURE</td>
              <td>{{$data->AccType}}</td>
                <td>{{$data->DepoName}}</td>
                <td>{{$data->Parent}}</td>
              <td>{{$data->DebitReason}}</td>
              <td>{{$data->Date}}</td>
            <td>{{$data->AdviceNo}}</td> 
             <td>{{$data->FromDate}}</td>
              <td>{{$data->ToDate}}</td>  
              <td>{{$data->Remark}}</td>
              <td>{{$data->Reason}}</td>
              <td>{{$data->Debit}}</td>
               
            </tr>
            <?php $i++; ?>
            @endforeach

          </tbody>

        </table>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#deatailedmodal").modal("show");
</script>