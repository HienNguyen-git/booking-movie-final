<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'cinema_db');

    function open_database(){
        $conn = new mysqli(HOST, USER, PASS, DB);
        if($conn->connect_error){
            die('Fail to connect to database '. $conn->connect_error);
        }

        return $conn;
    }

    function login($user,$pass){
        $sql = "select * from account where username=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $user);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Command not execute');
        }

        $result = $stm->get_result();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'User not exist');

        }
        $data = $result->fetch_assoc();

        $hash_password = $data['password'];
        if(!password_verify($pass, $hash_password)){
            return array('code'=>3,'error'=>'Invalid password');
        }else if($data['activated']==0){
            return array('code'=>4,'error'=>'This account is not activated');
        }else
            return array('code'=>0,'success'=>'', 'data'=>$data);
        
    }

    function is_email_exist($email){
        $sql = "select username from account where email=?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$email);
        
        if(!$stm->execute()){
            die('Error statement');
        }

        $result = $stm->get_result();
        if($result->num_rows>0){
            return true;
        }else return false;
    }

    function register($user,$pass,$first,$last,$email){
        if(is_email_exist($email)){
            return array('code'=>1,'error'=>'Email exists');
        }

        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $rand = random_int(0,1000);
        $token = md5($user.'+'.$rand);
        $sql = 'insert into account(username, firstname, lastname, email, password, activate_token) values(?,?,?,?,?,?)';
        
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssss', $user,$first,$last,$email,$hash,$token);

        if(!$stm->execute()){
            return array('code'=>2,'error'=>'Command not execute');
        }

        sendActivationEmail($email,$token);

        return array('code'=>0,'success'=>'Create account successful');
    }

    function sendActivationEmail($email, $token){

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->CharSet = 'UTF-8';                                        //Send using SMTP
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'nguyentronghien.contact@gmail.com';                     //SMTP username
            $mail->Password   = 'tcxecuyvaptyirmo';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nguyentronghien.contact@gmail.com', 'Trong Hien Entrepreneur');
            $mail->addAddress($email, 'Receiver');     //Add a recipient
            /*
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            
            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            */
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Authorize your account';
            $mail->Body    = "<p>Click <a href='http://localhost/Lab08/activate.php?email=$email&token=$token'>here</a> to verify your account</p>";
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function sendResetPassword($email, $token){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();    
            $mail->CharSet = 'UTF-8';                                        //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'nguyentronghien.contact@gmail.com';                     //SMTP username
            $mail->Password   = 'tcxecuyvaptyirmo';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nguyentronghien.contact@gmail.com', 'Trong Hien Entrepreneur');
            $mail->addAddress($email, 'Receiver');     //Add a recipient
            /*
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            
            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            */
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset your password';
            $mail->Body    = "<p>Click <a href='http://localhost/Lab08/reset_password.php?email=$email&token=$token'>here</a> to reset your password</p>";
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function activeAccount($email,$token){
        $sql = 'select * from account where email=? and activate_token=? and activated=0';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$email,$token);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Can not execute command');
        }

        $result = $stm->get_result();
        if($result->num_rows==0){
            return array('code'=>2,'error'=>'Email or Token not available');
        }

        $sql = "update account set activated=1, activate_token='' where email = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$email);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Can not execute command');
        }
        return array('code'=>0,'success'=>'Your account is activated');
        
    }

    function reset_password($email){
        if(!is_email_exist($email)){
            return array('code'=>1,'error'=>'Email not available');
        }

        $token = md5($email.random_int(1,1000));
        $epr = time() + 3600*24;

        $sql = 'update reset_token set token=? , expire_on=? where email=?';
        $conn = open_database();
        
        $stm = $conn->prepare($sql);
        $stm->bind_param('sss',$token,$epr,$email);

        if(!$stm->execute()){
            return array('code'=>2,'error'=>'Cannot execute command 1');
        }

        if($stm->affected_rows==0){
            $sql = 'insert into reset_token values(?,?,?)';

            $stm = $conn->prepare($sql);
            $stm->bind_param('ssi',$email,$token,$epr);

            if(!$stm->execute()){
                return array('code'=>2,'error'=>'Cannot execute command 2');
            }
        }

        $success = sendResetPassword($email,$token);

        return array('code'=>0,'success'=>$success);
    }

    function change_password($email,$new_pass){
        if(!is_email_exist($email)){
            return array('code'=>1,'error'=>'Email not available');
        }
        $hash = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = 'update account set password=? where email=?';
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$hash, $email);
        if(!$stm->execute()){
            return array('code'=>2,'error'=>'Can not execute command');
        }

        return array('code'=>0,'success'=>'Password has changed');
    }

    function add_product($name,$price,$description,$image){
        $sql = 'insert into product(name, price, description, image) values(?,?,?,?)';
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ssss',$name,$price,$description,$image);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Can not execute command');
        }
        return array('code'=>0,'success'=>'Add product successfully!');
    }

    function delete_product($name){
        $sql = 'delete from product where name=?';

        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$name);

        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Cannot execute command');
        }

        return array('code'=>0,'success'=>'Delete product successfully');
    }

    function update_product($name,$price,$description,$image,$id){
        echo $name,$price,$description,$image,$id;
        $sql = 'update product set name=?, price=?, description=?, image=? where id=?';
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssi',$name,$price,$description,$image,$id);
        
        if(!$stm->execute()){
            return array('code'=>1,'error'=>'Can not execute command');
        }
        echo 'success';
        return array('code'=>0,'success'=>'Update product successfully!');
    }
?>