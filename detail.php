<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/car/inc/header.php'?>
        <!-- Get in touch-->
              <style>
                body {
                  font-family: Arial;
                }

                /* Style the tab */
                .tablinks{
                }
                .tab {
                  overflow: hidden;
                  border: 4px solid #f64512;
                  background-color: #27292f;
                  display: inline;
                  color: #f64512;
                  position: absolute;
                  border-radius: 50px;
                }

                /* Style the buttons inside the tab */

                .tab a {
                  background-color: #27292f;
                  float: left;
                  border: none;
                  outline: none;
                  cursor: pointer;
                  padding: 10px 16px;
                  transition: 0.3s;
                  font-size: 17px;
                  text-align: center;
                }

                /* Change background color of buttons on hover */

                .tab a:hover {
                  background-color: white;
                }

                /* Create an active/current tablink class */

                .tab a.active {
                  background-color: white;
                }

                /* Style the tab content */

                .tabcontent {
                  display: none;
                  padding: 6px 12px;
                }
                .forcar{
                  width:100px;height:70px;color:#f64512;opacity: 0.5;text-align: center;font-size: 40px;
                }
                .forcar:hover{
                  opacity: 1;
                }
              </style>
<?php
    if(isset($_GET['cid'])  && isset($_GET['ngaythue']) && isset($_GET['giothue']) && isset($_GET['ngaytra']) && isset($_GET['giotra']) && isset($_GET['noithue']) && isset($_GET['noitra']) & isset($_GET['tongtien'])){
        $cid        = $_GET['cid'];
        $ngaythue   = $_GET['ngaythue'];
        $giothue    = $_GET['giothue'];
        $ngaytra    = $_GET['ngaytra'];
        $giotra     = $_GET['giotra'];
        $noithue     = $_GET['noithue'];
        $noitra     = $_GET['noitra'];
        $tongtien   = $_GET['tongtien'];
      }else{
        header('location:/');
      }
        $queryShow  = "SELECT * FROM car WHERE id = {$cid}";
        $resultShow = $mysqli->query($queryShow);
        $arShow     = mysqli_fetch_assoc($resultShow);
          $cname      = $arShow['name'];
          $cmodel     = $arShow['model'];
          $cfuel      = $arShow['fuel'];
          $cseat      = $arShow['seat'];
          $cmeter     = $arShow['meter'];
          $cpet       = $arShow['pet'];
          $csmoke     = $arShow['smoke'];
          $cpicture   = $arShow['picture'];
          $cpreview   = $arShow['preview'];
          $dcost      = $arShow['datecost'];
          $hcost      = $arShow['hourcost'];
          $chopso     = $arShow['hopso'];
          $caddress   = $arShow['address'];
          $cgps       = $arShow['GPS'];
          $cmaylanh   = $arShow['maylanh'];
          $curl       = '/templates/car/images/'. $cpicture;
?>
        <section class="section-lg-top-100 section-md-bottom-90 section-lg-bottom-80">
          <div class="box box-lg section-relative shadow-drop-md text-left">
            <div class="box-lg-header bg-gray-darker context-dark section-50 section-md-75">
              <h4 style="text-align:center;font-family:timesnewroman">TRANG CHI TIẾT XE</h4>
            </div>
            <div class="box-lg-body section-70 section-md-top-34 section-md-bottom-34 bg-alabaster">
              <div id="slide">
                  <div class="pipe" style="height: 1438px;background-color: #f0f0f0">
                    <div class="anchor" id="id_anchor"></div>
                    <div class="content" id="id_content">
                      <form style="background-color: white;" action="" method="post">
                      <div style="border: 3px solid #f0f0f0">
                          <h3 style="font-size:30px;text-align:center;padding:20px">Thông tin thuê</h3>
                          <!--Select 2-->
