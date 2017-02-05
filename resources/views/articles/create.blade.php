<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form action="{{route('article.store')}}" method="post">

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
		{!! csrf_field() !!}
		
		<div>文章名称 <input type="text" name="title"></div>
		<div>作者名称 <input type="text" name="author"></div>
		<div>简介 <input type="text" name="desc"></div>
		<div>副标题 <input type="text" name="short_title"></div>
		<div>状态 <input type="radio" name="status" value="1">是 <input value="2" type="radio" name="status"> 否</div>
		<button>提交</button>	
	</form>
</body>
</html>