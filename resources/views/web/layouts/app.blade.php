<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">


	<title>@yield('title') :: MiniBlog</title>
    @toastr_css

	@include('web.includes.style')

</head>

<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
	<!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
		</div>
	</div><!-- Loader /- -->

    @include('web.includes.header')

	<div class="main-container">

		<main class="site-main">
            @yield('content')
		</main>

	</div>

	<!-- Footer Main -->
        @include('web.includes.footer')
	<!-- Footer Main /- -->

	@include('web.includes.scripts')
    @toastr_js

</body>
    @toastr_render
</html>
