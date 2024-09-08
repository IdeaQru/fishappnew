<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
   

        @guest
<li class="nav-item">
    <div class="nav-link d-flex align-items-center" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: ##000080;">
        <span class="sidebar-icon">
            <i class="fas fa-fish" style="font-size:20px;"></i>
        </span>
        <span class="mt-1 ms-1 sidebar-text" style="font-weight:bold; font-size:15px;">Peta Persebaran Ikan</span>
    </div>
</li>



            <li class="nav-item">
                <a href="{{route('map')}}" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Peta</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('login')}}">
                        <span class="sidebar-icon">
                    <span class="sidebar-text">Login</span>

                        </span>
                </a>

            </li>

        @endguest


            <!-- Links only shown when authenticated -->
            @auth
<li class="nav-item">
    <div class="nav-link d-flex align-items-center" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: ##000080;">
        <span class="sidebar-icon">
            <i class="fas fa-fish" style="font-size:20px;"></i>
        </span>
        <span class="mt-1 ms-1 sidebar-text" style="font-weight:bold; font-size:15px;">Peta Persebaran Ikan</span>
    </div>
</li>


            <li class="nav-item ">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text">Input Lokasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('map')}}" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Peta</span>
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link d-flex justify-content-between"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span>
                        <span class="sidebar-icon">
                            <span class="sidebar-text">Logout</span>
                        </span>
                    </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endauth
        </ul>
    </div>
    
</nav>
