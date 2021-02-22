<?php
    $sql = "SELECT * FROM listtodo";
    // SEARCH
    if(isset($_POST['search'])){
        $iSearch = $_POST['iSearch'];
        $sql = $iSearch ? "SELECT * FROM `listtodo` WHERE detail LIKE '$iSearch%'" : $sql;
        // echo $sql;
        // die();
    }
    //SORT
    if(isset($_GET['action']) && $_GET['action'] == 'sort'){

        $sStatus = (isset($_GET['sort'])) ? $_GET['sort'] : 'az';
        switch ($sStatus) {
            case 'az':
                $sql = "SELECT * FROM `listtodo` ORDER BY detail ASC";
                break;
            case 'za':
                $sql = "SELECT * FROM `listtodo` ORDER BY detail DESC";
                break;
            case 'show':
                $sql = "SELECT * FROM `listtodo` ORDER BY status DESC";
                break;
            case 'hide':
                $sql = "SELECT * FROM `listtodo` ORDER BY status ASC";
                break;
            default:
                $sql = "SELECT * FROM `listtodo` ORDER BY detail ASC";
                break;
        }
    }

    $result = runQuery($sql);
    $data = fetchData($result);

    foreach ($data as $key => $row) {
        $textStt = null;
        $textStt = $row['status'] ? 'Kích Hoạt' : 'Ẩn';
        $cColor = ($textStt == 'Kích Hoạt') ? 'label-success' : 'label-default';
    ?>
    <tr id="item">
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['detail'] ?></td>
    <td class="text-center">
        <span class="label <?php echo $cColor ?> stt">
    <?php echo $textStt ?>
                </span>
    </td>
    <td id="itemControl" class="text-center">
    <a href="?action=edit&&id=<?php echo $row['id']?>" class="btn btn-warning">Sửa</a>
    <a href="?action=delete&&id=<?php echo $row['id']?>" class="btn btn-danger">Xoá</a>
    </td>
    </tr>
<?php
    }
?>