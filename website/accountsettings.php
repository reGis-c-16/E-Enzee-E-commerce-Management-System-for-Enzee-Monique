<input type="file" name="customer_image" id="customer_image" accept=".jpg, .jpeg, .png" >
<?php
if($_FILES["customer_image"]["error"] === 4){
        echo
        "<script> alert('Image Does not Exist'); </script>"
        ;
    }
    else{
        $filename = $_FILES["customer_image"]["name"];
        $filesize = $_FILES["customer_image"]["size"];
        $tempname = $_FILES["customer_image"]["tmp_name"];

        $validImageExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.' , $filename);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension,$validImageExtension)){
            echo
            "<script> alert('Invalid Image Extension'); </script>"
            ; 
        }
        else if($filesize > 10000000){
            echo
        "<script> alert('Image Size is too Large'); </script>"
        ;
        }
        else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tempname, 'img/customer/'. $newImageName);
        }
    }
?>