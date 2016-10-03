<?php

namespace app\models;

use Yii;
use app\models\Bophan;
/**
 * This is the model class for table "tb_nhanvien".
 *
 * @property integer $id
 * @property string $fullname
 * @property integer $gender
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $phone
 * @property integer $level
 * @property integer $status
 * @property integer $id_bophan
 */
class Nhanvien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_nhanvien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'gender', 'email', 'password', 'address', 'phone', 'level', 'status', 'id_bophan'], 'required'],
            [['gender', 'level', 'status', 'id_bophan'], 'integer'],
            [['fullname', 'password'], 'string', 'max' => 100],
            [['email', 'address'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Full Name',
            'gender' => 'Gender',
            'email' => 'Email',
            'password' => 'Password',
            'address' => 'Address',
            'phone' => 'Phone',
            'level' => 'Level',
            'status' => 'Status',
            'id_bophan' => 'Parts',
        ];
    }

    public function getList()
    {
          $data = Bophan::find()->asArray()->all();
          return $data;
    }
}
