<?php
/**
 * BuddyPress - Blogs Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter().
 *
 * @since 1.0.0
 *
 * @package BP Nouveau
 */

bp_nouveau_before_loop(); ?>

<?php if ( bp_has_blogs( bp_ajax_querystring( 'blogs' ) ) ) : ?>

	<?php bp_nouveau_pagination( 'top' ); ?>

	<ul id="blogs-list" class="<?php bp_nouveau_loop_classes(); ?>">

	<?php while ( bp_blogs() ) : bp_the_blog(); ?>

		<li <?php bp_blog_class( array( 'item-entry' ) ) ?>>
			<div class="wrap">

				<div class="item-avatar">
					<a href="<?php bp_blog_permalink(); ?>"><?php bp_blog_avatar( bp_nouveau_avatar_args() ); ?></a>
				</div>

				<div class="item">

					<h2 class="list-title blogs-title"><a href="<?php bp_blog_permalink(); ?>"><?php bp_blog_name(); ?></a></h2>

					<p class="last-activity item-meta"><?php bp_blog_last_active(); ?></p>

					<?php bp_nouveau_blogs_loop_item(); ?>

				</div>

				<?php bp_nouveau_blogs_loop_buttons( array( 'container' => 'ul' ) ); ?>

				<?php if ( bp_nouveau_blog_has_latest_post() ) : ?>
					<p class="meta last-post">

						<?php bp_blog_latest_post(); ?>

					</p>
				<?php endif; ?>

			</div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php bp_nouveau_pagination( 'bottom' ); ?>

<?php else:

	bp_nouveau_user_feedback( 'blogs-loop-none' );

endif; ?>

<?php bp_nouveau_after_loop(); ?>
