# Checklist buổi 03

## Việc cần làm

- [ ] Xem tài liệu bài giảng và video trên Google Drive buổi 03.
- [ ] Làm demo các vòng lặp trong PHP (`for`, `while`, `do...while`, `foreach`).
- [ ] Làm demo thao tác với mảng (mảng tuần tự, mảng kết hợp, mảng đa chiều).
- [ ] Làm demo form upload file và xử lý biến siêu toàn cục `$_FILES`.
- [ ] Chạy thử các file demo trên localhost (WAMP / XAMPP).
- [ ] Thực hành các bài tập upload file trong thư mục `offline/buoi-3`.
- [ ] Kiểm tra cấu hình `upload_max_filesize` và `post_max_size` trong `php.ini`.

## Môi trường

- [ ] Apache trong XAMPP / WampServer chạy bình thường.
- [ ] Thư mục `uploads/` có quyền ghi (write permission).
- [ ] Mở được trang web qua `http://localhost/...`.
- [ ] File `php.ini` cho phép upload file (`file_uploads = On`).

## Cần nhớ

- [ ] Form upload bắt buộc phải có `method="post"` và `enctype="multipart/form-data"`.
- [ ] Dữ liệu file tải lên được lưu trong mảng siêu toàn cục `$_FILES`.
- [ ] Mảng `$_FILES` có 5 thuộc tính: `name`, `type`, `tmp_name`, `size`, `error`.
- [ ] Dùng hàm `move_uploaded_file()` để chuyển file từ thư mục tạm sang thư mục đích.
- [ ] Vòng lặp `foreach` là cấu trúc tối ưu nhất để duyệt mảng trong PHP.
- [ ] Mảng kết hợp dùng cú pháp khóa và giá trị: `$key => $value`.
- [ ] Luôn kiểm tra định dạng (extension) và dung lượng file trước khi lưu trên server.
- [ ] Dùng hàm `unlink()` để xóa file trên server khi cần dọn dẹp.
