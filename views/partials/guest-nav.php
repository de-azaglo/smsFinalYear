<header class="continer-fluid ">
        <div  class="header-top">
            <div class="container">
                <div class="row col-det">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="ulleft">
                            <li>
                                <i class="far fa-envelope"></i>
                                lovemontessori@gmail.com
                                <span>|</span></li>
                            <li>
                                <i class="fas fa-phone-volume"></i>
                                +233 54 218 5695</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <ul class="ulright">
                            <li>
                                <i class="fab fa-facebook-square" onclick="window.location.href='https://web.facebook.com/lovemontessoriint/about';" style="cursor: pointer;"></i>
                            </li>
                            <li>
                                <i class="fab fa-instagram" onclick="window.location.href='https://www.instagram.com/love_montessori_int_school?igsh=MTlxZnJxb3NtY2JhcA==';" style="cursor: pointer;"></i>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row nav-row">
                    <div class="col-lg-3 col-md-12 logo">
                        <a href="index.html">
                            <img src="/../resource/images/logo.jpg" alt="">
                        </a>

                    </div>
                    <div class="col-lg-8 col-md-12 nav-col">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <button
                                    class="navbar-toggler"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#navbarNav"
                                    aria-controls="navbarNav"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                    <a href="/" class="nav-link <?= $_SERVER['REQUEST_URI'] === '/' ? 'active' : '' ?>">Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/about' ? 'active' : '' ?>" href="/about">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cources.html">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/contact' ? 'active' : '' ?>" href="/contact">Contact US</a>
                                    </li>

                                </ul>
                                
                                <a class="nav-btn" href="/login">
                                    <button class="btn btn-sm btn-success"> Login  </button>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>