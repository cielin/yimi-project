@extends('layout')

@section('title', '文章')

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
            <i>&nbsp; / &nbsp;</i> 文章列表

        </div>
    </div>
    <!--面包屑-->
    <div class="min-h600">
    @if (isset($articles) && sizeof($articles) > 0)
    <?php $i = 0; ?>
    @foreach ($articles as $article)
    @if ($i % 2 === 0)
    <div class="row designer-item articles-item"> 
    @endif
        <div class="col-md-6">
            <div class="article-bg clearfix">
                @if ($article->featured_image !== "")

                <div class="article-img col-md-5">
                    <a href="/articles/{{ $article->slug }}">
                        <img src="{{ asset('public/images/articles/' . $article->featured_image) }}">
                    </a>
                </div>
                
                @endif
                <div class="designer-text article-text @if ($article->featured_image !== '') col-md-6 @else col-md @endif">
                   <h5><a href="/articles/{{ $article->slug }}"> <span>{{ $article->title }}</span></a></h5>
                    <p><a href="/articles/{{ $article->slug }}"> {{ substr(strip_tags(html_entity_decode($article->content, ENT_QUOTES, 'UTF-8')), 0, 180) }} ...</a>
                    </p>
                    <div class="more"><a href="/articles/{{ $article->slug }}">MORE <i class="icon iconfont icon-shuangjiantou"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @if ($i % 2 !== 0)
    </div>
    @endif
    <?php $i++; ?>
    @endforeach
    
    <nav class="clearfix" aria-label="page navigation">
        <?php echo $articles->links(); ?>
    </nav>
    @else
    <div class="no-data">暂无数据</div>
    @endif
</div>   
@stop