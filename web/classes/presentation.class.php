<?php

class tmpPresentation extends Presentation {
	public $title;
	public $contents;
	public $page;
	
	public $header;
	public $footer;
	
	private function createHeader( $title ) {
		$this->header = preg_replace("/{%TLE%}/", $title, file_get_contents("./views/header.tmp.php"));
	}
	
	private function createFooter() {
		$this->footer = file_get_contents("./views/footer.tmp.php");
	}
	
	public function generatePage( $title, $contents ) {
		$this->createHeader( $title );
		$this->createFooter();
		if ($contents == false) {
			$this->page = $this->header . "<h2>No result found for that code</h2>" . $this->footer;
		} else if (is_array($contents)) { 
			$this->page = $this->header;
			
			// Create the page
			$tableView['wrap']['before'] = '<h3>TfEL Maths Pedagogy <small>Shared Reflection</small></h3> <div class="row">';
			$tableView['wrap']['after'] = '</div>';
			$tableView['prefix'] = '<div class="col-md-6">';
			$tableView['postfix'] =  '</div></div>';
			$tableView['first'] = '<div class="thead nyd">Things that suggest this element <br><strong>is not yet developed</strong> in my classroom.</div> <div class="tborder">' . $contents[nyd];
			$tableView['second'] = '<div class="thead iwd">Things that suggest this element <br><strong>is well developed</strong> in my classroom.</div> <div class="tborder">' . $contents[iwd];
			
			// Deliver the page
			$this->page .= $tableView['wrap']['before'];
			$this->page .= $tableView['prefix'];
			$this->page .= $tableView['first'];
			$this->page .= $tableView['postfix'];
			$this->page .= $tableView['prefix'];
			$this->page .= $tableView['second'];
			$this->page .= $tableView['postfix'];
			$this->page .= $tableView['wrap']['after'];
			$this->page .= $this->footer;
		} else {
			$this->page = $this->header . $contents . $this->footer; 
		}
		return $this;
	}
}

?>