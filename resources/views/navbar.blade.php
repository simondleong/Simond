<div class="menu">
    <!-- menu start -->
    <nav id="menu" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- menu logo -->
                        <ul class="menu-logo">
                            <li> <a href="/"><img src="{{ asset('images/yeedate_logo.png') }}" alt="logo" /> </a> </li>
                        </ul>
                        <!-- menu links -->
                        <ul class="menu-links">
                            <!-- active class -->
                            <li class="{{ Request::is('/') ? "active" : null }}">
                                <a href="/">Home</a>
                            </li>
                            <li class="{{ Request::is('/find') ? "active" : null }}">
                                <a href="/find">Find Matches</a>
                            </li>
                            <li class="{{ Request::is('profile') ? "active" :
                                            Request::is('password') ? "active" :
                                                Request::is('preferences') ? "active" :
                                                    Request::is('photos') ? "active" : null}}">
                                <a href="/profile">My Profile</a>
                            </li>
                            <li class="{{ Request::is('dates/sent') ? "active" :
                                            Request::is('dates/received') ? "active" : null}}">
                                <a href="#">My Dates<i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel left-menu">
                                    <li><a href="/dates/sent">Sent</a></li>
                                    <li><a href="/dates/received">Received</a></li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('chats') ? "active" : null }}">
                                <a href="/chats">Chat</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
    <!-- menu end -->
</div>