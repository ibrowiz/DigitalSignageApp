<?php

use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {

/*(1, 'hospitals', 1, 'hospital', '2017-12-11 23:00:00', '2017-12-11 23:00:00'),
(2, 'Architecture, Engineering and Design', 2, 'Architecture, Engineering and Design', '2017-12-11 23:00:00', '2018-01-17 11:49:48'),
(3, 'pharmaceuticals', 1, 'pharmacy', '2017-12-11 23:00:00', '2017-12-11 23:00:00'),
(4, 'Construction Equipment and Supplies', 2, 'Construction Equipment and Supplies', '2017-12-11 23:00:00', '2018-01-17 11:50:17'),
(5, 'Colleges and Universities', 3, 'Colleges and Universities', '2017-12-12 23:00:00', '2017-12-12 23:00:00'),
(6, 'Elementary and Secondary Schools', 3, 'Elementary and Secondary Schools', '2017-12-20 22:40:07', '2018-01-17 11:48:53'),
(7, 'Farming and Ranching', 4, 'Farming and Ranching', '2017-12-20 23:22:34', '2018-01-17 11:50:55'),
(8, 'Fishing, Hunting and Forestry and Logging', 4, 'Fishing, Hunting and Forestry and Logging', '2018-01-24 06:54:20', '2018-01-24 06:54:20'),
(9, 'Mining and Quarrying', 4, 'Mining and Quarrying', '2018-01-24 06:54:48', '2018-01-24 06:54:48'),
(10, 'Accounting and Tax Preparation', 5, 'Accounting and Tax Preparation', '2018-01-24 07:02:42', '2018-01-24 07:02:42'),
(11, 'Advertising, Marketing and PR', 5, 'Advertising, Marketing and PR', '2018-01-24 07:03:20', '2018-01-24 07:03:20'),
(12, 'Data and Records Management', 5, 'Data and Records Management', '2018-01-24 07:04:49', '2018-01-24 07:04:49'),
(13, 'Facilities Management and Maintenance', 5, 'Facilities Management and Maintenance', '2018-01-24 07:05:15', '2018-01-24 07:05:15'),
(14, 'HR and Recruiting Services', 5, 'HR and Recruiting Services', '2018-01-24 07:05:42', '2018-01-24 07:05:42'),
(15, 'Legal Services', 5, 'Legal Services', '2018-01-24 07:06:13', '2018-01-24 07:06:13'),
(16, 'Management Consulting', 5, 'Management Consulting', '2018-01-24 07:06:55', '2018-01-24 07:06:55'),
(17, 'Payroll Services', 5, 'Payroll Services', '2018-01-24 07:08:20', '2018-01-24 07:08:20'),
(18, 'Sales Services', 5, 'Sales Services', '2018-01-24 07:08:48', '2018-01-24 07:08:48'),
(19, 'Security Services', 5, 'Security Services', '2018-01-24 07:09:16', '2018-01-24 07:09:16'),
(20, 'Business Services Other', 5, 'Business Services Other', '2018-01-24 07:09:49', '2018-01-24 07:09:49'),
(21, 'Audio, Video and Photography', 6, 'Audio, Video and Photography', '2018-01-24 07:13:33', '2018-01-24 07:13:33'),
(22, 'Computers, Parts and Repair', 6, 'Computers, Parts and Repair', '2018-01-24 07:13:53', '2018-01-24 07:13:53'),
(23, 'Consumer Electronics, Parts and Repair', 6, 'Consumer Electronics, Parts and Repair', '2018-01-24 07:14:37', '2018-01-24 07:14:37'),
(24, 'IT and Network Services and Support', 6, 'IT and Network Services and Support', '2018-01-24 07:15:03', '2018-01-24 07:15:03'),
(25, 'Instruments and Controls', 6, 'Instruments and Controls', '2018-01-24 07:15:28', '2018-01-24 07:15:28'),
(26, 'Network Security Products', 6, 'Network Security Products', '2018-01-24 07:16:06', '2018-01-24 07:16:06'),
(27, 'Networking equipment and Systems', 6, 'Networking equipment and Systems', '2018-01-24 07:16:38', '2018-01-24 07:16:38'),
(28, 'Office Machinery and Equipment', 6, 'Office Machinery and Equipment', '2018-01-24 07:16:59', '2018-01-24 07:16:59'),
(29, 'Peripherals Manufacturing', 6, 'Peripherals Manufacturing', '2018-01-24 07:17:21', '2018-01-24 07:17:21'),
(30, 'Semiconductor and Microchip Manufacturing', 6, 'Semiconductor and Microchip Manufacturing', '2018-01-24 07:19:10', '2018-01-24 07:19:10'),
(31, 'Computer and Electronics Other', 6, 'Computer and Electronics Other', '2018-01-24 07:19:39', '2018-01-24 07:19:39'),
(32, 'Automotive Repair and Maintenance', 7, 'Automotive Repair and Maintenance', '2018-01-24 07:20:12', '2018-01-24 07:20:12'),
(33, 'Funeral Homes and Services', 7, 'Funeral Homes and Services', '2018-01-24 07:22:21', '2018-01-24 07:22:21'),
(34, 'Laundry and Dry Cleaning', 7, 'Laundry and Dry Cleaning', '2018-01-24 07:24:05', '2018-01-24 07:24:05'),
(35, 'Parking Lots and Garage Management', 7, 'Parking Lots and Garage Management', '2018-01-24 07:24:25', '2018-01-24 07:24:25'),
(36, 'Personal Care', 7, 'Personal Care', '2018-01-24 07:24:52', '2018-01-24 07:24:52'),
(37, 'Photofinishing Services', 7, 'Photofinishing Services', '2018-01-24 07:25:15', '2018-01-24 07:25:15'),
(38, 'Consumer Services Other', 7, 'Consumer Services Other', '2018-01-24 07:34:25', '2018-01-24 07:34:25'),
(39, 'Libraries, Archives and Museums', 3, 'Libraries, Archives and Museums', '2018-01-24 07:34:49', '2018-01-24 07:34:49'),
(40, 'Sports, Arts, and Recreation Instruction', 3, 'Sports, Arts, and Recreation Instruction', '2018-01-24 07:41:05', '2018-01-24 07:41:05'),
(41, 'Technical and Trade Schools', 3, 'Technical and Trade Schools', '2018-01-24 07:41:31', '2018-01-24 07:41:31'),
(42, 'Test Preparation', 3, 'Test Preparation', '2018-01-24 07:41:53', '2018-01-24 07:41:53'),
(43, 'Education Other', 3, 'Education Other', '2018-01-24 07:42:13', '2018-01-24 07:42:13'),
(44, 'Alternative Energy Sources', 8, 'Alternative Energy Sources', '2018-01-24 07:42:51', '2018-01-24 07:42:51'),
(45, 'Gas and Electric Utilities', 8, 'Gas and Electric Utilities', '2018-01-24 07:44:45', '2018-01-24 07:44:45'),
(46, 'Gasoline and Oil Refineries', 8, 'Gasoline and Oil Refineries', '2018-01-24 07:46:11', '2018-01-24 07:46:11'),
(47, 'Sewage Treatment Facilities', 8, 'Sewage Treatment Facilities', '2018-01-24 07:46:29', '2018-01-24 07:46:29'),
(48, 'Waste Management and Recycling', 8, 'Waste Management and Recycling', '2018-01-24 07:46:56', '2018-01-24 07:46:56'),
(49, 'Water Treatment and Utilities', 8, 'Water Treatment and Utilities', '2018-01-24 07:47:20', '2018-01-24 07:47:20'),
(50, 'Energy and Utilities Other', 8, 'Energy and Utilities Other', '2018-01-24 07:50:05', '2018-01-24 07:50:05'),
(51, 'Banks', 9, 'Banks', '2018-01-24 07:50:28', '2018-01-24 07:50:28'),
(52, 'Credit Cards and Related Services', 9, 'Credit Cards and Related Services', '2018-01-24 07:50:48', '2018-01-24 07:50:48'),
(53, 'Credit Unions', 9, 'Credit Unions', '2018-01-24 07:51:09', '2018-01-24 07:51:09'),
(54, 'Insurance and Risk Management', 9, 'Insurance and Risk Management', '2018-01-24 07:51:50', '2018-01-24 07:51:50'),
(55, 'Investment Banking and Venture Capital', 9, 'Investment Banking and Venture Capital', '2018-01-24 07:52:17', '2018-01-24 07:52:17'),
(56, 'Lending and Mortgage', 9, 'Lending and Mortgage', '2018-01-24 07:52:45', '2018-01-24 07:54:19'),
(57, 'Personal Financial Planning and Private Banking', 9, 'Personal Financial Planning and Private Banking', '2018-01-24 08:07:41', '2018-01-24 08:07:41'),
(58, 'Securities Agents and Brokers', 9, 'Securities Agents and Brokers', '2018-01-24 08:08:11', '2018-01-24 08:08:11'),
(59, 'Trust, Fiduciary, and Custody Activities', 9, 'Trust, Fiduciary, and Custody Activities', '2018-01-24 08:08:35', '2018-01-24 08:08:35'),
(60, 'Financial Services Other', 9, 'Financial Services Other', '2018-01-24 08:09:05', '2018-01-24 08:09:05'),
(61, 'International Bodies and Organizations', 10, 'International Bodies and Organizations', '2018-01-24 08:09:50', '2018-01-24 08:09:50'),
(62, 'Local Government', 10, 'Local Government', '2018-01-24 08:10:21', '2018-01-24 08:10:21'),
(63, 'National Government', 10, 'National Government', '2018-01-24 08:10:42', '2018-01-24 08:10:42'),
(64, 'State/Provincial Government', 10, 'State/Provincial Government', '2018-01-24 08:11:34', '2018-01-24 08:11:34'),
(65, 'Government Other', 10, 'Government Other', '2018-01-24 08:11:53', '2018-01-24 08:11:53'),
(66, 'Biotechnology', 1, 'Biotechnology', '2018-01-24 08:13:29', '2018-01-24 08:13:29'),
(67, 'Diagnostic Laboratories', 1, 'Diagnostic Laboratories', '2018-01-24 08:13:59', '2018-01-24 08:13:59'),
(68, 'Doctors and Health Care Practitioners', 1, 'Doctors and Health Care Practitioners', '2018-01-24 08:36:19', '2018-01-24 08:36:19'),
(69, 'Medical Devices', 1, 'Medical Devices', '2018-01-24 08:36:38', '2018-01-24 08:36:38'),
(70, 'Medical Supplies and Equipment', 1, 'Medical Supplies and Equipment', '2018-01-24 08:36:55', '2018-01-24 08:36:55'),
(71, 'Outpatient Care Centers', 1, 'Outpatient Care Centers', '2018-01-24 08:37:17', '2018-01-24 08:37:17'),
(72, 'Personal Health Care Products', 1, 'Personal Health Care Products', '2018-01-24 08:37:33', '2018-01-24 08:37:33'),
(73, 'Residential and Long-term Care Facilities', 1, 'Residential and Long-term Care Facilities', '2018-01-24 08:37:52', '2018-01-24 08:37:52'),
(74, 'Veterinary Clinics and Services', 1, 'Veterinary Clinics and Services', '2018-01-24 08:39:12', '2018-01-24 08:39:12'),
(75, 'Health, Pharmaceuticals, and Biotech Other', 1, 'Health, Pharmaceuticals, and Biotech Other', '2018-01-24 08:39:36', '2018-01-24 08:39:36'),
(76, 'Aerospace and Defense', 11, 'Aerospace and Defense', '2018-01-25 01:16:17', '2018-01-25 01:16:17'),
(77, 'Alcoholic Beverages', 11, 'Alcoholic Beverages', '2018-01-25 01:16:43', '2018-01-25 01:16:43'),
(78, 'Automobiles, Boats and Motor Vehicles', 11, 'Automobiles, Boats and Motor Vehicles', '2018-01-25 01:17:11', '2018-01-25 01:17:11'),
(79, 'Chemicals and Petrochemicals', 11, 'Chemicals and Petrochemicals', '2018-01-25 01:17:39', '2018-01-25 01:17:39'),
(80, 'Concrete, Glass and Building Materials', 11, 'Concrete, Glass and Building Materials', '2018-01-25 01:18:06', '2018-01-25 01:18:06'),
(81, 'Farming and Mining Machinery and Equipment', 11, 'Farming and Mining Machinery and Equipment', '2018-01-25 01:18:46', '2018-01-25 01:18:46'),
(82, 'Food and Dairy Product Manufacturing and Packaging', 11, 'Food and Dairy Product Manufacturing and Packaging', '2018-01-25 01:19:47', '2018-01-25 01:19:47'),
(83, 'Furniture Manufacturing', 11, 'Furniture Manufacturing', '2018-01-25 01:20:14', '2018-01-25 01:20:14'),
(84, 'Metals Manufacturing', 11, 'Metals Manufacturing', '2018-01-25 20:50:04', '2018-01-25 20:50:04'),
(85, 'Nonalcoholic Beverages', 11, 'Nonalcoholic Beverages', '2018-01-25 20:50:45', '2018-01-25 20:50:45'),
(86, 'Paper and Paper Products', 11, 'Paper and Paper Products', '2018-01-25 20:51:10', '2018-01-25 20:51:10'),
(87, 'Plastics and Rubber Manufacturing', 11, 'Plastics and Rubber Manufacturing', '2018-01-25 20:51:26', '2018-01-25 20:51:26'),
(88, 'Textiles, Apparel and Accessories', 11, 'Textiles, Apparel and Accessories', '2018-01-25 20:51:55', '2018-01-25 20:51:55'),
(89, 'Tools, Hardware and Light Machinery', 11, 'Tools, Hardware and Light Machinery', '2018-01-25 20:52:23', '2018-01-25 20:52:23'),
(90, 'Manufacturing Other', 11, 'Manufacturing Other', '2018-01-25 20:52:44', '2018-01-25 20:52:44'),
(91, 'Adult Entertainment', 12, 'Adult Entertainment', '2018-01-25 20:53:44', '2018-01-25 20:53:44'),
(92, 'Motion Picture Exhibitors', 12, 'Motion Picture Exhibitors', '2018-01-25 20:54:21', '2018-01-25 20:54:21'),
(93, 'Motion Picture and Recording Producers', 12, 'Motion Picture and Recording Producers', '2018-01-25 20:55:34', '2018-01-25 20:55:34'),
(94, 'Newspapers, Books, and Periodicals', 12, 'Newspapers, Books, and Periodicals', '2018-01-25 20:56:09', '2018-01-25 20:56:09'),
(95, 'Performing Arts', 12, 'Performing Arts', '2018-01-25 21:01:19', '2018-01-25 21:01:19'),
(96, 'Radio, Television Broadcasting', 12, 'Radio, Television Broadcasting', '2018-01-25 21:11:38', '2018-01-25 21:11:38'),
(97, 'Media and Entertainment Other', 12, 'Media and Entertainment Other', '2018-01-26 01:40:15', '2018-01-26 01:40:15'),
(98, 'Advocacy Organizations', 13, 'Advocacy Organizations', '2018-01-26 01:40:43', '2018-01-26 01:40:43'),
(99, 'Charitable Organizations and Foundations', 13, 'Charitable Organizations and Foundations', '2018-01-26 01:41:07', '2018-01-26 01:41:07'),
(100, 'Professional Associations', 13, 'Professional Associations', '2018-01-26 01:41:31', '2018-01-26 01:41:31'),
(101, 'Religious Organizations', 13, 'Religious Organizations', '2018-01-26 01:41:57', '2018-01-26 01:41:57'),
(102, 'Social and Membership Organizations', 13, 'Social and Membership Organizations', '2018-01-26 01:42:21', '2018-01-26 01:42:21'),
(103, 'Trade Groups and Labor Unions', 13, 'Trade Groups and Labor Unions', '2018-01-26 01:42:51', '2018-01-26 01:42:51'),
(104, 'Non-profit Other', 13, 'Non-profit Other', '2018-01-26 01:43:33', '2018-01-26 01:43:33'),
(105, 'Other', 14, 'Other', '2018-01-26 01:44:31', '2018-01-26 01:44:31'),
(106, 'Construction and Remodeling', 2, 'Construction and Remodeling', '2018-01-26 01:45:12', '2018-01-26 01:45:12'),
(107, 'Property Leasing and Management', 2, 'Property Leasing and Management', '2018-01-26 01:45:47', '2018-01-26 01:45:47'),
(108, 'Real Estate Agents and Appraisers', 2, 'Real Estate Agents and Appraisers', '2018-01-26 01:46:05', '2018-01-26 01:46:05'),
(109, 'Real Estate Investment and Development', 2, 'Real Estate Investment and Development', '2018-01-26 01:46:33', '2018-01-26 01:46:33'),
(110, 'Automobile Dealers', 15, 'Automobile Dealers', '2018-01-26 01:47:35', '2018-01-26 01:47:35'),
(111, 'Automobile Parts and Supplies', 15, 'Automobile Parts and Supplies', '2018-01-26 01:47:53', '2018-01-26 01:47:53'),
(112, 'Beer, Wine and Liquor Stores', 15, 'Beer, Wine and Liquor Stores', '2018-01-26 01:48:17', '2018-01-26 01:48:17'),
(113, 'Clothing and Shoe Stores', 15, 'Clothing and Shoe Stores', '2018-01-26 01:49:17', '2018-01-26 01:49:17'),
(114, 'Florist', 15, 'Florist', '2018-01-26 01:49:52', '2018-01-26 01:49:52'),
(115, 'Furniture Stores', 15, 'Furniture Stores', '2018-01-26 01:50:18', '2018-01-26 01:50:18'),
(116, 'Gasoline Stations', 15, 'Gasoline Stations', '2018-01-26 01:50:36', '2018-01-26 01:50:36'),
(117, 'Grocery and Specialty Stores', 15, 'Grocery and Specialty Stores', '2018-01-26 01:51:01', '2018-01-26 01:51:01'),
(118, 'Real Estate and Construction Other', 2, 'Real Estate and Construction Other', '2018-01-26 05:05:00', '2018-01-26 05:05:00'),
(119, 'Hardware and Building Material Dealers', 15, 'Hardware and Building Material Dealers', '2018-01-26 05:08:02', '2018-01-26 05:08:02'),
(120, 'Jewelry, Luggage, and Leather Goods', 15, 'Jewelry, Luggage, and Leather Goods', '2018-01-26 05:09:34', '2018-01-26 05:09:34'),
(121, 'Office Supplies Stores', 15, 'Office Supplies Stores', '2018-01-26 05:10:32', '2018-01-26 05:10:32'),
(122, 'Restaurants and Bars', 15, 'Restaurants and Bars', '2018-01-26 05:11:02', '2018-01-26 05:11:02'),
(123, 'Sporting Goods, Hobby, Books and Music Stores', 15, 'Sporting Goods, Hobby, Books and Music Stores', '2018-01-26 05:11:29', '2018-01-26 05:11:29'),
(124, 'Retail Others', 15, 'Retail Others', '2018-01-26 05:12:00', '2018-01-26 05:12:00'),
(125, 'Data Analytics, Management, and Internet', 16, 'Data Analytics, Management, and Internet', '2018-01-26 05:13:06', '2018-01-26 05:13:06'),
(126, 'E-Commerce and Internet Business', 16, 'E-Commerce and Internet Business', '2018-01-26 05:13:39', '2018-01-26 05:13:39'),
(127, 'Games and Gaming', 16, 'Games and Gaming', '2018-01-26 05:14:09', '2018-01-26 05:14:09'),
(128, 'Software', 16, 'Software', '2018-01-26 05:14:39', '2018-01-26 05:14:39'),
(129, 'Software and Internet Other', 16, 'Software and Internet Other', '2018-01-26 05:15:05', '2018-01-26 05:15:05'),
(130, 'Cable and Television Providers', 17, 'Cable and Television Providers', '2018-01-26 05:16:17', '2018-01-26 05:16:17'),
(131, 'Telecommunications Equipment and Accessories', 17, 'Telecommunications Equipment and Accessories', '2018-01-26 05:16:40', '2018-01-26 05:16:40'),
(132, 'Telephone Service Providers and Carriers', 17, 'Telephone Service Providers and Carriers', '2018-01-26 05:17:21', '2018-01-26 05:17:21'),
(133, 'Video and Teleconferencing', 17, 'Video and Teleconferencing', '2018-01-26 05:18:16', '2018-01-26 05:18:16'),
(134, 'Wireless and Mobile', 17, 'Wireless and Mobile', '2018-01-26 05:18:44', '2018-01-26 05:18:44'),
(135, 'Telecommunications Other', 17, 'Telecommunications Other', '2018-01-26 05:19:18', '2018-01-26 05:19:18'),
(136, 'Air Couriers and Cargo Services', 18, 'Air Couriers and Cargo Services', '2018-01-26 05:20:34', '2018-01-26 05:20:34'),
(137, 'Airport, Harbor, and Terminal Operations', 18, 'Airport, Harbor, and Terminal Operations', '2018-01-26 05:21:27', '2018-01-26 05:21:27'),
(138, 'Freight Hauling (Rail and Truck)', 18, 'Freight Hauling (Rail and Truck)', '2018-01-26 05:22:24', '2018-01-26 05:22:24'),
(139, 'Marine and Inland Shipping', 18, 'Marine and Inland Shipping', '2018-01-26 05:23:04', '2018-01-26 05:23:04'),
(140, 'Moving Companies and Services', 18, 'Moving Companies and Services', '2018-01-26 05:23:48', '2018-01-26 05:23:48'),
(141, 'Postal, Express Delivery and Couriers', 18, 'Postal, Express Delivery and Couriers', '2018-01-26 05:24:54', '2018-01-26 05:24:54'),
(142, 'Postal, Express Delivery and Couriers', 18, 'Postal, Express Delivery and Couriers', '2018-01-26 05:25:45', '2018-01-26 05:25:45'),
(143, 'Warehousing and Storage', 18, 'Warehousing and Storage', '2018-01-26 05:26:37', '2018-01-26 05:26:37'),
(144, 'Transportation and Storage Other', 18, 'Transportation and Storage Other', '2018-01-26 05:28:21', '2018-01-26 05:28:21'),
(145, 'Amusement Parks and Attractions', 19, 'Amusement Parks and Attractions', '2018-01-26 05:29:09', '2018-01-26 05:29:09'),
(146, 'Cruise Ship Operations', 19, 'Cruise Ship Operations', '2018-01-26 05:30:10', '2018-01-26 05:30:10'),
(147, 'Gambling and Gaming Lodging', 19, 'Gambling and Gaming Lodging', '2018-01-26 05:30:54', '2018-01-26 05:34:29'),
(148, 'Participatory Sports and Recreation', 19, 'Participatory Sports and Recreation', '2018-01-26 05:33:10', '2018-01-26 05:33:10'),
(149, 'Passenger Airlines', 19, 'Passenger Airlines', '2018-01-26 05:35:23', '2018-01-26 05:35:23'),
(150, 'Rental Cars', 19, 'Rental Cars', '2018-01-26 05:36:14', '2018-01-26 05:36:14'),
(151, 'Resorts and Casinos', 19, 'Resorts and Casinos', '2018-01-26 05:36:58', '2018-01-26 05:36:58'),
(152, 'Spectator Sports and Teams', 19, 'Spectator Sports and Teams', '2018-01-26 05:37:40', '2018-01-26 05:37:40'),
(153, 'Taxi, Buses and Transit Systems', 19, 'Taxi, Buses and Transit Systems', '2018-01-26 05:38:06', '2018-01-26 05:38:06'),
(154, 'Travel Agents and Services', 19, 'Travel Agents and Services', '2018-01-26 05:38:27', '2018-01-26 05:38:27'),
(155, 'Travel, Recreations and Leisure Other', 19, 'Travel, Recreations and Leisure Other', '2018-01-26 05:38:53', '2018-01-26 05:38:53'),
(156, 'Apparel Wholesalers', 20, 'Apparel Wholesalers', '2018-01-26 08:14:03', '2018-01-26 08:14:03'),
(157, 'Automobile Parts Wholesalers', 20, 'Automobile Parts Wholesalers', '2018-01-26 08:14:31', '2018-01-26 08:14:31'),
(158, 'Beer, Wine and Liquor Wholesalers', 20, 'Beer, Wine and Liquor Wholesalers', '2018-01-26 08:14:55', '2018-01-26 08:14:55'),
(159, 'Chemicals and Plastics Wholesalers', 20, 'Chemicals and Plastics Wholesalers', '2018-01-26 08:15:20', '2018-01-26 08:15:20'),
(160, 'Grocery and Food Wholesalers', 20, 'Grocery and Food Wholesalers', '2018-01-26 08:15:58', '2018-01-26 08:15:58'),
(161, 'Lumber and Construction Materials Wholesalers', 20, 'Lumber and Construction Materials Wholesalers', '2018-01-26 08:16:25', '2018-01-26 08:16:25'),
(162, 'Metal and Mineral Wholesalers', 20, 'Metal and Mineral Wholesalers', '2018-01-26 08:16:47', '2018-01-26 08:16:47'),
(163, 'Office Equipment and Suppliers Wholesalers', 20, 'Office Equipment and Suppliers Wholesalers', '2018-01-26 08:17:06', '2018-01-26 08:17:06'),
(164, 'Office Equipment and Suppliers Wholesalers', 20, 'Office Equipment and Suppliers Wholesalers', '2018-01-26 08:17:06', '2018-01-26 08:17:06'),
(165, 'Petroleum Products Wholesalers', 20, 'Petroleum Products Wholesalers', '2018-01-26 08:17:29', '2018-01-26 08:17:29'),
(166, 'Wholesale and Distribution Other', 20, 'Wholesale and Distribution Other', '2018-01-26 08:17:55', '2018-01-26 08:17:55');

*/
      DB::table('contents')->delete();

     	$contents = [


     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'pharmaceuticals','content_category_id'=>'1','description'=>NULL],
     	
     	['name'=>'Biotechnology','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Diagnostic Laboratories','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Doctors and Health Care Practitioners','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Medical Supplies and Equipment','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Medical Devices','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Outpatient Care Centers','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Personal Health Care Products','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Residential and Long-term Care Facilities','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Veterinary Clinics and Services','content_category_id'=>'1','description'=>NULL],

     	['name'=>'Health, Pharmaceuticals, and Biotech Other','content_category_id'=>'1','description'=>NULL],

     	/*['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],

     	['name'=>'hospital','content_category_id'=>'1','description'=>NULL],*/
     	
     ];

     DB::table('contents')->insert($contents);
    
    }
}
