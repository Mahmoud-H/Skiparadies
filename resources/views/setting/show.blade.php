  @extends('layouts.app')
@section('content')
 <section class="content">
     
        <div class="row">
                
                <div class="col-3">
                <a href="{{ route('setting.index') }}">   
                <button style="margin-left:8px;margin-top:10px; width:150px;" type="button" class="btn btn-block btn-default ">Back</button>  </a> 
                </div>
                <div class="col-9">
                </div>
                       
             </div>
     
      <div class="container-fluid">
   <div class="row">
                <div class="col-4 table-responsive">
                  <table class="table table-striped">
                    <thead>
<!--
                    <tr>
                      <th>Address</th>
                      <th>Telephone</th>
                    
                    </tr>
-->
                    </thead>
                    <tbody>
                           <tr>
                      <td>Address </td>
                      <td>{{$setting->address}} </td>
                      
                    </tr>
                               <tr>
                      <td>Telephone  </td>
                      <td>{{$setting->telephone}} </td>
                      
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
          </div>
</section>

@stop