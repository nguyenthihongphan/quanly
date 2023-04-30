
@include('layout.header')
@php
$type='text';
@endphp
      <!-- partial:partials/_sidebar.html -->
      @include('layout.sidebar')
      <!-- partial -->
       <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">@lang('messages.user')>@lang('messages.listUsers')>@lang('messages.update')</h3>
                  </div>               
              </div>
            </div>
          </div>          
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="col-sm-8"><b>@lang('messages.update')</b></div>
                 <div>
    <div>
   @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    </div>
<form class="form-horizontal" method="POST" action="{{ route('update', $userList->id) }}"  enctype="multipart/form-data" >
            @csrf
<div class="form-group">
    <label class="control-label col-sm-2" for="firstname">@lang('messages.firstname')</label>
    <div class="col-sm-10">
      <input type="text" name="firstname"data-label="firstname"  class="form-control" value="{{$userList->firstname}}" id="firstname" placeholder="@lang('messages.firstname')">
     <div><span id="error-firstname" class="text-danger"></span></div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">@lang('messages.lastname')</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" data-label="lastname" name="lastname" value="{{$userList->lastname}}" id="lastname" placeholder="@lang('messages.lastname')">
    <div><span id="error-lastname" class="text-danger"></span></div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">@lang('messages.email')</label>
    <div class="col-sm-10">
      <input type="email" data-label="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{$userList->email}}" id="email" placeholder="Enter email">
@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">@lang('messages.password')</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" value="{{$userList->password}}" id="password" placeholder="@lang('messages.password')">
     <div><span id="error-password" class="text-danger"></span></div>
    </div>
  </div>
  <div class="form-group">
          <label class="control-label col-sm-2" for="role">@lang('messages.role')</label>
          <div class="col-sm-5">
          <select name="user_flg" class="form-control ">@lang('messages.role')                                        
             @php
          if ($userList->user_flg == 1) {
              @endphp
                  <option selected value="1">@lang('messages.admin')</option>
                  <option value="0">@lang('messages.user')</option>
              @php
                  
                  } else {
              @endphp
                  <option  value="1">Admin</option>
                  <option selected value="0">User</option>
              @php
                  }
          @endphp                                  
            </select>                   
  </div>                                    
  <div class="form-group">
    <label class="control-label col-sm-2" for="birth">@lang('messages.birth')</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="birth" value="{{$userList->birth}}"  id="birth" placeholder="Birth">
     <div><span id="error-birth" class="text-danger"></span></div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">@lang('messages.address')</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" data-label="address" id="address" value="{{$userList->address}}" name="address" placeholder="@lang('messages.address')">
     <div><span id="error-address" class="text-danger"></span></div>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="Phone">@lang('messages.phone')</label>
    <div class="col-sm-5">
      <input type="text"  class="form-control" id="phone" name="phone" value="{{$userList->phone}}" placeholder="@lang('messages.phone')">
     <div><span id="error-phone" class="text-danger"></span></div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Avatar">@lang('messages.avatar')</label>
    <div class="col-sm-5">
      <input type="file" class="form-control" id="avatar" accept="image/*" name="avatar"  placeholder="">
      <img src="{{asset('storage/images/'.$userList->avatar)}}" width="50px" height="50px">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="information">@lang('messages.information')</label>
    <div class="col-sm-10">
     <textarea style="resize: none;"data-label="information"  rows="7" cols="50" name="information"  class="ckeditor form-control" name="wysiwyg-editor" value="{{$userList->information}}" class="form-control" placeholder="@lang('messages.information')"></textarea>
     <div><span id="error-information" class="text-danger"></span></div>
    </div>
  </div>
  <div class="form-group row">
    <div class=" col-sm-2">
      <button type="submit" class="btn btn-light"><a class="nav-link btn bnt-light" >@lang('messages.update')</a></button>
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
        <!-- content-wrapper ends -->
       @extends('layout.footer')
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <link rel="stylesheet" href="{{asset('assets/css/edit.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{asset('assets/css/js/validate.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
<script>
  let validation = document.getElementById('validation');
</script>
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ckeditor').ckeditor();
    });
</script>

</body>

</html>