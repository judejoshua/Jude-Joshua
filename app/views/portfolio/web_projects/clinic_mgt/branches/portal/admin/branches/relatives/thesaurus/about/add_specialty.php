<?php

    include('../../../../config/server.php');

    $sql = mysqli_query($db, "INSERT INTO `specialties`(`id`, `specialty`) VALUES ('', '')");
    if($sql){
        mysqli_close($db);
        header('location: ./');
    }else{
        mysqli_close($db);
        echo '
            <script>
                document.write("Action failed and a disaster occurred!!");
            </script>
        ';
    };

    


?>