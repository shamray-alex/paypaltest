<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transactions`.
 */
class m161125_081149_create_transactions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('transactions', [
            'id' => $this->primaryKey(),
            'txn_id' => $this->string(),
            'txn_type' => $this->string(),
            'mc_gross' => $this->float(),
            'mc_fee' => $this->float(),
            'mc_currency' => $this->string(),
            'quantity' => $this->integer(),
            'payment_date' => $this->string(),
            'payment_status' => $this->string(),
            'business' => $this->string(),
            'receiver_email' => $this->string(),
            'payer_id' => $this->string(),
            'payer_email' => $this->string(),
            'custom' => $this->string(),
            'created_date' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('transactions');
    }
}
