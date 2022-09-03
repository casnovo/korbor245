<?php

namespace backend\modules\sarabun\controllers;

use backend\modules\sarabun\models\Blocin;
use backend\modules\sarabun\models\BlocinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlocinController implements the CRUD actions for Blocin model.
 */
class BlocinController extends Controller
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
     * Lists all Blocin models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlocinSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blocin model.
     * @param int $idbloc หมายเลขแฟ้ม
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idbloc)
    {
        return $this->render('view', [
            'model' => $this->findModel($idbloc),
        ]);
    }

    /**
     * Creates a new Blocin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Blocin();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idbloc' => $model->idbloc]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Blocin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idbloc หมายเลขแฟ้ม
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idbloc)
    {
        $model = $this->findModel($idbloc);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idbloc' => $model->idbloc]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Blocin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idbloc หมายเลขแฟ้ม
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idbloc)
    {
        $this->findModel($idbloc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blocin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idbloc หมายเลขแฟ้ม
     * @return Blocin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idbloc)
    {
        if (($model = Blocin::findOne(['idbloc' => $idbloc])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
