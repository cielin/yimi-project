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

    <nav class="clearfix" aria-label="page navigation">
        <?php echo $designers->links(); ?>
    </nav>
    @else
    <div class="no-data">暂无数据</div>
    @endif
</div>
@stop
