<?php
$files = glob("*.php");
$files[] = "index.php";

foreach ($files as $file) {
    if (in_array($file, ['login.php', 'logout.php', 'check_auth.php', 'menu.php', 'connect.php', 'style.php', 'refactor_menu.php', 'verify_add.php'])) {
        continue;
    }
    
    $content = file_get_contents($file);
    
    // Add check_auth.php if not present
    if (strpos($content, 'check_auth.php') === false) {
        $content = "<?php require_once 'check_auth.php'; ?>\n" . $content;
    }
    
    // Replace cssmenu div with include
    $pattern = '/<div id=\'cssmenu\'>.*?<\/div>/s';
    $replacement = "<?php include 'menu.php'; ?>";
    
    $new_content = preg_replace($pattern, $replacement, $content);
    
    // Some files might have index.html links that need updating
    $new_content = str_replace('index.html', 'index.php', $new_content);
    
    if ($new_content !== null) {
        file_put_contents($file, $new_content);
        echo "Updated $file\n";
    }
}
echo "Done.\n";
?>
