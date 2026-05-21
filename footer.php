<?php
/**
 * footer.php — 全ページ共通のフッター
 *
 * フッター本体 〜 </html> までを出力する。
 * 各テンプレートは get_footer() でこのファイルを読み込む。
 *
 * 【注意】予約導線の CTA バンドは「フッター」ではなく
 *  各テンプレート側の責務とした。ページごとに見出し文言を
 *  変えたいため（例: 症例ページなら「あなたの場合を相談する」）。
 *  → CTA は get_template_part('template-parts/cta') で出し分ける。
 *
 * @package NOIR_Mens_Clinic
 */
?>

<!-- ==========================================================
     FOOTER — 全ページ共通
========================================================== -->
<footer class="l-footer">
	<div class="l-wrap">
		<div class="l-footer__main">
			<div class="l-footer__brand">
				<p class="l-footer__brand-mark">N<em>O</em>IR</p>
				<p class="l-footer__brand-sub">Men's Clinic</p>
				<p class="l-footer__brand-text">
					男性のための、メディカル・エステティック。医療脱毛・AGA・肌治療を、確かなエビデンスとともに。
				</p>
				<dl class="l-footer__info">
					<dt>住所</dt><dd><?php echo esc_html( noir_get_address() ); ?></dd>
					<dt>診療</dt><dd>11:00 - 20:00 / 年中無休・完全予約制</dd>
					<dt>TEL</dt><dd><?php echo esc_html( noir_get_tel_display() ); ?></dd>
				</dl>
			</div>
			<nav aria-label="フッターナビ">
				<p class="l-footer__col-title">Menu</p>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu',
					'container'      => false,
					'menu_class'     => 'l-footer__links',
					'fallback_cb'    => 'noir_fallback_footer_menu',
					'depth'          => 1,
				) );
				?>
			</nav>
			<nav aria-label="フッターナビ（その他）">
				<p class="l-footer__col-title">Information</p>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-info',
					'container'      => false,
					'menu_class'     => 'l-footer__links',
					'fallback_cb'    => 'noir_fallback_footer_info',
					'depth'          => 1,
				) );
				?>
			</nav>
		</div>
		<div class="l-footer__bottom">
			<p class="l-footer__copy">
				&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>. All rights reserved.
			</p>
			<div class="l-footer__legal">
				<a href="<?php echo esc_url( noir_get_page_url( 'privacy' ) ); ?>">プライバシーポリシー</a>
				<a href="#">特定商取引法に基づく表記</a>
			</div>
		</div>
	</div>
</footer>

<button class="c-totop" id="js-totop" type="button" aria-label="ページの先頭へ戻る">
	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M8 13V3M4 7l4-4 4 4"/></svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
