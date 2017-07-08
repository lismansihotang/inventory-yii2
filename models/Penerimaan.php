<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "penerimaan".
 *
 * @property integer $id
 * @property string  $tgl
 * @property integer $id_pemesanan
 * @property string  $subtotal
 * @property string  $ppn
 * @property string  $disc
 * @property string  $total
 * @property integer $insert_user
 * @property string  $insert_date
 * @property integer $update_user
 * @property string  $update_date
 */
class Penerimaan extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerimaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'id_pemesanan'], 'required'],
            [['tgl', 'insert_date', 'update_date'], 'safe'],
            [['id_pemesanan', 'insert_user', 'update_user'], 'integer'],
            [['subtotal', 'ppn', 'disc', 'total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'tgl'          => 'Tgl. Penerimaan',
            'id_pemesanan' => 'No. Pemesanan',
            'subtotal'     => 'Subtotal',
            'ppn'          => 'PPN',
            'disc'         => 'Discount',
            'total'        => 'Total',
            'insert_user'  => 'Insert User',
            'insert_date'  => 'Insert Date',
            'update_user'  => 'Update User',
            'update_date'  => 'Update Date',
        ];
    }

    /**
     * @inheritdoc
     * @return PenerimaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenerimaanQuery(get_called_class());
    }
}
