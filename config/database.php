<?php

/**
 *  two ways we can connect to sql DB with php
 * - mySqli
 * - pdo (PHP Data Object)
 */
//CONSTANTS
 define('DB_HOST', 'localhost');
 define('DB_USER', 'eddie');
 define('DB_PASS', '123456');
 define('DB_NAME', 'php_dev');

 //CREATE CONNECTION

 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);