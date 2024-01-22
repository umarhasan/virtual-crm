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
                <h1>Leads Management</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Leads Management</li>
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
                    <h3 class="card-title">Users List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                      @can('user-create')
                        <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('leads.create') }}"> + Add Leads</a>
                      @endcan
                    </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Leads</th>
                          <!-- <th>Company</th> -->
                          <!-- <th>Phone</th> -->
                          <th>Action</th>
                        </tr>
                        </thead>
                      <tbody>
                          @php $i = 0; @endphp
                          @foreach($leads as $lead)
                              @php $i++; @endphp
                              <tr>
                                  <td>{{ $i }}</td>
                                  <td>{{ $lead->name }}</td>
                                  <!-- <td>{{ $lead->company_name }}</td> -->
                                  <!-- <td>{{ $lead->phone }}</td> -->
                                  <td>
                                     
                                    @if(isset($lead->LeadsUser) && $lead->LeadsUser->status == 'accepted')
                                    @else
                                    <a href="{{ route('leads.accepted', $lead->id) }}" class="btn btn-primary btn-sm">Pick</a>
                                    @endif
                                      <a href="{{ route('leads.show',$lead->id) }}" class="btn btn-warning btn-sm">View</a>    
                                      @can('leads-edit')
                                      <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endcan
                                    @can('leads-delete')
                                      <form action="{{ route('leads.destroy', $lead->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                      </form>
                                    @endcan
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