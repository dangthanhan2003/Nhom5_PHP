-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` bigint(20) UNSIGNED NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminpass` varchar(255) NOT NULL,
  `phone` int(30) NOT NULL,
  `email` text NOT NULL,
  `level` int(30) NOT NULL,
  `adminuser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `adminName`, `adminpass`, `phone`, `email`, `level`, `adminuser`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 961159122, 'admin@gmail.com', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Serum', 'Active'),
(2, 'Sữa rửa mặt', 'Active'),
(7, 'Toner', 'Active'),
(10, 'Kem dưỡng', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `newscategory_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `description`, `newscategory_id`, `created_at`, `avatar`) VALUES
(1, 'RỬA MẶT BẰNG NƯỚC MUỐI SINH LÝ CÓ TÁC DỤNG GÌ VÀ MỘT SỐ ĐIỀU LƯU Ý', '                                                Dùng nước muối sinh lý để rửa mặt là một phương pháp được không ít chị em quan tâm và áp dụng trong quá trình chăm sóc da. Hãy cùng đi tìm lời giải cho các thắc mắc là rửa mặt bằng nước muối sinh lý có tác dụng gì và nên lưu ý điều gì khi áp dụng phương pháp này với bài viết sau đây.                                                ', '                                                Để áp dụng phương pháp rửa mặt bằng nước muối sinh lý, tìm hiểu chung về dung dịch này là một việc không nên bỏ qua.\r\n\r\nCụ thể, nước muối sinh lý (hay dung dịch nước muối đẳng trương) là dung dịch chứa NaCl (muối ăn) với nồng độ 0,9%, tức là 1 lít nước muối có chứa 9g muối ăn. Áp suất thẩm của dung dịch này tương đương với dịch như nước mắt, máu,... trong cơ thể con người ở điều kiện sinh lý bình thường. Và nó có thể sử dụng được cho các đối tượng ở bất kỳ lứa tuổi nào.\r\n\r\nNhững thành phần được sử dụng để điều chế ra dung dịch dung dịch nước muối sinh lý phải tinh khiết; đồng thời, còn phải đảm bảo vệ sinh trong quá trình thực hiện điều chế. Dung dịch này được bào chế thành hai dạng là dùng trong và dùng ngoài. Mục đích sử dụng của hai dạng này cũng khác nhau.\r\n2. Rửa mặt bằng nước muối sinh lý có tác dụng gì?\r\nRửa mặt bằng nước muối sinh lý mang lại các tác dụng có thể kể đến như sau:\r\n\r\n2.1. Hỗ trợ điều trị mụn trứng cá\r\nNước muối sinh lý là dung dịch sở hữu đặc tính kháng khuẩn tốt cũng như làm sạch nhanh. Sử dụng dung dịch này để rửa mặt giúp tẩy tế bào chết, loại bỏ bụi bẩn, bã nhờn, vi khuẩn trên da cũng như làm sạch lỗ chân lông bị tắc nghẽn. Thông qua đó, giảm tình trạng viêm da và kiểm soát, hỗ trợ điều trị mụn trứng cá.\r\n2.2. Giúp cân bằng độ ẩm cho da\r\nVới đặc tính giữ nước của muối, tình trạng dầu thừa xuất hiện trên bề mặt da sẽ được ngăn ngừa. Nhờ vậy, da sẽ được khỏe mạnh, cân bằng được độ ẩm cũng như góp phần trong việc duy trì vẻ đẹp cho da.\r\n\r\n2.3. Tẩy trang\r\nBên cạnh đó, có thể dùng dung dịch này tương tự như một loại nước tẩy trang. Khi dùng dung dịch này, bạn có thể rửa sạch và loại bỏ các phần thừa từ mỹ phẩm hay sản phẩm bảo vệ da đọng trên da, chẳng hạn như kem chống nắng.\r\n\r\n3. Rửa mặt bằng nước muối sinh lý cần lưu ý điều gì?\r\nVới các tác dụng mà dung dịch nước muối sinh lý đem lại cho làn da, không ít chị em áp dụng phương pháp rửa mặt bằng dung dịch này trong quá trình chăm sóc da. Song nếu việc này được thực hiện sai cách có thể làm da bị tổn thương, khiến da bị khô, sạm hay bị kích ứng.\r\n\r\nDo vậy, để việc rửa mặt bằng nước muối sinh lý không làm gây hại đến da, bạn cần quan tâm đến một số lưu ý dưới đây:\r\n\r\n3.1. Về cách thực hiện\r\nVề quy trình thực hiện rửa mặt với nước muối sinh lý, trước tiên bạn nên chuẩn bị một miếng vải bông sạch và mềm như bông tẩy trang. Sau đó, nhúng nó vào dung dịch nước muối sinh lý rồi thoa đều lên mặt và để lưu lại trên da trong khoảng 2 phút. Cuối cùng, dùng nước ấm để rửa sạch lại da mặt.\r\n\r\n3.2. Tránh sử dụng nước muối sinh lý tự pha để rửa mặt\r\nViệc tự pha nước muối sinh lý có thể không đúng nồng độ; đồng thời, nguồn nước được dùng để pha dung dịch này có thể chưa được sạch. Ngoài ra, cũng không thể đảm bảo chắc chắn trong khâu vệ sinh, tiệt trùng.\r\n\r\nKhi dùng nước muối sinh lý tự pha tại nhà để rửa mặt có thể tiềm ẩn rủi ro gây kích ứng da, làm hại da và làm trầm trọng hơn tình trạng mụn. Do vậy, bạn nên mua dung dịch này tại các cơ sở y tế hay hiệu thuốc để sử dụng.\r\n\r\n3.3. Tần suất sử dụng hợp lý\r\nTần suất rửa mặt với nước muối sinh lý quá nhiều dễ làm da bị mất nước và khô đi. Vì thế, bạn chỉ nên thực hiện phương pháp này không quá 2 lần trong một ngày để tránh gặp phải tình trạng đó.\r\n3.4. Dùng thêm kem dưỡng ẩm cho da\r\nSau khi rửa mặt bằng nước muối sinh lý, bạn nên sử dụng thêm kem dưỡng ẩm mỏng nhẹ cho da. Bước này sẽ giúp ngăn ngừa trạng thái da bị khô.\r\n\r\n3.5. Đừng quên sử dụng kem chống nắng\r\nDung dịch nước muối sinh lý có thể khiến làn da của bạn dễ bắt nắng hơn. Do đó, đừng quên sử dụng kem chống nắng đều đặn hàng ngày khi đi ra ngoài và kể cả khi chỉ ở trong bóng râm. Như vậy, mới có thể giúp làn da được bảo vệ và chăm sóc tốt.\r\n3.6. Dừng rửa mặt với nước muối sinh lý khi thấy không phù hợp với da\r\nĐây cũng là một điều khác mà bạn nên lưu ý đến khi sử dụng nước muối sinh lý để rửa mặt. Cụ thể, khi thấy phương pháp này không phù hợp với da, khiến da bị đỏ, rát, châm chích,... thì cần dừng việc thực hiện nó. Đồng thời, đến gặp bác sĩ da liễu, thăm khám chính xác tình trạng và các biểu hiện, tìm ra hướng khắc phục, tránh để kéo dài các hiện tượng đó.\r\n\r\nNói tóm lại, rửa mặt bằng nước muối sinh lý có thể đem lại cho làn da những tác dụng đáng kể. Bạn có thể áp dụng phương pháp này trong quá trình chăm sóc da của bản thân. Tuy nhiên, cần quan tâm đến những lưu ý đã được kể đến trong bài viết để không làm tổn thương da; đồng thời, tham khảo thêm ý kiến của bác sĩ trước khi bắt đầu áp dụng. Cùng với đó, để được sở hữu một làn da khỏe đẹp như mong muốn, bạn vẫn cần đảm bảo duy trì thực hiện các phương pháp chăm sóc da phù hợp khác.                                                ', 4, '2023-12-14 11:05:12', 'uploads/news/657a7b080c27220230217_rua-mat-bang-nuoc-muoi-sinh-ly-1.jpg'),
(2, 'Hướng dẫn uống collagen đúng cách', '                                                Collagen có tầm ảnh hưởng quan trọng đối với làn da của nữ giới. Việc bổ sung collagen giúp giữ gìn được sự trẻ trung và cần thiết đối với phụ nữ ở độ tuổi 25 trở lên. Vậy làm thế nào để bổ sung collagen hiệu quả như ý muốn.                                                ', '                                                1. Tầm quan trọng của việc bổ sung collagen\r\nTrong cơ thể, collagen chiếm đến 25% tổng lượng protein và chiếm đến 70% trong cấu trúc của da, giữ vai trò kết nối các mô dưới da thành một cấu trúc hoàn chỉnh. Từ đó có sức ảnh hưởng đặc biệt quan trọng trong việc duy trì độ đàn hồi, căng mịn và săn chắc của làn da.\r\n\r\nBên cạnh đó collagen còn chiếm tỷ trọng phần trăm khá lớn trong các bộ phận khác của cơ thể như xương khớp, sụn, dây chằng,... giúp duy trì độ dẻo dai và linh hoạt của các khớp.\r\n\r\nMột khi collagen cũ bị mất đi thì collagen mới được sinh ra để thay thế, nhưng càng lớn tuổi thì lượng collagen sản sinh ra rất ít không đủ bù đắp lượng collagen mất đi.\r\n\r\nCụ thể bước qua độ tuổi 25 thì cơ thể mỗi năm sẽ mất đi khoảng 1-1.5% collagen khiến cho cơ thể bị lão hóa một cách nhanh chóng, trên mặt xuất hiện nhiều nếp nhăn, da cũng bắt đầu khô sần và chảy xệ đi,... Chính vì vậy, bổ sung collagen là cách để giúp chị em có thể lưu giữ nét xuân cũng như hồi phục và tìm lại sự tươi trẻ của mình.\r\n2. Một số thực phẩm chứa collagen\r\nCollagen có mặt nhiều trong các loại thực phẩm ăn uống hàng ngày, do đó bạn nên tận dụng việc dung nạp collagen qua các món ăn hàng ngày để thúc đẩy cơ thể tăng cường sản xuất collagen tự nhiên. Cụ thể là các thực phẩm hàng đầu sau:\r\n\r\n2.1 Bơ\r\nLoại trái cây giúp làm đẹp da tự nhiên nhờ vào các dưỡng chất có lợi như: Vitamin E, axit béo Omega 3 giúp tăng sinh collagen tự nhiên của cơ thể.\r\n\r\n2.2 Cà rốt\r\nMệnh danh là loại quả giúp làm đẹp da tuyệt hảo, thúc đẩy quá trình sản xuất và hồi phục collagen bị hư hại nhờ vào các vitamin và dưỡng chất có lợi khác.\r\n\r\n2.3 Tỏi\r\nTrong tỏi có thành phần lưu huỳnh cùng các chất khác như acid lipoic, taurine giúp xây dựng và củng cố lại các sợi collagen bị gãy đứt.\r\n\r\n2.4 Cá hồi\r\nLoại nguyên liệu khá dồi dào các acid béo Omega -3 vừa giúp bảo vệ sức khỏe tim mạch, giảm nồng độ cholesterol LDL xấu, đồng thời còn giúp thúc đẩy quá trình sản xuất collagen tự nhiên của cơ thể.\r\n\r\nMặc dù, các thực phẩm tự nhiên giúp kích thích cơ thể sản xuất collagen để duy trì sức khỏe cũng như sắc đẹp của làn da cực tốt nhưng lượng collagen được sản xuất ra cực kỳ thấp. Đó chính là lý do mà các nếp nhăn, da sạm khô sần vẫn không cải thiện được bao nhiêu.\r\n\r\nVậy nên các thực phẩm chức năng collagen ra đời và được khá nhiều chị em tin dùng.\r\n3. Các dạng của collagen\r\nĐể sử dụng đúng cách các thực phẩm chức năng giúp làm đẹp da, các bạn cần thực hiện đúng theo các hướng dẫn sử dụng từng loại collagen như:\r\n\r\n3.1 Collagen dạng nước\r\nTrước khi uống thì lắc nhẹ chai, sau đỏ mở vỏ chai và uống. Loại collagen dạng nước uống này giúp cơ thể nhanh chóng được hấp thụ toàn bộ.\r\n\r\n3.2 Collagen dạng bột\r\nLoại collagen này chỉ cần hòa tan với nước và uống bình thường. Thời gian uống là vào buổi tối trước khi đi ngủ 30 phút.\r\n\r\n3.3 Collagen dạng viên\r\nĐể cơ thể có thể hấp thụ toàn bộ các viên uống collagen thì bạn nên uống với nhiều nước.\r\n4. Uống Collagen như thế nào để đạt hiệu quả tốt?\r\nĐể đạt được hiệu quả cao thì bạn phải uống collagen như thế nào để mang lại lợi ích tốt, bạn phải lựa chọn cho mình một loại sản phẩm tốt, phù hợp với cơ thể và làn da của mình. Chẳng hạn như:\r\n\r\n4.1 Cách uống Collagen dạng nước\r\nChỉ cần lắc nhẹ, mở vỏ chai và uống. Loại collagen dạng nước này thì rất dễ uống. Ngoài ra, sản phẩm Collagen dạng nước có quá trình hòa tan nhanh và thẩm thấu nhanh, giúp cho cơ thể của bạn dễ dàng hấp thụ hoàn toàn lượng Collagen khi đi vào cơ thể.\r\n\r\n4.2 Cách uống Collagen dạng bột\r\nLoại collagen này là dạng đóng gói, chỉ cần hòa tan với nước để uống.\r\n\r\n4.3 Cách uống Collagen dạng viên\r\nLoại collagen này có mức độ hòa tan ở mức vừa phải, hãy uống viên này với nhiều nước để cơ thể hấp thụ hoàn toàn và tránh được không bị đào thải ra ngoài.\r\n5. Uống Collagen lúc nào tốt?\r\nBạn có thể uống Collagen vào bất cứ lúc nào trong ngày, tuy nhiên dùng vào buổi tối là cách sử dụng Collagen hiệu quả nhất. Bởi vào buổi tối là thời gian mà quá trình trao đổi chất và tái tạo da diễn ra mạnh mẽ nhất, do đó áp dụng cách uống Collagen vào thời điểm này sẽ giúp cơ thể hấp thụ nhanh hơn, hiệu quả tối ưu hơn.\r\nNếu như uống vào các thời điểm khác trong ngày bạn nên uống cách bữa ăn 3 giờ và hạn chế nạp thêm thức ăn ngay sau khi uống.\r\nMỗi người dùng 5g Collagen trong 1 ngày. Kết hợp luyện tập và chế độ ăn uống kết hợp với Collagen.\r\n6. Những điều cần nhớ khi uống Collagen\r\nPhụ nữ mang thai và cho con bú từ 6 tháng trở xuống cần lưu ý khi sử dụng Collagen: Đối với những người đang dùng thuốc tránh thai không nên uống Collagen vào cơ thể. Bởi vì nếu uống cả 2, trong cơ thể bạn sẽ có tác dụng phụ như cảm giác có thai giả, xuất hiện các dấu hiệu kèm theo như da nám, cơ thể mệt mỏi.\r\nKết hợp tập luyện thể dục thể thao với uống Collagen để mang lại lối sống lành mạnh và khoa học giúp cơ thể phát triển và tái tạo da tốt.\r\nKhi sử dụng bất kỳ loại thuốc có thành phần nào bạn bị dị ứng thì nên hỏi ý kiến bác sĩ trước khi uống.\r\nĐồng thời muốn đạt được kết quả tốt, bạn nên uống bổ sung những loại sản phẩm này trong vòng 03 tháng, sau đó phải ngưng lại trong vòng 01 tháng để cơ thể tự hấp thu trọn vẹn lượng Collagen rồi mới dùng lại với liều uống duy trì là được.\r\nNgoài Collagen, PRP cũng được coi là \"Suối nguồn tươi trẻ\" đối với làn da, được nhiều người đẹp trên Thế giới ưa chuộng. PRP được đánh giá là một trong những liệu pháp giúp duy trì tuổi xuân và hạn chế những dấu hiệu lão hóa rất an toàn & hiệu quả.                                                ', 2, '2023-12-14 11:05:16', 'uploads/news/657a7ee5ec7c9cach-uong-collagen-dung-cach-hieu-qua (3).png'),
(3, 'Các Thành Phần Sữa Rửa Mặt Quan Trọng Bạn Cần Biết', 'Sữa rửa mặt là dòng sản phẩm làm sạch da được sử dụng thường xuyên và phổ biến nhất hiện nay. Tuy nhiên, không phải sữa rửa mặt nào cũng giống nhau, bạn cần hiểu rõ bảng thành phần phần để có được công dụng, loại da mà mỗi hãng mang đến, tránh dùng sản phẩm không đúng, gây hại da, lãng phí. Vậy có những thành phần sữa rửa mặt nào bạn cần biết và dành cho loại da nào, xem ngay bài viết nhé. ', 'I. Tầm quan trọng của thành phần sữa rửa mặt \r\nThành phần sữa rửa mặt có vai trò rất lớn trong mỗi sản phẩm sữa rửa mặt, vì nó ảnh hưởng trực tiếp đến hiệu quả và an toàn của sản phẩm cũng như làn da của người dùng trực tiếp. Ta có thể kể đến những “gạch đầu dòng” chủ chốt mà thành phần sữa rửa mặt mang lại như:\r\n\r\nLàm sạch hiệu quả: nhiệm vụ chính của tất cả mọi dòng sữa rửa mặt, thường chứa các chất tẩy rửa giúp loại bỏ bụi bẩn, vi khuẩn, bã nhờn và tạp chất tích tụ trên da. Từ đó giúp da sạch sẽ, thông thoáng và ngăn ngừa hình thành mụn.\r\nDịu nhẹ và không gây kích ứng: sữa rửa mặt cũng chứa các chất làm mềm da và chiết xuất thực vật giúp làm dịu và bảo vệ da khỏi những tác động gây kích ứng, giúp duy trì làn da mềm mịn và không bị khô ráp.\r\nCung cấp độ ẩm: giúp giữ nước và cân bằng độ ẩm cho da, giúp da không bị khô, tránh tình trạng da căng, khó chịu.\r\nCân bằng da: kiểm soát và điều tiết lượng dầu trên da, giúp cân bằng lượng dầu tự nhiên và giảm tình trạng da bóng nhờn.\r\nCung cấp dưỡng chất: nuôi dưỡng da từ các chiết xuất thực vật và vitamin \r\nPhù hợp với từng loại da: Có nhiều loại sữa rửa mặt với thành phần khác nhau, được thiết kế phù hợp với từng loại da như da dầu, da khô, da nhạy cảm và da hỗn hợp.\r\nAn toàn da, không kích ứng: nói không với các thành phần gây hại cùng liều lượng cho phép\r\nII. Các thành phần phổ biến trong sữa rửa mặt \r\n1. Các thành phần có lợi cho da trong sữa rửa mặt\r\nCác thành phần cấp ẩm:\r\n\r\nGlycerin: là chất dưỡng ẩm tự nhiên, giúp giữ nước và làm mềm da.\r\nHyaluronic Acid: là loại acid hyaluronic có khả năng giữ nước, giúp da trở nên mềm mại và đàn hồi.\r\nAloe Vera: Lô hội có tác dụng làm dịu và dưỡng ẩm cho da, giúp làm giảm sự khó chịu và cải thiện độ ẩm tổng thể của da.\r\nCeramides: Ceramides giúp tăng cường hàng rào bảo vệ tự nhiên của da, giữ cho da ẩm mượt và bảo vệ khỏi mất nước.\r\nCác thành phần từ tự nhiên:\r\n\r\nChiết xuất từ hoa hồng: Hoa hồng có tính chất làm dịu và chống viêm, giúp làm sạch nhẹ nhàng mà không gây khô da.\r\nChiết xuất từ trà xanh: Trà xanh chứa nhiều chất chống oxy hóa và có tác dụng làm sạch da, giúp loại bỏ bụi bẩn và dầu thừa.\r\nDầu hạt jojoba: Dầu hạt jojoba có tính chất dưỡng ẩm tự nhiên, giúp giữ nước cho da và làm mềm da mà không gây nhờn.\r\nBơ hạt mỡ: Bơ hạt mỡ giàu chất béo và vitamin, giúp dưỡng ẩm cho da khô, chống khô da và bảo vệ da khỏi mất nước.\r\nCác thành phần chống lão hóa da:\r\n\r\nPeptide: Peptide là các phân tử nhỏ được tạo thành từ các axit amin. Chúng có khả năng kích thích sản xuất collagen và elastin, giúp làm giảm nếp nhăn và cải thiện độ đàn hồi của da.\r\nRetinol: Retinol là một dạng của vitamin A, có khả năng thúc đẩy tái tạo da và giúp giảm các dấu hiệu lão hóa như nếp nhăn và vết thâm.\r\nVitamin C: Vitamin C là một chất chống oxy hóa mạnh, giúp bảo vệ da khỏi tác động của các gốc tự do và kích thích sản xuất collagen.\r\nCoenzyme Q10: Coenzyme Q10 là một chất chống oxy hóa tự nhiên, giúp ngăn ngừa sự hủy hoại của tia tử ngoại và giảm tác động của các gốc tự do lên da.\r\nNiacinamide: Niacinamide là một dạng của vitamin B3, có khả năng giảm thiểu tình trạng da khô, cải thiện độ đàn hồi và giảm nếp nhăn.\r\n2. Các thành phần cần tránh trong sữa rửa mặt\r\nParabens: một chất bảo quản thường có trong mỹ phẩm, có tác dụng kháng khuẩn, ngăn ngừa sự nhiễm khuẩn. Tuy nhiên, dễ gây kích ứng và ung thư da.\r\nHương liệu tổng hợp: được tổng hợp từ các chất không có sẵn trong tự nhiên, hoặc kết hợp giữa hương liệu tự nhiên và 1 số chất để tạo ra hương liệu mới. Thành phần này có thể gây dị ứng và làm trầm trọng hơn các bệnh về da như: bệnh chàm, rosacea, mụn trứng cá…\r\nCồn: giúp làm mềm và duy trì độ ẩm cho da. Nếu nồng độ cồn cao trong sữa rửa mặt sẽ làm mất đi lớp dầu tự nhiên trên da, khiến da khô căng, khó chịu.\r\nSulfat: là chất tẩy rửa, có vai trò loại bỏ dầu nhờn và bụi bẩn. Nếu sử dụng ở nồng độ và liều lượng vượt mức cho phép sẽ gây khô da, kích ứng, tiết dầu nhiều hơn, hình thành mụn…​\r\nIII. Các thành phần sữa rửa mặt phù hợp với từng loại da\r\n1. Các thành phần sữa rửa mặt dành cho da dầu\r\nVới những đặc điểm như da bóng nhờn, lỗ chân lông to, xuất hiện mụn thì bạn nên tìm các dòng sữa rửa mặt có chứa các thành phần như: \r\n\r\nAHA: thành phần tẩy da chết hiệu quả\r\nBenzoyl Peroxide: một hoạt chất trị mụn mạnh mẽ\r\nBHA: có khả năng trung hòa vi khuẩn và làm sạch sâu bên trong lỗ chân lông nên sẽ loại bỏ tất cả các bã nhờn, bụi bẩn\r\nTinh dầu tràm trà: có tác dụng kháng khuẩn, kháng viêm và làm dịu các tổn thương.\r\nRetinol: điều trị mụn và giúp liền sẹo, kiềm dầu và thu hẹp lỗ chân lông\r\n2. Các thành phần sữa rửa mặt dành cho da khô\r\nDa khô thường dễ bong tróc, khô căng, kích ứng; đặc biệt là những lúc thời tiết trái mùa tình trạng càng nặng hơn. Vì vậy, bạn nữa lựa chọn các sản phẩm sữa rửa mặt có khả năng giữ ẩm, cấp ẩm, khóa ẩm tốt từ các thành phần như: Hyaluronic Acid, Ceramide, Panthenol, Nanoha, chiết xuất nha đam, glycerin, lauric acid, vitamin A, C, E…\r\n3. Các thành phần sữa rửa mặt dành cho da nhạy cảm\r\nDa nhạy cảm với đặc điểm dễ kích ứng, dễ tổn thương hơn các loại da thông thường nên chọn các dòng sữa rửa mặt có công thức dịu nhẹ, không chứa xà phòng và tránh xa các thành phần dễ gây kích ứng như cồn, hương liệu, các chất hoạt động bề mặt,...\r\nQua bài Các Thành Phần Sữa Rửa Mặt Quan Trọng Bạn Cần Biết trên, hy vọng rằng bạn đã có được thông tin cần thiết trong việc sử dụng và lựa chọn sản phẩm phù hợp.\r\n\r\nSản phẩm Sữa Rửa Mặt nêu trên đều được phân phối rộng khắp toàn quốc. Bạn có thể dễ dàng mua sản phẩm ở các đơn vị đối tác chính hãng, cửa hàng chuyên cung cấp các sản phẩm làm đẹp. Tuy nhiên với thị trường hàng giả ngày càng nhiều, bạn cần tìm đến những cơ sở cung cấp sản phẩm chính hãng để thêm phần an tâm khi sử dụng.', 5, '2023-12-14 11:08:27', 'uploads/news/657a7fbbc1e99thanh-phan-sua-rua-mat-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newscategories`
--

CREATE TABLE `newscategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newscategories`
--

INSERT INTO `newscategories` (`id`, `name`) VALUES
(1, 'REVIEW MỸ PHẨM'),
(2, 'DA ĐẸP'),
(4, 'TIPS LÀM ĐẸP'),
(5, 'THÀNH PHẦN MỸ PHẨM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Processing','Confirmed','Shipping','Delivered','Cancelled') NOT NULL DEFAULT 'Processing',
  `created_at` datetime DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `name`, `address`, `phone`, `email`, `total_amount`) VALUES
