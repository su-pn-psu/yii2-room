<?php

namespace suPnPsu\room\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use suPnPsu\room\models\Room;

/**
 * RoomSearch represents the model behind the search form about `suPnPsu\room\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'support_no', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['code', 'title', 'building', 'class', 'close_up','details'], 'safe'],
        ];
    }
    public $details;

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
        $query = Room::find();

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
            'support_no' => $this->support_no,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'building', $this->building])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'close_up', $this->close_up])
                
            ->andFilterWhere(['like', 'support_no', $this->details])
            ->andFilterWhere(['like', 'building', $this->details])
            ->andFilterWhere(['like', 'class', $this->details])
            ->andFilterWhere(['like', 'close_up', $this->details]);

        return $dataProvider;
    }
}
