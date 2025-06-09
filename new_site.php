<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $description = $_POST['description'] ?? '';
    $category = $_POST['category'] ?? '';

    if ($title && $url && $description && $category) {
        $newSite = [
            'title' => $title,
            'url' => $url,
            'description' => $description,
            'category' => $category
        ];

        $file = __DIR__ . '/data/sites.json';
        $sites = [];

        if (file_exists($file)) {
            $json = file_get_contents($file);
            $sites = json_decode($json, true);
        }

        $sites[] = $newSite;
        file_put_contents($file, json_encode($sites, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header('Location: confirm.php');
        exit;
    } else {
        echo "Усі поля обов'язкові!";
    }
}
?>

<form method="post">
    <label>Назва сайту: <input type="text" name="title" required></label><br>
    <label>URL: <input type="url" name="url" required></label><br>
    <label>Опис:<br><textarea name="description" required></textarea></label><br>
    <label>Категорія: <input type="text" name="category" required></label><br>
    <button type="submit">Додати сайт</button>
</form>
