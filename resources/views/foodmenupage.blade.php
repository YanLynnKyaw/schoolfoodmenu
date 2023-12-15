<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/style3.css') }}">
    <title>Document</title>
</head>
<body>
    <nav>
        <span class="navbar"><h1>Food Menu</h1></span>
        <span class="navbar_sec"><h2>School Of IT</h2></span>
    </nav>
    
    <div class="content">
            
        <div class="container">
            <div class="row">
                <div class="mm">
                    <div class="food_menu">
                        @php $firstCategory = true @endphp
                        @foreach ($softDrinkData as $record)
                            @if ($firstCategory)
                                <h4>{{ $record->category }}</h4>
                                <ul>
                                @php $firstCategory = false @endphp
                            @endif
                            <li>{{ $record->food_menu }}</li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="food_price">
                        <h4>Price</h4>
                        <ul>
                            @foreach($softDrinkData as $record)
                                <li>{{ $record->food_price }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mm">
                    <div class="food_menu">
                        @php $firstCategory = true @endphp
                        @foreach ($lunchData as $record)
                            @if ($firstCategory)
                                <h4>{{ $record->category }}</h4>
                                <ul>
                                @php $firstCategory = false @endphp
                            @endif
                            <li>{{ $record->food_menu }}</li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="food_price">
                        <h4>Price</h4>
                        <ul>
                            @foreach($lunchData as $record)
                                <li>{{ $record->food_price }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mm">
                    <div class="food_menu">
                        @php $firstCategory = true @endphp
                        @foreach ($breakfastData as $record)
                            @if ($firstCategory)
                                <h4>{{ $record->category }}</h4>
                                <ul>
                                @php $firstCategory = false @endphp
                            @endif
                            <li>{{ $record->food_menu }}</li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="food_price">
                        <h4>Price</h4>
                        <ul>
                            @foreach($breakfastData as $record)
                                <li>{{ $record->food_price }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- <div class="row">
                <div class="food_menu">

                    <ul>
                            

                    @php $firstCategory = true @endphp
                    @foreach ($breakfastData as $record)
                        @if ($firstCategory)
                            <h4>{{ $record->category }}</h4>
                            <ul>
                            @php $firstCategory = false @endphp
                        @endif
                        <li>{{ $record->food_menu }}</li>
                    @endforeach
                    </ul>
                </div>
                <div class="food_price">

                    <ul>
                        <h4>Price</h4>

                    <h4>Price</h4>
                    <ul>

                        @foreach($breakfastData as $record)
                            <li>{{ $record->food_price }}</li>
                        @endforeach
                    </ul>
                </div>    
            </div> -->
        </div>   
    </div>
    
    
    <footer>
        <span class="foot">&copy; KBTC 2023 - All rights reserved.</span>
    </footer>
</body>
</html>