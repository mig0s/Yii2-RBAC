<?php
namespace common\models;
use common\models\ValueHelpers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;
Class PermissionHelpers
{   /**
     * check if the user is the owner of the record
     * use Yii::$app->user->identity->id for $userid, 'string' for model name
     * for example 'profile' will check the profile model to see if the user
     * owns the record. Provide the model instance, typically as $model->id as
     * the last parameter. Returns true or false, so you can wrap in if statement
     * @param mixed $userid
     * @param mixed $model_name
     * @param mixed $model_id
     */
    public static function userMustBeOwner($model_name, $model_id)
    {
        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id=:userid AND id=:model_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $command->bindValue(":model_id", $model_id);
        if($result = $command->queryOne()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * method for requiring paid type user, if test fails, redirect to upgrade page
     * $user_type_name handed in as 'string', 'Paid' for example.
     *
     * used two lines for if statement to avoid word wrapping
     *
     * @param mixed $user_type_name
     * @return \yii\web\Response
     *
     */
    public static function requireUpgradeTo($user_type_name)
    {
        if ( Yii::$app->user->identity->user_type_id !=
            ValueHelpers::getUserTypeValue($user_type_name)) {
            return Yii::$app->getResponse()->redirect(Url::to(['upgrade/index']));
        }
    }
    /**
     * @requireStatus
     * used two lines for if statement to avoid word wrapping
     * @param mixed $status_name
     */
    public static function requireStatus($status_name)
    {
        if ( Yii::$app->user->identity->status_id ==
            ValueHelpers::getStatusValue($status_name)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * @requireMinimumStatus
     * used two lines for if statement to avoid word wrapping
     * @param mixed $status_name
     */
    public static function requireMinimumStatus($status_name)
    {
        if ( Yii::$app->user->identity->status_id >=
            ValueHelpers::getStatusValue($status_name)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * @requireRole
     * used two lines for if statement to avoid word wrapping
     * @param mixed $role_name
     */
    public static function requireRole($role_name)
    {
        if ( Yii::$app->user->identity->role_id ==
            ValueHelpers::getRoleValue($role_name)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * @requireMinimumRole
     * used two lines for if statement to avoid word wrapping
     * @param mixed $role_name
     */
    public static function requireMinimumRole($role_name)
    {
        if ( Yii::$app->user->identity->role_id >=
            ValueHelpers::getRoleValue($role_name)) {
            return true;
        } else {
            return false;
        }
    }
}