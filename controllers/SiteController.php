<?php

namespace app\controllers;

use app\models\search\HistorySearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @param string $exportType
     * @return string
     */
    public function actionExport($exportType)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');

        $model = new HistorySearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams);

        return $this->render('export', [
            'dataProvider' => $dataProvider,
            'exportType' => $exportType,
            'model' => $model
        ]);
    }
}
