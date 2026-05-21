<?php
/**
 * Template Name: お知らせ一覧
 *
 * page-news.php — お知らせ一覧ページ
 *
 * 【重要な設計判断】
 *  お知らせは本来 WordPress の「投稿」で管理すべきもの。
 *  最終的には以下の構成が正しい：
 *    - 一覧 → home.php もしくは archive.php（投稿アーカイブ）
 *    - 記事 → single.php
 *    - カテゴリ（お知らせ/キャンペーン/コラム）→ category もしくは
 *      カスタムタクソノミー
 *
 *  ただし今回は「固定ページテンプレートとして整理」という
 *  方針に沿い、page-news.php として用意した。
 *  下のリスト部分は、将来 WP_Query のループへ置換しやすいよう
 *  1記事 = 1ブロックの構造を保ってある（下記コメント参照）。
 *
 * 【WP_Query への移行イメージ】
 *   $q = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 7 ) );
 *   while ( $q->have_posts() ) : $q->the_post();
 *     // .p-news__item を the_permalink() / the_title() / get_the_date() で出力
 *   endwhile; wp_reset_postdata();
 *
 * @package NOIR_Mens_Clinic
 */

get_header();

get_template_part( 'template-parts/pagehead', null, array(
	'en'    => 'News & Column',
	'title' => 'お知らせ',
	'lead'  => "クリニックからのお知らせ、キャンペーン、<br>美容医療に関するコラムをお届けします。",
) );

get_template_part( 'template-parts/breadcrumb', null, array(
	'current' => 'お知らせ',
) );
?>

<main id="main">

<section class="p-news">
	<div class="l-wrap p-news__inner">

		<!-- カテゴリフィルタ -->
		<div class="p-news__filter" data-reveal>
			<button type="button" class="p-news__filter-btn is-active">すべて</button>
			<button type="button" class="p-news__filter-btn">お知らせ</button>
			<button type="button" class="p-news__filter-btn">キャンペーン</button>
			<button type="button" class="p-news__filter-btn">コラム</button>
		</div>

		<!-- お知らせリスト -->
		<div class="p-news__list" data-reveal>
			<a class="p-news__item" href="#">
				<div>
					<p class="p-news__date">2026.05.12</p>
					<span class="p-news__tag p-news__tag--campaign">キャンペーン</span>
				</div>
				<p class="p-news__item-title">【6月限定】ヒゲ脱毛 5回コースが特別価格となるご紹介キャンペーンを実施します</p>
				<span class="p-news__arrow" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
				</span>
			</a>
			<a class="p-news__item" href="#">
				<div>
					<p class="p-news__date">2026.05.01</p>
					<span class="p-news__tag p-news__tag--column">コラム</span>
				</div>
				<p class="p-news__item-title">医療脱毛とサロン脱毛は何が違う？医師が解説する、選び方の基準</p>
				<span class="p-news__arrow" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
				</span>
			</a>
			<a class="p-news__item" href="#">
				<div>
					<p class="p-news__date">2026.04.20</p>
					<span class="p-news__tag p-news__tag--info">お知らせ</span>
				</div>
				<p class="p-news__item-title">ゴールデンウィーク期間中の診療時間について</p>
				<span class="p-news__arrow" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
				</span>
			</a>
			<a class="p-news__item" href="#">
				<div>
					<p class="p-news__date">2026.04.08</p>
					<span class="p-news__tag p-news__tag--column">コラム</span>
				</div>
				<p class="p-news__item-title">AGA治療はいつ始めるべき？「気になり始めた今」が分岐点になる理由</p>
				<span class="p-news__arrow" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
				</span>
			</a>
			<a class="p-news__item" href="#">
				<div>
					<p class="p-news__date">2026.03.25</p>
					<span class="p-news__tag p-news__tag--info">お知らせ</span>
				</div>
				<p class="p-news__item-title">肌治療メニューに「ポテンツァ」を新しく導入しました</p>
				<span class="p-news__arrow" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
				</span>
			</a>
			<a class="p-news__item" href="#">
				<div>
					<p class="p-news__date">2026.03.10</p>
					<span class="p-news__tag p-news__tag--column">コラム</span>
				</div>
				<p class="p-news__item-title">「メンズ美容は恥ずかしい」を超えて。来院される方の本音</p>
				<span class="p-news__arrow" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
				</span>
			</a>
			<a class="p-news__item" href="#">
				<div>
					<p class="p-news__date">2026.02.18</p>
					<span class="p-news__tag p-news__tag--info">お知らせ</span>
				</div>
				<p class="p-news__item-title">公式Instagramを開設しました。症例やクリニックの様子を発信します</p>
				<span class="p-news__arrow" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
				</span>
			</a>
		</div>

		<!-- ページネーション -->
		<div class="p-news__pager" data-reveal>
			<span class="p-news__pager-btn is-current">1</span>
			<a class="p-news__pager-btn" href="#">2</a>
			<a class="p-news__pager-btn" href="#">3</a>
			<a class="p-news__pager-btn" href="#" aria-label="次のページ">
				<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
		</div>

	</div>
</section>

</main>

<?php
get_template_part( 'template-parts/cta', null, array(
	'title' => "気になったときが、<br class=\"u-sp-only\">はじめどき。",
	'text'  => "無料カウンセリングは24時間 WEB から受付。<br>あなたのお悩みに、医師が直接お応えします。",
) );

get_footer();
