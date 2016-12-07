<?php

use yii\db\Migration;

/**
 * Handles adding order_key to table `user`.
 */
class m161129_131318_add_order_key_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'order_key', $this->string()->after('auth_key'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'order_key');
    }
}
