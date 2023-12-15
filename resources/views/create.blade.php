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
                <form action="{{ route('food.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3" >
                        <label class="col-sm-2 col-lable-form">Food Menu</label>
                        <div class="col-sm-10">
                            <input type="text" name="food_menu" class="form-control"/>
                        </div>
                    </div>
                    <div class="row mb-3" >
                        <label class="col-sm-2 col-lable-form">Food Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="food_price" class="form-control"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-lable-form">Category</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control">
                                    <option value="Soft Drink">Soft Drink</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Breakfast">BreakFast</option>
                                </select>
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