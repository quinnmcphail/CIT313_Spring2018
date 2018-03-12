<?php
class User extends Model
{
    public $uID;
    public $first_name;
    public $last_name;
    public $email;
    protected $user_type;

    public function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['uID'])) {
            $userSession = $this->getUserFromID($_SESSION['uID']);
            $this->uID = $userSession['uID'];
            $this->first_name = $userSession['first_name'];
            $this->last_name = $userSession['last_name'];
            $this->email = $userSession['email'];
            $this->user_type = $userSession['user_type'];
        }
    }

    public function getUser($uID)
    {
        $sql = "SELECT uID, email, first_name, last_name, user_type, active FROM users WHERE uID = ?";
        $result = $this->db->getrow($sql, array($uID));

        $user = $result;
        return $user;
    }

    public function getUserFromID($uID)
    {
        $sql = "SELECT * FROM users WHERE uID = ?";
        $result = $this->db->getrow($sql, array($uID));

        return $result;
    }

    public function getUserFromEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $user = $this->db->getrow($sql, array($email));

        return $user;
    }

    public function getAllUsers($limit = 0)
    {
        if ($limit > 0) {

            $numusers = ' LIMIT ' . $limit;
        }

        $sql = "SELECT uID, email, first_name, last_name, user_type, active FROM users" . $numusers;

        // perform query
        $results = $this->db->execute($sql);

        while ($row = $results->fetchrow()) {
            $users[] = $row;
        }

        return $users;
    }

    public function addUser($data)
    {
        $sql = 'INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?)';
        $this->db->execute($sql, $data);
        $message = 'User has registered.';
        return $message;
    }

    public function checkUser($email, $password)
    {
        $sql = "SELECT email, password FROM users WHERE email = ?";
        $result = $this->db->getrow($sql, array($email));
        $user = $result;
        $password_db = $user[1];
        if (password_verify($password, $password_db)) {
            return true;
        } else {
            return false;
        }
    }
}