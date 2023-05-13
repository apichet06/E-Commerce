<!-- Modal -->
					<div class="modal fade" id="modal_stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Update Stock</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="update_stock" name="update_stock" method="post">
										<div class="form-group row">
											<label for="staticEmail" class="col-sm-3 col-form-label">Product Name:</label>
											<div class="col-sm-9">
												<span id="name"></span>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Stock :</label>
											<div class="col-sm-9">
												<input type="text" name="stock" class="form-control" id="stock" placeholder="Stock">
												<input type="text" name="id" id="id" class="form-control" hidden>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Update Stock</button>
										</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
