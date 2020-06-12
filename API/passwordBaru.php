<!DOCTYPE html>
<html>
<head>
  <title>Password Baru | Aplikasi</title>
  <style>
    div {
      width:350px;
      height: auto;
      border: 2px solid black;
      text-align:center;
      margin:0 auto;
    }
</style>
</head>
<body>
<?php
    require_once '../config/koneksi.php';
    $db = new DbConnection();
    $conn = $db->connect();
    
  if(isset($_GET['id']) && (empty($_POST))){
?>
<br><br><br><br>
  <div>
   <?php
      if(isset($_GET['pesan']) && ($_GET['pesan']== "gagal")){
              echo "<center><p>Password Baru dan Ulangi Password Berbeda</p></center><hr>";
      }elseif(isset($_GET['pesan']) && ($_GET['pesan']== "kosong")){
              echo "<tr align='center'>
                      <td><p>Ada Field yang Kosong</p><hr><td>
                    </tr>";
      }                 
    ?>
         
      <form name='form' method='post' action='<?php echo "passwordBaru.php?id=".$_GET['id'];?>'> 
          <table align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF"> 
            <tr> 
              <td colspan="3" align="center">
                <h2> PASSWORD BARU </h2>
                <hr size="2" color="#000">
              </td> 
            </tr>
            <?php
            if(isset($_GET['pesan']) && ($_GET['pesan']== "sukses")){
              echo "<tr align='center'>
                      <td><p>Password telah diperbaharui, silahkan login di aplikasi Android</p><hr><td>
                    </tr>";
            }elseif(isset($_GET['pesan']) && ($_GET['pesan']== "tidak")){
              echo "<tr align='center'>
                      <td><p>Password telah diperbaharui sebelumnya</p><hr><td>
                    </tr>";
            }else{
    ?>
 
            <tr align="left"> 
              <td>Password Baru</td> <td width="6">:</td> 
              <td><input name="password_baru" type="password" placeholder="Password Baru..."></td>
              <br> 
            </tr> 
            <tr align="left"> 
              <td>Ulangi Password</td> <td>:</td> 
              <td><input name="password_ulang" type="password" placeholder="Ulangi Password..."></td> 
            </tr> 
            <tr colspan="3" align="center">
              <td colspan="3">
              <hr size="2" color="#000">
                <input type="submit" name="login" value="OK">
                <input type="reset" name="reset" value="Reset">
              </td> 
            </tr>
            <?php } ?>
          </table> 
      </form>
  </div>
  <?php  
  }elseif(isset($_GET['id']) && (isset($_POST))){
    //Ambil POST
      $passwordBaru = $_POST['password_baru'];
      $ulangPassword = $_POST['password_ulang'];
      
      if($passwordBaru==NULL || $ulangPassword==NULL) {
        header("location:passwordBaru.php?pesan=kosong&id=".$_GET['id']);
      }elseif($passwordBaru == $ulangPassword){
        //token baru
        $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
        $start=$len-$panjang; $xx=rand('0',$start);
        $yy=str_shuffle($acak);
        $token=substr($yy, $xx, $panjang);
        
        $sql="SELECT * FROM pegawai WHERE pegawai_token='".$_GET['id']."'";
        $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $sql = "UPDATE pegawai 
                  SET pegawai_password  = '".md5($passwordBaru)."',
                    pegawai_token     = '".md5($token)."'
                  WHERE pegawai_token   ='".$_GET['id']."'";
        $conn->query($sql);
        header("location:passwordBaru.php?pesan=sukses&id=0");
        } else {
            header("location:passwordBaru.php?pesan=tidak&id=0"); //if tidak ada num rows
        }
    }else{
        header("location:passwordBaru.php?pesan=gagal&id=".$_GET['id']); //if tidak password tidak sama
    }
  }
?> 
</body>
</html>