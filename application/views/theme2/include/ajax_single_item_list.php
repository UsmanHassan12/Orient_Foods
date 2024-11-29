<?php if(count($item_list) > 0): ?>
<div class="row" id="">
<?php foreach ($item_list as $key => $row): ?>
	<div class="col-md-6">
		<?php include 'item_thumbs.php'; ?>
	</div>
<?php endforeach ?>

        	
</div><!-- row/2 -->
<div class="row text-center">
	<div class="ci-paginationArea">
		<div class="ci-pagination-link" data-id="<?= $cat_id;?>" data-slug="<?= $slug;?>">
			<div id="pagination"><?= $this->pagination->create_links();?></div>
		</div>
	</div>
</div>
<?php else: ?>
	<div class="row">
		<div class="col-md-12">
			<div class="not-found">
				<i class="fa fa-frown"></i>
				<h4><?= !empty(lang('not_found'))?lang('not_found'):'Not Found' ;?></h4>
			</div>
		</div>
	</div>
<?php endif;?>