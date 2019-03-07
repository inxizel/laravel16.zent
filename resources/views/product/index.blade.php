<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Todo</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
	<div class="container">
		<a class="btn btn-success btn-add">Add</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Mã Sp</th>
						<th>Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
						<th>Updated at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
			
					
					@foreach ($data as $row)
					<tr>
						<td>{{$row->id}}</td>
						<td>{{$row->code}}</td>
						<td>{{$row->name}}</td>
						<td>{{number_format($row->price)}}</td>
						<td>{{$row->quantity}}</td>
						<td>{{$row->created_at}}</td>
						<td>{{$row->updated_at}}</td>
						<td>
							<button style="display: inline-block; width: 67px;" data-id='{{$row->id}}' class="btn btn-success btn-show">Detail</button> 
							<a style="display: inline-block; width: 67px;" data-id='{{$row->id}}' class="btn btn-warning btn-edit">Edit</a>
							<button  style="display: inline-block; width: 67px;" data-id='{{$row->id}}' class="btn btn-danger btn-delete">Destroy</button>
						
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $data->links() }}
		</div>
	</div>

	@include('product.modal.add')
	@include('product.modal.show')
	@include('product.modal.edit')
	
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
	
	<script type="text/javascript" charset="utf-8">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$(document).ready(function () {
			$('.btn-edit').click(function(){
				var id = $(this).data('id');
				$.ajax({
					type: 'get',
					url : '/products/' + id,
					success : function(res){
						// add url post update
						$('#form-edit').attr('data-url','{{ asset('products/') }}/'+ res.id);


						$('#code-edit').val(res.code);
						$('#name-edit').val(res.name);
						$('#price-edit').val(res.price);
						$('#quantity-edit').val(res.quantity);
					}
				})
				$('#modal-edit').modal('show');

				//bắt sự kiện submit form thêm mới
				$('#form-edit').submit(function (e) {
					e.preventDefault();
					//lấy attribute data-url của form lưu vào biến url
					var url = $(this).attr('data-url');

				
					$.ajax({
						//sử dụng phương thức post
						type: 'put',
						url: url,
						data: {
							//lấy dữ liệu từ ô input trong form thêm mới
							code: $('#code-edit').val(),
							name: $('#name-edit').val(),
							price: $('#price-edit').val(),
							quantity: $('#quantity-edit').val()
						},
						success: function (response) {
							// hiện thông báo thêm mới thành công bằng toastr
							console.log(response);
							toastr.success('Edit success!' );
							//ẩn modal add đi
							$('#modal-edit').modal('hide');
							setTimeout(function () {
								window.location.href="/products";
							},1000);
						},
						error: function (jqXHR, textStatus, errorThrown) {
							//xử lý lỗi tại đây
						}
					})
				})
			});

			$('.btn-add').click(function(){
				
				$('#modal-add').modal('show');

				//bắt sự kiện submit form thêm mới
				$('#form-add').submit(function (e) {

					//var token = $('meta[name="csrf-token"]').attr('content');
					
					var data = new FormData();
					
					data.append('image', $('#image-add')[0].files[0]);
					data.append('code', $('#code-add').val());
					data.append('name', $('#name-add').val());
					data.append('price', $('#price-add').val());
					data.append('quantity', $('#quantity-add').val());

					e.preventDefault();
					//lấy attribute data-url của form lưu vào biến url
					var url = $(this).attr('data-url');
				
					$.ajax({
						//sử dụng phương thức post
						type: 'post',
						url: url,
						processData: false,
						contentType: false,

						data: data,
						success: function (response) {
							// hiện thông báo thêm mới thành công bằng toastr
							toastr.success('Add new success!')
							//ẩn modal add đi
							$('#modal-add').modal('hide');
							setTimeout(function () {
								window.location.href="/products";
							},800);
						},
						error: function (jqXHR, textStatus, errorThrown) {
							//xử lý lỗi tại đây
						}
					})
				})
			});


			$('.btn-show').click(function(){
				$('#modal-show').modal('show');
				var id = $(this).data('id');
				$.ajax({
					type: 'get',
					url : '/products/' + id,
					success : function(res){
						$('#todo-show').html(res.name);
					}
				})
			});

			
			$('.btn-delete').click(function(){

				var id = $(this).data('id');
				$.ajax({
					type: 'post',
					url : '/products/' + id,
					data: {
						_method : 'delete'
					},
					success : function(res){
						toastr.success('Delete success!')
						setTimeout(function () {
							window.location.href="/products";
						},800);
					}
				})
			});
		})
	</script>
</body>
</html>