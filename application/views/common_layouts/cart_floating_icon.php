 <?php if ($this->cart->total_items() > 0) : ?>
     <?php if (check_shop_open_status(@$shop_id) == 1) : ?>
         <?php if (empty(auth('is_pos')) && __cart()->is_pos==0) : ?>
             <?php if (__cart()->shop_id == @$shop_id) : ?>
                 <li class="cart navCart CartIcon <?= $this->cart->total_items() > 0 ? 'active' : ''; ?> menu_style_<?= $u_info['menu_style']; ?>" data-slug="<?= $slug; ?>">
                     <a class="nav-link" href="javascript:;"> <?= cartIcon();?> <span class="cart_count total_count"><?= $this->cart->total_items(); ?></span>
                     </a>
                 </li>
             <?php endif; ?>
         <?php endif ?>
     <?php endif ?>
 <?php else : ?>
     <?php if ($u_info['menu_style'] == 1 && $this->cart->total_items() == 0) { ?>
         <li class="cart navCart" data-slug="<?= $slug; ?>">
             <a class="nav-link" href="javascript:;"> <?= cartIcon();?>
             </a>
         </li>
     <?php }; ?>
 <?php endif; ?>