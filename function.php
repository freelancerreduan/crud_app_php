<?php
class newApp{
    private $conn;
    public function __construct()
    {
        $dbhost ='localhost';
        $dbuser ='root';
        $dbpass ="";
        $dbname ='blog_project';
        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(!$this->conn){
            die ("Connection Faild!");
        }
    }


    
    // It's Funtion For (Data ADD) in database
    public function add_data($data){
        $name = $data['name'];
        $roll = $data['phone'];
        $email = $data['email'];
        $img = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];

        $query = "INSERT INTO user(name,roll,email,img) VALUE ('$name','$roll','$email','$img')";
        if(mysqli_query($this->conn , $query)){
            move_uploaded_file($tmp_name , "upload/".$img);
            return ('Data Sent Successfully');
        }

    }



    // It's funtion for (Display DATA) in Database
    public function display_user_info(){
        $query = "SELECT * FROM user";
        if(mysqli_query($this->conn, $query)){
            $stok_data_hear = mysqli_query($this->conn,$query);
            return $stok_data_hear;
        }
    }


    // It's Funtion for (Edite page Data Display ) in old data at database
    public function display_user_upadate($id){
        $query = "SELECT * FROM user WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
            $stok_data_hear = mysqli_query($this->conn,$query);
            $stg = mysqli_fetch_assoc($stok_data_hear);
            return $stg;
        }
    }


    // it's Funcion for ( Edite Info UPDATED ) in Database 
    public function info_updated($data){
        $name = $data['uname'];
        $roll = $data['uroll'];
        $email = $data['uemail'];
        $idno = $data['idno'];
        $u_img = $_FILES['up_img']['name'];
        $tmp_name = $_FILES['up_img']['tmp_name'];

        $query = "UPDATE user SET name='$name', roll='$roll',email='$email', img='$u_img' WHERE id=$idno";
        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name , "upload/".$u_img);
            return header("Location: index.php");

        }
    }


    // it's Function for (Delete Data With IMG) in Database
    public function delete_data($id){
        // this code for img ( Unlink ) form img File
        $query = "SELECT * FROM user WHERE id = $id";
        $img_info = mysqli_query($this->conn, $query);
        $img_delete = mysqli_fetch_assoc($img_info);
        $img_remove_success = $img_delete['img'];
        
        // ============This cod for Just Text Delete=========
        $query = "DELETE FROM user WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
            unlink('upload/'.$img_remove_success);
            return "Usr Data Deleted Successfully";
        }
    }






}








?>