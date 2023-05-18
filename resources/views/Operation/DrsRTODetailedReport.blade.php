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
            
                    <div class="table-responsive a"> 
               <table class="table table-bordered table-centered mb-1 mt-1">
                <thead>
                <tr class="main-title text-dark">
                    
                <th style="min-width:130px;" class="p-1">SL#</th>
                <th style="min-width:130px;" class="p-1">Docket No</th>
                <th style="min-width:130px;" class="p-1">DSR No</th>
                <th style="min-width:130px;"  class="p-1">Office</th>	
                <th style="min-width:130px;"  class="p-1">Delivery Date 	</th>
         
            
           
            <th style="min-width:130px;"  class="p-1">Vehcile Details</th>	
           	
            <th style="min-width:200px;"  class="p-1">Delivery Boy Name  & Phone</th>
            <th style="min-width:130px;"  class="p-1">Origin</th>	
            <th style="min-width:130px;"  class="p-1">Destination</th>	

            <th style="min-width:130px;"  class="p-1">RTO Date</th>	
            <th style="min-width:130px;"  class="p-1">RTO REASON</th>	

            <th style="min-width:130px;"  class="p-1">RFQ Number</th>
            <th style="min-width:180px;"  class="p-1">Market Hire Amount</th>
            <th style="min-width:130px;"  class="p-1">Driver Name</th>
            <th style="min-width:130px;"  class="p-1">Open Km</th>     
             <th style="min-width:130px;"  class="p-1">Mobile No.</th>   
              <th style="min-width:130px;"  class="p-1">Supervisor</th>  
              <th style="min-width:130px;"  class="p-1">Vendor</th> 

               <th style="min-width:130px;"  class="p-1">Act Wt.</th>
               <th style="min-width:130px;"  class="p-1">Chrg Wt.</th>
               <th style="min-width:130px;"  class="p-1">Sale Type</th>
               <th style="min-width:130px;"  class="p-1">Current Status</th>
               <th style="min-width:130px;"  class="p-1">Status date</th>
               <th style="min-width:130px;"  class="p-1">Pieces</th> 		
            	
            
         
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
             <td class="p-1">@isset($key->Docket_No) <a target="_blank" href="{{url('docketTracking?docket=').$key->Docket_No}}"> {{$key->Docket_No}} @endisset</td>
             <td class="p-1"> {{$key->DRS_No}}</td>
             <td  class="p-1">{{$key->DoffCode}}~{{$key->DoffName}}</td>
             <td  class="p-1">@isset($key->Delivery_Date) {{date('d-m-Y', strtotime($key->Delivery_Date))}} @endisset </td>
            
             
             
             <td  class="p-1">{{$key->VehicleNo}} @if(isset($vehicle) && $vehicle!='') ({{$vehicle}})  @endif </td>
           
             <td  class="p-1">{{$key->EmployeeCode}}~{{$key->EmployeeName}} ({{$key->OfficeMobileNo}})</td>

             <td  class="p-1">{{$key->ORGCode}}~ {{$key->ORGCityName}}</td>
             <td  class="p-1">{{$key->DESTCityCode}}~  {{$key->DESTCityName}}</td>
             
             <td  class="p-1">{{date("d-m-Y",strtotime($key->RTO_Date))}}</td>
             <td  class="p-1">{{$key->ReasonDetail}}</td>

             <td  class="p-1">{{$key->RFQ_Number}}</td>
          
             <td  class="p-1">{{$key->Market_Hire_Amount}}</td>
             <td  class="p-1">{{$key->DriverName}}</td>
             <td  class="p-1">{{$key->OpenKm}}</td>
             <td  class="p-1">{{$key->Mob}}</td>
             <td  class="p-1">{{$key->Supervisor}}</td>

             <td  class="p-1">@isset($key->VendorCode ) {{$key->VendorCode }} ~
             {{$key->VendorName }} @endisset</td>
             

             <td  class="p-1"> @if(isset($key->Actual_Weight)){{ $key->Actual_Weight}}  @endif</td>
             <td  class="p-1"> @if(isset($key->Charged_Weight)){{$key->Charged_Weight}}  @endif</td>
            
           
             <td  class="p-1"> @if(isset($key->BookingType)){{$key->BookingType}} @endif </td>

             <td  class="p-1"> @if(isset($key->title)){{$key->title}}   @endif </td>
             <td  class="p-1">  @if(isset($key->BookDate)) {{$key->BookDate}} @endif </td>
             <td  class="p-1"> 
                    @if(isset($key->Qty))   {{$key->Qty}} @endisset
              </td>
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