<?php
    require_once('credentials.php'); //database connection  file
    require_once('main_class.php'); //parent class file
    require_once('tutor_class.php'); //sub class file
    require_once('subject_class.php'); //sub class file

    $db = db_connect(); // call the connection; 
    DigitalTutor::set_database($db); // class 'becomes aware'about the database 
?>