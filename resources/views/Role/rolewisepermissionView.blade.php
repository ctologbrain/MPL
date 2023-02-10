     <div class="row">
        <div class="col-12">
        <div class="tab-content">
        <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
            <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            <th width="2%">SL#</th>
            <th width="5%"><input type="checkbox" id="checkAll"> Select All</th>
            <th width="10%">Project Name</th>
            
            	
            
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($ProjectMaster as $ProjectMasters)
            <?php $i++; ?>
            <tr>
             <td>{{$i}}</td>
             <td><input type="checkbox" class="checkboxCgecked"></td>
             <td>{{$ProjectMasters->ProjectName}}</td>
            </tr>
           @endforeach
           
         </tbody>
        </table>

    <div class="row">
        <div class="col-12 text-center">
        <input type="button" value="Process" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="viewporject()">
</div>
</div>

        <h4 class="header-title nav nav-tabs nav-bordered mb-1 mt-1"></h4>
        <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th width="2%">SL#</th>
            <th width="5%"><input type="checkbox" id="checkAllsecound"> Select All</th>
            <th width="10%">Project Name</th>
            <th width="10%">Parent Menu</th>
            <th width="10%">Menu Name</th>
            
            	
            
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($MainManu as $MainManus)
            <?php $i++; ?>
            <tr>
             <td>{{$i}}</td>
             <td><input type="checkbox" class="checkboxCheckdSecound"></td>
             <td>{{$MainManus->ProjectDetails->ProjectName}}</td>  
            <td>{{$MainManus->ParentMenuDetails->ParentMenu}}</td>  
            <td>{{$MainManus->MenuName}}</td>  
           
            </tr>
           @endforeach
           
         </tbody>
        </table>  
        <div class="row">
        <div class="col-12 text-center">     
        <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="viewporject()">
        </div>
      </div>                    
    </div>
   </div>
  </div>
</div>
<script>
    $('#checkAll').click(function () {    
     $('.checkboxCgecked').prop('checked', this.checked);    
 });
$('#checkAllsecound').click(function () {    
     $('.checkboxCheckdSecound').prop('checked', this.checked);    
 });
</script>
            

