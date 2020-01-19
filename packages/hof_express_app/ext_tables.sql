#
# Table structure for table 'tx_hofexpressapp_domain_model_food'
#
CREATE TABLE tx_hofexpressapp_domain_model_food (

	name varchar(255) DEFAULT '' NOT NULL,
	price double(11,2) DEFAULT '0.00' NOT NULL,
	description text,
	image int(11) unsigned NOT NULL default '0',
	food_type int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_restaurant'
#
CREATE TABLE tx_hofexpressapp_domain_model_restaurant (

	name varchar(255) DEFAULT '' NOT NULL,
	description text,
	image int(11) unsigned NOT NULL default '0',
	cover_image int(11) unsigned NOT NULL default '0',
	menus int(11) unsigned DEFAULT '0' NOT NULL

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_orderitems'
#
CREATE TABLE tx_hofexpressapp_domain_model_orderitems (

	tx_order int(11) unsigned DEFAULT '0' NOT NULL,

	quantity int(11) DEFAULT '0' NOT NULL,
	food text NOT NULL

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_order'
#
CREATE TABLE tx_hofexpressapp_domain_model_order (

	total int(11) DEFAULT '0' NOT NULL,
	order_items int(11) unsigned DEFAULT '0' NOT NULL,
	order_status int(11) unsigned DEFAULT '0',
	customer int(11) unsigned DEFAULT '0',
	delivery_type int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_address'
#
CREATE TABLE tx_hofexpressapp_domain_model_address (

	street varchar(255) DEFAULT '' NOT NULL,
	house_number varchar(255) DEFAULT '' NOT NULL,
	region varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_customer'
#
CREATE TABLE tx_hofexpressapp_domain_model_customer (

	user_id int(11) DEFAULT '0' NOT NULL,
	phonenumber varchar(255) DEFAULT '' NOT NULL,
	address int(11) unsigned DEFAULT '0',
	user int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_menu'
#
CREATE TABLE tx_hofexpressapp_domain_model_menu (

	restaurant int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description text,
	foods text NOT NULL

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_deliverytype'
#
CREATE TABLE tx_hofexpressapp_domain_model_deliverytype (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_foodtype'
#
CREATE TABLE tx_hofexpressapp_domain_model_foodtype (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_hofexpressapp_domain_model_orderstatus'
#
CREATE TABLE tx_hofexpressapp_domain_model_orderstatus (

	name varchar(255) DEFAULT '' NOT NULL,
	description text

);
