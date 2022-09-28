<?php

namespace backend\modules\vehicle\controllers;

use backend\modules\vehicle\models\vdoc;
use backend\modules\vehicle\models\VdocSearch;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * VdocController implements the CRUD actions for vdoc model.
 */
class VdocController extends Controller
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
     * Lists all vdoc models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VdocSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single vdoc model.
     * @param int $id ID
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
     * Creates a new vdoc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new vdoc();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->docformat= $model->getExtension($model,'doc') ;
            $model->doc = $model->upload($model,'doc');
            $model->docurl= $model->getPdfurl().$model->doc;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionCreate2($carid)
    {
        $model = new vdoc();
        if(isset( $carid )) {

            $model->vehicle_id=$carid;

        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->docformat= $model->getExtension($model,'doc') ;
            $model->doc = $model->upload($model,'doc');
            $model->docurl= $model->getPdfurl().$model->doc;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create2', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing vdoc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->doc = $model->upload($model,'doc');
            $model->docurl= $model->getPdfurl().$model->doc;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing vdoc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the vdoc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return vdoc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = vdoc::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
