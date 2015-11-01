<!DOCTYPE html>
<html lang="ru">
@include('layouts.blocks.head')
<body>
	@include('layouts.blocks.flash')
@include('layouts.blocks.nav')
<div class="container-fluid">
@yield('content')
</div>
<a href="#nav">Наверх</a>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
@include('layouts.blocks.counters')
</body></html>