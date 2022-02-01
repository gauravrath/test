@extends('layouts.app')
    @section('content')
    <div class="pull-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProject">Add Project</button></div><br><br>
    <section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="">Projects List</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Project Name</th>
                                    <th>QR Code</th>
                                    <th>Created At</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($projects->count()>0)
                                    @foreach($projects as $key => $pro)
                                        <tr>
                                            <td>{{ ($projects->currentpage()-1) * $projects->perpage() + $key + 1 }}. </td>
                                            <td>{{$pro->project}}</td>
                                            <td></td>
                                            <td>{{$pro->created_at}}</td>
                                            <td title="Assign Projects" data-toggle="tooltip" width="50px;">
                                                <button class="btn-success btn-md" data-toggle="modal" data-target="#assignProject"><i class="text-white fas fa-tasks"></i></button>
                                            </td>
                                            <td width="50px;">
                                                <a href="{{url('admin/assignedwork/'.$pro->id)}}" class="text-success btn-md assignWorkers" title="Assign Workers" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
              </div>
              {{$projects->links()}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="addProject" tabindex="-1" role="dialog" aria-labelledby="addProjectTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{url('admin/add_project')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectTitle">Add Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project">Project</label>
                            <input type="project" class="form-control" id="project" name="project">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="assignProject" tabindex="-1" role="dialog" aria-labelledby="assignProjectTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{url('admin/assign_project')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="assignProjectTitle">Assign Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project">Project</label>
                            <select name="project_id" id="project_id" class="form-control">
                                <option value=""></option>
                                @foreach($projects as $key => $pro)
                                    <option value="{{$pro->id}}">{{$pro->project}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="worker">Workers</label>
                            <select name="worker_id" id="worker_id" class="form-control">
                                <option value=""></option>
                                @foreach($users as $key => $user)
                                    <option value="{{$user->id}}">{{$user->name}} ({{$user->id}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    @endsection
    
