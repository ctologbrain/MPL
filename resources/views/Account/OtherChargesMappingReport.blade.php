@include('layouts.appThree')
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
                   <input type="text" name="formDate"   @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}" @endif class="form-control datepickerOne" placeholder="From Date" tabindex="1">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}" @endif   class="form-control datepickerOne" placeholder="To Date" tabindex="2">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="3">Search</button>
                          </div> 
                    </form>
                    <div class="col-12">
                    <div class="table-responsive a">
               <table class="table table-responsive  table-bordered ">
           <thead>
            <tr class="main-title text-dark">
                <th class="p-1" style="min-width:90px;">SL#</th><th class="p-1" style="min-width:130px;">Customer Name</th><th class="p-1" style="min-width:130px;">Load Type</th><th class="p-1" style="min-width:130px;">Origin City</th><th class="p-1" style="min-width:130px;">Destination City</th><th class="p-1" style="min-width:130px;">Charge Name</th><th class="p-1" style="min-width:130px;">W.E. From</th><th class="p-1" style="min-width:130px;">W.E. To</th><th class="p-1" style="min-width:130px;">Charge Type</th><th class="p-1" style="min-width:130px;">Minimum Amount</th><th class="p-1" style="min-width:130px;">Range Type</th><th style="min-width:130px;">Range From</th><th class="p-1" style="min-width:130px;">Range To</th><th class="p-1" style="min-width:130px;">FS On Freight</th><th class="p-1"  style="min-width:130px;">FS On Charges</th><th  class="p-1" style="min-width:130px;">Active</th><th class="p-1"  style="min-width:130px;">Updated By</th><th class="p-1" style="min-width:130px;">Updated On
        </th>
        <tr>
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
            @foreach($report as $key)
            <?php $i++; 
            if($key->Charge_Type==1)
            {
               $chargeTpe='%'; 
            }
            else{
                $chargeTpe='AMOUNT';   
            }

            ?>
            <tr>
               <td class="p-1">{{$i}}</td>
              <td class="p-1">{{$key->CustomerDataDetails->CustomerCode}}~{{$key->CustomerDataDetails->CustomerName}}</td>
               <td class="p-1">{{'CONSOLE'}}</td>
                <td class="p-1">@isset($key->OriginDataDetails->CityName) {{$key->OriginDataDetails->CityName}} @endisset</td>
              <td class="p-1">@isset($key->DestDataDetails->CityName) {{$key->DestDataDetails->CityName}} @endisset</td>
              <td class="p-1"> @isset($key->ChargeDataDetails->Title) {{$key->ChargeDataDetails->Title}} @endisset</td>
              <td class="p-1">{{date("d-m-Y",strtotime($key->Date_From))}}</td>
                <td class="p-1">{{date("d-m-Y",strtotime($key->Date_To))}}</td>
              <td class="p-1">{{$chargeTpe}}</td>
              <td class="p-1">{{$key->Min_Amt}}</td>
              <td class="p-1">@isset($key->ChargeTypeDeatils->Title) {{$key->ChargeTypeDeatils->Title}} @endisset</td>
                <td class="p-1">{{$key->Range_From}}</td>
              <td class="p-1">{{$key->Range_To}}</td>
              <td class="p-1">{{$key->FS_Freight}}</td>
              <td class="p-1">{{$key->FS_Charge}}</td>
                <td class="p-1">{{'YES'}}</td>
                <td class="p-1"> @isset($key->UserDetail->name){{$key->UserDetail->name}} @endisset</td>
               <td class="p-1">@isset($key->Updated_At) {{date("d-m-Y H:i:s",strtotime($key->Updated_At))}} @endisset</td>

            </tr>
            @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $report->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
       todayHighlight: true
      });



 
</script>