<?php

class Document
{
	//toto je trieda na generovanie html kodu, ktory bol je definovany pomocou css.
	//v projekte sa tato rieda pouziva na vypisovanie vsetkych informacii
	private $imgLeft = 0;

	public $head;
	public $body;
  public $leftPanel;
  public $mainText;
  public $rightPanel;
  public $mainBanner;
  public $footer;
  public $secondContent;
	public $textArray = array();
	public $imgArray = array();
	public $printNow = 1;

	/**
	* Funkcia ktora vygeneruje html kod stranky. Html kod a css- vytvoril Marek Kočár.
	* su 4 časti kam sa da vpisovat text. $topmenu je horne menu, $leftmenu je lave menu,
	* $headerbox je vpravo hore uvitacia cast a $maindata su hlavne data stranky.
	* Tato funkcia sa vola nakoniec, pretoze uz vypise celu www-stranku.
	*/
	public function PrintDocument()
	{
		header('Content-type: text/html; charset=utf-8');

		echo '<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      '.$this->head.'
    </head>
    <body>
      '.$this->body.'
      '.$this->footer.'
    </body>
  </html>
';
	}

  public function HeadAdd($text){
    $this->head .= $text."\n";
  }

  public function BodyAdd($text){
    $this->body .= $text."\n";
  }

  public function LeftPanelAdd($text){
    $this->leftPanel .= $text."\n";
  }

  public function RightPanelAdd($text){
    $this->rightPanel .= $text."\n";
  }

  public function MainTextAdd($text){
    $this->mainText .= $text."\n";
  }

  public function FooterAdd($text){
    $this->footer .= $text."\n";
  }

  public function SecondContentAdd($text){
    $this->secondContent .= $text."\n";
  }

