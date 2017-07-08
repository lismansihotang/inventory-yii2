<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PermintanDetail]].
 *
 * @see PermintanDetail
 */
class PermintanDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PermintanDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PermintanDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
