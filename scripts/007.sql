delimiter //
CREATE PROCEDURE `process_donation`(
										IN PERSON_ID INT(20),
                    IN ITEM_ID INT(20),
                    IN cond varchar(1),
                    IN category varchar(1),
                    IN price double,
                    brand varchar(20))
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;

	START TRANSACTION;

    INSERT
		INTO item (
						cond,
            category,
            price,
            brand )
		VALUES
			(
            COND,
            CATEGORY,
            PRICE,
            BRAND
            );

    INSERT
		INTO donation_history
        (
        PERSON_ID,
        ITEM_ID,
				valuedAt
        )
        values
        (
        PERSON_ID,
        ITEM_ID,
				PRICE
        );
	COMMIT;


END//
delimiter ;
