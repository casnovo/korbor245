<?php

namespace backend\modules\borrow\controllers;

use backend\modules\borrow\models\Borrowreturn;
use backend\modules\borrow\models\BorrowreturnSearch;
use backend\modules\borrow\models\Wh24;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpWord\TemplateProcessor;
use Yii;
use PhpOffice\PhpWord\Settings;
use backend\modules\borrow\models\Forcefullname;
use backend\modules\borrow\models\Wh21;
use backend\modules\borrow\models\Borrow24;
use yii\helpers\ArrayHelper;

/**
 * BorrowreturnController implements the CRUD actions for Borrowreturn model.
 */

class BorrowreturnController extends Controller
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
     * Lists all Borrowreturn models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BorrowreturnSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Borrowreturn model.
     * @param int $idbr ทะเบียนเบิก
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idbr)
    {
        return $this->render('view', [
            'model' => $this->findModel($idbr),
        ]);
    }

    /**
     * Creates a new Borrowreturn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        function DateThai($strDate)
        {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear ";
        }
        $model = new Borrowreturn();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()))  {
                $model->status = 1 ;

                    $model->save(); //บันทึกใบ Order

                    $items = Yii::$app->request->post();

                    //var_dump($items['Borrowreturn']['items']);

                    foreach($items['Borrowreturn']['items'] as $key => $val){ //นำรายการสินค้าที่เลือกมา loop บันทึก
                        if(empty($val['$idbr'])){
                            $order_detail = new Borrow24();
                        }else{
                            $order_detail = Borrow24::findOne($val['$idbr']);
                        }
                        $order_detail->borrowreturn_idbr = $model->idbr;
                        $order_detail->wh24_idwh24 = $val['idwh24'];
                        $order_detail->quantity = $val['quantity'];
                        //หาราคาสินค้า
                       // $product = Product::findOne($val['product_id']);

                       // $order_detail->product_id = $product->id;
                       // $order_detail->price = $product->price; //ราคาจากสินค้า
                        $order_detail->save();

                    }

                $model->borrowdate = DateThai($model->borrowdate);
                $temp = Forcefullname::findOne([
                    'idforce' => $model->force_idforce,
                ]);
                $model->force_idforce = $temp->fullname ;
                $position = $temp->position ;
                $temp = Wh21::findOne([
                    'idwh21' => $model->wh21_idwh21,
                ]);

                $model->wh21_idwh21 = $temp->kind;
                $sn = $temp->sn ;
                Settings::setTempDir(Yii::getAlias('@webroot').'/temp/'); //กำหนด folder temp สำหรับ windows server ที่ permission denied temp (อย่ายลืมสร้างใน project ล่ะ)
                $templateProcessor = new TemplateProcessor(Yii::getAlias('@webroot').'/msword/borroggun.docx');//เลือกไฟล์ template ที่เราสร้างไว้
                $i = 0;
                foreach($items['Borrowreturn']['items'] as $key => $val){ //นำรายการสินค้าที่เลือกมา loop บันทึก
                    if(empty($val['$idbr'])){
                        $temp = Wh24::findOne([
                            'idwh24' => $val['idwh24'],
                        ]);
                        $i++;
                        $name = $temp->name;
                        $countunit = $temp->countunit;
                        $templateProcessor->setValue('doc_ fitting'.$i, $i.'. '.$name.'   '.$val['quantity'].'   '.$countunit);
                    }

                }
                ///$templateProcessor->setValue('doc_department', 'สำนักเทคโนโลยีสารสนเทศ');//อัดตัวแปร รายตัว
                $templateProcessor->setValue(
                    [
                        'doc_name',
                        'doc_position',
                        'doc_date',
                        'doc_kind',
                        'doc_sn',
                        'doc_mi',
                    ],
                    [
                        $model->force_idforce,
                        $position,
                        $model->borrowdate,
                        $model->wh21_idwh21,
                        $sn,
                        'ทั่วไป'

                    ]);//อัดตัวแปรแบบชุด
                $templateProcessor->saveAs(Yii::getAlias('@webroot').'/msword/'.$model->force_idforce.'.docx');//สั่งให้บันทึกข้อมูลลงไฟล์ใหม่
                return $this->redirect(['view', 'idbr' => $model->idbr]);
            }
        } else {
            $model->loadDefaultValues();
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Borrowreturn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idbr ทะเบียนเบิก
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idbr)
    {
        $model = $this->findModel($idbr);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idbr' => $model->idbr]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Statusupdate อัพเดทข้อมูลการอนุมัติเบิกยืม 1 = ดำเนินการ 2=อนุมัติ 3=คืน
     *
     * @param int $idbr ทะเบียนเบิก
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionStatusupdate($idbr)
    {
        $model = $this->findModel($idbr);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idbr' => $model->idbr]);
        }

        return $this->render('statusupdate', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Borrowreturn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idbr ทะเบียนเบิก
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idbr)
    {
        $this->findModel($idbr)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Borrowreturn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idbr ทะเบียนเบิก
     * @return Borrowreturn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idbr)
    {
        if (($model = Borrowreturn::findOne(['idbr' => $idbr])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
