
<?php


$document->HeadAdd('        <title>Society of the Divine Word | Philippines Southern Province</title>
<meta name="description" content="Official web page of Divine Word Missionaries working in southern part of the Philippines.">');


$image[1] = "background-image: url('images/main01.jpg');background-position: 50% 40%;";
$image[2] = "background-image: url('images/main02.jpg');background-position: 50% 55%;";
$image[3] = "background-image: url('images/main03.jpg');background-position: 50% 50%;";
$image[4] = "background-image: url('images/main04.jpg');background-position: 50% 40%;";
$image[5] = "background-image: url('images/main06.jpg');background-position: 50% 40%;";
$image[6] = "background-image: url('images/main07.jpg');background-position: 50% 15%;";

$document->mainBanner = "";

for($i=1;$i<=6;$i++){
  $document->mainBanner .= '<div class="my-main-page mySlides w3-animate-main w3-display-container" style="'.$image[$i].'" id="home'.$i.'">
  <div class="w3-display-bottomleft w3-container w3-text-white w3-round-large" style="background: rgba(0, 0, 0, 0.7)">
    <h1 class="w3-tangerine" style="margin-top:0px;" >Society of the Divine Word</h1>
    <h5 style="margin-top:-20px;margin-bottom:5px;"><b>Philippines Southern Province</b></h5>
  </div>
  </div>';
};

$document->MainTextAdd('
    <h1 class="my-heading">St. Arnold Janssen</h1>');

$document->footerAdd('
  <script>
  var myIndex = 0;
  carousel();

  function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}
      x[myIndex-1].style.display = "block";
      setTimeout(carousel, 8000);
  }
  </script>');
?>
