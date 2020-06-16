-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2020 lúc 04:15 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `boardgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` int(11) NOT NULL,
  `thanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDonHang` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `maGiaoHang` int(11) NOT NULL,
  `ngayLapHoaDon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongTien` int(11) NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `maGioHang` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `sessionId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soLuongSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mieuTaSanPham` text COLLATE utf8_unicode_ci NOT NULL,
  `donGia` int(11) NOT NULL,
  `hinhAnhSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `ngayDat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongTien` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKhachHang` int(11) NOT NULL,
  `tenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChiGiaoHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gmailKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maLoaiSanPham` int(11) NOT NULL,
  `tenLoaiSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maLoaiSanPham`, `tenLoaiSanPham`) VALUES
(4, 'Boardgame gia đình'),
(7, 'Boardgame trẻ em'),
(8, 'Boardgame chiến thuật'),
(9, 'Boardgame giải trí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `tenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenNguoiQuanTri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailNguoiQuanTri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `maVaiTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`tenDangNhap`, `matKhau`, `tenNguoiQuanTri`, `emailNguoiQuanTri`, `trangThai`, `maVaiTro`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Phát', 'tanphat@gmail.com', 'Active', 1),
('vinhadmin', '1591', 'Vinh', 'nguyenhuuvinh1591@gmail.com', 'Active', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` int(11) NOT NULL,
  `maLoaiSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` int(11) NOT NULL,
  `mieuTa` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `sanPhamNoiBat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `maLoaiSanPham`, `tenSanPham`, `soLuong`, `donGia`, `mieuTa`, `hinhAnh`, `trangThai`, `sanPhamNoiBat`) VALUES
