
create table Farmer(
	Farmer_ID varchar(7),
	Farmer_name varchar(20) not null,
	Mobile_no numeric(10,0),
	Email_ID varchar(20),
	City varchar(10),
	Password varchar(20),
	primary key (Farmer_ID));

insert into Farmer(Farmer_ID, Farmer_name ,Mobile_no, Email_ID, City, Password) values
('222123', 'Mukesh Gandhi', 7638267981, 'mukeshg@gmail.com' ,'Raigarh', 'abcd'),
('222124', 'Harsh Sodhi'  , 9274861963, 'harsh122@gmail.com', 'Mumbai', 'xyzq'),
('222125', 'Rajaram Patil', 8888998907, 'rajpatil@gmail.com', 'Pune'  , 'qwer'),
('222126', 'Pravin Zade'  , 9274868883, 'pzade@gmail.com'   , 'Sangli', 'tyui'),
('222127', 'Shivaji Patil', 9272345323, 'shivajip@gmail.com', 'Nagpur', 'opas'),
('222128', 'Ajay Wagh'    , 9727116783, 'ajaywagh@gmail.com', 'Satara', 'dfgh'),
('222129', 'Prakash Pawar', 7774861113, 'prakashp@gmail.com', 'Sangli', 'jklp'),
('222130', 'Nikhil Jadhav', 8274861963, 'nikhilj@gmail.com' , 'Nashik', 'cdcd'),
('222131', 'Anil Satpute' , 8274861963, 'anils@gmail.com'   , 'Nagar' , 'cdio');


create table Customer(
	Customer_ID varchar(7),
	Customer_name varchar(20) not null,
	Mobile_no numeric(10,0),
	Email_ID varchar(20),
	City varchar(10),
	Password varchar(20),
	primary key (Customer_ID));

insert into Customer(customer_ID,Customer_name,mobile_no,email_ID,city,password)values
('111351', 'Kushal Preet'    , 7652801946, 'kushalp@hotmail.com', 'Bhopal'    , 'pqrs'),
('111352', 'Rohanpreet Singh', 8972801946, 'rohanpr@gmail.com'  , 'Chandigarh', 'pqos'),
('111353', 'Anup Gandhi'     , 7630967981, 'anpg@gmail.com'     , 'Raigarh'   , 'abod'),
('111354', 'Harsh Jadhav'    , 9274877783, 'harsh@gmail.com'    , 'Mumbai'    , 'xpzq'),
('111355', 'Rajaram Patil'   , 8844998907, 'rajpatil@gmail.com' , 'Pune'      , 'qwer'),
('111356', 'Pradip Darade'   , 9990856583, 'pdarade@gmail.com'  , 'Sangli'    , 'yyui'),
('111357', 'Santosh Ubale'   , 8902345323, 'santoshub@gmail.com', 'Nagpur'    , 'oras'),
('111358', 'Babanrao Wagh'   , 9727119083, 'bwagh@gmail.com'    , 'Satara'    , 'yuio'),
('111359', 'Madhavrao Pawar' , 7774866113, 'madhavp@gmail.com'  , 'Kolhapur'  , 'jklp'),
('111360', 'Satish More'     , 8884861963, 'satishm@gmail.com'  , 'Nashik'    , 'idcd'),
('111361', 'Anil Arote'      , 8274898963, 'aarote@gmail.com'   , 'Nagar'     , 'cdit'),
('111362', 'Kapil Verma'     , 9932201207, 'kapilv@hotmail.com' , 'Hyderabad' , 'rsuv');


create table Crop(
	Crop_ID varchar(7),
	Crop_name varchar(20) not null,
	Quantity_in_kgs numeric(4,2),
	Primary key (Crop_ID));

insert into Crop(Crop_ID, Crop_name, Quantity_in_kgs)values
('333411', 'Wheat'     , 25),
('333412', 'Rice'      , 30),
('333413', 'Bajra'     , 25),
('333414', 'Jawar'     , 25),
('333415', 'Masoor dal', 35),
('333416', 'Urad dal'  , 40),
('333417', 'Tur dal'   , 45),
('333418', 'Mung dal'  , 30),
('333419', 'Urad dal'  , 25),
('333420', 'Soyabean'  , 30);


create table sell_crop(
	Crop_ID varchar(7),
	Farmer_ID varchar(7),
	Price numeric(5,2),
	primary key (Crop_ID, Farmer_ID),
	foreign key (Crop_ID) references Crop(Crop_ID) on delete cascade,
	foreign key (Farmer_ID) references Farmer(Farmer_ID) on delete cascade);

insert into sell_crop(Crop_ID, Farmer_ID, Price)values
('333411', '222123', 100), 
('333412', '222124', 120),
('333413', '222126', 80 ),
('333414', '222127', 90 ),
('333415', '222130', 100),
('333419', '222128', 70 );


