<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/style2.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    
    <div class="sidebar">
        <a href="{{ route ('dashboard') }}" class="logo">
            <i class='bx bxl-mailchimp'></i>
            <div class="logo-name"><span>Chimp</span>Pro</div>
        </a>
        <ul class="side-menu">
            <a href="{{ route('schools.create') }}" class="newbtn2 " style="margin-left:17px;"><span>Add School</span></a>
            <li><a href="{{ route('dashboard') }}" data-menu="dashboard" class="{{ Request::is('dashboard*') ? 'active' : '' }}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <!-- <li><a href="#"><i class='bx bx-group' ></i>Student Create</a></li> -->
            <li><a href="{{ route ('users.index')}}" data-menu="users-management" class="{{ Request::is('users*') ? 'active' : '' }}"><i class='bx bxs-user-detail' ></i>Users Management</a></li>

            
           
             @foreach($schools as $school)
                <li>
                    <a href="" data-menu="school-{{ $school->id }}" class="{{ Request::is('schools/'.$school->id) ? 'active' : '' }}">
                    <i class='bx bxs-user-detail' ></i>{{ $school->school_name }}
                    </a>
                </li>
            @endforeach
            
            <!-- <li><a href="#"><i class='bx bx-cog bx-spin' ></i>Setting</a></li> -->
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
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
                <a href="{{ route('excel.download') }}" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>
                        
                        Download Food Menu
                        
                    </span>
                </a>
            </div>
        
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Soft Drink</h3>
                        <!-- <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i> -->
                        @if(auth()->user()->can('ed_de','view_only')|| auth()->user()->can('view_only'))
                        <a href="{{ route('food.create') }}" class="newbtn2">Add Food_Menu</a>
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
                                <th><h2>Food_Menu</h2></th>
                                <th><h2>Food_Price</h2></th>
                                <th><h2>Actions</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                @if(!empty($data) && (is_array($data) || $data instanceof Countable) && count($data)>0)
                    @foreach ($softDrinkData as $row)
                        <tr>
                            <td>{{ $row->food_menu }}</td>
                            <td>{{ $row->food_price }}</td>
                            <td class="butt">
                                <form action="{{ route('food.destroy', $row->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('food.show', $row->id ) }}" class="newbtn"><span class="newbtn_top">View</span></a>
                                    @if(auth()->user()->can('ed_de')|| auth()->user()->can('view_only'))
                                        <a href="{{ route('food.edit', $row->id ) }}" class="newbtn"><span class="newbtn_top">Edit</span></a>
                                        <input type="submit" class="newbtn1" value="Delete">
                                    @endif
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td  class="text-center">No Data Found</td>
                    </tr>
                @endif
                        </tbody>
                    </table>
                </div>   
            </div>


            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Lunch</h3>

                        @if(auth()->user()->can('ed_de','view_only')|| auth()->user()->can('view_only'))
                            <a href="{{ route('food.create') }}" class="newbtn2">Add Food_Menu</a>
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
                                <th><h2>Food_Menu</h2></th>
                                <th><h2>Food_Price</h2></th>
                                <th><h2>Actions</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                @if(!empty($data) && (is_array($data) || $data instanceof Countable) && count($data)>0)
                    @foreach ($lunchData as $row)
                        <tr>
                            <td>{{ $row->food_menu }}</td>
                            <td>{{ $row->food_price }}</td>
                            <td class="butt">
                                <form action="{{ route('food.destroy', $row->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('food.show', $row->id ) }}" class="newbtn"><span class="newbtn_top">View</span></a>
                                    @if(auth()->user()->can('ed_de')|| auth()->user()->can('view_only'))
                                        <a href="{{ route('food.edit', $row->id ) }}" class="newbtn"><span class="newbtn_top">Edit</span></a>
                                        <input type="submit" class="newbtn1" value="Delete">
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td  class="text-center">No Data Found</td>
                    </tr>
                @endif
                        </tbody>
                    </table>
                </div>   
            </div>

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>BreakFast</h3>

                        @if(auth()->user()->can('ed_de','view_only')|| auth()->user()->can('view_only'))
                            <a href="{{ route('food.create') }}" class="newbtn2">Add Food_Menu</a>
                        @endif
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th><h2>Food_Menu</h2></th>
                                <th><h2>Food_Price</h2></th>
                                <th><h2>Actions</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                    @if(!empty($data) && (is_array($data) || $data instanceof Countable) && count($data)>0)
                    @foreach ($breakfastData as $row)
                        <tr>
                            <td>{{ $row->food_menu }}</td>
                            <td>{{ $row->food_price }}</td>
                            <td class="butt">
                                <form action="{{ route('food.destroy', $row->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('food.show', $row->id ) }}" class="newbtn"><span class="newbtn_top">View</span></a>
                                    
                                    @if(auth()->user()->can('ed_de')|| auth()->user()->can('view_only'))
                                        <a href="{{ route('food.edit', $row->id ) }}" class="newbtn"><span class="newbtn_top">Edit</span></a>
                                        <input type="submit" class="newbtn1" value="Delete">
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td  class="text-center">No Data Found</td>
                    </tr>
                @endif
                        </tbody>
                    </table>
                </div>   
            </div>



        </main>

    </div>
    <script>
        const dashboardLink = document.querySelector('.sidebar .side-menu li a[href="{{ route('dashboard') }}"]');
        
        dashboardLink.addEventListener('click', (event) => {
            activateSidebarLinks();
        });
    </script>
    <script src="{{ url('backend/js/app2.js')}}"></script>
</body>
</html>