(2, 9, 'Lớp Học Mật Ngữ - Cuộc đua sao chổi (Mới 2020)', 10, 440000, 'Lớp Học Mật Ngữ là một trò chơi cực kỳ dễ thương và đặc sắc được sáng tạo từ chính nhóm tác giả B.R.O, bộ board game được chuyển thể từ truyện tranh cùng tên, Best Seller 2016-2018 tại Fahasa và là một trong 10 tựa sách được yêu thích nhất 2018. Được phát hành bởi BoardgameVN và Review bởi Time Sun See Studio, Toy Station, Comicola, Thơ Nguyễn', 'lhm1578450629.jpg', '1', 1),
(3, 8, 'Lớp Học Mật Ngữ - Siêu Thú Ngân Hà', 1, 660000, 'Tiếp nối thành công vang dội của board game Cuộc Đua Sao Chổi, “Lớp Học Mật Ngữ” đã quay trở lại với một diện mạo hoàn toàn mới, mở ra một chuyến phiêu lưu màu sắc và đầy kỳ bí mang tên: SIÊU THÚ NGÂN HÀ.\r\n\r\nVới nét vẽ được thổi hồn ấn tượng bởi chính nhóm tác giả B.R.O cùng lối chơi hài hước, nâng tầm tư duy chiến thuật từ Board Game VN, Siêu Thú Ngân Hà chắc chắn sẽ làm thỏa mãn sự kì vọng không chỉ fan bộ truyện Lớp Học Mật Ngữ, mà còn cả tín đồ cuồng mộ board game.', 'unt1589950683.jpg', '1', 1),
(4, 4, 'Đường Đua Tài Chính', 1, 440000, 'Đường Đua Tài Chính là bộ trò chơi giáo dục tài chính cho trẻ từ 8 - 15 tuổi, được sáng tạo bởi tâm huyết của 3 tiến sĩ - giảng viên ĐH Quốc gia Hà Nội.\r\n\r\nThông qua các hành động trong trò chơi, các bé sẽ được tiếp nhận những khái niệm tài chính cơ bản; trải nghiệm đường đi của dòng tiền thông qua thu nhập, chi tiêu, đầu tư và trao tặng', '11567949108.jpg', '1', 1),
(5, 8, 'Splendor', 12, 800000, 'Tại thời kỳ Phục Hưng đầy hưng thịnh với sự phát triển nhanh chóng về kinh tế và chính trị, liệu bạn có bỏ qua cơ hội đầy thuận lợi với những thương vụ đá quý đầy hấp dẫn? Đến với Splendor, bạn sẽ trở thành một nhà thương gia, mua bán các loại đá quý, các phương tiện di chuyển, các cửa hàng để vừa làm giàu cho bản thân, vừa gây được tiếng vang và giành được thanh danh đối với các nhà quyền quý, giới thượng lưu.', '131574075745.jpg', '1', 1),
(7, 9, 'Meeple Circus (US)', 12, 970000, 'Giờ trình diễn đang đến gần, tất cả cho một màn trình diễn để đời cuối cùng. Bạn, người phụ trách các tiết mục biểu diễn, đã sẵn sàng cho thời khắc trọng đại này? Những bản nhạc của rạp xiếc vui tươi, những màn trình diễn ấn tượng và những tràng pháo tay không ngớt dành tặng cho những tiết mục xuất sắc, tất cả sẽ có trong Meeple Circus.', 'pic1555391928.jpg', '1', 0),
(8, 8, 'Black Orchestra (US)', 12, 1120000, 'Khi sự kiểm soát của Hitler với nước Đức ngày càng chặt chẽ và sự điên cuồng của hắn ngày càng lộ rõ, những kẻ đứng đầu Đức Quốc Xã bắt đầu nung nấu kế hoạch ám sát hắn. Khi thời gian càng trôi đi, dã tâm của Hitler càng lớn dần lên, số ít những kẻ liều lĩnh ấy phải xây dựng sức mạnh và chuẩn bị cho thời khắc chín muồi. Gestapo đã lần theo được dấu vết của họ, chúng gọi họ với cái tên “Schwarze Kapelle”, tức “Dàn nhạc đen”..', 'bla1560324626.jpg', '1', 0),
(9, 9, 'Charterstone (US)', 12, 1175000, 'Vương quốc Greengully thịnh vượng, được cai trị trong nhiều thế kỷ bởi Vua muôn đời, đã ban hành một sắc lệnh cho công dân của mình để xâm chiếm các vùng đất rộng lớn ngoài biên giới. Trong nỗ lực bắt đầu một ngôi làng mới, Vua vĩnh cửu đã chọn sáu công dân cho nhiệm vụ, mỗi người có một bộ kỹ năng duy nhất họ sử dụng để xây dựng điều lệ.', '51g1517460009.jpg', '1', 0),
(10, 8, 'Clank In Space (US)', 12, 1080000, 'Burgle theo cách của bạn để phiêu lưu\r\nChúa tể ác quỷ Eradikus có tất cả trừ chinh phục thiên hà. Bạn và những tên trộm đồng loại của bạn đã thách thức nhau lén lút quanh con tàu của anh ta và đánh cắp những cổ vật quý giá nhất của anh ta!\r\n', '91c1520334817.jpg', '1', 0),
(11, 8, 'Dinosaur Island (US)', 12, 1000000, 'Vài năm trước, các nhà khoa học đã phát hiện ra một cách để nhân bản khủng long từ DNA được bảo tồn trong hồ sơ hóa thạch. Sau một vài rủi ro trong quá trình khôi phục, quá trình đã ổn định. Ngày nay, nó đã bảo vệ các bảo tàng đã bị tuyệt chủng, vì các nhà đầu tư đã biến những khu bảo tồn khủng long ban đầu thành những công viên giải trí nhộn nhịp thực sự cho người hâm mộ khủng long trên toàn thế giới.', 'di1555393042.png', '1', 0),
(12, 8, 'Everdell (US)', 12, 1120000, 'Trong thung lũng Everdell quyến rũ, bên dưới những tán cây cao chót vót, giữa những dòng suối uốn khúc và những rặng núi rêu phong, một nền văn minh của những sinh vật rừng đang phát triển mạnh và mở rộng. Từ Everfrost đến Bellsong, nhiều năm đã đến và đi, nhưng đã đến lúc các vùng lãnh thổ mới được định cư và các thành phố mới được thành lập. Bạn sẽ là người lãnh đạo của một nhóm sinh vật có ý định thực hiện một nhiệm vụ như vậy. Có các tòa nhà để xây dựng, các nhân vật sống động để gặp gỡ, các sự kiện để tổ chức - bạn có một năm bận rộn phía trước. Mặt trời sẽ tỏa sáng nhất trên thành phố của bạn trước khi mặt trăng mùa đông mọc lên? Everdell là một trò chơi của tòa nhà tableau năng động và vị trí công nhân. Đến lượt mình, người chơi có thể thực hiện một trong ba hành động: 1. Đặt Công nhân: Mỗi người chơi có một bộ sưu tập các Công nhân', 'pic1571383022.jpg', '1', 0),
(13, 8, 'Council of 4 (US)', 12, 900000, 'Trong Cosmic Encounter, bạn sẽ là người đại diện cho 1 trong 51 chủng tộc khác nhau điều hành các tàu vũ trụ ở 5 hành tinh quê nhà của mình đi tấn công các hành tinh khác, để giành được quyền kiểm soát. Đồng thời bạn cũng phải củng cố phòng thủ ở các hành tinh của mình để tránh bị người khác tấn công và cướp mất. Người chiếm được 5 hành tinh không phải quê hương mình sẽ là người chiến thắng.', 'cou1557991904.png', '1', 0),
(14, 8, 'Sagrada (US)', 12, 890000, 'Người chơi vào vai những người nghệ nhân làm kính lừng danh được mời đến Vương cung thánh đường Sagrada Família để tạo nên những tuyệt tác điêu khắc bằng kính có một không hai trên đời. \r\nĐây là công trình biểu tượng của thành phố Barcelona, Tây Ban Nha do kiến trúc sư Antoni Gaudí thiết kế và sau hơn một thế kỷ xây dựng, thánh đường này vẫn chưa được chính thức hoàn thiện. Các công trình điêu khắc kính tại đây là cả một gia tài nghệ thuật, thu hút hàng triệu lượt khách du lịch đến tham quan hằng năm. Thông qua tựa game cùng tên, Sagrada sẽ mang đến cho người chơi trải nghiệm tạo nên những ‘khung cửa kính’ đầy màu sắc từ những viên xí ngầu trong suốt cũng tinh tế không kém!', '91w1505291811.jpg', '1', 0),
(15, 8, 'Clank! (US)', 12, 960000, 'Burgle theo cách của bạn để phiêu lưu trong trò chơi hội đồng quản trị boong tàu Clank! Lẻn vào một hang ổ trên núi của một con rồng giận dữ để đánh cắp các cổ vật quý giá. Đi sâu hơn để tìm thêm các chiến lợi phẩm có giá trị. Có được thẻ cho bộ bài của bạn và xem khả năng của bạn phát triển.\r\n\r\nHãy nhanh chóng và im lặng. Một bước sai và CLANK! Mỗi âm thanh bất cẩn thu hút sự chú ý của con rồng, và mỗi cổ vật bị đánh cắp làm tăng cơn thịnh nộ của nó. Bạn chỉ có thể tận hưởng sự cướp bóc của mình nếu bạn thực hiện nó từ sâu thẳm còn sống!', 'cla1499245755.jpg', '1', 0),
(16, 4, 'Timeline Challenge (US)', 12, 675000, 'Timeline là một dòng game mang tính chất giáo dục rất cao, được nhiều bậc phụ huynh lựa chọn để dạy cho trẻ nhỏ về kiến thức lịch sử. Ngoài ra, đây còn là một tựa game giúp rèn luyện trí nhớ cũng như là một cách học thêm nhiều điều mới về thế giới mà mình đang sống.', 'pic1571192879.jpg', '1', 0),
(17, 4, 'The Mind (US)', 12, 500000, 'The Mind không chỉ là một trò chơi, mà còn là một thử nghiệm, một trải nghiệm đồng đội trong đó bạn không thể trao đổi thông tin và cần vượt qua tất cả các mức độ của game.\r\nMột bộ gồm có các lá được đánh số từ 1-100. Trong game, bạn cần hoàn thành 12, 10 hoặc 8 cấp độ tương ứng với 2, 3 hoặc 4 người chơi. Ở một cấp độ, mỗi người chơi sẽ nhận được số bài bằng số cấp: 1 lá ở cấp 1, 2 lá ở cấp 2… Mọi người phải lần lượt đánh lá bài của mình này vào giữa bàn theo thứ tự tăng dần nhưng không ai được nói mình đang giữ lá số bao nhiêu. Bạn cần nhìn vào mắt nhau, và khi bạn thấy đã đến thời điểm thích hợp, đánh ra lá thấp nhất của mình. Nếu không ai đánh lá thấp hơn lá bài bạn vừa đánh thì hoàn thành cấp độ và trò chơi tiếp tục. Nếu có người đánh lá thấp hơn, toàn bộ người chơi lật ngửa và bỏ toàn bộ lá bài thấp hơn lá bạn vừa đánh đồng thời bạn mất một mạng.', 'pic1564397291.jpg', '1', 0),
(19, 4, 'Lotus (US)', 12, 490000, 'Dọn dẹp đầu của bạn và tận hưởng sức mạnh yên tĩnh của khu vườn Lotus. Cần có sự chăm sóc và nuôi dưỡng khéo léo để phát triển những bông hoa này với tiềm năng đầy đủ của chúng, nhưng một khi được hái, chúng cung cấp cho chủ nhân của chúng sự khôn ngoan.', 'pic1571200312.jpg', '1', 0),
(20, 4, 'Gizmos Việt', 12, 1050000, 'Hội nghị khoa học lớn nhất năm đang đến gần! Tất cả những nhà khoa học lỗi lạc nhất đều đã tụ hội ở nơi đây, sẵn sàng trình diễn và tạo ra những cỗ máy mê hoặc lòng người. Tất cả vì mục tiêu trở thành nhà khoa học vĩ đại nhất, và tạo ra những cỗ máy tối thượng!', 'art1583401041.jpg', '1', 0),
(21, 4, 'Penguin Trap - Bẫy chim cánh cụt', 12, 200000, 'Người chơi cùng lắp ghép để xếp sàn băng và đặt chim cánh cụt lên đó. Sau đó, người chơi lần lượt dùng búa để đập các tảng băng theo vòng sau. Cứ khéo léo đập từng tảng băng, người nào làm chim cánh cụt ngã sẽ là người thua cuộc! ', 'boa1493805159.jpg', '1', 0),
(22, 4, 'Xếp Toán - Cộng Trừ', 12, 120000, 'Xếp Toán Cộng Trừ là một sản phẩm made in Vietnam với chất lượng cực tốt, an toàn, đảm bảo sẽ khiến bạn hài lòng. Vừa học, vừa chơi cùng với Xếp Toán, phiên bản Cộng Trừ!', 'dsc1491805217.jpg', '1', 0),
(23, 4, 'Dixit (US)', 12, 670000, 'Dixit là trò chơi tuyệt vời được thiết kế cho 3-6 người (12 với các bản Dixit mở rộng) và thực sự dễ hiểu với bất kì ai. Về cơ bản, Dixit chỉ là 1 cỗ bài quá khổ đẹp kì lạ và mơ hồ được vẽ bởi các danh họa Marie Cardouat, Piero và Xavier.', 'pic1565229593.jpg', '1', 0),
(24, 4, 'Pandemic (US)', 12, 1100000, 'Game tạo ra rất nhiều cơ chế để người chơi có thể thua cuộc, tượng trưng cho hoàn cảnh cực kỳ hiểm nghèo mà đội của bạn đang phải đối mặt. Vì thế, nó đòi hỏi các bạn phải có khả năng teamwork cực kỳ tốt, biết cách phối hợp với nhau để sử dụng khả năng của mình đúng lúc và hoàn thành nhiệm vụ trong thời gian ngắn nhất. Thế giới đang cần bạn - những người anh hùng, những hi vọng cuối cùng của nhân loại!', 'pan1497438625.jpg', '1', 0),
(25, 4, 'Five Tribes (US)', 12, 1305000, 'Nếu các bạn đã từng chơi Ô ăn quan, các bạn hẳn sẽ rất thích thú với tựa game này. Trong Five Tribes, người chơi lần lượt lấy toàn bộ meeple ở 1 ô bất kỳ và rải chúng lên từng ô cạnh đó. Bạn sẽ thu về tất cả meeple cùng màu với meeple cuối cùng mà bạn rải ở ô đó và thực hiện chức năng của nó. Thật đơn giản phải không nào?', 'fiv1497435355.jpg', '1', 0),
(27, 4, 'Imhotep (US)', 14, 1170000, 'Trải qua sáu vòng, họ di chuyển những hòn đá bằng gỗ để tạo ra năm tượng đài và đến lượt, một người chơi chọn một trong bốn hành động: Mua đá mới, nạp đá trên thuyền, đưa thuyền đến tượng đài hoặc chơi một hành động Thẻ. Mặc dù điều này nghe có vẻ dễ dàng, nhưng những người chơi khác liên tục cản trở các kế hoạch xây dựng của bạn bằng cách thực hiện các kế hoạch của riêng họ. Chỉ những người có thời gian tốt nhất - và những viên đá để sao lưu kế hoạch của họ - mới chứng tỏ là người xây dựng tốt nhất của Ai Cập.', 'pic1504924193.jpg', '1', 0),
(28, 8, '7 Wonders Armada (US)', 12, 1180000, '7 Kỳ quan: Armada là bản mở rộng của 7 Kỳ quan có thể kết hợp với trò chơi cơ bản hoặc bất kỳ bản mở rộng nào. Mỗi người chơi chịu trách nhiệm về một Hội đồng \"Hải quân\" khi bắt đầu trò chơi của họ cùng với Hội đồng Wonder của họ. 7 Kỳ quan: Armada bao gồm các thẻ đỏ, xanh lá cây, vàng và xanh dương bổ sung để xáo trộn vào bộ bài. So sánh sức mạnh của bạn với mọi người chơi cùng bàn, và không chỉ những người bên cạnh bạn. Chiến đấu trên vùng biển để giành điểm Chiến thắng!', '7_w1588648037.jpg', '1', 0),
(29, 8, 'Dozen War', 14, 1700000, 'Dozen War (Thập Nhị Chiến) là một board game chiến thuật  được sáng tạo bởi người Việt, lấy bối cảnh một thế giới giả tưởng có tên là Mativen cùng với cuộc chiến giữa 12 vị anh hùng.', 'art1547451645.png', '1', 0),
(30, 8, 'The Manhattan Project', 13, 1705000, 'Trong the Manhattan Project, bạn sẽ trở thành những nhà lãnh đạo các cường quốc trong Thế chiến II, chạy đua vũ trang với nhau trong công cuộc chế tạo những quả bom nguyên tử có sức công phá lớn, đem lại điểm chiến thắng nhất định. Người dành được số điểm mà trò chơi đề ra (tùy theo số người chơi) đầu tiên sẽ trở thành quốc gia thống trị thế giới, và giành chiến thắng chung cuộc.', 'pic1554974085.jpg', '1', 0),
(31, 8, 'Root (US)', 12, 1890000, 'Root được xem như là bước tiếp theo của Leders Games từ sau Vast: The Crystal Caverns. Một tựa game thể loại phiêu lưu và chiến tranh tranh giành lãnh thổ của các chủng sinh vật sống trong rừng, trong đó những người chơi sẽ chiến đấu để giành quyền kiểm soát khu rừng rộng lớn', 'pic1554970264.jpg', '1', 0),
(32, 8, 'Marvel Champions (US)', 11, 2120000, 'Mặc dù mới chỉ được ra mắt vào cuối năm 2019, nhưng Marvel Champions đã liên tiếp xô đổ những kỷ lục, đạt top bán cháy hàng ngay mỗi khi hàng ra lại, cũng như nằm trong top game hay nhất năm của hàng loạt các trang uy tín cũng như được các board game reviewer khuyến khích chơi rất nhiều. Các bản mở rộng của game cũng liên tục được ra mới và được đông đảo người hâm mộ đón nhận. Chúng ta hãy cùng tìm hiểu Marvel Champions, đứa con tinh thần mới nhất đến từ Fantasy Flight Games.', 'bia1586856413.png', '1', 0),
(33, 8, 'Between Two Castles of Mad King Ludwig (US)', 12, 1140000, 'Nếu bạn đã từng chơi Between Two Cities, hay The Castles of Mad King Ludwig thì về cơ chế thì cả ba trò chơi này khá giống nhau. Đối với Between Two Castles of Mad King Ludwig, trò chơi yêu bạn phải xây hai tòa lâu đài và phải hợp tác với người chơi khác để hoàn thành nhiệm vụ của mình. Nhưng chỉ có một người mới được vinh danh là kỹ sự xây dựng danh giá nhất và chỉ có một tòa lâu đài với tầm nhìn xa, sự sáng tạo và xuyên suốt trong một thời gian nhất định mới có thể chiến thắng.', 'pic1554975639.jpg', '1', 0),
(34, 8, 'Room 25 - Season 2 (US)', 12, 2200000, 'Trong Phòng 25: phần 2, phần mở rộng cho Phòng 25, tất cả các nhân vật đều có khả năng đặc biệt của riêng mình. Ngoài ra, nhờ có sự gia tăng adrenaline, những người tham gia có thể thực hiện một hành động bổ sung trong lượt mà họ lựa chọn. Tất nhiên, chúng tôi đã làm cho sự phức tạp trở nên khác biệt - và khó khăn hơn - bằng cách thêm các phòng mới ... bạn sẽ đương đầu với thử thách chứ?', 'roo1560329487.jpg', '1', 0),
(36, 8, 'Root - The Riverfolk Expansion (US)', 12, 1270000, 'A new faction is added to the forest fray.\r\nThe Riverfolk expansion includes:\r\nA New Core Faction: The Riverfolk Company\r\nA New Core Faction: The Lizard Cult\r\nAn Extra Vagabond\r\nOne Custom Card Holder\r\nCooperative Scenarios\r\nRules for Bot Play\r\nand Three Additional Vagabond Variants', 'pic1554974779.jpg', '1', 0),
(37, 8, 'Terraforming Mars Prelude (US)', 11, 520000, 'Khi các tập đoàn lớn đã sẵn sàng để bắt đầu quá trình phát triển, giờ đây bạn có cơ hội đưa ra những lựa chọn ban đầu sẽ đến với công ty của bạn và đặt ra hướng đi cho lịch sử tương lai của Sao Hỏa - ​​đây là khúc dạo đầu cho những nỗ lực lớn nhất của bạn !', 'pic1565250051.jpg', '1', 0),
(38, 9, 'Bom Lắc', 12, 120000, 'Trong thế giới ngầm bạn luôn phải đón nhận những rủi ro vào mọi lúc, hãy chuẩn bị để gài bom đối phương trước khi chính bạn bị phát nổ. Chỉ người sống sót cuối cùng giành chiến thắng.\r\nMột trò chơi cực kỳ bựa, ngớ ngẩn, nhảm nhí nhưng lại… siêu BẤT NGỜ và VUI!!!\r\nGieo xúc xắc và xem chuyện gì sẽ xảy ra. Mỗi người chơi có một chức năng đặc biệt có thể kích hoạt để thay đổi số phận của mình! \r\nMột party game đơn giản, học luật trong 5 phút và có thể chơi lên đến 50 người!', 'bom1498790334.jpg', '1', 0),
(40, 9, 'Bomb Drop', 12, 120000, 'Phổ Biến Trò Chơi Gia Đình Vẽ Rất Nhiều Bom Drop Shipping Vui Vẻ Ban Trò Chơi', 'pic1578046959.jpg', '1', 0),
(41, 9, 'Hoot Owl Hoot', 12, 770000, 'Mục tiêu của trò chơi là di chuyển tất cả những con cú từ đầu đến tổ trước khi mặt trời mọc. Người chơi thay phiên nhau, nhưng làm việc cùng nhau. Để bắt đầu, đặt mã thông báo mặt trời trong không gian đầu tiên trên rãnh mặt trời và đặt 3 con cú trên không gian bắt đầu. Tặng 3 thẻ cho mỗi người chơi. Người chơi giữ các thẻ của họ ngửa mặt trước mặt để họ có thể làm việc cùng nhau để lên chiến lược về cách di chuyển. Nếu người chơi có thẻ mặt trời, cô ấy phải loại bỏ mặt trời và di chuyển mã thông báo mặt trời lên 1 không gian', 'pic1565233517.jpg', '1', 0),
(42, 9, 'Kính Hiển Vi Giấy Foldscope', 12, 590000, 'Sản phẩm dành cho các \"nhà thám hiểm thực thụ\" thực hiện các thí nghiệm hiển vi ở bất kỳ đâu và bất kỳ lúc nào. \r\n\r\nBao gồm các công cụ thu thập mẫu vật, chuẩn bị tiêu bản, thiết bị hiển vi nâng cao và hơn thế nữa.', '51564040245.jpg', '1', 0),
(43, 9, 'Board Game Đồng Hành', 12, 495000, 'Mỗi vùng đất, mỗi miền quê của Việt Nam đều rất đỗi thân thương và có nhiều điều thú vị mà ít ai có cơ hội để khám phá hết. Tấm bản đồ của trò chơi Đồng Hành cố gắng tóm tắt được những nét độc đáo này.', '4651572316102.jpg', '1', 0),
(44, 9, 'Lầy', 12, 120000, 'Một bộ bài Lầy bao gồm 113 lá bài \r\n\r\n+ 4 màu: Đỏ, Xanh dương, Xanh lá và Vàng. \r\n\r\n+ Mỗi màu sẽ có những con số từ 1 - 9 và những lá bài có chức năng đặc biệt và siêu cấp lầy lội. ', 'n11568260441.jpg', '1', 0),
(45, 9, 'Dice City', 12, 765000, 'Phát triển làng của bạn! Cung cấp cho các nhu cầu kinh tế, văn hóa và tinh thần của công dân của bạn và tạo ra một ngôi làng sôi động và phát triển. Bạn sẽ xây dựng một quân đội lớn và đánh bại kẻ cướp? Tạo hàng hóa thương mại và bán chúng cho hàng xóm, hoặc xây dựng các công trình văn hóa tuyệt vời? Tại sao không phải cả ba? Các chiến lược là sâu sắc nhưng chơi trò chơi là đủ dễ dàng cả người chơi trẻ và già.', 'pic1554958266.jpg', '1', 0),
(46, 9, 'Wingspan', 12, 3150000, 'Đây là một game chơi chim đúng nghĩa, và nếu chơi chim cũng là một loại nghệ thuật, thì mỗi người chơi sẽ là một người người nghệ sĩ thực thụ. Trong trò chơi, người chơi sẽ được hoá thân thành những nhà nghiên cứu chim, nhà sinh thái học, động vật học khi phải tính toán để quyết định xem mình nên thu hút thêm nhiều loài chim về tổ, hay là cho chúng đẻ trứng hay là phải đi nhặt thêm đồ ăn về cho chúng, để tạo thành một mạng lưới bảo tồn các loài chim hoang dã. Tất cả vì một mục tiêu duy nhất là làm thoả mãn yêu cầu của nhiệm vụ và giành điểm để giành chiến thắng sau các vòng chơi.', 'win1557995495.jpg', '1', 0),
(47, 9, 'Bài Thính', 13, 80000, 'Phiên bản đặc biệt của game bài nổi tiếng Uno, đó chính là Bài Thính! Luật chơi tương tự như Uno thông thường nhưng thêm vào các lá bài đặc biệt có chức năng như ra lệnh, đặt một chủ để, xoay vòng, uống một ly nước, hoặc thậm chí ép phải .... kiss người khác!  Bài Thính là một game phù hợp để chơi trong các nhóm lớn, đặc biệt là những buổi chè chén, party. Nếu bạn thích Uno, bạn không thể bỏ qua Bài Thính được! ', 'art1547455478.jpg', '1', 0),
(48, 9, 'Bắn Gà Là Tạch', 12, 450000, 'Một nhà khoa học điên chế tạo thành công một loại virus nguy hiểm chết người. Bất kỳ ai dính phải sẽ biến thành GÀ. Lúc đầu chỉ một nhóm nhỏ bị nhiễm, dần dần chúng nhân giống nhiều khiến đến hơn 80% dân số thế giới đã trở thành gà. Những con gà này mang trong mình đầy virus, và chúng sẽ phát tán ra không khí khi bị giết, vì thế nên mới gọi là BẮN GÀ LÀ TẠCH cả lũ.', 'ban1546415489.jpg', '1', 0),
(49, 4, 'Codenames', 13, 670000, 'Hai đối thủ spymasters biết các đại lý ở mỗi địa điểm. Họ gửi tin nhắn được mã hóa cho các nhà điều hành lĩnh vực của họ đi đâu cho các cuộc họp bí mật. Người vận hành phải khéo léo. Một sai lầm giải mã có thể dẫn đến một cuộc chạm trán khó chịu với một đặc vụ kẻ thù - hoặc tệ hơn, với kẻ ám sát! Cả hai đội đua nhau liên lạc với tất cả các đại lý của họ, nhưng chỉ có một đội có thể giành chiến thắng', 'cod1495450642.jpg', '1', 0),
(50, 4, 'Agricola', 13, 1150000, 'Game có cơ chế đặt công nhân quen thuộc, nhưng được nâng tầm với rất nhiều cách tính điểm khác nhau, khiến cho người chơi luôn phải tính toán bước đi của mình một cách cực kỳ hợp lý. Mỗi người sẽ có một nông trại riêng, nhưng chỉ có một khu chợ duy nhất nơi bạn có thể lấy tài nguyên. Vậy bạn sẽ lấy gì và để lại gì cho người khác? Một cuộc cạnh tranh không khoan nhượng giữa các nông trại đã bắt đầu, và ai là người đầu tư một cách khôn ngoan nhất sẽ đạt được số điểm cao và là người chiến thắng ở cuối game.', 'agr1495450090.jpg', '1', 0),
(51, 9, 'Tam Quốc Sát - Quốc Chiến - Yokagames', 12, 480000, 'Trong thời kỳ tam quốc, loạn thế liên miên, chiến tranh không dứt. Các đại thế lực đã bắt đầu hình thành, các tiểu thế lực cũng bắt đầu tìm đến nhau, nhen nhóm thay đổi trật tự thế giới. Thời thế tạo anh hùng, các vị kiêu vương mãnh tướng bắt đầu xuất hiện tạo nên một thế giới Tam Quốc Diễn Nghĩa đầy màu sắc oanh liệt và bi tráng. Những mãnh tướng như Quan Vũ, Lữ Bố, Trương Phi, Triệu Vân,... Những người nắm trong tay vận mệnh đế vương Lưu Bị, Tào Tháo, Tôn Quyền,... đều trở nên sống động trong một card game cực nổi tiếng - Tam Quốc Sát.', '_ds1528256673.jpg', '1', 0),
(52, 9, 'Tam Quốc Sát - Vương Triều Chiến - Yokagames', 12, 260000, 'Thời thế tạo anh hùng. Trong kỷ nguyên tam quốc với những cuộc chiến tranh loạn lạc xảy ra khắp nơi, có những nhân vật xuất chúng nổi lên với tài năng đặc biệt – họ chính là những người có sức mạnh thay đổi định mệnh. Nhiều cái tên nổi tiếng như Lưu Bị, Quan Vũ, Tào Tháo, Triệu Tử Long, Lữ Bố, Chân Cơ, Tôn Quyền,... được đề cập trong tiểu thuyết Tam Quốc Diễn Nghĩa, nay trở nên sống động trong một card game phổ biến nhất hiện nay – Tam Quốc Sát.', 'art1547455904.jpg', '1', 0),
(53, 7, 'Jishaku', 12, 370000, 'Hãy tưởng tượng bạn là một Samurai quyền năng, 1 ninja của Nhật Bản cổ đại hoặc một bậc thầy võ thuật huyền thoại. \r\n\r\nLiệu bạn có đang sở hữu 1 sức mạnh nào giúp bạn đánh bại đối thủ?\r\n\r\nTrong tay những viên đá “Jishaku” chứa đầy ma thuật này, liệu bạn có thể kiểm soát được từ lực và điều khiển chúng theo ý mình?', 'pic1571311927.jpg', '1', 0),
(54, 7, 'The Game of Life', 12, 1300000, 'Game of Life là một tựa game mô tả về quá trình của đời người. Game theo chân người chơi từ tuổi ấu thơ đến khi có những ngã rẽ nhất định của cuộc đời. ... Game of Life là một tựa game phù hợp với gia đình hoặc các nhóm chơi 3 - 4 người.', 'pic1567417013.jpg', '1', 0),
(55, 7, 'Cờ Tỷ Phú Monopoly - Ultimate Banking Edition', 12, 799000, 'Phiên bản ngân hàng điện tử vô cùng chất của Monopoly! Những tờ tiền giấy khó quản lý, những giờ phút cộng trừ tiền làm phiền bạn sẽ không còn xuất hiện nữa!\r\nVới phiên bản Ultimate Banking này, những gì bạn cần chỉ là một chiếc thẻ đóng vai trò thẻ ngân hàng trong trò chơi, và mọi phép tính đều sẽ được máy quẹt tiền xử lý giúp!\r\n', 'mon1497439318.jpg', '1', 0),
(56, 7, 'Taboo', 13, 650000, 'Cấm kỵ là một trò chơi chữ bên. Người chơi thay phiên nhau mô tả một từ hoặc cụm từ trên thẻ rút cho đối tác của họ mà không sử dụng năm từ hoặc cụm từ bổ sung phổ biến cũng trên thẻ. Các đối tác đối lập xem đồng hồ bấm giờ và sử dụng còi để dừng trò chơi, bấm nút người chơi mô tả nếu một trong năm từ hoặc cụm từ giới hạn được sử dụng hoặc người chơi mô tả thực hiện bất kỳ cử chỉ nào. Nhóm mô tả nhận được một điểm cho mỗi thẻ mà họ đoán thành công và nhóm đối lập nhận được điểm cho mỗi thẻ họ chuyển qua, thực hiện cử chỉ hoặc mất khi nói một trong những từ hoặc cụm từ giới hạn.', 'tab1495439975.jpg', '1', 0),
(57, 7, 'Tokaido', 12, 1200000, 'Ở Tokaido, mỗi người chơi là một du khách băng qua \"con đường biển phía đông\", một trong những con đường tráng lệ nhất của Nhật Bản. Trong khi đi du lịch, bạn sẽ gặp gỡ mọi người, nếm những bữa ăn ngon, thu thập những món đồ đẹp, khám phá những bức tranh toàn cảnh tuyệt vời, và ghé thăm những ngôi đền và những nơi hoang dã nhưng vào cuối ngày, khi mọi người đã đến cuối con đường, bạn sẽ phải đến khách du lịch khởi xướng nhất - có nghĩa là bạn sẽ phải là người khám phá ra những điều thú vị và đa dạng nhất.', 'tok1495446211.jpg', '1', 0),
(58, 7, 'Bi Lắc', 12, 800000, 'Quay về với Bi Lắc tuổi thơ nhưng với bi lắc mini dài 60cm đóng gỗ tuyệt vời! Bạn muốn chơi bi lắc nhưng bạn không phải lúc nào đứng cạnh bàn bi lắc. Với sản phẩm bộ bi lắc mini của chúng tôi bạn có thể mang nó đi mọi nơi và mở ra chơi bất cứ lúc nào. Bộ bi lắc mini để bàn đem lại những giờ phút sôi động chẳng kém gì bàn bi lắc kích cỡ thông thường, chỉ khác là nó sẽ không chiếm dụng hết nửa không gian căn phòng và có giá bán chỉ bằng một nửa. Đây là trò chơi vận động mang tính giải trí, rèn luyện khả năng phán đoán, phản xạ nhanh trí, tinh mắt và đồng thời nâng cao sức khỏe thể chất. Chúng ta có thể chơi mọi lúc và mọi nơi khi có thời gian rảnh rỗi. Bộ bi lắc này có thể dễ dàng cất gọn hoặc mang theo trong những chuyến du lịch, bộ bi lắc mini để bàn đi kèm 2 quả bóng, 4 thanh thép và 6 người chơi ở mỗi bên.', 'scr1530600687.png', '1', 0),
(59, 7, 'Xếp gỗ trí tuệ Tangram', 12, 39000, 'Xếp gỗ tạo hình hấp dẫn - Có thể tạo đến hơn 50 hình khác nhau\r\n\r\n', 'dan1441362003.jpg', '1', 0),
(60, 7, 'Trò Chơi Đâm Hải Tặc', 12, 100000, 'Trò Chơi Boardgame Đâm Hải Tặc sẽ tìm ra người chiến thắng với quy luật do chính bạn đặt ra. Hãy dùng dao găm của mình để buộc tên hải tặc xuất đầu lộ diện để tận hưởng những trải nghiệm giải trí thú vị. Chỉ có 1 lỗ duy nhất mà khi đâm vào sẽ trúng vào Hải tặc, bạn hãy thử vận may của mình khi chơi.', 'img1451892656.jpg', '1', 0),
(61, 7, 'Dominion', 12, 1520000, 'Bạn là một vị vua, giống như cha mẹ của bạn trước bạn, một người cai trị một vương quốc nhỏ dễ chịu của những dòng sông và cây thường xanh. Tuy nhiên, không giống như cha mẹ của bạn, bạn có hy vọng và ước mơ! Bạn muốn một vương quốc lớn hơn và dễ chịu hơn, với nhiều dòng sông hơn và nhiều loại cây hơn. Bạn muốn có một sự thống trị! Trong tất cả các hướng nói dối, sự tự do, và phong kiến. Tất cả đều là những mảnh đất nhỏ, được kiểm soát bởi các lãnh chúa nhỏ mọn và chen vào tình trạng hỗn loạn. Bạn sẽ mang lại nền văn minh cho những người này, đoàn kết họ dưới biểu ngữ của bạn.', 'pic1567418948.jpg', '1', 0),
(62, 7, 'Roll for The Galaxy', 12, 1570000, 'Roll for the Galaxy là một trò chơi súc sắc của các đế chế xây dựng không gian. Xúc xắc của bạn đại diện cho dân số của bạn, người mà bạn chỉ đạo để phát triển công nghệ mới, định cư thế giới và vận chuyển hàng hóa. Người chơi quản lý tốt nhất công nhân của mình và xây dựng đế chế thịnh vượng nhất sẽ chiến thắng!', 'rol1495444332.jpg', '1', 0),
(63, 7, 'Bowling Mini để bàn', 12, 160000, 'Bàn Bowling Mini để bàn được thiết kế nhỏ gọn, bàn làm bằng gỗ, bi sắt, thông minh giúp phát triển trí não của trẻ. \r\n\r\nSản phẩm bao gồm: 1 bàn, 10 quả bowling, 1 bi sắt', '11486364753.jpg', '1', 0),
(64, 7, 'The Others 7 Sins', 12, 2075000, 'Trong The Other, thế giới đứng bên bờ vực tận thế, khi những kẻ cuồng tín của Câu lạc bộ Địa ngục đã triệu tập 7 Tội lỗi chết chóc để lãng phí thực tế của chúng ta. Dần dần những người khác đã len lỏi vào cuộc sống của chúng ta, làm hỏng xã hội từ bên trong. Thành phố Haven là chìa khóa cho cuộc xâm lược của họ, nhưng nó sẽ không đi xuống nếu không có một cuộc chiến, nhờ vào hành động của tổ chức huyền bí được gọi là F.A.I.T.H. (Cơ quan liên bang về sự can thiệp của nỗi kinh hoàng xuyên không). Mỗi phiên của The Other được chơi với một người chơi điều khiển lực lượng của một Sin duy nhất, chống lại những người chơi khác điều khiển một đội gồm 7 anh hùng FAITH. Các anh hùng hợp tác để sống sót sau các cuộc tấn công của Sin và hoàn thành các nhiệm vụ được đặt ra trước họ, trong khi Sin cố gắng cản trở các anh hùng bằng mọi cách (tốt nhất là bằng cách tiêu diệt chúng).', 'the1495602706.jpg', '1', 0),
(65, 4, 'Machi Koro', 12, 840000, 'Machi Koro là một game nhanh cho từ 2 – 4 người chơi. Mỗi người chơi sẽ tự xây dựng thành phố theo ý mình để hoàn thiện tất cả các công trình trọng yếu trước đối thủ. Đến lượt mình, người chơi được đổ 1 hoặc 2 xúc xắc. Nếu tổng xúc xắc giống với con số tương ứng trên tòa nhà, người chơi sẽ lấy được năng lực của nhà; đôi khi kể cả đối thủ cũng trục lợi từ con số này. Số tiền trong tay sẽ được người chơi sử dụng để xây thêm nhiều công trình mới, cho đến khi có một người hoàn thành tất cả các công trình lớn trước tiên!', 'pic1577959734.jpg', '1', 0),
(66, 4, 'Catan', 12, 1250000, 'Hãy tưởng tượng bạn là một thám hiểm vĩ đại. Sau một hành trình dài, đầy gian truân trên biển cả, cuối cùng con thuyền của bạn cũng đã cập bến một vùng đất mới - hòn đảo Catan trù phú và còn rất hoang sơ. Tuy nhiên bạn không phải là người duy nhất tìm thấy vùng đất này. Những kẻ khác, đến từ vùng biển xa xôi nào đó ngoài kia cũng đã đặt chân lên hòn đảo này. Nhanh lên nào, cuộc đua để làm chủ Catan đã chính thức bắt đầu!', 'cat1495438720.jpg', '1', 0),
(67, 4, 'Ticket To Ride', 12, 1080000, 'Ticket to Ride là một trong những board game phổ biến nhất tại thời điểm hiện tại. Trong Ticket to Ride, mỗi người chơi chọn những tấm vé là mục tiêu bí mật từ một điểm xuất phát đến đích. Bằng cách chơi những tổ hợp bài cùng màu, người chơi đặt các đường xe lửa tương ứng trên bản đồ, đồng thời nối liền 2 thành phố với nhau. Suốt quá trình chơi, mạng lưới đường ray đầy màu sắc được hình thành đưa ra nhiều khả năng và lựa chọn chiến thuật hơn. Nếu thành công thực hiện mục tiêu trên tấm vé của mình, bạn nhận được điểm. Nếu thất bại, bạn sẽ bị phạt trừ điểm. Và cuối cùng, người chơi nào sở hữu con đường dài nhất sẽ nhận được điểm Bonus!', 'tic1464340468.jpg', '1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `maVaiTro` int(11) NOT NULL,
  `tenVaiTro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `maKhachHang` (`maKhachHang`),
  ADD KEY `maGiaoHang` (`maGiaoHang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`maGioHang`),
  ADD UNIQUE KEY `maKhachHang` (`maKhachHang`),
  ADD KEY `maSanPham` (`maSanPham`),
  ADD KEY `maLoai` (`maLoai`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKhachHang`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maLoaiSanPham`);

--
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`tenDangNhap`),
  ADD KEY `maVaiTro` (`maVaiTro`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `maLoaiSanPham` (`maLoaiSanPham`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`maVaiTro`),
  ADD KEY `maVaiTro` (`maVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `maGioHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKhachHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `maLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`maKhachHang`) REFERENCES `khachhang` (`maKhachHang`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`maKhachHang`) REFERENCES `khachhang` (`maKhachHang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maLoaiSanPham`) REFERENCES `loaisanpham` (`maLoaiSanPham`);

--
-- Các ràng buộc cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD CONSTRAINT `vaitro_ibfk_1` FOREIGN KEY (`maVaiTro`) REFERENCES `quantri` (`maVaiTro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
