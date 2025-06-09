<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Тут буде надсилання листа
    echo "<p>Дякуємо! Повідомлення надіслано.</p>";
} else {
?>
<form method="post">
    <label>Ім’я: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Повідомлення:<br><textarea name="message" required></textarea></label><br>
    <button type="submit">Надіслати</button>
</form>
<?php
}
?>
