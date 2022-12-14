
<?php
	ob_start();
	// session_start();
    $title = 'chi tiết sản phẩm';
	$baseUrl = '../';
	include_once ($baseUrl.'FE/Layout/header.php');
    $fullname = "";
    $id_user = "";
    if(isset($_SESSION['fullname']) && isset($_SESSION['id'])){
        $fullname = $_SESSION['fullname'];
        $id_user = $_SESSION['id'];
    }
?>

<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/chitiet.css">

<div class="grid wide">
    <div class="chitiet-chitiet ">
		<div class="form-active-chitiet ">
			<?php
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_single.php?id='.$id;
					$json = file_get_contents($url);
					$data = json_decode($json);
					if(isset($data->message)){
						header('Location:../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/');
						die();
					}
					foreach($data->data as $item){
						
						// $_SESSION['product_id'] = $item->id;
						// $_SESSION['title'] = $item->title;
						// $_SESSION['thumnail'] = $item->thumnail;
						// $_SESSION['price'] = $item->price;
						echo '<div class="header-chitiet-content">
									<h3>
										'.$item->title.'
									</h3>
									
								</div> 
								<div class="chitiet-container l-12 m-12 c-12">
									<div class="chitiet-container-img-content l-4">
										<div class="chitiet-container-img">
											<div class="chitiet-container-above">
												<img src="../assets/photos/'.$item->thumnail.'" alt="Điện thoại hình ảnh ở trên" class="chitiet-container-above-img">
											</div>
											
											<ul class="chitiet-container-below">
											<li class="chitiet-container-below-img">
												<a href="#" class="chitiet-container-link">
													<div class="chitiet-container-hinhnho">
														<img src="../assets/img/icon_hot.svg" alt="icon hot" class="chitiet-container-below-img-concon">
													</div>
													<span class = "chitiet-container-tenhinh">Điểm nổi bật</span>
												</a>
											</li>
											';
					}
								foreach($data->data as $item){
									foreach($item->img as $img){
										echo '
											
											<li class="chitiet-container-below-imgimg">
												<a href="#" class="chitiet-container-link">
													<div class="chitiet-container-hinhnho">
														<img src="../assets/photos/'.$img->img_desct.'" alt="Điện thoại hình ảnh ở dưới" class="chitiet-container-below-img-con">
													</div>
													
												</a>
											</li>
											
											';
									}
								}
						foreach($data->data as $item){
									echo '
											<li class="chitiet-container-below-img">
												<a href="#" class="chitiet-container-link">
													<div class="chitiet-container-hinhnho">
														<img src="../assets/img/icon_camera.svg" alt="icon icon_camera" class="chitiet-container-below-img-concon">
													</div>
													<span class = "chitiet-container-tenhinh">Chụp từ camera</span>
												</a>
											</li>
									</ul>
								</div>
							</div>
						<div class="chitiet-container-embrace l-5">
										<div class="chitiet-container-price">
											<h3>Giá: </h3>
											<div class="gia-chitiet">
												<h4 class = "gia-chitiet__1">'.($item->price-$item->price*$item->discount).'</h4><sup class = "sub-chitiet">đ</sup>
												<h4 class = "gia-chitiet__2">'.$item->price.'</h4><sup>đ</sup>
											</div>
										</div>
										<div class="chitiet-container-nhandat">
											<span>Nhận đặt trước</span>
										</div>
							
										
											<div class="chitiet-container-chitiet-khuyenmai">
												<h4>Khuyến Mãi</h4>
												
												<ul class="chitiet-container-chitiet-khuyenmai-list">';
												foreach($data->data as $item){
													foreach($item->discount_text as $dis){
														echo '
														<li class="chitiet-container-chitiet-khuyenmai-item">
															'.$dis->discount_text.'
														</li>
														';
													}
												}
									 			foreach($data->data as $item){
													echo '
													</ul>
													</div>
													<form action="#" method ="post">
														<input type="hidden" name="Hinhanh" value="'.$item->thumnail.'" >
														<input type="hidden" name="Giasp" value="'.$item->price.'">
														<input type="hidden" name="Giamsale" value="'.$item->discount.'">
														<input type="hidden" name="Tensp" value="'.$item->title.'">
														<input type="hidden" name="idSanPham" value="'.$item->id.'">
														<input class="chitiet-container-type-btn" type="submit" name="add_cart" value="Thêm vào giỏ hàng">
													</form>
													<div class="chitiet-buton-thanhtoan">
														<button class="chitiet-container-type-btn-tragop-phantram">
														<h4>Mua trả góp 0%</h4>
														<span>Duyệt hồ sơ trong 5 phút </span>
														</button>
		
														<button class="chitiet-container-type-btn-tragop-the" >
														<h4> Trả góp qua thẻ</h4>
														<span>Visa, Mastercart, JCB, Amex</span>
														</button>
													</div>
													<div class="chitiet-container-copy">
														<button class= "chitiet-container-copy-link">
															<span class="chitiet-container-boder">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
																	<path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
																	<path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
																</svg>
															</span>
															<span>Sao chép đường dẫn</span>
														</button>
														<button class= "chitiet-container-copy-thongtin">
															<span class="chitiet-container-boder">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard2" viewBox="0 0 16 16">
																	<path d="M3.5 2a.5.5 0 0 0-.5.5v12a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-12a.5.5 0 0 0-.5-.5H12a.5.5 0 0 1 0-1h.5A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1H4a.5.5 0 0 1 0 1h-.5Z" />
																	<path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
																</svg>
															</span>
															<span>Sao chép thông tin</span>
														</button>
													</div>
												</div>
												<div class="tinhtrang-content l-3">
													<div class = "header__nav-type">
														<img src="../assets/img/thongso.svg" alt="" class="header__nav-tab-img">
														<div class="header__nav-tab-vac">
															<span>Thông số kĩ thuật</span>
														</div>
													</div>
													<table class = "tinhtrang-table__cauhinh">
														<tbody>';
														foreach($data->data as $item){
															foreach($item->conf as $conf){
																echo '
																<tr class = "tr-1" > 
																	<td class = "title_charactestic">Độ phân giải</td>
																	<td class = "content_charactestic">1290 x 2796 pixels</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Màn hình rộng</td>
																	<td class = "content_charactestic">'.$conf->screen.'</td>
																</tr>
																<tr class = "tr-1"> 
																	<td class = "title_charactestic">Độ phân giải camera sau</td>
																	<td class = "content_charactestic">'.$conf->rear_camera.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Độ phân giải camera trước</td>
																	<td class = "content_charactestic">'.$conf->front_camera.'</td>
																</tr>
																<tr class = "tr-1"> 
																	<td class = "title_charactestic">Bộ nhớ trong</td>
																	<td class = "content_charactestic">'.$conf->ram.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Dung lượng pin</td>
																	<td class = "content_charactestic">'.$conf->pin.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Sim</td>
																	<td class = "content_charactestic">'.$conf->sim.'</td>
																</tr>
																';
																
															}
														}
															
														foreach($data->data as $item){
															echo '
															</tbody>
															</table>
															<div class= "tinhtrang-button__chitiet">
																<a href="" class="tinhtrang-button__chitiet-link">
																	Xem cấu hình chi tiết
																</a>
															</div>
															</div>
														</div>
													</div>
												</div>';
															
														}	
														
													}
																			
												}		
											}
											foreach($data->data as $item){
												echo'
													
												';
											}
										?>
									</div>
									
								</div>
							</div>
							<div class="grid wide">
								<div class="comment_content">
									<!-- Comment -->
									<div class="l-9 comment_chitiet_content">
										<div class="comment_heading">
											<div class="comment_heading-name">
												Đánh giá iPhone 14 Pro Max 128GB Chính hãng VN/A
											</div>
										</div> 
										<div class="comment_form_content ">
												<div class="row l-3">
													<div class="row_cmt--1">
														<p class="row_cmt--col">
															4.9
															<span>
																/5
															</span>
														</p>
														<div class="comment_1--start">
															<img src="../assets/img/Comment/star-fill.png" alt="">
																&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
															&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
															&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
															&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
														</div>
														<p class="cmt_count">
															(22 đánh giá )
														</p>
													</div>
												</div>
												<div class="l-6">
													<div class="row_cmt--2">
														<div class="row_cmt--rating">
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:86%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															86%
															</p>
														</div>

														<!-- 2 -->
														<div class="row_cmt--rating">
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:86%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															86%
															</p>
														</div>

														<div class="row_cmt--rating">
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:86%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															86%
															</p>
														</div>

														<div class="row_cmt--rating">
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:86%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															86%
															</p>
														</div>

														<div class="row_cmt--rating">
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:86%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															86%
															</p>
														</div>
													</div>
												</div>
												<div class="row l-3">
													<div class="cmt_row--3">
														<p class="cmt_row--3-p">
															<a href="" class = "cmt_row--3-p__link">
																<span class="cmt_row--text-1">
																	Viết đánh giá
																</span>
																<span class="cmt_row--text-2">
																	Đóng đánh giá
																</span>
																<!-- <span class="cmt_row--text">
																	Đóng bình luận
																</span> -->
															</a>
														</p>
													</div>
												</div>
										</div>
										<div class="comments-content__container">
											<div class="comment-form">
												<form action="" class="comment-form">
													<div class="comment-form__content">
														<div class="comment-form__heading">
															<div class="comment-form__heading-text">
																Đánh giá của bạn về sản phẩm:
															</div>
														</div>
														<div class="comment-form__sao">
															<div class="comment-form__rating-value">
																<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
																<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
																<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
																<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
																<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
															</div>
														</div>
													</div>
													<div class="comment-form__form-content">
														<div class="l-6">
															<textarea class ="form-control" placeholder="Nội dung đánh giá của bạn" name="" id="">

															</textarea>
														</div>
														<div class="l-6">
															<div class="row-l-6__content">
																<div class="row_form-control-1">
																	<input type="text" class ="form-control-1 row_form-control-1__input" name="name_rate" id="" placeholder="Họ và tên">
																	<input type="email" class ="form-control-1 row_form-control-2__input" name="name_rate" id="" placeholder="Email">
																</div>
																<div class="row_form-control-2">
																	<input type="text" class ="form-control-1 row_form-control-3__input" name="name_rate" id="" placeholder="Số điện thoại">
																	<input type="button" class = "btn_submit-danhgia" name="name_rate" id="" value="Gửi đánh giá">
																</div>
															</div>
														</div>
													</div>
													
												</form>
											</div>
										</div>
										<script src = "../Javascript/comment.js"></script>
									</div>
									<!-- Tin tức -->
									<div class="l-3 tintuc-chitiet__content">
										Tin tức
									</div>
								</div>
							</div>


