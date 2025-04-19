<?php
    include("config.php");
    include("functions.php");

    $query = "SELECT * FROM bus_schedule";
    $result = $conn->query($query);

    foreach($result as $row){
//         echo '<div class="bus-card">
//     <div class="bus-header">
//         <h3>Driver:'.$row["driver"].'</h3>
//         <span class="status">'.$row["status"].'</span>
//     </div>
//     <div class="bus-info">
//         <div><strong>From:</strong>'.$row["source"].'</div>
//         <div class="time"><strong>Departure:</strong>'.$row["departure"].'</div>
//         <div><strong>To:</strong>'.$row["destination"].'</div>
//         <div class="time"><strong>Arrival:</strong>'.$row["arrival"].'</div>
//     </div>
//     <form method="post" id="delete-form">
//         <input type="hidden" name="user_id" value="'.$row["id"].'">
//         <button type="submit" name="delete">Delete</button>
//     </form>
// </div>';

echo '
    <div class="card">
        <div class="left">
            <div class="from">'.$row["source"].'</div>
            <div class="to"><b>To: </b>'.$row["destination"].'</div>
        </div>
        <div class="right">
            <div class="departure">
                <span>'.$row["departure"].'</span>
            </div>
            <div class="arrival">
                <span>'.$row["arrival"].'</span>
            </div>
        </div>
        <div class="bottom">
            <div class="driver"><b>Driver: </b>'.$row["driver"].'</div>
            <span class="status">'.$row["status"].'</span>
        </div>
    </div>';
    }
?>
