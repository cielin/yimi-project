@extends('layout')

@section('title', '商品')

@section('active', 'categories')

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
            <i>&nbsp; / &nbsp;</i> 商品列表
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class=" sidebar">
            <div class="sidebar-title">
            	<img src="{{ URL::asset('assets/img/title1.jpg') }}" />
            </div>
            <div class="s-content">
            @if (isset($categories))
    		@foreach ($categories as $category)
    		<a class="side-one" href="/categories/{{ $category->slug }}">
    	  		{{ $category->name }}
    		</a>
            @if (isset($selected_parent_category) && null !== $selected_parent_category && $category->slug == $selected_parent_category->slug)
    		@if (isset($category->children) && sizeof($category->children) > 0)
    		<ul class="side-sub collapse in" id="{{ $category->slug }}">
    			@foreach ($category->children as $s_category)
    			<li @if ((null !== $selected_category) && ($s_category->slug == $selected_category->slug)) class="active" @endif>
                    <a href="/categories/{{ $s_category->slug }}">{{ $s_category->name }}</a>
                    @if (isset($s_category->children) && sizeof($s_category->children) > 0)
                    <ul class="side-sub collapse in" id="{{ $s_category->slug }}" style="padding-left: 20px">
                        @foreach ($s_category->children as $gs_category)
                            <li @if ((null !== $selected_category) && ($gs_category->slug == $selected_category->slug)) class="active" @endif>
                                <a href="/categories/{{ $gs_category->slug }}">{{ $gs_category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
    			@endforeach
    		</ul>
    		@endif
            @endif
    		@endforeach
            @endif
            </div>
            <div class="sidebar-title mt11">
                <img src="{{ URL::asset('assets/img/title2.jpg') }}" />
            </div>
            <div class="sidebar-box">
                <div class="sidebar-subtitle">选择材质</div>
                
                <div class="sidebar-content">
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                       <input value="2" class="magic-checkbox" type="checkbox" name="layout" id="cx1">
                      <label for="cx1">
                     <i style="position: absolute;left: 20px;font-size: 14px;">全部
                     </i>
                     </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="2" class="magic-checkbox" type="checkbox" name="layout" id="cx2">
                        <label for="cx2">
                            <i style="position: absolute;left: 20px;font-size: 14px;">亚麻
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="2" class="magic-checkbox" type="checkbox" name="layout" id="cx3">
                        <label for="cx3">
                            <i>埃及棉
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->

                </div>
            </div>
            <div class="sidebar-title mt11">
                <img src="{{ URL::asset('assets/img/title3.jpg') }}" />
            </div>
            <div class="sidebar-box">
                <div class="sidebar-subtitle">选择产地</div>
                <div class="sidebar-content ">
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                       <input value="2" class="magic-checkbox" type="checkbox" name="layout" id="cx4">
                      <label for="cx4">
                     <i style="position: absolute;left: 20px;font-size: 14px;">全部
                     </i>
                     </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="亚麻" class="magic-checkbox" type="checkbox" name="layout" id="cx5">
                        <label for="cx5">
                            <i style="position: absolute;left: 20px;font-size: 14px;">亚麻
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="2" class="magic-checkbox" type="checkbox" name="layout" id="cx6">
                        <label for="cx6">
                            <i>埃及棉
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="亚麻" class="magic-checkbox" type="checkbox" name="layout" id="cx7">
                        <label for="cx7">
                            <i style="position: absolute;left: 20px;font-size: 14px;">亚麻
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="亚麻" class="magic-checkbox" type="checkbox" name="layout" id="cx8">
                        <label for="cx8">
                            <i style="position: absolute;left: 20px;font-size: 14px;">亚麻
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="亚麻" class="magic-checkbox" type="checkbox" name="layout" id="cx9">
                        <label for="cx9">
                            <i style="position: absolute;left: 20px;font-size: 14px;">亚麻
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="亚麻" class="magic-checkbox" type="checkbox" name="layout" id="cx10">
                        <label for="cx10">
                            <i style="position: absolute;left: 20px;font-size: 14px;">亚麻
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->
                    <!--带样式的checkbox需要赋值不同的id start-->
                    <div class="checkboxWrap">
                        <input value="亚麻" class="magic-checkbox" type="checkbox" name="layout" id="cx11">
                        <label for="cx11">
                            <i style="position: absolute;left: 20px;font-size: 14px;">亚麻
    	           	</i>
                        </label>
                    </div>
                    <!--带样式的checkbox需要赋值不同的id end -->

                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9 main">
            <ul class="good-list-top">
                    <li class="all"><a href="#">全部</a></li>
                    <li><a href="#">单人</a></li>
                    <li><a href="#">双人</a></li>
                    <li><a href="#">三人</a></li>
                </ul>
            <div class="top-option clearfix">
                <i class="glyphicon glyphicon-th"></i>
                <div class="center-num">
                    <span>展示</span>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <span>/ 页</span>
                </div>
                <div class="goods-order">
                    <span>排列方式</span>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <div class="designer buyer goods clearfix">
                @if (isset($products) && sizeof($products) > 0)
                @foreach ($products as $product)

                <a href="/products/{{ $product->slug }}">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="{{ asset('public/images/products/' . $product ->featured_image) }}">
                        </dd>
                        <div class="buyer-text"><span>{{ $product->name }}</span>
                        </div>
                    </dl>
                </a>
                @endforeach
                @endif

            </div>

            <nav class="clearfix" aria-label="page navigation">
                <?php echo $products->links(); ?>
            </nav>
        </div>
    </div>
 </div>           
    @stop