<!-- Model chi tiết sản phẩm -->


<div class="modal-chitiet">
	<div class="model-container__chitiet">
		<div class="model-heading">
			<span class="model-heading__text">
				THÔNG SỐ KỸ THUẬT CHI TIẾT <?php echo $item->title?>
			</span>
			<button class="close-model-chitiet">×</button>
		</div>
		<div class="model-container__content">
			<table class="model-content-detail">
				<tbody>
				<?php
					foreach ($item->conf as $conf){
						echo '
					<tr>
						<td class="group_field">Kiểu màn hình</td>
					</tr>
					<tr>
						<td class="model-content-detail__title">Màn hình rộng</td>
						<td class="model-content-detail__charactestic">'.$conf->screen.'</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Hệ điều hành</td>
						<td class="model-content-detail__charactestic">'.$conf->operating_system.'</td>
					</tr>
					<tr>
						<td class="group_field">Camera trước</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Độ phân giải camera trước</td>
						<td class="model-content-detail__charactestic">'.$conf->front_camera.'</td>
					</tr>
					<tr>
						<td class="group_field">Camera sau</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Độ phân giải camera sau</td>
						<td class="model-content-detail__charactestic">'.$conf->rear_camera.'</td>
					</tr>
					<tr>
						<td class="group_field">Hệ điều hành & CPU</td>
					</tr>
					<tr>
						<td class="model-content-detail__title">Chip xử lý</td>
						<td class="model-content-detail__charactestic">'.$conf->chip.'</td>
					</tr>
					<tr>
						<td class="group_field">Bộ nhớ và lưu trữ</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">RAM</td>
						<td class="model-content-detail__charactestic">'.$conf->ram.'</td>
					</tr>
					<tr>
						<td class="group_field">Kết nối</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Sim</td>
						<td class="model-content-detail__charactestic">'.$conf->sim.'</td>
					</tr>
					<tr>
						<td class="group_field">Pin & Sạc</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Pin</td>
						<td class="model-content-detail__charactestic">'.$conf->pin.'</td>
					</tr>';
					}
					foreach($item->ttchung as $ttchung){
						echo '
						<tr>
							<td class="group_field">Thông tin chung</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Thời điểm ra mắt</td>
							<td class="model-content-detail__charactestic">'.$ttchung->thoidiemramat.'</td>
						</tr>
						';
					}
					foreach($item->tienich as $tienich){
						echo '
						<tr>
							<td class="group_field">Tiện ích</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Bảo mật nâng cao</td>
							<td class="model-content-detail__charactestic">'.$tienich->baomatnangcao.'</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Ghi âm</td>
							<td class="model-content-detail__charactestic">'.$tienich->ghiam.'</td>
						</tr>
						';
					}

					foreach($item->ttsp as $ttsp){
						echo '
						<tr>
							<td class="group_field">Thông tin sản phẩm</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Thương hiệu</td>
							<td class="model-content-detail__charactestic">'.$ttsp->thuonghieu.'</td>
						</tr>
						';
					}


					?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>
