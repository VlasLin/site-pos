<?php
$category = $_GET['cat'] ?? '';
$sites = [];

$file = __DIR__ . '/data/sites.json';
if (file_exists($file)) {
    $json = file_get_contents($file);
    $sites = json_decode($json, true);
}

$filtered = array_filter($sites, function($site) use ($category) {
    return strtolower($site['category']) === strtolower($category);
});

include 'bread.php';

echo "<h1>Категорія: " . htmlspecialchars($category) . "</h1>";

foreach ($filtered as $site) {
    echo "<div class='site-block'>";
    echo "<a href='{$site['url']}' target='_blank'>{$site['title']}</a><br>";
    echo "<p>{$site['description']}</p>";
    echo "</div>";
}
?>
