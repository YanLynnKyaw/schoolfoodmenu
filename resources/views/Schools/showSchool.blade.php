@extends('master')

@section('content')



    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">Soft Drink</div>
                <div class="col col-md-6">
                    <a href="{{ route('schools.index')}}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-label-form"><b>School Name</b></label>
                <div class="col sm-10">
                    
                    <p>{{$schools->school_name}}</p>
                   
                </div>
            </div>
            
        </div>
    </div>

@endsection('content')