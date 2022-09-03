<?php

namespace backend\modules\sarabun\controllers;

use backend\modules\sarabun\models\sarabunout;
use backend\modules\sarabun\models\SarabunoutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SarabunoutController implements the CRUD actions for sarabunout model.
 */
class SarabunoutController extends Controller
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
     * Lists all sarabunout models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SarabunoutSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single sarabunout model.
     * @param int $idsarabun ทะเบียนหนังสือส่ง
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idsarabun)
    {
        return $this->render('view', [
            'model' => $this->findModel($idsarabun),
        ]);
    }

    /**
     * Creates a new sarabunout model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new sarabunout();
        $url = 'backend.test/uploads/';
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                ///เก็บชื่อและข้อมูลไฟล์เซพลงโฟลเดอร์อัพโหลด
                $thaiyear = substr((string)((int)date("Y")+543),2);;
                $imageName = $model->details.$thaiyear;
                $model->file = UploadedFile::getInstance($model,'file');
                $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
                ///เก็บที่อยู่ลงฐานข้อมููล
                $model->data=$url.$imageName.'.'.$model->file->extension;
                switch ($model->kind) {
                    case "1":
                        $model->kind='ว.';
                        break;
                    case "2":
                        $model->kind='น.';
                        break;
                }
                $temp = $model->kind.'0030.34(245)/'.$model->binid ;
                $model->binid = $temp ;
                $model->save();
                return $this->redirect(['view', 'idsarabun' => $model->idsarabun]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing sarabunout model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idsarabun ทะเบียนหนังสือส่ง
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idsarabun)
    {
        $model = $this->findModel($idsarabun);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idsarabun' => $model->idsarabun]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing sarabunout model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idsarabun ทะเบียนหนังสือส่ง
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idsarabun)
    {
        $this->findModel($idsarabun)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the sarabunout model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idsarabun ทะเบียนหนังสือส่ง
     * @return sarabunout the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idsarabun)
    {
        if (($model = sarabunout::findOne(['idsarabun' => $idsarabun])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
