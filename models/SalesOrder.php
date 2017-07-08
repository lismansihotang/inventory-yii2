<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_order".
 *
 * @property integer $id
 * @property string $tgl
 * @property string $no_po
 * @property string $tgl_po
 * @property integer $id_supplier
 * @property integer $id_customer
 * @property string $no_pengiriman
 * @property string $tgl_pengiriman
 * @property string $lokasi_pengiriman
 * @property string $subtotal
 * @property string $disc
 * @property string $ppn
 * @property string $total
 * @property string $insert_date
 * @property integer $insert_user
 * @property string $update_date
 * @property integer $update_user
 */
class SalesOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'tgl_po', 'tgl_pengiriman', 'insert_date', 'update_date'], 'safe'],
            [['id_supplier', 'id_customer', 'insert_user', 'update_user'], 'integer'],
            [['lokasi_pengiriman'], 'string'],
            [['subtotal', 'disc', 'ppn', 'total'], 'number'],
            [['no_po', 'no_pengiriman'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tgl. Sales Order',
            'no_po' => 'No. Purchase Order',
            'tgl_po' => 'Tgl. Purchase Order',
            'id_supplier' => 'Supplier',
            'id_customer' => 'ID. Customer',
            'no_pengiriman' => 'No. Delivery Order',
            'tgl_pengiriman' => 'Tgl. Delivery Order',
            'lokasi_pengiriman' => 'Lokasi Pengiriman',
            'subtotal' => 'Subtotal',
            'disc' => 'Discount',
            'ppn' => 'PPN',
            'total' => 'Total',
            'insert_date' => 'Tgl. Insert',
            'insert_user' => 'User Insert',
            'update_date' => 'Tgl. Update',
            'update_user' => 'User Update',
        ];
    }

    /**
     * @inheritdoc
     * @return SalesOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalesOrderQuery(get_called_class());
    }
}
