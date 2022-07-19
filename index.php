<html>
<head>
    <title>Crud With Php</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="./css/style.css"> 

    </head>
<body>
    <div class="container">
    <?php require_once 'process.php';?>
        <?php
        if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
             unset($_SESSION['message']);
        ?>
        </div>
        <?php endif; ?>
       
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(msqli_error($mysli));
   $result = $mysqli->query("SELECT * FROM data");
//    pre_r($result);
    
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    };

    
    ?>
    <div class=" row justify-content-center">
        <table class="table">
        <thead>
            <tr>
            <th>Name</th>
                <th>Location</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <?php
            while($row = $result->fetch_assoc()):
            ?>
            <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
                <td>
                <a href="index.php ?edit=<?php echo $row['Id']; ?>" class="btn btn-info">Edit</a>
                 <a href="process.php ?delete=<?php echo $row['Id']; ?>" class="btn btn-danger" name="delete" method="get">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    
    </div>
    <div class=" container">
  <form action="process.php" method="post" id="form">
  <div class="form-group">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  </div>
      <div class="form-group">
      <label>Name</label>
    <input type="text" name="name" placeholder="Enter Your Name" class="form-control name"  value="<?php echo $name; ?>" required>
          <div id="errMsg"></div>
          </div>
      <div class="form-group">
       <label>Location</label>
          <input type="text" name="location"  value="<?php echo $location; ?>" placeholder="Enter Your Location" class="form-control location" required>
                    <div id="errMsg"></div>
          </div>
            <div class="form-group">
            <?php if ($update == true): ?>
            <button class="btn btn-info" type="submit" name="update">Update</button>
        <?php else: ?>
            <button class="btn btn-primary" type="submit" name="save">Save</button>
        <?php endif ?>
                </div>
    </form>
        </div>
        </div>
    </body>
    <script src="script.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

</html>