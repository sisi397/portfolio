<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<!--About-->
<div class="content" id="section01">
        <div>
            <h1 class="title">About</h1>
        </div>
        <!--verticalLine을 absolute top 0으로 위로 올리기 위해 div로 묶어서 position을 relative로 지정-->
        <!--timeline-->
        <?php
            $sql="select * from ABOUT";
            $row=sql_fetch($sql);
            $nickname=$row['nickname'];
            $name=$row['name'];
            $email=$row['email'];
            $phone=$row['phone'];
            $git=$row['git'];
            $facebook=$row['facebook'];
            $instagram=$row['instagram'];
            $twitter=$row['twitter'];
        ?>
        <div class="section" style="position: relative;"> 
          <div style="display:inline-block; margin-left:10%; margin-right:20%; width:20%">
              <img src="/theme/basic/img/face.png" style="margin-left:20px;">
              <p style="margin-bottom:40%"><?php echo $nickname ?> 개발자 <?php echo $name ?>입니다.</p>
              <p>email : <?php echo $email ?><br>
                  Phone : <?php echo $phone ?><br>
                  git : <?php echo $git ?>
              </p>
              <p>
                <a href="<?php echo $ninstagram ?>"><i class="aboutFont fab fa-instagram"></i></a>
                <a href="<?php echo $facebook ?>"><i class="aboutFont fab fa-facebook-square"></i></a>
                <a href="<?php echo $twitter ?>"><i class="aboutFont fab fa-github-square"></i></a>
              </p>
          </div>
          <div class="verticalLine" style="padding-left:3%;">
              <?php
                $sql="select * from timeline";
                $result=sql_query($sql);
                for($i=0; $row=sql_fetch_array($result); $i++){
                    echo $row['date'].' '.$row['content'].'<br/><br/>';
                }
              ?>
          </div>
      </div>
</div>
<div class="content" id="section02">
        <!--skills-->
      <div>
          <h1 class="title">Skills</h1>
      </div>
      <div style="height:38rem; background-color: rgba(128, 128, 128, 0.2); margin-bottom: 5%">
        <div style="margin: 5%;">
          <div style="margin-top:1%; margin-bottom:5%;">
            <p style="font-size: 35px;">Front-end</p>
            <div style="display: inline-block;">
              <span><i class="skillFont skillred fab fa-html5"></i></span>
              <div>html</div>
            </div>
            <div style="display: inline-block;">
              <span><i class="skillFont skillblue fab fa-css3-alt"></i></span>
              <div style="margin-left:7px;">css</div>
            </div>
            <div style="display: inline-block;">
              <span  style="margin-left:10px;"><i class="skillFont skillyellow fab fa-js"></i>  </span>
              <div>javascript</div>
            </div>
            <div style="display: inline-block;">
              <span style="margin-left:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" color="purple"class="bi bi-bootstrap-fill" viewBox="0 0 16 16">
                <path d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"/>
                <path d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z"/>
              </svg></span>
              <div>bootstrap</div>
            </div>
          </div>
          <div style="margin-bottom:5%;">
            <p style="font-size: 35px;">Back-end</p>
            <div style="display: inline-block;">
              <span><i class="skillFont fab fa-python"></i>   </span>
              <div>python</div>
            </div>
            <div style="display: inline-block;">
              <span><i class="skillFont fab fa-java"></i>   </span>
              <div style="margin-left:5px;">java</div>
            </div>
            <div style="display: inline-block;">
              <span><i class="skillFont fab fa-php" style="color:rgb(15, 15, 99);"></i>   </span>
              <div style="margin-left:13px;">php</div>
            </div>
            <div style="display: inline-block; margin-right :20px;">
              <span><i style="background-color: black; color: white; font-size: 23px; border-radius: 5px;padding:5px;">Django</i>   </span>
              <div style="margin-left:12px;"> Django</div>
            </div>
            <div style="display: inline-block;">
              <span><img src="https://spring.io/images/spring-logo-9146a4d3298760c2e7e49595184e1975.svg" class="skillFont">   </span>
              <div style="margin-left:20px;"> spring</div>
            </div>
          </div>
          <div style="margin-bottom:1%;">
            <p style="font-size: 35px;">etc</p>
            <div style="display: inline-block;">
              <span><i class="skillFont fab fa-github"></i>   </span>
              <div>github</div>
            </div>
          </div>
        </div>
      </div>
</div>
      <!--Project-->
      <!--bootstrap:card-->
