<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Todo</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<a href="/todos/create" class="btn btn-success">Add</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Todo</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
			
					
					@foreach ($data as $row)
					<tr>
						<td>{{$row->id}}</td>
						<td>{{$row->todo}}</td>
						<td>{{$row->created_at}}</td>
						<td>{{$row->updated_at}}</td>
						<td>
							<a style="display: inline-block; width: 67px;" href="/todos/{{$row->id}}" class="btn btn-success">Detail</a>
							<a style="display: inline-block; width: 67px;" href="/todos/{{$row->id}}/edit" class="btn btn-warning">Edit</a>

							<a style="display: inline-block; width: 67px;" href="/todos/{{$row->id}}/destroy" class="btn btn-danger">Destroy</a>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $data->links() }}
		</div>
	</div>
</body>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>