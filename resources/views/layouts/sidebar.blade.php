<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div> ユーザ画面 </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li id="dashboard">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-tachometer"></i> ダッシュボード </a>
                </li>
                <li id="reports">
                    <a href="">
                        <i class="fa fa-user"></i> 日報
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li><a href="{{ route('report.index') }}"><i class="fa fa-list"></i> 日報一覧 </a></li>
                        <li><a href="{{ route('report.create') }}"><i class="fa fa-pencil-square-o"></i> 日報作成 </a></li>
                    </ul>
                </li>
                <li id="sales">
                    <a href="">
                        <i class="fa fa-area-chart"></i> 売上
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li><a href="{{ route('admin.sales.index') }}"><i class="fa fa-list"></i> 一覧 </a></li>
                        <li><a href="{{ route('admin.sales.csv') }}"><i class="fa fa-upload"></i> CSV登録 </a></li>
                        <li><a href="{{ route('admin.project.index') }}"><i class="fa fa-pencil-square"></i> プロジェクト登録 </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <footer class="sidebar-footer">
        <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <ul>
                    <li class="customize">
                        <div class="customize-item">
                            <div class="row customize-header">
                                <div class="col-4"> </div>
                                <div class="col-4">
                                    <label class="title">固定</label>
                                </div>
                                <div class="col-4">
                                    <label class="title">可動</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">サイド :</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">ヘッダ :</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">フッタ :</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="customize-item">
                            <ul class="customize-colors">
                                <li><span class="color-item color-red" data-theme="red"></span></li>
                                <li><span class="color-item color-orange" data-theme="orange"></span></li>
                                <li><span class="color-item color-green active" data-theme=""></span></li>
                                <li><span class="color-item color-seagreen" data-theme="seagreen"></span></li>
                                <li><span class="color-item color-blue" data-theme="blue"></span></li>
                                <li><span class="color-item color-purple" data-theme="purple"></span></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <a href="">
                    <i class="fa fa-cog"></i> 画面設定 </a>
            </li>
        </ul>
    </footer>
</aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>
