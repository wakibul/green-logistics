@extends('user.layouts.app')
@section('css')
@endsection
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Information</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    </div>
                @endif

              @if(Session::has('success'))
                        <div class="alert alert-success">
                        {!! session('success') !!}
                        </div>
              @endif
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                      <h3 class="card-title">
                        <i class="fas fa-truck mr-1"></i>
                        Trucks
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                     <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Truck Id</th>
                                <th>Vehicle Type</th>
                                <th>Year of manufacture</th>
                                <th>Fuel Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($truckings as $key=>$trucking)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$trucking->truck_id}}</td>
                                <td>{{$trucking->vehicleType->name}}</td>
                                <td>{{$trucking->year_of_manufacture}}</td>
                                <td>{{$trucking->fuelType->name}}</td>
                                <td><a href="{{route('trucking.edit',Crypt::encrypt($trucking->id))}}" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{route('trucking.delete',Crypt::encrypt($trucking->id))}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete')"><i class="fas fa-edit"></i> Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7"> No record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$truckings->links()}}
                    </div><!-- /.card-body -->
                  </div>
            </div>

        </div>




        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    @section('js')

    @endsection
    <!-- /.content -->
  </div>
  @endsection


