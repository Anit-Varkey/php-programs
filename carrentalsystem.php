<?php
$conn= mysqli_connect('localhost', 'root', '', 'carrental');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}
if(isset($_POST['book'])) {
    $sql="insert into rental(name,rentdate,noseat,rentrate) values ('$_POST[name]','$_POST[rentdate]',$_POST[noseat],$_POST[rentrate])";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
?>
<html>
<head>
    <title>Car Rental Management System</title>
    <style type="text/css">
      th {
        text-align: left;
    }
    span {
        color:  red;
    }
    input[type="date"],input[type="name"]input[type="number"] {
        width: 220px;
        height: 25px;
        border-radius: 5px;
    }
    select,input[type="date"] {
        width: 100%;
        height: 27px;
        border-radius: 5px;
    }
    input[type="submit"],input[type="reset"] {
        width: 100px;
        height: 35px;
        border-radius: 5px;
    }
    .row {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 20px;
    }
    .col-md-5 {
        grid-column: span 5;
    }
    .col-md-7 {
        grid-column: span 7;
    }

</style>
<script type="text/javascript">
    function validate() {        
        if(!document.form.name.value.match(/^[a-zA-Z][A-Za-z\s]*[a-zA-Z]$/)) {
            alert("Name should contain alphabets only!");
            document.form.name.focus();
            return false;
        } 
    }
</script>
</head>
<body>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" name="form" action="" onsubmit="return(validate())">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">Car Rental System</h1></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name" required></td>
                    </tr>     
                    <tr>
                        <th>Rent date</th>
                        <td><input type="date" name="rentdate" required></td>
                    </tr>                    
                    <tr>
                        <th>seats</th>
                        <td><input type="number" name="noseat" required></td>
    
                    </tr>
                    <tr>
                        <th> rate</th>
                        <td><input type="number" name="rentrate" required></td>
                    </tr>
                   
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Book" name="book" style="background-color: blue;">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-7" style="display: block;overflow-x: auto;">
            <table cellpadding="5px" cellspacing="5px"  align="center">
                <tr>
                    <th colspan="10"><h1 align="center">Renting  Details</h1></th>
                </tr>
                <tr>
                    <th>sl no</th>
                    <th>Name</th>
                    <th>Number Of Seats</th>
                    <th>Rent Rate</th>
                </tr>
                <?php 
                $n=1;
                $sql="select * from rental";
                $res= mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['noseat']?></td>
                        <td><?php echo $row['rentrate']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>