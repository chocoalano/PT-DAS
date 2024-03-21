<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="index.html">
                <span>
                    Esigned
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}" wire:navigate.hover>Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}" wire:navigate.hover> About </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wwd') }}" wire:navigate.hover> What we do </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product') }}" wire:navigate.hover> Product </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}" wire:navigate.hover>Contact us</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <a href="">
                            <img src="{{ asset('assets/compro/images/user.png') }}" alt="">
                        </a>
                        <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
