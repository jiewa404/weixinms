<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?=Html::jsFile('@web/js/jquery-1.11.1.min.js')?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<body class="overflow-hidden">
<div class="wrapper preload no-footer">
    <div class="sidebar-right">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="sidebar-header clearfix">
                <input class="form-control dark-input" placeholder="Search" type="text">
            </div>

            <div class="title-block">
                More friends
            </div>
            <div class="content-block">
                <ul class="sidebar-list">
                    <li>
                        <a href="#" class="clearfix">
                            <img src="/wangjie/backend/web/images/profile/profile9.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    John Doe
                                </div>
                                <div class="chat-message">
                                    Hello, Are you there?
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-danger"></i>
                            </div>
                            <div class="chat-alert">
                                <i class="fa fa-reply"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div><!-- sidebar-inner -->
    </div><!-- sidebar-right -->
    <header class="top-nav">
        <div class="top-nav-inner">
            <div class="nav-header">
                <a href="index.html" class="brand">
                    <span class="brand-name">微信后台</span>
                </a>
            </div>
            <div class="nav-container">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav-notification">
                    <li class="search-list">
                        <div class="search-input-wrapper">
                            <div class="search-input">
                                <input type="text" class="form-control input-sm inline-block">
                                <a href="#" class="input-icon text-normal"><i class="ion-ios7-search-strong"></i></a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- top-nav-inner -->
                <div class="pull-right m-right-sm">
                    <div class="user-block hidden-xs">
                        <a href="#" id="userToggle" data-toggle="dropdown">
                            <img src="/wangjie/backend/web/images/profile/profile1.jpg" alt="" class="img-circle inline-block user-profile-pic">
                            <div class="user-detail inline-block">
                                wangjie404 ||
                            </div>
                        </a>
                        <div class="panel border dropdown-menu user-panel">
                            <div class="panel-body paddingTB-sm">
                                <ul>
                                    <li>
                                        <a href="profile.html">
                                            <i class="">1.</i><span class="m-left-xs">修改资料</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="signin.html">
                                            <i class="">2.</i><span class="m-left-xs">退出</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav-notification">
                        <li>
                            <a href="#" title="未读消息" data-toggle="dropdown"><i class="fa fa-bell fa-lg"></i></a>
                            <span class="badge badge-info bounceIn animation-delay6 active">4</span>
                            <ul class="dropdown-menu notification dropdown-3 pull-right">
                                <li><a href="#">你有4条信息</a></li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-warning">
													<i class="fa fa-warning"></i>
												</span>
                                        <span class="m-left-xs">消息1.</span>
                                        <span class="time text-muted">2016/07/18</span>
                                    </a>
                                </li>
                                <li><a href="#">显示所有消息</a></li>
                            </ul>
                        </li>
                        <li class="chat-notification1">
                            <a href="#" class="sidebarRight-toggle">消息</a>
                            <span class="badge badge-danger bounceIn">1</span>

                            <div class="chat-alert">
                                Hello, Are you there?
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- top-nav-inner -->
        </div>
    </header>
    <!-- 菜单开始 -->
    <aside class="sidebar-menu fixed sidebar-mini">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="main-menu">
                <ul class="accordion" id="first_menu">
                </ul>
            </div>

        </div><!-- sidebar-inner -->
    </aside>
    <!-- 菜单结束 -->
    <!-- 二级开始 -->
    <div class="main-container sidebar-mini">
        <div class="inbox-wrapper">
            <!--二级菜单开始-->
            <div class="inbox-menu" >
                <div class="" style="text-align:center;height:58px;background: #4c5f70;color: white">
                    <a class="btn btn-success">菜单管理</a>
                </div>
                <div class="menu_item" >
                    <ul id="second_menu"></ul>
                </div>
            </div>

            <!--二级菜单结束-->
            <div class="inbox-body padding-md" >
                <!--内容开始-->
                <div class="loading">1231231</div>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
                <!--内容结束-->
            </div><!-- ./inbox-body -->
        </div><!-- ./inbox-wrapper -->
    </div>
    <!-- /二级菜单结束 -->


