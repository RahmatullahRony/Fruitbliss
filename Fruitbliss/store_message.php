<?php

    class createMessage {

        private $errorMessage = "";

        function validatemsg($value) {
            foreach($value as $key=>$val) {
                if (empty($val)) {
                    $this->errorMessage .= "*$key is empty!<br>";
                } elseif ($key == "mname" && (!ctype_alpha(str_replace(' ', '', $val)) || strlen(trim($val)) == 0)) {
                    $this->errorMessage .= "*Invalid Name! <br>";
                } elseif ($key == "memail" && !filter_var($val, FILTER_VALIDATE_EMAIL)) {
                    $this->errorMessage .= "*Invalid Email! <br>";
                } elseif ($key == "message" && strlen(trim($val)) == 0) {
                    $this->errorMessage .= "*Invalid Message! <br>";
                }
            }
            if($this->errorMessage=="") {
                $this->storemsg($value);
                
            } else {
                return $this->errorMessage;
            }
        }

        function storemsg($value) {

            $userID=$_SESSION["user"];

            $name=ucwords(strtolower($value['mname']));
            $email=$value['memail'];
            $message=$value['message'];

            $quer = "INSERT INTO messages(userID,name,email,message)
            VALUES('$userID','$name','$email','$message')";

            $database = new connectDatabase();

            $database->write($quer);
        }

    }

