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
                <h1>Clients Management</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Client Management</li>
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
                    <h3 class="card-title">Clients List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                      @can('client-create')
                        <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('client.create') }}"> + Add Client</a>
                      @endcan
                    </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Company Name</th>
                          <th>Category</th>
                          <th>Roles</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($clients)
                        @php
                        $id =1;
                        @endphp
                        @foreach($clients as $key => $user)
                        <tr>
                          <td>{{$id++}}</td>
                          <td>{{ $user->company_name }}</td>
                          <td>{{ $user->category }}</td>
                          
                          <td>
                            <div class="btn-group">
                              @can('user-edit')
                              <a class="btn btn-primary btn-a" href="{{ route('client.edit',$user->id) }}">Edit</a>    
                              @endcan
                              @can('user-delete')
                              <form method="post" action="{{route('client.destroy',$user->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are You Sure Want To Delete This.??')" type="button" class="btn btn-danger btn-b"><i class="fa fa-trash"></i></button>
                              </form>
                              @endcan
                            </div>
                          </td>
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
        </section>
    </div>
  </div>
</div>
@endsection