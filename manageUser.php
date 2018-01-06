<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
 <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/myScrollView.css">
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->

</head>
<body>


<div class="container">
<h3>Manage Users</h3>
  <div class="panel panel-primary">
    <div class="tab-pane">
    <form action="adminPage.php" method="post">
        <?php
        require ("conConfiguration.php");
        $sql = "SELECT * FROM users WHERE u_type='D'";        
        $result = $db->query($sql);
        if ($result->num_rows > 0) {

          echo "<table class='table'>";
          echo "<thead class='thead-default'>";
          echo "<tr>";
          echo "<th>First Name</th>";
          echo "<th>Last Name</th>";
          echo "<th>Email</th>";
          echo "<th></th>";
          echo "</tr>";
          echo "</thead>";
          while($row = $result->fetch_assoc()) {
            $userId=$row["u_id"];
            $_SESSION['userId'] = $userId;

            $firstName= $row["u_first_name"];
            $lastName=$row["u_last_name"];
            $email=$row["u_email"];
            echo "<tbody>";
            echo "<tr>";
            echo "<td> $firstName</td>";
            echo "<td> $lastName</td>";
            echo "<td> $email</td>";
            echo "<td hidden >$userId</td>";
            echo "<td>";
            ?> 
            <button type="button" id="usrApprove" value="approve" class='btn btn-success'>Approve</button>
            <button type="button" id="usrRemove" value="remove" class='btn btn-danger'>Remove</button>
            <!-- <p></p> -->
             <!-- <input type="submit" class='btn btn-success' name="userApprove" value="Approve" />
            <input type="submit" class='btn btn-danger' name="remove" value="Remove" /> -->

            <?php   echo "</td>";
            echo "</tr>";
            echo "</tbody>";
          }
          echo "</table>";
        } else {
          $db->close();
        }
        ?>
       </form>
    </div>
  </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#usrApprove, #usrRemove").click(function(){
        var uId =  $(this).closest('tr').find('td:eq(3)').text();

        console.log(uId);
            $.ajax({
                type: 'GET',
                url: 'btnManageUser.php',
                data: {
        id: $(this).val(),
        uId: uId
      },
                success: function(data) {
                  location.reload();  
                    // $("p").text(data);

                }
            });
   });
});
</script>


</body>
</html>
