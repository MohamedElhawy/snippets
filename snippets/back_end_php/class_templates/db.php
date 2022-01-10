<?php


    class Database
    {

        private $db_host;
        private $db_user;
        private $db_pass;
        private $db_name;
        private $db_dbms;
        public $connection;



        // constructor
        function __construct($h,$u,$p,$n,$d)
        {
            $this->db_host = $h;
            $this->db_user = $u;
            $this->db_pass = $p;
            $this->db_name = $n;
            $this->db_dbms = $d;

            $this->connect();

        }


        // non-static (object specific)
        private function connect()
        {

            try
            {
                $this->connection = new PDO( $this->db_dbms . ":" . "host=" . $this->db_host . ";dbname=" . $this->db_name , $this->db_user , $this->db_pass );
                
                echo "Connection Successful! 🚀";

            }
            catch(PDOException $e)
            {
                echo "Connection : Failed! 😿" . $e->getMessage();
                
                die();
            }


        }




        // static (class specific)

        // custom query
        function query($sql)
        {
            $data = $this->connection->query($sql);

            return $data->fetch(PDO::FETCH_OBJ);
        }




        // CRUD : READ Query
        function query_read($table , $conditions = [])
        {
            $counter = 1;
            $counter2 = 1;

            $q = "SELECT * FROM $table";

            foreach($conditions as $column => $value)
            {

                if ($counter === 1)
                {
                    $q = $q . " WHERE "; 
                }

                $q = $q . $column . " = " . ':v' . $counter;

                if ( $counter !== count($conditions) )
                {
                    $q = $q . " AND ";
                }

                $counter++;
            }

            $prepare_q = $this->connection->prepare($q);

            
            foreach( $conditions as $column => $value )
            {

                $prepare_q->bindParam( "v" . $counter2 , $value );

                $counter2++;
            }
            
            $prepare_q->execute();

            return $prepare_q->fetchAll(PDO::FETCH_OBJ);


        }




        // CRUD : write Query
        function query_write($table , $columns , $values)
        {
            $counter = 1;

            $columns_modified = implode( "," , $columns);

            $q = "INSERT INTO $table ($columns_modified) VALUES ( ";

            foreach( $columns as $column )
            {
                $q = $q . "?";

                if ( $counter !== count($columns) )
                {
                    $q = $q . ", ";
                    $counter++;
                }
            }

            $q = $q . ")";

            $prepare_q = $this->connection->prepare($q);
            
            $prepare_q->execute($values);

            return true;
        }





        // CRUD : update Query
        function query_update($table , $set ,  $conditions = [])
        {
            $counter = 1;
            $counter2 = 1;

            $q = "UPDATE $table SET ";

            foreach($set as $column => $value)
            {

                $q = $q . $column . " = " . ':s' . $counter;

                if ( $counter !== count($set) )
                {
                    $q = $q . " , ";
                }

                $counter++;
            }


            $counter = 1;

            foreach($conditions as $column => $value)
            {

                if ($counter === 1)
                {
                    $q = $q . " WHERE "; 
                }

                $q = $q . $column . " = " . ':w' . $counter;

                if ( $counter !== count($conditions) )
                {
                    $q = $q . " AND ";
                }

                $counter++;
            }


            $prepare_q = $this->connection->prepare($q);

            foreach( $set as $column => $new )
            {
                $prepare_q->bindParam( "s" . $counter2 , $new );

                $counter2++;
            }

            $counter2 = 1;

            foreach( $conditions as $column => $value )
            {
                $prepare_q->bindParam( "w" . $counter2 , $value );

                $counter2++;
            }

            

            
            $prepare_q->execute();

            return true;


        }



        // CRUD : delete Query
        function query_delete($table , $conditions = [])
        {
            $counter = 1;
            $counter2 = 1;

            $q = "DELETE FROM $table";

            foreach($conditions as $column => $value)
            {

                if ($counter === 1)
                {
                    $q = $q . " WHERE "; 
                }

                $q = $q . $column . " = " . ':v' . $counter;

                if ( $counter !== count($conditions) )
                {
                    $q = $q . " AND ";
                }

                $counter++;
            }

            $prepare_q = $this->connection->prepare($q);

            
            foreach( $conditions as $column => $value )
            {

                $prepare_q->bindParam( "v" . $counter2 , $value );

                $counter2++;
            }
            
            $prepare_q->execute();

            return true;

        }









    }


    // class object
    $connectObj = new Database("localhost" , "root" , "", "gallery_db", "mysql");



?>