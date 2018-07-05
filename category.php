<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/car/inc/header.php'?>
        <!-- Get in touch-->
<?php
  $reseat = '';
      if(isset($_GET['seat'])){
        $reseat = '&seat='.$seat;
      }
  $adcar      = $_GET['adfrom'];
  $adto       = $_GET['adto'];
  $queryTSD   = "SELECT COUNT(*) as TSD FROM car WHERE address = '{$adcar}' AND active = 1".$reseat;
  $resultTSD  = $mysqli->query($queryTSD);
  $arTmp      = mysqli_fetch_assoc($resultTSD);
  //Tổng dòng
  $tongDong   = $arTmp['TSD'];
  $row_count  = ROW_COUNT5;
  //Tổng trang
  $tongTrang  = ceil($tongDong/$row_count);
  //Trang hiện tại
  $current_page = 1;
  if(isset($_GET['page'])){
    $current_page = $_GET['page'];
  }
  //offset
  $offset = ($current_page - 1) * $row_count;
?>
              <style>
                .forcar{
                  width:100px;height:70px;color:#f64512;opacity: 0.5;text-align: center;font-size: 40px;
                }
                .forcar:hover{
                  opacity: 1;
                }
                .location{
                  background: url('/templates/car/images/location1.png') no-repeat left center;
                  background-size: 30px 30px;
                  padding-left:40px;
                }
                .seat{
                  background: url('/templates/car/images/seat.png') no-repeat left center;
                  background-size: 30px 30px;
                  padding-left:40px;
                }
                .wifi{
                  background: url('/templates/car/images/wifi.png') no-repeat left center;
                  background-size: 30px 30px;
                  padding-left:40px;
                }
                .page-active{
                   color:#333;border:1px solid #333;background-color:white;padding: 3px 5px;margin:5px;
                }
                .tpage{
                  color:white;border:1px solid;background-color:#333;padding: 3px 5px;margin:5px;
                }
              </style>

<?php
  $query  = "SELECT * FROM trip ORDER BY id DESC";
  if(isset($_GET['adfrom']) && isset($_GET['adto']) && isset($_GET['rentdate']) && isset($_GET['renttime'])){
    $address_from = $_GET['adfrom'];
    $address_to   = $_GET['adto'];
    $rent_date    = $_GET['rentdate'];
    $rent_time    = $_GET['renttime'];
  }else{
    header('location:/');
  }
  if(isset($_POST['submit'])){
    $rent_time   = $_POST['giothue'];
    $rent_date = $_POST['ngaythue'];
    header("location:/category.php?adfrom={$address_from}&adto={$address_to}&rentdate={$rent_date}&renttime={$rent_time}");
  }

  // Lấy xe theo số chỗ
  $url4 = "/category.php?seat=4&adfrom={$address_from}&adto={$address_to}&rentdate={$rent_date}&renttime={$rent_time}";
  $url7 = "/category.php?seat=7&adfrom={$address_from}&adto={$address_to}&rentdate={$rent_date}&renttime={$rent_time}";
  $url16 = "/category.php?seat=16&adfrom={$address_from}&adto={$address_to}&rentdate={$rent_date}&renttime={$rent_time}";
  $url25 = "/category.php?seat=25&adfrom={$address_from}&adto={$address_to}&rentdate={$rent_date}&renttime={$rent_time}";
  
  // Viết lại ngày:
  $redate   = date("Y-m-d", strtotime($rent_date));
  echo $redate;

    // query bình thường
    $query      = "SELECT * FROM trip WHERE address_from = '{$address_from}' AND address_to = '{$address_to}' AND rentdate = '{$redate}' AND active = 1 ORDER BY id DESC LIMIT 5";
    
    if(isset($_GET['seat'])){
      $seat = $_GET['seat'];
      if($seat == 4){
        $reseat = 'seat <= 5 AND';
      }elseif($seat == 7){
        $reseat = 'seat < 8 AND seat >5 AND';
      }elseif($seat == 16){
        $reseat = 'seat < 17 AND seat >= 8 AND';
      }else{
        $reseat = 'seat >= 17 AND';
      }
      $query      = "SELECT * FROM trip WHERE address_from = '{$address_from}' AND address_to = '{$address_to}' AND rentdate = '{$redate}' AND ".$reseat." active = 1 ORDER BY id DESC LIMIT 5";
      echo $query;
    }
      
      $result   = $mysqli->query($query);
