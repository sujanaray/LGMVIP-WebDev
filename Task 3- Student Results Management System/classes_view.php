<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/class.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>View Classes</title>
    
</head>
<body>
        
  <div class="title">
    <div class="heading">Registered Classes</div>
    <div class="logo"> Logout
    <a href="logout.php"><i class="fas fa-sign-out-alt" style="color: rgba(59, 58, 58, 0.877); margin-left: 10px" ></i></a>
    </div>
  </div>

  <div >
    <ul>
    <li class="dropdown" onclick="toggleDisplay('1')">
      <center><a href="" class="dropbtn">CLASSES &nbsp
          <span class="fa fa-angle-down"></span>
        </a></center>
        <div class="dropdown-content" id="1">
          <a href="classes_add.php">Add New Class</a>
          <a href="classes_view.php">View Registered Classes</a>
        </div>
      </li>
      <li class="dropdown" onclick="toggleDisplay('2')">
      <center> <a href="#" class="dropbtn">STUDENTS &nbsp
          <span class="fa fa-angle-down"></span>
        </a></center>
        <div class="dropdown-content" id="2">
          <a href="students_add.php">Add New Students</a>
          <a href="students_view.php">View Registered Students</a>
        </div>
      </li>
      <center><li class="dropdown" onclick="toggleDisplay('3')">
      <a href="#" class="dropbtn">RESULTS &nbsp
          <span class="fa fa-angle-down"></span>
        </a>
        <div class="dropdown-content" id="3">
          <a href="add_results.php">Add New Results</a>
          <a href="results_update.php">Update Results</a>
        </div></center>
      </li>
    </ul>
  </div>

  <div class="main" style="width: 70%; margin: 0 auto; padding: 2% 5%">
    <?php
      include('conn.php');
      include('session.php');
      $db = mysqli_select_db($conn,'student_results');

      $sql = "SELECT * FROM `class`";
      $result1 = mysqli_query($conn, $sql);
      

      if (mysqli_num_rows($result1) > 0) {
        echo "<table>
        <tr>
        <th>CLASS ID</th>
        <th>CLASS NAME</th>
        </tr>";
       
        while($row1= mysqli_fetch_array($result1))

          {
                  
          echo "<tr>";
          echo "<td>" . $row1['id'] . "</td>";
          echo "<td>" . $row1['name'] . "</td>";
          echo "</tr>";

          }

        echo "</table>";
      } else {
          echo "0 results";
      }
    ?>
      
  </div>

</body>

</html>

