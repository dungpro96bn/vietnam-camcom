<?php
/**
 * VCC redesign — ACF fields + helpers for template-based pages.
 *
 * Pattern: HTML structure lives in the page templates (page-*.php / front-page.php).
 * Editable TEXT lives in ACF fields so WPML can translate it independently
 * (WPML → Settings → Custom Fields Translation: set each field to "Translate",
 *  or set the field group's WPML option to "Translate"). Structure is never
 *  duplicated per language.
 *
 * Every template reads text through vcc_field() / vcc_list() which fall back to
 * the Vietnamese source text, so a page renders correctly even before any field
 * is filled in. Once a field is filled and WPML-translated, that value wins.
 */

if (!defined('ABSPATH')) exit;

/**
 * Return an ACF field value, or a default when ACF is missing / the field is empty.
 */
function vcc_field($name, $default = '', $post_id = false) {
    if (function_exists('get_field')) {
        $v = get_field($name, $post_id);
        if ($v !== null && $v !== '' && $v !== false && $v !== array()) {
            return $v;
        }
    }
    return $default;
}

/**
 * Collect a repeater's rows into a plain array. Falls back to $default when the
 * repeater is empty or ACF is unavailable.
 *
 * @param string $name    repeater field name
 * @param array  $subs    sub-field names to pull
 * @param array  $default array of associative-arrays used when the repeater is empty
 */
function vcc_list($name, $subs, $default = array(), $post_id = false) {
    $rows = array();
    if (function_exists('have_rows') && have_rows($name, $post_id)) {
        while (have_rows($name, $post_id)) {
            the_row();
            $row = array();
            foreach ($subs as $s) {
                $row[$s] = get_sub_field($s);
            }
            $rows[] = $row;
        }
    }
    return $rows ? $rows : $default;
}

