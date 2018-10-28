@extends('layout')

@section('title', '空间')

@section('active', 'spaces')

@section('page-content')
<div class="wrapper-page container">
    <!--面包屑-->
    <div class="breadcrumb">
        <div class="breadcrumb_text">
            <span>
          	<a href="{{ URL::to('/') }}" title="">
          		首页
          	</a>
          </span>
            <i>&nbsp; / &nbsp;</i> 空间
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-3 col-md-3 col-xs-3 sidebarWrap">
            <div class=" sidebar">
                <div class="sidebar-title">
                	<img src="{{ URL::asset('assets/img/title1.jpg') }}" />
                </div>
                <div class="s-content">
                    <ul class="side-sub collapse in nav-new">
                        <li @if (!isset($sel_space)) class="active" @endif>
                            <span class="icon iconfont  icon-arrow-right"></span>
                            <a href="/spaces">全部</a>
                        </li>
                        @if (isset($spaces) && sizeof($spaces) > 0)
                        @foreach ($spaces as $space)
                        <li @if (isset($sel_space) && $sel_space == $space) class="active" @endif>
                            <span class="icon iconfont  icon-arrow-right"></span>
                            <a href="/spaces/{{ $space }}">{{ $space }}</a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-9 col-xs-9 main">
            <div class="top-option clearfix">
                <i class="glyphicon glyphicon-th"></i>
                <div class="center-num">
                    <span class="pull-left">展示</span>
                    <!-- <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select> -->
                    <!--模拟select框 start-->
                    <div class="model-select-box">
                      <div class="model-select-text" data-value="">1</div>
                      <i class="sanjiao glyphicon glyphicon-triangle-bottom"></i>
                      <ul class="model-select-option">
                        <li data-option="1">1</li>
                        <li data-option="2">2</li>
                        <li data-option="3">3</li>
                        <li data-option="4">4</li>
                        <li data-option="5">5</li>
                        <li data-option="6">6</li>
                        <li data-option="7">7</li>
                      </ul>
                    </div>
                    <!--模拟select框 end-->
                    <span class="pull-left">/ 页</span>
                </div>
                <div class="goods-order">
                    <span class="pull-left">排列方式</span>
                    <!-- <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select> -->
                    <!--模拟select框 start-->
                    <div class="model-select-box" style="width:130px; margin-right:10px;">
                      <div class="model-select-text" data-value="">默认</div>
                      <i class="sanjiao glyphicon glyphicon-triangle-bottom" style="left:83%!important;"></i>
                      <ul class="model-select-option">
                        <li data-option="a">默认</li>
                        <li data-option="b">发布时间升序</li>
                        <li data-option="c">发布时间倒序</li>
                      </ul>
                    </div>
                    <!--模拟select框 end-->
                </div>
            </div>

            <!-- @if (isset($products) && sizeof($products) > 0)
            <div class="designer buyer goods clearfix">
                @foreach ($products as $product)
                
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $product->id, 1))
                                <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
                                @else
                                <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
                                @endif
                                <a href="/products/{{ $product->slug }}"><span class="icon iconfont icon-yanjing1"></span></a>
                            </p>
                        </dt>
                        <dd>
                            <img src="{{ asset('public/images/products/' . $product->featured_image) }}">
                        </dd>
                        <div class="buyer-text"><span>{{ $product->name }}</span>
                        </div>
                    </dl>
               
                @endforeach
            </div>

            <nav class="clearfix" aria-label="page navigation">
                <?php echo $products->links(); ?>
            </nav>
            @else
            <div class="no-data">暂无数据</div>
            @endif -->
                      <!--瀑布流开始 -->

        <div class="container-fluid">
          <div class="container ">
           <div class="waterfalls  bg-hui-f1">
              <h3 style="margin-bottom: 0px;">
                <img src="../assets/img/foot/tit-water.png" alt="">
              </h3>
            </div>
              <div id="fh5co-main" class="bg-hui-f1">
                <div class="container">
                 <div class="row">
                    <div id="fh5co-board" data-columns>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_2.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Veniam voluptatum voluptas tempora debitis harum totam vitae hic quos.</div>
                            <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <a href="/products/{{ $waterfalled_product->slug }}"><span class="icon iconfont icon-sousuo clickico"  data-toggle="modal" data-target=".myModalImg" data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span></a>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_3.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Optio commodi quod vitae, vel, officiis similique quaerat odit dicta.</div>
                                <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg" data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_2.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Veniam voluptatum voluptas tempora debitis harum totam vitae hic quos.</div>
                            <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg"  data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_3.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Optio commodi quod vitae, vel, officiis similique quaerat odit dicta.</div>
                                <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg" data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_2.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Veniam voluptatum voluptas tempora debitis harum totam vitae hic quos.</div>
                            <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg"  data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_3.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Optio commodi quod vitae, vel, officiis similique quaerat odit dicta.</div>
                                <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg"  data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_2.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Veniam voluptatum voluptas tempora debitis harum totam vitae hic quos.</div>
                            <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg" data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="animate-box">
                                <img src="images/img_3.jpg" alt="Free HTML5 Bootstrap template">
                                <div class="fh5co-desc">Optio commodi quod vitae, vel, officiis similique quaerat odit dicta.</div>
                                <div class="itemHover">
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg" data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            </div>
          </div>
        </div>
    </div>
      <!--瀑布流end -->

        </div>
    </div>
 </div> 
@stop
@section('js')
<!-- Waypoints -->
<script type="text/javascript" src="{{ URL::asset('../plugin/jquery.waypoints.min.js') }}"></script>

<!-- Magnific Popup -->
<script type="text/javascript" src="{{ URL::asset('../plugin/jquery.magnific-popup.min.js') }}"></script>
<!-- Salvattore -->
<script type="text/javascript" src="{{ URL::asset('../plugin/salvattore.min.js') }}"></script>
@stop
