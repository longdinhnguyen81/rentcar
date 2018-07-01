<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/leftbar.php'; ?>
<?php
  $queryTSD  = "SELECT COUNT(*) AS TSD FROM users";
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
                <h2>Quản lý người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
         <?php
            if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="/admin/admin/users/add.php?hid=4" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input name="name" type="search" id="myInput" onkeyup="myFunction()" class="form-control input-sm" placeholder="Nhập tên người dùng(username)" style="float:right; width: 300px;" name="find" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="myTable">
                                    <tr>
                                        <th style="cursor: pointer;" onclick="sortTable(0)">ID</th>
                                        <th style="cursor: pointer;" onclick="sortTable(1)">Username</th>
                                        <th style="cursor: pointer;" onclick="sortTable(1)">Fullname</th>
                                        <th style="cursor: pointer;" onclick="sortTable(1)">Số điện thoại</th>
                                        <th style="cursor: pointer;" onclick="sortTable(1)">Tình trạng</th>
                                        <th style="cursor: pointer;" onclick="sortTable(1)" width="160px">Chức năng</th>
                                    </tr>
                            <?php
                                
                                    $queryUser  = "SELECT * FROM users LIMIT {$offset},{$row_count}";
                                    $resultUser = $mysqli->query($queryUser);
                                    while($arUser = mysqli_fetch_assoc($resultUser)){
                                        $id_user  = $arUser['id'];
                                        $username = $arUser['username'];
                                        $fullname = $arUser['fullname'];
                                        $active   = $arUser['active'];
                                        $phone    = $arUser['phone'];
                            ?>
                                    <tr>
                                        <td><?php echo $id_user;?></td>
                                        <td><?php echo $username;?></td>
                                        <td><?php echo $fullname;?></td>
                                        <td><?php echo "0".$phone?></td>
                            <?php
                                if($_SESSION['username'] == 'admin'){
                            ?>
                                        <td id="result-<?php echo $id_user?>"><a href="javascript:void(0)" onclick="return getActive(<?php echo $id_user?>,<?php echo $active?>)">
                                        
                            <?php
                                if($active == 1){

                            ?>
                                        <img src="/templates/admin/img/active.png" /></a>
                            <?php
                                }elseif($active == 0){
                            ?>
                                        <img src="/templates/admin/img/deactive.png" /></a>
                            <?php
                                }else{
                            ?>
                                        <img width=15px height=15px src="/templates/admin/img/demo.png" /></a>
                            <?php
                                }
                            ?>
                                        </td>
                            <?php
                                }
                            ?>
                                        <td>
                            <?php
                                    if($_SESSION['username'] == "admin" || $_SESSION['username'] == $username){
                                    
                                    
                            ?>
                                        <a href="/templates/admin/users/edit.php?hid=4&id=<?php echo $id_user?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                            <?php
                                    }if($_SESSION['username'] == "admin"){
                            ?>
                                        <a onclick="return confirm('Bạn có muốn xóa không?')" href="/templates/admin/users/del.php?id=<?php echo $id_user?>" title="" class="btn btn-danger"><i class="fa fa-pencil "></i> Xóa</a>
                                        </td>
                                    </tr>
                                <?php 
                                            
                                        }
                                    }
                                

                                ?>
                            </table>
                            <div><img src="/templates/admin/img/active.png" /></a>: Đang rảnh</div>
                            <div><img src="/templates/admin/img/deactive.png" /></a>: Đang thuê xe</div>
                            <div><img width=16px height=16px src="/templates/admin/img/demo.png" /></a>: Cấm hoạt động</div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến <?php echo $row_count ?> của <?php echo $tongDong?> người dùng</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                <?php
                                    for($i=1;$i<=$tongTrang;$i++){
                                        if($i == $current_page){
                                ?> 
                                            <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href=""><?php echo $current_page ?></a></li>
                                <?php
                                        }else{
                                ?>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="/templates/admin/users/index.php?page=<?php echo $i?>&hid=4"><?php echo $i ?></a></li>
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
    function getActive(id_user, active){
        $.ajax({
            url: 'xulyUser.php',
            type: 'POST',
            cache: false,
            data: {
                aId: id_user,
                aActive: active,
            },
            success: function(data){
                $('#result-'+id_user).html(data);            
            },
            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
    }
</script>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/inc/footer.php'; ?>
