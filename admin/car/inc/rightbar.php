
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="row">
            <div class="right_bar">
              <div class="single_leftbar wow fadeInDown">
                <h2><span>Popular Post</span></h2>
                <div class="singleleft_inner">
                  <ul class="catg3_snav ppost_nav wow fadeInDown">
<?php
  $queryhit    = "SELECT * FROM news ORDER BY counter DESC LIMIT 8";
  $resulthit   = $mysqli->query($queryhit);
  while($arhit = mysqli_fetch_assoc($resulthit)){
    $hname     = $arhit['name'];
    $hid       = $arhit['id'];
    $hpic      = $arhit['picture'];
    $hurl      = '/templates/shareit/images/' . $hpic;
?>
                    <li>
                      <div class="media"> <a href="/detail.php?sid=<?php echo $hid?>" class="media-left"> <img alt="" src="<?php echo $hurl?>"> </a>
                        <div class="media-body"> <a href="/detail.php?sid=<?php echo $hid?>" class="catg_title"><?php echo $hname?></a></div>
                      </div>
                   </li>
<?php
  }
?>
                  </ul>
                </div>
              </div>
              <div class="single_leftbar wow fadeInDown">
                <h2><span>Side Ad</span></h2>
                <div class="singleleft_inner"> <a href="https://vinaenter.edu.vn/kien-thuc/marketing-online-6"><img alt="" src="/templates/shareit/images/262x218.jpg"></a></div>
              </div>
              <div class="single_leftbar wow fadeInDown">
              <div style="background-color:white;padding:3px;border:1px solid white;text-align:center"><a href="cat.php?cid=3">Lập trình</a></div>
                <ul class="nav nav-tabs custom-tabs" role="tablist">
<?php
  $querymax    = "SELECT * FROM cat_list WHERE id = (SELECT MAX(id) FROM cat_list WHERE parent_id != 0)";
  $resultmax   = $mysqli->query($querymax);
  $armax       = mysqli_fetch_assoc($resultmax);
  $namemax     = $armax['name'];
  $idmax       = $armax['id'];
?>
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo $namemax?></a></li>
<?php
  $querycenter    = "SELECT * FROM cat_list WHERE id != (SELECT MIN(id) FROM cat_list WHERE parent_id != 0) AND id != (SELECT MAX(id) FROM cat_list WHERE parent_id != 0) AND parent_id != 0";
  $resultcenter   = $mysqli->query($querycenter);
  $arcenter       = mysqli_fetch_assoc($resultcenter);
  $namecenter     = $arcenter['name'];
  $idcenter       = $arcenter['id'];
?>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $namecenter?></a></li>
<?php
  $querymin    = "SELECT * FROM cat_list WHERE id = (SELECT MIN(id) FROM cat_list WHERE parent_id != 0)";
  $resultmin   = $mysqli->query($querymin);
  $armin       = mysqli_fetch_assoc($resultmin);
  $namemin     = $armin['name'];
  $idmin       = $armax['id'];
?>
                  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?php echo $namemin?></a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="home">
                    <ul class="catg3_snav ppost_nav wow fadeInDown">
<?php
  $queryli1     = "SELECT * FROM news WHERE cat_id = {$idmax} ORDER BY id DESC LIMIT 6";
  $resultli1    = $mysqli->query($queryli1);
  while ($arli1 = mysqli_fetch_assoc($resultli1)) {
    $nameli1    = $arli1['name'];
    $idli1      = $arli1['id'];
    $picli1     = $arli1['picture'];
    $urlli1     = '/templates/shareit/images/' . $picli1;
?>
                      <li>
                        <div class="media"> <a class="media-left" href="/detail.php?sid=<?php echo $idli1?>"> <img src="<?php echo $urlli1?>" alt=""> </a>
                          <div class="media-body"> <a class="catg_title" href="/detail.php?sid=<?php echo $idli1?>"><?php echo $nameli1?></a></div>
                        </div>
                     </li>
<?php
  }
?>
                    </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="profile">
                    <ul class="catg3_snav ppost_nav wow fadeInDown">
<?php
  $queryli2     = "SELECT * FROM news WHERE cat_id = {$idcenter} ORDER BY id DESC LIMIT 6";
  $resultli2    = $mysqli->query($queryli2);
  while ($arli2 = mysqli_fetch_assoc($resultli2)) {
    $nameli2    = $arli2['name'];
    $idli2      = $arli2['id'];
    $picli2     = $arli2['picture'];
    $urlli2     = '/templates/shareit/images/' . $picli2;
?>
                      <li>
                        <div class="media"> <a class="media-left" href="/detail.php?sid=<?php echo $idli2?>"> <img src="<?php echo $urlli2?>" alt=""> </a>
                          <div class="media-body"> <a class="catg_title" href="/detail.php?sid=<?php echo $idli2?>"><?php echo $nameli2?></a></div>
                        </div>
                     </li>
<?php
  }
?>
                    </ul>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="messages">
                    <ul class="catg3_snav ppost_nav wow fadeInDown">
<?php
  $queryli3     = "SELECT * FROM news WHERE cat_id = 4 ORDER BY id DESC LIMIT 6";
  $resultli3    = $mysqli->query($queryli3);
  while ($arli3 = mysqli_fetch_assoc($resultli3)) {
    $nameli3    = $arli3['name'];
    $idli3      = $arli3['id'];
    $picli3     = $arli3['picture'];
    $urlli3     = '/templates/shareit/images/' . $picli3;
?>
                      <li>
                        <div class="media"> <a class="media-left" href="/detail.php?sid=<?php echo $idli3?>"> <img src="<?php echo $urlli3?>" alt=""> </a>
                          <div class="media-body"> <a class="catg_title" href="/detail.php?sid=<?php echo $idli3?>"><?php echo $nameli3?></a></div>
                        </div>
                     </li>
<?php
  }
?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single_leftbar wow fadeInDown">
                <h2><span>Labels</span></h2>
                <div class="singleleft_inner">
                  <ul class="label_nav">
                    <li><a href="cat.php?label=Dev Day">Devday</a></li>
                    <li><a href="cat.php?label=java">Java</a></li>
                    <li><a href="cat.php?label=php">PHP</a></li>
                    <li><a href="cat.php?label=Công Nghệ">Công nghệ</a></li>
                    <li><a href="cat.php?label=iphone">Iphone</a></li>
                    <li><a href="cat.php?label=microsoft">Microsoft</a></li>
                    <li><a href="cat.php?label=marketing">Marketing</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
