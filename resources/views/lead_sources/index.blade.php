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
        <h1>Leads Sources List</h1>
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
                            <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('leadSources.create') }}"> + Add Lead Sources</a>
                        @endcan
                        </div>
                    @if($LeadSources)
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="16%">Name</th>
                                <th width="15%">Actoin</th>
                            </tr>
                        </thead>
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
                        </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="row">
                                {{-- <div class="col-sm-6">
                                    <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                        Showing {{($LeadSources->currentpage()-1)*$LeadSources->perpage()+1}} to {{$LeadSources->currentpage()*$LeadSources->perpage()}} of {{$LeadSources->total()}} entries
                                    </span>
                                </div> --}}
                                <div class="col-sm-6 text-right">
                                    {{-- {{ $LeadSources->links() }} --}}
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