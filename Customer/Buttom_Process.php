<?php
if (isset($_POST['delete'])) {
    include 'Delete.php';
    echo "Delete button was clicked";
} elseif (isset($_POST['update'])) {
    include 'update.php';
    echo "Update button was clicked";
}
?>