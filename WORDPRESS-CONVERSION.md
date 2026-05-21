# NOIR Men's Clinic — WordPress テーマ化レポート

下層ページ5枚の静的 HTML を、WordPress テーマの作法に沿って
PHP テンプレートへ変換した記録です。
「何を・なぜ変えたか」を、保守する人が読める形でまとめています。

---

## 1. やったことの要約

| Before（静的HTML） | After（WordPressテーマ） |
|---|---|
| doctor.html | page-doctor.php |
| treatment-detail.html | page-treatment-detail.php |
| case-detail.html | page-case-detail.php |
| news.html | page-news.php |
| privacy.html | page-privacy.php |
| 各HTMLにヘッダー直書き | header.php に共通化 |
| 各HTMLにフッター直書き | footer.php に共通化 |
| 各HTMLにCTA直書き | template-parts/cta.php に共通化 |
| `<link>` でCSS直書き | functions.php の wp_enqueue で統一 |
| `../assets/...` の相対パス | get_template_directory_uri() |
| `../index.html#xxx` のリンク | home_url() |
| ページ間リンク（doctor.html等） | noir_get_page_url() |

---

## 2. なぜこう変えたか（設計判断）

### 2-1. ヘッダー・フッターの共通化

静的版では、5枚すべてに同じヘッダー（約60行）・ドロワー・
フッターがコピーされていた。**1か所直すと5か所直す**状態。

→ `header.php` / `footer.php` に集約。各テンプレートは
`get_header()` / `get_footer()` で呼ぶだけ。
これで重複が消え、修正は1か所で済む。

### 2-2. CTA バンドは「パーツ」にした（フッターには入れなかった）

CTA バンド（予約導線）も全ページ共通だが、**footer.php には
入れなかった**。理由は、見出し文言をページごとに変えたいから。

- ドクター紹介 → 「医師に、直接相談する。」
- 症例詳細 → 「あなたの場合を、相談してみる。」

→ `template-parts/cta.php` として切り出し、引数で文言を
受け取る形にした。各テンプレートが用途に応じて呼ぶ。

```php
get_template_part( 'template-parts/cta', null, array(
    'title' => '医師に、直接相談する。',
    'text'  => '...',
) );
```

同じ理由で、ページ見出し帯（pagehead）とパンくず（breadcrumb）も
パーツ化し、引数でタイトル・階層を渡せるようにした。

### 2-3. CSS / JS は wp_enqueue で読み込む

静的版は `<link>` / `<script>` の直書きだった。
WordPress では `wp_enqueue_style()` / `wp_enqueue_script()` を使う。

理由：重複読み込みの防止、依存関係の解決、子テーマからの
上書き、プラグインとの競合回避 — これらが正しく効くようになる。
CSS は指定どおり `assets/css/style.css` に統一した。

### 2-4. パスは関数化（移植性のため）

`../assets/...` のような相対パスは、WordPress では
インストール場所によって壊れる。

- 画像・CSS・JS → `get_template_directory_uri()`
- サイト内リンク → `home_url()`
- 固定ページへのリンク → `noir_get_page_url('slug')`

これでドメインやサブディレクトリが変わっても動く。

### 2-5. ナビは管理画面で編集可能にした

ヘッダー・フッターのナビは `wp_nav_menu()` で出力。
管理画面［外観 > メニュー］から編集できる。
未設定でも `noir_fallback_*()` が既定リンクを出すので、
テーマ有効化直後から破綻しない。

### 2-6. プライバシーポリシーは本文を管理画面編集に

`page-privacy.php` は規約文を `the_content()` で出力。
→ 管理画面の本文エディタで規約を編集できる。
本文が空のときは現行の規約文をフォールバック表示する保険つき。

`noindex` は静的版では `<meta>` 直書きだったが、
`functions.php` の `wp_head` フックで、このテンプレートの
ときだけ出力するようにした。

---

## 3. 各ファイルの役割

