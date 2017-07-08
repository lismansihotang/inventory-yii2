<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang_stock_gudang".
 *
 * @property integer $id
 * @property integer $id_barang
 * @property integer $stock
 */
class BarangStockGudang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_stock_gudang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang', 'stock'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barang' => 'Id Barang',
            'stock' => 'Stock',
        ];
    }

    /**
     * @inheritdoc
     * @return BarangStockGudangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BarangStockGudangQuery(get_called_class());
    }
}
