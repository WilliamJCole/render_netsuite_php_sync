<?php
$config = file_exists("../config.json") ? json_decode(file_get_contents("../config.json"), true) : [];
?>

<!DOCTYPE html>
<html>
<head>
  <title>NetSuite Sync GUI</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <h2>NetSuite File Sync Config</h2>
  <form method="POST" action="../save_config.php">
    <label>Source Folder Path:</label>
    <input type="text" name="source_dir" value="<?= $config['source_dir'] ?? '' ?>" required>

    <label>NetSuite Folder ID:</label>
    <input type="text" name="ns_folder_id" value="<?= $config['ns_folder_id'] ?? '' ?>" required>

    <label>Account (NetSuite):</label>
    <input type="text" name="account" value="<?= $config['account'] ?? '' ?>" required>

    <label>Consumer Key:</label>
    <input type="text" name="consumer_key" value="<?= $config['consumer_key'] ?? '' ?>" required>

    <label>Consumer Secret:</label>
    <input type="text" name="consumer_secret" value="<?= $config['consumer_secret'] ?? '' ?>" required>

    <label>Token ID:</label>
    <input type="text" name="token_id" value="<?= $config['token_id'] ?? '' ?>" required>

    <label>Token Secret:</label>
    <input type="text" name="token_secret" value="<?= $config['token_secret'] ?? '' ?>" required>

    <label>Schedule (Cron format):</label>
    <input type="text" name="cron_schedule" placeholder="e.g. */10 * * * *" value="<?= $config['cron_schedule'] ?? '' ?>">

    <button type="submit">Save & Schedule</button>
  </form>
</body>
</html>
