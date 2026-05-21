<?php
/**
 * Template Name: 診療詳細（医療脱毛）
 *
 * page-treatment-detail.php — 診療詳細ページ
 *
 * 【WordPress 化の方針】
 *  現状は「医療脱毛」1ページ分をハードコードしている。
 *  施術が増える場合は、カスタム投稿タイプ「treatment」を作り、
 *  single-treatment.php に発展させるのが自然。
 *  その際この HTML 構造（.p-treatment 系）はそのまま流用できる。
 *
 *  回遊導線（関連症例・他の診療）のリンクは noir_get_page_url() で
 *  解決しているため、固定ページのスラッグさえ合っていれば動く。
 *
 * @package NOIR_Mens_Clinic
 */

get_header();

get_template_part( 'template-parts/pagehead', null, array(
	'en'    => 'Treatment Detail',
	'title' => '医療脱毛',
	'lead'  => "ヒゲ・全身・VIO に対応。痛みを抑えたレーザーで、<br>清潔感のある印象へ。",
) );

get_template_part( 'template-parts/breadcrumb', null, array(
	'parent'  => array(
		'label' => '施術メニュー',
		'url'   => home_url( '/#menu' ),
	),
	'current' => '医療脱毛',
) );
?>

<main id="main">

<!-- ==========================================================
     TREATMENT — 詳細
