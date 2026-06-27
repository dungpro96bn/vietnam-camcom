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

    /* ---------- TỔNG QUAN CÔNG TY (tpl-company.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_company',
        'title' => 'VCC — Tổng quan công ty',
        'fields' => array(
            // Page head
            $t('f_cmp_crumb_home', 'crumb_home', 'Breadcrumb · trang chủ'),
            $t('f_cmp_crumb_here', 'crumb_here', 'Breadcrumb · trang hiện tại'),
            $t('f_cmp_ph_eye',     'ph_eye',     'Page head · eyebrow'),
            $ta('f_cmp_ph_title',  'ph_title',   'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_cmp_ph_lead',   'ph_lead',    'Page head · mô tả'),
            $t('f_cmp_ph_cta1',    'ph_cta1',    'Page head · nút 1'),
            $t('f_cmp_ph_cta2',    'ph_cta2',    'Page head · nút 2'),
            $t('f_cmp_fb_value',   'fb_value',   'Badge · giá trị'),
            $t('f_cmp_fb_label',   'fb_label',   'Badge · nhãn'),
            // Tabs
            $t('f_cmp_tab1', 'tab1', 'Tab 1'),
            $t('f_cmp_tab2', 'tab2', 'Tab 2'),
            $t('f_cmp_tab3', 'tab3', 'Tab 3'),
            // Company info
            $t('f_cmp_info_eyebrow', 'info_eyebrow', 'Thông tin · eyebrow'),
            $t('f_cmp_info_title',   'info_title',   'Thông tin · tiêu đề'),
            $t('f_cmp_lbl_name', 'lbl_name', 'Nhãn · Tên công ty'),
            $t('f_cmp_val_name', 'val_name', 'Giá trị · Tên công ty'),
            $t('f_cmp_lbl_rep',  'lbl_rep',  'Nhãn · Người đại diện'),
            $t('f_cmp_val_rep',  'val_rep',  'Giá trị · Người đại diện'),
            $t('f_cmp_lbl_biz',  'lbl_biz',  'Nhãn · Nội dung kinh doanh'),
            $ta('f_cmp_biz_list', 'biz_list', 'Nội dung kinh doanh · danh sách (mỗi dòng 1 dịch vụ, theo thứ tự HR/BPO/WEB/FDI)', array('rows' => 4, 'new_lines' => '')),
            $t('f_cmp_lbl_addr', 'lbl_addr', 'Nhãn · Địa chỉ'),
            $t('f_cmp_addr_hq_label',  'addr_hq_label',  'Địa chỉ · nhãn trụ sở HN'),
            $ta('f_cmp_addr_hq',       'addr_hq',        'Địa chỉ · trụ sở HN'),
            $t('f_cmp_addr_hcm_label', 'addr_hcm_label', 'Địa chỉ · nhãn chi nhánh HCM'),
            $ta('f_cmp_addr_hcm',      'addr_hcm',       'Địa chỉ · chi nhánh HCM'),
            $t('f_cmp_lbl_phone', 'lbl_phone', 'Nhãn · Số điện thoại'),
            $t('f_cmp_lbl_email', 'lbl_email', 'Nhãn · E-mail'),
            $t('f_cmp_val_email', 'val_email', 'Giá trị · E-mail'),
            $t('f_cmp_lbl_founded', 'lbl_founded', 'Nhãn · Thành lập'),
            $t('f_cmp_val_founded', 'val_founded', 'Giá trị · Thành lập'),
            // Group scale
            $t('f_cmp_group_eyebrow', 'group_eyebrow', 'Tập đoàn · eyebrow'),
            $t('f_cmp_group_title',   'group_title',   'Tập đoàn · tiêu đề'),
            $ta('f_cmp_group_lead',   'group_lead',    'Tập đoàn · mô tả'),
            $rep('f_cmp_figures', 'figures', 'Tập đoàn · số liệu (fv cho phép HTML data-count)', array(
                array('key' => 'f_cmp_fig_v', 'name' => 'fv', 'label' => 'Giá trị (cho phép <span data-count>)', 'type' => 'text'),
                $ta('f_cmp_fig_l', 'fl', 'Nhãn'),
                array('key' => 'f_cmp_fig_c', 'name' => 'coral', 'label' => 'Tô màu coral', 'type' => 'true_false', 'ui' => 1),
            )),
            $ta('f_cmp_group_note', 'group_note', 'Tập đoàn · ghi chú'),
            // Offices
            $t('f_cmp_off_eyebrow', 'off_eyebrow', 'Văn phòng · eyebrow'),
            $t('f_cmp_off_title',   'off_title',   'Văn phòng · tiêu đề'),
            $ta('f_cmp_off_lead',   'off_lead',    'Văn phòng · mô tả'),
            $t('f_cmp_off_hq_tag',    'off_hq_tag',    'Văn phòng HN · tag'),
            $t('f_cmp_off_hq_title',  'off_hq_title',  'Văn phòng HN · tiêu đề'),
            $ta('f_cmp_off_hq_addr',  'off_hq_addr',   'Văn phòng HN · địa chỉ'),
            $t('f_cmp_off_hcm_tag',   'off_hcm_tag',   'Văn phòng HCM · tag'),
            $t('f_cmp_off_hcm_title', 'off_hcm_title', 'Văn phòng HCM · tiêu đề'),
            $ta('f_cmp_off_hcm_addr', 'off_hcm_addr',  'Văn phòng HCM · địa chỉ'),
            $t('f_cmp_iso_title', 'iso_title', 'ISO · tiêu đề'),
            $t('f_cmp_iso_text',  'iso_text',  'ISO · mô tả'),
            $t('f_cmp_iso_no',    'iso_no',    'ISO · số chứng nhận'),
            // CTA
            $ta('f_cmp_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_cmp_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_cmp_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_cmp_cta_btn2',   'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-company.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Tổng quan công ty.',
    ));

    /* ---------- HỖ TRỢ QUẢN LÝ LAO ĐỘNG (tpl-labor-management.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_labor',
        'title' => 'VCC — Hỗ trợ quản lý lao động',
        'fields' => array(
            // Page head
            $t('f_lab_crumb_home',   'crumb_home',   'Breadcrumb · trang chủ'),
            $t('f_lab_crumb_parent', 'crumb_parent', 'Breadcrumb · nhóm'),
            $t('f_lab_crumb_here',   'crumb_here',   'Breadcrumb · trang hiện tại'),
            $t('f_lab_ph_eye',       'ph_eye',       'Page head · eyebrow'),
            $ta('f_lab_ph_title',    'ph_title',     'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_lab_ph_lead',     'ph_lead',      'Page head · mô tả'),
            $t('f_lab_ph_cta1',      'ph_cta1',      'Page head · nút 1'),
            $t('f_lab_ph_cta2',      'ph_cta2',      'Page head · nút 2'),
            $t('f_lab_fb_value',     'fb_value',     'Badge · giá trị'),
            $t('f_lab_fb_label',     'fb_label',     'Badge · nhãn'),
            // Intro lockup
            $t('f_lab_intro_chip',  'intro_chip',  'Intro · chip'),
            $ta('f_lab_intro_title', 'intro_title', 'Intro · tiêu đề'),
            $ta('f_lab_intro_text',  'intro_text',  'Intro · đoạn'),
            $rep('f_lab_figures', 'figures', 'Intro · số liệu (fv cho phép HTML)', array(
                array('key' => 'f_lab_fig_v', 'name' => 'fv', 'label' => 'Giá trị (cho phép <span class="u">)', 'type' => 'text'),
                $ta('f_lab_fig_l', 'fl', 'Nhãn'),
                array('key' => 'f_lab_fig_c', 'name' => 'coral', 'label' => 'Tô màu coral', 'type' => 'true_false', 'ui' => 1),
            )),
            $ta('f_lab_banner', 'banner', 'Banner (cho phép <span class="accent">)'),
            // Tabs
            $t('f_lab_tab1', 'tab1', 'Tab 1'),
            $t('f_lab_tab2', 'tab2', 'Tab 2'),
            $t('f_lab_tab3', 'tab3', 'Tab 3'),
            $t('f_lab_tab4', 'tab4', 'Tab 4'),
            // 01 Why / one-stop
            $t('f_lab_why_tag',   'why_tag',   'Vấn đề · tag'),
            $ta('f_lab_why_title', 'why_title', 'Vấn đề · tiêu đề'),
            $ta('f_lab_why_text',  'why_text',  'Vấn đề · đoạn'),
            $ta('f_lab_why_list',  'why_list',  'Vấn đề · gạch đầu dòng (mỗi dòng 1 ý)', array('rows' => 4, 'new_lines' => '')),
            $t('f_lab_onestop_eyebrow', 'onestop_eyebrow', 'Dịch vụ một cửa · eyebrow'),
            $ta('f_lab_onestop_title',  'onestop_title',   'Dịch vụ một cửa · tiêu đề'),
            $rep('f_lab_stops', 'stops', 'Bốn cam kết · 4 thẻ (theo thứ tự icon)', array(
                $t('f_lab_stop_t', 'title', 'Tiêu đề'),
                $ta('f_lab_stop_x', 'text', 'Nội dung'),
            )),
            // 02 Customer cases
            $t('f_lab_cases_chip',  'cases_chip',  'Câu chuyện · chip'),
            $ta('f_lab_cases_title', 'cases_title', 'Câu chuyện · tiêu đề'),
            $t('f_lab_case_lbl_problem', 'case_lbl_problem', 'Câu chuyện · nhãn "Vấn đề"'),
            $t('f_lab_case_lbl_result',  'case_lbl_result',  'Câu chuyện · nhãn "Hiệu quả"'),
            $rep('f_lab_cases', 'cases', 'Câu chuyện · các case', array(
                $t('f_lab_case_k', 'casek',   'Mã (CASE 01…)'),
                $t('f_lab_case_n', 'name',    'Tên công ty'),
                $ta('f_lab_case_p', 'problem', 'Vấn đề'),
                $ta('f_lab_case_r', 'result',  'Hiệu quả sau khi sử dụng'),
            )),
            // 03 Main services
            $t('f_lab_svc_eyebrow', 'svc_eyebrow', 'Dịch vụ chính · eyebrow'),
            $ta('f_lab_svc_title',  'svc_title',   'Dịch vụ chính · tiêu đề'),
            $ta('f_lab_svc_lead',   'svc_lead',    'Dịch vụ chính · mô tả'),
            $rep('f_lab_services', 'services', 'Dịch vụ chính · 4 thẻ (theo thứ tự icon)', array(
                $t('f_lab_sv_t', 'title', 'Tiêu đề'),
                $ta('f_lab_sv_l', 'list', 'Gạch đầu dòng (mỗi dòng 1 ý)', array('rows' => 4, 'new_lines' => '')),
            )),
            // 04 FAQ
            $t('f_lab_faq_eyebrow', 'faq_eyebrow', 'FAQ · eyebrow'),
            $ta('f_lab_faq_title',  'faq_title',   'FAQ · tiêu đề'),
            $rep('f_lab_faqs', 'faqs', 'FAQ · câu hỏi (a cho phép HTML)', array(
                $ta('f_lab_faq_q', 'q', 'Câu hỏi'),
                $ta('f_lab_faq_a', 'a', 'Trả lời (cho phép HTML: <p>, <b>, <ul><li>, <span class="ref"/dot>)', array('rows' => 8, 'new_lines' => '')),
            )),
            // CTA
            $ta('f_lab_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_lab_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_lab_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_lab_cta_btn2',   'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-labor-management.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Hỗ trợ quản lý lao động.',
    ));

    /* ---------- TUYỂN DỤNG (tpl-recruit.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_recruit',
        'title' => 'VCC — Tuyển dụng',
        'fields' => array(
            // Page head
            $t('f_rec_crumb_home', 'crumb_home', 'Breadcrumb · trang chủ'),
            $t('f_rec_crumb_here', 'crumb_here', 'Breadcrumb · trang hiện tại'),
            $t('f_rec_ph_eye',     'ph_eye',     'Page head · eyebrow'),
            $ta('f_rec_ph_title',  'ph_title',   'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_rec_ph_lead',   'ph_lead',    'Page head · mô tả'),
            $t('f_rec_ph_cta1',    'ph_cta1',    'Page head · nút 1'),
            $t('f_rec_ph_cta2',    'ph_cta2',    'Page head · nút 2 (Facebook)'),
            $t('f_rec_fb_value',   'fb_value',   'Badge · giá trị'),
            $t('f_rec_fb_label',   'fb_label',   'Badge · nhãn'),
            // Jobs section
            $t('f_rec_jobs_eyebrow', 'jobs_eyebrow', 'Vị trí · eyebrow'),
            $t('f_rec_jobs_title',   'jobs_title',   'Vị trí · tiêu đề'),
            $ta('f_rec_jobs_lead',   'jobs_lead',    'Vị trí · mô tả'),
            $t('f_rec_hours_label',  'hours_label',  'Nhãn · Giờ làm'),
            $t('f_rec_hours_value',  'hours_value',  'Giá trị · Giờ làm'),
            $t('f_rec_salary_label', 'salary_label', 'Nhãn · Lương'),
            $t('f_rec_apply_label',  'apply_label',  'Nhãn · nút Ứng tuyển'),
            $rep('f_rec_jobs', 'jobs', 'Danh sách vị trí tuyển dụng', array(
                array('key' => 'f_rec_job_cat', 'name' => 'cat', 'label' => 'Nhóm (data/sales/finance/web → quyết định icon + màu)', 'type' => 'select', 'choices' => array(
                    'data' => 'data — Nhập liệu', 'sales' => 'sales — Kinh doanh', 'finance' => 'finance — Tài chính', 'web' => 'web — Lập trình',
                ), 'default_value' => 'data', 'return_format' => 'value'),
                $t('f_rec_job_clabel', 'cat_label',  'Nhãn nhóm (hiển thị)'),
                $t('f_rec_job_lead',   'lead_tag',   'Lead tag (vd Team Leader, để trống = ẩn)'),
                $t('f_rec_job_title',  'title',      'Chức danh'),
                $ta('f_rec_job_desc',  'desc',       'Mô tả'),
                $t('f_rec_job_vnd',    'salary_vnd', 'Lương (VND)'),
                $t('f_rec_job_usd',    'salary_usd', 'Lương (USD)'),
                $t('f_rec_job_perk',   'perk',       'Phụ cấp (để trống = ẩn)'),
            )),
            // CTA
            $ta('f_rec_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_rec_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_rec_cta_btn1',   'cta_btn1',  'CTA · nút 1 (Facebook)'),
            $t('f_rec_cta_btn2',   'cta_btn2',  'CTA · nút 2 (email)'),
            $t('f_rec_cta_email',  'cta_email', 'CTA · địa chỉ email'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-recruit.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Tuyển dụng.',
    ));

    /* ---------- CHÍNH SÁCH BẢO MẬT (tpl-privacy.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_privacy',
        'title' => 'VCC — Chính sách bảo mật',
        'fields' => array(
            // Page head
            $t('f_prv_crumb_home', 'crumb_home', 'Breadcrumb · trang chủ'),
            $t('f_prv_crumb_here', 'crumb_here', 'Breadcrumb · trang hiện tại'),
            $t('f_prv_ph_eye',     'ph_eye',     'Page head · eyebrow'),
            $ta('f_prv_ph_title',  'ph_title',   'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_prv_ph_lead',   'ph_lead',    'Page head · mô tả'),
            $ta('f_prv_doc_meta',  'doc_meta',   'Page head · meta (mỗi dòng 1 mục)', array('rows' => 3, 'new_lines' => '')),
            $t('f_prv_fb_value',   'fb_value',   'Badge · giá trị'),
            $t('f_prv_fb_label',   'fb_label',   'Badge · nhãn'),
            $t('f_prv_contact_email', 'contact_email', 'Email liên hệ (trong card + CTA)'),
            // Document
            $t('f_prv_toc_head', 'toc_head', 'Mục lục · tiêu đề'),
            $rep('f_prv_toc', 'toc', 'Mục lục (theo thứ tự = số điều)', array(
                $t('f_prv_toc_l', 'label', 'Nhãn mục lục'),
            )),
            $rep('f_prv_sections', 'sections', 'Các điều (theo thứ tự = số điều; body cho phép HTML)', array(
                $ta('f_prv_sec_t', 'title', 'Tiêu đề điều'),
                $ta('f_prv_sec_b', 'body',  'Nội dung (HTML: <p>, <ul class="doc-list">, <div class="doc-card">…)', array('rows' => 10, 'new_lines' => '')),
            )),
            // CTA
            $ta('f_prv_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_prv_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_prv_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_prv_cta_btn2',   'cta_btn2',  'CTA · nút 2 (điện thoại)'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-privacy.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Chính sách bảo mật.',
    ));

    /* ---------- CHÍNH SÁCH BẢO MẬT THÔNG TIN (tpl-security.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_security',
        'title' => 'VCC — Chính sách bảo mật thông tin',
        'fields' => array(
            // Page head
            $t('f_sec_crumb_home', 'crumb_home', 'Breadcrumb · trang chủ'),
            $t('f_sec_crumb_here', 'crumb_here', 'Breadcrumb · trang hiện tại'),
            $t('f_sec_ph_eye',     'ph_eye',     'Page head · eyebrow'),
            $ta('f_sec_ph_title',  'ph_title',   'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_sec_ph_lead',   'ph_lead',    'Page head · mô tả'),
            $ta('f_sec_doc_meta',  'doc_meta',   'Page head · meta (mỗi dòng 1 mục)', array('rows' => 3, 'new_lines' => '')),
            $t('f_sec_fb_value',   'fb_value',   'Badge · giá trị'),
            $t('f_sec_fb_label',   'fb_label',   'Badge · nhãn'),
            // Statement
            $ta('f_sec_pol_lede', 'pol_lede', 'Tuyên bố · câu mở đầu (lớn)'),
            $ta('f_sec_pol_body', 'pol_body', 'Tuyên bố · đoạn văn (HTML: <p>…)', array('rows' => 6, 'new_lines' => '')),
            // Objectives
            $t('f_sec_goals_kicker', 'goals_kicker', 'Mục tiêu · kicker'),
            $ta('f_sec_goals_title', 'goals_title',  'Mục tiêu · tiêu đề'),
            $ta('f_sec_goals_intro', 'goals_intro',  'Mục tiêu · mô tả'),
            $rep('f_sec_goals', 'goals', 'Mục tiêu · 3 thẻ (theo thứ tự icon)', array(
                $t('f_sec_goal_t', 'title', 'Tiêu đề'),
                $ta('f_sec_goal_x', 'text', 'Nội dung'),
            )),
            // Signature band
            $t('f_sec_sign_ed', 'sign_ed', 'Ban hành · nhãn'),
            $rep('f_sec_sign_rows', 'sign_rows', 'Ban hành · các dòng', array(
                $t('f_sec_sign_k', 'k', 'Nhãn'),
                $t('f_sec_sign_v', 'v', 'Giá trị'),
            )),
            $t('f_sec_cert_title', 'cert_title', 'Chứng nhận · tiêu đề'),
            $t('f_sec_cert_no',    'cert_no',    'Chứng nhận · số'),
            // CTA
            $ta('f_sec_cta_title', 'cta_title', 'CTA · tiêu đề'),
            $ta('f_sec_cta_text',  'cta_text',  'CTA · nội dung'),
            $t('f_sec_cta_btn1',   'cta_btn1',  'CTA · nút 1'),
            $t('f_sec_cta_btn2',   'cta_btn2',  'CTA · nút 2'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-security.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Chính sách bảo mật thông tin.',
    ));

    /* ---------- LIÊN HỆ (tpl-contact.php + tpl-contact-confirm.php) ---------- */
    acf_add_local_field_group(array(
        'key' => 'group_vcc_contact',
        'title' => 'VCC — Liên hệ',
        'fields' => array(
            // Page head
            $t('f_ct_crumb_home',   'crumb_home',   'Breadcrumb · trang chủ'),
            $t('f_ct_crumb_parent', 'crumb_parent', 'Breadcrumb · nhóm (chỉ trang Xác nhận)'),
            $t('f_ct_crumb_here',   'crumb_here',   'Breadcrumb · trang hiện tại'),
            $t('f_ct_ph_eye',       'ph_eye',       'Page head · eyebrow'),
            $ta('f_ct_ph_title',    'ph_title',     'Page head · tiêu đề (xuống dòng = <br>)', array('new_lines' => '')),
            $ta('f_ct_ph_lead',     'ph_lead',      'Page head · mô tả'),
            // CF7 form id (per language: step1 vi943/en956/ja922 · step2 vi945/en958/ja932)
            $t('f_ct_cf7_id',       'cf7_id',       'ID form Contact Form 7 (theo ngôn ngữ + bước)'),
            // Aside · contact info
            $t('f_ct_info_title',   'info_title',   'Aside · tiêu đề'),
            $ta('f_ct_info_sub',    'info_sub',     'Aside · mô tả'),
            $t('f_ct_lbl_addr',     'lbl_addr',     'Aside · nhãn Địa chỉ'),
            $ta('f_ct_val_addr',    'val_addr',     'Aside · Địa chỉ'),
            $t('f_ct_lbl_phone',    'lbl_phone',    'Aside · nhãn Điện thoại'),
            $t('f_ct_phone_hours',  'phone_hours',  'Aside · giờ làm việc'),
            $t('f_ct_lbl_email',    'lbl_email',    'Aside · nhãn Email'),
            $t('f_ct_contact_email','contact_email','Aside · địa chỉ email'),
            $t('f_ct_lbl_social',   'lbl_social',   'Aside · nhãn Mạng xã hội'),
            $t('f_ct_social_text',  'social_text',  'Aside · text Facebook'),
            // Aside · ISO
            $t('f_ct_iso_title',    'iso_title',    'ISO · tiêu đề'),
            $t('f_ct_iso_text',     'iso_text',     'ISO · mô tả'),
            $t('f_ct_iso_no',       'iso_no',       'ISO · số chứng nhận'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-contact.php'),
            ),
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'tpl-contact-confirm.php'),
            ),
        ),
        'active' => true,
        'description' => 'Văn bản trang Liên hệ + Xác nhận (form là Contact Form 7).',
    ));
});
