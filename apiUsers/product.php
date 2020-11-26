<?php
    class Product{
  
        // database connection and table name
        private $conn;
        private $table_name = "users";
      
        // object properties
        public $id;
        public $btcdatetime;
        public $price;
        public $volume;
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        function read(){
  
            // select all query
            $query = "SELECT * FROM ". $this->table_name ." ORDER BY id DESC LIMIT 1;";
          
            // prepare query statement
            $stmt = $this->conn->prepare($query);
          
            // execute query
            $stmt->execute();
          
            return $stmt;
        }
        // public function create(){
        //     $query = "INSERT INTO ". $this->table_name ." SET btcdatetime = :btcdatetime, price = :price, volume = :volume";

        //     $stmt = $this->conn->prepare($query);
        //     //bind
        //     $stmt ->bindParam(':btcdatetime', $this->btcdatetime);
        //     $stmt ->bindParam(':price', $this->price);
        //     $stmt ->bindParam(':volume', $this->volume);

            
        //     if($stmt->execute()){
        //         return true;
        //     }
        //     printf("Error: %s.\n".$stmt->error);
        //     return false;
        // }
        public function update(){
            //$query = "INSERT INTO ". $this->table_name ." SET btcdatetime = :btcdatetime, price = :price, volume = :volume";
            //$query = "UPDATE ". $this->table_name ." SET USD = USD - '$price', KCE = KCE + '$volume' WHERE id='$id';";
            $query = "UPDATE ". $this->table_name ." SET USD = USD - :price, KCE = KCE + :volume WHERE id= :id";

            $stmt = $this->conn->prepare($query);
            //bind
            $stmt ->bindParam(':id', $this->id);
            $stmt ->bindParam(':price', $this->price);
            $stmt ->bindParam(':volume', $this->volume);

            
            if($stmt->execute()){
                return true;
            }
            printf("Error: %s.\n".$stmt->error);
            return false;
        }
        public function buyusd(){
            //$sql = "UPDATE users SET USD = USD + '$money' WHERE id = '$id';";
            $query = "UPDATE ". $this->table_name ." SET USD = USD + :money WHERE id= :id";

            $stmt = $this->conn->prepare($query);
            //bind
            $stmt ->bindParam(':id', $this->id);
            $stmt ->bindParam(':money', $this->money);
            //$stmt ->bindParam(':volume', $this->volume);

            
            if($stmt->execute()){
                return true;
            }
            printf("Error: %s.\n".$stmt->error);
            return false;
        }
        public function transferTo(){
            // $sql = "UPDATE users SET KCE = KCE - '$volume' WHERE id = '$givenId';";
            // $sql .= "UPDATE users SET KCE = KCE + '$volume' WHERE id = '$nameTo' ;";
            //$query = "UPDATE ". $this->table_name ." SET KCE = KCE - :volume WHERE id= :givenId";
            $query = "UPDATE ". $this->table_name ." SET KCE = KCE + :volume WHERE username= :idTo";

            $stmt = $this->conn->prepare($query);
            //bind
            $stmt ->bindParam(':idTo', $this->idTo);
            $stmt ->bindParam(':volume', $this->volume);
            //$stmt ->bindParam(':volume', $this->volume);

            
            if($stmt->execute()){
                return true;
            }
            printf("Error: %s.\n".$stmt->error);
            return false;
        }
        public function transferFrom(){
            // $sql = "UPDATE users SET KCE = KCE - '$volume' WHERE id = '$givenId';";
            // $sql .= "UPDATE users SET KCE = KCE + '$volume' WHERE id = '$nameTo' ;";
            $query = "UPDATE ". $this->table_name ." SET KCE = KCE - :volume WHERE id= :idFrom";
            //$query = "UPDATE ". $this->table_name ." SET KCE = KCE + :volume WHERE id= :nameTo";

            $stmt = $this->conn->prepare($query);
            //bind
            $stmt ->bindParam(':idFrom', $this->idFrom);
            $stmt ->bindParam(':volume', $this->volume);
            //$stmt ->bindParam(':volume', $this->volume);

            
            if($stmt->execute()){
                return true;
            }
            printf("Error: %s.\n".$stmt->error);
            return false;
        }
        public function sell(){
            //$query = "INSERT INTO ". $this->table_name ." SET btcdatetime = :btcdatetime, price = :price, volume = :volume";
            //$query = "UPDATE ". $this->table_name ." SET USD = USD - '$price', KCE = KCE + '$volume' WHERE id='$id';";
            $query = "UPDATE ". $this->table_name ." SET USD = USD + :price, KCE = KCE - :volume WHERE id= :id";

            $stmt = $this->conn->prepare($query);
            //bind
            $stmt ->bindParam(':id', $this->id);
            $stmt ->bindParam(':price', $this->price);
            $stmt ->bindParam(':volume', $this->volume);

            
            if($stmt->execute()){
                return true;
            }
            printf("Error: %s.\n".$stmt->error);
            return false;
        }
    }