========================================================== -->
<section class="p-treatment">
	<div class="l-wrap p-treatment__inner">

		<!-- イントロ -->
		<div class="p-treatment__intro">
			<div data-reveal="left">
				<p class="p-treatment__intro-en">Medical Hair Removal</p>
				<h2 class="p-treatment__intro-title">「剃る」から、<br>「整える」へ。</h2>
				<p class="p-treatment__intro-text">
					毎朝のヒゲ剃りに費やす時間、剃り負けによる肌荒れ、夕方には目立つ青み。
					医療脱毛は、これらの「当たり前」を根本から見直す選択肢です。NOIR では、
					医師が肌質・毛質・骨格を診察したうえで、レーザーの種類と出力を一人ひとりに設計。
					ただ毛を減らすのではなく、その方の輪郭に合った「清潔感のある印象」へ導きます。
				</p>
			</div>
			<div class="p-treatment__intro-visual" data-reveal="right" aria-hidden="true">
				<svg viewBox="0 0 48 48" fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 6v10M24 32v10M6 24h10M32 24h10M24 17a7 7 0 100 14 7 7 0 000-14z"/></svg>
			</div>
		</div>

		<!-- スペック表 -->
		<div class="p-treatment__spec" data-reveal>
			<div class="p-treatment__spec-item">
				<p class="p-treatment__spec-label">施術時間</p>
				<p class="p-treatment__spec-value">30<small>〜90分 / 回</small></p>
			</div>
			<div class="p-treatment__spec-item">
				<p class="p-treatment__spec-label">ダウンタイム</p>
				<p class="p-treatment__spec-value">ほぼ無し<small>当日から通常生活</small></p>
			</div>
			<div class="p-treatment__spec-item">
				<p class="p-treatment__spec-label">推奨回数</p>
				<p class="p-treatment__spec-value">5<small>〜8回が目安</small></p>
			</div>
			<div class="p-treatment__spec-item">
				<p class="p-treatment__spec-label">料金目安</p>
				<p class="p-treatment__spec-value">¥9,800<small>〜 / 回（税込）</small></p>
			</div>
		</div>

		<!-- 特徴 -->
		<div class="p-treatment__block">
			<div class="p-treatment__block-head" data-reveal>
				<span class="p-treatment__block-num" aria-hidden="true">01</span>
				<h2 class="p-treatment__block-title">NOIR の医療脱毛、3つの特徴</h2>
			</div>
			<div class="p-treatment__features">
				<div class="p-treatment__feature" data-reveal>
					<span class="p-treatment__feature-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M12 18v4M2 12h4M18 12h4M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
					</span>
					<h3 class="p-treatment__feature-title">3種のレーザーを使い分け</h3>
					<p class="p-treatment__feature-text">
						毛質・肌質・部位に応じて、アレキサンドライト・ダイオード・ヤグの3種から最適なレーザーを選択します。
					</p>
				</div>
				<div class="p-treatment__feature" data-reveal data-delay="1">
					<span class="p-treatment__feature-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a9 9 0 109 9M12 7v5l3 3"/></svg>
					</span>
					<h3 class="p-treatment__feature-title">痛みへの徹底配慮</h3>
					<p class="p-treatment__feature-text">
						冷却機能つき機器と麻酔クリームの併用で、痛みに弱い方も無理なく続けられる施術環境を整えています。
					</p>
				</div>
				<div class="p-treatment__feature" data-reveal data-delay="2">
					<span class="p-treatment__feature-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
					</span>
					<h3 class="p-treatment__feature-title">医師による経過診察</h3>
					<p class="p-treatment__feature-text">
						毎回の施術前に医師が肌状態を確認。毛の減り方を見ながら、出力や間隔を調整していきます。
					</p>
				</div>
			</div>
		</div>

		<!-- 施術の流れ -->
		<div class="p-treatment__block">
			<div class="p-treatment__block-head" data-reveal>
				<span class="p-treatment__block-num" aria-hidden="true">02</span>
				<h2 class="p-treatment__block-title">施術当日の流れ</h2>
			</div>
			<div class="p-treatment__steps">
				<div class="p-treatment__step" data-reveal>
					<span class="p-treatment__step-num">1</span>
					<div>
						<h3 class="p-treatment__step-title">肌状態の確認</h3>
						<p class="p-treatment__step-text">医師が当日の肌状態を診察します。日焼けや肌トラブルがある場合は、施術時期を調整します。</p>
					</div>
				</div>
				<div class="p-treatment__step" data-reveal>
					<span class="p-treatment__step-num">2</span>
					<div>
						<h3 class="p-treatment__step-title">シェービング・麻酔</h3>
						<p class="p-treatment__step-text">施術部位を整え、ご希望に応じて麻酔クリームを塗布します。麻酔が効くまで20分ほどお待ちいただきます。</p>
					</div>
				</div>
				<div class="p-treatment__step" data-reveal>
					<span class="p-treatment__step-num">3</span>
					<div>
						<h3 class="p-treatment__step-title">レーザー照射</h3>
						<p class="p-treatment__step-text">冷却しながらレーザーを照射します。ヒゲであれば15〜20分程度で完了します。</p>
					</div>
				</div>
				<div class="p-treatment__step" data-reveal>
					<span class="p-treatment__step-num">4</span>
					<div>
						<h3 class="p-treatment__step-title">アフターケア</h3>
						<p class="p-treatment__step-text">照射後の肌を冷却し、保湿します。次回のご予約と、自宅でのケア方法をご案内します。</p>
					</div>
				</div>
			</div>
		</div>

		<!-- 注意事項 -->
		<div class="p-treatment__block">
			<div class="p-treatment__block-head" data-reveal>
				<span class="p-treatment__block-num" aria-hidden="true">03</span>
				<h2 class="p-treatment__block-title">施術前後の注意事項</h2>
			</div>
			<ul class="p-treatment__notes" data-reveal>
				<li>施術前後2週間は、施術部位の日焼けをお控えください。色素沈着のリスクが高まります。</li>
				<li>照射後、一時的な赤み・ほてり・毛嚢炎（ニキビ様の炎症）が生じる場合があります。通常は数日で落ち着きます。</li>
				<li>レーザーは黒い色素に反応するため、白髪・産毛には効果が出にくい場合があります。</li>
				<li>施術当日の激しい運動・飲酒・サウナ・長時間の入浴はお控えください。</li>
				<li>持病・服薬がある方は、カウンセリング時に必ずお申し出ください。</li>
			</ul>
		</div>

	</div>
</section>


<!-- ==========================================================
     回遊導線 — 関連症例
