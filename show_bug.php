<?php
// show_product.php <id>
require_once "bootstrap.php";
$id = $argv[1];
$bug = $entityManager->find("Bug", $id);
if ($bug === null) {
    echo "No bug found.\n";
    exit(1);
}
echo sprintf("Bug: %s\nEngineer: %s", $bug->getDescription(), $bug->getEngineer()->getName());
