<?php

require_once 'classes/Contact.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $contact_id = $_GET['id'];

  $contact = new Contact();

  if ($contact->delete($contact_id)) {
    header('Location: index.php?message=contact_deleted');
    exit();
  } else {
    header('Location: index.php?message=error');
    exit();
  }
} else {
  header('Location: index.php?message=error');
  exit();
}
?>
