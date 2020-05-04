<?php
session_start(); // Удерживаем сессию

include('bd.php');
$query = "SELECT orders.id, products, status, id_user, users.name as users_name, status.name as status_name, is_admin
   FROM orders JOIN users on id_user = users.id JOIN status on orders.status = status.id";
$ordersQuery = mysqli_query($link, $query);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Админка</h2>
<?php
if (!$_SESSION['is_admin']): // Проверка на админа
  echo 'Доступ разрешен только администраторам!';
  exit;
?>
</body>
</html>
<?php
endif;
// Визуализация статуса заказа
while ($row = mysqli_fetch_assoc($ordersQuery)):

  $products_html = '';
  foreach (json_decode($row['products']) as $product):

    $products_html .= <<<PRODUCT
<div class="products_row">
  <div class="good">{$product->good}</div>
  <div class="description">$product->description</div>
  <div class="price">{$product->price}</div>
  <div class="good_img">{$product->good_img}</div>
</div>
PRODUCT;
  endforeach;

  echo <<<ORDERS
<div class="orders">
<div class="orders__detail orders__detail-{$row['status_name']}">
<div class="id_user">{$row['users_name']}</div>
  <div class="status" id="status_{$row['id']}">{$row['status_name']}</div>
  <div class="date">{$row['date']}</div>
  <div>
  <input 
  type="button" 
  value="отказано" 
  class="button-status orders__button-reject" 
  name="reject"
  data-id="{$row['id']}"
  data-id_status="2"
  data-button="status">
  <input 
  type="button" 
  value="отправлен" 
  class="button-status orders__button-delivery" 
  name="delivery"
  data-id="{$row['id']}"
  data-id_status="3"
  data-button="status">
  <input 
  type="button" 
  value="выполнено" 
  class="button-status orders__button-success" 
  name="success"
  data-id="{$row['id']}"
  data-id_status="4"
  data-button="status">
  </div>
  </div>
  <div class="products_table">
    $products_html
  </div>
</div>
ORDERS;
endwhile;
?>
<script>
  const orders = document.querySelectorAll('.orders');

  for (const order of orders) {
    order.addEventListener('click', event => {
          if (event.target.dataset.button === 'status') {
            url = `update_status.php?id=${event.target.dataset.id}&status=${event.target.dataset.id_status}`;

            fetch(url)
                .then(data => data.json())
                .then(data => {
                  if (data === 1) {
                    const elem = document.getElementById(`status_${event.target.dataset.id}`);
                    elem.innerText = event.target.name;
                    elem.parentElement.classList.remove('orders__detail-reject', 'orders__detail-delivery', 'orders__detail-success');
                    elem.parentElement.classList.add(`orders__detail-${event.target.name}`);
                  }
                })
                .catch(err => console.log(err))
          }
        }
    )
  }
</script>
</body>
</html>