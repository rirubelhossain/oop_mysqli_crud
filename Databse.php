<?php
class Database{
    public $host = DB_HOST ;
    public $root = DB_USER ; 
    public $pass = DB_PASS ;
    public $dbname = DB_NAME ;

    public $link ;
    public $error ;

    private function connectDB(){
        $this->link = new mysqli($this->host , $this->root , $this->pass , $this->dbname);

        if(!$this->link ){
            $this->error = "Connection Failed";
        }
    }

}

?>