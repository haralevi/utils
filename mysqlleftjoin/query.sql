SELECT D.name, COUNT( E.id ) AS employee_cnt
FROM department_tbl AS D
LEFT JOIN employee_tbl AS E ON D.id = E.id_dept
WHERE 1
GROUP BY D.id
ORDER BY employee_cnt DESC , D.name