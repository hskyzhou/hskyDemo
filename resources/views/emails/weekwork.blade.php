{{-- 
@if($data)
	<ul>
	@foreach($data as $date => $list)
		<li>
			<span>{{$date}}</span>
			@foreach($list as $info)
				<p>{{$info['name']}}</p>
			@endforeach
		</li>
	@endforeach
	</ul>
@endif --}}

<table border="1">
	<thead>
		<tr>
			<th>项目</th>
			<th>内容</th>
			<th>时间</th>
		</tr>
	</thead>
	<tbody>

		@foreach($data as $belong_project => $list)
			<tr>
				<td>{{$belong_project}}</td>
				<td>
					@foreach($list as $key => $info)
						<p>{{++$key}}. {{$info['name']}}</p>
					@endforeach
				</td>
				<td></td>
			</tr>
		@endforeach
		
	</tbody>
</table>