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
                     <select name="office" id="office" class="form-control selectBox" tabindex="1">
                       <option value="">--select Office--</option>
                       @foreach($OfficeMaster as $offcice) 
                       <option value="{{$offcice->id}}" @if(request()->get('office') !='' && request()->get('office')==$offcice->id){{'selected'}}@endif>{{$offcice->OfficeCode}}~{{$offcice->OfficeName}}</option>
                       @endforeach
                     </select>
                   </div>

                  
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}" @endif class="form-control datepickerOne" placeholder="From Date" tabindex="2" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="todate" @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif  class="form-control datepickerOne" placeholder="To Date" tabindex="3" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            
          <th style="min-width:40px;" class="p-1">SL#</th>
          <th style="min-width:130px;" class="p-1">DSR No</th>
          <th style="min-width:130px;"  class="p-1">Office</th>	
          <th style="min-width:130px;"  class="p-1">Delivery Date 	</th>
         
            
           
            <th style="min-width:190px;"  class="p-1">Vehcile Details</th>	
           	
            <th style="min-width:230px;"  class="p-1">Delivery Boy Name  & Phone</th>
            <th style="min-width:130px;"  class="p-1">RFQ Number</th>
            <th style="min-width:180px;"  class="p-1">Market Hire Amount</th>
            <th style="min-width:130px;"  class="p-1">Driver Name</th>
            <th style="min-width:130px;"  class="p-1">Open Km</th>     
             <th style="min-width:130px;"  class="p-1">Mobile No.</th>   
              <th style="min-width:130px;"  class="p-1">Supervisor</th>  

               <th style="min-width:130px;"  class="p-1">DRS</th>
               <th style="min-width:130px;"  class="p-1">Act Wt.</th>
               <th style="min-width:130px;"  class="p-1">Chrg Wt.</th>
               <th style="min-width:130px;"  class="p-1">NDR</th>
               <th style="min-width:130px;"  class="p-1">RTO</th>
               <th style="min-width:130px;"  class="p-1">Deliverd</th>
               <th style="min-width:130px;"  class="p-1">Panding</th> 		
            	
            
         
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
            @foreach($DsrData as $key)
            <?php $i++;
              if($key->Vehcile_Type==0){
                $vehicle='';
             }
             elseif($key->Vehcile_Type==1){
                $vehicle='SELF';
             }
             elseif($key->Vehcile_Type==2){
                 $vehicle='VENDOR';
             }
             elseif($key->Vehcile_Type==3){
                 $vehicle='MARKET VEHICLE';
             }
             elseif($key->Vehcile_Type==4){
                 $vehicle='VEHICLE RFQ';
             }
             
            ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"><a href="{{url('PrintDRSEntry').'/'.$key->DRS_No}}" target="_blank"> {{$key->DRS_No}} </a></td>
             <td  class="p-1">{{$key->OfficeCode}}~{{$key->OfficeName}}</td>
             <td  class="p-1">@isset($key->Delivery_Date) {{date('d-m-Y', strtotime($key->Delivery_Date))}} @endisset </td>
            
             
             
             <td  class="p-1">{{$key->VehicleNo}} @if(isset($vehicle) && $vehicle!='') ({{$vehicle}})  @endif </td>
           
             <td  class="p-1">{{$key->EmployeeCode}}~{{$key->EmployeeName}} ({{$key->OfficeMobileNo}})</td>
             <td  class="p-1">{{$key->RFQ_Number}}</td>
          
             <td  class="p-1">{{$key->Market_Hire_Amount}}</td>
             <td  class="p-1">{{$key->DriverName}}</td>
             <td  class="p-1">{{$key->OpenKm}}</td>
             <td  class="p-1">{{$key->Mob}}</td>
             <td  class="p-1">{{$key->Supervisor}}</td>
             <?php $TotDock= DB::table("DRS_Transactions")->where("DRS_No",$key->ID)->get()->toArray(); ?>
             <td>@isset($key->TotalDRS)<a href="{{url('DRSReportDetails/').'/'.$key->ID}}" target="_blank"> @if(!empty($TotDock)) {{count(array_unique(array_column($TotDock,"Docket_No")))}} @endif</a> @endisset</td>
            
            <?php  
            $Docket = array_unique(array_column($TotDock,"Docket_No"));
                $dockId=  DB::table("docket_masters")->whereIn("Docket_No",$Docket)->get()->toArray();
                $id = array_column($dockId,"id");
                $dockProduct= DB::table("docket_product_details")->select(DB::raw("SUM(docket_product_details.Actual_Weight) as TotActWt"),
                DB::raw("SUM(docket_product_details.Charged_Weight) as TotChrgWt"))->whereIn("Docket_Id",$id)->groupBy("Docket_Id")->first();
            ?>
             <td  class="p-1"> @if(isset($dockProduct->TotActWt)){{ $dockProduct->TotActWt}}  @endif</td>
             <td  class="p-1"> @if(isset($dockProduct->TotChrgWt)){{ $dockProduct->TotChrgWt}}  @endif</td>
            
           
             <td  class="p-1"> <a href="{{url('NDRReportDetails/').'/'.$key->ID}}" target="_blank">@if(isset($key->TotNDR)) {{$key->TotNDR}}  @else  0  @endif </a></td>

             <td  class="p-1">  <a href="{{url('RTOReportDetails/').'/'.$key->ID}}" target="_blank">@if(isset($key->TotRTO)){{ $key->TotRTO}}  @else  0  @endif </a></td>
             <td  class="p-1"> <a href="{{url('DELVReportDetails/').'/'.$key->ID}}" target="_blank"> @if(isset($key->TotalDel)) {{$key->TotalDel}} @else  0 @endif </a></td>
             <td  class="p-1"><a href="{{url('DRSReportDetails/').'/'.$key->ID.'/Pending'}}" target="_blank">  <?php
             if(isset($key->TotalDel)){
             $totalDELv= $key->TotalDel;
             }
             else{
                $totalDELv=0;
             }
              $panding= intval(count(array_unique(array_column($TotDock,"Docket_No"))))-intval($totalDELv);?>
             {{ $panding}}
             </a> </td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $DsrData->appends(Request::all())->links() !!}
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
      $('.selectBox').select2();

 
</script>