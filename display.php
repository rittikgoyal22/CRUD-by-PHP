<html>
    <head>
        <title>Display Page</title>
        <style>
            body{
                background-color:aqua;
            }
            table{
                background-color:white;
            }
            .upd, .dlt{
                height:22px;
                width:70px;
                background: green;
                border:none;
                font-size:16px;
                font-weight:bold;
                border-radius:4px;
                color:white;
                cursor: pointer;
            }
            th{
                font-size:22px;
            }
            .dlt{
                background:red;
            }
            </style>
    </head>
    
    </html>
    
    <?php
include('connect.php');
include('navbar.php');
$query = 'select * from registration';

$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
if($total >0)
{
    ?>
    
    <h1 align="center">Display All Records</h1>
    <center>
        <table border=1 width="90%" cellspacing=0 >
            <tr>
                <th width="4%">ID</th>
                <th width="6%">Image</th>
                <th width="6%">Firstname</th>
                <th width="6%">Lastname</th>
                <th width="6%">Gender</th>
                <th width="10%">Mobile No</th>
                <th width="5%">Caste</th>
                <th width="10%">Languages</th>
                <th width="12%">Email</th>
                <th width="6%">Address</th>
                <th width="8%">Reg Date</th>
                <th width="13%">Operations</th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($data))
            {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td><img src='$row[std_img]' height='140px' width='100px'></td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['lastname']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['caste']."</td>
                        <td>".$row['language']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['date']."</td>
                        <td> <a href='update.php?idd=$row[id]'> <input class='upd' type='submit' value='Update' > </a>
                        <a href='delete.php?idd=$row[id]'> <input class='dlt' type='submit' value='Delete' onclick='return checkdelete()'> </a>
                        </td>
                <tr>";
            }
}
else
{
    echo"No Record Found";
}
    
    ?>
    </table>
    </center>

<script>
    function checkdelete()
    {
        return confirm('You want to delete this record?');
    }
</script>