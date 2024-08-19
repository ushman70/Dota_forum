<?php
class Main_Sections
{
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getMainSecs($table='main_section'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function getmainsecthreads($threadname){
        $result = $this->db->con->query("SELECT * FROM thread WHERE thread_name='$threadname'");
        $stmnt2= $result->num_rows;
        return $stmnt2;
    }

   
}


?>