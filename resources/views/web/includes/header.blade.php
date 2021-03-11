<!-- Header Section -->
	<header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s3">
		<!-- Menu Block -->
		<div class="container-fluid no-left-padding no-right-padding menu-block">
			<!-- Container -->
			<div class="container">
				<nav class="navbar ownavigation navbar-expand-lg">
					<a class="navbar-brand" href="{{ route('homepage') }}">Mini :: Blog</a>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar4" aria-controls="navbar4" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbar4">
						<ul class="navbar-nav justify-content-end">
							<li class="dropdown">

								<a class="nav-link" title="Home" href="{{ route('homepage') }}">Home</a>
							</li>
							<li class="dropdown">

								<a class="nav-link" title="Posts" href="#">Posts</a>
							</li>
                            @guest
                                <li class="dropdown">
                                    <a class="nav-link" title="Dashboard" href="{{ route('login') }}">Log In</a>
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link" title="Dashboard" href="{{ route('register') }}">Register</a>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a class="nav-link" title="Dashboard" href="{{ route('home') }}">Dashboard</a>
                                </li>
                        @endguest
						</ul>
					</div>
					
				</nav>
			</div><!-- Container /- -->
		</div><!-- Menu Block /- -->
		<!-- Search Box -->
		<div class="search-box collapse" id="search-box">
			<div class="container">
				<form>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search..." required>
						<span class="input-group-btn">
							<button class="btn btn-secondary" type="submit"><i class="pe-7s-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		</div><!-- Search Box /- -->
	</header><!-- Header Section /- -->