	/*<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
*/
  public function defaultHead()
  { global $document;
    $this->HeadAdd('<link rel="stylesheet" href="w3.css">

      <link rel="stylesheet" href="mystyle.css">
      <link rel="icon" href="images/svd_logo.svg" type="image/svg+xml" >
      <script src="default.js"></script>');
  }

  public function defaultLeftPanel()
  {
    $this->LeftPanelAdd('            <img src="images/svd_logo.svg" class="w3-round w3-margin-left" alt="Random Name" style="max-height:112px;max-width:100%;margin-bottom:5px;">');

  }

  public function defaultRightPanel()
  {
    $this->RightPanelAdd('            <i>The world is our parish</i> <br>
            <img src="images/svd_world_small.png" class="w3-round w3-margin-right" alt="SVD Activities in the World" style="max-height:112px;max-width:100%">');
  }

  public function mainBanner()
  {
    $image[1] = "background-image: url('images/main01.jpg');background-position: 50% 40%;";
    $image[2] = "background-image: url('images/main02.jpg');background-position: 50% 55%;";
    $image[3] = "background-image: url('images/main03.jpg');background-position: 50% 50%;";
    $image[4] = "background-image: url('images/main04.jpg');background-position: 50% 40%;";
    //$image[5] = "background-image: url('images/main05.jpg');background-position: 50% 48%;";
		$image[5] = "background-image: url('images/main06.jpg');background-position: 50% 60%;";
		$image[6] = "background-image: url('images/main07.jpg');background-position: 50% 12%;";

    $chosen_image = $image[rand(1,6)];

    $this->mainBanner = '      <div class="my-main-banner w3-display-container" style="'.$chosen_image.'">
        <div class="w3-display-bottomleft w3-container w3-text-white w3-round-large" style="background: rgba(0, 0, 0, 0.7)">
          <h1 class="w3-tangerine" style="margin-top:0px;" >Society of the Divine Word</h1>
          <h5 style="margin-top:-20px;margin-bottom:5px;"><b>Philippines Southern Province</b></h5>
        </div>
      </div>';
  }

   public function gen_main_content()
   {
      $this->BodyAdd('      <div class="w3-content" style="max-width:2000px;margin-top:26px;">
        <div class="w3-row">
          <div class="w3-center w3-col l3 m3 s12">
'.$this->leftPanel.'
          </div>
          <div class="w3-col l6 m9 s12">
            <div class="w3-container w3-content w3-center" style="max-width:1200px">
'.$this->mainText.'
            </div>
          </div>
          <div class="w3-center w3-col l3 m12 s12">
'.$this->rightPanel.'
          </div>
        </div>
      </div>');
     }

 public function defaultFooter()
 {
   $this->footerAdd('<footer class="w3-container w3-padding-16 w3-center w3-opacity w3-light-grey w3-xlarge">
        <p class="w3-medium">&copy; 2017-'.date('Y', time()).' Society of the Divine Word | Philippines Southern Province </p>
      </footer>');
  }

	/*public function paragraphAddNow($text)
	{
		//$this->mainText .= strlen($text);
	  $this->mainText .= '				<p class="my-paragraph">'.$text.'</p>'."\n";
	}*/

	public function heading1Add($text)
	{
		//$this->mainText .= strlen($text);
		$this->mainText .= '				<h1 class="my-heading">'.$text.'</h1>'."\n";
	}


	public function heading2Add($text)
	{
		//$this->mainText .= strlen($text);
		$this->mainText .= '				<h2 class="my-heading">'.$text.'</h2>'."\n";
	}

	public function heading3Add($text)
	{
		//$this->mainText .= strlen($text);
		$this->mainText .= '				<h3 class="my-heading">'.$text.'</h3>'."\n";
	}

	public function paragraphAdd($text)
	{
		$tmp_text = '				<p class="my-paragraph">'.$text.'</p>'."\n";

		if ($this->printNow) {
			$this->mainText .= $tmp_text;
		}
		else {
			array_push($this->textArray,$tmp_text);
		}

	}

	public function imageAdd($link,$description,$alt="")
	{
		if ($this->imgLeft == 0) {$align = 'my-image-right-container'; $this->imgLeft = 1;}
		else {$align = 'my-image-left-container'; $this->imgLeft = 0;}

		if ($alt == "") {$alt = $description;}
		if ($description != "") $desc_container = '				  <div class="w3-display-bottommiddle w3-container my-descript">'.$description.'</div>'."\n";

		$tmp_text =  '				<div class="w3-display-container '.$align.'">
				  <img src="'.$link.'" class="my-image" alt="'.$alt.'">
'.$desc_container.'				</div>'."\n";

		if ($this->printNow){
			$this->mainText .= $tmp_text;
		}
		else {
				array_push($this->imgArray,$tmp_text);
		}
	}

	public function printTextAndImages()
	{
		$pocet_znakov = 0;

		if (count($this->imgArray[$j]) < 1)

		for ($i=0;$i<count($this->textArray);$i++){
			$pocet_znakov += strlen($this->textArray[$i]);
		}

		$interval = $pocet_znakov / (count($this->imgArray) + 2);
		if ($interval < 1000) $interval = 1000;

		$j = 1; $pocet_znakov = 0;

		if (count($this->imgArray[$j]) > 0) $this->mainText .= $this->imgArray[0];

		for ($i=0;$i<count($this->textArray);$i++){
			$this->mainText .= $this->textArray[$i];
			$pocet_znakov += strlen($this->textArray[$i]);

			if (($pocet_znakov > $interval) && ($j < count($this->imgArray))) {
				$this->mainText .= $this->imgArray[$j];
				$j++; $pocet_znakov = 0;
			}
		}

		if ($j < count($this->imgArray)){
					//dorobit
		}
	}

	public function personCardAdd($heading1,$name,$image,$description)
	{
		if ($image == '') $image = "images/img_avatar.png";

		$this->mainText .= '<div class="w3-padding w3-col l6 m6 s12">
		<div class="w3-card-4">

	 <header class="w3-container w3-metro-dark-blue">
		 <h3>'.$heading1.'</h3>
	 </header>

 <div class="w3-container">
	 <p><b>'.$name.'</b></p>
	 <hr>
	 <img src="'.$image.'" alt="'.$name.'" class="w3-center w3-circle" style="width:70%">
	 <img src="images/pokus.png" alt="Address" class="w3-center" style="width:100%">';
	 //<p>'.$description.'</p>
 $this->mainText .= '</div>

 <div class="w3-container w3-dark-grey">
 &nbsp;
 </div>

 </div></div>';
	}
}
?>
