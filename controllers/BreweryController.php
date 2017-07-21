<?php

namespace app\controllers;

use Yii;
use app\models\Brewery;
use app\models\BeerBrewerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Beer;
use app\models\BeerType;
use yii\data\ActiveDataProvider;

/**
 * BreweryController implements the CRUD actions for Brewery model.
 */
class BreweryController extends Controller
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
     * Lists all Brewery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeerBrewerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brewery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {


        // this adds in the ability to query the beers table using the venue_id field.
        $queryBeersOfThisType = new ActiveDataProvider([
            'query' => Beer::find()
                ->where(['brewery_id' => $id])
                ->select('id, beer_name')
        ]);


        $queryBeersOfThisTypeDistinct = new ActiveDataProvider([
            'query' => Beer::find()
                ->where(['brewery_id' => $id])
                ->select('beer_type_id')
                ->distinct(true)
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),

            //this sets up the value of the var breweriesOfThisType.
            'beersOfThisType' => $queryBeersOfThisType,
            'beersOfThisTypeDistinct' => $queryBeersOfThisTypeDistinct,
        ]);
    }

    /**
     * Creates a new Brewery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brewery();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Brewery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Brewery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Brewery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brewery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brewery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
