<?php
file_put_contents("config.json", json_encode($_POST, JSON_PRETTY_PRINT));
echo "Config saved.";
