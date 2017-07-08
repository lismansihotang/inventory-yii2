<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang_stock_gudang_detail".
 *
 * @property integer $id
 * @property integer $id_stock
 * @property string $harga
 * @property integer $stock
 * @property string $tgl
 * @property string $insert_date
 * @property string $update_date
 */
class BarangStockGudangDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_stock_gudang_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_stock', 'stock'], 'integer'],
            [['harga'], 'number'],
            [['tgl', 'insert_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_stock' => 'ID Stock',
            'harga' => 'Harga',
            'stock' => 'Stock',
            'tgl' => 'Tgl',
            'insert_date' => 'Insert Date',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * @inheritdoc
     * @return BarangStockGudangDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BarangStockGudangDetailQuery(get_called_class());
    }
}
