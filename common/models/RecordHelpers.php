<?php

namespace common\models;

use yii;
use backend\models\StatusMessage;

class RecordHelpers
{

    public static function userHas($model_name)
    {

        $userid = Yii::$app->user->identity->id;

        $connection = \Yii::$app->db;

        $sql = "SELECT id FROM $model_name WHERE user_id=:userid";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $result = $command->queryOne();

        return isset($result['id']) ?  (int)$result['id'] : false;

    }

    public static function findStatusMessage($action_name, $controller_name)
    {

        $result =  StatusMessage::find('id')
            ->where(['action_name' => $action_name])
            ->andWhere(['controller_name' => $controller_name])
            ->one();

        return isset($result['id']) ? $result['id'] : false;

    }

    public static function getMessageSubject($id)
    {


        $result =  StatusMessage::find('subject')
            ->where(['id' => $id])
            ->one();

        return isset($result['subject']) ?  $result['subject'] :  false;

    }

    public static function getMessageBody($id)
    {

        $result =  StatusMessage::find('body')
            ->where(['id' => $id])
            ->one();

        return isset($result['body']) ? $result['body'] : false;

    }

}