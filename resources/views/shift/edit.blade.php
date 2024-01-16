@extends('layouts.app')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Edit User</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit User</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <form method="post" action="{{route('shift.update', $shift->id)}}">
                      @csrf
                      @method('put')
                      <div class="row">
                      <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Shift:</strong>
                            <select name="shift" value='{{ $shift->shift }}' class="form-control" id="" required>
                                <option value="">::select shift::</option>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                                <option value="Night">Night</option>
                            </select>
                          </div>
                        </div>
                      <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Time Start:</strong>
                            <input class="form-control" value='{{ $shift->time_start }}' type="time" name="time_start" required>
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Time End:</strong>
                            <input class="form-control" value='{{ $shift->time_end }}' type="time" name="time_end" required>
                          </div>
                        </div>
                        <!-- <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                            <strong>Status:</strong>
                            <input class="form-control" type="status" name="status" required>
                          </div>
                        </div> -->
                       
                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/shift" class='btn btn-danger'>Cancel</a>
                      </div>
                      </div>
                    </form>
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