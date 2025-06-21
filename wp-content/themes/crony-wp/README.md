# WPT-WireFrame

This is my custom functions.php file to develop WP Themes.

Visit this link https://www.dropbox.com/s/fyhdad5sznqkau3/cleanblog-1.0.1.zip?dl=0 to download the full WP theme suitable for Blogging.

To use the pagination include pagination.css in your theme

Use below code to your theme where ever you want to show pagination

    <?php if (function_exists("custom_paging_nav")) {
    
        custom_paging_nav();
    
    } ?>

Use below code for the nav menu creation

    <?php
        wp_nav_menu( array(
            'theme_location'    => 'menu_top',
            'container'     => '',
            'menu_id' =>false,
            'menu_class'        => 'nav navbar-nav', 
            'echo'          => true,
            'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
            'depth'         => 10,
            'walker'        => new themeslug_walker_nav_menu
        ) );
    ?>

To use mailchimp api use below example:

    $email = 'test@test.com'; // email of user
    $status = 'pending'; // "subscribed" or "unsubscribed" or "cleaned" or "pending"
    $list_id = 'YOUR LIST ID HERE'; // where to get it read above
    $api_key = 'YOUR MAILCHIMP API KEY HERE'; // where to get it read above
    $merge_fields = array('FNAME' => 'test','LNAME' => 'name');
     
    rudr_mailchimp_subscriber_status($email, $status, $list_id, $api_key, $merge_fields );


If you found any fault or need improvement kindly share.

Thank you in advanced!

# Update:

1. Reference to TGM Plugin Activation library that allows you to easily require or recommend plugins for your WordPress themes (and plugins). It allows your users to install, update and even automatically activate plugins in singular or bulk fashion using native WordPress classes, functions and interfaces. https://github.com/TGMPA/TGM-Plugin-Activation
2. Added Mailchimp 3.0 API
3. Widgets support added
