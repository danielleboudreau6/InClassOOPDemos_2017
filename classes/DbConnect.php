<?php

// Database Connecton file
// This is an object-oriented version of our database connection
// Object-oriented programming can speed up large development projects and make your codde more reusable.
// Class will become objects when instantiated.
// When an instance of a class comes to life, a special method is automatically called the constructor
// An object can also have properties (characteristics)
// ex: FirstName, LastName, Address, etc. 
// and methods (what is can do). 
// ex: AddPerson, UpdatePerson, DeletePerson, ShowPerson, etc.

// class will become an object (piece of code that holds properties and methods)
// we have to define the characteristics to give it life
// this "private" variable can only be seen between it's 2 curly braces - it can't be used anywhere else. 
// object keeps you from repeating the same code all the time. it is reusable.
 
// establish the database connection to the local database server and return the database connection handler

class DbConnect{
    private $conn;  //hold the connection
    function __construct() {  // empty constructor - initialise variables (object oriented)
    }
    function connect(){
        
        // 1. Get connection info
        require_once dirname($_SERVER['DOCUMENT_ROOT']).'/DBconn/2017_oop_connect.php';
        
        // 2. Make the connection
        $this->conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
        
        // 3. Set error reporting level
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // 4. Return the connection resource back to calling environment
        return $this->conn;  // has to return      
    }
}

// INFORMATION HIDING
// Object oriented: set variable as private
// Declare as $this