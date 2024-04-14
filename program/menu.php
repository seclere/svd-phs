<?php

class Menu
{
	public $MENU;
  public $REVERSE_MENU;
	public $num_of_items;
  public $current_menu;
  public $generating_menu;

  public function add_top_menu_item($name,$link,$setting="")
  {
    $this->MENU["main"][$link]["name"] = $name;
    $this->MENU["main"][$link]["setting"] = $setting;
    $this->REVERSE_MENU[$link] = "main";
  }

  public function add_menu_item($parent,$name,$link,$setting="")
  {
    $this->MENU[$parent][$link]["name"] = $name;
    $this->MENU[$parent][$link]["setting"] = $setting;
    $this->REVERSE_MENU[$link] = $parent;
  }

  public function find_link_in_menu()
  {
    global $request_name;

    $this->current_menu[0] = "";
    $this->current_menu[1] = "";
    $this->current_menu[2] = "";

    if (($parent1 = $this->REVERSE_MENU[$request_name]) == ""){
      return;
    }

    if (($parent1 = $this->REVERSE_MENU[$request_name]) == "main"){
      $this->current_menu[0] = $request_name;
      return;
    }

    if (($parent2 = $this->REVERSE_MENU[$parent1]) == "main"){
      $this->current_menu[0] = $parent1;
      $this->current_menu[1] = $request_name;
      return;
    }

    $this->current_menu[0] = $parent2;
    $this->current_menu[1] = $parent1;
    $this->current_menu[2] = $request_name;

  }

  public function define_menu()
  {
    $this->add_top_menu_item("About us","/About-us");
      $this->add_menu_item("/About-us","History","/History");
      $this->add_menu_item("/About-us","Founder","/Arnold-Janssen");
      $this->add_menu_item("/About-us","First Missionary","/Joseph-Freinademetz");
      $this->add_menu_item("/About-us","SVD Generalate","/SVD-Generalate");
      $this->add_menu_item("/About-us","SVD Philippines","/SVD-Philippines");
      $this->add_menu_item("/About-us","SVD Philippines Southern Province","/SVD-Philippines-Southern-Province");
      $this->add_menu_item("/About-us","Vision","/Vision");
      $this->add_menu_item("/About-us","Mission","/Mission");
      $this->add_menu_item("/About-us","Administration","/Administration");
      $this->add_menu_item("/About-us","Members List","/Members-List");

    $this->add_top_menu_item("Apostolates","/Apostolates");
      $this->add_menu_item("/Apostolates","Education","/Education");
        $this->add_menu_item("/Education","USC","/USC");
        $this->add_menu_item("/Education","HNU","/HNU");
        $this->add_menu_item("/Education","LVD","/LVD");
      $this->add_menu_item("/Apostolates","Formation","/Formation");
        $this->add_menu_item("/Formation","DWFC","/DWFC");
        $this->add_menu_item("/Formation","SJFFH","/SJFFH");
      $this->add_menu_item("/Apostolates","Pastoral","/Pastoral");
        $this->add_menu_item("/Pastoral","Parishes","/Parishes");
        $this->add_menu_item("/Pastoral","Adopted Communities","/Adopted-Communities");
        $this->add_menu_item("/Pastoral","Cultural Communities","/Cultural-Communities");
        $this->add_menu_item("/Pastoral","Hospital Chaplaincy","/Hospital-Chaplaincy");
        $this->add_menu_item("/Pastoral","Retreat House","/Retreat-House");
        $this->add_menu_item("/Pastoral","Other Services","/Other-Services");

    $this->add_top_menu_item("Four Characteristic Dimension","/Four-Characterstic-Dimension","w3-hide-medium");
		  $this->add_menu_item("/Four-Characterstic-Dimension","Bible","/Bible");
			$this->add_menu_item("/Four-Characterstic-Dimension","JPIC","/JPIC");
			$this->add_menu_item("/Four-Characterstic-Dimension","Mission Animation","/Mission-Animation");
			$this->add_menu_item("/Four-Characterstic-Dimension","Communication","/Communication");

    $this->add_top_menu_item("Mission Partners","/Mission-Partners","w3-hide-medium");
		 $this->add_menu_item("/Mission-Partners","Divine Word Hospital","/Divine-Word-Hospital");
		 $this->add_menu_item("/Mission-Partners","HNU Medical Center Foundation, Inc.","/HNU-Medical-Center-Foundation-Inc");
		 $this->add_menu_item("/Mission-Partners","Catholic Trade Cebu, Inc.","/Catholic-Trade-Cebu-Inc");
		 $this->add_menu_item("/Mission-Partners","Steyler, Inc.","/Steyler-Inc");
		 $this->add_menu_item("/Mission-Partners","Word Brodcasting Corporation","/Word-Brodcasting-Corporation");
		 $this->add_menu_item("/Mission-Partners","Divine Spring Purified Water","/Divine-Spring-Purified-Water");

    $this->add_top_menu_item("News","/News");
    $this->add_top_menu_item("Contacts","/Contacts");

  }

    private function print_top_menu_item($menu_item_link,$menu_item_array)
    {
      return '          <a href="'.$menu_item_link.'" class="w3-bar-item w3-button w3-padding w3-hide-small '.$menu_item_array[$menu_item_link]["setting"].' my-upper">'.$menu_item_array[$menu_item_link]["name"].'</a>'."\n";
    }

    private function print_top_more_menu_item($menu_item_link,$menu_item_array)
    {
      return '              <a href="'.$menu_item_link.'" class="w3-bar-item w3-button my-upper">'.$menu_item_array[$menu_item_link]["name"].'</a>'."\n";
    }

