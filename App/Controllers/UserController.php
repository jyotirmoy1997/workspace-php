<?php

    namespace App\Controllers;

    use Framework\Database;
    use Framework\Validation;

    class UserController{
        protected $db;

        public function __construct()
        {
            $config = require basePath('config/db.php');
            $this->db = new Database($config);
        }

        /**
         * Login Function
         * @return void
         */

        public function login(){
            loadView('users/login');
        }

        /**
         * Create Function
         * @return void
         */
        public function create(){
            loadView('users/create');
        }

        /**
         * Store user in database
         * @return void
         */
        public function store(){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $password = $_POST["password"];
            $passwordConfirmation = $_POST["password_confirmation"];

            $errors = [];

            // Validation

            if(!Validation::email($email)){
                $errors['email'] = "Please Enter a valid email";
            }

            if(!empty($errors)){
                loadView('users/create', [
                    'errors' => $errors,
                    'user' => [
                        'name' => $name,
                        'email' => $email,
                        'city' => $city,
                        'state' => $state
                    ]
                ]
                );
            }
               

            inspectAndDie('Store');
        }
    }

?>