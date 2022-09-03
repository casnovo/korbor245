<?php

namespace backend\modules\borrow\controllers;

use backend\modules\borrow\models\Force;
use backend\modules\borrow\models\ForceSeaech;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ForceController implements the CRUD actions for Force model.
 */
class ForceController extends Controller
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
     * Lists all Force models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ForceSeaech();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Force model.
     * @param string $idforce หมายเลขบัตรประชาชน
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idforce)
    {
        return $this->render('view', [
            'model' => $this->findModel($idforce),
        ]);
    }

    /**
     * Creates a new Force model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Force();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idforce' => $model->idforce]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Force model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idforce หมายเลขบัตรประชาชน
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idforce)
    {
        $model = $this->findModel($idforce);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idforce' => $model->idforce]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Force model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idforce หมายเลขบัตรประชาชน
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idforce)
    {
        $this->findModel($idforce)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Force model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idforce หมายเลขบัตรประชาชน
     * @return Force the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idforce)
    {
        if (($model = Force::findOne(['idforce' => $idforce])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
