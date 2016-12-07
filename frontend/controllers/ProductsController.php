<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use app\models\Transactions;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;


/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['buy', 'download'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => [],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' =>true,
                        'actions' => ['buy', 'download'],
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    public function actionBuy()
    {
        
        $user = User::findOne(Yii::$app->user->id); //get login user
        
        if (empty($user->order_key)){               
            //make key for user buy, that key sends to paypal to check that user  
            $user->order_key = md5(rand(1,500000));
            $user->save();
        }
            
        $transaction = Transactions::find()
            ->where(['custom' => $user->order_key])
            ->one();

            // check if there is already paid for the purchase of this user if so then redirect it to the download page if not sent the form on Paypal
        if(empty($transaction)){
            return $this->render('buy', ['secret' => $user->order_key,]);
        }else{
            return $this->redirect(['/products/download']);
        

        }
    }
    
    public function actionDownload(){
            
            $bsurl = Url::home();
            $user = User::findOne(Yii::$app->user->id);

            //checking the user key in transactions
            if (!empty($user->order_key)) {
                $loccustom = Transactions::find()
                    ->where(['custom' => $user->order_key])
                    ->one();
            }
            //Checking the transactions otherwise redirect to buy.
            if (!empty($loccustom)){
                    //The file is copied to the folder and rename files and folder with the user key
                    $key = $loccustom->custom;
                    $file = 'example.zip';
                    $newfile = 'load/'.$key.'/'.$key.'.zip';
                     if (!file_exists($newfile)) {
                        mkdir('load/'.$key, 0755);
                     if (!copy($file, $newfile)) {
                        return $this->render('download-error');
                     }
                    }

                return $this->render('download',[
                    'post'=> $loccustom,
                    'bsurl' => $bsurl,
                    'file' => $newfile,
                ]);
            }else{
                return $this->redirect(['/products/buy']);
            }

        }

 
}
