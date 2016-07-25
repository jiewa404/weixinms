
        <div class="tree-view-menu-list font-16">
            <ul class="font-16">
                <li class="openable">
                    <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>自定义菜单1</a>
                    <ul class="subtree">
                        <li class="openable">
                            <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>子菜单2</a>
                            <ul class="subtree">
                                <li><a href="#"><i class="fa fa-photo m-right-xs"></i>子菜单3</a></li>
                            </ul>
                        </li>

                        <li class="openable last-link">
                            <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>自定义菜单2</a>
                            <ul class="subtree last-subtree">
                                <li class="openable">
                                    <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>Movie</a>
                                    <ul class="subtree">
                                        <li><a href="#"><i class="fa fa-film m-right-xs"></i>Movie1.avi</a></li>
                                        <li><a href="#"><i class="fa fa-film m-right-xs"></i>Movie2.avi</a></li>
                                        <li class="last-link"><a href="#"><i class="fa fa-film m-right-xs"></i>Movie3.avi</a></li>
                                    </ul>
                                </li>
                                <li class="openable last-link">
                                    <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>Music</a>
                                    <ul class="subtree">
                                        <li class="last-link">
                                            <a href="#">
                                                <i class="fa fa-music m-right-xs"></i>Song6.mp3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="openable">
                    <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>自定义菜单2</a>
                    <ul class="subtree last-subtree">
                        <li class="openable">
                            <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>Report</a>
                            <ul class="subtree">
                                <li><a href="#"><i class="fa fa-file m-right-xs"></i>Report1.pdf</a></li>
                                <li><a href="#"><i class="fa fa-file m-right-xs"></i>Report2.pdf</a></li>
                                <li><a href="#"><i class="fa fa-file m-right-xs"></i>Report3.pdf</a></li>
                                <li class="last-link"><a href="#"><i class="fa fa-file m-right-xs"></i>Report4.pdf</a></li>
                            </ul>
                        </li>
                        <li class="openable last-link">
                            <a href="#"><i class="fa fa-folder m-right-xs folder-icon"></i>Statistic</a>
                            <ul class="subtree">
                                <li><a href="#"><i class="fa fa-file m-right-xs"></i>Stat1.xls</a></li>
                                <li class="last-link"><a href="#"><i class="fa fa-file m-right-xs"></i>Stat2.xls</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
            <script>
                $(function(){
                    $('.tree-view-menu-list .openable a').click(function()	{
                        var parentElm = $(this).parent();
                        parentElm.toggleClass('open');
                        parentElm.children('.subtree').slideToggle(200);

                        return false;
                    });
                });
            </script>
