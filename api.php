<?php
require_once 'classes/Contact.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $contact = new Contact();
  $action = $_POST['action'] ?? '';
  if ($action === 'delete') {
    $id = $_POST['id'] ?? 0;
    if ($id > 0) {
      if ($contact->delete($id)) {
        echo json_encode(['status' => 'success', 'message' => 'Kontakt usunięty pomyślnie']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie można usunąć kontaktu']);
      }
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Nie podano prawidłowego ID']);
    }
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa akcja']);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Nieprawidłowa metoda żądania']);
}
?>
