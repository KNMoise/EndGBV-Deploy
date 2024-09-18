<?php 


function count_new_emails() {
    $query = "SELECT email_id FROM emails;";
    $query2 = mysqli_query($conn, $query);
    $query3 = mysqli_num_rows($query2);

    echo $query3;
}


 function FunctionName($id)
    {
        $select = "SELECT job_title FROM incomes WHERE job_id='$id';";
        $select2 = mysqli_query($conn, $select);
        while ($row = mysqli_fetch_assoc($select2)) {
            echo $row['job_title'];
        }
    }





