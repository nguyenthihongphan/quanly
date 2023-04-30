
@include('layout.header')
@include('layout.sidebar')
@php
$type='text';
@endphp
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">User>@lang('messages.listUsers')>@lang('messages.adduser')</h3>
                  </div>               
              </div>
            </div>
          </div>         
           <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="col-sm-8"><b>@lang('messages.adduser')</b></div>
                 <div>
  <x-alert/>
    <br />
          <form class="form-horizontal" id="validation" method="POST" action="{{ route('store') }}" enctype="multipart/form-data" novalidate >
              @csrf
              <div class="form-group">
                        <div class="text-danger" id="tb" style="text-align: center;"></div>
                    </div>
          <div class="form-group">
              <label class="control-label col-sm-2" for="firstname">@lang('messages.firstname')</label>
              <div class="col-sm-10">
              <input name="firstname" data-label="firstname"  class="form-control error" id="firstname" placeholder="@lang('messages.firstname')">
               <div><span id="error-firstname" class="text-danger"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="lastname">@lang('messages.lastname')</label>
              <div class="col-sm-10">
              <input class="form-control error " name="lastname" data-label="lastname" id="lastname" placeholder="@lang('messages.lastname')">
              <div><span id="error-lastname" class="text-danger"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">@lang('messages.email')</label>
              <div class="col-sm-10">
              <input type="email" id="email" data-label="email" class="form-control" @error('email') is-invalid @enderror name="email" id="email" placeholder="Email">
               <div><span id="error-email" class="text-danger"></span></div>
              
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="password">@lang('messages.password')</label>
              <div class="col-sm-10">
              <input type="password"data-label="password"onblur="checkpassword()"  class="form-control error" name="password" id="password" placeholder="@lang('messages.password')">
              <div><span id="error-password" class="text-danger"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="re-password">@lang('messages.repassword')</label>
              <div class="col-sm-10">
             <input type="password" class="form-control error" onblur="checkrepassword()" name="repassword" id="repassword" placeholder="@lang('messages.repassword')">
              <div><span id="error-repassword" class="text-danger"></span></div>
              </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="role">@lang('messages.role')</label>
            <div class="col-sm-5">
            <select name="user_flg" class="form-control error ">
            <option value="">@lang('messages.role')</option>
                                  <option value="1">@lang('messages.admin')</option>
                                  <option value="0">@lang('messages.user')</option>
                              </select>
                              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="birth">@lang('messages.birth')</label>
              <div class="col-sm-5">
              <input type="date"data-label="birth"class="form-control error" name="birth" id="birth" placeholder="@lang('messages.birth')">
               <div><span id="error-birth" class="text-danger"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="address">@lang('messages.address')</label>
              <div class="col-sm-5">
              <input class="form-control error" id="address" name="address" placeholder="@lang('messages.address')">
               <div><span id="error-address" class="text-danger"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="phone">@lang('messages.phone')</label>
              <div class="col-sm-5">
              <input class="form-control error" id="phone" type="phone" name="phone" placeholder="phone">
               <div><span id="error-phone" class="text-danger"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="information">@lang('messages.information')</label>
              <div class="col-sm-10">
              <textarea style="resize: none;" rows="7" cols="50" id="information" name="information" class="form-control" placeholder="@lang('messages.information')"></textarea>
              </div>
               <div><span id="error-information" class="text-danger"></span></div>
              </div>
            </div>
            <br>
            <br>
            <div class="form-group row">
              <div class=" col-sm-2">
                <button type="submit" id="btnsave" class="btn btn-light"><a id="btnsave" class="nav-link btn bnt-light">@lang('messages.adduser')</a></button>
              </div>           
            <div class=" col-sm-2">
              <button  class="btn btn-light"><a class="nav-link btn bnt-light" href="{{ route('list')}}">@lang('messages.cancel')</a></button>
            </div>
          </div>
        </form>
          </div>
            </div>
          </div>
        </div>
    </div>
  </div>
    </div>   
  </div>
  <link href="{{asset('assets/css/edit.css')}}" rel="stylesheet">
  <!-- plugins:js -->
   <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script  src="{{asset('assets/js/dataTables.select.min.js')}}"></script>
  <!-- Custom js for this page-->
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <script src="{{asset('assets/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
<script src="{{asset('assets/css/js/validate.js')}}"></script>
</body>
</html>
<script>
function checkpassword(){
		var password= document.getElementById('password').value;
		var repassword=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;
		if(repassword.test(password))
		{
			document.getElementById('errorr-password').innerHTML="(*)";
		}
		else{
			document.getElementById('error-password').innerHTML="Please enter at least 6 characters";
		}
	}
	function checkrepassword(){
		var password=document.getElementById('password').value;
		var repassword=document.getElementById('password_confirmation').value;
		if(password==repassword)
		{
			document.getElementById('error-repassword').innerHTML="(*)";
		} else{
			document.getElementById('error-repassword').innerHTML="Please enter your correct password!";
		}

	}
</script>
