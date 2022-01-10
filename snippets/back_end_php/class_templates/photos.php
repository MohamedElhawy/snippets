<?php



class Photos
{

    public $id;
    public $title;
    public $description;
    public $filename;


    // constructor (create users)
    function __construct($title , $description , $filename)
    {
        $this->title = $title;
        $this->description = $description;
        $this->filename = $filename;
    }


    // non-static (object specific)





    // static (class specific)

    public static function find_photo_by_id($id)
    {
        global $connectObj;

        $requird_photo = $connectObj->query("SELECT * FROM photos WHERE id = $id LIMIT 1");
        
        return $requird_photo;
    }


    // CRUD
    public static function create($values)
    {
        global $connectObj;

        $connectObj->query_write("photos" , ["title" , "description" , "filename"] , $values);
    }

    public static function read($conditions = [])
    {
        global $connectObj;

        $data = $connectObj->query_read("photos" , $conditions);

        return $data;

    }

    public static function update($set , $conditions)
    {
        global $connectObj;

        $connectObj->query_update("photos" , $set , $conditions);
    }

    public static function delete($conditions = [])
    {
        global $connectObj;

        $connectObj->query_delete("photos" , $conditions);
    }



}


?>