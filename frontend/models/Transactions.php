<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property integer $id
 * @property string $txn_id
 * @property string $txn_type
 * @property double $mc_gross
 * @property double $mc_fee
 * @property string $mc_currency
 * @property integer $quantity
 * @property string $payment_date
 * @property string $payment_status
 * @property string $business
 * @property string $receiver_email
 * @property string $payer_id
 * @property string $payer_email
 * @property string $custom
 * @property string $created_date
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mc_gross', 'mc_fee'], 'number'],
            [['quantity'], 'integer'],
            [['created_date'], 'safe'],
            [['txn_id', 'txn_type', 'mc_currency', 'payment_date', 'payment_status', 'business', 'receiver_email', 'payer_id', 'payer_email', 'custom'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'txn_id' => 'Txn ID',
            'txn_type' => 'Txn Type',
            'mc_gross' => 'Mc Gross',
            'mc_fee' => 'Mc Fee',
            'mc_currency' => 'Mc Currency',
            'quantity' => 'Quantity',
            'payment_date' => 'Payment Date',
            'payment_status' => 'Payment Status',
            'business' => 'Business',
            'receiver_email' => 'Receiver Email',
            'payer_id' => 'Payer ID',
            'payer_email' => 'Payer Email',
            'custom' => 'Custom',
            'created_date' => 'Created Date',
        ];
    }
}
