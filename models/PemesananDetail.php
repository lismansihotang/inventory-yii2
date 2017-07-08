<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemesanan_detail".
 *
 * @property integer $id
 * @property integer $id_pemesanan
 * @property integer $id_barang
 * @property integer $qty
 * @property string $harga
 * @property string $subtotal
 */
class PemesananDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pemesanan', 'id_barang', 'qty'], 'integer'],
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
            'id_pemesanan' => 'Id Pemesanan',
            'id_barang' => 'Id Barang',
            'qty' => 'Qty',
            'harga' => 'Harga',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @inheritdoc
     * @return PemesananDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PemesananDetailQuery(get_called_class());
    }
}
