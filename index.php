<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<?php 
    require_once 'app/function.php';
    require_once 'app/action.php';
    $nSubmit = $action;
    $uID = ($nSubmit === 'edit') ? '/?id='.$id : null;
    

?>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Quản Lý Công Việc</h1>
            <hr/>
        </div>
        <div class="row main">
            <div id="mForm" class="<?php echo $sForm ?>">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $textForm  ?></h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="app/action/<?php echo $nSubmit?>.php<?php echo $uID ?>">
                            <div class="form-group">
                                <label>Tên :</label>
                                <input name="detail" type="text" class="form-control" required="required" value="<?php echo $vInput ?>" />
                            </div>
                            <label>Trạng Thái :</label>
                            <select name="status" class="form-control" required="required">
                                <option value="1" <?php echo $vChecked = $vChecked ? 'selected' : '' ?>>Kích Hoạt</option>
                                <option value="0" <?php echo $vChecked = $vChecked ? '' : 'selected' ?>>Ẩn</option>
                            </select>
                            <br/>
                            <div class="text-center">
                                <button name="<?php echo $nSubmit ?>" type="submit" class="btn btn-warning"><?php echo $textBtn ?></button>
                                <a href="?action=cancel" class="btn btn-danger">Hủy Bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="list" class="<?php echo $fMain ?>">                
                    <a href="?action=add" class="btn btn-primary">Thêm Công Việc</a>                
                <div class="row mt-15">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <form action="?action=search" method="POST">
                            <div class="input-group">
                                <input type="text" name="iSearch" class="form-control" placeholder="Nhập từ khóa..." />
                                <span class="input-group-btn">
                                    <button type="submit" name="search" class="btn btn-primary">Tìm</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Sắp Xếp <span class="fa fa-caret-square-o-down ml-5"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="?action=sort&&sort=az" role="button">
                                                <span class="fa fa-sort-alpha-asc pr-5">
                                                    Tên A-Z
                                                </span>
                                            </a>
                                </li>
                                <li>
                                    <a href="?action=sort&&sort=za" role="button">
                                                <span class="fa fa-sort-alpha-desc pr-5">
                                                    Tên Z-A
                                                </span>
                                            </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="?action=sort&&sort=show" role="button">Trạng Thái Kích Hoạt</a></li>
                                <li><a href="?action=sort&&sort=hide" role="button">Trạng Thái Ẩn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-15">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table id="tbl" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Trạng Thái</th>
                                    <th class="text-center">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" />
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option value="-1">Tất Cả</option>
                                            <option value="0">Ẩn</option>
                                            <option value="1">Kích Hoạt</option>
                                        </select>
                                    </td>
                                    <td></td>
                                </tr>

                                <?php
                                    require_once 'app/action/show.php';
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>