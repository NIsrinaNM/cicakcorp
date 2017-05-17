                            <table class="table" id="" width="95%" style="border: 1px solid black">
                                <tr style="border: 1px solid black">
                                    <th style="border: 1px solid black">Kode Order</th>
                                    <th style="border: 1px solid black">Tanggal</th>
                                    <th style="border: 1px solid black">Jenis barang</th>
                                    <th style="border: 1px solid black">Jumlah</th>
                                    <th style="border: 1px solid black">Total Harga</th>
                                    <th style="border: 1px solid black">Status</th>
                                    <th style="border: 1px solid black">Action</th>
                                </tr>
                                <?php foreach ($order as $o) { ?>
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black"><?php echo $o->kode ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->tanggal ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->namabarang ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->jumlah ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->total ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->statusorder ?></td>
                                    <td style="border: 1px solid black"><a href="<?php echo base_url()."Home/confirm/"."$o->kode"?>">Konfirmasi Pembayaran</a></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($order1 as $o1) { ?>
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black"><?php echo $o1->kode_order ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->date ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->kode ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->kuantitas ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->subtotal ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->status_bayar ?></td>
                                    <td style="border: 1px solid black"><a href="<?php echo base_url()."Home/confirm/"."$o1->kode_order"?>">Konfirmasi Pembayaran</a></td>
                                </tr>
                                <?php } ?>
                            </table>