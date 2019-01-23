<?php

//include 'Database.php';

class Product
{
    private $db;

    public function __construct()
    {
        //$this->db = new Database();
        $this->db = Database::getInstance();
    }


    public function getProduct()
    {
        $sql = "SELECT * FROM products";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id=:id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function insertProduct($data)
    {
        $name = $data['name'];
        $idcategory = $data['select'];
        $file = $_FILES['file'];
        $user_id = $data['userid'];
        $description = $data['description'];
        $price = $data['price'];

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
                    $fileDestination = 'uploads/'.$fileName;
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


        $sql = "INSERT INTO products (id_user, name, id_category, img, description, price) VALUES (:user_id, :name, :idcategory, :fileName, :description, :price)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':user_id', $user_id);
        $query->bindValue(':name', $name);
        $query->bindValue(':idcategory', $idcategory);
        $query->bindValue(':fileName', $fileName);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);
        $result = $query->execute();

        if($result) {
            $msg = "<div class='alert alert-success' style='width: 600px;'><strong>Success: </strong>Uspjesno ste dodali proizvod. </div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }
    }

    public function insertProductAdmin($data)
    {
        $user_id = $data['userid'];
        $name = $data['name'];
        $idcategory = $data['select'];
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

        $sql = "INSERT INTO products (id_user, name, id_category, img) VALUES (:user_id, :name, :idcategory, :fileName)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':user_id', $user_id);
        $query->bindValue(':name', $name);
        $query->bindValue(':idcategory', $idcategory);
        $query->bindValue(':fileName', $fileName);
        $result = $query->execute();

        if($result) {
            $msg = "<div class='alert alert-success' style='width: 600px;'><strong>Success:</strong>Uspjesno ste dodali proizvod.<a href='product.php' style='margin-left: 200px; font-size: 20px;'>U redu</a> </div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }
    }

    public function getProductsAndCategoriesAndUsers($id)
    {
        $sql = "SELECT p.name, p.img, p.price, p.description, u.username, u.address, u.company, u.phone_number, u.email
                FROM products AS p
                INNER JOIN categories AS c ON p.id_category = c.id
                INNER JOIN users AS u ON p.id_user = u.id
                WHERE p.id_category = $id ";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function getProductByIdSearch($id)
    {
        $sql = "SELECT p.name, p.img, p.price, p.description, u.username, u.address, u.company, u.phone_number, u.email
                FROM products AS p
                INNER JOIN categories AS c ON p.id_category = c.id
                INNER JOIN users AS u ON p.id_user = u.id
                WHERE p.id = $id ";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function updateProductData($id, $data)
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


        $sql = "UPDATE products SET 
                     name     = :name,
                     img = :fileName
                     WHERE id = :id ";

        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':fileName', $fileName);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success: </strong>Uspjesno ste azurirali proizvod.<a href='product.php' style='margin-left: 30px; font-size: 20px;'>U redu</a></div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id =:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $result = $query->execute();
        if($result) {
            $msg = "<div class='alert alert-success'><strong>Success: </strong>Uspjesno ste uklonili proizvod</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error</strong></div>";
            return $msg;
        }

    }


}