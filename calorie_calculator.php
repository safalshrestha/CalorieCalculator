<?php

include ("../includes/config.inc.php");
$objSite->siteOfflineStaus();
$objSite->languageSession();

$keyword = $objSite->filterInput($_GET['keyword']);
$page = $objSite->filterInput($_GET['page']);
$ppage = $objSite->filterInput($_GET['ppage']);

$offset = $page * $ppage;
$items = $objSite->getMultiValue(
    "*",
    $CFG['table']['food_calories'], 
    "Shrt_Desc LIKE '%$keyword%' LIMIT $offset, $ppage" 
);

$response['npages'] = 1;
$response['page'] = 0;
$response['nitems'] = 8790;
$response['data'] = $items;

echo json_encode($response);
?>