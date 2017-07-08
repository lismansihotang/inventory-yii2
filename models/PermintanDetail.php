<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permintan_detail".
 *
 * @property integer $id
 * @property integer $id_permintaan
 * @property integer $id_barang
 * @property string $harga
 * @property integer $jml
 * @property string $subtotal
 */
class PermintanDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permintan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_permintaan', 'id_barang', 'jml'], 'integer'],
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
            'id_permintaan' => 'ID. Permintaan',
            'id_barang' => 'ID. Barang',
            'harga' => 'Harga',
            'jml' => 'Jumlah',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @inheritdoc
     * @return PermintanDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PermintanDetailQuery(get_called_class());
    }
}
