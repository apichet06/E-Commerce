<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Untitled Document</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link href="css/cite.css" rel="stylesheet">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Add jQuery library -->
  <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>
</head>
<body>
</br>
</br>
<?php 
require_once 'config.php';
$query=mysqli_query($conn,"SELECT COUNT(pd_id) FROM product_db Where  cat_id ='".$_GET['id']."'");
$row = mysqli_fetch_row($query);
$rows = $row[0];
$page_rows = 3;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
$last = ceil($rows/$page_rows);
if($last < 1){
  $last = 1;
}
$pagenum = 1;
if(isset($_GET['pn'])){
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) {
  $pagenum = 1;
}
else if ($pagenum > $last) {
  $pagenum = $last;
}
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$nquery=mysqli_query($conn,"SELECT pic1,pd_name1,pd_name2,pd_price,pd_pricesell,pd_id,pd_discount,b.cat_id FROM product_db a 
  INNER JOIN category_db b 
  ON a.cat_id = b.cat_id
  Where b.cat_id = '".$_GET['id']."'
  ORDER BY pd_id  DESC $limit");
$paginationCtrls = '';
if($last != 1){
  if ($pagenum > 1) {
    $previous = $pagenum - 1;
    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&id='.$_GET['id'].'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';
    for($i = $pagenum-4; $i < $pagenum; $i++){
      if($i > 0){
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&id='.$_GET['id'].'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
      }
    }
  }
  $paginationCtrls .= ''.$pagenum.' &nbsp; ';
  for($i = $pagenum+1; $i <= $last; $i++){
    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&id='.$_GET['id'].'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
    if($i >= $pagenum+4){
      break;
    }
  }
  if ($pagenum != $last) {
    $next = $pagenum + 1;
    $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&id='.$_GET['id'].'" class="btn btn-info">Next</a> ';
  }
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-12">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr class="info">
            <th rowspan="2">ลำดับ</th>
            <th rowspan="2">ชื่อจริง</th>
            <th rowspan="2">นามสกุล</th>
            <th rowspan="2">ชื่อผู้ใช้</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $num=1;
          while($crow = mysqli_fetch_array($nquery)){
            ?>

            <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $crow['PD_ID']; ?></td>
            </td>
            <td><?php echo $crow['member_lastname']; ?></td>
            <td><?php echo $crow['member_username']; ?></td>
          </tr>
        <?php $num++;} ?>
      </tbody>
    </table> 
    <center><div ><?php echo $paginationCtrls; ?></div></center>
  </div>
  <div class="col-md-2">
  </div>
</div>
</div>
</body>
</html>













</body>
</html>