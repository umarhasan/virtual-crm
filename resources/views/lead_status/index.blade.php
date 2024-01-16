@extends('layouts.app')
@section('page-title')
Manage Leads Status
@endsection
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Leads Status List</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="box">
            <!-- /.box-header -->
            <!-- <div class="box-body table-responsive"> -->
                <div class="card-body">
                        <div class="pull-right">
                        @can('user-create')
                            <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('leadStatus.create') }}"> + Add Lead Status</a>
                        @endcan
                        </div>
                    @if($leadStatuses)
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="16%">Name</th>
                                <th width="10%">Color</th>
                                <th width="10%">Order</th>
                                <th width="15%">Actoin</th>
                            </tr>
                        </thead>
                        @foreach($leadStatuses as $leadStatus)
                        <tr>
                            <td>{{ $leadStatus->id }}</td>
                            <td>{{ $leadStatus->name }}</td>
                            <td style="background-color: {{ $leadStatus->color }}; width: 10px; height: 10px;"></td>
                            <td></td>
                            <td>  
                                <a href="{{ route('leadStatus.edit', $leadStatus->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form method="post" action="{{route('leadStatus.destroy',$leadStatus->id)}}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            
                        </tr> 
                        @endforeach
                        </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="row">
                                {{-- <div class="col-sm-6">
                                    <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                        Showing {{($leadStatuses->currentpage()-1)*$attendances->perpage()+1}} to {{$attendances->currentpage()*$attendances->perpage()}} of {{$attendances->total()}} entries
                                    </span>
                                </div> --}}
                                <div class="col-sm-6 text-right">
                                    {{-- {{ $leadStatuses->links() }} --}}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-danger">
                        No record found!
                    </div>
                    @endif
                    <!-- /.box-body -->
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection