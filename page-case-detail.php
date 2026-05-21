<?php
/**
 * Template Name: 症例詳細
 *
 * page-case-detail.php — 症例詳細ページ
 *
 * 【WordPress 化の方針】
 *  症例は本来コンテンツが増えていくものなので、最終的には
 *  カスタム投稿タイプ「case」+ single-case.php へ移行するのが理想。
 *  - Before/After 画像 → アイキャッチ + ACF 画像フィールド
 *  - カルテ（年齢・期間・料金等）→ ACF のカスタムフィールド群
 *  - 担当医 → CPT「doctor」との関連付け
 *  本テンプレートの .p-casedetail 構造は、その移行後も流用できる。
 *
 *  現状は1症例分をハードコードし、固定ページとして見せている。
 *
 * @package NOIR_Mens_Clinic
 */

get_header();

get_template_part( 'template-parts/pagehead', null, array(
	'en'    => 'Patient Case',
	'title' => 'ヒゲ脱毛の症例',
	'lead'  => "青ヒゲと、毎朝の手入れから解放されたい。<br>32歳・男性の5回コースの記録です。",
) );

get_template_part( 'template-parts/breadcrumb', null, array(
	'parent'  => array(
		'label' => '症例紹介',
		'url'   => home_url( '/#case' ),
	),
	'current' => 'ヒゲ脱毛の症例',
) );
?>

<main id="main">

<section class="p-casedetail">
	<div class="l-wrap p-casedetail__inner">

		<!-- Before / After -->
		<div class="p-casedetail__compare">
			<div class="p-casedetail__shot" data-reveal="left">
				<picture>
					<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.webp" type="image/webp">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.jpg" alt="ヒゲ脱毛 施術前の状態" width="900" height="600" loading="lazy" decoding="async">
				</picture>
				<span class="p-casedetail__shot-label p-casedetail__shot-label--before">Before</span>
			</div>
			<div class="p-casedetail__shot" data-reveal="right">
				<picture>
					<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.webp" type="image/webp">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-epil.jpg" alt="ヒゲ脱毛 5回施術後の状態" width="900" height="600" loading="lazy" decoding="async">
				</picture>
				<span class="p-casedetail__shot-label p-casedetail__shot-label--after">After / 5回後</span>
			</div>
		</div>

		<!-- 症例サマリー（カルテ風） -->
		<div class="p-casedetail__summary" data-reveal>
			<div class="p-casedetail__summary-head">
				<span class="p-casedetail__summary-cat">医療脱毛 — ヒゲ</span>
				<h2 class="p-casedetail__summary-title">青ヒゲと、毎朝の手入れから解放されたい</h2>
			</div>
			<div class="p-casedetail__chart">
				<div class="p-casedetail__chart-item">
					<p class="p-casedetail__chart-label">年齢・性別</p>
					<p class="p-casedetail__chart-value">30代前半・男性</p>
				</div>
				<div class="p-casedetail__chart-item">
					<p class="p-casedetail__chart-label">施術内容</p>
					<p class="p-casedetail__chart-value">ヒゲ脱毛 5回コース</p>
				</div>
				<div class="p-casedetail__chart-item">
					<p class="p-casedetail__chart-label">施術期間</p>
					<p class="p-casedetail__chart-value">約<strong>10</strong>ヶ月</p>
				</div>
				<div class="p-casedetail__chart-item">
					<p class="p-casedetail__chart-label">1回の施術時間</p>
					<p class="p-casedetail__chart-value">約<strong>20</strong>分</p>
				</div>
				<div class="p-casedetail__chart-item">
					<p class="p-casedetail__chart-label">ダウンタイム</p>
					<p class="p-casedetail__chart-value">ほぼ無し</p>
				</div>
				<div class="p-casedetail__chart-item">
					<p class="p-casedetail__chart-label">料金（税込）</p>
					<p class="p-casedetail__chart-value">¥<strong>58,000</strong></p>
				</div>
			</div>
		</div>

		<!-- 経過の解説 -->
		<div class="c-prose" data-reveal>
			<h2>来院のきっかけと、お悩み</h2>
			<p>
				「夕方になると青みが目立ち、清潔感が出せない」というお悩みで来院されました。
				毎朝のヒゲ剃りに時間がかかること、剃り負けで肌が荒れやすいことも、
				長年の負担になっていたとのことです。営業職で人と会う機会が多く、
				第一印象を整えたいというご希望がありました。
			</p>
			<h2>治療方針</h2>
			<p>
				毛量が多く、肌色は標準的だったため、アレキサンドライトレーザーを基本に、
				密度の高い部位はダイオードレーザーを併用する方針としました。
				痛みに不安があるとのことだったため、麻酔クリームを使用。
				2ヶ月間隔で計5回の施術を行いました。
			</p>
			<h2>経過</h2>
			<p>
				3回目を終えたあたりから、朝のヒゲ剃りの頻度が「毎日」から「2日に1回」へ。
				5回完了時点で、夕方の青みがほぼ気にならない状態になりました。
				毛が完全に無くなるのではなく「整えやすい量に減らす」ことを目標としたため、
				自然な範囲でヒゲをデザインできる状態を維持しています。
			</p>
		</div>

		<!-- 担当医コメント -->
		<div class="p-casedetail__doctor" data-reveal>
			<div class="p-casedetail__doctor-avatar" aria-hidden="true">
				<svg viewBox="0 0 48 48" fill="none" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="17" r="9"/><path d="M8 41c0-9 7-14 16-14s16 5 16 14"/></svg>
			</div>
			<div>
				<p class="p-casedetail__doctor-role">担当医 — Director</p>
				<p class="p-casedetail__doctor-name">高橋 慎一</p>
				<p class="p-casedetail__doctor-comment">
					ヒゲ脱毛は「全部無くす」だけが正解ではありません。この方の場合、
					ご職業やライフスタイルをうかがったうえで、あえて少し残し、
					デザインできる量に整えました。毛量・肌質には個人差があるため、
					カウンセリングで仕上がりのイメージをすり合わせることを大切にしています。
				</p>
			</div>
		</div>

		<!-- 患者コメント -->
		<div class="p-casedetail__voice" data-reveal>
			<p class="p-casedetail__voice-mark" aria-hidden="true">&ldquo;</p>
			<p class="p-casedetail__voice-text">
				朝の支度がはっきり楽になりました。剃り負けがなくなって肌の調子も良いです。
				何より、夕方に鏡を見たときの「あの青さ」が無いのが一番うれしい。
				もっと早く来ればよかった、というのが正直な感想です。
			</p>
			<p class="p-casedetail__voice-author">— 32歳・男性 / 会社員（営業職）</p>
		</div>

		<!-- 注意事項 -->
		<div class="p-casedetail__caution" data-reveal>
			<p class="p-casedetail__caution-title">この症例に関する注意事項</p>
			<ul>
				<li>掲載写真はご本人の同意を得て掲載しています。効果には個人差があり、同様の結果を保証するものではありません。</li>
				<li>医療脱毛は自由診療です。健康保険は適用されません。</li>
				<li>副作用・リスク：一時的な赤み・ほてり・毛嚢炎・色素沈着が生じる場合があります。</li>
				<li>毛量・肌質・毛周期により、必要な回数や期間は異なります。</li>
			</ul>
		</div>

	</div>
