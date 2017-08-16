<div class="wrap">
    <h1><?php _e( 'Google Tag Manager', WGTM_DOMAIN ); ?></h1>

    <form method="post" action="options.php">

        <?php settings_fields( 'wgtm-group' ); ?>
        <?php do_settings_sections( 'wgtm-group' ); ?>

        <table class="form-table">

            <tr valign="top">
                <th scope="row"><code>&lt;head&gt;</code> snippet</th>
                <td>
                    <textarea rows="7" class="widefat" name="head-snippet"><?php echo esc_html( get_option('head-snippet') ); ?></textarea>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><code>&lt;body&gt;</code> snippet</th>
                <td>
                    <textarea rows="7" class="widefat" name="body-snippet"><?php echo esc_html( get_option('body-snippet') ); ?></textarea>
                </td>
            </tr>

        </table>

        <?php submit_button(); ?>

    </form>
</div>