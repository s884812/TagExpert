<?php
class Database_Exception extends Exception {
    function __construct($sql) {
        $this->message="wrong query: $sql";
    }
}
?>
