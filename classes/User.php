<?php

include 'Database.php';
include_once 'Session.php';

class User
{
    private $db;

    public function __construct()
    {
        //$this->db = new Database();
        $this->db = Database::getInstance();
    }

    public function userRegistration($data)
    {
        $name     = $data['name'];
        $username = $data['username'];
        $password = md5($data['password']);
        $company   = $data['company'];
        $address = $data['address'];
        $phone_number = $data['phone_number'];
        $email = $data['email'];

        $check_username = $this->usernameCheck($username);

        if($name == "" OR $username == "" OR $password == "") {
            $msg  = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }

        if (strlen($username) < 2) {
            $msg  = "<div class='alert alert-danger'><strong>Error ! </strong>Korisnicko ime je prekratko</div>";
            return $msg;
        }

        if ($check_username == true) {
            $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Korisnicko ime vec postoji</div>";
            return $msg;
        }

        $sql = "INSERT INTO users (name, username, password, company, phone_number, address, email)
                     VALUES(:name, :username, :password, :company, :phone_number, :address, :email)";

        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->bindValue(':company', $company);
        $query->bindValue(':phone_number', $phone_number);
        $query->bindValue(':address', $address);
        $query->bindValue(':email', $email);
        $result = $query->execute();
        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success: </strong>Uspjesno ste dodali novog korisnika.<a href='product.php' style='margin-left: 30px; font-size: 20px;'>U redu</a></div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error: </strong>Nesto nije u redu</div>";
            return $msg;
        }

    }

    public function usernameCheck($username)
    {
        $sql = "SELECT username FROM users WHERE username = :username ";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':username', $username);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getLoginUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;

    }


    public function userLogin($data)
    {
        $username = $data['username'];
        $password = md5($data['password']);

        if($username == "" OR $password == "") {
            $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be Empty</div>";
            return $msg;
        }

        $result = $this->getLoginUser($username, $password);

        if ($result) {
            Session::init();
            Session::set("login", true);
            Session::set("role", $result->role);
            Session::set("id", $result->id);
            Session::set("name", $result->name);
            Session::set("username", $result->username);
            Session::set("loginmsg", "<div class='alert alert-success'><strong>Success ! </strong>Uspjesno ste se prijavili</div>");
            header("Location:index.php");

        } else {
            $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Podaci nisu pronadeni</div>";
            return $msg;
        }
    }


    public function getUserData()
    {
        $sql = "SELECT * FROM users";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id=:id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function updateUserData($id, $data)
    {
        $name = $data['name'];
        $username = $data['username'];
        $company = $data['company'];
        $address = $data['address'];
        $phone_number = $data['phone_number'];
        $email = $data['email'];


        if($name == "" OR $username == "") {
            $msg  = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }

        if (strlen($username) < 2) {
            $msg  = "<div class='alert alert-danger'><strong>Error ! </strong>Username is too short</div>";
            return $msg;
        }


        $sql = "UPDATE users SET 
                     name         = :name,
                     username     = :username,
                     company      = :company,
                     address      = :address,
                     phone_number = :phone_number,
                     email        = :email
                     WHERE id = :id ";

        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':username', $username);
        $query->bindValue(':company', $company);
        $query->bindValue(':address', $address);
        $query->bindValue(':phone_number', $phone_number);
        $query->bindValue(':email', $email);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success: </strong>Uspjesno ste azurirali korisnika.<a href='users.php' style='margin-left: 30px; font-size: 20px;'>U redu</a></div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error: </strong>Nesto nije u redu</div>";
            return $msg;
        }
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success:</strong>Uspjesno ste uklonili korisnika.<a href='users.php' style='margin-left: 30px; font-size: 20px;'>U redu</a></div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }

    }
}