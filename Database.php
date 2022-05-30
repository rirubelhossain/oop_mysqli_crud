<?php
class Database{
    public $host = DB_HOST ;
    public $root = DB_USER ; 
    public $pass = DB_PASS ;
    public $dbname = DB_NAME ;

    public $link ;
    public $error ;

    public function __construct(){
        $this->connectDB();
    }
    private function connectDB(){
        $this->link = new mysqli($this->host , $this->root , $this->pass , $this->dbname);

        if(!$this->link ){
            $this->error = "Connection Failed" . $this->link->connction_error;
            return false ;
        }
    }
    /// Select read or data 
    public function select($query ){
        $result = $this->link->query($query) or die($this->link->error . __LINE__) ; 

        if($result->num_rows > 0 ){
            return $result ;
        }else{
            return false ;
        }
    }
    public function insert($query){
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

        if($insert_row ){
            header("Location : index.php?msg = ".urlencode('Data Inserted successfully.'));
            exit();
        }else{
            die("Error : (".$this->link->error.")" . $this->link->error);
        }
    }
}

?>

 

        



