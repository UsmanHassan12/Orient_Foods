<?php
$total_rating = $this->common_m->total_shop_rating($row['shop_id']);
$total_review = $this->common_m->total_shop_rating($row['shop_id'], 'total');
$time = $this->common_m->get_single_appoinment(__week(), $row['shop_id']);
$total_order = $this->admin_m->get_total_completed_order_by_shop($row['shop_id']);
if ($total_review == 0) {
	$avg = 0;
} else {
	$avg = @number_format($total_rating / $total_review, 1);
}


?>

<div class="col-md-4" data-aos-easing="ease-in-out" data-aos="fade-up" data-aos-delay="<?= $key + 1; ?>00">

	<div class="singleShop">
		<a href="<?= url($row['shop_username']); ?>" class="shopUrl" target="blank">
			<div class="shopTopper">
				<div class="leftShopImg">
					<img src="<?= base_url(!empty($row['thumb']) ? $row['thumb'] : IMG_PATH . 'empty.jpg'); ?>" alt="">
				</div>
				<div class="righShopDetails">
					<div class="shopInfo">
						<h4><?= $row['shop_name'] ?? $row['name']; ?></h4>
						<p><?= get_words(!empty($row['slogan']) ? $row['slogan'] : ""); ?></p>
					</div>
					<div class="shopBottom">
						<ul>
							<li title="<?= lang('shop_rating'); ?>" data-toggle="tooltip"><i class="fa fa-star" style="color: rgb(252, 128, 25);"></i> <?= $avg; ?></li>
							<li title="<?= lang('available_time'); ?>" data-toggle="tooltip"><i class="icofont-hour-glass"></i> <?= isset($time['start_time']) ? time_format($time['start_time'], $row['shop_id']) : 0; ?> - <?= isset($time['end_time']) ? time_format($time['end_time'], $row['shop_id']) : 0; ?></li>
							<li title="<?= lang('completed_orders'); ?>" data-toggle="tooltip"><i class="icofont-database-add"></i> <?= $total_order; ?></li>
						</ul>
					</div>
				</div>
			</div><!-- shopTopper -->

		</a>
		<div class="cardFooter">
			<ul>
				<?php if (isset($row['phone']) && !empty($row['phone'])) : ?>
					<li><a href="tel:<?= $row['phone']; ?>"><i class="fa fa-phone"></i></a></li>
				<?php endif; ?>
				<li><a href="<?= url($row['shop_username']); ?>"><i class="icofont-bubble-right"></i></a></li>
				<?php if (isset($row['qr_link']) && !empty($row['qr_link'])) : ?>
					<li><a href="javascript:;" onclick="openQrcode(`<?= $row['qr_link']; ?>`)"><i class="icofont-qr-code"></i></a></li>
				<?php endif; ?>
			</ul>
		</div>

	</div>

</div>