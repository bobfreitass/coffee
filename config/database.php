<?php


class database {
    //ARAMETROS DE CONEXAO COM O MySQL
    private $host = 'localhost'; //INFORME O ENDEREÇO DO SEU SERVIDOR MySQL
    private $db_name = 'coffee'; //INFORME O  NOME PARA SEU BANCO DE DADOS
    private $username = 'root';  //INFORME SEU USUÁRIO NO MySQL   
    private $password = '';      //INFORME O SUA SENHA NO MySQL
    private $conn;               //ATENCAO: CASO  ALTERE O NOME DO BANCO DE DADOS, SERA NECESSARIO ALTERA-LO NAS PROXIMAS 2 LINHAS ABAIXO!  
    private $SQL_INPORT = " CREATE DATABASE coffee;             

                            use coffee;
                            
                            SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
                            SET AUTOCOMMIT = 0;
                            START TRANSACTION;
                            SET time_zone = '+00:00';                

                            CREATE TABLE list (
                                id int(11) NOT NULL PRIMARY KEY,
                                name varchar(255) NOT NULL,
                                description varchar(255) NOT NULL
                            );  

                            COMMIT;
                            
                            INSERT INTO list (id, name, description) VALUES
                            (1, 'Café Espresso', 'O café espresso (ou expresso, dependendo da preferência de escrita) é um dos principais tipos de café – e é a base de diversos outros. O nome “espresso” vem do italiano “espremido, pressionado”. Ele é feito em poucos segundos sob alta pressão de água na t'),
                            (2, 'Café Macchiato', 'O macchiato é muito parecido com o café espresso, mas adiciona uma dose de leite vaporizado para suavizar o sabor intenso do espresso. Ao redor do mundo, os baristas costumam fazer pequenas variações no macchiato, embora sempre sigam os procedimento básic'),
                            (3, 'Café Ristretto', 'O ristretto é uma versão mais concentrada do café espresso padrão. '),
                            (4, 'Café Latte', 'O Café Latte não é exatamente uma forma sofisticada de se tratar do café com leite. Em sua receita original. '),
                            (5, 'Capuccino', 'Leite, chocolate, café , canela com chantily');  
                            
                            COMMIT;
                            
                            ALTER TABLE list
                            MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;                
                            
                            COMMIT;            
                            ";

  


    //CONEXÃO
    public function connect(){
        $this->conn = null;

        try{

            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e ){
                    

            try{

                $this->conn = new PDO('mysql:host=' . $this->host . ';' , $this->username, $this->password);
                $this->conn->exec($this->SQL_INPORT)  or die(print_r($dbh->errorInfo(), true));

                $this->conn = null;
                
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                

            }catch(PDOException $e ){                

                print("{'status' : 'failure'}");
                die; 

            }
            
        }

        return $this->conn;
      
    }



}