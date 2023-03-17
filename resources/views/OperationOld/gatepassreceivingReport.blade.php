@include('layouts.appTwo')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
        </div>
    </div>
    <!-- end card-->
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row">
                   <div class="mb-2 col-md-2">
                   <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control " placeholder="Gatepass No.">
                   </div>
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  value="{{ request()->get('formDate') }}" class="form-control datepickerOne" placeholder="From Date">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" value="{{ request()->get('todate') }}" class="form-control datepickerOne" placeholder="To Date">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th style="min-width:100px;">SL#</th>
            <th style="min-width:230px;">Gatepass Recieving Type</th>	
            <th style="min-width:130px;">Recieving Office</th>	
            <th style="min-width:130px;">Recieving Date	</th>
            <th style="min-width:130px;">Supervisor</th>	
            <th style="min-width:130px;">Docket</th>	
            <th style="min-width:130px;">Gatepass No.</th>
            <th style="min-width:180px;">Recieving Qty</th>
            <th style="min-width:130px;">Pending Qty</th>
            <th style="min-width:130px;">Remark</th>   
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($gatepassReceived as $key)
             <?php 
             $i++; ?>
            <tr>


             <td>{{$i}}</td>
             
             <td>{{($key->Gp_Rcv_Type==1)?'Docket':'Document'}}</td>
              <td>{{$key->GetPassReciveDet->OfficeName}}</td>
             <td>{{$key->Rcv_Date}}</td>
             <td>{{$key->Supervisor}}</td>
          
             <td>{{$key->Docket}}</td>
             <td>{{$key->GetVehicleGatepassDet->GP_Number}}</td>
             <td>{{$key->Rcv_Qty}}</td>
             <td>{{$key->PendingQty}}</td>
             <td>{{$key->Remark}}</td>
             

             <!-- remove -->
            
           
             
           </tr>
           @endforeach
           
         </tbody>
        </table>
    </div>
        <div class="d-flex d-flex justify-content-between">
        {!! $gatepassReceived->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });

 
</script>