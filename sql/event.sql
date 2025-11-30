SET GLOBAL event_scheduler = ON

CREATE EVENT finish_operation
ON SCHEDULE EVERY 1 MINUTE
DO
UPDATE operations 
SET isactive = 0 
WHERE expected_finish <= NOW()
AND isactive = 1

CREATE EVENT start_operation
ON SCHEDULE EVERY 1 MINUTE
DO
UPDATE operations 
SET isactive = 1 
WHERE expected_finish >= NOW()
AND isactive = 0