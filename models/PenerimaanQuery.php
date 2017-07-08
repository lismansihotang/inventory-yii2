<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Penerimaan]].
 *
 * @see Penerimaan
 */
class PenerimaanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Penerimaan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Penerimaan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
