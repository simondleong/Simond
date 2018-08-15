<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="topbar-left text-left">
                    <ul class="list-inline">
                        <li><a href="mailto:support@website.com"><i class="fa fa-envelope-o"> </i> support@website.com </a></li>
                        <li><a href="tel:(007)1234567890"><i class="fa fa-phone"></i> (007) 123 456 7890 </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="topbar-right text-right">
                    <ul class="list-inline social-icons color-hover">
                        <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                    <ul class="list-inline text-uppercase top-menu">
                        @if (!session()->has('user'))
                            <li><a href="/register">register</a></li>
                            <li><a href="/login">login</a></li>
                        @else
                            <li>Hi, {{ session()->get('user')->firstname }}</li>
                            <li><a href="/logout">Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>