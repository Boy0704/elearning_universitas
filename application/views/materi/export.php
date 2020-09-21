<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export_elearning.xls");
?>
<table class="table table-bordered" style="margin-bottom: 10px" id="example1" border="1">
            <thead>
            <tr>
                <th>No</th>
        <th>Judul Materi</th>
        <th>Kode Mk</th>
        <th>Nama MK</th>
        <th>Nidn Dosen</th>
        <th>Nama Dosen</th>
        <th>Date At</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $materi_data = $this->db->get('elearning_materi');
            foreach ($materi_data->result() as $materi)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $materi->judul_materi ?></td>
            <td><?php echo $materi->kode_mk ?></td>
            <td><?php echo get_data('makul_matakuliah','kode_makul',$materi->kode_mk,'nama_makul') ?></td>
            <td><?php echo $materi->nidn_dosen ?></td>
            <td><?php echo get_data('app_dosen','nidn',$materi->nidn_dosen,'nama_lengkap' )?></td>
            <td><?php echo $materi->date_at ?></td>
            
        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

</body>