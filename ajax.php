<?php
$con = mysqli_connect('localhost','root','123456','Form'); //connect to database

// $con = mysqli_select_db($con,'Form');

$data = json_decode(file_get_contents('php://input'));

// $countryId = isset($_POST['countryId']) ? $_POST['countryId'] :0;
// $stateId = isset($_POST['stateId']) ? $_POST['stateId'] :0;
$command = isset($data->get) ? $data->get : "";
$cid = isset($data->cid) ? $data->cid : "";
$countryId = isset($data->countryId) ? $data->countryId : "";
switch ($command) {
    case 'country':
        $statement = "SELECT id, name from tbl_countries";
        $dt = mysqli_query($con, $statement);
        $arr = [];
        while ($result = mysqli_fetch_array($dt)) {
            if($cid != '' && $cid == $result['id'])
            $selected = "selected";
             else
            $selected = '';
            $result1 .= '<option value="'.$result['id'].'" '.$selected.'>'.$result['name'].'</option>';
            array_push($arr,$result1);
        }
        $c = ['country'=>$arr];
        echo json_encode($c);
        break;
    case "state":
         $result1 = "<option>Select State</option>";
         $statement = "SELECT id,name FROM tbl_states WHERE country_id=". $countryId;  
         $dt = mysqli_query($con, $statement);   
         $arr1 = [];
         while ($result = mysqli_fetch_array($dt)) {
            if($sid != '' && $sid == $result['id'])
                 $selected = "selected";
             else
                $selected = '';
            $result1 = '<option value="'.$result['id'].'" '.$selected.'>'.$result['name'].'</option>';
            array_push($arr1,$result1);
         }
         $s = ['state'=>$arr1];
         echo json_encode($s);
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