<div class="content" id="section03" >
      <div>
        <h1 class="title">Project</h1>
      </div>
      <div class="card-deck" style="margin:5%;">
        <?php 
          ##페이징을 위한 sql문 ## : 처음 접속하면 page = 1, 그 외에는 해당 페이지 번호 get방식으로 가져오기.  
          if(isset($_GET['page'])){
              $page = $_GET['page']; 
          }else{
              $page = 1;
          }

          ## 게시판에 등록된 총 게시글 수를 가져오기 위한 sql 문 ##
          $sql = sql_fetch("select bo_count_write from $g5[board_table] where bo_table = 'free'");
          ## row_num : 게시판에 등록된 총 게시글 수 ##
          $row_num =  $sql['bo_count_write']; 

          ## 한페이지에 보일 목록 개수 ##
          $list = 3;
          ## 한페이지당 보일 페이지 블록 개수 ##
          $block_ct = 3;

          ## block_num : 현재 페이지 블록 번호 ##
          $block_num = ceil($page/$block_ct); 
          ## block_start : 블록 시작 번호 ##
          $block_start = (($block_num - 1) * $block_ct) + 1; 
          ## block_end : 블록 마지막 번호 ##
          $block_end = $block_start + $block_ct - 1;


          ## 총 페이징 페이지 수 구하기 ##
          $total_page = ceil($row_num / $list); 
          # 마지막 페이지 번호가 총 페이징 페이지수보다 작다면 → 마지막 : 페이지번호 #
          if($block_end > $total_page) $block_end = $total_page;
          ## 총 블럭 개수 ##
          $total_block = ceil($total_page/$block_ct);
          ## 페이지 시작 번호 ##
          $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

          ## 게시판 정보를 가져오기 위한 sql문 ##
          $sql2 = "SELECT * FROM `g5_write_free` limit $start_num, $list";
          $sql2_result = sql_query($sql2);
          for($i=0; $store_row=sql_fetch_array($sql2_result); $i++){
                  echo
                  '<div class="card"style="margin:40px; max-width:30%;">
                  <img src="/theme/basic/img/'.$store_row["wr_5"].'"'.' class="card-img-top" alt="..." style="min-height:200px;">
                  <div class="card-body" style="min-height:200px;>
                    <h5 class="card-title">'.$store_row["wr_subject"].'</h5>
                    <p class="card-text">'.$store_row["wr_content"].'</p>
                  </div>
                </div>';
          }
      ?>
    </div>

    <!---페이징 넘버 --->
    <div id="page_num">
        <ul class="pagination justify-content-center">
            
            <?php if($page > 1){?> 
                <li class="page-item"><a class="page-link" href='?page=<?php echo $pre; ?>' aria-label="처음"><span aria-hidden="true">&laquo;</span></a></li>
            <?php } ?> 


            <?php for($i=$block_start; $i<=$block_end; $i++){?> 
                <?php if ($page == $i) { ?> 
                    <li class='on page-item'><a class="page-link" href="#"><?php echo $i; ?></a></li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" href='?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                <?php } ?>
            <?php } ?>


            <?php if($block_num < $total_block){  
                    $next = $page + 1; ?>
                    <li class="page-item"><a class="page-link" href='?page=<?php echo $next ?>' aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
            <?php } ?>
            <?php if($page < $total_page){ ?> 
                <li class="page-item"><a class="page-link" href='?page=<?php echo $total_page ?>'aria-label="마지막"><span aria-hidden="true">&raquo;</span></a></li>
            <?php } ?> 

        </ul>
    </div>
      <?php
        if(isset($_GET['pages'])){
        $pages = $_GET['pages']; 
        }else{
            $pages = 1;
        }

        $sql3 = sql_fetch("select bo_count_write from $g5[board_table] where bo_table = 'free'");
        $row_nums =  $sql3['bo_count_write']; 

        $lists = 1;
        $block_cts = 3;

        $block_nums = ceil($pages/$block_cts); 
        $block_starts = (($block_nums - 1) * $block_cts) + 1; 
        $block_ends = $block_starts + $block_cts - 1;

        $total_pages = ceil($row_nums / $lists); 
        if($block_ends > $total_pages) $block_ends = $total_pages;
        $total_blocks = ceil($total_pages/$block_cts);
        $start_nums = ($pages-1) * $lists;

        $sql4 = "SELECT * FROM `g5_write_free` limit $start_nums, $lists";
        $sql4_result = sql_query($sql4);
        for($i=0; $store_rows=sql_fetch_array($sql4_result); $i++){
          echo 
          '<div style="margin:5%; position: relative;">
            <div class="card" style="width: 18rem; display:inline-block; margin-bottom:100px;margin-right:20%;">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="/theme/basic/img/'.$store_rows["wr_5"].'"'.' class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="/theme/basic/img/'.$store_rows["wr_5"].'"'.' class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="/theme/basic/img/'.$store_rows["wr_5"].'"'.' class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">'.$store_rows["wr_content"].'</p>
              </div>
            </div>
            <div class="card bg-light mb-3" style="position:absolute; top:0; max-width: 40rem; min-width:600px; height:20rem; display: inline-block;">
              <div class="card-header">'.$store_rows["wr_subject"].'</div>
              <div class="card-body">
                <p class="card-text">진행기간 : '.$store_rows["wr_1"].' <br><br>참여인원 : '.$store_rows["wr_2"].' <br><br>사용언어 : '.$store_rows["wr_3"].'<br><br>개발환경 : '.$store_rows["wr_4"].'</p>
              </div>
            </div>
          </div>'
          ; } ?>
        <!---페이징 넘버 --->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
              <?php for($j=$block_starts; $j<=$block_ends; $j++){ ?>
                    <li data-target="#carouselExampleIndicators" style="background-color:black;" data-slide-to="<?php echo $j; ?>" class="active"><a href='?pages=<?php echo $j ?>' aria-label="Next"></a></li>
                 <?php } ?>
          </ul>
      </div>      
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');