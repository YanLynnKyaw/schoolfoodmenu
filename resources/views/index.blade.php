
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('backend/style2.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


@extends ('master')
@extends ('home')

@section ('content')

@if($message = Session::get('success'))

    <div class="alert alert-success">
        {{$message}}
    </div>

@endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6 mt-1"><b>Student Data</b></div>
                <div class="col col-md-6 mt-1">
                    <a href="{{ route('student.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm float-end me-3" type="submit">Logout</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>

                @if(!empty($data) && (is_array($data) || $data instanceof Countable) && count($data)>0)
                    @foreach ($data as $row)
                        <tr>
                            <td><img src="{{ asset ('images/' .$row->student_image) }}" alt="image" width="75" /></td>
                            <td>{{ $row->student_name }}</td>
                            <td>{{ $row->student_email }}</td>
                            <td>{{ $row->student_gender }}</td>
                            <td>
                                <form action="{{ route('student.destroy', $row->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('student.show', $row->id ) }}" class="btn btn-primary btn-sm m-2">View</a>
                                    <a href="{{ route('student.edit', $row->id ) }}" class="btn btn-warning btn-sm m-2">Edit</a>
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif

            </table>
        </div>
    </div>


@endsection ('section')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ url('backend/js/app2.js')}}"></script>
</body>
</html>