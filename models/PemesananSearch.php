<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form about `app\models\Pemesanan`.
 */
class PemesananSearch extends Pemesanan
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'insert_user', 'update_user'], 'integer'],
            [['id_supplier', 'tgl', 'insert_date', 'update_date', 'status'], 'safe'],
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
        $query = Pemesanan::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('supplier');
        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id'          => $this->id,
                'tgl'         => $this->tgl,
                'subtotal'    => $this->subtotal,
                'ppn'         => $this->ppn,
                'disc'        => $this->disc,
                'total'       => $this->total,
                'insert_user' => $this->insert_user,
                'insert_date' => $this->insert_date,
                'update_user' => $this->update_user,
                'update_date' => $this->update_date,
            ]
        );
        $query->andFilterWhere(['like', 'status', $this->status])->andFilterWhere(
            [
                'like',
                'supplier.nm_supplier',
                $this->id_supplier
            ]
        );
        return $dataProvider;
    }
}
