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
                <h1>Lead Source Management</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Lead Sources</li>
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
                    <h3 class="card-title">Leads Source List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                        @can('user-create')
                            <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('leadSources.create') }}"> + Add Lead Sources</a>
                        @endcan
                    </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr>
                          <th width="10%">#</th>
                          <th width="16%">Name</th>
                          <th width="15%">Actoin</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($LeadSources as $leadSource)
                            <tr>
                                <td>{{ $leadSource->id }}</td>
                                <td>{{ $leadSource->name }}</td>
                                <td>  
                                    <a href="{{ route('leadSources.edit', $leadSource->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form method="post" action="{{route('leadSources.destroy',$leadSource->id)}}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
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