<?php
include('mysql_connect.php');
//print_r($_POST);
$data = $_POST;
$dataLength = count($_POST['tableData']);
$output = [];
//print_r($data);
for ($i = 0; $i < $dataLength; $i++) {
    foreach ($data as $value) {
        if(empty($value[$i]['bird_name'])){
            break;
        }
        if(empty($value[$i]['date'])){
            break;
        }
        $name = $value[$i]['bird_name'];
        $output['name'][] = $name;
        $male = $value[$i]['male'];
        $output['male'][] = $male;
        $female = $value[$i]['female'];
        $output['female'][] = $female;
        $unknown = $value[$i]['unknown'];
        $output['unknown'] = $unknown;
        $location = $value[$i]['location'];
        $output['location'][] = $location;
        $date = $value[$i]['date'];
        $output['date'][] = $date;
        $splitDate = explode(" ",$date);
        $month = $splitDate[0];
        $output['month'][] = $month;
        $day = $splitDate[1];
        $output['day'][] = $day;
        $year = $splitDate[2];
        $output['year'][] = $year;
        $query = "INSERT INTO birds (bird_name, male, female, unknown_gender, location, full_date, year, month, day) VALUES ('$name','$male','$female','$unknown','$location','$date','$year','$month','$day')";
        mysqli_query($conn,$query);
    }
};
$output = json_encode($output);
print($output)

?>