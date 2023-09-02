<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%domains}}`.
 */
class m230831_172521_create_domains_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%domains}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'ip_address' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%domains}}');
    }
}