    private function print_small_menu_item($menu_item_link,$menu_item_array,$level,$active=0)
    {
      $indent = 16 + $level*10;
      if ($level == 0) {$class_add .= ' my-upper';}
      if ($active) {$class_add .= ' w3-blue-grey';}

      return '        <a href="'.$menu_item_link.'" class="w3-bar-item w3-button'.$class_add.'" style="padding:6px '.$indent.'px;">'.$menu_item_array[$menu_item_link]["name"].'</a>'."\n";
    }

    private function print_left_menu_item($menu_item_link,$menu_item_array,$level,$active=0)
    {
      $indent = 16 + $level*10;
      if ($level == 0) {$class_add .= ' my-upper';}
      if ($active) {$class_add .= ' w3-light-grey';}

      return '                <a href="'.$menu_item_link.'" class="w3-bar-item w3-button'.$class_add.'" style="padding:3px '.$indent.'px;">'.$menu_item_array[$menu_item_link]["name"].'</a>'."\n";
    }

    private function gen_primary_menu()
    {
      if (reset($this->MENU["main"]) !== false)
      do {
        $link = key($this->MENU["main"]);

        $tmp_text .= $this->print_top_menu_item($link,$this->MENU["main"]);
      } while (next($this->MENU["main"]) !== false);

      return $tmp_text;
    }

    private function gen_more_menu()
    {
      if (reset($this->MENU["main"]) !== false)
      do {
        $link = key($this->MENU["main"]);

        if ($this->MENU["main"][$link]["setting"] == "w3-hide-medium"){
          $tmp_text .= $this->print_top_more_menu_item($link,$this->MENU["main"]);
        }
      } while (next($this->MENU["main"]) !== false);

      return $tmp_text;
    }

    private function gen_small_menu()
    {
      if (reset($this->MENU["main"]) !== false)
      do {
        $link = key($this->MENU["main"]);

        $actual = 0;
        if ($this->current_menu[0] == $link && $this->current_menu[1] == "") $actual = 1;

        $tmp_text .= $this->print_small_menu_item($link,$this->MENU["main"],0,$actual);
        if ($this->current_menu[0] == $link){
          $actual_item1 = $link;

          if (!is_array($this->MENU[$actual_item1])) continue;

          if (reset($this->MENU[$actual_item1]) !== false)
          do {
            $link = key($this->MENU[$actual_item1]);

            $actual = 0;
            if ($this->current_menu[1] == $link && $this->current_menu[2] == "") $actual = 1;

            $tmp_text .= $this->print_small_menu_item($link,$this->MENU[$actual_item1],1,$actual);
            if ($this->current_menu[1] == $link){
              $actual_item2 = $link;

              if (!is_array($this->MENU[$actual_item2])) continue;

              if (reset($this->MENU[$actual_item2]) !== false)
              do {
                $link = key($this->MENU[$actual_item2]);

                $actual = 0;
                if ($this->current_menu[2] == $link) $actual = 1;

                $tmp_text .= $this->print_small_menu_item($link,$this->MENU[$actual_item2],2,$actual);
              } while (next($this->MENU[$actual_item2]) !== false);
            }
          } while (next($this->MENU[$actual_item1]) !== false);
        }
      } while (next($this->MENU["main"]) !== false);

      return $tmp_text;
    }

    public function navigation_menu()
    {

      $this->define_menu();
      $this->find_link_in_menu();

      $tmp_text .='<div class="w3-top">
        <div class="w3-bar w3-metro-dark-blue w3-card">
          <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
          <a href="/" class="w3-bar-item w3-button" style="padding:8px 14px 6px 14px!important"><i class="fa fa-home" style="font-size:25px"></i></a>
'.$this->gen_primary_menu().'
          <div class="w3-dropdown-hover w3-hide-large w3-hide-small">
            <button class="w3-padding w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
            <div class="w3-dropdown-content w3-bar-block w3-metro-dark-blue w3-card-4">
'.$this->gen_more_menu().'
            </div>
          </div>
        </div>
      </div>
      <div id="navBar" class="w3-bar-block w3-metro-dark-blue w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px;">
'.$this->gen_small_menu().'
      </div> ';

      return $tmp_text;
    }

  public function gen_left_menu()
  {
    //$actual = 0;
    $actual = 1;

    if ($this->current_menu[0] == ""){
      return;
    }

    $tmp_text .= $this->print_left_menu_item($this->current_menu[0],$this->MENU[main],0,$actual);

    if (!is_array($this->MENU[$this->current_menu[0]])) return;

    if (reset($this->MENU[$this->current_menu[0]]) !== false)
    do {
      $link = key($this->MENU[$this->current_menu[0]]);

      $actual = 0;
      if ($this->current_menu[1] == $link && $this->current_menu[2] == "") $actual = 1;

      $tmp_text .= $this->print_left_menu_item($link,$this->MENU[$this->current_menu[0]],1,$actual);

      $actual_item = $link;
      if (!is_array($this->MENU[$actual_item])) continue;
      if (reset($this->MENU[$actual_item]) !== false){

        $tmp_text .='            <div class="w3-bar-block w3-medium">';
        do {
          $link = key($this->MENU[$actual_item]);

          $actual = 0;
          if ($this->current_menu[2] == $link) $actual = 1;

          $tmp_text .= $this->print_left_menu_item($link,$this->MENU[$actual_item],2,$actual);
        } while (next($this->MENU[$actual_item]) !== false);
        $tmp_text .= '            </div>';
      }
    } while (next($this->MENU[$this->current_menu[0]]) !== false);

    return $tmp_text;
  }

  public function leftMenu()
  {
    $tmp_text = '            <div class="w3-bar-block w3-collapse w3-large w3-hide-small" >
              <div class="w3-text-metro-dark-blue" style="font-weight:bold">
'.$this->gen_left_menu().'
              </div>
            </div>';

    return $tmp_text;
  }
}

?>
