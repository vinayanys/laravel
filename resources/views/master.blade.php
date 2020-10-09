<html>
<body>
	<header>
		<h1>Blog Vinaya Ainunissa</h1>
		<nav>
			<a href="/home">HOME</a>
			|
			<a href="/about">ABOUT</a>
			|
			<a href="/article">ARTICLE</a>
		</nav>
	</header>
	<br/>
	<br/>
	<h2> Title : @yield('title')</h2>
	@section('sidebar')
	@show
	<b></b>
	@yield('content1')
	<footer>
		<p>&copy; <a href="https://www.google.com">www.google.com</a></p>
	</footer>

</body>
</html>