<script src = "../Javascript/index.js"></script>
<?php
if(!isset($_SESSION['cart']))$_SESSION['cart'] = array();
if(isset($_POST['add_cart']) && $_POST['add_cart']) {
	if (count($_SESSION['cart'])>0){
		$i = 0;
		foreach ($_SESSION['cart'] as $sanpham){
			if($sanpham[4] == $_POST['idSanPham']){
				$hinh = $sanpham[0];
				$tensp = $sanpham[1];
				$soLuong = $sanpham[5]+1;
				$gia = $sanpham[2] * $soLuong;
				$sale = $sanpham[3];
				$idSP = $sanpham[4];
				$sanpham = array($hinh, $tensp, $gia, $sale, $idSP, $soLuong);
				array_push($_SESSION['cart'], $sanpham);
				header('location:../cart/deleteCart.php?id='.$i);
				die();
			}
			$i++;
		}
	}
	$hinh = "../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/photos/".$_POST['Hinhanh'];
	$tensp = $_POST['Tensp'];
	$gia = $_POST['Giasp'];
	$sale = $_POST['Giamsale'];
	$idSP = $_POST['idSanPham'];
	$soLuong = 1;
	$sanpham = array($hinh, $tensp, $gia, $sale, $idSP, $soLuong);
	array_push($_SESSION['cart'], $sanpham);
	header('location: ../cart/index.php');
	}
