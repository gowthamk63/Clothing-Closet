CREATE DEFINER=`root`@`localhost` PROCEDURE `process_donation`(
					IN PERSON_ID INT(20), 
                    IN ITEM_ID INT(20), 
                    IN cond varchar(1), 
                    IN category varchar(1), 
                    IN price double, 
                    IN color varchar(20), 
                    brand varchar(20))
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
    
	START TRANSACTION;
			
    INSERT 
		INTO item (
			cond, 
            category, 
            price, 
            color, 
            brand )
		VALUES
			(
            COND,
            CATEGORY,
            PRICE,
            COLOR,
            BRAND
            );
	
    INSERT 
		INTO DONATION_HISTORY
        (
        PERSON_ID,
        ITEM_ID
        )
        values
        (
        PERSON_ID,
        ITEM_ID
        );
	COMMIT;

    
END