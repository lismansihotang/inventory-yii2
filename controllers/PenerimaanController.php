<?php
namespace app\controllers;

use Yii;
use app\models\Penerimaan;
use app\models\PenerimaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenerimaanController implements the CRUD actions for Penerimaan model.
 */
class PenerimaanController extends Controller
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
     * Lists all Penerimaan models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenerimaanSearch();
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
     * Displays a single Penerimaan model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $detail = (new \yii\db\Query())->select(
            'pemesanan_detail.id_barang AS id_barang, pemesanan_detail.qty AS qty, pemesanan_detail.harga AS harga, pemesanan_detail.subtotal AS subtotal, barang.nm_barang'
        )->from('pemesanan_detail')->innerJoin('barang', 'pemesanan_detail.id_barang=barang.id')->where(
            ['pemesanan_detail.id_pemesanan' => $model->id_pemesanan]
        )->all();
        return $this->render(
            'view',
            [
                'model' => $model,
                'detail' => $detail
            ]
        );
    }

    /**
     * Creates a new Penerimaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penerimaan();
        $record = (new \yii\db\Query())->select('pemesanan.id, pemesanan.tgl, supplier.nm_supplier')
            ->from('pemesanan')
            ->innerJoin('supplier', 'pemesanan.id_supplier=supplier.id')->where(
                'pemesanan.id NOT IN (SELECT id_pemesanan FROM penerimaan) AND pemesanan.status="Finish"'
            )->all();
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
                    'record' => $record
                ]
            );
        }
    }

    /**
     * Updates an existing Penerimaan model.
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
     * Deletes an existing Penerimaan model.
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
     * Finds the Penerimaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Penerimaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penerimaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $id
     *
     * @return \yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionProsesData($id)
    {
        $model = $this->findModel($id);
        $subtotal = 0;
        if (count(Yii::$app->request->post()) > 0) {
            for ($i = 0; $i < count(Yii::$app->request->post('id_barang')); $i++) {
                var_dump(Yii::$app->request->post('id_barang')[$i]);
                $modelDetail = new \app\models\PenerimaanDetail();
                $modelDetail->id_penerimaan = $id;
                $modelDetail->id_barang = Yii::$app->request->post('id_barang')[$i];
                $modelDetail->qty = Yii::$app->request->post('qty')[$i];
                $modelDetail->harga = Yii::$app->request->post('harga')[$i];
                $modelDetail->qty_terima = Yii::$app->request->post('qty_terima')[$i];
                $modelDetail->subtotal = $modelDetail->qty_terima * $modelDetail->harga;
                $subtotal += $modelDetail->subtotal;
                $modelDetail->save(false);
            }
        }
        $model->subtotal = $subtotal;
        $model->total = $subtotal;
        $model->save(false);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * @param $id
     *
     * @return \yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionFinish($id)
    {
        $model = $this->findModel($id);
        $modelDetail = new \app\models\PenerimaanDetail();
        $recordDetail = $modelDetail->findAll(['id_penerimaan' => $id]);
        if (count($recordDetail) > 0) {
            foreach ($recordDetail as $row) {
                $modelBarang = new \app\models\BarangStockGudang();
                $recordBarang = $modelBarang->findOne(['id_barang' => $row['id_barang']]);
                if (count($recordBarang) > 0) {
                    $recordBarang->stock += $row->qty_terima;
                    $recordBarang->save(false);
                    $idStock = $recordBarang->id;
                } else {
                    $modelBarang->id_barang = $row->id_barang;
                    $modelBarang->stock = $row->qty_terima;
                    $modelBarang->save(false);
                    $idStock = $modelBarang->id;
                }
                $modelBarangDetail = new \app\models\BarangStockGudangDetail();
                $modelBarangDetail->id_stock = $idStock;
                $modelBarangDetail->harga = $row['harga'];
                $modelBarangDetail->stock = $row['qty_terima'];
                $modelBarangDetail->tgl = $model->tgl;
                $modelBarangDetail->insert_date = date('Y-m-d H:i:s');
                $modelBarangDetail->save(false);
            }
            $model->status = 'Finish';
            $model->save(false);
        }
        return $this->redirect(['view', 'id' => $model->id]);
    }
}
