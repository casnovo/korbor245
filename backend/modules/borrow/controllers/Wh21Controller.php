<?php

namespace backend\modules\borrow\controllers;

use backend\modules\borrow\models\Wh21;
use backend\modules\borrow\models\Wh21Seaech;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Wh21Controller implements the CRUD actions for Wh21 model.
 */
class Wh21Controller extends Controller
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
     * Lists all Wh21 models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Wh21Seaech();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wh21 model.
     * @param int $idwh21 Idwh 21
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idwh21)
    {
        return $this->render('view', [
            'model' => $this->findModel($idwh21),
        ]);
    }

    /**
     * Creates a new Wh21 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Wh21();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idwh21' => $model->idwh21]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Wh21 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idwh21 Idwh 21
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idwh21)
    {
        $model = $this->findModel($idwh21);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idwh21' => $model->idwh21]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Wh21 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idwh21 Idwh 21
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idwh21)
    {
        $this->findModel($idwh21)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Wh21 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idwh21 Idwh 21
     * @return Wh21 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idwh21)
    {
        if (($model = Wh21::findOne(['idwh21' => $idwh21])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