</div><!-- /wrapper -->

<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>


<script>
    //二级菜单
    var menu=[
        {"id":1,"pid":0,"name":"分类1","child":[
            {"id":3,"pid":1,"name":"菜单1-1"},
            {"id":5,"pid":1,"name":"菜单1-2"}]
        },
        {"id":2,"pid":0,"name":"分类2","child":[
            {"id":4,"pid":2,"name":"菜单2-1"},
            {"id":10,"pid":2,"name":"菜单2-2"},
            {"id":11,"pid":2,"name":"菜单2-3"},
            {"id":12,"pid":2,"name":"菜单2-4"},
        ]
        },
        {"id":6,"pid":0,"name":"分类3","child":[
            {"id":7,"pid":6,"name":"菜单3-1"}]
        },
        {"id":8,"pid":0,"name":"分类4"}
    ];
    var menu2={
        "1": {
            "id": "1",
            "pid": "0",
            "name": "分类一",
            "route": "test/index",
            "icon": "icon-bars",
            "is_group": "0"
        },
        "2": {
            "id": "2",
            "pid": "0",
            "name": "分类二",
            "route": "test/show",
            "icon": "icon-cogs",
            "is_group": "0"
        },
        "3": {
            "id": "3",
            "pid": "0",
            "name": "分类三",
            "route": "test/edit",
            "icon": "icon-book",
            "is_group": "0"
        },
        "4": {
            "id": "4",
            "pid": "1",
            "name": "菜单1-1",
            "route": "menu/create",
            "icon": "icon-qq",
            "is_group": "0"
        },
        "5": {
            "id": "5",
            "pid": "1",
            "name": "菜单1-2",
            "route": "menu/delete",
            "icon": "",
            "is_group": "0"
        },
        "6": {
            "id": "6",
            "pid": "2",
            "name": "菜单2-1",
            "route": "menu/update",
            "icon": "",
            "is_group": "0"
        },
        "7": {
            "id": "7",
            "pid": "2",
            "name": "菜单2-2",
            "route": "",
            "icon": "icon-caret-down",
            "is_group": "1"
        },
        "8": {
            "id": "8",
            "pid": "3",
            "name": "菜单3-1",
            "route": "admin/profile/index",
            "icon": "icon-qq",
            "is_group": "0"
        }
    };
    //jquery的全局loading事件
    $(document).ajaxStart(function () {
        console.log(1)
        $('.main .loading').show();
    });
    $(document).ajaxStop(function () {
        console.log(2)
        $('.main .loading').hide();
    });
    $(document).ajaxError(function () {
        console.log('错误，请重试。')
    });

    //显示二级菜单
    function show_second_menu(id) {
        //初始化菜单
        $('#second_menu').parent().parent().hide();
        $('#second_menu').parent().parent().slideDown("slow");
        $('#second_menu').html('');
        $('#menu_'+id).addClass('active').siblings().removeClass('active');
        for(var i=0;i<menu.length;i++){
            if(menu[i].id==id){
                for (var j=0;j<menu[i].child.length;j++){
                    $('#second_menu').append("<li> <a href='#'><span class='badge badge-success m-right-xs'>5</span>"+menu[i].child[j].name+"</a> </li>");
                }
            }
        }
    }
    $(function () {
        show_second_menu(1);
        for(var i=0;i<menu.length;i++){
         $('#first_menu').append("<li class='bg-palette1' id='menu_"+menu[i].id+"'> <a href='#'> <span class='menu-content block'> <span class='menu-icon' >"+menu[i].name+"</span> <span class='text m-left-sm'>Inboxs</span> </span> <span class='menu-content-hover block' onclick='show_second_menu("+menu[i].id+");'>"+menu[i].name+"</span> </a> </li>");
        }

    })


</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
