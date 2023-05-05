@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title nav nav-tabs nav-bordered mb-3"></h4>
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>Success - </strong> {{ session('status','') }}
                    </div>
                    @endif
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Country Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control CountryName" name="CountryName"
                                        id="CountryName">
                                    <input type="hidden" tabindex="1" class="form-control Cid" name="Cid" id="Cid">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Currency Name<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="2" class="form-control CurrencyName"
                                        name="CurrencyName" id="CurrencyName">

                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-4   ">
                                    <label for="example-select" class="form-label">International</label><br>
                                    <input type="checkbox" id="International" name="International" value="International"
                                        class="International" tabindex="3">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddCountry()" tabindex="4">
                                    <a href="{{url('ViewCountry')}}" class="btn btn-primary" tabindex="5">Cancel</a>
                                </div>
                                <h4 class="header-title nav nav-tabs nav-bordered"></h4>
                                
                            </div>
                        </div>
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
      <div class="row pl-pt mt-1">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="6">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="7">Search</button>
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
          <th width="2%" class="p-1">ACTION</th>
        <th width="2%" class="p-1">SL#</th>
        <th width="10%" class="p-1">Country Name</th>
        <th width="10%" class="p-1">Currency Name</th>
        <th width="10%" class="p-1">International</th>
         
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
        @foreach($Country as $crt)
        <?php $i++; ?>
        <tr>
            <td class="p-1"><a href="javascript:void(0)"
                    onclick="ViewCountry('{{$crt->id}}')">View </a>/ <a
                    href="javascript:void(0)"
                    onclick="EditCountry('{{$crt->id}}')">Edit</a></td>
            <td class="p-1">{{$i}}</td>
            <td class="p-1">{{$crt->CountryName}}</td>
            <td class="p-1">{{$crt->CurrencyName}}</td>
            <td class="p-1">{{$crt->International}}</td>
        </tr>
        @endforeach
    </tbody>
        </table>
        <div class="d-flex d-flex justify-content-between">
        {{ $Country->appends(Request::except('page'))->links() }}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
            <script type="text/javascript">
            $('.datepickerOne').datepicker({
                dateFormat: 'yy-mm-dd'
            });

            function AddCountry() {
                if ($('#CountryName').val() == '') {
                    alert('please Enter Country Name');
                    return false;
                }
                if ($('#CurrencyName').val() == '') {
                    alert('please Enter Currency Name');
                    return false;
                }
                var CountryName = $('#CountryName').val();
                var CurrencyName = $('#CurrencyName').val();
                var International = $("input[name=International]:checked").val();
                var Cid = $('#Cid').val();
                $(".btnSubmit").attr("disabled", true);
                var base_url = '{{url('')}}';
                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                    url: base_url + '/AddCountry',
                    cache: false,
                    data: {
                        'CountryName': CountryName,
                        'CurrencyName': CurrencyName,
                        'International': International,
                        'Cid': Cid
                    },
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                });
            }

            function ViewCountry(id) {
                var base_url = '{{url('')}}';
                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                    url: base_url + '/EditCountry',
                    cache: false,
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        const obj = JSON.parse(data);
                        $('.CountryName').val(obj.CountryName);
                        $('.CountryName').attr('readonly', true);
                        $('.CurrencyName').val(obj.CurrencyName);
                        $('.CurrencyName').attr('readonly', true);
                        if (obj.International == 'Yes') {
                            $('.International').prop('checked', true);
                        } else {
                            $('.International').prop('checked', false);
                        }
                        $('.International').attr('disabled', true);

                    }
                });
            }

            function EditCountry(id) {
                var base_url = '{{url('')}}';
                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                    url: base_url + '/EditCountry',
                    cache: false,
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        const obj = JSON.parse(data);
                        $('.CountryName').val(obj.CountryName);
                        $('.CountryName').attr('readonly', false);
                        $('.Cid').val(obj.id);
                        $('.CurrencyName').val(obj.CurrencyName);
                        $('.CurrencyName').attr('readonly', false);
                        if (obj.International == 'Yes') {
                            $('.International').prop('checked', true);
                        } else {
                            $('.International').prop('checked', false);
                            
                        }
                        $('.International').attr('disabled', false);
                    }
                });
            }
            </script>