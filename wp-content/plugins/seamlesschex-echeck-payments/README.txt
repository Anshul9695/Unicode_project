=== Accept eCheck Payments for WooCommerce - Verify and Accept eChecks Online Today! ===
Plugin Name: Accept eCheck Payments for WooCommerce - Verify and Accept eChecks Online Today!
Description: SeamlessChex is the easiest way to Accept & Verify eCheck Payments on your website with fast next day deposits directly to your bank account.
Author: SeamlessChex
Contributors: seamlesschex
Tags: check, payment, pay, woocommerce payment, seamlesschex
Version: 1.2.4
Tested up to: 5.8
Requires at least: 4.0.3
Stable tag: 1.2.4
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

SeamlessChex is the easiest way to Accept & Verify eCheck Payments on your website with fast next day deposits directly to your bank account.

== Description ==

The SeamlessChex plugin allows WooCommerce merchants to verify and accept eChecks online with confidence by leveraging real-time bank verification. Reduce fraud, returns, chargebacks, and payment processing fees with SeamlessChex.

####Why choose SeamlessChex?

The SeamlessChex gateway is the easiest way to verify and accept eCheck Payments online and over the phone. We offer instant setup and approval to all legal U.S. businesses. There is no credit check or lengthy underwriting process. There are no setup or early termination fees.

####eCheck Verification

We offer most advanced bank account verification available to reduce fraud, returns, and chargebacks. You can add/remove verifications services at any time.

####eCheck Processing

Accept eChecks and receive deposits directly into your bank account. The perfect ACH alternative with instant approval and fast next day funding. No Credit Checks or No long term Contracts. 

####Chat/Phone/Email Support

We provide in house sales and technical support by online chat, phone, and email. 
Chat/Phone Support Hours 9-6pm EST M-F.

####Detailed Documentation

For detailed information please check the <a target="_blank" href="https://seamlesschex.zendesk.com/hc/en-us/articles/360048631111">documentation page</a>.

####Privacy Policy & Terms of Service

Check out our <a target="_blank" href="https://www.seamlesschex.com/privacy-policy/">Privacy Policy</a> and <a target="_blank" href="https://www.seamlesschex.com/terms-of-service/">Terms of Service</a>.

== Installation ==

####Option 1:

- Go to the Add New plugins screen in your WordPress admin area.
- Using the search box, find the SeamlessChex plugin and click the install button and then activate the plugin.

####Option 2:

- Go to the Add New plugins screen in your WordPress admin area.
- Click the upload tab.
- Browse for the plugin file.
- Click Install Now and then activate the plugin.

Once you've downloaded and installed the plugin on your site, you'll need to go through a simple and quick setup.

Most of the plugin's default configuration values will work for you. Basically you need to enter your SeamlessChex API keys in the plugin settings menu.

Go to the Settings menu of the SeamlessChex plugin and configure your API credentials.

You will need a SeamlessChex <a target="_blank" href="https://portal.seamlesschex.com/">account</a> to complete the general setup of this plugin. If you don't have an account yet, you'll need to create one <a target="_blank" href="https://www.seamlesschex.com/sign-up-echeck/">here</a> before proceeding - it's fast and there is no credit card required.

- Go to the “SeamlessChex” plugin menu.
- You will see the “General settings” page section. In this section you will need to enter the <a href="https://docs.woocommerce.com/document/woocommerce-rest-api/" target="_blank" rel="noopener">WooCommerce Consumer Keys</a> and SeamlessChex API Secret Keys. (These can be found in your API settings of your SeamlessChex account <a target="_blank" href="https://portal.seamlesschex.com/#/merchant-api">here</a>).
- Select the live mode option if you are ready to run live payments.
- Save the changes you have made by clicking the ‘Save Changes’ button at the bottom of the settings page.
- Go to the WooCommerce Settings page and enable new SeamlessChex payment method.

You can now see the new SeamlessChex payment method at checkout. In addition, you can view all received eChecks on the SeamlessChex <a target="_blank" href="https://portal.seamlesschex.com/#/dashboard">Dashboard</a>.

Wordpress Cron should be configured.

####PLEASE NOTE:

