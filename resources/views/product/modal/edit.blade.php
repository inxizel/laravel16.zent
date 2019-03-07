{{-- Modal sửa todo --}}
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" id="form-edit" method="POST" role="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit todo</h4>
			</div>
			<div class="modal-body">
				
					<div class="form-group">
						<label for="">Mã sp</label>
						<input type="text" class="form-control" id="code-edit" placeholder="code">
						<label for="">Tên sp</label>
						<input type="text" class="form-control" id="name-edit" placeholder="name">
						<label for="">Giá sp</label>
						<input type="text" class="form-control" id="price-edit" placeholder="price">
						<label for="">Số lượng</label>
						<input type="text" class="form-control" id="quantity-edit" placeholder="quantity">
					</div>
				
					
				
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Edit</button>
				
			</div>
			</form>
		</div>
	</div>
</div>