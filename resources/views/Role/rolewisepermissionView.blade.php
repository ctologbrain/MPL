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
            @foreach($ProjectMaster as $ProjectMasters)
            <?php $i++; ?>
            <tr>
             <td>{{$i}}</td>
             <td><input type="checkbox" class="checkboxValue checkboxCgecked" name="Project[]" value="{{$ProjectMasters->id}}" @if(isset($project) && in_array($ProjectMasters->id,$project)){{'checked'}}@endif></td>
             <td>{{$ProjectMasters->ProjectName}}</td>
            </tr>
           @endforeach
           
         </tbody>
        </table>

    <div class="row">
        <div class="col-12 text-center">
        <input type="button" value="Process" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="AddAdminProject()">
</div>
</div>

        <h4 class="header-title nav nav-tabs nav-bordered mb-1 mt-1"></h4>
       <div calss="row"><div class="col-4"> <input class="form-control" type="text" id="myInput" onkeyup="SearchFilter()" placeholder="Search for names.." title="Type in a name"> </div></div>

        <table class="table table-bordered table-centered mb-1 mt-1" id="myTable" >
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
             <td><input type="checkbox" class="checkboxCheckdSecound" value="{{$MainManus->id}}" @if(isset($menu) && in_array($MainManus->id,$menu)){{'checked'}}@endif></td>
             <td >{{$MainManus->ProjectDetails->ProjectName}}</td>  
            <td>{{$MainManus->ParentMenuDetails->ParentMenu}}</td>  
            <td>{{$MainManus->MenuName}}</td>  
           
            </tr>
           @endforeach
           
         </tbody>
        </table>  
        <div class="row">
        <div class="col-12 text-center">     
        <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="AddAdminMenu()">
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
 function AddAdminProject()
 {
  var RoleName=$('#RoleName').val();
 var arr = [];
  var i = 0;
  $('.checkboxValue:checked').each(function () {
           arr[i++] = $(this).val();
       });
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddRoleAndProject',
        cache: false,
        data: {
            'project':arr,'RoleName':RoleName
          },
        success: function(data) {
          alert('Update Sucessfully');
          return false;
         //$('.viewInner').html(data);
        }
    });
 }
 function AddAdminMenu()
 {
  var RoleName=$('#RoleName').val();
 var arr = [];
  var i = 0;
  $('.checkboxCheckdSecound:checked').each(function () {
           arr[i++] = $(this).val();
       });
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/AddRoleAndMenu',
        cache: false,
        data: {
            'menu':arr,'RoleName':RoleName
          },
        success: function(data) {
          alert('Update Sucessfully');
          return false;
         //$('.viewInner').html(data);
        }
    });
 }

 function SearchFilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
            

