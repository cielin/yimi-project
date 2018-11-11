@extends('layout')

@section('title', '设计师')

@section('page-content')
<div class="wrapper-page container" style="margin-bottom: 100px;">
    <!--面包屑-->
    <div class="breadcrumb">
        <div class="breadcrumb_text">
            <span>
                <a href="{{ URL::to('/') }}" title="">
                首页
                </a>
            </span>
            <i>&nbsp; / &nbsp;</i> 设计师列表

        </div>
    </div>
    <!--面包屑-->
    @if (isset($designers) && sizeof($designers) > 0)
    @foreach ($designers as $designer)
    <div class="row designer-item">
        <div class="col-md-6 col-sm-12">
            <div class="designer-bg clearfix">
                <div class="designer-user col-md-5  col-sm-1">
                    <a href="{{ URL::to('/designers/' . $designer->slug) }}"><img src="{{ asset('public/thumbs/designers/thumb_' . $designer->avatar) }}"></a>
                </div>
                <div class="designer-text col-md-7 col-sm-11">
                    <h5><a href="{{ URL::to('/designers/' . $designer->slug) }}"><span>{{ $designer->name }}</span></a></h5>
                    <p><a href="{{ URL::to('/designers/' . $designer->slug) }}">{{ mb_substr(strip_tags($designer->description), 0, 90) }}</a></p>
                    <div class="more"><a href="{{ URL::to('/designers/' . $designer->slug) }}">MORE <i class="icon iconfont icon-shuangjiantou"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div  class="col-md-6 col-sm-12">
            @if (count($designer->portfolios) > 0)
            <?php $i = 0; ?>
            @foreach ($designer->portfolios as $portfolio)
            <div class="col-md-6 col-sm-6 designer-img">
                <img src="{{ asset('public/thumbs/portfolios/thumb_' . $portfolio->image) }}">
            </div>
            @if ($i++ == 1)
                @break
            @endif
            @endforeach
            @else
        </div>
        <div class="col-md-3 designer-img" style="text-align: center; line-height: 2.307692rem;">
            <span style="background-color: #f7f7f7; display: inline-block; width: 100%;">暂无作品</span>
        </div>
        <div class="col-md-3 designer-img" style="text-align: center; line-height: 2.307692rem;">
            <span style="background-color: #f7f7f7; display: inline-block; width: 100%;">暂无作品</span>
        </div>
        @endif
    </div>
    @endforeach
    <nav class="clearfix" aria-label="page navigation">
        <?php echo $designers->links(); ?>
    </nav>
    @else
    <div class="no-data">暂无数据</div>
    @endif
</div>
@stop
