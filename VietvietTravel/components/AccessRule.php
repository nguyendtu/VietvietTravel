<?php

    namespace app\components;

    use app\models\User;

    class AccessRule extends  \yii\filters\AccessRule{
/*
        public static function className()
        {
            return 'AccessRule';
        }*/

        protected function matchRole($user){
            if(empty($this->roles)){
                return true;
            }
            foreach($this->roles as $role){
                if($role == '?'){
                    if($user->getIsGuest()){
                        return true;
                    }
                }
                elseif($role == User::ROLE_USER){
                    if(!$user->getIsGuest()){
                        return true;
                    }
                }
                elseif(!$user->getIsGuest() && $role == $user->identity->permit){
                    return true;
                }
            }

            return false;
        }
    }
?>