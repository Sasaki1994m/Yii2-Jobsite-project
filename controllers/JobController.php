<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Job;
use app\models\Category;

class JobController extends \yii\web\Controller
{
    // アクセス制御
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'edit', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex($category = 0)
    {
        // Select Query
        $query =  Job::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        if (!empty($category)) {
            $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->where(['category_id' => $category])
            ->all();
        } else {
            $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        }

        return $this->render('index', [
                'jobs' => $jobs,
                'pagination' => $pagination
        ] );
    }

    public function actionDetails($id)
    {
        $job = Job::find()
                ->where(['id' => $id])
                ->one();

        return $this->render('detail', ['job' => $job]);
    }


    public function actionCreate()
    {
        $job = new Job();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {

                $job->save();  // Save to DB
                // Show Msessage 
                yii::$app->getSession()->setFlash('success', 'Job addd successfuly');
                return $this->redirect('index.php?r=job') ;
            }
        }
    
        return $this->render('create', ['job' => $job,]);
    }

    public function actionEdit($id)
    {
        $job = Job::findOne($id);

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {

                $job->save();  // Save to DB
                // Show Msessage 
                yii::$app->getSession()->setFlash('success', 'Job Update successfuly');
                return $this->redirect('index.php?r=job') ;
            }
        }
    
        return $this->render('edit', ['job' => $job,]);
    }

    public function actionDelete($id)
    {
        // Delete Job
        $job = Job::findOne($id);
        $job->delete();
        // Show Msessage 
        yii::$app->getSession()->setFlash('success', 'Job Delete successfuly');
        return $this->redirect('index.php?r=job') ;

    }



}
