<?php
 

class post{
    // conexao
    private $conn;
    private $table = 'list';

    // propriedades 
    public $id;
    public $name;
    public $description;

    //construinso banco de dados
    public function __construct($db){
        $this->conn = $db;
    }

    //GET posts
    public function read(){
        //create query
        $query = 'SELECT id,
                         name,
                         description
                    FROM  ' . $this->table . ' ORDER BY name ASC';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    //Get single Post
    public function read_id(){
        //create query
        $query = 'SELECT    id,
                            name,
                            description
                    FROM    ' . $this->table . ' 
                    WHERE   id = ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(1, $this->id);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->name = $row['name'];
        $this->description = $row['description'];

    }

    //Get single Post name
    public function read_name(){
        //create query
        $query = 'SELECT    id,
                            name,
                            description                            
                    FROM ' . $this->table . '
                    WHERE  name = ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(1, $this->name);

        //Execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->description = $row['description'];
        
    }

    public function count_id(){
        //create query
        $query = 'SELECT  count(id) as id
                    FROM ' . $this->table . '
                    WHERE  id = ? ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(1, $this->id);

        //Execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

         //set properties
        $this->id = $row['id'];
        
    }    


    //Create Post
    public function create(){
        
        //create query
        $query = 'INSERT INTO '. $this->table .'
                    SET  name = :name, description = :description';

        //Prepare statment
        $stmt = $this->conn->prepare($query);

        //clear data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));

        //Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description );

        //Execute query
        if($stmt->execute()){

            return true;            

        }

        //print error
        printf("Error: %s. \n", $stmt->error);

        return false;

    }


    //Update Post
    public function update(){
        //create query
        $query = 'UPDATE '. $this->table .'
                    SET name = :name, description = :description
                    WHERE id= :id';

        //Prepare statment
        $stmt = $this->conn->prepare($query);

        //clear data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));

        //Bind data
        $stmt->bindParam(':id', $this->id);        
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);

        //Execute query
        if($stmt->execute()){

            return true;            

        }

        //print error
        printf("Error: %s. \n", $stmt->error);

        return false;

    }

    //Delete Post
    public function delete(){
        //Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        //Prepare statment
        $stmt = $this->conn->prepare($query);

        //Clear Data
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Bind Data
        $stmt->bindParam(':id',$this->id);

        //Execute Query
        if($stmt->execute()){

            return true;

        }

        // Print error is something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;

    }
}