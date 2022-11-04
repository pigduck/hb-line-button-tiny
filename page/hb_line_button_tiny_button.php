<?php
    $result = get_option('hb_line_button_tiny_data');
    $url = 'https://line.me/R/ti/p/' . @$result['bot_basic_id'];
    $isMobileDev = isMobileDev();
    $numberpx = is_numeric($result['bot_basic_number'])? intval($result['bot_basic_number']) : '20';
    $isLeft = isset($result['bot_basic_position']) && $result['bot_basic_position']=='0';
    $imgurl = dirname(plugin_dir_url( __FILE__ )). '/assets/btn_base.png';
    function isMobileDev(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
            $user_ag = sanitize_textarea_field($_SERVER['HTTP_USER_AGENT']);
            if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
                return true;
            };
        };
        return false;
    }
?>
<?php if(isset($result['bot_basic_id']) || ($isMobileDev && $result['bot_basic_hide']!='on')): ?>
    <?php if($isLeft): ?>
    <div id="heiblack-container-hb-line-button-tiny" style="left:20px;bottom: <?php echo esc_attr($numberpx).'px;';?>">
    <?php else:?>
        <div id="heiblack-container-hb-line-button-tiny" style="right:20px;bottom: <?php echo esc_attr($numberpx).'px;';?>">
    <?php endif;?>
        <div id="heiblack-box">
            <div class="heiblack-header">
                    <span class="heiblack-header-logo" >
                        <?php echo "<img src=".esc_url($imgurl).">" ?>
                    </span>
                <span class="heiblack-header-text"><?php echo esc_textarea(@$result['bot_basic_title']);?></span>
                <span id="heiblack-close" class="heiblack-close">&times;</span>
            </div>
            <div class="heiblack-qrcode">
                <div id="heiblack-qrcode"></div>
            </div>
            <div class="heiblack-message">
                <h3><?php echo esc_textarea(@$result['bot_basic_name']);?></h3>
                <span><?php echo esc_textarea(@$result['bot_basic_message']);?></span>
            </div>
        </div>
        <?php if($isMobileDev && $result['bot_basic_app']=='on'):?>
            <?php if($isLeft): ?>
            <a id="heiblack-button-link" href="<?php echo esc_url($url);?>" style="float: left"></a>
            <?php else:?>
            <a id="heiblack-button-link" href="<?php echo esc_url($url);?>" style="float: right"></a>
            <?php endif;?>
        <?php else:?>
            <?php if($isLeft): ?>
            <div id="heiblack-button" style="float: left">
            <?php else:?>
                <div id="heiblack-button" style="float: right">
            <?php endif;?>
                <div></div>
            </div>
        <?php endif;?>
        <div class="dialogue">
            <span class="remote"></span>
            <div class="box">
                <div>
                    [Test] Greeting message!Hello, how may we help you? Just send us a message now to get assistance.
                </div>
            </div>
        </div>
    </div>
    <?php echo "<script>const hb_line_button_tiny = '". esc_url($url) ."'; const hb_line_button_tiny_img = '". esc_url($imgurl) ."'; </script>" ?>
    <script type="text/javascript">
        const qrCode = new QRCodeStyling({
            width: 240,
            height: 240,
            type: "canvas",
            data: hb_line_button_tiny,
            image: hb_line_button_tiny_img,
            dotsOptions: {},
            backgroundOptions: {},
            qrOptions :{
                errorCorrectionLevel: "H",
            },
            imageOptions: {
                imageSize:0.2,
                crossOrigin: "anonymous",
                margin:5,
            }
        });

        qrCode.append(document.getElementById("heiblack-qrcode"));
    </script>

<?php endif;?>





