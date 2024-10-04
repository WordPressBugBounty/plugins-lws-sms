<?php
// Prepare the Our Plugin page
$tabs_list = array(
array('welcome', __('Welcome', 'lws-sms')),
array('general', __('General', 'lws-sms')),
array('templates', __('Templates', 'lws-sms')),
array('sender', __('Senders', 'lws-sms')),
array('history', __('History', 'lws-sms')),
array('automatisation', __('Automation', 'lws-sms')),
array('campaign', __('Campaign', 'lws-sms')),
array('plugins', __('Our plugins', 'lws-sms')),
);

//Adapt the array to change which plugins to feature in the page
$plugins = array(
'lws-hide-login' => array('LWS Hide Login', __('This plugin <strong>hide your administration page</strong> (wp-admin) and lets you <strong>change your login page</strong> (wp-login). It offers better security as hackers will have more trouble finding the page.', 'lws-sms'), true),
'lws-optimize' => array('LWS Optimize', __('This plugin lets you boost your website\'s <strong>loading times</strong> thanks to our tools: caching, media optimisation, files minification and concatenation...', 'lws-sms'), true),
'lws-cleaner' => array('LWS Cleaner', __('This plugin lets you <strong>clean your WordPress website</strong> in a few clics to gain speed: posts, comments, terms, users, settings, plugins, medias, files.', 'lws-sms'), true),
'lws-sms' => array('LWS SMS', __('This plugin, designed specifically for WooCommerce, lets you <strong>send SMS automatically to your customers</strong>. You will need an account at LWS and enough credits to send SMS. Create personnalized templates, manage your SMS and sender IDs and more!', 'lws-sms'), false),
'lws-affiliation' => array('LWS Affiliation', __('With this plugin, you can add banners and widgets on your website and use those with your <strong>affiliate account LWS</strong>. Earn money and follow the evolution of your gains on your website.', 'lws-sms'), false),
'lwscache' => array('LWSCache', __('Based on the Varnich cache technology and NGINX, LWSCache let you <strong>speed up the loading of your pages</strong>. This plugin helps you automatically manage your LWSCache when editing pages, posts... and purging all your cache. Works only if your server use this cache.', 'lws-sms'), false),
'lws-tools' => array('LWS Tools', __('This plugin provides you with several tools and shortcuts to manage, secure and optimise your WordPress website. Updating plugins and themes, accessing informations about your server, managing your website parameters, etc... Personnalize every aspect of your website!', 'lws-sms'), false)
);

//Adapt the array to change which plugins are featured as ads
$plugins_showcased = array('lws-tools', 'lws-cleaner', 'lwscache');

$plugins_activated = array();
$all_plugins = get_plugins();

foreach ($plugins as $slug => $plugin) {
    if (is_plugin_active($slug . '/' . $slug . '.php')) {
        $plugins_activated[$slug] = "full";
    } elseif (array_key_exists($slug . '/' . $slug . '.php', $all_plugins)) {
        $plugins_activated[$slug] = "half";
    }
}
// // //
?>

<script>
    var function_ok = true;
</script>


