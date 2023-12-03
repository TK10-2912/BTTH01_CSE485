--a.	Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình (2 đ)
SELECT tieude FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE theloai.ten_tloai = N'Nhạc trữ tình';

--b.	Liệt kê các bài viết của tác giả “Nhacvietplus” (2 đ)
SELECT tieude FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE tacgia.ten_tgia = N'Nhacvietplus';
--c.	Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào. (2 đ)
SELECT ten_tloai FROM theloai LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai WHERE baiviet.ma_bviet IS null;

--d.	Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết. (2 đ)
SELECT
baiviet.ma_bviet AS 'Mã bài viết',
    baiviet.tieude AS 'Tên bài viết',
    baiviet.ten_bhat AS 'Tên bài hát',
    tacgia.ten_tgia AS 'Tên tác giả',
    theloai.ten_tloai AS 'Tên thể loại',
    baiviet.ngayviet AS 'Ngày viết'
FROM baiviet, theloai, tacgia where baiviet.ma_tgia = tacgia.ma_tacgia and baiviet.ma_tloai = theloai.ma_tloai

--e.	Tìm thể loại có số bài viết nhiều nhất (2 đ)
SELECT 
    theloai.ten_tloai AS 'Thể loại',
    COUNT(baiviet.ma_bviet) AS 'Số bài viết'
FROM 
    theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY 
    theloai.ten_tloai
ORDER BY 
    COUNT(baiviet.ma_bviet) DESC
LIMIT 1;

--f.	Liệt kê 2 tác giả có số bài viết nhiều nhất (2 đ)

SELECT 
    tacgia.ten_tgia AS 'Tác giả',
    COUNT(baiviet.ma_bviet) AS 'Số bài viết'
FROM 
    tacgia
LEFT JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY 
    tacgia.ten_tgia
ORDER BY 
    COUNT(baiviet.ma_bviet) DESC
LIMIT 2;
--g.	Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” (2 đ)

SELECT 
    ma_bviet AS 'Mã bài viết',
    tieude AS 'Tên bài viết',
    ten_bhat AS 'Tên bài hát'
FROM 
    baiviet
WHERE 
    ten_bhat LIKE '%yêu%' OR
    ten_bhat LIKE '%thương%' OR
    ten_bhat LIKE '%anh%' OR
    ten_bhat LIKE '%em%';

--h.	Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” (2 đ)


SELECT 
    ma_bviet AS 'Mã bài viết',
    tieude AS 'Tên bài viết',
    ten_bhat AS 'Tên bài hát'
FROM 
    baiviet
WHERE 
    ten_bhat LIKE '%yêu%' OR
    ten_bhat LIKE '%thương%' OR
    ten_bhat LIKE '%anh%' OR
    ten_bhat LIKE '%em%';

--i.	Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả (2 đ)
CREATE VIEW vw_Music AS SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, bv.tomtat, bv.noidung, bv.ngayviet, tl.ten_tloai, tg.ten_tgia FROM baiviet bv INNER JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai INNER JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia;


--j.	Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi. (2 đ)
CREATE PROCEDURE sp_DSBaiViet @TenTheLoai NVARCHAR(255) AS BEGIN IF EXISTS (SELECT 1 FROM theloai WHERE ten_tloai = @TenTheLoai) BEGIN SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, bv.tomtat, bv.noidung, bv.ngayviet, tl.ten_tloai, tg.ten_tgia FROM baiviet bv INNER JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai INNER JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia WHERE tl.ten_tloai = @TenTheLoai; END ELSE BEGIN RAISEERROR('Thể loại không tồn tại', 16, 1); END END;

--k.	Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo. (2 đ)

CREATE TRIGGER tg_CapNhatTheLoai
ON baiviet
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    IF OBJECT_ID('tempdb..#TempTable') IS NOT NULL
        DROP TABLE #TempTable;

    CREATE TABLE #TempTable
    (
        MaTheLoai INT,
        SoLuong INT
    );

    -- Cập nhật số lượng bài viết cho từng thể loại
    INSERT INTO #TempTable (MaTheLoai, SoLuong)
    SELECT
        ma_tloai,
        COUNT(*) AS SoLuong
    FROM
        baiviet
    GROUP BY
        ma_tloai;

    -- Update SLBaiViet trong bảng theloai
    UPDATE tl
    SET SLBaiViet = t.SoLuong
    FROM theloai tl
    INNER JOIN #TempTable t ON tl.ma_tloai = t.MaTheLoai;

    DROP TABLE #TempTable;
END;



--l.Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web. (5 đ)
Create Table User(
username varchar(255) unique not null,
password varchar(255))