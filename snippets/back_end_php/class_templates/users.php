<?php



class Users
{

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


    // constructor (create users)
    function __construct($username , $password , $first_name , $last_name)
    {
        $this->username = $username;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }


    // non-static (object specific)





    // static (class specific)

    public static function find_user_by_id($id)
    {
        global $connectObj;

        $requird_user = $connectObj->query("SELECT * FROM users WHERE id = $id LIMIT 1");
        
        return $requird_user;
    }

    public static function verify_user($username , $password)
    {

        global $connectObj;
        
        $data = $connectObj->connection->prepare("SELECT * FROM users WHERE username = ? AND password = ? ");
        $data->execute([$username , $password]);

        $user_data = $data->fetch(PDO::FETCH_OBJ);

        return $user_data;

    }

    // CRUD
    public static function create($values)
    {
        global $connectObj;

        $connectObj->query_write("users" , ["username" , "password" , "first_name" , "last_name"] , $values);
    }

    public static function read($conditions = [])
    {
        global $connectObj;

        $data = $connectObj->query_read("users" , $conditions);

        return $data;

    }

    public static function update($set , $conditions)
    {
        global $connectObj;

        $connectObj->query_update("users" , $set , $conditions);
    }

    public static function delete($conditions = [])
    {
        global $connectObj;

        $connectObj->query_delete("users" , $conditions);
    }



}


?>