(5, 9, 'Processing', '2023-12-13 21:50:03', 'Đặng Thành An', '75 Hồ Tùng Mậu', 961159122, 'da@gmail.com', 2800000);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `qty`) VALUES
(8, 5, 9, 300000, 1),
(9, 5, 8, 500000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `summary` text NOT NULL,
  `stock` tinyint(3) UNSIGNED NOT NULL,
  `purchase` double NOT NULL,
  `price` double NOT NULL,
  `images` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `summary`, `stock`, `purchase`, `price`, `images`, `category_id`, `status`) VALUES
(7, 'The Inkey List Hyaluronic Acid', 'Tinh chất dưỡng ẩm The Inkey List Hyaluronic Acid Serum\r\nCó chứa Hyaluronic Acid là một thành phần liên kết độ ẩm mạnh mẽ hoạt động bên dưới bề mặt da và hoạt chất có thể được tìm thấy trong da của chúng ta để duy trì mức độ ẩm. Nhờ các hoạt chất ở mức độ tinh khiết, Hyaluronic Acid  2% và ở ba trọng lượng phân tử ở mức cao, trung bình và thấp đảm bảo sự hấp thụ tối đa ở mọi biểu bì da giúp nuôi dưỡng lớp màng collagen giúp làm đầy nếp nhăn. Ngoài ra, Matrixyl 3000™ là 1 dạng peptide sẽ giúp kích thích quá trình sản sinh collagen tự nhiên trong da, tăng hiệu quả cấp ẩm do da giúp da căng mọng, đàn hồi kéo dài.\r\n\r\nCông dụng chính The Inkey List Hyaluronic Acid Serum:\r\n- Cung cấp, bổ sung lượng ẩm cần thiết cho những vùng da khô, giảm thiểu nếp nhăn.\r\n\r\n- Cấp nước cho da, tăng khả năng giữ nước của da và cho cảm giác da mềm mại.\r\n\r\n- Giảm tình trạng khô da, nếp nhăn, tái tạo hàng rào bảo vệ da bị tổn thương.\r\n\r\n- Kích thích sản xuất collagen, mang lại hiệu quả chống lão hóa.', 'Tinh Chất Serum Giảm Mụn Mờ Thâm The Inkey List Niacinamide Cho Da Dầu, Da Mụn', 37, 200000, 350000, 'aa0a2d4ebb.jpg', 1, 'Active'),
(8, 'Sữa Rửa Mặt Cetaphil', 'Sữa Rửa Mặt Cetaphil Gentle Skin Cleanser phiên bản mới ra mắt năm 2022 từ thương hiệu Cetaphil với công thức khoa học mới cho làn da nhạy cảm, giúp làm sạch da, loại bỏ bụi bẩn, phù hợp cho mọi loại da, không làm khô da và duy trì hàng rào bảo vệ da suốt ngày dài.\r\n\r\nĐược chứng minh lâm sàng có khả năng làm sạch sâu, loại bỏ hoàn toàn bụi bẩn, và tạp chất trên da một cách dịu nhẹ nhưng vẫn duy trì độ ẩm tự nhiên để bảo vệ da khỏi tình trạng khô ráp, Sữa Rửa Mặt Cetaphil Mới với công thức lành tính không gây kích ứng sẽ an toàn cho mọi loại da, kể cả da nhạy cảm.\r\n\r\nLoại da phù hợp:\r\nSản phẩm dành cho mọi loại da, đặc biệt là da nhạy cảm.\r\nGiải pháp cho tình trạng da:\r\nDa khô, thiếu độ ẩm - thiếu nước.\r\n\r\nDa nhạy cảm, dễ kích ứng.\r\n\r\nƯu thế nổi bật:\r\nCông thức khoa học mới với sự kết hợp 3 thành phần lành tính: Niacinamide (Vitamin B3), Panthenol (Pro-vitamin B5) và Glycerin đã tạo ra cơ chế đặc biệt giúp thúc đẩy quá trình sản sinh Ceramides tự nhiên của da và tổng hợp Fillaggrin có dụng bảo vệ hàng rào tự nhiên của da giúp cải thiện khả năng phục hồi của làn da nhạy cảm.\r\n\r\nSản phẩm nổi bật với 6 KHÔNG: Không xà phòng, không paraben, không sulfat, không hương liệu, không dầu khoáng & không thử nghiệm trên động vật.\r\n\r\n95% người dùng cảm thấy làn da của họ được làm sạch nhưng không gây khô da sau khi dùng sản phẩm.\r\n\r\nTăng cường lipid và protein có trong hàng rào bảo vệ tự nhiên của da - những thành phần quan trọng trong việc duy trì hàng rào bảo vệ da luôn khỏe mạnh.\r\n\r\nSản phẩm được kiểm nghiệm lâm sàng là an toàn với da nhạy cảm & được tin dùng bởi các bác sĩ da liễu.', 'Sữa Rửa Mặt Cetaphil Dịu Lành Cho Da Nhạy Cảm 500ml', 20, 200000, 500000, '50f90a1d7c.jpg', 2, 'Active'),
(9, 'Nước Hoa Hồng Some By Mi', 'Nước Hoa Hồng SOME BY MI Cho Da Mụn Miracle Toner AHA- BHA-PHA 30 Days 150ml đến từ thương hiệu mỹ phẩm chăm sóc da SOME BY MI là dòng Toner có chứa phức hợp các loại axit cùng chiết xuất Tràm Trà, giúp làm sạch sâu da, hỗ trợ kháng khuẩn, kháng viêm, ngăn ngừa và làm giảm mụn, đồng thời góp phần thu nhỏ lỗ chân lông, mang lại cho bạn làn da sạch thoáng và mịn màng không tì vết.\r\nLoại da phù hợp:\r\nSản phẩm dành cho mọi loại da, đặc biệt là da dầu / hỗn hợp dầu.\r\nGiải pháp cho tình trạng da:\r\nDa mụn\r\n\r\nDa dầu thừa - lỗ chân lông to\r\n\r\nƯu thế nổi bật:\r\nChứa phức hợp AHA - BHA - PHA giúp loại bỏ tế bào chết cùng bụi bẩn, bã nhờn tồn đọng trên bề mặt da và sâu trong lỗ chân lông, mang lại làn da sạch thoáng và tươi sáng rạng rỡ.\r\n\r\nChiết xuất Tràm Trà (Real Teatree 10,000 PPM) giúp kháng khuẩn, kháng viêm, làm dịu da và giảm sưng mụn, hỗ trợ điều tiết bã nhờn.\r\n\r\n2% Niacinamide giúp kháng viêm, hỗ trợ se lỗ chân lông, dưỡng sáng da, mờ thâm mụn.\r\n\r\nCấp ẩm dịu nhẹ, giúp da mềm mại, không khô căng.\r\n\r\nCủng cố hàng rào bảo vệ da, ngăn ngừa việc da bị mất ẩm do môi trường tác động, nuôi dưỡng làn da khỏe mạnh dần lên.\r\n\r\nNgăn ngừa quá trình oxy hóa, kích thích tái tạo collagen mới cho da, nuôi dưỡng da trở nên săn chắc, căng bóng.', 'Nước Hoa Hồng Some By Mi AHA-BHA-PHA Cho Da Mụn 150ml', 46, 150000, 300000, '95d23e10ec.jpg', 7, 'Active'),
(10, 'Nước hoa hồng Klairs', 'Nước Hoa Hồng Klairs Supple Preparation là dòng sản phẩm toner được thương hiệu dear,Klairs thiết kế chuyên biệt dành cho làn da nhạy cảm. Với bảng thành phần chiết xuất từ thực vật và kết cấu lỏng nhẹ, thấm nhanh trên da, nước hoa hồng Klairs sẽ giúp cân bằng độ pH và cấp ẩm cho làn da hiệu quả, hỗ trợ cho các bước skincare tiếp theo đạt hiệu quả tối ưu.\r\nLoại da phù hợp:\r\nSản phẩm thích hợp với mọi loại da, đặc biệt là da nhạy cảm.\r\nGiải pháp cho tình trạng da:\r\nDa nhạy cảm, dễ bị mẩn đỏ.\r\n\r\nDa tổn thương do mụn.\r\n\r\nDa thiếu ẩm - thiếu nước.\r\n\r\nCông dụng:\r\nPhyto-Oligo (tế bào gốc thực vật) dưỡng ẩm toàn diện và giải quyết tình trạng khô da.\r\n\r\nAxit Amin từ Lúa Mì giảm viêm nhiễm trên da.\r\n\r\nKlairs Supple Preparation Facial Toner giúp kéo dài độ ẩm hơn 20% so với các loại Toner thông thường với Sodium Hyaluronate và Beta-glucan.\r\n\r\nChống viêm và cải thiện tình trạng mụn đầu trắng.\r\n\r\nVới các chiết xuất từ thực vật và các thành phần làm dịu: toner dưỡng ẩm dịu nhẹ, không gây kích ứng cho mọi loại da, ngay cả đối với những làn da nhạy cảm nhất.\r\n\r\nCó mùi hương thảo dược, cam thảo nhẹ nhàng từ tinh dầu các loại hoa, nói không với chất tạo mùi nhân tạo.', 'Nước Hoa Hồng Klairs Không Mùi Cho Da Nhạy Cảm 180ml', 36, 150000, 250000, '0c9d15d6e9.jpg', 7, 'Active'),
(11, 'Sữa rửa mặt CeraVe', 'Sữa Rửa Mặt Cetaphil Gentle Skin Cleanser phiên bản mới ra mắt năm 2022 từ thương hiệu Cetaphil với công thức khoa học mới cho làn da nhạy cảm, giúp làm sạch da, loại bỏ bụi bẩn, phù hợp cho mọi loại da, không làm khô da và duy trì hàng rào bảo vệ da suốt ngày dài.\r\n\r\nĐược chứng minh lâm sàng có khả năng làm sạch sâu, loại bỏ hoàn toàn bụi bẩn, và tạp chất trên da một cách dịu nhẹ nhưng vẫn duy trì độ ẩm tự nhiên để bảo vệ da khỏi tình trạng khô ráp, Sữa Rửa Mặt Cetaphil Mới với công thức lành tính không gây kích ứng sẽ an toàn cho mọi loại da, kể cả da nhạy cảm.\r\nLoại da phù hợp:\r\nSản phẩm dành cho mọi loại da, đặc biệt là da nhạy cảm.\r\nGiải pháp cho tình trạng da:\r\nDa khô, thiếu độ ẩm - thiếu nước.\r\n\r\nDa nhạy cảm, dễ kích ứng.\r\n\r\nƯu thế nổi bật:\r\nCông thức khoa học mới với sự kết hợp 3 thành phần lành tính: Niacinamide (Vitamin B3), Panthenol (Pro-vitamin B5) và Glycerin đã tạo ra cơ chế đặc biệt giúp thúc đẩy quá trình sản sinh Ceramides tự nhiên của da và tổng hợp Fillaggrin có dụng bảo vệ hàng rào tự nhiên của da giúp cải thiện khả năng phục hồi của làn da nhạy cảm.\r\n\r\nSản phẩm nổi bật với 6 KHÔNG: Không xà phòng, không paraben, không sulfat, không hương liệu, không dầu khoáng & không thử nghiệm trên động vật.\r\n\r\n95% người dùng cảm thấy làn da của họ được làm sạch nhưng không gây khô da sau khi dùng sản phẩm.\r\n\r\nTăng cường lipid và protein có trong hàng rào bảo vệ tự nhiên của da - những thành phần quan trọng trong việc duy trì hàng rào bảo vệ da luôn khỏe mạnh.\r\n\r\nSản phẩm được kiểm nghiệm lâm sàng là an toàn với da nhạy cảm & được tin dùng bởi các bác sĩ da liễu.', 'Sữa Rửa Mặt CeraVe Sạch Sâu Cho Da Thường Đến Da Dầu 236ml', 37, 150000, 250000, 'b9662ae8ea.jpg', 2, 'Active'),
(12, 'The Ordinary Hyaluronic Acid 2% + B5', 'The Ordinary Hyaluronic Acid 2% + B5 Tinh chất cấp nước, phục hồi da The Ordinary Hyaluronic Acid 2% + B5 giúp cấp ẩm cho da, giúp da mềm mại, tăng độ đàn hồi và căng mọng. Đồng thời hiệu quả cho làn da thiếu nước, cả da khô lẫn da dầu. Công dụng của The Ordinary Hyaluronic Acid 2% + B5 Cung cấp ẩm sâu cho các lớp biểu bì của da Giúp làm giảm nếp nhăn Giúp trẻ hóa cho làn da căng mịn tươi sáng, ẩm mượt Kích thích sản sinh Collagen để tăng độ đàn hồi của da Hồi phục da mất nước và thúc đẩy quá trình phục hồi của da Bảo vệ, tăng cường sự phát triển của biểu bì Nâng cao chất lượng của các sợi Elastin và Collagen', 'Tinh chất cấp nước, phục hồi da The Ordinary Hyaluronic Acid 2% + B5', 37, 200000, 250000, 'f5055b39a9.jpg', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(9, 'Đặng Thành An', 'da@gmail.com', '$2y$10$N0gH20/gWGpxFFZjpwKL7.ZYi97QUVKWZDdJWkeSrIn8Gyq6UOmpO', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newscategory_id` (`newscategory_id`);

--
-- Indexes for table `newscategories`
--
ALTER TABLE `newscategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newscategories`
--
ALTER TABLE `newscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`newscategory_id`) REFERENCES `newscategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
