<?php
/**
 * Template Name: ドクター紹介
 *
 * page-doctor.php — ドクター紹介ページ
 *
 * 【使い方】
 *  管理画面で固定ページを作成し、スラッグを「doctor」に、
 *  ページ属性のテンプレートで「ドクター紹介」を選択する。
 *  （スラッグ doctor のページには、このファイルが自動適用される）
 *
 * 【WordPress 化の方針】
 *  医師プロフィールは現状ハードコードしているが、将来的には
 *  カスタム投稿タイプ「doctor」+ ACF で管理画面編集に移行できる。
 *  その場合 .p-doctor__profile の中身を WP_Query ループに置換する。
 *  下の HTML 構造（クラス名）はそのまま使えるよう設計してある。
 *
 * @package NOIR_Mens_Clinic
 */

get_header();

// 見出し帯
get_template_part( 'template-parts/pagehead', null, array(
	'en'    => 'Our Doctors',
	'title' => 'ドクター紹介',
	'lead'  => "あなたの「変わりたい」に向き合うのは、<br>経験と専門性を兼ね備えた医師たちです。",
) );

// パンくず（親なし）
get_template_part( 'template-parts/breadcrumb', null, array(
	'current' => 'ドクター紹介',
) );
?>

<main id="main">

<!-- ==========================================================
     DOCTOR — 医師プロフィール
     ※ 将来は CPT「doctor」のループに置換可能
========================================================== -->
<section class="p-doctor">
	<div class="l-wrap">

		<article class="p-doctor__profile" data-reveal>
			<div class="p-doctor__photo">
				<span class="p-doctor__photo-mark" aria-hidden="true">
					<svg viewBox="0 0 48 48" fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="17" r="9"/><path d="M8 41c0-9 7-14 16-14s16 5 16 14"/></svg>
				</span>
				<span class="p-doctor__photo-label">Director</span>
			</div>
			<div class="p-doctor__body">
				<p class="p-doctor__role">院長 &mdash; Director</p>
				<h2 class="p-doctor__name">
					<span class="p-doctor__name-ja">高橋 慎一</span>
					<span class="p-doctor__name-en">Shinichi Takahashi, M.D.</span>
				</h2>
				<p class="p-doctor__lead">
					「肌の科学を、男性に。」をモットーに、根拠ある美容医療を追求。
				</p>
				<p class="p-doctor__text">
					美容皮膚科領域で15年の臨床経験を持つ。特にメンズの肌治療・医療脱毛における
					レーザーパラメータの設計を専門とし、肌質・毛質に応じた治療の最適化に強みを持つ。
					「流行ではなく、エビデンスで語れる治療を」という姿勢で、一人ひとりの診察にあたる。
				</p>
				<dl class="p-doctor__meta">
					<dt>専門領域</dt>
					<dd>美容皮膚科 / 医療脱毛 / 肌治療</dd>
					<dt>所属学会</dt>
					<dd>日本皮膚科学会 / 日本美容皮膚科学会</dd>
					<dt>経歴</dt>
					<dd>都内総合病院 皮膚科を経て、美容クリニック開業。2026年 NOIR Men's Clinic 院長に就任。</dd>
				</dl>
			</div>
		</article>

		<article class="p-doctor__profile p-doctor__profile--reverse" data-reveal>
			<div class="p-doctor__photo">
				<span class="p-doctor__photo-mark" aria-hidden="true">
					<svg viewBox="0 0 48 48" fill="none" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="17" r="9"/><path d="M8 41c0-9 7-14 16-14s16 5 16 14"/></svg>
				</span>
				<span class="p-doctor__photo-label">Vice Director</span>
			</div>
			<div class="p-doctor__body">
				<p class="p-doctor__role">副院長 &mdash; Vice Director</p>
				<h2 class="p-doctor__name">
					<span class="p-doctor__name-ja">佐藤 玲</span>
					<span class="p-doctor__name-en">Ryo Sato, M.D.</span>
				</h2>
				<p class="p-doctor__lead">
					AGA・薄毛治療を専門に、毛髪医療のプロトコル設計を担う。
				</p>
				<p class="p-doctor__text">
					男性の毛髪医療を専門領域とし、内服・外用・注入治療を組み合わせた
					治療設計を担当。臨床データに基づくアプローチで、生え際・つむじ・全体の薄毛に対し、
					一人ひとりの進行度に応じたプランを提案する。カウンセリングでの丁寧な説明に定評がある。
				</p>
				<dl class="p-doctor__meta">
					<dt>専門領域</dt>
					<dd>AGA治療 / 毛髪医療 / 抗加齢医学</dd>
					<dt>所属学会</dt>
					<dd>日本臨床毛髪学会 / 日本抗加齢医学会</dd>
					<dt>経歴</dt>
					<dd>毛髪治療専門クリニックでの診療経験を経て、NOIR Men's Clinic 副院長に就任。</dd>
				</dl>
			</div>
		</article>

	</div>
</section>

<!-- ==========================================================
     診療時間表
========================================================== -->
<section class="p-hours">
	<div class="l-wrap l-wrap--narrow">
		<header class="c-section-head c-section-head--center">
			<p class="c-eyebrow c-eyebrow--center">Clinic Hours</p>
			<h2 class="c-section-head__title">診療時間</h2>
		</header>
		<div class="p-hours__table" data-reveal>
			<table>
				<thead>
					<tr>
						<th scope="col">診療時間</th>
						<th scope="col">月</th><th scope="col">火</th><th scope="col">水</th>
						<th scope="col">木</th><th scope="col">金</th>
						<th scope="col">土</th><th scope="col">日</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">11:00 - 20:00</th>
						<td>&#9679;</td><td>&#9679;</td><td>&#9679;</td><td>&#9679;</td><td>&#9679;</td>
						<td>&#9679;</td><td>&#9679;</td>
					</tr>
				</tbody>
			</table>
			<p class="p-hours__note">
				年中無休 / 完全予約制　最終受付は施術内容により異なります。<br>
				ご予約・ご相談はお電話、または24時間受付のWEBフォームより承ります。
			</p>
		</div>
	</div>
</section>

</main>

<?php
// 予約 CTA バンド（このページ用の文言で）
get_template_part( 'template-parts/cta', null, array(
	'title' => '医師に、直接相談する。',
	'text'  => "無料カウンセリングは24時間 WEB から受付。<br>あなたのお悩みに、医師が直接お応えします。",
) );

get_footer();
