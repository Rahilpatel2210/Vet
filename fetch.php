<?php
//fetch.php;

session_start();
$sql = "SELECT user FROM users";
$user = $_SESSION['username'];

if(isset($_POST["view"]))
{
    $connect = mysqli_connect("localhost", "root", "", "test");
    $date = date("Y-m-d");
 
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE comments SET comment_status=1 WHERE comment_status=0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM comments  ORDER BY comment_id DESC LIMIT 4 ";
 $result = mysqli_query($connect, $query);

 
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $VacDate = $row["VacDate"];  
    $dateTimestamp1 = strtotime($date); 
    $dateTimestamp2 = strtotime($VacDate);
    
  
  
    if ($dateTimestamp1 < $dateTimestamp2) {
        $output .= '
        <li>
        <a href="#">
            <strong>'.$row["Pname"].'</strong><br />
            <small><em>'.$row["comment_subject"].'</em></small><br />
            <small><em>'.$row["VacDate"].'</em></small><br/>
            <strong style="color: red;"><em>'."Reminder on".'</em></strong> 

        </a>
        </li>
        <li class="divider"></li>
        ';}
    else{
        $output .= '
        <li>
        <a href="#">
            <strong>'.$row["Pname"].'</strong><br />
            <small><em>'.$row["comment_subject"].'</em></small><br />
            <small><em>'.$row["VacDate"].'</em></small><br/>
            <strong style="color: blue;"><em>'."Reminder off".'</em></strong> 

        </a>
        </li>
        <li class="divider"></li>
        ';
    }

}
  } else
    {
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }
 
    $query_1 = "SELECT * FROM comments WHERE comment_status=0";
    $result_1 = mysqli_query($connect, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
    'notification'   => $output,
    'unseen_notification' => $count
    );
    echo json_encode($data);
}

?>




