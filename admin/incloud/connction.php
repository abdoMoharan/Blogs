<?php
    function coonect(){
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'blogs';
        $GLOBALS['conn'] = mysqli_connect($server,$username,$password,$dbname) or die(mysqli_error('blogs'));
    }
    
?>