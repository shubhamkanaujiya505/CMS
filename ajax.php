<?php
$con = mysqli_connect('localhost','root','123456','Form'); //connect to database

// $con = mysqli_select_db($con,'Form');

$countryId = isset($_POST['countryId']) ? $_POST['countryId'] :0;
$stateId = isset($_POST['stateId']) ? $_POST['stateId'] :0;
$command = isset($_POST['get']) ? $_POST['get'] : "";
switch ($command) {
    case 'country':
        $statement = "SELECT id, name from tbl_countries";
        $dt = mysqli_query($con, $statement);
        while ($result = mysqli_fetch_array($dt)) {
            echo $result1 = "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
        }
        break;
    case "state":
         $result1 = "<option>Select State</option>";
         $statement = "SELECT id,name FROM tbl_states WHERE country_id=" . $countryId;           
         $dt = mysqli_query($con, $statement);   
         while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
         }
         echo $result1;
         break;
    case "city":
        $result1 = "<option>Select City</option>";
        $statement = "SELECT id, name FROM tbl_cities WHERE state_id=" . $stateId;
        $dt = mysqli_query($con, $statement);

        while ($result = mysqli_fetch_array($dt)) {
            $result1 .= "<option value=" . $result['id'] . ">" . $result['name'] . "</option>";
        }
        echo $result1;
        break;
    
}
exit();

?>