<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/class.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    <title>Results Page</title>
    <style>
        .teach{
    margin-left: 75px;
}
</style>
</head>
<body>
<div class="title">
    <div class="heading">Results of Class</div>
    <div class="logo"> Go Back
    <a href="login.php"><i class="fas fa-sign-out-alt" style="color: rgba(59, 58, 58, 0.877); margin-left: 10px" ></i></a>
    </div>
  </div>

  <?php
        include("conn.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];

        // validation
        if (empty($class) ) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name`, `id` FROM `class` WHERE `name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        $id=$row['id'];
        }
        echo "<h2 class=\"teach\"> Class Name : ".$name."</h2>";
        echo "<h2 class=\"teach\"> Class ID : ".$id."</h2>";
        $result_sql=mysqli_query($conn,"SELECT * FROM `result` WHERE `class`='$class'");
        if (mysqli_num_rows($result_sql) > 0) {
            echo "<table>
              
            <tr>
            <th >STUDENT NAME</th>
            <th>STUDENT ROLL</th>
            <th>CAT 1</th>
                <th>CAT 2</th>
                <th>DA 1</th>
                <th>DA 2</th>
                <th>DA 3</th>
                <th>FAT</th>
                <th>Total</th>
                <th>Percentage</th>
            </tr>";      
        while($row = mysqli_fetch_assoc($result_sql))
        {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['rno'] . "</td>";
            echo "<td>" . $row['p1'] . "</td>";
            echo "<td>" . $row['p2'] . "</td>";
            echo "<td>" . $row['p3'] . "</td>";
            echo "<td>" . $row['p4'] . "</td>";
            echo "<td>" . $row['p5'] . "</td>";
            echo "<td>" . $row['p6'] . "</td>";
            echo "<td>" . $row['marks'] . "</td>";
            echo "<td>" . $row['percentage'] . "</td>";
        echo "</tr>";
                }

              echo "</table>";
          } else {
              echo "0 Students";
          }
      ?>
      <div>
          <br><br><br><br><br><br>
        </div>
      <div class="button">
            <button onclick="window.print()">Download Class Results</button>
        </div>
    </div>
    
</body>
</html>
