<header>
    <div class="header-area">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="social_media_links">
                            
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="index-2.html">
                                <img src="img/xlogo.png.pagespeed.ic.yEpHUukmy1.png" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="{{ route('home.index') }}">home</a></li>
                                    <li><a href="{{ route('ui.department') }}">Department</a></li>
                                    <!-- <li>
                                        <a href="#">blog <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="single-blog.html">single-blog</a></li>
                                        </ul>
                                    </li> -->
                                    <li>
                                        <a href="#">pages <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="elements.html">elements</a></li>
                                            <li><a href="about.html">about</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Patient <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('patient.register') }}">Register Patient</a></li>
                                            <li><a href="about.html">about</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('ui.doctor') }}">Doctors</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="book_btn d-none d-lg-block">
                                <a href="{{ route('search') }}">Search For Doctor</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>