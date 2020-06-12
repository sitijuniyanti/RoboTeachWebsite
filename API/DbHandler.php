<?php

class DbHandler
{
    private $conn;
    private $url;

    function __construct()
    {
        require_once '../config/koneksi.php';
        $db = new DbConnection();
        $this->conn = $db->connect();
        $this->url = $db->url();
    }

    public function login($username,$password)
    {
        $sql = "SELECT * FROM user WHERE username='".$username."' AND password='".md5($password)."'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            
            $data = array();
            $row = $result->fetch_assoc();

         
            if($row['level']=="PENGAJAR"){
                $temp['id']             = $row['id_user'];
                $temp['level']          = $row['level'];  
                $data[]                 = $temp;
                header('Content-Type: application/json');

                echo '{ "message" : "Berhasil" ,"results":'.json_encode($data).'}';
            }
            else {
                header('Content-Type: application/json');
                echo '{ "message" : "Username atau password salah"}';
            }

           
        } else {
            header('Content-Type: application/json');
            echo '{"message" : "Username atau password salah"}';
        }
    }

    public function lupa_password($email)
    {
        $sql = "SELECT * FROM pengajar WHERE email='".$email."'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            include("../PHPMailer/class.phpmailer.php");
            include("../PHPMailer/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded

            $mail = new PHPMailer();
            $body = "
                <body style='margin: 10px;'>
                <div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>
                    Anda baru saja merequest untuk proses lupa password, silahkan klik link berikut, apabila memang Anda menginginkan perseubahan tersebut : <br> 
                        <a href='".$this->url."API/passwordBaru.php?id=".$row['token']."'> LAKUKAN AKTIVASI </a>
                </div>
                </body>";

            echo $body;

            $mail->IsSMTP();
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 587;                   // set the SMTP port

            $mail->Username   = "";   // GMAIL username
            $mail->Password   = "";  // GMAIL password
            $mail->From       = ""; //GMAIL username
            $mail->FromName   = "Lupa Password";
            $mail->Subject    = "Lupa Password";
            $mail->WordWrap   = 50; // set word wrap

            $mail->MsgHTML($body);
            $mail->AddAddress($row['pengajar_email']);
            $mail->IsHTML(true); // send as HTML

            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                header('Content-Type: application/json');           
                echo '{ "message" : "Cek Email"}';
            }
        } else {
            header('Content-Type: application/json');
            echo '{"message" : "Email salah"}';
        }
    }

    public function tambahpengajar($id, $nama_l, $nama_p, $status, $jk, $tempat_lahir, $tgl_lahir, $kontak, $alamat, $email, 
                                    $tahun_join, $password, $foto, $level, $foto_temp)
    {
      if ( $id==NULL || $nama_l==NULL || $nama_p==NULL || $status==NULL || $jk==NULL || $tempat_lahir==NULL || $tgl_lahir==NULL || $kontak==NULL || $alamat==NULL || 
          $email==NULL || $tahun_join==NULL || $password=NULL || $foto==NULL || $level==NULL) {
             header('Content-Type: application/json');
            echo '{"message" : "Semua Field Harus Terisi"}';
        }else{   
            $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
            $start=$len-$panjang; $xx=rand('0',$start);
            $yy=str_shuffle($acak);
            $token=substr($yy, $xx, $panjang);
            $aktivasi = "T";

            $sql = "INSERT INTO data_pengajar 
    				(pengajar_id, pengajar_nama_l, pengajar_nama_p, pengajar_status, pengajar_jk, pengajar_tempat_lahir, pengajar_tgl_lahir, pengajar_kontak, pengajar_alamat, pengajar_email, pengajar_password, pengajar_foto, pengajar_level, pengajar_aktivasi,pengajar_token) 
    				VALUES ('".$id."','".$nama_l."','".$nama_p."','".$status."', '".$jk."', '".$keahlian."', '".$agama."', '".$kontak."', '".$email."', '".md5($password)."', '".$foto."', '".$level."', '".$aktivasi."', '".md5($token)."')";
            if ($this->conn->query($sql) == TRUE) {
    			move_uploaded_file($foto_temp, '../foto/'.$foto); //upload file
                header('Content-Type: application/json');
                echo '{"message" : "Berhasil Menyimpan"}';
            } else {
                header('Content-Type: application/json');
                echo '{"message" : "Tidak Menyimpan"}';
            }
        }
    }

    public function getpengajar($id)
    {
        $sql = "SELECT * FROM data_pengajar WHERE pengajar_id!='".$id."'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            header('Content-Type: application/json');
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $temp['id']             = $row['pengajar_id'];
                $temp['nama_l']         = $row['pengajar_nama_l'];
                $temp['nama_p']         = $row['pengajar_nama_p'];
                $temp['status']         = $row['pengajar_status'];
                $temp['jk']             = $row['pengajar_jk'];
                $temp['tempat_lahir']   = $row['pengajar_tempat_lahir'];
                $temp['tgl_lahir']      = $row['pengajar_tgl_lahir'];
                $temp['kontak']         = $row['pengajar_kontak'];
                $temp['alamat']         = $row['pengajar_alamat'];
                $temp['email']          = $row['pengajar_email'];
                $temp['tahun_join']     = $row['pengajar_tahun_join'];
                $temp['foto']           = $row['pengajar_foto']; 
                $temp['level']          = $row['pengajar_level'];            
                $temp['aktivasi']       = $row['pengajar_aktivasi'];             
                $temp['token']          = $row['pengajar_token'];             
                $data[]                 = $temp;
            }
            echo '{"message" : "Berhasil","results":'.json_encode($data).'}';
        } else {
            header('Content-Type: application/json');
            echo '{"results" : "0"}';
        }
    }

    public function selectpengajar($id)
    {
        $sql = "SELECT * FROM data_pengajar WHERE pengajar_id='".$id."'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            header('Content-Type: application/json');
            $row = $result->fetch_assoc();
            $temp['message']    = 'Berhasil';
            $temp['id']             = $row['pengajar_id'];
            $temp['nama_l']         = $row['pengajar_nama_l'];
            $temp['nama_p']         = $row['pengajar_nama_p'];
            $temp['status']         = $row['pengajar_status'];
            $temp['jk']             = $row['pengajar_jk'];
            $temp['tempat_lahir']   = $row['pengajar_tempat_lahir'];
            $temp['tgl_lahir']      = $row['pengajar_tgl_lahir'];
            $temp['kontak']         = $row['pengajar_kontak'];
            $temp['alamat']         = $row['pengajar_alamat'];
            $temp['email']          = $row['pengajar_email'];
            $temp['tahun_join']     = $row['pengajar_tahun_join'];
            $temp['foto']           = $row['pengajar_foto'];   
            $temp['level']          = $row['pengajar_level'];          
            $temp['aktivasi']       = $row['pengajar_aktivasi'];             
            $temp['token']          = $row['pengajar_token'];             
            $data[]                 = $temp;
            
            echo json_encode($data);
        } else {
            header('Content-Type: application/json');
            echo '{"results" : "0"}';
        }
    }
	
	public function ubahpengajar($id, $nama_l, $nama_p, $status, $jk, $tempat_lahir, $tgl_lahir, $kontak, $alamat, $email, 
    $tahun_join, $password, $foto, $level, $foto_temp)
    {   
        if($foto==NULL){
           /* header('Content-Type: application/json');
            echo '{"message" :"Foto tidak ada"}';
    */
            $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
            $start=$len-$panjang; $xx=rand('0',$start);
            $yy=str_shuffle($acak);
            $token=substr($yy, $xx, $panjang);

            $sql = "UPDATE data_pengajar 
                    SET pengajar_nama_l        = '".$nama_l."',
                        pengajar_nama_p        = '".$nama_p."',
                        pengajar_status        = '".$status."',
                        pengajar_jk            = '".$jk."',
                        pengajar_tempat_lahir  = '".$tempat_lahir."',
                        pengajar_tgl_lahir     = '".$tgl_lahir."',
                        pengajar_kontak        = '".$kontak."',
                        pengajar_alamat        = '".$alamat."',
                        pengajar_email         = '".$email."',
                        pengajar_tahun_join    = '".$tahun_join."',
                        pengajar_level         = '".$level."',
                        pengajar_token         = '".md5($token)."'
                    WHERE pengajar_id = '".$id."'";

            if ($this->conn->query($sql) == TRUE) {
                header('Content-Type: application/json');
                echo '{"message" : "Berhasil Mengubah"}';
            } else {
                header('Content-Type: application/json');
                echo '{"message" : "Tidak Mengubah"}';
            }

        }elseif($foto!=NULL){
            /*header('Content-Type: application/json');
            echo '{"message" :"Foto ada"}';*/
    
            $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
            $start=$len-$panjang; $xx=rand('0',$start);
            $yy=str_shuffle($acak);
            $token=substr($yy, $xx, $panjang);

            $sql = "UPDATE pengajar 
                    SET pengajar_nama_l        = '".$nama_l."',
                        pengajar_nama_p        = '".$nama_p."',
                        pengajar_status        = '".$status."',
                        pengajar_jk            = '".$jk."',
                        pengajar_tempat_lahir  = '".$tempat_lahir."',
                        pengajar_tgl_lahir     = '".$tgl_lahir."',
                        pengajar_kontak        = '".$kontak."',
                        pengajar_alamat        = '".$alamat."',
                        pengajar_email         = '".$email."',
                        pengajar_tahun_join    = '".$tahun_join."',
                        pengajar_level         = '".$level."',
                        pengajar_token         = '".md5($token)."'
                    WHERE pengajar_id = '".$id."'";

                if ($this->conn->query($sql) == TRUE) {
                    move_uploaded_file($foto_temp, '../foto/'.$foto); //upload file
                    header('Content-Type: application/json');
                    echo '{"message" : "Berhasil Mengubah"}';
                } else {
                    header('Content-Type: application/json');
                    echo '{"message" : "Tidak Mengubah"}';
                }
        }
    }

    public function hapuspengajar($id)
    {   
        $sqlcek = "SELECT * FROM data_pengajar WHERE pengajar_id = '".$id."'";
        
        if ($this->conn->query($sqlcek)->num_rows > 0) {
            $sql = "DELETE FROM data_pengajar WHERE pengajar_id = '".$id."'";
            $this->conn->query($sql);

            header('Content-Type: application/json');
            echo '{"message" : "Berhasil Terhapus"}';
        }else{
            header('Content-Type: application/json');
            echo '{"message" : "Tidak Menghapus"}';
        }
    }

    public function profilpengajar($id, $nama_l, $nama_p, $status, $jk, $tempat_lahir, $tgl_lahir, $kontak, $alamat, $email, 
    $tahun_join, $foto, $level, $foto_temp,$passwordLama,$passwordBaru,$passwordUlang)
    {    
        $sql    = "SELECT * FROM data_pengajar WHERE pengajar_id='".$id."'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        

        if ($foto==NULL && $passwordLama==NULL) {
            $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
            $start=$len-$panjang; $xx=rand('0',$start);
            $yy=str_shuffle($acak);
            $token=substr($yy, $xx, $panjang);
            
            $sql = "UPDATE data_pengajar
                         SET pengajar_nama_l        = '".$nama_l."',
                        pengajar_nama_p        = '".$nama_p."',
                        pengajar_status        = '".$status."',
                        pengajar_jk            = '".$jk."',
                        pengajar_tempat_lahir  = '".$tempat_lahir."',
                        pengajar_tgl_lahir     = '".$tgl_lahir."',
                        pengajar_kontak        = '".$kontak."',
                        pengajar_alamat        = '".$alamat."',
                        pengajar_email         = '".$email."',
                        pengajar_tahun_join    = '".$tahun_join."',
                        pengajar_level         = '".$level."',
                        pengajar_token         = '".md5($token)."'
                    WHERE pengajar_id = '".$id."'";

            if ($this->conn->query($sql) == TRUE) {
                header('Content-Type: application/json');
                echo '{"message" : "Profil Berhasil Diubah"}';
            } else {
                header('Content-Type: application/json');
                echo '{"message" : "Profil Gagal Diubah"}';
            }
        }elseif($foto!=NULL && $passwordLama==NULL){
            $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
            $start=$len-$panjang; $xx=rand('0',$start);
            $yy=str_shuffle($acak);
            $token=substr($yy, $xx, $panjang);
            $aktivasi = "T";
            $sql = "UPDATE data_pengajar
                         SET pengajar_nama_l        = '".$nama_l."',
                        pengajar_nama_p        = '".$nama_p."',
                        pengajar_status        = '".$status."',
                        pengajar_jk            = '".$jk."',
                        pengajar_tempat_lahir  = '".$tempat_lahir."',
                        pengajar_tgl_lahir     = '".$tgl_lahir."',
                        pengajar_kontak        = '".$kontak."',
                        pengajar_alamat        = '".$alamat."',
                        pengajar_email         = '".$email."',
                        pengajar_tahun_join    = '".$tahun_join."',
                        pengajar_level         = '".$level."',
                        pengajar_token         = '".md5($token)."'
                    WHERE pengajar_id = '".$id."'";
                    
            if ($this->conn->query($sql) == TRUE) {
                move_uploaded_file($foto_temp, '../foto/'.$foto); //upload file
                header('Content-Type: application/json');
                echo '{"message" : "Profil Berhasil Diubah"}';
            } else {
                header('Content-Type: application/json');
                echo '{"message" : "Profil Gagal Diubah"}';
            }
        }elseif($foto!=NULL && $passwordLama!=NULL){
            if ($passwordBaru!=$passwordUlang) {
                header('Content-Type: application/json');
                echo '{"message" : "Password Baru dan Ulangi Password Berbeda"}';
            }elseif (md5($passwordLama)!=$row['pengajar_password']) {
                header('Content-Type: application/json');
                echo '{"message" : "Password Lama Berbeda"}';
            }else{

                $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
                $start=$len-$panjang; $xx=rand('0',$start);
                $yy=str_shuffle($acak);
                $token=substr($yy, $xx, $panjang);
                $aktivasi = "T";
                $sql = "UPDATE data_pengajar
                        SET pengajar_nama_l        = '".$nama_l."',
                        pengajar_nama_p        = '".$nama_p."',
                        pengajar_status        = '".$status."',
                        pengajar_jk            = '".$jk."',
                        pengajar_tempat_lahir  = '".$tempat_lahir."',
                        pengajar_tgl_lahir     = '".$tgl_lahir."',
                        pengajar_kontak        = '".$kontak."',
                        pengajar_alamat        = '".$alamat."',
                        pengajar_email         = '".$email."',
                        pengajar_tahun_join    = '".$tahun_join."',
                        pengajar_level         = '".$level."',
                        pengajar_token         = '".md5($token)."'
                        WHERE pengajar_id = '".$id."'";
                        
                if ($this->conn->query($sql) == TRUE) {
                    move_uploaded_file($foto_temp, '../foto/'.$foto); //upload file
                    header('Content-Type: application/json');
                    echo '{"message" : "logout"}';
                } else {
                    header('Content-Type: application/json');
                    echo '{"message" : "Profil Gagal Diubah"}';
                }
            }
        }elseif($foto==NULL && $passwordLama!=NULL){
            if ($passwordBaru!=$passwordUlang) {
                header('Content-Type: application/json');
                echo '{"message" : "Password Baru dan Ulangi Password Berbeda"}';
            }elseif (md5($passwordLama)!=$row['pengajar_password']) {
                header('Content-Type: application/json');
                echo '{"message" : "Password Lama Berbeda"}';
            }else{
                $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
                $start=$len-$panjang; $xx=rand('0',$start);
                $yy=str_shuffle($acak);
                $token=substr($yy, $xx, $panjang);
                $aktivasi = "T";
                $sql = "UPDATE data_pengajar
                            SET pengajar_nama_l    = '".$nama_l."',
                            pengajar_nama_p        = '".$nama_p."',
                            pengajar_status        = '".$status."',
                            pengajar_jk            = '".$jk."',
                            pengajar_tempat_lahir  = '".$tempat_lahir."',
                            pengajar_tgl_lahir     = '".$tgl_lahir."',
                            pengajar_kontak        = '".$kontak."',
                            pengajar_alamat        = '".$alamat."',
                            pengajar_email         = '".$email."',
                            pengajar_tahun_join    = '".$tahun_join."',
                            pengajar_level         = '".$level."',
                            pengajar_token         = '".md5($token)."'
                    WHERE pengajar_id = '".$id."'";
                        
                if ($this->conn->query($sql) == TRUE) {
                    header('Content-Type: application/json');
                    echo '{"message" : "logout"}';
                } else {
                    header('Content-Type: application/json');
                    echo '{"message" : "Password Lama Berbeda"}';
                }
            }
        }
    }
    
}
?>