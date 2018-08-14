@extends('layout')

@section('content')

<!--=================================
 preloader -->

<div id="preloader">
    <div class="clear-loading loading-effect"><img src="images/loading.gif" alt="" /></div>
</div>

<section id="home-slider" class="fullscreen">
    <div id="main-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!--/ Carousel item end -->
            <div class="carousel-item active h-100 bg-overlay-red" style="background: url(images/bg/bg-1.jpg ) no-repeat 0 0; background-size: cover;"  data-gradient-red="4" >
                <div class="slider-content">
                    <div class="container">
                        <div class="row carousel-caption align-items-center h-100">
                            <div class="col-md-12 text-right">
                                <div class="slider-1">
                                    <h1 class="animated2 text-white">Are You <span>Waiting</span> For <span> Dating ?</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100 bg-overlay-red" style="background: url(images/bg/bg-2.jpg ) no-repeat 0 0; background-size: cover;"  data-gradient-red="4">
                <div class="slider-content">
                    <div class="container">
                        <div class="row carousel-caption align-items-center h-100">
                            <div class="col-md-12 text-left">
                                <div class="slider-1">
                                    <h1 class="animated7 text-white">Meet big <span> and </span> beautiful love <span> here!</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Carousel item end -->
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#main-slider" data-slide="prev"> <span><i class="fa fa-angle-left"></i></span> </a> <a class="right carousel-control" href="#main-slider" data-slide="next"> <span><i class="fa fa-angle-right"></i></span> </a> </div>
</section>

<!--=================================
 banner -->

<!--=================================
 Page Section -->

<section class="form-1 py-3">
    <div class="container">
        <div class="banner-form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12">
                            <label class="control-label text-white">I am a</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <select class="selectpicker">
                                <option>Man</option>
                                <option>Woman</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <div class="col-lg-5 col-md-12">
                            <label class="control-label text-white">Seeking a</label>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <select class="selectpicker">
                                <option>Man</option>
                                <option>Woman</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-12">
                                    <label class="control-label text-white">From</label>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <select class="selectpicker">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-12">
                                    <label class="control-label text-white pl-0">To</label>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <select class="selectpicker">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"><a class="button btn-lg btn-theme full-rounded animated right-icn"><span>search <i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></a></div>
            </div>
        </div>
    </div>
</section>

<!--=================================
 Page Section -->

