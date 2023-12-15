@extends('master')

@section ('content')


<div class="card">
    <div class="card-header">Edit Food Menu</div>
    <div class="card-body">
        <form action="{{ route('food.update', $food->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="row mb-3" >
                <label class="col-sm-2 col-lable-form">Food Menu</label>
                <div class="col-sm-10">
                    <input type="text" name="food_menu" class="form-control" value="{{ $food->food_menu }}"/>
                </div>
            </div>
            <div class="row mb-3" >
                <label class="col-sm-2 col-lable-form">Food Price</label>
                <div class="col-sm-10">
                    <input type="text" name="food_price" class="form-control" value="{{ $food->food_price }}"/>
                </div>
            </div>
            <input type="hidden" name="category" value="{{ $food->category }}">
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $food->id }}" />
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
    
</div>

<script>

</script>

@endsection ('content')