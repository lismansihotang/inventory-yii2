<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Permintaan;

/**
 * PermintaanSearch represents the model behind the search form about `app\models\Permintaan`.
 */
class PermintaanSearch extends Permintaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_toko', 'jml', 'insert_user', 'update_user'], 'integer'],
            [['tgl', 'insert_date', 'update_date'], 'safe'],
            [['subtotal', 'disc', 'ppn', 'total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Permintaan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tgl' => $this->tgl,
            'id_toko' => $this->id_toko,
            'subtotal' => $this->subtotal,
            'disc' => $this->disc,
            'jml' => $this->jml,
            'ppn' => $this->ppn,
            'total' => $this->total,
            'insert_user' => $this->insert_user,
            'insert_date' => $this->insert_date,
            'update_user' => $this->update_user,
            'update_date' => $this->update_date,
        ]);

        return $dataProvider;
    }
}