Unpaid order cancelled- time limit reached. Order status changed from Pending Payment to Cancelled.

- Step 1. Visit your backend of the WordPress dashboard and go to the WooCommerce Tab.
- Step 2. Click on “Settings,” and then you will want to click on the “Products” tab on the top of that next window.
- Step 3.Click on the “Inventory” tab.
- Step 4. The most important item here to change is the Hold Stock (minutes) “60” minute interval that is set default by WooCommerce if you enable Stock Management for your inventory. IF you are using Stock management, and have that item enabled, delete the “60” minutes value from the Hold stock (for unpaid orders) for x minutes. When this limit is reached, the pending order will be canceled. Leave blank to disable value. 

OR

If you are not using Stock management, we recommend removing any value from this field just in case. 

This will ensure that there is no timeout if PayPal tries to process the payment automatically and it reaches a timeout.

== Usage Instructions ==

Once you've downloaded and installed the plugin on your site, you'll need to go through a simple and quick setup.

Most of the plugin's default configuration values will work for you. Basically you need to enter your SeamlessChex API keys in the plugin settings menu.

Go to the Settings menu of the SeamlessChex plugin and configure your API credentials.

You will need a SeamlessChex <a target="_blank" href="https://portal.seamlesschex.com/">account</a> to complete the general setup of this plugin. If you don't have an account yet, you'll need to create one <a target="_blank" href="https://www.seamlesschex.com/sign-up-echeck/">here</a> before proceeding - it's fast and there is no credit card required.

- Go to the “SeamlessChex” plugin menu.
- You will see the “General settings” page section. In this section you will need to enter the <a href="https://docs.woocommerce.com/document/woocommerce-rest-api/" target="_blank" rel="noopener">WooCommerce Consumer Keys</a> and SeamlessChex API Secret Keys. (These can be found in your API settings of your SeamlessChex account <a target="_blank" href="https://portal.seamlesschex.com/#/merchant-api">here</a>).
- Select the live mode option if you are ready to run live payments.
- Save the changes you have made by clicking the ‘Save Changes’ button at the bottom of the settings page.
- Go to the WooCommerce Settings page and enable new SeamlessChex payment method.

You can now see the new SeamlessChex payment method at checkout. In addition, you can view all received eChecks on the SeamlessChex <a target="_blank" href="https://portal.seamlesschex.com/#/dashboard">Dashboard</a>.

Wordpress Cron should be configured.

== Frequently Asked Questions ==

= Do I need a US bank account? =

Yes, a US business checking account is required for all SeamlessChex accounts.

= What documents are required? =

EIN Letter, Drivers License, Last month’s bank statement, Voided Check.

= When will I get my funds? =

As fast as same day to as long as 2 days after a check has been entered.

= How can I process a refund? =

If the check has not been processed you will be able to cancel up until the batch closes.
If the check has already been processed you can send a refund by sending a check using Paynote.

= How can I cancel a check? =

You are able to cancel a check before your batch closes in the SeamlessChex portal.


== Screenshots ==

1. Installed SeamlessChex plugin
2. General settings
3. Activate additional payment methods with just a few clicks
4. New payment method on the checkout page
5. SeamlessChex API Secret Keys


== Changelog ==

= 1.0.0 =

*   Stable version

= 1.0.1 =

*   Update according to the API changes

= 1.0.2 = 

*   The ability to automatically update the order status has been added
*   Added the ability to cancel a eCheck through the order control panel

= 1.1.0 =

*   Improved correlation between the plugin and portal
*   The status errors have been fixed
*   Order noted for tracking purporses have been added
*   The option to enable recurring payments has been implemented
*   The Cron for the statuses sync has been added
*   The option to enable and customize email notification has been added
*   Some text changes were made to improve the overall experience of using the plugin

= 1.2.0 = 

*   If Company Name field is entered, then it will appear on the account holder line on the check
*   Fixed the issue with failed transactions in Sandbox mode

= 1.2.1 = 

*   Fixed the issue with failed transactions

= 1.2.2 = 

*   fixed incorrect order status
*   fixed "duplicate check" error

= 1.2.3 = 

*   improved stability

= 1.2.4 = 

*   fixed functional