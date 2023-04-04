<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

</head>
{{-- <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: ;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style> --}}
</head>

<body>
    <div class="container">
        <h2>Category Table</h2>
        <a href="{{ route('index') }}"><button class="btn btn-info">Add</button></a><br><br>
        <table id="myTable" class="table">

            <thead>
                <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>
                            @if(empty($u->image))
                            <img src="{{('download.png')}}" width="50px" height="50px" alt="">
                                @else
                            <img src="{{asset('image/'.$u->image)}}" width="50px" height="50px" alt="">
                            @endif
                        </td>
                        <td>
                            @if ($u->status == 0)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        <td><a href="{{ route('edit', $u->id) }}"><button class="btn btn-success">Edit</button></a>
                            <a href="{{ route('delete', $u->id) }}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                pagelength : 2,
                lengthMenu: [[2,4,10,-1],[2,4,10,'Todos']],
                searching:false
            });
        })
    </script>
</body>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</html>
