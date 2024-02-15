<?php

    namespace App\Controllers;

    use Framework\Database;
    use Framework\Validation;


    class ListingController{
        protected $db;
        public function __construct(){
            $config = require basePath('config/db.php');
            $this->db = new Database($config);
        }
        public function index(){
            $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

            loadView('listings/index', [
                'listings' => $listings
            ]);
        }
        public function create(){
            loadView('listings/create');
        }
        public function show($params){
            $id = $params['id'] ?? '';

            // inspectAndDie($id);

            $params = [
                'id' => $id
            ];

            $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

            // Check if listing exists
            if(!$listing){
                ErrorController::notFound('Listing Not Found');
                return;
            }
            
            loadView('listings/show', [
                'listing' => $listing
            ]);
        }
        public function store(){
            $allowedFileds = [
                'title',
                'description',
                'salary',
                'tags',
                'company',
                'address',
                'city',
                'state',
                'phone',
                'email',
                'requirements',
                'benefits'
            ];

            $newListingData = array_intersect_key($_POST, array_flip($allowedFileds));

            $newListingData['user_id'] = 1;

            $newListingData = array_map('sanitize', $newListingData);
            
            $requiredFileds = [
                'title',
                'description',
                'city',
                'state',
                'email',
            ];

            $errors = [];

            foreach($requiredFileds as $field){
                if(empty($newListingData[$field]) || !Validation::string($newListingData[$field])){
                    $errors[$field] = ucfirst($field) . ' is required';
                }
            }

            // inspectAndDie($newListingData);

            if(!empty($errors)){
                // Reload View With Errors
                loadView('listings/create', [
                    'errors' => $errors
                ]);
            }
            else{
                // Submit Data
                $fields = [];
                foreach($newListingData as $field => $value){
                    $fields[] = $field;
                }

                $values = [];
                foreach($newListingData as $field => $value){
                    // Convert empty strings to null
                    if($value === ''){
                        $newListingData[$field] = null;
                    }
                    $values[] = ':' . $field;
                }

                $fields = implode(', ', $fields);
                $values = implode(', ', $values);
                

                $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";

                $this->db->query($query, $newListingData);

                header('Location: /listings');
                exit;
            }
        }
    }