<!-- Beginning main content block -->
<div class="lws_sms_main_bloc">
    <!-- Beginning of the blue part (ad part) -->
    <div class="lws_sms_adbloc">
        <div class="lws_sms_adbloc_left">
            <span
                class="lws_sms_ad_title"><?php echo esc_html('LWS SMS'); ?></span>
            <span class="lws_sms_ad_subtext">
                <?php esc_html_e('by', 'lws-sms'); ?></span>
            <img class="lws_sms_ad_img"
                src="<?php echo esc_url(plugins_url('images/logo_lws.png', __DIR__))?>"
                alt="LWS Logo" width="238px" height="60px">
        </div>
        <div class="lws_sms_adbloc_right">
            <span class="lws_sms_ad_t1">
                <?php esc_html_e('Discover LWS efficient, fast and secure web hosting!', 'lws-sms'); ?></span>
            <br>
            <img style="vertical-align:sub; margin-right:5px"
                src="<?php echo esc_url(plugins_url('images/wordpress_blanc.svg', __DIR__))?>"
                alt="LWS Cache Logo" width="20px" height="20px">
            <span class="lws_sms_ad_t2">
                <?php esc_html_e('15% off your WordPress-optimized hosting with the code: ', 'lws-sms'); ?></span>
            <br>
            <div style="margin-top:10px">
                <label onclick="lws_sms_copy_clipboard(this)" class="lws_sms_ad_label lws_sms_tooltip" readonly
                    text="WPEXT15">
                    <span><?php echo esc_html('WPEXT15'); ?></span>
                    <img style="vertical-align: middle; padding-left: 47px;"
                        src="<?php echo esc_url(plugins_url('images/copier.svg', __DIR__))?>"
                        alt="Logo Copy Element" width="15px" height="18px">
                </label>
                <a target="_blank"
                    href="<?php echo esc_url('https://www.lws.fr/hebergement_wordpress.php');?>"><button
                        type="button"
                        class="lws_sms_ad_button"><?php esc_html_e("Let's go!", 'lws-sms'); ?></button></a>
            </div>
        </div>
    </div>
    <!--  END -->
    <!-- Sub-block, where the plugin is presented -->
    <div class="lws_sms_subtitlebloc">
        <img style="margin-top:20px"
            src="<?php echo esc_url(plugins_url('images/plugin_lws-sms.svg', __DIR__))?>"
            alt="LWS Cache Logo" width="100px" height="100px">
        <!-- Change image -->
        <!-- Change next block with new text -->
        <div class="lws_sms_title-text">
            <p class="">
                <?php esc_html_e('LWS SMS is an auxiliary LWS service, renowned web hosting company. This platform lets you send SMS fast and easily to your customers ay an unbeatable price. With this plugin, you direct use this service on your website; send SMS by Internet and maintain your account up to date at the same place. ', 'lws-sms'); ?>
            </p>
            <p class="">
                <strong><?php esc_html_e("Send SMS to your clients now!", 'lws-sms'); ?></strong>
            </p>
        </div>
    </div>

    <?php //Check if WC is active or not
    if (!is_plugin_active('woocommerce/woocommerce.php')):?>
    <div class="error_message">
        <?php esc_html_e("It seems that you are not using WooCommerce. This plugin was made for WooCommerce and most functionalities will not work without it.", "lws-sms");?>
    </div>
    <?php endif ?>

    <!-- Home to the tabs + content + ads -->
    <div class="lws_sms_main_content">
        <!-- tabs + content -->
        <div class="lws_sms_list_block_content">
            <!-- Tabs -->
            <div class="tab_lws_sms" id='tab_lws_sms_block'>
                <div id="tab_lws_sms" role="tablist" aria-label="Onglets_lws_sms">
                    <?php if (!is_plugin_active('woocommerce/woocommerce.php')) : ?>
                    <button
                        id="<?php echo esc_attr('nav-welcome'); ?>"
                        class="tab_nav_lws_sms active" data-toggle="tab" role="tab" aria-controls="welcome"
                        aria-selected="true" tabindex="0">
                        <?php echo __('Welcome', 'lws-sms'); ?>
                    </button>
                    <button
                        id="<?php echo esc_attr('nav-plugins'); ?>"
                        class="tab_nav_lws_sms" data-toggle="tab" role="tab" aria-controls="plugins"
                        aria-selected="false" tabindex="-1">
                        <?php echo __('Our plugins', 'lws-sms'); ?>
                    </button>
                    <?php elseif (!(get_option("lws_sender_id")) || !(get_option("lws_user_sms"))) :?>
                    <button
                        id="<?php echo esc_attr('nav-welcome'); ?>"
                        class="tab_nav_lws_sms active" data-toggle="tab" role="tab" aria-controls="welcome"
                        aria-selected="true" tabindex="0">
                        <?php echo __('Welcome', 'lws-sms'); ?>
                    </button>
                    <button
                        id="<?php echo esc_attr('nav-plugins'); ?>"
                        class="tab_nav_lws_sms" data-toggle="tab" role="tab" aria-controls="plugins"
                        aria-selected="false" tabindex="-1">
                        <?php echo __('Our plugins', 'lws-sms'); ?>
                    </button>
                    <?php elseif (isset(get_option("lws_sender_id")[0]) && get_option("lws_sender_id")[0] == 'NOSENDER') : ?>
                    <button
                        id="<?php echo esc_attr('nav-welcome'); ?>"
                        class="tab_nav_lws_sms" data-toggle="tab" role="tab" aria-controls="welcome"
                        aria-selected="true" tabindex="0">
                        <?php echo __('Welcome', 'lws-sms'); ?>
                    </button>
                    <button
                        id="<?php echo esc_attr('nav-general'); ?>"
                        class="tab_nav_lws_sms active" data-toggle="tab" role="tab" aria-controls="general"
                        aria-selected="true" tabindex="0">
                        <?php echo __('General', 'lws-sms'); ?>
                    </button>
                    <button
                        id="<?php echo esc_attr('nav-sender'); ?>"
                        class="tab_nav_lws_sms" data-toggle="tab" role="tab" aria-controls="sender" aria-selected="true"
                        tabindex="0">
                        <?php echo __('Senders', 'lws-sms'); ?>
                    </button>
                    <button
                        id="<?php echo esc_attr('nav-history'); ?>"
                        class="tab_nav_lws_sms" data-toggle="tab" role="tab" aria-controls="history"
                        aria-selected="true" tabindex="0">
                        <?php echo __('History', 'lws-sms'); ?>
                    </button>
                    <button
                        id="<?php echo esc_attr('nav-plugins'); ?>"
                        class="tab_nav_lws_sms" data-toggle="tab" role="tab" aria-controls="plugins"
                        aria-selected="false" tabindex="-1">
                        <?php echo __('Our plugins', 'lws-sms'); ?>
                    </button>
                    <?php else : ?>
                    <?php foreach ($tabs_list as $tab) : ?>
                    <button
                        id="<?php echo esc_attr('nav-' . $tab[0]); ?>"
                        class="tab_nav_lws_sms <?php echo $tab[0] == 'general' ? esc_attr('active') : ''; ?>"
                        data-toggle="tab" role="tab"
                        aria-controls="<?php echo esc_attr($tab[0]);?>"
                        aria-selected="<?php echo $tab[0] == 'general' ? esc_attr('true') : esc_attr('false'); ?>"
                        tabindex="<?php echo $tab[0] == 'general' ? esc_attr('0') : '-1'; ?>">
                        <?php echo esc_html($tab[1]); ?>
                    </button>
                    <?php endforeach ?>
                    <?php endif ?>
                    <div id="selector" class="selector_tab">&nbsp;</div>
                </div>

                <div class="tab_lws_sms_select hidden">
                    <select name="tab_lws_sms_select" id="tab_lws_sms_select">
                        <?php foreach ($tabs_list as $tab) : ?>
                        <?php if (!(get_option("lws_sender_id")) || !(get_option("lws_user_sms")) || !is_plugin_active('woocommerce/woocommerce.php')) : ?>
                        <?php if ($tab[0] == 'welcome') : ?>
                        <option selected accesskey=""
                            value="<?php echo esc_attr("nav-" . $tab[0]); ?>">
                            <?php echo esc_html($tab[1]); ?>
                        </option>
                        <?php endif ?>
                        <?php else : ?>
                        <option accesskey="" <?php echo $tab[0] == 'general' ? esc_attr('selected') : '' ?>
                            value="<?php echo esc_attr("nav-" . $tab[0]); ?>">
                            <?php echo esc_html($tab[1]); ?>
                        </option>
                        <?php endif ?>
                        <?php endforeach?>
                    </select>
                </div>
            </div>

            <?php if ((!(get_option("lws_sender_id")) || !(get_option("lws_user_sms"))) || !is_plugin_active('woocommerce/woocommerce.php')) :?>
            <div class="tab-pane main-tab-pane active" id="welcome" role="tabpanel" aria-labelledby="nav-welcome"
                tabindex="0">
                <div id="post-body" class="lws_sms_configpage">
                    <?php include plugin_dir_path(__FILE__) . 'welcome.php'; ?>
                </div>
            </div>
            <div class="tab-pane main-tab-pane" id="plugins" role="tabpanel" aria-labelledby="nav-plugins" tabindex="-1"
                hidden>
                <div id="post-body" class="lws_sms_configpage_plugin">
                    <?php include plugin_dir_path(__FILE__) . 'plugins.php'; ?>
                </div>
            </div>
            <?php else : ?>
            <?php foreach ($tabs_list as $tab) : ?>
            <div class="tab-pane main-tab-pane"
                id="<?php echo esc_attr($tab[0]); ?>" role="tabpanel"
                aria-labelledby="<?php echo esc_attr("nav-" . $tab[0]);?>"
                tabindex="<?php echo $tab[0] == 'general' ? esc_attr('0') : '-1'; ?>"
                <?php echo $tab[0] == 'general' ? '' : esc_attr('hidden'); ?>>
                <div id="post-body"
                    class="lws_sms_configpage<?php echo $tab[0] == 'plugins' ? esc_attr('_plugin') : esc_attr(''); ?>">
                    <?php include plugin_dir_path(__FILE__) . $tab[0] . '.php'; ?>
                </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>

        </div>
        <!-- ad blocks, need to change image, ID, name, text... -->
        <!-- Choose 3 -->
        <div class="lws_sms_list_block_ad">
            <?php if (!get_transient('lwssms_remind_me') && !get_option('lwssms_do_not_ask_again')) : ?>
                <div class="lws_sms_block_ad_for_review">
                    <div class="lws_sms_block_ad_review_title">
                        <?php esc_html_e('Thank you for using LWS SMS!', 'lws-sms');?>
                    </div>
                    <div class="lws_sms_block_ad_review_stars">
                        <img src="<?php echo esc_url(plugins_url('images/notation.svg', __DIR__))?>" 
                        height="25px" width="159px">
                    </div>
                    <div class="lws_sms_block_ad_review_description">
                        <?php echo wp_kses(__('<a href="https://wordpress.org/support/plugin/lws-sms/reviews/" target="_blank">Evaluate our plugin</a> to help others send SMS with their WooCommerce shop!', 'lws-sms'), array('a' => array('target' => array(), "href" => array())));?>
                    </div>
                </div>
            <?php endif ?>
            <div class="lws_sms_block_ad">
                <div style="display: flex; justify-content: space-between; margin-bottom:15px">
                    <span style="margin-top:5px">
                        <img style="vertical-align:sub; margin-right:5px"
                            src="<?php echo esc_url(plugins_url('images/plugin_lws_tools.svg', __DIR__))?>"
                            alt="LWS Cache Logo" width="25px" height="23px">
                        <!-- Need to change -->
                        <span
                            class="lws_sms_block_ad_text"><?php echo esc_html('LWS Tools');?></span>
                        <!-- Need to change -->
                    </span>
                    <button class="lws_sms_button_ad_block" onclick="install_plugin(this)" value="lws-tools"
                        id="lws-tools">
                        <!-- Need to change -->
                        <span>
                            <img style="vertical-align:sub; margin-right:5px"
                                src="<?php echo esc_url(plugins_url('images/securise.svg', __DIR__))?>"
                                alt="LWS Cache Logo" width="20px" height="19px">
                            <!-- Need to change -->
                            <span
                                class="lws_sms_button_text"><?php esc_html_e('Install', 'lws-sms'); ?></span>
                        </span>
                        <span class="hidden" name="loading" style="padding-left:5px">
                            <img style="vertical-align:sub; margin-right:5px"
                                src="<?php echo esc_url(plugins_url('images/loading.svg', __DIR__))?>"
                                alt="" width="18px" height="18px">
                            <!-- Need to change -->
                        </span>
                        <span class="hidden"
                            name="activate"><?php echo esc_html_e('Activate', 'lws-sms'); ?></span>
                        <span class="hidden" name="validated">
                            <img style="vertical-align:sub; margin-right:5px" width="18px" height="18px"
                                src="<?php echo esc_url(plugins_url('images/check_blanc.svg', __DIR__))?>">
                            <!-- Need to change -->
                            <?php esc_html_e('Activated', 'lws-sms'); ?>
                        </span>
                    </button>
                </div>
                <span class="lws_sms_text_ad">
                    <?php esc_html_e('Toolkits and shortcuts to manage, secure and optimise your WordPress website.', 'lws-sms'); ?>
                    <!-- Need to change -->
                </span>
            </div>

            <!-- Same as before -->
            <div class="lws_sms_block_ad">
                <div style="display: flex; justify-content: space-between; margin-bottom:15px">
                    <span style="margin-top:5px">
                        <img style="vertical-align:sub; margin-right:5px"
                            src="<?php echo esc_url(plugins_url('images/plugin_lws_cleaner.svg', __DIR__))?>"
                            alt="LWS Cache Logo" width="25px" height="22px">
                        <span
                            class="lws_sms_block_ad_text"><?php echo esc_html('LWS Cleaner');?></span>
                    </span>
                    <button class="lws_sms_button_ad_block" onclick="install_plugin(this)" value="lws-cleaner"
                        id="lws-cleaner">
                        <span>
                            <img style="vertical-align:sub; margin-right:5px"
                                src="<?php echo esc_url(plugins_url('images/securise.svg', __DIR__))?>"
                                alt="LWS Cache Logo" width="20px" height="19px">
                            <span
                                class="lws_sms_button_text"><?php esc_html_e('Install', 'lws-sms'); ?></span>
                        </span>
                        <span class="hidden" name="loading" style="padding-left:5px">
                            <img style="vertical-align:sub; margin-right:5px"
                                src="<?php echo esc_url(plugins_url('images/loading.svg', __DIR__))?>"
                                alt="" width="18px" height="18px">
                        </span>
                        <span class="hidden"
                            name="activate"><?php echo esc_html_e('Activate', 'lws-sms'); ?></span>
                        <span class="hidden" name="validated">
                            <img style="vertical-align:sub; margin-right:5px" width="18px" height="18px"
                                src="<?php echo esc_url(plugins_url('images/check_blanc.svg', __DIR__))?>">
                            <?php esc_html_e('Activated', 'lws-sms'); ?>
                        </span>
                    </button>
                </div>
                <span class="lws_sms_text_ad">
                    <?php esc_html_e('Clean your WordPress website in a few clics to gain in speed: posts, medias...', 'lws-sms'); ?>
                </span>
            </div>

            <!-- Same old... -->
            <div class="lws_sms_block_ad">
                <div style="display: flex; justify-content: space-between; margin-bottom:15px">
                    <span style="margin-top:5px">
                        <img style="vertical-align:sub; margin-right:5px"
                            src="<?php echo esc_url(plugins_url('images/lws_cache_menu.svg', __DIR__))?>"
                            alt="LWS Cache" width="25px" height="23px">
                        <span
                            class="lws_sms_block_ad_text"><?php echo esc_html('LWSCache');?></span>
                    </span>
                    <button class="lws_sms_button_ad_block" onclick="install_plugin(this)" value="lwscache"
                        id="lwscache">
                        <span>
                            <img style="vertical-align:sub; margin-right:5px"
                                src="<?php echo esc_url(plugins_url('/images/securise.svg', __DIR__))?>"
                                alt="" width="20px" height="19px">
                            <span
                                class="lws_sms_button_text"><?php esc_html_e('Install', 'lws-sms'); ?></span>
                        </span>
                        <span class="hidden" name="loading" style="padding-left:5px">
                            <img style="vertical-align:sub; margin-right:5px"
                                src="<?php echo esc_url(plugins_url('images/loading.svg', __DIR__))?>"
                                alt="" width="18px" height="18px">
                        </span>
                        <span class="hidden"
                            name="activate"><?php echo esc_html_e('Activate', 'lws-sms'); ?></span>
                        <span class="hidden" name="validated">
                            <img style="vertical-align:sub; margin-right:5px" width="18px" height="18px"
                                src="<?php echo esc_url(plugins_url('images/check_blanc.svg', __DIR__))?>">
                            <?php esc_html_e('Activated', 'lws-sms'); ?>
                        </span>
                    </button>
                </div>
                <span class="lws_sms_text_ad">
                    <?php esc_html_e('Automatically manage your LWSCache when editing pages, posts, ... and purge it.', 'lws-sms'); ?>
                </span>
            </div>
        </div>
    </div>
