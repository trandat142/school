<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="xuly.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>Email
    <input type="email" name="email" id="email">
  </p>
  <p>
    <label for="password">Mat khau </label>
    <input type="password" name="password" id="password">
  </p>
  <p>Nhap lai mat khau
    <input type="password" name="repassword" id="password2">
  </p>
  <p>
    <label for="textfield">Ho va ten</label>
    <input type="text" name="hovaten" id="textfield">
  </p>
  <p>
    <label for="tel">Dien thoai</label>
    <input type="tel" name="dienthoai" id="tel">
  </p>
  <p>Que quan
    <select name="quequan" id="select">
      <option value="Hà Nội">Hà Nội</option>
      <option value="Hồ Chí Minh">Hồ Chí Minh</option>
    </select>
  </p>
  <p>Gioi tinh:  
    <label>
      <input type="radio" name="gioitinh" value="Nam" id="RadioGroup1_0">
      Nam</label>
    <br>
    <label>
      <input type="radio" name="gioitinh" value="Nữ" id="RadioGroup1_1">
      Nữ</label>
    <br>
  </p>
  <p>So thich:
    
    <input type="checkbox" name="sothich[]" id="checkbox" value="Đọc sách">
   Đọc sách
    <input name="sothich[]" type="checkbox" id="checkbox2" value="Du lịch">
    Du lịch
    <input name="sothich[]" type="checkbox" id="checkbox3" value="Âm nhạc">
Âm nhạc    </p>
  <p>Anh dai dien: 
    <label for="fileField">File:</label>
    <input name="anhdaidien" type="file" required id="fileField">
  </p>
  <p>
    <input type="submit" name="sbdangky" id="sbdangky" value="Đăng ký">
    <br>
  </p>
  <p>&nbsp;</p>
</form>
<br>
</body>
</html>