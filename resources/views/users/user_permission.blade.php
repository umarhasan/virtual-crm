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
                                <h1>Role</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Role</li>
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
                                        <form method="post" action="{{route('user.permission.update', $roles[0]['id'])}}">
                                            @csrf
                                            @method('post')
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Name:</strong>
                                                        <input name="name" value="{{$roles[0]['name']}}"
                                                            placeholder="Name" class="form-control" required>
                                                        <input type="hidden" name="user_id" value="{{$user->id }}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class=" form-group">
                                                        <strong>Permission:</strong>
                                                        <div class="row ps-lg-4">
                                                            <!-- Master Checkbox for Select All -->
                                                            <div class="col-lg-4">
                                                                <div class="my-txt-box">
                                                                    <input type="checkbox" id="checkAll"
                                                                        class="form-check-input">
                                                                    <label class="my-label" for="checkAll">Select All</label>
                                                                </div>
                                                            </div>
                                                            @foreach($permission as $value)
                                                            <div class="col-lg-4">
                                                                <div class="my-txt-box">
                                                                    <input type="checkbox" name="permission[]"
                                                                        {{ in_array($value->name, $userPermissions) ? 'checked' : '' }}
                                                                        value="{{$value->id}}" class="name form-check-input">
                                                                    <label class="my-label"
                                                                        for="checkbox_{{$value->id}}">{{ $value->name }} </label>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    <script>
        $('.select2').select2()
        // Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": []
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    <style>
        .form-check-input {
            border-radius: 0 !important;
            height: 20px;
            width: 20px;
            margin: 0;
        }

        .form-group strong {
            margin: 0 0 10px;
            width: fit-content;
            display: block;
        }

        .my-txt-box {
            padding: 0 0 10px;
        }

        .my-label {
            padding-left: 30px;
            text-transform: capitalize;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Check/uncheck all checkboxes based on master checkbox state
            $('#checkAll').change(function () {
                $('input[name="permission[]"]').prop('checked', $(this).prop('checked'));
            });
            // Check/uncheck master checkbox based on the state of individual checkboxes
            $('input[name="permission[]"]').change(function () {
                if ($('input[name="permission[]"]:checked').length === $('input[name="permission[]"]').length) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
            });
        });
    </script>
@endsection
