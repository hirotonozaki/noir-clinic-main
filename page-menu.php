<?php
/**
 * Template Name: 施術メニュー
 *
 * page-menu.php — 施術メニュー一覧ページ
 *
 * 医療脱毛 / 肌治療 / AGA治療 の3メニューを、
 * 詳細情報つきのカード型レイアウトで掲載する。
 *
 * 【使い方】
 *  管理画面で固定ページを作成、スラッグを「menu」に、
 *  ページ属性のテンプレートで「施術メニュー」を選択。
 *
 * 【WordPress 化の方針 — 将来の発展】
 *  メニューは下記の noir_menu_items() が配列で返している。
 *  施術が増減する運用になったら、カスタム投稿タイプ「menu」
 *  ＋ ACF（料金・施術時間・ダウンタイム等のフィールド）に
 *  移行し、この関数を WP_Query に置き換えるのが自然。
 *  カード側の HTML 構造（.p-menulist 系）はそのまま流用できる。
 *
 * @package NOIR_Mens_Clinic
 */

/**
 * 施術メニューのデータを返す。
 * 将来 CPT 化する場合はこの関数を WP_Query 取得に差し替える。
 *
 * @return array
 */
if ( ! function_exists( 'noir_menu_items' ) ) {
	function noir_menu_items() {
		return array(
			array(
				'slug'      => 'hair',
				'no'        => '01',
				'en'        => 'Medical Hair Removal',
				'name'      => '医療脱毛',
				'image'     => 'menu/menu-hair',
				'desc'      => 'ヒゲ・全身・VIO に対応。痛みを最小化したダイオードレーザーで、'
					. '濃く太い男性の毛にも医学的にアプローチします。',
				'target'    => 'ヒゲ / 顔全体 / 全身 / VIO',
				'price'     => '¥9,800 〜 / 回',
				'duration'  => '30 〜 90分',
				'downtime'  => 'ほぼなし（一時的な赤みが出る場合あり）',
			),
			array(
				'slug'      => 'skin',
				'no'        => '02',
				'en'        => 'Skin Treatment',
				'name'      => '肌治療',
				'image'     => 'menu/menu-skin',
				'desc'      => 'ニキビ・毛穴・くすみ・シミに。ピーリング、ハイドラフェイシャル、'
					. 'ダーマペン等を肌状態に応じて組み合わせます。',
				'target'    => 'ニキビ / ニキビ跡 / 毛穴 / くすみ / シミ',
				'price'     => '¥15,000 〜 / 回',
				'duration'  => '45 〜 80分',
				'downtime'  => '施術により 0 〜 5日（カウンセリングで説明）',
			),
			array(
				'slug'      => 'aga',
				'no'        => '03',
				'en'        => 'AGA Treatment',
				'name'      => 'AGA治療',
				'image'     => 'menu/menu-aga',
				'desc'      => '内服・外用・注入治療を組み合わせ、生え際・つむじ・全体の薄毛に'
					. '医学的にアプローチ。進行度に応じたプランをご提案します。',
				'target'    => '生え際 / つむじ / 全体の薄毛 / 予防',
				'price'     => '¥4,400 〜 / 月',
				'duration'  => '初診カウンセリング 約45分',
				'downtime'  => 'なし（内服・外用が中心）',
			),
		);
	}
}

get_header();

// 見出し帯
get_template_part( 'template-parts/pagehead', null, array(
	'en'    => 'Treatment Menu',
	'title' => '施術メニュー',
	'lead'  => "NOIR が注力する、医療脱毛・肌治療・AGA治療の3領域。<br>"
		. "どの治療も、まずは無料カウンセリングから。",
) );

// パンくず
get_template_part( 'template-parts/breadcrumb', null, array(
	'current' => '施術メニュー',
) );

$noir_menus = noir_menu_items();
?>

<main id="main">

<!-- ==========================================================
     MENU LIST — 施術メニュー一覧（3カラム / SP1カラム）
========================================================== -->
<section class="p-menulist">
	<div class="l-wrap">

		<div class="p-menulist__grid">
			<?php foreach ( $noir_menus as $i => $m ) :
				$img_base = get_template_directory_uri() . '/assets/images/' . $m['image'];
				?>
				<article class="p-menulist__card" data-reveal
					<?php echo $i ? 'data-delay="' . esc_attr( $i ) . '"' : ''; ?>>

					<div class="p-menulist__img">
						<picture>
							<source srcset="<?php echo esc_url( $img_base . '.webp' ); ?>" type="image/webp">
							<img src="<?php echo esc_url( $img_base . '.jpg' ); ?>"
							     alt="<?php echo esc_attr( $m['name'] . 'のイメージ' ); ?>"
							     width="1200" height="900" loading="lazy" decoding="async">
						</picture>
						<span class="p-menulist__no">No.<?php echo esc_html( $m['no'] ); ?></span>
					</div>

					<div class="p-menulist__body">
						<p class="p-menulist__en"><?php echo esc_html( $m['en'] ); ?></p>
						<h2 class="p-menulist__name"><?php echo esc_html( $m['name'] ); ?></h2>
						<p class="p-menulist__desc"><?php echo esc_html( $m['desc'] ); ?></p>

						<dl class="p-menulist__spec">
							<div class="p-menulist__spec-row">
								<dt>対応部位・悩み</dt>
								<dd><?php echo esc_html( $m['target'] ); ?></dd>
							</div>
							<div class="p-menulist__spec-row">
								<dt>料金目安</dt>
								<dd class="p-menulist__price"><?php echo esc_html( $m['price'] ); ?></dd>
							</div>
							<div class="p-menulist__spec-row">
								<dt>施術時間</dt>
								<dd><?php echo esc_html( $m['duration'] ); ?></dd>
							</div>
							<div class="p-menulist__spec-row">
								<dt>ダウンタイム</dt>
								<dd><?php echo esc_html( $m['downtime'] ); ?></dd>
							</div>
						</dl>

						<div class="p-menulist__actions">
							<a class="c-btn c-btn--ghost-light c-btn--block"
							   href="<?php echo esc_url( noir_get_page_url( 'treatment-detail' ) ); ?>">
								<span>詳細を見る</span>
								<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
							</a>
							<a class="c-btn c-btn--primary c-btn--block"
							   href="<?php echo esc_url( home_url( '/#reservation' ) ); ?>">
								<span>このメニューを予約する</span>
							</a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- 予約セクションへの導線 -->
		<div class="p-menulist__note" data-reveal>
			<p class="p-menulist__note-text">
				料金・施術内容は一例です。お悩みや肌質・毛質により最適な治療は異なります。<br>
				まずは無料カウンセリングで、医師が直接ご提案します。
			</p>
			<a class="c-btn c-btn--primary c-btn--lg"
			   href="<?php echo esc_url( home_url( '/#reservation' ) ); ?>">
				<span>空き状況を見て予約する</span>
				<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
		</div>

	</div>
</section>

</main>

<?php
// 予約 CTA バンド（このページ用の文言で）
get_template_part( 'template-parts/cta', null, array(
	'title' => 'どの治療が合うか、相談する。',
	'text'  => "メニュー選びに迷ったら、無料カウンセリングへ。<br>"
		. "あなたに最適な治療を、医師が一緒に考えます。",
) );

get_footer();
