<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penerimaan_detail".
 *
 * @property integer $id
 * @property integer $id_penerimaan
 * @property integer $id_barang
 * @property integer $qty
 * @property string $harga
 * @property string $subtotal
 * @property integer $qty_terima
 */
class PenerimaanDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerimaan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penerimaan', 'id_barang', 'qty', 'qty_terima'], 'integer'],
            [['id_barang'], 'required'],
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
            'id_penerimaan' => 'Id Penerimaan',
            'id_barang' => 'Id Barang',
            'qty' => 'Qty',
            'harga' => 'Harga',
            'subtotal' => 'Subtotal',
            'qty_terima' => 'Qty Terima',
        ];
    }

    /**
     * @inheritdoc
     * @return PenerimaanDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenerimaanDetailQuery(get_called_class());
    }
}
