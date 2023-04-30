
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<meta name="_token" content="{{ csrf_token() }}">
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
                  <h3 class="font-weight-bold">@lang('messages.user')>@lang('messages.search')</h3>
                          </div>
              </div>
            </div>
          </div>        
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="col-sm-8 row">
                    <div class="col-sm-5  ">
                        <button type="button" class="btn btn-light nav-link"><a style=" text-decoration: none" href=" {{route('list')}}"><< @lang('messages.cancel') </a></button>
                    </div>  
                    <br><br>                
                    </div>
                      <form id="" action="{{route('search')}}" accept-charset="utf-8" enctype="multipart/form-data">                  
            <div class="row">
                <div class="col-md-12 row">
                <div class="form-group col-md-6">
                    <label class="control-label "  for="email">@lang('messages.email')</label>
                    <div class="col-sm-10">
                    <input type="email"  name="email" value="{{$data['email']}}" class="form-control" id="email" placeholder="email">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label "  for="phone">@lang('messages.phone')</label>
                    <div class="col-sm-10">
                    <input type="phone"  value="{{$data['phone']}}"class="form-control"name="phone" id="phone" placeholder="@lang('messages.phone')">
                    </div>
                </div>   
                </div>     
  <div class="col-md-12 row">
                <div class="form-group col-md-6">
                    <label class="control-label " for="Role">@lang('messages.role')</label>
                    <div class="row">
                    <div class="">
                    <input type="radio" name="user_flg" class="form-group" id="role" @checked('1' == $data['user_flg'])  value="1" >@lang('messages.admin')                
                    </div>
                    <div class="">
                     <input type="radio" name="user_flg" class="form-group" id="role" @checked('0' == $data['user_flg']) value="0" >@lang('messages.user')
                     </div>
                     </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label " for="birth">@lang('messages.birth')</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" value="{{$data['birth']}}" name="birth" id="birth" >
                    </div>
                </div>   
                </div>   
                {{--  --}}
                <div class="col-md-12 row">                
                <div class="form-group col-md-9">
                       <div class="container row input_daterange ">
                          @lang('messages.orderFrom') <input type="date" name="orderFrom" id="orderFrom" value="{{$data['orderFrom']}}" class=" col-md-4 form-control " />
                          @lang('messages.orderTo') <input type="date" name="orderTo" id="orderTo" value="{{$data['orderTo']}}"class=" col-md-4 form-control"  /><br>
                      </div><br>
                    <button type="submit" name="search" class="btn btn-info " id="submit">@lang('messages.search')</button>
                    <button type="button" id="btnClear" style=" text-decoration: none"  class="btn btn-info"><a style=" text-decoration: none; color:white" href="{{route('search')}}">@lang('messages.clear')</a></button>
                    <button type="button" class="btn btn-success " id="btnExportPDF"> @lang('messages.exportPDF')</button>
                    <button type="button" class="btn btn-success " name='' id="btnExportUsers"><a style=" text-decoration: none;color :white" href="{{route('exportUser')}}"> Export</a></button>             
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> @lang('messages.import')</button>
                </div>              
                <div class="form-group col-md-6">                     
               </div> 
                </div>   
            </div>          
                   <div class="table-responsive">
                    <table class="table table-striped" id="order_table">
                      <thead>
                        <tr>
                          <th>@lang('messages.id')</th>
                          <th>@lang('messages.name')</th>
                          <th>@lang('messages.email')</th>
                          <th>@lang('messages.phone')</th>
                          <th>@lang('messages.birth')</th>                  
                          <th>@lang('messages.role')</th>
                          <th>@lang('messages.information')</th>                              
                          <th>@lang('messages.lastOrder')</th>                         
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($users) && $users->count())
                      @foreach ($users as $items )                                             
                        <tr>
                          <td><a href="{{route('editUser',$items->id)}}" style=" text-decoration: none"> {{$items->id}}<a></td>
                          <td>{{$items->firstname}}  {{$items->lastname}}</td>                               
                          <td>{{$items->email}}</td>
                          <td>{{$items->phone}}</td>
                          <td>{{$items->birth}}</td>                         
                          @if ($items->user_flg == 0)
                            <td>@lang('messages.user')</td>
                          @else
                            <td>@lang('messages.admin')</td>
                          @endif  
                          <td id="ckeditor" class="ckeditor" name="information"> {{$items->information}}</td>
                           {{-- <td> <textarea class="ckeditor form-control" name="information" placehorder="">{{$items->information}}</textarea></td>                           --}}
                            @php
                              $order = $items->order->last()->created_at ?? '';
                            @endphp
                              <td>{{$order}}</td>
                      @endforeach
                         @else
                            <tr>
                                <td colspan="9" id="center">{{$message}}</td>
                            </tr>
                          @endif
                      </tbody>                   
                    </table>               
                     {{-- {!! $users->links('pagination::bootstrap-5') !!} --}}
                  </div> 
   </form>              
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('messages.import')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('importUser')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <div class="form-group">
        <input type="file" class="form-control" name="file" id="file" required>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('messages.cancel')</button>
        <button type="submit" class="btn btn-primary">@lang('messages.SaveChanges')</button>
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
  <script type="text/javascript">     
        function checkDate(){
        var dateFrom = $('input[name=orderFrom]').val();
        var dateTo = $('input[name=orderTo]').val();
        if(dateFrom >= dateTo || dateTo == '' || dateFrom == '' ){
            swal("Error", "OrderFrom must small than OrderTo ", "error");
            $('input[name=orderTo]').val('');
            $('input[name=orderTo]').focus();
            return false;
        }
        return true;
    }  
  </script>

