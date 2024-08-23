<div class="c-prevNextNavi">
  <div class="c-prevNextNavi__item c-prevNextNavi__prev">

    <?php
    $previous_post = get_previous_post();
    if ($previous_post): ?>
      <a href="<?php echo esc_url(get_permalink($previous_post)); ?>"><i class="fa-solid fa-chevron-left"></i> 前の投稿へ</a>
    <?php endif; ?>
  </div>

  <div class="c-prevNextNavi__item c-prevNextNavi__next">
    <?php
    $next_post = get_next_post();
    if ($next_post): ?>
      <a href="<?php echo (get_permalink($next_post)); ?>">次の投稿へ <i class="fa-solid fa-chevron-right"></i></a>
    <?php endif; ?>
  </div>
</div>