?>
        <section class="section-lg-top-100 section-md-bottom-90 section-lg-bottom-80">
          <div class="box box-lg section-relative shadow-drop-md text-left">
            <div class="box-lg-body section-70 section-md-top-34 section-md-bottom-34 bg-alabaster" style="background-color: #f0f0f0">

              <div id="slide">
                  <div class="pipe" style="height: 300px">
                    <div class="anchor" id="id_anchor"></div>
                    <div class="content" id="id_content">
                      <form style="background-color: white;" action="" method="post">
                      <div style="border: 3px solid #f0f0f0">
                        <label style="padding:10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Chỗ ngồi:</label>
                        <div style="margin:6px 16px">
                          <!--Select 2-->

                          <a href="<?php echo $url4?>"><input style="background: url('/templates/car/images/car4.png') no-repeat center center;background-size: 100px 70px;margin: 5px 14px" class="forcar" type="button" name="4" value="" /></a>

                          <a href="<?php echo $url7?>"><input style="background: url('/templates/car/images/car7.png') no-repeat center center;background-size: 100px 70px;margin: 5px 14px" class="forcar" type="button" name="7" value="" /></a>

                          <a href="<?php echo $url16?>"><input style="background: url('/templates/car/images/car16.png') no-repeat center center;background-size: 100px 70px;margin: 5px 14px" class="forcar" type="button" name="16" value="" /></a>

                          <a href="<?php echo $url25?>"><input style="background: url('/templates/car/images/car25.png') no-repeat center center;background-size: 100px 70px;margin: 5px 14px" class="forcar" type="button" name="25" value="" /></a>
                        
                        </div>
                      </div>
                      <div style="border: 3px solid #f0f0f0">
                          <!--Select 2-->
                          <label style="padding:10px 10px 5px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Nơi đi:</label>
                          <input type="text" readonly required style="font-size:22px;border:none;border-bottom:1px solid #999999;width: 90%;text-align: left;padding-left: 35px;display: inline;margin-left: 15px;margin-bottom:10px;background: url('/templates/car/images/placeholder.png') no-repeat left center;background-size: 30px 30px;color:black" value="<?php echo $address_from?>" >

                          <!--Select 2-->
                          <label style="padding:10px 10px 5px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Nơi đến:</label>
                          <input type="text" readonly required style="font-size:22px;border:none;border-bottom:1px solid #999999;width: 90%;text-align: left;padding-left: 35px;display: inline;margin-left: 15px;margin-bottom:10px;background: url('/templates/car/images/placeholder.png') no-repeat left center;background-size: 30px 30px;color:black" value="<?php echo $address_to?>" >

                          <!--Select 2-->
                          <label style="padding:10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Ngày giờ thuê:</label>
                          
                             <input name="ngaythue" type="text" data-time-picker="date" required style="border:none;border-bottom:1px solid #999999;width: 60%;text-align: right;display: inline;margin-left: 15px;background: url('/templates/car/images/calendar.png') no-repeat left center;font-size:16px;background-size: 30px 30px;color:black" value="<?php echo $rent_date?>" >
                             
                             <input name="giothue" min=1 max=24 type="number" style="border:none;border-bottom:1px solid #999999;font-size:20px;width: 70px;text-align: right;display: inline;margin-left: 20px;background: url('/templates/car/images/clock.png') no-repeat left center;background-size: 30px 30px;color:black" value="<?php echo $rent_time?>" required />
    
                              <button type="submit" name="submit" class="btn btn-primary offset-top-20 offset-md-top-45 hehe" style="margin: 10px 35%">Tìm</button>
                        </div>
                      </form>
                    </div>
                  </div>
