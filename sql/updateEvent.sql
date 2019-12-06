UPDATE events
SET name = :name, category_ID = :categoryID, weather = :weather, popularity = :popularity, speciality= :speciality, mountainHeight= :mtheight, success_rate= :successRate 
WHERE id = :ID; 

