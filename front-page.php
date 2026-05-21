<?php
/**
 * ==========================================================
 *  front-page.php  ─  トップページ専用テンプレート
 * ==========================================================
 *
 *  WordPressのテンプレート階層では、
 *  「設定 > 表示設定 > ホームページの表示」を「固定ページ」にして
 *  「ホーム」を指定したとき、このファイルが自動で使われます。
 *
 *  ※ ファイル名は front-page.php で固定(変えないでください)
 *
 *  【セクション構成】
 *    01. Hero          ── ファーストビュー(黒背景・大型KV)
 *    02. Concept       ── クリニックの価値提案(3軸)
 *    03. Menu          ── 主要施術メニュー(脱毛/肌/AGA)
 *    04. Case          ── 症例紹介
 *    05. Doctor        ── 医師紹介
 *    06. Price         ── 料金表(抜粋)
 *    07. Flow          ── 来院の流れ
 *    08. FAQ           ── よくあるご質問(抜粋)
 *    09. Access        ── アクセス
 *    10. CTA           ── 予約導線(共通フッターで描画)
 * ==========================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" tabindex="-1">


<!-- ==========================================================
     SECTION 01: Hero
     ── 黒背景の大型ヒーロー。ブランドの「格」を3秒で伝える
========================================================== -->
<section class="p-hero" aria-label="メインビジュアル">
	<div class="p-hero__bg" aria-hidden="true">
		<picture>
			<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-noir.webp" type="image/webp">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-noir.jpg"
			     alt=""
			     width="1920" height="1080"
			     loading="eager"
			     fetchpriority="high"
			     decoding="async">
		</picture>
		<div class="p-hero__bg-overlay"></div>
		<div class="p-hero__bg-glow" aria-hidden="true"></div>
		<div class="p-hero__bg-darken-mobile" aria-hidden="true"></div>
	</div>

	<div class="l-wrap p-hero__inner">
		<div class="p-hero__meta" data-reveal>
			<span class="p-hero__meta-dot" aria-hidden="true"></span>
			<span class="p-hero__meta-text">Premium Men&rsquo;s Medical Aesthetics &mdash; Tokyo, Nishi-Azabu</span>
		</div>

		<h1 class="p-hero__title" data-reveal data-delay="1">
			<span class="p-hero__title-line">結果に、</span>
			<span class="p-hero__title-line p-hero__title-line--accent">
				静かな<em>自信</em>を。
			</span>
		</h1>

		<p class="p-hero__sub" data-reveal data-delay="2">男性のための、メディカル・エステティック。</p>

		<p class="p-hero__lead" data-reveal data-delay="3">
			医療脱毛・AGA・肌治療を、<br>
			エビデンスと、静かな配慮とともに。
		</p>

		<div class="p-hero__actions" data-reveal data-delay="4">
			<a href="<?php echo esc_url( home_url( '/#reservation' ) ); ?>" class="c-btn c-btn--primary c-btn--lg" aria-label="無料カウンセリング予約フォームへ">
				<span>無料カウンセリング予約</span>
				<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
			<a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>" class="c-btn c-btn--ghost-light c-btn--lg" aria-label="施術メニュー一覧ページへ">
				<span>施術メニューを見る</span>
			</a>
		</div>

		<div class="p-hero__stats" data-reveal data-delay="5">
			<div class="p-hero__stat">
				<span class="p-hero__stat-num">15,000<small>+</small></span>
				<span class="p-hero__stat-label">年間施術実績</span>
			</div>
			<div class="p-hero__stat">
				<span class="p-hero__stat-num">98<small>%</small></span>
				<span class="p-hero__stat-label">お客様満足度</span>
			</div>
			<div class="p-hero__stat">
				<span class="p-hero__stat-num">24<small>h</small></span>
				<span class="p-hero__stat-label">WEB予約受付</span>
			</div>
		</div>
	</div>

	<a href="#concept" class="p-hero__scroll" aria-label="次のセクションへスクロール">
		<span class="p-hero__scroll-text">Scroll</span>
		<span class="p-hero__scroll-line" aria-hidden="true"></span>
	</a>
</section>


<!-- ==========================================================
     SECTION 02: Concept
     ── 黒→白のグラデーション領域。価値提案3軸
========================================================== -->
<section class="p-concept" id="concept">
	<div class="l-wrap">

		<header class="c-section-head" data-reveal>
			<p class="c-eyebrow">Our Concept</p>
			<h2 class="c-h2">
				結果に、<br class="u-sp-only">理由を。
			</h2>
			<p class="c-section-head__lead">
				「なんとなく良い」ではなく、「なぜ良くなるか」を語れる医療を。<br>
				NOIRが大切にしている3つの基準をご紹介します。
			</p>
		</header>

		<ul class="p-concept__list">

			<li class="p-concept__item" data-reveal>
				<div class="p-concept__num">01</div>
				<h3 class="p-concept__title">医師による全工程診察</h3>
				<p class="p-concept__text">
					初回カウンセリングから施術・経過観察まで、すべての工程を医師が直接担当。お一人おひとりの肌質・髪質・骨格を診たうえで最適な治療設計を行います。
				</p>
				<div class="p-concept__line" aria-hidden="true"></div>
			</li>

			<li class="p-concept__item" data-reveal data-delay="1">
				<div class="p-concept__num">02</div>
				<h3 class="p-concept__title">エビデンスベースの治療</h3>
				<p class="p-concept__text">
					流行や雰囲気ではなく、国内外の臨床データに基づいた治療プロトコルを採用。導入機器は厚生労働省認可機器を中心に、安全性と効果の両立を追求します。
				</p>
				<div class="p-concept__line" aria-hidden="true"></div>
			</li>

			<li class="p-concept__item" data-reveal data-delay="2">
				<div class="p-concept__num">03</div>
				<h3 class="p-concept__title">男性専門・完全個室</h3>
				<p class="p-concept__text">
					来院から退院まで、他の患者様と顔を合わせない完全個室導線。男性特有のお悩みも、人目を気にせずご相談いただける空間設計です。
				</p>
				<div class="p-concept__line" aria-hidden="true"></div>
			</li>

		</ul>

	</div>
</section>


<!-- ==========================================================
     SECTION 03: Menu
     ── 主要施術メニュー(医療脱毛 / 肌治療 / AGA)
========================================================== -->
<section class="p-menu" id="menu">
	<div class="l-wrap">

		<header class="c-section-head" data-reveal>
			<p class="c-eyebrow">Treatment Menu</p>
			<h2 class="c-h2">男性のための、3つの主要治療</h2>
			<p class="c-section-head__lead">
				NOIRが特に注力するのは、医療脱毛・肌治療・AGA治療の3領域。<br>
				どの治療も、まずは無料カウンセリングから。
			</p>
		</header>

		<div class="p-menu__grid">

			<article class="p-menu__card" data-reveal>
				<div class="p-menu__card-img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/menu/menu-hair.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/menu/menu-hair.jpg"
						     alt="医療脱毛の施術を受ける男性"
						     width="1200" height="900" loading="lazy" decoding="async">
					</picture>
					<span class="p-menu__card-tag">No.01</span>
				</div>
				<div class="p-menu__card-body">
					<p class="p-menu__card-en">Medical Hair Removal</p>
					<h3 class="p-menu__card-title">医療脱毛</h3>
					<p class="p-menu__card-text">
						ヒゲ・全身・VIOに対応。痛みを最小化したダイオードレーザーで、清潔感のある印象へ。
					</p>
					<dl class="p-menu__card-meta">
						<dt>料金目安</dt>
						<dd>¥9,800 〜 / 回</dd>
						<dt>所要時間</dt>
						<dd>30〜90分</dd>
					</dl>
					<a href="<?php echo esc_url( home_url( '/menu/#hair' ) ); ?>" class="p-menu__card-link">
						詳細を見る
						<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
					</a>
				</div>
			</article>

			<article class="p-menu__card" data-reveal data-delay="1">
				<div class="p-menu__card-img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/menu/menu-skin.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/menu/menu-skin.jpg"
						     alt="肌治療の施術を受ける男性"
						     width="1200" height="900" loading="lazy" decoding="async">
					</picture>
					<span class="p-menu__card-tag">No.02</span>
				</div>
				<div class="p-menu__card-body">
					<p class="p-menu__card-en">Skin Treatment</p>
					<h3 class="p-menu__card-title">肌治療</h3>
					<p class="p-menu__card-text">
						ニキビ・毛穴・くすみ・シミに。ピーリング・ハイドラフェイシャル・レーザートーニング等。
					</p>
					<dl class="p-menu__card-meta">
						<dt>料金目安</dt>
						<dd>¥15,000 〜 / 回</dd>
						<dt>所要時間</dt>
						<dd>45〜80分</dd>
					</dl>
					<a href="<?php echo esc_url( home_url( '/menu/#skin' ) ); ?>" class="p-menu__card-link">
						詳細を見る
						<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
					</a>
				</div>
			</article>

			<article class="p-menu__card" data-reveal data-delay="2">
				<div class="p-menu__card-img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/menu/menu-aga.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/menu/menu-aga.jpg"
						     alt="AGA治療のカウンセリングを受ける男性"
						     width="1200" height="900" loading="lazy" decoding="async">
					</picture>
					<span class="p-menu__card-tag">No.03</span>
				</div>
				<div class="p-menu__card-body">
					<p class="p-menu__card-en">AGA Treatment</p>
					<h3 class="p-menu__card-title">AGA治療</h3>
					<p class="p-menu__card-text">
						内服・外用・注入治療を組み合わせ、生え際・つむじ・全体の薄毛に医学的にアプローチ。
					</p>
					<dl class="p-menu__card-meta">
						<dt>料金目安</dt>
						<dd>¥4,400 〜 / 月</dd>
						<dt>初診</dt>
						<dd>カウンセリング無料</dd>
					</dl>
					<a href="<?php echo esc_url( home_url( '/menu/#aga' ) ); ?>" class="p-menu__card-link">
						詳細を見る
						<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
					</a>
				</div>
			</article>

		</div>

		<div class="p-menu__more" data-reveal>
			<a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>" class="c-btn c-btn--ghost">
				全メニューを見る
				<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
		</div>

	</div>
</section>


<!-- ==========================================================
     SECTION 04: Case
     ── 症例紹介(個人の感想として表現、過度な効果効能を回避)
========================================================== -->
<section class="p-case" id="case">
	<div class="l-wrap">

		<header class="c-section-head" data-reveal>
			<p class="c-eyebrow">Patient Cases</p>
			<h2 class="c-h2">変化を、数字と写真で。</h2>
			<p class="c-section-head__lead">
				施術を受けられた患者様の症例の一部をご紹介します。<br>
				<small class="p-case__disclaimer">※ 写真は施術効果を保証するものではなく、効果には個人差があります。</small>
			</p>
		</header>

		<div class="p-case__grid">

			<article class="p-case__card" data-reveal>
				<div class="p-case__img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.jpg"
						     alt="ヒゲ脱毛症例 — 32歳男性"
						     width="900" height="600"
						     loading="lazy" decoding="async">
					</picture>
					<span class="p-case__img-label">Before / After</span>
				</div>
				<div class="p-case__body">
					<p class="p-case__cat">医療脱毛 — ヒゲ</p>
					<h3 class="p-case__title">青ヒゲと毎日の手入れから解放されたい</h3>
					<dl class="p-case__meta">
						<dt>年齢・性別</dt><dd>32歳・男性</dd>
						<dt>施術内容</dt><dd>ヒゲ脱毛 5回コース</dd>
						<dt>期間</dt><dd>約10ヶ月</dd>
						<dt>料金(税込)</dt><dd>¥58,000</dd>
					</dl>
					<p class="p-case__risk">
						<strong>副作用・リスク</strong>: 一時的な赤み・毛嚢炎・色素沈着が出る場合があります。
					</p>
				</div>
			</article>

			<article class="p-case__card" data-reveal data-delay="1">
				<div class="p-case__img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-skin.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-skin.jpg"
						     alt="肌治療症例 — 28歳男性"
						     width="900" height="600"
						     loading="lazy" decoding="async">
					</picture>
					<span class="p-case__img-label">Before / After</span>
				</div>
				<div class="p-case__body">
					<p class="p-case__cat">肌治療 — ニキビ跡 / 毛穴</p>
					<h3 class="p-case__title">人前で自信を持って話せる肌に</h3>
					<dl class="p-case__meta">
						<dt>年齢・性別</dt><dd>28歳・男性</dd>
						<dt>施術内容</dt><dd>ダーマペン4 + 成長因子</dd>
						<dt>期間</dt><dd>約6ヶ月(計5回)</dd>
						<dt>料金(税込)</dt><dd>¥132,000</dd>
					</dl>
					<p class="p-case__risk">
						<strong>副作用・リスク</strong>: ダウンタイム3〜5日、赤み・腫れ・点状出血が生じます。
					</p>
				</div>
			</article>

			<article class="p-case__card" data-reveal data-delay="2">
				<div class="p-case__img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-aga.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-aga.jpg"
						     alt="AGA治療症例 — 41歳男性"
						     width="900" height="600"
						     loading="lazy" decoding="async">
					</picture>
					<span class="p-case__img-label">Before / After</span>
				</div>
				<div class="p-case__body">
					<p class="p-case__cat">AGA — 生え際 / つむじ</p>
					<h3 class="p-case__title">「気になる」が「気にならない」へ</h3>
					<dl class="p-case__meta">
						<dt>年齢・性別</dt><dd>41歳・男性</dd>
						<dt>施術内容</dt><dd>内服薬 + 外用ミノキシジル</dd>
						<dt>期間</dt><dd>約12ヶ月</dd>
						<dt>料金(税込)</dt><dd>月額 ¥16,500</dd>
					</dl>
					<p class="p-case__risk">
						<strong>副作用・リスク</strong>: 性機能低下・初期脱毛・血圧変動の可能性があります。
					</p>
				</div>
			</article>

		</div>

		<div class="p-case__more" data-reveal>
			<a href="<?php echo esc_url( home_url( '/case/' ) ); ?>" class="c-btn c-btn--ghost">
				症例一覧を見る
				<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
		</div>

	</div>
</section>


<!-- ==========================================================
     SECTION 05: Doctor
     ── 医師紹介(信頼の根拠を顔と実績で)
========================================================== -->
<section class="p-doctor" id="doctor">
	<div class="l-wrap">

		<header class="c-section-head" data-reveal>
			<p class="c-eyebrow">Our Doctors</p>
			<h2 class="c-h2">あなたを診るのは、<br>この医師たち。</h2>
			<p class="c-section-head__lead">
				経験と専門性を兼ね備えた医師が、あなたの「変わりたい」に応えます。
			</p>
		</header>

		<div class="p-doctor__grid">

			<article class="p-doctor__card" data-reveal>
				<div class="p-doctor__img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/doctors/director.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/doctors/director.jpg"
						     alt="院長 高橋慎一の写真"
						     width="1200" height="800" loading="lazy" decoding="async">
					</picture>
				</div>
				<div class="p-doctor__body">
					<p class="p-doctor__role">Director · 院長</p>
					<h3 class="p-doctor__name">
						<span class="p-doctor__name-ja">高橋 慎一</span>
						<span class="p-doctor__name-en">Shinichi Takahashi, M.D.</span>
					</h3>
					<p class="p-doctor__text">
						美容皮膚科領域での経験15年。特にメンズ肌治療・脱毛におけるパラメータ設計に強み。「肌の科学を、男性に。」をモットーに、根拠ある治療を提供。
					</p>
					<ul class="p-doctor__qual">
						<li>医師免許 取得</li>
						<li>日本皮膚科学会 所属</li>
						<li>日本美容皮膚科学会 所属</li>
					</ul>
				</div>
			</article>

			<article class="p-doctor__card" data-reveal data-delay="1">
				<div class="p-doctor__img">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/doctors/vice-director.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/doctors/vice-director.jpg"
						     alt="副院長 佐藤玲の写真"
						     width="1200" height="800" loading="lazy" decoding="async">
					</picture>
				</div>
				<div class="p-doctor__body">
					<p class="p-doctor__role">Vice Director · 副院長</p>
					<h3 class="p-doctor__name">
						<span class="p-doctor__name-ja">佐藤 玲</span>
						<span class="p-doctor__name-en">Ryo Sato, M.D.</span>
					</h3>
					<p class="p-doctor__text">
						AGA・薄毛治療を専門領域とする。男性の毛髪医療における内服・外用・注入治療の設計を担当。エビデンス重視のアプローチで多くの症例を担当。
					</p>
					<ul class="p-doctor__qual">
						<li>医師免許 取得</li>
						<li>日本臨床毛髪学会 所属</li>
						<li>日本抗加齢医学会 所属</li>
					</ul>
				</div>
			</article>

		</div>

	</div>
</section>


<!-- ==========================================================
     SECTION 06: Price
     ── 料金表(抜粋・税込総額表示)
========================================================== -->
<section class="p-price" id="price">
	<div class="l-wrap">

		<header class="c-section-head" data-reveal>
			<p class="c-eyebrow">Pricing</p>
			<h2 class="c-h2">明朗な料金、追加費用なし。</h2>
			<p class="c-section-head__lead">
				掲載価格はすべて税込総額。コース契約・回数券での割引も別途ご用意しています。
			</p>
		</header>

		<div class="p-price__tabs" data-reveal>

			<div class="p-price__table">
				<h3 class="p-price__table-title">医療脱毛 — Medical Hair Removal</h3>
				<table>
					<thead>
						<tr><th>部位 / コース</th><th class="t-r">1回</th><th class="t-r">5回コース</th></tr>
					</thead>
					<tbody>
						<tr><th scope="row">ヒゲ脱毛(鼻下・あご・あご下)</th><td class="t-r">¥14,800</td><td class="t-r p-price__hl">¥58,000</td></tr>
						<tr><th scope="row">顔全体</th><td class="t-r">¥22,000</td><td class="t-r">¥99,000</td></tr>
						<tr><th scope="row">全身脱毛(顔・VIO除く)</th><td class="t-r">¥69,800</td><td class="t-r">¥318,000</td></tr>
						<tr><th scope="row">VIO脱毛</th><td class="t-r">¥19,800</td><td class="t-r">¥88,000</td></tr>
					</tbody>
				</table>
			</div>

			<div class="p-price__table">
				<h3 class="p-price__table-title">肌治療 — Skin Treatment</h3>
				<table>
					<thead>
						<tr><th>メニュー</th><th class="t-r">1回</th><th class="t-r">5回コース</th></tr>
					</thead>
					<tbody>
						<tr><th scope="row">ハイドラフェイシャル</th><td class="t-r">¥18,000</td><td class="t-r">¥81,000</td></tr>
						<tr><th scope="row">ダーマペン4 + 成長因子</th><td class="t-r">¥33,000</td><td class="t-r p-price__hl">¥132,000</td></tr>
						<tr><th scope="row">レーザートーニング</th><td class="t-r">¥16,500</td><td class="t-r">¥66,000</td></tr>
					</tbody>
				</table>
			</div>

			<div class="p-price__table">
				<h3 class="p-price__table-title">AGA治療 — AGA Treatment</h3>
				<table>
					<thead>
						<tr><th>プラン</th><th class="t-r">月額</th><th class="t-r">初診</th></tr>
					</thead>
					<tbody>
						<tr><th scope="row">予防プラン(内服のみ)</th><td class="t-r">¥4,400</td><td class="t-r">無料</td></tr>
						<tr><th scope="row">発毛プラン(内服+外用)</th><td class="t-r p-price__hl">¥16,500</td><td class="t-r">無料</td></tr>
						<tr><th scope="row">集中プラン(注入治療含む)</th><td class="t-r">¥38,500</td><td class="t-r">無料</td></tr>
					</tbody>
				</table>
			</div>

		</div>

		<p class="p-price__note" data-reveal>
			※ 当院は自由診療です。健康保険は適用されません。<br>
			※ 副作用・リスクの詳細は各施術ページ・カウンセリング時にご説明します。
		</p>

		<div class="p-price__more" data-reveal>
			<a href="<?php echo esc_url( home_url( '/price/' ) ); ?>" class="c-btn c-btn--ghost">
				全料金を見る
				<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
		</div>

	</div>
</section>


<!-- ==========================================================
     SECTION 07: Flow
     ── 来院の流れ(初回の不安を取り除く)
========================================================== -->
<section class="p-flow" id="flow">
	<div class="l-wrap">

		<header class="c-section-head" data-reveal>
			<p class="c-eyebrow">First Visit Flow</p>
			<h2 class="c-h2">来院から施術まで、5ステップ。</h2>
			<p class="c-section-head__lead">
				初めての方も、安心してご来院いただけるよう、丁寧にご案内します。
			</p>
		</header>

		<ol class="p-flow__list">

			<li class="p-flow__step" data-reveal>
				<div class="p-flow__num">01</div>
				<div class="p-flow__body">
					<h3 class="p-flow__title">予約</h3>
					<p class="p-flow__text">電話・LINE・Webフォームから24時間予約可能。お悩み・気になる施術をお選びください。</p>
				</div>
			</li>

			<li class="p-flow__step" data-reveal data-delay="1">
				<div class="p-flow__num">02</div>
				<div class="p-flow__body">
					<h3 class="p-flow__title">来院・問診</h3>
					<p class="p-flow__text">完全個室の待合へご案内。問診票へのご記入と、現在のお悩み・ご希望をヒアリングします。</p>
				</div>
			</li>

			<li class="p-flow__step" data-reveal data-delay="2">
				<div class="p-flow__num">03</div>
				<div class="p-flow__body">
					<h3 class="p-flow__title">医師カウンセリング</h3>
					<p class="p-flow__text">医師が肌・髪・体質を直接診察。施術の効果・副作用・料金を丁寧にご説明します。</p>
				</div>
			</li>

			<li class="p-flow__step" data-reveal data-delay="3">
				<div class="p-flow__num">04</div>
				<div class="p-flow__body">
					<h3 class="p-flow__title">施術(ご希望時のみ)</h3>
					<p class="p-flow__text">当日の施術が可能な場合は、そのまま受けていただけます。後日改めてのご来院も歓迎です。</p>
				</div>
			</li>

			<li class="p-flow__step" data-reveal data-delay="4">
				<div class="p-flow__num">05</div>
				<div class="p-flow__body">
					<h3 class="p-flow__title">アフターケア</h3>
					<p class="p-flow__text">施術後の経過確認とアフターケアもサポート。LINEでの相談も随時受け付けます。</p>
				</div>
			</li>

		</ol>

	</div>
</section>


<!-- ==========================================================
     SECTION 08: FAQ
     ── よくあるご質問(初回不安の解消)
========================================================== -->
<section class="p-faq" id="faq">
	<div class="l-wrap p-faq__wrap">

		<header class="c-section-head c-section-head--start" data-reveal>
			<p class="c-eyebrow">FAQ</p>
			<h2 class="c-h2">よくあるご質問</h2>
		</header>

		<div class="p-faq__list">

			<details class="p-faq__item" data-reveal>
				<summary class="p-faq__q">
					<span class="p-faq__q-mark">Q</span>
					<span class="p-faq__q-text">カウンセリングだけでも受けられますか?</span>
					<span class="p-faq__q-icon" aria-hidden="true"></span>
				</summary>
				<div class="p-faq__a">
					<span class="p-faq__a-mark">A</span>
					<p class="p-faq__a-text">はい、無料カウンセリングのみのご利用も歓迎しています。その日に施術を受けるかどうかは、説明を聞いてからご判断いただけます。無理な勧誘は一切いたしません。</p>
				</div>
			</details>

			<details class="p-faq__item" data-reveal data-delay="1">
				<summary class="p-faq__q">
					<span class="p-faq__q-mark">Q</span>
					<span class="p-faq__q-text">支払い方法を教えてください</span>
					<span class="p-faq__q-icon" aria-hidden="true"></span>
				</summary>
				<div class="p-faq__a">
					<span class="p-faq__a-mark">A</span>
					<p class="p-faq__a-text">現金・各種クレジットカード(VISA / Master / JCB / AMEX)・医療ローンに対応しています。コース契約の場合は分割払いもご利用いただけます。</p>
				</div>
			</details>

			<details class="p-faq__item" data-reveal data-delay="2">
				<summary class="p-faq__q">
					<span class="p-faq__q-mark">Q</span>
					<span class="p-faq__q-text">施術後すぐに仕事や予定に行けますか?</span>
					<span class="p-faq__q-icon" aria-hidden="true"></span>
				</summary>
				<div class="p-faq__a">
					<span class="p-faq__a-mark">A</span>
					<p class="p-faq__a-text">施術内容によります。脱毛・トーニングはダウンタイムがほぼなく、すぐに通常通りお過ごしいただけます。ダーマペン等の侵襲性のある治療は数日のダウンタイムがあるため、スケジュールに余裕をもってご予約ください。</p>
				</div>
			</details>

			<details class="p-faq__item" data-reveal data-delay="3">
				<summary class="p-faq__q">
					<span class="p-faq__q-mark">Q</span>
					<span class="p-faq__q-text">他のクリニックで施術中ですが相談できますか?</span>
					<span class="p-faq__q-icon" aria-hidden="true"></span>
				</summary>
				<div class="p-faq__a">
					<span class="p-faq__a-mark">A</span>
					<p class="p-faq__a-text">もちろん可能です。現在の治療内容・経過をお伺いした上で、NOIRでの治療設計が適切か、または併用が安全かを医師がご説明します。</p>
				</div>
			</details>

		</div>

		<div class="p-faq__more" data-reveal>
			<a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="c-btn c-btn--ghost">
				FAQ一覧を見る
				<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</a>
		</div>

	</div>
</section>


<!-- ==========================================================
     SECTION 09: Access
     ── アクセス・営業時間
========================================================== -->
<section class="p-access" id="access">
	<div class="l-wrap">

		<header class="c-section-head c-section-head--start" data-reveal>
			<p class="c-eyebrow">Access</p>
			<h2 class="c-h2">六本木 / 西麻布、<br class="u-sp-only">徒歩圏内。</h2>
		</header>

		<div class="p-access__grid">

			<div class="p-access__info" data-reveal>
				<dl class="p-access__list">
					<dt>住所</dt>
					<dd><?php echo esc_html( noir_address() ); ?></dd>
					<dt>最寄り駅</dt>
					<dd>
						東京メトロ日比谷線「六本木駅」3番出口より徒歩7分<br>
						東京メトロ千代田線「乃木坂駅」5番出口より徒歩8分
					</dd>
					<dt>営業時間</dt>
					<dd><?php echo esc_html( noir_hours() ); ?></dd>
					<dt>電話番号</dt>
					<dd><a href="tel:<?php echo esc_attr( noir_tel_link() ); ?>" class="p-access__tel"><?php echo esc_html( noir_tel_display() ); ?></a></dd>
				</dl>

				<div class="p-access__cta">
					<a href="<?php echo esc_url( home_url( '/access/' ) ); ?>" class="c-btn c-btn--ghost">
						詳しいアクセス情報
						<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
					</a>
				</div>
			</div>

			<div class="p-access__map" data-reveal data-delay="1">
				<img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&auto=format&fit=crop&q=80"
				     alt="クリニック外観のイメージ" loading="lazy" decoding="async">
			</div>

		</div>

	</div>
</section>


<!-- ==========================================================
     SECTION 10: Reservation
     ── 空き状況カレンダー＋予約フォーム
========================================================== -->
<?php get_template_part( 'template-parts/reservation' ); ?>


</main>

<?php get_footer();
