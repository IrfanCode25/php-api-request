<?php

namespace Fancode\PhpApiRequest;

class ApiRequest
{
   private $baseUrl;

   public function __construct($baseUrl)
   {
      $this->baseUrl = rtrim($baseUrl, '/');
   }

   public function get($endpoint, $params = [])
   {
      $url = $this->buildUrl($endpoint, $params);
      return $this->makeRequest($url, 'GET');
   }

   public function post($endpoint, $data = [])
   {
      $url = $this->buildUrl($endpoint);
      return $this->makeRequest($url, 'POST', $data);
   }

   public function put($endpoint, $data = [])
   {
      $url = $this->buildUrl($endpoint);
      return $this->makeRequest($url, 'PUT', $data);
   }

   public function patch($endpoint, $data = [])
   {
      $url = $this->buildUrl($endpoint);
      return $this->makeRequest($url, 'PATCH', $data);
   }

   public function delete($endpoint, $data = [])
   {
      $url = $this->buildUrl($endpoint);
      return $this->makeRequest($url, 'DELETE', $data);
   }

   private function buildUrl($endpoint, $params = [])
   {
      $url = $this->baseUrl . '/' . ltrim($endpoint, '/');
      if (!empty($params)) {
         $url .= '?' . http_build_query($params);
      }
      return $url;
   }

   private function makeRequest($url, $method, $data = [])
   {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      switch ($method) {
         case 'POST':
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
         case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
         case 'PATCH':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
         case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
            // Tambahkan metode lain jika diperlukan
      }

      $response = curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);

      return [
         'status' => $httpCode,
         'response' => $response,
      ];
   }
}
