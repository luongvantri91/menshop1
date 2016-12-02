<?php
function confirm_query($result, $query){
        global $dbc;
        if(!$result){
            die ("Query {$query} \n <br> MYSQLI error:".mysqli_error($dbc));
        }
        else{
            return True;
        }
    } // end confirm_query
?>