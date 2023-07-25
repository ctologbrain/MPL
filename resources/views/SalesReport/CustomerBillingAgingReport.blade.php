@include('layouts.appThree')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sales</a></li>
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
                    <div class="col-12"> 
                    <div class="row">
                    <div class="col-3 mt-1">
                     <h5>Total RECORD: {{$data->Total()}} </h5>
                    </div>
                    <div class="col-8 text-end mt-1">
                     <a href="" class="btn btn-primary text-white">Download</a> 
                     </div>
                     </div> 
                     </div>

                     <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row p-1">
                    



                    <div class="mb-2 col-md-2">
                     <select name="ParentCust" id="ParentCust" class="form-control selectBox" tabindex="1">
                       <option value="">--select Parent Customer--</option>
                        @foreach($ParentCustomer as $key) 
                       <option value="{{$key->id}}" @if(request()->get('ParentCust') !='' && request()->get('ParentCust')==$key->id){{'selected'}}@endif>{{$key->CustomerCode}}~{{$key->CustomerName}}</option >
                       @endforeach
                     </select>
                   </div>

                   <div class="mb-2 col-md-2">
                     <select name="Customer" id="Customer" class="form-control selectBox" tabindex="1">
                       <option value="">--Select Customer--</option>
                        @foreach($Cust as $key) 
                       <option value="{{$key->id}}" @if(request()->get('Customer') !='' && request()->get('Customer')==$key->id){{'selected'}}@endif>{{$key->CustomerCode}}~{{$key->CustomerName}}</option >
                       @endforeach
                     </select>
                   </div>

                        <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="4">Search</button>
                           <a href="{{url('CustomerBillingAgingReport')}}"  class="btn btn-primary" tabindex="5">Reset</a>
                          </div> 
                          
                    </form>
                    <div class="col-12">

                    <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th class="p-1" style="width:250px;">Customer Name</th>
            <th class="p-1"><=15</th>
            <th class="p-1">16-30</th>
            <th class="p-1">31-45</th>
            <th class="p-1">46-60</th>
            <th class="p-1">61-90</th>
            <th class="p-1">>90</th>
            <th class="p-1">Total</th>
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
            @foreach($data as $key)
             <?php 
             $i++; ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"><a href="{{url('BillingAgingReport?Customer=').$key->Cust_Id}}" target="_blank">{{$key->CustomerName}}</a></td>
            <td class="p-1">{{$key->lessthen15}}</td>
            <td class="p-1">  {{$key->SixteentoThirtyOne}}</td>
            <td class="p-1">{{$key->ThirtyOneto45}} </td>
            <td class="p-1">{{$key->FourtyFiveto60}}</td>
            <td class="p-1">{{$key->Nintyto61}}</td>
            <td class="p-1">{{$key->greatedThennin}}</td>
            <td class="p-1">{{$key->LessEqalFifteen+$key->SixteenToThrty+$key->ThrtyOneToFortyFive+$key->FortyFiveToSixty+$key->SixtyToninty+$key->aboveNinty+$key->greatedThennin}}</td>
                                                                           
                                                                              
           </tr>
           @endforeach
           
         </tbody>
        </table>
</div>
</div>
        <div class="d-flex d-flex justify-content-between">
       {!! $data->appends(Request::all())->links() !!}
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