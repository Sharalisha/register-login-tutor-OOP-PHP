<?php

class DigitalTutor {

	static protected $db;

		static public function set_database($db) {      /*Database Connection */
			self::$db = $db;
        }
    

		public function reg_tutor($table, $fields){     /*Tutor registration*/
			$sql = "";
			$sql .= "INSERT INTO " .$table;
			$sql .= "(" .implode(",", array_keys($fields)). ") VALUES ";        //combine array elements with string 
			$sql .= "('" .implode("','", array_values($fields)). "')";
			$query = self::$db->query($sql);       //excutes the SQL statment and holds the result set
				if ($query){
					 $no = self::$db->insert_id;     //to get the auto incremneted (PK) of the last record inserted
					return $no;	
				}
        }
    

        public function reg_subject($subCode, $subTitle, $subDes, $subFee, $id) {     /*Subject Registration*/
            $query = "SELECT w1673560_subCode FROM 
                subject WHERE w1673560_subCode = '" . self::$db->real_escape_string($subCode) . "' LIMIT 1 ";
            
            $resultSet = self::$db->query($query);
            
            if ($resultSet->num_rows == 0) {
                $query = "INSERT INTO subject (w1673560_subCode, w1673560_subtitle, w1673560_subDescription,w1673560_subFee, w1673560_ID)
                        VALUES ('". self::$db ->real_escape_string($subCode)."',
                        '". self::$db ->real_escape_string($subTitle)."',
                        '". self::$db ->real_escape_string($subDes)."',
                        '". self::$db ->real_escape_string($subFee)."',
                        '". $id ."')";

                $insert = self::$db->query($query);
                echo $insert;
                if (!$insert) {
                    echo self::$db ->error;
                } else {
                    return true;
                }
            } else {
                echo "<script> alert('This Subject $subTitle[$key] already exists')</script>";
            }   
        }


        public function check_username($username) {
            $sql2="SELECT w1673560_ID from tutor WHERE w1673560_username='$username'"; //sql select statement
            
			//checking if the username is available in the table
        	$result = self::$db->query($sql2);
        	$user_data = $result->fetch_array();
        	$count_row = $result->num_rows;

	        if ($count_row  > 0) { 
	            return true;
	        } else {
			    return false;
			}
        }

        public function fetch_record($table, $params){  /*Fetching tutor and Subject Records from db */
            if($params == "all") {      //if $params is equal to fails to select all records from table
                $sql = "SELECT * FROM $table";
            } else {                    // else only the recoards where ID is equal to $params
                $sql = "SELECT * FROM $table WHERE w1673560_ID = $params";    
            }
    
            $array = array();   //an empty array
            $query = self::$db->query($sql);
            while ($sub = $query->fetch_assoc()) {     //result set stored in associative array 
                $array[] = $sub;
            }
            return $array;
        }

		
		public function verify_Tutor($username, $password){      /* process for validating the tutor*/
            $sql2="SELECT w1673560_ID from tutor WHERE w1673560_username='$username' and w1673560_password='$password'"; //sql select statement
            
			//checking if the username is available in the table
        	$result = self::$db->query($sql2);
        	$user_data = $result->fetch_array();
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
				$_SESSION['w1673560_ID'] = $user_data['w1673560_ID'];
				$_SESSION['w1673560_username'] = $user_data['w1673560_username'];  
			  	$_SESSION['w1673560_password'] = $user_data['w1673560_password'];  
	            return true;
	        } else{
			    return false;
			}
        }
        
    
        public function select_record($table, $where){      /*To select a row */
            $sql       = "";
            $condition = "";
                foreach ($where as $key => $value) {
                    $condition .= $key . "='" . $value . "' AND ";
                }

            $condition = substr($condition, 0, -5);
            $sql .= "SELECT * FROM " . $table . " WHERE " . $condition;
            $query = self::$db->query($sql);
            $row   = $query->fetch_array();
            return $row;
        }
    

        public function update_record($table, $where, $fields){         /*Update Subject Details */
            $sql       = "";
            $condition = "";
                foreach ($where as $key => $value) {
                    $condition .= $key . "='" . $value . "' AND ";
                }
            $condition = substr($condition, 0, -5);
                foreach ($fields as $key => $value) {
                    $sql .= $key . "='" . $value . "', ";
            }

            $sql = substr($sql, 0, -2);         //to trim string parts
            $sql = "UPDATE " . $table . " SET " . $sql . " WHERE " . $condition; //sql update query to update database table
            if (self::$db->query($sql)) {
                return true;
            }
        }
    

        public function delete_record($table, $where){   /*Delete Subject Details */
            $sql       = "";
            $condition = "";
                foreach ($where as $key => $value) {
                    $condition .= $key . "='" . $value . "' AND ";
                }

            $condition = substr($condition, 0, -5); //to trim string parts
            $sql       = "DELETE FROM " . $table . " WHERE " . $condition;         //sql delete query to update database table
            if (self::$db->query($sql)) {
                return true;
            }
        } 

        
	    public function get_session(){          /*** starting the session ***/
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
        }
    }

    ?>