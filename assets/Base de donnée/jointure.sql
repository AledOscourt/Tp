------------------------------------------------------------------------------------------------------------------
------------------------------------------------- USER LIST ----------------------------------------------------- 
------------------------------------------------------------------------------------------------------------------

SELECT
    s4u3u_users.id,
    userName,
    email,
    s4u3u_roles.name,
    count(s4u3u_opinions.id) AS nbrOpinions,
    COUNT(CASE 
       WHEN s4u3u_reports.id_users = s4u3u_users.id THEN s4u3u_reports.id_users
END) AS nbrReportsTaken,
COUNT(CASE 
       WHEN s4u3u_reports.id_users_write = s4u3u_users.id THEN s4u3u_reports.id_users_write
END) AS nbrReportsTaken,
count(s4u3u_offers.id) AS nbrOffer

FROM
    `s4u3u_users`
    INNER JOIN `s4u3u_roles` ON s4u3u_users.id_roles = s4u3u_roles.id
    LEFT JOIN `s4u3u_opinions` ON s4u3u_users.id = s4u3u_opinions.id_users
    LEFT JOIN `s4u3u_offers` 
    ON s4u3u_users.id = s4u3u_opinions.id_users AND s4u3u_offers.id_opinions = s4u3u_opinions.id
    LEFT JOIN `s4u3u_reports` ON s4u3u_users.id IN (
        s4u3u_reports.id_users,
        s4u3u_reports.id_users_write
    )
GROUP BY s4u3u_users.id

------------------------------------------------- PDO ----------------------------------------------------- 

'SELECT s4u3u_users.id,userName,email,s4u3u_roles.name,count(s4u3u_opinion.id) AS nbrOpinions,COUNT(CASE WHEN s4u3u_reports.id_users = s4u3u_users.id THEN s4u3u_reports.id_users END) AS nbrReportsTaken,COUNT(CASE WHEN s4u3u_reports.id_users_write = s4u3u_users.id THEN s4u3u_reports.id_users_write END) AS nbrReportsGifted '
        .'FROM `s4u3u_users` '
        .'INNER JOIN `s4u3u_roles` '
        .'ON s4u3u_users.id_roles = s4u3u_roles.id '
        .'LEFT JOIN `s4u3u_opinion` '
        .'ON s4u3u_users.id = s4u3u_opinion.id_users '
        .'LEFT JOIN `s4u3u_offers` '
        .'ON s4u3u_users.id = s4u3u_opinions.id_users AND s4u3u_offers.id_opinions = s4u3u_opinions.id '
        .'LEFT JOIN `s4u3u_reports` '
        .'ON s4u3u_users.id IN (s4u3u_reports.id_users,s4u3u_reports.id_users_write) '
        .'GROUP BY s4u3u_users.id; '
------------------------------------------------- TEST ----------------------------------------------------- 



------------------------------------------------------------------------------------------------------------------
------------------------------------------------- New USER LIST --------------------------------------------------
------------------------------------------------------------------------------------------------------------------


SELECT
    user.id,
    userName,
    email,
    s4u3u_roles.name,
    count(s4u3u_opinions.id) AS nbrOpinions,
    COUNT(CASE 
       WHEN s4u3u_reports.id_users = user.id THEN s4u3u_reports.id_users
END) AS nbrReportsTaken


FROM
    `s4u3u_users` AS user
    INNER JOIN `s4u3u_roles` ON user.id_roles = s4u3u_roles.id
    LEFT JOIN `s4u3u_opinions` ON user.id = s4u3u_opinions.id_users
    LEFT JOIN `s4u3u_reports` ON user.id IN (
        s4u3u_reports.id_users,
        s4u3u_reports.id_users_write
    )

GROUP BY user.id
ORDER BY user.id DESC
LIMIT 3;
------------------------------------------------- PDO ----------------------------------------------------- 

'SELECT s4u3u_users.id,userName,email,s4u3u_roles.name,count(s4u3u_opinion.id) AS nbrOpinions,COUNT(CASE WHEN s4u3u_reports.id_users = s4u3u_users.id THEN s4u3u_reports.id_users END) AS nbrReportsTaken '
        .'FROM `s4u3u_users` AS user'
        .'INNER JOIN `s4u3u_roles` '
        .'ON s4u3u_users.id_roles = s4u3u_roles.id '
        .'LEFT JOIN `s4u3u_opinion` '
        .'ON s4u3u_users.id = s4u3u_opinion.id_users ' 
        .'LEFT JOIN `s4u3u_reports` '
        .'ON s4u3u_users.id IN (s4u3u_reports.id_users,s4u3u_reports.id_users_write) '
        .'GROUP BY user.id '
        .'ORDER BY user.id DESC '
        .'LIMIT 3;'

------------------------------------------------------------------------------------------------------------------
------------------------------------------------- OFFERS List --------------------------------------------------
------------------------------------------------------------------------------------------------------------------


SELECT
    

FROM
    `s4u3u_offers` AS offer
    INNER JOIN `s4u3u_pops` ON 


------------------------------------------------- PDO ----------------------------------------------------- 

