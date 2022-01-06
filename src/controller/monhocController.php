<?php
     require_once 'model/monhocModel.php';
     class monhocController{
         function index(){
             $monhocModel = new monhocModel();
             $monhocs = $monhocModel->index();
             require_once 'view/monhoc/index.php';
    }
 
         function add(){
            $error = '';
            //xử lý submit form
            if (isset($_POST['submit'])) {
                $bd_name = $_POST['bd_name'];
                //xử lý validate, nếu mà để trống tên sách
    //            thì báo lỗi và không cho submit form
                if (empty($bd_name)) {
                    $error = "Name không được để trống";
                }
                else {
                    //gọi model để insert dữ liệu vào database
                    $userModel = new UserModel();
                    //gọi phương thức để insert dữ liệu
                    //nên tạo 1 mảng tạm để lưu thông tin của
    //                đối tượng dựa theo cấu trúc bảng
                    $userArr = [
                        'bd_name' => $bd_name
                    ];
                    $isInsert = $userModel->getUserById($userArr);
                    if ($isInsert) {
                        $_SESSION['success'] = "Thêm mới thành công";
                    }
                    else {
                        $_SESSION['error'] = "Thêm mới thất bại";
                    }
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
            }
            //gọi view
            require_once 'view/monhoc/add.php';
        }
         }
 
        


?>