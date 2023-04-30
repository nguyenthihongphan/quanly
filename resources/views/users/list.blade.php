
@include('layout.header')
      <!-- partial:partials/_sidebar.html -->
      @include('layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">@lang('messages.user')> @lang('messages.listUsers')</h3>
                </div>                
              </div>
            </div>
          </div>        
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="col-sm-4"><b>@lang('messages.listUsers')</b></div>
                  <div class="col-sm-8 row">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-light nav-link" ><a style="text-decoration: none;" href=" {{route('addUser')}}"><i class="fa fa-plus"></i> Add New user </a></button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-light nav-link" ><a style="text-decoration: none;" href=" {{route('search')}}"><i class="fa fa-search"></i> Search </a></button>
                    </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>@lang('messages.avatar')</th>
                          <th>@lang('messages.firstname')</th>
                          <th>@lang('messages.lastname')</th>
                          <th>@lang('messages.id')</th>
                          <th>@lang('messages.email')</th>
                          <th>@lang('messages.phone')</th>
                          <th>@lang('messages.information')</th>
                          <th>@lang('messages.address')</th>
                          <th>@lang('messages.birth')</th>                          
                          <th>@lang('messages.role')</th>
                          <th>@lang('messages.action')</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($userList as $key=>$items )                                             
                        <tr>
                        <td class="py-1">
                            <img src="{{asset('storage/images/'.$items->avatar)}}" width="50px" height="50px">
                          </td>
                          <td>{{$items->firstname}}</td>                          
                          <td>{{$items->lastname}}</td>       
                          <td>{{$items->id}}</td>
                          <td>{{$items->email}}</td>
                          <td>{{$items->phone}}</td>
                          <td>{{$items->information}}</td>
                          <td>{{$items->address}}</td>
                          <td> {{$items->birth}}</td>
                          <td>{{$items->user_flg}}</td>
                          <td>
                          	<a href="{{route('show',$items->id)}}" class="show" ><i class="material-icons remove_red_eye"></i></a>
							              <a href="{{route('editUser',$items->id)}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
						                @csrf
                            @method('DELETE')
                            <a href="{{ route('destroy', $items->id)}}" type="submit" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						              </td>
                        </tr>
                        @endforeach                        
                      </tbody>                   
                    </table>
                    {!! $userList->withQueryString()->links('pagination::bootstrap-5') !!}
                  </div>                  
                </div>
              </div>
            </div>            
        </div>
        @extends('layout.footer')
      </div>
    </div>   
  </div>  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

