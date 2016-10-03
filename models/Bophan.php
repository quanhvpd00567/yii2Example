<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_bophan".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status
 */
class Bophan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_bophan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
        ];
    }

    public function getName($id){
      $data = Bophan::find($id)->asArray()->one();
      return $data['title'];
    }
}
