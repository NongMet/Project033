<?php
// กำหนดข้อมูลสำหรับทดสอบ (ในระบบจริงจะดึงจากฐานข้อมูล)
$valid_username = "admin";
$valid_password = "password123";

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // รับข้อมูลชื่อผู้ใช้และรหัสผ่านจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบว่าชื่อผู้ใช้และรหัสผ่านถูกต้องหรือไม่
    if ($username == $valid_username && $password == $valid_password) {
        // หากข้อมูลถูกต้อง
        echo "<h2>เข้าสู่ระบบสำเร็จ!</h2>";
        echo "<p>ยินดีต้อนรับ, " . htmlspecialchars($username) . "!</p>";
        echo "<a href='login.html'>กลับไปหน้าเข้าสู่ระบบ</a>";
        
        // ในระบบจริงจะมีการสร้าง Session เพื่อจัดการสถานะการล็อกอิน
        // session_start();
        // $_SESSION['loggedin'] = true;
        // $_SESSION['username'] = $username;
        // header("location: dashboard.php"); // ไปยังหน้าหลักหลังล็อกอินสำเร็จ
    } else {
        // หากข้อมูลไม่ถูกต้อง
        echo "<h2>เข้าสู่ระบบไม่สำเร็จ</h2>";
        echo "<p>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง โปรดลองใหม่อีกครั้ง</p>";
        echo "<a href='login.html'>กลับไปหน้าเข้าสู่ระบบ</a>";
    }
} else {
    // หากเข้าถึงไฟล์นี้โดยตรง
    echo "<p>โปรดเข้าสู่ระบบผ่านแบบฟอร์ม</p>";
    echo "<a href='login.html'>กลับไปหน้าเข้าสู่ระบบ</a>";
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเข้าสู่ระบบ</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>เข้าสู่ระบบ</h2>
    <form action="authenticate.php" method="POST">
        <div class="input-group">
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="login-button">เข้าสู่ระบบ</button>
    </form>
</div>

</body>
</html>