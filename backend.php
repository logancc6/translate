<?php
$inputText = $_POST["inputText"];
$apiKey = "YOUR_API_KEY"; //替换为您的API密钥
$url = "https://translation.googleapis.com/language/translate/v2?key=".$apiKey;
$data = array(
	"q" => $inputText,
	"source" => "auto",
	"target" => "zh-CN"
);
$options = array(
	"http" => array(
		"header" => "Content-type: application/x-www-form-urlencoded\r\n",
		"method" => "POST",
		"content" => http_build_query($data)
	)
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$result = json_decode($response, true);
$outputText = $result["data"]["translations"][0]["translatedText"];
echo $outputText;
?>
