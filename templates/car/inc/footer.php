    <footer style="background: #292b31 url(/templates/car/images/background-05-1920x1100.jpg) center/cover no-repeat;" class="page-footer">
        <div class="section-top-90 section-bottom-90 section-md-top-20 section-md-bottom-150">
          <div class="range range-xs-center text-left">
            <div class="cell-xs-3 cell-sm-4 cell-md-4">
              <h5 class="text-regular text-primary" style="text-align:center">Trợ giúp</h5>
              <!-- List-->
              <table style="margin:20px;color: white" class="text-small-15 offset-top-10 offset-md-top-20">
                <tr style="height:40px">
                  <th width="50%">
                    Hot line:
                  </th>
                  <td>0901841841</td>
                </tr>
                <tr style="height:40px">
                  <th>
                    Chi nhánh Đà Nẵng:
                  </th>
                  <td> - 476A Trưng Nữ Vương, Quận Hải Châu, Thành Phố Đà Nẵng</td>
                </tr>
                <tr>
                  <th>
                    Chi nhánh Quảng Ngãi:
                  </th>
                  <td> - 450 Nguyễn Văn Linh, Phường Trương Quang Trọng, Thành Phố Quảng Ngãi</td>
                </tr>
              </table>
            </div>
            <div class="cell-xs-5 cell-sm-5 cell-md-4 offset-top-35 offset-xs-top-0">
              <h5 class="text-regular text-primary" style="text-align:center">Bản đồ</h5>
              <!-- List-->
              <div class="list list-0 p text-small-15 offset-top-10 offset-md-top-20">
                <div id="map"></div>
                      <style>
                        #map {
                          height: 300px;
                          border: 3px solid 333;
                        }
                      </style>
                      <script>
                        function initMap() {
                          var uluru = { lat: 15.150824, lng: 108.796897 };
                          var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 17,
                            center: uluru
                          });
                          var contentString = '<div id="content">' +
                            '<div id="siteNotice">' +
                            '</div>' +
                            '<b id="firstHeading" class="firstHeading">450 Nguyễn Văn Linh, Phường Trương Quang Trọng, Thành Phố Quảng Ngãi</b>' +
                            '<div id="bodyContent">' +
                            '<p>Đây là địa chỉ của tôi </p>'
                          '</div>' +
                            '</div>';
                    
                          var infowindow = new google.maps.InfoWindow({
                            content: contentString,
                            maxWidth: 200
                          });
                    
                          var marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            title: 'Uluru (Ayers RocK)',
                            draggable: true,
                            animation: google.maps.Animation.DROP
                          });
                          marker.addListener('click', function () {
                            infowindow.open(map, marker);
                          });
                          marker.addListener('click', toggleBounce);
                          function toggleBounce() {
                            if (marker.getAnimation() !== null) {
                              marker.setAnimation(null);
                            } else {
                              marker.setAnimation(google.maps.Animation.BOUNCE);
                            }
                          }
                        }
                      </script>
                      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0c3onWCNTgztTwLF6E0K9bxuK65cHSkI&callback=initMap">
                      </script>
              </div>
            </div>
            <div class="cell-sm-5 cell-md-4 offset-top-35 offset-md-top-0 text-xs-center text-sm-left">
              <p class="text-small-14 text-pale-sky" style="text-align:center">
                <span class="text-white">hoangphuc car</span> &#169;
                <span id="copyright-year"></span> &#124;
                <a href="privacy.html" class="text-pale-sky">social network</a>
              </p>
              <!-- List Inline-->
              <ul class="list-inline offset-top-20" style="text-align:center">
                <li class="text-center">
                  <a href="https://join.skype.com/invite/MUqGzmOs0SRh" class="icon icon-sm icon-circle icon-bordered fa fa-skype icon-transparent"></a>
                </li>
                <li class=  "text-center">
                  <a href="mailto:travelhoangphuc@gmail.com" class="icon icon-sm icon-circle icon-bordered fa fa-google icon-transparent"></a>
                </li>
                <li class="text-center">
                  <a href="https://www.facebook.com/kimminhphuc.do" class="icon icon-sm icon-circle icon-bordered fa fa-facebook-f icon-transparent"></a>
                  <!-- {%FOOTER_LINK}-->
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div id="form-output-global" class="snackbars"></div>
    <!-- Java script-->
    <script src="/templates/car/js/core.min.js"></script>
    <script src="/templates/car/js/script.js"></script>
  </body><!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
<?php ob_end_flush();?>