========================================================== -->
<section class="p-related">
	<div class="l-wrap">
		<div class="p-related__head">
			<p class="p-related__en">Related Cases</p>
			<h2 class="p-related__title">この施術の症例</h2>
		</div>
		<div class="p-related__grid">
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('case-detail') ); ?>" data-reveal>
				<div class="p-related__card-visual">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.jpg" alt="ヒゲ脱毛の症例" width="900" height="600" loading="lazy" decoding="async">
					</picture>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">医療脱毛 — ヒゲ</p>
					<p class="p-related__card-title">青ヒゲと、毎朝の手入れから解放されたい</p>
					<p class="p-related__card-text">32歳・男性 / ヒゲ脱毛 5回コース</p>
					<span class="p-related__card-more">症例を見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('case-detail') ); ?>" data-reveal data-delay="1">
				<div class="p-related__card-visual">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-skin.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-skin.jpg" alt="全身脱毛の症例" width="900" height="600" loading="lazy" decoding="async">
					</picture>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">医療脱毛 — 全身</p>
					<p class="p-related__card-title">清潔感を、足元まで徹底したい</p>
					<p class="p-related__card-text">35歳・男性 / 全身脱毛 8回コース</p>
					<span class="p-related__card-more">症例を見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('case-detail') ); ?>" data-reveal data-delay="2">
				<div class="p-related__card-visual">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-aga.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-aga.jpg" alt="VIO脱毛の症例" width="900" height="600" loading="lazy" decoding="async">
					</picture>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">医療脱毛 — VIO</p>
					<p class="p-related__card-title">デリケートゾーンの蒸れ・においを軽減</p>
					<p class="p-related__card-text">29歳・男性 / VIO脱毛 5回コース</p>
					<span class="p-related__card-more">症例を見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
		</div>
	</div>
</section>


<!-- ==========================================================
     回遊導線 — 他の診療
========================================================== -->
<section class="p-related" style="background:var(--c-paper);">
	<div class="l-wrap">
		<div class="p-related__head">
			<p class="p-related__en">Other Treatments</p>
			<h2 class="p-related__title">他の診療を見る</h2>
		</div>
		<div class="p-related__grid">
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('treatment-detail') ); ?>" data-reveal>
				<div class="p-related__card-visual" aria-hidden="true">
					<svg viewBox="0 0 48 48" fill="none" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M24 8c8 0 14 6 14 14 0 9-7 18-14 18S10 31 10 22c0-8 6-14 14-14z"/><path d="M19 22h.02M29 22h.02M21 30c1.5 1.5 4.5 1.5 6 0"/></svg>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">Skin Treatment</p>
					<p class="p-related__card-title">肌治療</p>
					<p class="p-related__card-text">ニキビ・毛穴・くすみ・シミに。肌悩みに応じた施術をご提案します。</p>
					<span class="p-related__card-more">詳しく見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('treatment-detail') ); ?>" data-reveal data-delay="1">
				<div class="p-related__card-visual" aria-hidden="true">
					<svg viewBox="0 0 48 48" fill="none" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 28c0-10 5-16 12-16s12 6 12 16M16 26c1-6 4-9 8-9M14 34h20M17 40h14"/></svg>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">AGA Treatment</p>
					<p class="p-related__card-title">AGA治療</p>
					<p class="p-related__card-text">内服・外用・注入治療を組み合わせ、薄毛に医学的にアプローチします。</p>
					<span class="p-related__card-more">詳しく見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('doctor') ); ?>" data-reveal data-delay="2">
				<div class="p-related__card-visual" aria-hidden="true">
					<svg viewBox="0 0 48 48" fill="none" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="17" r="9"/><path d="M8 41c0-9 7-14 16-14s16 5 16 14"/></svg>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">Our Doctors</p>
					<p class="p-related__card-title">ドクター紹介</p>
					<p class="p-related__card-text">施術を担当する医師の専門領域・経歴をご紹介します。</p>
					<span class="p-related__card-more">詳しく見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
		</div>
	</div>
</section>

</main>

<?php
get_template_part( 'template-parts/cta', null, array(
	'title' => 'まずは、肌を診せてください。',
	'text'  => "医療脱毛が自分に合うかどうか、<br>無料カウンセリングで医師が直接お答えします。",
) );

get_footer();
