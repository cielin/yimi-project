@extends('layout')

@section('title', '首页')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('plugin/swiper/css/swiper.css') }}" />
<!-- Animate.css -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/animate.css') }}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/magnific-popup.css') }}">
<!-- Salvattore -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/salvattore.css') }}">
<!-- Theme Style -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/style.css') }}">
<style type="text/css">
/* Navbar light 首页的头*/

.navbar-transparent.navbar-light {
    background: transparent;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
.navbar-light {
    background: rgba(89, 89, 89, 0.8);
    -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
}
.container,.container-fluid{
    padding-left:0;
    padding-right:0;
}
.waterfalls{
    margin-top:7px;
}
.waterfalls .titWater h3{
    margin-bottom: 0px;
    padding-top:26px;
}
#fh5co-main{
    padding-top: 0px!important;
    margin-top: -2px;
    padding-bottom: 50px;
}
/**************/
</style>

@stop

@section('page-content')
<div class="wrapper">
    <div class="sowingMap">
        <div class="swiper-container swiper1">
            <div class="swiper-wrapper">
                @if (isset($top_banners))
                @foreach ($top_banners as $top_banner)
                <div class="swiper-slide">
                    <img src="{{ asset('public/images/banners/' . $top_banner->image) }}">
                </div>
                @endforeach
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
        </div>
    </div>

</div>
@section('js')

<script type="text/javascript" src="{{ URL::asset('assets/js/index.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/global.js') }}"></script>
<!-- Waypoints -->
<script type="text/javascript" src="../plugin/jquery.waypoints.min.js"></script>
<!-- Magnific Popup -->
<script type="text/javascript" src="{{ URL::asset('plugin/jquery.magnific-popup.min.js') }}"></script>
<!-- Salvattore -->
<script type="text/javascript" src="{{ URL::asset('plugin/salvattore.min.js') }}"></script>
<!-- Main JS -->
<script type="text/javascript" src="{{ URL::asset('plugin/main.js') }}"></script>

@stop
