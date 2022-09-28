<?php

namespace backend\modules\vehicle\controllers;

use backend\modules\vehicle\models\vehicle;
use backend\modules\vehicle\models\VehicleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * VehicleController implements the CRUD actions for vehicle model.
 */
class VehicleController extends Controller
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
     * Lists all vehicle models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VehicleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single vehicle model.
     * @param int $id ลำดับ
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new vehicle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new vehicle();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->vimg = $model->upload($model,'vimg');
            $model->vimgs = $model->uploadMultiple($model,'vimgs');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing vehicle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ลำดับ
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->vimg = $model->upload($model,'vimg');
            $model->vimgs = $model->uploadMultiple($model,'vimgs');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing vehicle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ลำดับ
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the vehicle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ลำดับ
     * @return vehicle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = vehicle::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
