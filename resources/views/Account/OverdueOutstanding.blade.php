@include('layouts.appThree')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
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
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                


            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
        
          <th style="min-width:20px;" class="p-1">SL#</th>
          <th style="min-width:180px;" class="p-1">Customer</th>
          <th style="min-width:180px;" class="p-1">Invoice Date	</th>
          <th style="min-width:160px;" class="p-1">Billing Period	</th>
          <th style="min-width:160px;" class="p-1">Invoice No.	</th>
          <th style="min-width:100px;" class="p-1">Total Amount</th>
         
          
           </tr>
         </thead>
         <tbody>
         <?php $i=0; ?>
        
            @foreach($invData as $inv)
            <?php $i++; ?>
            <tr>
               
                <td class="p-1">{{$i}}</td>
                <td class="p-1">{{$inv->customerDetails->CustomerName}}</td>
                <td class="p-1">{{date("Y-m-d",strtotime($inv->InvDate))}}</td>
                <td class="p-1">{{date("Y-m-d",strtotime($inv->FormDate))}} to {{date("Y-m-d",strtotime($inv->ToDate))}}</td>
                 <td class="p-1"><a href="{{url('printInvoiceTex/'.$inv->InvNo)}}" target="_blank">{{$inv->InvNo}}</a></td>
                <td class="p-1">{{$inv->TotalAmount}}</td>
               
                
           </tr>
            @endforeach
            
          
        </tbody>
        </table>
       </div>
</form>
       
<div class="d-flex d-flex justify-content-between">
        {{ $invData->appends(Request::except('page'))->links() }}
        </div>   
        </div> <!-- end col -->
      

    </div>
</div>
</div>
</div>
                   </div> 