<section class="page-section-ptb position-relative timeline-section">
    <div class="container">
        <div class="row justify-content-center mb-5 sm-mb-3">
            <div class="col-md-10 text-center">
                <h2 class="title divider mb-3">Step to find your Soul Mate</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed <br/>
                    do eiusmod tempor incididunt ut labore et dolore magna</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <ul class="timeline list-inline">
                    <li>
                        <div class="timeline-badge"><img class="img-fluid" src="images/timeline/01.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading text-center">
                                <h4 class="timeline-title divider-3">CREATE PROFILE</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  enim ad minim veniam, quis</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge"><img class="img-fluid" src="images/timeline/02.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading text-center">
                                <h4 class="timeline-title divider-3">Find match</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  enim ad minim veniam, quis</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge"><img class="img-fluid" src="images/timeline/03.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading text-center">
                                <h4 class="timeline-title divider-3">START DATING</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  enim ad minim veniam, quis</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="page-section-ptb pb-0 text-center our-app position-relative overflow-h" style="background: url(images/pattern/01.png) no-repeat 0 0; background-size: cover;">
    <div class="timeline-inner" style="background: url(images/app-img.png);">
        <div class="container-fluid h-100">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <h2 class="title divider">Download Our App</h2>
                </div>
            </div>
            <div class="row justify-content-center justify-content-lg-start h-75">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2 class="title mb-3">Want ot find your match..!! <br/>
                        Get our app now.</h2>
                    <a class="button btn-dark btn-lg  full-rounded"><i class="fa fa-apple" aria-hidden="true"></i><span><span>available on the</span> app store</span></a> <a class="button btn-lg full-rounded white-bg text-dark"><img class="img-fluid mr-2" src="images/play-icon.png" alt=""><span><span>get it on</span> google play</span></a> </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section-ptb  text-white" style="background: url(images/pattern/02.png) no-repeat 0 0; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center mb-5 sm-mb-3">
            <div class="col-md-8 text-center">
                <h2 class="title divider">Animated Fun Facts</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="counter"> <img src="images/counter/01.png" alt="" /> <span class="timer" data-to="1600" data-speed="10000">1600</span>
                    <label>Total Members</label>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="counter"> <img src="images/counter/02.png" alt="" /> <span class="timer" data-to="750" data-speed="10000">750</span>
                    <label>Online Members</label>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="counter"> <img src="images/counter/03.png" alt="" /> <span class="timer" data-to="380" data-speed="10000">380</span>
                    <label>Men Online</label>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="counter"> <img src="images/counter/04.png" alt="" /> <span class="timer" data-to="370" data-speed="10000">370</span>
                    <label>Women Online</label>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section-ptb profile-slider pb-3 sm-pb-6">
    <div class="container">
        <div class="row justify-content-center mb-2 sm-mb-0">
            <div class="col-md-8 text-center">
                <h2 class="title divider">Last Added Profiles</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel" data-nav-arrow="true" data-items="4" data-lg-items="4" data-md-items="3" data-sm-items="2" data-space="30">
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/01.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Bill Nelson</h5>
                                <span>23 Years Old</span> </div>
                        </a> </div>
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/02.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Francisco Pierce</h5>
                                <span>21 Years Old</span> </div>
                        </a> </div>
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/03.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Nelle Townsend</h5>
                                <span>19 Years Old</span> </div>
                        </a> </div>
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/04.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Glen Bell</h5>
                                <span>20 Years Old</span> </div>
                        </a> </div>
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/05.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Bill Nelson</h5>
                                <span>22 Years Old</span> </div>
                        </a> </div>
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/06.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Francisco Pierce</h5>
                                <span>23 Years Old</span> </div>
                        </a> </div>
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/07.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Nelle Townsend</h5>
                                <span>19 Years Old</span> </div>
                        </a> </div>
                    <div class="item"> <a href="profile-details.html" class="profile-item">
                            <div class="profile-image clearfix"><img class="img-fluid w-100" src="images/profile/08.jpg" alt="" /></div>
                            <div class="profile-details text-center">
                                <h5 class="title">Glen Bell</h5>
                                <span>22 Years Old</span> </div>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section-ptb grey-bg story-slider">
    <div class="container">
        <div class="row justify-content-center mb-2 sm-mb-0">
            <div class="col-md-8 text-center">
                <h2 class="title divider">They Found True Love</h2>
            </div>
        </div>
    </div>
    <div class="owl-carousel" data-nav-dots="true" data-items="5" data-lg-items="4" data-md-items="3" data-sm-items="2" data-space="30">
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/01.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Quinnel &amp;amp; Jonet</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/02.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Adam &amp;amp; Eve</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/03.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Bella &amp;amp; Edward</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/04.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">DEMI &amp;amp; HEAVEN</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/05.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">David &amp;amp; Bathsheba</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/06.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Eros &amp;amp; Psychi</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/07.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Hector &amp;amp; Andromache</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/08.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Bonnie &amp;amp; Clyde</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/09.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Henry &amp;amp; Clare</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/10.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Casanova &amp;amp; Francesca</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/11.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">Jack &amp;amp; Sally</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="story-item">
                <div class="story-image clearfix"><img class="img-fluid w-100" src="images/story/12.jpg" alt="" />
                    <div class="story-link"><a href="stories-details.html"><i class="glyph-icon flaticon-add"></i></a></div>
                </div>
                <div class="story-details text-center">
                    <h5 class="title divider-3">James &amp;amp; Lilly</h5>
                    <div class="about-des mt-3">Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section-ptb text-white bg-overlay-black-70 bg text-center" style="background: url(images/bg/bg-4.jpg) no-repeat 0 0; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center mb-5 sm-mb-3">
            <div class="col-md-10">
                <h2 class="title divider mb-3">Nothing say better, then a video</h2>
                <p class="lead">Eum cu tantas legere complectitur, hinc utamur ea eam. Eum patrioque mnesarchum eu, diam erant convenire et vis. Et essent evertitur sea, vis cu ubique referrentur, sed eu dicant expetendis.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="title mb-3">see video</h5>
                <div class="popup-gallery"> <a href="https://www.youtube.com/embed/8xg3vE8Ie_E" class="play-btn popup-youtube"> <span><i class="glyph-icon flaticon-play-button"></i></span></a> </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section-ptb grey-bg">
    <div class="container">
        <div class="row justify-content-center mb-5 sm-mb-2">
            <div class="col-md-10 text-center">
                <h2 class="title divider mb-3">Our Recent Blogs</h2>
                <p class="lead">Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>
            </div>
        </div>
        <div class="row post-article mb-5 sm-mb-0">
            <div class="col-md-6">
                <div class="post post-artical">
                    <div class="post-image clearfix"><img class="img-fluid" src="images/blog/01.jpg" alt="" /></div>
                    <div class="post-details">
                        <div class="post-title mt-2">
                            <h5 class="title text-uppercase mt-2"><a href="blog-singal-fullwidth.html">Intentions That Energize You</a></h5>
                        </div>
                        <p>March, 2018 by<a href="#">John Doe</a></p>
                        <div class="post-icon">
                            <div class="post-content">
                                <p>Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam.Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci.</p>
                            </div>
                            <a class="button" href="blog-singal-fullwidth.html">read more..</a> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="post post-artical">
                    <div class="post-image clearfix"><img class="img-fluid" src="images/blog/02.jpg" alt="" /></div>
                    <div class="post-details">
                        <div class="post-title mt-2">
                            <h5 class="title text-uppercase mt-2"><a href="blog-singal-fullwidth.html">A Brief History Of Creation</a></h5>
                        </div>
                        <p>March, 2018 by<a href="#">John Doe</a></p>
                        <div class="post-icon">
                            <div class="post-content">
                                <p>Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam.Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci.</p>
                            </div>
                            <a class="button" href="blog-singal-fullwidth.html">read more..</a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row post-article">
            <div class="col-lg-4 col-md-6">
                <div class="post post-artical">
                    <div class="post-image clearfix"><img class="img-fluid" src="images/blog/03.jpg" alt="" /></div>
                    <div class="post-details">
                        <div class="post-title mt-2">
                            <h5 class="title text-uppercase mt-2"><a href="blog-singal-fullwidth.html">A Time Travel Postcard</a></h5>
                        </div>
                        <p>November, 2018 by<a href="#">John Doe</a></p>
                        <div class="post-icon">
                            <div class="post-content">
                                <p>Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam.</p>
                            </div>
                            <a class="button" href="blog-singal-fullwidth.html">read more..</a> </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="post post-artical">
                    <div class="post-image clearfix"><img class="img-fluid" src="images/blog/04.jpg" alt="" /></div>
                    <div class="post-details">
                        <div class="post-title mt-2">
                            <h5 class="title text-uppercase mt-2"><a href="blog-singal-fullwidth.html">Major Motives Of Our Lives</a></h5>
                        </div>
                        <p>November, 2018 by<a href="#">John Doe</a></p>
                        <div class="post-icon">
                            <div class="post-content">
                                <p>Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam.</p>
                            </div>
                            <a class="button" href="blog-singal-fullwidth.html">read more..</a> </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="post post-artical sm-mb-0">
                    <div class="post-image clearfix"><img class="img-fluid" src="images/blog/05.jpg" alt="" /></div>
                    <div class="post-details">
                        <div class="post-title mt-2">
                            <h5 class="title text-uppercase mt-2"><a href="blog-singal-fullwidth.html">All Faith Needs Feet</a></h5>
                        </div>
                        <p>November, 2018 by<a href="#">John Doe</a></p>
                        <div class="post-icon">
                            <div class="post-content">
                                <p>Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam.</p>
                            </div>
                            <a class="button" href="blog-singal-fullwidth.html">read more..</a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5 sm-mt-2">
            <div class="col-sm-10 text-center"> <a class="button  btn-lg btn-theme full-rounded animated right-icn"><span>Show More<i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></a> </div>
        </div>
    </div>
