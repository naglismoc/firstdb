<?php
include "./models/User.php";
    class UserController{

        public static function index(){
          $users = User::all();
          return $users;
        }

        public static function show()
        {
            $user = User::find($_POST['id']);
            return $user;
        }

        public static function store()
        {
            /*
            patikrinimai,validacia
            */

            if(true){ // if data provided in input are bad. like bad email or so on.
                session_start();
                $_SESSION['errors'][] = "blogas emailas3";
                $_SESSION['errors'][] = "blogas telnumeris3";
                return true;
            }else{
                User::create();
                return false;
            }
        }

        public static function update()
        {
            User::update();
        }

        public static function destroy()
        {
            User::destroy();
        }
    }

?>