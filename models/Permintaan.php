<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permintaan".
 *
 * @property integer $id
 * @property string $tgl
 * @property integer $id_toko
 * @property string $subtotal
 * @property string $disc
 * @property integer $jml
 * @property string $ppn
 * @property string $total
 * @property integer $insert_user
 * @property string $insert_date
 * @property integer $update_user
 * @property string $update_date
 */
class Permintaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permintaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'insert_date', 'update_date'], 'safe'],
            [['id_toko', 'jml', 'insert_user', 'update_user'], 'integer'],
            [['subtotal', 'disc', 'ppn', 'total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID. Permintaan',
            'tgl' => 'Tgl. Permintaan',
            'id_toko' => 'ID. Toko',
            'subtotal' => 'Subtotal',
            'disc' => 'Discount',
            'jml' => 'Jumlah',
            'ppn' => 'PPN',
            'total' => 'Total',
            'insert_user' => 'User Insert',
            'insert_date' => 'Tgl. Insert',
            'update_user' => 'User Update',
            'update_date' => 'Tgl. Update',
        ];
    }

    /**
     * @inheritdoc
     * @return PermintaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PermintaanQuery(get_called_class());
    }
}
