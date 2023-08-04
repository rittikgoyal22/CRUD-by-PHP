<?php
include('connect.php');
include('navbar.php');
if(isset($_POST['submit']))
{
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "Images/".$filename;

    move_uploaded_file($tempname, $folder);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = md5($_POST['pass']);
    $confpass = md5($_POST['confpass']);
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $caste = $_POST['caste'];
    $lang = $_POST['lang'];
    //      to convert array to string
    $lang1 = implode(", ",$lang);

    $mail = $_POST['mail'];
    $address = $_POST['address'];
    if($pass == $confpass)
    {
        $sql = "insert into registration (std_img,firstname, lastname, password, confirmpassword, gender, phone, caste, language, email, address) values ('$folder','$fname', '$lname', '$pass', '$confpass', '$gender', '$phone', '$caste', '$lang1', '$mail', '$address')";
        $data = mysqli_query($conn, $sql);
        if($data)
        {
            echo"<script>alert('Registered Successfully')</script>";
        }
        else
        {
            echo"Not Registered";
        }
    }
    else{
        echo"<script>alert('Password and Confirm Password should same')</script>";
    }
}

?>
<html>
    <head>
        <title>Registration Form</title>
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <div class="main">
            <div class = "box">
                <div class="in">
                    <h2>REGISTRATION FORM</h2>
                    <div class="form">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="boxin">
                                <label >Upload Image<span>*</span></label>
                                <input  type="file" name = "uploadfile" required>
                            </div>
                            <div class="boxin">
                                <label for="fname">Firstname<span>*</span></label>
                                <input type="text" id="fname" name="fname" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="lname">Lastname<span>*</span></label>
                                <input type="text" id="lname" name="lname" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="pass">Password<span>*</span></label>
                                <input type="password" id="pass" name="pass" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="confpass">Confirm Password<span>*</span></label>
                                <input type="password" id="confpass" name="confpass" required> <br>
                            </div>
                            <div class="boxin">
                                <label for="gender">Gender<span>*</span></label>
                                <select name="gender" id="gender" required> 
                                    <option >Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select> <br>
                            </div>
                            <div class="boxin">
                                <label for="phone">Mobile Number<span>*</span></label>
                                <input type="number" id="phone" name="phone" required> <br>
                            </div>
                            <label>Caste<span>*</span></label>
                            <div class="boxin1">
                                <input type="radio" id="1" name="caste" value="General" required><p>General</p>
                                <input type="radio" name="caste" value="OBC" required><p>OBC</p>
                                <input type="radio" name="caste" value="SC" required><p>SC</p>
                                <input type="radio" name="caste" value="ST" required><p>ST</p>
                            </div>
                            <label>Languages<span>*</span></label>
                            <div class="boxin2">
                                <input type="checkbox" name="lang[]" value="Hindi" ><p>Hindi</p>
                                <input type="checkbox" name="lang[]" value="Punjabi" ><p>Punjabi</p>
                                <input type="checkbox" name="lang[]" value="English" ><p>English</p>
                            </div>
                            <div class="boxin">
                                <label for="mail">Email<span>*</span></label>
                                <input type="email" id="mail" name="mail" > <br>
                            </div>
                            <div class="boxin">
                                <label class="set" for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="5"></textarea> <br>
                            </div>
                            <div>
                                <input type="checkbox" class="cb" required>
                                <p class="p1">Agree to Terms and Conditions</p>
                            </div>
                            <input type="submit" value="SUBMIT" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>