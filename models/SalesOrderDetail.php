<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_order_detail".
 *
 * @property integer $id
 * @property integer $so_id
 * @property integer $id_barang
 * @property integer $jml
 * @property string $harga
 * @property string $subtotal
 */
class SalesOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['so_id', 'id_barang', 'jml'], 'integer'],
            [['harga', 'subtotal'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'so_id' => 'Sales Order ID',
            'id_barang' => 'ID Barang',
            'jml' => 'Jumlah',
            'harga' => 'Harga',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @inheritdoc
     * @return SalesOrderDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalesOrderDetailQuery(get_called_class());
    }
}
