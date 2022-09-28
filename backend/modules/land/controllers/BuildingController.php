<?php

namespace backend\modules\land\controllers;

use backend\modules\land\models\Building;
use backend\modules\land\models\BuildingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
/**
 * BuildingController implements the CRUD actions for Building model.
 */
class BuildingController extends Controller
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
     * Lists all Building models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BuildingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Building model.
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
     * Creates a new Building model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Building();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->pic = $model->upload($model,'pic');
            $model->pics = $model->uploadMultiple($model,'pics');
            $model->recorder = Yii::$app->user->name;
            $model->editor = Yii::$app->user->name;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Building model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ลำดับ
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->pic = $model->upload($model,'pic');
            $model->pics = $model->uploadMultiple($model,'pics');
            $model->editor = Yii::$app->user->name;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Building model.
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
     * Finds the Building model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ลำดับ
     * @return Building the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Building::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
