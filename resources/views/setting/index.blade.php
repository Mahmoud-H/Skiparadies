  @extends('layouts.app')
@section('content')
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
            @if(count($setting)  == 0 )
            <div class="row">
                
                <div class="col-3">
                <a href="{{ route('setting.create') }}">   
                <button style="margin-left:20px;margin-top:10px; width:150px;" type="button" class="btn btn-block btn-success ">Add</button>  </a> 
                </div>
                <div class="col-9">
                </div>
                       
             </div>
            @endif
            
              <!-- /.card-header -->
              <div class="card-body">
                  
                   @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
                  
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th> Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($setting as $sett) 
                  <tr>
                    <td>{{$sett->address}}</td>
                    <td> {{$sett->telephone}} </td>
                   
                    <td>
                        <form action="{{ route('setting.destroy',$sett->id) }}" method="POST">
                           <a class="btn btn-primary btn-sm" href="{{ route('setting.show',$sett->id) }}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('setting.edit',$sett->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                            @csrf
                    @method('DELETE')
<!--
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
-->
                             <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fas fa-trash">
                              </i>
                                 Delete</button>
                       </form>
                    </td>
                     
                     
                  </tr>
            
                   @endforeach
                 
  
                  </tbody>
                  <tfoot>
                  <tr>
                       <th>Address</th>
                    <th>Telephone</th>
                    <th>Action </th>
               
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

 @stop