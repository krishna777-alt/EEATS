-- phpMyAdmin SQL Dump
-- version 5.2.1deb1+deb12u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2025 at 06:52 AM
-- Server version: 10.11.14-MariaDB-0+deb12u2
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `full_name`, `username`, `email`, `password`, `role`, `status`) VALUES
(9, 'superuser', 'root', 'root@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'Admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tb`
--

CREATE TABLE `cart_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `delivery` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tb`
--

INSERT INTO `cart_tb` (`id`, `title`, `image`, `price`, `quantity`, `subtotal`, `delivery`, `user_id`, `menu_id`) VALUES
(81, 'Hummus Wreath Platter', 'brandi-alexandra-plate3.jpg', 399, 1, 399, 40, 8, 35),
(82, 'Chicken Wings', 'fried-chicken-wings.jpg', 399, 2, 798, 40, 8, 34),
(83, 'Chicken Burger', 'chicken-burger1.jpg', 59, 2, 118, 40, 8, 5),
(84, 'Choco Sprinkle Donuts', 'desserts9.jpg', 29, 2, 58, 40, 8, 55),
(85, 'Khachapuri (Georgian Cheese Bread)', 'cheese-food1.jpg', 299, 2, 598, 40, 8, 37),
(86, 'Chicken Burger', 'chicken-burger1.jpg', 59, 2, 118, 40, 8, 5),
(87, 'Vegetable Chow Mein', 'chinees-noodles2.jpg', 599, 2, 1198, 40, 19, 39),
(88, 'Chocolet Milkshake', 'mikeshake2.jpg', 79, 2, 158, 40, 19, 2),
(89, 'Noodles (generic)', 'noodles1.jpg', 199, 2, 398, 40, 19, 32),
(90, 'Spicy Beef Noodle Bowl', 'beef-noodles.jpg', 499, 2, 998, 40, 19, 57),
(91, 'Strawberry & Cream Crepes', 'desserts4.jpg', 599, 2, 1198, 40, 19, 41),
(92, 'Hummus Wreath Platter', 'brandi-alexandra-plate3.jpg', 399, 2, 798, 40, 19, 35),
(93, 'Green Goodness Burger', 'veggie-burger.jpg', 49, 2, 98, 40, 19, 58);

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`id`, `title`, `image`, `status`) VALUES
(1, 'Burger', 'chicken-burger1.jpg', 'active'),
(2, 'Desserts', 'desserts11.jpg', 'active'),
(3, 'Pizza', 'pizza1.jpg', 'active'),
(4, 'Drinks', 'drink2.jpg', 'active'),
(5, 'Healthy', 'plate5.jpg', 'inactive'),
(6, 'Noodles', 'noodles1.jpg', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `comment_tb`
--

CREATE TABLE `comment_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_tb`
--

INSERT INTO `comment_tb` (`id`, `menu_id`, `name`, `comment`, `user_id`) VALUES
(8, 10, 'Thejas krishnan', 'i like this food!', 8),
(11, 35, 'Thejas krishnan', 'hhh', 8),
(12, 35, 'Thejas krishnan', 'hhh', 8),
(13, 35, 'Thejas krishnan', 'hhh', 8),
(14, 14, 'sherlon', 'good food\r\n', 19),
(15, 54, 'sherlon', 'nice food\r\n', 19);

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `replay` varchar(250) NOT NULL,
  `view` varchar(50) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_person_tb`
--

CREATE TABLE `delivery_person_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `res_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_person_tb`
--

INSERT INTO `delivery_person_tb` (`id`, `full_name`, `phone`, `vehicle`, `email`, `address`, `res_id`) VALUES
(2, 'riya jhone', '47343465686', 'Bike', 'riya@gmail.com', 'iduki', 19),
(3, 'victor jhoneson', '3473745498hj', 'scooter', 'victor@gmail.com', 'palacathakidi.pof', 19);

-- --------------------------------------------------------

--
-- Table structure for table `menu_tb`
--

CREATE TABLE `menu_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `res_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_tb`
--

INSERT INTO `menu_tb` (`id`, `title`, `price`, `image`, `status`, `description`, `category_id`, `res_id`, `admin_id`) VALUES
(2, 'Chocolet Milkshake', 79.00, 'mikeshake2.jpg', 'Active', '\r\nA rich and creamy chocolate milkshake made with velvety cocoa, milk, and a scoop of ice cream. Perfectly chilled and topped with chocolate syrup for an indulgent treat. Ideal for chocolate lovers seeking a cooling, dessert-like beverage. It’s both a drink and a dessert in one tall glass.', 2, 19, NULL),
(5, 'Chicken Burger', 59.00, 'chicken-burger1.jpg', 'Active', 'Juicy chicken fillet grilled or fried to perfection, nestled between soft buns with fresh lettuce and creamy mayo. Crispy on the outside and tender inside, it’s a savory delight. Topped with melted cheese and tangy sauces for extra flavor. A filling choice for a hearty lunch or dinner.', 1, 19, NULL),
(6, 'Bacon Burger', 98.00, 'bacon-burger.jpeg', 'Active', '\r\nStacked with smoky bacon strips, juicy beef patty, crisp lettuce, and melty cheese. Every bite is a mix of savory, crunchy, and creamy textures. Served in a warm toasted bun to enhance the overall flavor. A satisfying option for meat lovers.', 1, 19, NULL),
(7, 'Hamburger', 55.00, 'turkey-burger.jpeg', 'Active', '\r\nA classic burger featuring a seasoned beef patty with lettuce, tomato, and onion. Served with mustard, ketchup, and mayo for a familiar and delicious flavor combo. Simple yet fulfilling, this timeless dish hits all the right notes. A go-to option for any burger enthusiast.', 1, 19, NULL),
(8, 'Drinks', 88.00, 'cheese-food1.jpg', 'active', 'hjghhbbhjh', 1, NULL, 9),
(9, 'Desserts', 45.00, 'pinaple-juice.jpeg', 'active', 'gfjjf', 1, NULL, 9),
(10, 'Desserts', 45.00, 'chicken-burger1.jpg', 'Active', 'gfjjf', 1, NULL, 9),
(11, 'Desserts', 45.00, 'desserts8.jpg', 'active', 'gfjjf', 2, NULL, 9),
(12, 'beef burger', 45.00, 'chicken-burger1.jpg', 'active', 'it is a burger', 1, NULL, 9),
(13, 'Cheese pizza', 299.00, 'egg-pizza.jpg', 'Inactive', 'it is a pizza', 3, NULL, 9),
(14, 'Beef Burger', 89.00, 'beef-burger.jpg', 'Active', '\r\nBold, hearty, and full of flavor, this burger features a thick beef patty grilled to perfection. Topped with melted cheese, lettuce, tomato, and a smoky sauce. The bun is lightly toasted for a warm, soft bite. Ideal for meat lovers looking for a satisfying meal.\r\n\r\n', 1, 19, NULL),
(15, 'Butter Burger', 59.00, 'butter-burger.jpeg', 'Active', '\r\nRich and buttery, this burger includes a succulent beef patty slathered in melted butter. It’s indulgent, flavorful, and has a melt-in-the-mouth quality. The butter enhances the patty’s juiciness, making it extra decadent. A gourmet twist on the classic burger.', 1, 19, NULL),
(16, 'Egg Pizza', 59.00, 'egg-pizza.jpg', 'Active', '\r\nA fusion pizza featuring a soft, cheesy crust topped with fried or baked eggs. The yolks add a rich creaminess that blends beautifully with tomato sauce and herbs. A unique take on breakfast and pizza combined. Ideal for those who love trying creative flavors.', 3, 19, NULL),
(17, 'Cheese Burger', 59.00, 'cheese-burger.jpg', 'Active', '\r\nLoaded with layers of gooey cheese, crisp lettuce, and a juicy beef patty. Each bite delivers a mouthful of creamy, savory goodness. A straightforward, cheese-lover’s delight that’s hard to resist. Served on a fluffy, toasted bun.', 1, 19, NULL),
(18, 'Tomato Pizza', 599.00, 'tomato-pizza.jpg', 'Active', '\r\nThin-crust pizza topped with slices of ripe tomato, cheese, and herbs. Simple, fresh, and loaded with bright, tangy flavor. A perfect vegetarian option that highlights the beauty of tomato. Light yet deeply satisfying.', 3, 19, NULL),
(19, 'Pepperoni Pizza', 599.00, 'pepperony-pizza.jpg', 'Active', '\r\nCrispy crust layered with spicy pepperoni slices, melted mozzarella, and rich tomato sauce. The pepperoni brings a smoky, meaty flavor that balances the cheesiness. A fan-favorite choice for pizza night. Baked to a golden finish.', 3, 19, NULL),
(20, 'Cheese Pizza', 599.00, 'cheese-pizza.jpg', 'Active', '\r\nClassic cheese pizza with a golden crust and generous layers of melty mozzarella. Rich tomato sauce ties it all together for a nostalgic flavor. Ideal for all ages and preferences. The ultimate comfort food.', 3, 19, NULL),
(21, 'Chocolet Pizza', 599.00, 'chocolet-pizza.jpg', 'Active', '\r\nDessert pizza featuring a sweet crust topped with melted chocolate and sprinkled with extras like nuts or candy. It’s rich, gooey, and made for sweet cravings. A novel and fun take on pizza. Best served warm for maximum indulgence.', 3, 19, NULL),
(22, 'Apple Juice', 49.00, 'apple-juice.jpg', 'Active', '\r\nFreshly pressed apple juice with a crisp, natural sweetness. A refreshing beverage perfect for any time of day. No added sugar, just pure apple flavor. Great for kids and adults alike.', 4, 19, NULL),
(23, 'Grape Juice', 49.00, 'grape-juice.jpeg', 'Active', '\r\nVibrant purple grape juice bursting with natural flavor and antioxidants. Made from ripe, juicy grapes for a sweet and tangy drink. A healthy alternative to soda. Delicious when served chilled.', 4, 19, NULL),
(24, 'Mango Juice', 49.00, 'mango-juice.jpg', 'Active', '\r\nTropical mango juice with a rich, golden hue and naturally sweet flavor. Made from ripe mangoes, it’s thick, smooth, and fragrant. A taste of summer in every sip. Can be enjoyed as a refreshing drink or smoothie base.', 4, 19, NULL),
(25, 'Orange Lemon Juice', 59.00, 'orange-lemon-drink.jpg', 'Active', '\r\nA zesty blend of orange and lemon juice offering the perfect balance of sweet and tart. Packed with vitamin C for an immunity boost. Crisp and energizing. Best enjoyed cold on a hot day.', 4, 19, NULL),
(26, 'Pineapple Juice', 49.00, 'pinaple-juice.jpeg', 'Active', '\r\nTropical pineapple juice that’s both sweet and slightly tangy. Refreshing and hydrating, made from fresh pineapples. Great on its own or as a mixer. Natural enzymes also help digestion.', 4, 19, NULL),
(27, 'Pomegranate Juice', 59.00, 'pomegranate.jpeg', 'Active', '\r\nBold and tangy juice made from ripe pomegranate seeds. Deep red in color and rich in antioxidants. A heart-healthy drink that’s as tasty as it is nutritious. Naturally sweet with a tart edge.', 4, 19, NULL),
(28, 'Tomato Juice', 49.00, 'tomato-juice.jpeg', 'Active', '\r\nSavory tomato juice often seasoned with salt, pepper, or herbs. A nutritious beverage packed with vitamins A and C. Can be consumed plain or used in cocktails. A great option for savory juice lovers.', 4, 19, NULL),
(29, 'Beetroot Juice', 49.00, 'vetroot-juice.jpg', 'Active', '\r\nVibrant purple-red beet juice that’s earthy, sweet, and full of nutrients. Known to improve blood flow and stamina. A superfood drink favored by health enthusiasts. Best served cold with a touch of lemon.', 4, 19, NULL),
(30, 'Traditional pizza', 299.00, 'pizza1.jpg', 'Active', '\r\nTraditional pizza topped with classic tomato sauce, cheese, and optional toppings. Golden crust, chewy texture, and full of flavor. A universally loved comfort food. Suitable for customizing to taste.', 3, 19, NULL),
(31, 'Burger (generic)', 49.00, 'burger2.jpg', 'Active', '\r\nA beef or chicken patty sandwiched between soft burger buns with veggies and sauces. Simple, tasty, and endlessly customizable. A meal staple for fast food lovers. Great for lunch or dinner.', 1, 19, NULL),
(32, 'Noodles (generic)', 199.00, 'noodles1.jpg', 'Active', '\r\nStir-fried or soupy noodles made with fresh vegetables and sauces. A satisfying blend of textures and flavors. Popular across Asian cuisines. Can be served spicy or mild.', 6, 19, NULL),
(33, 'Lemon Juice', 49.00, 'drink2.jpg', 'Active', '\r\nCool and tangy juice made from fresh lemons. Ideal for a summer refreshment. Can be sweetened or salted depending on preference. A versatile and thirst-quenching drink.', 4, 19, NULL),
(34, 'Chicken Wings', 399.00, 'fried-chicken-wings.jpg', 'Active', '\r\nCrispy and juicy chicken wings coated in a spicy or tangy glaze. A crowd-pleaser at parties or game nights. Served hot with dips like ranch or blue cheese. Finger-licking good!', 5, 19, NULL),
(35, 'Hummus Wreath Platter', 399.00, 'brandi-alexandra-plate3.jpg', 'Active', '\r\nA beautifully arranged hummus platter featuring fresh veggies, pita, and herbs. Creamy, savory hummus is the star, surrounded by colorful garnishes. Visually appealing and healthy. Perfect for gatherings or light meals.', 5, 19, NULL),
(36, 'White Bread with Butter', 29.00, 'cheese-bread.jpg', 'Inactive', '\r\nThick slice of soft white bread served with creamy butter. Simple, classic, and comforting. Can be enjoyed as breakfast or a snack. Great with tea or coffee.', 5, 19, NULL),
(37, 'Khachapuri (Georgian Cheese Bread)', 299.00, 'cheese-food1.jpg', 'Active', '\r\nA traditional Georgian dish made with bread stuffed and topped with gooey cheese and egg. Warm, comforting, and slightly salty. The crust is thick and perfect for dipping into the molten center. Best enjoyed hot.', 5, 19, NULL),
(38, 'Spicy Laksa Noodle Soup', 399.00, 'chinees-noodels.jpg', 'Active', '\r\nA flavorful noodle soup from Southeast Asia made with spicy coconut milk broth. Includes noodles, tofu, shrimp, or chicken, depending on preference. Bold, aromatic, and soul-warming. A must-try for spice lovers.', 6, 20, NULL),
(39, 'Vegetable Chow Mein', 599.00, 'chinees-noodles2.jpg', 'Active', '\r\nStir-fried noodles tossed with colorful vegetables in soy-based sauce. Slightly crispy and bursting with umami flavor. A classic Chinese dish perfect for vegetarians. Can be enjoyed as a main or side dish.', 6, 20, NULL),
(40, 'Shrimp Ramen Bowl', 499.00, 'egge-spicy-noodels.jpg', 'Active', '\r\nA savory ramen bowl filled with springy noodles and succulent shrimp. Rich broth infused with garlic, soy, and spices. Topped with egg, seaweed, and green onions. Comforting and full of depth.', 6, 20, NULL),
(41, 'Strawberry & Cream Crepes', 599.00, 'desserts4.jpg', 'Active', '\r\nSoft crepes filled with whipped cream and sweet strawberries. Light, fruity, and delicately sweet. A beautiful dessert that’s as pretty as it is tasty. Finished with a dusting of sugar or syrup drizzle.', 6, 20, NULL),
(42, 'Mixed Berry Puff Pastries', 49.00, 'desserts2.jpg', 'Active', '\r\nFlaky puff pastries filled with a mixture of sweet-tart berries. Crispy outside, juicy inside. A perfect balance of textures and fruity flavors. Great as a dessert or tea-time snack.', 6, 20, NULL),
(43, 'Brownie Sundae with Caramel Drizzle', 29.00, 'desserts3.jpg', 'Active', '\r\nWarm brownie served with vanilla ice cream and rich caramel drizzle. A dessert with warm-cold contrast and deep chocolate flavor. Gooey, fudgy, and indulgent. Best eaten immediately.', 2, 20, NULL),
(44, 'Mutton Noodles', 599.00, 'mutton-noodles.jpg', 'Active', '\r\nSpicy stir-fried noodles mixed with tender mutton pieces. Savory and bold with a meaty kick. A fusion comfort dish rich in spices. Ideal for hearty appetites.', 6, 20, NULL),
(45, 'Milkshake (generic)', 59.00, 'milkshake1.jpg', 'Active', '\r\nChilled milkshake made with blended milk, ice cream, and syrup of choice. Thick, creamy, and perfect for dessert or refreshment. Can be made in flavors like vanilla, chocolate, or strawberry. Loved by all age groups.', 4, 20, NULL),
(46, 'A Symphony of Chocolate & Cream', 39.00, 'desserts7.jpg', 'Active', '\r\nA decadent dessert combining rich chocolate layers and whipped cream. Smooth, velvety textures with intense cocoa notes. Finished with chocolate shavings for elegance. A showstopper for chocolate fans.', 2, 20, NULL),
(47, 'Pink Delight Stack', 39.00, 'desserts8.jpg', 'Active', '\r\nLayered pink sponge cake with whipped frosting and sweet filling. Light, fluffy, and pleasing to the eye. Perfect for birthdays or special occasions. Tastes as good as it looks.', 2, 20, NULL),
(48, 'Garden Egg Brunch Plate', 399.00, 'plate7.jpg', 'Active', '\r\nA fresh brunch plate featuring eggs, greens, and artisanal bread. Balanced, healthy, and colorful. Ideal for a light yet nutritious morning meal. A clean-eating favorite.', 5, 20, NULL),
(49, 'Indian Veg Curry Bowl', 399.00, 'plate4.jpg', 'Active', '\r\nA comforting bowl of mixed vegetables simmered in rich Indian curry sauce. Aromatic with spices like cumin, turmeric, and garam masala. Served with rice or flatbread. Warm and nourishing.', 5, 20, NULL),
(50, 'Crispy Chicken Classic', 59.00, 'chicken-burger1.jpg', 'Active', '\r\nGolden-fried chicken served with a crisp exterior and juicy inside. A timeless fast-food favorite. Seasoned to perfection and served hot. Excellent with dipping sauces.', 1, 20, NULL),
(51, 'Mediterranean Power Bowl', 399.00, 'plate6.jpg', 'Active', '\r\nA wholesome bowl with hummus, grains, veggies, and olives. Inspired by Mediterranean flavors for a healthy, fulfilling meal. Packed with nutrients and fiber. Great for clean eating and energy.', 5, 20, NULL),
(52, 'Wok-Tossed Veggie Noodles', 499.00, 'veg-noodels.jpg', 'Active', '\r\nStir-fried noodles tossed with bell peppers, cabbage, and carrots in soy sauce. Slightly charred for added flavor. A vegan-friendly and delicious choice. Quick, easy, and satisfying.', 6, 20, NULL),
(53, 'Red Velvet Charm', 39.00, 'desserts11.jpg', 'Active', '\r\nVelvety red cake layers with cream cheese frosting. Moist, rich, and subtly chocolatey. A romantic dessert choice for special days. Stunning on the plate.', 2, 20, NULL),
(54, 'Berry Tart Fantasy', 29.00, 'desserts6.jpg', 'Active', 'Berry Tart Fantasy\r\nButtery tart shell filled with creamy custard and topped with glazed berries. Crisp, fresh, and mildly sweet. A classic European-style dessert. Perfect for high tea or formal events.', 2, 20, NULL),
(55, 'Choco Sprinkle Donuts', 29.00, 'desserts9.jpg', 'Active', '\r\nSoft donuts covered in chocolate glaze and colorful sprinkles. Sweet, playful, and perfect for all ages. Great for parties or coffee breaks. A treat that brings joy in every bite.', 2, 20, NULL),
(56, 'Sunny Side Breakfast Plate', 499.00, 'plate7.jpg', 'Active', '\r\nA hearty breakfast plate featuring sunny side up eggs, toast, and fresh produce. Balanced with proteins and carbs for energy. Simple and nutritious. Ideal for a bright morning start.', 5, 20, NULL),
(57, 'Spicy Beef Noodle Bowl', 499.00, 'beef-noodles.jpg', 'Active', '\r\nTender beef strips tossed in spicy Asian sauces with noodles. Packed with flavor and heat. A protein-rich and satisfying dish. Ideal for lunch or dinner.', 6, 20, NULL),
(58, 'Green Goodness Burger', 49.00, 'veggie-burger.jpg', 'Active', '\r\nA vegetarian burger made with plant-based patty, fresh greens, and creamy sauces. Tastes fresh and nourishing. A guilt-free burger alternative. Full of fiber and crunch.', 1, 20, NULL),
(59, 'Grilled Chicken Feast', 699.00, 'palate7.jpg', 'Active', '\r\nGrilled chicken breast served with seasoned sides and vegetables. High in protein, low in fat. A great meal for health-conscious eaters. Light yet flavorful', 5, 20, NULL),
(60, 'Truffle Pasta Elegance', 59.00, 'plate8.jpeg', 'Active', '\r\nCreamy pasta with truffle oil, mushrooms, and parmesan. Rich and indulgent with a gourmet flair. Delicate yet packed with umami. A luxurious meal experience.', 5, 20, NULL),
(61, 'Spicy Masala Tangle', 499.00, 'masala-noodels.jpg', 'Active', '\r\nA fiery noodle dish loaded with Indian spices. Tangy, hot, and aromatic. Best for spice lovers seeking a flavor punch. Perfect with lemon and coriander garnish.', 6, 20, NULL),
(62, 'Hot Chili Garlic Noodles', 499.00, 'spicy-noodles.jpg', 'Active', '\r\nNoodles tossed in a bold chili-garlic sauce. Spicy, savory, and slightly smoky. A favorite among fans of heat. Served hot with a kick.', 6, 20, NULL),
(63, 'Mushroom Fusion Noodles', 499.00, 'mashroom-noodles.jpg', 'Active', '\r\nSavory noodles stir-fried with mushrooms and Asian sauces. Earthy flavor meets umami depth. Vegetarian-friendly and filling. Great for a cozy meal.', 6, 20, NULL),
(64, 'Potato Crunch Noodle Bowl', 599.00, 'chinees-noodels.jpg', 'Active', '\r\nUnique noodle bowl topped with crispy potato bits for texture. Flavored with spices and herbs for extra zing. Crunchy and soft in one bite. A creative fusion dish.', 6, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_form_tb`
--

CREATE TABLE `order_form_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `account` varchar(200) NOT NULL,
  `delivery_inst` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_form_tb`
--

INSERT INTO `order_form_tb` (`id`, `full_name`, `username`, `email`, `phone`, `street_address`, `city`, `state`, `zip_code`, `account`, `delivery_inst`, `user_id`) VALUES
(5, 'Thejas krishnan', 'teju_777', 'krishna@gmail.com', '977825023', 'palakathakdipo', 'kunnamthanam', 'kerala', '7777', 'thejas@346', 'no data', 8),
(45, 'victor jhoneson', 'victor333', 'victor@gmail.com', '3473745498hj', 'mallapali', 'kunnamthanam', 'kerala', '777', 'victor@yu', 'nowhere', 19),
(46, 'james bond', 'james_555', 'james@gmail.com', '42343454', 'niranam', 'redfort', 'kerala', '8888', 'james@345358', 'next road', 20);

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `res_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tb`
--

INSERT INTO `order_tb` (`id`, `title`, `price`, `image`, `date`, `status`, `menu_id`, `user_id`, `res_id`) VALUES
(91, 'Hummus Wreath Platter', 399.00, 'brandi-alexandra-plate3.jpg', '2025-08-06 20:21:42', 'Cancelled', 35, 8, 19),
(92, 'Chicken Wings', 399.00, 'fried-chicken-wings.jpg', '2025-08-06 21:00:23', 'Cancelled', 34, 8, 19),
(93, 'Chicken Burger', 59.00, 'chicken-burger1.jpg', '2025-08-06 21:02:28', 'Delivered', 5, 8, 19),
(94, 'Brownie Sundae with Caramel Drizzle', 29.00, 'desserts3.jpg', '2025-08-06 21:02:36', 'Delivered', 43, 8, 19),
(95, 'Khachapuri (Georgian Cheese Bread)', 299.00, 'cheese-food1.jpg', '2025-08-08 09:19:53', 'Pending', 37, 8, 19),
(96, 'Hot Chili Garlic Noodles', 499.00, 'spicy-noodles.jpg', '2025-08-08 09:21:23', 'Pending', 62, 8, 20),
(97, 'Chocolet Milkshake', 79.00, 'mikeshake2.jpg', '2025-08-14 19:46:42', 'Cancelled', 2, 19, 19),
(98, 'Chicken Burger', 59.00, 'chicken-burger1.jpg', '2025-08-14 19:47:28', 'Pending', 5, 19, 19),
(99, 'Pepperoni Pizza', 599.00, 'pepperony-pizza.jpg', '2025-09-09 17:33:31', 'Pending', 19, 19, 19),
(100, 'Strawberry & Cream Crepes', 599.00, 'desserts4.jpg', '2025-09-09 17:58:24', 'Pending', 41, 19, 20),
(101, 'Green Goodness Burger', 49.00, 'veggie-burger.jpg', '2025-09-09 18:17:37', 'Pending', 58, 19, 20),
(102, 'Chocolet Milkshake', 79.00, 'mikeshake2.jpg', '2025-09-13 10:20:04', 'Pending', 2, 20, 19);

-- --------------------------------------------------------

--
-- Table structure for table `restaruant_tb`
--

CREATE TABLE `restaruant_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `open` varchar(250) NOT NULL,
  `close` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaruant_tb`
--

INSERT INTO `restaruant_tb` (`id`, `name`, `email`, `password`, `phone`, `address`, `location`, `open`, `close`, `status`, `image`) VALUES
(19, 'GreenBite Cafe 		', 'green23@gmail.com', '63a9f0ea7bb98050796b649e85481845', '4734346568', 'palacathakidi.po', 'india', '07:00', '20:00', 'Active', 'bat-in-sky.jpg'),
(20, 'Spice Junction', 'spicejuction@gmail.com', '8a0a4fcd1e8164a6dff7faa950152efb', '9876543210', '23 MG Road,Indiranagar,Bengaluru,Karnataka,560038', 'Near CMH Road Metro Station', '10:00', '23:00', 'Active', 'new-york-hottel.jpg'),
(22, 'uhu89909i0', 'email@gmail.com', 'password', '43754568', 'address', 'location', '3:00', '7:00', 'status', 'image_name');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id`, `full_name`, `username`, `email`, `password`, `status`, `image`) VALUES
(8, 'Thejas krishnan', 'root', 'krishna@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'Active', 'batman.jpg'),
(18, 'victore jhonsone', 'root', 'victor@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'Active', ''),
(19, 'sherlon', 'victor', 'sherlon18@gmail.com', 'ffc150a160d37e92012c196b6af4160d', 'Active', 'rod.jpg'),
(20, 'james bond', 'james_555', 'james@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 'Active', 'no profile');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_tb`
--
ALTER TABLE `cart_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_tb`
--
ALTER TABLE `comment_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `delivery_person_tb`
--
ALTER TABLE `delivery_person_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `res_id` (`res_id`);

--
-- Indexes for table `menu_tb`
--
ALTER TABLE `menu_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `order_form_tb`
--
ALTER TABLE `order_form_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `res_id` (`res_id`);

--
-- Indexes for table `restaruant_tb`
--
ALTER TABLE `restaruant_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_tb`
--
ALTER TABLE `cart_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment_tb`
--
ALTER TABLE `comment_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_tb`
--
ALTER TABLE `contact_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `delivery_person_tb`
--
ALTER TABLE `delivery_person_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_tb`
--
ALTER TABLE `menu_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `order_form_tb`
--
ALTER TABLE `order_form_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `restaruant_tb`
--
ALTER TABLE `restaruant_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tb`
--
ALTER TABLE `cart_tb`
  ADD CONSTRAINT `cart_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_tb_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_tb`
--
ALTER TABLE `comment_tb`
  ADD CONSTRAINT `comment_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD CONSTRAINT `contact_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_person_tb`
--
ALTER TABLE `delivery_person_tb`
  ADD CONSTRAINT `delivery_person_tb_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `restaruant_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_tb`
--
ALTER TABLE `menu_tb`
  ADD CONSTRAINT `menu_tb_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `restaruant_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_tb_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_form_tb`
--
ALTER TABLE `order_form_tb`
  ADD CONSTRAINT `order_form_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD CONSTRAINT `order_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_tb_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_tb_ibfk_3` FOREIGN KEY (`res_id`) REFERENCES `restaruant_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
