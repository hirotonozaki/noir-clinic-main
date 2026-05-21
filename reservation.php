<?php
/**
 * template-parts/reservation.php — 予約セクション
 *
 * 空き状況カレンダー（○/△/×）＋ 予約フォーム。
 *
 * 【呼び出し方】
 *   get_template_part( 'template-parts/reservation' );
 *   front-page.php の CTA 付近、または専用の予約ページで使う。
 *
 * 【Contact Form 7 への将来移行について】
 *  現状の <form> はプロトタイプ（JSで送信を受け止めるだけ）。
 *  実運用では下記いずれかに置き換える：
 *
 *    A) Contact Form 7 を使う場合
 *      - 管理画面で CF7 フォームを作成（同じ項目で）
 *      - 下の <form>〜</form> を [contact-form-7 id="..."] の
 *        do_shortcode() 出力に差し替える
 *      - 「選択した日時」は CF7 側に hidden フィールド
 *        [hidden datetime] を作り、その input の id を
 *        下の JS の DATETIME_INPUT_ID に合わせる
 *        → カレンダーで選んだ値が CF7 の送信データに乗る
 *
 *   B) 空き状況を動的にする場合
 *      - 下の noir_reservation_availability() を、予約システムや
 *        カスタム投稿・オプションから取得する実装に差し替える
 *      - HTML/JS 側は変更不要（データ構造を保てばよい）
 *
 *  カレンダー（表示・選択UI）とフォーム（送信）を分離してあるため、
 *  フォーム本体だけ CF7 に載せ替えても、日時連携は生き続ける。
 *
 * @package NOIR_Mens_Clinic
 */

/**
 * 空き状況データを返す。
 * プロトタイプではダミーを返す。実運用ではここを
 * 予約システム連携・管理画面設定などに差し替える。
 *
 * @return array{dates:array, times:array, avail:array}
 */
if ( ! function_exists( 'noir_reservation_availability' ) ) {
	function noir_reservation_availability() {
		// 値: 'ok'=○空きあり / 'few'=△残りわずか / 'none'=×予約不可
		return array(
			'dates' => array(
				array( 'date' => '5/18', 'wd' => '月', 'wdi' => 0 ),
				array( 'date' => '5/19', 'wd' => '火', 'wdi' => 1 ),
				array( 'date' => '5/20', 'wd' => '水', 'wdi' => 2 ),
				array( 'date' => '5/21', 'wd' => '木', 'wdi' => 3 ),
				array( 'date' => '5/22', 'wd' => '金', 'wdi' => 4 ),
				array( 'date' => '5/23', 'wd' => '土', 'wdi' => 5 ),
				array( 'date' => '5/24', 'wd' => '日', 'wdi' => 6 ),
			),
			'times' => array( '11:00', '13:00', '15:00', '17:00', '19:00' ),
			'avail' => array(
				array( 'ok','few','ok','ok','none','few','none' ),
				array( 'few','ok','ok','none','ok','none','few' ),
				array( 'none','ok','few','ok','ok','few','none' ),
				array( 'ok','none','ok','few','ok','ok','few' ),
				array( 'few','few','none','ok','few','ok','none' ),
			),
		);
	}
}

$noir_av    = noir_reservation_availability();
$noir_marks = array( 'ok' => '○', 'few' => '△', 'none' => '×' );
?>

