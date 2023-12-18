<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/style2.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Category</title>
</head>
<body>
    <div class="sidebar">
        <a href="{{ route ('dashboard') }}" class="logo">
            <i class='bx bxl-mailchimp'></i>
            <div class="logo-name"><span>Chimp</span>Pro</div>
        </a>
        <ul class="side-menu">
            <li><a href="{{ route('dashboard') }}" data-menu="dashboard" class="{{ Request::is('dashboard*') ? 'active' : '' }}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="{{ route ('users.index')}}" data-menu="users-management" class="{{ Request::is('users*') ? 'active' : '' }}"><i class='bx bxs-user-detail' ></i>Users Management</a></li>
            @foreach($schools as $school)
                <li>
                    <a href="{{ route ('canteens.index')}}/{{ $school->id }}" data-menu="school-{{ $school->id }}" class="{{ Request::is('schools/'.$school->id) ? 'active' : '' }}">
                    <i class='bx bxs-user-detail' ></i>{{ $school->school_name }}
                    </a>
                </li>
            @endforeach
            
           
             
            
            <!-- <li><a href="#"><i class='bx bx-cog bx-spin' ></i>Setting</a></li> -->
            <!-- <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li> -->
        </ul>
        <ul class="side-menu">
            <li class="de">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="logout" type="submit"> <i class='bx bx-log-out' ></i>Logout</button>
            </form>  
            </li>
        </ul>

    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <!-- <img src="images/logo.png"> -->
                <h4>{{ Auth::user()->name }}</h4>
            </a>
        </nav>



        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard | Welcome {{ Auth::user()->name }}</h1>
                </div>
                <!-- <a href="{{ route('excel.download') }}" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>
                        
                        Download Food Menu
                        
                    </span>
                </a> -->
            </div>
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Canteens</h3>
                        <!-- <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i> -->
                        @if(auth()->user()->can('ed_de','view_only')|| auth()->user()->can('view_only'))
                        <a href="/canteens/{{ $current_school }}/create" class="newbtn2">Add Canteen</a>
                        @endif
                        <!-- <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm float-end me-3" type="submit">Logout</button>
                        </form> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th><h2>Canteen Name</h2></th>
                                <!-- <th><h2>Food_Price</h2></th>
                                <th><h2>Actions</h2></th> -->
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($canteens as $canteen)
                        <tr>
                            <td>{{ $canteen->canteen_name }}</td>
                            <td><a href="#" class="newbtn2">Edit</a></td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>   
            </div>
</body>
</html>