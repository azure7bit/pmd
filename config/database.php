<?php
class DATABASE_CONFIG {
    public $oracle = array(
        'datasource' => 'OracleDatasource.Oci',
        'persistent' => false,
        'host' => '127.0.0.1',
        'port' => '1521',
        'login' => 'user',
        'password' => 'oracle',
        'schema' => 'USER_SCHEMA',
        'sid' => 'orcl', // or service name
        'prefix' => ''
    );
}
?>