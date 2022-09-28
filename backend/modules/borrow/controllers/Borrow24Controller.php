<?php

namespace backend\modules\borrow\controllers;

use backend\modules\borrow\models\Borrow24;
use backend\modules\borrow\models\Borrow24Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Borrow24Controller implements the CRUD actions for Borrow24 model.
 */
class Borrow24Controller extends Controller
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
     * Lists all Borrow24 models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Borrow24Search();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Borrow24 model.
     * @param int $borrowreturn_idbr Borrowreturn Idbr
     * @param int $wh24_idwh24 Wh 24 Idwh 24
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($borrowreturn_idbr, $wh24_idwh24)
    {
        return $this->render('view', [
            'model' => $this->findModel($borrowreturn_idbr, $wh24_idwh24),
        ]);
    }

    /**
     * Creates a new Borrow24 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Borrow24();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'borrowreturn_idbr' => $model->borrowreturn_idbr, 'wh24_idwh24' => $model->wh24_idwh24]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Borrow24 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $borrowreturn_idbr Borrowreturn Idbr
     * @param int $wh24_idwh24 Wh 24 Idwh 24
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($borrowreturn_idbr, $wh24_idwh24)
    {
        $model = $this->findModel($borrowreturn_idbr, $wh24_idwh24);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'borrowreturn_idbr' => $model->borrowreturn_idbr, 'wh24_idwh24' => $model->wh24_idwh24]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Borrow24 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $borrowreturn_idbr Borrowreturn Idbr
     * @param int $wh24_idwh24 Wh 24 Idwh 24
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($borrowreturn_idbr, $wh24_idwh24)
    {
        $this->findModel($borrowreturn_idbr, $wh24_idwh24)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Borrow24 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $borrowreturn_idbr Borrowreturn Idbr
     * @param int $wh24_idwh24 Wh 24 Idwh 24
     * @return Borrow24 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($borrowreturn_idbr, $wh24_idwh24)
    {
        if (($model = Borrow24::findOne(['borrowreturn_idbr' => $borrowreturn_idbr, 'wh24_idwh24' => $wh24_idwh24])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
