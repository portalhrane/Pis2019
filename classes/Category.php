<?php

include_once 'Database.php';

class Category
{
    private $db;

    public function __construct()
    {
        //$this->db = new Database();
        $this->db = Database::getInstance();
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM categories";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM categories WHERE id=:id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;

    }

    public function insertCategory($data)
    {
        $name = $data['name'];
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg','png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError == 0) {
                if ($fileSize < 1000000) {
                    //$fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../uploads/'.$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "Your file is too big";
                }
            } else {
                echo "There was an error uploading your file";
            }

        } else {
            echo "You cannot upload files of this type";
        }

        $sql = "INSERT INTO categories (name, img) VALUES (:name, :fileName)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':fileName', $fileName);
        $result = $query->execute();

        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success: </strong>Uspjesno ste dodali kategoriju. <a href='category.php' style='margin-left: 30px; font-size: 20px;'>U redu</a></div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }
    }

    public function updateCategoryData($id, $data)
    {
        $name = $data['name'];
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];


        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg','png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError == 0) {
                if ($fileSize < 1000000) {
                    //$fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../uploads/'.$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "Your file is too big";
                }
            } else {
                echo "There was an error uploading your file";
            }

        } else {
            echo "You cannot upload files of this type";
        }


        $sql = "UPDATE categories SET 
                     name     = :name,
                     img = :fileName
                     WHERE id = :id ";

        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':fileName', $fileName);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success: </strong>Uspjesno ste azurirali kategoriju.<a href='category.php' style='margin-left: 30px; font-size: 20px;'>U redu</a></div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success: </strong>Uspjesno ste uklonili kategoriju.<a href='category.php' style='margin-left: 30px; font-size: 20px;'>U redu</a></div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error: </strong>Nesto nije u redu</div>";
            return $msg;
        }

    }
}