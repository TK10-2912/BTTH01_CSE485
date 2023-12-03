-- e. tìm thể loại có bài viết nhiều nhất 
Select theloai.ten_tloai, COUNT(baiviet.ma_bviet) as SoBaiViet
from theloai join baiviet on theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ma_tloai
ORDER BY SoBaiViet DESC -- sắp xếp kết quả theo số bài viết giảm dần
LIMIT 1; -- chỉ lấy ra thể loại có số bài viết nhiều nhất

-- f. Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT tacgia.ma_tgia, tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS SoBaiViet
FROM tacgia
JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY tacgia.ma_tgia, tacgia.ten_tgia
ORDER BY SoBaiViet DESC
LIMIT 2;
-- g. Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” 
SELECT * FROM baiviet
WHERE tieude LIKE '%yêu%' OR tieude LIKE '%thương%' OR tieude LIKE '%anh%' OR tieude LIKE '%em%';
-- h. Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” 
SELECT * FROM baiviet
WHERE tieude LIKE '%yêu%' OR tieude LIKE '%thương%' OR tieude LIKE '%anh%' OR tieude LIKE '%em%'
   OR ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';


