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
    <title>微信后台</title>
    <?=Html::jsFile('@web/js/jquery-1.11.1.min.js')?>
    <?=Html::jsFile('@web/js/vue.js')?>
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
                            <img src="/web/images/profile/profile9.jpg" class="img-circle" alt="user avatar">
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
                            <img src="/web/images/profile/profile1.jpg" alt="" class="img-circle inline-block user-profile-pic">
                            <div class="user-detail inline-block">
                               <?php if (Yii::$app->user->isGuest) {

                                }else{
                                echo   Yii::$app->user->identity->username;
                               }
                                ?>
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
                                        <a href="../site/logout">
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
                    <!--v-for （循环菜单） v-if （找出pid=0） v-bind:class (如果当前索引与菜单id相等 则添加样式) -->
                    <li v-for="menu in menus" v-if="menu.pid==0" class='bg-palette1' v-bind:class="{'active':firstMenuIndex == menu.id}" >
                        <a href='#' @click="clickMenu(menu.id, $event)">
                            <span class='menu-content block'>
                                <span class='menu-icon' >{{menu.icon}}</span>
                                <span class='text m-left-sm'>{{menu.name}}</span>
                            </span>
                            <span class='menu-content-hover block'  @click="clickMenu(menu.id, $event)">{{menu.name}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- 菜单结束 -->

    <!-- 二级开始 -->
    <div class="main-container sidebar-mini">
        <div class="inbox-wrapper">
            <!--二级菜单开始-->
            <div class="inbox-menu" v-if="showSecondMenu==0" >
                <div class="" style="text-align:center;height:58px;background: #4c5f70;color: white">
                    <a class="btn btn-success">{{secondMenuTitle}}</a>
                </div>
                <div class="menu_item" >
                    <ul id="second_menu">
                        <li v-for="menu in menus" v-if="menu.pid==pid" >
                            <a href='#' @click="clickSecondMenu(menu.id, $event);">
                                <span class='badge badge-success m-right-xs'>{{menu.id}}</span>
                              {{menu.name}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--二级菜单结束-->

            <div id="loading" class="loading" style="display: none"></div>
            <div id="container" v-bind:class="{'inbox-body padding-md':!showSecondMenu}">
                <?= $content ?>

            </div>
        </div>
    </div>
    <!-- /二级结束 -->
</div>

<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>


<script>
    //jquery的全局loading事件
    $(document).ajaxStart(function () {
       // $('.loading').show();
    });
    $(document).ajaxStop(function () {
    //    $('.loading').hide();
    });
    $(document).ajaxError(function () {
        console.log('错误，请重试。')
    });

    new Vue({
        el : 'body',
        data : {
            menus : {},
            firstMenuIndex : 0,
            secondMenuIndex : 0,
            secondMenuTitle : '',
            pid : 0,
            hasChild : false,
            showSecondMenu:true,
            loadCache : false,//ajaxLoad加载缓存
        },
        init : function()
        {
            var _this = this;
            $.get('../main/menu', function (res) {
               _this.menus = res;
            });
        },
        methods : {
            //加载外部文件
            _load : function(route)
            {
                var path = '/views/' + route + '.php';
                this.loadCache ? null : path += '?r=' + (+new Date());
               $('#container').load(path,function () {

               });

            },
            //获取菜单的子菜单
            _getNavs : function(id)
            {
                var subMenus = [];
                for(var i in this.menus)
                {
                    if(this.menus[i].pid == id)
                    {
                        subMenus[i] = this.menus[i];
                    }
                }
                return subMenus.length;
            },

            //点击菜单
            clickMenu : function(id, event)
            {
              //  $('.loading').show();
                event.preventDefault();
               // 获取二级菜单标题
                this.secondMenuTitle  = this.menus[id].name;
                this.pid = id;
                //设置 菜单索引等于id
                this.firstMenuIndex=id;
                //重置二级菜单选中项
                this.secondMenuIndex = 0;
                //判断是否存在二级菜单
                this.hasChild = this._getNavs(id) > 0 ? true : false;
                if(this.hasChild){
                    this.showSecondMenu = false;
                }else{
                    this.showSecondMenu = true;
                }
                this._load(this.menus[id].route);
                location.hash = this.menus[id].route;
           //     $('.loading').hide();
            },
            clickSecondMenu : function(id, event){
                event.preventDefault();
                $('#loading').show();
                $('#container').hide();
                this._load(this.menus[id].route);
                location.hash = this.menus[id].route;
            }
        }
    });

    Vue.config.debug = true;
</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
