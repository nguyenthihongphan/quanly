        <!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<h1>Intern-HPhan</h1>
<h2>User</h2>
<table id="customers">         
                      <thead>
                        <tr> 
                          <th>ID</th>                         
                          <th>Name </th>                        
                          <th>Email</th>
                          <th> Phone</th>
                          <th>Birth</th> 
                          <th>Address</th>                                                 
                          <th>Role</th>
                          <th>Information</th>
                          <th>Lastest_Order</th>                         
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($dataExport) && $dataExport->count())
                      @foreach ($dataExport as $key=> $items )                                             
                        <tr> 
                        <td>{{$items->id}}</td>                                             
                        <td>{{$items->firstname}} {{$items->lastname}}</td>                               
                        <td>{{$items->email}}</td>
                        <td>{{$items->phone}}</td>
                        <td>{{$items->birth}}</td>
                        <td>{{$items->address}}</td>                       
                          @if ($items->user_flg == 1)
                                        <td>Admin</td>
                                    @else
                                        <td>User</td>
                            @endif
                        <td>{{$items->information}}</td>                    
                             @php
                                  $order = $items->order->last()->created_at ?? '';
                                @endphp
                        <td>{{$order}}</td>                        
                        </tr>
                        @endforeach
                         @else
                            <tr>
                                <td colspan="9" id="center">Not for found</td>
                            </tr>
                        @endif
                      </tbody>
                    
                    </table>
                    <h4>Thank you export</h4>
                    <h4>contact intern-hphan</h4>
                    <h5>link:https://gitlab.com/bwv-thanh-clg/intern-phan</h5>
                    </body>
</html>
  {{-- <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}" href="{{asset('vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{asset('asset/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}