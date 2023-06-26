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
                    <div class="row p-1">
                   
                    <div class="mb-2 col-md-2">
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select Office--</option>
                        @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option >
                       @endforeach
                     </select>
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-3">
                     <select name="status" id="status" class="form-control selectBox" tabindex="1" style="min-width:160px;">
                       <option value="">--Report Type--</option>
                       <option value="DEPARTURE" @if(request()->get('status')!='' && request()->get('status')=="DEPARTURE") selected @endif>DEPARTURE</option> 
                       <option value="ARRIVAL" @if(request()->get('status')!='' && request()->get('status')=="ARRIVAL") selected @endif>ARRIVAL</option> 
                      
                     </select>
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('VehicleArrivalDepartureReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                           <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="6">
                          </div> 
                          
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$Report->total()}}</span></div>   
                    
                    </div>
                    </div>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">HUB Name </th>
            <th style="min-width:150px;" class="p-1">Location name</th>
            <th style="min-width:160px;" class="p-1">Scheduled </th>
           
            <th style="min-width:130px;" class="p-1">Actual</th>	
            <th style="min-width:160px;" class="p-1">Status</th>	
            <th style="min-width:260px;" class="p-1">Route</th>
            <th style="min-width:160px;" class="p-1">Vehicle Capacity</th>	
            <th style="min-width:160px;" class="p-1">Ideal Capacity</th>	
            <th style="min-width:160px;" class="p-1">Percentage Of Ontime Vehicle</th>	
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
            @foreach($Report as $key)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1">@isset($key->OfficeCode) 
                {{$key->OfficeCode}} ~ {{$key->OfficeName}} @endisset</td>

             <td class="p-1">@isset($key->Location) {{$key->Location}} @endisset</td>
             <td class="p-1">{{date("H:i",strtotime($key->Reporting_Time))}}</td>
             <td class="p-1"> {{date("H:i",strtotime($key->GP_TIME))}}</td>
             <td class="p-1"></td>
             <td class="p-1">{{$key->Location}}  @isset($key->TouchCity) -{{$key->TouchCity}} @endisset -{{$key->DCity}} </td>
             <td class="p-1"> {{$key->Capacity}} </td>
             <td class="p-1"></td>
             <td class="p-1"></td>
            
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $Report->appends(Request::all())->links() !!}
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
     
    $(".selectBox").select2();
 
</script>