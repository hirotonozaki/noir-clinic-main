/**
 * ==========================================================
 *  NOIR Men's Clinic — main.js
 * ==========================================================
 *
 *  このファイルでやっていること(7つの機能):
 *    1. Header      — スクロールでヘッダーを黒のすりガラスへ
 *    2. Drawer      — モバイルドロワーの開閉
 *    3. Reveal      — スクロールに連動した要素のフェードイン
 *    4. SmoothScroll— アンカーリンクのスムーズスクロール
 *    5. ToTop       — 「トップへ戻る」ボタンの表示制御
 *    6. ReducedMotion — モーション控えめ設定への対応
 *    7. Form        — 予約フォームの簡易バリデーションと完了表示
 *
 *  【設計方針】
 *    - IIFE でグローバル汚染を避ける
 *    - 機能ごとにオブジェクトへ分離し、見通しを保つ
 *    - DOM が無くてもエラーにならないようガードを徹底
 *    - スクロール監視は IntersectionObserver / passive で軽量に
 *    - 将来 WordPress テーマ化しても、この main.js は無改修で動く
 *      (クラス名・id をテーマ側と一致させてあるため)
 * ==========================================================
 */
(function () {
	'use strict';

	/* ==========================================================
	   1. Header — スクロールでヘッダーの見た目を変える
	   ----------------------------------------------------------
	   60px を超えてスクロールしたら .l-header に .is-scrolled。
	   CSS 側で背景(黒のすりガラス)と境界線を表示する。
	   ========================================================== */
	const Header = {
		el: null,
		threshold: 60,

		init() {
			this.el = document.querySelector('.l-header');
			if (!this.el) return;

			this.update();
			window.addEventListener('scroll', () => this.update(), { passive: true });
		},

		update() {
			this.el.classList.toggle('is-scrolled', window.scrollY > this.threshold);
		},
	};


	/* ==========================================================
	   2. Drawer — モバイルドロワーの開閉
	   ----------------------------------------------------------
	   閉じるトリガー: ハンバーガー再押下 / オーバーレイ /
	                  内部リンク / ESC / PC幅へのリサイズ
	   ========================================================== */
	const Drawer = {
		isOpen: false,
		burger: null,
		drawer: null,
		overlay: null,

		init() {
			this.burger  = document.getElementById('js-burger');
			this.drawer  = document.getElementById('js-drawer');
			this.overlay = document.getElementById('js-overlay');
			if (!this.burger || !this.drawer) return;

			this.burger.addEventListener('click', () => {
				this.isOpen ? this.close() : this.open();
			});

			if (this.overlay) {
				this.overlay.addEventListener('click', () => this.close());
			}

			// ドロワー内リンクのクリックで閉じる
			this.drawer.querySelectorAll('a').forEach(a => {
				a.addEventListener('click', () => this.close());
			});

			// ESC キーで閉じる
			document.addEventListener('keydown', e => {
				if (e.key === 'Escape' && this.isOpen) this.close();
			});

			// PC 幅に戻ったら強制的に閉じる
			window.addEventListener('resize', () => {
				if (window.innerWidth > 1024 && this.isOpen) this.close();
			}, { passive: true });
		},

		open() {
			this.isOpen = true;
			this.burger.classList.add('is-active');
			this.burger.setAttribute('aria-expanded', 'true');
			this.drawer.classList.add('is-open');
			this.drawer.setAttribute('aria-hidden', 'false');
			if (this.overlay) this.overlay.classList.add('is-active');
			document.body.classList.add('is-locked');
		},

		close() {
			this.isOpen = false;
			this.burger.classList.remove('is-active');
			this.burger.setAttribute('aria-expanded', 'false');
			this.drawer.classList.remove('is-open');
			this.drawer.setAttribute('aria-hidden', 'true');
			if (this.overlay) this.overlay.classList.remove('is-active');
			document.body.classList.remove('is-locked');
		},
	};


	/* ==========================================================
	   3. Reveal — スクロールに連動した要素のフェードイン
	   ----------------------------------------------------------
	   [data-reveal] 要素が画面に入ったら .is-revealed を付与。
	   IntersectionObserver で軽量に。一度発火したら監視解除。
	   ========================================================== */
	const Reveal = {
		init() {
			const els = document.querySelectorAll('[data-reveal]');
			if (!els.length) return;

			// 非対応ブラウザでは即表示
			if (!('IntersectionObserver' in window)) {
				els.forEach(el => el.classList.add('is-revealed'));
				return;
			}

			const observer = new IntersectionObserver((entries) => {
				entries.forEach(entry => {
					if (!entry.isIntersecting) return;
					entry.target.classList.add('is-revealed');
					observer.unobserve(entry.target);
				});
			}, {
				threshold: 0.12,
				rootMargin: '0px 0px -8% 0px',
			});

			els.forEach(el => observer.observe(el));
		},
	};


	/* ==========================================================
	   4. SmoothScroll — アンカーリンクのスムーズスクロール
	   ----------------------------------------------------------
	   #xxx へのリンクで、固定ヘッダー分のオフセットを引いて移動。
	   ========================================================== */
	const SmoothScroll = {
		init() {
			const links = document.querySelectorAll('a[href^="#"]');
			if (!links.length) return;

			links.forEach(link => {
				link.addEventListener('click', e => {
					const href = link.getAttribute('href');
					if (href === '#' || href.length < 2) return;

					const target = document.querySelector(href);
					if (!target) return;

					e.preventDefault();

					const header = document.querySelector('.l-header');
					const headerH = header ? header.offsetHeight : 78;
					const top = target.getBoundingClientRect().top
					          + window.scrollY - headerH - 8;

					window.scrollTo({ top: top, behavior: 'smooth' });
				});
			});
		},
	};


	/* ==========================================================
	   5. ToTop — 「トップへ戻る」ボタン
	   ----------------------------------------------------------
	   600px スクロールで表示。クリックでトップへ。
	   ========================================================== */
	const ToTop = {
		el: null,
		threshold: 600,

		init() {
			this.el = document.getElementById('js-totop');
			if (!this.el) return;

			window.addEventListener('scroll', () => {
				this.el.classList.toggle('is-visible', window.scrollY > this.threshold);
			}, { passive: true });

			this.el.addEventListener('click', () => {
				window.scrollTo({ top: 0, behavior: 'smooth' });
			});
		},
	};


	/* ==========================================================
	   6. ReducedMotion — モーション控えめ設定への対応
	   ----------------------------------------------------------
	   OS で「視差効果を減らす」が ON のとき、reveal 要素を
	   即座に可視化してアニメーションをスキップする。
	   ========================================================== */
	const ReducedMotion = {
		init() {
			const mq = window.matchMedia('(prefers-reduced-motion: reduce)');
			if (mq.matches) {
				document.querySelectorAll('[data-reveal]').forEach(el => {
					el.classList.add('is-revealed');
				});
			}
		},
	};


	/* ==========================================================
	   7. Form — 予約フォームの簡易バリデーションと完了表示
	   ----------------------------------------------------------
	   ※ ポートフォリオのため、実際の送信は行わない。
	     送信ボタンが完全に無反応だと「未完成」に見えるため、
	     必須項目のチェックと、控えめな完了メッセージだけを実装。
	   【設計方針】
	     - HTML 標準の required を活かし、足りない実装だけ補う
	     - 完了表示は派手なモーダルではなく、フォームを
	       静かに置き換える "そっと完了する" 演出にする
	   ========================================================== */
	const Form = {
		init() {
			const form = document.getElementById('js-form');
			if (!form) return;

			form.addEventListener('submit', (e) => {
				e.preventDefault();   // 送信機能は持たない

				// 必須項目の簡易チェック (name / tel / email / 同意)
				const required = form.querySelectorAll('[required], [name="name"], [name="tel"], [name="email"]');
				let firstInvalid = null;
				required.forEach(field => {
					const empty = field.type === 'checkbox' ? !field.checked : !field.value.trim();
					if (empty && !firstInvalid) firstInvalid = field;
				});

				// 未入力があれば、その項目へ静かに誘導して中断
				if (firstInvalid) {
					firstInvalid.focus();
					firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
					return;
				}

				this.showComplete(form);
			});
		},

		// フォームを完了メッセージへ静かに置き換える
		showComplete(form) {
			const done = document.createElement('div');
			done.className = 'p-form__done';
			done.setAttribute('role', 'status');
			done.innerHTML =
				'<span class="p-form__done-mark" aria-hidden="true">' +
				'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">' +
				'<path d="M5 13l4 4L19 7"/></svg></span>' +
				'<p class="p-form__done-title">ご予約を受け付けました</p>' +
				'<p class="p-form__done-text">担当者より24時間以内にご連絡いたします。<br>' +
				'※ こちらはポートフォリオ作品のため、実際の送信は行われません。</p>';

			form.replaceWith(done);
			done.scrollIntoView({ behavior: 'smooth', block: 'center' });
		},
	};


	/* ==========================================================
	   Reservation — 予約セクションの空き状況カレンダー
	   ----------------------------------------------------------
	   表（○/△/×）は PHP 側で描画済み。JS はセルのクリックで
	   日時を選択し、結果を hidden input に格納するだけ。

	   【Contact Form 7 移行時】
	   CF7 に [hidden datetime] を置いた場合、生成される input の
	   id が 'r-datetime' でなくなることがある。その時は下の
	   DATETIME_INPUT_ID を CF7 側の id に合わせれば連携が保てる。
	   ========================================================== */
	const Reservation = {
		DATETIME_INPUT_ID: 'r-datetime',

		init() {
			const form = document.getElementById('js-reserve-form');
			const table = document.querySelector('.p-reserve .c-caltable');
			if (!form || !table) return;

			const picked = document.getElementById('js-reserve-picked');
			const pickedInline = document.getElementById('js-reserve-picked-inline');
			const datetimeInput = document.getElementById(this.DATETIME_INPUT_ID);
			let selectedCell = null;

			// ○/△ セルのクリックで日時を選択（× は disabled なので発火しない）
			table.querySelectorAll('.c-cell').forEach((cell) => {
				if (cell.disabled) return;
				cell.addEventListener('click', () => {
					if (selectedCell) selectedCell.classList.remove('is-selected');
					cell.classList.add('is-selected');
					selectedCell = cell;

					const label = cell.dataset.datetime || '';
					if (picked) {
						picked.classList.remove('is-empty');
						picked.innerHTML = 'ご希望の日時：<b>' + label + '</b>';
					}
					if (pickedInline) {
						pickedInline.innerHTML = '<b>' + label + '</b>';
					}
					if (datetimeInput) datetimeInput.value = label;
				});
			});

			// 送信前チェック（日時未選択を防ぐ）
			form.addEventListener('submit', (e) => {
				if (datetimeInput && !datetimeInput.value) {
					e.preventDefault();
					alert('空き状況表から、ご希望の日時を選択してください。');
					const wrap = document.querySelector('.p-reserve__cal-scroll');
					if (wrap) wrap.scrollIntoView({ behavior: 'smooth', block: 'center' });
				}
				// 日時が入っていれば、送信は action 先（admin-post.php / CF7）に委ねる
			});
		},
	};


	/* ==========================================================
	   App — 全モジュールの初期化
	   ========================================================== */
	const App = {
		init() {
			Header.init();
			Drawer.init();
			Reveal.init();
			SmoothScroll.init();
			ToTop.init();
			ReducedMotion.init();
			Form.init();
			Reservation.init();
		},
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', () => App.init());
	} else {
		App.init();
	}
})();
