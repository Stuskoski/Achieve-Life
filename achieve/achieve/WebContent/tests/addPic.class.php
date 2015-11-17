<?php 
include_once("../models/Database.class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>File Upload To Database</title></head>
  <body>
  <h2>Please Choose a File and click Submit</h2>
  <form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
  <div><input name="image" type="file" /></div>
  <div><input type="submit" value="Submit" /></div>
  </form>



<?php

if(!isset($_FILES['image']))
{
	echo '<p>Please select a file</p>';
}
else
{
	try    {
		upload();
		/*** give praise and thanks to the php gods ***/
		echo '<p>Thank you for submitting</p>';
	}
	catch(Exception $e)
	{
		echo '<h4>'.$e->getMessage().'</h4>';
	}
}

	
function upload(){
	
$tmpName = $_FILES['image']['tmp_name'];	
	
/*** check if a file was uploaded ***/
if(is_uploaded_file($tmpName) && getimagesize($tmpName) != false)
    {
    /***  get the image info. ***/
    $size = getimagesize($tmpName);
    /*** assign our variables ***/
    $type = $size['mime'];
    $imgfp = fopen($_FILES['image']['tmp_name'], 'rb');
   // $data = fread($imgfp, filesize($tmpName));
    //$data = addslashes($data);
    $size = $size[3];
    $name = $_FILES['image']['name'];
    $maxsize = 99999999;
    $user = "admin1";

	
    
    /***  check the file is less than the maximum file size ***/
    if($_FILES['image']['size'] < $maxsize )
        {
        /*** connect to db ***/
        $dbh = Database::getDB();

            /*** our sql query ***/
        $stmt = $dbh->prepare("INSERT INTO picture (image_type ,image, image_size, image_name, userName) VALUES (? ,?, ?, ?, ?)");

        echo $type . "<br>". $imgfp . "<br>" . $size . "<br>" . $name . "<br>";
        
        /*** bind the params ***/
        $stmt->bindParam(1, $type);
        $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
        $stmt->bindParam(3, $size);
        $stmt->bindParam(4, $name);
        $stmt->bindParam(5, $user);

        /*** execute the query ***/
        $stmt->execute();
        }
    else
        {
        // if the file is not less than the maximum allowed, print an error
        throw new Exception("File Size Error");
        }
    }
else
    {
    /*** throw an exception is image is not of type ***/
    throw new Exception("Unsupported Image Format!");
    }
}



?>
</body>
</html>
