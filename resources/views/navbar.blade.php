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
                            <li> <a href="/"><img src="images/yeedate_logo.png" alt="logo" /> </a> </li>
                        </ul>
                        <!-- menu links -->
                        <ul class="menu-links">
                            <!-- active class -->
                            <li class="{{ Request::is('home') ? "active" : null }}">
                                <a href="/home">Home</a>
                            </li>
                            <li class="{{ Request::is('profile') ? "active" :
                                            Request::is('password') ? "active" :
                                                Request::is('preferences') ? "active" :
                                                    Request::is('photos') ? "active" : null}}">
                                <a href="/profile">My Profile</a>
                            </li>
                            <li><a href="javascript:void(0)">Stories <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel left-menu">
                                    <li><a href="stories.html">Stories 01</a></li>
                                    <li><a href="stories-2.html">Stories 02</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"> Blog <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel left-menu">
                                    <li><a href="javascript:void(0)">Blog Classic <i class="fa fa-angle-right fa-indicator"></i></a>
                                        <ul class="drop-down-multilevel right-menu">
                                            <li><a href="blog-left.html">Left Sidebar</a></li>
                                            <li><a href="blog-right.html">Right Sidebar</a></li>
                                            <li><a href="blog-fullwidth.html">Fullwidth</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Blog Masonry <i class="fa fa-angle-right fa-indicator"></i></a>
                                        <ul class="drop-down-multilevel right-menu">
                                            <li><a href="blog-masonry-2-columns.html">2 Columns</a></li>
                                            <li><a href="blog-masonry-3-columns.html">3 Columns</a></li>
                                            <li><a href="blog-masonry-fullwidth.html">Fullwidth</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Blog Single <i class="fa fa-angle-right fa-indicator"></i></a>
                                        <ul class="drop-down-multilevel right-menu">
                                            <li><a href="blog-singal-left.html">Single Left</a></li>
                                            <li><a href="blog-singal-right.html">Single Right</a></li>
                                            <li><a href="blog-singal-fullwidth.html">Single Fullwidth</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"> Shortcodes <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down full width -->
                                <div class="drop-down grid-col-12">
                                    <!--grid row-->
                                    <div class="grid-row">
                                        <!--grid column 3-->
                                        <div class="grid-col-3">
                                            <ul>
                                                <li><a href="elements-accordions.html"><i class="fa fa-list-ul"></i> accordions </a></li>
                                                <li><a href="elements-action-box.html"><i class="fa fa-rocket"></i> action box</a></li>
                                                <li><a href="elements-alerts-and-callouts.html"><i class="fa fa-info-circle"></i> alerts and callouts</a></li>
                                                <li><a href="elements-buttons.html"><i class="fa fa-external-link"></i> buttons</a></li>
                                                <li><a href="elements-carousel-slider.html"><i class="fa fa-exchange"></i> carousel slider</a></li>
                                            </ul>
                                        </div>
                                        <!--grid column 3-->
                                        <div class="grid-col-3">
                                            <ul>
                                                <li><a href="elements-columns.html"><i class="fa fa-th"></i> columns</a></li>
                                                <li><a href="elements-content-box.html"><i class="fa fa-file-text-o"></i> content box</a></li>
                                                <li><a href="elements-counter.html"><i class="fa fa-sort-numeric-asc"></i> counter</a></li>
                                                <li><a href="elements-data-table.html"><i class="fa fa-table"></i> data table</a></li>
                                                <li><a href="elements-lists-style.html"><i class="fa fa-th-list"></i> lists style</a></li>
                                            </ul>
                                        </div>
                                        <!--grid column 3-->
                                        <div class="grid-col-3">
                                            <ul>
                                                <li><a href="elements-post-style.html"> <i class="fa fa-photo"></i> post style</a></li>
                                                <li><a href="elements-timeline.html"><i class="fa fa-tasks"></i>Timeline</a></li>
                                                <li><a href="elements-social-icon.html"><i class="fa fa-share-alt"></i> social icon</a></li>
                                                <li><a href="elements-testimonial.html"><i class="fa fa-quote-left"></i> testimonial</a></li>
                                                <li><a href="elements-tabs.html"><i class="fa fa-star"></i> tabs</a></li>
                                            </ul>
                                        </div>
                                        <!--grid column 3-->
                                        <div class="grid-col-3">
                                            <ul>
                                                <li><a href="elements-team.html"><i class="fa fa-users"></i> team</a></li>
                                                <li><a href="elements-typography.html"><i class="fa fa-italic"></i> typography</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="javascript:void(0)"> Contact <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel right-menu">
                                    <li><a href="contact-1.html">Contact 1</a></li>
                                    <li><a href="contact-2.html">Contact 2</a></li>
                                    <li><a href="contact-3.html">Contact 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
    <!-- menu end -->
</div>