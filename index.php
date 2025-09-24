<?php 
require_once 'classes/Contact.php'; 
$contact = new Contact(); 
$contacts = $contact->readAll();
?>
<!DOCTYPE html>
<html lang="pl" data-bs-theme="dark"> 
<head>  
<meta charset="UTF-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Baza kontaktów - Paweł Malicki PROJECT TSUNAMI SYSTEMS</title>
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

--table-header-bg: #3a3a40;
   --table-row-hover-bg: #44444c;
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

#assistant-button {
   background-color: var(--bs-info); color: var(--bs-body-bg); border: none; padding: 10px 15px;
   border-radius: 5px; cursor: pointer; font-size: 1rem; margin-left: 5px;
   box-shadow: 0 2px 5px rgba(0,0,0,0.2); transition: all 0.3s ease;
  }
  #assistant-button:hover { background-color: var(--bs-info); opacity: 0.9; box-shadow: 0 4px 10px rgba(0,0,0,0.3); }

.table-responsive-stack {
   border-radius: var(--card-border-radius); overflow: hidden; box-shadow: var(--card-shadow); background-color: var(--card-bg);
  }
  .table thead th {
   vertical-align: bottom; border-bottom: 2px solid #4a4a50; background-color: var(--table-header-bg);
   color: var(--bs-body-color); font-weight: 500;
  }
  .table td, .table th { padding: 0.75rem 0.75rem; border-color: #424242; }
  .table-responsive-stack td { border-color: #4e4e56; }
  .table tbody tr:hover { background-color: var(--table-row-hover-bg); cursor: pointer; }

@media (max-width: 768px) {
   .table-responsive-stack { border: none; box-shadow: none; background-color: transparent; }
   .table-responsive-stack thead { display: none; }
   .table-responsive-stack, .table-responsive-stack tbody, .table-responsive-stack tr, .table-responsive-stack td { display: block; width: 100%; box-sizing: border-box; }
   .table-responsive-stack tr {
    margin-bottom: 15px; background-color: var(--card-bg); border-radius: var(--card-border-radius); padding: 15px; box-shadow: var(--card-shadow);
   }
   .table-responsive-stack td {
    text-align: right; padding-left: 50%; position: relative; border-bottom: 1px solid #555;
   }
   .table-responsive-stack td:last-child { border-bottom: none; }
   .table-responsive-stack td::before {
    content: attr(data-label); position: absolute; left: 15px; width: 45%;
    padding-right: 10px; font-weight: bold; color: var(--bs-body-color); white-space: nowrap; text-align: left;
   }
   a {
    color: inherit;
    text-decoration: none;
   }
   a:hover {
    color: var(--bs-primary);
    text-decoration: underline;
   }
   .table-responsive-stack td a {
    color: #ffffff;
   }
   .table-responsive-stack td a:hover {
    color: var(--bs-primary);
    text-decoration: underline;
   }
   .nav-actions .btn-outline-info {
    color: var(--bs-info); border-color: var(--bs-info);
   }
   .nav-actions .btn-outline-info:hover {
    background-color: var(--bs-info); color: var(--bs-body-bg);
   }
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

.nav-actions { display: flex; gap: 10px; }

.copy-button {
   background-color: var(--bs-secondary);
   color: var(--bs-body-color);
   border: none;
   padding: 6px 12px;
   border-radius: 4px;
   cursor: pointer;
   font-size: 0.875rem;
   transition: all 0.3s ease;
   box-shadow: 0 2px 5px rgba(0,0,0,0.2);
   display: inline-flex;
   align-items: center;
   gap: 5px;
  }
  .copy-button:hover {
   background-color: #788a95;
   opacity: 0.9;
   box-shadow: 0 4px 10px rgba(0,0,0,0.3);
  }
  .copy-button i {
   margin-right: 5px;
  }

.copy-success-message {
   position: fixed;
   bottom: 20px;
   left: 50%;
   transform: translateX(-50%);
   background-color: var(--bs-success);
   color: #ffffff;
   padding: 10px 20px;
   border-radius: 5px;
   z-index: 1050;
   opacity: 0;
   transition: opacity 0.5s ease-in-out;
   box-shadow: 0 4px 8px rgba(0,0,0,0.3);
  }
  .copy-success-message.show {
   opacity: 1;
  }
 </style>

</head> <body>
<div class="container">
  <h1 class="text-center">Baza kontaktów</h1>
     <p class="text-center">Paweł Malicki PROJECT TSUNAMI SYSTEMS</p>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
   <a href="add_contact.php" class="btn btn-success btn-lg shadow-sm">
    <i class="bi bi-person-plus"></i> Dodaj nowy kontakt
   </a>

<div class="nav-actions">
    <a href="about.php" id="about-project-link" class="btn btn-outline-info btn-lg shadow-sm">
     O Projekcie
    </a>
    <button id="assistant-button" class="btn btn-lg shadow-sm">
     <i class="bi bi-stars"></i> Asystent
    </button>
   </div>
  </div>

<div id="alerts-container">
   <?php
   if (isset($_GET['message'])) {
    $msg = $_GET['message'];
    $alert_class = 'alert-success';
    $alert_message = '';

switch ($msg) {
     case 'contact_added': $alert_message = 'Kontakt został pomyślnie dodany!'; break;
     case 'contact_updated': $alert_message = 'Kontakt został pomyślnie zaktualizowany!'; break;
     case 'contact_deleted': $alert_message = 'Kontakt został pomyślnie usunięty!'; break;
     case 'error': $alert_message = 'Wystąpił błąd podczas operacji.'; $alert_class = 'alert-danger'; break;
    }

if (!empty($alert_message)) {
     echo '<div class="alert ' . $alert_class . ' alert-dismissible fade show" role="alert">
      ' . htmlspecialchars($alert_message) . '
      <a href="http://crudmalicki.medianewsonline.com"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zamknij"></button></a>
     </div>';
    }
   }
   ?>
  </div>

<div class="table-responsive">
   <table class="table table-hover table-responsive-stack">
    <thead>
     <tr>
      <th data-label="Imię i Nazwisko">Imię i Nazwisko</th>
      <th data-label="Email">Email</th>
      <th data-label="Telefon">Telefon</th>
      <th data-label="Akcje">Akcje</th>
     </tr>
    </thead>
    <tbody>
     <?php if (!empty($contacts)): ?>
      <?php foreach ($contacts as $contact): ?>
       <tr>
        <td data-label="Imię i Nazwisko"><?php echo htmlspecialchars($contact['name']); ?></td>
        <td data-label="Email">
         <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>">
          <?php echo htmlspecialchars($contact['email']); ?>
         </a>
        </td>
        <td data-label="Telefon">
         <a href="tel:+<?php echo preg_replace('/[^0-9+]/', '', $contact['phone']); ?>">
          <?php echo htmlspecialchars($contact['phone']); ?>
         </a>
        </td>
        <td data-label="Akcje">
         <div class="btn-group">
          <a href="edit_contact.php?id=<?php echo $contact['id']; ?>" class="btn btn-primary btn-sm shadow-sm">
           <i class="bi bi-pencil-square"></i>
          </a>
          <button class="btn btn-danger btn-sm shadow-sm delete-btn" data-id="<?php echo $contact['id']; ?>">
           <i class="bi bi-trash"></i>
          </button>
          <button type="button" class="btn btn-secondary btn-sm shadow-sm copy-button"
            data-contact-id="<?php echo $contact['id']; ?>" 
            data-contact-name="<?php echo htmlspecialchars($contact['name']); ?>"            
            data-contact-email="<?php echo htmlspecialchars($contact['email']); ?>"           
            data-contact-phone="<?php echo htmlspecialchars($contact['phone']); ?>">
           <i class="bi bi-clipboard"></i>Kopiuj dane
          </button>
         </div>
        </td>
       </tr>
      <?php endforeach; ?>
     <?php else: ?>
      <tr>
       <td colspan="4" class="text-center" data-label="Brak danych">
        <i class="bi bi-info-circle"></i> Brak kontaktów do wyświetlenia.
       </td>
      </tr>
     <?php endif; ?>
    </tbody>
   </table>
  </div>
 </div>

<div id="copy-notification" class="copy-success-message">
  Dane kontaktu skopiowane do schowka!
 </div>

<audio id="assistant-audio" src="audio/asystent.ogg" preload="auto"></audio>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyT7mO5b0404F/E95f5n/t8j/N1JgQ5hVz0v80" crossorigin="anonymous"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
   const assistantButton = document.getElementById('assistant-button');
   const assistantAudio = document.getElementById('assistant-audio');

if (assistantButton && assistantAudio) {
    assistantButton.addEventListener('click', function() {
     console.log("Przycisk 'Asystent' kliknięty.");
     if (assistantAudio.paused) {
      assistantAudio.play().then(() => {
       console.log("Odtwarzanie dźwięku.");
      }).catch(error => {
       console.error("Błąd odtwarzania dźwięku:", error);
       alert('Nie udało się odtworzyć dźwięku. Sprawdź ustawienia przeglądarki.');
      });
     } else {
      assistantAudio.pause();
      assistantAudio.currentTime = 0;
      console.log("Pauza dźwięku.");
     }
    });
   } else {
    if (!assistantButton) console.error("Błąd: Nie można znaleźć elementu przycisku z ID 'assistant-button'.");
    if (!assistantAudio) console.error("Błąd: Nie można znaleźć elementu audio z ID 'assistant-audio'.");
   }

const copyButtons = document.querySelectorAll('.copy-button');
   const copyNotification = document.getElementById('copy-notification');

if (copyButtons.length > 0 && copyNotification) {
    copyButtons.forEach(button => {
     button.addEventListener('click', function() {
      const contactName = this.getAttribute('data-contact-name');
      const contactEmail = this.getAttribute('data-contact-email');
      const contactPhone = this.getAttribute('data-contact-phone');

const dataToCopy = Imię i Nazwisko: ${contactName || 'Brak danych'}\nEmail: ${contactEmail || 'Brak danych'}\nTelefon: ${contactPhone || 'Brak danych'};

copyTextToClipboard(dataToCopy)
       .then((result) => {
        console.log(result);
        copyNotification.textContent = "Dane kontaktu skopiowane!";
        copyNotification.classList.add('show');
        setTimeout(() => {
         copyNotification.classList.remove('show');
        }, 3000);
       })
       .catch((err) => {
        console.error('Nie udało się skopiować danych: ', err);
        alert('Nie udało się skopiować danych. Sprawdź uprawnienia przeglądarki.');
       });
     });
    });
   } else {
    if (copyButtons.length === 0) console.error("Błąd: Nie znaleziono przycisków kopiowania z klasą 'copy-button'.");
    if (!copyNotification) console.error("Błąd: Nie można znaleźć elementu z ID 'copy-notification'.");
   }

const deleteButtons = document.querySelectorAll('.delete-btn');
   deleteButtons.forEach(button => {
    if (!button.dataset.listenerAttached) {
     button.addEventListener('click', function() {
      const contactId = this.getAttribute('data-id');
      if (confirm('Czy na pewno chcesz usunąć ten kontakt?')) {
       window.location.href = delete_contact.php?id=${contactId};
      }
     });
     button.dataset.listenerAttached = 'true';
    }
   });
  });

function copyTextToClipboard(text) {
   return new Promise((resolve, reject) => {
    if ('clipboard' in navigator && typeof navigator.clipboard.writeText === 'function') {
     navigator.clipboard.writeText(text).then(() => {
      resolve("Dane skopiowane do schowka!");
     }).catch(err => {
      reject(err);
     });
    } else {
     const textArea = document.createElement("textarea");
     textArea.value = text;
     textArea.style.position = "fixed";
     textArea.style.opacity = "0";
     textArea.style.left = "0";
     textArea.style.top = "0";
     textArea.style.border = "none";
     textArea.style.padding = "0";
     textArea.style.margin = "0";
     textArea.style.width = "1px";
     textArea.style.height = "1px";
     textArea.style.pointerEvents = "none";

document.body.appendChild(textArea);
     textArea.focus();
     textArea.select();

try {
      const successful = document.execCommand('copy');
      if (successful) {
       resolve("Dane skopiowane do schowka (execCommand)!");
      } else {
       reject(new Error("execCommand 'copy' failed."));
      }
     } catch (err) {
      reject(err);
     } finally {
      document.body.removeChild(textArea);
     }
    }
   });
  }
 </script>
</body> 
</html>
