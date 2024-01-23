@extends('layouts.app')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Attendance</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Attendance</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Attendance List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                      @can('user-create')
                        <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('attendance.create') }}"> + Add Attendance</a>
                      @endcan
                    </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr>
                        <td>UserID</td>
                        <td>TimeIn</td>
                        <td>TimeOut</td>
                        <td>Status</td>
                        <td></td>
                        <td></td>
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                        $id=1;
                        @endphp
                        @foreach($attendance as $row)
                        <tr>
                          <td>{{ $row->users->name }}</td>
                          <td>{{ $row->time_in }}</td>
                          <td>{{ $row->time_out }}</td>
                          <td>{{ $row->status }}</td>
                          <td>
                                <div class="btn-group">
                                        @can('attendance-edit')
                                        <a class="btn btn-primary btn-a" href="{{ route('attendance.edit',$row->id) }}">Edit</a> &nbsp;
                                        @endcan

                                        @can('attendance-delete')
                                        <form method="post" action="{{route('attendance.destroy',$row->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are You Sure Want To Delete This.??')" type="button"
                                                class="btn btn-danger btn-b"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                           </tr>   
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

    </div>
  </div>
</div>
@endsection