<section class="p-reserve" id="reservation">
	<div class="l-wrap l-wrap--narrow">

		<header class="c-section-head c-section-head--center" data-reveal>
			<p class="c-eyebrow c-eyebrow--center">Reservation</p>
			<h2 class="c-h2">空き状況から、ご予約。</h2>
			<p class="c-section-head__lead">
				ご希望の日時を選び、フォームにお進みください。<br>
				無料カウンセリングは24時間 WEB から受付しています。
			</p>
		</header>

		<!-- ===== 空き状況カレンダー ===== -->
		<div class="p-reserve__cal-wrap" data-reveal>
			<div class="p-reserve__cal-scroll">
				<table class="c-caltable">
					<thead>
						<tr>
							<th>時間 / 日付</th>
							<?php foreach ( $noir_av['dates'] as $d ) :
								$cls = '';
								if ( 5 === $d['wdi'] ) { $cls = ' is-sat'; }
								if ( 6 === $d['wdi'] ) { $cls = ' is-sun'; }
								?>
								<th class="<?php echo esc_attr( trim( $cls ) ); ?>">
									<?php echo esc_html( $d['date'] ); ?>
									<span class="wd"><?php echo esc_html( $d['wd'] ); ?></span>
								</th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $noir_av['times'] as $ti => $time ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $time ); ?></th>
								<?php foreach ( $noir_av['dates'] as $di => $d ) :
									$status = isset( $noir_av['avail'][ $ti ][ $di ] )
										? $noir_av['avail'][ $ti ][ $di ] : 'none';
									$is_open = ( 'none' !== $status );
									$label   = $d['date'] . '（' . $d['wd'] . '）' . $time;
									$a11y    = ( 'ok' === $status ) ? '空きあり'
										: ( ( 'few' === $status ) ? '残りわずか' : '予約不可' );
									?>
									<td>
										<button type="button"
											class="c-cell c-cell--<?php echo esc_attr( $status ); ?>"
											<?php echo $is_open ? '' : 'disabled'; ?>
											data-datetime="<?php echo esc_attr( $label ); ?>"
											aria-label="<?php echo esc_attr( $label . ' ' . $a11y ); ?>">
											<span class="c-cell__mark"><?php echo esc_html( $noir_marks[ $status ] ); ?></span>
										</button>
									</td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- 凡例 -->
		<div class="p-reserve__legend" data-reveal>
			<span><i class="lg-ok">○</i> 空きあり</span>
			<span><i class="lg-few">△</i> 残りわずか</span>
			<span><i class="lg-none">×</i> 予約不可</span>
		</div>

		<!-- 選択中の日時 -->
		<div class="p-reserve__picked is-empty" id="js-reserve-picked" data-reveal>
			日時が選択されていません。上の表から○または△を選んでください。
		</div>

		<!-- ===== 予約フォーム ===== -->
		<?php
		/*
		 * 【CF7 移行ポイント】
		 *  ここから </form> までを、CF7 のショートコード出力に差し替える。
		 *    echo do_shortcode('[contact-form-7 id="123" title="予約"]');
		 *  その際、CF7 側に [hidden datetime] を置き、生成される
		 *  input の id を JS の DATETIME_INPUT_ID と合わせること。
		 */
		?>
		<form class="c-form" id="js-reserve-form" data-reveal
		      action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="noir_reservation">
			<?php wp_nonce_field( 'noir_reservation', 'noir_reservation_nonce' ); ?>

			<div class="c-form__row">
				<label class="c-form__label" for="r-name">お名前<span class="req">必須</span></label>
				<input class="c-form__input" type="text" id="r-name" name="name" required>
			</div>
			<div class="c-form__row">
				<label class="c-form__label" for="r-email">メールアドレス<span class="req">必須</span></label>
				<input class="c-form__input" type="email" id="r-email" name="email" required>
			</div>
			<div class="c-form__row">
				<label class="c-form__label" for="r-tel">電話番号<span class="req">必須</span></label>
				<input class="c-form__input" type="tel" id="r-tel" name="tel" required>
			</div>
			<div class="c-form__row">
				<label class="c-form__label" for="r-menu">希望メニュー<span class="req">必須</span></label>
				<select class="c-form__select" id="r-menu" name="menu" required>
					<option value="">選択してください</option>
					<option>医療脱毛</option>
					<option>肌治療</option>
					<option>AGA治療</option>
					<option>その他・相談したい</option>
				</select>
			</div>
			<div class="c-form__row">
				<label class="c-form__label">選択した日時<span class="req">必須</span></label>
				<div class="c-form__picked-inline" id="js-reserve-picked-inline">未選択</div>
				<input type="hidden" id="r-datetime" name="datetime" required>
				<p class="c-form__hint">上の空き状況表から選択すると、ここに反映されます。</p>
			</div>
			<div class="c-form__row">
				<label class="c-form__label" for="r-message">相談内容</label>
				<textarea class="c-form__textarea" id="r-message" name="message"
					placeholder="お悩みやご質問など、ご自由にご記入ください。"></textarea>
			</div>
			<label class="c-form__check">
				<input type="checkbox" id="r-agree" name="agree" required>
				<span><a href="<?php echo esc_url( noir_get_page_url( 'privacy' ) ); ?>">プライバシーポリシー</a>に同意のうえ送信します。<span class="req">必須</span></span>
			</label>
			<button class="c-form__submit" type="submit">
				<span>この内容で予約する</span>
				<svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
			</button>
		</form>

	</div>
</section>
