<?php
$query = $_GET['q'] ?? '';
$sites = [];

$file = __DIR__ . '/data/sites.json';
if (file_exists($file)) {
    $json = file_get_contents($file);
    $sites = json_decode($json, true);
}

$filtered = array_filter($sites, function($site) use ($query) {
    return stripos($site['title'], $query) !== false || stripos($site['description'], $query) !== false;
});

echo "<h2>Результати пошуку за: " . htmlspecialchars($query) . "</h2>";

foreach ($filtered as $site) {
    echo "<div class='site-block'>";
    echo "<a href='{$site['url']}' target='_blank'>{$site['title']}</a><br>";
    echo "<p>{$site['description']}</p>";
    echo "</div>";
}
?>
