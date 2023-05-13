<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title></title>
	<?php require_once '../css/link_css.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<?php require_once '../menu/menu.php' ?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Manages Images</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Manages Images</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">

							<div class="card">
								<div class="card-body">
									<nav>
										<div class="nav nav-tabs" id="nav-tab" role="tablist">
											<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Manages Image Header</a>
											<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Manages Image Footer</a>

										</div>
									</nav>
									<div class="tab-content" id="nav-tabContent">
										<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
											<div class="container-fluid"> <hr>
												<div class="row">
													<div class="col-md-12">
														<?php $sql = mysqli_query($conn,"SELECT * FROM images_header "); 
														$rs = mysqli_fetch_assoc($sql);?>
														<div class="row">
															<div class="col-md-9">
																<div class="card">
																	<div class="card-body">
																		<h6>Slide Images</h6>
																		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
																			<div class="carousel-inner">
																				<div class="carousel-item active">
																					<img src="images/<?=$rs['img_header1']?>" class="d-block w-100" style=" height: 350px;">
																				</div>
																				<div class="carousel-item">
																					<img src="images/<?=$rs['img_header2']?>" class="d-block w-100" style=" height: 350px;">
																				</div>
																				<div class="carousel-item">
																					<img src="images/<?=$rs['img_header3']?>" class="d-block w-100" style=" height: 350px;">
																				</div>
																			</div>
																			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
																				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
																				<span class="sr-only">Previous</span>
																			</a>
																			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
																				<span class="carousel-control-next-icon" aria-hidden="true"></span>
																				<span class="sr-only">Next</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-3">
																<div class="row">
																	<div class="col-md-12">
																		<div class="card">
																			<div class="card-body">
																				<h6>Above Images </h6>
																				<img src="images/<?=$rs['img_header4']?>" width="100%" height="145" >
																			</div>
																		</div>
																	</div>	
																	<div class="col-md-12">
																		<div class="card">
																			<div class="card-body">
																				<h6>Below Images </h6>
																				<img src="images/<?=$rs['img_header5']?>" width="100%" height="145" >
																			</div>
																		</div>
																	</div>	
																</div>
															</div>
														</div>
													</div>

													<!-- ############################### -->
													<!-- #        insert images 	   # -->
													<!-- ############################### -->

													<div class="col-md-4">
														<div class="card">
															<div class="card-body">
																<h6>Uploads Slide Images  (Size 800x300 Pixel)</h6>
																<form  id="insert_images_slide"  method="post" accept-charset="utf-8">
																	<div class="custom-file-container" data-upload-id="myUniqueUploadId">
																		<label> Limit 3 Images <strong class="text-danger"> * </strong> <a href="javascript:void(0)"  class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
																		</label>
																		<label class="custom-file-container__custom-file" >
																			<input type="file" id="clear" class="custom-file-container__custom-file__custom-file-input" name="file[]" accept="image/*"  multiple aria-label="Choose File" required>
																			<span class="custom-file-container__custom-file__custom-file-control"></span>
																		</label>
																		<div class="custom-file-container__image-preview mx-auto"  style="height: 175px;"></div>
																	</div>
																	<div class="modal-footer">
																		<div class="spinner-grow slide_img spinner-grow-sm text-warning"></div>
																		<div class="spinner-grow slide_img text-success" style="width:20px; height:20px;"></div>
																		<div class="spinner-grow slide_img text-danger"></div>
																		<button type="submit" id="slide_img" class="btn btn-sm btn-info">Submit</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="card">
															<div class="card-body">
																<h6>Uploads Above Images (Size 430x160 Pixel)</h6>
																<form  id="images_above"  method="post" accept-charset="utf-8">
																	<div class="custom-file-container" data-upload-id="myUniqueUploadId1">
																		<label> Limit 1 Images <strong class="text-danger"> * </strong> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
																		</label>
																		<label class="custom-file-container__custom-file" >
																			<input type="file" id="clear1" class="custom-file-container__custom-file__custom-file-input" name="file1" accept="image/*" aria-label="Choose File" required>
																			<span class="custom-file-container__custom-file__custom-file-control"></span>
																		</label>
																		<div class="custom-file-container__image-preview mx-auto"  style="height: 175px;"></div>
																	</div>
																	<div class="modal-footer">
																		<div class="spinner-grow above_img spinner-grow-sm text-warning"></div>
																		<div class="spinner-grow above_img text-success" style="width:20px; height:20px;"></div>
																		<div class="spinner-grow above_img text-danger"></div>
																		<button type="submit" id="above_img" class="btn btn-sm btn-info">Submit</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="card">
															<div class="card-body">
																<h6>Uploads Below Images (Size 430x160 Pixel)</h6>
																<form  id="images_below" method="post" accept-charset="utf-8">
																	<div class="custom-file-container" data-upload-id="myUniqueUploadId2">
																		<label> Limit 1 Images <strong class="text-danger"> * </strong> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
																		</label>
																		<label class="custom-file-container__custom-file" >
																			<input type="file" id="clear2" class="custom-file-container__custom-file__custom-file-input" name="file2" accept="image/*" aria-label="Choose File" required>
																			<span class="custom-file-container__custom-file__custom-file-control"></span>
																		</label>
																		<div class="custom-file-container__image-preview mx-auto"  style="height: 175px;"></div>
																	</div>
																	<div class="modal-footer">
																		<div class="spinner-grow below_img spinner-grow-sm text-warning"></div>
																		<div class="spinner-grow below_img text-success" style="width:20px; height:20px;"></div>
																		<div class="spinner-grow below_img text-danger"></div>
																		<button type="submit" id="below_img" class="btn btn-sm btn-info">Submit</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
											<div class="container-fluid">
												<div class="row">
													<div class="col-md-12"><hr>
														<div class="row">
															<div class="col-md-7">
																<div class="card">
																	<div class="card-body">
																		<h6>Left Images </h6>
																		<img src="images/<?=$rs['img_header6']?>" width="100%" height="230" >
																	</div>
																</div>
															</div>	
															<div class="col-md-5">
																<div class="card">
																	<div class="card-body">
																		<h6>Right Images </h6>
																		<img src="images/<?=$rs['img_header7']?>" width="100%" height="230" >
																	</div>
																</div>
															</div>	
														</div>
													</div>

													<div class="col-md-4">
														<div class="card">
															<div class="card-body">
																<h6>Uploads Left Images (Size 1090x245 Pixel)</h6>
																<form  id="images_left"  method="post" accept-charset="utf-8">
																	<div class="custom-file-container" data-upload-id="myUniqueUploadId3">
																		<label> Limit 1 Images <strong class="text-danger"> * </strong> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
																		</label>
																		<label class="custom-file-container__custom-file" >
																			<input type="file" id="clear1" class="custom-file-container__custom-file__custom-file-input" name="file3" accept="image/*" aria-label="Choose File" required>
																			<span class="custom-file-container__custom-file__custom-file-control"></span>
																		</label>
																		<div class="custom-file-container__image-preview mx-auto"  style="height: 175px;"></div>
																	</div>
																	<div class="modal-footer">
																		<div class="spinner-grow left_img spinner-grow-sm text-warning"></div>
																		<div class="spinner-grow left_img text-success" style="width:20px; height:20px;"></div>
																		<div class="spinner-grow left_img text-danger"></div>
																		<button type="submit" id="left_img" class="btn btn-sm btn-info">Submit</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="card">
															<div class="card-body">
																<h6>Uploads Right Images (Size 530x245 Pixel)</h6>
																<form  id="images_right" method="post" accept-charset="utf-8">
																	<div class="custom-file-container" data-upload-id="myUniqueUploadId4">
																		<label> Limit 1 Images <strong class="text-danger"> * </strong> <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
																		</label>
																		<label class="custom-file-container__custom-file" >
																			<input type="file" id="clear2" class="custom-file-container__custom-file__custom-file-input" name="file4" accept="image/*" aria-label="Choose File" required>
																			<span class="custom-file-container__custom-file__custom-file-control"></span>
																		</label>
																		<div class="custom-file-container__image-preview mx-auto"  style="height: 175px;"></div>
																	</div>
																	<div class="modal-footer">
																		<div class="spinner-grow right_img spinner-grow-sm text-warning"></div>
																		<div class="spinner-grow right_img text-success" style="width:20px; height:20px;"></div>
																		<div class="spinner-grow right_img text-danger"></div>
																		<button type="submit" id="right_img" class="btn btn-sm btn-info">Submit</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				
			</section>
		</div>
		<?php require_once '../footer/footer.php'; ?>
	</div>
	<?php require_once '../js/link_js.php'; ?>
	<script type="text/javascript" src="ajax.js"></script>
	<script type="text/javascript">
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if (activeTab) {
			$('a[href="' + activeTab + '"]').tab('show');
		}
	</script>
</body>
</html>