create table Machinery(
	Machine_ID varchar(7),
	Machine_name varchar(10),
	Company varchar(15),
	Price numeric(7,2),
	Primary key (Machine_ID));
	
insert into Machinery(machine_ID, Machine_name ,company, Price)values
('444550', 'Tractor', 'jbl_motors'     , 2500),
('444551', 'Plough' , 'Tata_motors'    , 5500),
('444552', 'Baler'  , 'jbl_motors'     , 4500),
('444553', 'Planter', 'Tata_motors'    , 3500),
('444554', 'Harrows', 'jbl_motors'     , 9500),
('444555', 'Sickle' , 'Nandan_machines', 1000);


create table Fertilizer(
	Fertilizer_ID varchar(7),
	Fertilizer_name varchar(20) not null,
	Component varchar(10),
	Price numeric(7,2),
	primary key (fertilizer_ID));

insert into Fertilizer(Fertilizer_ID,Fertilizer_name,Component, Price)values
('666123', 'Urea'              , 'Nitrogen' , 2300),
('666124', 'Ammonium Nitrate'  , 'Nitrogen' , 4300),
('666125', 'Ammonium Sulfate'  , 'Sulphur'  , 3300),
('666126', 'Calcium Nitrate'   , 'Calcium'  , 3400),
('666127', 'Potassium Chloride', 'Potassium', 2200),
('666128', 'Potassium Nitrate' , 'Nitrogen' , 1200);


create table crop_transaction(
	trans_IDc varchar(7),
	Customer_ID varchar(7),
	Crop_ID varchar(7),
	Farmer_ID varchar(7),
	primary key (trans_IDc),
	foreign key (Customer_ID) references Customer(Customer_ID) on delete cascade,
	foreign key (Crop_ID) references Crop(Crop_ID) on delete cascade,
	foreign key (Farmer_ID) references Farmer(Farmer_ID) on delete cascade);
	
insert into crop_transaction(trans_IDc, Customer_ID, Crop_ID, Farmer_ID)values
('555100', '111351', '333411', '222123'),
('555101', '111352', '333412', '222124'),
('555102', '111354', '333413', '222126'),
('555103', '111355', '333414', '222127'),
('555104', '111360', '333419', '222128');


create table machinery_transaction(
	trans_Idm varchar(7),
	Machine_ID varchar(7),
	Customer_ID varchar(7),
	primary key (trans_IDm),
	foreign key(Machine_ID)  references Machinery(Machine_ID) on delete cascade,
	foreign key(Customer_ID) references Customer(Customer_ID) on delete cascade);
	
insert into machinery_transaction(trans_IDm, Machine_ID, Customer_ID)values
('555200', '444550', '111351'),
('555201', '444551', '111353'),
('555202', '444553', '111354'),
('555203', '444554', '111356'),
('555204', '444555', '111360');


create table fertilizer_transaction
	(trans_Idf varchar(7),
	Fertilizer_ID varchar(7),
	Customer_ID varchar(7),
	primary key (trans_IDf),
	foreign key (Fertilizer_ID) references Fertilizer(Fertilizer_ID) on delete cascade,
	foreign key(Customer_ID) references Customer(Customer_ID) on delete cascade);

insert into fertilizer_transaction(trans_IDf, Fertilizer_ID, Customer_ID)values
('555301', '666123', '111357'),
('555302', '666125', '111358'),
('555303', '666126', '111359'),
('555304', '666128', '111360'),
('555305', '666124', '111361');


create table billing(
	bill_ID varchar(7),
	Customer_ID varchar(7),
	Amount  numeric(7,2),
	Card_no int,
	Card_name varchar(20),
	Expiry int,
	CVV numeric(3,0),
	primary key(bill_ID),
	foreign key(Customer_ID) references Customer(Customer_ID) on delete cascade); 

insert into billing(bill_ID, Customer_ID, amount, card_no, card_name, expiry, CVV)values
('999901', '111351', 2600 , 89 , 'ABC', 2022, 111),
('999902', '111352', 120  , 12 , 'DEF', 2021, 222),
('999903', '111353', 5500 , 60 , 'XYZ', 2023, 333),
('999904', '111354', 3580 , 75 , 'MNO', 2024, 444),
('999905', '111355', 90   , 35 , 'PQR', 2025, 555),
('999906', '111356', 9500 , 48 , 'JKL', 2023, 666),
('999907', '111357', 2300 , 36 , 'BCD', 2022, 777),
('999908', '111358', 3300 , 24 , 'UVW', 2023, 888),
('999909', '111359', 3400 , 99 , 'EFG', 2024, 999),
('999910', '111360', 2270 , 11 , 'STU', 2022, 191),
('999911', '111361', 4300 , 23 , 'STD', 2025, 282);




