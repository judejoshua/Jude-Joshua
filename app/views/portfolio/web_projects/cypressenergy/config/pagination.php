<?php
include('server.php');
 
$no_of_records_per_page = 4;

if (isset($_GET["pageno"])){ 
    $pageno  = $_GET["pageno"];
}else{ 
    $pageno = 1;
};

$start_from = ($pageno - 1) * $no_of_records_per_page;  

$sql = "SELECT * FROM `gallery` LIMIT $start_from, $no_of_records_per_page";
$res_data = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($res_data)){
    echo'
        <div class="gallery_holder">
            <div class="galery_holder_top">
                <div></div>
                <img src="'.base64_decode($row['i_loc']).''.$row['i_name'].'">
            </div>
            <div class="galery_holder_bottom">
                <h3 id="nam">'.$row['name'].'</h3>
                <h4 id="date">'.$row['date'].'</h4>
                <p id="des">'.$row['des'].'</p>
            </div>
        </div>
    ';
};							

$total_pages_sql = "SELECT COUNT(*) FROM `gallery`";
$result = mysqli_query($db, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


?> 

