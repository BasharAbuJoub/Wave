<nav class="navbar is-transparent">
    <div class="container is-fluid container-nav">
        <div class="navbar-brand">
        <a class="navbar-item">
            <h1 class="title is-3"><icon name="ion-ios-analytics-outline" size="30" large></icon>Wave</h1>
        </a>

        

        <span class="navbar-burger burger" data-target="navbarMenuHeroB">
            <span></span>
            <span></span>
            <span></span>
        </span>
        </div>
        <div id="navbarMenuHeroB" class="navbar-menu">
        <div class="navbar-end">
            <a class="navbar-item is-active">
                Overview
            </a>
            


            @auth
            
                {{--  DROPDOWN  --}}
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Control
                    </a>
                    
                    <div class="navbar-dropdown is-boxed">
                    <a href="{{route('devices.index')}}" class="navbar-item">
                            <icon name="ion-ios-bolt-outline" size="30"></icon>
                            <span style="margin-left: 6px;">Devices</span>
                        </a>
                        <a class="navbar-item">
                            <icon name="ion-ios-clock-outline" size="22"></icon>
                            <span style="margin-left: 6px;">Schedule</span>
                        </a>
                        <a class="navbar-item">
                            <icon name="ion-ios-mic-outline" size="26"></icon>
                            <span style="margin-left: 6px;">Broadcast</span>
                        </a>
    
                        <a class="navbar-item">
                            <icon name="ion-ios-nutrition-outline" size="26"></icon>
                            <span style="margin-left: 6px;">Feeder</span>
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            <icon name="ion-ios-gear-outline" size="26"></icon>
                            <span style="margin-left: 6px;">Settings</span>
                        </a>
    
                    </div>
                </div>

                {{--  DROPDOWN  --}}
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        {{Auth::user()->name}}
                    </a>
                    
                    <div class="navbar-dropdown is-boxed">
                        <a href="{{route('logout')}}" class="navbar-item">
                            <icon name="ion-log-out" size="20"></icon>
                            <span style="margin-left: 6px;">Logout</span>
                        </a>
                        {{--  <hr class="navbar-divider">
                        <a class="navbar-item">
                            <icon name="ion-ios-gear-outline" size="26"></icon>
                            <span style="margin-left: 6px;">Settings</span>
                        </a>  --}}
    
                    </div>
                </div>

            
            @endauth

            @guest
                <a href="{{route('register')}}" class="navbar-item">
                    Register
                </a>
                <a href="{{route('login')}}" class="navbar-item">
                    Login
                </a>
            @endguest
        </div>
        </div>
    </div>
</nav>