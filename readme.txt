=== CF7Woo - add ContactForm7 forms to WooCommerce products ✌ ===
Contributors: stefanpejcic, pluginsclub
Donate link: https://plugins.club/wordpress/contactform7-forms-for-woocommerce/
Tags: contactform7, inquiry, request a price, woocommerce inquiry, cf7, woo, contactform7 woocommerce 
Requires at least: 5.8
Tested up to: 6.2
Stable tag: 1.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Display ContactForm7 forms on the WooCommerce single product page. Useful for Inquiry or Pre-sales questions.
 
For more free WordPress plugins please visit ♣️ [plugins.club](https://plugins.club).

== Installation ==

1. Upload the plugin file to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

For basic usage, you can also have a look at the [plugin web site](https://plugins.club/wordpress/).

== Frequently Asked Questions ==

= How to enable an inquiry form on a specific product? =

Bellow the price field you will notice a checkbox and form field. Simply check the option to display a form instead of the buy now button and select a CF7 form in the field bellow.

= How to design the contact form? =

Forms can be created with the [ContactForm7 plugin](https://wordpress.org/plugins/contact-form-7/).

= How to include product information in the email? =

To add the WooCommerce product name, SKU, and link to the email that is sent by the ContactForm7 form

You can use ContactForm7's dynamic text extension to include the product information in the email.

For example, to add WooCommerce product name, SKU, and link to the email sent by the ContactForm7  you can include:

`<p>[text product-name default:get_post_title]</p>
<p>[text product-sku default:get_post_meta key=_sku]</p>
<p>[text product-link default:get_permalink]</p>
`

This code includes three text fields: product-name, product-sku, and product-link. The default value of each field is set to a dynamic value that retrieves the product information from the current post.

= How to disable the Price and display just the form instead? =

Simply remove the price for the product and leave the CF7 form enabled.

= I have an idea on how to improve this plugin! =

Please send all your suggestions and ideas to our [email address](https://plugins.club/contact) and they may be developed and included in the plugin in future. 

== Upgrade Notice ==

This is a new version 1.0

== Screenshots ==

1. Add a Contact form to WooCommerce product-link
2. Form takes style form the theme

== Changelog ==
 
= 1.0 =

* Initial release
