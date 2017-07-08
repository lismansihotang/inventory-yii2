<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penerimaan;

/**
 * PenerimaanSearch represents the model behind the search form about `app\models\Penerimaan`.
 */
class PenerimaanSearch extends Penerimaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemesanan', 'insert_user', 'update_user'], 'integer'],
            [['tgl', 'insert_date', 'update_date'], 'safe'],
            [['subtotal', 'ppn', 'disc', 'total'], 'number'],
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
        $query = Penerimaan::find();

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
            'id_pemesanan' => $this->id_pemesanan,
            'subtotal' => $this->subtotal,
            'ppn' => $this->ppn,
            'disc' => $this->disc,
            'total' => $this->total,
            'insert_user' => $this->insert_user,
            'insert_date' => $this->insert_date,
            'update_user' => $this->update_user,
            'update_date' => $this->update_date,
        ]);

        return $dataProvider;
    }
}