</div>

<script>
    function lws_sms_copy_clipboard(input) {
        navigator.clipboard.writeText(input.innerText.trim());
        setTimeout(function() {
            jQuery('#copied_tip').remove();
        }, 500);
        jQuery(input).append("<div class='tip' id='copied_tip'>" +
            "<?php esc_html_e('Copied!', 'lws-sms');?>" +
            "</div>");
    }
</script>


<script>
    const tabs = document.querySelectorAll('.tab_nav_lws_sms[role="tab"]');

    var reset_table = (function() {
        var executed = false;
        return function() {
            if (!executed && jQuery('#list_history') != null) {
                executed = true;
                jQuery(document).ready(function() {
                    jQuery('#list_history').DataTable().columns.adjust();
                });
            }
        };
    })();

    var reset_table_template = (function() {
        var executed_template = false;
        return function() {
            if (!executed_template && jQuery('#list_model') != null) {
                executed_template = true;
                jQuery(document).ready(function() {
                    jQuery('#list_model').DataTable().columns.adjust();
                });
            }
        };
    })();

    // Add a click event handler to each tab
    tabs.forEach((tab) => {
        tab.addEventListener('click', lws_sms_changeTabs);
    });

    <?php if (isset($change_tab)) : ?>
    var element = document.getElementById(
        "<?php echo esc_attr($change_tab); ?>");
    lws_sms_changeTabs(element);
    <?php else : ?>
    <?php if (!(get_option("lws_sender_id")) || !(get_option("lws_user_sms")) || !is_plugin_active('woocommerce/woocommerce.php')) :?>
    lws_sms_selectorMove(document.getElementById('nav-welcome'), document.getElementById('nav-welcome')
        .parentNode);
    <?php else : ?>
    lws_sms_selectorMove(document.getElementById('nav-general'), document.getElementById('nav-general')
        .parentNode);
    <?php endif ?>
    <?php endif ?>

    function lws_sms_selectorMove(target, parent) {
        const cursor = document.getElementById('selector');
        var element = target.getBoundingClientRect();
        var bloc = parent.getBoundingClientRect();

        var padding = parseInt((window.getComputedStyle(target, null).getPropertyValue('padding-left'))
            .slice(0, -
                2));
        var margin = parseInt((window.getComputedStyle(target, null).getPropertyValue('margin-left')).slice(
            0, -2));
        var begin = (element.left - bloc.left) - margin;
        var ending = target.clientWidth + 2 * margin;

        cursor.style.width = ending + "px";
        cursor.style.left = begin + "px";
    }

    function lws_sms_changeTabs(e) {
        var target;
        if (e.target === undefined) {
            target = e;
        } else {
            target = e.target;
        }
        const parent = target.parentNode;
        const grandparent = parent.parentNode.parentNode;

        // Remove all current selected tabs
        parent
            .querySelectorAll('.tab_nav_lws_sms[aria-selected="true"]')
            .forEach(function(t) {
                t.setAttribute('aria-selected', false);
                t.classList.remove("active")
            });

        // Set this tab as selected
        target.setAttribute('aria-selected', true);
        target.classList.add('active');

        // Hide all tab panels
        grandparent
            .querySelectorAll('.tab-pane.main-tab-pane[role="tabpanel"]')
            .forEach((p) => p.setAttribute('hidden', true));

        // Show the selected panel
        grandparent.parentNode
            .querySelector(`#${target.getAttribute('aria-controls')}`)
            .removeAttribute('hidden');

        lws_sms_selectorMove(target, parent);
        if (target.id == 'nav-history') {
            reset_table();
        }
        if (target.id == 'nav-templates') {
            reset_table_template();
        }

    }
