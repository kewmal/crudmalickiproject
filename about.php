<!DOCTYPE html>
<html lang="pl" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O Projekcie</title>

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

      --card-bg: #24242c;
      --card-shadow: 0 4px 8px rgba(0, 0, 0, 0.3), 0 6px 12px rgba(0, 0, 0, 0.3);
      --card-border-radius: 8px;
    }

    body {
      font-family: 'Roboto', 'Helvetica Neue', Arial, sans-serif;
      background-color: var(--bs-body-bg);
      color: var(--bs-body-color);
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .container {
      margin-top: 30px;
      margin-bottom: 30px;
    }

    h1, h2, h3, h4, h5, h6 {
      font-weight: 300;
      color: var(--bs-body-color);
      margin-bottom: 20px;
    }

    .content-section {
      background-color: var(--card-bg);
      padding: 30px;
      border-radius: var(--card-border-radius);
      box-shadow: var(--card-shadow);
      margin-bottom: 20px;
    }

    .content-section p, .content-section ul, .content-section li {
      line-height: 1.8;
    }

    .content-section ul {
      padding-left: 0;
      list-style: none;
    }
    .content-section li {
      margin-bottom: 15px;
    }
    .content-section strong {
      color: var(--bs-primary);
    }

    .back-to-list a {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: var(--bs-info);
      text-decoration: none;
      font-weight: 500;
    }
    .back-to-list a:hover {
      color: var(--bs-primary);
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="text-center m-0">O Projekcie</h1>
      <div class="back-to-list">
        <a href="index.php">
          <i class="bi bi-arrow-left-circle"></i> Powrót do listy
        </a>
      </div>
    </div>

    <div class="content-section">
      <h4>Prosty Projekt CRUD (Paweł Malicki projekt dla Tsunami Systems w ramach przedstawienia umiejętności)</h4>
      <p>Ten projekt demonstruje podstawowe operacje CRUD (Create, Read, Update, Delete) w aplikacji webowej przy użyciu PHP, MySQL oraz biblioteki Bootstrap i jQuery.</p>
      <p><strong>Funkcjonalności:</strong></p>
      <ul>
        <li>Dodawanie nowych kontaktów</li>
        <li>Wyświetlanie listy kontaktów</li>
        <li>Edycja istniejących kontaktów</li>
        <li>Usuwanie kontaktów (za pomocą AJAX)</li>
        <li>Klikalne linki do wysyłania emaili i nawiązywania połączeń telefonicznych</li>
        <li>Responsywny interfejs użytkownika</li>
      </ul>
      <p><strong>Wykorzystane technologie:</strong></p>
      <ul>
        <li>PHP (backend)</li>
        <li>MySQL (baza danych)</li>
        <li>HTML, CSS, JavaScript (frontend)</li>
        <li>Bootstrap 5 (framework CSS/JS)</li>
        <li>jQuery (biblioteka JS)</li>
      </ul>
      <p><strong>Autor:</strong>Paweł Malicki</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyT7mO5b0404F/E95f5n/t8j/N1JgQ5hVz0v80" crossorigin="anonymous"></script>
</body>
</html>
