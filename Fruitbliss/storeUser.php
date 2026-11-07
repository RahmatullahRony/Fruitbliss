<?php

    class createUser {

        private $errorMessage = "";

        function validateData($value) {
            foreach($value as $key=>$val) {
                if(empty($val)) {
                    $this->errorMessage.="*".$key." is empty!<br>";
                } elseif($key=="firstName" && (is_numeric($val)||strstr($val," "))) {
                        $this->errorMessage .= "*Invalid First Name! <br>";
                } elseif($key=="lastname" && (is_numeric($val)||strstr($val," "))) {
                        $this->errorMessage .= "*Invalid Sur Name! <br>";
                } elseif($key=="address" && (is_numeric($val)||strstr($val," "))) {
                        $this->errorMessage .= "*Invalid Address! <br>";
                } elseif($key=="email" && !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$val)) {
                        $this->errorMessage .= "*Invalid Email! <br>";
                } elseif($key=="city" && $val=="City") {
                        $this->errorMessage .= "*Select City! <br>";
                } elseif($key=="password" && (strlen($val)<6 || strlen($val)>16)) {
                        $this->errorMessage .= "*Password Must Be Between 6 to 16 Characters! <br>";
                }
            }

            if($this->errorMessage=="") {
                $email = $value['email'];
                $quer = "SELECT * FROM USERS WHERE email = '$email'";
                $database = new connectDatabase();
                $get = $database->read($quer);
                if($get) {
                    $this->errorMessage .= "*Email Already In Use!";
                    return $this->errorMessage;
                } else {
                     $this->storeData($value);
                }
            } else {
                return $this->errorMessage;
            }
        }

        function storeData($value) {

            $userID=$this->userIdGenerate();

            $firstName=ucwords(strtolower($value['firstname']));
            $lastName=ucwords(strtolower($value['lastname']));
            $address = $value['address'];
            $gender = $value['inlineRadioOptions'];
            $city = $value['city'];
            $dob = $value['dob'];
            $email=$value['email'];


            $password=password_hash($value['password'],PASSWORD_BCRYPT);

            $dp = "img/avatar.jpg";

            $quer = "INSERT INTO USERS(userID,firstName,lastName,email,address,city,gender,password,dp,birthDate)
            VALUES('$userID','$firstName','$lastName','$email','$address','$city','$gender','$password','$dp','$dob')";

            $database = new connectDatabase();
            $table = $userID."table";
            $database->write($quer);

            /*$quer = "CREATE TABLE IF NOT EXISTS $table (
                id bigint(20) AUTO_INCREMENT PRIMARY KEY NOT NULL,
                userId varchar(100) ,
                friendid varchar(100) ,
                state varchar(100) ,
                date timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
              )";
            $database->write($quer);*/
        }

        private function userIdGenerate() {
            $data = openssl_random_pseudo_bytes(16);
            
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
            
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }

    }
?>