</script>

<!-- Need to change classes -->
<script>
    jQuery(document).ready(function() {
        <?php foreach ($plugins_activated as $slug => $activated) : ?>
        <?php if ($activated == "full") : ?>
        <?php if (in_array($slug, $plugins_showcased)): ?>
        var button = jQuery(
            "<?php echo esc_attr("#" . $slug); ?>"
        );
        button.children()[3].classList.remove('hidden');
        button.children()[0].classList.add('hidden');
        button.prop('onclick', false);
        button.addClass('lws_sms_button_ad_block_validated');
        <?php endif ?>
        /**/
        var button = jQuery(
            "<?php echo esc_attr("#bis_" . $slug); ?>"
        );
        button.children()[3].classList.remove('hidden');
        button.children()[0].classList.add('hidden');
        button.prop('onclick', false);
        button.addClass('lws_sms_button_ad_block_validated');

        <?php elseif ($activated == "half") : ?>
        <?php if (in_array($slug, $plugins_showcased)): ?>
        var button = jQuery(
            "<?php echo esc_attr("#" . $slug); ?>"
        );
        button.children()[2].classList.remove('hidden');
        button.children()[0].classList.add('hidden');
        <?php endif ?>
        /**/
        var button = jQuery(
            "<?php echo esc_attr("#bis_" . $slug); ?>"
        );
        button.children()[2].classList.remove('hidden');
        button.children()[0].classList.add('hidden');
        <?php endif ?>
        <?php endforeach ?>
    });

    function install_plugin(button) {
        var newthis = this;
        if (this.function_ok) {
            this.function_ok = false;
            const regex = /bis_/;
            bouton_id = button.id;
            bouton_sec = "";
            if (bouton_id.match(regex)) {
                bouton_sec = bouton_id.substring(4);
            } else {
                bouton_sec = "bis_" + bouton_id;
            }

            button_sec = document.getElementById(bouton_sec);

            button.children[0].classList.add('hidden');
            button.children[3].classList.add('hidden');
            button.children[2].classList.add('hidden');
            button.children[1].classList.remove('hidden');
            button.classList.remove('lws_sms_button_ad_block_validated');
            button.setAttribute('disabled', true);

            if (button_sec !== null) {
                button_sec.children[0].classList.add('hidden');
                button_sec.children[3].classList.add('hidden');
                button_sec.children[2].classList.add('hidden');
                button_sec.children[1].classList.remove('hidden');
                button_sec.classList.remove('lws_sms_button_ad_block_validated');
                button_sec.setAttribute('disabled', true);
            }

            var data = {
                action: "lws_sms_downloadPlugin",
                _ajax_nonce: '<?php echo esc_attr(wp_create_nonce('updates')); ?>',
                slug: button.getAttribute('value'),
            };
            jQuery.post(ajaxurl, data, function(response) {
                var success = response.success;
                var slug = response.data.slug;
                if (!success) {
                    if (response.data.errorCode == 'folder_exists') {
                        var data = {
                            _ajax_nonce: '<?php echo esc_attr(wp_create_nonce('activate_lws_sms_plugins')); ?>',
                            action: "lws_sms_activatePlugin",
                            ajax_slug: slug,
                        };
                        jQuery.post(ajaxurl, data, function(response) {
                            jQuery('#' + bouton_id).children()[1].classList.add('hidden');
                            jQuery('#' + bouton_id).children()[2].classList.add('hidden');
                            jQuery('#' + bouton_id).children()[3].classList.remove('hidden');
                            jQuery('#' + bouton_id).addClass('lws_sms_button_ad_block_validated');
                            newthis.function_ok = true;

                            if (button_sec !== null) {
                                jQuery('#' + bouton_sec).children()[1].classList.add('hidden');
                                jQuery('#' + bouton_sec).children()[2].classList.add('hidden');
                                jQuery('#' + bouton_sec).children()[3].classList.remove('hidden');
                                jQuery('#' + bouton_sec).addClass('lws_sms_button_ad_block_validated');
                                newthis.function_ok = true;
                            }
                        });

                    } else {
                        jQuery('#' + bouton_id).children()[1].classList.add('hidden');
                        jQuery('#' + bouton_id).children()[2].classList.add('hidden');
                        jQuery('#' + bouton_id).children()[3].classList.add('hidden');
                        jQuery('#' + bouton_id).children()[0].classList.add('hidden');
                        jQuery('#' + bouton_id).children()[4].classList.remove('hidden');
                        jQuery('#' + bouton_id).addClass('lws_sms_button_ad_block_failed');
                        setTimeout(() => {
                            jQuery('#' + bouton_id).removeClass('lws_sms_button_ad_block_failed');
                            jQuery('#' + bouton_id).prop('disabled', false);
                            jQuery('#' + bouton_id).children()[0].classList.remove('hidden');
                            jQuery('#' + bouton_id).children()[4].classList.add('hidden');
                            newthis.function_ok = true;
                        }, 2500);

                        if (button_sec !== null) {
                            jQuery('#' + bouton_sec).children()[1].classList.add('hidden');
                            jQuery('#' + bouton_sec).children()[2].classList.add('hidden');
                            jQuery('#' + bouton_sec).children()[3].classList.add('hidden');
                            jQuery('#' + bouton_sec).children()[0].classList.add('hidden');
                            jQuery('#' + bouton_sec).children()[4].classList.remove('hidden');
                            jQuery('#' + bouton_sec).addClass('lws_sms_button_ad_block_failed');
                            setTimeout(() => {
                                jQuery('#' + bouton_sec).removeClass('lws_sms_button_ad_block_failed');
                                jQuery('#' + bouton_sec).prop('disabled', false);
                                jQuery('#' + bouton_sec).children()[0].classList.remove('hidden');
                                jQuery('#' + bouton_sec).children()[4].classList.add('hidden');
                                newthis.function_ok = true;
                            }, 2500);
                        }
                    }
                } else {
                    jQuery('#' + bouton_id).children()[1].classList.add('hidden');
                    jQuery('#' + bouton_id).children()[2].classList.remove('hidden');
                    jQuery('#' + bouton_id).prop('disabled', false);
                    newthis.function_ok = true;

                    if (button_sec !== null) {
                        jQuery('#' + bouton_sec).children()[1].classList.add('hidden');
                        jQuery('#' + bouton_sec).children()[2].classList.remove('hidden');
                        jQuery('#' + bouton_sec).prop('disabled', false);
                        newthis.function_ok = true;
                    }
                }
            });
        }
    }
