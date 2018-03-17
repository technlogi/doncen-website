<?php

use Illuminate\Database\Seeder;
use \App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();
          //Clt+G  4139 
            $states =  array(
               array(1, 'Andaman and Nicobar Islands', 101, 1),array
                    (2, 'Andhra Pradesh', 101, 1),array
                    (3, 'Arunachal Pradesh', 101, 1),array
                    (4, 'Assam', 101, 1),array
                    (5, 'Bihar', 101, 1),array
                    (6, 'Chandigarh', 101, 1),array
                    (7, 'Chhattisgarh', 101, 1),array
                    (8, 'Dadra and Nagar Haveli', 101, 1),array
                    (9, 'Daman and Diu', 101, 1),array
                    (10, 'Delhi', 101, 1),array
                    (11, 'Goa', 101, 1),array
                    (12, 'Gujarat', 101, 1),array
                    (13, 'Haryana', 101, 1),array
                    (14, 'Himachal Pradesh', 101, 1),array
                    (15, 'Jammu and Kashmir', 101, 1),array
                    (16, 'Jharkhand', 101, 1),array
                    (17, 'Karnataka', 101, 1),array
                    (18, 'Kenmore', 101, 1),array
                    (19, 'Kerala', 101, 1),array
                    (20, 'Lakshadweep', 101, 1),array
                    (21, 'Madhya Pradesh', 101, 1),array
                    (22, 'Maharashtra', 101, 1),array
                    (23, 'Manipur', 101, 1),array
                    (24, 'Meghalaya', 101, 1),array
                    (25, 'Mizoram', 101, 1),array
                    (26, 'Nagaland', 101, 1),array
                    (27, 'Narora', 101, 1),array
                    (28, 'Natwar', 101, 1),array
                    (29, 'Odisha', 101, 1),array
                    (30, 'Paschim Medinipur', 101, 1),array
                    (31, 'Pondicherry', 101, 1),array
                    (32, 'Punjab', 101, 1),array
                    (33, 'Rajasthan', 101, 1),array
                    (34, 'Sikkim', 101, 1),array
                    (35, 'Tamil Nadu', 101, 1),array
                    (36, 'Telangana', 101, 1),array
                    (37, 'Tripura', 101, 1),array
                    (38, 'Uttar Pradesh', 101, 1),array
                    (39, 'Uttarakhand', 101, 1),array
                    (40, 'Vaishali', 101, 1),array
                    (41, 'West Bengal', 101, 1),array
                    (42, 'Badakhshan', 1, 1),array
                    (43, 'Badgis', 1, 1),array
                    (44, 'Baglan', 1, 1),array
                    (45, 'Balkh', 1, 1),array
                    (46, 'Bamiyan', 1, 1),array
                    (47, 'Farah', 1, 1),array
                    (48, 'Faryab', 1, 1),array
                    (49, 'Gawr', 1, 1),array
                    (50, 'Gazni', 1, 1),array
                    (51, 'Herat', 1, 1),array
                    (52, 'Hilmand', 1, 1),array
                    (53, 'Jawzjan', 1, 1),array
                    (54, 'Kabul', 1, 1),array
                    (55, 'Kapisa', 1, 1),array
                    (56, 'Khawst', 1, 1),array
                    (57, 'Kunar', 1, 1),array
                    (58, 'Lagman', 1, 1),array
                    (59, 'Lawghar', 1, 1),array
                    (60, 'Nangarhar', 1, 1),array
                    (61, 'Nimruz', 1, 1),array
                    (62, 'Nuristan', 1, 1),array
                    (63, 'Paktika', 1, 1),array
                    (64, 'Paktiya', 1, 1),array
                    (65, 'Parwan', 1, 1),array
                    (66, 'Qandahar', 1, 1),array
                    (67, 'Qunduz', 1, 1),array
                    (68, 'Samangan', 1, 1),array
                    (69, 'Sar-e Pul', 1, 1),array
                    (70, 'Takhar', 1, 1),array
                    (71, 'Uruzgan', 1, 1),array
                    (72, 'Wardag', 1, 1),array
                    (73, 'Zabul', 1, 1),array
                    (74, 'Berat', 2, 1),array
                    (75, 'Bulqize', 2, 1),array
                    (76, 'Delvine', 2, 1),array
                    (77, 'Devoll', 2, 1),array
                    (78, 'Dibre', 2, 1),array
                    (79, 'Durres', 2, 1),array
                    (80, 'Elbasan', 2, 1),array
                    (81, 'Fier', 2, 1),array
                    (82, 'Gjirokaster', 2, 1),array
                    (83, 'Gramsh', 2, 1),array
                    (84, 'Has', 2, 1),array
                    (85, 'Kavaje', 2, 1),array
                    (86, 'Kolonje', 2, 1),array
                    (87, 'Korce', 2, 1),array
                    (88, 'Kruje', 2, 1),array
                    (89, 'Kucove', 2, 1),array
                    (90, 'Kukes', 2, 1),array
                    (91, 'Kurbin', 2, 1),array
                    (92, 'Lezhe', 2, 1),array
                    (93, 'Librazhd', 2, 1),array
                    (94, 'Lushnje', 2, 1),array
                    (95, 'Mallakaster', 2, 1),array
                    (96, 'Malsi e Madhe', 2, 1),array
                    (97, 'Mat', 2, 1),array
                    (98, 'Mirdite', 2, 1),array
                    (99, 'Peqin', 2, 1),array
                    (100, 'Permet', 2, 1),array
                    (101, 'Pogradec', 2, 1),array
                    (102, 'Puke', 2, 1),array
                    (103, 'Sarande', 2, 1),array
                    (104, 'Shkoder', 2, 1),array
                    (105, 'Skrapar', 2, 1),array
                    (106, 'Tepelene', 2, 1),array
                    (107, 'Tirane', 2, 1),array
                    (108, 'Tropoje', 2, 1),array
                    (109, 'Vlore', 2, 1),array
                    (110, 'Ayn Daflah', 3, 1),array
                    (111, 'Ayn Tamushanat', 3, 1),array
                    (112, 'Adrar', 3, 1),array
                    (113, 'Algiers', 3, 1),array
                    (114, 'Annabah', 3, 1),array
                    (115, 'Bashshar', 3, 1),array
                    (116, 'Batnah', 3, 1),array
                    (117, 'Bijayah', 3, 1),array
                    (118, 'Biskrah', 3, 1),array
                    (119, 'Blidah', 3, 1),array
                    (120, 'Buirah', 3, 1),array
                    (121, 'Bumardas', 3, 1),array
                    (122, 'Burj Bu Arririj', 3, 1),array
                    (123, 'Ghalizan', 3, 1),array
                    (124, 'Ghardayah', 3, 1),array
                    (125, 'Ilizi', 3, 1),array
                    (126, 'Jijili', 3, 1),array
                    (127, 'Jilfah', 3, 1),array
                    (128, 'Khanshalah', 3, 1),array
                    (129, 'Masilah', 3, 1),array
                    (130, 'Midyah', 3, 1),array
                    (131, 'Milah', 3, 1),array
                    (132, 'Muaskar', 3, 1),array
                    (133, 'Mustaghanam', 3, 1),array
                    (134, 'Naama', 3, 1),array
                    (135, 'Oran', 3, 1),array
                    (136, 'Ouargla', 3, 1),array
                    (137, 'Qalmah', 3, 1),array
                    (138, 'Qustantinah', 3, 1),array
                    (139, 'Sakikdah', 3, 1),array
                    (140, 'Satif', 3, 1),array
                    (141, 'Sayda', 3, 1),array
                    (142, 'Sidi ban-al-Abbas', 3, 1),array
                    (143, 'Suq Ahras', 3, 1),array
                    (144, 'Tamanghasat', 3, 1),array
                    (145, 'Tibazah', 3, 1),array
                    (146, 'Tibissah', 3, 1),array
                    (147, 'Tilimsan', 3, 1),array
                    (148, 'Tinduf', 3, 1),array
                    (149, 'Tisamsilt', 3, 1),array
                    (150, 'Tiyarat', 3, 1),array
                    (151, 'Tizi Wazu', 3, 1),array
                    (152, 'Umm-al-Bawaghi', 3, 1),array
                    (153, 'Wahran', 3, 1),array
                    (154, 'Warqla', 3, 1),array
                    (155, 'Wilaya d Alger', 3, 1),array
                    (156, 'Wilaya de Bejaia', 3, 1),array
                    (157, 'Wilaya de Constantine', 3, 1),array
                    (158, 'al-Aghwat', 3, 1),array
                    (159, 'al-Bayadh', 3, 1),array
                    (160, 'al-Jaza ir', 3, 1),array
                    (161, 'al-Wad', 3, 1),array
                    (162, 'ash-Shalif', 3, 1),array
                    (163, 'at-Tarif', 3, 1),array
                    (164, 'Eastern', 4, 1),array
                    (165, 'Manua', 4, 1),array
                    (166, 'Swains Island', 4, 1),array
                    (167, 'Western', 4, 1),array
                    (168, 'Andorra la Vella', 5, 1),array
                    (169, 'Canillo', 5, 1),array
                    (170, 'Encamp', 5, 1),array
                    (171, 'La Massana', 5, 1),array
                    (172, 'Les Escaldes', 5, 1),array
                    (173, 'Ordino', 5, 1),array
                    (174, 'Sant Julia de Loria', 5, 1),array
                    (175, 'Bengo', 6, 1),array
                    (176, 'Benguela', 6, 1),array
                    (177, 'Bie', 6, 1),array
                    (178, 'Cabinda', 6, 1),array
                    (179, 'Cunene', 6, 1),array
                    (180, 'Huambo', 6, 1),array
                    (181, 'Huila', 6, 1),array
                    (182, 'Kuando-Kubango', 6, 1),array
                    (183, 'Kwanza Norte', 6, 1),array
                    (184, 'Kwanza Sul', 6, 1),array
                    (185, 'Luanda', 6, 1),array
                    (186, 'Lunda Norte', 6, 1),array
                    (187, 'Lunda Sul', 6, 1),array
                    (188, 'Malanje', 6, 1),array
                    (189, 'Moxico', 6, 1),array
                    (190, 'Namibe', 6, 1),array
                    (191, 'Uige', 6, 1),array
                    (192, 'Zaire', 6, 1),array
                    (193, 'Other Provinces', 7, 1),array
                    (194, 'Sector claimed by Argentina/Ch', 8, 1),array
                    (195, 'Sector claimed by Argentina/UK', 8, 1),array
                    (196, 'Sector claimed by Australia', 8, 1),array
                    (197, 'Sector claimed by France', 8, 1),array
                    (198, 'Sector claimed by New Zealand', 8, 1),array
                    (199, 'Sector claimed by Norway', 8, 1),array
                    (200, 'Unclaimed Sector', 8, 1),array
                    (201, 'Barbuda', 9, 1),array
                    (202, 'Saint George', 9, 1),array
                    (203, 'Saint John', 9, 1),array
                    (204, 'Saint Mary', 9, 1),array
                    (205, 'Saint Paul', 9, 1),array
                    (206, 'Saint Peter', 9, 1),array
                    (207, 'Saint Philip', 9, 1),array
                    (208, 'Buenos Aires', 10, 1),array
                    (209, 'Catamarca', 10, 1),array
                    (210, 'Chaco', 10, 1),array
                    (211, 'Chubut', 10, 1),array
                    (212, 'Cordoba', 10, 1),array
                    (213, 'Corrientes', 10, 1),array
                    (214, 'Distrito Federal', 10, 1),array
                    (215, 'Entre Rios', 10, 1),array
                    (216, 'Formosa', 10, 1),array
                    (217, 'Jujuy', 10, 1),array
                    (218, 'La Pampa', 10, 1),array
                    (219, 'La Rioja', 10, 1),array
                    (220, 'Mendoza', 10, 1),array
                    (221, 'Misiones', 10, 1),array
                    (222, 'Neuquen', 10, 1),array
                    (223, 'Rio Negro', 10, 1),array
                    (224, 'Salta', 10, 1),array
                    (225, 'San Juan', 10, 1),array
                    (226, 'San Luis', 10, 1),array
                    (227, 'Santa Cruz', 10, 1),array
                    (228, 'Santa Fe', 10, 1),array
                    (229, 'Santiago del Estero', 10, 1),array
                    (230, 'Tierra del Fuego', 10, 1),array
                    (231, 'Tucuman', 10, 1),array
                    (232, 'Aragatsotn', 11, 1),array
                    (233, 'Ararat', 11, 1),array
                    (234, 'Armavir', 11, 1),array
                    (235, 'Gegharkunik', 11, 1),array
                    (236, 'Kotaik', 11, 1),array
                    (237, 'Lori', 11, 1),array
                    (238, 'Shirak', 11, 1),array
                    (239, 'Stepanakert', 11, 1),array
                    (240, 'Syunik', 11, 1),array
                    (241, 'Tavush', 11, 1),array
                    (242, 'Vayots Dzor', 11, 1),array
                    (243, 'Yerevan', 11, 1),array
                    (244, 'Aruba', 12, 1),array
                    (245, 'Auckland', 13, 1),array
                    (246, 'Australian Capital Territory', 13, 1),array
                    (247, 'Balgowlah', 13, 1),array
                    (248, 'Balmain', 13, 1),array
                    (249, 'Bankstown', 13, 1),array
                    (250, 'Baulkham Hills', 13, 1),array
                    (251, 'Bonnet Bay', 13, 1),array
                    (252, 'Camberwell', 13, 1),array
                    (253, 'Carole Park', 13, 1),array
                    (254, 'Castle Hill', 13, 1),array
                    (255, 'Caulfield', 13, 1),array
                    (256, 'Chatswood', 13, 1),array
                    (257, 'Cheltenham', 13, 1),array
                    (258, 'Cherrybrook', 13, 1),array
                    (259, 'Clayton', 13, 1),array
                    (260, 'Collingwood', 13, 1),array
                    (261, 'Frenchs Forest', 13, 1),array
                    (262, 'Hawthorn', 13, 1),array
                    (263, 'Jannnali', 13, 1),array
                    (264, 'Knoxfield', 13, 1),array
                    (265, 'Melbourne', 13, 1),array
                    (266, 'New South Wales', 13, 1),array
                    (267, 'Northern Territory', 13, 1),array
                    (268, 'Perth', 13, 1),array
                    (269, 'Queensland', 13, 1),array
                    (270, 'South Australia', 13, 1),array
                    (271, 'Tasmania', 13, 1),array
                    (272, 'Templestowe', 13, 1),array
                    (273, 'Victoria', 13, 1),array
                    (274, 'Werribee south', 13, 1),array
                    (275, 'Western Australia', 13, 1),array
                    (276, 'Wheeler', 13, 1),array
                    (277, 'Bundesland Salzburg', 14, 1),array
                    (278, 'Bundesland Steiermark', 14, 1),array
                    (279, 'Bundesland Tirol', 14, 1),array
                    (280, 'Burgenland', 14, 1),array
                    (281, 'Carinthia', 14, 1),array
                    (282, 'Karnten', 14, 1),array
                    (283, 'Liezen', 14, 1),array
                    (284, 'Lower Austria', 14, 1),array
                    (285, 'Niederosterreich', 14, 1),array
                    (286, 'Oberosterreich', 14, 1),array
                    (287, 'Salzburg', 14, 1),array
                    (288, 'Schleswig-Holstein', 14, 1),array
                    (289, 'Steiermark', 14, 1),array
                    (290, 'Styria', 14, 1),array
                    (291, 'Tirol', 14, 1),array
                    (292, 'Upper Austria', 14, 1),array
                    (293, 'Vorarlberg', 14, 1),array
                    (294, 'Wien', 14, 1),array
                    (295, 'Abseron', 15, 1),array
                    (296, 'Baki Sahari', 15, 1),array
                    (297, 'Ganca', 15, 1),array
                    (298, 'Ganja', 15, 1),array
                    (299, 'Kalbacar', 15, 1),array
                    (300, 'Lankaran', 15, 1),array
                    (301, 'Mil-Qarabax', 15, 1),array
                    (302, 'Mugan-Salyan', 15, 1),array
                    (303, 'Nagorni-Qarabax', 15, 1),array
                    (304, 'Naxcivan', 15, 1),array
                    (305, 'Priaraks', 15, 1),array
                    (306, 'Qazax', 15, 1),array
                    (307, 'Saki', 15, 1),array
                    (308, 'Sirvan', 15, 1),array
                    (309, 'Xacmaz', 15, 1),array
                    (310, 'Abaco', 16, 1),array
                    (311, 'Acklins Island', 16, 1),array
                    (312, 'Andros', 16, 1),array
                    (313, 'Berry Islands', 16, 1),array
                    (314, 'Biminis', 16, 1),array
                    (315, 'Cat Island', 16, 1),array
                    (316, 'Crooked Island', 16, 1),array
                    (317, 'Eleuthera', 16, 1),array
                    (318, 'Exuma and Cays', 16, 1),array
                    (319, 'Grand Bahama', 16, 1),array
                    (320, 'Inagua Islands', 16, 1),array
                    (321, 'Long Island', 16, 1),array
                    (322, 'Mayaguana', 16, 1),array
                    (323, 'New Providence', 16, 1),array
                    (324, 'Ragged Island', 16, 1),array
                    (325, 'Rum Cay', 16, 1),array
                    (326, 'San Salvador', 16, 1),array
                    (327, 'Isa', 17, 1),array
                    (328, 'Badiyah', 17, 1),array
                    (329, 'Hidd', 17, 1),array
                    (330, 'Jidd Hafs', 17, 1),array
                    (331, 'Mahama', 17, 1),array
                    (332, 'Manama', 17, 1),array
                    (333, 'Sitrah', 17, 1),array
                    (334, 'al-Manamah', 17, 1),array
                    (335, 'al-Muharraq', 17, 1),array
                    (336, 'ar-Rifaa', 17, 1),array
                    (337, 'Bagar Hat', 18, 1),array
                    (338, 'Bandarban', 18, 1),array
                    (339, 'Barguna', 18, 1),array
                    (340, 'Barisal', 18, 1),array
                    (341, 'Bhola', 18, 1),array
                    (342, 'Bogora', 18, 1),array
                    (343, 'Brahman Bariya', 18, 1),array
                    (344, 'Chandpur', 18, 1),array
                    (345, 'Chattagam', 18, 1),array
                    (346, 'Chittagong Division', 18, 1),array
                    (347, 'Chuadanga', 18, 1),array
                    (348, 'Dhaka', 18, 1),array
                    (349, 'Dinajpur', 18, 1),array
                    (350, 'Faridpur', 18, 1),array
                    (351, 'Feni', 18, 1),array
                    (352, 'Gaybanda', 18, 1),array
                    (353, 'Gazipur', 18, 1),array
                    (354, 'Gopalganj', 18, 1),array
                    (355, 'Habiganj', 18, 1),array
                    (356, 'Jaipur Hat', 18, 1),array
                    (357, 'Jamalpur', 18, 1),array
                    (358, 'Jessor', 18, 1),array
                    (359, 'Jhalakati', 18, 1),array
                    (360, 'Jhanaydah', 18, 1),array
                    (361, 'Khagrachhari', 18, 1),array
                    (362, 'Khulna', 18, 1),array
                    (363, 'Kishorganj', 18, 1),array
                    (364, 'Koks Bazar', 18, 1),array
                    (365, 'Komilla', 18, 1),array
                    (366, 'Kurigram', 18, 1),array
                    (367, 'Kushtiya', 18, 1),array
                    (368, 'Lakshmipur', 18, 1),array
                    (369, 'Lalmanir Hat', 18, 1),array
                    (370, 'Madaripur', 18, 1),array
                    (371, 'Magura', 18, 1),array
                    (372, 'Maimansingh', 18, 1),array
                    (373, 'Manikganj', 18, 1),array
                    (374, 'Maulvi Bazar', 18, 1),array
                    (375, 'Meherpur', 18, 1),array
                    (376, 'Munshiganj', 18, 1),array
                    (377, 'Naral', 18, 1),array
                    (378, 'Narayanganj', 18, 1),array
                    (379, 'Narsingdi', 18, 1),array
                    (380, 'Nator', 18, 1),array
                    (381, 'Naugaon', 18, 1),array
                    (382, 'Nawabganj', 18, 1),array
                    (383, 'Netrakona', 18, 1),array
                    (384, 'Nilphamari', 18, 1),array
                    (385, 'Noakhali', 18, 1),array
                    (386, 'Pabna', 18, 1),array
                    (387, 'Panchagarh', 18, 1),array
                    (388, 'Patuakhali', 18, 1),array
                    (389, 'Pirojpur', 18, 1),array
                    (390, 'Rajbari', 18, 1),array
                    (391, 'Rajshahi', 18, 1),array
                    (392, 'Rangamati', 18, 1),array
                    (393, 'Rangpur', 18, 1),array
                    (394, 'Satkhira', 18, 1),array
                    (395, 'Shariatpur', 18, 1),array
                    (396, 'Sherpur', 18, 1),array
                    (397, 'Silhat', 18, 1),array
                    (398, 'Sirajganj', 18, 1),array
                    (399, 'Sunamganj', 18, 1),array
                    (400, 'Tangayal', 18, 1),array
                    (401, 'Thakurgaon', 18, 1),array
                    (402, 'Christ Church', 19, 1),array
                    (403, 'Saint Andrew', 19, 1),array
                    (404, 'Saint George', 19, 1),array
                    (405, 'Saint James', 19, 1),array
                    (406, 'Saint John', 19, 1),array
                    (407, 'Saint Joseph', 19, 1),array
                    (408, 'Saint Lucy', 19, 1),array
                    (409, 'Saint Michael', 19, 1),array
                    (410, 'Saint Peter', 19, 1),array
                    (411, 'Saint Philip', 19, 1),array
                    (412, 'Saint Thomas', 19, 1),array
                    (413, 'Brest', 20, 1),array
                    (414, 'Homjel', 20, 1),array
                    (415, 'Hrodna', 20, 1),array
                    (416, 'Mahiljow', 20, 1),array
                    (417, 'Mahilyowskaya Voblasts', 20, 1),array
                    (418, 'Minsk', 20, 1),array
                    (419, 'Minskaja Voblasts', 20, 1),array
                    (420, 'Petrik', 20, 1),array
                    (421, 'Vicebsk', 20, 1),array
                    (422, 'Antwerpen', 21, 1),array
                    (423, 'Berchem', 21, 1),array
                    (424, 'Brabant', 21, 1),array
                    (425, 'Brabant Wallon', 21, 1),array
                    (426, 'Brussel', 21, 1),array
                    (427, 'East Flanders', 21, 1),array
                    (428, 'Hainaut', 21, 1),array
                    (429, 'Liege', 21, 1),array
                    (430, 'Limburg', 21, 1),array
                    (431, 'Luxembourg', 21, 1),array
                    (432, 'Namur', 21, 1),array
                    (433, 'Ontario', 21, 1),array
                    (434, 'Oost-Vlaanderen', 21, 1),array
                    (435, 'Provincie Brabant', 21, 1),array
                    (436, 'Vlaams-Brabant', 21, 1),array
                    (437, 'Wallonne', 21, 1),array
                    (438, 'West-Vlaanderen', 21, 1),array
                    (439, 'Belize', 22, 1),array
                    (440, 'Cayo', 22, 1),array
                    (441, 'Corozal', 22, 1),array
                    (442, 'Orange Walk', 22, 1),array
                    (443, 'Stann Creek', 22, 1),array
                    (444, 'Toledo', 22, 1),array
                    (445, 'Alibori', 23, 1),array
                    (446, 'Atacora', 23, 1),array
                    (447, 'Atlantique', 23, 1),array
                    (448, 'Borgou', 23, 1),array
                    (449, 'Collines', 23, 1),array
                    (450, 'Couffo', 23, 1),array
                    (451, 'Donga', 23, 1),array
                    (452, 'Littoral', 23, 1),array
                    (453, 'Mono', 23, 1),array
                    (454, 'Oueme', 23, 1),array
                    (455, 'Plateau', 23, 1),array
                    (456, 'Zou', 23, 1),array
                    (457, 'Hamilton', 24, 1),array
                    (458, 'Saint George', 24, 1),array
                    (459, 'Bumthang', 25, 1),array
                    (460, 'Chhukha', 25, 1),array
                    (461, 'Chirang', 25, 1),array
                    (462, 'Daga', 25, 1),array
                    (463, 'Geylegphug', 25, 1),array
                    (464, 'Ha', 25, 1),array
                    (465, 'Lhuntshi', 25, 1),array
                    (466, 'Mongar', 25, 1),array
                    (467, 'Pemagatsel', 25, 1),array
                    (468, 'Punakha', 25, 1),array
                    (469, 'Rinpung', 25, 1),array
                    (470, 'Samchi', 25, 1),array
                    (471, 'Samdrup Jongkhar', 25, 1),array
                    (472, 'Shemgang', 25, 1),array
                    (473, 'Tashigang', 25, 1),array
                    (474, 'Timphu', 25, 1),array
                    (475, 'Tongsa', 25, 1),array
                    (476, 'Wangdiphodrang', 25, 1),array
                    (477, 'Beni', 26, 1),array
                    (478, 'Chuquisaca', 26, 1),array
                    (479, 'Cochabamba', 26, 1),array
                    (480, 'La Paz', 26, 1),array
                    (481, 'Oruro', 26, 1),array
                    (482, 'Pando', 26, 1),array
                    (483, 'Potosi', 26, 1),array
                    (484, 'Santa Cruz', 26, 1),array
                    (485, 'Tarija', 26, 1),array
                    (486, 'Federacija Bosna i Hercegovina', 27, 1),array
                    (487, 'Republika Srpska', 27, 1),array
                    (488, 'Central Bobonong', 28, 1),array
                    (489, 'Central Boteti', 28, 1),array
                    (490, 'Central Mahalapye', 28, 1),array
                    (491, 'Central Serowe-Palapye', 28, 1),array
                    (492, 'Central Tutume', 28, 1),array
                    (493, 'Chobe', 28, 1),array
                    (494, 'Francistown', 28, 1),array
                    (495, 'Gaborone', 28, 1),array
                    (496, 'Ghanzi', 28, 1),array
                    (497, 'Jwaneng', 28, 1),array
                    (498, 'Kgalagadi North', 28, 1),array
                    (499, 'Kgalagadi South', 28, 1),array
                    (500, 'Kgatleng', 28, 1),array
                    (501, 'Kweneng', 28, 1),array
                    (502, 'Lobatse', 28, 1),array
                    (503, 'Ngamiland', 28, 1),array
                    (504, 'Ngwaketse', 28, 1),array
                    (505, 'North East', 28, 1),array
                    (506, 'Okavango', 28, 1),array
                    (507, 'Orapa', 28, 1),array
                    (508, 'Selibe Phikwe', 28, 1),array
                    (509, 'South East', 28, 1),array
                    (510, 'Sowa', 28, 1),array
                    (511, 'Bouvet Island', 29, 1),array
                    (512, 'Acre', 30, 1),array
                    (513, 'Alagoas', 30, 1),array
                    (514, 'Amapa', 30, 1),array
                    (515, 'Amazonas', 30, 1),array
                    (516, 'Bahia', 30, 1),array
                    (517, 'Ceara', 30, 1),array
                    (518, 'Distrito Federal', 30, 1),array
                    (519, 'Espirito Santo', 30, 1),array
                    (520, 'Estado de Sao Paulo', 30, 1),array
                    (521, 'Goias', 30, 1),array
                    (522, 'Maranhao', 30, 1),array
                    (523, 'Mato Grosso', 30, 1),array
                    (524, 'Mato Grosso do Sul', 30, 1),array
                    (525, 'Minas Gerais', 30, 1),array
                    (526, 'Para', 30, 1),array
                    (527, 'Paraiba', 30, 1),array
                    (528, 'Parana', 30, 1),array
                    (529, 'Pernambuco', 30, 1),array
                    (530, 'Piaui', 30, 1),array
                    (531, 'Rio Grande do Norte', 30, 1),array
                    (532, 'Rio Grande do Sul', 30, 1),array
                    (533, 'Rio de Janeiro', 30, 1),array
                    (534, 'Rondonia', 30, 1),array
                    (535, 'Roraima', 30, 1),array
                    (536, 'Santa Catarina', 30, 1),array
                    (537, 'Sao Paulo', 30, 1),array
                    (538, 'Sergipe', 30, 1),array
                    (539, 'Tocantins', 30, 1),array
                    (540, 'British Indian Ocean Territory', 31, 1),array
                    (541, 'Belait', 32, 1),array
                    (542, 'Brunei-Muara', 32, 1),array
                    (543, 'Temburong', 32, 1),array
                    (544, 'Tutong', 32, 1),array
                    (545, 'Blagoevgrad', 33, 1),array
                    (546, 'Burgas', 33, 1),array
                    (547, 'Dobrich', 33, 1),array
                    (548, 'Gabrovo', 33, 1),array
                    (549, 'Haskovo', 33, 1),array
                    (550, 'Jambol', 33, 1),array
                    (551, 'Kardzhali', 33, 1),array
                    (552, 'Kjustendil', 33, 1),array
                    (553, 'Lovech', 33, 1),array
                    (554, 'Montana', 33, 1),array
                    (555, 'Oblast Sofiya-Grad', 33, 1),array
                    (556, 'Pazardzhik', 33, 1),array
                    (557, 'Pernik', 33, 1),array
                    (558, 'Pleven', 33, 1),array
                    (559, 'Plovdiv', 33, 1),array
                    (560, 'Razgrad', 33, 1),array
                    (561, 'Ruse', 33, 1),array
                    (562, 'Shumen', 33, 1),array
                    (563, 'Silistra', 33, 1),array
                    (564, 'Sliven', 33, 1),array
                    (565, 'Smoljan', 33, 1),array
                    (566, 'Sofija grad', 33, 1),array
                    (567, 'Sofijska oblast', 33, 1),array
                    (568, 'Stara Zagora', 33, 1),array
                    (569, 'Targovishte', 33, 1),array
                    (570, 'Varna', 33, 1),array
                    (571, 'Veliko Tarnovo', 33, 1),array
                    (572, 'Vidin', 33, 1),array
                    (573, 'Vraca', 33, 1),array
                    (574, 'Yablaniza', 33, 1),array
                    (575, 'Bale', 34, 1),array
                    (576, 'Bam', 34, 1),array
                    (577, 'Bazega', 34, 1),array
                    (578, 'Bougouriba', 34, 1),array
                    (579, 'Boulgou', 34, 1),array
                    (580, 'Boulkiemde', 34, 1),array
                    (581, 'Comoe', 34, 1),array
                    (582, 'Ganzourgou', 34, 1),array
                    (583, 'Gnagna', 34, 1),array
                    (584, 'Gourma', 34, 1),array
                    (585, 'Houet', 34, 1),array
                    (586, 'Ioba', 34, 1),array
                    (587, 'Kadiogo', 34, 1),array
                    (588, 'Kenedougou', 34, 1),array
                    (589, 'Komandjari', 34, 1),array
                    (590, 'Kompienga', 34, 1),array
                    (591, 'Kossi', 34, 1),array
                    (592, 'Kouritenga', 34, 1),array
                    (593, 'Kourweogo', 34, 1),array
                    (594, 'Leraba', 34, 1),array
                    (595, 'Mouhoun', 34, 1),array
                    (596, 'Nahouri', 34, 1),array
                    (597, 'Namentenga', 34, 1),array
                    (598, 'Noumbiel', 34, 1),array
                    (599, 'Oubritenga', 34, 1),array
                    (600, 'Oudalan', 34, 1),array
                    (601, 'Passore', 34, 1),array
                    (602, 'Poni', 34, 1),array
                    (603, 'Sanguie', 34, 1),array
                    (604, 'Sanmatenga', 34, 1),array
                    (605, 'Seno', 34, 1),array
                    (606, 'Sissili', 34, 1),array
                    (607, 'Soum', 34, 1),array
                    (608, 'Sourou', 34, 1),array
                    (609, 'Tapoa', 34, 1),array
                    (610, 'Tuy', 34, 1),array
                    (611, 'Yatenga', 34, 1),array
                    (612, 'Zondoma', 34, 1),array
                    (613, 'Zoundweogo', 34, 1),array
                    (614, 'Bubanza', 35, 1),array
                    (615, 'Bujumbura', 35, 1),array
                    (616, 'Bururi', 35, 1),array
                    (617, 'Cankuzo', 35, 1),array
                    (618, 'Cibitoke', 35, 1),array
                    (619, 'Gitega', 35, 1),array
                    (620, 'Karuzi', 35, 1),array
                    (621, 'Kayanza', 35, 1),array
                    (622, 'Kirundo', 35, 1),array
                    (623, 'Makamba', 35, 1),array
                    (624, 'Muramvya', 35, 1),array
                    (625, 'Muyinga', 35, 1),array
                    (626, 'Ngozi', 35, 1),array
                    (627, 'Rutana', 35, 1),array
                    (628, 'Ruyigi', 35, 1),array
                    (629, 'Banteay Mean Chey', 36, 1),array
                    (630, 'Bat Dambang', 36, 1),array
                    (631, 'Kampong Cham', 36, 1),array
                    (632, 'Kampong Chhnang', 36, 1),array
                    (633, 'Kampong Spoeu', 36, 1),array
                    (634, 'Kampong Thum', 36, 1),array
                    (635, 'Kampot', 36, 1),array
                    (636, 'Kandal', 36, 1),array
                    (637, 'Kaoh Kong', 36, 1),array
                    (638, 'Kracheh', 36, 1),array
                    (639, 'Krong Kaeb', 36, 1),array
                    (640, 'Krong Pailin', 36, 1),array
                    (641, 'Krong Preah Sihanouk', 36, 1),array
                    (642, 'Mondol Kiri', 36, 1),array
                    (643, 'Otdar Mean Chey', 36, 1),array
                    (644, 'Phnum Penh', 36, 1),array
                    (645, 'Pousat', 36, 1),array
                    (646, 'Preah Vihear', 36, 1),array
                    (647, 'Prey Veaeng', 36, 1),array
                    (648, 'Rotanak Kiri', 36, 1),array
                    (649, 'Siem Reab', 36, 1),array
                    (650, 'Stueng Traeng', 36, 1),array
                    (651, 'Svay Rieng', 36, 1),array
                    (652, 'Takaev', 36, 1),array
                    (653, 'Adamaoua', 37, 1),array
                    (654, 'Centre', 37, 1),array
                    (655, 'Est', 37, 1),array
                    (656, 'Littoral', 37, 1),array
                    (657, 'Nord', 37, 1),array
                    (658, 'Nord Extreme', 37, 1),array
                    (659, 'Nordouest', 37, 1),array
                    (660, 'Ouest', 37, 1),array
                    (661, 'Sud', 37, 1),array
                    (662, 'Sudouest', 37, 1),array
                    (663, 'Alberta', 38, 1),array
                    (664, 'British Columbia', 38, 1),array
                    (665, 'Manitoba', 38, 1),array
                    (666, 'New Brunswick', 38, 1),array
                    (667, 'Newfoundland and Labrador', 38, 1),array
                    (668, 'Northwest Territories', 38, 1),array
                    (669, 'Nova Scotia', 38, 1),array
                    (670, 'Nunavut', 38, 1),array
                    (671, 'Ontario', 38, 1),array
                    (672, 'Prince Edward Island', 38, 1),array
                    (673, 'Quebec', 38, 1),array
                    (674, 'Saskatchewan', 38, 1),array
                    (675, 'Yukon', 38, 1),array
                    (676, 'Boavista', 39, 1),array
                    (677, 'Brava', 39, 1),array
                    (678, 'Fogo', 39, 1),array
                    (679, 'Maio', 39, 1),array
                    (680, 'Sal', 39, 1),array
                    (681, 'Santo Antao', 39, 1),array
                    (682, 'Sao Nicolau', 39, 1),array
                    (683, 'Sao Tiago', 39, 1),array
                    (684, 'Sao Vicente', 39, 1),array
                    (685, 'Grand Cayman', 40, 1),array
                    (686, 'Bamingui-Bangoran', 41, 1),array
                    (687, 'Bangui', 41, 1),array
                    (688, 'Basse-Kotto', 41, 1),array
                    (689, 'Haut-Mbomou', 41, 1),array
                    (690, 'Haute-Kotto', 41, 1),array
                    (691, 'Kemo', 41, 1),array
                    (692, 'Lobaye', 41, 1),array
                    (693, 'Mambere-Kadei', 41, 1),array
                    (694, 'Mbomou', 41, 1),array
                    (695, 'Nana-Gribizi', 41, 1),array
                    (696, 'Nana-Mambere', 41, 1),array
                    (697, 'Ombella Mpoko', 41, 1),array
                    (698, 'Ouaka', 41, 1),array
                    (699, 'Ouham', 41, 1),array
                    (700, 'Ouham-Pende', 41, 1),array
                    (701, 'Sangha-Mbaere', 41, 1),array
                    (702, 'Vakaga', 41, 1),array
                    (703, 'Batha', 42, 1),array
                    (704, 'Biltine', 42, 1),array
                    (705, 'Bourkou-Ennedi-Tibesti', 42, 1),array
                    (706, 'Chari-Baguirmi', 42, 1),array
                    (707, 'Guera', 42, 1),array
                    (708, 'Kanem', 42, 1),array
                    (709, 'Lac', 42, 1),array
                    (710, 'Logone Occidental', 42, 1),array
                    (711, 'Logone Oriental', 42, 1),array
                    (712, 'Mayo-Kebbi', 42, 1),array
                    (713, 'Moyen-Chari', 42, 1),array
                    (714, 'Ouaddai', 42, 1),array
                    (715, 'Salamat', 42, 1),array
                    (716, 'Tandjile', 42, 1),array
                    (717, 'Aisen', 43, 1),array
                    (718, 'Antofagasta', 43, 1),array
                    (719, 'Araucania', 43, 1),array
                    (720, 'Atacama', 43, 1),array
                    (721, 'Bio Bio', 43, 1),array
                    (722, 'Coquimbo', 43, 1),array
                    (723, 'Libertador General Bernardo O', 43, 1),array
                    (724, 'Los Lagos', 43, 1),array
                    (725, 'Magellanes', 43, 1),array
                    (726, 'Maule', 43, 1),array
                    (727, 'Metropolitana', 43, 1),array
                    (728, 'Metropolitana de Santiago', 43, 1),array
                    (729, 'Tarapaca', 43, 1),array
                    (730, 'Valparaiso', 43, 1),array
                    (731, 'Anhui', 44, 1),array
                    (732, 'Anhui Province', 44, 1),array
                    (733, 'Anhui Sheng', 44, 1),array
                    (734, 'Aomen', 44, 1),array
                    (735, 'Beijing', 44, 1),array
                    (736, 'Beijing Shi', 44, 1),array
                    (737, 'Chongqing', 44, 1),array
                    (738, 'Fujian', 44, 1),array
                    (739, 'Fujian Sheng', 44, 1),array
                    (740, 'Gansu', 44, 1),array
                    (741, 'Guangdong', 44, 1),array
                    (742, 'Guangdong Sheng', 44, 1),array
                    (743, 'Guangxi', 44, 1),array
                    (744, 'Guizhou', 44, 1),array
                    (745, 'Hainan', 44, 1),array
                    (746, 'Hebei', 44, 1),array
                    (747, 'Heilongjiang', 44, 1),array
                    (748, 'Henan', 44, 1),array
                    (749, 'Hubei', 44, 1),array
                    (750, 'Hunan', 44, 1),array
                    (751, 'Jiangsu', 44, 1),array
                    (752, 'Jiangsu Sheng', 44, 1),array
                    (753, 'Jiangxi', 44, 1),array
                    (754, 'Jilin', 44, 1),array
                    (755, 'Liaoning', 44, 1),array
                    (756, 'Liaoning Sheng', 44, 1),array
                    (757, 'Nei Monggol', 44, 1),array
                    (758, 'Ningxia Hui', 44, 1),array
                    (759, 'Qinghai', 44, 1),array
                    (760, 'Shaanxi', 44, 1),array
                    (761, 'Shandong', 44, 1),array
                    (762, 'Shandong Sheng', 44, 1),array
                    (763, 'Shanghai', 44, 1),array
                    (764, 'Shanxi', 44, 1),array
                    (765, 'Sichuan', 44, 1),array
                    (766, 'Tianjin', 44, 1),array
                    (767, 'Xianggang', 44, 1),array
                    (768, 'Xinjiang', 44, 1),array
                    (769, 'Xizang', 44, 1),array
                    (770, 'Yunnan', 44, 1),array
                    (771, 'Zhejiang', 44, 1),array
                    (772, 'Zhejiang Sheng', 44, 1),array
                    (773, 'Christmas Island', 45, 1),array
                    (774, 'Cocos (Keeling) Islands', 46, 1),array
                    (775, 'Amazonas', 47, 1),array
                    (776, 'Antioquia', 47, 1),array
                    (777, 'Arauca', 47, 1),array
                    (778, 'Atlantico', 47, 1),array
                    (779, 'Bogota', 47, 1),array
                    (780, 'Bolivar', 47, 1),array
                    (781, 'Boyaca', 47, 1),array
                    (782, 'Caldas', 47, 1),array
                    (783, 'Caqueta', 47, 1),array
                    (784, 'Casanare', 47, 1),array
                    (785, 'Cauca', 47, 1),array
                    (786, 'Cesar', 47, 1),array
                    (787, 'Choco', 47, 1),array
                    (788, 'Cordoba', 47, 1),array
                    (789, 'Cundinamarca', 47, 1),array
                    (790, 'Guainia', 47, 1),array
                    (791, 'Guaviare', 47, 1),array
                    (792, 'Huila', 47, 1),array
                    (793, 'La Guajira', 47, 1),array
                    (794, 'Magdalena', 47, 1),array
                    (795, 'Meta', 47, 1),array
                    (796, 'Narino', 47, 1),array
                    (797, 'Norte de Santander', 47, 1),array
                    (798, 'Putumayo', 47, 1),array
                    (799, 'Quindio', 47, 1),array
                    (800, 'Risaralda', 47, 1),array
                    (801, 'San Andres y Providencia', 47, 1),array
                    (802, 'Santander', 47, 1),array
                    (803, 'Sucre', 47, 1),array
                    (804, 'Tolima', 47, 1),array
                    (805, 'Valle del Cauca', 47, 1),array
                    (806, 'Vaupes', 47, 1),array
                    (807, 'Vichada', 47, 1),array
                    (808, 'Mwali', 48, 1),array
                    (809, 'Njazidja', 48, 1),array
                    (810, 'Nzwani', 48, 1),array
                    (811, 'Bouenza', 49, 1),array
                    (812, 'Brazzaville', 49, 1),array
                    (813, 'Cuvette', 49, 1),array
                    (814, 'Kouilou', 49, 1),array
                    (815, 'Lekoumou', 49, 1),array
                    (816, 'Likouala', 49, 1),array
                    (817, 'Niari', 49, 1),array
                    (818, 'Plateaux', 49, 1),array
                    (819, 'Pool', 49, 1),array
                    (820, 'Sangha', 49, 1),array
                    (821, 'Bandundu', 50, 1),array
                    (822, 'Bas-Congo', 50, 1),array
                    (823, 'Equateur', 50, 1),array
                    (824, 'Haut-Congo', 50, 1),array
                    (825, 'Kasai-Occidental', 50, 1),array
                    (826, 'Kasai-Oriental', 50, 1),array
                    (827, 'Katanga', 50, 1),array
                    (828, 'Kinshasa', 50, 1),array
                    (829, 'Maniema', 50, 1),array
                    (830, 'Nord-Kivu', 50, 1),array
                    (831, 'Sud-Kivu', 50, 1),array
                    (832, 'Aitutaki', 51, 1),array
                    (833, 'Atiu', 51, 1),array
                    (834, 'Mangaia', 51, 1),array
                    (835, 'Manihiki', 51, 1),array
                    (836, 'Mauke', 51, 1),array
                    (837, 'Mitiaro', 51, 1),array
                    (838, 'Nassau', 51, 1),array
                    (839, 'Pukapuka', 51, 1),array
                    (840, 'Rakahanga', 51, 1),array
                    (841, 'Rarotonga', 51, 1),array
                    (842, 'Tongareva', 51, 1),array
                    (843, 'Alajuela', 52, 1),array
                    (844, 'Cartago', 52, 1),array
                    (845, 'Guanacaste', 52, 1),array
                    (846, 'Heredia', 52, 1),array
                    (847, 'Limon', 52, 1),array
                    (848, 'Puntarenas', 52, 1),array
                    (849, 'San Jose', 52, 1),array
                    (850, 'Abidjan', 53, 1),array
                    (851, 'Agneby', 53, 1),array
                    (852, 'Bafing', 53, 1),array
                    (853, 'Denguele', 53, 1),array
                    (854, 'Dix-huit Montagnes', 53, 1),array
                    (855, 'Fromager', 53, 1),array
                    (856, 'Haut-Sassandra', 53, 1),array
                    (857, 'Lacs', 53, 1),array
                    (858, 'Lagunes', 53, 1),array
                    (859, 'Marahoue', 53, 1),array
                    (860, 'Moyen-Cavally', 53, 1),array
                    (861, 'Moyen-Comoe', 53, 1),array
                    (862, 'Nzi-Comoe', 53, 1),array
                    (863, 'Sassandra', 53, 1),array
                    (864, 'Savanes', 53, 1),array
                    (865, 'Sud-Bandama', 53, 1),array
                    (866, 'Sud-Comoe', 53, 1),array
                    (867, 'Vallee du Bandama', 53, 1),array
                    (868, 'Worodougou', 53, 1),array
                    (869, 'Zanzan', 53, 1),array
                    (870, 'Bjelovar-Bilogora', 54, 1),array
                    (871, 'Dubrovnik-Neretva', 54, 1),array
                    (872, 'Grad Zagreb', 54, 1),array
                    (873, 'Istra', 54, 1),array
                    (874, 'Karlovac', 54, 1),array
                    (875, 'Koprivnica-Krizhevci', 54, 1),array
                    (876, 'Krapina-Zagorje', 54, 1),array
                    (877, 'Lika-Senj', 54, 1),array
                    (878, 'Medhimurje', 54, 1),array
                    (879, 'Medimurska Zupanija', 54, 1),array
                    (880, 'Osijek-Baranja', 54, 1),array
                    (881, 'Osjecko-Baranjska Zupanija', 54, 1),array
                    (882, 'Pozhega-Slavonija', 54, 1),array
                    (883, 'Primorje-Gorski Kotar', 54, 1),array
                    (884, 'Shibenik-Knin', 54, 1),array
                    (885, 'Sisak-Moslavina', 54, 1),array
                    (886, 'Slavonski Brod-Posavina', 54, 1),array
                    (887, 'Split-Dalmacija', 54, 1),array
                    (888, 'Varazhdin', 54, 1),array
                    (889, 'Virovitica-Podravina', 54, 1),array
                    (890, 'Vukovar-Srijem', 54, 1),array
                    (891, 'Zadar', 54, 1),array
                    (892, 'Zagreb', 54, 1),array
                    (893, 'Camaguey', 55, 1),array
                    (894, 'Ciego de Avila', 55, 1),array
                    (895, 'Cienfuegos', 55, 1),array
                    (896, 'Ciudad de la Habana', 55, 1),array
                    (897, 'Granma', 55, 1),array
                    (898, 'Guantanamo', 55, 1),array
                    (899, 'Habana', 55, 1),array
                    (900, 'Holguin', 55, 1),array
                    (901, 'Isla de la Juventud', 55, 1),array
                    (902, 'La Habana', 55, 1),array
                    (903, 'Las Tunas', 55, 1),array
                    (904, 'Matanzas', 55, 1),array
                    (905, 'Pinar del Rio', 55, 1),array
                    (906, 'Sancti Spiritus', 55, 1),array
                    (907, 'Santiago de Cuba', 55, 1),array
                    (908, 'Villa Clara', 55, 1),array
                    (909, 'Government controlled area', 56, 1),array
                    (910, 'Limassol', 56, 1),array
                    (911, 'Nicosia District', 56, 1),array
                    (912, 'Paphos', 56, 1),array
                    (913, 'Turkish controlled area', 56, 1),array
                    (914, 'Central Bohemian', 57, 1),array
                    (915, 'Frycovice', 57, 1),array
                    (916, 'Jihocesky Kraj', 57, 1),array
                    (917, 'Jihochesky', 57, 1),array
                    (918, 'Jihomoravsky', 57, 1),array
                    (919, 'Karlovarsky', 57, 1),array
                    (920, 'Klecany', 57, 1),array
                    (921, 'Kralovehradecky', 57, 1),array
                    (922, 'Liberecky', 57, 1),array
                    (923, 'Lipov', 57, 1),array
                    (924, 'Moravskoslezsky', 57, 1),array
                    (925, 'Olomoucky', 57, 1),array
                    (926, 'Olomoucky Kraj', 57, 1),array
                    (927, 'Pardubicky', 57, 1),array
                    (928, 'Plzensky', 57, 1),array
                    (929, 'Praha', 57, 1),array
                    (930, 'Rajhrad', 57, 1),array
                    (931, 'Smirice', 57, 1),array
                    (932, 'South Moravian', 57, 1),array
                    (933, 'Straz nad Nisou', 57, 1),array
                    (934, 'Stredochesky', 57, 1),array
                    (935, 'Unicov', 57, 1),array
                    (936, 'Ustecky', 57, 1),array
                    (937, 'Valletta', 57, 1),array
                    (938, 'Velesin', 57, 1),array
                    (939, 'Vysochina', 57, 1),array
                    (940, 'Zlinsky', 57, 1),array
                    (941, 'Arhus', 58, 1),array
                    (942, 'Bornholm', 58, 1),array
                    (943, 'Frederiksborg', 58, 1),array
                    (944, 'Fyn', 58, 1),array
                    (945, 'Hovedstaden', 58, 1),array
                    (946, 'Kobenhavn', 58, 1),array
                    (947, 'Kobenhavns Amt', 58, 1),array
                    (948, 'Kobenhavns Kommune', 58, 1),array
                    (949, 'Nordjylland', 58, 1),array
                    (950, 'Ribe', 58, 1),array
                    (951, 'Ringkobing', 58, 1),array
                    (952, 'Roervig', 58, 1),array
                    (953, 'Roskilde', 58, 1),array
                    (954, 'Roslev', 58, 1),array
                    (955, 'Sjaelland', 58, 1),array
                    (956, 'Soeborg', 58, 1),array
                    (957, 'Sonderjylland', 58, 1),array
                    (958, 'Storstrom', 58, 1),array
                    (959, 'Syddanmark', 58, 1),array
                    (960, 'Toelloese', 58, 1),array
                    (961, 'Vejle', 58, 1),array
                    (962, 'Vestsjalland', 58, 1),array
                    (963, 'Viborg', 58, 1),array
                    (964, 'Ali Sabih', 59, 1),array
                    (965, 'Dikhil', 59, 1),array
                    (966, 'Jibuti', 59, 1),array
                    (967, 'Tajurah', 59, 1),array
                    (968, 'Ubuk', 59, 1),array
                    (969, 'Saint Andrew', 60, 1),array
                    (970, 'Saint David', 60, 1),array
                    (971, 'Saint George', 60, 1),array
                    (972, 'Saint John', 60, 1),array
                    (973, 'Saint Joseph', 60, 1),array
                    (974, 'Saint Luke', 60, 1),array
                    (975, 'Saint Mark', 60, 1),array
                    (976, 'Saint Patrick', 60, 1),array
                    (977, 'Saint Paul', 60, 1),array
                    (978, 'Saint Peter', 60, 1),array
                    (979, 'Azua', 61, 1),array
                    (980, 'Bahoruco', 61, 1),array
                    (981, 'Barahona', 61, 1),array
                    (982, 'Dajabon', 61, 1),array
                    (983, 'Distrito Nacional', 61, 1),array
                    (984, 'Duarte', 61, 1),array
                    (985, 'El Seybo', 61, 1),array
                    (986, 'Elias Pina', 61, 1),array
                    (987, 'Espaillat', 61, 1),array
                    (988, 'Hato Mayor', 61, 1),array
                    (989, 'Independencia', 61, 1),array
                    (990, 'La Altagracia', 61, 1),array
                    (991, 'La Romana', 61, 1),array
                    (992, 'La Vega', 61, 1),array
                    (993, 'Maria Trinidad Sanchez', 61, 1),array
                    (994, 'Monsenor Nouel', 61, 1),array
                    (995, 'Monte Cristi', 61, 1),array
                    (996, 'Monte Plata', 61, 1),array
                    (997, 'Pedernales', 61, 1),array
                    (998, 'Peravia', 61, 1),array
                    (999, 'Puerto Plata', 61, 1),array
                    (1000, 'Salcedo', 61, 1),array
                    (1001, 'Samana', 61, 1),array
                    (1002, 'San Cristobal', 61, 1),array
                    (1003, 'San Juan', 61, 1),array
                    (1004, 'San Pedro de Macoris', 61, 1),array
                    (1005, 'Sanchez Ramirez', 61, 1),array
                    (1006, 'Santiago', 61, 1),array
                    (1007, 'Santiago Rodriguez', 61, 1),array
                    (1008, 'Valverde', 61, 1),array
                    (1009, 'Aileu', 62, 1),array
                    (1010, 'Ainaro', 62, 1),array
                    (1011, 'Ambeno', 62, 1),array
                    (1012, 'Baucau', 62, 1),array
                    (1013, 'Bobonaro', 62, 1),array
                    (1014, 'Cova Lima', 62, 1),array
                    (1015, 'Dili', 62, 1),array
                    (1016, 'Ermera', 62, 1),array
                    (1017, 'Lautem', 62, 1),array
                    (1018, 'Liquica', 62, 1),array
                    (1019, 'Manatuto', 62, 1),array
                    (1020, 'Manufahi', 62, 1),array
                    (1021, 'Viqueque', 62, 1),array
                    (1022, 'Azuay', 63, 1),array
                    (1023, 'Bolivar', 63, 1),array
                    (1024, 'Canar', 63, 1),array
                    (1025, 'Carchi', 63, 1),array
                    (1026, 'Chimborazo', 63, 1),array
                    (1027, 'Cotopaxi', 63, 1),array
                    (1028, 'El Oro', 63, 1),array
                    (1029, 'Esmeraldas', 63, 1),array
                    (1030, 'Galapagos', 63, 1),array
                    (1031, 'Guayas', 63, 1),array
                    (1032, 'Imbabura', 63, 1),array
                    (1033, 'Loja', 63, 1),array
                    (1034, 'Los Rios', 63, 1),array
                    (1035, 'Manabi', 63, 1),array
                    (1036, 'Morona Santiago', 63, 1),array
                    (1037, 'Napo', 63, 1),array
                    (1038, 'Orellana', 63, 1),array
                    (1039, 'Pastaza', 63, 1),array
                    (1040, 'Pichincha', 63, 1),array
                    (1041, 'Sucumbios', 63, 1),array
                    (1042, 'Tungurahua', 63, 1),array
                    (1043, 'Zamora Chinchipe', 63, 1),array
                    (1044, 'Aswan', 64, 1),array
                    (1045, 'Asyut', 64, 1),array
                    (1046, 'Bani Suwayf', 64, 1),array
                    (1047, 'Bur Said', 64, 1),array
                    (1048, 'Cairo', 64, 1),array
                    (1049, 'Dumyat', 64, 1),array
                    (1050, 'Kafr-ash-Shaykh', 64, 1),array
                    (1051, 'Matruh', 64, 1),array
                    (1052, 'Muhafazat ad Daqahliyah', 64, 1),array
                    (1053, 'Muhafazat al Fayyum', 64, 1),array
                    (1054, 'Muhafazat al Gharbiyah', 64, 1),array
                    (1055, 'Muhafazat al Iskandariyah', 64, 1),array
                    (1056, 'Muhafazat al Qahirah', 64, 1),array
                    (1057, 'Qina', 64, 1),array
                    (1058, 'Sawhaj', 64, 1),array
                    (1059, 'Sina al-Janubiyah', 64, 1),array
                    (1060, 'Sina ash-Shamaliyah', 64, 1),array
                    (1061, 'ad-Daqahliyah', 64, 1),array
                    (1062, 'al-Bahr-al-Ahmar', 64, 1),array
                    (1063, 'al-Buhayrah', 64, 1),array
                    (1064, 'al-Fayyum', 64, 1),array
                    (1065, 'al-Gharbiyah', 64, 1),array
                    (1066, 'al-Iskandariyah', 64, 1),array
                    (1067, 'al-Ismailiyah', 64, 1),array
                    (1068, 'al-Jizah', 64, 1),array
                    (1069, 'al-Minufiyah', 64, 1),array
                    (1070, 'al-Minya', 64, 1),array
                    (1071, 'al-Qahira', 64, 1),array
                    (1072, 'al-Qalyubiyah', 64, 1),array
                    (1073, 'al-Uqsur', 64, 1),array
                    (1074, 'al-Wadi al-Jadid', 64, 1),array
                    (1075, 'as-Suways', 64, 1),array
                    (1076, 'ash-Sharqiyah', 64, 1),array
                    (1077, 'Ahuachapan', 65, 1),array
                    (1078, 'Cabanas', 65, 1),array
                    (1079, 'Chalatenango', 65, 1),array
                    (1080, 'Cuscatlan', 65, 1),array
                    (1081, 'La Libertad', 65, 1),array
                    (1082, 'La Paz', 65, 1),array
                    (1083, 'La Union', 65, 1),array
                    (1084, 'Morazan', 65, 1),array
                    (1085, 'San Miguel', 65, 1),array
                    (1086, 'San Salvador', 65, 1),array
                    (1087, 'San Vicente', 65, 1),array
                    (1088, 'Santa Ana', 65, 1),array
                    (1089, 'Sonsonate', 65, 1),array
                    (1090, 'Usulutan', 65, 1),array
                    (1091, 'Annobon', 66, 1),array
                    (1092, 'Bioko Norte', 66, 1),array
                    (1093, 'Bioko Sur', 66, 1),array
                    (1094, 'Centro Sur', 66, 1),array
                    (1095, 'Kie-Ntem', 66, 1),array
                    (1096, 'Litoral', 66, 1),array
                    (1097, 'Wele-Nzas', 66, 1),array
                    (1098, 'Anseba', 67, 1),array
                    (1099, 'Debub', 67, 1),array
                    (1100, 'Debub-Keih-Bahri', 67, 1),array
                    (1101, 'Gash-Barka', 67, 1),array
                    (1102, 'Maekel', 67, 1),array
                    (1103, 'Semien-Keih-Bahri', 67, 1),array
                    (1104, 'Harju', 68, 1),array
                    (1105, 'Hiiu', 68, 1),array
                    (1106, 'Ida-Viru', 68, 1),array
                    (1107, 'Jarva', 68, 1),array
                    (1108, 'Jogeva', 68, 1),array
                    (1109, 'Laane', 68, 1),array
                    (1110, 'Laane-Viru', 68, 1),array
                    (1111, 'Parnu', 68, 1),array
                    (1112, 'Polva', 68, 1),array
                    (1113, 'Rapla', 68, 1),array
                    (1114, 'Saare', 68, 1),array
                    (1115, 'Tartu', 68, 1),array
                    (1116, 'Valga', 68, 1),array
                    (1117, 'Viljandi', 68, 1),array
                    (1118, 'Voru', 68, 1),array
                    (1119, 'Addis Abeba', 69, 1),array
                    (1120, 'Afar', 69, 1),array
                    (1121, 'Amhara', 69, 1),array
                    (1122, 'Benishangul', 69, 1),array
                    (1123, 'Diredawa', 69, 1),array
                    (1124, 'Gambella', 69, 1),array
                    (1125, 'Harar', 69, 1),array
                    (1126, 'Jigjiga', 69, 1),array
                    (1127, 'Mekele', 69, 1),array
                    (1128, 'Oromia', 69, 1),array
                    (1129, 'Somali', 69, 1),array
                    (1130, 'Southern', 69, 1),array
                    (1131, 'Tigray', 69, 1),array
                    (1132, 'Christmas Island', 70, 1),array
                    (1133, 'Cocos Islands', 70, 1),array
                    (1134, 'Coral Sea Islands', 70, 1),array
                    (1135, 'Falkland Islands', 71, 1),array
                    (1136, 'South Georgia', 71, 1),array
                    (1137, 'Klaksvik', 72, 1),array
                    (1138, 'Nor ara Eysturoy', 72, 1),array
                    (1139, 'Nor oy', 72, 1),array
                    (1140, 'Sandoy', 72, 1),array
                    (1141, 'Streymoy', 72, 1),array
                    (1142, 'Su uroy', 72, 1),array
                    (1143, 'Sy ra Eysturoy', 72, 1),array
                    (1144, 'Torshavn', 72, 1),array
                    (1145, 'Vaga', 72, 1),array
                    (1146, 'Central', 73, 1),array
                    (1147, 'Eastern', 73, 1),array
                    (1148, 'Northern', 73, 1),array
                    (1149, 'South Pacific', 73, 1),array
                    (1150, 'Western', 73, 1),array
                    (1151, 'Ahvenanmaa', 74, 1),array
                    (1152, 'Etela-Karjala', 74, 1),array
                    (1153, 'Etela-Pohjanmaa', 74, 1),array
                    (1154, 'Etela-Savo', 74, 1),array
                    (1155, 'Etela-Suomen Laani', 74, 1),array
                    (1156, 'Ita-Suomen Laani', 74, 1),array
                    (1157, 'Ita-Uusimaa', 74, 1),array
                    (1158, 'Kainuu', 74, 1),array
                    (1159, 'Kanta-Hame', 74, 1),array
                    (1160, 'Keski-Pohjanmaa', 74, 1),array
                    (1161, 'Keski-Suomi', 74, 1),array
                    (1162, 'Kymenlaakso', 74, 1),array
                    (1163, 'Lansi-Suomen Laani', 74, 1),array
                    (1164, 'Lappi', 74, 1),array
                    (1165, 'Northern Savonia', 74, 1),array
                    (1166, 'Ostrobothnia', 74, 1),array
                    (1167, 'Oulun Laani', 74, 1),array
                    (1168, 'Paijat-Hame', 74, 1),array
                    (1169, 'Pirkanmaa', 74, 1),array
                    (1170, 'Pohjanmaa', 74, 1),array
                    (1171, 'Pohjois-Karjala', 74, 1),array
                    (1172, 'Pohjois-Pohjanmaa', 74, 1),array
                    (1173, 'Pohjois-Savo', 74, 1),array
                    (1174, 'Saarijarvi', 74, 1),array
                    (1175, 'Satakunta', 74, 1),array
                    (1176, 'Southern Savonia', 74, 1),array
                    (1177, 'Tavastia Proper', 74, 1),array
                    (1178, 'Uleaborgs Lan', 74, 1),array
                    (1179, 'Uusimaa', 74, 1),array
                    (1180, 'Varsinais-Suomi', 74, 1),array
                    (1181, 'Ain', 75, 1),array
                    (1182, 'Aisne', 75, 1),array
                    (1183, 'Albi Le Sequestre', 75, 1),array
                    (1184, 'Allier', 75, 1),array
                    (1185, 'Alpes-Cote dAzur', 75, 1),array
                    (1186, 'Alpes-Maritimes', 75, 1),array
                    (1187, 'Alpes-de-Haute-Provence', 75, 1),array
                    (1188, 'Alsace', 75, 1),array
                    (1189, 'Aquitaine', 75, 1),array
                    (1190, 'Ardeche', 75, 1),array
                    (1191, 'Ardennes', 75, 1),array
                    (1192, 'Ariege', 75, 1),array
                    (1193, 'Aube', 75, 1),array
                    (1194, 'Aude', 75, 1),array
                    (1195, 'Auvergne', 75, 1),array
                    (1196, 'Aveyron', 75, 1),array
                    (1197, 'Bas-Rhin', 75, 1),array
                    (1198, 'Basse-Normandie', 75, 1),array
                    (1199, 'Bouches-du-Rhone', 75, 1),array
                    (1200, 'Bourgogne', 75, 1),array
                    (1201, 'Bretagne', 75, 1),array
                    (1202, 'Brittany', 75, 1),array
                    (1203, 'Burgundy', 75, 1),array
                    (1204, 'Calvados', 75, 1),array
                    (1205, 'Cantal', 75, 1),array
                    (1206, 'Cedex', 75, 1),array
                    (1207, 'Centre', 75, 1),array
                    (1208, 'Charente', 75, 1),array
                    (1209, 'Charente-Maritime', 75, 1),array
                    (1210, 'Cher', 75, 1),array
                    (1211, 'Correze', 75, 1),array
                    (1212, 'Corse-du-Sud', 75, 1),array
                    (1213, 'Cote-dOr', 75, 1),array
                    (1214, 'Cotes-dArmor', 75, 1),array
                    (1215, 'Creuse', 75, 1),array
                    (1216, 'Crolles', 75, 1),array
                    (1217, 'Deux-Sevres', 75, 1),array
                    (1218, 'Dordogne', 75, 1),array
                    (1219, 'Doubs', 75, 1),array
                    (1220, 'Drome', 75, 1),array
                    (1221, 'Essonne', 75, 1),array
                    (1222, 'Eure', 75, 1),array
                    (1223, 'Eure-et-Loir', 75, 1),array
                    (1224, 'Feucherolles', 75, 1),array
                    (1225, 'Finistere', 75, 1),array
                    (1226, 'Franche-Comte', 75, 1),array
                    (1227, 'Gard', 75, 1),array
                    (1228, 'Gers', 75, 1),array
                    (1229, 'Gironde', 75, 1),array
                    (1230, 'Haut-Rhin', 75, 1),array
                    (1231, 'Haute-Corse', 75, 1),array
                    (1232, 'Haute-Garonne', 75, 1),array
                    (1233, 'Haute-Loire', 75, 1),array
                    (1234, 'Haute-Marne', 75, 1),array
                    (1235, 'Haute-Saone', 75, 1),array
                    (1236, 'Haute-Savoie', 75, 1),array
                    (1237, 'Haute-Vienne', 75, 1),array
                    (1238, 'Hautes-Alpes', 75, 1),array
                    (1239, 'Hautes-Pyrenees', 75, 1),array
                    (1240, 'Hauts-de-Seine', 75, 1),array
                    (1241, 'Herault', 75, 1),array
                    (1242, 'Ile-de-France', 75, 1),array
                    (1243, 'Ille-et-Vilaine', 75, 1),array
                    (1244, 'Indre', 75, 1),array
                    (1245, 'Indre-et-Loire', 75, 1),array
                    (1246, 'Isere', 75, 1),array
                    (1247, 'Jura', 75, 1),array
                    (1248, 'Klagenfurt', 75, 1),array
                    (1249, 'Landes', 75, 1),array
                    (1250, 'Languedoc-Roussillon', 75, 1),array
                    (1251, 'Larcay', 75, 1),array
                    (1252, 'Le Castellet', 75, 1),array
                    (1253, 'Le Creusot', 75, 1),array
                    (1254, 'Limousin', 75, 1),array
                    (1255, 'Loir-et-Cher', 75, 1),array
                    (1256, 'Loire', 75, 1),array
                    (1257, 'Loire-Atlantique', 75, 1),array
                    (1258, 'Loiret', 75, 1),array
                    (1259, 'Lorraine', 75, 1),array
                    (1260, 'Lot', 75, 1),array
                    (1261, 'Lot-et-Garonne', 75, 1),array
                    (1262, 'Lower Normandy', 75, 1),array
                    (1263, 'Lozere', 75, 1),array
                    (1264, 'Maine-et-Loire', 75, 1),array
                    (1265, 'Manche', 75, 1),array
                    (1266, 'Marne', 75, 1),array
                    (1267, 'Mayenne', 75, 1),array
                    (1268, 'Meurthe-et-Moselle', 75, 1),array
                    (1269, 'Meuse', 75, 1),array
                    (1270, 'Midi-Pyrenees', 75, 1),array
                    (1271, 'Morbihan', 75, 1),array
                    (1272, 'Moselle', 75, 1),array
                    (1273, 'Nievre', 75, 1),array
                    (1274, 'Nord', 75, 1),array
                    (1275, 'Nord-Pas-de-Calais', 75, 1),array
                    (1276, 'Oise', 75, 1),array
                    (1277, 'Orne', 75, 1),array
                    (1278, 'Paris', 75, 1),array
                    (1279, 'Pas-de-Calais', 75, 1),array
                    (1280, 'Pays de la Loire', 75, 1),array
                    (1281, 'Pays-de-la-Loire', 75, 1),array
                    (1282, 'Picardy', 75, 1),array
                    (1283, 'Puy-de-Dome', 75, 1),array
                    (1284, 'Pyrenees-Atlantiques', 75, 1),array
                    (1285, 'Pyrenees-Orientales', 75, 1),array
                    (1286, 'Quelmes', 75, 1),array
                    (1287, 'Rhone', 75, 1),array
                    (1288, 'Rhone-Alpes', 75, 1),array
                    (1289, 'Saint Ouen', 75, 1),array
                    (1290, 'Saint Viatre', 75, 1),array
                    (1291, 'Saone-et-Loire', 75, 1),array
                    (1292, 'Sarthe', 75, 1),array
                    (1293, 'Savoie', 75, 1),array
                    (1294, 'Seine-Maritime', 75, 1),array
                    (1295, 'Seine-Saint-Denis', 75, 1),array
                    (1296, 'Seine-et-Marne', 75, 1),array
                    (1297, 'Somme', 75, 1),array
                    (1298, 'Sophia Antipolis', 75, 1),array
                    (1299, 'Souvans', 75, 1),array
                    (1300, 'Tarn', 75, 1),array
                    (1301, 'Tarn-et-Garonne', 75, 1),array
                    (1302, 'Territoire de Belfort', 75, 1),array
                    (1303, 'Treignac', 75, 1),array
                    (1304, 'Upper Normandy', 75, 1),array
                    (1305, 'Val-dOise', 75, 1),array
                    (1306, 'Val-de-Marne', 75, 1),array
                    (1307, 'Var', 75, 1),array
                    (1308, 'Vaucluse', 75, 1),array
                    (1309, 'Vellise', 75, 1),array
                    (1310, 'Vendee', 75, 1),array
                    (1311, 'Vienne', 75, 1),array
                    (1312, 'Vosges', 75, 1),array
                    (1313, 'Yonne', 75, 1),array
                    (1314, 'Yvelines', 75, 1),array
                    (1315, 'Cayenne', 76, 1),array
                    (1316, 'Saint-Laurent-du-Maroni', 76, 1),array
                    (1317, 'Iles du Vent', 77, 1),array
                    (1318, 'Iles sous le Vent', 77, 1),array
                    (1319, 'Marquesas', 77, 1),array
                    (1320, 'Tuamotu', 77, 1),array
                    (1321, 'Tubuai', 77, 1),array
                    (1322, 'Amsterdam', 78, 1),array
                    (1323, 'Crozet Islands', 78, 1),array
                    (1324, 'Kerguelen', 78, 1),array
                    (1325, 'Estuaire', 79, 1),array
                    (1326, 'Haut-Ogooue', 79, 1),array
                    (1327, 'Moyen-Ogooue', 79, 1),array
                    (1328, 'Ngounie', 79, 1),array
                    (1329, 'Nyanga', 79, 1),array
                    (1330, 'Ogooue-Ivindo', 79, 1),array
                    (1331, 'Ogooue-Lolo', 79, 1),array
                    (1332, 'Ogooue-Maritime', 79, 1),array
                    (1333, 'Woleu-Ntem', 79, 1),array
                    (1334, 'Banjul', 80, 1),array
                    (1335, 'Basse', 80, 1),array
                    (1336, 'Brikama', 80, 1),array
                    (1337, 'Janjanbureh', 80, 1),array
                    (1338, 'Kanifing', 80, 1),array
                    (1339, 'Kerewan', 80, 1),array
                    (1340, 'Kuntaur', 80, 1),array
                    (1341, 'Mansakonko', 80, 1),array
                    (1342, 'Abhasia', 81, 1),array
                    (1343, 'Ajaria', 81, 1),array
                    (1344, 'Guria', 81, 1),array
                    (1345, 'Imereti', 81, 1),array
                    (1346, 'Kaheti', 81, 1),array
                    (1347, 'Kvemo Kartli', 81, 1),array
                    (1348, 'Mcheta-Mtianeti', 81, 1),array
                    (1349, 'Racha', 81, 1),array
                    (1350, 'Samagrelo-Zemo Svaneti', 81, 1),array
                    (1351, 'Samche-Zhavaheti', 81, 1),array
                    (1352, 'Shida Kartli', 81, 1),array
                    (1353, 'Tbilisi', 81, 1),array
                    (1354, 'Auvergne', 82, 1),array
                    (1355, 'Baden-Wurttemberg', 82, 1),array
                    (1356, 'Bavaria', 82, 1),array
                    (1357, 'Bayern', 82, 1),array
                    (1358, 'Beilstein Wurtt', 82, 1),array
                    (1359, 'Berlin', 82, 1),array
                    (1360, 'Brandenburg', 82, 1),array
                    (1361, 'Bremen', 82, 1),array
                    (1362, 'Dreisbach', 82, 1),array
                    (1363, 'Freistaat Bayern', 82, 1),array
                    (1364, 'Hamburg', 82, 1),array
                    (1365, 'Hannover', 82, 1),array
                    (1366, 'Heroldstatt', 82, 1),array
                    (1367, 'Hessen', 82, 1),array
                    (1368, 'Kortenberg', 82, 1),array
                    (1369, 'Laasdorf', 82, 1),array
                    (1370, 'Land Baden-Wurttemberg', 82, 1),array
                    (1371, 'Land Bayern', 82, 1),array
                    (1372, 'Land Brandenburg', 82, 1),array
                    (1373, 'Land Hessen', 82, 1),array
                    (1374, 'Land Mecklenburg-Vorpommern', 82, 1),array
                    (1375, 'Land Nordrhein-Westfalen', 82, 1),array
                    (1376, 'Land Rheinland-Pfalz', 82, 1),array
                    (1377, 'Land Sachsen', 82, 1),array
                    (1378, 'Land Sachsen-Anhalt', 82, 1),array
                    (1379, 'Land Thuringen', 82, 1),array
                    (1380, 'Lower Saxony', 82, 1),array
                    (1381, 'Mecklenburg-Vorpommern', 82, 1),array
                    (1382, 'Mulfingen', 82, 1),array
                    (1383, 'Munich', 82, 1),array
                    (1384, 'Neubeuern', 82, 1),array
                    (1385, 'Niedersachsen', 82, 1),array
                    (1386, 'Noord-Holland', 82, 1),array
                    (1387, 'Nordrhein-Westfalen', 82, 1),array
                    (1388, 'North Rhine-Westphalia', 82, 1),array
                    (1389, 'Osterode', 82, 1),array
                    (1390, 'Rheinland-Pfalz', 82, 1),array
                    (1391, 'Rhineland-Palatinate', 82, 1),array
                    (1392, 'Saarland', 82, 1),array
                    (1393, 'Sachsen', 82, 1),array
                    (1394, 'Sachsen-Anhalt', 82, 1),array
                    (1395, 'Saxony', 82, 1),array
                    (1396, 'Schleswig-Holstein', 82, 1),array
                    (1397, 'Thuringia', 82, 1),array
                    (1398, 'Webling', 82, 1),array
                    (1399, 'Weinstrabe', 82, 1),array
                    (1400, 'schlobborn', 82, 1),array
                    (1401, 'Ashanti', 83, 1),array
                    (1402, 'Brong-Ahafo', 83, 1),array
                    (1403, 'Central', 83, 1),array
                    (1404, 'Eastern', 83, 1),array
                    (1405, 'Greater Accra', 83, 1),array
                    (1406, 'Northern', 83, 1),array
                    (1407, 'Upper East', 83, 1),array
                    (1408, 'Upper West', 83, 1),array
                    (1409, 'Volta', 83, 1),array
                    (1410, 'Western', 83, 1),array
                    (1411, 'Gibraltar', 84, 1),array
                    (1412, 'Acharnes', 85, 1),array
                    (1413, 'Ahaia', 85, 1),array
                    (1414, 'Aitolia kai Akarnania', 85, 1),array
                    (1415, 'Argolis', 85, 1),array
                    (1416, 'Arkadia', 85, 1),array
                    (1417, 'Arta', 85, 1),array
                    (1418, 'Attica', 85, 1),array
                    (1419, 'Attiki', 85, 1),array
                    (1420, 'Ayion Oros', 85, 1),array
                    (1421, 'Crete', 85, 1),array
                    (1422, 'Dodekanisos', 85, 1),array
                    (1423, 'Drama', 85, 1),array
                    (1424, 'Evia', 85, 1),array
                    (1425, 'Evritania', 85, 1),array
                    (1426, 'Evros', 85, 1),array
                    (1427, 'Evvoia', 85, 1),array
                    (1428, 'Florina', 85, 1),array
                    (1429, 'Fokis', 85, 1),array
                    (1430, 'Fthiotis', 85, 1),array
                    (1431, 'Grevena', 85, 1),array
                    (1432, 'Halandri', 85, 1),array
                    (1433, 'Halkidiki', 85, 1),array
                    (1434, 'Hania', 85, 1),array
                    (1435, 'Heraklion', 85, 1),array
                    (1436, 'Hios', 85, 1),array
                    (1437, 'Ilia', 85, 1),array
                    (1438, 'Imathia', 85, 1),array
                    (1439, 'Ioannina', 85, 1),array
                    (1440, 'Iraklion', 85, 1),array
                    (1441, 'Karditsa', 85, 1),array
                    (1442, 'Kastoria', 85, 1),array
                    (1443, 'Kavala', 85, 1),array
                    (1444, 'Kefallinia', 85, 1),array
                    (1445, 'Kerkira', 85, 1),array
                    (1446, 'Kiklades', 85, 1),array
                    (1447, 'Kilkis', 85, 1),array
                    (1448, 'Korinthia', 85, 1),array
                    (1449, 'Kozani', 85, 1),array
                    (1450, 'Lakonia', 85, 1),array
                    (1451, 'Larisa', 85, 1),array
                    (1452, 'Lasithi', 85, 1),array
                    (1453, 'Lesvos', 85, 1),array
                    (1454, 'Levkas', 85, 1),array
                    (1455, 'Magnisia', 85, 1),array
                    (1456, 'Messinia', 85, 1),array
                    (1457, 'Nomos Attikis', 85, 1),array
                    (1458, 'Nomos Zakynthou', 85, 1),array
                    (1459, 'Pella', 85, 1),array
                    (1460, 'Pieria', 85, 1),array
                    (1461, 'Piraios', 85, 1),array
                    (1462, 'Preveza', 85, 1),array
                    (1463, 'Rethimni', 85, 1),array
                    (1464, 'Rodopi', 85, 1),array
                    (1465, 'Samos', 85, 1),array
                    (1466, 'Serrai', 85, 1),array
                    (1467, 'Thesprotia', 85, 1),array
                    (1468, 'Thessaloniki', 85, 1),array
                    (1469, 'Trikala', 85, 1),array
                    (1470, 'Voiotia', 85, 1),array
                    (1471, 'West Greece', 85, 1),array
                    (1472, 'Xanthi', 85, 1),array
                    (1473, 'Zakinthos', 85, 1),array
                    (1474, 'Aasiaat', 86, 1),array
                    (1475, 'Ammassalik', 86, 1),array
                    (1476, 'Illoqqortoormiut', 86, 1),array
                    (1477, 'Ilulissat', 86, 1),array
                    (1478, 'Ivittuut', 86, 1),array
                    (1479, 'Kangaatsiaq', 86, 1),array
                    (1480, 'Maniitsoq', 86, 1),array
                    (1481, 'Nanortalik', 86, 1),array
                    (1482, 'Narsaq', 86, 1),array
                    (1483, 'Nuuk', 86, 1),array
                    (1484, 'Paamiut', 86, 1),array
                    (1485, 'Qaanaaq', 86, 1),array
                    (1486, 'Qaqortoq', 86, 1),array
                    (1487, 'Qasigiannguit', 86, 1),array
                    (1488, 'Qeqertarsuaq', 86, 1),array
                    (1489, 'Sisimiut', 86, 1),array
                    (1490, 'Udenfor kommunal inddeling', 86, 1),array
                    (1491, 'Upernavik', 86, 1),array
                    (1492, 'Uummannaq', 86, 1),array
                    (1493, 'Carriacou-Petite Martinique', 87, 1),array
                    (1494, 'Saint Andrew', 87, 1),array
                    (1495, 'Saint Davids', 87, 1),array
                    (1496, 'Saint Georges', 87, 1),array
                    (1497, 'Saint John', 87, 1),array
                    (1498, 'Saint Mark', 87, 1),array
                    (1499, 'Saint Patrick', 87, 1),array
                    (1500, 'Basse-Terre', 88, 1),array
                    (1501, 'Grande-Terre', 88, 1),array
                    (1502, 'Iles des Saintes', 88, 1),array
                    (1503, 'La Desirade', 88, 1),array
                    (1504, 'Marie-Galante', 88, 1),array
                    (1505, 'Saint Barthelemy', 88, 1),array
                    (1506, 'Saint Martin', 88, 1),array
                    (1507, 'Agana Heights', 89, 1),array
                    (1508, 'Agat', 89, 1),array
                    (1509, 'Barrigada', 89, 1),array
                    (1510, 'Chalan-Pago-Ordot', 89, 1),array
                    (1511, 'Dededo', 89, 1),array
                    (1512, 'Hagatna', 89, 1),array
                    (1513, 'Inarajan', 89, 1),array
                    (1514, 'Mangilao', 89, 1),array
                    (1515, 'Merizo', 89, 1),array
                    (1516, 'Mongmong-Toto-Maite', 89, 1),array
                    (1517, 'Santa Rita', 89, 1),array
                    (1518, 'Sinajana', 89, 1),array
                    (1519, 'Talofofo', 89, 1),array
                    (1520, 'Tamuning', 89, 1),array
                    (1521, 'Yigo', 89, 1),array
                    (1522, 'Yona', 89, 1),array
                    (1523, 'Alta Verapaz', 90, 1),array
                    (1524, 'Baja Verapaz', 90, 1),array
                    (1525, 'Chimaltenango', 90, 1),array
                    (1526, 'Chiquimula', 90, 1),array
                    (1527, 'El Progreso', 90, 1),array
                    (1528, 'Escuintla', 90, 1),array
                    (1529, 'Guatemala', 90, 1),array
                    (1530, 'Huehuetenango', 90, 1),array
                    (1531, 'Izabal', 90, 1),array
                    (1532, 'Jalapa', 90, 1),array
                    (1533, 'Jutiapa', 90, 1),array
                    (1534, 'Peten', 90, 1),array
                    (1535, 'Quezaltenango', 90, 1),array
                    (1536, 'Quiche', 90, 1),array
                    (1537, 'Retalhuleu', 90, 1),array
                    (1538, 'Sacatepequez', 90, 1),array
                    (1539, 'San Marcos', 90, 1),array
                    (1540, 'Santa Rosa', 90, 1),array
                    (1541, 'Solola', 90, 1),array
                    (1542, 'Suchitepequez', 90, 1),array
                    (1543, 'Totonicapan', 90, 1),array
                    (1544, 'Zacapa', 90, 1),array
                    (1545, 'Alderney', 91, 1),array
                    (1546, 'Castel', 91, 1),array
                    (1547, 'Forest', 91, 1),array
                    (1548, 'Saint Andrew', 91, 1),array
                    (1549, 'Saint Martin', 91, 1),array
                    (1550, 'Saint Peter Port', 91, 1),array
                    (1551, 'Saint Pierre du Bois', 91, 1),array
                    (1552, 'Saint Sampson', 91, 1),array
                    (1553, 'Saint Saviour', 91, 1),array
                    (1554, 'Sark', 91, 1),array
                    (1555, 'Torteval', 91, 1),array
                    (1556, 'Vale', 91, 1),array
                    (1557, 'Beyla', 92, 1),array
                    (1558, 'Boffa', 92, 1),array
                    (1559, 'Boke', 92, 1),array
                    (1560, 'Conakry', 92, 1),array
                    (1561, 'Coyah', 92, 1),array
                    (1562, 'Dabola', 92, 1),array
                    (1563, 'Dalaba', 92, 1),array
                    (1564, 'Dinguiraye', 92, 1),array
                    (1565, 'Faranah', 92, 1),array
                    (1566, 'Forecariah', 92, 1),array
                    (1567, 'Fria', 92, 1),array
                    (1568, 'Gaoual', 92, 1),array
                    (1569, 'Gueckedou', 92, 1),array
                    (1570, 'Kankan', 92, 1),array
                    (1571, 'Kerouane', 92, 1),array
                    (1572, 'Kindia', 92, 1),array
                    (1573, 'Kissidougou', 92, 1),array
                    (1574, 'Koubia', 92, 1),array
                    (1575, 'Koundara', 92, 1),array
                    (1576, 'Kouroussa', 92, 1),array
                    (1577, 'Labe', 92, 1),array
                    (1578, 'Lola', 92, 1),array
                    (1579, 'Macenta', 92, 1),array
                    (1580, 'Mali', 92, 1),array
                    (1581, 'Mamou', 92, 1),array
                    (1582, 'Mandiana', 92, 1),array
                    (1583, 'Nzerekore', 92, 1),array
                    (1584, 'Pita', 92, 1),array
                    (1585, 'Siguiri', 92, 1),array
                    (1586, 'Telimele', 92, 1),array
                    (1587, 'Tougue', 92, 1),array
                    (1588, 'Yomou', 92, 1),array
                    (1589, 'Bafata', 93, 1),array
                    (1590, 'Bissau', 93, 1),array
                    (1591, 'Bolama', 93, 1),array
                    (1592, 'Cacheu', 93, 1),array
                    (1593, 'Gabu', 93, 1),array
                    (1594, 'Oio', 93, 1),array
                    (1595, 'Quinara', 93, 1),array
                    (1596, 'Tombali', 93, 1),array
                    (1597, 'Barima-Waini', 94, 1),array
                    (1598, 'Cuyuni-Mazaruni', 94, 1),array
                    (1599, 'Demerara-Mahaica', 94, 1),array
                    (1600, 'East Berbice-Corentyne', 94, 1),array
                    (1601, 'Essequibo Islands-West Demerar', 94, 1),array
                    (1602, 'Mahaica-Berbice', 94, 1),array
                    (1603, 'Pomeroon-Supenaam', 94, 1),array
                    (1604, 'Potaro-Siparuni', 94, 1),array
                    (1605, 'Upper Demerara-Berbice', 94, 1),array
                    (1606, 'Upper Takutu-Upper Essequibo', 94, 1),array
                    (1607, 'Artibonite', 95, 1),array
                    (1608, 'Centre', 95, 1),array
                    (1609, 'GrandAnse', 95, 1),array
                    (1610, 'Nord', 95, 1),array
                    (1611, 'Nord-Est', 95, 1),array
                    (1612, 'Nord-Ouest', 95, 1),array
                    (1613, 'Ouest', 95, 1),array
                    (1614, 'Sud', 95, 1),array
                    (1615, 'Sud-Est', 95, 1),array
                    (1616, 'Heard and McDonald Islands', 96, 1),array
                    (1617, 'Atlantida', 97, 1),array
                    (1618, 'Choluteca', 97, 1),array
                    (1619, 'Colon', 97, 1),array
                    (1620, 'Comayagua', 97, 1),array
                    (1621, 'Copan', 97, 1),array
                    (1622, 'Cortes', 97, 1),array
                    (1623, 'Distrito Central', 97, 1),array
                    (1624, 'El Paraiso', 97, 1),array
                    (1625, 'Francisco Morazan', 97, 1),array
                    (1626, 'Gracias a Dios', 97, 1),array
                    (1627, 'Intibuca', 97, 1),array
                    (1628, 'Islas de la Bahia', 97, 1),array
                    (1629, 'La Paz', 97, 1),array
                    (1630, 'Lempira', 97, 1),array
                    (1631, 'Ocotepeque', 97, 1),array
                    (1632, 'Olancho', 97, 1),array
                    (1633, 'Santa Barbara', 97, 1),array
                    (1634, 'Valle', 97, 1),array
                    (1635, 'Yoro', 97, 1),array
                    (1636, 'Hong Kong', 98, 1),array
                    (1637, 'Bacs-Kiskun', 99, 1),array
                    (1638, 'Baranya', 99, 1),array
                    (1639, 'Bekes', 99, 1),array
                    (1640, 'Borsod-Abauj-Zemplen', 99, 1),array
                    (1641, 'Budapest', 99, 1),array
                    (1642, 'Csongrad', 99, 1),array
                    (1643, 'Fejer', 99, 1),array
                    (1644, 'Gyor-Moson-Sopron', 99, 1),array
                    (1645, 'Hajdu-Bihar', 99, 1),array
                    (1646, 'Heves', 99, 1),array
                    (1647, 'Jasz-Nagykun-Szolnok', 99, 1),array
                    (1648, 'Komarom-Esztergom', 99, 1),array
                    (1649, 'Nograd', 99, 1),array
                    (1650, 'Pest', 99, 1),array
                    (1651, 'Somogy', 99, 1),array
                    (1652, 'Szabolcs-Szatmar-Bereg', 99, 1),array
                    (1653, 'Tolna', 99, 1),array
                    (1654, 'Vas', 99, 1),array
                    (1655, 'Veszprem', 99, 1),array
                    (1656, 'Zala', 99, 1),array
                    (1657, 'Austurland', 100, 1),array
                    (1658, 'Gullbringusysla', 100, 1),array
                    (1659, 'Hofu borgarsva i', 100, 1),array
                    (1660, 'Nor urland eystra', 100, 1),array
                    (1661, 'Nor urland vestra', 100, 1),array
                    (1662, 'Su urland', 100, 1),array
                    (1663, 'Su urnes', 100, 1),array
                    (1664, 'Vestfir ir', 100, 1),array
                    (1665, 'Vesturland', 100, 1),array
                    (1666, 'Aceh', 102, 1),array
                    (1667, 'Bali', 102, 1),array
                    (1668, 'Bangka-Belitung', 102, 1),array
                    (1669, 'Banten', 102, 1),array
                    (1670, 'Bengkulu', 102, 1),array
                    (1671, 'Gandaria', 102, 1),array
                    (1672, 'Gorontalo', 102, 1),array
                    (1673, 'Jakarta', 102, 1),array
                    (1674, 'Jambi', 102, 1),array
                    (1675, 'Jawa Barat', 102, 1),array
                    (1676, 'Jawa Tengah', 102, 1),array
                    (1677, 'Jawa Timur', 102, 1),array
                    (1678, 'Kalimantan Barat', 102, 1),array
                    (1679, 'Kalimantan Selatan', 102, 1),array
                    (1680, 'Kalimantan Tengah', 102, 1),array
                    (1681, 'Kalimantan Timur', 102, 1),array
                    (1682, 'Kendal', 102, 1),array
                    (1683, 'Lampung', 102, 1),array
                    (1684, 'Maluku', 102, 1),array
                    (1685, 'Maluku Utara', 102, 1),array
                    (1686, 'Nusa Tenggara Barat', 102, 1),array
                    (1687, 'Nusa Tenggara Timur', 102, 1),array
                    (1688, 'Papua', 102, 1),array
                    (1689, 'Riau', 102, 1),array
                    (1690, 'Riau Kepulauan', 102, 1),array
                    (1691, 'Solo', 102, 1),array
                    (1692, 'Sulawesi Selatan', 102, 1),array
                    (1693, 'Sulawesi Tengah', 102, 1),array
                    (1694, 'Sulawesi Tenggara', 102, 1),array
                    (1695, 'Sulawesi Utara', 102, 1),array
                    (1696, 'Sumatera Barat', 102, 1),array
                    (1697, 'Sumatera Selatan', 102, 1),array
                    (1698, 'Sumatera Utara', 102, 1),array
                    (1699, 'Yogyakarta', 102, 1),array
                    (1700, 'Ardabil', 103, 1),array
                    (1701, 'Azarbayjan-e Bakhtari', 103, 1),array
                    (1702, 'Azarbayjan-e Khavari', 103, 1),array
                    (1703, 'Bushehr', 103, 1),array
                    (1704, 'Chahar Mahal-e Bakhtiari', 103, 1),array
                    (1705, 'Esfahan', 103, 1),array
                    (1706, 'Fars', 103, 1),array
                    (1707, 'Gilan', 103, 1),array
                    (1708, 'Golestan', 103, 1),array
                    (1709, 'Hamadan', 103, 1),array
                    (1710, 'Hormozgan', 103, 1),array
                    (1711, 'Ilam', 103, 1),array
                    (1712, 'Kerman', 103, 1),array
                    (1713, 'Kermanshah', 103, 1),array
                    (1714, 'Khorasan', 103, 1),array
                    (1715, 'Khuzestan', 103, 1),array
                    (1716, 'Kohgiluyeh-e Boyerahmad', 103, 1),array
                    (1717, 'Kordestan', 103, 1),array
                    (1718, 'Lorestan', 103, 1),array
                    (1719, 'Markazi', 103, 1),array
                    (1720, 'Mazandaran', 103, 1),array
                    (1721, 'Ostan-e Esfahan', 103, 1),array
                    (1722, 'Qazvin', 103, 1),array
                    (1723, 'Qom', 103, 1),array
                    (1724, 'Semnan', 103, 1),array
                    (1725, 'Sistan-e Baluchestan', 103, 1),array
                    (1726, 'Tehran', 103, 1),array
                    (1727, 'Yazd', 103, 1),array
                    (1728, 'Zanjan', 103, 1),array
                    (1729, 'Babil', 104, 1),array
                    (1730, 'Baghdad', 104, 1),array
                    (1731, 'Dahuk', 104, 1),array
                    (1732, 'Dhi Qar', 104, 1),array
                    (1733, 'Diyala', 104, 1),array
                    (1734, 'Erbil', 104, 1),array
                    (1735, 'Irbil', 104, 1),array
                    (1736, 'Karbala', 104, 1),array
                    (1737, 'Kurdistan', 104, 1),array
                    (1738, 'Maysan', 104, 1),array
                    (1739, 'Ninawa', 104, 1),array
                    (1740, 'Salah-ad-Din', 104, 1),array
                    (1741, 'Wasit', 104, 1),array
                    (1742, 'al-Anbar', 104, 1),array
                    (1743, 'al-Basrah', 104, 1),array
                    (1744, 'al-Muthanna', 104, 1),array
                    (1745, 'al-Qadisiyah', 104, 1),array
                    (1746, 'an-Najaf', 104, 1),array
                    (1747, 'as-Sulaymaniyah', 104, 1),array
                    (1748, 'at-Tamim', 104, 1),array
                    (1749, 'Armagh', 105, 1),array
                    (1750, 'Carlow', 105, 1),array
                    (1751, 'Cavan', 105, 1),array
                    (1752, 'Clare', 105, 1),array
                    (1753, 'Cork', 105, 1),array
                    (1754, 'Donegal', 105, 1),array
                    (1755, 'Dublin', 105, 1),array
                    (1756, 'Galway', 105, 1),array
                    (1757, 'Kerry', 105, 1),array
                    (1758, 'Kildare', 105, 1),array
                    (1759, 'Kilkenny', 105, 1),array
                    (1760, 'Laois', 105, 1),array
                    (1761, 'Leinster', 105, 1),array
                    (1762, 'Leitrim', 105, 1),array
                    (1763, 'Limerick', 105, 1),array
                    (1764, 'Loch Garman', 105, 1),array
                    (1765, 'Longford', 105, 1),array
                    (1766, 'Louth', 105, 1),array
                    (1767, 'Mayo', 105, 1),array
                    (1768, 'Meath', 105, 1),array
                    (1769, 'Monaghan', 105, 1),array
                    (1770, 'Offaly', 105, 1),array
                    (1771, 'Roscommon', 105, 1),array
                    (1772, 'Sligo', 105, 1),array
                    (1773, 'Tipperary North Riding', 105, 1),array
                    (1774, 'Tipperary South Riding', 105, 1),array
                    (1775, 'Ulster', 105, 1),array
                    (1776, 'Waterford', 105, 1),array
                    (1777, 'Westmeath', 105, 1),array
                    (1778, 'Wexford', 105, 1),array
                    (1779, 'Wicklow', 105, 1),array
                    (1780, 'Beit Hanania', 106, 1),array
                    (1781, 'Ben Gurion Airport', 106, 1),array
                    (1782, 'Bethlehem', 106, 1),array
                    (1783, 'Caesarea', 106, 1),array
                    (1784, 'Centre', 106, 1),array
                    (1785, 'Gaza', 106, 1),array
                    (1786, 'Hadaron', 106, 1),array
                    (1787, 'Haifa District', 106, 1),array
                    (1788, 'Hamerkaz', 106, 1),array
                    (1789, 'Hazafon', 106, 1),array
                    (1790, 'Hebron', 106, 1),array
                    (1791, 'Jaffa', 106, 1),array
                    (1792, 'Jerusalem', 106, 1),array
                    (1793, 'Khefa', 106, 1),array
                    (1794, 'Kiryat Yam', 106, 1),array
                    (1795, 'Lower Galilee', 106, 1),array
                    (1796, 'Qalqilya', 106, 1),array
                    (1797, 'Talme Elazar', 106, 1),array
                    (1798, 'Tel Aviv', 106, 1),array
                    (1799, 'Tsafon', 106, 1),array
                    (1800, 'Umm El Fahem', 106, 1),array
                    (1801, 'Yerushalayim', 106, 1),array
                    (1802, 'Abruzzi', 107, 1),array
                    (1803, 'Abruzzo', 107, 1),array
                    (1804, 'Agrigento', 107, 1),array
                    (1805, 'Alessandria', 107, 1),array
                    (1806, 'Ancona', 107, 1),array
                    (1807, 'Arezzo', 107, 1),array
                    (1808, 'Ascoli Piceno', 107, 1),array
                    (1809, 'Asti', 107, 1),array
                    (1810, 'Avellino', 107, 1),array
                    (1811, 'Bari', 107, 1),array
                    (1812, 'Basilicata', 107, 1),array
                    (1813, 'Belluno', 107, 1),array
                    (1814, 'Benevento', 107, 1),array
                    (1815, 'Bergamo', 107, 1),array
                    (1816, 'Biella', 107, 1),array
                    (1817, 'Bologna', 107, 1),array
                    (1818, 'Bolzano', 107, 1),array
                    (1819, 'Brescia', 107, 1),array
                    (1820, 'Brindisi', 107, 1),array
                    (1821, 'Calabria', 107, 1),array
                    (1822, 'Campania', 107, 1),array
                    (1823, 'Cartoceto', 107, 1),array
                    (1824, 'Caserta', 107, 1),array
                    (1825, 'Catania', 107, 1),array
                    (1826, 'Chieti', 107, 1),array
                    (1827, 'Como', 107, 1),array
                    (1828, 'Cosenza', 107, 1),array
                    (1829, 'Cremona', 107, 1),array
                    (1830, 'Cuneo', 107, 1),array
                    (1831, 'Emilia-Romagna', 107, 1),array
                    (1832, 'Ferrara', 107, 1),array
                    (1833, 'Firenze', 107, 1),array
                    (1834, 'Florence', 107, 1),array
                    (1835, 'Forli-Cesena ', 107, 1),array
                    (1836, 'Friuli-Venezia Giulia', 107, 1),array
                    (1837, 'Frosinone', 107, 1),array
                    (1838, 'Genoa', 107, 1),array
                    (1839, 'Gorizia', 107, 1),array
                    (1840, 'LAquila', 107, 1),array
                    (1841, 'Lazio', 107, 1),array
                    (1842, 'Lecce', 107, 1),array
                    (1843, 'Lecco', 107, 1),array
                    (1844, 'Lecco Province', 107, 1),array
                    (1845, 'Liguria', 107, 1),array
                    (1846, 'Lodi', 107, 1),array
                    (1847, 'Lombardia', 107, 1),array
                    (1848, 'Lombardy', 107, 1),array
                    (1849, 'Macerata', 107, 1),array
                    (1850, 'Mantova', 107, 1),array
                    (1851, 'Marche', 107, 1),array
                    (1852, 'Messina', 107, 1),array
                    (1853, 'Milan', 107, 1),array
                    (1854, 'Modena', 107, 1),array
                    (1855, 'Molise', 107, 1),array
                    (1856, 'Molteno', 107, 1),array
                    (1857, 'Montenegro', 107, 1),array
                    (1858, 'Monza and Brianza', 107, 1),array
                    (1859, 'Naples', 107, 1),array
                    (1860, 'Novara', 107, 1),array
                    (1861, 'Padova', 107, 1),array
                    (1862, 'Parma', 107, 1),array
                    (1863, 'Pavia', 107, 1),array
                    (1864, 'Perugia', 107, 1),array
                    (1865, 'Pesaro-Urbino', 107, 1),array
                    (1866, 'Piacenza', 107, 1),array
                    (1867, 'Piedmont', 107, 1),array
                    (1868, 'Piemonte', 107, 1),array
                    (1869, 'Pisa', 107, 1),array
                    (1870, 'Pordenone', 107, 1),array
                    (1871, 'Potenza', 107, 1),array
                    (1872, 'Puglia', 107, 1),array
                    (1873, 'Reggio Emilia', 107, 1),array
                    (1874, 'Rimini', 107, 1),array
                    (1875, 'Roma', 107, 1),array
                    (1876, 'Salerno', 107, 1),array
                    (1877, 'Sardegna', 107, 1),array
                    (1878, 'Sassari', 107, 1),array
                    (1879, 'Savona', 107, 1),array
                    (1880, 'Sicilia', 107, 1),array
                    (1881, 'Siena', 107, 1),array
                    (1882, 'Sondrio', 107, 1),array
                    (1883, 'South Tyrol', 107, 1),array
                    (1884, 'Taranto', 107, 1),array
                    (1885, 'Teramo', 107, 1),array
                    (1886, 'Torino', 107, 1),array
                    (1887, 'Toscana', 107, 1),array
                    (1888, 'Trapani', 107, 1),array
                    (1889, 'Trentino-Alto Adige', 107, 1),array
                    (1890, 'Trento', 107, 1),array
                    (1891, 'Treviso', 107, 1),array
                    (1892, 'Udine', 107, 1),array
                    (1893, 'Umbria', 107, 1),array
                    (1894, 'Valle dAosta', 107, 1),array
                    (1895, 'Varese', 107, 1),array
                    (1896, 'Veneto', 107, 1),array
                    (1897, 'Venezia', 107, 1),array
                    (1898, 'Verbano-Cusio-Ossola', 107, 1),array
                    (1899, 'Vercelli', 107, 1),array
                    (1900, 'Verona', 107, 1),array
                    (1901, 'Vicenza', 107, 1),array
                    (1902, 'Viterbo', 107, 1),array
                    (1903, 'Buxoro Viloyati', 108, 1),array
                    (1904, 'Clarendon', 108, 1),array
                    (1905, 'Hanover', 108, 1),array
                    (1906, 'Kingston', 108, 1),array
                    (1907, 'Manchester', 108, 1),array
                    (1908, 'Portland', 108, 1),array
                    (1909, 'Saint Andrews', 108, 1),array
                    (1910, 'Saint Ann', 108, 1),array
                    (1911, 'Saint Catherine', 108, 1),array
                    (1912, 'Saint Elizabeth', 108, 1),array
                    (1913, 'Saint James', 108, 1),array
                    (1914, 'Saint Mary', 108, 1),array
                    (1915, 'Saint Thomas', 108, 1),array
                    (1916, 'Trelawney', 108, 1),array
                    (1917, 'Westmoreland', 108, 1),array
                    (1918, 'Aichi', 109, 1),array
                    (1919, 'Akita', 109, 1),array
                    (1920, 'Aomori', 109, 1),array
                    (1921, 'Chiba', 109, 1),array
                    (1922, 'Ehime', 109, 1),array
                    (1923, 'Fukui', 109, 1),array
                    (1924, 'Fukuoka', 109, 1),array
                    (1925, 'Fukushima', 109, 1),array
                    (1926, 'Gifu', 109, 1),array
                    (1927, 'Gumma', 109, 1),array
                    (1928, 'Hiroshima', 109, 1),array
                    (1929, 'Hokkaido', 109, 1),array
                    (1930, 'Hyogo', 109, 1),array
                    (1931, 'Ibaraki', 109, 1),array
                    (1932, 'Ishikawa', 109, 1),array
                    (1933, 'Iwate', 109, 1),array
                    (1934, 'Kagawa', 109, 1),array
                    (1935, 'Kagoshima', 109, 1),array
                    (1936, 'Kanagawa', 109, 1),array
                    (1937, 'Kanto', 109, 1),array
                    (1938, 'Kochi', 109, 1),array
                    (1939, 'Kumamoto', 109, 1),array
                    (1940, 'Kyoto', 109, 1),array
                    (1941, 'Mie', 109, 1),array
                    (1942, 'Miyagi', 109, 1),array
                    (1943, 'Miyazaki', 109, 1),array
                    (1944, 'Nagano', 109, 1),array
                    (1945, 'Nagasaki', 109, 1),array
                    (1946, 'Nara', 109, 1),array
                    (1947, 'Niigata', 109, 1),array
                    (1948, 'Oita', 109, 1),array
                    (1949, 'Okayama', 109, 1),array
                    (1950, 'Okinawa', 109, 1),array
                    (1951, 'Osaka', 109, 1),array
                    (1952, 'Saga', 109, 1),array
                    (1953, 'Saitama', 109, 1),array
                    (1954, 'Shiga', 109, 1),array
                    (1955, 'Shimane', 109, 1),array
                    (1956, 'Shizuoka', 109, 1),array
                    (1957, 'Tochigi', 109, 1),array
                    (1958, 'Tokushima', 109, 1),array
                    (1959, 'Tokyo', 109, 1),array
                    (1960, 'Tottori', 109, 1),array
                    (1961, 'Toyama', 109, 1),array
                    (1962, 'Wakayama', 109, 1),array
                    (1963, 'Yamagata', 109, 1),array
                    (1964, 'Yamaguchi', 109, 1),array
                    (1965, 'Yamanashi', 109, 1),array
                    (1966, 'Grouville', 110, 1),array
                    (1967, 'Saint Brelade', 110, 1),array
                    (1968, 'Saint Clement', 110, 1),array
                    (1969, 'Saint Helier', 110, 1),array
                    (1970, 'Saint John', 110, 1),array
                    (1971, 'Saint Lawrence', 110, 1),array
                    (1972, 'Saint Martin', 110, 1),array
                    (1973, 'Saint Mary', 110, 1),array
                    (1974, 'Saint Peter', 110, 1),array
                    (1975, 'Saint Saviour', 110, 1),array
                    (1976, 'Trinity', 110, 1),array
                    (1977, 'Ajlun', 111, 1),array
                    (1978, 'Amman', 111, 1),array
                    (1979, 'Irbid', 111, 1),array
                    (1980, 'Jarash', 111, 1),array
                    (1981, 'Maan', 111, 1),array
                    (1982, 'Madaba', 111, 1),array
                    (1983, 'al-Aqabah', 111, 1),array
                    (1984, 'al-Balqa', 111, 1),array
                    (1985, 'al-Karak', 111, 1),array
                    (1986, 'al-Mafraq', 111, 1),array
                    (1987, 'at-Tafilah', 111, 1),array
                    (1988, 'az-Zarqa', 111, 1),array
                    (1989, 'Akmecet', 112, 1),array
                    (1990, 'Akmola', 112, 1),array
                    (1991, 'Aktobe', 112, 1),array
                    (1992, 'Almati', 112, 1),array
                    (1993, 'Atirau', 112, 1),array
                    (1994, 'Batis Kazakstan', 112, 1),array
                    (1995, 'Burlinsky Region', 112, 1),array
                    (1996, 'Karagandi', 112, 1),array
                    (1997, 'Kostanay', 112, 1),array
                    (1998, 'Mankistau', 112, 1),array
                    (1999, 'Ontustik Kazakstan', 112, 1),array
                    (2000, 'Pavlodar', 112, 1),array
                    (2001, 'Sigis Kazakstan', 112, 1),array
                    (2002, 'Soltustik Kazakstan', 112, 1),array
                    (2003, 'Taraz', 112, 1),array
                    (2004, 'Central', 113, 1),array
                    (2005, 'Coast', 113, 1),array
                    (2006, 'Eastern', 113, 1),array
                    (2007, 'Nairobi', 113, 1),array
                    (2008, 'North Eastern', 113, 1),array
                    (2009, 'Nyanza', 113, 1),array
                    (2010, 'Rift Valley', 113, 1),array
                    (2011, 'Western', 113, 1),array
                    (2012, 'Abaiang', 114, 1),array
                    (2013, 'Abemana', 114, 1),array
                    (2014, 'Aranuka', 114, 1),array
                    (2015, 'Arorae', 114, 1),array
                    (2016, 'Banaba', 114, 1),array
                    (2017, 'Beru', 114, 1),array
                    (2018, 'Butaritari', 114, 1),array
                    (2019, 'Kiritimati', 114, 1),array
                    (2020, 'Kuria', 114, 1),array
                    (2021, 'Maiana', 114, 1),array
                    (2022, 'Makin', 114, 1),array
                    (2023, 'Marakei', 114, 1),array
                    (2024, 'Nikunau', 114, 1),array
                    (2025, 'Nonouti', 114, 1),array
                    (2026, 'Onotoa', 114, 1),array
                    (2027, 'Phoenix Islands', 114, 1),array
                    (2028, 'Tabiteuea North', 114, 1),array
                    (2029, 'Tabiteuea South', 114, 1),array
                    (2030, 'Tabuaeran', 114, 1),array
                    (2031, 'Tamana', 114, 1),array
                    (2032, 'Tarawa North', 114, 1),array
                    (2033, 'Tarawa South', 114, 1),array
                    (2034, 'Teraina', 114, 1),array
                    (2035, 'Chagangdo', 115, 1),array
                    (2036, 'Hamgyeongbukto', 115, 1),array
                    (2037, 'Hamgyeongnamdo', 115, 1),array
                    (2038, 'Hwanghaebukto', 115, 1),array
                    (2039, 'Hwanghaenamdo', 115, 1),array
                    (2040, 'Kaeseong', 115, 1),array
                    (2041, 'Kangweon', 115, 1),array
                    (2042, 'Nampo', 115, 1),array
                    (2043, 'Pyeonganbukto', 115, 1),array
                    (2044, 'Pyeongannamdo', 115, 1),array
                    (2045, 'Pyeongyang', 115, 1),array
                    (2046, 'Yanggang', 115, 1),array
                    (2047, 'Busan', 116, 1),array
                    (2048, 'Cheju', 116, 1),array
                    (2049, 'Chollabuk', 116, 1),array
                    (2050, 'Chollanam', 116, 1),array
                    (2051, 'Chungbuk', 116, 1),array
                    (2052, 'Chungcheongbuk', 116, 1),array
                    (2053, 'Chungcheongnam', 116, 1),array
                    (2054, 'Chungnam', 116, 1),array
                    (2055, 'Daegu', 116, 1),array
                    (2056, 'Gangwon-do', 116, 1),array
                    (2057, 'Goyang-si', 116, 1),array
                    (2058, 'Gyeonggi-do', 116, 1),array
                    (2059, 'Gyeongsang ', 116, 1),array
                    (2060, 'Gyeongsangnam-do', 116, 1),array
                    (2061, 'Incheon', 116, 1),array
                    (2062, 'Jeju-Si', 116, 1),array
                    (2063, 'Jeonbuk', 116, 1),array
                    (2064, 'Kangweon', 116, 1),array
                    (2065, 'Kwangju', 116, 1),array
                    (2066, 'Kyeonggi', 116, 1),array
                    (2067, 'Kyeongsangbuk', 116, 1),array
                    (2068, 'Kyeongsangnam', 116, 1),array
                    (2069, 'Kyonggi-do', 116, 1),array
                    (2070, 'Kyungbuk-Do', 116, 1),array
                    (2071, 'Kyunggi-Do', 116, 1),array
                    (2072, 'Kyunggi-do', 116, 1),array
                    (2073, 'Pusan', 116, 1),array
                    (2074, 'Seoul', 116, 1),array
                    (2075, 'Sudogwon', 116, 1),array
                    (2076, 'Taegu', 116, 1),array
                    (2077, 'Taejeon', 116, 1),array
                    (2078, 'Taejon-gwangyoksi', 116, 1),array
                    (2079, 'Ulsan', 116, 1),array
                    (2080, 'Wonju', 116, 1),array
                    (2081, 'gwangyoksi', 116, 1),array
                    (2082, 'Al Asimah', 117, 1),array
                    (2083, 'Hawalli', 117, 1),array
                    (2084, 'Mishref', 117, 1),array
                    (2085, 'Qadesiya', 117, 1),array
                    (2086, 'Safat', 117, 1),array
                    (2087, 'Salmiya', 117, 1),array
                    (2088, 'al-Ahmadi', 117, 1),array
                    (2089, 'al-Farwaniyah', 117, 1),array
                    (2090, 'al-Jahra', 117, 1),array
                    (2091, 'al-Kuwayt', 117, 1),array
                    (2092, 'Batken', 118, 1),array
                    (2093, 'Bishkek', 118, 1),array
                    (2094, 'Chui', 118, 1),array
                    (2095, 'Issyk-Kul', 118, 1),array
                    (2096, 'Jalal-Abad', 118, 1),array
                    (2097, 'Naryn', 118, 1),array
                    (2098, 'Osh', 118, 1),array
                    (2099, 'Talas', 118, 1),array
                    (2100, 'Attopu', 119, 1),array
                    (2101, 'Bokeo', 119, 1),array
                    (2102, 'Bolikhamsay', 119, 1),array
                    (2103, 'Champasak', 119, 1),array
                    (2104, 'Houaphanh', 119, 1),array
                    (2105, 'Khammouane', 119, 1),array
                    (2106, 'Luang Nam Tha', 119, 1),array
                    (2107, 'Luang Prabang', 119, 1),array
                    (2108, 'Oudomxay', 119, 1),array
                    (2109, 'Phongsaly', 119, 1),array
                    (2110, 'Saravan', 119, 1),array
                    (2111, 'Savannakhet', 119, 1),array
                    (2112, 'Sekong', 119, 1),array
                    (2113, 'Viangchan Prefecture', 119, 1),array
                    (2114, 'Viangchan Province', 119, 1),array
                    (2115, 'Xaignabury', 119, 1),array
                    (2116, 'Xiang Khuang', 119, 1),array
                    (2117, 'Aizkraukles', 120, 1),array
                    (2118, 'Aluksnes', 120, 1),array
                    (2119, 'Balvu', 120, 1),array
                    (2120, 'Bauskas', 120, 1),array
                    (2121, 'Cesu', 120, 1),array
                    (2122, 'Daugavpils', 120, 1),array
                    (2123, 'Daugavpils City', 120, 1),array
                    (2124, 'Dobeles', 120, 1),array
                    (2125, 'Gulbenes', 120, 1),array
                    (2126, 'Jekabspils', 120, 1),array
                    (2127, 'Jelgava', 120, 1),array
                    (2128, 'Jelgavas', 120, 1),array
                    (2129, 'Jurmala City', 120, 1),array
                    (2130, 'Kraslavas', 120, 1),array
                    (2131, 'Kuldigas', 120, 1),array
                    (2132, 'Liepaja', 120, 1),array
                    (2133, 'Liepajas', 120, 1),array
                    (2134, 'Limbazhu', 120, 1),array
                    (2135, 'Ludzas', 120, 1),array
                    (2136, 'Madonas', 120, 1),array
                    (2137, 'Ogres', 120, 1),array
                    (2138, 'Preilu', 120, 1),array
                    (2139, 'Rezekne', 120, 1),array
                    (2140, 'Rezeknes', 120, 1),array
                    (2141, 'Riga', 120, 1),array
                    (2142, 'Rigas', 120, 1),array
                    (2143, 'Saldus', 120, 1),array
                    (2144, 'Talsu', 120, 1),array
                    (2145, 'Tukuma', 120, 1),array
                    (2146, 'Valkas', 120, 1),array
                    (2147, 'Valmieras', 120, 1),array
                    (2148, 'Ventspils', 120, 1),array
                    (2149, 'Ventspils City', 120, 1),array
                    (2150, 'Beirut', 121, 1),array
                    (2151, 'Jabal Lubnan', 121, 1),array
                    (2152, 'Mohafazat Liban-Nord', 121, 1),array
                    (2153, 'Mohafazat Mont-Liban', 121, 1),array
                    (2154, 'Sidon', 121, 1),array
                    (2155, 'al-Biqa', 121, 1),array
                    (2156, 'al-Janub', 121, 1),array
                    (2157, 'an-Nabatiyah', 121, 1),array
                    (2158, 'ash-Shamal', 121, 1),array
                    (2159, 'Berea', 122, 1),array
                    (2160, 'Butha-Buthe', 122, 1),array
                    (2161, 'Leribe', 122, 1),array
                    (2162, 'Mafeteng', 122, 1),array
                    (2163, 'Maseru', 122, 1),array
                    (2164, 'Mohales Hoek', 122, 1),array
                    (2165, 'Mokhotlong', 122, 1),array
                    (2166, 'Qachas Nek', 122, 1),array
                    (2167, 'Quthing', 122, 1),array
                    (2168, 'Thaba-Tseka', 122, 1),array
                    (2169, 'Bomi', 123, 1),array
                    (2170, 'Bong', 123, 1),array
                    (2171, 'Grand Bassa', 123, 1),array
                    (2172, 'Grand Cape Mount', 123, 1),array
                    (2173, 'Grand Gedeh', 123, 1),array
                    (2174, 'Loffa', 123, 1),array
                    (2175, 'Margibi', 123, 1),array
                    (2176, 'Maryland and Grand Kru', 123, 1),array
                    (2177, 'Montserrado', 123, 1),array
                    (2178, 'Nimba', 123, 1),array
                    (2179, 'Rivercess', 123, 1),array
                    (2180, 'Sinoe', 123, 1),array
                    (2181, 'Ajdabiya', 124),array
                    
                    (2182, 'Fezzan', 124, 1),array
                    (2183, 'Banghazi', 124, 1),array
                    (2184, 'Darnah', 124, 1),array
                    (2185, 'Ghadamis', 124, 1),array
                    (2186, 'Gharyan', 124, 1),array
                    (2187, 'Misratah', 124, 1),array
                    (2188, 'Murzuq', 124, 1),array
                    (2189, 'Sabha', 124, 1),array
                    (2190, 'Sawfajjin', 124, 1),array
                    (2191, 'Surt', 124, 1),array
                    (2192, 'Tarabulus', 124, 1),array
                    (2193, 'Tarhunah', 124, 1),array
                    (2194, 'Tripolitania', 124, 1),array
                    (2195, 'Tubruq', 124, 1),array
                    (2196, 'Yafran', 124, 1),array
                    (2197, 'Zlitan', 124, 1),array
                    (2198, 'al-Aziziyah', 124, 1),array
                    (2199, 'al-Fatih', 124, 1),array
                    (2200, 'al-Jabal al Akhdar', 124, 1),array
                    (2201, 'al-Jufrah', 124, 1),array
                    (2202, 'al-Khums', 124, 1),array
                    (2203, 'al-Kufrah', 124, 1),array
                    (2204, 'an-Nuqat al-Khams', 124, 1),array
                    (2205, 'ash-Shati', 124, 1),array
                    (2206, 'az-Zawiyah', 124, 1),array
                    (2207, 'Balzers', 125, 1),array
                    (2208, 'Eschen', 125, 1),array
                    (2209, 'Gamprin', 125, 1),array
                    (2210, 'Mauren', 125, 1),array
                    (2211, 'Planken', 125, 1),array
                    (2212, 'Ruggell', 125, 1),array
                    (2213, 'Schaan', 125, 1),array
                    (2214, 'Schellenberg', 125, 1),array
                    (2215, 'Triesen', 125, 1),array
                    (2216, 'Triesenberg', 125, 1),array
                    (2217, 'Vaduz', 125, 1),array
                    (2218, 'Alytaus', 126, 1),array
                    (2219, 'Anyksciai', 126, 1),array
                    (2220, 'Kauno', 126, 1),array
                    (2221, 'Klaipedos', 126, 1),array
                    (2222, 'Marijampoles', 126, 1),array
                    (2223, 'Panevezhio', 126, 1),array
                    (2224, 'Panevezys', 126, 1),array
                    (2225, 'Shiauliu', 126, 1),array
                    (2226, 'Taurages', 126, 1),array
                    (2227, 'Telshiu', 126, 1),array
                    (2228, 'Telsiai', 126, 1),array
                    (2229, 'Utenos', 126, 1),array
                    (2230, 'Vilniaus', 126, 1),array
                    (2231, 'Capellen', 127, 1),array
                    (2232, 'Clervaux', 127, 1),array
                    (2233, 'Diekirch', 127, 1),array
                    (2234, 'Echternach', 127, 1),array
                    (2235, 'Esch-sur-Alzette', 127, 1),array
                    (2236, 'Grevenmacher', 127, 1),array
                    (2237, 'Luxembourg', 127, 1),array
                    (2238, 'Mersch', 127, 1),array
                    (2239, 'Redange', 127, 1),array
                    (2240, 'Remich', 127, 1),array
                    (2241, 'Vianden', 127, 1),array
                    (2242, 'Wiltz', 127, 1),array
                    (2243, 'Macau', 128, 1),array
                    (2244, 'Berovo', 129, 1),array
                    (2245, 'Bitola', 129, 1),array
                    (2246, 'Brod', 129, 1),array
                    (2247, 'Debar', 129, 1),array
                    (2248, 'Delchevo', 129, 1),array
                    (2249, 'Demir Hisar', 129, 1),array
                    (2250, 'Gevgelija', 129, 1),array
                    (2251, 'Gostivar', 129, 1),array
                    (2252, 'Kavadarci', 129, 1),array
                    (2253, 'Kichevo', 129, 1),array
                    (2254, 'Kochani', 129, 1),array
                    (2255, 'Kratovo', 129, 1),array
                    (2256, 'Kriva Palanka', 129, 1),array
                    (2257, 'Krushevo', 129, 1),array
                    (2258, 'Kumanovo', 129, 1),array
                    (2259, 'Negotino', 129, 1),array
                    (2260, 'Ohrid', 129, 1),array
                    (2261, 'Prilep', 129, 1),array
                    (2262, 'Probishtip', 129, 1),array
                    (2263, 'Radovish', 129, 1),array
                    (2264, 'Resen', 129, 1),array
                    (2265, 'Shtip', 129, 1),array
                    (2266, 'Skopje', 129, 1),array
                    (2267, 'Struga', 129, 1),array
                    (2268, 'Strumica', 129, 1),array
                    (2269, 'Sveti Nikole', 129, 1),array
                    (2270, 'Tetovo', 129, 1),array
                    (2271, 'Valandovo', 129, 1),array
                    (2272, 'Veles', 129, 1),array
                    (2273, 'Vinica', 129, 1),array
                    (2274, 'Antananarivo', 130, 1),array
                    (2275, 'Antsiranana', 130, 1),array
                    (2276, 'Fianarantsoa', 130, 1),array
                    (2277, 'Mahajanga', 130, 1),array
                    (2278, 'Toamasina', 130, 1),array
                    (2279, 'Toliary', 130, 1),array
                    (2280, 'Balaka', 131, 1),array
                    (2281, 'Blantyre City', 131, 1),array
                    (2282, 'Chikwawa', 131, 1),array
                    (2283, 'Chiradzulu', 131, 1),array
                    (2284, 'Chitipa', 131, 1),array
                    (2285, 'Dedza', 131, 1),array
                    (2286, 'Dowa', 131, 1),array
                    (2287, 'Karonga', 131, 1),array
                    (2288, 'Kasungu', 131, 1),array
                    (2289, 'Lilongwe City', 131, 1),array
                    (2290, 'Machinga', 131, 1),array
                    (2291, 'Mangochi', 131, 1),array
                    (2292, 'Mchinji', 131, 1),array
                    (2293, 'Mulanje', 131, 1),array
                    (2294, 'Mwanza', 131, 1),array
                    (2295, 'Mzimba', 131, 1),array
                    (2296, 'Mzuzu City', 131, 1),array
                    (2297, 'Nkhata Bay', 131, 1),array
                    (2298, 'Nkhotakota', 131, 1),array
                    (2299, 'Nsanje', 131, 1),array
                    (2300, 'Ntcheu', 131, 1),array
                    (2301, 'Ntchisi', 131, 1),array
                    (2302, 'Phalombe', 131, 1),array
                    (2303, 'Rumphi', 131, 1),array
                    (2304, 'Salima', 131, 1),array
                    (2305, 'Thyolo', 131, 1),array
                    (2306, 'Zomba Municipality', 131, 1),array
                    (2307, 'Johor', 132, 1),array
                    (2308, 'Kedah', 132, 1),array
                    (2309, 'Kelantan', 132, 1),array
                    (2310, 'Kuala Lumpur', 132, 1),array
                    (2311, 'Labuan', 132, 1),array
                    (2312, 'Melaka', 132, 1),array
                    (2313, 'Negeri Johor', 132, 1),array
                    (2314, 'Negeri Sembilan', 132, 1),array
                    (2315, 'Pahang', 132, 1),array
                    (2316, 'Penang', 132, 1),array
                    (2317, 'Perak', 132, 1),array
                    (2318, 'Perlis', 132, 1),array
                    (2319, 'Pulau Pinang', 132, 1),array
                    (2320, 'Sabah', 132, 1),array
                    (2321, 'Sarawak', 132, 1),array
                    (2322, 'Selangor', 132, 1),array
                    (2323, 'Sembilan', 132, 1),array
                    (2324, 'Terengganu', 132, 1),array
                    (2325, 'Alif Alif', 133, 1),array
                    (2326, 'Alif Dhaal', 133, 1),array
                    (2327, 'Baa', 133, 1),array
                    (2328, 'Dhaal', 133, 1),array
                    (2329, 'Faaf', 133, 1),array
                    (2330, 'Gaaf Alif', 133, 1),array
                    (2331, 'Gaaf Dhaal', 133, 1),array
                    (2332, 'Ghaviyani', 133, 1),array
                    (2333, 'Haa Alif', 133, 1),array
                    (2334, 'Haa Dhaal', 133, 1),array
                    (2335, 'Kaaf', 133, 1),array
                    (2336, 'Laam', 133, 1),array
                    (2337, 'Lhaviyani', 133, 1),array
                    (2338, 'Male', 133, 1),array
                    (2339, 'Miim', 133, 1),array
                    (2340, 'Nuun', 133, 1),array
                    (2341, 'Raa', 133, 1),array
                    (2342, 'Shaviyani', 133, 1),array
                    (2343, 'Siin', 133, 1),array
                    (2344, 'Thaa', 133, 1),array
                    (2345, 'Vaav', 133, 1),array
                    (2346, 'Bamako', 134, 1),array
                    (2347, 'Gao', 134, 1),array
                    (2348, 'Kayes', 134, 1),array
                    (2349, 'Kidal', 134, 1),array
                    (2350, 'Koulikoro', 134, 1),array
                    (2351, 'Mopti', 134, 1),array
                    (2352, 'Segou', 134, 1),array
                    (2353, 'Sikasso', 134, 1),array
                    (2354, 'Tombouctou', 134, 1),array
                    (2355, 'Gozo and Comino', 135, 1),array
                    (2356, 'Inner Harbour', 135, 1),array
                    (2357, 'Northern', 135, 1),array
                    (2358, 'Outer Harbour', 135, 1),array
                    (2359, 'South Eastern', 135, 1),array
                    (2360, 'Valletta', 135, 1),array
                    (2361, 'Western', 135, 1),array
                    (2362, 'Castletown', 136, 1),array
                    (2363, 'Douglas', 136, 1),array
                    (2364, 'Laxey', 136, 1),array
                    (2365, 'Onchan', 136, 1),array
                    (2366, 'Peel', 136, 1),array
                    (2367, 'Port Erin', 136, 1),array
                    (2368, 'Port Saint Mary', 136, 1),array
                    (2369, 'Ramsey', 136, 1),array
                    (2370, 'Ailinlaplap', 137, 1),array
                    (2371, 'Ailuk', 137, 1),array
                    (2372, 'Arno', 137, 1),array
                    (2373, 'Aur', 137, 1),array
                    (2374, 'Bikini', 137, 1),array
                    (2375, 'Ebon', 137, 1),array
                    (2376, 'Enewetak', 137, 1),array
                    (2377, 'Jabat', 137, 1),array
                    (2378, 'Jaluit', 137, 1),array
                    (2379, 'Kili', 137, 1),array
                    (2380, 'Kwajalein', 137, 1),array
                    (2381, 'Lae', 137, 1),array
                    (2382, 'Lib', 137, 1),array
                    (2383, 'Likiep', 137, 1),array
                    (2384, 'Majuro', 137, 1),array
                    (2385, 'Maloelap', 137, 1),array
                    (2386, 'Mejit', 137, 1),array
                    (2387, 'Mili', 137, 1),array
                    (2388, 'Namorik', 137, 1),array
                    (2389, 'Namu', 137, 1),array
                    (2390, 'Rongelap', 137, 1),array
                    (2391, 'Ujae', 137, 1),array
                    (2392, 'Utrik', 137, 1),array
                    (2393, 'Wotho', 137, 1),array
                    (2394, 'Wotje', 137, 1),array
                    (2395, 'Fort-de-France', 138, 1),array
                    (2396, 'La Trinite', 138, 1),array
                    (2397, 'Le Marin', 138, 1),array
                    (2398, 'Saint-Pierre', 138, 1),array
                    (2399, 'Adrar', 139, 1),array
                    (2400, 'Assaba', 139, 1),array
                    (2401, 'Brakna', 139, 1),array
                    (2402, 'Dhakhlat Nawadibu', 139, 1),array
                    (2403, 'Hudh-al-Gharbi', 139, 1),array
                    (2404, 'Hudh-ash-Sharqi', 139, 1),array
                    (2405, 'Inshiri', 139, 1),array
                    (2406, 'Nawakshut', 139, 1),array
                    (2407, 'Qidimagha', 139, 1),array
                    (2408, 'Qurqul', 139, 1),array
                    (2409, 'Taqant', 139, 1),array
                    (2410, 'Tiris Zammur', 139, 1),array
                    (2411, 'Trarza', 139, 1),array
                    (2412, 'Black River', 140, 1),array
                    (2413, 'Eau Coulee', 140, 1),array
                    (2414, 'Flacq', 140, 1),array
                    (2415, 'Floreal', 140, 1),array
                    (2416, 'Grand Port', 140, 1),array
                    (2417, 'Moka', 140, 1),array
                    (2418, 'Pamplempousses', 140, 1),array
                    (2419, 'Plaines Wilhelm', 140, 1),array
                    (2420, 'Port Louis', 140, 1),array
                    (2421, 'Riviere du Rempart', 140, 1),array
                    (2422, 'Rodrigues', 140, 1),array
                    (2423, 'Rose Hill', 140, 1),array
                    (2424, 'Savanne', 140, 1),array
                    (2425, 'Mayotte', 141, 1),array
                    (2426, 'Pamanzi', 141, 1),array
                    (2427, 'Aguascalientes', 142, 1),array
                    (2428, 'Baja California', 142, 1),array
                    (2429, 'Baja California Sur', 142, 1),array
                    (2430, 'Campeche', 142, 1),array
                    (2431, 'Chiapas', 142, 1),array
                    (2432, 'Chihuahua', 142, 1),array
                    (2433, 'Coahuila', 142, 1),array
                    (2434, 'Colima', 142, 1),array
                    (2435, 'Distrito Federal', 142, 1),array
                    (2436, 'Durango', 142, 1),array
                    (2437, 'Estado de Mexico', 142, 1),array
                    (2438, 'Guanajuato', 142, 1),array
                    (2439, 'Guerrero', 142, 1),array
                    (2440, 'Hidalgo', 142, 1),array
                    (2441, 'Jalisco', 142, 1),array
                    (2442, 'Mexico', 142, 1),array
                    (2443, 'Michoacan', 142, 1),array
                    (2444, 'Morelos', 142, 1),array
                    (2445, 'Nayarit', 142, 1),array
                    (2446, 'Nuevo Leon', 142, 1),array
                    (2447, 'Oaxaca', 142, 1),array
                    (2448, 'Puebla', 142, 1),array
                    (2449, 'Queretaro', 142, 1),array
                    (2450, 'Quintana Roo', 142, 1),array
                    (2451, 'San Luis Potosi', 142, 1),array
                    (2452, 'Sinaloa', 142, 1),array
                    (2453, 'Sonora', 142, 1),array
                    (2454, 'Tabasco', 142, 1),array
                    (2455, 'Tamaulipas', 142, 1),array
                    (2456, 'Tlaxcala', 142, 1),array
                    (2457, 'Veracruz', 142, 1),array
                    (2458, 'Yucatan', 142, 1),array
                    (2459, 'Zacatecas', 142, 1),array
                    (2460, 'Chuuk', 143, 1),array
                    (2461, 'Kusaie', 143, 1),array
                    (2462, 'Pohnpei', 143, 1),array
                    (2463, 'Yap', 143, 1),array
                    (2464, 'Balti', 144, 1),array
                    (2465, 'Cahul', 144, 1),array
                    (2466, 'Chisinau', 144, 1),array
                    (2467, 'Chisinau Oras', 144, 1),array
                    (2468, 'Edinet', 144, 1),array
                    (2469, 'Gagauzia', 144, 1),array
                    (2470, 'Lapusna', 144, 1),array
                    (2471, 'Orhei', 144, 1),array
                    (2472, 'Soroca', 144, 1),array
                    (2473, 'Taraclia', 144, 1),array
                    (2474, 'Tighina', 144, 1),array
                    (2475, 'Transnistria', 144, 1),array
                    (2476, 'Ungheni', 144, 1),array
                    (2477, 'Fontvieille', 145, 1),array
                    (2478, 'La Condamine', 145, 1),array
                    (2479, 'Monaco-Ville', 145, 1),array
                    (2480, 'Monte Carlo', 145, 1),array
                    (2481, 'Arhangaj', 146, 1),array
                    (2482, 'Bajan-Olgij', 146, 1),array
                    (2483, 'Bajanhongor', 146, 1),array
                    (2484, 'Bulgan', 146, 1),array
                    (2485, 'Darhan-Uul', 146, 1),array
                    (2486, 'Dornod', 146, 1),array
                    (2487, 'Dornogovi', 146, 1),array
                    (2488, 'Dundgovi', 146, 1),array
                    (2489, 'Govi-Altaj', 146, 1),array
                    (2490, 'Govisumber', 146, 1),array
                    (2491, 'Hentij', 146, 1),array
                    (2492, 'Hovd', 146, 1),array
                    (2493, 'Hovsgol', 146, 1),array
                    (2494, 'Omnogovi', 146, 1),array
                    (2495, 'Orhon', 146, 1),array
                    (2496, 'Ovorhangaj', 146, 1),array
                    (2497, 'Selenge', 146, 1),array
                    (2498, 'Suhbaatar', 146, 1),array
                    (2499, 'Tov', 146, 1),array
                    (2500, 'Ulaanbaatar', 146, 1),array
                    (2501, 'Uvs', 146, 1),array
                    (2502, 'Zavhan', 146, 1),array
                    (2503, 'Montserrat', 147, 1),array
                    (2504, 'Agadir', 148, 1),array
                    (2505, 'Casablanca', 148, 1),array
                    (2506, 'Chaouia-Ouardigha', 148, 1),array
                    (2507, 'Doukkala-Abda', 148, 1),array
                    (2508, 'Fes-Boulemane', 148, 1),array
                    (2509, 'Gharb-Chrarda-Beni Hssen', 148, 1),array
                    (2510, 'Guelmim', 148, 1),array
                    (2511, 'Kenitra', 148, 1),array
                    (2512, 'Marrakech-Tensift-Al Haouz', 148, 1),array
                    (2513, 'Meknes-Tafilalet', 148, 1),array
                    (2514, 'Oriental', 148, 1),array
                    (2515, 'Oujda', 148, 1),array
                    (2516, 'Province de Tanger', 148, 1),array
                    (2517, 'Rabat-Sale-Zammour-Zaer', 148, 1),array
                    (2518, 'Sala Al Jadida', 148, 1),array
                    (2519, 'Settat', 148, 1),array
                    (2520, 'Souss Massa-Draa', 148, 1),array
                    (2521, 'Tadla-Azilal', 148, 1),array
                    (2522, 'Tangier-Tetouan', 148, 1),array
                    (2523, 'Taza-Al Hoceima-Taounate', 148, 1),array
                    (2524, 'Wilaya de Casablanca', 148, 1),array
                    (2525, 'Wilaya de Rabat-Sale', 148, 1),array
                    (2526, 'Cabo Delgado', 149, 1),array
                    (2527, 'Gaza', 149, 1),array
                    (2528, 'Inhambane', 149, 1),array
                    (2529, 'Manica', 149, 1),array
                    (2530, 'Maputo', 149, 1),array
                    (2531, 'Maputo Provincia', 149, 1),array
                    (2532, 'Nampula', 149, 1),array
                    (2533, 'Niassa', 149, 1),array
                    (2534, 'Sofala', 149, 1),array
                    (2535, 'Tete', 149, 1),array
                    (2536, 'Zambezia', 149, 1),array
                    (2537, 'Ayeyarwady', 150, 1),array
                    (2538, 'Bago', 150, 1),array
                    (2539, 'Chin', 150, 1),array
                    (2540, 'Kachin', 150, 1),array
                    (2541, 'Kayah', 150, 1),array
                    (2542, 'Kayin', 150, 1),array
                    (2543, 'Magway', 150, 1),array
                    (2544, 'Mandalay', 150, 1),array
                    (2545, 'Mon', 150, 1),array
                    (2546, 'Nay Pyi Taw', 150, 1),array
                    (2547, 'Rakhine', 150, 1),array
                    (2548, 'Sagaing', 150, 1),array
                    (2549, 'Shan', 150, 1),array
                    (2550, 'Tanintharyi', 150, 1),array
                    (2551, 'Yangon', 150, 1),array
                    (2552, 'Caprivi', 151, 1),array
                    (2553, 'Erongo', 151, 1),array
                    (2554, 'Hardap', 151, 1),array
                    (2555, 'Karas', 151, 1),array
                    (2556, 'Kavango', 151, 1),array
                    (2557, 'Khomas', 151, 1),array
                    (2558, 'Kunene', 151, 1),array
                    (2559, 'Ohangwena', 151, 1),array
                    (2560, 'Omaheke', 151, 1),array
                    (2561, 'Omusati', 151, 1),array
                    (2562, 'Oshana', 151, 1),array
                    (2563, 'Oshikoto', 151, 1),array
                    (2564, 'Otjozondjupa', 151, 1),array
                    (2565, 'Yaren', 152, 1),array
                    (2566, 'Bagmati', 153, 1),array
                    (2567, 'Bheri', 153, 1),array
                    (2568, 'Dhawalagiri', 153, 1),array
                    (2569, 'Gandaki', 153, 1),array
                    (2570, 'Janakpur', 153, 1),array
                    (2571, 'Karnali', 153, 1),array
                    (2572, 'Koshi', 153, 1),array
                    (2573, 'Lumbini', 153, 1),array
                    (2574, 'Mahakali', 153, 1),array
                    (2575, 'Mechi', 153, 1),array
                    (2576, 'Narayani', 153, 1),array
                    (2577, 'Rapti', 153, 1),array
                    (2578, 'Sagarmatha', 153, 1),array
                    (2579, 'Seti', 153, 1),array
                    (2580, 'Bonaire', 154, 1),array
                    (2581, 'Curacao', 154, 1),array
                    (2582, 'Saba', 154, 1),array
                    (2583, 'Sint Eustatius', 154, 1),array
                    (2584, 'Sint Maarten', 154, 1),array
                    (2585, 'Amsterdam', 155, 1),array
                    (2586, 'Benelux', 155, 1),array
                    (2587, 'Drenthe', 155, 1),array
                    (2588, 'Flevoland', 155, 1),array
                    (2589, 'Friesland', 155, 1),array
                    (2590, 'Gelderland', 155, 1),array
                    (2591, 'Groningen', 155, 1),array
                    (2592, 'Limburg', 155, 1),array
                    (2593, 'Noord-Brabant', 155, 1),array
                    (2594, 'Noord-Holland', 155, 1),array
                    (2595, 'Overijssel', 155, 1),array
                    (2596, 'South Holland', 155, 1),array
                    (2597, 'Utrecht', 155, 1),array
                    (2598, 'Zeeland', 155, 1),array
                    (2599, 'Zuid-Holland', 155, 1),array
                    (2600, 'Iles', 156, 1),array
                    (2601, 'Nord', 156, 1),array
                    (2602, 'Sud', 156, 1),array
                    (2603, 'Area Outside Region', 157, 1),array
                    (2604, 'Auckland', 157, 1),array
                    (2605, 'Bay of Plenty', 157, 1),array
                    (2606, 'Canterbury', 157, 1),array
                    (2607, 'Christchurch', 157, 1),array
                    (2608, 'Gisborne', 157, 1),array
                    (2609, 'Hawkes Bay', 157, 1),array
                    (2610, 'Manawatu-Wanganui', 157, 1),array
                    (2611, 'Marlborough', 157, 1),array
                    (2612, 'Nelson', 157, 1),array
                    (2613, 'Northland', 157, 1),array
                    (2614, 'Otago', 157, 1),array
                    (2615, 'Rodney', 157, 1),array
                    (2616, 'Southland', 157, 1),array
                    (2617, 'Taranaki', 157, 1),array
                    (2618, 'Tasman', 157, 1),array
                    (2619, 'Waikato', 157, 1),array
                    (2620, 'Wellington', 157, 1),array
                    (2621, 'West Coast', 157, 1),array
                    (2622, 'Atlantico Norte', 158, 1),array
                    (2623, 'Atlantico Sur', 158, 1),array
                    (2624, 'Boaco', 158, 1),array
                    (2625, 'Carazo', 158, 1),array
                    (2626, 'Chinandega', 158, 1),array
                    (2627, 'Chontales', 158, 1),array
                    (2628, 'Esteli', 158, 1),array
                    (2629, 'Granada', 158, 1),array
                    (2630, 'Jinotega', 158, 1),array
                    (2631, 'Leon', 158, 1),array
                    (2632, 'Madriz', 158, 1),array
                    (2633, 'Managua', 158, 1),array
                    (2634, 'Masaya', 158, 1),array
                    (2635, 'Matagalpa', 158, 1),array
                    (2636, 'Nueva Segovia', 158, 1),array
                    (2637, 'Rio San Juan', 158, 1),array
                    (2638, 'Rivas', 158, 1),array
                    (2639, 'Agadez', 159, 1),array
                    (2640, 'Diffa', 159, 1),array
                    (2641, 'Dosso', 159, 1),array
                    (2642, 'Maradi', 159, 1),array
                    (2643, 'Niamey', 159, 1),array
                    (2644, 'Tahoua', 159, 1),array
                    (2645, 'Tillabery', 159, 1),array
                    (2646, 'Zinder', 159, 1),array
                    (2647, 'Abia', 160, 1),array
                    (2648, 'Abuja Federal Capital Territor', 160, 1),array
                    (2649, 'Adamawa', 160, 1),array
                    (2650, 'Akwa Ibom', 160, 1),array
                    (2651, 'Anambra', 160, 1),array
                    (2652, 'Bauchi', 160, 1),array
                    (2653, 'Bayelsa', 160, 1),array
                    (2654, 'Benue', 160, 1),array
                    (2655, 'Borno', 160, 1),array
                    (2656, 'Cross River', 160, 1),array
                    (2657, 'Delta', 160, 1),array
                    (2658, 'Ebonyi', 160, 1),array
                    (2659, 'Edo', 160, 1),array
                    (2660, 'Ekiti', 160, 1),array
                    (2661, 'Enugu', 160, 1),array
                    (2662, 'Gombe', 160, 1),array
                    (2663, 'Imo', 160, 1),array
                    (2664, 'Jigawa', 160, 1),array
                    (2665, 'Kaduna', 160, 1),array
                    (2666, 'Kano', 160, 1),array
                    (2667, 'Katsina', 160, 1),array
                    (2668, 'Kebbi', 160, 1),array
                    (2669, 'Kogi', 160, 1),array
                    (2670, 'Kwara', 160, 1),array
                    (2671, 'Lagos', 160, 1),array
                    (2672, 'Nassarawa', 160, 1),array
                    (2673, 'Niger', 160, 1),array
                    (2674, 'Ogun', 160, 1),array
                    (2675, 'Ondo', 160, 1),array
                    (2676, 'Osun', 160, 1),array
                    (2677, 'Oyo', 160, 1),array
                    (2678, 'Plateau', 160, 1),array
                    (2679, 'Rivers', 160, 1),array
                    (2680, 'Sokoto', 160, 1),array
                    (2681, 'Taraba', 160, 1),array
                    (2682, 'Yobe', 160, 1),array
                    (2683, 'Zamfara', 160, 1),array
                    (2684, 'Niue', 161, 1),array
                    (2685, 'Norfolk Island', 162, 1),array
                    (2686, 'Northern Islands', 163, 1),array
                    (2687, 'Rota', 163, 1),array
                    (2688, 'Saipan', 163, 1),array
                    (2689, 'Tinian', 163, 1),array
                    (2690, 'Akershus', 164, 1),array
                    (2691, 'Aust Agder', 164, 1),array
                    (2692, 'Bergen', 164, 1),array
                    (2693, 'Buskerud', 164, 1),array
                    (2694, 'Finnmark', 164, 1),array
                    (2695, 'Hedmark', 164, 1),array
                    (2696, 'Hordaland', 164, 1),array
                    (2697, 'Moere og Romsdal', 164, 1),array
                    (2698, 'Nord Trondelag', 164, 1),array
                    (2699, 'Nordland', 164, 1),array
                    (2700, 'Oestfold', 164, 1),array
                    (2701, 'Oppland', 164, 1),array
                    (2702, 'Oslo', 164, 1),array
                    (2703, 'Rogaland', 164, 1),array
                    (2704, 'Soer Troendelag', 164, 1),array
                    (2705, 'Sogn og Fjordane', 164, 1),array
                    (2706, 'Stavern', 164, 1),array
                    (2707, 'Sykkylven', 164, 1),array
                    (2708, 'Telemark', 164, 1),array
                    (2709, 'Troms', 164, 1),array
                    (2710, 'Vest Agder', 164, 1),array
                    (2711, 'Vestfold', 164, 1),array
                    (2712, 'ÃƒÂ˜stfold', 164, 1),array
                    (2713, 'Al Buraimi', 165, 1),array
                    (2714, 'Dhufar', 165, 1),array
                    (2715, 'Masqat', 165, 1),array
                    (2716, 'Musandam', 165, 1),array
                    (2717, 'Rusayl', 165, 1),array
                    (2718, 'Wadi Kabir', 165, 1),array
                    (2719, 'ad-Dakhiliyah', 165, 1),array
                    (2720, 'adh-Dhahirah', 165, 1),array
                    (2721, 'al-Batinah', 165, 1),array
                    (2722, 'ash-Sharqiyah', 165, 1),array
                    (2723, 'Baluchistan', 166, 1),array
                    (2724, 'Federal Capital Area', 166, 1),array
                    (2725, 'Federally administered Tribal ', 166, 1),array
                    (2726, 'North-West Frontier', 166, 1),array
                    (2727, 'Northern Areas', 166, 1),array
                    (2728, 'Punjab', 166, 1),array
                    (2729, 'Sind', 166, 1),array
                    (2730, 'Aimeliik', 167, 1),array
                    (2731, 'Airai', 167, 1),array
                    (2732, 'Angaur', 167, 1),array
                    (2733, 'Hatobohei', 167, 1),array
                    (2734, 'Kayangel', 167, 1),array
                    (2735, 'Koror', 167, 1),array
                    (2736, 'Melekeok', 167, 1),array
                    (2737, 'Ngaraard', 167, 1),array
                    (2738, 'Ngardmau', 167, 1),array
                    (2739, 'Ngaremlengui', 167, 1),array
                    (2740, 'Ngatpang', 167, 1),array
                    (2741, 'Ngchesar', 167, 1),array
                    (2742, 'Ngerchelong', 167, 1),array
                    (2743, 'Ngiwal', 167, 1),array
                    (2744, 'Peleliu', 167, 1),array
                    (2745, 'Sonsorol', 167, 1),array
                    (2746, 'Ariha', 168, 1),array
                    (2747, 'Bayt Lahm', 168, 1),array
                    (2748, 'Bethlehem', 168, 1),array
                    (2749, 'Dayr-al-Balah', 168, 1),array
                    (2750, 'Ghazzah', 168, 1),array
                    (2751, 'Ghazzah ash-Shamaliyah', 168, 1),array
                    (2752, 'Janin', 168, 1),array
                    (2753, 'Khan Yunis', 168, 1),array
                    (2754, 'Nabulus', 168, 1),array
                    (2755, 'Qalqilyah', 168, 1),array
                    (2756, 'Rafah', 168, 1),array
                    (2757, 'Ram Allah wal-Birah', 168, 1),array
                    (2758, 'Salfit', 168, 1),array
                    (2759, 'Tubas', 168, 1),array
                    (2760, 'Tulkarm', 168, 1),array
                    (2761, 'al-Khalil', 168, 1),array
                    (2762, 'al-Quds', 168, 1),array
                    (2763, 'Bocas del Toro', 169, 1),array
                    (2764, 'Chiriqui', 169, 1),array
                    (2765, 'Cocle', 169, 1),array
                    (2766, 'Colon', 169, 1),array
                    (2767, 'Darien', 169, 1),array
                    (2768, 'Embera', 169, 1),array
                    (2769, 'Herrera', 169, 1),array
                    (2770, 'Kuna Yala', 169, 1),array
                    (2771, 'Los Santos', 169, 1),array
                    (2772, 'Ngobe Bugle', 169, 1),array
                    (2773, 'Panama', 169, 1),array
                    (2774, 'Veraguas', 169, 1),array
                    (2775, 'East New Britain', 170, 1),array
                    (2776, 'East Sepik', 170, 1),array
                    (2777, 'Eastern Highlands', 170, 1),array
                    (2778, 'Enga', 170, 1),array
                    (2779, 'Fly River', 170, 1),array
                    (2780, 'Gulf', 170, 1),array
                    (2781, 'Madang', 170, 1),array
                    (2782, 'Manus', 170, 1),array
                    (2783, 'Milne Bay', 170, 1),array
                    (2784, 'Morobe', 170, 1),array
                    (2785, 'National Capital District', 170, 1),array
                    (2786, 'New Ireland', 170, 1),array
                    (2787, 'North Solomons', 170, 1),array
                    (2788, 'Oro', 170, 1),array
                    (2789, 'Sandaun', 170, 1),array
                    (2790, 'Simbu', 170, 1),array
                    (2791, 'Southern Highlands', 170, 1),array
                    (2792, 'West New Britain', 170, 1),array
                    (2793, 'Western Highlands', 170, 1),array
                    (2794, 'Alto Paraguay', 171, 1),array
                    (2795, 'Alto Parana', 171, 1),array
                    (2796, 'Amambay', 171, 1),array
                    (2797, 'Asuncion', 171, 1),array
                    (2798, 'Boqueron', 171, 1),array
                    (2799, 'Caaguazu', 171, 1),array
                    (2800, 'Caazapa', 171, 1),array
                    (2801, 'Canendiyu', 171, 1),array
                    (2802, 'Central', 171, 1),array
                    (2803, 'Concepcion', 171, 1),array
                    (2804, 'Cordillera', 171, 1),array
                    (2805, 'Guaira', 171, 1),array
                    (2806, 'Itapua', 171, 1),array
                    (2807, 'Misiones', 171, 1),array
                    (2808, 'Neembucu', 171, 1),array
                    (2809, 'Paraguari', 171, 1),array
                    (2810, 'Presidente Hayes', 171, 1),array
                    (2811, 'San Pedro', 171, 1),array
                    (2812, 'Amazonas', 172, 1),array
                    (2813, 'Ancash', 172, 1),array
                    (2814, 'Apurimac', 172, 1),array
                    (2815, 'Arequipa', 172, 1),array
                    (2816, 'Ayacucho', 172, 1),array
                    (2817, 'Cajamarca', 172, 1),array
                    (2818, 'Cusco', 172, 1),array
                    (2819, 'Huancavelica', 172, 1),array
                    (2820, 'Huanuco', 172, 1),array
                    (2821, 'Ica', 172, 1),array
                    (2822, 'Junin', 172, 1),array
                    (2823, 'La Libertad', 172, 1),array
                    (2824, 'Lambayeque', 172, 1),array
                    (2825, 'Lima y Callao', 172, 1),array
                    (2826, 'Loreto', 172, 1),array
                    (2827, 'Madre de Dios', 172, 1),array
                    (2828, 'Moquegua', 172, 1),array
                    (2829, 'Pasco', 172, 1),array
                    (2830, 'Piura', 172, 1),array
                    (2831, 'Puno', 172, 1),array
                    (2832, 'San Martin', 172, 1),array
                    (2833, 'Tacna', 172, 1),array
                    (2834, 'Tumbes', 172, 1),array
                    (2835, 'Ucayali', 172, 1),array
                    (2836, 'Batangas', 173, 1),array
                    (2837, 'Bicol', 173, 1),array
                    (2838, 'Bulacan', 173, 1),array
                    (2839, 'Cagayan', 173, 1),array
                    (2840, 'Caraga', 173, 1),array
                    (2841, 'Central Luzon', 173, 1),array
                    (2842, 'Central Mindanao', 173, 1),array
                    (2843, 'Central Visayas', 173, 1),array
                    (2844, 'Cordillera', 173, 1),array
                    (2845, 'Davao', 173, 1),array
                    (2846, 'Eastern Visayas', 173, 1),array
                    (2847, 'Greater Metropolitan Area', 173, 1),array
                    (2848, 'Ilocos', 173, 1),array
                    (2849, 'Laguna', 173, 1),array
                    (2850, 'Luzon', 173, 1),array
                    (2851, 'Mactan', 173, 1),array
                    (2852, 'Metropolitan Manila Area', 173, 1),array
                    (2853, 'Muslim Mindanao', 173, 1),array
                    (2854, 'Northern Mindanao', 173, 1),array
                    (2855, 'Southern Mindanao', 173, 1),array
                    (2856, 'Southern Tagalog', 173, 1),array
                    (2857, 'Western Mindanao', 173, 1),array
                    (2858, 'Western Visayas', 173, 1),array
                    (2859, 'Pitcairn Island', 174, 1),array
                    (2860, 'Biale Blota', 175, 1),array
                    (2861, 'Dobroszyce', 175, 1),array
                    (2862, 'Dolnoslaskie', 175, 1),array
                    (2863, 'Dziekanow Lesny', 175, 1),array
                    (2864, 'Hopowo', 175, 1),array
                    (2865, 'Kartuzy', 175, 1),array
                    (2866, 'Koscian', 175, 1),array
                    (2867, 'Krakow', 175, 1),array
                    (2868, 'Kujawsko-Pomorskie', 175, 1),array
                    (2869, 'Lodzkie', 175, 1),array
                    (2870, 'Lubelskie', 175, 1),array
                    (2871, 'Lubuskie', 175, 1),array
                    (2872, 'Malomice', 175, 1),array
                    (2873, 'Malopolskie', 175, 1),array
                    (2874, 'Mazowieckie', 175, 1),array
                    (2875, 'Mirkow', 175, 1),array
                    (2876, 'Opolskie', 175, 1),array
                    (2877, 'Ostrowiec', 175, 1),array
                    (2878, 'Podkarpackie', 175, 1),array
                    (2879, 'Podlaskie', 175, 1),array
                    (2880, 'Polska', 175, 1),array
                    (2881, 'Pomorskie', 175, 1),array
                    (2882, 'Poznan', 175, 1),array
                    (2883, 'Pruszkow', 175, 1),array
                    (2884, 'Rymanowska', 175, 1),array
                    (2885, 'Rzeszow', 175, 1),array
                    (2886, 'Slaskie', 175, 1),array
                    (2887, 'Stare Pole', 175, 1),array
                    (2888, 'Swietokrzyskie', 175, 1),array
                    (2889, 'Warminsko-Mazurskie', 175, 1),array
                    (2890, 'Warsaw', 175, 1),array
                    (2891, 'Wejherowo', 175, 1),array
                    (2892, 'Wielkopolskie', 175, 1),array
                    (2893, 'Wroclaw', 175, 1),array
                    (2894, 'Zachodnio-Pomorskie', 175, 1),array
                    (2895, 'Zukowo', 175, 1),array
                    (2896, 'Abrantes', 176, 1),array
                    (2897, 'Acores', 176, 1),array
                    (2898, 'Alentejo', 176, 1),array
                    (2899, 'Algarve', 176, 1),array
                    (2900, 'Braga', 176, 1),array
                    (2901, 'Centro', 176, 1),array
                    (2902, 'Distrito de Leiria', 176, 1),array
                    (2903, 'Distrito de Viana do Castelo', 176, 1),array
                    (2904, 'Distrito de Vila Real', 176, 1),array
                    (2905, 'Distrito do Porto', 176, 1),array
                    (2906, 'Lisboa e Vale do Tejo', 176, 1),array
                    (2907, 'Madeira', 176, 1),array
                    (2908, 'Norte', 176, 1),array
                    (2909, 'Paivas', 176, 1),array
                    (2910, 'Arecibo', 177, 1),array
                    (2911, 'Bayamon', 177, 1),array
                    (2912, 'Carolina', 177, 1),array
                    (2913, 'Florida', 177, 1),array
                    (2914, 'Guayama', 177, 1),array
                    (2915, 'Humacao', 177, 1),array
                    (2916, 'Mayaguez-Aguadilla', 177, 1),array
                    (2917, 'Ponce', 177, 1),array
                    (2918, 'Salinas', 177, 1),array
                    (2919, 'San Juan', 177, 1),array
                    (2920, 'Doha', 178, 1),array
                    (2921, 'Jarian-al-Batnah', 178, 1),array
                    (2922, 'Umm Salal', 178, 1),array
                    (2923, 'ad-Dawhah', 178, 1),array
                    (2924, 'al-Ghuwayriyah', 178, 1),array
                    (2925, 'al-Jumayliyah', 178, 1),array
                    (2926, 'al-Khawr', 178, 1),array
                    (2927, 'al-Wakrah', 178, 1),array
                    (2928, 'ar-Rayyan', 178, 1),array
                    (2929, 'ash-Shamal', 178, 1),array
                    (2930, 'Saint-Benoit', 179, 1),array
                    (2931, 'Saint-Denis', 179, 1),array
                    (2932, 'Saint-Paul', 179, 1),array
                    (2933, 'Saint-Pierre', 179, 1),array
                    (2934, 'Alba', 180, 1),array
                    (2935, 'Arad', 180, 1),array
                    (2936, 'Arges', 180, 1),array
                    (2937, 'Bacau', 180, 1),array
                    (2938, 'Bihor', 180, 1),array
                    (2939, 'Bistrita-Nasaud', 180, 1),array
                    (2940, 'Botosani', 180, 1),array
                    (2941, 'Braila', 180, 1),array
                    (2942, 'Brasov', 180, 1),array
                    (2943, 'Bucuresti', 180, 1),array
                    (2944, 'Buzau', 180, 1),array
                    (2945, 'Calarasi', 180, 1),array
                    (2946, 'Caras-Severin', 180, 1),array
                    (2947, 'Cluj', 180, 1),array
                    (2948, 'Constanta', 180, 1),array
                    (2949, 'Covasna', 180, 1),array
                    (2950, 'Dambovita', 180, 1),array
                    (2951, 'Dolj', 180, 1),array
                    (2952, 'Galati', 180, 1),array
                    (2953, 'Giurgiu', 180, 1),array
                    (2954, 'Gorj', 180, 1),array
                    (2955, 'Harghita', 180, 1),array
                    (2956, 'Hunedoara', 180, 1),array
                    (2957, 'Ialomita', 180, 1),array
                    (2958, 'Iasi', 180, 1),array
                    (2959, 'Ilfov', 180, 1),array
                    (2960, 'Maramures', 180, 1),array
                    (2961, 'Mehedinti', 180, 1),array
                    (2962, 'Mures', 180, 1),array
                    (2963, 'Neamt', 180, 1),array
                    (2964, 'Olt', 180, 1),array
                    (2965, 'Prahova', 180, 1),array
                    (2966, 'Salaj', 180, 1),array
                    (2967, 'Satu Mare', 180, 1),array
                    (2968, 'Sibiu', 180, 1),array
                    (2969, 'Sondelor', 180, 1),array
                    (2970, 'Suceava', 180, 1),array
                    (2971, 'Teleorman', 180, 1),array
                    (2972, 'Timis', 180, 1),array
                    (2973, 'Tulcea', 180, 1),array
                    (2974, 'Valcea', 180, 1),array
                    (2975, 'Vaslui', 180, 1),array
                    (2976, 'Vrancea', 180, 1),array
                    (2977, 'Adygeja', 181, 1),array
                    (2978, 'Aga', 181, 1),array
                    (2979, 'Alanija', 181, 1),array
                    (2980, 'Altaj', 181, 1),array
                    (2981, 'Amur', 181, 1),array
                    (2982, 'Arhangelsk', 181, 1),array
                    (2983, 'Astrahan', 181, 1),array
                    (2984, 'Bashkortostan', 181, 1),array
                    (2985, 'Belgorod', 181, 1),array
                    (2986, 'Brjansk', 181, 1),array
                    (2987, 'Burjatija', 181, 1),array
                    (2988, 'Chechenija', 181, 1),array
                    (2989, 'Cheljabinsk', 181, 1),array
                    (2990, 'Chita', 181, 1),array
                    (2991, 'Chukotka', 181, 1),array
                    (2992, 'Chuvashija', 181, 1),array
                    (2993, 'Dagestan', 181, 1),array
                    (2994, 'Evenkija', 181, 1),array
                    (2995, 'Gorno-Altaj', 181, 1),array
                    (2996, 'Habarovsk', 181, 1),array
                    (2997, 'Hakasija', 181, 1),array
                    (2998, 'Hanty-Mansija', 181, 1),array
                    (2999, 'Ingusetija', 181, 1),array
                    (3000, 'Irkutsk', 181, 1),array
                    (3001, 'Ivanovo', 181, 1),array
                    (3002, 'Jamalo-Nenets', 181, 1),array
                    (3003, 'Jaroslavl', 181, 1),array
                    (3004, 'Jevrej', 181, 1),array
                    (3005, 'Kabardino-Balkarija', 181, 1),array
                    (3006, 'Kaliningrad', 181, 1),array
                    (3007, 'Kalmykija', 181, 1),array
                    (3008, 'Kaluga', 181, 1),array
                    (3009, 'Kamchatka', 181, 1),array
                    (3010, 'Karachaj-Cherkessija', 181, 1),array
                    (3011, 'Karelija', 181, 1),array
                    (3012, 'Kemerovo', 181, 1),array
                    (3013, 'Khabarovskiy Kray', 181, 1),array
                    (3014, 'Kirov', 181, 1),array
                    (3015, 'Komi', 181, 1),array
                    (3016, 'Komi-Permjakija', 181, 1),array
                    (3017, 'Korjakija', 181, 1),array
                    (3018, 'Kostroma', 181, 1),array
                    (3019, 'Krasnodar', 181, 1),array
                    (3020, 'Krasnojarsk', 181, 1),array
                    (3021, 'Krasnoyarskiy Kray', 181, 1),array
                    (3022, 'Kurgan', 181, 1),array
                    (3023, 'Kursk', 181, 1),array
                    (3024, 'Leningrad', 181, 1),array
                    (3025, 'Lipeck', 181, 1),array
                    (3026, 'Magadan', 181, 1),array
                    (3027, 'Marij El', 181, 1),array
                    (3028, 'Mordovija', 181, 1),array
                    (3029, 'Moscow', 181, 1),array
                    (3030, 'Moskovskaja Oblast', 181, 1),array
                    (3031, 'Moskovskaya Oblast', 181, 1),array
                    (3032, 'Moskva', 181, 1),array
                    (3033, 'Murmansk', 181, 1),array
                    (3034, 'Nenets', 181, 1),array
                    (3035, 'Nizhnij Novgorod', 181, 1),array
                    (3036, 'Novgorod', 181, 1),array
                    (3037, 'Novokusnezk', 181, 1),array
                    (3038, 'Novosibirsk', 181, 1),array
                    (3039, 'Omsk', 181, 1),array
                    (3040, 'Orenburg', 181, 1),array
                    (3041, 'Orjol', 181, 1),array
                    (3042, 'Penza', 181, 1),array
                    (3043, 'Perm', 181, 1),array
                    (3044, 'Primorje', 181, 1),array
                    (3045, 'Pskov', 181, 1),array
                    (3046, 'Pskovskaya Oblast', 181, 1),array
                    (3047, 'Rjazan', 181, 1),array
                    (3048, 'Rostov', 181, 1),array
                    (3049, 'Saha', 181, 1),array
                    (3050, 'Sahalin', 181, 1),array
                    (3051, 'Samara', 181, 1),array
                    (3052, 'Samarskaya', 181, 1),array
                    (3053, 'Sankt-Peterburg', 181, 1),array
                    (3054, 'Saratov', 181, 1),array
                    (3055, 'Smolensk', 181, 1),array
                    (3056, 'Stavropol', 181, 1),array
                    (3057, 'Sverdlovsk', 181, 1),array
                    (3058, 'Tajmyrija', 181, 1),array
                    (3059, 'Tambov', 181, 1),array
                    (3060, 'Tatarstan', 181, 1),array
                    (3061, 'Tjumen', 181, 1),array
                    (3062, 'Tomsk', 181, 1),array
                    (3063, 'Tula', 181, 1),array
                    (3064, 'Tver', 181, 1),array
                    (3065, 'Tyva', 181, 1),array
                    (3066, 'Udmurtija', 181, 1),array
                    (3067, 'Uljanovsk', 181, 1),array
                    (3068, 'Ulyanovskaya Oblast', 181, 1),array
                    (3069, 'Ust-Orda', 181, 1),array
                    (3070, 'Vladimir', 181, 1),array
                    (3071, 'Volgograd', 181, 1),array
                    (3072, 'Vologda', 181, 1),array
                    (3073, 'Voronezh', 181, 1),array
                    (3074, 'Butare', 182, 1),array
                    (3075, 'Byumba', 182, 1),array
                    (3076, 'Cyangugu', 182, 1),array
                    (3077, 'Gikongoro', 182, 1),array
                    (3078, 'Gisenyi', 182, 1),array
                    (3079, 'Gitarama', 182, 1),array
                    (3080, 'Kibungo', 182, 1),array
                    (3081, 'Kibuye', 182, 1),array
                    (3082, 'Kigali-ngali', 182, 1),array
                    (3083, 'Ruhengeri', 182, 1),array
                    (3084, 'Ascension', 183, 1),array
                    (3085, 'Gough Island', 183, 1),array
                    (3086, 'Saint Helena', 183, 1),array
                    (3087, 'Tristan da Cunha', 183, 1),array
                    (3088, 'Christ Church Nichola Town', 184, 1),array
                    (3089, 'Saint Anne Sandy Point', 184, 1),array
                    (3090, 'Saint George Basseterre', 184, 1),array
                    (3091, 'Saint George Gingerland', 184, 1),array
                    (3092, 'Saint James Windward', 184, 1),array
                    (3093, 'Saint John Capesterre', 184, 1),array
                    (3094, 'Saint John Figtree', 184, 1),array
                    (3095, 'Saint Mary Cayon', 184, 1),array
                    (3096, 'Saint Paul Capesterre', 184, 1),array
                    (3097, 'Saint Paul Charlestown', 184, 1),array
                    (3098, 'Saint Peter Basseterre', 184, 1),array
                    (3099, 'Saint Thomas Lowland', 184, 1),array
                    (3100, 'Saint Thomas Middle Island', 184, 1),array
                    (3101, 'Trinity Palmetto Point', 184, 1),array
                    (3102, 'Anse-la-Raye', 185, 1),array
                    (3103, 'Canaries', 185, 1),array
                    (3104, 'Castries', 185, 1),array
                    (3105, 'Choiseul', 185, 1),array
                    (3106, 'Dennery', 185, 1),array
                    (3107, 'Gros Inlet', 185, 1),array
                    (3108, 'Laborie', 185, 1),array
                    (3109, 'Micoud', 185, 1),array
                    (3110, 'Soufriere', 185, 1),array
                    (3111, 'Vieux Fort', 185, 1),array
                    (3112, 'Miquelon-Langlade', 186, 1),array
                    (3113, 'Saint-Pierre', 186, 1),array
                    (3114, 'Charlotte', 187, 1),array
                    (3115, 'Grenadines', 187, 1),array
                    (3116, 'Saint Andrew', 187, 1),array
                    (3117, 'Saint David', 187, 1),array
                    (3118, 'Saint George', 187, 1),array
                    (3119, 'Saint Patrick', 187, 1),array
                    (3120, 'Aana', 188, 1),array
                    (3121, 'Aiga-i-le-Tai', 188, 1),array
                    (3122, 'Atua', 188, 1),array
                    (3123, 'Faasaleleaga', 188, 1),array
                    (3124, 'Gagaemauga', 188, 1),array
                    (3125, 'Gagaifomauga', 188, 1),array
                    (3126, 'Palauli', 188, 1),array
                    (3127, 'Satupaitea', 188, 1),array
                    (3128, 'Tuamasaga', 188, 1),array
                    (3129, 'Vaa-o-Fonoti', 188, 1),array
                    (3130, 'Vaisigano', 188, 1),array
                    (3131, 'Acquaviva', 189, 1),array
                    (3132, 'Borgo Maggiore', 189, 1),array
                    (3133, 'Chiesanuova', 189, 1),array
                    (3134, 'Domagnano', 189, 1),array
                    (3135, 'Faetano', 189, 1),array
                    (3136, 'Fiorentino', 189, 1),array
                    (3137, 'Montegiardino', 189, 1),array
                    (3138, 'San Marino', 189, 1),array
                    (3139, 'Serravalle', 189, 1),array
                    (3140, 'Agua Grande', 190, 1),array
                    (3141, 'Cantagalo', 190, 1),array
                    (3142, 'Lemba', 190, 1),array
                    (3143, 'Lobata', 190, 1),array
                    (3144, 'Me-Zochi', 190, 1),array
                    (3145, 'Pague', 190, 1),array
                    (3146, 'Al Khobar', 191, 1),array
                    (3147, 'Aseer', 191, 1),array
                    (3148, 'Ash Sharqiyah', 191, 1),array
                    (3149, 'Asir', 191, 1),array
                    (3150, 'Central Province', 191, 1),array
                    (3151, 'Eastern Province', 191, 1),array
                    (3152, 'Hail', 191, 1),array
                    (3153, 'Jawf', 191, 1),array
                    (3154, 'Jizan', 191, 1),array
                    (3155, 'Makkah', 191, 1),array
                    (3156, 'Najran', 191, 1),array
                    (3157, 'Qasim', 191, 1),array
                    (3158, 'Tabuk', 191, 1),array
                    (3159, 'Western Province', 191, 1),array
                    (3160, 'al-Bahah', 191, 1),array
                    (3161, 'al-Hudud-ash-Shamaliyah', 191, 1),array
                    (3162, 'al-Madinah', 191, 1),array
                    (3163, 'ar-Riyad', 191, 1),array
                    (3164, 'Dakar', 192, 1),array
                    (3165, 'Diourbel', 192, 1),array
                    (3166, 'Fatick', 192, 1),array
                    (3167, 'Kaolack', 192, 1),array
                    (3168, 'Kolda', 192, 1),array
                    (3169, 'Louga', 192, 1),array
                    (3170, 'Saint-Louis', 192, 1),array
                    (3171, 'Tambacounda', 192, 1),array
                    (3172, 'Thies', 192, 1),array
                    (3173, 'Ziguinchor', 192, 1),array
                    (3174, 'Central Serbia', 193, 1),array
                    (3175, 'Kosovo and Metohija', 193, 1),array
                    (3176, 'Vojvodina', 193, 1),array
                    (3177, 'Anse Boileau', 194, 1),array
                    (3178, 'Anse Royale', 194, 1),array
                    (3179, 'Cascade', 194, 1),array
                    (3180, 'Takamaka', 194, 1),array
                    (3181, 'Victoria', 194, 1),array
                    (3182, 'Eastern', 195, 1),array
                    (3183, 'Northern', 195, 1),array
                    (3184, 'Southern', 195, 1),array
                    (3185, 'Western', 195, 1),array
                    (3186, 'Singapore', 196, 1),array
                    (3187, 'Banskobystricky', 197, 1),array
                    (3188, 'Bratislavsky', 197, 1),array
                    (3189, 'Kosicky', 197, 1),array
                    (3190, 'Nitriansky', 197, 1),array
                    (3191, 'Presovsky', 197, 1),array
                    (3192, 'Trenciansky', 197, 1),array
                    (3193, 'Trnavsky', 197, 1),array
                    (3194, 'Zilinsky', 197, 1),array
                    (3195, 'Benedikt', 198, 1),array
                    (3196, 'Gorenjska', 198, 1),array
                    (3197, 'Gorishka', 198, 1),array
                    (3198, 'Jugovzhodna Slovenija', 198, 1),array
                    (3199, 'Koroshka', 198, 1),array
                    (3200, 'Notranjsko-krashka', 198, 1),array
                    (3201, 'Obalno-krashka', 198, 1),array
                    (3202, 'Obcina Domzale', 198, 1),array
                    (3203, 'Obcina Vitanje', 198, 1),array
                    (3204, 'Osrednjeslovenska', 198, 1),array
                    (3205, 'Podravska', 198, 1),array
                    (3206, 'Pomurska', 198, 1),array
                    (3207, 'Savinjska', 198, 1),array
                    (3208, 'Slovenian Littoral', 198, 1),array
                    (3209, 'Spodnjeposavska', 198, 1),array
                    (3210, 'Zasavska', 198, 1),array
                    (3211, 'Pitcairn', 199, 1),array
                    (3212, 'Central', 200, 1),array
                    (3213, 'Choiseul', 200, 1),array
                    (3214, 'Guadalcanal', 200, 1),array
                    (3215, 'Isabel', 200, 1),array
                    (3216, 'Makira and Ulawa', 200, 1),array
                    (3217, 'Malaita', 200, 1),array
                    (3218, 'Rennell and Bellona', 200, 1),array
                    (3219, 'Temotu', 200, 1),array
                    (3220, 'Western', 200, 1),array
                    (3221, 'Awdal', 201, 1),array
                    (3222, 'Bakol', 201, 1),array
                    (3223, 'Banadir', 201, 1),array
                    (3224, 'Bari', 201, 1),array
                    (3225, 'Bay', 201, 1),array
                    (3226, 'Galgudug', 201, 1),array
                    (3227, 'Gedo', 201, 1),array
                    (3228, 'Hiran', 201, 1),array
                    (3229, 'Jubbada Hose', 201, 1),array
                    (3230, 'Jubbadha Dexe', 201, 1),array
                    (3231, 'Mudug', 201, 1),array
                    (3232, 'Nugal', 201, 1),array
                    (3233, 'Sanag', 201, 1),array
                    (3234, 'Shabellaha Dhexe', 201, 1),array
                    (3235, 'Shabellaha Hose', 201, 1),array
                    (3236, 'Togdher', 201, 1),array
                    (3237, 'Woqoyi Galbed', 201, 1),array
                    (3238, 'Eastern Cape', 202, 1),array
                    (3239, 'Free State', 202, 1),array
                    (3240, 'Gauteng', 202, 1),array
                    (3241, 'Kempton Park', 202, 1),array
                    (3242, 'Kramerville', 202, 1),array
                    (3243, 'KwaZulu Natal', 202, 1),array
                    (3244, 'Limpopo', 202, 1),array
                    (3245, 'Mpumalanga', 202, 1),array
                    (3246, 'North West', 202, 1),array
                    (3247, 'Northern Cape', 202, 1),array
                    (3248, 'Parow', 202, 1),array
                    (3249, 'Table View', 202, 1),array
                    (3250, 'Umtentweni', 202, 1),array
                    (3251, 'Western Cape', 202, 1),array
                    (3252, 'South Georgia', 203, 1),array
                    (3253, 'Central Equatoria', 204, 1),array
                    (3254, 'A Coruna', 205, 1),array
                    (3255, 'Alacant', 205, 1),array
                    (3256, 'Alava', 205, 1),array
                    (3257, 'Albacete', 205, 1),array
                    (3258, 'Almeria', 205, 1),array
                    (3259, 'Andalucia', 205, 1),array
                    (3260, 'Asturias', 205, 1),array
                    (3261, 'Avila', 205, 1),array
                    (3262, 'Badajoz', 205, 1),array
                    (3263, 'Balears', 205, 1),array
                    (3264, 'Barcelona', 205, 1),array
                    (3265, 'Bertamirans', 205, 1),array
                    (3266, 'Biscay', 205, 1),array
                    (3267, 'Burgos', 205, 1),array
                    (3268, 'Caceres', 205, 1),array
                    (3269, 'Cadiz', 205, 1),array
                    (3270, 'Cantabria', 205, 1),array
                    (3271, 'Castello', 205, 1),array
                    (3272, 'Catalunya', 205, 1),array
                    (3273, 'Ceuta', 205, 1),array
                    (3274, 'Ciudad Real', 205, 1),array
                    (3275, 'Comunidad Autonoma de Canarias', 205, 1),array
                    (3276, 'Comunidad Autonoma de Cataluna', 205, 1),array
                    (3277, 'Comunidad Autonoma de Galicia', 205, 1),array
                    (3278, 'Comunidad Autonoma de las Isla', 205, 1),array
                    (3279, 'Comunidad Autonoma del Princip', 205, 1),array
                    (3280, 'Comunidad Valenciana', 205, 1),array
                    (3281, 'Cordoba', 205, 1),array
                    (3282, 'Cuenca', 205, 1),array
                    (3283, 'Gipuzkoa', 205, 1),array
                    (3284, 'Girona', 205, 1),array
                    (3285, 'Granada', 205, 1),array
                    (3286, 'Guadalajara', 205, 1),array
                    (3287, 'Guipuzcoa', 205, 1),array
                    (3288, 'Huelva', 205, 1),array
                    (3289, 'Huesca', 205, 1),array
                    (3290, 'Jaen', 205, 1),array
                    (3291, 'La Rioja', 205, 1),array
                    (3292, 'Las Palmas', 205, 1),array
                    (3293, 'Leon', 205, 1),array
                    (3294, 'Lerida', 205, 1),array
                    (3295, 'Lleida', 205, 1),array
                    (3296, 'Lugo', 205, 1),array
                    (3297, 'Madrid', 205, 1),array
                    (3298, 'Malaga', 205, 1),array
                    (3299, 'Melilla', 205, 1),array
                    (3300, 'Murcia', 205, 1),array
                    (3301, 'Navarra', 205, 1),array
                    (3302, 'Ourense', 205, 1),array
                    (3303, 'Pais Vasco', 205, 1),array
                    (3304, 'Palencia', 205, 1),array
                    (3305, 'Pontevedra', 205, 1),array
                    (3306, 'Salamanca', 205, 1),array
                    (3307, 'Santa Cruz de Tenerife', 205, 1),array
                    (3308, 'Segovia', 205, 1),array
                    (3309, 'Sevilla', 205, 1),array
                    (3310, 'Soria', 205, 1),array
                    (3311, 'Tarragona', 205, 1),array
                    (3312, 'Tenerife', 205, 1),array
                    (3313, 'Teruel', 205, 1),array
                    (3314, 'Toledo', 205, 1),array
                    (3315, 'Valencia', 205, 1),array
                    (3316, 'Valladolid', 205, 1),array
                    (3317, 'Vizcaya', 205, 1),array
                    (3318, 'Zamora', 205, 1),array
                    (3319, 'Zaragoza', 205, 1),array
                    (3320, 'Amparai', 206, 1),array
                    (3321, 'Anuradhapuraya', 206, 1),array
                    (3322, 'Badulla', 206, 1),array
                    (3323, 'Boralesgamuwa', 206, 1),array
                    (3324, 'Colombo', 206, 1),array
                    (3325, 'Galla', 206, 1),array
                    (3326, 'Gampaha', 206, 1),array
                    (3327, 'Hambantota', 206, 1),array
                    (3328, 'Kalatura', 206, 1),array
                    (3329, 'Kegalla', 206, 1),array
                    (3330, 'Kilinochchi', 206, 1),array
                    (3331, 'Kurunegala', 206, 1),array
                    (3332, 'Madakalpuwa', 206, 1),array
                    (3333, 'Maha Nuwara', 206, 1),array
                    (3334, 'Malwana', 206, 1),array
                    (3335, 'Mannarama', 206, 1),array
                    (3336, 'Matale', 206, 1),array
                    (3337, 'Matara', 206, 1),array
                    (3338, 'Monaragala', 206, 1),array
                    (3339, 'Mullaitivu', 206, 1),array
                    (3340, 'North Eastern Province', 206, 1),array
                    (3341, 'North Western Province', 206, 1),array
                    (3342, 'Nuwara Eliya', 206, 1),array
                    (3343, 'Polonnaruwa', 206, 1),array
                    (3344, 'Puttalama', 206, 1),array
                    (3345, 'Ratnapuraya', 206, 1),array
                    (3346, 'Southern Province', 206, 1),array
                    (3347, 'Tirikunamalaya', 206, 1),array
                    (3348, 'Tuscany', 206, 1),array
                    (3349, 'Vavuniyawa', 206, 1),array
                    (3350, 'Western Province', 206, 1),array
                    (3351, 'Yapanaya', 206, 1),array
                    (3352, 'kadawatha', 206, 1),array
                    (3353, 'Aali-an-Nil', 207, 1),array
                    (3354, 'Bahr-al-Jabal', 207, 1),array
                    (3355, 'Central Equatoria', 207, 1),array
                    (3356, 'Gharb Bahr-al-Ghazal', 207, 1),array
                    (3357, 'Gharb Darfur', 207, 1),array
                    (3358, 'Gharb Kurdufan', 207, 1),array
                    (3359, 'Gharb-al-Istiwaiyah', 207, 1),array
                    (3360, 'Janub Darfur', 207, 1),array
                    (3361, 'Janub Kurdufan', 207, 1),array
                    (3362, 'Junqali', 207, 1),array
                    (3363, 'Kassala', 207, 1),array
                    (3364, 'Nahr-an-Nil', 207, 1),array
                    (3365, 'Shamal Bahr-al-Ghazal', 207, 1),array
                    (3366, 'Shamal Darfur', 207, 1),array
                    (3367, 'Shamal Kurdufan', 207, 1),array
                    (3368, 'Sharq-al-Istiwaiyah', 207, 1),array
                    (3369, 'Sinnar', 207, 1),array
                    (3370, 'Warab', 207, 1),array
                    (3371, 'Wilayat al Khartum', 207, 1),array
                    (3372, 'al-Bahr-al-Ahmar', 207, 1),array
                    (3373, 'al-Buhayrat', 207, 1),array
                    (3374, 'al-Jazirah', 207, 1),array
                    (3375, 'al-Khartum', 207, 1),array
                    (3376, 'al-Qadarif', 207, 1),array
                    (3377, 'al-Wahdah', 207, 1),array
                    (3378, 'an-Nil-al-Abyad', 207, 1),array
                    (3379, 'an-Nil-al-Azraq', 207, 1),array
                    (3380, 'ash-Shamaliyah', 207, 1),array
                    (3381, 'Brokopondo', 208, 1),array
                    (3382, 'Commewijne', 208, 1),array
                    (3383, 'Coronie', 208, 1),array
                    (3384, 'Marowijne', 208, 1),array
                    (3385, 'Nickerie', 208, 1),array
                    (3386, 'Para', 208, 1),array
                    (3387, 'Paramaribo', 208, 1),array
                    (3388, 'Saramacca', 208, 1),array
                    (3389, 'Wanica', 208, 1),array
                    (3390, 'Svalbard', 209, 1),array
                    (3391, 'Hhohho', 210, 1),array
                    (3392, 'Lubombo', 210, 1),array
                    (3393, 'Manzini', 210, 1),array
                    (3394, 'Shiselweni', 210, 1),array
                    (3395, 'Alvsborgs Lan', 211, 1),array
                    (3396, 'Angermanland', 211, 1),array
                    (3397, 'Blekinge', 211, 1),array
                    (3398, 'Bohuslan', 211, 1),array
                    (3399, 'Dalarna', 211, 1),array
                    (3400, 'Gavleborg', 211, 1),array
                    (3401, 'Gaza', 211, 1),array
                    (3402, 'Gotland', 211, 1),array
                    (3403, 'Halland', 211, 1),array
                    (3404, 'Jamtland', 211, 1),array
                    (3405, 'Jonkoping', 211, 1),array
                    (3406, 'Kalmar', 211, 1),array
                    (3407, 'Kristianstads', 211, 1),array
                    (3408, 'Kronoberg', 211, 1),array
                    (3409, 'Norrbotten', 211, 1),array
                    (3410, 'Orebro', 211, 1),array
                    (3411, 'Ostergotland', 211, 1),array
                    (3412, 'Saltsjo-Boo', 211, 1),array
                    (3413, 'Skane', 211, 1),array
                    (3414, 'Smaland', 211, 1),array
                    (3415, 'Sodermanland', 211, 1),array
                    (3416, 'Stockholm', 211, 1),array
                    (3417, 'Uppsala', 211, 1),array
                    (3418, 'Varmland', 211, 1),array
                    (3419, 'Vasterbotten', 211, 1),array
                    (3420, 'Vastergotland', 211, 1),array
                    (3421, 'Vasternorrland', 211, 1),array
                    (3422, 'Vastmanland', 211, 1),array
                    (3423, 'Vastra Gotaland', 211, 1),array
                    (3424, 'Aargau', 212, 1),array
                    (3425, 'Appenzell Inner-Rhoden', 212, 1),array
                    (3426, 'Appenzell-Ausser Rhoden', 212, 1),array
                    (3427, 'Basel-Landschaft', 212, 1),array
                    (3428, 'Basel-Stadt', 212, 1),array
                    (3429, 'Bern', 212, 1),array
                    (3430, 'Canton Ticino', 212, 1),array
                    (3431, 'Fribourg', 212, 1),array
                    (3432, 'Geneve', 212, 1),array
                    (3433, 'Glarus', 212, 1),array
                    (3434, 'Graubunden', 212, 1),array
                    (3435, 'Heerbrugg', 212, 1),array
                    (3436, 'Jura', 212, 1),array
                    (3437, 'Kanton Aargau', 212, 1),array
                    (3438, 'Luzern', 212, 1),array
                    (3439, 'Morbio Inferiore', 212, 1),array
                    (3440, 'Muhen', 212, 1),array
                    (3441, 'Neuchatel', 212, 1),array
                    (3442, 'Nidwalden', 212, 1),array
                    (3443, 'Obwalden', 212, 1),array
                    (3444, 'Sankt Gallen', 212, 1),array
                    (3445, 'Schaffhausen', 212, 1),array
                    (3446, 'Schwyz', 212, 1),array
                    (3447, 'Solothurn', 212, 1),array
                    (3448, 'Thurgau', 212, 1),array
                    (3449, 'Ticino', 212, 1),array
                    (3450, 'Uri', 212, 1),array
                    (3451, 'Valais', 212, 1),array
                    (3452, 'Vaud', 212, 1),array
                    (3453, 'Vauffelin', 212, 1),array
                    (3454, 'Zug', 212, 1),array
                    (3455, 'Zurich', 212, 1),array
                    (3456, 'Aleppo', 213, 1),array
                    (3457, 'Dara', 213, 1),array
                    (3458, 'Dayr-az-Zawr', 213, 1),array
                    (3459, 'Dimashq', 213, 1),array
                    (3460, 'Halab', 213, 1),array
                    (3461, 'Hamah', 213, 1),array
                    (3462, 'Hims', 213, 1),array
                    (3463, 'Idlib', 213, 1),array
                    (3464, 'Madinat Dimashq', 213, 1),array
                    (3465, 'Tartus', 213, 1),array
                    (3466, 'al-Hasakah', 213, 1),array
                    (3467, 'al-Ladhiqiyah', 213, 1),array
                    (3468, 'al-Qunaytirah', 213, 1),array
                    (3469, 'ar-Raqqah', 213, 1),array
                    (3470, 'as-Suwayda', 213, 1),array
                    (3471, 'Changhwa', 214, 1),array
                    (3472, 'Chiayi Hsien', 214, 1),array
                    (3473, 'Chiayi Shih', 214, 1),array
                    (3474, 'Eastern Taipei', 214, 1),array
                    (3475, 'Hsinchu Hsien', 214, 1),array
                    (3476, 'Hsinchu Shih', 214, 1),array
                    (3477, 'Hualien', 214, 1),array
                    (3478, 'Ilan', 214, 1),array
                    (3479, 'Kaohsiung Hsien', 214, 1),array
                    (3480, 'Kaohsiung Shih', 214, 1),array
                    (3481, 'Keelung Shih', 214, 1),array
                    (3482, 'Kinmen', 214, 1),array
                    (3483, 'Miaoli', 214, 1),array
                    (3484, 'Nantou', 214, 1),array
                    (3485, 'Northern Taiwan', 214, 1),array
                    (3486, 'Penghu', 214, 1),array
                    (3487, 'Pingtung', 214, 1),array
                    (3488, 'Taichung', 214, 1),array
                    (3489, 'Taichung Hsien', 214, 1),array
                    (3490, 'Taichung Shih', 214, 1),array
                    (3491, 'Tainan Hsien', 214, 1),array
                    (3492, 'Tainan Shih', 214, 1),array
                    (3493, 'Taipei Hsien', 214, 1),array
                    (3494, 'Taipei Shih / Taipei Hsien', 214, 1),array
                    (3495, 'Taitung', 214, 1),array
                    (3496, 'Taoyuan', 214, 1),array
                    (3497, 'Yilan', 214, 1),array
                    (3498, 'Yun-Lin Hsien', 214, 1),array
                    (3499, 'Yunlin', 214, 1),array
                    (3500, 'Dushanbe', 215, 1),array
                    (3501, 'Gorno-Badakhshan', 215, 1),array
                    (3502, 'Karotegin', 215, 1),array
                    (3503, 'Khatlon', 215, 1),array
                    (3504, 'Sughd', 215, 1),array
                    (3505, 'Arusha', 216, 1),array
                    (3506, 'Dar es Salaam', 216, 1),array
                    (3507, 'Dodoma', 216, 1),array
                    (3508, 'Iringa', 216, 1),array
                    (3509, 'Kagera', 216, 1),array
                    (3510, 'Kigoma', 216, 1),array
                    (3511, 'Kilimanjaro', 216, 1),array
                    (3512, 'Lindi', 216, 1),array
                    (3513, 'Mara', 216, 1),array
                    (3514, 'Mbeya', 216, 1),array
                    (3515, 'Morogoro', 216, 1),array
                    (3516, 'Mtwara', 216, 1),array
                    (3517, 'Mwanza', 216, 1),array
                    (3518, 'Pwani', 216, 1),array
                    (3519, 'Rukwa', 216, 1),array
                    (3520, 'Ruvuma', 216, 1),array
                    (3521, 'Shinyanga', 216, 1),array
                    (3522, 'Singida', 216, 1),array
                    (3523, 'Tabora', 216, 1),array
                    (3524, 'Tanga', 216, 1),array
                    (3525, 'Zanzibar and Pemba', 216, 1),array
                    (3526, 'Amnat Charoen', 217, 1),array
                    (3527, 'Ang Thong', 217, 1),array
                    (3528, 'Bangkok', 217, 1),array
                    (3529, 'Buri Ram', 217, 1),array
                    (3530, 'Chachoengsao', 217, 1),array
                    (3531, 'Chai Nat', 217, 1),array
                    (3532, 'Chaiyaphum', 217, 1),array
                    (3533, 'Changwat Chaiyaphum', 217, 1),array
                    (3534, 'Chanthaburi', 217, 1),array
                    (3535, 'Chiang Mai', 217, 1),array
                    (3536, 'Chiang Rai', 217, 1),array
                    (3537, 'Chon Buri', 217, 1),array
                    (3538, 'Chumphon', 217, 1),array
                    (3539, 'Kalasin', 217, 1),array
                    (3540, 'Kamphaeng Phet', 217, 1),array
                    (3541, 'Kanchanaburi', 217, 1),array
                    (3542, 'Khon Kaen', 217, 1),array
                    (3543, 'Krabi', 217, 1),array
                    (3544, 'Krung Thep', 217, 1),array
                    (3545, 'Lampang', 217, 1),array
                    (3546, 'Lamphun', 217, 1),array
                    (3547, 'Loei', 217, 1),array
                    (3548, 'Lop Buri', 217, 1),array
                    (3549, 'Mae Hong Son', 217, 1),array
                    (3550, 'Maha Sarakham', 217, 1),array
                    (3551, 'Mukdahan', 217, 1),array
                    (3552, 'Nakhon Nayok', 217, 1),array
                    (3553, 'Nakhon Pathom', 217, 1),array
                    (3554, 'Nakhon Phanom', 217, 1),array
                    (3555, 'Nakhon Ratchasima', 217, 1),array
                    (3556, 'Nakhon Sawan', 217, 1),array
                    (3557, 'Nakhon Si Thammarat', 217, 1),array
                    (3558, 'Nan', 217, 1),array
                    (3559, 'Narathiwat', 217, 1),array
                    (3560, 'Nong Bua Lam Phu', 217, 1),array
                    (3561, 'Nong Khai', 217, 1),array
                    (3562, 'Nonthaburi', 217, 1),array
                    (3563, 'Pathum Thani', 217, 1),array
                    (3564, 'Pattani', 217, 1),array
                    (3565, 'Phangnga', 217, 1),array
                    (3566, 'Phatthalung', 217, 1),array
                    (3567, 'Phayao', 217, 1),array
                    (3568, 'Phetchabun', 217, 1),array
                    (3569, 'Phetchaburi', 217, 1),array
                    (3570, 'Phichit', 217, 1),array
                    (3571, 'Phitsanulok', 217, 1),array
                    (3572, 'Phra Nakhon Si Ayutthaya', 217, 1),array
                    (3573, 'Phrae', 217, 1),array
                    (3574, 'Phuket', 217, 1),array
                    (3575, 'Prachin Buri', 217, 1),array
                    (3576, 'Prachuap Khiri Khan', 217, 1),array
                    (3577, 'Ranong', 217, 1),array
                    (3578, 'Ratchaburi', 217, 1),array
                    (3579, 'Rayong', 217, 1),array
                    (3580, 'Roi Et', 217, 1),array
                    (3581, 'Sa Kaeo', 217, 1),array
                    (3582, 'Sakon Nakhon', 217, 1),array
                    (3583, 'Samut Prakan', 217, 1),array
                    (3584, 'Samut Sakhon', 217, 1),array
                    (3585, 'Samut Songkhran', 217, 1),array
                    (3586, 'Saraburi', 217, 1),array
                    (3587, 'Satun', 217, 1),array
                    (3588, 'Si Sa Ket', 217, 1),array
                    (3589, 'Sing Buri', 217, 1),array
                    (3590, 'Songkhla', 217, 1),array
                    (3591, 'Sukhothai', 217, 1),array
                    (3592, 'Suphan Buri', 217, 1),array
                    (3593, 'Surat Thani', 217, 1),array
                    (3594, 'Surin', 217, 1),array
                    (3595, 'Tak', 217, 1),array
                    (3596, 'Trang', 217, 1),array
                    (3597, 'Trat', 217, 1),array
                    (3598, 'Ubon Ratchathani', 217, 1),array
                    (3599, 'Udon Thani', 217, 1),array
                    (3600, 'Uthai Thani', 217, 1),array
                    (3601, 'Uttaradit', 217, 1),array
                    (3602, 'Yala', 217, 1),array
                    (3603, 'Yasothon', 217, 1),array
                    (3604, 'Centre', 218, 1),array
                    (3605, 'Kara', 218, 1),array
                    (3606, 'Maritime', 218, 1),array
                    (3607, 'Plateaux', 218, 1),array
                    (3608, 'Savanes', 218, 1),array
                    (3609, 'Atafu', 219, 1),array
                    (3610, 'Fakaofo', 219, 1),array
                    (3611, 'Nukunonu', 219, 1),array
                    (3612, 'Eua', 220, 1),array
                    (3613, 'Haapai', 220, 1),array
                    (3614, 'Niuas', 220, 1),array
                    (3615, 'Tongatapu', 220, 1),array
                    (3616, 'Vavau', 220, 1),array
                    (3617, 'Arima-Tunapuna-Piarco', 221, 1),array
                    (3618, 'Caroni', 221, 1),array
                    (3619, 'Chaguanas', 221, 1),array
                    (3620, 'Couva-Tabaquite-Talparo', 221, 1),array
                    (3621, 'Diego Martin', 221, 1),array
                    (3622, 'Glencoe', 221, 1),array
                    (3623, 'Penal Debe', 221, 1),array
                    (3624, 'Point Fortin', 221, 1),array
                    (3625, 'Port of Spain', 221, 1),array
                    (3626, 'Princes Town', 221, 1),array
                    (3627, 'Saint George', 221, 1),array
                    (3628, 'San Fernando', 221, 1),array
                    (3629, 'San Juan', 221, 1),array
                    (3630, 'Sangre Grande', 221, 1),array
                    (3631, 'Siparia', 221, 1),array
                    (3632, 'Tobago', 221, 1),array
                    (3633, 'Aryanah', 222, 1),array
                    (3634, 'Bajah', 222, 1),array
                    (3635, 'Bin Arus', 222, 1),array
                    (3636, 'Binzart', 222, 1),array
                    (3637, 'Gouvernorat de Ariana', 222, 1),array
                    (3638, 'Gouvernorat de Nabeul', 222, 1),array
                    (3639, 'Gouvernorat de Sousse', 222, 1),array
                    (3640, 'Hammamet Yasmine', 222, 1),array
                    (3641, 'Jundubah', 222, 1),array
                    (3642, 'Madaniyin', 222, 1),array
                    (3643, 'Manubah', 222, 1),array
                    (3644, 'Monastir', 222, 1),array
                    (3645, 'Nabul', 222, 1),array
                    (3646, 'Qabis', 222, 1),array
                    (3647, 'Qafsah', 222, 1),array
                    (3648, 'Qibili', 222, 1),array
                    (3649, 'Safaqis', 222, 1),array
                    (3650, 'Sfax', 222, 1),array
                    (3651, 'Sidi Bu Zayd', 222, 1),array
                    (3652, 'Silyanah', 222, 1),array
                    (3653, 'Susah', 222, 1),array
                    (3654, 'Tatawin', 222, 1),array
                    (3655, 'Tawzar', 222, 1),array
                    (3656, 'Tunis', 222, 1),array
                    (3657, 'Zaghwan', 222, 1),array
                    (3658, 'al-Kaf', 222, 1),array
                    (3659, 'al-Mahdiyah', 222, 1),array
                    (3660, 'al-Munastir', 222, 1),array
                    (3661, 'al-Qasrayn', 222, 1),array
                    (3662, 'al-Qayrawan', 222, 1),array
                    (3663, 'Adana', 223, 1),array
                    (3664, 'Adiyaman', 223, 1),array
                    (3665, 'Afyon', 223, 1),array
                    (3666, 'Agri', 223, 1),array
                    (3667, 'Aksaray', 223, 1),array
                    (3668, 'Amasya', 223, 1),array
                    (3669, 'Ankara', 223, 1),array
                    (3670, 'Antalya', 223, 1),array
                    (3671, 'Ardahan', 223, 1),array
                    (3672, 'Artvin', 223, 1),array
                    (3673, 'Aydin', 223, 1),array
                    (3674, 'Balikesir', 223, 1),array
                    (3675, 'Bartin', 223, 1),array
                    (3676, 'Batman', 223, 1),array
                    (3677, 'Bayburt', 223, 1),array
                    (3678, 'Bilecik', 223, 1),array
                    (3679, 'Bingol', 223, 1),array
                    (3680, 'Bitlis', 223, 1),array
                    (3681, 'Bolu', 223, 1),array
                    (3682, 'Burdur', 223, 1),array
                    (3683, 'Bursa', 223, 1),array
                    (3684, 'Canakkale', 223, 1),array
                    (3685, 'Cankiri', 223, 1),array
                    (3686, 'Corum', 223, 1),array
                    (3687, 'Denizli', 223, 1),array
                    (3688, 'Diyarbakir', 223, 1),array
                    (3689, 'Duzce', 223, 1),array
                    (3690, 'Edirne', 223, 1),array
                    (3691, 'Elazig', 223, 1),array
                    (3692, 'Erzincan', 223, 1),array
                    (3693, 'Erzurum', 223, 1),array
                    (3694, 'Eskisehir', 223, 1),array
                    (3695, 'Gaziantep', 223, 1),array
                    (3696, 'Giresun', 223, 1),array
                    (3697, 'Gumushane', 223, 1),array
                    (3698, 'Hakkari', 223, 1),array
                    (3699, 'Hatay', 223, 1),array
                    (3700, 'Icel', 223, 1),array
                    (3701, 'Igdir', 223, 1),array
                    (3702, 'Isparta', 223, 1),array
                    (3703, 'Istanbul', 223, 1),array
                    (3704, 'Izmir', 223, 1),array
                    (3705, 'Kahramanmaras', 223, 1),array
                    (3706, 'Karabuk', 223, 1),array
                    (3707, 'Karaman', 223, 1),array
                    (3708, 'Kars', 223, 1),array
                    (3709, 'Karsiyaka', 223, 1),array
                    (3710, 'Kastamonu', 223, 1),array
                    (3711, 'Kayseri', 223, 1),array
                    (3712, 'Kilis', 223, 1),array
                    (3713, 'Kirikkale', 223, 1),array
                    (3714, 'Kirklareli', 223, 1),array
                    (3715, 'Kirsehir', 223, 1),array
                    (3716, 'Kocaeli', 223, 1),array
                    (3717, 'Konya', 223, 1),array
                    (3718, 'Kutahya', 223, 1),array
                    (3719, 'Lefkosa', 223, 1),array
                    (3720, 'Malatya', 223, 1),array
                    (3721, 'Manisa', 223, 1),array
                    (3722, 'Mardin', 223, 1),array
                    (3723, 'Mugla', 223, 1),array
                    (3724, 'Mus', 223, 1),array
                    (3725, 'Nevsehir', 223, 1),array
                    (3726, 'Nigde', 223, 1),array
                    (3727, 'Ordu', 223, 1),array
                    (3728, 'Osmaniye', 223, 1),array
                    (3729, 'Rize', 223, 1),array
                    (3730, 'Sakarya', 223, 1),array
                    (3731, 'Samsun', 223, 1),array
                    (3732, 'Sanliurfa', 223, 1),array
                    (3733, 'Siirt', 223, 1),array
                    (3734, 'Sinop', 223, 1),array
                    (3735, 'Sirnak', 223, 1),array
                    (3736, 'Sivas', 223, 1),array
                    (3737, 'Tekirdag', 223, 1),array
                    (3738, 'Tokat', 223, 1),array
                    (3739, 'Trabzon', 223, 1),array
                    (3740, 'Tunceli', 223, 1),array
                    (3741, 'Usak', 223, 1),array
                    (3742, 'Van', 223, 1),array
                    (3743, 'Yalova', 223, 1),array
                    (3744, 'Yozgat', 223, 1),array
                    (3745, 'Zonguldak', 223, 1),array
                    (3746, 'Ahal', 224, 1),array
                    (3747, 'Asgabat', 224, 1),array
                    (3748, 'Balkan', 224, 1),array
                    (3749, 'Dasoguz', 224, 1),array
                    (3750, 'Lebap', 224, 1),array
                    (3751, 'Mari', 224, 1),array
                    (3752, 'Grand Turk', 225, 1),array
                    (3753, 'South Caicos and East Caicos', 225, 1),array
                    (3754, 'Funafuti', 226, 1),array
                    (3755, 'Nanumanga', 226, 1),array
                    (3756, 'Nanumea', 226, 1),array
                    (3757, 'Niutao', 226, 1),array
                    (3758, 'Nui', 226, 1),array
                    (3759, 'Nukufetau', 226, 1),array
                    (3760, 'Nukulaelae', 226, 1),array
                    (3761, 'Vaitupu', 226, 1),array
                    (3762, 'Central', 227, 1),array
                    (3763, 'Eastern', 227, 1),array
                    (3764, 'Northern', 227, 1),array
                    (3765, 'Western', 227, 1),array
                    (3766, 'Cherkaska', 228, 1),array
                    (3767, 'Chernihivska', 228, 1),array
                    (3768, 'Chernivetska', 228, 1),array
                    (3769, 'Crimea', 228, 1),array
                    (3770, 'Dnipropetrovska', 228, 1),array
                    (3771, 'Donetska', 228, 1),array
                    (3772, 'Ivano-Frankivska', 228, 1),array
                    (3773, 'Kharkiv', 228, 1),array
                    (3774, 'Kharkov', 228, 1),array
                    (3775, 'Khersonska', 228, 1),array
                    (3776, 'Khmelnytska', 228, 1),array
                    (3777, 'Kirovohrad', 228, 1),array
                    (3778, 'Krym', 228, 1),array
                    (3779, 'Kyyiv', 228, 1),array
                    (3780, 'Kyyivska', 228, 1),array
                    (3781, 'Lvivska', 228, 1),array
                    (3782, 'Luhanska', 228, 1),array
                    (3783, 'Mykolayivska', 228, 1),array
                    (3784, 'Odeska', 228, 1),array
                    (3785, 'Odessa', 228, 1),array
                    (3786, 'Poltavska', 228, 1),array
                    (3787, 'Rivnenska', 228, 1),array
                    (3788, 'Sevastopol', 228, 1),array
                    (3789, 'Sumska', 228, 1),array
                    (3790, 'Ternopilska', 228, 1),array
                    (3791, 'Volynska', 228, 1),array
                    (3792, 'Vynnytska', 228, 1),array
                    (3793, 'Zakarpatska', 228, 1),array
                    (3794, 'Zaporizhia', 228, 1),array
                    (3795, 'Zhytomyrska', 228, 1),array
                    (3796, 'Abu Zabi', 229, 1),array
                    (3797, 'Ajman', 229, 1),array
                    (3798, 'Dubai', 229, 1),array
                    (3799, 'Ras al-Khaymah', 229, 1),array
                    (3800, 'Sharjah', 229, 1),array
                    (3801, 'Sharjha', 229, 1),array
                    (3802, 'Umm al Qaywayn', 229, 1),array
                    (3803, 'al-Fujayrah', 229, 1),array
                    (3804, 'ash-Shariqah', 229, 1),array
                    (3805, 'Aberdeen', 230, 1),array
                    (3806, 'Aberdeenshire', 230, 1),array
                    (3807, 'Argyll', 230, 1),array
                    (3808, 'Armagh', 230, 1),array
                    (3809, 'Bedfordshire', 230, 1),array
                    (3810, 'Belfast', 230, 1),array
                    (3811, 'Berkshire', 230, 1),array
                    (3812, 'Birmingham', 230, 1),array
                    (3813, 'Brechin', 230, 1),array
                    (3814, 'Bridgnorth', 230, 1),array
                    (3815, 'Bristol', 230, 1),array
                    (3816, 'Buckinghamshire', 230, 1),array
                    (3817, 'Cambridge', 230, 1),array
                    (3818, 'Cambridgeshire', 230, 1),array
                    (3819, 'Channel Islands', 230, 1),array
                    (3820, 'Cheshire', 230, 1),array
                    (3821, 'Cleveland', 230, 1),array
                    (3822, 'Co Fermanagh', 230, 1),array
                    (3823, 'Conwy', 230, 1),array
                    (3824, 'Cornwall', 230, 1),array
                    (3825, 'Coventry', 230, 1),array
                    (3826, 'Craven Arms', 230, 1),array
                    (3827, 'Cumbria', 230, 1),array
                    (3828, 'Denbighshire', 230, 1),array
                    (3829, 'Derby', 230, 1),array
                    (3830, 'Derbyshire', 230, 1),array
                    (3831, 'Devon', 230, 1),array
                    (3832, 'Dial Code Dungannon', 230, 1),array
                    (3833, 'Didcot', 230, 1),array
                    (3834, 'Dorset', 230, 1),array
                    (3835, 'Dunbartonshire', 230, 1),array
                    (3836, 'Durham', 230, 1),array
                    (3837, 'East Dunbartonshire', 230, 1),array
                    (3838, 'East Lothian', 230, 1),array
                    (3839, 'East Midlands', 230, 1),array
                    (3840, 'East Sussex', 230, 1),array
                    (3841, 'East Yorkshire', 230, 1),array
                    (3842, 'England', 230, 1),array
                    (3843, 'Essex', 230, 1),array
                    (3844, 'Fermanagh', 230, 1),array
                    (3845, 'Fife', 230, 1),array
                    (3846, 'Flintshire', 230, 1),array
                    (3847, 'Fulham', 230, 1),array
                    (3848, 'Gainsborough', 230, 1),array
                    (3849, 'Glocestershire', 230, 1),array
                    (3850, 'Gwent', 230, 1),array
                    (3851, 'Hampshire', 230, 1),array
                    (3852, 'Hants', 230, 1),array
                    (3853, 'Herefordshire', 230, 1),array
                    (3854, 'Hertfordshire', 230, 1),array
                    (3855, 'Ireland', 230, 1),array
                    (3856, 'Isle Of Man', 230, 1),array
                    (3857, 'Isle of Wight', 230, 1),array
                    (3858, 'Kenford', 230, 1),array
                    (3859, 'Kent', 230, 1),array
                    (3860, 'Kilmarnock', 230, 1),array
                    (3861, 'Lanarkshire', 230, 1),array
                    (3862, 'Lancashire', 230, 1),array
                    (3863, 'Leicestershire', 230, 1),array
                    (3864, 'Lincolnshire', 230, 1),array
                    (3865, 'Llanymynech', 230, 1),array
                    (3866, 'London', 230, 1),array
                    (3867, 'Ludlow', 230, 1),array
                    (3868, 'Manchester', 230, 1),array
                    (3869, 'Mayfair', 230, 1),array
                    (3870, 'Merseyside', 230, 1),array
                    (3871, 'Mid Glamorgan', 230, 1),array
                    (3872, 'Middlesex', 230, 1),array
                    (3873, 'Mildenhall', 230, 1),array
                    (3874, 'Monmouthshire', 230, 1),array
                    (3875, 'Newton Stewart', 230, 1),array
                    (3876, 'Norfolk', 230, 1),array
                    (3877, 'North Humberside', 230, 1),array
                    (3878, 'North Yorkshire', 230, 1),array
                    (3879, 'Northamptonshire', 230, 1),array
                    (3880, 'Northants', 230, 1),array
                    (3881, 'Northern Ireland', 230, 1),array
                    (3882, 'Northumberland', 230, 1),array
                    (3883, 'Nottinghamshire', 230, 1),array
                    (3884, 'Oxford', 230, 1),array
                    (3885, 'Powys', 230, 1),array
                    (3886, 'Roos-shire', 230, 1),array
                    (3887, 'SUSSEX', 230, 1),array
                    (3888, 'Sark', 230, 1),array
                    (3889, 'Scotland', 230, 1),array
                    (3890, 'Scottish Borders', 230, 1),array
                    (3891, 'Shropshire', 230, 1),array
                    (3892, 'Somerset', 230, 1),array
                    (3893, 'South Glamorgan', 230, 1),array
                    (3894, 'South Wales', 230, 1),array
                    (3895, 'South Yorkshire', 230, 1),array
                    (3896, 'Southwell', 230, 1),array
                    (3897, 'Staffordshire', 230, 1),array
                    (3898, 'Strabane', 230, 1),array
                    (3899, 'Suffolk', 230, 1),array
                    (3900, 'Surrey', 230, 1),array
                    (3901, 'Sussex', 230, 1),array
                    (3902, 'Twickenham', 230, 1),array
                    (3903, 'Tyne and Wear', 230, 1),array
                    (3904, 'Tyrone', 230, 1),array
                    (3905, 'Utah', 230, 1),array
                    (3906, 'Wales', 230, 1),array
                    (3907, 'Warwickshire', 230, 1),array
                    (3908, 'West Lothian', 230, 1),array
                    (3909, 'West Midlands', 230, 1),array
                    (3910, 'West Sussex', 230, 1),array
                    (3911, 'West Yorkshire', 230, 1),array
                    (3912, 'Whissendine', 230, 1),array
                    (3913, 'Wiltshire', 230, 1),array
                    (3914, 'Wokingham', 230, 1),array
                    (3915, 'Worcestershire', 230, 1),array
                    (3916, 'Wrexham', 230, 1),array
                    (3917, 'Wurttemberg', 230, 1),array
                    (3918, 'Yorkshire', 230, 1),array
                    (3919, 'Alabama', 231, 1),array
                    (3920, 'Alaska', 231, 1),array
                    (3921, 'Arizona', 231, 1),array
                    (3922, 'Arkansas', 231, 1),array
                    (3923, 'Byram', 231, 1),array
                    (3924, 'California', 231, 1),array
                    (3925, 'Cokato', 231, 1),array
                    (3926, 'Colorado', 231, 1),array
                    (3927, 'Connecticut', 231, 1),array
                    (3928, 'Delaware', 231, 1),array
                    (3929, 'District of Columbia', 231, 1),array
                    (3930, 'Florida', 231, 1),array
                    (3931, 'Georgia', 231, 1),array
                    (3932, 'Hawaii', 231, 1),array
                    (3933, 'Idaho', 231, 1),array
                    (3934, 'Illinois', 231, 1),array
                    (3935, 'Indiana', 231, 1),array
                    (3936, 'Iowa', 231, 1),array
                    (3937, 'Kansas', 231, 1),array
                    (3938, 'Kentucky', 231, 1),array
                    (3939, 'Louisiana', 231, 1),array
                    (3940, 'Lowa', 231, 1),array
                    (3941, 'Maine', 231, 1),array
                    (3942, 'Maryland', 231, 1),array
                    (3943, 'Massachusetts', 231, 1),array
                    (3944, 'Medfield', 231, 1),array
                    (3945, 'Michigan', 231, 1),array
                    (3946, 'Minnesota', 231, 1),array
                    (3947, 'Mississippi', 231, 1),array
                    (3948, 'Missouri', 231, 1),array
                    (3949, 'Montana', 231, 1),array
                    (3950, 'Nebraska', 231, 1),array
                    (3951, 'Nevada', 231, 1),array
                    (3952, 'New Hampshire', 231, 1),array
                    (3953, 'New Jersey', 231, 1),array
                    (3954, 'New Jersy', 231, 1),array
                    (3955, 'New Mexico', 231, 1),array
                    (3956, 'New York', 231, 1),array
                    (3957, 'North Carolina', 231, 1),array
                    (3958, 'North Dakota', 231, 1),array
                    (3959, 'Ohio', 231, 1),array
                    (3960, 'Oklahoma', 231, 1),array
                    (3961, 'Ontario', 231, 1),array
                    (3962, 'Oregon', 231, 1),array
                    (3963, 'Pennsylvania', 231, 1),array
                    (3964, 'Ramey', 231, 1),array
                    (3965, 'Rhode Island', 231, 1),array
                    (3966, 'South Carolina', 231, 1),array
                    (3967, 'South Dakota', 231, 1),array
                    (3968, 'Sublimity', 231, 1),array
                    (3969, 'Tennessee', 231, 1),array
                    (3970, 'Texas', 231, 1),array
                    (3971, 'Trimble', 231, 1),array
                    (3972, 'Utah', 231, 1),array
                    (3973, 'Vermont', 231, 1),array
                    (3974, 'Virginia', 231, 1),array
                    (3975, 'Washington', 231, 1),array
                    (3976, 'West Virginia', 231, 1),array
                    (3977, 'Wisconsin', 231, 1),array
                    (3978, 'Wyoming', 231, 1),array
                    (3979, 'United States Minor Outlying I', 232, 1),array
                    (3980, 'Artigas', 233, 1),array
                    (3981, 'Canelones', 233, 1),array
                    (3982, 'Cerro Largo', 233, 1),array
                    (3983, 'Colonia', 233, 1),array
                    (3984, 'Durazno', 233, 1),array
                    (3985, 'FLorida', 233, 1),array
                    (3986, 'Flores', 233, 1),array
                    (3987, 'Lavalleja', 233, 1),array
                    (3988, 'Maldonado', 233, 1),array
                    (3989, 'Montevideo', 233, 1),array
                    (3990, 'Paysandu', 233, 1),array
                    (3991, 'Rio Negro', 233, 1),array
                    (3992, 'Rivera', 233, 1),array
                    (3993, 'Rocha', 233, 1),array
                    (3994, 'Salto', 233, 1),array
                    (3995, 'San Jose', 233, 1),array
                    (3996, 'Soriano', 233, 1),array
                    (3997, 'Tacuarembo', 233, 1),array
                    (3998, 'Treinta y Tres', 233, 1),array
                    (3999, 'Andijon', 234, 1),array
                    (4000, 'Buhoro', 234, 1),array
                    (4001, 'Buxoro Viloyati', 234, 1),array
                    (4002, 'Cizah', 234, 1),array
                    (4003, 'Fargona', 234, 1),array
                    (4004, 'Horazm', 234, 1),array
                    (4005, 'Kaskadar', 234, 1),array
                    (4006, 'Korakalpogiston', 234, 1),array
                    (4007, 'Namangan', 234, 1),array
                    (4008, 'Navoi', 234, 1),array
                    (4009, 'Samarkand', 234, 1),array
                    (4010, 'Sirdare', 234, 1),array
                    (4011, 'Surhondar', 234, 1),array
                    (4012, 'Toskent', 234, 1),array
                    (4013, 'Malampa', 235, 1),array
                    (4014, 'Penama', 235, 1),array
                    (4015, 'Sanma', 235, 1),array
                    (4016, 'Shefa', 235, 1),array
                    (4017, 'Tafea', 235, 1),array
                    (4018, 'Torba', 235, 1),array
                    (4019, 'Vatican City State (Holy See)', 236, 1),array
                    (4020, 'Amazonas', 237, 1),array
                    (4021, 'Anzoategui', 237, 1),array
                    (4022, 'Apure', 237, 1),array
                    (4023, 'Aragua', 237, 1),array
                    (4024, 'Barinas', 237, 1),array
                    (4025, 'Bolivar', 237, 1),array
                    (4026, 'Carabobo', 237, 1),array
                    (4027, 'Cojedes', 237, 1),array
                    (4028, 'Delta Amacuro', 237, 1),array
                    (4029, 'Distrito Federal', 237, 1),array
                    (4030, 'Falcon', 237, 1),array
                    (4031, 'Guarico', 237, 1),array
                    (4032, 'Lara', 237, 1),array
                    (4033, 'Merida', 237, 1),array
                    (4034, 'Miranda', 237, 1),array
                    (4035, 'Monagas', 237, 1),array
                    (4036, 'Nueva Esparta', 237, 1),array
                    (4037, 'Portuguesa', 237, 1),array
                    (4038, 'Sucre', 237, 1),array
                    (4039, 'Tachira', 237, 1),array
                    (4040, 'Trujillo', 237, 1),array
                    (4041, 'Vargas', 237, 1),array
                    (4042, 'Yaracuy', 237, 1),array
                    (4043, 'Zulia', 237, 1),array
                    (4044, 'Bac Giang', 238, 1),array
                    (4045, 'Binh Dinh', 238, 1),array
                    (4046, 'Binh Duong', 238, 1),array
                    (4047, 'Da Nang', 238, 1),array
                    (4048, 'Dong Bang Song Cuu Long', 238, 1),array
                    (4049, 'Dong Bang Song Hong', 238, 1),array
                    (4050, 'Dong Nai', 238, 1),array
                    (4051, 'Dong Nam Bo', 238, 1),array
                    (4052, 'Duyen Hai Mien Trung', 238, 1),array
                    (4053, 'Hanoi', 238, 1),array
                    (4054, 'Hung Yen', 238, 1),array
                    (4055, 'Khu Bon Cu', 238, 1),array
                    (4056, 'Long An', 238, 1),array
                    (4057, 'Mien Nui Va Trung Du', 238, 1),array
                    (4058, 'Thai Nguyen', 238, 1),array
                    (4059, 'Thanh Pho Ho Chi Minh', 238, 1),array
                    (4060, 'Thu Do Ha Noi', 238, 1),array
                    (4061, 'Tinh Can Tho', 238, 1),array
                    (4062, 'Tinh Da Nang', 238, 1),array
                    (4063, 'Tinh Gia Lai', 238, 1),array
                    (4064, 'Anegada', 239, 1),array
                    (4065, 'Jost van Dyke', 239, 1),array
                    (4066, 'Tortola', 239, 1),array
                    (4067, 'Saint Croix', 240, 1),array
                    (4068, 'Saint John', 240, 1),array
                    (4069, 'Saint Thomas', 240, 1),array
                    (4070, 'Alo', 241, 1),array
                    (4071, 'Singave', 241, 1),array
                    (4072, 'Wallis', 241, 1),array
                    (4073, 'Bu Jaydur', 242, 1),array
                    (4074, 'Wad-adh-Dhahab', 242, 1),array
                    (4075, 'al-Ayun', 242, 1),array
                    (4076, 'as-Samarah', 242, 1),array
                    (4077, 'Adan', 243, 1),array
                    (4078, 'Abyan', 243, 1),array
                    (4079, 'Dhamar', 243, 1),array
                    (4080, 'Hadramaut', 243, 1),array
                    (4081, 'Hajjah', 243, 1),array
                    (4082, 'Hudaydah', 243, 1),array
                    (4083, 'Ibb', 243, 1),array
                    (4084, 'Lahij', 243, 1),array
                    (4085, 'Marib', 243, 1),array
                    (4086, 'Madinat Sana', 243, 1),array
                    (4087, 'Sadah', 243, 1),array
                    (4088, 'Sana', 243, 1),array
                    (4089, 'Shabwah', 243, 1),array
                    (4090, 'Taizz', 243, 1),array
                    (4091, 'al-Bayda', 243, 1),array
                    (4092, 'al-Hudaydah', 243, 1),array
                    (4093, 'al-Jawf', 243, 1),array
                    (4094, 'al-Mahrah', 243, 1),array
                    (4095, 'al-Mahwit', 243, 1),array
                    (4096, 'Central Serbia', 244, 1),array
                    (4097, 'Kosovo and Metohija', 244, 1),array
                    (4098, 'Montenegro', 244, 1),array
                    (4099, 'Republic of Serbia', 244, 1),array
                    (4100, 'Serbia', 244, 1),array
                    (4101, 'Vojvodina', 244, 1),array
                    (4102, 'Central', 245, 1),array
                    (4103, 'Copperbelt', 245, 1),array
                    (4104, 'Eastern', 245, 1),array
                    (4105, 'Luapala', 245, 1),array
                    (4106, 'Lusaka', 245, 1),array
                    (4107, 'North-Western', 245, 1),array
                    (4108, 'Northern', 245, 1),array
                    (4109, 'Southern', 245, 1),array
                    (4110, 'Western', 245, 1),array
                    (4111, 'Bulawayo', 246, 1),array
                    (4112, 'Harare', 246, 1),array
                    (4113, 'Manicaland', 246, 1),array
                    (4114, 'Mashonaland Central', 246, 1),array
                    (4115, 'Mashonaland East', 246, 1),array
                    (4116, 'Mashonaland West', 246, 1),array
                    (4117, 'Masvingo', 246, 1),array
                    (4118, 'Matabeleland North', 246, 1),array
                    (4119, 'Matabeleland South', 246, 1),array
                    (4120, 'Midlands', 246)
            );
            //Clt+G  14 
        for ($i=0; $i < 4120; $i++) { 
            State::create([
              'key' => generateKey(9),
              'name' => $states[$i][1],
              'country_id' => $states[$i][2],
              'status' => 1,
              'created_at' => new \DateTime(),
              'updated_at' => new \DateTime(),
            ]); 
        }
    }
}
