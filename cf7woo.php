<?php
/*
Plugin Name: CF7Woo - ContactForm7 forms for WooCommerce
Plugin URI: https://plugins.club/wordpress/contactform7-forms-for-woocommerce/
Description: A simple plugin to display ContactForm7 forms on any WooCommerce products page.
Version: 1.0
Author: pluginsclub
Author URI: https://plugins.club/
License: GPL2
*/

// Add an option to each product to display the settings
add_action('woocommerce_product_options_pricing', 'pluginsclub_cf7woo_checkbox');
function pluginsclub_cf7woo_checkbox() {
    woocommerce_wp_checkbox(array(
        'id' => '_display_cf7wooform',
        'label' => __('Display ContactForm7 form'),
        'description' => __('Check this box to disable the buy now option for this product and display a form created with the ContactForm7 plugin.'),
        'desc_tip' => true,
    ));
}

// Save the option when a product is saved or updated
add_action('woocommerce_process_product_meta', 'pluginsclub_cf7woo_save');
function pluginsclub_cf7woo_save($post_id) {
    $pluginsclub_cf7woo = isset($_POST['_display_cf7wooform']) ? 'yes' : 'no';
    update_post_meta($post_id, '_display_cf7wooform', $pluginsclub_cf7woo);
}

// Display the form on the single product page if the option is checked
add_filter('woocommerce_get_price_html', 'pluginsclub_cf7woo_display', 10, 2);
function pluginsclub_cf7woo_display($price, $product) {
    if (!is_product()) {
        return $price;
    }
    $pluginsclub_cf7woo = get_post_meta($product->get_id(), '_display_cf7wooform', true);
    if ($pluginsclub_cf7woo === 'yes') {
        $form_id = get_option('wc_price_disable_form_id');
        $form_html = do_shortcode('[contact-form-7 id="' . $form_id . '"]');
        return $form_html;
    } else {
        return $price;
    }
}


// Add an option to set the form to display
add_action('woocommerce_product_options_general_product_data', 'pluginsclub_cf7woo_form_select');
function pluginsclub_cf7woo_form_select() {
    $form_id = get_option('wc_price_disable_form_id');
    $forms = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'posts_per_page' => -1,
    ));
    $options = array('' => __('Select a Form'));
    foreach ($forms as $form) {
        $options[$form->ID] = $form->post_title;
    }
    woocommerce_wp_select(array(
        'id' => '_display_cf7wooform_form',
        'label' => __('CF7 Form to Display'),
        'options' => $options,
        'value' => $form_id,
    ));
}

// Save the form option when a product is saved or updated
add_action('woocommerce_process_product_meta', 'pluginsclub_cf7woo_form_save');
function pluginsclub_cf7woo_form_save($post_id) {
	$form_id = isset($_POST['_display_cf7wooform_form']) ? sanitize_text_field(wp_unslash($_POST['_display_cf7wooform_form'])) : '';

    update_option('wc_price_disable_form_id', $form_id);
}