</script>

<script>
    if (window.innerWidth <= 1125) {
        jQuery('#tab_lws_sms').addClass("hidden");
        jQuery('#tab_lws_sms_select').parent().removeClass("hidden");
    }

    jQuery(window).on('resize', function() {
        tab_lws_sms_block
        if (window.innerWidth <= 1125) {
            jQuery('#tab_lws_sms').addClass("hidden");
            jQuery('#tab_lws_sms_select').parent().removeClass("hidden");
            document.getElementById('tab_lws_sms_select').value = document.querySelector(
                '.tab_nav_lws_sms[aria-selected="true"]').id;
        } else {
            jQuery('#tab_lws_sms').removeClass("hidden");
            jQuery('#tab_lws_sms_select').parent().addClass("hidden");
            const target = document.getElementById(document.getElementById('tab_lws_sms_select')
                .value);
            lws_sms_selectorMove(target, target.parentNode);
        }
    });

    jQuery('#tab_lws_sms_select').on('change', function() {
        const target = document.getElementById(this.value);
        const parent = target.parentNode;
        const grandparent = parent.parentNode.parentNode;

        // Remove all current selected tabs
        parent
            .querySelectorAll('.tab_nav_lws_sms[aria-selected="true"]')
            .forEach(function(t) {
                t.setAttribute('aria-selected', false);
                t.classList.remove("active")
            });

        // Set this tab as selected
        target.setAttribute('aria-selected', true);
        target.classList.add('active');

        // Hide all tab panels
        grandparent
            .querySelectorAll('.tab-pane.main-tab-pane[role="tabpanel"]')
            .forEach((p) => p.setAttribute('hidden', true));

        // Show the selected panel
        grandparent.parentNode
            .querySelector(`#${target.getAttribute('aria-controls')}`)
            .removeAttribute('hidden');
    });
</script>