<?php
  if(isset($_POST['submit'])){
    $tel  = $_POST['tel'];
    if(isset($_GET['noiden']) &&  $_GET['noiden'] != ""){
      $noiden = $_GET['noiden'];
      header("location:/rent.php?cid={$cid}&pickdate={$ngaythue}&renttime={$giothue}&adcar={$noithue}&tel={$tel}&adto={$noiden}");
      
    }else{
      header("location:/rent.php?cid={$cid}&pickdate={$ngaythue}&pickdrop={$ngaytra}&renttime={$giothue}&rentreturn={$giotra}&adcar={$noithue}&tel={$tel}");
    }
  }
?>
                          <div style="padding:10px 10px 15px 0px;height: 85px">
                            <div style="width: 50%;float: left;">
                              <label style="padding:10px 10px 5px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Nơi thuê:</label>
                              <input type="text" readonly required style="font-size:18px;border:none;border-bottom:1px solid #999999;width: 90%;text-align: left;padding-left: 35px;display: inline;margin-left: 15px;margin-bottom:10px;background: url('/templates/car/images/placeholder.png') no-repeat left center;background-size: 30px 30px;color:black" readonly value="<?php echo $noithue?>" >
                            </div>
                            <div style="width: 50%;float: left;">
                              <label style="padding:10px 10px 5px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Nơi trả:</label>
                              <input type="text" readonly required style="font-size:18;border:none;border-bottom:1px solid #999999;width: 90%;text-align: left;padding-left: 35px;display: inline;margin-left: 15px;margin-bottom:10px;background: url('/templates/car/images/placeholder.png') no-repeat left center;background-size: 30px 30px;color:black" readonly value="<?php echo $noitra?>" >
                            </div>
                          </div>
                          <!--Select 2-->
                          <div style="margin-top: 10px">
                            <label style="padding:10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Ngày giờ thuê:</label>
                          
                               <input name="ngaythue" type="text" name="pickup-date" required style="border:none;border-bottom:1px solid #999999;width: 55%;text-align: right;display: inline;margin-left: 15px;background: url('/templates/car/images/calendar.png') no-repeat left center;font-size:16px;background-size: 30px 30px;color:black" value="<?php echo $ngaythue?>" readonly >
                               
                               <input name="giothue" type="text" style="border:none;border-bottom:1px solid #999999;font-size:20px;width: 80px;text-align: right;display: inline;margin-left: 20px;background: url('/templates/car/images/clock.png') no-repeat left center;background-size: 30px 30px;color:black" value="<?php echo $giothue.':00'?>" readonly />
                          </div>    
                          
                          <!--Select 2-->
                          <div>
                            <label style="padding:20px 10px 10px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Ngày giờ trả:</label>
                            
                               <input name="ngaytra" type="text" name="pickup-date" data-time-picker="date" required style="border:none;border-bottom:1px solid #999999;width: 55%;text-align: right;display: inline;margin-left: 15px;background: url('/templates/car/images/calendar.png') no-repeat left center;font-size:16px;background-size: 30px 30px;color:black" value="<?php echo $ngaytra?>" readonly >
                               
                               <input type="text" name="giotra" value="<?php echo $giotra.':00'?>" style="border:none;border-bottom:1px solid #999999;font-size:20px;width: 80px;text-align: right;display: inline;margin-left: 20px;background: url('/templates/car/images/clock.png') no-repeat left center;background-size: 30px 30px;color:black" readonly />
                          </div>
                          <div>
                            <label style="padding:30px 10px 10px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Giá tiền/Giờ: <span style="color:#666"><?php echo number_format($hcost,0,',','.') . ' VNĐ'?></span></label>
                            <label style="padding:10px 10px 10px 10px;margin-left:10px;display:block;color:#f64512;font-size:18px" name="address-car" class="form-custom-label form-custom-label-outside hehe">Tổng tiền: <span style="color:#666"><?php echo number_format($tongtien,0,',','.') . ' VNĐ'?></span></label>
                            <label style="font-size:18px;margin-left:10px;padding:10px 10px 10px 10px;color:#f64512">Số điện thoại:</label>
                            <input type="tel" placeholder="Nhập số điện thoại" required style="float:right;width:150px;margin-right:10px" name="tel">
                          </div>
                            <button href="/" type="submit" name="submit" class="btn btn-primary offset-top-20 offset-md-top-45 hehe" style="margin: 10px 30%" />Đặt ngay</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
                <div class="range range-xs-center offset-top-60 offset-lg-top-70">

                    <div class="col-md-12 col-sm-12" style="padding: 50px">
                        <img style="height:500px" width="100%" src="<?php echo $curl?>" />
                        <h4 style="font-family:'TimesNewRoman';text-align:center;text-transform:uppercase;" class="text-regular offset-top-10"><?php echo $cname?></h4>
                    </div>
                </div>
                <div class="cell-md-3 cell-lg-6">
                </div>
                  <h4 style="font-family:'TimesNewRoman';text-align:center;color:#f64512" class="text-regular offset-top-10">Đặc tính kĩ thuật</h4>
                <div class="range range-xs-center offset-top-60 offset-lg-top-70">
                  <div class="cell-md-3 cell-lg-6">
                    
                    <table style="margin: 0px 50px" width="350px" class="text-regular offset-top-10">
                        <tr>
                            <td style="color:black">Năm SX:</td>
                            <td style="text-align:right"><?php echo $cmodel?></td>
                        </tr>
                        <tr>
                            <td style="color:black">Động cơ:</td>
                            <td style="text-align:right"><?php echo $cfuel?></td>
                        </tr>
                        <tr>
                            <td style="color:black">Công tơ mét(km):</td>
                            <td style="text-align:right"><?php echo $cmeter?></td>
                        </tr>
                        <tr>
                            <td style="color:black">GPS:</td>
                            <td style="text-align:right"><?php if($cgps == 1){ echo 'Có';}else{echo 'Không';}?></td>
                        </tr>
                    </table>
                </div>
                  <div class="cell-sm-6 cell-md-6 text-left">
                    <table style="margin: 5px 50px" width="350px" class="text-regular offset-top-10">
                        <tr>
                            <td style="color:black">Chỗ ngồi:</td>
                            <td style="text-align:right"><?php echo $cseat?></td>
                        </tr>
                        <tr>
                            <td style="color:black">Hộp số:</td>
                            <td style="text-align:right"><?php echo $chopso?></td>
                        </tr>
                        <tr>
                            <td style="color:black">Tiêu thụ(km/lít):</td>
                            <td style="text-align:right">60</td>
                        </tr>
                        <tr>
                            <td style="color:black">Kiểu dáng:</td>
                            <td style="text-align:right"><?php if($cseat <= 16){echo 'Gọn nhẹ';}else{echo 'Xe lớn, rộng';}?></td>
                        </tr>
                    </table>
                  </div>
                  <h4 style="font-family:'TimesNewRoman';text-align:center;color:#f64512" class="text-regular offset-top-10">Tiện ích và phụ kiện</h4>
                <div class="range range-xs-center offset-top-60 offset-lg-top-70">
                    <div class="col-md-4 col-sm-12">
                        <div class="car_option" style="margin-left:15%">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                            <path d="M15.3356953,15.7775938 L13.7320508,13 L16.9393398,13 L19.4696699,15.5303301 C19.7625631,15.8232233 20.2374369,15.8232233 20.5303301,15.5303301 C20.8232233,15.2374369 20.8232233,14.7625631 20.5303301,14.4696699 L19.0606602,13 L21,13 C21.5522847,13 22,12.5522847 22,12 C22,11.4477153 21.5522847,11 21,11 L19.0606602,11 L20.5303301,9.53033009 C20.8232233,9.23743687 20.8232233,8.76256313 20.5303301,8.46966991 C20.2374369,8.1767767 19.7625631,8.1767767 19.4696699,8.46966991 L16.9393398,11 L13.7320508,11 L15.3356953,8.22240623 L18.7921905,7.29624114 C19.1922901,7.18903478 19.4297269,6.77778206 19.3225206,6.37768249 C19.2153142,5.97758291 18.8040615,5.74014604 18.4039619,5.8473524 L16.3963555,6.38528892 L17.3660254,4.70577137 C17.6421678,4.22747874 17.4782926,3.61588834 17,3.33974596 C16.5217074,3.06360359 15.910117,3.22747874 15.6339746,3.70577137 L14.6643047,5.38528892 L14.1263682,3.37768249 C14.0191618,2.97758291 13.6079091,2.74014604 13.2078095,2.8473524 C12.8077099,2.95455876 12.5702731,3.36581148 12.6774794,3.76591105 L13.6036445,7.22240623 L12,10 L10.3963555,7.22240623 L11.3225206,3.76591105 C11.4297269,3.36581148 11.1922901,2.95455876 10.7921905,2.8473524 C10.3920909,2.74014604 9.9808382,2.97758291 9.87363184,3.37768249 L9.33569532,5.38528892 L8.3660254,3.70577137 C8.08988303,3.22747874 7.47829262,3.06360359 7,3.33974596 C6.52170738,3.61588834 6.35783222,4.22747874 6.6339746,4.70577137 L7.60364451,6.38528892 L5.59603807,5.8473524 C5.19593849,5.74014604 4.78468578,5.97758291 4.67747942,6.37768249 C4.57027306,6.77778206 4.80770993,7.18903478 5.2078095,7.29624114 L8.66430468,8.22240623 L10.2679492,11 L7.06066017,11 L4.53033009,8.46966991 C4.23743687,8.1767767 3.76256313,8.1767767 3.46966991,8.46966991 C3.1767767,8.76256313 3.1767767,9.23743687 3.46966991,9.53033009 L4.93933983,11 L3,11 C2.44771525,11 2,11.4477153 2,12 C2,12.5522847 2.44771525,13 3,13 L4.93933983,13 L3.46966991,14.4696699 C3.1767767,14.7625631 3.1767767,15.2374369 3.46966991,15.5303301 C3.76256313,15.8232233 4.23743687,15.8232233 4.53033009,15.5303301 L7.06066017,13 L10.2679492,13 L8.66430468,15.7775938 L5.2078095,16.7037589 C4.80770993,16.8109652 4.57027306,17.2222179 4.67747942,17.6223175 C4.78468578,18.0224171 5.19593849,18.259854 5.59603807,18.1526476 L7.60364451,17.6147111 L6.6339746,19.2942286 C6.35783222,19.7725213 6.52170738,20.3841117 7,20.660254 C7.47829262,20.9363964 8.08988303,20.7725213 8.3660254,20.2942286 L9.33569532,18.6147111 L9.87363184,20.6223175 C9.9808382,21.0224171 10.3920909,21.259854 10.7921905,21.1526476 C11.1922901,21.0454412 11.4297269,20.6341885 11.3225206,20.2340889 L10.3963555,16.7775938 L12,14 L13.6036445,16.7775938 L12.6774794,20.2340889 C12.5702731,20.6341885 12.8077099,21.0454412 13.2078095,21.1526476 C13.6079091,21.259854 14.0191618,21.0224171 14.1263682,20.6223175 L14.6643047,18.6147111 L15.6339746,20.2942286 C15.910117,20.7725213 16.5217074,20.9363964 17,20.660254 C17.4782926,20.3841117 17.6421678,19.7725213 17.3660254,19.2942286 L16.3963555,17.6147111 L18.4039619,18.1526476 C18.8040615,18.259854 19.2153142,18.0224171 19.3225206,17.6223175 C19.4297269,17.2222179 19.1922901,16.8109652 18.7921905,16.7037589 L15.3356953,15.7775938 L15.3356953,15.7775938 Z" fill="black"></path>
                            </g>
                            </svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            Điều hòa nhiệt độ
                            </font></font>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="car_option">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                        <path d="M14.25,18 L13,18 L13,16 L11.9953976,16 C11.4456547,16 11,15.5525106 11,15.0014977 L11,3.99850233 C11,3.44704472 11.4556644,3 11.9953976,3 L21.0046024,3 C21.5543453,3 22,3.44748943 22,3.99850233 L22,15.0014977 C22,15.5529553 21.5443356,16 21.0046024,16 L17,16 L17,18 L15.75,18 C15.75,20.6233526 13.6233526,22.75 11,22.75 C8.37664744,22.75 6.25,20.6233526 6.25,18 L6.25,14 C6.25,12.2050746 4.79492544,10.75 3,10.75 L1,10.75 L1,9.25 L3,9.25 C5.62335256,9.25 7.75,11.3766474 7.75,14 L7.75,18 C7.75,19.7949254 9.20507456,21.25 11,21.25 C12.7949254,21.25 14.25,19.7949254 14.25,18 L14.25,18 Z M15,14 C16.1045695,14 17,13.1045695 17,12 L17,7 L20,7 L20,5 L16,5 L16,10.27 C15.71,10.1 15.36,10 15,10 C13.8954305,10 13,10.8954305 13,12 C13,13.1045695 13.8954305,14 15,14 L15,14 Z" fill="black"></path>
                        </g>
                        </svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Đầu vào âm thanh / iPod
                        </font></font></div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="car_option" style="margin-left:15%">
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                                    <path d="M16,9 L16,7 L12,7 L12,12.5 C11.58,12.19 11.07,12 10.5,12 C9.11928813,12 8,13.1192881 8,14.5 C8,15.8807119 9.11928813,17 10.5,17 C11.8807119,17 13,15.8807119 13,14.5 L13,9 L16,9 L16,9 Z M12,2 C14.6521649,2 17.195704,3.0535684 19.0710678,4.92893219 C20.9464316,6.80429597 22,9.3478351 22,12 C22,17.5228475 17.5228475,22 12,22 C9.3478351,22 6.80429597,20.9464316 4.92893219,19.0710678 C3.0535684,17.195704 2,14.6521649 2,12 C2,9.3478351 3.0535684,6.80429597 4.92893219,4.92893219 C6.80429597,3.0535684 9.3478351,2 12,2 L12,2 Z" fill="black"></path>
                                </g>
                            </svg><font style="padding-bottom: 5px">
                            máy nghe đĩa CD
                            </font>
                        </div>
                    </div>
                </div>
                    <h4 style="font-family:'TimesNewRoman';text-align:center;color:#f64512" class="text-regular offset-top-10">Mô tả xe</h4>
                <div class="range range-xs-center offset-top-60 offset-lg-top-70">
                    <div class="cell-md-4 cell-lg-11">
                        <p><?php echo $cpreview?></p>
                    </div>
                </div>
                    <h4 style="font-family:'TimesNewRoman';text-align:center;color:#f64512" class="text-regular offset-top-10">Điều kiện yêu cầu của công ty Hoàng Phúc</h4>
                <div class="range range-xs-center offset-top-60 offset-lg-top-70">
                    <div class="cell-md-4 cell-lg-11">
                        <ul>
                            <li>Có giấy phép lái xe tùy vào chiếc xe mà bạn đặt</li>
                            <li><?php if($csmoke == 0){ echo 'Không hút thuốc trong xe';}?></li>
                            <li><?php if($cpet == 0){ echo 'Không chở thú cưng trong xe';}?></li>
                        </ul>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- We Work-->
      </main>
      <!-- Page Footer-->
    <script>
      $(".content").hide()
    $(document).ready(function ($) {
      if ($(".content").length > 0) {
        $(window).scroll(function () {
          var e = $(window).scrollTop();
          if (e > 900 && e < 1800) {
            $(".content").show()
          }
          else {
            $(".content").hide()
          }
        });
        $(".content").click(function () {
          $('body,html').animate({
            scrollTop: 0
          })
        })
      }
    });
    </script>

  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/car/inc/footer.php'?>