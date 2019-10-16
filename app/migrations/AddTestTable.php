<?php

use DeliciousBrains\WPMigrations\Database\AbstractMigration;

class AddTestTable extends AbstractMigration
{

  public function run()
  {
    global $wpdb;

    $sql = "
            CREATE TABLE " . $wpdb->prefix . "test_table (
            id bigint(20) NOT NULL auto_increment,
            some_column varchar(50) NOT NULL,
            PRIMARY KEY (id)
            ) {$this->get_collation()};
        ";

    dbDelta($sql);
  }

  public function rollback()
  {
    global $wpdb;
    $wpdb->query('DROP TABLE ' . $wpdb->prefix . 'test_table');
  }
}
