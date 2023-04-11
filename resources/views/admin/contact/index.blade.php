@extends('admin.layouts.master')
@section('content')
@section('page')
     Contact
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="{{ route('brand.create') }}"><button type="button"
                                class="btn btn-info">Add</button></a> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>First Name </th>
                                    <th>Last Name </th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>{{ $c->c_fname }}</td>
                                        <td>{{ $c->c_lname }}</td>
                                        <td>{{ $c->c_email }}</td>
                                        <td>{{ $c->c_subject }}</td>
                                        <td>{{ $c->c_message }}</td>
                                        {{-- <td><a href="{{ route('', $b->id) }}"><button type="button"
                                                    class="btn btn-success">Edit</button></a>
                                            <a href="{{ route('', $b->id) }}"><button type="button"
                                                    class="btn  btn-danger">Delete</button></a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
            @endsection
