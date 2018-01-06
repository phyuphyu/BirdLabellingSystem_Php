<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bird Labelling</title>
 <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/myScrollView.css">

</head>
<body>
<div class="container">
<h3>Manage Labels</h3>
  <div class="panel panel-primary">
    <div class="tab-pane">
      <form action="adminPage.php" method="post">
        <?php
        $sql = "SELECT * FROM labels WHERE l_status='D'";
        require ("conConfiguration.php");
        $result = $db->query($sql);
        if ($result->num_rows > 0) {

          echo "<table class='table'>";
          echo "<thead class='thead-default'>";
          echo "<tr>";          
          echo "<th hidden>id</th>";
          echo "<th>Label Name</th>";
          echo "<th></th>";
          echo "</tr>";
          echo "</thead>";
          while($row = $result->fetch_assoc()) {
            $labelId=$row["l_id"];
            $labelName=$row["l_name"];
            
            $_SESSION['labelId'] = $labelId;

          
            ?>
            <tr>
            
            <td class="click_td"><?php echo $labelName ?></td>
            <td id="myId" class="click_td" hidden ><?php echo $labelId?></td>
            <td class="click_td">
            
            <button type="button" id="lblApprove" value="approve" class='btn btn-success'>Approve</button>
            <button type="button" id="lblRemove" value="remove" class='btn btn-danger'>Remove</button>
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
      $("#lblApprove, #lblRemove").click(function(){
        var customerId =  $(this).closest('tr').find('td:eq(1)').text();
        console.log(customerId);
             $.ajax({
                type: 'GET',
                url: 'btnManageLabel.php',
                data: {
        id: $(this).val(),
        customerId: customerId
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
