@extends('layout')

@section('title', '文章')

@section('page-content')
<!--面包屑-->
<div class="breadcrumb">
    <div class="breadcrumb_text">
        <span>
            <a href="{{ URL::to('/') }}" title="">
            首页
            </a>
        </span>
        <i>&nbsp; / &nbsp;</i> 文章列表

    </div>
</div>
<!--面包屑-->
@if (isset($articles) && sizeof($articles) > 0)
<?php $i = 0; ?>
@foreach ($articles as $article)
@if ($i % 2 === 0)
<div class="row designer-item"> 
@endif
    <div class="col-md-6">
        <div class="designer-bg clearfix">
            <div class="article-img col-md-5">
                <img src="{{ asset('public/images/articles/' . $article ->featured_image) }}">
            </div>
            <div class="designer-text col-md-7">
                <h5><span>{{ $article->title }}</span></h5>
                <p>{{ substr(strip_tags(html_entity_decode($article->content, ENT_QUOTES, 'UTF-8')), 0, 180) }} ...</p>
                <div class="more"><a href="/articles/{{ $article->slug }}">MORE >></a>
                </div>
            </div>
        </div>
    </div>
@if ($i % 2 === 0)
</div>
@endif
<?php $i++; ?>
@endforeach
@endif

<nav class="clearfix" aria-label="page navigation">
    <?php echo $articles->links(); ?>
</nav>
    
@stop