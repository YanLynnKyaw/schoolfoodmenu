@extends('master')

@section('content')

@if($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>

@endif

   
     <div class="card">
        <div class="card-header">
            <div class="card-body">
                <form action="{{ route('canteens.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3" >
                        <label class="col-sm-2 col-lable-form">Canteen</label>
                        <div class="col-sm-10">
                            <input type="text" name="canteen_name" class="form-control"/>
                            <input type="hidden" name="school_id" value="{{ $school->id }}">
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection('content')