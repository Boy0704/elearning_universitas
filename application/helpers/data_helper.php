<?php 

function pesan_wa_balik($namapsr, $namacs, $no_inv, $amount, $invduedate,$emailcs)
{
    return '
    Dear Bapak/Ibu. '.$namapsr.',<br/>
    Customer '.$namacs.' dengan Invoice No.'.$no_inv.' senilai '.$amount.' yang jatuh tempo tanggal '.$invduedate.' Telah berhasil dikirimkan Email ke '.$emailcs.' dan WhatsApp AR Reminder.<br />
    Mohon segera ditindak lanjuti.<br />
    Terimakasih. <br />
    Regards, PT Hexindo Adiperkasa Tbk
    ';
}

function notif_email1($namapsr, $namacs, $no_inv, $amount, $invduedate,$emailcs)
{
    return "
    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>Dear Bapak/Ibu. ".$namapsr.",</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Saat ini telah berhasil dikirimkan Email dan WhatsApp Reminder kepada:</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Customer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ".$namacs."</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ".$emailcs."</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Nomor Invoice &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ".$no_inv."</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Total Invoice&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: ".$amount."</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Tanggal Due Date&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: ".$invduedate."</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Mohon untuk segera ditindak lanjuti. Apabila sudah dilakukan pembayaran segera rubah status menjadi PAID pada aplikasi AR Reminder.</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Terimakasih,</p>

<p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;PT Hexindo Adiperkasa Tbk</p>


    ";
}

function notif_email2($namapsr, $namacs, $no_inv, $amount, $invduedate,$emailcs)
{
    return "
    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>Dear Bapak/Ibu. ".$namapsr.",</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;Hari ini adalah tanggal jatuh tempo pembayaran untuk informasi AR Reminder berikut ini:</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;Customer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ".$namacs."</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ".$emailcs."</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;Nomor Invoice &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ".$no_inv."</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;Total Invoice&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ".$amount."</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;Tanggal Due Date&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ".$invduedate."</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp;</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";text-align:justify;'>&nbsp; &nbsp;Mohon untuk segera ditindak lanjuti. Apabila sudah dilakukan pembayaran segera rubah status menjadi PAID pada aplikasi AR Reminder atau aplikasi akan &nbsp; &nbsp;merubah automatis statusnya menjadi Expired.</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;Terimakasih,</p>

    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:\"Calibri\",\"sans-serif\";'>&nbsp; &nbsp;PT Hexindo Adiperkasa Tbk</p>

    ";
}

function log_r($string = null, $var_dump = false)
{
    if ($var_dump) {
        var_dump($string);
    } else {
        echo "<pre>";
        print_r($string);
    }
    exit;
}

function log_data($string = null, $var_dump = false)
{
    if ($var_dump) {
        var_dump($string);
    } else {
        echo "<pre>";
        print_r($string);
    }
    // exit;
}

function get_data($tabel,$primary_key,$id,$select)
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT $select FROM $tabel where $primary_key='$id' ")->row_array();
    return $data[$select];
}

function select_option($name, $table, $field, $pk, $selected = null,$class = null, $extra = null, $option_tamabahan = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control $class  ' $extra>";
    $cmb .= $option_tamabahan;
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function status($val)
{
    if ($val == 'ACTIVE') {
        echo "<span class='label label-success'>ACTIVE</span>";
    } else if ($val == 'PAID') {
        echo "<span class='label label-info'>PAID</span>";
    } else {
        echo "<span class='label label-danger'>EXPIRED</span>";
    }
}

function disable($val)
{
    if ($val == 'update') {
        echo "disabled";
    } 
}

function alert_biasa($pesan,$type)
{
    return 'swal("'.$pesan.'", "You clicked the button!", "'.$type.'");';
}

function alert_tunggu($pesan,$type)
{
    return '
    swal("Silahkan Tunggu!", {
      button: false,
      icon: "info",
    });
    ';
}

function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array ( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
            
    $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function total_tabungan($id_user)
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT SUM(total) AS total_tabungan FROM pembelian WHERE tabungan='ya' AND id_anggota='$id_user'")->row();
    return $data->total_tabungan;
}

function total_penarikan($id_user)
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT SUM(penarikan) AS total_penarikan FROM tabungan WHERE id_user='$id_user'")->row();
    return $data->total_penarikan;
}

function ambil_field_tabel($nama_tabel,$primary,$idnya,$nama_field)
{
    $CI =& get_instance();
    $data = $CI->db->get_where($nama_tabel, array($primary=>$idnya))->row_array();
    return $data[$nama_field];
}

function cari_data_perbulan($tabel,$where ,$tahun, $bulan, $nama_field )
{
    $CI =& get_instance();
    $data = $CI->db->query("SELECT $nama_field FROM $tabel where $where like '$tahun-$bulan-%' ")->num_rows();
    return $data;
}



function cek_status($n)
{
    if ($n == '1') {
        echo '<span class="label label-success">Ya</span>';
    } elseif ($n == '0') {
         echo '<span class="label label-danger">Belum</span>';
    }
}

function get_url_youtube($url)
{
    parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
    
    $id=$vars['v'];
    $dt=file_get_contents("http://www.youtube.com/get_video_info?video_id=$id&el=embedded&ps=default&eurl=&gl=US&hl=en");
    //var_dump(explode("&",$dt));
        
        $x=explode("&",$dt);
        $t=array(); $g=array(); $h=array();
        foreach($x as $r){
            $c=explode("=",$r);
            $n=$c[0]; $v=$c[1];
            $y=urldecode($v);
            $t[$n]=$v;
        }
        $streams = explode(',',urldecode($t['url_encoded_fmt_stream_map']));
        foreach($streams as $dt){ 
            $x=explode("&",$dt);
            foreach($x as $r){
                $c=explode("=",$r);
                $n=$c[0]; $v=$c[1];
                $h[$n]=urldecode($v);
            }
            $g[]=$h;
        }
        //echo json_encode($g[0],JSON_PRETTY_PRINT);
       // var_dump( $g[1]["quality"],true);
        return $g[0]["url"];
}



function upload_gambar_biasa($nama_gambar, $lokasi_gambar, $tipe_gambar, $ukuran_gambar, $name_file_form)
{
    $CI =& get_instance();
    $nmfile = $nama_gambar."_".time();
    $config['upload_path'] = './'.$lokasi_gambar;
    $config['allowed_types'] = $tipe_gambar;
    $config['max_size'] = $ukuran_gambar;
    $config['file_name'] = $nmfile;
    // load library upload
    $CI->load->library('upload', $config);
    // upload gambar 1
    $CI->upload->do_upload($name_file_form);
    $result1 = $CI->upload->data();
    $result = array('gambar'=>$result1);
    $dfile = $result['gambar']['file_name'];

    return $dfile;

}


