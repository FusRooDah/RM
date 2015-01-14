<?php

function get_title($title) {
  global $FRD;
  return $title . (isset($FRD['title_append']) ? $FRD['title_append'] : null);
}
