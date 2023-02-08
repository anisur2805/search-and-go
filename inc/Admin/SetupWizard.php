<?php

    class SetupWizard {
        public $step  = '';
        public $steps = [];

        public function __construct() {
            add_action( 'admin_menu', [$this, 'admin_menu'] );
            add_action( 'init', [$this, 'setup_wizard'] );

            add_action( 'admin_notices', [ $this, 'admin_notices' ] );
        }

        public function admin_menu() {
            add_submenu_page( null, '', '', 'manage_woocommerce', 'sag-setup', '' );
        }

        public function setup_wizard() {
            // $this->set_steps();

            ob_start();
            // $this->set_setup_wizard_template();
            ob_get_clean();
        }

        public function set_setup_wizard_template() {
            $this->setup_wizard_header();
            $this->setup_wizard_steps();
            $this->setup_wizard_content();
            $this->setup_wizard_footer();
        }

        public function set_steps() {
            $this->steps = apply_filters(
                'sag_admin_setup_wizard_steps',
                [
                    'name' => __( 'Introduction' ),
                    'view' => [$this, 'sag_setup_introduction'],
                ],
                [
                    'name'    => __( 'Store' ),
                    'view'    => [$this, 'sag_setup_store'],
                    'handler' => [$this, 'sag_setup_store_save'],
                ],
                [
                    'name'    => __( 'Selling' ),
                    'view'    => [$this, 'sag_setup_selling'],
                    'handler' => [$this, 'sag_setup_selling_save'],
                ],
                [
                    'name'    => __( 'Withdraw' ),
                    'view'    => [$this, 'sag_setup_withdraw'],
                    'handler' => [$this, 'sag_setup_withdraw_save'],
                ],
                [
                    'name'    => __( 'Recommended' ),
                    'view'    => [$this, 'sag_setup_recommended'],
                    'handler' => [$this, 'sag_setup_recommended_save'],
                ],
                [
                    'name'    => __( 'Ready' ),
                    'view'    => [$this, 'sag_setup_ready'],
                    'handler' => '',
                ],
            );
        }

        public function sag_setup_introduction() {?>
            <h1><?php esc_html_e( 'Welcome to the world of Dokan!', 'dokan-lite' );?></h1>
            <p><?php echo wp_kses( __( 'Thank you for choosing Dokan to power your online marketplace! This quick setup wizard will help you configure the basic settings. <strong>It’s completely optional and shouldn’t take longer than three minutes.</strong>', 'dokan-lite' ), ['strong' => []] ); ?></p>
            <p><?php esc_html_e( 'No time right now? If you don’t want to go through the wizard, you can skip and return to the WordPress dashboard. Come back anytime if you change your mind!', 'dokan-lite' );?></p>
            <p class="wc-setup-actions step">
                <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button-primary button button-large button-next"><?php esc_html_e( 'Let\'s Go!', 'dokan-lite' );?></a>
                <a href="<?php echo esc_url( admin_url() ); ?>" class="button button-large"><?php esc_html_e( 'Not right now', 'dokan-lite' );?></a>
            </p>
        <?php }

        public function setup_wizard_header() {
            ?>
            <!DOCTYPE html>
            <html <?php language_attributes(); ?>>
            <head>
                <meta name="viewport" content="width=device-width"/>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <title><?php esc_html_e( 'Dokan &rsaquo; Setup Wizard', 'dokan-lite' ); ?></title>
                <?php wp_print_scripts(); ?>
                <?php do_action( 'admin_print_styles' ); ?>
                <?php do_action( 'admin_head' ); ?>
                <?php do_action( 'dokan_setup_wizard_styles' ); ?>
            </head>
            <body class="wc-setup dokan-admin-setup-wizard wp-core-ui<?php echo get_transient( 'dokan_setup_wizard_no_wc' ) ? ' dokan-setup-wizard-activated-wc' : ''; ?>">
            <?php
            //$logo_url = ( ! empty( $this->custom_logo ) ) ? $this->custom_logo : plugins_url( 'assets/images/dokan-logo.png', DOKAN_FILE );
            ?>
            <h1 id="wc-logo"><a href="https://wedevs.com/dokan/"><img src="<?php //echo esc_url( $logo_url ); ?>" alt="Dokan Logo" width="135" height="auto"/></a></h1>
            <?php
        }

        public function setup_wizard_steps() {}

        public function setup_wizard_content() {}

        public function setup_wizard_footer() {}

        public function admin_notices() { ?>
            <div class="notice notice-success is-dismissible">
               <div class="sag__notice">
                    <div class="sag__notice--logo">
                        <img src="<?php echo get_template_directory() . '/assets/images/footer-logo.png'; ?>" />
                    </div>
                    <div class="sag__notice--content">
                        <p><?php _e( 'Welcome to SAG – You\'re almost ready to start selling'); ?></p>
                        <a href="<?php echo esc_url( admin_url('admin.php?page=sag-setup') ) ?>"><?php esc_html_e('Run the Setup Wizard'); ?></a>
                    </div>
               </div>
            </div>
        <?php }

    }

new SetupWizard();
