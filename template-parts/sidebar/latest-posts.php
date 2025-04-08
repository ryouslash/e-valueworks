<?php
if (!defined('ABSPATH')) {
  exit;
};

$args = array(
  'post_type' => 'post',
  'posts_per_page' => 5,
);
$the_latest_query = new WP_Query($args);
?>

<?php if ($the_latest_query->have_posts()): ?>
  <div class="p-sidebarItem p-sidebarLatestPosts">
    <div class="p-sidebarItem__title">最新の投稿</div>
    <ul class="p-sidebarLatestPosts__items">
      <?php while ($the_latest_query->have_posts()): $the_latest_query->the_post(); ?>
        <li class="p-sidebarLatestPosts__item">
          <a href="<?php the_permalink(); ?>">
            <div class="p-sidebarLatestPosts__thumbnail">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large'); ?>
              <?php else: ?>
                <img src="/img/noimg.jpg" />
              <?php endif; ?>
            </div>
            <div class="p-sidebarLatestPosts__title">
              <?php the_title(); ?>
            </div>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>