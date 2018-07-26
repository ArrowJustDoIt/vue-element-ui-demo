<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');

$arr = file_get_contents('data.json');
//獲取數據
$arrArr = json_decode($arr,true);


if(empty($_GET['type'])){
	print_r($arr);
}elseif($_GET['type'] == 'show'){

	$id = $_GET['id'];
	$data = getDataById($arrArr,$id);
	print_r(json_encode($data));

}elseif($_GET['type'] == 'insert'){

	//獲取數據
	$_GET['date'] = date("Y-m-d",strtotime($_GET['date']));
	$_GET['id'] = $arrArr[count($arrArr) - 1]['id'] + 1;
	$arrArr[] = $_GET;
	file_put_contents('data.json', json_encode($arrArr));

}elseif($_GET['type'] == 'update'){

	$_GET['date'] = date("Y-m-d",strtotime($_GET['date']));
	$id = $_GET['id'];
	$arrArr[$id] = $_GET;
	file_put_contents('data.json', json_encode($arrArr));

}elseif($_GET['type'] == 'delete'){

	$id = $_GET['id'];
	$data = delDataById($arrArr,$id);
	file_put_contents('data.json', json_encode($data));

}

function getDataById($data,$id){
	foreach ($data as $k => $v) {
		if($v['id'] == $id){
			$returnData = $v;
			break;
		}
	}
	return $returnData;
}

function delDataById($data,$id){
	foreach ($data as $k => $v) {
		if($v['id'] == $id){
			unset($data[$k]);
		}
	}
	return $data;
}