</section>


<!-- 回遊導線 — 他の症例 -->
<section class="p-related">
	<div class="l-wrap">
		<div class="p-related__head">
			<p class="p-related__en">Other Cases</p>
			<h2 class="p-related__title">他の症例を見る</h2>
		</div>
		<div class="p-related__grid">
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('case-detail') ); ?>" data-reveal>
				<div class="p-related__card-visual">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-skin.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-skin.jpg" alt="肌治療の症例" width="900" height="600" loading="lazy" decoding="async">
					</picture>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">肌治療 — ニキビ跡</p>
					<p class="p-related__card-title">人前で、自信を持って話せる肌に</p>
					<p class="p-related__card-text">28歳・男性 / ダーマペン4 計5回</p>
					<span class="p-related__card-more">症例を見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('case-detail') ); ?>" data-reveal data-delay="1">
				<div class="p-related__card-visual">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-aga.webp" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/cases/case-aga.jpg" alt="AGA治療の症例" width="900" height="600" loading="lazy" decoding="async">
					</picture>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">AGA — 生え際</p>
					<p class="p-related__card-title">「気になる」が「気にならない」へ</p>
					<p class="p-related__card-text">41歳・男性 / 内服+外用 12ヶ月</p>
					<span class="p-related__card-more">症例を見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
			<a class="p-related__card" href="<?php echo esc_url( noir_get_page_url('treatment-detail') ); ?>" data-reveal data-delay="2">
				<div class="p-related__card-visual" aria-hidden="true">
					<svg viewBox="0 0 48 48" fill="none" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M24 6v10M24 32v10M6 24h10M32 24h10M24 17a7 7 0 100 14 7 7 0 000-14z"/></svg>
				</div>
				<div class="p-related__card-body">
					<p class="p-related__card-cat">Treatment</p>
					<p class="p-related__card-title">医療脱毛の詳細を見る</p>
					<p class="p-related__card-text">この症例の施術メニュー・料金・流れをご案内します。</p>
					<span class="p-related__card-more">詳しく見る<svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg></span>
				</div>
			</a>
		</div>
	</div>
</section>

</main>

<?php
get_template_part( 'template-parts/cta', null, array(
	'title' => "あなたの場合を、<br class=\"u-sp-only\">相談してみる。",
	'text'  => "症例はあくまで一例です。あなたの毛質・肌質に合った治療を、<br>無料カウンセリングで医師がご提案します。",
) );

get_footer();
