<?php
include("connect.php");

$id = $_GET['idd'];
$sql = "delete from registration where id='$id'";
$data = mysqli_query($conn, $sql);
if($data){
    echo"<script>alert('Record Deleted Successfully')</script>";
    ?>
    <meta http-equiv = "refresh" content="0; url='http://localhost/Registration/display.php'"/>
<?php
}
else{
    echo"<script>alert('Record Not Deleted')</script>";
}
?>