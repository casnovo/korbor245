<?php

namespace backend\modules\sarabun\controllers;

use backend\modules\sarabun\models\Bloc;
use backend\modules\sarabun\models\BlocSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BlocController implements the CRUD actions for Bloc model.
 */
class BlocController extends Controller
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
     * Lists all Bloc models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlocSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bloc model.
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
     * Creates a new Bloc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bloc();

        $url = 'backend.test/uploads/datarefer/';
        $upurl = 'uploads/datarefer/';
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                ///เก็บชื่อและข้อมูลไฟล์เซพลงโฟลเดอร์อัพโหลด
                $thaiyear = substr((string)((int)date("Y")+543),2);;
                $imageName = $model->detail.$thaiyear;
                $model->file = UploadedFile::getInstance($model,'file');
                $model->file->saveAs($upurl.$imageName.'.'.$model->file->extension);
                ///เก็บที่อยู่ลงฐานข้อมููล
                $model->datarefer= $url.$imageName.'.'.$model->file->extension;


                $model->save();
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
     * Updates an existing Bloc model.
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
     * Deletes an existing Bloc model.
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
     * Finds the Bloc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idbloc หมายเลขแฟ้ม
     * @return Bloc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idbloc)
    {
        if (($model = Bloc::findOne(['idbloc' => $idbloc])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
