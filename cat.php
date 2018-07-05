<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/car/inc/header.php'?>
        <!-- Get in touch-->
<?php
  $reseat = '';
      if(isset($_GET['seat'])){
        $reseat = '&seat='.$seat;
      }
  $adcar      = $_GET['adcar'];
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
                .page-active{
                   color:#333;border:1px solid #333;background-color:white;padding: 3px 5px;margin:5px;
                }
                .tpage{
                  color:white;border:1px solid;background-color:#333;padding: 3px 5px;margin:5px;
                }
              </style>
<?php
  if(isset($_GET['adcar']) && isset($_GET['adreturn']) && isset($_GET['pickdate']) && isset($_GET['pickdrop']) && isset($_GET['renttime']) && isset($_GET['rentreturn'])){
    $pickup_date = $_GET['pickdate'];
    $pickup_drop = $_GET['pickdrop'];
    $address_car = $_GET['adcar'];
    $ad_return = $_GET['adreturn'];
    $rent_time   = $_GET['renttime'];
    $rent_return = $_GET['rentreturn'];
  }else{
    header('location:/');
  }
  if(isset($_POST['submit'])){
    $pickup_date = $_POST['ngaythue'];
    $pickup_drop = $_POST['ngaytra'];
    $rent_time   = $_POST['giothue'];
    $rent_return = $_POST['giotra'];
    header("location:/cat.php?adcar={$address_car}&pickdate={$pickup_date}&pickdrop={$pickup_drop}&renttime={$rent_time}&rentreturn={$rent_return}&adreturn={$ad_return}");
  }

  // Lấy xe theo số chỗ
  $url4 = "/cat.php?seat=4&adcar={$address_car}&pickdate={$pickup_date}&pickdrop={$pickup_drop}&renttime={$rent_time}&rentreturn={$rent_return}&adreturn={$ad_return}";
  $url7 = "/cat.php?seat=7&adcar={$address_car}&pickdate={$pickup_date}&pickdrop={$pickup_drop}&renttime={$rent_time}&rentreturn={$rent_return}&adreturn={$ad_return}";
  $url16 = "/cat.php?seat=16&adcar={$address_car}&pickdate={$pickup_date}&pickdrop={$pickup_drop}&renttime={$rent_time}&rentreturn={$rent_return}&adreturn={$ad_return}";
  $url25 = "/cat.php?seat=25&adcar={$address_car}&pickdate={$pickup_date}&pickdrop={$pickup_drop}&renttime={$rent_time}&rentreturn={$rent_return}&adreturn={$ad_return}";
    // query bình thường
    $query      = "SELECT * FROM car WHERE address = '{$address_car}' AND active = 1 LIMIT {$offset},{$row_count}";
    if(isset($_GET['seat'])){
      $seat = $_GET['seat'];
      if($seat < 24){
        $query = "SELECT * FROM car WHERE address = '{$address_car}' AND active = 1 AND seat = {$seat} LIMIT {$offset},{$row_count}";
      }else{
        $query = "SELECT * FROM car WHERE address = '{$address_car}' AND active  = 1 AND seat > {$seat} LIMIT {$offset},{$row_count}";
      }
    }
      $result   = $mysqli->query($query);
?>
        <section class="section-lg-top-100 section-md-bottom-90 section-lg-bottom-80">
          <div class="box box-lg section-relative shadow-drop-md text-left">
            <div class="box-lg-body section-70 section-md-top-34 section-md-bottom-34 bg-alabaster" style="background-color: #f0f0f0">

              <div id="slide">
                  <div class="pipe" style="width: 300px">
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
                          <label style="padding:10px 10px 5px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Nơi thuê:</label>
                          <input type="text" readonly required style="font-size:22px;border:none;border-bottom:1px solid #999999;width: 90%;text-align: left;padding-left: 35px;display: inline;margin-left: 15px;margin-bottom:10px;background: url('/templates/car/images/placeholder.png') no-repeat left center;background-size: 30px 30px;color:black" value="<?php if($address_car == 'quang ngai'){ echo 'Quảng Ngãi';}else{ echo 'Đà Nẵng';}?>" >
 
                          <!--Select 2-->
                          <label style="padding:10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Ngày giờ thuê:</label>
                          
                             <input name="ngaythue" type="text" name="pickup-date" data-time-picker="date" required style="border:none;border-bottom:1px solid #999999;width: 60%;text-align: right;display: inline;margin-left: 15px;background: url('/templates/car/images/calendar.png') no-repeat left center;font-size:16px;background-size: 30px 30px;color:black" value="<?php echo $pickup_date?>" >
                             
                             <input name="giothue" min=1 max=24 type="number" name="" style="border:none;border-bottom:1px solid #999999;font-size:20px;width: 70px;text-align: right;display: inline;margin-left: 20px;background: url('/templates/car/images/clock.png') no-repeat left center;background-size: 30px 30px;color:black" value="<?php echo $rent_time?>" required />
                            
                          
                          <!--Select 2-->
                          <label style="padding:20px 10px 10px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Ngày giờ trả:</label>
                          
                             <input name="ngaytra" type="text" name="pickup-date" data-time-picker="date" required style="border:none;border-bottom:1px solid #999999;width: 60%;text-align: right;display: inline;margin-left: 15px;background: url('/templates/car/images/calendar.png') no-repeat left center;font-size:16px;background-size: 30px 30px;color:black" value="<?php echo $pickup_drop?>" >
                             
                             <input type="number" min=1 max=24 name="giotra" value="<?php echo $rent_return?>" style="border:none;border-bottom:1px solid #999999;font-size:20px;width: 70px;text-align: right;display: inline;margin-left: 20px;background: url('/templates/car/images/clock.png') no-repeat left center;background-size: 30px 30px;color:black" required />
                              <button type="submit" name="submit" class="btn btn-primary offset-top-20 offset-md-top-45 hehe" style="margin: 10px 35%">Tìm</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="range range-xs-center offset-top-60 offset-lg-top-70" style="padding-left:20px">
