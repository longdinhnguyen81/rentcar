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
      <style>.fb-livechat, .fb-widget{display: none}.ctrlq.fb-button, .ctrlq.fb-close{position: fixed; left: 24px; cursor: pointer}.ctrlq.fb-button{z-index: 999; background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff; width: 60px; height: 60px; text-align: center; bottom: 30px; border: 0; outline: 0; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; -ms-border-radius: 60px; -o-border-radius: 60px; box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16); -webkit-transition: box-shadow .2s ease; background-size: 80%; transition: all .2s ease-in-out}.ctrlq.fb-button:focus, .ctrlq.fb-button:hover{transform: scale(1.1); box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)}.fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 24px; border-radius: 6px; -o-border-radius: 6px; -webkit-border-radius: 6px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}.fb-credit{text-align: center; margin-top: 8px}.fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}.ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}.ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; border-radius: 3px}.ctrlq.fb-close::after{content: "X"; font-family: sans-serif}.bubble{width: 20px; height: 20px; background: #c00; color: #fff; position: absolute; z-index: 999999999; text-align: center; vertical-align: middle; top: -2px; left: -5px; border-radius: 50%;}.bubble-msg{width: 120px; left: -140px; top: 5px; position: relative; background: rgba(59, 89, 152, .8); color: #fff; padding: 5px 8px; border-radius: 8px; text-align: center; font-size: 13px;}</style><div class="fb-livechat"> <div class="ctrlq fb-overlay"></div><div class="fb-widget"> <div class="ctrlq fb-close"></div><div class="fb-page" data-href="https://www.facebook.com/nini.cosmetic.qn/" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div><div class="fb-credit"> <a href="https://thuexeotoquangngai.com" target="_blank">Powered by HoangPhuc Car</a> </div><div id="fb-root"></div></div><a href="https://m.me/chanhtuoicom" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button"> <div class="bubble">1</div><div class="bubble-msg">Bạn cần hỗ trợ?</div></a></div><script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script>$(document).ready(function(){function detectmob(){if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){return true;}else{return false;}}var t={delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")}; setTimeout(function(){$("div.fb-livechat").fadeIn()}, 8 * t.delay); if(!detectmob()){$(".ctrlq").on("click", function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});</script>
    </div>
    <!-- Global Mailform Output-->
    <div id="form-output-global" class="snackbars"></div>
    <!-- Java script-->
    <script src="/templates/car/js/core.min.js"></script>
    <script src="/templates/car/js/script.js"></script>
  </body><!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
<?php ob_end_flush();?>