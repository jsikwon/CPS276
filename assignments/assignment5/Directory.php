<?php

    $msg = "";
class createDirectory() {
    public function addFile() { 
        if(isset($_POST["submitButton"]))
        
        $success = mkdir($folderName);

        chmod($folderName, 0777);

            $file = fopen("directories/$folderName/readme.txt", "w") or die("Cannot Open File");
                $content = $fileContent;
                fwrite($file, $content);
                fclose($file);

        if($success) {
            $msg = "File and directory where created\n <p><a href="https://russet-v8.wccnet.edu/~jwon1/CPS276/assignments/assignment5/directories/"$folderName"/readme.txt">Path where file is located</a></p>";

        } else {
            $msg = "A directory already exists with that name";
        }

        

}


?>