<?php
  while ($arTrip = mysqli_fetch_assoc($result)) {
    $tid   = $arTrip['id'];
    $name  = $arTrip['name'];
    $img   = $arTrip['picture'];
    $tUrl  = '/templates/car/images/' . $img;
    $fcar  = $arTrip['address_from'];
    $dfcar = $arTrip['detail_from'];
    $tcar  = $arTrip['address_to'];
    $dtcar = $arTrip['detail_to'];
    $cost  = $arTrip['cost'];
    $recost = number_format($cost,0,',','.');
    $ftime = $arTrip['renttime'];
    $fdate = $arTrip['rentdate'];
    $redate = date("d-m-Y", strtotime($fdate));
?>
                  <div class="range range-xs-center offset-top-60 offset-lg-top-70" style="padding-left:20px">
                    <div class="range range-xs-center offset-top-60 offset-lg-top-70" style="padding: 10px;margin-top:20px;background-color: white">
                      <div class="cell-md-3 cell-lg-4">
                        <a href="/single.php?tid=<?php echo $tid?>&rentdate=<?php echo $rent_date?>&renttime=<?php echo $rent_time?>&adfrom=<?php echo $address_from?>&adto=<?php echo $address_to?>&cost=<?php echo $cost?>"><img style="width:350px;height: 200px" src="<?php echo $tUrl?>" width="370" height="266" alt="" class="img-responsive veil-sm reveal-md-inline-block"></a>
                    </div>
                    <div class="cell-sm-6 cell-md-5 text-left">
                      <h4 style="font-family:'TimesNewRoman',sans-serif;padding-left: 5px;font-weight:bold" class="text-regular offset-top-10"><a class="title" href='' style="color:"><?php echo $name?></a></h4>
                    
                    <div class="range offset-top-5" style="padding-left: 5px;color:#ff9b37">
                      <div class="cell-xs-5">
                        <p class="text-big-25" style="font-family:'TimesNewRoman',sans-serif"><?php echo $fcar?></p>
                      </div>
                      <div class="cell-xs-2" style="background: url('/templates/car/images/right.png') no-repeat center center;background-size:30px 30px">
                        <p></p>
                      </div>
                      <div class="cell-xs-5 offset-top-5 offset-xs-top-0">
                        <p class="text-big-25" style="font-family:'TimesNewRoman',sans-serif"><?php echo $tcar?></p>
                      </div>
                    </div>
                    <div class="range offset-top-5" style="padding-left: 5px;color:black">
                      <div class="cell-xs-12">
                        <p class="text-big-25" style="font-size:18px">Bắt đầu đi từ: <?php echo $ftime?> ngày <?php echo $redate?></p>
                      </div>
                    </div>
                  
                    <div class="range offset-top-5">
                      <div class="cell-xs-7">
                        <p class="text-big-25 location"><?php echo $dfcar?></p>
                      </div>
                      <div class="cell-xs-5 offset-top-5 offset-xs-top-0">
                        <p class="text-big-25 seat">Chỗ ngồi: 4</p>
                      </div>
                    </div>
                    <div class="range offset-top-5">
                      <div class="cell-xs-7">
                        <p class="text-big-25 location"><?php echo $dtcar?></p>
                      </div>
                      <div class="cell-xs-5 offset-top-5 offset-xs-top-0">
                        <p class="text-big-25 wifi">Wifi</p>
                      </div>
                    </div>
                  </div>
                  <div class="cell-sm-4 cell-md-3 cell-lg-3 text-sm-right">
                    <div class="offset-lg-top-14" style="height: 30px">
                    </div>
                    <h4 style="text-align:center;font-family:'TimesNewRoman',sans-serif" class="text-primary offset-top-5 text-regular"><?php echo $recost.' VND'?></h4>
                    <a href="/single.php?tid=<?php echo $tid?>&rentdate=<?php echo $rent_date?>&renttime=<?php echo $rent_time?>&adfrom=<?php echo $address_from?>&adto=<?php echo $address_to?>&cost=<?php echo $cost?>" class="btn btn-primary offset-top-20" style="margin:10px 50px;font-family:'TimesNewRoman',sans-serif">Chi Tiết</a>
                  </div>
                </div>
                </div>
<?php
  }
?>
              </div>
            </div>
          </div>
<?php
  for($i=1;$i<$tongTrang;$i++){
    if($i == $current_page){
      
?>
            <span class="page-active"><?php echo $current_page?></span>
<?php
    }else{
        $urlpage = "/category.php?adfrom={$address_from}&adto={$address_to}&rentdate={$rent_date}&renttime={$rent_time}".'&page='.$i.$reseat;
?>
            <a class="tpage" href="<?php echo $urlpage?>"><?php echo $i?></a>
<?php
    }
  }
?>
        </section>
        <!-- We Work-->
      </main>
      <!-- Page Footer-->

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/car/inc/footer.php'?>