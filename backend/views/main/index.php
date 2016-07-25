<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 14:07
 */
echo 123123123;
?>

<div class="row m-bottom-md" style="display: none">
    <div class="col-sm-6 m-bottom-sm">
        <h2 class="no-margin">
            Inbox
        </h2>
    </div><!-- ./col -->
    <div class="col-sm-6 text-right text-left-sm" style="display:none;">
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


<div class="message-table table-responsive" style="display:none;">
    <table class="table table-bordereds">
        <thead>

        <tr>
            <td class="text-center">
                <div class="custom-checkbox">
                    <input type="checkbox" id="chk5" class="inbox-check">
                    <label for="chk5"></label>
                </div>
            </td>
            <td><a href="#"><i class="fa fa-star-o fa-lg"></i></a></td>
            <td>
                <div class="author-avatar">
                    <img src="/web/images/profile/profile5.jpg" alt="">
                </div>
                <div class="author-name">
                    <strong class="block font-md">Elizabeth Carter</strong>
                    <a href="#" class="text-muted">Family</a>
                </div>
            </td>
            <td>
                <a href="#">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    <small class="block">Lorem ipsum dolor sit amet.</small>
                </a>
            </td>
            <td>18 Jun, 01:12</td>
        </tr>



        </tbody>
    </table>
</div><!-- ./message-table -->
<div class="pagination-row clearfix" style="display: none" >
    <div class="pull-left vertical-middle hidden-xs">112 messages</div>
    <div class="pull-right pull-left-sm">
        <div class="inline-block vertical-middle m-right-xs">Page 1 of 8 </div>
        <ul class="pagination vertical-middle">
            <li class="disabled"><a href="#"><i class="fa fa-step-backward"></i></a></li>
            <li class="disabled"><a href="#"><i class="fa fa-caret-left large"></i></a></li>
            <li><a href="#"><i class="fa fa-caret-right large"></i></a></li>
            <li><a href="#"><i class="fa fa-step-forward"></i></a></li>
        </ul>
    </div>
</div><!-- ./pagination-row -->
<script>
    $(function()	{
        $('.inbox-check').click(function()	{
            var activeRow = $(this).parent().parent().parent();

            activeRow.toggleClass('active');
        });


        $('#inboxCollapse').click(function()	{
            $('.inbox-menu-inner').slideToggle();
        });

        $('#chkAll').click(function()	{
            if($(this).prop('checked'))	{
                $('.inbox-check').prop('checked',true);
                $('.inbox-check').parent().parent().parent().addClass('active');
            }
            else	{
                $('.inbox-check').prop('checked',false);
                $('.inbox-check').parent().parent().parent().removeClass('active');
            }
        });

        $(window).resize(function() {
            if (Modernizr.mq('(min-width: 980px)')) {
                $('.inbox-menu ul').show();
            }
        });
    });
</script>

