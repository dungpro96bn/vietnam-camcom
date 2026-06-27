# CLAUDE.md — VIETNAM CAMCOM (theme `scv`)

WordPress site đa ngôn ngữ (WPML) đang được **redesign "VCC"**. Tài liệu này mô tả
**cách dịch/cập nhật nội dung 3 ngôn ngữ** cho các trang VCC. Đọc kỹ trước khi làm.

## 1. Stack & môi trường

- WordPress, theme active: `wp-content/themes/scv`.
- **WPML** (`sitepress-multilingual-cms`) — 3 ngôn ngữ: **JA = mặc định/gốc**, VI, EN.
  Mỗi trang có 1 "translation group" (trid) gồm 3 post riêng (ja gốc → vi/en).
- **ACF Pro** (`advanced-custom-fields-pro`). **KHÔNG có ACFML**, KHÔNG có WPML String Translation.
- Local XAMPP. DB: `scv`, user `root`, **không mật khẩu**, prefix `wp_`.
- **Không có WP-CLI.** Dùng:
  - PHP CLI: `C:\xampp8.1.dev\php\php.exe` (có vài warning extension vô hại, bỏ qua).
  - MySQL: `C:\xampp8.1.dev\mysql\bin\mysql -uroot scv -N -e "..."`
- **Squid proxy** chặn localhost → khi `curl` phải thêm `--noproxy '*'`.
- **LiteSpeed Cache** combine/minify CSS+JS → trên front-end không thấy tên file gốc (file gộp hash). Đây là bình thường.

Helper bootstrap WordPress trong script PHP:
```php
define('WP_USE_THEMES', false);
require __DIR__ . '/wp-load.php';   // đặt script ở root project
```

## 2. Kiến trúc nội dung VCC (QUAN TRỌNG)

- Mỗi trang VCC = 1 **page template** (`tpl-{slug}.php`, hoặc `front-page.php` cho homepage)
  + 1 **ACF local field group** (`group_vcc_{slug}`, khai báo trong
  `wp-content/themes/scv/inc/acf-vcc-fields.php`).
- **Cấu trúc HTML nằm trong template**; **chữ nằm trong field ACF**, đọc qua helper:
  - `vcc_field('name', 'fallback VI', $post_id=false)` — 1 field text.
  - `vcc_list('name', ['sub1','sub2'], $default_rows, $post_id=false)` — repeater.
  - Field rỗng → trả về **fallback tiếng Việt hardcoded** trong template.
- Field group gắn theo `page_template == tpl-{slug}.php` (homepage gắn `page_type == front_page`).
  ⇒ Page phải được **gán template** (`_wp_page_template`) thì group mới áp dụng.

### Cơ chế dịch (vì sao KHÔNG cần ACFML)
`vcc_field` gọi `get_field($name, $post_id)` theo **từng post**. WPML coi mỗi ngôn ngữ là
1 post riêng. ⇒ **Dịch = điền chính các field ACF đó vào post của ngôn ngữ tương ứng.**
- Bản **VI** thường để **trống** → tự dùng fallback VI trong template.
- Bản **EN / JA** → điền field → hiển thị đúng ngôn ngữ đó.
Không cần Translation Editor, không cần ACFML.

### Chuỗi "chrome" (không nằm trong ACF)
Vài chuỗi cố định (nav, footer, nhãn UI, vài label trên homepage) nằm trong hàm
`languageString()` ở `functions.php` (3 nhánh `vi` / `en` / `else`=ja). Template lấy qua
`$var['key']`. Dịch loại này = thêm key vào cả 3 nhánh (KHÔNG nhập per-post).

## 3. CÔNG THỨC dịch / convert 1 trang

### A. Trang ĐÃ convert (chỉ cần dịch EN/JA)
1. Mở `tpl-{slug}.php`, đọc toàn bộ chuỗi fallback VI (đối số thứ 2 của `vcc_field`/`vcc_list`).
2. Lấy field **key** từ `inc/acf-vcc-fields.php` (mỗi field có `'key'`, vd `f_bpo_ph_title`;
   repeater sub-field cũng có key riêng).
3. Viết script PHP 1 lần dùng **`update_field($field_key, $value, $post_id)`** (dùng KEY, không dùng name).
   - Repeater: truyền mảng rows, **key của row = sub-field KEY**:
     ```php
     update_field('f_bpo_de_cards', [
        ['f_bpo_de_ct' => 'Title EN', 'f_bpo_de_cx' => 'Text EN'],
        ...
     ], $post_id);
     ```
   - `true_false` → 1/0.
4. Chạy script với `php.exe`, rồi **xoá file script tạm**.
5. **Verify** render (xem mục 5).

### B. Trang CHƯA convert (convert + dịch)
1. Đọc HTML nguồn `wp-content/themes/scv/vcc/page/{slug}.html` (chỉ phần body giữa
   `<section class="page-head">` … hết CTA; bỏ nav/footer — đã có `get_header/get_footer`).
2. Thêm field group `group_vcc_{slug}` vào `inc/acf-vcc-fields.php` (dùng helper `$t`/`$ta`/`$rep`
   có sẵn trong file). Location: `page_template == tpl-{slug}.php`.
3. Tạo `tpl-{slug}.php`: `get_header()` → port HTML, mọi chữ qua `vcc_field`/`vcc_list` với
   fallback VI lấy đúng từ HTML nguồn → `get_footer()`. Header `Template Name: VCC — ...`.
4. Trong cùng script: **gán template** cho cả 3 post
   `update_post_meta($id, '_wp_page_template', 'tpl-{slug}.php')` (vi, en, ja) — rồi dịch EN/JA như mục A.
5. Lint, verify, xoá script tạm.

