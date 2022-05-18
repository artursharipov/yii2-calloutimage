<?php

use yii\db\Migration;

/**
 * Class m190724_114635_create_table_settings
 */
class m190724_114635_create_table_callout_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callout_image}}', [
            'id' => $this->primaryKey(),
            'cx' => $this->integer()->notNull(),
            'cy' => $this->integer()->notNull(),
            'hash' => $this->string(255)->Null(),
            'img_id' => $this->integer()->notNull(),
            'item_id' => $this->integer()->Null(),
            'text' => $this->string(255)->Null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%callout_image}}');
    }

}
