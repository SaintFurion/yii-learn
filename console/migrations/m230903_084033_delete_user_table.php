<?php

use yii\db\Migration;

/**
 * Class m230903_084033_delete_user_table
 */
class m230903_084033_delete_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%user}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230903_084033_delete_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230903_084033_delete_user_table cannot be reverted.\n";

        return false;
    }
    */
}
