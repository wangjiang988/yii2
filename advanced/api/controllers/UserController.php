<?php
namespace api\controllers;

use Yii;
use api\models\User;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\auth\HttpBasicAuth;


class UserController extends ActiveController
{
    public $modelClass = 'api\models\User';
//正如我们上面所描述的，yii\rest\Serializer 负责转换资源的中间件 对象或集合到数组。
//它将对象 yii\base\ArrayableInterface 作为 yii\data\DataProviderInterface。
// 前者主要由资源对象实现， 而 后者是资源集合。
//
//你可以通过设置 yii\rest\Controller::serializer 属性和一个配置数组。
// 例如，有时你可能想通过直接在响应主体内包含分页信息来 简化客户端的开发工作。
//这样做，按照如下规则配置 yii\rest\Serializer::collectionEnvelope 属性：
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
//        $behaviors['authenticator'] = [
//            'class' => HttpBasicAuth::className(),
//        ];
        return $behaviors;
    }

    public function actions()
    {
        \Yii::$container->set('yii\data\Pagination',['pageSize'=>\Yii::$app->params['perpage']]); //设置di容器来设置分页的选项
        $actions = parent::actions();

        // 禁用"delete" 和 "create" 操作
        unset($actions['delete'], $actions['create']);

        // 使用"prepareDataProvider()"方法自定义数据provider
//        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        // 为"index"操作准备和返回数据provider
//        return ['name'=>'wangjiang','pass' => true];
        $model = new User();
        //分页
        $curPage = Yii:: $app-> request->get( 'page',1);
        $pageSize = 1;
        //搜索
//        $type = Yii:: $app-> request->get( 'type', '');
//        $value = Yii:: $app-> request->get( 'value', '');
//        $search = ($type&&$value)?[ 'like',$type,$value]: '';
        //查询语句
        $query = $model->find()->orderBy( 'created_at DESC');
        $data = $model->getPages($query,$curPage,$pageSize);
        $pages = new Pagination([ 'totalCount' =>$data[ 'count'], 'pageSize' => $pageSize]);
        return ['pages'=>$pages,'data'=>$data];
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        // 检查用户能否访问 $action 和 $model
        // 访问被拒绝应抛出ForbiddenHttpException
//        return new ForbiddenHttpException("not allowed",403);
    }

}