```
header.php          <head> 〜 ヘッダー・ドロワー（全ページ共通）
footer.php          フッター 〜 </html>（全ページ共通）
functions.php       テーマ設定・CSS/JS読込・メニュー登録・ヘルパー関数
page.php            汎用の固定ページ（専用テンプレ未指定のページ用）
page-doctor.php           ドクター紹介
page-treatment-detail.php 診療詳細（医療脱毛）
page-case-detail.php      症例詳細
page-news.php             お知らせ一覧
page-privacy.php          プライバシーポリシー
style.css           テーマ情報（Word�Press 必須。実スタイルは assets 側）

template-parts/
  pagehead.php      下層ページの見出し帯（引数：en/title/lead）
  breadcrumb.php    パンくず（引数：parent/current）
  cta.php           予約CTAバンド（引数：title/text）

assets/
  css/style.css     実際のスタイル（FLOCSS構成）
  js/main.js        Vanilla JS
  images/           画像
```

---

## 4. 各 page-*.php の使い方（管理画面での設定）

専用テンプレートは、固定ページに割り当てて使う。

1. 管理画面［固定ページ > 新規追加］
2. タイトルを入力（例：「ドクター紹介」）
3. **スラッグ**を設定（重要）：
   - ドクター紹介 → `doctor`
   - 診療詳細 → `treatment-detail`
   - 症例詳細 → `case-detail`
   - お知らせ → `news`
   - プライバシー → `privacy`
4. ［ページ属性 > テンプレート］で対応するテンプレートを選択
5. 公開

スラッグを上記に合わせる理由：回遊導線やフッターのリンクが
`noir_get_page_url('doctor')` のようにスラッグでページを
探すため。スラッグが違うとリンクがトップに落ちる。

---

## 5. おすすめフォルダ構成（最終形）

現状の構成を、実務的に整理した推奨形です。

```
noir-mens-clinic/
├── style.css                  テーマ情報（必須）
├── functions.php              テーマ設定・enqueue・ヘルパー
├── index.php                  最終フォールバック（必須）
├── front-page.php             トップページ
├── page.php                   汎用固定ページ
├── single.php                 投稿詳細
├── archive.php                投稿アーカイブ
├── 404.php                    404ページ
│
├── page-doctor.php            ┐
├── page-treatment-detail.php  │ 固定ページ専用テンプレート
├── page-case-detail.php       │
├── page-news.php              │
├── page-privacy.php           │
├── page-about.php             │ ← 既存
├── page-access.php            │ ← 既存
├── page-contact.php           │ ← 既存
├── page-faq.php               │ ← 既存
├── page-menu.php              │ ← 既存
├── page-price.php             ┘ ← 既存
│
├── header.php                 共通ヘッダー
├── footer.php                 共通フッター
│
├── template-parts/            再利用パーツ
│   ├── pagehead.php
│   ├── breadcrumb.php
│   └── cta.php
│
├── assets/
│   ├── css/
│   │   └── style.css          実スタイル（FLOCSS）
│   ├── js/
│   │   └── main.js            Vanilla JS
│   └── images/
│       ├── hero-noir.*
│       └── cases/
│
├── README.md
└── DESIGN-NOTES.md
```

### 既存構成からの変更点

- ルート直下に散らばっていた下層ページHTML5枚 → `page-*.php` に変換
- `template-parts/` ディレクトリを新設 → 再利用パーツを集約
- 画像は `assets/images/` に集約（既存の `assets/` 構成を踏襲）

---

## 6. 将来の発展（このテーマの伸びしろ）

現状は「固定ページ」での実装だが、コンテンツが増えたら
カスタム投稿タイプ（CPT）へ移行するのが自然。

| ページ | 現状 | 将来の理想形 |
|--------|------|-------------|
| お知らせ | page-news.php（固定） | 投稿 + archive.php / single.php |
| 症例詳細 | page-case-detail.php（固定） | CPT「case」+ single-case.php |
| 診療詳細 | page-treatment-detail.php（固定） | CPT「treatment」+ single-treatment.php |
| ドクター | page-doctor.php（固定） | CPT「doctor」+ ACF |

各 page-*.php のコメントに、その移行イメージを記載済み。
HTML構造（FLOCSS のクラス名）は移行後もそのまま使えるよう
設計してあるため、移行コストは小さい。