### Quy ước & cạm bẫy
- **Field text xuống dòng**: dùng textarea `new_lines => ''` + template `nl2br(esc_html(...))`,
  lưu giá trị có `\n`. (vd `ph_title`).
- **Field list (mỗi dòng = 1 `<li>`)**: template tự `preg_split('/\r\n|\r|\n/', ...)`. Field đó
  **PHẢI** đặt `new_lines => ''` trong định nghĩa ACF, nếu không ACF chèn `<br/>` rồi bị
  `esc_html` thành `&lt;br/&gt;` (bug đã gặp ở `os_features`/`wp_list`/`feat_list`). Lưu các dòng nối bằng `\n`.
- **Field cho phép HTML** (`<strong>`, `<span class="accent">`): template echo **raw** (không `esc_html`).
- **Slug KHÔNG dịch** (dùng chung cho 3 ngôn ngữ). `home_url('/contact/')` tự thêm prefix `/en` `/vi`
  (JA mặc định không prefix). URL: VI=`/vi/{slug}/`, EN=`/en/{slug}/`, JA=`/{slug}/`.
- **CSS = 1 nguồn**: nạp qua `<link>` trong `header.php` từ `assets/css/camcom-light.css` +
  `assets/css/camcom-hr.css`. KHÔNG enqueue lại trong `functions.php` (đã gỡ). Class `.hr-*`,
  `.fair`, `.feat-brand`… nằm trong `camcom-hr.css`. Style riêng 1 trang → inline `<style>` đầu template.

## 4. Bảng trạng thái các trang VCC

| trid | Trang | slug | vi / en / ja (post ID) | template + field group | Trạng thái |
|---|---|---|---|---|---|
| 35   | Homepage | (front) | 47 / 59 / 44   | `front-page.php` · `group_vcc_home`  | ✅ EN+JA |
| 90   | BPO | `/bpo/` | 235 / 237 / 233 | `tpl-bpo.php` · `group_vcc_bpo`     | ✅ EN+JA |
| 112  | WEB | `/web/` | 326 / 328 / 324 | `tpl-web.php` · `group_vcc_web`     | ✅ EN+JA |
| 1260 | Về chúng tôi | `/about/` | 493 / 498 / 480 | `tpl-about.php` · `group_vcc_about` | ✅ EN+JA |
| 80   | Giới thiệu nhân lực | `/hr/` | 228 / 231 / 187 | `tpl-hr.php` · `group_vcc_hr`       | ✅ EN+JA |
| 108  | Hỗ trợ mở rộng TT VN | `/fdi-support/` | 300 / 302 / 298 | `tpl-fdi-support.php` · `group_vcc_fdi` | ✅ EN+JA |
| 121  | Tổng quan công ty | `/company/` | 396 / 401 / 392 | `tpl-company.php` · `group_vcc_company` | ✅ EN+JA |
| 4081 | Hỗ trợ quản lý lao động | `/labor-management/` | 1881 / 1873 / 1848 | `tpl-labor-management.php` · `group_vcc_labor` | ✅ EN+JA |
| 1264 | Tuyển dụng | `/recruit/` | 635 / 637 / 506 | `tpl-recruit.php` · `group_vcc_recruit` | ✅ EN+JA |
| 122  | Chính sách bảo mật | `/privacy/` | 408 / 410 / 404 | `tpl-privacy.php` · `group_vcc_privacy` | ✅ EN+JA |
| 4093 | Chính sách bảo mật thông tin | `/security/` | 2025 / 2022 / 2010 | `tpl-security.php` · `group_vcc_security` | ✅ EN+JA |
| 825  | Liên hệ | `/contact/` | 435 / 437 / 433 | `tpl-contact.php` · `group_vcc_contact` | ✅ EN+JA (form CF7) |
| 825c | Liên hệ — Xác nhận | `/contact/confirm/` | 459 / 471 / 443 | `tpl-contact-confirm.php` · `group_vcc_contact` | ✅ EN+JA (form CF7) |

HTML nguồn tương ứng: `wp-content/themes/scv/vcc/page/{slug}.html`.
Footer/header đã cutover toàn cục (`footer.php` mới: logo + tagline + address + 4 cột;
label trong `languageString()`).

**News (CPT, KHÔNG ACF/trid):** `archive-news.php` (trang `/news/`) + `single-news.php` (bài chi tiết)
đã redesign theo VCC (page-head + `.news-list`/`.news-item` + prose). Chữ "chrome" lấy từ
`languageString()` (keys `news_*`, đã có vi/en/ja); bài viết tự dịch theo WPML (mỗi ngôn ngữ = 1 post).
Style riêng đặt inline `<style>` đầu mỗi template.

## 5. Verify (sau mỗi lần dịch)

```bash
MYSQL="/c/xampp8.1.dev/mysql/bin/mysql -uroot scv -N -e"
PHP=/c/xampp8.1.dev/php/php.exe
# lint
$PHP -l wp-content/themes/scv/tpl-{slug}.php
$PHP -l wp-content/themes/scv/inc/acf-vcc-fields.php
# render từng ngôn ngữ (NHỚ --noproxy)
curl -s -L --noproxy '*' -A "Mozilla/5.0" "http://127.0.0.1/en/{slug}/" -o /tmp/x.html -w "%{http_code}\n"
# kiểm: chữ đúng ngôn ngữ; list KHÔNG chứa "&lt;br"; h1 nl2br đúng; VI vẫn fallback VI
```

## 6. Bộ nhớ / lịch sử

Chi tiết hơn (đã verify) nằm ở memory của Claude: `vcc-acf-wpml-translate-workflow`
và `vcc-redesign-migration`. Khi hoàn tất 1 trang, cập nhật bảng mục 4 + memory.