</section>
<section class="page-section-ptb pb-2 sm-pb-0 dark-bg text-white" style="background: url(images/pattern/03.png) no-repeat 0 0; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h2 class="title divider">Testimonials</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="owl-carousel" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1">
                    <div class="item">
                        <div class="testimonial bottom_pos">
                            <div class="testimonial-avatar"> <img alt="" src="images/thumbnail/thum-1.jpg"> </div>
                            <div class="testimonial-info">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                <div class="author-info"> <strong>Jack Thompson - <span>Usa</span></strong> </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial bottom_pos">
                            <div class="testimonial-avatar"> <img alt="" src="images/thumbnail/thum-2.jpg"> </div>
                            <div class="testimonial-info">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                <div class="author-info"> <strong>Miss Jorina Akter - <span>Iraq</span></strong> </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial bottom_pos">
                            <div class="testimonial-avatar"> <img alt="" src="images/thumbnail/thum-3.jpg"> </div>
                            <div class="testimonial-info">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                <div class="author-info"> <strong>Adam Cooper - <span> New york</span></strong> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section-ptb o-hidden grey-bg">
    <div class="container">
        <div class="row justify-content-center mb-5 sm-mb-0">
            <div class="col-md-10 text-center">
                <h2 class="title divider mb-3">Why Choose Us</h2>
                <p class="lead">Eum cu tantas legere complectitur, hinc utamur ea eam. Eum patrioque mnesarchum eu, diam erant convenire et vis. Et essent evertitur sea, vis cu ubique referrentur, sed eu dicant expetendis. Eum cu</p>
            </div>
        </div>
        <div class="row justify-content-center mb-5 sm-mb-3">
            <div class="col-md-10 text-center">
                <h4 class="title divider-3 text-uppercase">we are the one</h4>
            </div>
        </div>
        <div class="row mb-5 sm-mb-2">
            <div class="col-lg-3 col-md-6">
                <div class="team team-1">
                    <div class="team-images"> <img class="img-fluid" src="images/team/team1.png" alt="" /> </div>
                    <div class="team-description">
                        <div class="team-tilte">
                            <h5 class="title"><a href="team-single.html">Bill Nelson</a></h5>
                            <span>Founder</span> </div>
                        <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc.</p>
                        <div class="team-social-icon social-icons color-hover">
                            <ul>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team team-1">
                    <div class="team-images"> <img class="img-fluid" src="images/team/team2.png" alt="" /> </div>
                    <div class="team-description">
                        <div class="team-tilte">
                            <h5 class="title"><a href="team-single.html">Francisco Pierce</a></h5>
                            <span>Photographer</span> </div>
                        <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc.</p>
                        <div class="team-social-icon social-icons color-hover">
                            <ul>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team team-1">
                    <div class="team-images"> <img class="img-fluid" src="images/team/team3.png" alt="" /> </div>
                    <div class="team-description">
                        <div class="team-tilte">
                            <h5 class="title"><a href="team-single.html">Nelle Townsend</a></h5>
                            <span>Interpreter</span> </div>
                        <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc.</p>
                        <div class="team-social-icon social-icons color-hover">
                            <ul>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team team-1">
                    <div class="team-images"> <img class="img-fluid" src="images/team/team4.png" alt="" /> </div>
                    <div class="team-description">
                        <div class="team-tilte">
                            <h5 class="title"><a href="team-single.html">Glen Bell</a></h5>
                            <span>Administrator</span> </div>
                        <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc.</p>
                        <div class="team-social-icon social-icons color-hover">
                            <ul>
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="about-cntn">
                    <h5 class="title divider-3 text-uppercase mb-3">About US</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-cntn">
                    <h5 class="title divider-3 text-uppercase mb-3">who we are</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-cntn sm-mb-0">
                    <h5 class="title divider-3 text-uppercase mb-3">why we do this</h5>
                    <p class="sm-mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
 page-section -->

<section class="py-5 action-box-img bg text-center text-white bg-overlay-black-80" style="background-image:url(images/bg/bg-4.jpg)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h5 class="pb-2">Want to hear more story, subscribe for our newsletter</h5>
                <a class="button  btn-lg btn-theme full-rounded animated right-icn"><span>Subscribe<i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></a> </div>
        </div>
    </div>
</section>

@endsection