/* ============================================================
   Register field groups (only when ACF is active)
   ============================================================ */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    // helpers to keep the definition compact
    $t  = function ($key, $name, $label, $extra = array()) {
        return array_merge(array('key' => $key, 'name' => $name, 'label' => $label, 'type' => 'text'), $extra);
    };
    $ta = function ($key, $name, $label, $extra = array()) {
        return array_merge(array('key' => $key, 'name' => $name, 'label' => $label, 'type' => 'textarea', 'new_lines' => 'br', 'rows' => 3), $extra);
    };
    $rep = function ($key, $name, $label, $subs) {
        return array('key' => $key, 'name' => $name, 'label' => $label, 'type' => 'repeater', 'layout' => 'block', 'sub_fields' => $subs);
    };

    /* ---------- HOMEPAGE (front-page.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_home',
        'title' => 'VCC — Trang chủ',
        'fields' => array(

            // Hero
            $t('f_home_hero_tag',   'hero_tag',   'Hero · tag'),
            $t('f_home_hero_pill',  'hero_pill',  'Hero · pill text'),
            $ta('f_home_hero_title','hero_title', 'Hero · tiêu đề (cho phép xuống dòng)'),
            $ta('f_home_hero_lead', 'hero_lead',  'Hero · mô tả'),
            $t('f_home_hero_cta1',  'hero_cta1',  'Hero · nút 1'),
            $t('f_home_hero_cta2',  'hero_cta2',  'Hero · nút 2'),

            // Strengths
            $t('f_home_str_eyebrow','str_eyebrow','Thế mạnh · eyebrow'),
            $t('f_home_str_title',  'str_title',  'Thế mạnh · tiêu đề'),
            $ta('f_home_str_lead',  'str_lead',   'Thế mạnh · mô tả'),
            $rep('f_home_strengths','strengths',  'Thế mạnh · danh sách', array(
                $t('f_home_str_i_title', 'title', 'Tiêu đề'),
                $ta('f_home_str_i_text', 'text',  'Nội dung'),
            )),

            // About
            $t('f_home_ab_eyebrow', 'about_eyebrow', 'Về chúng tôi · eyebrow'),
            $ta('f_home_ab_title',  'about_title',   'Về chúng tôi · tiêu đề'),
            $ta('f_home_ab_text',   'about_text',    'Về chúng tôi · đoạn văn'),
            $rep('f_home_ab_list',  'about_list',    'Về chúng tôi · gạch đầu dòng', array(
                $t('f_home_ab_i', 'item', 'Dòng'),
            )),
            $t('f_home_ab_btn',     'about_btn',     'Về chúng tôi · nút'),

            // Services
            $t('f_home_sv_eyebrow', 'svc_eyebrow', 'Dịch vụ · eyebrow'),
            $ta('f_home_sv_title',  'svc_title',   'Dịch vụ · tiêu đề'),
            $ta('f_home_sv_lead',   'svc_lead',    'Dịch vụ · mô tả'),
            $rep('f_home_services', 'services',    'Dịch vụ · danh sách (theo thứ tự icon)', array(
                $t('f_home_sv_i_title', 'title', 'Tiêu đề'),
                $ta('f_home_sv_i_text', 'text',  'Nội dung'),
                $t('f_home_sv_i_url',   'url',   'Đường dẫn (để trống = mặc định)'),
            )),

            // Philosophy
            $t('f_home_ph_eyebrow', 'philo_eyebrow', 'Triết lý · eyebrow'),
            $ta('f_home_ph_big',    'philo_big',     'Triết lý · câu lớn'),
            $rep('f_home_values',   'values',        'Triết lý · 3 giá trị', array(
                $t('f_home_va_i_title', 'title', 'Tiêu đề'),
                $ta('f_home_va_i_text', 'text',  'Nội dung'),
            )),
            $rep('f_home_vmvp',     'vmvp',          'Triết lý · Value/Mission/Vision/Purpose', array(
                $t('f_home_vm_i_key',   'key',   'Nhãn (Value/Mission…)'),
                $t('f_home_vm_i_title', 'title', 'Tiêu đề'),
                $ta('f_home_vm_i_text', 'text',  'Nội dung'),
            )),

            // Stats
            $rep('f_home_stats',    'stats',         'Số liệu', array(
                $t('f_home_st_i_value',  'value',  'Giá trị (số)'),
                $t('f_home_st_i_suffix', 'suffix', 'Hậu tố (vd +)'),
                $ta('f_home_st_i_label', 'label',  'Nhãn'),
            )),

            // News
            $t('f_home_nw_eyebrow', 'news_eyebrow', 'Tin tức · eyebrow'),
            $t('f_home_nw_title',   'news_title',   'Tin tức · tiêu đề'),
            $t('f_home_nw_viewall', 'news_viewall', 'Tin tức · nút xem tất cả'),

            // Group / ISO
            $t('f_home_gr_eyebrow', 'group_eyebrow', 'Group · eyebrow'),
            $ta('f_home_gr_title',  'group_title',   'Group · tiêu đề'),
            $t('f_home_gr_tag',     'group_tag',     'Group · card tag'),
            $ta('f_home_gr_ctitle', 'group_ctitle',  'Group · card tiêu đề'),
            $ta('f_home_gr_ctext',  'group_ctext',   'Group · card nội dung'),
            $t('f_home_gr_btn',     'group_btn',     'Group · nút'),

            // CTA
            $ta('f_home_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_home_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_home_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_home_cta_btn2',   'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_type', 'operator' => '==', 'value' => 'front_page'),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'active' => true,
        'description' => 'Văn bản trang chủ — WPML dịch riêng từng field.',
    ));

    /* ---------- DỊCH VỤ BPO (tpl-bpo.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_bpo',
        'title' => 'VCC — Dịch vụ BPO',
        'fields' => array(
            // Page head
            $t('f_bpo_crumb_home',  'crumb_home',   'Breadcrumb · trang chủ'),
            $t('f_bpo_crumb_parent','crumb_parent', 'Breadcrumb · nhóm'),
            $t('f_bpo_ph_eye',      'ph_eye',       'Page head · eyebrow'),
            $t('f_bpo_ph_title',    'ph_title',     'Page head · tiêu đề'),
            $ta('f_bpo_ph_lead',    'ph_lead',      'Page head · mô tả'),
            $t('f_bpo_ph_cta1',     'ph_cta1',      'Page head · nút 1'),
            $t('f_bpo_ph_cta2',     'ph_cta2',      'Page head · nút 2'),
            $t('f_bpo_fb_value',    'fb_value',     'Badge · giá trị'),
            $t('f_bpo_fb_label',    'fb_label',     'Badge · nhãn'),
            // Tabs
            $t('f_bpo_tab1',        'tab1',         'Tab 1'),
            $t('f_bpo_tab2',        'tab2',         'Tab 2'),
            // Data entry
            $t('f_bpo_de_eyebrow',  'de_eyebrow',   'Data Entry · eyebrow'),
            $t('f_bpo_de_title',    'de_title',     'Data Entry · tiêu đề'),
            $ta('f_bpo_de_text',    'de_text',      'Data Entry · đoạn (cho phép <strong>)'),
            $rep('f_bpo_de_figures','de_figures',   'Data Entry · số liệu', array(
                $t('f_bpo_de_fv', 'value', 'Giá trị (số hoặc ký hiệu)'),
                $ta('f_bpo_de_fl', 'label', 'Nhãn'),
                array('key' => 'f_bpo_de_fc', 'name' => 'coral', 'label' => 'Tô màu coral', 'type' => 'true_false', 'ui' => 1),
            )),
            $rep('f_bpo_de_cards',  'de_cards',     'Data Entry · 6 thẻ', array(
                $t('f_bpo_de_ct', 'title', 'Tiêu đề'),
                $ta('f_bpo_de_cx', 'text', 'Nội dung'),
            )),
            // Office support
            $t('f_bpo_os_eyebrow',  'os_eyebrow',   'Office Support · eyebrow'),
            $t('f_bpo_os_title',    'os_title',     'Office Support · tiêu đề'),
            $ta('f_bpo_os_lead',    'os_lead',      'Office Support · mô tả'),
            $rep('f_bpo_os_feat',   'os_features',  'Office Support · khối feature', array(
                $t('f_bpo_ft_tag',  'tag',   'Nhãn (Payroll…)'),
                $t('f_bpo_ft_title','title', 'Tiêu đề'),
                $ta('f_bpo_ft_text','text',  'Đoạn mô tả'),
                $ta('f_bpo_ft_list','list',  'Gạch đầu dòng (mỗi dòng 1 ý)', array('rows' => 4, 'new_lines' => '')),
            )),
            // CTA
            $ta('f_bpo_cta_title',  'cta_title', 'CTA · tiêu đề'),
            $ta('f_bpo_cta_text',   'cta_text',  'CTA · nội dung'),
            $t('f_bpo_cta_btn1',    'cta_btn1',  'CTA · nút 1'),
            $t('f_bpo_cta_btn2',    'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-bpo.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Dịch vụ BPO.',
    ));

    /* ---------- PHÁT TRIỂN WEB & NỘI DUNG (tpl-web.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_web',
        'title' => 'VCC — Phát triển WEB & nội dung',
        'fields' => array(
            // Page head
            $t('f_web_crumb_home',  'crumb_home',   'Breadcrumb · trang chủ'),
            $t('f_web_crumb_parent','crumb_parent', 'Breadcrumb · nhóm'),
            $t('f_web_crumb_here',  'crumb_here',    'Breadcrumb · trang hiện tại'),
            $t('f_web_ph_eye',      'ph_eye',       'Page head · eyebrow'),
            $ta('f_web_ph_title',   'ph_title',     'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_web_ph_lead',    'ph_lead',      'Page head · mô tả'),
            $t('f_web_ph_cta1',     'ph_cta1',      'Page head · nút 1'),
            $t('f_web_ph_cta2',     'ph_cta2',      'Page head · nút 2'),
            $t('f_web_fb_value',    'fb_value',     'Badge · giá trị'),
            $t('f_web_fb_label',    'fb_label',     'Badge · nhãn'),
            // Points
            $rep('f_web_points',    'points',       'Điểm nổi bật (2 thẻ)', array(
                $t('f_web_pt_title', 'title', 'Tiêu đề'),
                $ta('f_web_pt_text', 'text',  'Nội dung'),
            )),
            // Tabs
            $t('f_web_tab1',        'tab1',         'Tab 1'),
            $t('f_web_tab2',        'tab2',         'Tab 2'),
            $t('f_web_tab3',        'tab3',         'Tab 3'),
            // Website production
            $t('f_web_wp_tag',      'wp_tag',       'Sản xuất website · nhãn'),
            $t('f_web_wp_title',    'wp_title',     'Sản xuất website · tiêu đề'),
            $ta('f_web_wp_text',    'wp_text',      'Sản xuất website · mô tả'),
            $ta('f_web_wp_list',    'wp_list',      'Sản xuất website · gạch đầu dòng (mỗi dòng 1 ý)', array('rows' => 4, 'new_lines' => '')),
            $t('f_web_pf_eyebrow',  'portfolio_eyebrow', 'Portfolio · eyebrow'),
            $t('f_web_pf_title',    'portfolio_title',   'Portfolio · tiêu đề'),
            // Lab development
            $t('f_web_lab_tag',     'lab_tag',      'Offshore Lab · nhãn'),
            $t('f_web_lab_title',   'lab_title',    'Offshore Lab · tiêu đề'),
            $ta('f_web_lab_text',   'lab_text',     'Offshore Lab · mô tả'),
            $rep('f_web_lab_cards', 'lab_cards',    'Offshore Lab · 2 thẻ', array(
                $t('f_web_lab_ct', 'title', 'Tiêu đề'),
                $ta('f_web_lab_cx', 'text', 'Nội dung'),
            )),
            // Video
            $t('f_web_vid_eyebrow', 'video_eyebrow', 'Video · eyebrow'),
            $t('f_web_vid_title',   'video_title',   'Video · tiêu đề'),
            $ta('f_web_vid_lead',   'video_lead',    'Video · mô tả'),
            $rep('f_web_vid_cards', 'video_cards',   'Video · 3 thẻ', array(
                $t('f_web_vid_ct', 'title', 'Tiêu đề'),
                $ta('f_web_vid_cx', 'text', 'Nội dung'),
            )),
            // CTA
            $ta('f_web_cta_title',  'cta_title', 'CTA · tiêu đề'),
            $ta('f_web_cta_text',   'cta_text',  'CTA · nội dung'),
            $t('f_web_cta_btn1',    'cta_btn1',  'CTA · nút 1'),
            $t('f_web_cta_btn2',    'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-web.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Phát triển WEB & nội dung.',
    ));

    /* ---------- VỀ CHÚNG TÔI (tpl-about.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_about',
        'title' => 'VCC — Về chúng tôi',
        'fields' => array(
            // Page head
            $t('f_abt_crumb_home', 'crumb_home', 'Breadcrumb · trang chủ'),
            $t('f_abt_crumb_here', 'crumb_here', 'Breadcrumb · trang hiện tại'),
            $t('f_abt_ph_eye',     'ph_eye',     'Page head · eyebrow'),
            $ta('f_abt_ph_title',  'ph_title',   'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_abt_ph_lead',   'ph_lead',    'Page head · mô tả'),
            $t('f_abt_ph_cta1',    'ph_cta1',    'Page head · nút 1'),
            $t('f_abt_ph_cta2',    'ph_cta2',    'Page head · nút 2'),
            $t('f_abt_fb_value',   'fb_value',   'Badge · giá trị'),
            $t('f_abt_fb_label',   'fb_label',   'Badge · nhãn'),
            // Tabs
            $t('f_abt_tab1', 'tab1', 'Tab 1'),
            $t('f_abt_tab2', 'tab2', 'Tab 2'),
            // Mission intro
            $t('f_abt_mi_eyebrow', 'mi_eyebrow', 'Giới thiệu · eyebrow'),
            $ta('f_abt_mi_title',  'mi_title',   'Giới thiệu · tiêu đề'),
            $ta('f_abt_mi_text1',  'mi_text1',   'Giới thiệu · đoạn 1 (cho phép <strong>)'),
            $ta('f_abt_mi_text2',  'mi_text2',   'Giới thiệu · đoạn 2'),
            $rep('f_abt_figures', 'figures', 'Giới thiệu · số liệu', array(
                $t('f_abt_fig_v', 'value',  'Giá trị (số hoặc ký hiệu)'),
                $t('f_abt_fig_s', 'suffix', 'Hậu tố (vd +)'),
                $ta('f_abt_fig_l', 'label', 'Nhãn'),
                array('key' => 'f_abt_fig_c', 'name' => 'coral', 'label' => 'Tô màu coral', 'type' => 'true_false', 'ui' => 1),
            )),
            // Strengths
            $t('f_abt_str_eyebrow', 'str_eyebrow', 'Thế mạnh · eyebrow'),
            $t('f_abt_str_title',   'str_title',   'Thế mạnh · tiêu đề'),
            $ta('f_abt_str_lead',   'str_lead',    'Thế mạnh · mô tả'),
            $rep('f_abt_strengths', 'strengths', 'Thế mạnh · 3 thẻ (theo thứ tự icon)', array(
                $t('f_abt_str_it', 'title', 'Tiêu đề'),
                $ta('f_abt_str_ix', 'text', 'Nội dung'),
            )),
            // Direction (Value/Mission/Vision/Purpose)
            $t('f_abt_ph2_eyebrow', 'philo_eyebrow', 'Triết lý · eyebrow'),
            $ta('f_abt_philo_big',  'philo_big',     'Triết lý · câu lớn (cho phép <span class="accent">)'),
            $rep('f_abt_values', 'values', 'Triết lý · 3 giá trị', array(
                $t('f_abt_va_t', 'title', 'Tiêu đề'),
                $ta('f_abt_va_x', 'text', 'Nội dung'),
            )),
            $rep('f_abt_vmvp', 'vmvp', 'Value/Mission/Vision/Purpose', array(
                $t('f_abt_vm_k', 'key',   'Nhãn (Value/Mission…)'),
                $t('f_abt_vm_t', 'title', 'Tiêu đề'),
                $ta('f_abt_vm_x', 'text', 'Nội dung'),
            )),
            $t('f_abt_dp_kicker', 'dir_purpose_kicker', 'Purpose chi tiết · nhãn'),
            $t('f_abt_dp_title',  'dir_purpose_title',  'Purpose chi tiết · tiêu đề'),
            $ta('f_abt_dp_text',  'dir_purpose_text',   'Purpose chi tiết · đoạn'),
            // CTA
            $ta('f_abt_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_abt_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_abt_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_abt_cta_btn2',   'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-about.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Về chúng tôi.',
    ));

    /* ---------- GIỚI THIỆU NGUỒN NHÂN LỰC (tpl-hr.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_hr',
        'title' => 'VCC — Giới thiệu nguồn nhân lực',
        'fields' => array(
            // Page head
            $t('f_hr_crumb_home',   'crumb_home',   'Breadcrumb · trang chủ'),
            $t('f_hr_crumb_parent', 'crumb_parent', 'Breadcrumb · nhóm'),
            $t('f_hr_crumb_here',   'crumb_here',   'Breadcrumb · trang hiện tại'),
            $t('f_hr_ph_eye',       'ph_eye',       'Page head · eyebrow'),
            $ta('f_hr_ph_title',    'ph_title',     'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_hr_ph_lead',     'ph_lead',      'Page head · mô tả'),
            $t('f_hr_ph_cta1',      'ph_cta1',      'Page head · nút 1'),
            $t('f_hr_ph_cta2',      'ph_cta2',      'Page head · nút 2'),
            $t('f_hr_fb_value',     'fb_value',     'Badge · giá trị'),
            $t('f_hr_fb_label',     'fb_label',     'Badge · nhãn'),
            // Tabs
            $t('f_hr_tab1', 'tab1', 'Tab 1'),
            $t('f_hr_tab2', 'tab2', 'Tab 2'),
            // Block 01 — giới thiệu nhân lực
            $t('f_hr_b1_chip',  'b1_chip',  'Block 1 · chip (Camcom Group)'),
            $ta('f_hr_b1_title', 'b1_title', 'Block 1 · tiêu đề'),
            $ta('f_hr_b1_text',  'b1_text',  'Block 1 · đoạn (cho phép <strong>)'),
            $rep('f_hr_figures', 'figures', 'Block 1 · số liệu', array(
                $t('f_hr_fig_v', 'value',  'Giá trị (số hoặc ký hiệu)'),
                $t('f_hr_fig_s', 'suffix', 'Hậu tố (vd +)'),
                $ta('f_hr_fig_l', 'label', 'Nhãn'),
                array('key' => 'f_hr_fig_c', 'name' => 'coral', 'label' => 'Tô màu coral', 'type' => 'true_false', 'ui' => 1),
            )),
            $ta('f_hr_banner', 'banner', 'Block 1 · banner (cho phép <span class="accent">)'),
            $rep('f_hr_cards', 'cards', 'Block 1 · 2 thẻ (theo thứ tự ảnh)', array(
                $t('f_hr_cd_tag',   'tag',   'Nhãn ảnh (tagchip)'),
                $t('f_hr_cd_title', 'title', 'Tiêu đề'),
                $ta('f_hr_cd_text', 'text',  'Nội dung'),
            )),
            // Block 02 — trang web tuyển dụng
            $t('f_hr_b2_eyebrow', 'b2_eyebrow', 'Block 2 · eyebrow'),
            $ta('f_hr_b2_title',  'b2_title',   'Block 2 · tiêu đề'),
            $ta('f_hr_b2_lead',   'b2_lead',    'Block 2 · mô tả'),
            $t('f_hr_feat_bname', 'feat_bname', 'Feature · brand (mintoku work vietnam)'),
            $t('f_hr_feat_bsub',  'feat_bsub',  'Feature · brand sub (mintoku.vn)'),
            $t('f_hr_feat_tag',   'feat_tag',   'Feature · tag'),
            $ta('f_hr_feat_title', 'feat_title', 'Feature · tiêu đề'),
            $ta('f_hr_feat_text',  'feat_text',  'Feature · đoạn'),
            $ta('f_hr_feat_list',  'feat_list',  'Feature · gạch đầu dòng (mỗi dòng 1 ý)', array('rows' => 4, 'new_lines' => '')),
            $t('f_hr_feat_btn',   'feat_btn',   'Feature · nút'),
            // Fair / event
            $t('f_hr_fair_eyebrow', 'fair_eyebrow', 'Event · eyebrow'),
            $t('f_hr_fair_title',   'fair_title',   'Event · tiêu đề'),
            $ta('f_hr_fair_text',   'fair_text',    'Event · đoạn'),
            // CTA
            $ta('f_hr_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_hr_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_hr_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_hr_cta_btn2',   'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-hr.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Giới thiệu nguồn nhân lực.',
    ));

    /* ---------- HỖ TRỢ MỞ RỘNG THỊ TRƯỜNG VN (tpl-fdi-support.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_fdi',
        'title' => 'VCC — Hỗ trợ mở rộng thị trường VN',
        'fields' => array(
            // Page head
            $t('f_fdi_crumb_home',   'crumb_home',   'Breadcrumb · trang chủ'),
            $t('f_fdi_crumb_parent', 'crumb_parent', 'Breadcrumb · nhóm'),
            $t('f_fdi_crumb_here',   'crumb_here',   'Breadcrumb · trang hiện tại'),
            $t('f_fdi_ph_eye',       'ph_eye',       'Page head · eyebrow'),
            $ta('f_fdi_ph_title',    'ph_title',     'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_fdi_ph_lead',     'ph_lead',      'Page head · mô tả'),
            $t('f_fdi_ph_cta1',      'ph_cta1',      'Page head · nút 1'),
            $t('f_fdi_ph_cta2',      'ph_cta2',      'Page head · nút 2'),
            $t('f_fdi_fb_value',     'fb_value',     'Badge · giá trị'),
            $t('f_fdi_fb_label',     'fb_label',     'Badge · nhãn'),
            // Intro lockup
            $t('f_fdi_intro_chip',  'intro_chip',  'Intro · chip (One-stop FDI Support)'),
            $ta('f_fdi_intro_title', 'intro_title', 'Intro · tiêu đề'),
            $ta('f_fdi_intro_text',  'intro_text',  'Intro · đoạn'),
            $rep('f_fdi_figures', 'figures', 'Intro · số liệu (fv cho phép HTML)', array(
                array('key' => 'f_fdi_fig_v', 'name' => 'fv', 'label' => 'Giá trị (cho phép <span class="u">)', 'type' => 'text'),
                $ta('f_fdi_fig_l', 'fl', 'Nhãn'),
                array('key' => 'f_fdi_fig_c', 'name' => 'coral', 'label' => 'Tô màu coral', 'type' => 'true_false', 'ui' => 1),
            )),
            $ta('f_fdi_banner', 'banner', 'Banner (cho phép <span class="accent">)'),
            // Tabs
            $t('f_fdi_tab1', 'tab1', 'Tab 1'),
            $t('f_fdi_tab2', 'tab2', 'Tab 2'),
            // 01 Establishment
            $t('f_fdi_est_tag',  'est_tag',   'Establishment · tag'),
            $ta('f_fdi_est_title', 'est_title', 'Establishment · tiêu đề'),
            $ta('f_fdi_est_text',  'est_text',  'Establishment · đoạn'),
            $ta('f_fdi_est_list',  'est_list',  'Establishment · gạch đầu dòng (mỗi dòng 1 ý)', array('rows' => 4, 'new_lines' => '')),
            // "Loại khác" strengths
            $t('f_fdi_other_eyebrow', 'other_eyebrow', 'Hỗ trợ bổ sung · eyebrow'),
            $ta('f_fdi_other_title',  'other_title',   'Hỗ trợ bổ sung · tiêu đề'),
            $rep('f_fdi_strengths', 'strengths', 'Hỗ trợ bổ sung · 4 thẻ (theo thứ tự icon)', array(
                $t('f_fdi_str_t', 'title', 'Tiêu đề'),
                $ta('f_fdi_str_x', 'text', 'Nội dung'),
            )),
            // 02 Post setup / Operation
            $t('f_fdi_op_tag',  'op_tag',   'Operation · tag'),
            $ta('f_fdi_op_title', 'op_title', 'Operation · tiêu đề'),
            $ta('f_fdi_op_text',  'op_text',  'Operation · đoạn'),
            $ta('f_fdi_op_list',  'op_list',  'Operation · gạch đầu dòng (mỗi dòng 1 ý)', array('rows' => 6, 'new_lines' => '')),
            // CTA
            $ta('f_fdi_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_fdi_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_fdi_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_fdi_cta_btn2',   'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-fdi-support.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Hỗ trợ mở rộng thị trường VN.',
    ));
});
