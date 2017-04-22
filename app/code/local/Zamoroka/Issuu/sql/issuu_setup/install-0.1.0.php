<?php
/**
 * Created by PhpStorm.
 * User: zamoroka
 * Date: 22.04.2017
 * Time: 0:49
 */
$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('zamoroka_issuu');
if ($installer->getConnection()->isTableExists($tableName) != true) {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('zamoroka_issuu'))
        ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ), 'Id')
        ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_INTEGER, 1, array(
            'nullable' => false,
        ), 'Is active')
        ->addColumn('date_start', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
            'nullable' => false,
        ), 'Start publishing on')
        ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
            'nullable' => false,
        ), 'Title')
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
            'nullable' => false,
        ), 'Description')
        ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
        ), 'Content')
        ->addColumn('url', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
            'nullable' => false,
        ), 'Url')
        ->addColumn('thumbnail_url', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
            'nullable' => false,
        ), 'Image')
        ->addColumn('author_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
            'nullable' => false,
        ), 'Author name')
        ->addColumn('author_url', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
            'nullable' => false,
        ), 'Author url');
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();