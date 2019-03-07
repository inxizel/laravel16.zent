<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Todo</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<a href="/todos_ajax/create" class="btn btn-success">Add</a>
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
							<button style="display: inline-block; width: 67px;" data-id='{{$row->id}}' class="btn btn-success btn-show">Detail</button> 
							<a style="display: inline-block; width: 67px;" href="/todos_ajax/{{$row->id}}/edit" class="btn btn-warning">Edit</a>
							<button  style="display: inline-block; width: 67px;" data-id='{{$row->id}}' class="btn btn-danger btn-delete">Destroy</button>
						
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $data->links() }}
		</div>
	</div>
	<div class="modal fade" id="modal-show">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Show todo</h4>
				</div>
				<div class="modal-body" style="text-align: center;">
					<h2>Todo:</h2>
					<h3 id="todo-show"></h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf-8">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$(document).ready(function () {
			$('.btn-show').click(function(){
				$('#modal-show').modal('show');
				var id = $(this).data('id');
				$.ajax({
					type: 'get',
					url : '/todos_ajax/' + id,
					success : function(res){
						$('#todo-show').html(res.todo);
					}
				})
			});

			
			$('.btn-delete').click(function(){

				var id = $(this).data('id');
				$.ajax({
					type: 'post',
					url : '/todos_ajax/' + id,
					data: {
						_method : 'delete'
					},
					success : function(res){
						alert('Xóa thành công!');
					}
				})
			});
		})
	</script>
</body>
</html>