<?php 

class CNavigation { 
  public static function GenerateMenu($items, $class) { 
      $ref = basename($_SERVER["PHP_SELF"]); 
    $html = "<nav class='{$class}'>\n"; 
    foreach($items as $item) { 
        $selected = $ref == $item["url"] ? "class='selected'" : ""; 
      $html .= "<a href='{$item['url']}' {$selected} >{$item['text']}</a>\n"; 
    } 
    $html .= "</nav>\n"; 
    return $html; 
  } 
}; 
