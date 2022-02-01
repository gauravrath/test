@extends('layouts.app')
    @section('content')
    
    <section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="">Assigned Projects List</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Project Name</th>
                                    <th>Assign Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->count()>0)
                                    @foreach($data->projectworker as $key => $pro)
                                    
                                        <tr>
                                            <td>{{  $key + 1 }}. </td>
                                            <td>{{$pro->project}}</td>
                                            <td>{{$pro->created_at}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    

    @endsection
   

