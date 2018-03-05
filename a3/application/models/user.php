<?php
class User extends Model
{
    public function getUser($uID)
    {
        $sql = "SELECT uID, email, first_name, last_name, user_type, active FROM users WHERE uID = ?";
        $result = $this->db->getrow($sql, array($uID));

        $user = $result;
        return $user;
    }

    public function addUser($data)
    {
        $sql = 'INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?)';
        $this->db->execute($sql, $data);
        $message = 'Thanks for registering.';
        return $message;
    }
}
