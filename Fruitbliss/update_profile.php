<?php

class updateUser
{

    private $errorMessage = "";

    function validateData($value)
    {
        foreach ($value as $key => $val) {
            if (empty($val)) {
                $this->errorMessage .= "*" . $key . " is empty!<br>";
            } elseif ($key == "firstName" && (is_numeric($val) || strstr($val, " "))) {
                $this->errorMessage .= "*Invalid First Name! <br>";
            } elseif ($key == "lastname" && (is_numeric($val) || strstr($val, " "))) {
                $this->errorMessage .= "*Invalid Sur Name! <br>";
            } elseif ($key == "address" && (is_numeric($val) || strstr($val, " "))) {
                $this->errorMessage .= "*Invalid Address! <br>";
            } elseif ($key == "email" && !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $val)) {
                $this->errorMessage .= "*Invalid Email! <br>";
            } elseif ($key == "city" && (is_numeric($val) || strstr($val, " "))) {
                $this->errorMessage .= "*Enter City! <br>";
            }
        }

        if ($this->errorMessage == "") {

            $this->storeData($value);
        } else {
            return $this->errorMessage;
        }
    }

    function storeData($value)
    {

        $userID = $_SESSION["user"];

        $firstName = ucwords(strtolower($value['firstName']));
        $lastName = ucwords(strtolower($value['lastName']));
        $address = $value['address'];
        $gender = $value['gender'];
        $city = $value['city'];
        $dob = $value['dob'];
        $email = $value['email'];





        $updateQuery = " UPDATE     users SET 
                                        firstname = '$firstName',
                                        lastname = '$lastName',
                                        address = '$address',
                                        gender = '$gender',
                                        city = '$city',
                                        birthDate = '$dob',
                                        email = '$email'
                                WHERE userID = '$userID'";


        $database = new connectDatabase();

        $database->write($updateQuery);
    }
}
