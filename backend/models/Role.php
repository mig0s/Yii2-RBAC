<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $role_name
 * @property integer $role_value
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['role_name', 'role_value'], 'required'],
            [['role_value'], 'integer'],
            [['role_value'],'in', 'range'=>range(1,100)],
            [['role_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'role_value' => 'Role Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getUsers()
    {

        return $this->hasMany(User::className(), ['role_id' => 'id']);

    }

}