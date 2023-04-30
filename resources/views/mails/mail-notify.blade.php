{{-- <div>
   <h2>{{ $data['type'] }}</h2>
   <p> <b>{{ $data['task'] }}</b> {{ $data['content'] }}</p>
</div> --}}
<h3>@lang('validation.sendmail')</h3>
<table class="table table-striped">
                      <thead>   
                        <tr>
                           <th> First name</th>
                          <th>Last name</th>
                          <th>Email</th>
                        </thead>
                      <tbody>                                                              
                        <tr>
                          <td>{{ $data['firstname'] }}</td>   
                          <td>{{ $data['lastname'] }}</td>                                                                            
                          <td>{{ $data['email'] }}</td>                           
                        </tr>
                        
                      </tbody>
                    
                    </table>