SELECT e.ID,
e.name,
	e.mountainHeight, 
e.success_rate, 
e.speciality, 
e.weather, 
e.popularity, 
e.category_ID,
PC.name as category
FROM events AS e
	JOIN pCategories as PC
	ON e.category_ID = PC.category_ID
WHERE e.name LIKE :term and e.category_ID = :category_ID;