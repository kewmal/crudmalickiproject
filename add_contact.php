<?php
require_once 'classes/Contact.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';

  if (!empty($name) && !empty($email)) {
    $contact = new Contact();
    $contact->create($name, $email, $phone);
    header('Location: index.php?message=contact_added');
    exit();
  } else {
    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Imię i Email są wymagane! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
  }
}
?>
<!DOCTYPE html>
<html lang="pl" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dodaj Kontakt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    :root {
      --bs-body-bg: #18181c;
      --bs-body-color: #e0e0e0;
      --bs-primary: #64b5f6;
      --bs-secondary: #90a4ae;
      --bs-success: #81c784;
      --bs-danger: #e57373;
      --bs-warning: #ffd54f;
      --bs-info: #4dd0e1;
      --bs-light: #424242;
      --bs-dark: #303030;

      --card-bg: #242424;
      --card-shadow: 0 4px 8px rgba(0, 0, 0, 0.3), 0 6px 12px rgba(0, 0, 0, 0.3);
      --card-border-radius: 8px;
    }

    body {
      font-family: 'Roboto', 'Helvetica Neue', Arial, sans-serif;
      background-color: var(--bs-body-bg);
      color: var(--bs-body-color);
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .container { margin-top: 30px; margin-bottom: 30px; }
    h1 { font-weight: 300; margin-bottom: 30px; color: var(--bs-body-color); }

    .btn-primary, .btn-success, .btn-danger, .btn-info {
      transition: all 0.3s ease;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      border-radius: 4px;
    }
    .btn-primary:hover, .btn-success:hover, .btn-danger:hover, .btn-info:hover {
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .btn {
      margin-right: 5px;
    }
    .btn-group .btn {
      margin-right: 0;
    }

    .alert {
      border-radius: var(--card-border-radius); border: none; padding: 1rem 1.5rem; font-weight: 400;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .alert-success { background-color: #2e7d32; color: #ffffff; }
    .alert-warning { background-color: #f57f17; color: #ffffff; }
    .alert-danger { background-color: #c62828; color: #ffffff; }
    .alert-info { background-color: #1565c0; color: #ffffff; }

    .alert-dismissible .btn-close {
      background-color: transparent; border: none; font-size: 1.5rem; line-height: 1;
      opacity: .5; color: var(--bs-body-color);
    }
    .alert-dismissible .btn-close:hover { opacity: .75; }

    .form-label {
      font-weight: 500;
      color: var(--bs-body-color);
    }
    .form-control {
      background-color: var(--bs-light);
      color: var(--bs-body-color);
      border: 1px solid var(--bs-secondary);
    }
    .form-control:focus {
      background-color: var(--bs-dark);
      border-color: var(--bs-primary);
      box-shadow: 0 0 0 0.25rem rgba(100, 173, 246, 0.5);
    }

    a {
      color: inherit;
      text-decoration: none;
    }
    a:hover {
      color: var(--bs-primary);
      text-decoration: underline;
    }
    .btn-link-cancel {
      color: var(--bs-secondary);
    }
    .btn-link-cancel:hover {
      color: var(--bs-secondary);
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Dodaj nowy kontakt</h1>

    <?php echo $message; ?>

    <form action="add_contact.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Imię i Nazwisko</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Telefon</label>
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <button type="submit" class="btn btn-primary">Dodaj kontakt</button>
      <a href="index.php" class="btn btn-secondary">Anuluj</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyT7mO5b0404F/E95f5n/t8j/N1JgQ5hVz0v80" crossorigin="anonymous"></script>
</body>
</html>
