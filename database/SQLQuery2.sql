/*UPDATE users_list
SET avatar = (
	SELECT *
	FROM OPENROWSET(BULK N'C:\OSPanel\domains\ecolab\images\cat.jpg', SINGLE_BLOB)as image)
	
WHERE id = 10*/
/*SELECT * FROM users_list*/
/*
INSERT INTO news_list (name,text,date,tags,place,image,author_id) VALUES 
('�����',
'C:\OSPanel\domains\ecolab\articles\news3.txt',
'09.11.2019',
'#��������',
'�������������� �����',
'images\News3.jpg',
10)


UPDATE news_list
SET date = '05.11.2019', tags = '#�����������������'
WHERE id >= 3 and id<=7
*/
/*SELECT COUNT(*) FROM news_list*/
/*SELECT MIN(id) FROM news_list*/
/*
UPDATE articles_list
SET image = 'images\News3.jpg'
WHERE id >= 1
SELECT * FROM articles_list


*/
/*
UPDATE users_list 
SET rating += 5, avatar = 'images\cat.jpg' WHERE login = 'Gleb_nk'
*/

/*
INSERT INTO articles_list (name,text,author_id,date,place,geoposition,am_of_sub,tags,image,popularity) VALUES 
('���������� ���� ������� ��� � ����',
'C:\OSPanel\domains\ecolab\articles\p3.txt',
 11,
'08.09.2019',
'���������� �����',
'59.517838, 30.279349',
0,
'#������������������������!; #���������������!',
'images\problem2.jpg',
10)


SELECT * FROM articles_list 
*/

/*
INSERT INTO news_list (name,text,date,tags,place,image,author_id) VALUES 
('������� ������ �����',
'C:\OSPanel\domains\ecolab\articles\news4.txt',
'09.11.2019',
'#����������������������',
'�������������� �����',
'images\problem5.jpg',
11)

SELECT * FROM news_list
*/
/*
INSERT INTO events_list (place, date, head_id, name, [desc], amount,tags) VALUES
('����������� �����, ��. ������ 152',
'16/11/2019',
12,
'���������� ������� �������� ����',
'articles\event4.txt',
0,
'#�� �� ������ ����!')

SELECT * FROM articles_list ORDER BY popularity DESC

SELECT * FROM events_list

INSERT INTO articles_list (name,text,author_id,date,place,geoposition,am_of_sub,tags,image,popularity) VALUES 
('���������� ������ ����� ����: ��� ������?',
'C:\OSPanel\domains\ecolab\articles\garb.txt',
 11,
'08.09.2019',
'���������� �����',
'59.517838, 30.279349',
0,
'#�� �� ������ ������!;',
'images\problem4.jpg',
12)
*/
