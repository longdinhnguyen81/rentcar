<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
  $queryTSD  = "SELECT COUNT(*) AS TSD FROM service";
  $resultTSD = $mysqli->query($queryTSD);
  $arTmp     = mysqli_fetch_assoc($resultTSD);
  //Tổng số dòng
  $tongDong  = $arTmp['TSD'];
  $row_count = ROW_COUNT5;
  //Tổng số trang
  $tongTrang = ceil($tongDong/$row_count);
  //Trang hiện tại
  $current_page = 1;
  if(isset($_GET['page'])){
     $current_page = $_GET['page'];
  }
  //offset
  $offset = ($current_page - 1) * $row_count;
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý chuyến đi</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <?php
                                    if(isset($_GET['msg'])){
                                        echo '<h4>' . $_GET['msg'] . '</h4>';
                                    }
                                ?>
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input name="name" type="search" onkeyup="myFunction()" id="myInput" class="form-control input-sm" placeholder="Nhập tên xe đang được đặt" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(0)">ID</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(1)">Tên người dùng</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(2)">Tên xe</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(3)">Thời gian đi</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(4)">Ngày đi</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(5)">Địa điểm xe đi</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(6)">Tình trạng</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                        $i = 0;
                        if(isset($_POST['search'])){
                            if($_POST['name'] != ""){
                                $admin = $_POST['name'];
                            }else{
                                echo "Bạn chưa nhập tên xe đang được đặt";
                                die();
                            }
                            $query = "SELECT *,service.id as se_id, service.active as sactive,car.address as caddress FROM service 
                            INNER JOIN users
                            ON service.user_id = users.id 
                            INNER JOIN car
                            ON service.car_id = car.id 
                            WHERE name LIKE '%{$admin}%'";
                        }else{                       
                            $query = "SELECT *,service.id as se_id, service.active as sactive, service.address_car as saddress,car.address as caddress FROM service 
                            INNER JOIN users
                            ON service.user_id = users.id 
                            INNER JOIN car
                            ON service.car_id = car.id 
                            ORDER BY service.id DESC LIMIT 5";
                        }
                            $result = $mysqli->query($query);
                            $count  = mysqli_num_rows($result);
                            if($count == 0){
                                echo "Không có chuyến đi cần tìm";
                                die();
                            }
                            while($arService = mysqli_fetch_assoc($result)){
                                $sid           = $arService['se_id'];
                                $name_car      = $arService['name'];
                                $name_user     = $arService['username'];
                                $datetime_from = $arService['time_from'].'h';
                                $datetime_to   = $arService['date_from'];
                                $caddress      = $arService['caddress'];
                                $sactive       = $arService['sactive'];
                                $i++;
                                if ($i % 2 == 0) { $cl = "even"; } else { $cl = "odd"; }
                    ?>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <td><?php echo $sid; ?></td>
                                        <td><?php echo $name_user; ?></td>
                                        <td><?php echo $name_car; ?></td>
                                        <td><?php echo $datetime_from; ?></td>
                                        <td><?php echo $datetime_to; ?></td>
                                        <td><?php echo $caddress; ?></td>
                                        <td><?php
                                            if($sactive == 1){
                                                echo "Đã phản hồi";
                                            }else{
                                                echo "Chưa phản hồi";
                                            }
                                        ?></td>
                                        <td class="center">
                                            <a href="/admin/admin/service/info.php?sid=<?php echo $sid;?>&hid=4" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Xem thông tin</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của <?php echo $tongDong?> danh mục</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
<?php
    for($i=1;$i<=$tongTrang;$i++){
        if($i == $current_page){
?>
                                            <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#"><?php echo $i?></a></li>
<?php
        }else{
?>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="/templates/admin/cat/index.php?hid=5&page=<?php echo $i?>"><?php echo $i ?></a></li>
<?php        
        }
    }
?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
<!-- /. PAGE INNER  -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>