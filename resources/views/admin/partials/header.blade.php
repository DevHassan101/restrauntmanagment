<script>
    function updateClock() {
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var day = now.getDate();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';

        // Convert hours to 12-hour format
        hours = hours % 12;
        hours = hours ? hours : 12; // Handle midnight (0 hours)

        var date = year + '-' + padZero(month) + '-' + padZero(day);
        var time = hours + ':' + padZero(minutes) + ':' + padZero(seconds) + ' ' + ampm;
        document.getElementById('date').innerHTML = date;
        document.getElementById('time').innerHTML = time;
        setTimeout(updateClock, 1000);
    }

    function padZero(num) {
        return (num < 10 ? '0' : '') + num;
    }

    window.onload = function() {
        updateClock();
    };
</script>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            {{-- <img src="assets/img/logo.png" alt=""> --}}
            <span class="d-none d-lg-block">ByteCloud</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar --> --}}

    <nav class="header-nav m-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item mx-3">
                <h2 id="date" style="color: #8f5300"></h2>
            </li>
            <li class="nav-item mx-3">
                <h2 id="time" style="color: #8f5300"></h2>
            </li>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    {{-- <img src="{{asset('profilepicture/')}}" alt="Profile" class="rounded-circle"> --}}
                    {{-- <span class="d-none d-md-block dropdown-toggle ps-2">{{session('user')->name}}</span> --}}
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        {{-- <h6>{{session('user')->name}}</h6>
            <span>{{session('user')->userrole}}</span> --}}
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('profile') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
