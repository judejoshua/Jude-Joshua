<?php

spl_autoload_register(
    function($cFile){
        $fullPath = "../../../app/models/" . $cFile . ".model.php";
        if(!file_exists($fullPath)){
            return false;
        }else{
            include_once $fullPath;
        }
    }
);

switch($_POST){
    case isset($_POST['firstName']):
        switch (true) {
            default:
                $user = new User;
                $input = new Input;

                $array = [
                    'first name'=>$_POST['firstName'],
                    'last name'=>$_POST['lastName'],
                    'phone number'=>$_POST['phoneNumber'],
                    'email'=>$_POST['email'],
                    'sector'=>isset($_POST['sector']) ? $_POST['sector'] : '',
                    'designation'=>isset($_POST['designaton']) ? $_POST['designaton'] : '',
                    'password'=>$_POST['password'],
                    'confirm password'=>$_POST['confirmPassword'],
                ];

                $emptyCheck = $input->caseEmpty($array);
                if($emptyCheck === true){
                    $checkEmail = $input->checkEmail($array['email']);
                    if ($checkEmail == $array['email']) {
                    
                        $passwordCheck = $input->checkPassword($array['password'], $array['confirm password']);

                        if ($passwordCheck == $array['password']) {

                            $_SESSION['designation'] = 'dev_admin';
                            $_SESSION['sector'] = 'dev_admin_sector';

                            $array['rank'] = $_POST['rank'];
                            $array['added_by'] = $_SESSION['name'];
                            $array['added_by_designation'] = $_SESSION['designation'];
                            $array['added_by_sector'] = $_SESSION['sector'];

                            $array = $input->sanitizeInput($array);

                            $array['password'] = password_hash($array['password'], PASSWORD_BCRYPT, array("cost" == 10));

                            echo $user->addUser($array);

                        }else{
                            echo $passwordCheck;
                        }

                    }else{
                        echo $checkEmail;
                    }
                }else{
                    echo $emptyCheck;
                }
            break;
        }
    break;
}