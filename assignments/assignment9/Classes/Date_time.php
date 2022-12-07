<?php
require 'Pdo_methods.php';

class Date_time extends PdoMethods{

	public function addNote(){
	
		$pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO date_notes (date_time, note_content ) VALUES (:dateTime, :noteContent)";

			 
	    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
	    $bindings = [
			[':dateTime',$_POST['dateTime'],'str'],
			[':noteContent',$_POST['noteContent'],'str']
		];

		/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
		$result = $pdo->otherBinded($sql, $bindings);

		/* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
		if($result === 'error'){
			return 'There was an error when adding the note';
		}
		else {
			return 'Note has been added';
		}
	}
	public function checkSubmit(){
		
		if(!isset($_POST['noteUpload'])){
			$output = <<<HTML
			  <p>You must enter the date, time and/or note in order to proceed</p>
HTML;
			}

	}

	/*THIS FUNCTION TAKES THE DATA AND RETURNS THE DATA IN INPUT ELEMENTS SO IT CAN BE EDITED.  */
	private function getNotes($records){
		$output .= "<table class='table table-bordered table-striped'><thead><tr>";
		$output .= "<th>Date and Time</th><th>Note</th><tbody>";
		foreach ($records as $row){
			$output .= "<tr><td><name='date_time^^{$row['id']}' value='{$row['date_time']}'></td>";

			$output .= "<td><name='note_content^^{$row['id']}' value='{$row['note_content']}'></td>";
		}
		
		$output .= "</tbody></table>";
		return $output;
	}
}



?>