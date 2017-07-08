<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Permintaan]].
 *
 * @see Permintaan
 */
class PermintaanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Permintaan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Permintaan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
