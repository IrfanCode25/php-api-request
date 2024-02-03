# php-api-request

package php yang digunakan untuk memudahkan proses http request untuk kebutuhan api integration

## Instalation

```bash
  composer require fancoders/php-api-request
```

## Usage

```bash
  require 'vendor/autoload.php';

  use Fancode\PhpApiRequest\ApiRequest;

  $baseUrl = 'https://jsonplaceholder.typicode.com';

  // Inisialisasi objek ApiRequest
  $apiRequest = new ApiRequest($baseUrl);

  // Contoh penggunaan metode GET
  $result = $apiRequest->get('/posts');
  // with query params
  $result = $apiRequest->get('/comments', ['postId' => 1]);


  // Contoh penggunaan metode POST
  $post = $apiRequest->post('/posts', [
   'userId' => 1,
   'title' => 'New Post',
   'body' => 'This is a new post.'
  ]);


  // Contoh penggunaan metode PUT
  $put = $apiRequest->put('/posts/1', [
   'title' => 'Updated Post',
   'body' => 'This post has been updated.'
  ]);


  // Contoh penggunaan metode PATCH
  $patch = $apiRequest->patch('/posts/1', [
   'title' => 'Updated Post',
   'body' => 'This post has been updated.'
  ]);


  // Contoh penggunaan metode DELETE
  $delete = $apiRequest->delete('/posts/1');

  // Tampilkan hasil
  echo "HTTP Status Code: {$result['status']}\n";
  echo "Response Body:\n";
  echo $result['response'] . "\n";

```

## Output

```bash
Array
(
    [status] => 200
    [response] => [
  {
    "postId": 1,
    "id": 1,
    "name": "id labore ex et quam laborum",
    "email": "Eliseo@gardner.biz",
    "body": "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"
  },
  {
    "postId": 1,
    "id": 2,
    "name": "quo vero reiciendis velit similique earum",
    "email": "Jayne_Kuhic@sydney.com",
    "body": "est natus enim nihil est dolore omnis voluptatem numquam\net omnis occaecati quod ullam at\nvoluptatem error expedita pariatur\nnihil sint nostrum voluptatem reiciendis et"
  },
  {
    "postId": 1,
    "id": 3,
    "name": "odio adipisci rerum aut animi",
    "email": "Nikita@garfield.biz",
    "body": "quia molestiae reprehenderit quasi aspernatur\naut expedita occaecati aliquam eveniet laudantium\nomnis quibusdam delectus saepe quia accusamus maiores nam est\ncum et ducimus et vero voluptates excepturi deleniti ratione"
  },
  {
    "postId": 1,
    "id": 4,
    "name": "alias odio sit",
    "email": "Lew@alysha.tv",
    "body": "non et atque\noccaecati deserunt quas accusantium unde odit nobis qui voluptatem\nquia voluptas consequuntur itaque dolor\net qui rerum deleniti ut occaecati"
  },
  {
    "postId": 1,
    "id": 5,
    "name": "vero eaque aliquid doloribus et culpa",
    "email": "Hayden@althea.biz",
    "body": "harum non quasi et ratione\ntempore iure ex voluptates in ratione\nharum architecto fugit inventore cupiditate\nvoluptates magni quo et"
  }
]
```
