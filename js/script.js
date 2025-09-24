$(document).ready(function() {
      $('#about-project-btn').on('click', function() {
        $('#aboutProjectModal').modal('show');
      });
  $('.delete-btn').on('click', function() {
    var contactId = $(this).data('id');
    var row = $(this).closest('tr');
    if (confirm('Czy na pewno chcesz usunąć ten kontakt?')) {
      $.ajax({
        url: 'api.php',
        type: 'POST',
        data: {
          action: 'delete',
          id: contactId
        },
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            row.fadeOut(500, function() {
              $(this).remove();
              alert('Kontakt został pomyślnie usunięty!');
            });
          } else {
            alert('Wystąpił błąd: ' + response.message);
          }
        },
        error: function() {
          alert('Wystąpił błąd komunikacji z serwerem.');
        }
      });
    }
  });
  var urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('message')) {
    var messageType = urlParams.get('message');
    var alertHtml = '';
    if (messageType === 'contact_added') {
      alertHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">Kontakt został pomyślnie dodany! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else if (messageType === 'contact_updated') {
      alertHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">Kontakt został pomyślnie zaktualizowany! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    if (alertHtml) {
      $('#alerts-container').html(alertHtml);
    }
  }
});
