<?php
require '../vendor/autoload.php';

use Fancode\PhpApiRequest\ApiRequest;

$baseUrl = 'https://jsonplaceholder.typicode.com';

// Inisialisasi objek ApiRequest
$apiRequest = new ApiRequest($baseUrl);

// Contoh penggunaan metode GET
// $result = $apiRequest->get('/users', ['page' => 1, 'limit' => 10]);
// $result = $apiRequest->get('/posts');
$result = $apiRequest->get('/comments', ['postId' => 1]);

// Tampilkan hasil
// echo "HTTP Status Code: {$result['status']}\n";
// echo "Response Body:\n";
// echo $result['response'] . "\n";
print_r($result);
