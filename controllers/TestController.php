<?php
namespace app\controllers;

use Yii;
use yii\web\controller;
use app\models\m_email;

class TestController extends Controller{
    public function actionEmail(){
        $model=new m_email();
        $formData = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            $model->email=$formData["email"];
            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success', 'Данные записаны!');
            }else{
                foreach($model->errors as $k=>$v){
                    Yii::$app->session->setFlash('error', $v);
                }
            }
            // выполняем редирект, чтобы избежать повторной отправки формы
            return $this->refresh();
        }
        return $this->render('v_email', ['model'=>$model]);
    }
}