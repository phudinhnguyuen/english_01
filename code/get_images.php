<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$dir = "img/";

if (!is_dir($dir)) {
    echo json_encode(["error" => "Thư mục img/ không tồn tại"]);
    exit;
}

$files = glob($dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

if ($files === false || empty($files)) {
    echo json_encode(["error" => "Không thể đọc thư mục hoặc không có ảnh"]);
} else {
    echo json_encode(array_map("basename", $files));
}
?>
