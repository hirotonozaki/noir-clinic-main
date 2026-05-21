<?php
/**
 * page.php — 汎用の固定ページテンプレート
 *
 * 専用テンプレート（page-doctor.php 等）が割り当てられていない
 * 固定ページは、このファイルで表示される。
 *
 * 見出し帯・パンくず・本文（the_content）・CTA の
 * 最小構成。管理画面で作った任意の固定ページが、
 * テーマの世界観を保ったまま表示される。
 *
 * @package NOIR_Mens_Clinic
 */

get_header();

while ( have_posts() ) :
	the_post();

	// 見出し帯（タイトルは投稿タイトルを自動使用）
	get_template_part( 'template-parts/pagehead', null, array(
		'title' => get_the_title(),
	) );

	// パンくず
	get_template_part( 'template-parts/breadcrumb', null, array(
		'current' => get_the_title(),
	) );
	?>

	<main id="main">
	<div class="l-page">
		<div class="l-wrap l-page__inner">
			<div class="c-prose">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	</main>

	<?php
endwhile;

// 汎用ページにも予約 CTA（既定文言）
get_template_part( 'template-parts/cta' );

get_footer();
