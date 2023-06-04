@include('layouts.app')
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
                   <input type="text" name="formDate" class="form-control datepickerOne" placeholder="From Date">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input type="text" name="formDate" class="form-control datepickerOne" placeholder="To Date">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Submit</button>
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th width="2%">SL#</th>
            <th width="5%">Docket</th>
            <th width="10%">Parent Office</th>
            <th width="10%">Branch Office</th>
            <th width="10%">Issue Date</th>
            <th width="8%">Book Date</th>	
            <th width="8%">Status</th>	
            <th width="10%">Remark</th>	
            <th width="10%">Attachment</th>	
            	
            
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($docket as $docketList)
            <?php $i++; ?>
            <tr>
             <td>{{$i}}</td>
             <td>{{$docketList->Docket_No}}</td>
             <td>{{$docketList->ParentOffcieCode}} ~ {{$docketList->ParentOfficeName}}</td>
             <td>{{$docketList->OfficeCode}} ~ {{$docketList->OfficeName}}</td>
             <td>{{$docketList->IssueDate}}</td>
             <td>{{$docketList->BookDate}}</td>
             <td>{{$docketList->title}}
             
             </td>
             <td>{{$docketList->Remark}}</td>
             <td> @if(isset($docketList->file))
              <br>
              <a href="{{url($docketList->file)}}" target="_blank">Dowbload</a>
              @endif</td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
        <div class="d-flex d-flex justify-content-between">
        {!! $docket->appends(Request::all())->links() !!}
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