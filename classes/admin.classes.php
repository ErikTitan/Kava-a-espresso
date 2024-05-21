<?php
class Admin extends Dbh {
    //select vsetkych userov na vypis pre admina 
    public function fetchUsers() {
        $stmt = $this->connect()->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}