<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
  $queryTSD  = "SELECT COUNT(*) AS TSD FROM admin";
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
                <h2>Quản lý admin</h2>
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
                                    <a href="/admin/admin/admin/add.php?hid=3" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input name="name" type="search" id="myInput" onkeyup="myFunction()" class="form-control input-sm" placeholder="Nhập tên admin" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(0)">ID</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(1)">Tên admin</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(2)">Tài khoản</th>
                                        <th style="cursor: pointer;text-align:center" onclick="sortTable(3)">Quyền hạn</th>
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
                                echo "Bạn chưa nhập tên admin";
                                die();
                            }
                            $query = "SELECT * FROM admin WHERE adname LIKE '%{$admin}%'";
                        }else{                       
                            $query = "SELECT * FROM admin LIMIT {$offset},{$row_count}";
                        }
                            $result = $mysqli->query($query);
                            $count  = mysqli_num_rows($result);
                            if($count == 0){
                                echo "Không có admin cần tìm";
                                die();
                            }
                            while($arAdmin = mysqli_fetch_assoc($result)){
                                $aid = $arAdmin['id'];
                                $uname     = $arAdmin['adname'];
                                $fname     = $arAdmin['adfullname'];
                                $active    = $arAdmin['active'];
                                $i++;
                                if ($i % 2 == 0) { $cl = "even"; } else { $cl = "odd"; }
                    ?>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <td><?php echo $aid; ?></td>
                                        <td><?php echo $fname; ?></td>
                                        <td><?php echo $uname; ?></td>
                                        <td><?php
                                            if($aid == 1 || $active == 1){
                                                echo "Admin chính";
                                            }else{
                                                echo "Admin";
                                            }
                                        ?></td>
                                        <td class="center">
                                            <a href="/admin/admin/admin/edit.php?aid=<?php echo $aid;?>&hid=3" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a onclick="return confirm('Bạn có muốn xóa không?')" href="/admin/admin/admin/del.php?aid=<?php echo $aid;?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="/templates/admin/cat/index.php?hid=2&page=<?php echo $i?>"><?php echo $i ?></a></li>
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
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>