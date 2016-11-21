connect to cs3db3;

-- ProductCategory
INSERT INTO MEDICATION(
	name,
	class,
	description,
	ageMin,
	ageMax,
	weightMin,
	weightMax,
	tannerStage,
	renalDysfunction,
	osteoporosis,
	hepatitis,
	hypercholesterolemia,
 	pregnancy,
 	cholestasis,
 	neuropsychiatric,
 	insulinResistance,
 	hyperglycemia,
 	diabetes,
 	medicationType
) VALUES ('Zidoudine','NRIT', 'art medication', 4, 18, 14, 195, 3, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 1);