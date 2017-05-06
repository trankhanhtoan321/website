<div class="container">
    <div class="row">
        <form action="" method="POST" role="form">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
            <h1 class="text-center page-header">Tra Cứu Điểm Thi Tin Học Văn Phòng</h1>
            <h3 class="text-center">(tra cứu điểm áp dụng cho bằng tin học văn phòng do ĐH-KHTN-HCM cấp)</h3>
        
            <div class="form-inline text-center">
                <input type="text" class="form-control" id="tracuu" name="tracuu" placeholder="Email/Số Điện Thoại" />
                <button type="submit" class="btn btn-success">Tra Cứu</button>
            </div>
        </form>
    </div>
    <br/>
    <?php if(isset($ketqua)){ ?>
    <div class="row">
        <table class="table-bordered table-striped table-condensed" style="padding:0px; width:100%; font-size:14px">
            <thead >
                <tr style="background-color:#DFF4FF; color:#0082c8">
                    <td style="width:2%; text-align: center;">Stt</td>
                    <td style="width:14%; text-align: center;">Họ và tên</td>
                    <td style="width:8%; text-align: center;">Ngày sinh</td>
                    <td style="width:8%; text-align: center;">Nơi sinh</td>
                    <td style="width:14%; text-align: center;">Cơ sở</td>
                    <td style="width:14%; text-align: center;">Lớp</td>
                    <td style="width:16%; text-align: center;">Môn thi</td>
                    <td style="width:8%; text-align: center;">Ngày thi</td>
                    <td style="width:4%; text-align: center;">TN 1</td>
                    <td style="width:4%; text-align: center;">TH 1</td>
                    <td style="width:4%; text-align: center;">TN 2</td>
                    <td style="width:4%; text-align: center;">TH 2</td>
                </tr>
            </thead>
            <tbody>
                <?=$ketqua?>
            </tbody>
        </table>
    </div>
    <?php } else { ?>
    <div class="row text-center" style="color:red"><?=$thongbao?></div>
    <?php } ?>
    <br/>
</div>