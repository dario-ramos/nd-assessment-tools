<?php
/**
 * Simple script to test the PHP environment setup.
 * Save this file in your Apache web root: /var/www/html/
 */

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head><title>PHP Test</title><style>body { font-family: sans-serif; text-align: center; margin-top: 50px; background: #f0f4f8; color: #334155; } h1 { color: #1e3a8a; } .container { background: white; padding: 40px; border-radius: 12px; max-width: 600px; margin: auto; box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); }</style></head>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>✅ Hello, PHP World! Rasmus sapeee</h1>";
echo "<p>Your PHP environment is successfully configured on Ubuntu.</p>";
echo "<p>PHP version: <b>" . phpversion() . "</b></p>";
echo "<p>Server time: " . date('Y-m-d H:i:s') . "</p>";
echo "</div>";
echo "</body>";
echo "</html>";
?>
