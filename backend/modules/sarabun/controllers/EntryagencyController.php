<?php

namespace backend\modules\sarabun\controllers;

use backend\modules\sarabun\models\Entryagency;
use backend\modules\sarabun\models\EntryagencySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EntryagencyController implements the CRUD actions for Entryagency model.
 */
class EntryagencyController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Entryagency models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EntryagencySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entryagency model.
     * @param int $identryagency หมายเลขหน่วยงานหนังสือเข้า
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($identryagency)
    {
        return $this->render('view', [
            'model' => $this->findModel($identryagency),
        ]);
    }

    /**
     * Creates a new Entryagency model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Entryagency();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'identryagency' => $model->identryagency]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Entryagency model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $identryagency หมายเลขหน่วยงานหนังสือเข้า
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($identryagency)
    {
        $model = $this->findModel($identryagency);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'identryagency' => $model->identryagency]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Entryagency model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $identryagency หมายเลขหน่วยงานหนังสือเข้า
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($identryagency)
    {
        $this->findModel($identryagency)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Entryagency model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $identryagency หมายเลขหน่วยงานหนังสือเข้า
     * @return Entryagency the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($identryagency)
    {
        if (($model = Entryagency::findOne(['identryagency' => $identryagency])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
