<?php
require'database.php'; 

if(!empty($_SESSION["id"])){
    $id= $_SESSION["id"];
    $result= mysqli_query($conn,"Select * FROM userlist WHERE id='$id'");
    $id_row= mysqli_fetch_assoc($result);
  }
  
  else{
      header("location:Login.php");
  }
?>


<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Web Lab Feedback Form</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">

<style>
.allButFooter {
    min-height: calc(100vh - 40px);
}
</style>
</head>

<body>
<div class="allButFooter">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: url(&quot;assets/img/web-lab-high-resolution-color-logo.png&quot;) center / contain;"></span><span>Web Programming Lab</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Form.php">Form</a></li>
                    <li class="nav-item"><a class="nav-link active" href="ShowData.php">All Forms</a></li>
                    <li class="nav-item"><a class="nav-link" href="About%20Me.php">About Me</a></li>
                </ul>
            </div>

            <div> 
                 <span style="color:white; margin:0px 10px;"><?php echo $id_row["username"] ?></span>

                <button type="button" class="btn btn-success">
                <a href="Logout.php" style="color:white; text-decoration: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg> Log out</a></button>
            </div>

        </div>
    </nav>

    <!-- Heading -->
    <h1 class="display-4 fw-bold text-center"><br><strong>All Feedback Form</strong><br><br></h1>

        <!-- Table -->
        <div class="form-group mb-3" style="padding: 0px 50px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr style="text-align: center;">
                            <th style="width: 150px;vertical-align: middle;">ID</th>
                            <th style="width: 150px;vertical-align: middle;">Student Name</th>
                            <th style="width: 250px;vertical-align: middle;">Email</th>
                            <th style="width: 150px;vertical-align: middle;">Lab Slot</th>
                            <th style="width: 150px;vertical-align: middle;">Day</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                       //Select all data in ShowAllFormData View
                       $ShowAllData= "SELECT * FROM ShowAllFormData";
                       $ShowAllData_result= mysqli_query($conn,$ShowAllData);

                        while($row= mysqli_fetch_array($ShowAllData_result)){
                            echo"
                                <tr style='text-align: center;'>
                                    <td style='width: 150px;vertical-align: middle;'>".$row['id']."</td>
                                    <td style='width: 150px;vertical-align: middle;'>".$row['username']."</td>
                                    <td style='width: 250px;vertical-align: middle;'>".$row['email']."</td>
                                    <td style='width: 150px;vertical-align: middle;'>".$row['lab_slot']."</td>
                                    <td style='width: 150px;vertical-align: middle;'>".$row['lab_day']."</td>
                                    <td>
                                    <a href='ReadData.php?readid=".$row['id']."'><button class='btn btn-success' type='submit' name='read'> 
                                    Read</button></a>

                                    <a href='UpdateData.php?updateid=".$row['id']."'><button class='btn btn-primary' type='submit' name='update'> 
                                    Update</button></a>

                                    <a href='action.php?deleteid=".$row['id']."'><button class='btn btn-danger' type='submit' name='delete'>
                                    Delete</button></a>
                                    
                                    </td>
                                </tr>"  
                            ;}

                       ?>

                       
                    </tbody>
                </table>
            </div>
        </div>

</div>

    <!-- Footer -->
    <footer class="text-center bg-dark" style="bottom: 0;width: 100%;">
        <div class="container text-white py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><a href="https://www.facebook.com/aro.low.3/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook text-light">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                        </svg></a></li>
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter text-light">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                    </svg></li>
                <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram text-light">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                    </svg></li>
            </ul>
            <p class="text-muted mb-0">Copyright © 2022 Brand</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>