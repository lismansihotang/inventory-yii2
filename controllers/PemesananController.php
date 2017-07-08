<?php
namespace app\controllers;

use Yii;
use app\models\Pemesanan;
use app\models\PemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PemesananController implements the CRUD actions for Pemesanan model.
 */
class PemesananController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pemesanan models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Displays a single Pemesanan model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $modelDetail = new \app\models\PemesananDetail();
        $recordPemesananDetail = (new \yii\db\Query())->select(
            'pemesanan_detail.id AS id, pemesanan_detail.qty AS qty, pemesanan_detail.harga AS harga, pemesanan_detail.subtotal AS subtotal, barang.nm_barang AS nm_barang'
        )->from('pemesanan_detail')->innerJoin('barang', 'pemesanan_detail.id_barang=barang.id')->where(
            ['pemesanan_detail.id_pemesanan' => $id]
        )->all();
        return $this->render(
            'view',
            [
                'model' => $this->findModel($id),
                'modelDetail' => $modelDetail,
                'recordPemesananDetail' => $recordPemesananDetail
            ]
        );
    }

    /**
     * Creates a new Pemesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pemesanan();
        if ($model->load(Yii::$app->request->post())) {
            $model->insert_user = Yii::$app->user->identity->id;
            $model->insert_date = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render(
                'create',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * Updates an existing Pemesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render(
                'update',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * Deletes an existing Pemesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pemesanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $id
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionFinish($id)
    {
        $model = $this->findModel($id);
        $model->status = 'Finish';
        $model->update_user = Yii::$app->user->identity->id;
        $model->update_date = date('Y-m-d H:i:s');
        $model->save(false);
        $modelDetail = new \app\models\PemesananDetail();
        $recordPemesananDetail = (new \yii\db\Query())->select(
            'pemesanan_detail.id AS id, pemesanan_detail.qty AS qty, pemesanan_detail.harga AS harga, pemesanan_detail.subtotal AS subtotal, barang.nm_barang AS nm_barang'
        )->from('pemesanan_detail')->innerJoin('barang', 'pemesanan_detail.id_barang=barang.id')->where(
            ['pemesanan_detail.id_pemesanan' => $id]
        )->all();
        return $this->render(
            'view',
            [
                'model' => $model,
                'modelDetail' => $modelDetail,
                'recordPemesananDetail' => $recordPemesananDetail
            ]
        );
    }
}
