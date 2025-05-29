<?php
show_admin_bar(false);

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

register_nav_menus(
    array(
        'header_mail' => 'Меню навигации',
    )
);

function zdfinance_assets()
{
    wp_enqueue_style('global-page-styles', get_template_directory_uri() . '/assets/css/style.css', array());
    wp_enqueue_script('global-page-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'zdfinance_assets');


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

    if (function_exists('acf_add_options_page'))
    {
        $parent = acf_add_options_page(array(
            'page_title' => 'Основные настройки',
            'menu_title' => 'Настройки темы',
            'capability' => 'edit_posts',
            'menu_slug' => 'theme-general-settings',
            'redirect' => false
        ));

        acf_add_options_sub_page(array(
            'page_title' => 'Документы сертификаты',
            'menu_title' => 'Документы сертификаты',
            'parent_slug' => $parent['menu_slug'],
            'menu_slug' => 'theme-docs-settings'
        ));

        acf_add_options_sub_page(array(
            'page_title' => 'Сотрудники',
            'menu_title' => 'Сотрудники',
            'parent_slug' => $parent['menu_slug'],
            'menu_slug' => 'theme-team-settings'
        ));

        // acf_add_options_sub_page(array(
        //     'page_title' => 'Настройки шапки',
        //     'menu_title' => 'Шапка',
        //     'parent_slug' => $parent['menu_slug'],
        //     'menu_slug' => 'theme-header-settings'
        // ));

        // acf_add_options_sub_page(array(
        //     'page_title' => 'Настройки подвала',
        //     'menu_title' => 'Подвал',
        //     'parent_slug' => $parent['menu_slug'],
        //     'menu_slug' => 'theme-footer-settings'
        // ));

    }
}

add_filter('acf/validate_value/name=main-phone', 'validate_phone_number', 10, 4);

function validate_phone_number($valid, $value, $field, $input)
{
    if ($value === '')
    {
        return $valid;
    }

    if (!preg_match('/^\+?[0-9\s\-\(\)]{7,20}$/', $value))
    {
        $valid = 'Пожалуйста, введите корректный номер телефона.';
    }

    return $valid;
}

add_filter('acf/validate_value/name=map-iframe', 'validate_yandex_map_iframe', 10, 4);

function validate_yandex_map_iframe($valid, $value, $field, $input_name)
{
    if ($valid !== true)
    {
        return $valid;
    }

    if (empty(trim($value)))
    {
        return true;
    }

    if (!preg_match('/<iframe[^>]+src="https:\/\/yandex\.ru\/map-widget\/v1\/\?um=constructor%3A.*?"/', $value))
    {
        return 'Пожалуйста, вставьте корректный iframe Яндекс.Карт.';
    }

    return true;
}

add_filter('acf/update_value/name=map-iframe', 'clean_yandex_iframe', 10, 4);
function clean_yandex_iframe($value, $post_id, $field)
{
    if (empty(trim($value)))
    {
        return $value;
    }

    if (strpos($value, 'loading=') === false)
    {
        $value = preg_replace('/<iframe(.*?)>/i', '<iframe$1 loading="lazy">', $value);
    }

    $allowed = array(
        'iframe' => array(
            'src' => true,
            'loading' => true,
        )
    );

    return wp_kses($value, $allowed);
}

function register_post_type_foo()
{
    $args_service = array(
        'labels' => array(
            'name' => 'Услуги',
            'singular_name' => 'Услуга',
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'rewrite' => array(
            'slug' => 's', // это даёт /s/услуга
            'with_front' => false
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('service', $args_service);

    $args_cases = array(
        'labels' => array(
            'name' => 'Кейсы',
            'singular_name' => 'Кейс',
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'rewrite' => array(
            'slug' => 'k', // это даёт /k/кейсы
            'with_front' => false
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('cases', $args_cases);

    $args_review = array(
        'labels' => array(
            'name' => 'Отзывы',
            'singular_name' => 'Отзыв',
            'add_new' => 'Добавить отзыв',
            'add_new_item' => 'Добавить новый отзыв',
            'edit_item' => 'Редактировать отзыв',
            'new_item' => 'Новый отзыв',
            'view_item' => 'Посмотреть отзыв',
            'search_items' => 'Искать отзывы',
            'not_found' => 'Отзывов не найдено',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => false,
        'rewrite' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
    );

    register_post_type('review', $args_review);
}
add_action('init', 'register_post_type_foo');


add_action('wp_ajax_submit_service_review', 'handle_ajax_service_review');
add_action('wp_ajax_nopriv_submit_service_review', 'handle_ajax_service_review');

function handle_ajax_service_review()
{
    // Проверка nonce
    if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'submit_service_review_nonce'))
    {
        wp_send_json_error('Ошибка безопасности');
    }

    $name = sanitize_text_field($_POST['name'] ?? '');
    $tel = sanitize_text_field($_POST['tel'] ?? '');
    $service = sanitize_text_field($_POST['service'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    $uploaded_urls = [];

    if (!empty($_FILES['files']))
    {
        foreach ($_FILES['files']['tmp_name'] as $index => $tmp_name)
        {
            $file = [
                'name' => $_FILES['files']['name'][$index],
                'type' => $_FILES['files']['type'][$index],
                'tmp_name' => $_FILES['files']['tmp_name'][$index],
                'error' => $_FILES['files']['error'][$index],
                'size' => $_FILES['files']['size'][$index],
            ];
            $uploaded = wp_handle_upload($file, ['test_form' => false]);
            if (!isset($uploaded['error']))
            {
                $uploaded_urls[] = $uploaded['url'];
            } else
            {
                error_log('Ошибка загрузки: ' . $uploaded['error']);
            }
        }
    }

    wp_send_json_success([
        'message' => 'Форма отправлена успешно',
        'files' => $uploaded_urls
    ]);
}