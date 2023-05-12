INSERT INTO users(nameuser,emailuser,mdpuser) VALUES
('Mikaelson','k@gmail.com','klaus');

INSERT INTO villes(nomville) VALUES
('Antananarivo'),
('Toamasina');

INSERT INTO routes(nomroute,idvilledep,idvillearrive,distance) VALUES
('RN2',1,2,100);

INSERT INTO portions(idroute,debut,fin,etat,created_at,updated_at) VALUES
(1,0,50,2,now(),now());

select*from routes r join villes d  on r.idvilledep=d.idville join villes a  on r.idvillearrive=a.idville;

SELECT COUNT(*) as existant FROM portions WHERE (debut<=60 AND fin>=65) OR (debut<=65 and fin>=60)

--budget
select ((fin-debut)*30000000) as budget from portions;

--dureee
select ((fin-debut)*2) as duree from portions;


select "r"."idroute", "r"."nomroute", "r"."idvilledep", "r"."idvillearrive", "r"."distance", "p"."idportion", "p"."debut", "p"."fin", "p"."etat",
 LEAST((p.fin-p.debut)*
 CASE etat 
    WHEN 1 THEN 30000000.0
    WHEN 2 THEN 50000000.0
    WHEN 3 THEN 70000000.0
    WHEN 4 THEN 90000000.0
    ELSE 0 END,9999999999999999) AS budget from "portions" as "p" inner join "routes" as "r" on "r"."idroute" = "p"."idroute"
     where "r"."idroute" = 1;

select*from routes where (1 is null or idvilledep=1) and (null is null or idvillearrive=null);