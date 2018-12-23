@extends('_layout.default')

@section('title', '添加文章')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('jq-ui/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/simditor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/simditor-html.css') }}">

@stop

@section('page-content')

{{ Form::open(array('route' => 'articles.store', 'files' => true, 'role' => 'form')) }}
<!-- Header Bar -->
<div class="row header">
	<div class="col-md-12">
		<div class="meta float-left">
			<h2>添加文章</h2>
		</div>
		<div class="operate float-right">
			{{ Form::submit('发 布', array('class'=>'recommend btn btn-sm btn-primary'))}}
		</div>
	</div>
</div>
<!-- End Header Bar -->
<!-- Main Content -->
<div class="row main-content">
	<div class="col-md-12 post-content">
		<div class="row">
			<div class="col-md-8">

				<!-- 标题 -->
				<div class="post-title">
					<div class="form-group">
						<input name="title" type="text" class="form-control" placeholder="标题">
					</div>
				</div>

				<!-- 链接 -->
				<div class="post-slug" style="display: none;">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon3">{{ env('SITE_BASE_URL') }}articles/</span>
						</div>
						<input name="slug" type="text" class="form-control" placeholder="页面地址">
					</div>
				</div>

				<!-- 编辑器 -->
				<div class="post-editor form-group">
					<textarea id="editor" name="content" class="form-control" rows="12"></textarea>
				</div>

				<!-- 产品图 -->
				<div class="card">
					<div class="card-header">封面图</div>
					<div class="card-body">
						<div class="pro-pic">
							<div class="row">
								<div class="col-md-3">
									<div class="thumbnail">
										<img data-src="{{ URL::asset('holder.js/300x300') }}" src="{{ URL::asset('images/pic.png') }}">
										<div class="caption clearfix">
											<p>
												<a href="#" class="btn btn-secondary btn-sm float-left clear-thumbnail-button" role="button">删 除</a>
												<a href="#" class="btn btn-primary btn-sm float-right thumbnail-button" role="button">上 传</a>
												{{ Form::file('featured_image', array('class'=>'thumb', 'style'=>'width: 0; height: 0; visibility: hidden;')) }}
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<!-- 类型 -->
				<div class="card mb-3">
					<div class="card-header">文章类型</div>
					<div class="card-body">
						<div class="radio-group">
							<label class="radio-inline">
							<input name="type" type="radio" id="inlineRadio1" value="1" checked> 普通文章
							</label>
							<label class="radio-inline">
							<input name="type" type="radio" id="inlineRadio2" value="2"> 独立页面
							</label>
						</div>
					</div>				
				</div>
				<!-- 状态 -->
				<div class="card mb-3">
					<div class="card-header">状态</div>
					<div class="card-body">
						<div class="radio-group">
							<label class="radio-inline">
							<input name="status" type="radio" id="inlineRadio1" value="draft" checked> 待审
							</label>
							<label class="radio-inline">
							<input name="status" type="radio" id="inlineRadio2" value="published"> 通过
							</label>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Main Content -->
{{ Form::close() }}

@stop

@section('js')

<script type="text/javascript" src="{{ URL::asset('jq-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/module.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/uploader.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/simditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/beautify-html.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/simditor-html.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		(function(){
			var editor = new Simditor({
				textarea: $('#editor'),
				upload: {
					url: '{{ route("admin.articles.upload") }}',
					fileKey: 'upload_file',
					connectionCount: 3,
					leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
				},
				pasteImage: true,
				toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', '|', 'blockquote', 'table', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment', '|', 'html']
			});
		})();

		$('.thumbnail-button').on('click', function(e){
			e.preventDefault();
			$(this).parent().find('.thumb').click();
		});

		$('.clear-thumbnail-button').on('click', function(e){
			e.preventDefault();
			$(this).parent().find('.thumb').wrap('<form>').parent('form').trigger('reset');
			$(this).parent().find('.thumb').unwrap();
			$(this).parent().find('.thumb').trigger('change');
		});

		$('.thumb').on('change', function(){
			var _this = $(this);
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) {
				_this.parent().parent().parent().find('img').attr('src', "{{ URL::asset('images/pic.png') }}");
				return;
			}

			if (/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);

				reader.onloadend = function(){
					_this.parent().parent().parent().find('img').attr('src', this.result);
				}
			}
		});

		$('input[name="type"]').on('change', function(){
			var value = $(this).val();
			$('input[name="slug"]').val('');
			
			if (value == 1) {
				$('.post-slug').css('display', 'none');
			}
			else {
				$('.post-slug').css('display', 'block');
			}
		});
	})
</script>

@stop