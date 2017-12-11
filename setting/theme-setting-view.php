<div class="wrap tmq-app">
    <h2>Settings</h2>
    <form name="post" action="options.php" method="post" id="post" autocomplete="off">
        <input type="hidden" name="option_page" value="<?php echo $option_group; ?>">
        <input type="hidden" name="action" value="update">
        <?php wp_nonce_field($option_group . '-options'); ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="footer">Footer</label></th>
                    <td>
                        <textarea id="footer" rows="10" cols="54" name="tmq_theme_setting[footer]"><?php echo (!is_null($footer))?$footer : ''; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone">Phone Number</label></th>
                    <td>
                        <input type="text" id="phone" name="tmq_theme_setting[phone]" placeholder="Enter Your Phone Number" <?php echo (!is_null($phone))?'value="'.$phone.'"' : ''; ?> class="regular-text">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="alignleft">
            <button class="button button-primary button-large" id="btnSave" type="submit">Save Changes</button>
        </div>
    </form>
</div>