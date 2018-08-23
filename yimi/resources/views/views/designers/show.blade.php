@extends('layout')

@section('title', $designer->name . '_设计师')

@section('css')

<style type="text/css">
    .desiger > div {
        width: 200px;
        height: 200px;
        margin: 0 auto 36px;
    }
    .desiger img {
        width: 100%;
        height: 100%;
        border-radius: 100%;
    }
    /*.d-detail-img div img {
        border: solid 1px rgb(247, 247, 247);
    }*/
</style>

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
                <a href="{{ route('designers.index') }}" title="">
                设计师列表
                </a>
            </span>
            <i>&nbsp; / &nbsp;</i> {{ $designer->name }}
        </div>
    </div>
    <!--面包屑-->
    <div class="bg-hui-f7 container">
        <div class="desiger">
            <div>
                <img src="{{ asset('public/images/designers/' . $designer->avatar) }}" alt="">
            </div>
            <h2>{{ $designer->name }}</h2>
            {!! html_entity_decode($designer->description, ENT_QUOTES, 'UTF-8') !!}
        </div>
    </div>
    <div class="d-detail-img" id="littleImg">
        @foreach ($designer->products as $product)
        <div>
            <img src="{{ asset('public/thumbs/products/thumb_' . $product->featured_image) }}" alt="" data-toggle="modal" data-target=".myModalImg">
            <input type="hidden" name="field＿name" value="{{ asset('public/images/products/' . $product->featured_image) }}">
        </div>
        @endforeach
    </div>
    <div class="modal fade myModalImg" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="{{ URL::asset('assets/img/close.png') }}">
                </button>
                <div class="modal-body">
                    <img id="bigImg" src="">
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
    @stop

@section('js')

<script src="{{ URL::asset('/assets/js/designerDetail.js') }}"></script>

@stop
