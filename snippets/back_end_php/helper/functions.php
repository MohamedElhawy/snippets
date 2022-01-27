<?php

    // help redirecting to other files relative to current file used
    function redirect($location)
    {
        header("Location: $location");
    }



    // help store uploaded files from input type "file"
    function upload_file($file , $target_directory)
    {

        if ($file["error"] === 0)
        {

            echo "<h1 style='color: white;'>Photo Upload : success!</h1>";

            // seperating the file name to (file name , file extension) in order to add time number between them
            $str = $file["name"];

            $arr_str = explode(".",$str);

            $result = "";

            for ( $i = 0 ; $i < count($arr_str) - 1 ; $i++)
            {
                $result = $result . $arr_str[$i];
            }

            $file_type = $arr_str[count($arr_str) - 1];

            move_uploaded_file( $file["tmp_name"] , $target_directory . "/" . $result . time() . "." . $file_type );

            // return the path to the file (from the root of the server) ----> Bug here : wrong path fix later
            // return  __DIR__ . "\\" . $target_directory . "\\" .  $result . time() . "." . $file_type;
            return  $target_directory . "\\" .  $result . time() . "." . $file_type; // i think this is the solution (check)

        }
        else
        {

            if ( $file["error"] === 1 )
            {
                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            }

            if ( $file["error"] === 2 )
            {
                echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
            }

            if ( $file["error"] === 3 )
            {
                echo "The uploaded file was only partially uploaded.";
            }
            
            if ( $file["error"] === 4 )
            {
                echo "No file was uploaded.";
            }

            if ( $file["error"] === 6 )
            {
                echo "Missing a temporary folder.";
            }

            if ( $file["error"] === 7 )
            {
                echo "Failed to write file to disk.";
            }

            if ( $file["error"] === 8 )
            {
                echo "A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.";
            }


        }


    }





?>