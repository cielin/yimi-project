@extends('layout')

@section('title', $article->title . '_文章')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custorm.css') }}" />

@stop

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

            <i>&nbsp; / &nbsp;</i>
            <span>
                <a href="{{ route('articles.index') }}" title="">
                文章列表
                </a>
            </span>
            <i>&nbsp; / &nbsp;</i> 正文
        </div>
    </div>
    <!--面包屑-->
    <div class="bg-hui-f7 container">
        <div class="articles-wrap">
            <h2 class="articles-title">{{ $article->title }}</h2>
            <div class="article-cont">
                {!! html_entity_decode($article->content, ENT_QUOTES, 'UTF-8') !!}
            </div>
        </div>
    </div>
</div>
@stop