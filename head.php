<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<!-- 상단 시작 { -->
<!--bootstrap:carousel-->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/theme/basic/img/main2.jpg" class="d-block w-100" alt="..." style="opacity:0.8;">
              <div class="carousel-caption d-none d-md-block">
                <h3>Developer 김시은의 portfolio 입니다.</h3>
              </div>
            </div>
        </div>
        <!--bootstrap:navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index:50;">
            <a class="navbar-brand" href="http://localhost/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav" id="navbarNav">
              <ul class="menu navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Skills</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" style="color:white;">
            <?php
            if ($is_member){?>
            <i class="fas fa-user" style="color:rgb(103, 111, 233);"></i>
            <?php }else{?>
              <i class="fas fa-user"></i>
              <?php }?>
            </button>
          </nav>
          <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                    <?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
<!-- } 상단 끝 -->
<script>
  //메뉴 고정
$(window).on('scroll', function(){
  var now=$(this).scrollTop();
  console.log(now);

  if(now>=710){
    $('nav').addClass('fixed');
  }else if(now<710){
    $('nav').removeClass('fixed');
    $('.menu li a').removeClass('active');
  }

  $('.content').each(function(index){
    var posStart=$(this).position().top;
    var posEnd=posStart+$(this).height();
    if(posStart<=now&&posEnd>now){
      $('.menu li a').removeClass('active');
      $('.menu li').eq(index).children('a').addClass('active');
    }
    if(now>3000){
      $('.menu li a').removeClass('active');
      $('.menu li').eq(index).children('a').addClass('active');
    }
  });
});
//메뉴클릭시 해당 섹션으로 스크롤 이동
$('.menu a').on('click', function(e){
  e.preventDefault();
  var index=$(this).parent().index();
  var section=$('.content').eq(index);
  var sectionTop=section.position().top;
  $('html, body').animate({scrollTop:sectionTop});
});
</script>
<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper" class="contents section" style="margin-top:20px;">
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }