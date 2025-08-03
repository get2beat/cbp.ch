#
# Table structure for table 'tx_projects_domain_model_project'
#
CREATE TABLE tx_projects_domain_model_project (
  urlsegment varchar(255) DEFAULT '' NOT NULL,
  topproject smallint(5) unsigned DEFAULT '0' NOT NULL,
  onlylist smallint(5) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	seotitle varchar(255) DEFAULT '' NOT NULL,
  seodesc varchar(255) DEFAULT '' NOT NULL,
	listimage int(11) unsigned NOT NULL default '0',
	headerimage int(11) unsigned NOT NULL default '0',
	year varchar(255) DEFAULT '' NOT NULL,
	projectplanning varchar(255) DEFAULT '' NOT NULL,
	realization varchar(255) DEFAULT '' NOT NULL,
	award varchar(255) DEFAULT '' NOT NULL,
	owner varchar(255) DEFAULT '' NOT NULL,
	architect varchar(255) DEFAULT '' NOT NULL,
	partner varchar(255) DEFAULT '' NOT NULL,
	copyright varchar(255) DEFAULT '' NOT NULL,
	description text,
	images int(11) unsigned NOT NULL default '0',
	area text NOT NULL,
);

#
# Table structure for table 'tx_projects_domain_model_area'
#
CREATE TABLE tx_projects_domain_model_area (

	area varchar(255) DEFAULT '' NOT NULL,
	worklist text,
	sorting int(11) DEFAULT '0' NOT NULL

);
