<?php
namespace app\controllers;

use Yii;
use app\models\PemesananDetail;
use app\models\PemesananDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PemesananDetailController implements the CRUD actions for PemesananDetail model.
 */
class PemesananDetailController extends Controller
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
     * Lists all PemesananDetail models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemesananDetailSearch();
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
     * Displays a single PemesananDetail model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render(
            'view',
            [
                'model' => $this->findModel($id),
            ]
        );
    }

    /**
     * Creates a new PemesananDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PemesananDetail();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelPemesanan = new \app\models\Pemesanan();
            $recordPemesanan = $modelPemesanan->findOne(['id' => $model->id_pemesanan]);
            $recordPemesanan->status = 'Progress';
            $recordPemesanan->subtotal += $model->subtotal;
            $recordPemesanan->total += $model->subtotal;
            $recordPemesanan->save(false);
            return $this->redirect(['pemesanan/view', 'id' => $model->id_pemesanan]);
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
     * Updates an existing PemesananDetail model.
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
     * Deletes an existing PemesananDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id, $id_pemesanan)
    {
        $model = $this->findModel($id);
        $subtotal = $model->subtotal;
        if ((bool)$model->delete() !== false) {
            $modelHeader = new \app\models\Pemesanan();
            $recordModelHeader = $modelHeader->findOne(['id' => $id_pemesanan]);
            $recordModelHeader->subtotal -= $subtotal;
            $recordModelHeader->total -= $subtotal;
            $recordModelHeader->save(false);
        }
        return $this->redirect(['pemesanan/view', 'id' => $id_pemesanan]);
    }

    /**
     * Finds the PemesananDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return PemesananDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PemesananDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @return string
     */
    public function actionItemPrice()
    {
        $harga = 0;
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get('id');
            $model = new \app\models\Barang();
            $record = $model->findOne(['id' => $id]);
            if (count($record) > 0) {
                $harga = (integer)$record['harga_beli'];
            }
        }
        return \yii\helpers\Json::encode($harga);
    }
}