---

## 7. 動作確認の手順（WordPress 環境）

1. `noir-mens-clinic/` を `wp-content/themes/` に置く
2. 管理画面［外観 > テーマ］で有効化
3. 上記「4. 使い方」に従い、固定ページ5枚を作成・スラッグ設定
4. ［外観 > メニュー］でグローバル / ドロワー / フッター×2 を設定
   （未設定でも fallback で表示される）
5. 各ページを表示して、ヘッダー・フッター・CTA・回遊導線を確認

> 本テーマは PHP 7.4 以上・WordPress 6.0 以上を想定。
> `get_template_part()` の第3引数（$args）を使うため、
> WordPress 5.5 未満では動作しない。


---

## 8. 予約セクション（空き状況カレンダー＋フォーム）

front-page.php の末尾（Access の後）に、予約セクションを追加した。

### ファイル構成
- `template-parts/reservation.php` … 空き状況カレンダー＋予約フォーム
- `assets/css/style.css` … `.p-reserve` `.c-caltable` `.c-cell` `.c-form` 系
- `assets/js/main.js` … `Reservation` モジュール（セル選択・日時格納）

### 空き状況カレンダー
- 横軸=日付、縦軸=時間帯、セル=○（空き）/△（残わずか）/×（不可）
- 表は PHP（reservation.php）が描画。JS はセルのクリック処理のみ担当
- ○/△ をクリックで日時を選択 → ゴールドで強調 → hidden input に格納
- × は disabled でクリック不可
- モバイルは横スクロール対応（`min-width:680px` + `overflow-x:auto`）

### 空き状況データの差し替え
`reservation.php` の `noir_reservation_availability()` がダミーデータを返す。
実運用ではこの関数を、予約システム連携・管理画面設定などに差し替える。
HTML/JS 側はデータ構造を保てば変更不要。

### Contact Form 7 への移行
現状の `<form>` はプロトタイプ。CF7 へ移行する場合：
1. 管理画面で CF7 フォームを同じ項目で作成
2. `reservation.php` の `<form>`〜`</form>` を
   `do_shortcode('[contact-form-7 id="..."]')` に差し替え
3. CF7 に `[hidden datetime]` を置き、生成される input の id を
   `main.js` の `Reservation.DATETIME_INPUT_ID` に合わせる
   → カレンダーで選んだ日時が CF7 の送信データに乗る

カレンダー（表示・選択UI）とフォーム（送信）を分離しているため、
フォーム本体だけ CF7 に載せ替えても日時連携は保たれる。


---

## 9. 施術メニューページ（page-menu.php）

医療脱毛 / 肌治療 / AGA治療 の3メニューを、詳細情報つき
カード型レイアウトで掲載する下層ページ。

### 使い方
管理画面で固定ページを作成 → スラッグを「menu」に →
ページ属性のテンプレートで「施術メニュー」を選択。
トップの「施術メニュー」リンク（home_url('/menu/')）と整合する。

### 各カードの内容
施術名 / 英字ラベル / No. / 写真 / 説明 /
スペック表（対応部位・悩み / 料金目安 / 施術時間 / ダウンタイム）/
「詳細を見る」ボタン / 「このメニューを予約する」ボタン。

### レイアウト・命名
- PC 3カラム / タブレット 2カラム / スマホ 1カラム
- クラスは .p-menulist 系。トップの簡易メニュー（.p-menu）とは
  別命名にして競合を回避
- 画像は assets/images/menu/ の既存3点を流用

### 予約導線
- 各カードの「このメニューを予約する」→ トップの #reservation
- ページ下部のノート「空き状況を見て予約する」→ #reservation
- ページ末尾の CTA バンド → 予約フォームへ
  → 空き状況カレンダー（template-parts/reservation.php）に着地する

### 将来の発展（CPT 化）
メニューデータは page-menu.php 内の noir_menu_items() が
配列で返している。施術が増減する運用になったら、カスタム投稿
タイプ「menu」＋ ACF（料金・時間・ダウンタイム等）に移行し、
この関数を WP_Query に置き換える。.p-menulist のカード構造は
そのまま流用できる。
