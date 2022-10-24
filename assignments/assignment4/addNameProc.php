<?php
$output = "";
 class AddNamesProc {

   public function addName() { if(isset($_POST["submitButton"]))
        $fullName = $_POST["fullName"]
        foreach($fullName as $fullName) {
            $output .= "$fullName \n"; 
            }
            return $output;
    }

    public function addClearNames() { if(isset($_POST["clearButton"]))
                $output = $_POST["clearButton"];    
            }    
                return $output;
    }

?>
