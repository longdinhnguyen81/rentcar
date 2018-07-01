    <section id="contentbody">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
          <div class="row">
            <div class="left_bar">
              <div class="single_leftbar">
                <h2><span>Tin mới nhất</span></h2>
                <div class="singleleft_inner">
                  <ul class="recentpost_nav wow fadeInDown">
<?php
  $query  = "SELECT * FROM news WHERE is_slide = 1 ORDER BY id DESC LIMIT 3";
  $result = $mysqli->query($query);
  while ($arHotNews = mysqli_fetch_assoc($result)) {
    $name    = $arHotNews['name'];
    $sid     = $arHotNews['id'];
    $picture = $arHotNews['picture'];
    $url     = '/templates/shareit/images/' . $picture;
?>
                    <li><a href="/detail.php?sid=<?php echo $id?>"><img src="<?php echo $url?>" alt=""></a> <a class="recent_title" href="/detail.php?sid=<?php echo $id?>"><?php echo $name?></a></li>
<?php
  }
?>
                  </ul>
                </div>
              </div>
              <div class="single_leftbar wow fadeInDown">
                <h2><span>Side Add</span></h2>
                <div class="singleleft_inner"> <a href="https://vinaenter.edu.vn/khoa-hoc-marketing-online.html"><img src="/templates/shareit/images/150x600.jpg" alt=""></a></div>
              </div>
            </div>
          </div>
        </div>