@include('layouts.appTwo')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
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
                    <div class="row pl-pr mt-1">
                   <div class="mb-2 col-md-2">
                   <input type="text" name="search"  value="{{ request()->get('search') }}" class="form-control " placeholder="Gatepass No.">
                   </div>
                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate" @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif class="form-control datepickerOne" placeholder="From Date" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate"  @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif class="form-control datepickerOne" placeholder="To Date" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:230px;" class="p-1">Gatepass Recieving Type</th>	
            <th style="min-width:130px;" class="p-1">Recieving Office</th>	
            <th style="min-width:130px;" class="p-1">Recieving Date	</th>
            <th style="min-width:130px;" class="p-1">Supervisor</th>	
            <th style="min-width:130px;" class="p-1">Docket</th>	
            <th style="min-width:130px;" class="p-1">Gatepass No.</th>
            <th style="min-width:180px;" class="p-1">Recieving Qty</th>
            <th style="min-width:130px;" class="p-1">Pending Qty</th>
            <th style="min-width:130px;" class="p-1">Remark</th>   
           </tr>
         </thead>
         <tbody>
            <?php $i=0; 
            $page=request()->get('page');
            if(isset($page) && $page>1){
                $page =$page-1;
            $i = intval($page*10);
            }
             else{
            $i=0;
            }
            ?>
            @foreach($gatepassReceived as $key)
             <?php 
             $i++; ?>
            <tr>


             <td class="p-1">{{$i}}</td>
             
             <td class="p-1">{{($key->Gp_Rcv_Type==1)?'Docket':'Document'}}</td>
              <td class="p-1">{{$key->GetPassReciveDet->OfficeName}}</td>
             <td class="p-1">{{$key->Rcv_Date}}</td>
             <td class="p-1">{{$key->Supervisor}}</td>
          
             <td class="p-1">{{isset($key->GetDocketDataDet->Docket_No)?$key->TotDock:''}}</td>
             <td class="p-1">{{$key->GetVehicleGatepassDet->GP_Number}}</td>
             <td class="p-1">{{isset($key->total_dock)?$key->total_dock:''}}</td>
             <td class="p-1">{{isset($key->total_dockPending)?$key->GetDocketDataDet->total_dockPending:''}}</td>
             <td class="p-1">{{$key->Remark}}</td>
             

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
      autoclose: true,
       todayHighlight: true
      });
    
</script>