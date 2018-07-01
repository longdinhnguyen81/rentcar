<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
    $queryTSD  = "SELECT COUNT(*) AS TSD FROM car";
    $resultTSD = $mysqli->query($queryTSD);
    $arTmp      = mysqli_fetch_assoc($resultTSD);
    //  Tổng số dòng
    $tongDong   = $arTmp['TSD'];
    //  Số truyện trên 1 trang
    $row_count  = ROW_COUNT5;
    //  Tổng số trang
    $tongTrang  = ceil($tongDong / $row_count);
    //  Trang hiện tại 
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
                <h2>Quản lý tin tức</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
<?php
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }
?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="/admin/admin/car/add.php?hid=3" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="" >
                                        <input name="name" type="search" id="myInput" onkeyup="myFunction()" class="form-control input-sm" placeholder="Nhập tên xe cần tìm" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(0)">ID</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(1)">Tên xe</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(2)" width="150px">Địa điểm hiện tại</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(3)" width="120px">Trạng thái</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(4)" width="120px">Giá tiền / Giờ</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(5)" width="100px">Hình ảnh</th>
                                        <th style="cursor: pointer;text-align:center" width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                            <?php
                                $i = 0;
                                if(isset($_POST['search'])){
                                    if($_POST['name'] != ""){
                                        $car = $_POST['name'];
                                    }else{
                                        echo "Bạn chưa nhập tên tin tức";
                                        die();
                                    }
                                    $query = "SELECT * FROM car WHERE name LIKE '%{$car}%' ORDER BY id DESC";
                                }else{
                                    $query = "SELECT * FROM car ORDER BY id DESC LIMIT {$offset},{$row_count}";
                                }
                            ?>
                            <?php
                                    $result = $mysqli->query($query);
                                    $count = mysqli_num_rows($result);
                                    if($count == 0){
                                        echo "<h3 style='color:#666;text-align:center'>Không có xe cần tìm</h3>";
                                    }
                                    while ($arCar  = mysqli_fetch_assoc($result)) {
                                        $cid       = $arCar['id'];
                                        $name      = $arCar['name'];
                                        $picture   = $arCar['picture'];
                                        $urlpic    = '/templates/car/images/' . $picture;
                                        $preview   = $arCar['preview'];
                                        $active    = $arCar['active'];
                                        $cost      = $arCar['hourcost'];
                                        $address   = $arCar['address'];
                                ?>
                                <?php 
                                    $i = 0;
                                    if ($i % 2 == 0) { $cl = "even"; } else { $cl = "odd"; }
                                ?>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <td style="text-align:center"><?php echo $cid;?></td>
                                        <td style="text-align:center"><?php echo $name;?></td>
                                        <td style="text-align:center"><?php echo $address;?></td>
                                        <td style="text-align:center" class="center" id="result-<?php echo $cid?>">
                                            <a href="javascript:void(0)" onclick="return getActive(<?php echo $cid?>,<?php echo $active?>)">
                                        <?php
                                            if($active == 0){
                                        ?>
                                        <img src="/templates/admin/img/deactive.png" />
                                        <?php
                                            }elseif($active == 1){
                                        ?>
                                        <img src="/templates/admin/img/active.png" />
                                        <?php
                                            }else{
                                        ?>
                                        <img src="/templates/admin/img/demo.png"  width="15" height="15px" />
                                        <?php
                                            }
                                        ?></a>
                                        </td>
                                        <td style="text-align:center"><?php echo number_format($cost,0,',','.'); ?></td>
                                        <td style="text-align:center" class="center">
                                            <img src="<?php echo $urlpic?>" alt="" height="60px" width="90px" />      
                                        </td>
                                        <td style="text-align:center;margin-top:50px" class="center">
                                            <a href="/admin/admin/car/edit.php?hid=3&cid=<?php echo $cid; ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a onclick="return confirm('Bạn có muốn xóa không?')" href="/admin/admin/car/del.php?cid=<?php echo $cid; ?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php 
                                }      
                            ?>
                            </table>

                            <div><img src="/templates/admin/img/active.png" /></a>: Xe đang rảnh</div>
                            <div><img src="/templates/admin/img/deactive.png" /></a>: Xe đang bận/bảo trì</div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của <?php echo $tongDong?> truyện</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                            <?php
                                                for($i=1;$i<= $tongTrang;$i++){
                                                    $active = "";
                                                    if($i == $current_page){
                                                        $active = "active";
                                                    }
                                            ?>
                                            <li class="paginate_button <?php echo $active;?>" aria-controls="dataTables-example" tabindex="0"><a href="/admin/admin/car/index.php?hid=3&page=<?php echo $i ?>&hid=3"><?php echo $i ?></a></li>
                                            <?php
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
    td = tr[i].getElementsByTagName("td")[1];
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

<script>
    function getActive(cid, active){
        $.ajax({
            url: 'xulyCar.php',
            type: 'POST',
            cache: false,
            data: {
                aId: cid,
                aActive: active,
            },
            success: function(data){
                $('#result-'+cid).html(data);            
            },
            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>