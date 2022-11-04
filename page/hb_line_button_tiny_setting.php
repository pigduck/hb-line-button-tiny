<?php
    if (!defined('ABSPATH') || !current_user_can('administrator')) {
        http_response_code(404);
        die();
    }

    if(@$_POST['line'] && wp_verify_nonce( $_POST['_wpnonce'], '_hb_line_button_tiny')){
        $verifyPOST=[];
        foreach ($_POST['line'] as $key=>$value){
            $verifyPOST[sanitize_text_field($key)] = sanitize_textarea_field($value);
        }
       update_option('hb_line_button_tiny_data', $verifyPOST);
    }
    $result = get_option('hb_line_button_tiny_data');
    if(!$result) $result=null;

?>
<div class="heiblack-container">
    <div class="stuffbox">
        <form action="" method="post">
            <h2><b><?php esc_html_e("Setting","hb_line_button_tiny");?></b></h2>
            <h2><?php esc_html_e("Bot basic ID","hb_line_button_tiny");?><span style="color: red"> *</span></h2>
            <input type="text" name="line[bot_basic_id]" style="width: 100%" value="<?php echo esc_textarea(@$result['bot_basic_id']);?>" placeholder="@example123">
            <h2><?php esc_html_e("Title","hb_line_button_tiny");?></h2>
            <input type="text" name="line[bot_basic_title]" style="width: 100%" value="<?php echo esc_textarea(@$result['bot_basic_title']);?>" placeholder="Line">
            <h2><?php esc_html_e("Message Title","hb_line_button_tiny");?></h2>
            <input type="text" name="line[bot_basic_name]" style="width: 100%" value="<?php echo esc_textarea(@$result['bot_basic_name']);?>">
            <h2><?php esc_html_e("Message","hb_line_button_tiny");?></h2>
            <textarea name="line[bot_basic_message]" style="width: 100%;height: 100px"><?php echo esc_textarea(@$result['bot_basic_message']);?></textarea>
            <h2><?php esc_html_e("Vertical Position( px )","hb_line_button_tiny");?></h2>
            <?php if(isset($result['bot_basic_number'])): ?>
            <input type="number" min="0"  name="line[bot_basic_number]" value="<?php echo esc_textarea(@$result['bot_basic_number']);?>">
            <?php else:?>
            <input type="number" min="0"  name="line[bot_basic_number]" value="20">
            <?php endif;?>
            <br>
            <h2><?php esc_html_e("Position","hb_line_button_tiny");?></h2>
            <?php if(isset($result['bot_basic_position']) && $result['bot_basic_position']=='0'): ?>
            <input type="radio" id="hb_line_button_Left" name="line[bot_basic_position]" value="0" checked="checked">
            <label for="hb_line_button_Left"><?php esc_html_e("Left","hb_line_button_tiny");?></label>&nbsp;
            <input type="radio" id="hb_line_button_Right" name="line[bot_basic_position]" value="1">
            <label for="hb_line_button_Right"><?php esc_html_e("Right","hb_line_button_tiny");?></label>
            <?php else:?>
            <input type="radio" id="hb_line_button_Left" name="line[bot_basic_position]" value="0">
            <label for="hb_line_button_Left"><?php esc_html_e("Left","hb_line_button_tiny");?></label>&nbsp;
            <input type="radio" id="hb_line_button_Right" name="line[bot_basic_position]" value="1" checked="checked">
            <label for="hb_line_button_Right"><?php esc_html_e("Right","hb_line_button_tiny");?></label>
            <?php endif;?>
            <br><br>
            <hr>
            <h2><?php esc_html_e("Mobile","hb_line_button_tiny");?></h2>
            <?php if(isset($result['bot_basic_hide']) && $result['bot_basic_hide']=='on'): ?>
            <input type="checkbox" id="hb_line_button_hidden" name="line[bot_basic_hide]" checked="checked">
            <?php else:?>
            <input type="checkbox" id="hb_line_button_hidden" name="line[bot_basic_hide]">
            <?php endif;?>
            <label for="hb_line_button_hidden"><?php esc_html_e("Mobile phone hidden","hb_line_button_tiny");?></label>
            <br><br>
            <?php if(isset($result['bot_basic_app'])&& $result['bot_basic_app']=='on'): ?>
            <input type="checkbox" name="line[bot_basic_app]" id="hb_line_button_call" checked="checked">
            <?php else:?>
                <input type="checkbox" id="hb_line_button_call" name="line[bot_basic_app]">
            <?php endif;?>
            <label for="hb_line_button_call"><?php esc_html_e("Mobile phone call APP","hb_line_button_tiny");?></label>
            <br><br>
            <?php wp_nonce_field( '_hb_line_button_tiny');?>
            <input id="" type="submit" name="save" class="button button-primary" value="Save">
        </form>
        <br><br>
        <?php echo  "<a target='_blank' href='https://piglet.me/hb-line-button-tiny'>".__('Have Bug or suggest','hb_line_button_tiny')."</a>";?>
    </div>
</div>

<style>
    .heiblack-container{
        padding-top: 10px ;
    }
    .stuffbox{
        padding: 10px;
        background: #ffffff;
        width: 50%;
        margin: 0 auto;
        border: 0;
        border-radius: 8px;
    }
    input[type=radio] + label{
        display: inline-block;
        margin-top: -5px;

    }
</style>