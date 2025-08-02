-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 02:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `florifydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `order_amount` int(11) DEFAULT NULL,
  `payment_mode` varchar(20) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `address`, `order_amount`, `payment_mode`, `order_status`) VALUES
(1, 2, '2,11', 'simran chaudhary, gurgaon, haryana, 122001, simrach06@gmail.com, 9001945678', 4570, 'Cash On Delivery', 'Pending'),
(2, 3, '11', 'priya, gurgaon, haryana, 122001, priyaaa@gmail.com, 9874560123', 2896, '', 'Pending'),
(3, 2, '2', 'simran chaudhary, gurgaon, 110221, simrach06@gmail.com, 9001945678', 1674, 'Cash On Delivery', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_description` varchar(300) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_type`) VALUES
(1, 'Snow White Lily', 1367, 'A bouquet as luminous as a fairytale unfolding. Pristine white lilies gather in serene abundance, their petals soft as snowfall and bright as a hidden wish. Layers of crisp white frosted wrap and a modern whisper of newspaper frame each bloom with quiet elegance. A pink lace ribbon ties it all toget', 'uploads/snow_white_lily.webp', 'Birthday'),
(2, 'Birthday Poetry', 1674, 'Every birthday deserves a little moment of beauty to unfold, and this bouquet is made to be just that. Ruffled pink spray carnations unfold in tender hues, while sprigs of fresh eucalyptus foliage offer a breath of serenity. Pastel green and blush pink wraps gather everything in a tender embrace, ti', 'uploads/birthday_poetry.webp', 'Birthday'),
(3, 'Bloom Burst', 2045, 'Like a fleeting daydream spun in soft peach and ivory, this curation brings together peach roses, creamy white spray carnations, and cheerful santini, paired with airy bunny tails, textured dried thistles, and delicate leather ferns. Accents of fresh eucalyptus and tinted silver dollar leaves add qu', 'uploads/bloom_burst.webp', 'Birthday'),
(4, 'Blushing Lillies', 1076, 'A bouquet where soft pink meets pure white in effortless harmony. Oriental white lilies seem to blush as they gather with sweet avalanche roses, pink spray carnations, eucalyptus, and pink-sprayed gypso. Wrapped in pink frosted wraps and tied with a white pearl ribbon, this ensemble feels like a gen', 'uploads/blushing_lilies.webp', 'Birthday'),
(5, 'Dream a Little', 3014, 'The enchantment of roses can hardly be matched. Like a dream, full of hope, aspiration and positivity, this bouquet of blush pink roses and gypsos come together in a joyful union making it a sight of sheer happiness.', 'uploads/dream_a_little.webp', 'Birthday'),
(6, 'Mauve Surprise', 3416, 'Mauve Surprise is a symphony of soft, uplifting hues that dance in perfect harmony with joyful purples and pinks, radiating an enchanting warmth and effortless grace, along with a lilac vanilla cake. Wrapped in a delicate lavender wrap and crowned with a golden ribbon in a drawstring bag, this ensem', 'uploads/mauve_surprise.webp', 'Birthday'),
(7, 'Monochrome Muse', 4076, 'An ode to the art of contrast, this monochrome muse draws its allure from sculptural whites set against deep black. Lush white roses, ruffled carnations, santini with dark centres, delicate spray chrysanthemums, pristine orchids, eucalyptus, and airy springery come together in black frosted wrap, se', 'uploads/monochrome_muse.webp', 'Birthday'),
(8, 'My Favorite Forever', 2767, 'My Forever Favourite is a tender gesture wrapped in warmth and grace. Pink santinis in a soft, gentle hue are gathered with care and wrapped in rustic brown paper that carries a sense of comfort. An off-white lace ribbon finishes the bouquet with a touch of timeless charm. Thoughtfully composed and ', 'uploads/my_fav_forever.webp', 'Birthday'),
(9, '100 Days of Love', 3458, 'A bouquet of 100 magical red roses that wraps your love, affection and care to express what you truly feel within. Pamper your love with this exquisite assortment and let it be the reason for you two to fall in love all over again.', 'uploads/100_days of love.jpg', 'Anniversary'),
(10, 'A Sweet Statement', 5985, 'A gift made to leave an impression, this is sweetness styled with intention. Pristine white roses, ruffled white carnations, santiny with striking black centres, spray chrysanthemums, white orchids, fresh eucalyptus, and wisps of springery come together in a tall black hat box wrapped in black frost', 'uploads/a_sweet_statement.webp', 'Anniversary'),
(11, 'Caribbean Blues', 2896, 'A portrayal of the open seas, always running deep and free, the luxe assortment welcomes a serene aura to any space while its vivacious presence demands attention - Blue Hydrangeas, english roses box and gypsos. Making it the heartiest gift for your loved ones big day.', 'uploads/caribbean_blues.webp', 'Anniversary'),
(12, 'Countryside Memories', 2334, 'Countryside Memories is a tender gathering of blooms and textures, echoing soft meadows, quiet warmth, and the love shes nurtured through the years. Pink spray carnations, light yellow carnations, lisianthus, yellow helichrysum, and a touch of yellow gypso bloom gently alongside solidago, springeri,', 'uploads/countryside_memories.webp', 'Anniversary'),
(13, 'Dreaming of Lilac', 3244, 'An emblem of charm and tenderness, this magnificent arrangement is sure to add a dreamy touch to the celebrations and express your unparalleled love with lilac roses, pink lisianthus, light mauve chrysanthemum and lavender eucalyptus.', 'uploads/dreaming_of_lilac.webp', 'Anniversary'),
(14, 'The Warmest Hug', 16770, 'The Warmest Hug is a lavish arrangement made to honour someone truly special. A cascade of deep Anna Karina roses, soft Hermosa roses, and sun-kissed peach roses is gathered with blushing spray carnations, delicate lisianthus, and golden mini gerberas. Flowing springeri and fresh eucalyptus add full', 'uploads/the_warmest_hug.webp', 'Anniversary'),
(15, 'Rhythm of Santini', 3444, 'Take a stroll along the wild side of nature and embrace its unparalleled beauty with this majestic selection of handpicked flowers snuggled up in an English cane basket. The charm of pink santinis, pink spray carnations and springeris steals the show while their aromas and freshness can eliminate we', 'uploads/rhythm_of_santini.webp', 'Anniversary'),
(16, 'Peachy Afternoon', 6546, 'A sun-drenched table. Blush blooms. A breeze through linen curtains. That’s the world Peachy Afternoon brings to life. Sweet avalanche roses and peach roses spill their colour like ripe fruit, met with white disbuds, white carnations, and the fresh green lift of eucalyptus. All placed inside a round', 'uploads/peachy_afternoon.webp', 'Anniversary'),
(17, 'garden blue', 4356, 'hjdajid', 'uploads/the_warmest_hug.webp', 'Anniversary');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `emailid` varchar(40) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phoneno` bigint(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `emailid`, `password`, `phoneno`, `role`) VALUES
(1, 'kavya', 'kavu675@live.mail', 'kvgh@31', 1236540987, 'client'),
(2, 'simran chaudhary', 'simranch06@gmail.com', 'simmrun', 9001945678, 'client'),
(3, 'priya', 'priyayt@gmail.com', 'priyas@23', 1345267809, 'client'),
(5, 'shyam chaudhary', 'skc5767@gmail.com', 'skc@2398', 9811945676, 'client'),
(6, 'rekha', 'rekha7477@live.com', 'rekha@98', 9811995676, 'client'),
(8, 'gargi', 'gargi1232@gmail.com', 'gargi1234', 9877894567, 'Admin'),
(9, 'akshita', 'akki@gmail.com', 'aku@23', 9800986752, 'Admin'),
(10, 'aryan', 'aryan45@gmail.com', 'iron@23', 9856743256, 'Admin'),
(11, 'kartik', 'caryes43@gmail.com', 'kartick@34', 7894561234, 'Client'),
(12, 'rohit sharma', 'rohit32@gmail.com', 'rohit@34', 3456789201, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
