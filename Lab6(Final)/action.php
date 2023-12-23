<?php
include 'database.php';

//Echo Input Data
$id= $_SESSION["id"];
$lab_slot = $_POST['lab_slot'];
$lab_resource1= null;
$lab_resource2= null;
$lab_resource3= null;
$day = $_POST['day'];
$Q1 = $_POST['Q1'];
$Q2 = $_POST['Q2'];
$Q3 = $_POST['Q3'];
$experience = $_POST['experience'];
$comment = $_POST['comment'];


if(isset($_POST['lab_resource1']))
{
    $lab_resource1 = $_POST['lab_resource1'];
}

if(isset($_POST['lab_resource2']))
{
    $lab_resource2 = $_POST['lab_resource2'];
}

if(isset($_POST['lab_resource3']))
{
    $lab_resource3 = $_POST['lab_resource3'];
}

//buttons
if (isset($_POST['insert']))
{
    $result= mysqli_query($conn,"Select * FROM form WHERE id='$id'");
    $row= mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
    {
        echo '<script> alert("You already submitted the form before, you can update it in All Forms section.")
        window.location.href="ShowData.php"</script>';
    }
    else{
        $insertdata = "INSERT INTO Form
        VALUES ('$id', '$lab_slot','$day','$lab_resource1','$lab_resource2','$lab_resource3',$Q1,$Q2,$Q3,$experience,'$comment')";

            if ($conn->query($insertdata) === TRUE) {
                echo '<script> alert("Data inserted successfully") </script>';
                header('location:ShowData.php'); } 
              else {
                  echo "Error updating record: " . $conn->error;
              }

    }

            
}

elseif (isset($_POST['update'])) {

    $id= $_GET['updateid'];
    //Update data in form to database
    $updatesql = "UPDATE Form SET lab_slot='$lab_slot',lab_day='$day',
    lab_resource1='$lab_resource1',lab_resource2='$lab_resource2',lab_resource3='$lab_resource3',
    Q1=$Q1,Q2=$Q2,Q3=$Q3,experience='$experience',comments='$comment'
    WHERE id=$id";

    if ($conn->query($updatesql) === TRUE) {
        echo '<script> alert("Data updated successfully")</script>';
        header('location:ShowData.php');
    }
    else {
    echo "Error updating record: " . $conn->error;
    }
 
}

elseif (isset($_GET['deleteid'])) {
    $id= $_GET['deleteid'];
    $deletedata = "DELETE FROM Form WHERE id=$id";
    if ($conn->query($deletedata) === TRUE) {
    echo '<script> alert("Data deleted successfully")</script>'; 
    header('location:ShowData.php');
    }
    else {
    echo "Error deleting record: " . $conn->error;
    }
    
}


elseif (isset($_POST['back'])) {

    header('location:ShowData.php');

}


?>




    


