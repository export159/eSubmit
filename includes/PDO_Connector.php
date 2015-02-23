<?php

class PDO_Connector{
    protected $dbh = null;
    
    protected function connect(){
        $dsn = 'mysql:dbname=db_esubmit;host=localhost';
        $user = 'root';
        $password = '';
        
        try{
            $this->dbh = new PDO($dsn, $user, $password);
            
        }catch(PDOException $e){
            print_r($e);
        }
    }
    
    protected function close(){
        try{
            $this->dbh = null;
        }  catch (PDOException $e){
            print_r($e);
        }
    }
}