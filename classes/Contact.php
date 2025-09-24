<?php
require_once __DIR__ . '/../includes/Database.php'; 

class Contact {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function create($name, $email, $phone) {
    $sql = "INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)";
    $params = [':name' => $name, ':email' => $email, ':phone' => $phone];
    $this->db->query($sql, $params);
    return $this->db->getLastInsertId();
  }

  public function readAll() {
    $sql = "SELECT * FROM contacts ORDER BY name ASC"; 
    return $this->db->fetchAll($sql);
  }

  public function readById($id) {
    $sql = "SELECT * FROM contacts WHERE id = :id";
    $params = [':id' => $id];
    return $this->db->fetch($sql, $params);
  }

  public function update($id, $name, $email, $phone) {
    $sql = "UPDATE contacts SET name = :name, email = :email, phone = :phone WHERE id = :id";
    $params = [':id' => $id, ':name' => $name, ':email' => $email, ':phone' => $phone];
    $this->db->query($sql, $params);
    return true; 
  }

  public function delete($id) {
    $sql = "DELETE FROM contacts WHERE id = :id";
    $params = [':id' => $id];
    $this->db->query($sql, $params);
    return true; 
  }

  public function searchAndFilter(string $search_term = '', string $filter_by = 'all'): array {
    $sql = "SELECT * FROM contacts WHERE 1=1"; 
    $params = [];

    if (!empty($search_term)) {
      $search_term_wildcard = "%" . $search_term . "%";

      switch ($filter_by) {
        case 'name':
          $sql .= " AND name LIKE :search_term";
          $params[':search_term'] = $search_term_wildcard;
          break;
        case 'email':
          $sql .= " AND email LIKE :search_term";
          $params[':search_term'] = $search_term_wildcard;
          break;
        case 'phone':
          $cleaned_phone_search = preg_replace('/[^0-9+]/', '', $search_term);
          if (!empty($cleaned_phone_search)) {
            $sql .= " AND phone LIKE :search_term";
            $params[':search_term'] = "%" . $cleaned_phone_search . "%";
          } else {
            $sql .= " AND 1=0"; 
          }
          break;
        case 'all':
        default:
          $sql .= " AND (name LIKE :search_term OR email LIKE :search_term OR phone LIKE :search_term)";
          $params[':search_term'] = $search_term_wildcard;
          break;
      }
    }

    $sql .= " ORDER BY name ASC"; 

    return $this->db->fetchAll($sql, $params);
  }
}
?>
