/*UPDATE users_list
SET avatar = (
	SELECT *
	FROM OPENROWSET(BULK N'C:\OSPanel\domains\ecolab\images\cat.jpg', SINGLE_BLOB)as image)
	
WHERE id = 10*/
/*SELECT * FROM users_list*/
/*
INSERT INTO news_list (name,text,date,tags,place,image,author_id) VALUES 
('Мусор',
'C:\OSPanel\domains\ecolab\articles\news3.txt',
'09.11.2019',
'#Спасиего',
'Адмиралтейский район',
'images\News3.jpg',
10)


UPDATE news_list
SET date = '05.11.2019', tags = '#СпасиУдельныйПарк'
WHERE id >= 3 and id<=7
*/
/*SELECT COUNT(*) FROM news_list*/
/*SELECT MIN(id) FROM news_list*/
/*
UPDATE articles_list
SET image = 'images\News3.jpg'
WHERE id >= 1
SELECT * FROM articles_list
INSERT INTO articles_list (name,text,author_id,date,place,geoposition,am_of_sub,tags,image,popularity) VALUES 
('',
'C:\OSPanel\domains\ecolab\articles\news3.txt',
'09.11.2019',
'#Спасиего',
'Адмиралтейский район',
'images\News3.jpg',
10)*/

UPDATE users_list 
SET 