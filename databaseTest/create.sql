--connect to database;

connect to cs3db3;

--create tables
create table MEDICATION(
	name varchar(20),
	class varchar(20),
	description varchar(50),
	ageMin integer not null,
	ageMax integer not null,
	weightMin integer not null,
	weightMax integer not null,
	tannerStage integer not null,
	renalDysfunction char(1),
	osteoporosis char(1),
	hepatitis char(1),
	hypercholesterolemia char(1),
 	pregnancy char(1),
 	cholestasis char(1),
 	neuropsychiatric char(1),
 	insulinResistance char(1),
 	hyperglycemia char(1),
 	diabetes char(1),
 	medicationType integer not null
);

list tables;