<?php
// -- Tìm chuyến đi --


    while ($arCar  = mysqli_fetch_assoc($result)) {
      $cid      = $arCar['id'];
      $cname    = $arCar['name'];
      $model    = $arCar['model'];
      $fuel     = $arCar['fuel'];
      $hopso    = $arCar['hopso'];
      $maylanh  = $arCar['maylanh'];
      $pet      = $arCar['pet'];
      $hourcost = $arCar['hourcost'];
      $datecost = $arCar['datecost'];
      $objcost1 = new getDateTime($pickup_date,$pickup_drop,$hourcost,$datecost,$rent_time,$rent_return);
      $tongCost = $objcost1->getCost();
      if($tongCost <= 0){
        header('location:/');
      }
      $tongTien = number_format($tongCost,0,',','.');
      $smoke    = $arCar['smoke'];
      $picture  = $arCar['picture'];
      $url      = '/templates/car/images/' . $picture;
      $preview  = $arCar['preview'];
      $picture  = $arCar['picture'];


?>
                
                <div class="range range-xs-center offset-top-60 offset-lg-top-70" style="padding: 10px;margin-top:20px;background-color: white">
                  <div class="cell-md-3 cell-lg-4"><a href="/detail.php?cid=<?php echo $cid?>"><img style="width:350px;height: 200px" src="<?php echo $url;?>" width="370" height="266" alt="" class="img-responsive veil-sm reveal-md-inline-block"></a></div>
                  <div class="cell-sm-6 cell-md-5 text-left">
                    <h4 style="font-family:'TimesNewRoman',sans-serif" class="text-regular offset-top-10"><a class="title" href='/detail.php?cid=<?php echo $cid?>&ngaythue=<?php echo $pickup_date?>&ngaytra=<?php echo $pickup_drop?>&giothue=<?php echo $rent_time?>&giotra=<?php echo $rent_return?>&noithue=<?php echo $address_car?>&noitra=<?php echo $ad_return?>&tongtien=<?php echo $tongCost?>'><?php echo $cname?></a></h4>
                    <div class="range offset-top-5">
                      <div class="cell-xs-6">
                        <p class="text-big-25"><?php echo 'Năm SX: '.$model;?></p>
                      </div>
                      <div class="cell-xs-6 offset-top-5 offset-xs-top-0">
                        <p class="text-big-25"><?php echo $hopso?></p>
                      </div>
                    </div>
                    <div class="range offset-top-5">
                      <div class="cell-xs-6">
                        <p class="text-big-25"><?php echo $fuel;?></p>
                      </div>
                      <div class="cell-xs-6 offset-top-5 offset-xs-top-0">
                        <p class="text-big-25"><?php if($maylanh == 1){ echo 'Máy lạnh: Có';}else{echo 'Máy lạnh: Không';} ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="cell-sm-4 cell-md-3 cell-lg-3 text-sm-right">
                    <div class="offset-lg-top-14">
                    </div>
                    <h4 style="text-align:center" class="text-italic text-primary offset-top-5 text-regular"><?php echo '<p style="font-size:25px;padding:5px;text-align:center">Giá tiền: </p>'.$tongTien . ' VND'?></h4>
                    <a href='/detail.php?cid=<?php echo $cid?>&ngaythue=<?php echo $pickup_date?>&ngaytra=<?php echo $pickup_drop?>&giothue=<?php echo $rent_time?>&giotra=<?php echo $rent_return?>&noithue=<?php echo $address_car?>&noiden=<?php echo $ad_return?>' class="btn btn-primary offset-top-20" style="margin:20px 70px;font-family:'TimesNewRoman',sans-serif">Chi Tiết</a>
                  </div>
                </div>
<?php
  }
?>

                </div>
              </div>
            </div>
          </div>
          <div class="pagin">
<?php
  for($i=1;$i<=$tongTrang;$i++){
    if($i == $current_page){
      
?>
            <span class="page-active" href=""><?php echo $current_page?></span>
<?php
    }else{
        $urlpage = '/cat.php?adcar='.$address_car.'&adreturn='.$ad_return.'&pickdate='.$pickup_date.'&pickdrop='.$pickup_drop.'&renttime='.$rent_time.'&rentreturn='.$rent_return.'&page='.$i.$reseat;
?>
            <a class="tpage" href="<?php echo $urlpage?>"><?php echo $i?></a>
<?php
    }
  }
?>
          </div>
        </section>
        <!-- We Work-->
      </main>
      <!-- Page Footer-->

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/car/inc/footer.php'?>