SELECT id, COUNT(id) as count
FROM your_table_name
GROUP BY id
HAVING count > 1;
