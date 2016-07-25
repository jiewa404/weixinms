<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 15:01
 */

?>
<div class="row m-bottom-md" style="">
    <div class="col-sm-6 m-bottom-sm">
        <h2 class="no-margin">
            微信用户管理
        </h2>
    </div><!-- ./col -->
    <div class="col-sm-6 text-right text-left-sm" style="">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Move to <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Socials</a></li>
                <li><a href="#">Promotions</a></li>
                <li><a href="#">Forums</a></li>
                <li><a href="#">Spam</a></li>
                <li><a href="#">Trash</a></li>
            </ul>
        </div>
        <a href="#" class="btn btn-success hidden-xs">Report Spam</a>
        <a href="#" class="btn btn-danger">Move to Trash</a>
    </div><!-- ./col -->
</div><!-- .row -->


<div class="message-table table-responsive" style="">
    <table class="table table-bordereds">
        <thead>
        <tr>
            <th class="text-center">

            </th>
            <th>
                <div class="author-avatar" style="margin-top: 5px;">
                    头像
                </div>
                <div class="author-name">
                    <strong class="block font-md">用户名</strong>
                </div>
            </th>
            <th>
                <div class="author-name">
                    <strong class="block font-md">OPENID</strong>
                </div>
            </th>
            <th>
                <div class="author-name">
                    <strong class="block font-md">性别</strong>
                </div>
            </th>
            <th>
                <div class="author-name">
                    <strong class="block font-md">地址</strong>
                </div>
            </th>

            <th>
                <div class="author-name">
                    <strong class="block font-md">操作</strong>
                </div>
            </th>
        </tr>
        <tr v-for="item in userList">
            <td class="text-center">
                <div class="custom-checkbox">
                    <input type="checkbox" id="chk4" class="inbox-check">
                    <label for="chk4"></label>
                </div>
            </td>
            <td>
                <div class="author-avatar">
                    <img v-bind:src=item.headimgurl alt="">
                </div>
                <div class="author-name">
                    <strong class="block font-md">{{item.nickname}}&nbsp;&nbsp;&nbsp;</strong>
                </div>
            </td>
            <td>
                <div class="author-name">
                    <strong class="block font-md">{{item.openid}}</strong>
                </div>
            </td>
            <td>
                <div class="author-name" >
                    <strong v-if="item.sex==1" class="block font-md">男</strong>
                    <strong v-if="item.sex==0" class="block font-md">女</strong>
                </div>
            </td>
            <td>
                <div class="author-name">
                    <strong class="block font-md">{{item.country}}-{{item.province}}-{{item.city}}</strong>
                </div>
            </td>

            <td>
                <div class="author-name">
                    <button @click="showUserInfo(item.id)" class="btn btn-primary marginTB-xs">查看</button>
                    <button @click="sendMessage(item.id)" class="btn btn-primary marginTB-xs">发消息</button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<!--开始查看用户信息-->
<div class="modal fade in" id="showUserInfoModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="form">
        <div class="modal-body modal-content" style="width: 700px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">用户信息</h4>
            </div>
            <div class="modal-body">
                <div class="form-group row" >
                    <div style="width:35%;display: inline-block;float: left;">
                        <div style="position:relative;display: block;height: 150px;width: 90%;margin:auto">
                            <img id="pic" v-bind:src=userInfo.headimgurl style="max-height:98%;max-width: 98%;position: absolute;left:0;right: 0;top:0;bottom: 0;float: none;margin:auto">
                        </div>
                    </div>
                    <div style="width:60%; display: inline-block;float: right;text-align: left">
                        <p><span style="width: 120px;display:inline-block;">姓名:</span><span id="name">{{userInfo.nickname}}</span></p>
                        <p><span style="width: 120px;display:inline-block;">电话号码:</span><span id="mobile">15212160385</span>
                        </p>
                        <p><span style="width: 120px;display:inline-block;">openid:</span><span id="openid">{{userInfo.openid}}</span>
                        <p><span style="width: 120px;display:inline-block;">地址:</span><span id="openid">{{userInfo.province}}-{{userInfo.city}}</span>

                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default btn-cus btn-sm" value="确定" data-dismiss="modal" aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<!--结束查看用户信息-->

<!--发送消息开始-->
<div class="modal fade in" id="sendMessageModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="form">
        <div class="modal-body modal-content" style="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">发送消息</h4>
            </div>
            <div class="modal-body">
                    <form id="sendMessageForm" class="form-horizontal m-top-md">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">用户名</label>
                            <div class="col-sm-9">
                               <span  class="form-control">{{userName}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">标题</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">时间</label>
                            <div class="col-sm-9">
                                <div class="radio inline-block">
                                    <div class="custom-radio m-right-xs">
                                        <input type="radio" id="inlineRadio1" checked name="profileGender">
                                        <label for="inlineRadio1"></label>
                                    </div>
                                    <div class="inline-block vertical-top">即时</div>
                                </div>
                                <div class="radio inline-block m-left-sm">
                                    <div class="custom-radio m-right-xs">
                                        <input type="radio" id="inlineRadio2" name="profileGender">
                                        <label for="inlineRadio2"></label>
                                    </div>
                                    <div class="inline-block vertical-top">定时</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">内容</label>
                            <div class="col-sm-9">
                                <textarea name="content" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group m-top-lg">
                            <label class="col-sm-8 control-label"></label>
                            <div class="col-sm-4">
                                <a class="btn btn-default">确定</a>
                                <a class="btn btn-info m-left-xs" data-dismiss="modal" aria-hidden="true">取消</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--发送消息结束-->
<script>
$(document).ajaxStop(function () {
        $('#loading').hide();
        $('#container').show();
});
    new Vue({
        el: '#container',
        data: {
            userList: {},
            userInfo: '',
            userName:'',
        },
        init : function () {
            var _this=this;
            $.get('../user/list', function (res) {
                _this.userList = res;
            });
        },
        methods : {
            //查看用户信息
            showUserInfo : function (user_id) {
                $('#showUserInfoModal').modal('show');
                for (var i = 0;i < this.userList.length;i++){
                    if(user_id==this.userList[i].id){
                        this.userInfo=this.userList[i];
                    }
                }
            },
            //发送消息
            sendMessage : function (id) {
                $('#sendMessageModal').modal('show');
                for (var i = 0;i < this.userList.length;i++){
                    if(id==this.userList[i].id){
                        this.userName=this.userList[i].nickname;
                    }
                }
            },
        }

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sendMessageForm').bootstrapValidator({
                fields: {
                    title: {
                        message: '标题不合法',
                        validators: {
                            notEmpty: {
                                message: '标题不能为空'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: '标题长度介于6到30之间'
                            }
                        }
                    },
                    content: {
                        validators: {
                            notEmpty: {
                                message: '内容不能为空'
                            },
                            stringLength: {
                                min: 1,
                                max: 100,
                                message: '内容长度介于1到100之间'
                            }
                        }
                    },
                }
            })

    });
</script>


