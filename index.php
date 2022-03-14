<?php

$html = file_get_contents("https://time.com/");
$latest_items="";
preg_match_all('/<li class="latest-stories__item">(.*?)<\/li>/is', $html, $latest_items);
$result_array=array();
foreach ($latest_items[1] as $item) {
	
	preg_match_all('/<a href="([^"]+)">.*<h3 class="latest-stories__item-headline">([^<]+)<\/h3>/is', $item, $output_array);	
	$link="https://time.com".trim($output_array[1][0]);
	$title=trim($output_array[2][0]);
	$temp_array = array('title' => $title, 'link' => $link);
	array_push($result_array,json_encode($temp_array));
}
	echo json_encode($result_array);

?>