<link href="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
</body>

</html>

    {{--ExportPDF --}}
    <script type="text/javascript">
    $('#btnExportPDF').click(function(){
        var email = $('input[name=email]').val();
        var phone = $('input[name=phone]').val();
        var birth = $('input[name=birth]').val();
        var role = $('input[name=user_flg]:checked').val();
        var orderFrom = $('input[name=orderFrom]').val();
        var orderTo = $('input[name=orderTo]').val();
        var information = $('textarea[name=information]').val();
        if(role == undefined){
            role = null;
        }
        var data = {
            email:email,
            phone:phone,
            birth:birth,
            user_flg:role,
            orderFrom:orderFrom,
            orderTo:orderTo,
            information:information
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            method:"GET",
            url: "{{route('exportPDF')}}",
            data: data,
            xhrFields: {
                responseType: 'blob'
            },
            success:function(response){
                var blob = new Blob([response]);
                var downloadUrl = URL.createObjectURL(blob);
                var link = document.createElement("a");
                link.href = downloadUrl;
                link.download = "users.pdf";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(downloadUrl);
                swal("Well!", "Export success", "success");
            },
            error: function (blob) {
                swal("Oops!", "Something went wrong", "error");
            }
        });
    });
       </script>
       {{-- EXPORTUSER --}}
    <script type="text/javascript">
    $('#btnExportUsers').click(function(){
        var email = $('input[name=email]').val();
        var phone = $('input[name=phone]').val();
        var birth = $('input[name=birth]').val();
        var role = $('input[name=user_flg]:checked').val();
        var orderFrom = $('input[name=orderFrom]').val();
        var orderTo = $('input[name=orderTo]').val();
        var information = $('textarea[name=information]').val();
        if(role == undefined){
            role = null;
        }
        var data = {
            email:email,
            phone:phone,
            birth:birth,
            user_flg:role,
            orderFrom:orderFrom,
            orderTo:orderTo,
            information:information
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type:'GET',
            url: "{{route('exportUser')}}",
            data: data,           
            success:function(data){
              var link = document.createElement('a');
              var binaryData = [];
              binaryData.push(data);
              link.href = window.URL.createObjectURL(new Blob(binaryData, {type: "application/zip"}))
              link.download = `users.csv`;
              link.click()
              swal("Well!", "Export success", "success");
            },
            error: function (data) {
              swal("Oops!", "Something went wrong", "error");
            }
            
        });
    })
    </script>
{{-- WYSIWYG editer --}}
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ckeditor').ckeditor();
         $('#ckeditor').ckeditor({
            tabsize: 2,
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            codeviewFilter: true,
            codeviewIframeFilter: true,
            codeviewIframeWhitelistSrc: [
                'https://www.youtube.com/**',
                'https://player.vimeo.com/video/**',
            ],
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var information = $('#information').val();
        if (information.includes('<')) {
            $('#information').summernote('codeview.toggle');
        }
    });
</script>



