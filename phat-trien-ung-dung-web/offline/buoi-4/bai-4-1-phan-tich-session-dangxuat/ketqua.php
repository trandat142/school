<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả Phân tích Bài 4.1</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 30px; background: #f8f9fa; color: #333; }
        .container { max-width: 900px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        h2 { color: #2980b9; margin-top: 25px; }
        .question-box { background: #eef7fc; border-left: 5px solid #3498db; padding: 15px; margin-bottom: 15px; border-radius: 0 4px 4px 0; }
        .answer-box { background: #fdfefe; border: 1px solid #e1e8ed; padding: 15px; border-radius: 4px; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f2f4f7; }
        code { background: #eee; padding: 2px 5px; border-radius: 3px; font-family: Consolas, monospace; color: #c7254e; }
        pre { background: #282c34; color: #abb2bf; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .btn { display: inline-block; padding: 8px 16px; background: #3498db; color: white; text-decoration: none; border-radius: 4px; }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
<div class="container">
    <h1>Báo cáo Trả lời Câu hỏi Thực hành Bài 4.1</h1>

    <div class="question-box">
        <strong>Câu a:</strong> Hãy cho biết về cú pháp trong PHP, hai trang trên (session.php và dangxuat.php) bị lỗi hoặc chưa chính xác ở điểm nào? Nếu có thì mô tả cụ thể?
    </div>
    <div class="answer-box">
        <table>
            <thead>
                <tr>
                    <th>Trang</th>
                    <th>Vấn đề / Lỗi cú pháp</th>
                    <th>Phân tích & Cách khắc phục</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>dangxuat.php</strong></td>
                    <td>Thiếu hàm <code>session_start()</code></td>
                    <td>Trong PHP, muốn truy cập hoặc thao tác với siêu biến toàn cục <code>$_SESSION</code> thì bắt buộc phải gọi <code>session_start()</code> ở đầu file.</td>
                </tr>
                <tr>
                    <td><strong>dangxuat.php</strong></td>
                    <td>Lỗi <em>Headers already sent</em> do gọi <code>header()</code> sau mã HTML</td>
                    <td>Thẻ <code>&lt;html&gt;&lt;head&gt;...</code> được xuất ra trước khi gọi hàm <code>header("Location: session.php");</code>. Lệnh header phải đặt trước mọi output HTML, nếu không sẽ phát sinh Warning và chuyển trang thất bại.</td>
                </tr>
                <tr>
                    <td><strong>session.php & dangxuat.php</strong></td>
                    <td>Kiểm tra biến <code>if($_SESSION["ThongTin"])</code> chưa an toàn</td>
                    <td>Khi biến session chưa từng được tạo, việc đọc trực tiếp sẽ gây cảnh báo <code>Notice: Undefined index</code>. Cần sửa thành <code>isset($_SESSION["ThongTin"]) &amp;&amp; $_SESSION["ThongTin"] != ""</code>.</td>
                </tr>
                <tr>
                    <td><strong>session.php</strong></td>
                    <td>Sai đường dẫn link đăng xuất</td>
                    <td>Đề bài viết <code>&lt;a href='logout.php'&gt;</code> trong khi tên file thực tế của trang đăng xuất là <code>dangxuat.php</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="question-box">
        <strong>Câu b:</strong> Hãy mô tả kết quả khi thực thi hai trang trên?
    </div>
    <div class="answer-box">
        <ul>
            <li><strong>Khi chạy session.php:</strong>
                <ul>
                    <li>Lần đầu vào trang: Hiển thị form nhập và thông báo <em>"Giá trị biến session chưa được gán"</em>.</li>
                    <li>Sau khi nhập chuỗi và bấm "Gán": Trang reload, lưu dữ liệu vào <code>$_SESSION["ThongTin"]</code> và in ra: <em>"Giá trị biến session là: [nội dung]. Đăng xuất"</em>.</li>
                </ul>
            </li>
            <li><strong>Khi bấm vào link Đăng xuất:</strong>
                <ul>
                    <li>Do file link là <code>logout.php</code> (nếu chưa sửa) sẽ gặp lỗi <strong>404 Not Found</strong>.</li>
                    <li>Nếu sửa thành <code>dangxuat.php</code> theo code cũ của đề: Trang <code>dangxuat.php</code> không có <code>session_start()</code> nên không đọc được <code>$_SESSION["ThongTin"]</code>, rơi vào nhánh <code>else</code> để chuyển hướng. Tuy nhiên do mã HTML đã xuất trước <code>header()</code>, trình duyệt có thể báo lỗi hoặc hiển thị trang trắng mà không xóa được session.</li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="question-box">
        <strong>Câu c:</strong> Để hoàn thiện chức năng đăng xuất (xóa session) ta cần thực hiện như thế nào?
    </div>
    <div class="answer-box">
        <p>Quy trình chuẩn hóa trang <code>dangxuat.php</code>:</p>
        <ol>
            <li>Gọi <code>session_start();</code> ngay đầu file.</li>
            <li>Hủy biến bằng <code>unset($_SESSION['ThongTin']);</code> hoặc toàn bộ session bằng <code>session_destroy();</code>.</li>
            <li>Điều hướng về trang chính bằng <code>header("Location: session.php"); exit();</code> mà không xuất bất kỳ mã HTML nào.</li>
        </ol>

        <h4>Mã nguồn chuẩn:</h4>
        <pre><code>&lt;?php
session_start();

// Hủy toàn bộ biến session
session_unset();
session_destroy();

// Điều hướng về trang session.php
header("Location: session.php");
exit();
?&gt;</code></pre>
    </div>

    <p><a class="btn" href="session.php">⬅ Trở về trang thực hành Session</a></p>
</div>
</body>
</html>
