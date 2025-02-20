<?php
class Comment{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addComment($id_user, $comment) {
        $conn = $this->db->connect();
        $date = date('Y-m-d H:i:s');
        $stmt = $conn->prepare('INSERT INTO comment (id_user, comment, date) VALUES (:id_user, :comment, :date)');
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':date', $date);
        return $stmt->execute();
    }

    public function getComments() {
        $conn = $this->db->connect();
        $stmt = $conn->prepare('SELECT comment.*, user.login FROM comment JOIN user ON comment.id_user = user.id ORDER BY date DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function getCommentsWithLimit($limit, $offset) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM comment ORDER BY date DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function countComments() {
        // Assuming you have a database connection in $this->db
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM comment");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }

    public function searchComments($keyword) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare('SELECT comment.*, user.login FROM comment JOIN user ON comment.id_user = user.id WHERE comment LIKE :keyword ORDER BY date DESC');
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // classes/Message.php
// classes/Message.php
public function getLatestComments($limit = 5) {
    $conn = $this->db->connect();
    // Utilisation de la variable $limit directement dans la requête SQL
    $stmt = $conn->prepare("SELECT comment.*, user.login FROM comment JOIN user ON comment.id_user = user.id ORDER BY comment.date DESC LIMIT $limit");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // classes/Message.php

    public function deleteMessage($message_id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("DELETE FROM comment WHERE id = ?");
        $stmt->execute([$message_id]);
    }
    

}
?>