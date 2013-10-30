CREATE TABLE `probid_gc_transactions` (
`trx_id` INT NOT NULL AUTO_INCREMENT ,
`seller_id` INT NOT NULL ,
`buyer_id` INT NOT NULL ,
`google_order_number` VARCHAR( 255 ) NOT NULL ,
`gc_custom` VARCHAR( 50 ) NOT NULL ,
`gc_table` VARCHAR( 50 ) NOT NULL ,
`gc_price` DOUBLE( 16, 2 ) NOT NULL ,
`gc_currency` VARCHAR( 10 ) NOT NULL ,
`gc_payment_description` VARCHAR( 255 ) NOT NULL ,
`reg_date` INT NOT NULL ,
PRIMARY KEY ( `trx_id` ) 
) ENGINE = MYISAM ;

ALTER TABLE `probid_gen_setts` CHANGE `watermark_size` `watermark_size` INT( 11 ) NOT NULL DEFAULT '500' ;

ALTER TABLE `probid_tax_settings` ADD `seller_countries_id` TEXT NOT NULL ;

ALTER TABLE `probid_auction_rollbacks` ADD `is_offer` TINYINT NOT NULL ;