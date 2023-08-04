<?php
include('connect.php');
$id = $_GET['idd'];
$query = "select * from registration where id='$id'";

$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

$language = $result['language'];

$language1 = explode(", ", $language);

?>

<?php
if(isset($_POST['update']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = md5($_POST['pass']);
    $confpass = md5($_POST['confpass']);
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $caste = $_POST['caste'];

    $lang = $_POST['lang'];
    $lang1 = implode(", ",$lang);

    $mail = $_POST['mail'];
    $address = $_POST['address'];

    $query = "update registration set firstname='$fname', lastname = '$lname', password='$pass', confirmpassword='$confpass', gender='$gender', phone='$phone', caste='$caste', language='$lang1', email='$mail', address = '$address' where id = '$id'";

    $data = mysqli_query($conn, $query);
    if($data)
    {
        echo"<script>alert('Updated')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url='http://localhost/Registration/display.php'";
        <?php
    }
    else{
        echo"<script>alert('Failed to update')</script>";
    }
}
?>

<html>
    <head>
        <title>Update Student Details</title>
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <div class="main">
            <div class = "box">
                <div class="in">
                    <h2>UPDATE THE FORM</h2>
                    <div class="form">
                        <form action="" method="POST">
                            <div class="boxin">
                                <label for="fname">Firstname<span>*</span></label>
                                <input type="text" value="<?php echo $result['firstname']?>" id="fname" name="fname" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="lname">Lastname<span>*</span></label>
                                <input type="text" value="<?php echo $result['lastname']?>" id="lname" name="lname" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="pass">Password<span>*</span></label>
                                <input type="password" value="<?php echo $result['password']?>" id="pass" name="pass" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="confpass">Confirm Password<span>*</span></label>
                                <input type="password" value="<?php echo $result['confirmpassword']?>" id="confpass" name="confpass" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="gender">Gender<span>*</span></label>
                                <select name="gender" id="gender" required> 
                                    <option >Select</option>

                                    <option value="male" <?php if($result['gender']=='Male'){ echo "selected"; } ?> >Male</option>
                                    <option value="female" <?php if($result['gender']=='Female'){ echo "selected"; } ?> >Female</option>
                                </select> <br>
                            </div>
                            <div class="boxin">
                                <label for="phone">Mobile Number<span>*</span></label>
                                <input type="number" value="<?php echo $result['phone']?>" id="phone" name="phone" required> <br>
                            </div>
                            <label>Caste<span>*</span></label>
                            <div class="boxin1">
                                <input type="radio" name="caste" value="General" <?php if($result['caste']=='General'){ echo "checked"; } ?>  required><p>General</p>
                                <input type="radio" name="caste" value="OBC" <?php if($result['caste']=='OBC'){ echo "checked"; } ?> required><p>OBC</p>
                                <input type="radio" name="caste" value="SC" <?php if($result['caste']=='SC'){ echo "checked"; } ?> required><p>SC</p>
                                <input type="radio" name="caste" value="ST" <?php if($result['caste']=='ST'){ echo "checked"; } ?> required><p>ST</p>
                            </div>
                            <label>Languages<span>*</span></label>
                            <div class="boxin2">
                                <input type="checkbox" name="lang[]" value="Hindi" <?php if(in_array('Hindi', $language1)){ echo "checked"; } ?>><p>Hindi</p>
                                <input type="checkbox" name="lang[]" value="Punjabi"  <?php if(in_array('Punjabi', $language1)){ echo "checked"; } ?>><p>Punjabi</p>
                                <input type="checkbox" name="lang[]" value="English"  <?php if(in_array('English', $language1)){ echo "checked"; } ?>><p>English</p>
                            </div>
                            <div class="boxin">
                                <label for="mail">Email<span>*</span></label>
                                <input type="email" value="<?php echo $result['email']?>" id="mail" name="mail" > <br>
                            </div>
                            <div class="boxin">
                                <label class="set" for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="5"><?php echo $result['address']?></textarea> <br>
                            </div>
                            <div>
                                <input type="checkbox" required>
                                <p class="p1">Agree to Terms and Conditions</p>
                            </div>
                            <input type="submit" value="UPDATE" name="update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>