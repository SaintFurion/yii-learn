<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sites}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%domain}}`
 * - `{{%server}}`
 */
class m230831_183953_create_sites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sites}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(12)->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->datetime(),
            'domain_id' => $this->integer(),
            'server_id' => $this->integer(),
        ]);

        // creates index for column `domain_id`
        $this->createIndex(
            '{{%idx-sites-domain_id}}',
            '{{%sites}}',
            'domain_id'
        );

        // add foreign key for table `{{%domain}}`
        $this->addForeignKey(
            '{{%fk-sites-domain_id}}',
            '{{%sites}}',
            'domain_id',
            '{{%domain}}',
            'id',
            'CASCADE'
        );

        // creates index for column `server_id`
        $this->createIndex(
            '{{%idx-sites-server_id}}',
            '{{%sites}}',
            'server_id'
        );

        // add foreign key for table `{{%server}}`
        $this->addForeignKey(
            '{{%fk-sites-server_id}}',
            '{{%sites}}',
            'server_id',
            '{{%server}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%domain}}`
        $this->dropForeignKey(
            '{{%fk-sites-domain_id}}',
            '{{%sites}}'
        );

        // drops index for column `domain_id`
        $this->dropIndex(
            '{{%idx-sites-domain_id}}',
            '{{%sites}}'
        );

        // drops foreign key for table `{{%server}}`
        $this->dropForeignKey(
            '{{%fk-sites-server_id}}',
            '{{%sites}}'
        );

        // drops index for column `server_id`
        $this->dropIndex(
            '{{%idx-sites-server_id}}',
            '{{%sites}}'
        );

        $this->dropTable('{{%sites}}');
    }
}
