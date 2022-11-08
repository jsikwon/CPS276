<?php

class Page {
	public function nav(){
		$nav = <<<NAV
      <nav>
        <ul>
          <li><a href="index.php">File Upload</a></li>
          <li><a href="fileUploadProc.php">Upload File</a></li>
          <li><a href="displayFiles.php">Show File List</a></li>
        </ul>
      </nav>
NAV;
		return $nav;
	}
}