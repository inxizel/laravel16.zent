{{-- Modal thêm mới todo --}}
<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" data-url="/products" id="form-add" method="POST" role="form" enctype= "multipart/form-data">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add todo</h4>
			</div>
			<div class="modal-body">
				
					<div class="form-group">
						<label for="">Mã sp</label>
						<input type="text" class="form-control" id="code-add" placeholder="code">
						<label for="">Tên sp</label>
						<input type="text" class="form-control" id="name-add" placeholder="name">
						<label for="">Ảnh</label>
						<input type="file" class="form-control" id="image-add" placeholder="image">
						<label for="">Giá sp</label>
						<input type="text" class="form-control" id="price-add" placeholder="price">
						<label for="">Số lượng</label>
						<input type="text" class="form-control" id="quantity-add" placeholder="quantity">
					</div>
				
					
				
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
			</div>
			</form>
		</div>
	</div>
</div>