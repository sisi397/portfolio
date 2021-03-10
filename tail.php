<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div class="content" id="section04">
    <form name="fcontact" action="<?php echo G5_THEME_URL; ?>/contact_send.php" method="post" onsubmit="return fcontact_submit(this);">
        <fieldset id="contact_fs">
            <div class="contact" style="margin-top:5%;">
                <div>
                    <h1 class="title" style="color:white">Contact</h1>
                </div>
                <div style="width:30%; margin:5% 35%">
                <form>
                    <div class="form-group">
                    <label for="con_name"></label>
                    <input type="text" name="con_name" class="form-control" id="con_name" required placeholder="name">
                    </div>
                    <div class="form-group">
                    <label for="con_email"></label>
                    <input type="email" name="con_email"class="form-control" id="con_email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                    <label for="con_message"></label>
                    <textarea class="form-control"name="con_message" id="con_tel" rows="3"></textarea>
                    </div>
                    <input type="submit" value="submit" id="btn_submit" class="submit btn" style="color:white;">
                </form>
                </div>
            </div>
        </fieldset>
    </form>
    <script>
        function fcontact_submit(f){
        document.getElementById('btn_submit').disabled = true;
        return true;
    }
    </script>
      <!--Contact-->
</div>   
</div>
<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");