?>


<!-- <ul class="chitiet-container-list">
	<li class="chitiet-container-type-item">
		<img src="/WebDiiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
		<div class="chitiet-container-type-item-blow">
			<span class="chitiet-container-type-item-tyle">Đen</span>
			<span class="chitiet-container-type-item-price">
				40.990.000
			<sup>đ</sup>
		</span>
		</div>
	</li>
	<li class="chitiet-container-type-item">
		<img src="PTPMCN/ass alt="" class="chitiet-container-type-item-img">
		<div class="chitiet-container-type-item-blow">
			<span class="chitiet-container-type-item-tyle">Đen</span>
			<span class="chitiet-container-type-item-price">
				40.990.000
			<sup>đ</sup>
		</span>
		</div>
	</li>
	<li class="chitiet-container-type-item">
		<img src="/WeThongMins/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
		<div class="chitiet-container-type-item-blow">
			<span class="chitiet-container-type-item-tyle">Đen</span>
			<span class="chitiet-container-type-item-price">
				40.990.000
			<sup>đ</sup>
		</span>
		</div>
		</li>
	</ul> -->
<!-- ICON CHUYỂN HÌNH ẢNH  -->
	<!-- <div class="chitiet-icon-nav">
		<div class="chitiet-icon-nav-left">
			<i class="fa-solid fa-angle-left fa-angle-left-color"></i>
		</div>
		<div class="chitiet-icon-nav-right">
			<i class="fa-solid fa-angle-right"></i>
		</div>
	</div> -->

<script>
	var element = document.querySelector('.chitiet-container-below');
	element.onclick = function (e) {
		var elementItem = e.target.closest('.chitiet-container-below-img-con');
		var elementConCammara = document.querySelector('.chitiet-container-below-img-concon');
		// if (elementConCammara) {
		// 	var elementsrc = elementConCammara.getAttribute('src');
		// 	var cartLon = document.querySelector('.chitiet-container-above-img');
		// 	var url = '../assets/img/anh-chup-tu-iphone-14-pro-max-tim-4_1664272756_1.webp';
		// 	cartLon.src = url;
		// } else 
		if (elementItem) {
			var cartbackImg = elementItem.getAttribute('src');
			console.log(cartbackImg);
			var cartLon = document.querySelector('.chitiet-container-above-img');
			console.log(cartLon);
			cartLon.src = cartbackImg;
		}
	}
</script>


